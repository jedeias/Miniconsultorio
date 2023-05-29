<?php

class repositoryNotesPatient implements RepositoryNotesInterface{

    private $conn;

    public function __construct() {
        $this->conn = new Connect();
    }

    public function save(object $obj)
    {
        $query = "INSERT INTO notesPatient (FkPatient, FkFleag, notes) 
                  VALUES (:FkPatient, :FkFleag, :notes)";
    
        try {
            $repositoryPatient = new RepositoryPatient();
            $stmt = $this->conn->getConn()->prepare($query);
            
            var_dump($repositoryPatient->getByEmail($obj->getPeople()->getEmail()));

            //$stmt->bindValue(':FkPatient', $repositoryPatient->getByEmail($obj->getPeople()->getEmail())['email']);
            $stmt->bindValue(":FkFleag", 1);
            $stmt->bindValue(":notes", $obj->getNotes());
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function update(object $obj){

    }
    public function delete(object $obj){

    }
    public function getByID(object $obj){

    }
    public function getByPeople(object $obj){

    }
    public function getTableDates(){
        
    }

}

?>