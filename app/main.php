<?php

include ("autoload.php");
echo"<pre>";

// $people = new Psychologist(null, null, $_POST["email"], null, null, $_POST["password"]);

// $authentication = new Authentication();

// $authentication->authentication($people);


/*

    repositoryNotesPsyschologist test 

$psycgologistGhost = new Psychologist(null ,null ,null ,null ,null , null);

$patient = new Patient($psycgologistGhost, "mary", "mary@gamil.com", null, "F", null);

$notes = new NotesPatient($patient, "My life like me very craiz, i' no has time to sleep bot is all right because i like this");

$repositoryNotesPatient = new repositoryNotesPatient();

$notes->setNotes("My life is very well, i'm student so much");

$notesPatientArrayData = $repositoryNotesPatient->getTableDates();

var_dump($notesPatientArrayData);

*/

$psycgologist = new Psychologist(321546 ,"alex" ,"teste@email.com", '1800-05-05' ,"M" , "1234");

$patient = new Patient($psycgologist, "mary", "mary@gamil.com", null, "F", null);

$notes = new NotesPatient($patient, "My life is very well, i'm student so much");

$notesPsychologist = new NotesPsychologist($psycgologist, $notes, "that is good because she has a great detication and focus");


$repositoryNotesPsychologist = new repositoryNotesPsychologist();

$notesPsychologist->setNotes("I need more time to study she presonalities");


?>