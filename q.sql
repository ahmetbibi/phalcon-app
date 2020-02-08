drop database if exists tennisClub;
create database tennisClub;
use tennisClub;

Create table member(
	id integer auto_increment,
	firstname Varchar(30),
	surname Varchar(30),
	membertype Varchar(6),
	dateofbirth date,
	Primary Key(id)
);

Create table court
(
	id integer auto_increment,
	surface varchar(30),
	floodlights boolean,
	indoor boolean,
	Primary Key(id)
);

Create Table booking
(
	id integer auto_increment,
	bookingdate Date,
	starttime time,
	endtime time,
	memberid Integer,
	courtid Integer,
	fee Decimal(18,3),
	Primary Key(id),
	Foreign Key(MemberID) references member(id),
	Foreign Key(CourtID) references court(id)
);


INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Oliver','Kerr','Senior','2000-01-31');
INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Morgan','Bartlett','Senior','1985-10-28');
INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Rebecca','House','Senior','1993-08-01');
INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Leslie','Hammond','Senior','1999-03-03');
INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Axel','Gibson','Senior','2007-09-29');
INSERT INTO member(Firstname,Surname,MemberType,DateOfBirth) VALUES ('Bo','Bradshaw','Senior','1979-12-19');

Insert into court(Surface, Floodlights, Indoor) Values('Savannah',1,1);
Insert into court(Surface, Floodlights, Indoor) Values('Grass',1,0);
Insert into court(Surface, Floodlights, Indoor) Values('Savannah',1,1);
Insert into court(Surface, Floodlights, Indoor) Values('Savannah',1,1);
Insert into court(Surface, Floodlights, Indoor) Values('Grass',0,0);
Insert into court(Surface, Floodlights, Indoor) Values('Grass',0,0);

INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-01-07','09:00:00','11:00:00',2,3,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-02-11','16:00:00','17:00:00',5,3,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2016-11-16','10:00:00','12:00:00',4,2,20.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-04-06','14:00:00','16:00:00',2,5,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-01-17','17:00:00','18:00:00',5,6,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-05-06','15:00:00','17:00:00',3,6,15.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-04-27','09:00:00','11:00:00',2,3,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2016-05-05','16:00:00','17:00:00',5,3,10.00);
INSERT INTO booking(BookingDate,StartTime,EndTime,MemberID,CourtID,Fee) VALUES ('2017-03-23','10:00:00','12:00:00',4,2,20.00);