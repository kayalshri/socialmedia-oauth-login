<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Apr 25, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/
	@license		: 	Free to use, 
*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();

$oauth->provider="Stripe";
$oauth->client_id = "ca_1fBgoEd4aoePBN1ZBKx9ihKvhP6vXbOp";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/stripe.php";

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