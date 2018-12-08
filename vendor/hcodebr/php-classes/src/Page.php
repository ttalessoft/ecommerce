<?php

    // Definindo o namespace da classe Page
    namespace Hcode;

    // Definindo que a classe Page utiliza métodos da classe Rain\Tpl (layouts)
    use Rain\Tpl;


    class Page{

        // Variável que irá guardar as informações da classe Page
        private $tpl;
        private $options = [];
        private $defaults = [
           "data"=>[] 
        ];

        // Método construtor de páginas
        public function __construct($opts = array()){

            $this->options = array_merge($this->defaults, $opts);

            // config
            $config = array(
                "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . "/views/",
                "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
                "debug"         => false // set to false to improve the speed
            );

            // Atribui ao obj as configurações informadas acima
            Tpl::configure( $config );

            // Estanciamos um novo obj do tipo Tpl para trabalhar com a pagina
            $this->tpl = new Tpl;

            $this->setData($this->options["data"]);

            $this->tpl->draw("header");

        }

        // Metodo para inserir os dados no obj
        private function setData($data = array()){

            foreach($data as $key => $value){

                $this->tpl->assign($key, $value);

            }

        }

        public function setTpl($name, $data = array(), $returnHTML = false){

            $this->setData($data);

            return $this->tpl->draw($name, $returnHTML);
            
        }

        // Métodos destrutores de páginas
        public function __destruct(){

            $this->tpl->draw("footer");

        }
    }