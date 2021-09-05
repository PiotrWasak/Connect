<?php ob_start(); ?>
<?php session_start(); ?>


<?php 
	
	if (array_key_exists("id", $_SESSION)) {
		include("connect.php");
		
		$id = $_SESSION['id'];
		
		$query = "SELECT * FROM users WHERE id = $id LIMIT 1";
		$result = mysqli_query($con, $query);
		
		$row = mysqli_fetch_array($result);
		
		
		$email= $row['email'];
		$firstName = $row['firstname'];
		$lastName = $row['lastname'];		
	} else {
		// header("Location: index.php");
	}
	
	if (!$firstName) {
		//header("Location: index.php");
	}
	
	?>
	

<!DOCTYPE html>
<html lang="pl">
<head>

	<title>CONNECT</title>
	
    <!-- Fontello -->
    <link rel="stylesheet" href="fontello/css/fontello.css" type="text/css" />

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
    <link href="https://fonts.googleapis.com/css?family=Jura|Lato&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		  
	<!--Stylesheet-->
	 <link rel="stylesheet" href="styles.css">


</head>
<body>

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
		
		<!-- Main Navbar -->
		<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse" style="background-color: #446A95;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <ul class="navbar-nav mr-auto">
  <a class="navbar-brand"  id="navbar-brand" href="home.php"><img id="logo" src="images/logo.png" alt="logo">ONNECT</a>
	  </ul>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav mr-auto">
	         <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
        <div class="input-group">
      <span class="input-group-addon" id="search-icon"><i class="icon-search"></i></span>
      <input id="search" name="search" type="text" class="form-control" placeholder="Search" aria-describedby="search-icon">
    </div>
    </form>
	</ul>
	    <ul class="navbar-nav mr-auto">
		 <div class="nav-item dropdown">
        <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $firstName ?> <i class="icon-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">Mój profil</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal">Edytuj</a>
				<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Wyloguj</a>
        </div>
      </div>
    </ul>

  </div>
</nav>

<div id="sidebar" class="container">
	<div class="row">
		<div class="col">
			<a href="myprofile.php" class="sidebar-link"><i class="icon-home"></i> Mój profil</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="table.php" class="sidebar-link"><i class="icon-align-left"></i> Tablica</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="#" class="sidebar-link"><i class="icon-mail-alt"></i> Wiadomości</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="friends.php" class="sidebar-link"><i class="icon-users"></i> Znajomi</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="news.php" class="sidebar-link"><i class="icon-news"></i> Wydarzenia</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="notes.php" class="sidebar-link"><i class="icon-sticky-note"></i> Notes</a>
		</div>
	</div>	
	<div class="row">
		<div class="col">
			<a href="weather.php" class="sidebar-link"><i class="icon-cloud-sun-inv"></i> Moja pogoda</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<a href="#" class="sidebar-link"><i class="icon-gamepad"></i> Gry</a>
		</div>
	</div>	
</div>

		
		   
		   

<!-- Modal Mój profil -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zalogowano jako: <?php echo " $firstName $lastName."?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Twój e-mail: <?php echo "$email" ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edytuj-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zalogowano jako: <?php echo " $firstName $lastName.";?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<?php echo "$firstName,  jeszcze nie możesz edytować swojego profilu!" ;?>
      </div>
    </div>
  </div>
</div>