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
  <div class="login-container col-lg-6">
        <h3 class="box-title mb-30">Sign in to your account</h3>
        <div class="th-login-form">
            <form action="Signin.php" method="POST" class="login-form">
                <div class="row">
                    <div class="form-group col-12">
                        <label>Email</label> 
                        <input type="text" class="form-control" name="email" id="username" required="required">
                    </div>
                    <div class="form-group col-12">
                        <label>Password</label> 
                        <input type="password" class="form-control" name="password" id="password" required="required">
                    </div>
                    <div class="form-btn mb-20 col-12">
                        <button class="th-btn btn-fw th-radius2" type="submit" name="login">Login</button>
                    </div>
                </div>
                <div id="forgot_url">
                    <a href="forgot_password.php">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php
include('footer.php');
?>