<?php
class NotesPsychologist extends Notes implements NotesPsychologistInterface{
    
    private $notes;
    private Psychologist $psychologist;

    private NotesPatient $notesPatient;

    public function __construct(Psychologist $psychologist, NotesPatient $notesPatient, string $notes) {
        $this->setPeople($psychologist);
        $this->setNotesPatient($notesPatient);
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

	public function getNotesPatient(): NotesPatient {
		return $this->notesPatient;
	}
	
	public function setNotesPatient(NotesPatient $notesPatient): self {
		$this->notesPatient = $notesPatient;
		return $this;
	}
}
?>