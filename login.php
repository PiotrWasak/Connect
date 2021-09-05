<?php
	ob_start();
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$userPassword = mysqli_real_escape_string($con, $_POST['password']);
	$password = md5(md5($userPassword));
	
	$query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	
	if ($_POST['email'] && $_POST['password']) {
	
		if ($row['password'] == $password) {
			$_SESSION['id'] = $row['id'];
			header("Location: home.php");
			
		} else {
			if ($row['email'] == $email){
			$message = '<div class="alert alert-warning" role="alert">Nieprawidłowe hasło.</div>';
			} else {
			$message = '<div class="alert alert-warning" role="alert">Nie znaleziono użytkownika o podanym adresie e-mail</div>';
			}
		}
	} else {
			$message = '<div class="alert alert-warning" role="alert">Wprowadż e-mail oraz hasło</div>';	
	}
	
	?>