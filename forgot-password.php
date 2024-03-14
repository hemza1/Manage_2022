<!DOCTYPE html>
<?php 


require_once('Control.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
</head>
<body>
<section>
    

    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><div class="env"><img src="images\logo-sl-square.svg" alt=""> <br> <h1><b> Log in</b> to your account to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
        <div class="formBx">
          <form action=""  method="post" name="login">
            <h2>Forgot My Password</h2>
            
          <div class="or"><?php echo $_SESSION['info']; ?></div>
          <p>Your Email :</p>
            <input type="text" name="email" placeholder="yours@example.com" class="width " value=""/>
            
           
            
            <input type="submit" name="submit" value="Send Email" class="width" />
            
           
            <p class="signup">
              Don't have an account ?
              <a href="signup.php">Sign Up.</a>
            </p>
            
          </form>
        </div>
      </div>
</div>
      </section>
</body>
</html>