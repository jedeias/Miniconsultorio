<?php

class Session implements sessionInterface{
    
    public function __construct() {
        session_start();
    }

    public function get($value){
        if ($_SESSION["$value"] == null){
            return null;
        }else{
            return $_SESSION["$value"];
        }
    }

    public function set($session, $value){
        $_SESSION["$session"] = $value;
    }

    public function destroy(){
        session_destroy();
    }
    
}

?>