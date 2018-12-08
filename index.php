<?php

    require_once("vendor/autoload.php");

    use \Slim\Slim;
    use \Hcode\Page;
    use \Hcode\PageAdmin;

    $app = new Slim();

    $app->config('debug', true);

    // Rota da página inicial da loja
    $app->get('/', function(){
        
        $page = new Page();
        $page->setTpl("index");

    });

    // Rota da página inicial do admin
    $app->get('/admin', function(){

        $page = new PageAdmin();
        $page->setTpl("index");

    });

    $app->run();