<?php

    session_start();

    require_once("vendor/autoload.php");

    use \Slim\Slim;
    
    $app = new Slim();

    $app->config('debug', true);

    require_once("site.php");
    require_once("admin.php");
    require_once("admin-users.php");
    require_once("admin-categories.php");
    require_once("admin-products.php");
    require_once("admin-fornecedores.php");
    require_once("admin-clientes.php");
    require_once("admin-tiposdoc.php");

    // Método main da aplicação
    $app->run();