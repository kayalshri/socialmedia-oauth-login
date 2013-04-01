<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/wordpress.php
	@document		:	http://ngiriraj.com/work/wordpress-connect-using-oauth-in-php-2/
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
$oauth->provider="WordPress";
$oauth->client_id = "2327";
$oauth->client_secret = "RHJhfSqX5M6KqraMY4hcWURhZRYyKCqNynjmVIqnboYm7V36XMeJnmFxQHFu3BlF";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/wordpress.php";

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