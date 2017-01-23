DROP DATABASE IF EXISTS restaurant_db;

CREATE DATABASE restaurant_db;

USE restaurant_db;
 

CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);


CREATE TABLE food (
  foodID           INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID      INT(11)        NOT NULL,
  foodName     VARCHAR(255)   NOT NULL,
  foodPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (foodID)
);


INSERT INTO categories VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drinks');


INSERT INTO food VALUES
(1, 1, 'bread', '3.00'),
(2, 1, 'butter', '3.00'),
(3, 2, 'Rice', '10.00'),
(4, 2, 'tofu', '8.00'),
(6, 3, 'pizza','12.00'),
(7, 3, 'noodles', '15.00'),
(8, 4, 'blueberry Moijito','13.00'),
(9, 4, 'lemonade','6.00');

GRANT SELECT, INSERT, DELETE, UPDATE
ON restaurant_db.*
TO root@localhost
IDENTIFIED BY ' ';


GRANT SELECT
ON food
TO peter@localhost
IDENTIFIED BY ' ';
