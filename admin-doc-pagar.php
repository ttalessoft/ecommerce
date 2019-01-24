<?php

    use \Hcode\PageAdmin;
    use \Hcode\Model\User;
    
    use \Hcode\Model\DocPagar;
    use \Hcode\Model\Fornecedor;
    use \Hcode\Model\TipoDoc;
    use \Hcode\Model\CentroDeCustos;
    use \Hcode\Model\StatusDoc;

    // Renderiza a página de todos os documentos pagos/pagar
    $app->get("/admin/contas", function(){

        User::verifyLogin();

        $docs_pagar = DocPagar::listAll();

        $page = new PageAdmin();

        $page->setTpl("docs-pagar", array(
            "docs_pagar"=>$docs_pagar
        ));
    });

    // renderiza a página de contas pagas/pagar
    $app->get("/admin/contas/nova", function(){

        User::verifyLogin();

        $fornecedores = Fornecedor::listAll();
        $tipos_doc = TipoDoc::listAll();
        $centro_de_custos = CentroDeCustos::listAll();
        $status_docs = StatusDoc::listAll();

        $page = new PageAdmin();

        $page->setTpl("docs-pagar-create", array(
            "fornecedores"=>$fornecedores,
            "tipos_doc"=>$tipos_doc,
            "centro_de_custos"=>$centro_de_custos,
            "status_docs"=>$status_docs
        ));
    });

    // salva dados no banco
    $app->post("/admin/contas/nova", function(){

        User::verifyLogin();

        $conta = new DocPagar();

        $conta->setData($_POST);

        $conta->save();     

        header("Location: /admin/contas");

        exit;
    });

    // Carrega página com o id do registro para edição
    $app->get("/admin/contas/:id_doc_pagar/delete", function($id_doc_pagar){

        User::verifyLogin();

        $conta = new DocPagar();

        $conta->get((int) $id_doc_pagar);

        $conta->delete();

        header("Location: /admin/contas");
        exit;
    });