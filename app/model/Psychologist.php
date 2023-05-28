<?php 

Class Psychologist extends People{
    private $crm;

    public function __construct($crm){
        $this->crm = $crm;
    }

	public function getCrm() {
		return $this->crm;
	}

	public function setCrm($crm): self {
		$this->crm = $crm;
		return $this;
	}
}

?>