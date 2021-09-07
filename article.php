<?php require_once("includes/header.php") ?>
<div " class="news-left">
	<h4>left</h4>
	<article>
		<?php  
			$article = mysql_fetch_assoc(mysql_query("SELECT * FROM news WHERE id={$_GET['article']}"));
			echo "<h4 class='full-article-title'>{$article['title']}</h4>";
			echo "<img src='{$article['img']}'>";
			echo "<p>{$article['text']}</p>";

		?>		
	</article>
		<?php  
		$catID_q = mysql_query("SELECT * FROM news_cat where news_id={$_GET['article']}");
		$catID = mysql_fetch_assoc($catID_q);

		$cat_q = mysql_query("SELECT * FROM categories WHERE id={$catID['category_id']}");
		$cat = mysql_fetch_assoc($cat_q);
		?>
		<ul class="article-info">
			<li class="full-article-category">
				<a href="#">
					<?php echo $cat['category_ka']; ?>
				</a>
			</li>
			<li class="full-article-date">
				<?php echo date("F j, Y",strtotime($article['date'])); ?>
			</li>
			<li class="full-article-autor">
				<a href="#">
					<?php echo $article['autor']; ?>
				</a>
			</li>
			<li class="full-article-comm">
				<a href="#">
					no comments
				</a>
			</li>
			<div class="cls"></div>
		</ul>
		
	<div class="article-autor">
		<h3>writen by <?php echo $article['autor']; ?></h3>
		<div class="article-autor-img">
			<img src="img/autor_img.png" alt="">
		</div>
		<div>
			view all posts by <a href="#"><?php echo $article['autor']; ?></a>
		</div>
		<div class="cls"></div>
	</div>
	<div class="cls"></div>

	<div class="comm-cont">
		
		<?php  
			$comm_q = mysql_query("SELECT * FROM comments WHERE article_id={$_GET['article']} ");
			$num = mysql_num_rows($comm_q);
			echo "
			<h3>
				{$num} responses
			</h3>";

			
			while($comm = mysql_fetch_assoc($comm_q)){
				$usrpic_q = mysql_query("SELECT * FROM users WHERE name='{$comm['autor']}'");
				if(mysql_num_rows($usrpic_q)!=0){
					$usrpic = mysql_fetch_assoc($usrpic_q);
					$pic = $usrpic['profile_img'];
				}
				else{
					$pic = "img/autor_img.png";
				}

				echo 
				"
				<div class='comment'>
					<div class='comment-left'>
						<div class='comment-autor-img'>
							<img src='{$pic}'>
						</div>
						<div class='comment-autor'>
							{$comm['autor']}
						</div>
					</div>
					<div class='comment-right'>
						<p>{$comm['comment']}</p>
						<div class='comment-date'>".date('F j, Y',strtotime($comm['date']))."</div>
						<div class='cls'></div>
					</div>
					<div class='cls'></div>
				</div>

				";
			}

		?>
		
		
	</div>

	<div class="comment-form">
		<h3>Leave a comment</h3>
		<form method="POST" action="includes/comment.php">
		<?php  
			if(!isset($_SESSION['name'])){

			
		?>
			<input type="text" name="name" id="" required placeholder="Name*">
			<input type="email" name="email" id="" required placeholder="E-mail(Will Not Published)*">
		<?php } else{
			$user_q = mysql_query("SELECT * FROM users WHERE name='{$_SESSION['name']}'");
			$user = mysql_fetch_assoc($user_q);
		?>
			<input type="hidden" name="name" id="" required value="<?php echo $user['name'] ?>">
			<input type="hidden" name="email" id="" required value="<?php echo $user['email'] ?>">
			
		<?php  }?>
			<textarea name="comment" id="" cols="30" required rows="10" placeholder="Your Comment*"></textarea>
			<input type="hidden" name="article_id" value="<?php echo $_GET['article']; ?>">
			<input type="submit" name="" id="" value="Submit Comment">

		</form>
	</div>

</div>




<?php require_once("sidebar.php"); ?>
<div class="cls"></div>


<?php require_once("includes/footer.php") ?>