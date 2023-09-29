<?php

namespace app\controllers;

use app\forms\RegisterForm;
use core\App;
use core\ParamUtils;
use core\Messages;
use core\Message;
use core\RoleUtils;
use core\Router;

class RegisterCtrl{
    private $form;
	
	public function __construct(){
		$this->form = new RegisterForm();
	}
    
    public function validate() {
    $this->form->login = ParamUtils::getFromRequest('login');
    $this->form->pass = ParamUtils::getFromRequest('pass');
    $this->form->name = ParamUtils::getFromRequest('name');
        
    $messages = new Messages();
        
    if (empty($this->form->login)) {
        $message = new Message('Nie podano loginu', Message::ERROR);
        $messages->addMessage($message);
    }
    if (empty($this->form->pass)) {
        $message = new Message('Nie podano hasła', Message::ERROR);
        $messages->addMessage($message);
    }
    if (empty($this->form->name)) {
        $message = new Message('Nie podano nazwy', Message::ERROR);
        $messages->addMessage($message);
    }
        
    if ($messages->isError()) {
        
        return false;
    }
        
    if (App::getDB()->get("uzytkownik", "login", ["login" => $this->form->login]) == $this->form->login) {
        $message = new Message('Podany login jest zajęty', Message::ERROR);
        $messages->addMessage($message);
        return false;
    } else {App::getDB()->insert("uzytkownik",["login" => $this->form->login, "haslo" => $this->form->pass, "nazwa" => $this->form->name,       "rola" => 0]);
        
    }
    return true;
    }
    
    public function action_registerShow(){
		$this->generateView(); 
	}
    
    public function action_register(){
    if ($this->validate()){
        
        $messages = new Messages();
        $messages->addMessage('Poprawnie zarejestrowano do systemu');
        
        $router = new Router(App::getConf());
        
        $router->redirectTo("loginShow");
    } else {
        $router = new Router(App::getConf());
        $this->generateView();
    }       
}
    
    public function generateView(){
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('RegisterView.tpl');		
	}
}