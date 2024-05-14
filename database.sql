-- Create the JBP database
CREATE DATABASE jbp;
USE jbp;

CREATE TABLE Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Fn text NOT NULL,
    Ln text NOT NULL,
    Un text NOT NULL,
	email text NOT NULL,
    np text NOT NULL,
    status text NOT NULL
);

INSERT INTO Admin (id,Fn,Ln,Un,email,np,status) 
VALUES (1211208820,'brand','on','noprob madam','bbran@example.com','jkjk','active'),
        (1,'Super','Admin','Super Admin','admin@gmail.com','admin','active');


CREATE TABLE Categories (
    Category_ID INT AUTO_INCREMENT PRIMARY KEY,
    Category_name VARCHAR(50) NOT NULL
);

INSERT INTO Categories (Category_name) VALUES ('Smartphones'), ('Tablets'), ('Accessories'), ('Wearables'), ('Earphones'), ('Powerbanks'), ('Speakers'), ('Phone stands'), ('Storage extender'), ('Mobile Photography accessories');

CREATE TABLE CART (
    cp_ID INT PRIMARY KEY
);

CREATE TABLE Customer (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_name VARCHAR(50) NOT NULL,
    Customer_email VARCHAR(100) NOT NULL,
    Customer_password VARCHAR(50) NOT NULL,
    Customer_HP VARCHAR(15) NOT NULL,
    Customer_address_1 VARCHAR(100) NOT NULL,
    Customer_address_2 VARCHAR(100) NOT NULL,
    Customer_postcode INT(5) NOT NULL
);

INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address_1, Customer_address_2, Customer_postcode) 
VALUES ('Azlan Bin Abdul Rahman', 'azlan.abdulrahman@gmail.com', 'password123', '0121234567', 'No. 1, Jalan Suka Suka', 'Taman Sri Suka, Kuala Lumpur', '56000'),
       ('Siti Sarah Binti Ahmad', 'siti.sarah@gmail.com', 'password456', '0192345678', 'No. 2, Jalan Bunga Raya', 'Taman Bunga, Bandar Baru Bangi', '43650'),
       ('Mohd Fadhli Bin Mohd Zain', 'fadhli.mohdzain@gmail.com', 'password789', '0133456789', 'No. 3, Jalan Cenderawasih', 'Taman Cenderawasih, Johor Bahru', '81200'),
       ('Nurul Ain Binti Mohd Noor', 'nurulain.mohdnoor@gmail.com', 'password012', '0164567890', 'No. 4, Jalan Putra', 'Taman Putra, Kuala Lumpur', '52100'),
       ('Ahmad Faisal Bin Abdul Razak', 'faisal.abdulrazak@gmail.com', 'password345', '0175678901', 'No. 5, Jalan Raja', 'Taman Raja, Melaka', '75350'),
       ('Nurul Nadia Binti Abdullah', 'nadia.abdullah@gmail.com', 'password678', '0186789012', 'No. 6, Jalan Sultan', 'Taman Sultan, Penang', '90000'),
       ('Muhammad Amirul Bin Mohd Nasir', 'amirul.mohdnasir@gmail.com', 'password901', '0197890123', 'No. 7, Jalan Iskandar', 'Taman Iskandar, Alor Setar', '78000'),
       ('Nurul Izzah Binti Zulkifli', 'izzah.zulkifli@gmail.com', 'password234', '0168901234', 'No. 8, Jalan Raja Permaisuri', 'Taman Raja Permaisuri, Kuala Lumpur', '55200'),
       ('Muhammad Akmal Bin Zulkarnain', 'akmal.zulkarnain@gmail.com', 'password567', '0179012345', 'No. 9, Jalan Maharajalela', 'Taman Maharajalela, Kuala Lumpur', '50450'),
       ('Nurul Syahirah Binti Yusof', 'syahirah.yusof@gmail.com', 'password890', '0181234567', 'No. 10, Jalan Duta', 'Taman Duta, Kuala Lumpur', '50480'),
       ('See Toh Yu Xiang', '1211207620@gmail.com', 'password620', '01134718189', 'No. 10, Jalan 1/2', 'Taman Krubong, Melaka', '75350'),
       ('Lee Ang Teck', '1211207734@gmail.com', 'password734', '0193347961', 'No. 17, Jalan Malim', 'Taman Malim, Melaka', '75350'),
       ('Brandon Tan Min Yau', '1211109437@gmail.com', 'password437', '0136661896', 'No. 33, Jalan 1/3', 'Taman Jati, Melaka', '75350');



CREATE TABLE ooder (
    Order_ID INT AUTO_INCREMENT PRIMARY KEY,
    Order_date DATE NOT NULL,
    Total_price FLOAT(7,2) NOT NULL,
    Customer_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

INSERT INTO ooder (Order_date, Total_price, Customer_ID) 
VALUES ('2024-04-01', 299.99, 1),
       ('2024-04-02', 499.99, 2),
       ('2024-04-03', 799.99, 3),
       ('2024-04-04', 199.99, 4),
       ('2024-04-05', 599.99, 5),
       ('2024-04-06', 399.99, 6),
       ('2024-04-07', 899.99, 7),
       ('2024-04-08', 299.99, 8),
       ('2024-04-09', 499.99, 9),
       ('2024-04-10', 699.99, 10);

CREATE TABLE Products (
    Product_ID INT AUTO_INCREMENT PRIMARY KEY,
    Product_name VARCHAR(50) NOT NULL,
    Product_details VARCHAR(100) NOT NULL,
    Product_stock INT NOT NULL,
    Product_netprice FLOAT(7,2) NOT NULL,
    Product_price FLOAT(7,2) NOT NULL,
    Category_ID INT,
    FOREIGN KEY (Category_ID) REFERENCES Categories(Category_ID)
);


INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('iPhone 13', 'Newest iPhone model', 50, 399.99, 999.99, 1, 'active'),
('Samsung Galaxy S21 Ultra', 'Flagship Android smartphone', 30, 599.99, 1199.99, 1, 'active'),
('Google Pixel 6 Pro', 'High-end Android device', 20, 399.99, 899.99, 1, 'active'),
('OnePlus 10 Pro', 'Premium Android phone', 40, 399.99, 899.99, 1, 'active'),
('Xiaomi Mi 12', 'Affordable flagship phone', 60, 199.99, 699.99, 1, 'active'),
('Sony Xperia 1 III', 'Powerful multimedia phone', 25, 599.99, 1099.99, 1, 'active'),
('iPhone SE (2022)', 'Compact iOS device', 35, 99.99, 499.99, 1, 'active'),
('Samsung Galaxy A52', 'Mid-range Android phone', 45, 99.99, 399.99, 1, 'active'),
('Google Pixel 5a', 'Affordable Google phone', 55, 199.99, 449.99, 1, 'active'),
('OnePlus Nord 2', 'Budget-friendly OnePlus device', 30, 99.99, 399.99, 1, 'active');

-- Insert tablets into Products table with status 'active'
INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('iPad Pro 12.9-inch (2022)', 'Powerful iPad for professionals', 20, 164.99, 1099.99, 2, 'active'),
('Samsung Galaxy Tab S8+', 'Premium Android tablet', 15, 134.99, 899.99, 2, 'active'),
('Microsoft Surface Pro 8', 'Versatile Windows tablet', 25, 149.99, 999.99, 2, 'active'),
('Amazon Fire HD 10', 'Affordable Android tablet', 50, 22.50, 149.99, 2, 'active'),
('Lenovo Tab P11 Pro', 'Sleek Android tablet', 30, 75.00, 499.99, 2, 'active'),
('Huawei MatePad Pro 12.6', 'High-end Huawei tablet', 10, 105.00, 699.99, 2, 'active'),
('iPad Air (2022)', 'Versatile iPad with A15 Bionic chip', 40, 90.00, 599.99, 2, 'active'),
('Samsung Galaxy Tab A7 Lite', 'Compact and lightweight tablet', 35, 30.00, 199.99, 2, 'active'),
('Microsoft Surface Go 3', 'Affordable Windows tablet', 45, 60.00, 399.99, 2, 'active'),
('Amazon Fire HD 8', 'Budget-friendly Amazon tablet', 60, 13.50, 89.99, 2, 'active');

-- Insert phone accessories into Products table with status 'active'
INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('iPhone 13 Case', 'Protective case for iPhone 13', 100, 3.00, 19.99, 3, 'active'),
('Samsung Galaxy S21 Ultra Case', 'Rugged case for Samsung Galaxy S21 Ultra', 80, 3.75, 24.99, 3, 'active'),
('Google Pixel 6 Pro Case', 'Slim case for Google Pixel 6 Pro', 70, 2.25, 14.99, 3, 'active'),
('OnePlus 10 Pro Screen Protector', 'Tempered glass screen protector for OnePlus 10 Pro', 120, 1.50, 9.99, 3, 'active'),
('Xiaomi Mi 12 Charger', 'Fast charging adapter for Xiaomi Mi 12', 150, 4.50, 29.99, 3, 'active'),
('Sony Xperia 1 III Wireless Charger', 'Qi-compatible wireless charger for Sony Xperia 1 III', 90, 6.00, 39.99, 3, 'active'),
('iPhone SE (2022) Earphones', 'Apple EarPods with Lightning connector', 110, 4.50, 29.99, 3, 'active'),
('Samsung Galaxy A52 Car Mount', 'Universal car mount for Samsung Galaxy A52', 95, 3.00, 19.99, 3, 'active'),
('Google Pixel 5a Power Bank', 'Portable power bank for Google Pixel 5a', 130, 7.50, 49.99, 3, 'active'),
('OnePlus Nord 2 USB-C Cable', 'Durable USB-C cable for OnePlus Nord 2', 140, 2.25, 14.99, 3, 'active');

-- Insert smartwatches and earphones into Products table with status 'active'
INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('Apple Watch Series 7', 'Latest Apple smartwatch', 20, 60.00, 399.99, 4, 'active'),
('Samsung Galaxy Watch 4', 'Premium Android smartwatch', 15, 45.00, 299.99, 4, 'active'),
('Fitbit Charge 5', 'Advanced fitness tracker', 25, 27.00, 179.99, 4, 'active'),
('Garmin Venu 2', 'GPS smartwatch with health monitoring', 30, 52.50, 349.99, 4, 'active'),
('Xiaomi Mi Band 6', 'Affordable fitness tracker', 40, 7.50, 49.99, 4, 'active'),
('Fossil Gen 6', 'Stylish smartwatch with Wear OS', 35, 45.00, 299.99, 4, 'active'),
('Apple AirPods Pro', 'Premium noise-cancelling earphones', 50, 37.50, 249.99, 4, 'active'),
('Sony WF-1000XM4', 'High-resolution wireless earbuds', 45, 42.00, 279.99, 4, 'active'),
('Jabra Elite 85t', 'True wireless earbuds with ANC', 60, 30.00, 199.99, 4, 'active'),
('Samsung Galaxy Buds Pro', 'True wireless earbuds with 360 Audio', 55, 30.00, 199.99, 4, 'active');

-- Insert power banks into Products table with status 'active'
INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('Anker PowerCore 10000', 'Portable power bank with 10000mAh capacity', 70, 4.50, 29.99, 5, 'active'),
('RAVPower PD Pioneer 20000', 'High-capacity power bank with Power Delivery', 80, 7.50, 49.99, 5, 'active'),
('Mophie Powerstation Plus XL', 'Wireless charging power bank', 60, 12.00, 79.99, 5, 'active'),
('Zendure SuperMini', 'Compact power bank with 10000mAh capacity', 90, 6.00, 39.99, 5, 'active'),
('AUKEY Basix Pro', 'Slim power bank with Quick Charge 3.0', 100, 3.75, 24.99, 5, 'active'),
('Anker PowerCore Slim 10000 PD', 'Ultra-slim power bank with Power Delivery', 85, 5.25, 34.99, 5, 'active'),
('Belkin Boost Charge 10K', 'Portable power bank with 10000mAh capacity', 75, 6.00, 39.99, 5, 'active'),
('Xiaomi Mi Power Bank 3 Pro', 'High-speed power bank with 20000mAh capacity', 95, 7.50, 49.99, 5, 'active'),
('Samsung Wireless Charger Portable Battery', 'Wireless charging power bank with 10000mAh capacity', 65, 10.50, 69.99, 5, 'active'),
('RAVPower Ace 22000', 'Ultra-high-capacity power bank with 22000mAh capacity', 110, 9.00, 59.99, 5, 'active');

-- Insert Bluetooth speakers into Products table with status 'active'
INSERT INTO Products (Product_name, Product_details, Product_stock, Product_netprice, Product_price, Category_ID, status)
VALUES
('JBL Flip 5', 'Portable Bluetooth speaker with IPX7 waterproof rating', 30, 15.00, 99.99, 6, 'active'),
('Sony SRS-XB33', 'Portable speaker with Extra Bass and party lights', 25, 22.50, 149.99, 6, 'active'),
('UE Boom 3', 'Bluetooth speaker with 360-degree sound and water resistance', 35, 19.50, 129.99, 6, 'active'),
('Anker Soundcore Flare 2', 'Waterproof speaker with customizable LED lights', 40, 12.00, 79.99, 6, 'active'),
('Bose SoundLink Revolve+', '360-degree Bluetooth speaker', 20, 30.00, 199.99, 6, 'active');


CREATE TABLE card (
    Card_name VARCHAR(50) PRIMARY KEY,
    Card_num INT NOT NULL,
    Card_edate VARCHAR(5) NOT NULL,
    Card_cv INT NOT NULL
);

CREATE TABLE Payment (
    Payment_ID INT AUTO_INCREMENT PRIMARY KEY,
    Payment_date DATE NOT NULL,
    Payment_method VARCHAR(10) NOT NULL,
    Payment_total FLOAT(7,2) NOT NULL
);

INSERT INTO Payment (Payment_date, Payment_method, Payment_total) 
VALUES ('2024-04-01', 'Credit Card', 299.99),
       ('2024-04-02', 'PayPal', 499.99),
       ('2024-04-03', 'Credit Card', 799.99),
       ('2024-04-04', 'PayPal', 199.99),
       ('2024-04-05', 'Credit Card', 599.99),
       ('2024-04-06', 'PayPal', 399.99),
       ('2024-04-07', 'Credit Card', 899.99),
       ('2024-04-08', 'PayPal', 299.99),
       ('2024-04-09', 'Credit Card', 499.99),
       ('2024-04-10', 'PayPal', 699.99);

CREATE TABLE Deliveries (
    Delivery_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_ID INT,
    Delivery_company VARCHAR(30) NOT NULL,
    Date_of_delivery DATE NOT NULL,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

INSERT INTO Deliveries (Customer_ID, Delivery_company, Date_of_delivery) 
VALUES (1, 'UPS', '2024-04-05'),
       (2, 'FedEx', '2024-04-06'),
       (3, 'DHL', '2024-04-07'),
       (4, 'USPS', '2024-04-08'),
       (5, 'UPS', '2024-04-09'),
       (6, 'FedEx', '2024-04-10'),
       (7, 'DHL', '2024-04-11'),
       (8, 'USPS', '2024-04-12'),
       (9, 'UPS', '2024-04-13'),
       (10, 'FedEx', '2024-04-14');

CREATE TABLE Transaction_Report (
    Report_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_ID INT,
    Order_ID INT,
    Product_ID INT,
    Payment_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID),
    FOREIGN KEY (Order_ID) REFERENCES ooder(Order_ID),
    FOREIGN KEY (Product_ID) REFERENCES Products(Product_ID),
    FOREIGN KEY (Payment_ID) REFERENCES Payment(Payment_ID)
);

INSERT INTO Transaction_Report (Customer_ID, Order_ID, Product_ID, Payment_ID) 
VALUES (1, 1, 1, 1),
       (2, 2, 2, 2),
       (3, 3, 3, 3),
       (4, 4, 4, 4),
       (5, 5, 5, 5),
       (6, 6, 6, 6),
       (7, 7, 7, 7),
       (8, 8, 8, 8),
       (9, 9, 9, 9),
       (10, 10, 10, 10);

CREATE TABLE `pass_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL, 
  PRIMARY KEY (`id`)
);
