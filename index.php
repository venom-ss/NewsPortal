
<?php require_once("includes/header.php") ?>
		<script>
			$(document).ready(function(){
				$(".slider-item img").click(function(){
					$(".slider-wrap img").attr("src",$(this).attr("src"));
				});
			});
		</script>
		<div class="slider-wrap">
			<img src="http://www.brainpool.de/var/brainpool/storage/images/unternehmen/brainpool-live-entertainment-gmbh/strategie/kopfgrafik-blive-strategie/80883-1-ger-DE/Kopfgrafik-BLIVE-Strategie_header_image.jpg" alt="">
			<div class="slider-text"><span>Lorem ipsum</span><br><span>Lorem ipsum dolor sit</span></div>
		</div>
		<div class="items-line"></div>
		<div class="slider-items">
			<div class="slider-item">
				<img src="http://www.brainpool.de/var/brainpool/storage/images/unternehmen/brainpool-tv-gmbh/geschaeftsfuehrung/kopfgrafik-geschaeftsfuehrung/63603-1-ger-DE/Kopfgrafik-Geschaeftsfuehrung_header_image.jpg">
			</div>
			<div class="slider-item">
				<img src="http://www.brainpool.de/var/brainpool/storage/images/programme/buehnenshows/patric-heizmann-live!-ich-bin-dann-mal-schlank/patric-heizmann-live!-ich-bin-dann-mal-schlank/64167-1-ger-DE/Patric-Heizmann-live!-Ich-bin-dann-mal-schlank_header_image.jpg">
			</div>
			<div class="slider-item">
				<img src="http://www.emailmonks.com/blog/wp-content/uploads/2016/04/Full-Size.jpg">
			</div>
			<div class="slider-item">
				<img src="http://www.viking-sport.de/wp-content/uploads/2015/09/slide1.jpg">
			</div>
			<div class="cls"></div>
		</div>
		<?php  
			$cat_q = mysql_query("SELECT * FROM categories LIMIT 4");
			$i = 0;
			$class = "";
			while($cat = mysql_fetch_assoc($cat_q)){
				$i++;
				if($i==4){
					$class = "last-child";
				}
				else{
					$class = "";
				}
				$news_cat_q = mysql_query("SELECT * FROM news_cat WHERE category_id={$cat['id']} ORDER BY id DESC");
				$news_cat = mysql_fetch_assoc($news_cat_q);

				$news_q = mysql_query("SELECT * FROM news WHERE id={$news_cat['news_id']}");
				$news = mysql_fetch_assoc($news_q);

				echo 
					"
					<div class='article-category ".$class."'>
						<div class='category-inner'>
							<h3><span>{$cat['category']}</span><br><span>News</span></h3>
							<div class='category-img'>
								<img src='{$news['img']}' alt=''>
							</div>
							<p>{$news['title']}</p>
							<a href='article.php?article={$news['id']}'>Read More</a>
						</div>
					</div>
					";
				
			}
		?>		
		<div class="cls"></div>
		<div class="about">
		<?php  
			$about_q = mysql_query("SELECT * FROM contact WHERE contact_type='about'");
			$about = mysql_fetch_assoc($about_q);

		?>
			<h4>A little bit<br><span>about our portal</span></h4>
			<p><?php echo $about["info"]; ?></p>
			<ul>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<div class="cls"></div>
			</ul>
			<ul>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
				<li><a href="#">Lorem ipsum dolor</a></li>
			</ul>
			<div class="cls"></div>
			<a href="#">მეტი</a>
		</div>
		<div class="latest-news">
			<h4>Latest news</h4>
			<div class="article">
				<div class="article-img"><a href="#"><img src="https://m1global.tv/uploads/catalogimages/event_fights/photo/18226_fight03.jpg" alt=""></a></div>
				<div class="latest-news-info">
					<p class="date">05.12.2016</p>
					<p class="text"><a href='#'>Lorem ipsum dolor sit amet, consectetur</a><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste a, doloribus ipsam ipsa?&nbsp;&nbsp;<a href="#"><img src="img/list.png"></a></p>
				</div>
				<div class="cls"></div>
			</div>
			<div class="article">
				<div class="article-img"><a href="#"><img src="http://static1.bigstockphoto.com/thumbs/5/0/1/small2/105622931.jpg" alt=""></a></div>
				<div class="latest-news-info">
					<p class="date">05.12.2016</p>
					<p class="text"><a href='#'>Lorem ipsum dolor sit amet, consectetur</a><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste a, doloribus ipsam ipsa?&nbsp;&nbsp;<a href="#"><img src="img/list.png"></a></p>
				</div>
				<div class="cls"></div>
			</div>
			<div class="article">
				<p class="text"><span class="date">05.12.2016</span><a href="#">Lorem ipsum dolor sit amet, consectetur</a></p>
			</div>
			<div class="article">
				<p class="text"><span class="date">05.12.2016</span><a href="#">Lorem ipsum dolor sit amet, consectetur</a></p>
			</div>
			<div class="article">
				<p class="text"><span class="date">05.12.2016</span><a href="#">Lorem ipsum dolor sit amet, consectetur</a></p>
			</div>
			<a href="news.php">ყველა სიახლე</a>
		</div>
		<div class="cls"></div>
	
	<?php require_once("includes/footer.php") ?>
