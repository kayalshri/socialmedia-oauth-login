<?php
/*
	@author		:	Giriraj Namachivayam
	@date 		:	Mar 20, 2013
	@demourl		:	http://ngiriraj.com/socialMedia/oauthlogin/meetup.php
	@document		:	http://ngiriraj.com/work/meetup-connect-by-using-oauth-in-php/
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
					Meetup				
	
*/

include "socialmedia_oauth_connect.php";
$oauth = new socialmedia_oauth_connect();
$oauth->provider="MeetUp";
$oauth->client_id = "b2ca2eea0o8ja6ium9tehktl48";
$oauth->client_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxx";
$oauth->redirect_uri  ="http://ngiriraj.com/socialMedia/oauthlogin/meetup.php";

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