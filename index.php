<?php
ob_start();
session_start();

if (array_key_exists("id", $_SESSION)) {
	
	header("Location: home.php");
	
}

if(isset($_POST['submit'])){
	include("connect.php");
	
	if ($_POST['registerActive'] == 1) {
		include("register.php");
	}
	else if (($_POST['registerActive'] == 0)) {
	include("login.php");
	}
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<title>CONNECT</title>
	
		<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
<link rel="manifest" href="images/icon/manifest.json">
<meta name="theme-color" content="#ffffff">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Jura&7Lato" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		  
	<!--Stylesheet-->
	 <link rel="stylesheet" href="style.css">
	 


</head>
<body>

<div class="se-pre-con"></div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
        integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
		 crossorigin="anonymous"></script>
   

	<div id="large-header" class="large-header">
<canvas id="demo-canvas"></canvas>

					
<div id="mainContainer" class="container">
		

    <div id="header" class="row  justify-content-md-center text-center">
        <div class="col-md-12 text-center">
            <h1 class="display-4"><img src="images/logo.png" id="logo" alt="logo">ONNECT<sup id="reg">&reg;</sup></h1>
        </div>
    </div>

    <br>
	
	<div id="alert">
	<?php
	if(isset($message)){
	echo $message;
	}
	?>
	</div>

    <form method="post" action="#" id="login" >

        <input type="hidden" id="registerActive" name="registerActive" value="0">
		
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="E-mail" autofocus required>
        </div>

        <div class="form-group">
            <input type="text" class="hide form-control" id="firstName" name="firstName" aria-describedby="firstName" placeholder="Imię" >
        </div>

        <div class="form-group">
            <input type="text" class="hide form-control" id="lastName" name="lastName" aria-describedby="lastName" placeholder="Nazwisko" >
        </div>

        <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło" required>
        </div>

        <div class="form-group row justify-content-md-center">
			<div class="col-12 text-center">
            <button id="loginButton" type="submit" name="submit" class="btn btn-primary">Zaloguj się</button>
			</div>
        </div>

        <div class="bottomText row justify-content-md-center">
            <div class="col-12 text-center">
                <br>
                <div id="paragraph" class="lead">Pierwszy raz na <span class="logo-color"> CONNECT </span> ?</div>
                <p id="toggleLink" class="toggleLinkRegister">Zarejestruj się</p>
				<hr>
            </div>
        </div>
    </form>
</div>
<p class="footer">&copy; 2020 Piotr Wasak</p>
</div>

<script type="text/javascript">

$("#toggleLink").click(function() {

    if ( $("#registerActive").val() == 0 ) {
        $("#registerActive").val("1");
        $("#loginButton").html("Zarejestruj się");
        $("#loginButton").removeClass("btn-primary");
        $("#firstName").removeClass("hide");
        $("#lastName").removeClass("hide");
        $("#loginButton").addClass("btn-success");
        $("#paragraph").html('Masz już konto w <span class="logo-color"> CONNECT </span> ?');
        $("#toggleLink").html("Zaloguj się");
		$("#toggleLink").removeClass("toggleLinkRegister");
		$("#toggleLink").addClass("toggleLinkLogin");
		$("#firstName").attr("required", true);
		$("#lastName").attr("required", true);


    }
    else {
        $("#registerActive").val("0");
        $("#loginButton").html("Zaloguj się");
        $("#loginButton").removeClass("btn-success");
        $("#firstName").addClass("hide");
        $("#lastName").addClass("hide");
        $("#loginButton").addClass("btn-primary");
        $("#paragraph").html('Pierwszy raz na <span class="logo-color"> CONNECT </span> ?');
        $("#toggleLink").html("Zarejestruj się");
		$("#toggleLink").removeClass("toggleLinkLogin");
		$("#toggleLink").addClass("toggleLinkRegister");
		$("#firstName").attr('required',false);
		$("#lastName").attr("required", false);


    }

});

</script>

		<script src="js/TweenLite.min.js"></script>
		<script src="js/EasePack.min.js"></script>
		<script src="js/rAF.js"></script>
		<script src="js/demo-1.js"></script>
		
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>


	<script type="text/javascript">
	$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<?php include("footer.php"); ?>