<?php

/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/facebook.php
	@document		:	http://ngiriraj.com/work/facebook-connect-by-using-oauth-in-php/
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

$oauth->provider="Facebook";
$oauth->client_id = "482962811753376";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->scope="email,publish_stream,status_update,friends_online_presence,user_birthday,user_location,user_work_history";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/facebook.php";

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