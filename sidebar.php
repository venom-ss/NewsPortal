<div class="news-right">
	<h4>კატეგორიები</h4>
	<ul>
	<?php  
	$cat = mysql_query("SELECT * FROM categories");
	while ($row = mysql_fetch_assoc($cat)) {
		echo "<li><a href='news.php?category={$row['id']}'>{$row['category_ka']}</a></li>";
	}

	?>
		
	</ul>
</div>