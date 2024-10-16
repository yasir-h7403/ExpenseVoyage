<?php
include('header.php');
?>
<?php
  if(isset($_SESSION['expenseId'])){
    echo"<script>
    location.assign('index.php');
    </script>";
  } 
 ?>
<div class="row">
<div class="col-lg-3"></div>
 <div class="signup-container col-lg-6">
        <h3 class="th-form-title mb-30">Sign up for an account</h3>
        <form action="signup.php" method="POST" class="signup-form" id="signupform">
            <div class="row">
                <div class="form-group col-12">
                    <label>First name*</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" required="required">
                    <small class="text-danger">
                </div>
                <div class="form-group col-12">
                    <label>Last name*</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required="required">
                    <small class="text-danger">
                </div>
                <div class="form-group col-12">
                    <label for="userEmail">Your email*</label>
                    <input type="email" class="form-control" name="email" id="userEmail" required="required">
                    <small class="text-danger">
                </div>
                <div class="form-group col-12">
                    <label for="userPassword">Password*</label>
                    <input type="password" class="form-control" name="password" id="userPassword" required="required">
                    <small class="text-danger">
                </div>
                <div class="form-btn mt-20 col-12">
                    <button class="th-btn btn-fw th-radius2" type="submit" name="Signup">Sign up</button>
                </div>
            </div>
        </form>
    </div>
    </div>
<?php
include('footer.php');
?>