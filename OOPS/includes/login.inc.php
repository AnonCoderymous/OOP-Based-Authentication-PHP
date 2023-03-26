<?php
	session_start();
	if($_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset($_POST[ 'submit' ])) {

		require_once '../classes/authentication.class.php';

		extract($_POST);

		$loginObj = new LoginFunc($username, $pwd);

		if($loginObj->isEmptyLogin()===FALSE){
			die('
				<script>alert(\'Please enter all fields !\');</script>
			');
		}

		if($loginObj->checkUserExists()!==0){
			$_SESSION[ 'isLoggedIn' ] = TRUE;
			$_SESSION[ 'loggedInUser' ] = $username;
			header('location: ../main');
		}else{
			die('
				<script>
					alert(\'User does not exists with that email.\');
					window.location.href = \'../../OOPS\';
					return false;
				</script>
			');
		}

		echo $loginObj->checkUserExists();

	}else{
		header('location: ../../OOPS');
	}

	exit;
?>