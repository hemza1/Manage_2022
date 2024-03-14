<?php
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = $check_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/', strtolower($_POST["username"]))){
        $username_err = "Wrong Email Format";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(!isset($_POST['check'])){
            $check_err="Please agree to the terms";
        
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($check_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: signin.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
    
        <section>
      <div class="container">
        <div class="user signinBx">
          
          <div class="formBx">
                  
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           
            <h2>Create an account</h2>
             
            
              <input type="text" name="username" placeholder="yours@example.com" class="width <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" />
              <span class="invalid-feedback"><?php echo $username_err; ?></span>
              <input type="password" name="password" placeholder="Your password" class="width <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
              <input type="password" name="confirm_password" placeholder="Confirm Your password" class="width <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" />
              <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
              
             
              
              <div class="checkbox">
                <input type="checkbox" class="check1" name="check" >
                
                <label for="" class="check" id="terms">I agree to the <a href=""> terms</a> of use and <a href=""> privacy policy</a>.</label> <br>
                <span class="invalid-feedback"><?php echo $check_err; ?></span>
                </div>
              
                <input type="submit" name="submit" value="Sign Up"class="width" id="submit" />
              
              <p class="signup">
                Already have an account ?
                <a href="signin.php" >Sign in.</a>
              </p>
            </form>
            
          </div>
          <div class="imgBx"><div class="env up"><img src="images\logo-sl-square.svg" alt=""> <br> <h1> <b> Create a new account</b> to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
        </div>
		</section>
    </div>    
    <script>
    //  var check = document.getElementById('terms');
    //  var error =document.getElementById('checkErrcheck');
    //  var submit = document.getElementById('submit');
    //  if(!check.checked){
    //      submit.
    //      error.innerHTML="Please agree to the terms";
        
    //  }

    </script>
</body>
</html>