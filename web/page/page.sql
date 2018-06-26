create database page;

use page;

create table page(
	user_name VARCHAR(20),
	pwd VARCHAR(20)
	);

INSERT INTO page VALUES ('shehan','123');

alter table page
	add last_update DATE;

create table result(
	last_update DATE
	)