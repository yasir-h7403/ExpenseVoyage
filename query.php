<?php
include('dbcon.php');
session_start();

//Register
if (isset($_POST['Signup'])) {


    
    $username = $_POST['firstname'];
    $userlastname = $_POST['lastname'];
    $useremail = $_POST['email'];
    $userpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = $pdo->prepare("INSERT INTO users (First_Name, Last_Name, Email, Password) VALUES (:firstname, :lastname, :email, :password)");
    $query->bindParam('firstname', $username);
    $query->bindParam('lastname', $userlastname);
    $query->bindParam('email', $useremail);
    $query->bindParam('password', $userpassword);

    if ($query->execute()) {
        $user_id = $pdo->lastInsertId();

        $full_name = $username . ' ' . $userlastname;
        $profileQuery = $pdo->prepare("INSERT INTO user_profile (user_id, full_name, email) VALUES (:user_id, :full_name, :email)");
        $profileQuery->bindParam('user_id', $user_id);
        $profileQuery->bindParam('full_name', $full_name);
        $profileQuery->bindParam('email', $useremail);

        if ($profileQuery->execute()) {
            echo "<script>
                  alert('Signup and profile creation successful');
                  location.assign('signin.php');
                </script>";
        } else {
            echo "<script>alert('Error creating user profile: " . $profileQuery->errorInfo()[2] . "');</script>";
        }
    } else {
        echo "<script>alert('Error signing up: " . $query->errorInfo()[2] . "');</script>";
    }
}

//Signin
if (isset($_POST['login'])) {
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
    $query->bindParam('email', $useremail);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res) {
        if (password_verify($userpassword, $res['Password'])) {
            if ($res['Role_Id'] == 1) {
                $_SESSION['adminemail'] = $res['Email'];
                $_SESSION['adminId'] = $res['User_id'];
                echo "<script> 
                        alert('Login successfully');
                        location.assign('Admindashboard/html/vertical-menu-template/index.php');
                      </script>";
            } else if ($res['Role_Id'] == 2) {
                $_SESSION['expenseemail'] = $res['Email'];
                $_SESSION['expenseId'] = $res['User_id'];
                $_SESSION['expenseName'] = $res['First_Name'];
                echo "<script> 
                        alert('Login successfully');
                        location.assign('index.php');
                      </script>";
            }
        } else {
            echo "<script> 
                    alert('Incorrect email or password. Please try again.');
                  </script>";
        }
    } else {
        echo "<script> 
                alert('Incorrect email or password. Please try again.');
              </script>";
    }
}

// Contact US
if (isset($_POST['Contact'])) {
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $contactMessage = $_POST['message'];
    $userId = $_POST['userId'];

    $query = $pdo->prepare("INSERT INTO contactus (User_Id, User_Name, User_Email, User_Message)VALUES (:userId, :contactName, :contactEmail, :message)");

    $query->bindParam('userId', $userId);
    $query->bindParam('contactName', $contactName);
    $query->bindParam('contactEmail', $contactEmail);
    $query->bindParam('message', $contactMessage);

    if ($query->execute()) {
        echo "<script>alert('Message submitted successfully');</script>";
    } else {
        echo "<script>alert('There was an error submitting your message. Please try again later.');</script>";
    }
}

// User profile
if (isset($_SESSION['expenseId'])) {
    $userId = $_SESSION['expenseId'];

    $query = $pdo->prepare("SELECT full_name, email, phone_number, date_of_birth , city , travel_preferences FROM user_profile WHERE user_id = :user_id");
    $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $query->execute();
    $userProfile = $query->fetch(PDO::FETCH_ASSOC); 
}

//  update profile
if (isset($_SESSION['expenseId'])) {
    $userId = $_SESSION['expenseId'];

    $query = $pdo->prepare("SELECT * FROM user_profile WHERE user_id = :user_id");
    $query->bindParam('user_id', $userId, PDO::PARAM_INT);
    $query->execute();
    $userProfile = $query->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['updateProfile'])) {
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
        $city = htmlspecialchars($_POST['city']);
        $travel_preference = htmlspecialchars($_POST['travel_preferences']);

        $profileImage = $userProfile['profile_image']; 
        $bannerImage = $userProfile['banner_image']; 

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $imageName = $_FILES['profile_image']['name'];
            $imageTmpName = $_FILES['profile_image']['tmp_name'];
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $destination = 'img/' . $imageName;

            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                if (move_uploaded_file($imageTmpName, $destination)) {
                    $profileImage = $imageName; 
                } else {
                    echo "<script>alert('Error uploading profile image.');</script>";
                }
            } else {
                echo "<script>alert('Invalid image format for profile image.');</script>";
            }
        }

        if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
            $bannerImageName = $_FILES['banner_image']['name'];
            $bannerImageTmpName = $_FILES['banner_image']['tmp_name'];
            $bannerExtension = pathinfo($bannerImageName, PATHINFO_EXTENSION);
            $bannerDestination = 'img/' . $bannerImageName; 

            if (in_array($bannerExtension, ['jpg', 'jpeg', 'png'])) {
                if (move_uploaded_file($bannerImageTmpName, $bannerDestination)) {
                    $bannerImage = $bannerImageName; 
                } else {
                    echo "<script>alert('Error uploading banner image.');</script>";
                }
            } else {
                echo "<script>alert('Invalid image format for banner image.');</script>";
            }
        }

        $updateQuery = $pdo->prepare("UPDATE user_profile SET phone_number = :phone_number, date_of_birth = :date_of_birth, travel_preferences = :travel_preferences, city = :city, profile_image = :profile_image, banner_image = :banner_image WHERE user_id = :user_id");

        $updateQuery->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
        $updateQuery->bindParam(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $updateQuery->bindParam(':travel_preferences', $travel_preference, PDO::PARAM_STR);
        $updateQuery->bindParam(':city', $city, PDO::PARAM_STR);
        $updateQuery->bindParam(':profile_image', $profileImage, PDO::PARAM_STR);
        $updateQuery->bindParam(':banner_image', $bannerImage, PDO::PARAM_STR);
        $updateQuery->bindParam(':user_id', $userId, PDO::PARAM_INT);

        if ($updateQuery->execute()) {
            echo "<script>alert('Profile updated successfully!'); location.assign('pages-profile-user.php');</script>";
        } else {
            echo "<script>alert('Failed to update profile.');</script>";
        }
    }
}

// add Category
if (isset($_POST['addCategory'])) {
    $category_name = $_POST['category_name'];
    $user_id = $_SESSION['expenseId'];
    $query = $pdo->prepare("insert into category(Category_name,User_id) values (:category_name, :id)");
    $query->bindParam('category_name', $category_name);
    $query->bindParam('id', $user_id);
    $query->execute();
    echo "<script>alert('category added successfully');
    location.assign('view_category.php');
     </script>";
}

// Add Expense
if (isset($_POST['addExpense'])) {
    $expense_amount = $_POST['expense_amount'];
    $expense_date = $_POST['expense_date'];
    $expense_description = $_POST['expense_description'];
    $Currency_id = $_POST['Currency_id'];
    $Cat_id = $_POST['Cat_id'];
    $Trip_id = $_POST['Trip_id'];
    $user_id = $_POST['user_id'];
    $query = $pdo->prepare("insert into expenses(Amount, Expense_date, Notes, Currency_id, Category_id, Trip_id, User_id) 
    values (:expense_amount, :expense_date, :expense_description, :Currency_id, :Cat_id, :Trip_id, :user_id)");
    $query->bindParam('expense_amount', $expense_amount);
    $query->bindParam('expense_date', $expense_date);
    $query->bindParam('expense_description', $expense_description);
    $query->bindParam('Currency_id', $Currency_id);
    $query->bindParam('Cat_id', $Cat_id);
    $query->bindParam('Trip_id', $Trip_id);
    $query->bindParam('user_id', $user_id);
    $query->execute();
    echo "<script>alert('expense added successfully');
    location.assign('view_expense.php');
     </script>";
}

// Add Itineraries
if (isset($_POST['additinerary'])) {
    $itinerary_activity = $_POST['itinerary_activity'];
    $itinerary_activity_date = $_POST['itinerary_activity_date'];
    $itinerary_description = $_POST['itinerary_description'];
    $Trip_id = $_POST['Trip_id'];
    $query = $pdo->prepare("insert into itineraries(Activity, Activity_date, Description, Trip_id) 
    values (:itinerary_activity, :itinerary_activity_date, :itinerary_description, :Trip_id)");
    $query->bindParam('itinerary_activity', $itinerary_activity);
    $query->bindParam('itinerary_activity_date', $itinerary_activity_date);
    $query->bindParam('itinerary_description', $itinerary_description);
    $query->bindParam('Trip_id', $Trip_id);
    $query->execute();
    echo "<script>alert('itinerary added successfully');
    location.assign('view_itineraries.php');
     </script>";
}

// Add Report
if (isset($_POST['addReport'])) {
    $report_description = $_POST['report_description'];
    $Trip_id = $_POST['Trip_id'];
    $query = $pdo->prepare("insert into reports(ReportData, TripId) values (:report_description,:Trip_id)");
    $query->bindParam('report_description', $report_description);
    $query->bindParam('Trip_id', $Trip_id);
    $query->execute();
    echo "<script>alert('Report added successfully');
    location.assign('view_report.php');
     </script>";
}

// Add Trip
if (isset($_POST['addTrip'])) {
    $trip_name = $_POST['trip_name'];
    $trip_start_date = $_POST['trip_start_date'];
    $trip_end_date = $_POST['trip_end_date'];
    $trip_destination = $_POST['trip_destination'];
    $trip_budget = $_POST['trip_budget'];
    $user_id = $_POST['user_id'];
    $query = $pdo->prepare("insert into trips(Tirp_name, Start_date, End_date, destination, budget, User_id) 
    values (:trip_name, :trip_start_date, :trip_end_date, :trip_destination, :trip_budget, :user_id)");
    $query->bindParam('trip_name', $trip_name);
    $query->bindParam('trip_start_date', $trip_start_date);
    $query->bindParam('trip_end_date', $trip_end_date);
    $query->bindParam('trip_destination', $trip_destination);
    $query->bindParam('trip_budget', $trip_budget);
    $query->bindParam('user_id', $user_id);
    $query->execute();
    echo "<script>alert('trip added successfully');
    location.assign('view_trip.php');
     </script>";
}


?>