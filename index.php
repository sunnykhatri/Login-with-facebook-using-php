<?php
require_once 'config.php';
if(isset($_SESSION['userData'])){
	header('location: view.php');
}
$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
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
			<div class="img_p">
				<img src="assets/image/lock3.png" class="img"> 
			</div>
			<p class="inner_p">
				Let visitors easily authorize on your website with their Facebook account and save and utilize their data:)
			</p>
			<a href="<?= htmlspecialchars( $loginURL ); ?>"><img src="assets/image/loginfacebook.png" class="fbbutton" alt="Login With Facebook"></a>
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