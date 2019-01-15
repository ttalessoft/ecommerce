<?php

    session_start();

    require_once("vendor/autoload.php");

    use \Slim\Slim;
    
    $app = new Slim();

    $app->config('debug', true);

    require_once("functions.php");

    require_once("site.php");
    require_once("admin.php");
    require_once("admin-users.php");
    require_once("admin-categories.php");
    require_once("admin-products.php");
    require_once("admin-fornecedores.php");
    require_once("admin-clientes.php");
    require_once("admin-tiposdoc.php");
    require_once("admin-centro-de-custos.php");
    require_once("admin-status-doc.php");
    require_once("admin-doc-pagar.php");

    // Método main da aplicação
    $app->run();