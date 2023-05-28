<?php   

Class ReposytoryPsychologist extends Reposytory implements repositoryReadInterface{

    private Psychologist $psychologist;

    public function __construct($psychologist){
        $this->psychologist = $psychologist;
    }
    public function save(){

    }

    public function update(){

    }
    public function delete(){

    }

    public function getByEmail(psychologist $psychologist){
        
    }

    public function getById(psychologist $psychologist){
        
    }

    public function getTableDates(){
        
    }

}

?>