<?php   

abstract class Reposytory implements repositoryInterface{
    public abstract function save(object $obj);
    public abstract function update(object $obj);
    public abstract function delete(object $obj);

}


?>