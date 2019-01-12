<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\StatusDoc;


// Lista todos
$app->get("/admin/status-docs", function(){
    
    User::verifyLogin();

    $status_docs = StatusDoc::listAll();

    $page = new PageAdmin();

    $page->setTpl("status-docs", [

        'status_docs'=>$status_docs
    ]);

});

// renderiza página create
$app->get("/admin/status-docs/create", function(){

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("status-docs-create");

});

// salva no banco
$app->post("/admin/status-docs/create", function(){

    User::verifyLogin();

    $status_doc = new StatusDoc();

    $status_doc->setData($_POST);

    $status_doc->save();

    header("Location: /admin/status-docs");

    exit;

});

// exclui dados no banco
$app->get("/admin/status-doc/:id_status_doc/delete", function($id_status_doc){

    User::verifyLogin();

    $status_doc = new StatusDoc();

    $status_doc->get((int)$id_status_doc);

    $status_doc->delete();

    header("Location: /admin/status-docs");

    exit;
});

// renderiza página update
$app->get("/admin/status-doc/:id_status_doc", function($id_status_doc){

    User::verifyLogin();

    $status_doc = new StatusDoc();

    $status_doc->get((int)$id_status_doc);

    $page = new PageAdmin();

    $page->setTpl("status-docs-update", [
        "status_doc"=>$status_doc->getValues()
    ]);

});

// edita dados no banco
$app->post("/admin/status-doc/:id_status_doc", function($id_status_doc){

    User::verifyLogin();

    $status_doc = new StatusDoc();

    $status_doc->get((int)$id_status_doc);

    $status_doc->setData($_POST);

    $status_doc->save();

    header("Location: /admin/status-docs");

    exit;

});

// renderiza página status-doc
$app->get("/categories/:id_status_doc", function($id_status_doc){

    $status_doc = new StatusDoc();

    $status_doc->get((int)$id_status_doc);

    $page = new Page();

    $page->setTpl("status-doc", [

        "status_doc"=>$status_doc->getValues(),
        "status_doc"=>[]   
    ]);
});