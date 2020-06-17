<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Registerpagina
 */
class RegistrationController {

	public function registrationForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('register_form');

	}

	public function handleRegistrationForm() {
		$result = validRegister($_POST);

		if (count($result['errors'])===0){

			if(userNotRegistered($result['data']['email'])){
				
				$code = md5 (uniqid (rand(), true));

				createUser($result['data']['email'], $result['data']['wachtwoord'], $code);
				
				sendConfirmationEmail($result['data']['email'], $code);

				$bedanktUrl = url ('register.thankyou');
				redirect($bedanktUrl);

			}
			else{
				$errors['email'] = 'Email already in use';
		}

		}

		$template_engine = get_template_engine();
		echo $template_engine->render('register_form', ['errors' => $result['errors']]);
	}

	public function registrationThankYou(){
		$template_engine = get_template_engine();
		echo $template_engine->render("register_thankyou");
	}

	public function confirmRegistration($code){
		$user = getUsersByCode($code);
		if ($user === false ){
			echo "Unknown user or already confirmed";
			exit;
		}

		confirmAccount($code);

		$template_engine = get_template_engine();
		echo $template_engine->render('register_confirm');
	}
}