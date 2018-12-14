<?php

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

    // Rota da página inicial da loja
    $app->get('/', function(){
        
        $page = new Page();
        $page->setTpl("index");

    });

    $app->get("/categories/:idcategory", function($idcategory){

        $category = new Category();

        $category->get((int)$idcategory);

        $page = new Page();

        $page->setTpl("category", [

            "category"=>$category->getValues(),
            "products"=>[]   
        ]);
    });