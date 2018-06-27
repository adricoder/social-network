<?php
include('login.php');//allows index file to access login file

//checks for value of username
if(isset($_SESSION['login_user'])){
header("location: profile.php");//redirect to users profile
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
	<style type="text/css">
		body{
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
			background-image: url("background.png");
		}


	</style>
</head>
<body>
	
	<div class="loginbox">
		<img src="avatar.jpg" class="avatar">
		<br/>
		<br/>
			<h1>Login Here</h1>
			<form action="" method="post">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" value="<?php if(isset($_COOKIE["username"])) {echo $_COOKIE["username"];} ?>" />

				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>" />

				<input type="checkbox" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php }?> />
				<label>Remember me</label><br/><br/>

				<input type="submit" name="submit" value="Login">
				<p><?php if(isset($msg)) {echo $msg;} ?></p>

				<a href="signup.php">Signup</a>
				<span><?php echo $error; ?></span>
			</form>
	</div>
</body>
</html>

	</div>
</body>
</html>