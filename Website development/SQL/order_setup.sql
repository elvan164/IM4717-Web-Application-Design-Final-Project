use f36ee;

create table Customer_Orders
(
    id int unsigned not null auto_increment primary key,
    user_id int unsigned not null references users(id),
    order_date DATETIME,
    total_amount float(50,2),
    order_status varchar(255),
    delivery_date DATETIME
);

create table Admin_Orders
(
    id int unsigned not null auto_increment primary key,
    order_id int unsigned not null references Customer_Orders(id),
    product_id int unsigned not null references Product(id),
    quantity int unsigned not null,
    current_price float(9,2)
);