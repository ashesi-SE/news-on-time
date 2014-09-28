DROP DATABASE news_on_time;
CREATE DATABASE IF NOT EXISTS news_on_time;
USE news_on_time;

CREATE TABLE users(
	pid INT AUTO_INCREMENT NOT NULL,
	firstname VARCHAR(20),
	lastname VARCHAR(20),
	gender ENUM("f", "m"),
	username VARCHAR(40),
	passwd VARCHAR(50),
	PRIMARY KEY(pid)
);

INSERT INTO users(firstname,lastname,gender,username,passwd) VALUES
("nanette","taylor","f","nanette.taylor",MD5("password")),
("carl","abgenyega","m","carl.agbenyega",MD5("password")),
("alfred","gaglo","m","alfred.gaglo",MD5("password")),
("edem","anaglo","m","edem.anaglo",MD5("password")),
("gloria","yeboah","f","gloria.yeboah",MD5("password"));

CREATE TABLE movies(
	eid INT AUTO_INCREMENT NOT NULL,
	title VARCHAR(200),
	location VARCHAR(40),
	start_time TIME,
	event_date DATE,
	run_date DATE,
	end_date DATE,
	PRIMARY KEY(eid)
);

INSERT INTO movies(title,location,start_time,event_date,run_date,end_date) VALUES
("No Good Deed","LH216","18:00","2014-10-03","2014-09-28","2014-10-03"),
("A Letter From Adam","LH217","18:00","2014-10-03","2014-09-28","2014-10-03"),
("Guardians Of The Galaxy","LH218","18:00","2014-10-03","2014-09-28","2014-10-03"),
("The Maze Runner","LH115","18:00","2014-10-03","2014-09-28","2014-10-03"),
("The Equalizer","LH116","18:00","2014-10-03","2014-09-28","2014-10-03");
