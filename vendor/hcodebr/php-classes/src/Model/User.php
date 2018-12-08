<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;

    class User{

        // Função para validar login
        public static function login($login, $password){

            $sql = new Sql();

            // Busca no banco se aquele usuário existe
            $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(

                ":LOGIN"=>$login

            ));

            // Estoura uma excessão pelo usuário não existir
            if (count($results) === 0) {
                
                throw \Exception("Usuário inexistente ou senha inválida.");

            }

            // Se existe seta os dados na variável $data
            $data = $results[0];

            // Verifica se a senha informada é igual a que está no banco
            if (password_verify($password, $data["despassword"]) === true) {
                
                $user = new User();

    
            }else{

                // Estoura uma excessão pela senha ser inválida
                throw new \Exception("Usuário inexistente ou senha inválida.");

            }
        }
    }