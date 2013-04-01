<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/bitly.php
	@document		:	http://ngiriraj.com/work/bitly-connect-using-oauth-in-php/
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
$oauth->provider="Bitly";
$oauth->client_id = "4cfed21a38e6b8e25f5da9b74bfad075710e96d4";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/bitly.php";

$oauth->Initialize();

$code = ($_REQUEST["code"]) ?  ($_REQUEST["code"]) : "";

if(empty($code)) {
	$oauth->Authorize();
}else{
	$oauth->code = $code;
#	$oauth->getAccessToken();
	$getData = json_decode($oauth->getUserProfile());
	$oauth->debugJson($getData);
	print "Name :".$getData->data->full_name;

}

?>