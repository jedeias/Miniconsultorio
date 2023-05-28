<?php

interface RepositoryFlagsInterface{

    public function save(object $object);
    public function delete(object $object);
    public function update(object $object);
    public function getByColor(string $color);
    public function getByDangerLevels(int $dangerLevels);

}

?>