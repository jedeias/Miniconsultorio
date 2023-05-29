<?php  

abstract class People{
    protected $name;
    protected $email;
    protected $dateOfBirth;
    protected $gender;    
    protected $password;    

	public abstract function getName();
	public abstract  function setName($name);
	public abstract function getEmail();
	public abstract function setEmail($email);
	public abstract function getDateOfBirth();
	public abstract function setDateOfBirth($dateOfBirth);
	public abstract function getGender();
	public abstract function setGender($gender);
	public abstract function getPassword();
	public abstract function setPassword($password);
}
?>