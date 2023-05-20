create database php2023;
use php2023;

create table users(
	id int auto_increment not Null,
    username varchar(50) not null,
    email  varchar(50) not null,
    fullname  varchar(30) not null,
    salt  varchar(256) not null,
	salted_hash varchar(256) not null,
    primary key(id)
);

create table admins(
	id int auto_increment not Null,
    fullname varchar(50) not null,
    email  varchar(50) not null,
    username  varchar(30) not null,
	salted_hash varchar(256) not null,
    primary key(id)
);



CREATE table products(
    id int auto_increment not Null,
    title varchar(50) not null,
    author  varchar(50) not null,
    description  varchar(300) not null,
	price int not null,
	image varchar(50) not null,
	category varchar(20) not null,
	rating int not null,
    primary key(id)
);

CREATE TABLE carts (
  id INT auto_increment NOT NULL,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);

CREATE TABLE coupons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(50) NOT NULL,
  discount DECIMAL(5,2) NOT NULL,
  active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

create table useraddress (
    id int AUTO_INCREMENT not null,
    user_id int not null,
    fullName varchar(50) not null,
    addresLine varchar(100) not null,
    city varchar(50) not null,
    postalCode int(7) not null,
    country varchar(20) not null,
    phoneNumber int(50) not null,
    primary key(id),
    FOREIGN KEY(user_id) REFERENCES users (id) on DELETE CASCADE
);
create table questions (
    id int AUTO_INCREMENT not null,
    user_id int not null,
    question varchar(50) not null,
    primary key(id),
    FOREIGN KEY(user_id) REFERENCES users (id) on DELETE CASCADE
);
create table answers (
    id int AUTO_INCREMENT not null,
    question_id int not null,
    answer varchar(300) not null,
    primary key(id),
    FOREIGN KEY(question_id) REFERENCES questions (id) on DELETE CASCADE
);