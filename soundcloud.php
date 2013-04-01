<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/soundcloud.php
	@document		:	http://ngiriraj.com/work/soundcloud-connect-by-using-oauth-in-php/
	@license		: 	Free to use, 
	@History		:	V1.0 - Released oauth 2.0 service providers login access	
	@oauth2		:	Support following oauth2 login
					Bitly
					Wordpress
					Paypal
					Facebook
					Google
					Microsoft(MSN,Live,Hotmail)
					Foursquare
					Box
					Reddit
					Yammer
					Yandex
					SoundCloud					
	
*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();
$oauth->provider="SoundCloud";
$oauth->client_id = "0fdf90d552b0d455686e0621dbeab3ca";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/soundcloud.php";

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