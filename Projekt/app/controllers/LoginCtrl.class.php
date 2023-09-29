<?php

namespace app\controllers;

use app\forms\LoginForm;
use core\App;
use core\ParamUtils;
use core\Messages;
use core\Message;
use core\RoleUtils;
use core\Router;
use core\SessionUtils;

class LoginCtrl {
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        $messages = new Messages();

        if (empty($this->form->login)) {
            $message = new Message('Nie podano loginu', Message::ERROR);
            $messages->addMessage($message);
        }
        if (empty($this->form->pass)) {
            $message = new Message('Nie podano hasła', Message::ERROR);
            $messages->addMessage($message);
        }

        if ($messages->isError()) {
            return false;
        }

        if (App::getDB()->get("uzytkownik", "haslo", ["login" => $this->form->login]) == $this->form->pass && App::getDB()->get("uzytkownik", "rola", ["login" => $this->form->login]) == 1) {
            RoleUtils::addRole('admin');
        } else if (App::getDB()->get("uzytkownik", "haslo", ["login" => $this->form->login]) == $this->form->pass && App::getDB()->get("uzytkownik", "rola", ["login" => $this->form->login]) == 0) {
            RoleUtils::addRole('user');
        } else {
            $message = new Message('Niepoprawny login lub hasło', Message::ERROR);
            $messages->addMessage($message);
            return false;
        }

        $name = App::getDB()->get("uzytkownik", "nazwa", ["login" => $this->form->login]);
        
        SessionUtils::store('u_id', $this->form->login);
        SessionUtils::store('u_name', $name);
        
        return true;
    }
    
    
    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            $messages = new Messages();
            $messages->addMessage('Poprawnie zalogowano do systemu');
            $router = new Router(App::getConf());
            $router->redirectTo("productView");
        } else {
            $router = new Router(App::getConf());
            $this->generateView();
        }
    }

    public function action_logout() {
        $router = new Router(App::getConf());
        session_destroy();
        $router->redirectTo('productView');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}
