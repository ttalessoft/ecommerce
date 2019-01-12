<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    class TipoDoc extends Model{

        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT * FROM tb_tipo_doc order by tipo_doc");
        }

        public function save(){

            $sql = new Sql();

            $results = $sql->select("CALL sp_tipo_doc_save(:id_tipo_doc, :tipo_doc, :data_cad, :data_edi)", array(
                ":id_tipo_doc"=>$this->getid_tipo_doc(),
                ":tipo_doc"=>$this->gettipo_doc(),
                ":data_cad"=>$date2 = date('Y-m-d H:i:s'),
                ":data_edi"=>$date3 = date('Y-m-d H:i:s')
            ));

            $this->setData($results[0]);
        }

        public function get($id_tipo_doc){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_tipo_doc WHERE id_tipo_doc = :id_tipo_doc", [

                ":id_tipo_doc"=>$id_tipo_doc

            ]);

            $this->setData($results[0]);
        }

        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_tipo_doc WHERE id_tipo_doc = :id_tipo_doc", [
                ":id_tipo_doc"=>$this->getid_tipo_doc()
            ]);
        }

    }