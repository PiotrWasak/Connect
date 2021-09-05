<?php include("header.php"); ?>

<?php
$alert="";

if (isset($_POST['notesSubmit'])) {

	$content = mysqli_real_escape_string($con, $_POST['notesTextArea']);
	
	$query = "SELECT * FROM notes WHERE user_id = '$id'  LIMIT 1";
	$result = mysqli_query($con, $query);
	

	
	if (mysqli_num_rows($result) > 0) {
		 $query = "UPDATE notes
			SET content = '$content'
			WHERE user_id = $id;";
			if (mysqli_query($con, $query)) {
				$flag = 1;
			} else {
				$flag=0;
			}
			
	 } else {
			$content = $_POST['notesTextArea'];
			$query = "INSERT INTO notes (user_id, content) VALUES ('$id', '$content')";
			if (mysqli_query($con, $query)) {
				$flag = 1;
			} else {
				$flag=0;
			}
	}
	/*If could't be saved */
	if ($flag == 0) {
		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> <strong>Notatka nie mogła być zapisana.</strong></div>';
	} /*If saved succesfully*/
	else if ($flag == 1) {
		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button> <strong>Zapisano.</strong></div>';
	}
}



	$query = "SELECT * FROM notes WHERE user_id = '$id'  LIMIT 1";
	$row = mysqli_fetch_array (mysqli_query($con, $query));
	$textAreaContent =  $row[2];
	
	
	
?>

<div class="container" id="main-container">

<form id="notesForm" method="post" action="">
	<div class="row justify-content-md-center text-center">
		<div class="col-5"><h2>Notes</h2></div>
		<div class="col-5"><button type="submit" name="notesSubmit" class="btn btn-primary ">Zapisz</button></div>
	</div>
			<div class="row justify-content-md-center text-center">
					<div class="col-10">
						<?php echo $alert ?>
					</div>
				</div>
		<textarea id="notes" name="notesTextArea" class="form-control"><?php echo $textAreaContent; ?></textarea>
	</form>
</div>




<?php include("footer.php"); ?>