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