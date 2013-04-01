<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/google.php
	@document		:	http://ngiriraj.com/work/google-connect-by-using-oauth-in-php/
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
	
*/

include "socialmedia_oauth_connect.php";

$oauth = new socialmedia_oauth_connect();

$oauth->provider="Google";

$oauth->client_id = "730362277469-tbeqm6l332n1al4pnfdgb83786a6g3f2.apps.googleusercontent.com";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me https://www.google.com/m8/feeds";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/google.php";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);
	/* redirect here */
}


?>