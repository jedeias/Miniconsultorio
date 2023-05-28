<?php

include ("autoload.php");

$flag = new Flags(10, "orange");

$repositoryFlag = new repositoryFlags();

$repositoryFlag->delete($flag);

?>