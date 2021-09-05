<?php include("header.php"); ?>

<div class="container" id="main-container">

<?php 
	if(isset($_POST['search']))
	{	
		 $search = $_POST['search'];
		 
		 $query = "SELECT firstname, lastname FROM users WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' ;";
		 $result = mysqli_query($con, $query);
		 echo "Wyszukiwanie dla '$search' <br>";
		 echo "Użytkownicy: <br> ";
		 while($row = mysqli_fetch_assoc($result)) {
			 echo $row['firstname'];
			 echo " ";
			 echo $row['lastname'];
			 echo "<br>";
		 }
		 
		 $query = "SELECT firstname, lastname, content FROM users, posts WHERE users.id = user_id AND content LIKE '%$search%';";
		 $result = mysqli_query($con, $query);
		 echo "Posty: <br>";
		 while($row = mysqli_fetch_assoc($result)) {
			 echo $row['firstname'];
			 echo " ";
			 echo $row['lastname'];
			 echo "<br>";
			 echo $row['content'];
			 echo "<br>";
		 }
	}
		  
	
?>

</div>

<?php include("footer.php"); ?>