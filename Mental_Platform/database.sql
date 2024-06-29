CREATE TABLE users(
    userID int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar (20),
    last_name varchar (20),
    username varchar (20),
    email_address varchar (20),
    date_of_birth DATE,
    Timezone TIME,
    primary_language varchar (20),
    secondary_language varchar (20)
    );
    
CREATE TABLE psychologist(
	psychologistID int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar (20),
    last_name varchar (20),
    username varchar (20),
    email_address varchar (20),
    date_of_birth DATE,
    Timezone TIME,
    primary_language varchar (20),
    secondary_language varchar (20),
    field_of_profession varchar (20),
    official_certificate varbinary (8000)

    );