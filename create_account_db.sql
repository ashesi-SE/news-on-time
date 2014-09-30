 DROP database create_account_db;

CREATE database create_account_db;

USE create_account_db;
CREATE table user_account(
	firstname text,
	lastname text,
	username varchar(50),
	password varchar(20)
);

insert into user_account(firstname,lastname,username,password)VALUES(NULL,'mawuena','melomey','mawuena.melomey','password');