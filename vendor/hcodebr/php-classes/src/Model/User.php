<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;

    class User extends Model{

        const SESSION = "User";

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

                $user->setData($data);

                // Define uma sessão com o nome do usuário que conseguiu logar
                $_SESSION[User::SESSION] = $user->getValues();

                return $user;
    
            }else{

                // Estoura uma excessão pela senha ser inválida
                throw new \Exception("Usuário inexistente ou senha inválida.");

            }
        }

        public static function verifyLogin($inadmin = true){

            if (!isset($_SESSION[User::SESSION]) || !$_SESSION[User::SESSION] || !(int)$_SESSION[User::SESSION]["iduser"] > 0 || (bool)$_SESSION[User::SESSION]["inadmin"]) {
                
                header("Location: /admin/login");
                
                exit;

            }
        }
    }