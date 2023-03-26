<?php
	session_start();
	if(isset($_SESSION[ 'isLoggedIn' ]) AND isset($_SESSION[ 'loggedInUser' ])){
		echo 'Welcome '.$_SESSION['loggedInUser'];
		echo '<br/>';
		echo '<a href=\'logout.php\'>Logout</a>';
	}else{
		echo 'Please <a href=\'../../oops\'>login</a> to view content.';
	}

	exit
?>