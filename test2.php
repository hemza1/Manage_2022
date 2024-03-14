<?php
require('db.php');

  
    $username = $_POST['username'];
  	$sql = "SELECT agency_name FROM agency WHERE agency_name='$username'";
  	$results = mysqli_query($con, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  
  
?>