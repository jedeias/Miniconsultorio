<?php

interface RepositoryNotesInterface{

    public function save(object $obj);// planta batata ... não me pergunte[...]!
    public function update(object $obj);// atualiza
    public function delete(object $obj);// deleta
    public function getByID(object $obj);// pega pelo id da Notes
    public function getByPeople(object $obj); // pega pelo id do psigologo ou do patient
    public function getTableDates(); // pega todos os dados da table

}

?>