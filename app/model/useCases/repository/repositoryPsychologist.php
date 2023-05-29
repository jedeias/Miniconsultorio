<?php   

Class RepositoryPsychologist extends Reposytory implements repositoryReadInterface{

    private $conn;

    public function __construct(){
        $this->conn = new Connect;
    }
    public function save(object $psychologist){
        $query =    "INSERT INTO people (name, email, dateOfBirth, sex, password) 
                    VALUES (:name, :email, :dateOfBirth, :gender, :password)";
    
        try {
            
            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(':name', $psychologist->getName());
            $query->bindValue(':email', $psychologist->getEmail());
            $query->bindValue(':dateOfBirth', $psychologist->getDateOfBirth());
            $query->bindValue(':gender', $psychologist->getGender());
            $query->bindValue(':password', $psychologist->getPassword());
            
            $query->execute();

            $pkPeople = $this->conn->getConn()->lastInsertId(); 

            $query =    "INSERT INTO psychologist (FkPeople, CRM)
                        VALUES(:FkPeople, :CRM)";

            $query = $this->conn->getConn()->prepare($query);

            $query->bindValue(':FkPeople', $pkPeople);
            $query->bindValue(':CRM', $psychologist->getCRM());
            $query->execute();

        }catch(PDOException $e){
            echo "Insert error <br>". $e->getMessage();
        }
    
    }

    public function update(object $psychologist) {
        $query = "UPDATE people 
                  SET name = :name, 
                      email = :email, 
                      dateOfBirth = :dateOfBirth, 
                      sex = :gender, 
                      password = :password 
                  WHERE PkPeople = :PkPeople";
    
        try {
            $stmt = $this->conn->getConn()->prepare($query);
    
            $stmt->bindValue(':PkPeople', $this->getByEmail($psychologist)['PkPeople']);
            $stmt->bindValue(':name', $psychologist->getName());
            $stmt->bindValue(':email', $psychologist->getEmail());
            $stmt->bindValue(':dateOfBirth', $psychologist->getDateOfBirth());
            $stmt->bindValue(':gender', $psychologist->getGender());
            $stmt->bindValue(':password', $psychologist->getPassword());
    
            $stmt->execute();
    
            $query2 = "UPDATE psychologist
                       SET CRM = :CRM  
                       WHERE FkPeople = :FkPeople";
    
            $stmt2 = $this->conn->getConn()->prepare($query2);
    
            $stmt2->bindValue(':FkPeople', $this->getByEmail($psychologist)['PkPeople']);
            $stmt2->bindValue(':CRM', $psychologist->getCRM());
    
            $stmt2->execute();
    
        } catch(PDOException $e) {
            echo "Insert error: " . $e->getMessage();
        }
    }
    public function delete(object $psychologist){
        $query = "DELETE FROM psychologist WHERE FkPeople = :FkPeople";

        try{
    
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':FkPeople', $this->getByEmail($psychologist)['PkPeople']);
            $query->execute();

            $query = "DELETE FROM people WHERE PkPeople = :PkPeople";
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':PkPeople', $this->getByEmail($psychologist)['PkPeople']);
            $query->execute();

        }catch(PDOException $e){

            echo "error getByEmail<br>" . $e->getMessage();

        }

    }

    public function getByEmail(object $psychologist){
        $query = "SELECT * FROM psychologist 
        INNER JOIN people ON (people.PkPeople = psychologist.FkPeople)  
        WHERE email = :email";
        
        try{
    
            $query = $this->conn->getConn()->prepare($query);
            $query->bindValue(':email', $psychologist->getEmail());
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);            
            return $result[0];
        }catch(PDOException $e){

            echo "error getByEmail<br>" . $e->getMessage();

        }
            
    }

    public function getById(int $PkPeople){
        $query =    "SELECT * FROM psychologist 
                    INNER JOIN people ON (people.PkPeople = psychologist.FkPeople) 
                    WHERE PkPeople = :PkPeople";
        
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