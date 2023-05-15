create database php2023;
use php2023;

create table users(
	id int auto_increment not Null,
    username nvarchar(50) not null,
    email  nvarchar(50) not null,
    fullname  nvarchar(30) not null,
    salt  nvarchar(256) not null,
	salted_hash nvarchar(256) not null,
    primary key(id)
);
select * from users;