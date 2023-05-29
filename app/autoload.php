<?php
function autoload($className){
    $dirs = array(
        "controller/",
        "view/",
        "model/",
        "../controller/",
        "../view/",
        "../model/",
        "../model/useCases/",
        "model/useCases/",
        "model/useCases/notes/",
        "model/useCases/repository/",
        "model/useCases/flags/",
        "model/entities/",
        "model/useCases/entities/flags/",
        "model/useCases/repository/repositoryFlags/",
        "model/useCases/repository/repositoryNotes/",
        "model/useCases/people/",
        "model/useCases/repository/"
    );

    foreach ($dirs as $dir) {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/miniconsultorio/app/' . $dir . $className . '.php';

        if (file_exists($file)) {
            require_once($file);
    
        }

    }
}

spl_autoload_register('autoload');

?>