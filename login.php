<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>
<body>
<?php
require('db.php');

// If form submitted, insert values into the database.

if (isset($_POST['email']) && isset($_POST['password'])){
        // removes backslashes
	$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['ID'] = $email;
            // Redirect user to index.php
	    header("Location: choice.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>
 <section>
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><div class="env"><img src="images\logo-sl-square.svg" alt=""> <br> <h1><b> Log in</b> to your account to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
          <div class="formBx">
            <form action="choices.php"  name="signin" method="post" name="login">
              <h2>Sign In</h2>
              <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> 
            <div class="or">Or</div>
              <input type="email" name="email" placeholder="yours@example.com" class="width"/>
              <div class="erroremail" id="nameErremail"></div>
              <input type="password" name="password" placeholder="Your password"class="width" />
              <div class="error" id="nameErrpass1"></div>
              <input type="submit" name="" value="Login" class="width" />
              
              <div class="forgot"><a href="">Don't remember your password?</a></div>
              <p class="signup">
                Don't have an account ?
                <a href="registration.php">Sign Up.</a>
              </p>
            </form>
          </div>
        </div>
		</section>
<?php } ?>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="loginValidation.js"></script>
</body>
</html>
