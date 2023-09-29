<?php

namespace app\controllers;

use app\forms\CartForm;
use app\forms\RemForm;
use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\Router;
use core\SessionUtils;

class CartCtrl {
    private $form;
    
    public function __construct(){
		$this->form = new CartForm();
        $this->formr = new RemForm();
	}
    
    public function validate() {
        $this->form->id = ParamUtils::getFromRequest('id');
        $this->form->quant = ParamUtils::getFromRequest('quant');
        $this->formr->idr = ParamUtils::getFromRequest('idr');  
    }
    
    public function action_showCart() {
        $userId = SessionUtils::load('u_id', $keep = true);
        $cartItems = $this->getCartItems($userId);
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['cena'] * $item['ilosc'];
        }
        App::getSmarty()->assign('cartItems', $cartItems);
        App::getSmarty()->assign('totalAmount', $totalAmount);
        $this->generateView();
    }
    
    private function getCartItems($userId) {
        $db = App::getDB();
        $columns = [
            'przedmiot.id_czesci',
            'przedmiot.nazwa',
            'przedmiot.cena',
            'marka.nazwa(marka)',
            'model.nazwa(model)',
            'model.generacja',
            'przedmiot.kod_czesci(kod)',
            'przedmiot.rodzaj_czesci(rodzaj)',
            'przedmiot_zamowienia.ilosc(ilosc)'
        ];
        return $db->select('przedmiot_zamowienia', [
            "[>]przedmiot" => ["przedmiot_id_czesci" => "id_czesci"],
            "[>]model" => ["przedmiot.model_id_modelu" => "id_modelu"],
            "[>]marka" => ["model.marka_id_marki" => "id_marki"],
            "[>]zamowienie" => ["przedmiot_zamowienia.zamowienie_id_zamowienia" => "id_zamowienia"]
        ], $columns, [
            'zamowienie.uzytkownik_login' => $userId,
            'zamowienie.stan' => 1
        ]);
    }
    
    public function action_addToCart() {
        $this->validate();
        $userId = SessionUtils::load('u_id', $keep = true);
        $productId = $this->form->id;
        $quantity = $this->form->quant;
        $activeOrder = App::getDB()->get('zamowienie', [
            'id_zamowienia',
            'stan'
        ], [
            'uzytkownik_login' => $userId,
            'stan[!]' => 0
        ]);
        if ($activeOrder) {
            $orderId = $activeOrder['id_zamowienia'];
            $existingCartItem = App::getDB()->get('przedmiot_zamowienia', [
                'ID',
                'ilosc'
            ], [
                'przedmiot_id_czesci' => $productId,
                'zamowienie_id_zamowienia' => $orderId
            ]);
            if ($existingCartItem) {
                App::getDB()->update('przedmiot_zamowienia', ['ilosc[+]' => $quantity], [
                    'ID' => $existingCartItem['ID']
                ]);
            } else {
                App::getDB()->insert('przedmiot_zamowienia', [
                    'przedmiot_id_czesci' => $productId,
                    'zamowienie_id_zamowienia' => $orderId,
                    'ilosc' => $quantity
                ]);
            }
        } else {
            $orderData = [
                'stan' => 1,
                'uzytkownik_login' => $userId,
            ];
            App::getDB()->insert('zamowienie', $orderData);
            $orderId = App::getDB()->id();
            App::getDB()->insert('przedmiot_zamowienia', [
                'przedmiot_id_czesci' => $productId,
                'zamowienie_id_zamowienia' => $orderId,
                'ilosc' => $quantity,
            ]);
        }
        $this->action_showCart();
    }
    
    public function action_removeFromCart() {
        $this->validate();
        $userId = SessionUtils::load('u_id', $keep = true);
        $itemId = $this->formr->idr;
        $itemId = intval($itemId);
        $this->removeItemFromCart($userId, $itemId);
        $this->action_showCart();
    }
    
    private function removeItemFromCart($userId, $itemId) {
        $db = App::getDB();
        $db->delete('przedmiot_zamowienia', [
            'przedmiot_id_czesci' => $itemId,
            'zamowienie_id_zamowienia' => 
                $db->select('zamowienie', 'id_zamowienia', [
                    'uzytkownik_login' => $userId,
                    'stan' => 1
                ])
        ]);
    }
    
    public function action_doCheckout() {
        $userId = SessionUtils::load('u_id', $keep = true);
        $orderId = App::getDB()->get('zamowienie', 'id_zamowienia', [
            'uzytkownik_login' => $userId,
            'stan' => 1
        ]);
        if ($orderId) {
            App::getDB()->update('zamowienie', ['stan' => 0], ['id_zamowienia' => $orderId]);
        }
        $this->action_showCart();
    }
    
    public function generateView(){
        $loggedInUserName = SessionUtils::load('u_name', $keep = true);

        App::getSmarty()->assign('loggedInUserName', $loggedInUserName);
        
        App::getSmarty()->display('CartView.tpl');		
    }
}
