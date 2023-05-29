<?php   

Class RepositoryPatient extends Reposytory implements repositoryReadInterface{

    private $conn;

    public function __construct(){
        $this->conn = new Connect;
    }
    public function save(object $patient){
        $query =    "INSERT INTO people (name, email, dateOfBirth, sex, password) 
                    VALUES (:name, :email, :dateOfBirth, :gender, :password)";
    
        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(':name', $patient->getName());
            $query->bindValue(':email', $patient->getEmail());
            $query->bindValue(':dateOfBirth', $patient->getDateOfBirth());
            $query->bindValue(':gender', $patient->getGender());
            $query->bindValue(':password', $patient->getPassword());

            $query->execute();

            $pkPeople = $this->conn->getConn()->lastInsertId(); 

            $query =    "INSERT INTO patient (FkPeople, FkPsychologist)
                        VALUES(:FkPeople, :FkPsychologist)";

            $query = $this->conn->getConn()->prepare($query);

            $repositoryPsychologist = new RepositoryPsychologist();
            $FkPsychologist = $repositoryPsychologist->getByEmail($patient->getPsychologist());
            var_dump($patient->getPsychologist(), $FkPsychologist);

            $query->bindValue(':FkPeople', $pkPeople);
            $query->bindValue(':FkPsychologist', $FkPsychologist['PkPsychologist']);
            $query->execute();

        }catch(PDOException $e){
            echo "Insert error <br>". $e->getMessage();
        }
    
    }

    public function update(object $patient) {
        $query = "UPDATE people 
                  SET name = :name, 
                      email = :email, 
                      dateOfBirth = :dateOfBirth, 
                      sex = :gender, 
                      password = :password 
                  WHERE PkPeople = :PkPeople";
    
        try {
            $stmt = $this->conn->getConn()->prepare($query);
            
            $pkPeople = $this->getByEmail($patient)['PkPeople'];
    
            $stmt->bindValue(':PkPeople', $pkPeople);
            $stmt->bindValue(':name', $patient->getName());
            $stmt->bindValue(':email', $patient->getEmail());
            $stmt->bindValue(':dateOfBirth', $patient->getDateOfBirth());
            $stmt->bindValue(':gender', $patient->getGender());
            $stmt->bindValue(':password', $patient->getPassword());
    
            $stmt->execute();
    
            $query2 = "UPDATE patient
                       SET FkPsychologist = :FkPsychologist
                       WHERE FkPeople = :FkPeople";
    
            $stmt2 = $this->conn->getConn()->prepare($query2);

            $repositoryPsychologist = new RepositoryPsychologist();
            $FkPsychologist = $repositoryPsychologist->getByEmail($patient->getPsychologist());
    
            $stmt2->bindValue(':FkPeople', $pkPeople);
            $stmt2->bindValue(':FkPsychologist', $FkPsychologist);
    
            $stmt2->execute();
    
        } catch(PDOException $e) {
            echo "Update error: " . $e->getMessage();
        }
    }
    public function delete(object $patient){
        $query = "DELETE FROM patient WHERE FkPeople = :FkPeople";

        try{
    
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':FkPeople', $this->getByEmail($patient)['PkPeople']);
            $query->execute();

            $query = "DELETE FROM people WHERE PkPeople = :PkPeople";
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':PkPeople', $this->getByEmail($patient)['PkPeople']);
            $query->execute();

        }catch(PDOException $e){

            echo "error getByEmail<br>" . $e->getMessage();

        }

    }

    public function getByEmail(object $patient){
        $query = "SELECT * FROM patient 
        INNER JOIN people on (patient.FkPeople = people.PkPeople ) WHERE email = :email";
        
        try{
    
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':email', $patient->getEmail());
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);            
            return $result[0];
        }catch(PDOException $e){

            echo "error getByEmail<br>" . $e->getMessage();

        }
            
    }

    public function getById(int $PkPeople){
        $query = "SELECT * FROM people WHERE PkPeople = :PkPeople";
        
        try{
    
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':PkPeople', $PkPeople);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);            
            
            return $result[0];
        
        }catch(PDOException $e){

            echo "error getByEmail<br>" . $e->getMessage();

        }
    }

    public function getTableDates(){
        $query =    "SELECT * FROM psychologist 
                    INNER JOIN people ON (people.PkPeople = psychologist.FkPeople)"
        ;

        try {
            $stmt = $this->conn->getConn()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        catch (PDOException $e) {
            echo"erro On consult Table psychologist" . $e->getMessage();
        }
    }

}

?>