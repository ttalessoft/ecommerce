<?php

    namespace Hcode\Model;

    use \Hcode\DB\Sql;
    use \Hcode\Model;

    class User extends Model{

        const SESSION = "User";
        const SECRET = "NEXTTec_sis_php7";

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

            if (
                !isset($_SESSION[User::SESSION]) || 
                !$_SESSION[User::SESSION] || 
                !(int)$_SESSION[User::SESSION]["iduser"] > 0 || 
                (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin) {
                
                header("Location: /admin/login");
                
                exit;

            }
        }

        public static function logout(){

            $_SESSION[User::SESSION] = NULL;

        }

        public static function listAll(){

            $sql = new Sql();

            return $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
            
        }

        public function save(){

            $sql = new Sql();

            $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
                "desperson"=>$this->getdesperson(),
                "deslogin"=>$this->getdeslogin(),
                "despassword"=>$this->getdespassword(),
                "desemail"=>$this->getdesemail(),
                "nrphone"=>$this->getnrphone(),
                "inadmin"=>$this->getinadmin()
            ));

            $this->setData($results[0]);

        }

        public function get($iduser){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(

                ":iduser"=>$iduser

            ));

            $this->setData($results[0]);
        }

        public function update(){

            $sql = new Sql();

            $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(

                "iduser"=>$this->getiduser(),
                "desperson"=>$this->getdesperson(),
                "deslogin"=>$this->getdeslogin(),
                "despassword"=>$this->getdespassword(),
                "desemail"=>$this->getdesemail(),
                "nrphone"=>$this->getnrphone(),
                "inadmin"=>$this->getinadmin()
                
            ));

            $this->setData($results[0]);

        }

        public function delete(){

            $sql = new Sql();

            $sql->query("CALL sp_users_delete(:iduser)", array(

                ":iduser"=>$this->getiduser()

            ));
        }

        public static function getForgot($email){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.desemail = :EMAIL", array(
                ":EMAIL"=>$email
            ));
            
            if(count($results) === 0){

                throw new \Exception("Não foi possível recuperar a senha.");

            }else{

                $data = $results[0];

                $results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:IDUSER, :DESIP)", array(

                    ":IDUSER"=>$data["iduser"],
                    ":DESIP"=>$_SERVER["REMOTE_ADDR"]

                ));

                if(count($results2) === 0){

                   throw new \Exception("Não foi possível recuperar a senha");

                }else{

                    $dataRecovery = $results2[0];

                    $code = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, User::SECRET, $dataRecovery["idrecovery"], MCRYPT_MODE_ECB));

                    $link = "http://local.ecommerce.com.br/admin/forgot/reset?code=$code";

                    $mailer = new Mailer($data["desemail"], $data["desperson"], "Redefinir senha NEXTTec", "forgot", array(

                        "name"=>$data["desperson"],
                        "link"=>$link

                    ));

                    $mailer->send();

                    return $data;

                }

            }
            
        }
    }