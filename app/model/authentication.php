<?php

class Authentication implements authenticationInterface{

    private $conn;
    public function __construct() {
        $this->conn = new Connect();    
    }

    public function authentication(object $person){

        try{

            $people = $person->getByEmail();

            if($people['password'] == $person->getPassword()){
                echo "success full in authentication";
            }
        
        }catch(Exception $e){

            echo "Credentials not found <br> verify your email or password";
        
        }

    }

}

?>