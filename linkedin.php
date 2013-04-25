<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Apr 25, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/
	@license		: 	Free to use, 
*/

include "socialmedia_oauth_connect.php";
$oauth = new socialmedia_oauth_connect();
$oauth->provider="LinkedIn";
$oauth->client_id = "ej2ast2u49vo";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="r_fullprofile r_emailaddress";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/linkedin.php";
$oauth->state="DCEEFWF45453sdffef424";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
#	print $oauth->getAccessToken();
	$getData = $oauth->getUserProfile();
	$oauth->debugJson($getData);
}


?>