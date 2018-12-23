<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Cliente extends Model{

    public static function listAll(){

        $sql = new Sql();

        return $results = $sql->select("SELECT * FROM tb_clientes ORDER BY nome_razao_social");

    }

    public function save(){

        date_default_timezone_set('America/Sao_Paulo');

        $sql = new Sql();

        $results = $sql->select("CALL sp_clientes_save(:idcliente,:nome_razao_social,:apelido_nome_fantasia,:cpf_cnpj, :data_nascimento, :logradouro,:numero,:complemento,:cep,:bairro,:cidade,:uf,:email,:telefone_fixo,:telefone_celular,:tipo,:pessoa_contato,:obs,:data_registro)", array(
            ":idcliente"=>$this->getidcliente(),
            ":nome_razao_social"=>$this->getnome_razao_social(),
            ":apelido_nome_fantasia"=>$this->getapelido_nome_fantasia(),
            ":cpf_cnpj"=>$this->getcpf_cnpj(),
            ":data_nascimento"=>date("Y-m-d", strtotime($this->getdata_nascimento())),
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
            ":obs"=>$this->getobs(),
            ":data_registro"=>$date2 = date('Y-m-d H:i:s')
        ));
        
        $this->setData($results[0]);

    }

    public function get($idcliente){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_clientes WHERE idcliente = :idcliente", [
            
            ":idcliente"=>$idcliente
            
        ]);

        $this->setData($results[0]);
    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_clientes WHERE idcliente = :idcliente", [

            ":idcliente"=>$this->getidcliente()
        ]);
    }
}