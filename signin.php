         
<?php
// Initialize the session
require "db.php";
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: choices.php");
    exit;
}

 
// Include config file

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            function redirect($url)
                                {
                                    if (!headers_sent())
                                    {    
                                        header('Location: '.$url);
                                        exit;
                                        }
                                    else
                                        {  
                                        echo '<script type="text/javascript">';
                                        echo 'window.location.href="'.$url.'";';
                                        echo '</script>';
                                        echo '<noscript>';
                                        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                                        echo '</noscript>'; exit;
                                    }
                                }
                                    /*
                                    $sql1="SELECT * FROM agency WHERE full_name='$username'";
                                    $sql2="SELECT * FROM client WHERE username='$username'";
                                    $result = mysqli_query($con, $sql1);

                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                            
                                            redirect("DashboardAgency.php");
                                        }
                                        } else {
                                             redirect("choices.php");
                                        }
                                    $result2=mysqli_query($con, $sql2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result2)) {
                                            
                                            redirect("DashboardClient.php");
                                        }
                                        } else {
                                             redirect("choices.php");
                                        }
                                        */
                                        #code to detect whether the user is an agency or a client
                                            $user=$_SESSION["username"];
                                            $sel_dash = mysqli_query($con,"SELECT type_user FROM users WHERE username = '$user'");
                                            $dados = mysqli_fetch_assoc($sel_dash);
                                            $page = $dados['type_user'];
                                            if($page == 'Agency'){
                                                redirect('dashboardAgency.php');
                                            }
                                            else if($page == 'Client'){
                                                redirect('dashboardClient1.php');
                                            }
                                            else{
                                                redirect('choices.php');
                                            }
                                            
                                            
                                        
                                        
                                        // call function with the variable
                                        
                                
                                        
                                
                                
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
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
    <title>Login</title>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
    <section>
    

      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><div class="env"><img src="images\logo-sl-square.svg" alt=""> <br> <h1><b> Log in</b> to your account to continue! </h1> <br> <h4>Everything you do on Sortlist is linked to your account.</h4></div></div>
          <div class="formBx">
            <form action="<?php ?>"  method="post" name="login">
              <h2>Sign In</h2>
              <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> 
            <div class="or">Or</div>
              <input type="text" name="username" placeholder="yours@example.com" class="width <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"/>
              
              <input type="password" name="password" placeholder="Your password"class="width <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" />
              
              <input type="submit" name="" value="Login" class="width" />
              
              <div class="forgot"><a href="forgot-password.php">Don't remember your password?</a></div>
              <p class="signup">
                Don't have an account ?
                <a href="signup.php">Sign Up.</a>
              </p>
              <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
            </form>
          </div>
        </div>
		</section>
</body>
</html>
