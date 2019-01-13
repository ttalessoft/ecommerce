<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    use \Hcode\Fornecedor;
    use \Hcode\TipoDoc;
    use \Hcode\CentroDeCustos;
    use \Hcode\StatusDoc;
    use \Hcode\User;

    class DocPagar extends Model{

        public static function listAll(){

            $sql = new Sql();

            $fornecedor = new Fornecedor();
            $tipo_doc = new TipoDoc();
            $centro_de_custos = new CentroDeCustos();
            $status_doc = new StatusDoc();

            return $results = $sql->select("CALL sp_doc_pagar_save()", array(
                
            ));

            $this->setData($results[0]);

        }

    }