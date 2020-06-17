<?php
// Kopieer dit bestand naar config.php met je eigen gegevens
// config.php wordt niet naar Github gestuurd, wel zo veilig.
// Zet dus NOOIT in dit bestand je geheime gegevens, deze dient alleen als voorbeeld

$config = [
	'DB'       => [
		'HOSTNAME' => 'rdbms.strato.de',
		'DATABASE' => 'DB4184420',
		'USER'     => 'U4184420',
		'PASSWORD' => 'PROJCOVID19'
	],
	'MAIL' 		=>[
		'SMTP_HOST'		=>'smtp.strato.com',
		'SMTP_USER'		=>'12move@bobvanberckel.com',
		'SMTP_PASSWORD'	=>'PROJCOVID19',
		'SMTP_PORT'		=>'465'
	],
	'BASE_URL' => '/PROJ-MVC',  // Zet hier het pad naar de public map in, vanaf http://localhost, anders werken je routes niet!
	'BASE_HOST'=> 'https://bobvanberckel.com',
	'ROOT'     => dirname( dirname( __DIR__ ) ),
	'PRIVATE'  => dirname( __DIR__ ),
	'WEBROOT'  => dirname( dirname( __DIR__ ) )
];

return $config;
