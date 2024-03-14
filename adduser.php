<?php
session_start();
require('db.php');
require('redirect.php');

if(isset($_POST['submit'])){
if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['place']) && isset($_POST['c']) && isset($_POST['d']) && isset($_POST['e']) && isset($_POST['f'])&& isset($_POST['fname'])&& isset($_POST['lname'])&& isset($_POST['cname'])&& isset($_POST['project'])){
$user=$_SESSION['username'];
        
    $serv=$_POST['a'];
    $job=$_POST['b'];
    $bud=$_POST['c'];
    $place=$_POST['place'];
    $size=$_POST['d'];
    $lang=$_POST['e'];
    $ind=$_POST['f'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $cname=$_POST['cname'];
    $project=$_POST['project'];
    // $username=$_POST['username'];   
   
  
    $sql="INSERT INTO client(service,job,budget,place,size,lang,industry,firstname,lastname,companyname,project,username) VALUES ('$serv','$job','$bud','$place','$size','$lang','$ind','$fname','$lname','$cname','$project','$user')";
    if ($con->query($sql) === TRUE ) {
        header("Location: dashboardClient1.php");
        exit;
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      }
      
     
                
                
      redirect('formClient.php');
     
    }

?>