create database php2023;
use php2023;

create table users(
	id int auto_increment not Null,
    username varchar(50) not null,
    email  varchar(50) not null,
    fullname  varchar(30) not null,
	salted_hash varchar(256) not null,
    primary key(id)
);

INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `saltedHash`) VALUES 
(NULL, 'milo', 'milotq1@gmail.com', 'Milot Qorrolli', '$2y$10$hVOggB.jrheF.5bYXcaTYeCn6tt2uUmnVtn4XyIM/wek8mVNpRMy.'), 
(NULL, 'milot', 'eqorrolli3@gmail.com', 'miloti', '$2y$10$hVOggB.jrheF.5bYXcaTYeCn6tt2uUmnVtn4XyIM/wek8mVNpRMy.'), 
(NULL, 'hysen', 'hysen@gmail.com', 'Hysen Lubovci', '$2y$10$hVOggB.jrheF.5bYXcaTYeCn6tt2uUmnVtn4XyIM/wek8mVNpRMy.'), 
(NULL, 'lorik', 'lorik03000@gmail.com', 'Lorik Morina', '$2y$10$hVOggB.jrheF.5bYXcaTYeCn6tt2uUmnVtn4XyIM/wek8mVNpRMy.');
--pass milot


create table admins(
	id int auto_increment not Null,
    fullname varchar(50) not null,
    email  varchar(50) not null,
    username  varchar(30) not null,
	salted_hash varchar(256) not null,
    primary key(id)
);
INSERT INTO `admins` (`id`, `fullname`, `email`, `username`, `saltedHash`) VALUES 
(NULL, 'admin', 'admin', 'admin', '$2y$10$cfQdve62G93xFGCKAOGL3.iTSj1.p.DxlLL6Un8kbDA25LIHufGpC') --milot



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

INSERT INTO `products` (`id`, `title`, `author`, `description`, `price`, `image`, `category`, `rating`) VALUES 
(NULL, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Fantasy', '20', 'productImages/phpCA6C.tmp3311.jpg', 'featured', '5'), 
(NULL, 'Harry Potter and the Chamber of Secrets ', ' J. K. Rowling', 'Fantasy', '20', 'productImages/php88FA.tmp9293.jpg', 'featured', '5'), 
(NULL, 'Harry Potter and the Prisoner of Azkaban ', 'J. K. Rowling', 'Fantasy', '20', 'productImages/php5F6.tmp4900.jfif', 'featured', '5'), 
(NULL, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Fantasy', '20', 'productImages/phpF827.tmp316.jpg', 'featured', '5'), 
(NULL, 'Harry Potter and the Half-Blood Prince ', 'J. K. Rowling', 'Fantasy', '20', 'productImages/phpD7BB.tmp4394.jfif', 'newArrival', '5');


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
INSERT INTO coupons (code, discount, active) VALUES
('SUMMER10', 10.00, 1),
('SALE20', 20.00, 1),
('FREE', 100.00, 1),
('DISCOUNT15', 15.00, 0),
('HOLIDAY25', 25.00, 1);
 


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

INSERT INTO `questions` (`id`, `user_id`, `question`) VALUES 
(NULL, '1', 'Will there be any other book?'), 
(NULL, '2', 'How can I recommend a book?')

create table answers (
    id int AUTO_INCREMENT not null,
    question_id int not null,
    answer varchar(300) not null,
    primary key(id),
    FOREIGN KEY(question_id) REFERENCES questions (id) on DELETE CASCADE
);

INSERT INTO `answers` (`id`, `question_id`, `answer`) VALUES 
(NULL, '1', 'We are constantly exploring new books and expanding our collection. 
Our team is dedicated to curating a diverse and engaging selection of books for our readers. 
Stay tuned for updates on new book releases and additions to our catalog. '), 
(NULL, '2', 'We understand your curiosity about upcoming book releases. 
While we strive to continually expand our collection, we cannot provide specific information about future book additions at this time.')
