<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * login pagina
 */
class LoginController
{

    public function loginForm()
    {
        $template_engine = get_template_engine();
        echo $template_engine->render('login_form');
    }

    public function handleLoginForm()
    {
        $result = validRegister($_POST);

        //Check: is there a user with this email
        if (userNotRegistered($result['data']['email'])) {
            $result['errors']['email'] = 'Wrong username';
        } else {

            //Check if password is right
            $user = getUsersByEmail($result['data']['email']);

            //Check if user is confirmed
            if(is_null($user['code'])){

            if (password_verify($result['data']['wachtwoord'], $user['wachtwoord'])) {

                //Signin user
                loginUser($user);

                //redirect user to a page
                redirect(url('login.dashboard'));
            } else {
                $result['errors']['wachtwoord'] = 'Wrong password';
            }
        }else{
            $result['errors']['email'] = 'Account not confirmed, Check your email!';
        }
        }


        $template_engine = get_template_engine();
        echo $template_engine->render('login_form', ['errors' => $result['errors']]);
    }

    public function userDashboard(){

        loginCheck();
        
        $template_engine = get_template_engine();
        echo $template_engine->render('user_dashboard');
    }

    public function logout(){
        logoutUser();
        redirect(url('home'));
    }
}