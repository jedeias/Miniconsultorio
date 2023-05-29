<?php

class repositoryNotesPsychologist implements RepositoryNotesInterface{

    private $conn;

    public function __construct() {
        $this->conn = new Connect();
    }

    public function save(object $obj)
    {
        $query = "INSERT INTO notespsychologist 
        (FkPsychologist, FkNotesPatient, notes)
        VALUES
        (:FkPsychologist, :FkNotesPatient, :notes)";
    
        try {

            $repositoryPsychologist = new RepositoryPsychologist();
            $PkPsychologist = $repositoryPsychologist->getByEmail($obj->getPeople());

            $repositoryPatient = new repositoryPatient();
            $PkPatient = $repositoryPatient->getByEmail($obj->getNotesPatient()->getPeople());

            $stmt = $this->conn->getConn()->prepare($query);

            $stmt->bindValue(':FkPsychologist', $PkPsychologist['PkPsychologist']);
            $stmt->bindValue(":FkNotesPatient", $PkPatient['PkPatient']);
            $stmt->bindValue(":notes", $obj->getNotes());
    
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: on save <br>' . $e->getMessage();
        }
    }
    public function update(object $obj){

        //stop the prodution process

        $query = "UPDATE notespsychologist SET
                    notes = :notes
                  WHERE PkPsychologist = :PkPsychologist";
        
        try {

            $stmt = $this->conn->getConn()->prepare($query);

            $infos = $this->getAllInfoByEmail($obj->getPeople());

            var_dump($infos);

            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: on update <br>' . $e->getMessage();
        }
    }
    
    public function delete(int $PkNotesPsychologist)
    {
        $query = "DELETE FROM notesPsychologist WHERE PkNotesPsychologist = :PkNotesPsychologist";
        
        try {
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(":PkNotesPsychologist", $PkNotesPsychologist);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error on delete: ' . $e->getMessage();
        }
    }

    public function getByID(int $PK){
        $query = "SELECT * FROM notespsychologist WHERE PkNotesPsychologist = :PkNotesPsychologist";
    
        try {
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->bindValue(':PkNotesPsychologist', $PK);
            $stmt->execute();
    
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            echo 'Error trying to get data by ID: <br>' . $e->getMessage();
        }
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
            echo 'Error try getTableDates: <br>' . $e->getMessage();
        }
    }

    private function getAllInfoByEmail(object $psychologist){
        $query = "SELECT *
        FROM notesPsychologist np
        JOIN notesPatient npt ON np.FkNotesPatient = npt.PkNotesPatient
        JOIN patient pt ON npt.FkPatient = pt.PkPatient
        JOIN psychologist psy ON np.FkPsychologist = psy.PkPsychologist
        JOIN people p ON psy.FkPeople = p.PkPeople
        WHERE p.email = :p_email ";

        try {
                    
            $stmt = $this->conn->getConn()->prepare($query);
            
            $stmt->bindValue(":p_email", $psychologist->getEmail());
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            echo 'Error try get All dates: <br>' . $e->getMessage();
        }

    }

}

?>