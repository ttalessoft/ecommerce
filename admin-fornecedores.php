<?php

    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    use \Hcode\Model\Fornecedor;

    $app->get("/admin/fornecedores", function(){

        User::verifyLogin();

        $fornecedores = Fornecedor::listAll();

       $page = new PageAdmin();

       $page->setTpl("fornecedores", [
           "fornecedores"=>$fornecedores
       ]);
        
    });

    // Renderiza a página para seleção do tipo de Fornecedor pf/pj
    $app->get("/admin/fornecedores/tipo", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("fornecedores-tipo");
    });

    // Renderiza a página de cadastro de Fornecedor pf
    $app->get("/admin/fornecedores/create/pf", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("fornecedores-create-pf");

    });


    // Renderiza a página de cadastro de Fornecedores pj
    $app->get("/admin/fornecedores/create/pj", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("fornecedores-create-pj");

    });

    $app->post("/admin/fornecedores/create", function(){

        User::verifyLogin();

        $fornecedor = new Fornecedor();

        $fornecedor->setData($_POST);

        $fornecedor->save();

        header("Location: /admin/fornecedores");

        exit;
    });

    $app->get("/admin/fornecedores/:idfornecedor", function($idfornecedor){

        User::verifyLogin();

        $fornecedor = new Fornecedor();

        $fornecedor->get((int)$idfornecedor);

        $page = new PageAdmin();

        $page->setTpl("fornecedores-update", [

            "fornecedor"=>$fornecedor->getValues()

        ]);
    });

    $app->post("/admin/fornecedores/:idfornecedor", function($idfornecedor){

        User::verifyLogin();

        $fornecedor = new Fornecedor();

        $fornecedor->get((int)$idfornecedor);

        $fornecedor->setData($_POST);

        $fornecedor->save();

        header("Location: /admin/fornecedores");

        exit;
    });

    $app->get("/admin/fornecedores/:idfornecedor/delete", function($idfornecedor){

        User::verifyLogin();

        $fornecedor = new Fornecedor();

        $fornecedor->get((int)$idfornecedor);

        $fornecedor->delete();

        header("Location: /admin/fornecedores");

        exit;
    });

