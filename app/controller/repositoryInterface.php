<?php
interface repositoryInterface{

    public function save(object $obj);
    public function update(object $obj);
    public function delete(object $obj);
}
    
?>