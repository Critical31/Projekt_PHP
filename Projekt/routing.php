<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('ProductView'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('ProductView',          'ProductViewCtrl');
Utils::addRoute('productView',          'ProductViewCtrl');
Utils::addRoute('productViewPart',      'ProductViewCtrl');
Utils::addRoute('loginShow',		    'LoginCtrl');
Utils::addRoute('login',			    'LoginCtrl');
Utils::addRoute('logout',			    'LoginCtrl');
Utils::addRoute('registerShow',		    'RegisterCtrl');
Utils::addRoute('register',		        'RegisterCtrl');
Utils::addRoute('showDetails',          'DetailsViewCtrl');
Utils::addRoute('showCart',             'CartCtrl',["user","admin"]);
Utils::addRoute('addToCart',            'CartCtrl',["user","admin"]);
Utils::addRoute('removeFromCart',       'CartCtrl',["user","admin"]);
Utils::addRoute('doCheckout',           'CartCtrl',["user","admin"]);

//Utils::addRoute('action_name', 'controller_class_name');