-- The PHP database for News-on-Time web application

drop schema if exists dbms_news_on_time;

create schema dbms_news_on_time;

-- use dbms_news_on_time;

create table users
(
	userID int auto_increment primary key,
	userName varchar(20),
	password varchar(20)
);

create table images
(
	imageID int auto_increment primary key,
	imageDirectory varchar(100)

);

create table movies_night
(
	movieID int auto_increment primary key,
	movie_name varchar(20),
	movie_time varchar(20)
);