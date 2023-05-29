<?php

include ("autoload.php");
echo"<pre>";

$people = new Psychologist(null, null, $_POST["email"], null, null, $_POST["password"]);

$authentication = new Authentication();

$authentication->authentication($people);

?>