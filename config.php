<?php
session_start();
##### DB Configuration #####
$servername = "localhost";
$username = "root";
$password = "";
$db = "YourDatabase";

$token="";
##### FB App Configuration #####
$fbappid = "YourFbAppId"; 
$fbappsecret = "YourFbSecretKey"; 
//$redirectURL = "http://localhost:81/LoginwithFb/authenticate.php"; 
$redirectURL = "YourRedirectURL"; 
$fbPermissions = ['email']; 

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
##### Required Library #####
require_once __DIR__ . '/src/Facebook/autoload.php';
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$facebook = new Facebook(array('app_id' => $fbappid, 'app_secret' => $fbappsecret, 'default_graph_version' => 'v2.10', ));
$helper = $facebook->getRedirectLoginHelper();
##### Check facebook token stored or get new access token #####
try {
	if(isset($_SESSION['fb_token'])){
		$accessToken = $_SESSION['fb_token'];
	}else{
  		$accessToken = $helper->getAccessToken();
	}
} catch(FacebookResponseException $e) {
 	echo 'Facebook Responser error: ' . $e->getMessage();
  	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK error: ' . $e->getMessage();
  	exit;
}
?>