<?php   

Class ReposytoryPsychologist extends Reposytory implements repositoryReadInterface{

    private $conn;

    public function __construct(){
        $this->conn = new Connect;
    }
    public function save(Psychologist $psychologist){

    }

    public function update(Psychologist $psychologist){

    }
    public function delete(Psychologist $psychologist){

    }

    public function getByEmail(Psychologist $psychologist){
        
    }

    public function getById(Psychologist $psychologist){
        
    }

    public function getTableDates(){
        
    }

}

?>