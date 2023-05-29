<?php

include ("autoload.php");
echo"<pre>";

// $people = new Psychologist(null, null, $_POST["email"], null, null, $_POST["password"]);

// $authentication = new Authentication();

// $authentication->authentication($people);

$psycgologistGhost = new Psychologist(null ,null ,null ,null ,null , null);

$patient = new Patient($psycgologistGhost, "mary", "mary@gamil.com", null, "F", null);

$notes = new NotesPatient($patient, "My life like me very craiz, i no has time to sleep bot is all right because i like this");

$repositoryNotesPatient = new repositoryNotesPatient();

var_dump($notes->getPeople());

$repositoryPatient = new repositoryPatient();
$PkPatient = $repositoryPatient->getByEmail($notes->getPeople());

$repositoryNotesPatient->save($notes);



?>