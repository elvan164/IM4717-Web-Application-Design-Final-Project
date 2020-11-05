use f36ee;

create table Users (
    id int unsigned not null auto_increment primary key,
    username varchar(255) not null,
    password varchar(255) not null,
    name varchar(255) not null,
    email varchar(255) not null,
    address varchar(255),
    unit_no varchar(255),
    postal_code varchar(255)
);