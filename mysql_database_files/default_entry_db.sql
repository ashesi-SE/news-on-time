--Default entries into the database

use dbms_news_on_time;

delete from users;

insert into users (userName, password) values
	("admin","admin");

delete from movie_night;

insert into movie_night (movie_name, movie_time) values
	("Inception", "17:30 GMT"),
	("Tranformers", "19:10 GMT"),
	("The Dictator", "20:50 GMT");