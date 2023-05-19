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

create table admins(
	id int auto_increment not Null,
    fullname nvarchar(50) not null,
    email  nvarchar(50) not null,
    username  nvarchar(30) not null,
	salted_hash nvarchar(256) not null,
    primary key(id)
);
select * from users;

-- CREATE TABLE carts (
--   id INT auto_increment NOT NULL,
--   user_id INT NOT NULL,
--   product_id INT NOT NULL,
--   quantity INT NOT NULL,
--   PRIMARY KEY (id),
--   FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
--   FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
-- );

CREATE TABLE carts (
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  PRIMARY KEY (user_id),
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);