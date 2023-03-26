<?php

	require_once 'config.class.php';

	class Main {

		//Properties..
		private $username;
		private $email;
		private $password;
		private $passwordRepeat;

		//Methods..
		public function __construct($username, $email, $password, $passwordRepeat) {
			global $conn;

			$this->username = $conn->real_escape_string($username);
			$this->email = $conn->real_escape_string($email);
			$this->password = $conn->real_escape_string($password);
			$this->passwordRepeat = $conn->real_escape_string($passwordRepeat);
		}

		public function isEmpty() {
			if(empty($this->username)
			|| empty($this->email)
			|| empty($this->password)
			|| empty($this->passwordRepeat)) {
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function validUsername() {
			if(!preg_match('/^[a-zA-Z][0-9a-zA-Z_]{2,8}[0-9a-zA-Z]$/', $this->username)){
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function validEmail() {
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function pwdCheck() {
			if($this->password !== $this->passwordRepeat) {
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function pwdStrength() {
			if(strlen($this->password)<8) {
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function insertData() {

			global $conn;

			$stmt = $conn->prepare('INSERT INTO `oops`(`uid`, `username`, `email`, `pwd`) VALUES (?,?,?,?)');
			$stmt->bind_param('isss', $uid , $username, $email, $password);
			$uid=rand(1000, 1500);
			$username=$this->username;
			$email=$this->email;
			$password=$this->password;
			$stmt->execute();
			$stmt->close();

			return TRUE;
		}

		public function __destruct() {
			global $conn;
			$conn->close();
		}

	}

	class LoginFunc extends Main {
		public function __construct($username, $password) {
			global $conn;

			$this->username = $conn->real_escape_string($username);
			$this->password = $conn->real_escape_string($password);
		}

		public function isEmptyLogin() {
			if(empty($this->username) || empty($this->password)){
				return FALSE;
			}else{
				return TRUE;
			}
		}

		public function checkUserExists() {
			global $conn;
			$loginstmt = $conn->prepare('SELECT * FROM `oops` WHERE username=? AND pwd=?');
			$loginstmt->bind_param('ss', $username, $password);
			$username=$this->username;
			$password=$this->password;
			$loginstmt->execute();
			$loginstmt->store_result();
			$count=$loginstmt->num_rows;
			$loginstmt->close();
			return $count;
		}

		public function __destruct() {
			global $conn;
			$conn->close();
		}
	}
?>