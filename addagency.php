<?php
session_start();
require('db.php');
require('redirect.php');

if(isset($_POST['submit'])){


 # début insertion
//if(isset($_POST['fname']) && isset($_POST['aname']) && isset($_POST['adress']) && isset($_POST['lang']) && isset($_POST['team']) && isset($_POST['tel'])&& isset($_POST['site'])&& isset($_POST['email'])&& isset($_POST['sel'])&& isset($_POST['price'])&& isset($_POST['skills'])&& isset($_POST['desc']) ){
  $userr=$_POST['rename'];
  $user=$_SESSION['username'];
  
$fname=$_POST['fname'];
$_SESSION['agencyname']=$fname;
echo $_SESSION['agencyname'];
$adress=$_POST['adress'];
$lang=$_POST['lang'];
$people=$_POST['team'];
$tel=$_POST['tel'];
$service=$_POST['sel'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$skills=$_POST['skills'];
$web=$_POST['site'];
$s=$_POST['s'];
$serv=$_POST['servname'];   
$email=$_POST['email'];




$sql = "INSERT INTO agency (agency_name, adress, language , people , agency_tel , service, price, skills ,description ,agency_website,full_name,email)
VALUES ('$fname', '$adress', '$lang','$people','$tel','$service','$price','$skills','$desc','$web','$user','$email')";

if (mysqli_query($con, $sql)) {
  echo "New record created successfully";
  redirect('dashboardagency.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

    
}
#fin insertion




//}
?>
