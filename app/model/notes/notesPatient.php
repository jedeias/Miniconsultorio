<?php

class NotesPatient extends Notes{

    private $notes;
    private Patient $people;

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

    public function setPeople(Patient $people):self{
        $this->people = $people;
        return $this;
    }

}

?>