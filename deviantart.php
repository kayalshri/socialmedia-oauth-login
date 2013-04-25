<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Apr 25, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/
	@license		: 	Free to use, 
*/
include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();
$oauth->provider="DeviantArt";
$oauth->client_id = "396";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/deviantart.php";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
#	$oauth->getAccessToken();
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);

}


?>