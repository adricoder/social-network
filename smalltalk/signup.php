<?php

if(isset($_POST['submit'])){
	include('connect.php');

	$username = $_POST['username'];
	$email = $_POST['email'];
	$phonenumber= $_POST['phonenumber'];
	$password = $_POST['password'];
	$sqlinsert = "INSERT INTO users (username, email, phonenumber, password) VALUES ('$username', '$email', '$phonenumber', '$password')";

	if (!mysqli_query($dbcon, $sqlinsert)) {
		die('error inserting new record');
	}

	echo "success";
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>SignUp Page</title>
	<link rel="stylesheet" type="text/css" href="css/signupstyle.css">

	<style type="text/css">
		body{
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
			background-image: url("th (5).jpg");
		}
	</style>
</head>
<body>
	
	<div class="signupbox">

		<br/>
		<br/>

			<h1>SignUp</h1>
			<form method="post" action="signup.php">
				<p>Username</p>
				<input type="text" name="username" placeholder="This will be your username">
				<p>Email Address</p>
				<input type="email" name="email" placeholder="Enter Your Email Address">
				<p>Phone number</p>
				<input type="text" name="phonenumber" placeholder="Enter Your Phone number">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password">	
				<input type="submit" name="submit" value="SignUp">
				<a href="index.php">Back</a>
				
			</form>
			
	</div>
</body>
</html>