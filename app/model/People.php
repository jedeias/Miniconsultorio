<?php  

abstract class People{
    private $name;
    private $email;
    private $dateOfBirth;
    private $gender;    
    private $password;    

	public function getName() {
		return $this->name;
	}
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}
	public function setDateOfBirth($dateOfBirth): self {
		$this->dateOfBirth = $dateOfBirth;
		return $this;
	}
	public function getGender() {
		return $this->gender;
	}
	public function setGender($gender): self {
		$this->gender = $gender;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password): self {
		$this->password = $password;
		return $this;
	}
}
?>