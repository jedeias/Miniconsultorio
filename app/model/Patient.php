<?php 

Class Patient extends People implements patientInterface{
    private Psychologist $psychologist;

    public function __construct($psychologist){
        $this->psychologist = $psychologist;
    }

	public function getPsychologist(): Psychologist {
		return $this->psychologist;
	}

	public function setPsychologist(Psychologist $psychologist): self {
		$this->psychologist = $psychologist;
		return $this;
	}
}


?>