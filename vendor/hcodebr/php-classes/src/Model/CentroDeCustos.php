<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    class CentroDeCustos extends Model{

        public static function listAll(){

            $sql = new Sql();
            return $results = $sql->select("SELECT * FROM tb_centro_de_custos order by centro_de_custo;");
        }

        public function save(){

            $sql = new Sql();
            $results = $sql->select("CALL sp_centro_de_custos_save(
                :id_centro_de_custos,
                :centro_de_custo,
                :tipo_movimento,
                :data_cri,
                :data_edi);", array(
                
                ":id_centro_de_custos"=>$this->getid_centro_de_custo(),
                ":centro_de_custo"=>$this->getcentro_de_custo(),
                ":tipo_movimento"=>$this->gettipo_movimento(),
                ":data_cri"=>$date2 = date('Y-m-d H:i:s'),
                ":data_edi"=>$date3 = date('Y-m-d H:i:s')
            ));

            $this->setData($results[0]);
        }

        public function get($id_centro_de_custo){
            
            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_centro_de_custos WHERE id_centro_de_custo = :id_centro_de_custo", [
               
                ":id_centro_de_custo"=>$id_centro_de_custo

            ]);

            $this->setData($results[0]);
        }

        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_centro_de_custos WHERE id_centro_de_custo = :id_centro_de_custo", [

                ":id_centro_de_custo"=>$this->getid_centro_de_custo()
                
            ]);
        }
    }