<?php
	//Database configuration
$server='localhost';
$db_user='';
$db_pwd='';
$db_name='';
$table_name='';
$table_name_social='';
//email configuraion
$from_address="";
//domain configuration
$url="";
//Admin username
$admin_user='';
$admin_password='';

//strings
//login
$msg_pwd_error='Vale parool';
$msg_un_error='Sellist kasutajanime ei leidu';
$msg_email_1='Konto ei ole aktiveeritud';
$msg_email_2='Saada uus email aktiveerimiseks';

//Registration form
$msg_reg_user='See kasutajanimi on juba võetud';
$msg_reg_email='See email on juba registreeritud';
$msg_reg_activ='Aitäh! Teile saadetakse email konto aktiveerimiseks';

//Admin login
$msg_admin_pwd='Vale parool';
$msg_admin_user='Sellist kasutajat ei eksisteeri';


//LOGO text
$logotxt="LOGO";

//Twitter Configuration
define('CONSUMER_KEY', 'CONSUMER_KEY_HERE');
define('CONSUMER_SECRET', 'CONSUMER_SECRET_HERE');
define('OAUTH_CALLBACK', $url.'/twitter_callback.php');

//Google Configuration
$Clientid='TYPE_CLIENTID_HERE';
$Email_address='TYPE_EMAILADDRESS_HERE';
$Client_secret='TYPE_CLIENT_SECRET_HERE';
$Redirect_URIs =$url.'/google_connect.php';
$apikeys='TYPE_API_KEYS_HERE';

//facebook configuration
$fbappid='FB_APP_ID';
$fbsecret='FB_SECRET';

?>
