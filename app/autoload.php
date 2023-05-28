<?php
function autoload($className){

$dirs = array(  "controller/",
                "view/",
                "model/",
                "../controller/",
                "../view/",
                "../model/",
                "model/flags/",
                "model/notes/",
                "model/repository/",
                "model/repository/repositoryFlags/",
                "model/repository/repositoryNotes/",

            );

foreach($dirs as $dir){

    $file = (($_SERVER['DOCUMENT_ROOT'].'/miniconsultorio/app/'."$dir" . "$className" . ".php"));

    if(file_exists($file)){
        
        require_once($file);

    }
}

}

spl_autoload_register('autoload');
?>