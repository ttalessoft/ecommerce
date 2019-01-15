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

    function formataDateYmd($date){
        return date('Y-m-d', strtotime($date));
    }

    function formataDatedmY($date){
        return date('d-m-Y', strtotime($date));
    }

    function limitaString(String $string){
        return substr($string, 0, 20);
    }