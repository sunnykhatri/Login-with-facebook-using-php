<?php 
require_once 'Config.php';
if(isset($_REQUEST['code'])){
	header('Location: authenticate.php');
}
############ Set Fb access token ############
if(isset($_SESSION['fb_token'])){
		$facebook->setDefaultAccessToken($_SESSION['fb_token']);
}
else{
	$_SESSION['fb_token'] = (string) $accessToken;
	$oAuth2Client = $facebook->getOAuth2Client();
	$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fb_token']);
	$_SESSION['fb_token'] = (string) $longLivedAccessToken;
	$facebook->setDefaultAccessToken($_SESSION['fb_token']);
}
############ Fetch data from graph api  ############
try {
	$profileRequest = $facebook->get('/me?fields=name,first_name,last_name,email,link,gender,locale,birthday,cover,picture.type(large)');
	$fbuserData = $profileRequest->getGraphNode()->asArray();
} catch(FacebookResponseException $e) {
	echo 'Graph returned an error: ' . $e->getMessage();
	session_destroy();
	header("Location: ./");
	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	session_destroy();
	header("Location: ./");
	exit;
}
############ Store data in database  ############
$oauthpro = "facebook";
$oauthid = $fbuserData['id'] ?? '';
$f_name = $fbuserData['first_name'] ?? '';
$l_name = $fbuserData['last_name'] ?? '';
$gender = $fbuserData['gender'] ?? '';
$email_id = $fbuserData['email'] ?? '';
$locale = $fbuserData['locale'] ?? '';
$cover = $fbuserData['cover']['source'] ?? '';
$picture = $fbuserData['picture']['url'] ?? '';
$url = $fbuserData['link'] ?? '';
$sql = "SELECT * FROM usersdata WHERE oauthid='".$fbuserData['id']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   $conn->query("update usersdata set f_name='".$f_name."', l_name='".$l_name."', email_id='".$email_id."', gender='".$gender."', locale='".$locale."', cover='".$cover."', picture='".$picture."', url='".$url."' where oauthid='".$oauthid."' ");
} else {
	$conn->query("INSERT INTO usersdata (oauth_pro, oauthid, f_name, l_name, email_id, gender, locale, cover, picture, url) VALUES ('".$oauthpro."', '".$oauthid."', '".$f_name."', '".$l_name."', '".$email_id."', '".$gender."', '".$locale."', '".$cover."', '".$picture."', '".$url."')");  
}
$res = $conn->query($sql);
$userData = $res->fetch_assoc();

$_SESSION['userData'] = $userData;
header("Location: view.php");
?>