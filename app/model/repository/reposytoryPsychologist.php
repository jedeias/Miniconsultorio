<?php   

Class ReposytoryPsychologist extends Reposytory implements repositoryReadInterface{

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

        }catch(PDOException $e){
            echo "Insert error <br>". $e->getMessage();
        }
    
    }

    public function update(object $psychologist){

    }
    public function delete(object $psychologist){

    }

    public function getByEmail(object $psychologist){
        
    }

    public function getById(object $psychologist){
        
    }

    public function getTableDates(){
        
    }

}

?>