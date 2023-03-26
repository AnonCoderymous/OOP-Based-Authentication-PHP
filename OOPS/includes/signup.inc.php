<?php
	session_start();
	if($_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset($_POST[ 'submit' ])) {

		require_once '../classes/authentication.class.php';

		extract($_POST);

		$signupObj = new Main($username, $email, $pwd, $pwdrepeat);

		if($signupObj->isEmpty()===FALSE){
			die('
				<script>alert(\'Please enter all fields !\');
				window.location.href = \'../../OOPS\';</script>
			');
		}

		if($signupObj->validUsername()===FALSE){
			die('
				<script>alert(\'Username is invalid. It can contain only numbers and letter !\');
				window.location.href = \'../../OOPS\';</script>
			');
		}

		if($signupObj->validEmail()===FALSE){
			die('
				<script>alert(\'Invalid Email. Please check your email !\');
				window.location.href = \'../../OOPS\';</script>
			');
		}

		if($signupObj->pwdCheck()===FALSE){
			die('
				<script>alert(\'Password and confirm password do not match !\');
				window.location.href = \'../../OOPS\';</script>
			');
		}

		if($signupObj->pwdStrength()===FALSE){
			die('
				<script>alert(\'Password should be atleast 8 characters long.\');
				window.location.href = \'../../OOPS\';</script>
			');
		}

		if($signupObj->insertData()===TRUE) {
			echo '
				<script>
					(Thank you for Signing up!);
					window.location.href = \'../../OOPS\';
				</script>';
		}

	}else{
		header('location: ../../OOPS');
	}

	exit;
?>