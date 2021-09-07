<?php 
	require_once("includes/db.php"); 
	session_start();
	

	$_SESSION['url'] = $_SERVER['REQUEST_URI'];	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NEWS Portal</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgfA0FNQtgEWxKzbw5LlTV_0KN_wjCWs0&callback=initMap"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
<div class="reg-form-overflow">
	<div class="form-wrapper">
		<div id="reg-close">X</div>
		<form action="includes/reg.php" method="POST"  autocomplete="off">
			<input type="text" name="user" placeholder="სახელი"><br>
			<input type="email" name="email" placeholder="E-mail"><br>
			<input type="password" name="pass" placeholder="პაროლი"><br>
			<input type="submit" name="reg" value="რეგისტრაცია">
				<script>
					$(document).ready(function(){
						$("#reg").click(function(){
							$(".reg-form-overflow").css({display: "block"});
						});
						$("#reg-close").click(function(){
							$(".reg-form-overflow").css({display: "none"});
						});
					});
				</script>
		</form>
	</div>
</div>
<div class="login-form-overflow">
	<div class="form-wrapper">
		<div id="login-close">X</div>
		<form action="includes/login.php" method="POST" autocomplete="off">
			<input type="email" name="email" placeholder="E-mail"><br>
			<input type="password" name="pass" placeholder="პაროლი"><br>
			<input type="submit" name="reg" value="ავტორიზაცია">
				<script>
					$(document).ready(function(){
						$("#login").click(function(){
							$(".login-form-overflow").css({display: "block"});
						});
						$("#login-close").click(function(){
							$(".login-form-overflow").css({display: "none"});
						});
					});
				</script>
		</form>
	</div>
</div>
	<div class="header-top">
		<div class="header-top-inner">
			<ul>
				<?php 
					if(!isset($_SESSION["name"])){
						echo 
						"
						<li><a id='reg' href='#'>Register</a></li>
						<li><a id='login' href='#'>Login</a></li>

						";
					}
					else{
						$user_q = mysql_query("SELECT * FROM users WHERE name='{$_SESSION['name']}'");
						$user = mysql_fetch_assoc($user_q);

						echo 
						"
							<li><a href='profile.php?profile_id={$user['id']}'>{$_SESSION["name"]}</a></li>	
							<li><a href='includes/logout.php'>log out</a></li>
						";
					}
				?>
				
				<li><a href="#">Entries RSS</a></li>
				<li><a href="#">Comments RSS</a></li>
				<li><a href="admin/">Administration</a></li>
				<div class="cls"></div>
			</ul>
			<div class="cls"></div>
		</div>
	</div>
	<div class="all">
		<header>
			<h1>
				<a href="index.php">
					news <span>portal</span>
				</a>
			</h1>
			<div class="phone">
			<?php  
				$phone_q = mysql_query("SELECT * FROM contact WHERE contact_type='telephone'");
				$phone = mysql_fetch_assoc($phone_q);

				$address_q = mysql_query("SELECT * FROM contact WHERE contact_type='address'");
				$address = mysql_fetch_assoc($address_q);

			?>
				<img src="img/phone.png" alt=""><span><?php echo $phone['info']; ?></span><br>
				<span><?php echo $address['info']; ?></span>
			</div>
			<div class="cls"></div>
			<nav>
				<ul>
					<?php  
						$menu_q = mysql_query("SELECT * FROM menu");
						while($menu = mysql_fetch_assoc($menu_q)){
							echo "
								<li><a href='{$menu['link']}'>{$menu['name_ka']}</a></li>
							";
						}

					?>
					<div class="cls"></div>
				</ul>
			</nav>
		</header>