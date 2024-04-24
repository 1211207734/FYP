-- Create the JBP database
CREATE DATABASE JBP;
USE JBP;

CREATE TABLE Admin (
    Admin_ID INT AUTO_INCREMENT PRIMARY KEY,
    Admin_username VARCHAR(50) NOT NULL,
    Admin_password VARCHAR(50) NOT NULL
);


INSERT INTO Admin (Admin_username, Admin_password) 
VALUES ('admin1', 'password1');


CREATE TABLE Categories (
    Category_ID INT AUTO_INCREMENT PRIMARY KEY,
    Category_name VARCHAR(50) NOT NULL
);

INSERT INTO Categories (Category_name) VALUES ('Smartphones'), ('Tablets'), ('Accessories'), ('Wearables'), ('Earphones'), ('Powerbanks'), ('Speakers'), ('Phone stands'), ('Storage extender'), ('Mobile Photography accessories');

CREATE TABLE Customer (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_name VARCHAR(50) NOT NULL,
    Customer_email VARCHAR(100) NOT NULL,
    Customer_password VARCHAR(50) NOT NULL,
    Customer_HP VARCHAR(15) NOT NULL,
    Customer_address VARCHAR(100) NOT NULL
);

INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address) 
VALUES ('John Doe', 'john.doe@example.com', 'john123', '123456789', '123 Main St'),
       ('Jane Smith', 'jane.smith@example.com', 'jane456', '987654321', '456 Oak Ave'),
       ('Mike Johnson', 'mike.johnson@example.com', 'mike789', '789456123', '789 Elm St'),
       ('Emily Davis', 'emily.davis@example.com', 'emily123', '321654987', '987 Pine St'),
       ('David Brown', 'david.brown@example.com', 'david456', '456321789', '654 Cedar Ave'),
       ('Sarah Wilson', 'sarah.wilson@example.com', 'sarah789', '654987321', '852 Maple St'),
       ('Chris Lee', 'chris.lee@example.com', 'chris123', '987123654', '369 Birch St'),
       ('Amy Taylor', 'amy.taylor@example.com', 'amy456', '321789654', '258 Walnut Ave'),
       ('Kevin Martinez', 'kevin.martinez@example.com', 'kevin789', '741852963', '147 Ash St'),
       ('Laura Garcia', 'laura.garcia@example.com', 'laura123', '852963741', '369 Pine St');

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
    Product_price FLOAT(7,2) NOT NULL,
    Category_ID INT,
    FOREIGN KEY (Category_ID) REFERENCES Categories(Category_ID)
);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('iPhone 13', 'Newest iPhone model', 50, 999.99, 1),
       ('Samsung Galaxy S21 Ultra', 'Flagship Android smartphone', 30, 1199.99, 1),
       ('Google Pixel 6 Pro', 'High-end Android device', 20, 899.99, 1),
       ('OnePlus 10 Pro', 'Premium Android phone', 40, 899.99, 1),
       ('Xiaomi Mi 12', 'Affordable flagship phone', 60, 699.99, 1),
       ('Sony Xperia 1 III', 'Powerful multimedia phone', 25, 1099.99, 1),
       ('iPhone SE (2022)', 'Compact iOS device', 35, 499.99, 1),
       ('Samsung Galaxy A52', 'Mid-range Android phone', 45, 399.99, 1),
       ('Google Pixel 5a', 'Affordable Google phone', 55, 449.99, 1),
       ('OnePlus Nord 2', 'Budget-friendly OnePlus device', 30, 399.99, 1);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('iPad Pro 12.9-inch (2022)', 'Powerful iPad for professionals', 20, 1099.99, 2),
       ('Samsung Galaxy Tab S8+', 'Premium Android tablet', 15, 899.99, 2),
       ('Microsoft Surface Pro 8', 'Versatile Windows tablet', 25, 999.99, 2),
       ('Amazon Fire HD 10', 'Affordable Android tablet', 50, 149.99, 2),
       ('Lenovo Tab P11 Pro', 'Sleek Android tablet', 30, 499.99, 2),
       ('Huawei MatePad Pro 12.6', 'High-end Huawei tablet', 10, 699.99, 2),
       ('iPad Air (2022)', 'Versatile iPad with A15 Bionic chip', 40, 599.99, 2),
       ('Samsung Galaxy Tab A7 Lite', 'Compact and lightweight tablet', 35, 199.99, 2),
       ('Microsoft Surface Go 3', 'Affordable Windows tablet', 45, 399.99, 2),
       ('Amazon Fire HD 8', 'Budget-friendly Amazon tablet', 60, 89.99, 2);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('iPhone 13 Case', 'Protective case for iPhone 13', 100, 19.99, 3),
       ('Samsung Galaxy S21 Ultra Case', 'Rugged case for Samsung Galaxy S21 Ultra', 80, 24.99, 3),
       ('Google Pixel 6 Pro Case', 'Slim case for Google Pixel 6 Pro', 70, 14.99, 3),
       ('OnePlus 10 Pro Screen Protector', 'Tempered glass screen protector for OnePlus 10 Pro', 120, 9.99, 3),
       ('Xiaomi Mi 12 Charger', 'Fast charging adapter for Xiaomi Mi 12', 150, 29.99, 3),
       ('Sony Xperia 1 III Wireless Charger', 'Qi-compatible wireless charger for Sony Xperia 1 III', 90, 39.99, 3),
       ('iPhone SE (2022) Earphones', 'Apple EarPods with Lightning connector', 110, 29.99, 3),
       ('Samsung Galaxy A52 Car Mount', 'Universal car mount for Samsung Galaxy A52', 95, 19.99, 3),
       ('Google Pixel 5a Power Bank', 'Portable power bank for Google Pixel 5a', 130, 49.99, 3),
       ('OnePlus Nord 2 USB-C Cable', 'Durable USB-C cable for OnePlus Nord 2', 140, 14.99, 3);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('Apple Watch Series 7', 'Latest Apple smartwatch', 20, 399.99, 4),
       ('Samsung Galaxy Watch 4', 'Premium Android smartwatch', 15, 299.99, 4),
       ('Fitbit Charge 5', 'Advanced fitness tracker', 25, 179.99, 4),
       ('Garmin Venu 2', 'GPS smartwatch with health monitoring', 30, 349.99, 4),
       ('Xiaomi Mi Band 6', 'Affordable fitness tracker', 40, 49.99, 4),
       ('Fossil Gen 6', 'Stylish smartwatch with Wear OS', 35, 299.99, 4),
       ('Apple AirPods Pro', 'Premium noise-cancelling earphones', 50, 249.99, 4),
       ('Sony WF-1000XM4', 'High-resolution wireless earbuds', 45, 279.99, 4),
       ('Jabra Elite 85t', 'True wireless earbuds with ANC', 60, 199.99, 4),
       ('Samsung Galaxy Buds Pro', 'True wireless earbuds with 360 Audio', 55, 199.99, 4);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('Anker PowerCore 10000', 'Portable power bank with 10000mAh capacity', 70, 29.99, 5),
       ('RAVPower PD Pioneer 20000', 'High-capacity power bank with Power Delivery', 80, 49.99, 5),
       ('Mophie Powerstation Plus XL', 'Wireless charging power bank', 60, 79.99, 5),
       ('Zendure SuperMini', 'Compact power bank with 10000mAh capacity', 90, 39.99, 5),
       ('AUKEY Basix Pro', 'Slim power bank with Quick Charge 3.0', 100, 24.99, 5),
       ('Anker PowerCore Slim 10000 PD', 'Ultra-slim power bank with Power Delivery', 85, 34.99, 5),
       ('Belkin Boost Charge 10K', 'Portable power bank with 10000mAh capacity', 75, 39.99, 5),
       ('Xiaomi Mi Power Bank 3 Pro', 'High-speed power bank with 20000mAh capacity', 95, 49.99, 5),
       ('Samsung Wireless Charger Portable Battery', 'Wireless charging power bank with 10000mAh capacity', 65, 69.99, 5),
       ('RAVPower Ace 22000', 'Ultra-high-capacity power bank with 22000mAh capacity', 110, 59.99, 5);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('JBL Flip 5', 'Portable Bluetooth speaker with IPX7 waterproof rating', 30, 99.99, 6),
       ('Sony SRS-XB33', 'Portable speaker with Extra Bass and party lights', 25, 149.99, 6),
       ('UE Boom 3', 'Bluetooth speaker with 360-degree sound and water resistance', 35, 129.99, 6),
       ('Anker Soundcore Flare 2', 'Waterproof speaker with customizable LED lights', 40, 79.99, 6),
       ('Bose SoundLink Revolve+', '360-degree Bluetooth speaker with deep, loud, and immersive sound', 45, 299.99, 6),
       ('JBL Charge 5', 'Portable Bluetooth speaker with built-in power bank', 20, 179.99, 6),
       ('Ultimate Ears MEGABOOM 3', 'Portable waterproof Bluetooth speaker', 50, 199.99, 6),
       ('Sony SRS-XB43', 'Extra Bass portable Bluetooth speaker', 55, 199.99, 6),
       ('Harman Kardon Onyx Studio 7', 'Wireless Bluetooth speaker with premium design and sound', 60, 249.99, 6),
       ('Marshall Stockwell II', 'Portable Bluetooth speaker with classic Marshall design', 65, 199.99, 6);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('Adjustable Phone Stand', 'Foldable phone stand for desk or travel', 80, 14.99, 7),
       ('Ugreen Phone Holder', 'Desktop phone stand with adjustable angle', 90, 9.99, 7),
       ('Lamicall Cell Phone Stand', 'Sturdy aluminum phone stand with charging hole', 70, 19.99, 7),
       ('PopSockets PopGrip', 'Expandable phone grip and stand', 100, 9.99, 7),
       ('Nulaxy Adjustable Phone Stand', 'Height-adjustable phone stand with silicone pads', 110, 15.99, 7),
       ('UGREEN Cell Phone Holder', 'Universal phone stand with silicone base', 120, 12.99, 7),
       ('Humixx Phone Stand', 'Foldable phone stand with angle adjustment', 130, 11.99, 7),
       ('Anker PowerWave Stand', 'Wireless charging stand with adjustable viewing angle', 140, 29.99, 7),
       ('JETech Adjustable Tablet Stand', 'Multi-angle tablet stand compatible with smartphones', 150, 8.99, 7),
       ('Syncwire Cell Phone Ring Holder', 'Rotating phone ring holder and stand', 160, 7.99, 7);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('Samsung T7 Portable SSD', 'External SSD with USB 3.2 Gen 2 interface', 50, 99.99, 9),
       ('SanDisk Extreme Portable SSD', 'Rugged external SSD with USB-C and USB-A connectors', 60, 119.99, 9),
       ('WD My Passport Portable SSD', 'Slim and compact external SSD with password protection', 70, 89.99, 9),
       ('Seagate Expansion Portable HDD', 'High-capacity external HDD with USB 3.0 interface', 80, 69.99, 9),
       ('Samsung BAR Plus USB 3.1 Flash Drive', 'Durable and compact USB flash drive', 90, 24.99, 9),
       ('SanDisk Ultra Dual Drive USB Type-C', 'Dual-interface USB flash drive with USB Type-C and USB Type-A connectors', 100, 29.99, 9),
       ('Crucial X8 Portable SSD', 'External SSD with USB 3.2 Gen 2 interface and shock resistance', 110, 139.99, 9),
       ('LaCie Rugged Mini External HDD', 'Rugged external HDD with shock, rain, and pressure resistance', 120, 99.99, 9),
       ('Lexar JumpDrive F35 Fingerprint USB 3.0 Flash Drive', 'Secure USB flash drive with fingerprint authentication', 130, 49.99, 9),
       ('Samsung FIT Plus USB 3.1 Flash Drive', 'Ultra-compact USB flash drive for easy portability', 140, 19.99, 9);

INSERT INTO Products (Product_name, Product_details, Product_stock, Product_price, Category_ID) 
VALUES ('Moment Wide Lens', 'Wide-angle lens attachment for smartphones', 40, 119.99, 10),
       ('Joby GripTight GorillaPod Stand', 'Flexible tripod with smartphone mount', 50, 39.99, 10),
       ('Anker PowerCore Fusion 5000', 'Portable charger with built-in wall charger and USB port', 60, 39.99, 10),
       ('Sandmarc Pro Telephoto Lens', 'Telephoto lens attachment for smartphones', 30, 99.99, 10),
       ('DJI Osmo Mobile 4', 'Gimbal stabilizer for smartphones', 20, 149.99, 10),
       ('Moment Tele Lens', 'Telephoto lens attachment for smartphones', 35, 119.99, 10),
       ('Peak Design Capture Clip', 'Camera clip mount for backpacks or belts', 25, 69.99, 10),
       ('Xenvo Pro Lens Kit', 'Macro and wide-angle lens kit for smartphones', 45, 39.99, 10),
       ('Manfrotto PIXI Mini Tripod', 'Compact tripod for smartphones and cameras', 55, 24.99, 10),
       ('Anker PowerPort Solar Charger', 'Solar charger for USB devices', 65, 49.99, 10);


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