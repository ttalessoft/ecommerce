<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;

    class Fornecedor extends model{

        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT * FROM tb_fornecedores ORDER BY nome_razao_social");

        }

        public function save(){

            $sql = new Sql();

            $results = $sql->select("CALL sp_fornecedores_save(
                :nome_razao_social,:apelido_nome_fantasia,
                :cpf_cnpj,:logradouro,:numero,:complemento,
                :cep,:bairro,:cidade,:uf,:email,:telefone_fixo,
                :telefone_celular,:tipo,:pessoa_contato,:obs
            )", array(
                ":nome_razao_social"=>$this->getnome_razao_social(),
                ":apelido_nome_fantasia"=>$this->getapelido_nome_fantasia(),
                ":cpf_cnpj"=>$this->getcpf_cnpj(),
                ":logradouro"=>$this->getlogradouro(),
                ":numero"=>$this->getnumero(),
                ":complemento"=>$this->getcomplemento(),
                ":cep"=>$this->getcep(),
                ":bairro"=>$this->getbairro(),
                ":cidade"=>$this->getcidade(),
                ":uf"=>$this->getuf(),
                ":email"=>$this->getemail(),
                ":telefone_fixo"=>$this->gettelefone_fixo(),
                ":telefone_celular"=>$this->gettelefone_celular(),
                ":tipo"=>$this->gettipo(),
                ":pessoa_contato"=>$this->getpessoa_contato(),
                ":obs"=>$this->getobs()
            ));
            
            $this->setData($results[0]);

        }

        public function get($idfornecedor){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_fornecedores WHERE idfornecedor = :idfornecedor", [
                
                ":idfornecedor"=>$idfornecedor
                
            ]);

            $this->setData($results[0]);
        }

        public function delete(){

            $sql = new Sql();

            $sql->query("DELETE FROM tb_fornecedores WHERE idfornecedor = :idfornecedor", [

                ":idfornecedor"=>$this->getidfornecedor()
            ]);
        }
    }