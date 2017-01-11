#OK
CREATE TABLE User(
Email  VARCHAR(12) NOT NULL,
Name VARCHAR(20),
PRIMARY KEY(Email)
);
#ISA relation model, student and professor isa User:
CREATE TABLE Student(
Email VARCHAR(12)NOT NULL,
Name VARCHAR(20) NOT NULL,
mat_id INT NOT NULL,
PRIMARY KEY(Email, mat_id),
UNIQUE(mat_id),
FOREIGN KEY(Email) REFERENCES User(Email) ON DELETE CASCADE

);

#FOREIGN KEY(Name) REFERENCES User(Name) ON DELETE CASCADE
CREATE TABLE Professor(
Email VARCHAR(12)NOT NULL,
Name VARCHAR(20) NOT NULL,
prof_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(prof_id),
FOREIGN KEY(Email) REFERENCES User(Email) ON DELETE CASCADE

);
#FOREIGN KEY(Name) REFERENCES User(Name) ON DELETE CASCADE
#Courses: OK

CREATE TABLE Course(
C_number VARCHAR(30) NOT NULL,
Name VARCHAR (40) NOT NULL,
PRIMARY KEY(C_number)
);

#Study Sessions:
CREATE TABLE StudySession(
Sid INT NOT NULL AUTO_INCREMENT,
max_size INT NOT NULL,
Sub_topic VARCHAR(20),
PRIMARY KEY(Sid)
);

#Duration:
CREATE TABLE Duration(
d_id INT AUTO_INCREMENT,
start DATETIME,
till DATETIME,
PRIMARY KEY(d_id)
);

#Locations:OK
CREATE TABLE Location(
Lid INT NOT NULL AUTO_INCREMENT,
R_no VARCHAR(7),
B_name VARCHAR(8),
PRIMARY KEY(Lid)
);

#Relations:
#Contain-- Courses 0:n Study Sessions 1:1

CREATE TABLE contain(
C_number VARCHAR(30) NOT NULL,
Sid INT NOT NULL,
PRIMARY KEY(C_number, Sid),
FOREIGN KEY(Sid) REFERENCES StudySession(Sid),
FOREIGN KEY(C_number) REFERENCES Course(C_number)
);

#Taughtby -- Courses 1:1 Professor 1:n
CREATE TABLE Taughtby(
C_number VARCHAR(30),
prof_id INT,
PRIMARY KEY(C_number, prof_id),
FOREIGN KEY(prof_id) REFERENCES Professor(prof_id),
FOREIGN KEY(C_number) REFERENCES Course(C_number)
);

#moderated by -- User 0:n Study Sessions 1:1
CREATE TABLE Moderatedby(
Email VARCHAR(12) NOT NULL,
Sid INT NOT NULL,
PRIMARY KEY(Email, Sid),
FOREIGN KEY(Email) REFERENCES User(Email),
FOREIGN KEY(Sid) REFERENCES StudySession(Sid)
);

#attended_by -- Student 0:n Study Session 0:n

CREATE TABLE attended_by(
Sid INT NOT NULL,
mat_id INT NOT NULL,
PRIMARY KEY(Sid, mat_id),
FOREIGN KEY(Sid) REFERENCES StudySession(Sid),
FOREIGN KEY(mat_id) REFERENCES Student(mat_id)
);

#TakePlaceIn Study Sessions 1:1 location 1:1 Duration 1:1
CREATE TABLE TakePlaceIn(
Sid INT NOT NULL,
Lid INT NOT NULL,
d_id INT NOT NULL,
PRIMARY KEY(Sid, Lid, d_id),
FOREIGN KEY(Sid) REFERENCES StudySession(Sid),
FOREIGN KEY(Lid) REFERENCES Location(Lid),
FOREIGN KEY(d_id) REFERENCES Duration(d_id)
);