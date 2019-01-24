<?php

    function formataPreco(float $vlr){
        
        return number_format($vlr, 2, ",", ".");
    }

    function formataPrecoBanco($vlr) {
        $verificaPonto = ".";
        if(strpos("[".$vlr."]", "$verificaPonto")):
            $vlr = str_replace('.','', $vlr);
            $vlr = str_replace(',','.', $vlr);
            else:
              $vlr = str_replace(',','.', $vlr);   
        endif;
 
        return $vlr;
    }

    // Formata data para o padrão SQL
    function formataDateYmd($date){
        return date('Y-m-d', strtotime($date));
    }

    // Formata data para o padrão brasileiro
    function formataDatedmY($date){
        return date('d-m-Y', strtotime($date));
    }

    // Limita o tamanho de uma String
    function limitaString(String $string){
        return substr($string, 0, 20);
    }

    // Soma dias em uma data para a salvar no banco
    function somaDataSql($data, $dias){
        return date('Y-m-d', strtotime('+' . $dias . ' days', strtotime($data)));
    }

    // Soma dais em uma data para a mostrar em um formulári
    function somaDataForm($data, $dias){
        return date('d-m-Y', strtotime('+' . $dias . ' days', strtotime($data)));
    }