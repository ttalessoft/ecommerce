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

    // Renderiza a página de cadastro de clientes
    $app->get("/admin/clientes/create", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("clientes-create");

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

