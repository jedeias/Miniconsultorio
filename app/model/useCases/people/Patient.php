<?php 

Class Patient extends People implements patientInterface{
    private Psychologist $psychologist;

    public function __construct($psychologist, $name, $email, $dateOfBirth, $gender, $password){
        $this->setPsychologist($psychologist);
		$this->setName($name);
		$this->setEmail($email);
		$this->setDateOfBirth($dateOfBirth);
		$this->setGender($gender);
		$this->setPassword($password);
    }

    //specials Methods
	public function getPsychologist(): Psychologist {
		return $this->psychologist;
	}

	public function setPsychologist(Psychologist $psychologist): self {
		$this->psychologist = $psychologist;
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
		$this->dateOfBirth = $dateOfBirth;
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