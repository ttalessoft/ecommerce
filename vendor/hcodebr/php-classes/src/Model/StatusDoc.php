<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;
    
    class StatusDoc extends Model{

        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT * FROM tb_status_doc ORDER BY status_doc;");
        }

        public function save(){

            $sql = new Sql();

            $results = $sql->select("CALL sp_status_doc_save(:id_status_doc, :status_doc, :data_cad, :data_edi);", array(
                ":id_status_doc"=>$this->getid_status_doc(),
                ":status_doc"=>$this->getstatus_doc(),
                ":data_cad"=>$data1 = date('Y-m-d H:i:s'),
                ":data_edi"=>$data2 = date('Y-m-d')
            ));

            $this->setData($results[0]);
            
        }

        public function get($id_status_doc){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_status_doc WHERE id_status_doc = :id_status_doc", [
                ":id_status_doc"=>$id_status_doc
            ]);

            $this->setData($results[0]);
        }

        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_status_doc WHERE id_status_doc = :id_status_doc", [
                ":id_status_doc"=>$this->getid_status_doc()
            ]);
        }
    }