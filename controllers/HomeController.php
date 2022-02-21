<?php

namespace Controllers;

use MVC\Router;

class HomeController{
    public static function home(Router $router){
        $router->render('home/base');
    }

    public static function base(Router $router){
        $router->render('home/base');
    }
}