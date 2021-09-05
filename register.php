<?php
 
 $error = '';
 
 if (!$_POST['email'])  {
	$error .= 'Adres e-mail jest wymagany.<br>';
}
 
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$error .= 'Nieprawidłowy adres e-mail<br>';
}
 
if (!$_POST['firstName'])  {
	$error .= 'Imię jest wymagane<br>';
}
else if ( strlen($_POST['firstName']) <2 ) {
		$error .= 'Imię musi mieć co najmniej 2 znaki.<br>';
}
		
if (!$_POST['lastName'])  {
	$error .= 'Nazwisko jest wymagane<br>';
}
else if ( strlen($_POST['lastName']) <2) {
	$error .= 'Nazwisko musi mieć co najmniej 2 znaki.<br>';
}
		
if (!$_POST['password'])  {
	$error .= 'Hasło jest wymagane<br>';
}

else if ( strlen($_POST['password']) <4 ) {
		$error .= 'Hasło musi mieć co najmniej 4 znaki.<br>';
}

if ($error == "") {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$userPassword = mysqli_real_escape_string($con, $_POST['password']);
	$password = md5(md5($userPassword));
	
	$query = "SELECT * FROM users WHERE email = '$email'  LIMIT 1";
	$result = mysqli_query($con, $query);
	 
	 if (mysqli_num_rows($result) > 0) {
		 $error = "Istnieje użytkownik o podanym adresie e-mail";
	 }
	 else {
		 
		 $query = "INSERT INTO users (email, firstname, lastname, password) VALUES ('$email', '$firstName', '$lastName', '$password')";
		 
			 if (mysqli_query($con, $query)) {
							
							$_SESSION['id'] = mysqli_insert_id($con);
							$message = '<div class="alert alert-success" role="alert"><strong>Zarejestrowałeś się!</strong> Możesz się zalogować. Na Twoje konto został wysłany e-mail powitalny !</div>';
							
							$emailTo = "$email";
							$subject = "Rejestracja w CONNECT";
							$body = "Dzień dobry $firstName, \n Twoje konto w CONNECT zostało pomyślnie zarejestrowane. \n Życzę Ci miłego dnia  \n Pozdrawiam" ;
							$headers = "From: kontakt@piotrwasak.eu";

							mail($emailTo, $subject, $body, $headers);
		   } else {
							
							$error = "Wystąpił błąd  - spróbuj ponownie później.";
							
						}	
            }
			
}

if ($error != "") {
	$message = '<div class="alert alert-warning" role="alert">'.$error.'</div>';
}

?>