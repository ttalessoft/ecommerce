<?php

use \Hcode\Page;

    // Rota da página inicial da loja
    $app->get('/', function(){
        
        $page = new Page();
        $page->setTpl("index");

    });