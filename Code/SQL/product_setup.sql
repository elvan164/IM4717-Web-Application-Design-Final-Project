use f36ee;

create table Product
(
    id int unsigned not null auto_increment primary key,
    name char(50) not null,
    price float(5,2),
    category char(50) not null

);

insert into Product values 
    (NULL,"Beats_Pro",1.00, "Headphone"),
    (NULL,"Bose_QC2",2.00, "Headphone"),
    (NULL,"Bose_QC25",3.00, "Headphone"),
    (NULL,"Gaming",4, "Headphone"),
    (NULL,"H95_Black_3",5, "Headphone"),
    (NULL,"HD428",6, "Headphone"),
    (NULL,"M-FH051-SB",7, "Headphone"),
    (NULL,"SBH2350-BK",8, "Headphone"),
    (NULL,"SCS-SCBP",9, "Headphone"),
    (NULL,"Mini_USB_Keyboard",10, "Keyboard"),
    (NULL,"Wired_Keyboard",11, "Keyboard"),
    (NULL,"Wireless_Keyboard",12, "Keyboard"),
    (NULL,"iPad_Pro_2018",13, "Apple"),
    (NULL,"iPad_Pro",14, "Apple"),
    (NULL,"iPad",15, "Apple"),
    (NULL,"iPhone_11",16, "Apple"),
    (NULL,"iPhone_12",17, "Apple"),
    (NULL,"iPhone_X",18, "Apple"),
    (NULL,"Acer_Nitro_V",19, "Laptop"),
    (NULL,"Alienware_M15",20, "Laptop"),
    (NULL,"HP_Notebook_14",21, "Laptop"),
    (NULL,"Macbook_Air",22, "Laptop"),
    (NULL,"Surface_3",23, "Laptop"),
    (NULL,"XPS_15",24, "Laptop");

   