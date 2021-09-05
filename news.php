<?php include("header.php"); ?>



 <div class="container" id="main-container">
 
 <h1 class="col-md-12 text-center">Najciekawsze wiadomości ze świata</h1>
 <br>
 
<?php 



 $urlContents = @file_get_contents("https://newsapi.org/v1/articles?source=google-news&sortBy=top&apiKey=41c9633f5adc4c3ea8396280ea6aade0");
 $newsArray =  json_decode($urlContents, true);
 
 if($newsArray['status'] == 'ok') {
	for ($i = 0; $i < sizeof($newsArray['articles']); $i++)
	{
		$title = $newsArray['articles'][$i]['title'];
		$description = $newsArray['articles'][$i]['description'];
		$url = $newsArray['articles'][$i]['url'];
		$urlToImage = $newsArray['articles'][$i]['urlToImage'];
		$publishedAt = $newsArray['articles'][$i]['publishedAt'];
		
		echo '<hr>';
		echo '<div class="news">';
		echo '<h2><strong>'.$title.'</strong></h4>';
		echo '<p>'.$description.'</p>';
		echo '<a style="float:right;" target="_blank" href="'.$url.'">Read more...</a>';
		echo '<div style="clear:both;"></div>';
		echo '<a target="_blank" href="'.$url.'">';
		echo '<img class="news-image" src="'.$urlToImage.'">';
		echo '</a>';
		echo '</div>';
		echo "<br>";
		
	}
 }
 
?>
 
</div>


<?php include("footer.php"); ?>