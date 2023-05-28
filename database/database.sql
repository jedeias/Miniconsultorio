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

desc psychologists;

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
    dangerLevels int not null
)CHARACTER SET utf8 COLLATE UTF8_UNICODE_CI;

desc flags

create table notesPatient(
    PkNotesPatient int not null primary key auto_increment,
    FkPatient int not null,
    FkFleag int not null,
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

desc notesPyschologist;