
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255)NOT NULL,
    email VARCHAR(255) NOT NULL
);
CREATE table cart_details(
	ID int not null auto_increment,
	product_name varchar (255),
	quantity int (2),
	price int (20),
	total varchar (20),
    primary key (ID)
);
INSERT into cart_details(product_name, quantity, price, total)
VALUES
    ('Doll', '3', '10', '$30'),
    ('Racing Car', '1', '35', '$35'),
    ('Toy Bike', '2', '5', '$10'),
    ('WaterGun', '1', '50', '$50'),
    ('LEGO', '1', '70', '$70');
    
CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);