<?php

abstract class Notes{

    private $notes;
    private object $people;

    public abstract function getNotes();

    public abstract function setNotes($newNotes);

    public abstract function getPeople();

    public abstract function setPeople(object $people);


}

?>