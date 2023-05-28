<?php

interface repositoryReadInterface extends repositoryInterface{

    public function getById(obejct $obejct);

    public function getByEmail(obejct $obejct);

    public function getTableDates();

}

?>