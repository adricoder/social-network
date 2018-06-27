<?php


// mysqli_connect() function opens a new connection to the MySQL server.
include('connect.php');

session_start();// Starting Session

// Storing Session
$user_check = $_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User



$query = "SELECT username from users where username = '$user_check'";
$ses_sql = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];

$query = "SELECT phonenumber from users where username = '$user_check'";
$sesi_sql = mysqli_query($dbcon, $query);
$rowe = mysqli_fetch_assoc($sesi_sql);
$phonie = $rowe['phonenumber'];

$query = "SELECT email from users where username = '$user_check'";
$sess_sql = mysqli_query($dbcon, $query);
$rows = mysqli_fetch_assoc($sess_sql);
$emailie = $rows['email'];

?>