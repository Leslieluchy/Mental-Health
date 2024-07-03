CREATE DATABASE mental_wellbeing_platform;

CREATE TABLE users(
    userID int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar (20),
    last_name varchar (20),
    username varchar (20),
    password password varchar(20),
    email varchar (20),
    DOB DATE,
    timezone TIME,
    primary_language varchar (20),
    secondary_language varchar (20)
    profilephoto MEDIUMBLOB
    );
    
CREATE TABLE psychologist(
	psychologistID int PRIMARY KEY AUTO_INCREMENT,
    firstname varchar (20),
    lastname varchar (20),
    username varchar (20),
    password password varchar(20),
    email varchar (20),
    DOB DATE,
    timezone TIME,
    primarylanguage varchar (20),
    secondarylanguage varchar (20),
    fieldofprofession varchar (20),
    officialcertificate varbinary (8000)

    );