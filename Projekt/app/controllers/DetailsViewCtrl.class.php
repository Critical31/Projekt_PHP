<?php

namespace app\controllers;

use app\forms\DetailsForm;
use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class DetailsViewCtrl {
    
    private $productDetails;
    private $quantity;
    
    public function action_showDetails() {
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', rtrim($url, '/'));
        if (is_numeric(end($parts))) {
            $id_czesci = end($parts);
        }
        
        try {
            $this->productDetails = App::getDB()->get('przedmiot', [
                '[>]model' => ['model_id_modelu' => 'id_modelu'],
                '[>]marka' => ['model.marka_id_marki' => 'id_marki']
            ], [
                'przedmiot.id_czesci',
                'przedmiot.nazwa',
                'przedmiot.kod_czesci',
                'przedmiot.rodzaj_czesci',
                'model.nazwa(model_name)',
                'model.generacja',
                'marka.nazwa(marka_name)',
                'przedmiot.cena'
            ], ['przedmiot.id_czesci' => $id_czesci]);
            
            $this->quantity = App::getDB()->get('stan_mag', 'ilosc', ['przedmiot_id_czesci' => $id_czesci]);
            
            $loggedInUserName = SessionUtils::load('u_name', $keep = true);

            App::getSmarty()->assign('loggedInUserName', $loggedInUserName);
            
            App::getSmarty()->assign('productDetails', $this->productDetails);
            App::getSmarty()->assign('quantity', $this->quantity);
            App::getSmarty()->display('DetailsView.tpl');
        } catch (PDOException $e) {
            return null;
        }
    }
}
