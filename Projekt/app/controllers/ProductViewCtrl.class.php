<?php

namespace app\controllers;
use app\forms\ProductSearchForm;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class ProductViewCtrl {
    
    private $form;
    private $records;
    private $types;
    private $totalRecords;
    
    public function __construct(){
        $this->form = new ProductSearchForm();
    }
    
    public function validate() {
        $this->form->name = ParamUtils::getFromRequest('sf_name');
        $this->form->option = ParamUtils::getFromRequest('sf_option');
        $this->form->type = ParamUtils::getFromRequest('sf_type');
        
        SessionUtils::store('form_name', $this->form->name);
        SessionUtils::store('form_option', $this->form->option);
        SessionUtils::store('form_type', $this->form->type);
    }
    
    public function load_data() {
        $this->validate();
        
        /*$url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', rtrim($url, '/'));
        if (is_numeric(end($parts))) {
            $page = end($parts);
        }*/
        
        $page = ParamUtils::getFromRequest('page', true, 'int');
        $pageSize = 10;
        $page = max(1, $page);
        $offset = ($page - 1) * $pageSize;
        
        if (empty(ParamUtils::getFromRequest('sf_name')) && empty(ParamUtils::getFromRequest('sf_option')) && empty(ParamUtils::getFromRequest('sf_type'))) {
            $this->form->name = SessionUtils::load('form_name', $keep = true);
        $this->form->option = SessionUtils::load('form_option', $keep = true);
        $this->form->type = SessionUtils::load('form_type', $keep = true);
        }
        
        $this->types = App::getDB()->select("przedmiot", [
            "@rodzaj_czesci",
        ]);
        
        if (strlen($this->form->name) > 0){
            if ($this->form->type == "all"){       
                if (strlen($this->form->option) == 1){
                    try {
                        $this->records = App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["nazwa[~]" => "%" . $this->form->name . "%",
                           "LIMIT" => [$offset, $pageSize]]);
                        $this->totalRecords = count(App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["nazwa[~]" => "%" . $this->form->name . "%",
                           ]));
                        foreach ($this->records as &$record) {
                            $modelId = $record['model_id_modelu'];
                            $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);
                
                            if ($model) {
                            $markaId = $model['marka_id_marki'];
                            $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);
                    
                            $record['model'] = $model;
                            $record['marka'] = $marka;
                            }
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 2){
                    try {
                        $this->records = App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["kod_czesci[~]" => "%" . $this->form->name . "%",
                           "LIMIT" => [$offset, $pageSize]]);
                        $this->totalRecords = count(App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["kod_czesci[~]" => "%" . $this->form->name . "%",]));
                        foreach ($this->records as &$record) {
                            $modelId = $record['model_id_modelu'];
                            $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                            if ($model) {
                                $markaId = $model['marka_id_marki'];
                                $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                $record['model'] = $model;
                                $record['marka'] = $marka;
                            }
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 3) {
                    try {
                        $modelId = App::getDB()->select("model", ["id_modelu"], ["nazwa[~]" => "%" . $this->form->name . "%"]);
                        if (!empty($modelId)) {
                            $this->records = App::getDB()->select("przedmiot", [
                                "id_czesci",
                                "nazwa",
                                "kod_czesci",
                                "rodzaj_czesci",
                                "model_id_modelu",
                            ], ["model_id_modelu" => $modelId[0]['id_modelu'],
                               "LIMIT" => [$offset, $pageSize]]);
                            $this->totalRecords = count(App::getDB()->select("przedmiot", [
                                "id_czesci",
                                "nazwa",
                                "kod_czesci",
                                "rodzaj_czesci",
                                "model_id_modelu",
                            ], ["model_id_modelu" => $modelId[0]['id_modelu'],]));
                            foreach ($this->records as &$record) {
                                $modelId = $record['model_id_modelu'];
                                $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                                if ($model) {
                                    $markaId = $model['marka_id_marki'];
                                    $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                    $record['model'] = $model;
                                    $record['marka'] = $marka;
                                }
                            }
                        } else {
                            getMessages()->addMessage(new Message("Nie znaleziono modelu", Message::ERROR));
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 4) {
                    try {
                        $marka = App::getDB()->select("marka", ["id_marki"], ["nazwa[~]" => "%" . $this->form->name . "%"]);
                        if (!empty($marka)) {
                            $markaId = $marka[0]['id_marki'];
                            $modele = App::getDB()->select("model", ["id_modelu"], ["marka_id_marki" => $markaId]);
                            if (!empty($modele)) {
                                $modeleIds = array_column($modele, 'id_modelu');
                                $this->records = App::getDB()->select("przedmiot", [
                                    "id_czesci",
                                    "nazwa",
                                    "kod_czesci",
                                    "rodzaj_czesci",
                                    'model_id_modelu',
                                ], [
                                    "model_id_modelu" => $modeleIds,
                                    "LIMIT" => [$offset, $pageSize]
                                ]);
                                $this->totalRecords = count(App::getDB()->select("przedmiot", [
                                    "id_czesci",
                                    "nazwa",
                                    "kod_czesci",
                                    "rodzaj_czesci",
                                    'model_id_modelu',
                                ], [
                                    "model_id_modelu" => $modeleIds,
                                ]));
                                foreach ($this->records as &$record) {
                                    $modelId = $record['model_id_modelu'];
                                    $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                                    if ($model) {
                                        $markaId = $model['marka_id_marki'];
                                        $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                        $record['model'] = $model;
                                        $record['marka'] = $marka;
                                    }
                                }
                            } else {
                                getMessages()->addMessage(new Message("Nie znaleziono modeli dla tej marki", Message::ERROR));
                            }
                        } else {
                            getMessages()->addMessage(new Message("Nie znaleziono marki", Message::ERROR));
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                }
            } else {
                if (strlen($this->form->option) == 1){
                    try {
                        $this->records = App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["AND" => [
                            "nazwa[~]" => "%" . $this->form->name . "%",
                            "rodzaj_czesci" => $this->form->type]
                            
                        ],["LIMIT" => [$offset, $pageSize]]);
                        $this->totalRecords = count(App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["AND" => [
                            "nazwa[~]" => "%" . $this->form->name . "%",
                            "rodzaj_czesci" => $this->form->type,
                            
                        ]]));
                        foreach ($this->records as &$record) {
                            $modelId = $record['model_id_modelu'];
                            $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                            if ($model) {
                                $markaId = $model['marka_id_marki'];
                                $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                $record['model'] = $model;
                                $record['marka'] = $marka;
                            }
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 2){
                    try {
                        $this->records = App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["AND" => [
                            "kod_czesci[~]" => "%" . $this->form->name . "%",
                            "rodzaj_czesci" => $this->form->type
                            
                        ]],["LIMIT" => [$offset, $pageSize]]);
                        $this->totalRecords = count(App::getDB()->select("przedmiot", [
                            "id_czesci",
                            "nazwa",
                            "kod_czesci",
                            "rodzaj_czesci",
                            'model_id_modelu',
                        ], ["AND" => [
                            "kod_czesci[~]" => "%" . $this->form->name . "%",
                            "rodzaj_czesci" => $this->form->type,
                        ]]));
                        foreach ($this->records as &$record) {
                            $modelId = $record['model_id_modelu'];
                            $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                            if ($model) {
                                $markaId = $model['marka_id_marki'];
                                $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                $record['model'] = $model;
                                $record['marka'] = $marka;
                            }
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 3) {
                    try {
                        $modelId = App::getDB()->select("model", ["id_modelu"], ["nazwa[~]" => "%" . $this->form->name . "%"]);
                        if (!empty($modelId)) {
                            $this->records = App::getDB()->select("przedmiot", [
                                "id_czesci",
                                "nazwa",
                                "kod_czesci",
                                "rodzaj_czesci",
                                'model_id_modelu',
                            ], ["AND" => [
                                "model_id_modelu" => $modelId[0]['id_modelu'],
                                "rodzaj_czesci" => $this->form->type
                                
                            ]],["LIMIT" => [$offset, $pageSize]]);
                            $this->totalRecords = count(App::getDB()->select("przedmiot", [
                                "id_czesci",
                                "nazwa",
                                "kod_czesci",
                                "rodzaj_czesci",
                                'model_id_modelu',
                            ], ["AND" => [
                                "model_id_modelu" => $modelId[0]['id_modelu'],
                                "rodzaj_czesci" => $this->form->type,
                            ]]));
                            foreach ($this->records as &$record) {
                                $modelId = $record['model_id_modelu'];
                                $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                                if ($model) {
                                    $markaId = $model['marka_id_marki'];
                                    $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                    $record['model'] = $model;
                                    $record['marka'] = $marka;
                                }
                            }
                        } else {
                            getMessages()->addMessage(new Message("Model not found", Message::ERROR));
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                } else if (strlen($this->form->option) == 4) {
                    try {
                        $marka = App::getDB()->select("marka", ["id_marki"], ["nazwa[~]" => "%" . $this->form->name . "%"]);
                        if (!empty($marka)) {
                            $markaId = $marka[0]['id_marki'];
                            $modele = App::getDB()->select("model", ["id_modelu"], ["marka_id_marki" => $markaId]);
                            if (!empty($modele)) {
                                $modeleIds = array_column($modele, 'id_modelu');
                                $this->records = App::getDB()->select("przedmiot", [
                                    "id_czesci",
                                    "nazwa",
                                    "kod_czesci",
                                    "rodzaj_czesci",
                                    'model_id_modelu',
                                ], ["AND" => [
                                    "model_id_modelu" => $modeleIds,
                                    "rodzaj_czesci" => $this->form->type
                                    
                                ]],["LIMIT" => [$offset, $pageSize]]);
                                $this->totalRecords = count(App::getDB()->select("przedmiot", [
                                    "id_czesci",
                                    "nazwa",
                                    "kod_czesci",
                                    "rodzaj_czesci",
                                    'model_id_modelu',
                                ], ["AND" => [
                                    "model_id_modelu" => $modeleIds,
                                    "rodzaj_czesci" => $this->form->type,               
                                ]]));
                                foreach ($this->records as &$record) {
                                    $modelId = $record['model_id_modelu'];
                                    $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);

                                    if ($model) {
                                        $markaId = $model['marka_id_marki'];
                                        $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);

                                        $record['model'] = $model;
                                        $record['marka'] = $marka;
                                    }
                                }
                            } else {
                                getMessages()->addMessage(new Message("No models found for this brand", Message::ERROR));
                            }
                        } else {
                            getMessages()->addMessage(new Message("Brand not found", Message::ERROR));
                        }
                    } catch (PDOException $e) {
                        getMessages()->addMessage(new Message("Wystąpił błąd podczas pobierania rekordów", Message::ERROR));
                        if (getConf()->debug) getMessages()->addMessage(new Message($e->getMessage(), Message::ERROR));
                    }
                }
            }
        } else {
            if ($this->form->type == "all"){
                $this->records = App::getDB()->select("przedmiot", [
                "id_czesci",
                "nazwa",
                "kod_czesci",
                "rodzaj_czesci",
                "model_id_modelu"],[
                    "LIMIT" => [$offset, $pageSize]
                ]
            );
            $this->totalRecords = count(App::getDB()->select("przedmiot", [
                "id_czesci",
                "nazwa",
                "kod_czesci",
                "rodzaj_czesci",
                "model_id_modelu"],
            ));   
            foreach ($this->records as &$record) {
                $modelId = $record['model_id_modelu'];
                $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);
                
                if ($model) {
                    $markaId = $model['marka_id_marki'];
                    $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);
                    
                    $record['model'] = $model;
                    $record['marka'] = $marka;
                }
            }
            }else{
            $this->records = App::getDB()->select("przedmiot", [
                "id_czesci",
                "nazwa",
                "kod_czesci",
                "rodzaj_czesci",
                "model_id_modelu"],[
                            
                    "rodzaj_czesci" => $this->form->type,
                    "LIMIT" => [$offset, $pageSize]],
            );
            $this->totalRecords = count(App::getDB()->select("przedmiot", [
                "id_czesci",
                "nazwa",
                "kod_czesci",
                "rodzaj_czesci",
                "model_id_modelu"],[
                            
                    "rodzaj_czesci" => $this->form->type,
                    ],
            ));
            foreach ($this->records as &$record) {
                $modelId = $record['model_id_modelu'];
                $model = App::getDB()->get("model", ["id_modelu", "nazwa", "marka_id_marki"], ["id_modelu" => $modelId]);
                
                if ($model) {
                    $markaId = $model['marka_id_marki'];
                    $marka = App::getDB()->get("marka", ["id_marki", "nazwa"], ["id_marki" => $markaId]);
                    
                    $record['model'] = $model;
                    $record['marka'] = $marka;
                }
            }
            }
        }
        
        
        $loggedInUserName = SessionUtils::load('u_name', $keep = true);

        App::getSmarty()->assign('loggedInUserName', $loggedInUserName);
        
      
    }
    
    public function action_productView() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('products', $this->records);
        App::getSmarty()->assign('types', $this->types);

        
        $pageSize = 10;
        $totalPages = ceil($this->totalRecords / $pageSize);

        $currentPage = ParamUtils::getFromRequest('page', true, 'int', 1);
        
        App::getSmarty()->assign('totalPages', $totalPages);
        App::getSmarty()->assign('currentPage', $currentPage);

        App::getSmarty()->display('ProductView.tpl');
        
    }
    
    public function action_productViewPart() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('products', $this->records);
        App::getSmarty()->assign('types', $this->types);

        
        $pageSize = 10;
        $totalPages = ceil($this->totalRecords / $pageSize);
        
        if (empty(ParamUtils::getFromRequest('page', true, 'int', 1))){
            $currentPage = 1;
        }else{
        $currentPage = ParamUtils::getFromRequest('page', true, 'int', 1);}
        
        App::getSmarty()->assign('totalPages', $totalPages);
        App::getSmarty()->assign('currentPage', $currentPage);
        App::getSmarty()->display('ProductViewTable.tpl');
    }
}
