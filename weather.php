<?php include("header.php"); ?>

<!-- Current Date -->
<?php 

$tommorowDay = mktime(16, 0, 0, date("m") , date("d")+1, date("Y"));



?>

<!-- Current Weather -->
<?php

$alert= "";

if ( isset ($_POST["city"]) ) {
	
	$urlContents = @file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['city']."&appid=1a40f9ac7f8075bc7f41f995757cea79&lang=pl&units=metric");
		
	$weatherArray = json_decode($urlContents, true);
	
		if ( isset($weatherArray['name'])) {
	
	$city = $weatherArray['name'];
	$country = $weatherArray['sys']['country'];
	$clouds = $weatherArray['clouds']['all'];
	$description = $weatherArray['weather'][0]['description'];
	$temperature = round($weatherArray['main']['temp']);
	$icon = $weatherArray['weather']['0']['icon'];
	$pressure = round($weatherArray['main']['pressure']);
	$humidity = $weatherArray['main']['humidity'];
	$wind =  round(($weatherArray['wind']['speed']) * 3.6);
	
	$lon = $weatherArray['coord']['lon'];
	$lat = $weatherArray['coord']['lat'];
	 
	$alert = 
				'<div id="weatherAlert" class="weatherAlert container">
				<div class="row justify-content-md-center">
				<div class="bold h5 col-sm-10">Aktualna pogoda w: '.$city.' ('.$country.')  : </div> <div class="col-2"><img id ="weatherImage" src="http://openweathermap.org/img/w/'.$icon.'.png"></div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Krótki opis : </div> <div class="col-sm-5">'.$description.'</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Temperatura : </div> <div class="col-sm-5">'.$temperature.'&#8451;</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Zachmurzenie : </div> <div class="col-sm-5">'.$clouds.'%</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Wilgotność : </div> <div class="col-sm-5">'.$humidity.'%</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Ciśnienie : </div> <div class="col-sm-5">'.$pressure.' hPa</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Wiatr : </div> <div class="col-sm-5">'.$wind.' km/h</div>
			</div>
			</div>';
	 
		} else {
			$alert = '<div class="alert alert-danger" role="alert">Nie znaleziono takiego miasta.</div>';
		}
}
?>

 <div class="container" id="main-container">
	<div class="row justify-content-md-center">
		<div clas="col-sm-10"><h2>Sprawdź pogodę </h2></div>
	</div>
	<div class="row justify-content-md-center">
		<div clas="col-sm-10"><p class="lead text-muted">W dowolnym miejscu na całym swiecie.</p></div>
	</div>
	
	<form method="post" action="">
	  <div class="form-group row justify-content-md-center text-center">
		 <label for="inputCity" class="col-4 col-form-label">Wpisz nazwę miasta:</label>
		<input id="inputCity" class="form-control col-6" id="input" name="city" placeholder="np. Gdynia, Londyn" value="<?php if(isset($_POST["city"])) echo $_POST["city"]; ?>" required>
	  </div>
	  	  <div class="form-group row justify-content-md-center text-center">
				<div class="col"><button type="submit" name="submit" class="btn btn-primary">Zatwierdź</button></div>
			</div>
		</form>
		
	<?php 
	echo $alert; 
		?>
		
		<!-- Weather Forecast -->
<?php



	$urlForecastContents = @file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=".$_POST['city']."&appid=1a40f9ac7f8075bc7f41f995757cea79&lang=pl&units=metric");
		
	$forecastArray = json_decode($urlForecastContents, true);
		
	for ($i = 0; $i < sizeof($forecastArray['list']); $i++)
	{	
		/* Forecast for Tommorow */
		if ($forecastArray['list'][$i]['dt'] == $tommorowDay)
		{
		 $forecastClouds =  $forecastArray['list'][$i]['clouds']['all'];
		 $forecastDescription =  $forecastArray['list'][$i]['weather']['0']['description'];
		 $forecastTemp = round($forecastArray['list'][$i]['main']['temp']);
		 $forecastHumidity =  $forecastArray['list'][$i]['main']['humidity'];
		 $forecastPressure =  round($forecastArray['list'][$i]['main']['pressure']);
		 $forecastWind = (round($forecastArray['list'][$i]['wind']['speed'] * 3.6));
		 $forecastIcon = $forecastArray['list'][$i]['weather']['0']['icon'];
		}
	}
	if ( isset($weatherArray['name'])) {
	echo '<div id="forecastAlert" class="weatherAlert container">
				<div class="row justify-content-md-center">
				<div class="bold h5 col-sm-10">Pogoda na jutro w: '.$city.' ('.$country.')  : </div> <div class="col-2"><img id ="weatherImage" src="http://openweathermap.org/img/w/'.$forecastIcon.'.png"></div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Krótki opis : </div> <div class="col-sm-5">'.$forecastDescription.'</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Temperatura : </div> <div class="col-sm-5">'.$forecastTemp.'&#8451;</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Zachmurzenie : </div> <div class="col-sm-5">'.$forecastClouds.'%</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Wilgotność : </div> <div class="col-sm-5">'.$forecastHumidity.'%</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Ciśnienie : </div> <div class="col-sm-5">'.$forecastPressure.' hPa</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="bold col-sm-5">	Wiatr : </div> <div class="col-sm-5">'.$forecastWind.' km/h</div>
			</div>
			</div>';
	}

	
?>
		
<?php
if ( isset($weatherArray['name'])) {
	 echo '<div id="map"></div>';
}
 ?>

</div>



 <script>
	var lat = <?php echo $lat; ?>;
	var lng =  <?php echo $lon; ?>;

      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: lat, lng: lng},
          zoom: 9
        });
		 var marker = new google.maps.Marker({
          position: {lat: lat, lng: lng},
          map: map
        });
      }

    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjl7gtiwqXNNAtQbl_KVvHTQ_y4Qkj-yQ&callback=initMap"
    async defer></script>
	
<?php include("footer.php"); ?>