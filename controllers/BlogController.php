<?php

namespace Controllers;

use MVC\Router;


class BlogController{
    public static function blog(Router $router){
        $router->render('home/blog');
    }

}