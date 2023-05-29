<?php

class NotesPatient extends Notes{

    private $notes;
    private Patient $people;

    public function __construct(Patient $people, $notes) {
        $this->setPeople($people);
        $this->setNotes($notes);
    }

    public function getNotes(){
        return $this->notes;
    }
    public function setNotes($newNotes): self{
        $this->notes = $newNotes;
        return $this;
    }
    public function getPeople(){
        return $this->people;
    }

    public function setPeople(object $people):self{
        $this->people = $people;
        return $this;
    }

}

?>