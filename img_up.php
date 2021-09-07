<?php  
		if (isset($_FILES['img'])&&!empty($_FILES['img'])) {
			move_uploaded_file($_FILES['img']['tmp_name'], "img/profile_images/{$_POST['name']}.jpg");
		}
		header("Location: profile.php?profile_id={$_POST['id']}");
	?>