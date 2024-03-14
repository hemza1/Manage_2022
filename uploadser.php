<?php
/*
require 'db.php';
if(isset($_POST['save']))
{

$lname=$_POST['sel'];


$sql="INSERT INTO `service`(`name`) VALUES ('$_POST[content]')";
$query=mysqli_query($con,$sql) or die(mysqli_error($con));
if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
}
*/
?>
<?php 
include("db.php");
session_start();

$content1 = $_POST['content1']; //get posted data
//$content1 = mysqli_real_escape_string($con ,$content1);  //escape string 
$agency=$_SESSION['agencyname'];
$user=$_SESSION['username'];
$content2 = $_POST['content2']; //get posted data
//$content2 = mysqli_real_escape_string($con ,$content2);  //escape string 
$content3=$_POST['content3'];
$content4 = $_POST['content4'];
$sql = "INSERT INTO service (name , price , skills , description , username, agency_name ) VALUES ('$content1', '$content2', '$content3', '$content4' , '$user','$agency')";
mysqli_query($con ,$sql);

	

?>