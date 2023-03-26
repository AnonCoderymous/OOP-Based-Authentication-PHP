<?php 
	session_start();
	if(isset($_SESSION[ 'isLoggedIn' ])){
		header('location: ./main');
	}else{
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Website &bull; Login | Signup</title>
	<link rel='icon' type='image/png' href='https://img.icons8.com/ios-filled/256/login-rounded-right.png' crossorigin='*' />
	<link rel='stylesheet' type='text/css' href='style.css' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='author' content='Huzefa Dayanji' />
	<meta name='description' content='This is a Login & Signup page in OOP PHP.' />
	<meta name='keywords' content='Login, Signup, OOP, PHP, PHP Programming' />
	<script src='https://kit.fontawesome.com/b2d33a2a71.js' crossorigin='anonymous' defer></script>
</head>
<body>
	<section class='navbar'>
		<div class='leftNav'>Welcome to XYZ.com</div>
		<div class='rightNav'>
			<ul>
				<li>Contact</li>
				<li>About</li>
				<li>FAQ</li>
			</ul>
		</div>
	</section>

	<section class='formsArea'>
		<div class='signUpForm'>
			<h4>XYZ.com &bull; Sign Up</h4>
			<form action='./includes/signup.inc.php' method='POST' autocomplete='off'>
				<input type='text' name='username' placeholder='Enter username' required />
				<input type='text' name='email' placeholder='Enter email address' required />
				<input type='password' name='pwd' placeholder='Password' required />
				<input type='password' name='pwdrepeat' placeholder='Confirm Password' required />
				<input type='submit' name='submit' value='Sign Up' />
			</form>
		</div>
		<div class='loginForm'>
			<h4>XYZ.com &bull; Login</h4>
			<form action='./includes/login.inc.php' method='POST' autocomplete='off'>
				<input type='text' name='username' placeholder='Username' required />
				<input type='password' name='pwd' placeholder='Password' required />
				<input type='submit' name='submit' value='Login' />
			</form>
		</div>
	</section>

	<section class='footer'>
		
	</section>

</body>
</html> <?php } exit ?>