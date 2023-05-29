<?php   

abstract class Reposytory{
    public abstract function save(object $obj);
    public abstract function update(object $obj);
    public abstract function delete(object $obj);

}


?>