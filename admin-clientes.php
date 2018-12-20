<?php

    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    use \Hcode\Model\Cliente;

    $app->get("/admin/clientes", function(){

        User::verifyLogin();

        $clientes = Cliente::listAll();

       $page = new PageAdmin();

       $page->setTpl("clientes", [
           "clientes"=>$clientes
       ]);
        
    });

    $app->get("/admin/clientes/tipo", function(){

        User::verifyLogin();

        $page = new PageAdmin();
        
        $page->setTpl("clientes-tipo");
    });

    // Renderiza a página de cadastro de clientes pessoa física
    $app->get("/admin/clientes/create/pf", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("clientes-create-pf");

    });

    // Renderiza a página de cadastro de clientes pessoa jurídica
    $app->get("/admin/clientes/create/pj", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("clientes-create-pj");

    });

    $app->post("/admin/clientes/create", function(){

        User::verifyLogin();

        $cliente = new Cliente();

        $cliente->setData($_POST);

        $cliente->save();

        header("Location: /admin/clientes");

        exit;
    });

    $app->get("/admin/clientes/:idcliente", function($idcliente){

        User::verifyLogin();

        $cliente = new Cliente();

        $cliente->get((int)$idcliente);

        $page = new PageAdmin();

        $page->setTpl("clientes-update", [

            "cliente"=>$cliente->getValues()

        ]);
    });

    $app->post("/admin/clientes/:idcliente", function($idcliente){

        User::verifyLogin();

        $cliente = new Cliente();

        $cliente->get((int)$idcliente);

        $cliente->setData($_POST);

        $cliente->save();

        header("Location: /admin/clientes");

        exit;
    });

    $app->get("/admin/clientes/:idcliente/delete", function($idcliente){

        User::verifyLogin();

        $cliente = new Cliente();

        $cliente->get((int)$idcliente);

        $cliente->delete();

        header("Location: /admin/clientes");

        exit;
    });

