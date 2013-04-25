<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Apr 25, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/
	@license		: 	Free to use, 
*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();

$oauth->provider="Flattr";
$oauth->client_id = "7Ek7bPm4X0zsniXBsIOEZEJZBX6IptQn";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/flattr.php";

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