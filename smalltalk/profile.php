<?php
include('session.php');
require_once 'php/connect.php';
 require_once 'php/functions.php';
if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<meta charset="UTF-8" lang="en-US">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<script src="js/global.js"></script>
		<link rel="stylesheet" type="text/css" href="css/fatma.css">
	<style type="text/css">
	body{
		background-image: url('th (6).jpg');
	}
		
		.detail{
			text-decoration: none;
			color: black;
		}
		#prof{
			float: left;
			text-align: center;
			border: 1px solid #E1E1E1;
			width:20%;
			height: 100%;
			font: #fff;
		}
		#profo{
			text-align: center;
			border: 1px solid #E1E1E1;
			width:20%;
			height: 100%;
			font: #fff;
		}
		.timeline{
			float: right;
			text-align: center;
				width:45%;
			height:auto;
			align-self: center;
			margin-right:380px;
		}
		.friends{
			float: right;
			margin-right: 10px;
			text-align: center;
			border: 1px solid #E1E1E1;
			width:20%;
			height: 100%;
			
		}		
		img {
		    border-radius: 50%;
		    width:50%;
		}
		
		ul {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color:white;
		}
		li {
		    float: left;
		    color: black;
		}
		li a {
		    display: block;
		    color:black;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}
		button{
			border-radius: 5px;
			background-color: #E1E1E1; 
		}
		/* Change the link color to #111 (black) on hover */
		li a:hover {
		    background-color:grey;
		}
		.friends{
			float: left;
			margin-top:20px;
		}
		.navigation{
			background-color:#72BCD4;
		}
		.input{
			margin-top:20px;
		}
</style>
</head>

<body>

	<header>
		<div class="navigation">
			<ul>
				<li><a href="#">Feeds</a></li>
				<li><a href="#">Find Friends</a></li>
				<li><a href="#">Messages</a></li>
				<li><a href="#">Settings</a></li>
				<li id="logout"><a href="logout.php">Log out</a></li>
			</ul>
			<!-- <button name="logout" value="Log out"></button> -->
			</div>
		</div>
	</header>


	
		<div class="container">
	<div id="prof">
		<img src="images/photo.png" alt="Avatar"></br></br>
		<a href="#">Change profile</a></br>
		<p class="detail"> Username:<?php echo $login_session; ?></p>
		<p class="detail"> phone number:<?php echo $phonie; ?></p>
		<p class="detail">Email: <?php echo $emailie; ?> </p>
		<a href="change.php">Edit profile</a>

	</div>
	<div class="timeline">
		<div class="page-container">
			<?php 
				get_total();
				require_once 'php/check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>Status Post:</br></label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments(); ?>
		</div>
		
		</div>
		<div class="friends">
		<form method="post">
				
				<input type="text" style="width: 200px; background-color: white" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type a name">
				<input type="submit" value="Show Profile"/>

			</form>
			<?php

$name = $_POST['typeahead'];

$host = "localhost";
$user = "root";
$psw = "";
$db_name = "small_talk";

$sql = "SELECT * FROM users WHERE username = ?";

try
{
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $psw);

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($name));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) == 1)
    {
        $profile_info = $result[0];
        $nameiu =$profile_info['username'];
        $phonieu= $profile_info['phonenumber'];
        $emailiu= $profile_info['email'];

        
    }

}
catch(PDOException $e)
{
    //HandleErrors
}

?>
        <div id="profile">
        <p class="detail"> Username:<?php echo $nameiu; ?></p>
        <p class="detail"> phone number:<?php echo $phonieu; ?></p>
        <p class="detail">Email: <?php echo $emailiu; ?> </p>
    </div>
    
	</div>
	</div>
	
</body>
</html>