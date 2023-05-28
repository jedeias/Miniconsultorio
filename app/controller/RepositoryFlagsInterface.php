<?php

interface RepositoryFlagsInterface{

    public function save(Flags $object);
    public function delete(Flags $object);
    public function update(Flags $object);
    public function getByColor(string $color);
    public function getByDangerLevels(int $dangerLevels);

}

?>