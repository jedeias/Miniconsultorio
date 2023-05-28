<?php

include "../autoload.php";
$session = new Session();

$session->destroy();

header("location: ../../index.php");

?>