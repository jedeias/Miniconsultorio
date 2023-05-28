<?php
function autoload($className){

$dirs = array(  "controller/",
                "model/",
                "view/",
                "../controller/",
                "../model/",
                "../view/");

foreach($dirs as $dir){

    $file = (($_SERVER['DOCUMENT_ROOT'].'/miniconsultorio/app/'."$dir" . "$className" . ".php"));

    if(file_exists($file)){
        
        require_once($file);
    
    }
}

}

spl_autoload_register('autoload');
?>