<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	//HOME
	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );

	//REGISTER
	SimpleRouter::get( '/registreren', 'RegistrationController@registrationForm' )->name( 'register.form' );
	SimpleRouter::post( '/registreren/verwerken', 'RegistrationController@handleRegistrationForm' )->name( 'register.handle' );
	SimpleRouter::get( '/registreren/bedankt', 'RegistrationController@registrationThankYou' )->name( 'register.thankyou' );

	//CONFIRM EMAIL
	SimpleRouter::get( '/registreren/confirm/{code}', 'RegistrationController@confirmRegistration' )->name( 'register.confirm' );

	//LOGIN
	SimpleRouter::get( '/login', 'LoginController@loginForm' )->name( 'login.form' );
	SimpleRouter::post( '/login/verwerken', 'LoginController@handleLoginForm' )->name( 'login.Handle' );
	SimpleRouter::get( '/login/dashboard', 'LoginController@userDashboard' )->name( 'login.dashboard' );

	//EMAIL TEST
	//SimpleRouter::get( '/stuur-test-email', 'EmailController@sendTestEmail' )->name( 'email.test' );
	
	//LOGOUT
	SimpleRouter::get( '/logout', 'LoginController@logout' )->name( 'logout' );

	//VIDEOS
	SimpleRouter::get( '/video', 'VideoController@videoPage' )->name( 'video.page' );

	//DAILY CHALLENGES
	SimpleRouter::get( '/daily', 'DailyChallController@dailyPage' )->name( 'daily.challenges' );



	// SimpleRouter::get( '/upperbody/chest/pushups', 'WebsiteController@pushup' )->name( 'pushup' );
	// SimpleRouter::get( '/lowerbody/legs/squads', 'WebsiteController@squads' )->name( 'squads' );
	// SimpleRouter::get( '/about/contact', 'WebsiteController@contact' )->name( 'contact' );
	// STOP: Tot hier al je eigen URL's zetten


	// SimpleRouter::get( '/', 'VideoController@ShowAllVideo' )->name( 'video' );


	// STOP: Tot hier al je eigen URL's zetten
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

