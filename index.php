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

    // Método que finaliza a sessão e redireciona para a página de login
    $app->get('/admin/logout', function(){

        User::logout();

        header("Location: /admin/login");

        exit;

    });

    // Método que lista todos os usuários em um relatório
    $app->get("/admin/users", function(){

        User::verifyLogin();

        $users = User::listAll();

        $page = new PageAdmin();

        $page->setTpl("users", array(
            "users"=>$users
        ));

    });

    // Método que carrega a página para cadastro de usuários
    $app->get("/admin/users/create", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("users-create");

    });

    // Método que deleta um usuário a partir do seu id
    $app->get("/admin/users/:iduser/delete", function($iduser){

        User::verifyLogin();

        $user = new User();

        $user->get((int)$iduser);

        $user->delete();

        header("Location: /admin/users");

        exit;

    });

    // Método que pega um usuário especifico pelo seu id
    $app->get("/admin/users/:iduser", function($iduser){

        User::verifyLogin();

        $user = new User();

        $user->get((int)$iduser);

        $page = new PageAdmin();

        $page->setTpl("users-update", array(
            
            "user"=>$user->getValues()

        ));
    
    });

    // Método save save usuário via post (ação do formulário)
    $app->post("/admin/users/create", function(){

        User::verifyLogin();

        $user = new User();

        $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

        $user->setData($_POST);

        $user->save();

        header("Location: /admin/users");

        exit;
    });


    // Método editar usuário via post (ação do formulário)
    $app->post("/admin/users/:iduser", function($iduser){

        User::verifyLogin();

        $user = new User();

        $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

        $user->get((int)$iduser);

        $user->setData($_POST);

        $user->update();

        header("Location: /admin/users");

        exit;

    });

    $app->get("/admin/forgot", function(){

        $page = new PageAdmin([
            "header"=>false,
            "footer"=>false
        ]);

        $page->setTpl("forgot");

    });

    $app->post("/admin/forgot", function(){

        $user = User::getForgot($_POST["email"]);
        
    });

    // Método main da aplicação
    $app->run();