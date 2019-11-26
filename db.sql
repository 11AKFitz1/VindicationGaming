CREATE DATABASE storedb;

CREATE TABLE users (
    idUsers int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uidUsers varchar(25) NOT NULL,
    emailUsers varchar(100) NOT NULL,
    pwdUsers LONGTEXT NOT NULL,
    wallet int(10) DEFAULT 500
);

CREATE TABLE products (
    productid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pname varchar(25),
    ptype varchar(25),
    price int(10),
    pdesc text,
    prequire text,
    pversion text,
    ppath text,
    pimg text
);

-CREATE TABLE orders (
    orderid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(25),
    ordertime timestamp()
);

CREATE TABLE order_product (
    id int AUTO_INCREMENT PRIMARY KEY,
    orderid int,
    productid int,
    price int,
    FOREIGN KEY (orderid) REFERENCES orders(orderid),
    FOREIGN KEY (productid) REFERENCES products(productid)
);


