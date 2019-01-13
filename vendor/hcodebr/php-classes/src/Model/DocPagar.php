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

            return $results = $sql->select("SELECT * FROM tb_doc_pagar ORDER BY data_vencimento ASC");

        }

        public function save(){

            $sql = new Sql();

            return $results = $sql->select("CALL sp_doc_pagar_save(:id_doc_pagar,:id_fornecedor,:id_tipo_doc,:id_centro_de_custo,:id_status_doc,:sr_doc,:num_doc,:obs,:data_emissao,:data_vencimento,:data_protesta_em,:data_cri,:data_edi,:vlr_doc,:vlr_pago)", 
            array(
                ":id_doc_pagar"=>$this->getid_doc_pagar(),
                ":id_fornecedor"=>$this->getid_fornecedor(),
                ":id_tipo_doc"=>$this->getid_tipo_doc(),
                ":id_centro_de_custo"=>$this->getid_centro_de_custo(),
                ":id_status_doc"=>$this->getid_status_doc(),
                ":sr_doc"=>$this->getsr_doc(),
                ":num_doc"=>$this->getnum_doc(),
                ":obs"=>$this->getobs(),
                ":data_emissao"=>$this->getdata_emissao(),
                ":data_vencimento"=>$this->getdata_vencimento(),
                ":data_protesta_em"=>$this->getdata_protesta_em(),
                ":data_cri"=>$data_cri = date('Y-m-d H:i:s'),
                ":data_edi"=>$data_edi = date('Y-m-d H:i:s'),
                ":vlr_doc"=>$this->getvlr_doc(),
                ":vlr_pago"=>$this->getvlr_pago()
            ));

            $this->setData($results[0]);
        }

        public function get($id_doc_pagar){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_doc_pagar WHERE id_doc_pagar = :id_doc_pagar", [

                ":id_doc_pagar"=>$id_doc_pagar
            ]);

            $this->setData($results[0]);
        }

        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_doc_pagar WHERE id_doc_pagar = :id_doc_pagar", [
                ":id_doc_pagar"=>$this->getid_doc_pagar()
            ]);
        }

    }