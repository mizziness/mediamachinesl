<?php

return [

    // OAuth2 Setting, you can get these keys in Google Developers Console
    'oauth2_client_id'      => '191771507137-2mj0oi0n7dlsu67nm150f0vaid9kd0e3.apps.googleusercontent.com',
    'oauth2_client_secret'  => 'uqldrZ0AQAOCrAijwoRo-8qO',
    'oauth2_redirect_uri'   => 'http://mediamachines.atomicpink.com/oauth2callback',   // Change it according to your needs

    // Definition of service specific values like scopes, OAuth token URLs, etc
    'services' => array(
		'YouTube' =>array(
			'scope' => 'https://www.googleapis.com/auth/youtube'
		)

    ),

    // Service file name prefix
    'service_class_prefix' => 'Google_Service_',

    // Custom settings
    'access_type' => 'online',    
    'approval_prompt' => 'auto',

];