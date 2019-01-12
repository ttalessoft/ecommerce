<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    class DocPagar extends Model{

        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT * FROM tb_doc_pagar");
        }
    }