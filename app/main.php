<?php

include ("autoload.php");

/*

test flag system

$flag = new Flags(10, "orange");

$repositoryFlag = new repositoryFlags();

$repositoryFlag->delete($flag);

*/

$people = new Psychologist(null, null, $_POST['email'], null, null, $_POST['password']);

$people = new ReposytoryPsychologist();

$authentication = new Authentication();


?>