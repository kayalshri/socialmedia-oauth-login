<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Apr 25, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/
	@license		: 	Free to use, 
*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();

$oauth->provider="DailyMotion";
$oauth->client_id = "4c3ae00cbf1f8dc7b8e1";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/dailymotion.php";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
#	print $oauth->getAccessToken();
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);
}


?>