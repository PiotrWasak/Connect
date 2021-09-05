<?php include("header.php"); ?>

<div class="container" id="main-container">

<?php 
	$query = "SELECT firstname, lastname, content, date FROM posts, users WHERE users.id = user_id AND user_id=$id ORDER BY date desc;";
	$result = mysqli_query($con, $query);
  while($row = mysqli_fetch_assoc($result)) {
			$date = date_create($row['date']);
			
			
			echo $row['firstname'];
			echo " ";
			echo $row ['lastname'];
			echo "<br>";
			echo date_format($date, 'Y-m-d H:i:s');
			echo "<br>";
            echo $row['content'];
			echo "<br><br>";
			
  }
	
?>

</div>


<?php include("footer.php"); ?>