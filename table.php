<?php include("header.php"); ?>

<?php 
/* Submit post */
	if (isset($_POST['postSubmit'])) {
		$content = mysqli_real_escape_string($con, $_POST['postArea']);
		
		$query = "INSERT INTO posts (user_id, content, date) VALUES ('$id', '$content', now())";
	}
	if (mysqli_query($con, $query)) {
				$flag = 1;
			} else {
				$flag=0;
			}
/*Show posts */


?>

<div class="container" id="main-container">

<form id="postTable" method="post" action="">

	<textarea id="postArea" name="postArea"  placeholder="<?php echo $firstName; ?>, co słychać u Ciebie ?" required></textarea>
	<button type="submit" name="postSubmit" class="btn btn-primary ">Zapisz</button>

</form>

<div class="allposts">Wszystkie posty : </div>
<br>

<?php 
	$query = "SELECT firstname, lastname, content, date FROM posts, users WHERE users.id = user_id ORDER BY date desc;";
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

			echo "<hr>";
			
  }
	
?>
</div>

</div>


<?php include("footer.php"); ?>