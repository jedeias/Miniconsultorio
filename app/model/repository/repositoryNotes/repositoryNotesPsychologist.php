<?php

class repositoryNotesPsychologist  implements RepositoryNotesInterface{

    private $conn;

    public function __construct() {
        $this->conn = new Connect();
        $this->conn = $this->conn->getConn();
    }

    public function save(Psychologist $obj){
        
    }
    public function update(Psychologist $obj){

    }
    public function delete(Psychologist $obj){

    }
    public function getByID(Psychologist $obj){

    }
    public function getByPeople(Psychologist $obj){

    }
    public function getTableDates(){
        
    }

}

?>