<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;
    use \Hcode\Mailer;

    use \Hcode\Model\Fornecedor;
    
    class DocPagar extends Model{

        // Realiza o select de todos os dados do banco
        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT 
            id_doc_pagar,
            tb_doc_pagar.id_fornecedor,
            nome_razao_social,
            tb_doc_pagar.id_centro_de_custo,
            centro_de_custo,
            tb_doc_pagar.id_status_doc,
            status_doc,
            vlr_doc,
            data_emissao,
            data_vencimento    
        from 
            (((tb_doc_pagar
            inner join tb_fornecedores on tb_doc_pagar.id_fornecedor = tb_fornecedores.idfornecedor)
            inner join tb_centro_de_custos on tb_doc_pagar.id_centro_de_custo = tb_centro_de_custos.id_centro_de_custo)
            inner join tb_status_doc on tb_doc_pagar.id_status_doc = tb_status_doc.id_status_doc)
        order by
            data_vencimento desc;");            

        }

        // Salva registro no banco
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

                ":data_emissao"=>formataDateYmd($this->getdata_emissao()),
                ":data_vencimento"=>formataDateYmd($this->getdata_vencimento()),
                ":data_protesta_em"=>formataDateYmd($this->getdata_protesta_em()),
                ":data_cri"=>$data_cri = date('Y-m-d H:i:s'),
                ":data_edi"=>'',

                ":vlr_doc"=>formataPrecoBanco($this->getvlr_doc()),
                ":vlr_pago"=>formataPrecoBanco($this->getvlr_pago())
            ));

            $this->setData($results[0]);
        }

        // Pega o registro no banco a partir do $id
        public function get($id_doc_pagar){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_doc_pagar WHERE id_doc_pagar = :id_doc_pagar", [

                ":id_doc_pagar"=>$id_doc_pagar
            ]);

            $this->setData($results[0]);
        }

        // Exclui o registro
        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_doc_pagar WHERE id_doc_pagar = :id_doc_pagar", [
                ":id_doc_pagar"=>$this->getid_doc_pagar()
            ]);
        }

    }