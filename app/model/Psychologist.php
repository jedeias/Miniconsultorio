<?php 

Class Psychologist extends People implements psychologistInterface{
    private $crm;

    public function __construct($crm){
        $this->crm = $crm;
    }

    //specials methods
	public function getCrm() {
		return $this->crm;
	}

	public function setCrm($crm): self {
		$this->crm = $crm;
		return $this;
	}

    // methods of people
    public function getName(){
		return $this->name;
	}
	public  function setName($name):self {
		$this->name = $name;
		return $this;
	}
	public function getEmail(){
        return $this->email;
	}
	public function setEmail($email):self{
		$this->email = $email;
		return $this;
	}
	public function getDateOfBirth(){
        return $this->dateOfBirth;
	}
	public function setDateOfBirth($dateOfBirth):self{
		$this->$dateOfBirth = $dateOfBirth;
		return $this;
	}
	public function getGender(){
        return $this->gender;
	}
	public function setGender($gender):self{
        $this->gender = $gender;
        return $this;
	}
	public function getPassword(){
        return $this->password;
	}
	public function setPassword($password):self{
        $this->password = $password;
        return $this;
	}
}

?>