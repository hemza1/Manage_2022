<?php
session_start();
require('db.php');
#code to detect whether the user is an agency or a client
$user=$_SESSION["username"];
$sel_dash = mysqli_query($con,"SELECT type_user FROM users WHERE username = '$user'");
$dados = mysqli_fetch_assoc($sel_dash);
$page = $dados['type_user'];
echo $page;
?>