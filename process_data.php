<?php
session_start();
//process_data.php

if(isset($_POST["sel"]))
{
	
	$connect = new PDO("mysql:host=localhost;dbname=last", "root", "");

	$success = '';

	$name = $_POST["sel"];

	$email = $_POST["price"];

	$website = $_POST["s1"];

	$comment = $_POST["desc"];

	$user =$_SESSION['username'];
/*
	$name_error = '';
	$email_error = '';
	$website_error = '';
	$comment_error = '';
	$gender_error = '';

	if(empty($name))
	{
		$name_error = 'Name is Required';
	}
	else
	{
		if(!preg_match("/^[a-zA-Z-' ]*$/", $name))
		{
			$name_error = 'Only Letters and White Space Allowed';
		}
	}

	if(empty($email))
	{
		$email_error = 'Email is Required';
	}
	else
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$email_error = 'eMail is invalid';
		}
	}

	 if(empty($website))
	{
		$website_error = 'Website is Required';
	}
	else
	{
		if(!filter_var($website, FILTER_VALIDATE_URL))
		{
			$website_error = 'Invalid Website Url';
		}
	}

	if(empty($comment))
	{
		$comment_error = 'Comment is Required Field';
	}

	if(empty($gender))
	{
		$gender_error = 'Please Select your gender';
	}
*/

		//put insert data code here 

		$data = array(
			':name'			=>	$name,
			':email'		=>	$email,
			':website'		=>	$website,
			':comment'		=>	$comment,
			
            ':user'         => $user
		);

		$query = "
		INSERT INTO service 
		(name, price, skills , description , username) 
		VALUES (:name, :email, :website, :comment, :user)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$success = '<div class="alert alert-success">Data Saved</div>';
	}

	
	
	


?>
