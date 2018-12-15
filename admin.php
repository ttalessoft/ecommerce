<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

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
    
        // Método para carregar a página de esqueci a senha
        $app->get("/admin/forgot", function(){
    
            $page = new PageAdmin([
                "header"=>false,
                "footer"=>false
            ]);
    
            $page->setTpl("forgot");
    
        });
    
        // Método para enviar o e-mail para a função que envia o e-mail para o endereço de recuperaç;ao
        $app->post("/admin/forgot", function(){
    
            $user = User::getForgot($_POST["email"]);
    
            header("Location: /admin/forgot/sent");
    
            exit;
             
        });
    
        // Método que renderiza a página com a mensagem de e-mail enviado
        $app->get("/admin/forgot/sent", function(){
    
            $page = new PageAdmin([
                "header"=>false,
                "footer"=>false
            ]);
    
            $page->setTpl("forgot-sent");
    
        });
    
        // Método que válida e encripta o código do e-mail
        $app->get("/admin/forgot/reset", function(){
    
            $user = User::validForgotDecryt($_GET["code"]);
    
            $page = new PageAdmin([
                "header"=>false,
                "footer"=>false
            ]);
    
            $page->setTpl("forgot-reset", array(
    
                "name"=>$user["desperson"],
                "code"=>$_GET["code"]
    
            ));
        });
    
        // 
        $app->post("/admin/forgot/reset", function(){
    
            $userForgot = User::validForgotDecryt($_POST["code"]);
    
            User::setForgotUsed($userForgot["idrecovery"]);
    
            $user = new User();
    
            $user->get((int)$userForgot["iduser"]);
    
            $user->setPassword($_POST["password"]);
    
            $page = new PageAdmin([
    
                "header"=>false,
                "footer"=>false
    
            ]);
    
            $page->setTpl("forgot-reset-success");
    
        });