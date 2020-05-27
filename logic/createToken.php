<?php
class createToken{
    public function get_token(
            $size = 64,
            $number = true,
            $simbol = false,
            $low = true,
            $upper = true
      ){
            $up = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
            $lo = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras upper
            $nu = "0123456789"; // $nu contem os números
            $si = "!@#$%¨&*()_+="; // $si contem os símbolos
            $token = '';
            if ($low){
                // se $low for "true", a variável $ma é embaralhada e adicionada para a variável $senha
                $token .= str_shuffle($up);
            }
        
            if ($upper){
                // se $upper for "true", a variável $mi é embaralhada e adicionada para a variável $token
                $token .= str_shuffle($lo);
            }
        
            if ($number){
                // se $number for "true", a variável $nu é embaralhada e adicionada para a variável $token
                $token .= str_shuffle($nu);
            }
        
            if ($simbol){
                // se $simbol for "true", a variável $si é embaralhada e adicionada para a variável $token
                $token .= str_shuffle($si);
            }
        
            // retorna a token embaralhada com "str_shuffle" com o size definido pela variável $size
            return substr(str_shuffle($token),0,$size);
      }
}
?>