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
	
	<style type="text/css">
		
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
		}
		.timeline{
			float: right;
			text-align: center;
			border: 1px solid #E1E1E1;
			width:45%;
			height:auto;
			align-self: center;
			margin-right:380px;
			
		}
		
		img {
    border-radius: 50%;
    width:50%;
}
.navigation{

		background-color: white;
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

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #111;
}

.friends{
	float:right;
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
			</ul>

			<form method="post" action="show_profile.php">
				
			 <input type="text" style="width: 200px;" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Type a name">
			trtr<input type="submit" value="Show Profile"/>

			</form>

		</div>
	</header>


	<h2 id="logout"><a href="logout.php">Log Out</h2></a>
		<div class="container">
	<div id="prof">
		<img src="images/photo.png" alt="Avatar"></br></br>
		<a href="#">Change profile</a></br>
		<p class="detail"> Welcome:<?php echo $login_session; ?></p>
		<p class="detail"> phone number:<?php echo $phonie; ?></p>
		<p class="detail">Email: <?php echo $emailie; ?> </p>
		<a href="change.php">Edit profile</a>

	</div>
	<div class="timeline">
		<p>this is the timeline</p>
		<div class="page-container">
			<?php 
				get_total();
				require_once 'php/check_com.php';
			?>
			<form action="" method="post" class="main">
				<label>enter a brief comment</label>
				<textarea class="form-text" name="comment" id="comment"></textarea>
				<br />
				<input type="submit" class="form-submit" name="new_comment" value="post">
			</form>
			<?php get_comments(); ?>
		</div>
		
	</div>
</div>
<!--<div class="friends">this is the freinds sector</div>-->
</body>
</html>