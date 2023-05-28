<?php   

Class RepositoryPatient extends Reposytory implements repositoryReadInterface{

    private Patient $patient;

    public function __construct($patient) {
        $this->patient = $patient;
    }

    public function save(Patient $patient){

    }

    public function update(){

    }
    public function delete(){
        
    }

    public function getByEmail(Patient $patient){
        
    }

    public function getById(Patient $patient){
        
    }

    public function getTableDates(){
        
    }


}

?>