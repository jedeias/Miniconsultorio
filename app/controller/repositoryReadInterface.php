<?php

interface repositoryReadInterface extends repositoryInterface{

    public function getById(int $obejct);

    public function getByEmail(object $obejct);

    public function getTableDates();

}

?>