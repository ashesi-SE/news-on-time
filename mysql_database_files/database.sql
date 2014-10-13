DROP DATABASE IF EXISTS news_on_time;
CREATE DATABASE IF NOT EXISTS news_on_time;
USE news_on_time;

CREATE TABLE IF NOT EXISTS users(
	pid int not null auto_increment,
	firstname varchar(20),
	lastname varchar(20),
	gender enum("f", "m"),
	username varchar(50),
	passwd varchar(50),
	PRIMARY KEY(pid)
);
INSERT INTO users(firstname,lastname,gender,username,passwd) VALUES
("nanette","taylor","f","nanette.taylor",MD5("password")),
("carl","agbenyega","m","carl.agbenyega",MD5("password")),
("alfred","gaglo","m","alfred.gaglo",MD5("password")),
("edem","anaglo","m","edem.anaglo",MD5("password")),
("gloria","yeboah","f","gloria.yeboah",MD5("password"));
-- select * from users;

CREATE TABLE IF NOT EXISTS posts(
	pstid int not null auto_increment,
	title varchar(200),
	image_path varchar(255),
	venue varchar(100),
	day date,
	time time,
	description varchar(500),
	category enum ("movies","parties","foodie","sports","club events","other events"),
	start_date date,
	end_date date,
	PRIMARY KEY(pstid)
);
INSERT INTO posts(title,image_path, venue, day, time, description, category, start_date, end_date) VALUES
("Movie Night","upload/Movie-Night1.jpg","LH115","2014-10-08","18:00","Some description telling you what this post is about","movies","2014-09-30","2014-10-25"),
("Blackout","upload/5.jpeg","LH115","2014-10-08","18:00","Some description telling you what this post is about","parties","2014-09-30","2014-10-25"),
("Smooths and Shakes","upload/gangnamtocat.png","LH115","2014-10-08","18:00","Some description telling you what this post is about","foodie","2014-09-30","2014-10-25"),
("Small Poles","upload/gangnamtocat.png","LH115","2014-10-09","18:00","Some description telling you what this post is about","sports","2014-09-30","2014-10-25"),
("1000 words","upload/5.jpeg","LH115","2014-10-09","18:00","Some description telling you what this post is about","club events","2014-09-30","2014-10-25"),
("Hard Talk","upload/baracktocat.jpg","LH115","2014-10-09","18:00","Some description telling you what this post is about","other events","2014-09-30","2014-10-25");
-- select * from posts;
-- SELECT COUNT(*) FROM posts WHERE category = 'movies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();
-- SELECT * FROM posts WHERE day = CURRENT_DATE();
-- SELECT CURRENT_DATE();

CREATE TABLE IF NOT EXISTS lost_and_found(
	lfid int not null auto_increment,
	image_path varchar(255),
	item varchar(200),
	description varchar(500),
	location varchar(100),
	tag enum("lost","found"),
	contact_name varchar(50),
	contact_number varchar(15),
	contact_email varchar(2500),
	PRIMARY KEY(lfid)
);
INSERT INTO lost_and_found(image_path,item,description,location,tag,contact_name,contact_number,contact_email) VALUES
("upload/lostAndFound/1.jpg","bag","blue gucci tote","under the stairs","lost","Ama","0000000000","someone@example.com"),
("upload/lostAndFound/1.jpg","shoe","six inch blackk loubutins","the cave","found","Kofi","0000000000","someone@example.com"),
("upload/lostAndFound/2.jpg","calculator","yellow TI","library","lost","Kwabena","0000000000","someone@example.com"),
("upload/lostAndFound/2.jpg","pen","blue bic pen","LH216","found","Abena","0000000000","someone@example.com");
-- select * from lost_and_found;
-- select * from lost_and_found where tag="found";
-- select count(*) from lost_and_found where tag="lost";
