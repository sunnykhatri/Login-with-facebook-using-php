<?php 
session_start();
if(!isset($_SESSION['userData'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login & Registration with facebook using Php </title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<header>
		<div class="head_left">
			<img src="assets/image/logo.png" height="50px"  >
		</div>
	</header>
	<p class="main_title">
		Login & Registration with facebook using Php 	<br/>
		<a href="javascript:void(0)"><small>← Back to article</small></a>
	</p>
	<section class="main">
		<div class="inner">	
			<div class="wthree_tab_content">
				<div class="wthree_tab_content_pos">
					<div class="wthree_tab_content_pos_grid">
						<img src="<?= $_SESSION['userData']['cover'] ?>" class="cover" > 
						<img src="<?= $_SESSION['userData']['picture'] ?>" class="profile_pic" > 
						<br>
						<h2>Hello</h2>
						<h3>I'm <?= $_SESSION['userData']['f_name']." ".$_SESSION['userData']['l_name'] ?></h3>
						<h6>Visit <a class="clor" target="_blank" href="<?= $_SESSION['userData']['url'] ?>">Facebook Profile</a></h6>
						<ul class="address">
							<li>
								<ul class="address-text">
									<li><b>Email : </b></li>
									<li><?= $_SESSION['userData']['email_id'] ?></li>
								</ul>
							</li>
							<li>
								<ul class="address-text">
									<li><b>Gender : </b></li>
									<li><?= $_SESSION['userData']['gender'] ?></li>
								</ul>
							</li>
							<li>
								<ul class="address-text">
									<li><b>Locale : </b></li>
									<li><?= $_SESSION['userData']['locale'] ?></li>
								</ul>
							</li>
							<li>
								<ul class="address-text">
									<li><a class="clor" href="logout.php">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="content content--related">
		<p>If you enjoyed this demo you might also like:</p>
		<a class="media-item" href="http://codecastra.com/login-google-using-php/">
			<img class="media-item__img" src="assets/related/related_goole.png">
			<h3 class="media-item__title">Login & Registration With  Google</h3>
		</a>
		<a class="media-item" href="http://codecastra.com/login-twitter-using-php/">
			<img class="media-item__img" src="assets/related/related_twitter.png">
			<h3 class="media-item__title">Login & Registration With  Twitter</h3>
		</a>
	</section>
</body>
</html>