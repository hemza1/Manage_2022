<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<section>
      <div class="container">
        <div class="user signinBx">
          
          <div class="formBx">
                  
            <form action=""  name="signin" method="post">
           
            <h2>Create an account</h2>
             
            
              <input type="email" name="email" placeholder="yours@example.com" class="width"/>
              <div class="erroremail" id="nameErremail"></div>
              <input type="password" name="password" placeholder="Your password"class="width" />
              <div class="error" id="nameErrpass"></div>
              <input type="text" name="username" placeholder="Your first name"class="width fname" />
              <div class="error" id="nameErrfname"></div>
              
              <div class="checkbox">
                <input type="checkbox" class="check1" >
                
                <label for="" class="check">I agree to the <a href=""> terms</a> of use and <a href=""> privacy policy</a>.</label>
                <div class="error" id="nameErrcheck"></div>
                </div>
              
                <input type="submit" name="submit" value="Sign Up"class="width" />
              
              <p class="signup">
                Already have an account ?
                <a href="login.php" >Sign in.</a>
              </p>
            </form>
            
          </div>
          <div class="imgBx"><div class="env up"><img src="images\logo-sl-square.svg" alt=""> <br> <h1> <b> Create a new account</b> to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
        </div>
		</section>
<?php } ?>
<script src="script.js"></script>
</body>
</html>
