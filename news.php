<?php require_once("includes/header.php"); ?>
<div class="news-left">
<?php  if(isset($_GET["category"])){
	$cat_q = mysql_query("SELECT category_ka FROM categories WHERE id='{$_GET['category']}'");
	$cat = mysql_fetch_assoc($cat_q);
}	 



?>
<h4>კატეგორია: <?php echo isset($_GET['category'])?$cat["category_ka"]:"ყველა"; ?></h4>
<?php
if(isset($_GET["category"])){


	$news = mysql_query("SELECT * FROM news_cat WHERE category_id={$_GET['category']}");

	while($r = mysql_fetch_assoc($news)){
		$news_q = mysql_query("SELECT * FROM news WHERE id={$r['news_id']}");
		$row = mysql_fetch_assoc($news_q);
		if($row["visibility"]==0 || $row["trash"]==1){
			continue;
		}

		echo "<article>
		<h4><a href='article.php?article={$row['id']}'>{$row['title']}</a></h4>
		<div class='article-img'><a href='article.php?article={$row['id']}'><img src='{$row['img']}'></a></div>
		<div class='article-right'><p>{$row['text']}</p>
		<a class='article-but' href='article.php?article={$row['id']}'>მეტი</a></div><div class='cls'></div>
		</article>";
	}


}else{
	$news = mysql_query("SELECT * FROM news WHERE trash=0 AND visibility=1 ORDER BY date DESC ");
	while($row = mysql_fetch_assoc($news)){
		echo "<article>
		<h4><a href='article.php?article={$row['id']}'>{$row['title']}</a></h4>
		<div class='article-img'><a href='article.php?article={$row['id']}'><img src='{$row['img']}'></a></div>
		<div class='article-right'><p>{$row['text']}</p>
		<a class='article-but' href='article.php?article={$row['id']}'>მეტი</a></div><div class='cls'></div>
		</article>";
	}
}  



?>
</div>
<?php require_once("sidebar.php"); ?>
<div class="cls"></div>
<?php require_once("includes/footer.php"); ?>