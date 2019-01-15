<?php

    function formataPreco(float $vlr){
        
        return number_format($vlr, 2, ",", ".");
    }

    function formataDateYmd($date){
        return date('Y-m-d', strtotime($date));
    }

    function formataDatedmY($date){
        return date('d-m-Y', strtotime($date));
    }