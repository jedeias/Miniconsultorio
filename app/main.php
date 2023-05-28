<?php

include ("autoload.php");

/*

test flag system

$flag = new Flags(10, "orange");

$repositoryFlag = new repositoryFlags();

$repositoryFlag->delete($flag);

*/


$psychologist = new Psychologist(null, "maria", "mariaSilva@gmail.com", 1994-05-12, "F", "12345678");

$repositoryPsychologist = new ReposytoryPsychologist();

echo"<pre>";
print_r($repositoryPsychologist);


/*

Authentication tests

$people = new Psychologist(null, null, $_POST['email'], null, null, $_POST['password']);

$people = new ReposytoryPsychologist();

$authentication = new Authentication();
*/

?>