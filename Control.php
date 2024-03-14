<?php

// Initialize the session
session_start();

// Include config file
$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=last", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//Recovery forms
$_SESSION['info']="";
$email = "";
$name = "";
$etat= 0;
$errors = array();


//if user click continue button in forgot password form 'forgot-password'
    if(isset($_POST['submit'])){
        $email =  $_POST['email'];
        $sql = "SELECT * FROM users WHERE username= :email_user";
        if($stmt = $pdo->prepare($sql)){

              // Bind variables to the prepared statement as parameters
              $stmt->bindParam(":email_user", $param_useremail, PDO::PARAM_STR);
            
              // Set parameters
              $param_useremail = $_POST['email'];
             // Attempt to execute the prepared statement
             if($stmt->execute()){
                // Check if username exists, if yes then verify password
            $expFormat = mktime(
                    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
                      );
              $expDate = date("Y-m-d H:i:s",$expFormat);
                
               
                if($stmt->rowCount() == 1){
                    $code = rand(999999, 111111);
                              
                    $insert_code = "UPDATE users SET code = '$code' WHERE username='$email'";
                    $stmt4 = $pdo->prepare($insert_code);
                   
                    if ( $stmt4->execute()) {
                          $subject = "Your password reset code is $code";
                          $message = "Your password reset code is $code";
                          $sender = "From: hamzaelyesri2017@gmail.com";
                        if(mail($email, $subject, $message, $sender)){
                            $info = "We've sent a passwrod reset otp to your email - $email";
                            $_SESSION['info'] = $info;
                            $_SESSION['email'] = $email;
                            //I need to change the redirection with a variable status value that I can use in JS
                            header('Location:RecoveryCodePage.php');
                            exit();
                        }else{
                            $errors['otp-error'] = "Failed while sending code!";
                        }
                    }else{
                        $errors['db-error'] = "Something went wrong!";
                    }
                }else{
                    $errors['email'] = "This email address does not exist!";
                }
            }
        }
    }


     //if user click checkcode button 'reset-code.php'

     if(isset($_POST['check-code'])){
        $_SESSION['info'] = "";
        // $otp_code = $_POST['code'];
        $check_code = "SELECT * FROM users WHERE code =:code";
        $stmt = $pdo->prepare($check_code);

        $stmt->bindParam(":code", $param_code, PDO::PARAM_STR);

        $param_code = $_POST["code"];
		if($stmt->execute()){
        if($stmt->rowCount() == 1){
            if($fetch_data = $stmt->fetch()){
            $email = $fetch_data['user_email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location:NewPassPage.php');

            $etat= 2; //SAME: needs to be changed with a status var
            exit();}
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
}

//if user click change password button 'new-password.php'
if(isset($_POST['check_newpass'])){
    $_SESSION['info'] = "";
    $emaill=$_SESSION['email'];
    $npassword =$_POST['newpassword'];
    $cpassword = $_POST['passwordconf'];
    if($npassword !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        // $email = $_SESSION['email']; //getting this email using session
        // $encpass = password_hash($npassword, PASSWORD_BCRYPT);
        $update_pass = "UPDATE users SET password='$npassword',code='$code' WHERE username='$emaill'";
        $stmt = $pdo->prepare($update_pass);
        if($stmt->execute()){
        //update key
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            $etat= 3;
            header('location:signin.php');
             //SAME: needs to be changed with a var status
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

    
?>