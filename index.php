<?php

    session_start();

    require_once("vendor/autoload.php");

    use \Slim\Slim;
    use \Hcode\Page;
    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    use \Hcode\Model\Category;

    $app = new Slim();

    $app->config('debug', true);

    require_once("site.php");
    
    require_once("admin.php");

    // Método main da aplicação
    $app->run();