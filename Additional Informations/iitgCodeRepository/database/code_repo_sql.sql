create database repo;
use repo;
create table user(
	user_id integer auto_increment,
	first_name varchar(15),
	last_name varchar(15),
	skill_level decimal( 3,2) default '0',
	designation smallint,
	email varchar(40) ,
	password varchar(50),
	UNIQUE(email),
	primary key(user_id)
) engine ="InnoDB";
create table code (
	code_id integer auto_INCREMENT,
	description varchar(100),
	url varchar(50),
	title varchar(50),
	extension varchar(10),
	last_updated datetime,
	update_count integer,
	project_id integer,
	primary key(project_id, code_id),
    foreign key(project_id)  references project(project_id) on delete cascade
);
create table project(
	project_id integer auto_increment,
	language varchar(10),
	title varchar(20),
	description varchar(100),
	url varchar(20),
	rating decimal( 3,2) default '0',
	user_id integer,
	sharing_date datetime,
	primary key(user_id, project_id),
	foreign key(user_id)  references user(user_id) on delete cascade 
);
create table tag(
	project_id integer,
	tag_name varchar(20),
	primary key (project_id, tag_name),
	foreign key(project_id) references project(project_id)	on delete cascade
) ;
create table comments(
	commentor_user_id integer,
	user_id integer,
	project_id integer,
	comment varchar(100),
	comment_date datetime,
	foreign key(commentor_user_id)  references user(user_id) on delete cascade,
	foreign key(project_id,user_id)  references project(project_id,user_id) on delete cascade
) ;
create table rates(
	rater_user_id integer,
	user_id integer,
	project_id integer,
	rating smallint,
	primary key(rater_user_id, user_id, project_id),
	foreign key(rater_user_id) references user(user_id) on delete cascade,
	foreign key(project_id,user_id) references project(project_id, user_id) on delete cascade
) ;