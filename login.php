<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Smart Online Voting System Login</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<div class="contact-form">
		<img alt="" class="avatar" src="https://i.pinimg.com/736x/3f/94/70/3f9470b34a8e3f526dbdb022f9f19cf7.jpg">
		<h2>Login to SOVS</h2>
		<form action="controller.php?mod=login" method="post">
			<p>Email</p><input placeholder="Enter Email" type="email" name="email">
			<p>Passwrod</p><input placeholder="Enter Password" type="password" name="password"> <input type="submit" value="Sign in">
			<p><a class="small" href="forgotpassword.php">Forgot Password?</a></p>
			
		</form>
	</div>
</body>
</html>
