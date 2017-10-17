
-- Drop table if it already exists so you can start fresh each time.
DROP TABLE IF EXISTS users;

-- Create a users table in your database. You may have different fields. This isn’t
-- necessarily the best design.
CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR (256) NOT NULL,
        name VARCHAR (50) NOT NULL
);

-- Insert test data into your table so you have something to start with.
INSERT INTO users (email, password, name) VALUES('snoopy@peanuts.com', 'w00fWOOF', 'Snoopy');
INSERT INTO users (email, password, name) VALUES('scooby@whereareyou.com', 'w00fWOOF', 'Scooby');
INSERT INTO users (email, password, name) VALUES('snowwhite@disney.com', 'iLov3AppleZ', 'Snow White');
INSERT INTO users (email, password, name) VALUES('moana@disney.com', 'born2s@il', 'Moana');

INSERT INTO users (email, password, name) VALUES('nabe0257@colorado.edu', 'password', 'Nate');
INSERT INTO users (email, password, name) VALUES('sean@school.edu', 'password', 'Sean');
