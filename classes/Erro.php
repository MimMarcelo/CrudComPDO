<?php

class Erro {
    
public static function tratarErro(Exception $e){
    if (DEBUG) {
        echo "<pre>";
        print_r($e);
        echo "</pre>";
    } else {
        echo $e->getMessage();
    }
    exit();
}

}
