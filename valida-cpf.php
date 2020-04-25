<?php

function validaCpf($cpfV){
    $cpf = preg_replace( '/[^0-9]/is', '', $cpfV);

    if(strlen($cpf) == 11){

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        else{
            for ($t = 9; $t < 11; $t++){
                for ($d = 0, $c = 0; $c < $t; $c++){
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                
                $d = ((10 * $d) % 11) % 10;
                
                if ($cpf{$c} != $d){
                    return false;
                }
            }
            return true;
        }

    }
    else{
        return false;
    }

}
