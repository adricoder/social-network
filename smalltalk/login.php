<?php
session_start();
$error= '';

if(isset($_POST['submit'])){
if(empty($_POST['username']) || empty($_POST['password'])){
	$error = "username or password is invalid";
}
else
{
//define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];

//connection
include('connect.php');
//fetch info
$query = "SELECT username, password from users where username=? AND password=? LIMIT 1";

//protect from sql injection
$stmt = $dbcon->prepare($query);
$stmt->bind_param("ss", $username,$password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if($stmt->fetch())//fetching the contents of the row
	{
		if(!empty($_POST["remember"]))
 {
 setcookie ("username", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
 setcookie ("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
 }
 else
 {
 if(isset($_COOKIE["username"]))
 {
 setcookie ("username", "");
 }
 if(isset($_COOKIE["password"]))
 {
 setcookie ("password", "");
 }
 }

		$_SESSION['login_user'] = $username;
		header("location: profile.php");
	} 
else{
	$error = "username or Password is invalid";
}
mysqli_close($dbcon);
}
}
?>