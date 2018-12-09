<?php

    session_start();

    require_once("vendor/autoload.php");

    use \Slim\Slim;
    use \Hcode\Page;
    use \Hcode\PageAdmin;
    use \Hcode\Model\User;

    $app = new Slim();

    $app->config('debug', true);

    // Rota da página inicial da loja
    $app->get('/', function(){
        
        $page = new Page();
        $page->setTpl("index");

    });

    // Rota da página inicial do admin
    $app->get('/admin', function(){

        User::verifyLogin();

        $page = new PageAdmin();
        $page->setTpl("index");

    });

    // Rota da página de login
    $app->get('/admin/login', function(){

        // Seta os parametros de que não precisa carregar o header e o footer padrão da aplicação
        $page = new PageAdmin([
            "header"=>false,
            "footer"=>false
        ]);

        // Seta qual o template que deve ser carregado no diretório
        $page->setTpl("login");

    });

    // Rota chamada de validação do login & senha do usuário
    $app->post('/admin/login', function(){

        // Método de validação dos dados do usuário e senha
        User::login($_POST["login"], $_POST["password"]);

        // Passa a nova rota caso autentique
        header("Location: /admin");

        // Para a execução dos processos
        exit;
    });

    $app->get('/admin/logout', function(){

        User::logout();

        header("Location: /admin/login");

        exit;

    });

    // Método main da aplicação
    $app->run();