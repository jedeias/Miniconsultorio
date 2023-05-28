<?php   

Class RepositoryPatient extends Reposytory{

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

}

?>