DROP DATABASE clinic;

create database clinic
DEFAULT CHARACTER SET = utf8
DEFAULT COLLATE = utf8_unicode_ci;

use clinic;

create table people (
    PkPeople int not null auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) not null unique key,
    dateOfBirth date,
    sex enum('M','F'),
    password varchar(12) not null
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

desc people;

create table psychologist(
    PkPsychologist int not null primary key auto_increment,
    FkPeople int not null,
    CRM int not null,
    foreign key (FkPeople) references people(PkPeople)
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc psychologist;

create table patient(
    PkPatient int not null primary key auto_increment,
    FkPeople int not null,
    FkPsychologist int not null,
    foreign key (FKPeople) references people(PkPeople),
    foreign key (FkPsychologist) references psychologist(PkPsychologist)
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc patient;

create table secretary(
    PkSecretary int not null primary key auto_increment,
    FkPeople int not NULL,
    foreign key (FKPeople) references people(PkPeople)
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc secretary;

create table flags(
    PkFlags int not null primary key auto_increment,
    dangerLevels INT NOT NULL,
    color VARCHAR(25) NOT NULL UNIQUE key
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

INSERT INTO flags
VALUES (DEFAULT, 1, "white");

desc flags;

create table notesPatient(
    PkNotesPatient int not null primary key auto_increment,
    FkPatient int not null,
    FkFleag int not NULL DEFAULT 1,
    notes text not null,
    foreign key (FkPatient) references Patient(PkPatient),
    foreign key (FkFleag) references flags(PkFlags)
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc notesPatient;

create table notesPsychologist(
    PkNotesPsychologist int not null primary key auto_increment,
    FkPsychologist int not null,
    FkNotesPatient int not null,
    notes text not null,
    foreign KEY (FkPsychologist) references psychologist(PkPsychologist),
    foreign key (FkNotesPatient) references notesPatient(PkNotesPatient)
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc notesPsychologist;

SELECT * FROM flags;

USE clinic;

INSERT INTO people (PkPeople, name, email, dateOfBirth, sex, PASSWORD) 
VALUES	(DEFAULT, 'alex', 'teste@email.com','1800/05/05', 'M', '1234'),
			(DEFAULT, 'Mary Silva', 'mariasilva@gmail.com','1800/05/05', 'F', '12345678'),
			(DEFAULT, 'Mary Ane', 'mary@gamil.com','1800/05/05', 'F', '12345678');
SELECT * FROM people;

INSERT INTO people
VALUES (DEFAULT, 'Pangeia', 'Pangeia@gamil.com','1800/05/05', 'M', '12345678');
SELECT * FROM people;

INSERT INTO psychologist (FkPeople, CRM)
VALUES(1, 321546),
		(2, 542)
;

SELECT * FROM psychologist;

INSERT INTO patient
VALUES (DEFAULT, 3, 2)
;	

INSERT INTO patient
VALUES (DEFAULT, 4, 2)
;	
		
SELECT * FROM patient;

INSERT INTO notesPatient (FkPatient, FkFleag, notes) VALUES (1, DEFAULT, 'Sample note');

SELECT * FROM notespatient;

SELECT * FROM notesPatient
INNER JOIN patient ON (patient.PkPatient = notesPatient.FkPatient);

desc notespsychologist;

INSERT INTO notespsychologist 
(PkNotesPsychologist, FkPsychologist, FkNotesPatient, notes)
VALUES
(DEFAULT, 1, 1, "Ok it's all right");

SELECT * FROM notespsychologist;
