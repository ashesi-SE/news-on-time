DROP DATABASE news_on_time;
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
	image_path varchar(255),
	description varchar(500),
	category enum ("movies","parties","foodie","sports","club events","other events"),
	start_date date,
	end_date date,
	PRIMARY KEY(pstid)
);
INSERT INTO posts(description, category, start_date, end_date) VALUES
("Some description telling you what this post is about","movies","2014-09-30","2014-10-10"),
("Some description telling you what this post is about","parties","2014-09-30","2014-09-30"),
("Some description telling you what this post is about","foodie","2014-09-30","2014-10-10"),
("Some description telling you what this post is about","sports","2014-09-24","2014-09-27"),
("Some description telling you what this post is about","club events","2014-09-20","2014-09-26"),
("Some description telling you what this post is about","other events","2014-09-30","2014-10-10");
-- select * from posts;
-- SELECT * FROM posts WHERE category = 'movies' AND start_date <= CURRENT_DATE() AND end_date >= CURRENT_DATE();
-- SELECT CURRENT_DATE();

CREATE TABLE IF NOT EXISTS lost_and_found(
	lfid int not null auto_increment,
	item varchar(200),
	description varchar(500),
	location varchar(100),
	tag enum("lost","found"),
	contact_name varchar(50),
	contact_number varchar(15),
	PRIMARY KEY(lfid)
);
-- INSERT INTO lost_and_found(item,description,location,tag,contact_name,contact_number) VALUES

