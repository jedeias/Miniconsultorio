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

            $repositoryPatient = new repositoryPatient();
            $PkPatient = $repositoryPatient->getByEmail($obj->getPeople());

            $stmt = $this->conn->getConn()->prepare($query);

            $stmt->bindValue(':FkPatient', $PkPatient['PkPatient']);
            $stmt->bindValue(":FkFleag", 1);
            $stmt->bindValue(":notes", $obj->getNotes());
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: on save <br>' . $e->getMessage();
        }
    }
    public function update(object $obj){
        $query =    "UPDATE notesPatient set FkFleag = :FkFleag, notes = :notes
                    WHERE FkPatient = :FkPatient";
    
        try {

            $repositoryPatient = new repositoryPatient();
            $PkPatient = $repositoryPatient->getByEmail($obj->getPeople());

            $stmt = $this->conn->getConn()->prepare($query);

            $stmt->bindValue(':FkPatient', $PkPatient['PkPatient']);
            $stmt->bindValue(":FkFleag", 1);
            $stmt->bindValue(":notes", $obj->getNotes());
    
            $stmt->execute();

        } catch (PDOException $e) {
            echo 'Error: on update <br>' . $e->getMessage();
        }
    }
    public function delete(int $PkNotes)
    {
        $query = "DELETE FROM notesPatient WHERE PkNotesPatient = :PkNotesPatient";
    
        try {
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(":PkNotesPatient", $PkNotes);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error on delete: ' . $e->getMessage();
        }
    }
    public function getByID(int $obj){

    }
    public function getByPeople(object $obj){
        
        $query = "SELECT * FROM notesPatient
        INNER JOIN patient ON (patient.PkPatient = notesPatient.FkPatient)
        WHERE PkPatient = :PkPatient";
        

        try {

            $repositoryPatient = new repositoryPatient();
            $PkPatient = $repositoryPatient->getByEmail($obj->getPeople());

            $stmt = $this->conn->getConn()->prepare($query);

            $stmt->bindValue(':PkPatient', $PkPatient['PkPatient']);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo 'Error try getByPeople: <br>' . $e->getMessage();
        }
    }
    public function getTableDates(){
        $query = "SELECT * FROM notesPatient
        INNER JOIN patient ON (patient.PkPatient = notesPatient.FkPatient)";
        

        try {
            
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo 'Error try getTableDate: <br>' . $e->getMessage();
        }
    }

}

?>