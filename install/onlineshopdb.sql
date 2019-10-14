CREATE DATABASE IF NOT EXISTS onlineshopdb; USE
    onlineshopdb;
CREATE TABLE IF NOT EXISTS lechidung_product(
    productID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    productName VARCHAR(200) NOT NULL,
    productImage VARCHAR(200) NOT NULL,
    productPrice DOUBLE NOT NULL,
    productSale DOUBLE DEFAULT NULL
); CREATE TABLE IF NOT EXISTS lechidung_users(
    user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_fname VARCHAR(50) NOT NULL,
    user_lname VARCHAR(50) NOT NULL,
    user_username VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_pass VARCHAR(300) NOT NULL,
    user_registerdate DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_level TINYINT DEFAULT NULL
); ALTER TABLE
    lechidung_product AUTO_INCREMENT = 100;
ALTER TABLE
    lechidung_users AUTO_INCREMENT = 100;