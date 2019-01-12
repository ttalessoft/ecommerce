<?php

    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    use \Hcode\Model\TipoDoc;

    // Renderia a página com todas os Tipos de Documento e os lista
    $app->get("/admin/tiposdoc", function(){

        User::verifyLogin();

        $tiposdoc = TipoDoc::listAll();

        $page = new PageAdmin();

        $page->setTpl("tiposdoc", [
           "tiposdoc"=>$tiposdoc
        ]);
        
    });

    // Renderiza a página de cadastro de tipos de documentos
    $app->get("/admin/tiposdoc/create", function(){

        User::verifyLogin();

        $page = new PageAdmin();

        $page->setTpl("tiposdoc-create");

    });

    // Realiza a rotina de armazenamento dos dados no banco
    $app->post("/admin/tiposdoc/create", function(){

        User::verifyLogin();

        $tipodoc = new TipoDoc();

        $tipodoc->setData($_POST);

        $tipodoc->save();

        header("Location: /admin/tiposdoc");

        exit;
    });

    // Renderiza a página de update de tipos de documento e leva o id do dado a ser editado
    $app->get("/admin/tipodoc/:idtipodoc", function($idtipodoc){

        User::verifyLogin();

        $tipodoc = new TipoDoc();

        $tipodoc->get((int)$idtipodoc);

        $page = new PageAdmin();

        $page->setTpl("tiposdoc-update", [

            "tipodoc"=>$tipodoc->getValues()

        ]);
    });

    // Realiza a edição dos dados no banco de dados
    $app->post("/admin/tipodoc/:idtipodoc", function($id_tipo_doc){

        User::verifyLogin();

        $tipodoc = new TipoDoc();

        $tipodoc->get((int)$id_tipo_doc);

        $tipodoc->setData($_POST);

        $tipodoc->save();

        header("Location: /admin/tiposdoc");

        exit;
    });

    $app->get("/admin/tiposdoc/:id_tipo_doc/delete", function($id_tipo_doc){

        User::verifyLogin();

        $tipodoc = new TipoDoc();

        $tipodoc->get((int)$id_tipo_doc);

        $tipodoc->delete();

        header("Location: /admin/tiposdoc");

        exit;
    });

