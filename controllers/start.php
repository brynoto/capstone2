<?php 

require '../vendor/autoload.php';
define('SITE_URL', 'https://peenoise-dota-2-store.000webhostapp.com/');

$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential('AbHe2la2HMGHvz_ueGfmDeyDBXV3OCHFxEUu_7kb6J6P76BgI0ocCo9rGuikT7wn2eJqkwHQWrx3DUmK',
			'EFaiZxsY2lfklkpxzLR44lAhLa8KBJWyamV0DZ8OW8hcl_QDH0YLHVVRPRik7XOME2tCqvty_V0B-lJp') 

);
	

 ?>