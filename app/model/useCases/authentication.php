<?php

class Authentication implements authenticationInterface{

    private $conn;
    public function __construct() {
        $this->conn = new Connect();    
    }

    public function authentication(object $person){

        try{

            $query = "SELECT *
            FROM people
            LEFT JOIN psychologist ON people.PkPeople = psychologist.FkPeople
            LEFT JOIN patient ON people.PkPeople = patient.FkPeople
            WHERE email = :email and password = :password"; 

            $stmt = $this->conn->getConn()->prepare($query);

            $stmt->bindValue(":email",$person->getEmail());
            $stmt->bindValue(":password",$person->getPassword());

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if(! $result){
                header("refresh: 04 ../index.php");
                echo "Credentials not found, please try again check your credentials";
            }else if ($result['PkPatient'] != null){

                $session = new Session();

                $session->set('patient', $result);

                header("location: view/telas/paciente/paciente.php");

            }else if ($result['PkPsychologist'] != null){
                
                $session = new Session();

                $psychologist = new Psychologist($result["CRM"], $result["name"], $result["email"], $result["dateOfBirth"], $result['sex'], null);
                
                $session->set("psychologist", $psychologist);

                header("location: view/telas/psicologo/psicologo.php");

            }else{
                header("refresh: 04 ../index.php");
                echo "Credentials not found, please try again check your credentials";
            }

        }catch(Exception $e){
            header("refresh: 04 ../index.php");
            echo "Credentials not found <br> erro";
        
        }

    }

}

?>