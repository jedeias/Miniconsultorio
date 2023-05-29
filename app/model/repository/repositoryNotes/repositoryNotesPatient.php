<?php

class repositoryNotesPatient implements RepositoryNotesInterface{

    private $conn;

    public function __construct() {
        $this->conn = new Connect();
        $this->conn = $this->conn->getConn();
    }

    public function save(Patient $obj){
        
    }
    public function update(Patient $obj){

    }
    public function delete(Patient $obj){

    }
    public function getByID(Patient $obj){

    }
    public function getByPeople(Patient $obj){

    }
    public function getTableDates(){
        
    }

}

?>