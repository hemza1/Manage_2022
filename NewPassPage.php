<!DOCTYPE html>
<html lang="en">
    <?php 
    
    require_once('Control.php');
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><div class="env"><img src="images\logo-sl-square.svg" alt=""> <br> <h1><b> Log in</b> to your account to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
        <div class="formBx">
          <form action="Control.php"  method="post" name="login">
            <h2>Password Recovery</h2>
            
          <div class="or"><?php echo $_SESSION['info'] ?></div>
            <input type="text" name="newpassword" placeholder="yours@example.com" class="width " value=""/>
            <input type="text" name="passwordconf" placeholder="Confirm Password" class="width " value=""/>
            
            
            <input type="submit" name="check_newpass" value="Login" class="width" />
            
            <div class="forgot"><a href="">Don't remember your password?</a></div>
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