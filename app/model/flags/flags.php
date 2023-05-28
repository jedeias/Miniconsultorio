<?php

class Flags implements flagsInterface{

    private $deagerLeaves;
    private $color;

    public function __construct($dangerLevels, $color) {
        $this->setDeagerLeaves($dangerLevels);
        $this->setColor($color);
    }

	public function getDeagerLeaves() {
		return $this->deagerLeaves;
	}
	
	public function setDeagerLeaves($deagerLeaves): self {
		$this->deagerLeaves = $deagerLeaves;
		return $this;
	}

	public function getColor() {
		return $this->color;
	}
	
	public function setColor($color): self {
		$this->color = $color;
		return $this;
	}
}

?>