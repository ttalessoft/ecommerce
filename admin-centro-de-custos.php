<?php

    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    use \Hcode\Model\CentroDeCustos;

    // Carrega página e lista todos os CC
    $app->get("/admin/centro-de-custos", function(){

        User::verifyLogin();

        $centro_de_custos = CentroDeCustos::listAll();

        $page = new PageAdmin();

        // página html a se referenciar
        $page->setTpl("centro-de-custos", [
            
            // variável que irá povoar a página
            "centro_de_custos"=>$centro_de_custos
        ]);
    });

    // Carrega página para criar novo registro (renderiza página)
    $app->get("/admin/centro-de-custos/create", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("centro-de-custos-create");

    });

    // Cria novo registro no banco (realiza edição no banco)
    $app->post("/admin/centro-de-custos/create", function(){

        User::verifyLogin();

        $centro_de_custos = new CentroDeCustos();

        $centro_de_custos->setData($_POST);

        $centro_de_custos->save();

        header("Location: /admin/centro-de-custos");

        exit;
    });

    // Carrega página com id do registro para ação
    $app->get("/admin/centro-de-custos/:id_centro_de_custo", function($id_centro_de_custo){

        User::verifyLogin();

        $centro_de_custo = new CentroDeCustos();

        $centro_de_custo->get((int)$id_centro_de_custo);

        $page = new PageAdmin();

        $page->setTpl("centro-de-custos-update", [

            'centro_de_custo'=>$centro_de_custo->getValues()
        ]);

    });

    // Edita item no banco a partir do id do registro
    $app->post("/admin/centro-de-custos/:id_centro_de_custo", function($id_centro_de_custo){

        User::verifyLogin();

        $centro_de_custo = new CentroDeCustos();

        $centro_de_custo->get((int)$id_centro_de_custo);

        $centro_de_custo->setData($_POST);

        $centro_de_custo->save();

        header("Location: /admin/centro-de-custos");

        exit;

    });

    // Deleta um item a partir do id de um registro
    $app->get("/admin/centro-de-custos/:id_centro_de_custo/delete", function($id_centro_de_custo){

        User::verifyLogin();

        $centro_de_custo = new CentroDeCustos();

        $centro_de_custo->get((int)$id_centro_de_custo);

        $centro_de_custo->delete();

        header('Location: /admin/centro-de-custos');

        exit;

    });

