-- Create the JBP database
CREATE DATABASE jbp;
USE jbp;


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Fn` text NOT NULL,
  `Ln` text NOT NULL,
  `Un` text NOT NULL,
  `email` text NOT NULL,
  `np` text NOT NULL,
  `status` text NOT NULL,
  `img` text NOT NULL DEFAULT 'images/user/null.png',
  `customer` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `projrctp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Fn`, `Ln`, `Un`, `email`, `np`, `status`, `img`, `customer`, `project`, `projrctp`) VALUES
(1, 'Super', 'Admin', 'Super Admin', 'admin@gmail.com', 'admin', 'active', 'images/user/null.png', 50007, 2078, 78),
(1211208820, 'brand', 'on', 'noprob madam', 'bbran@example.com', 'jkjk', 'active', 'images/user/null.png', 0, 0, 0),
(1211208821, 'keke', 'mah', 'KKTE', 'kkl@gmail.com', 'kkl', 'active', 'images/user/null.png', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1211208823;



CREATE TABLE Categories (
    Category_ID INT AUTO_INCREMENT PRIMARY KEY,
    Category_name VARCHAR(50) NOT NULL
);

INSERT INTO Categories (Category_name)
VALUES ('Smartphones'), ('Tablets'), ('Accessories'), ('Wearables'), ('Earphones'), ('Powerbanks'), ('Speakers'), ('Phone stands'), ('Storage extender'), ('Mobile Photography accessories');

CREATE TABLE CART (
    Customer_ID INT(2) NOT NULL,
    Product_ID INT(3) NOT NULL,
    quantity INT(3) NOT NULL
);


CREATE TABLE Customer (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Customer_name VARCHAR(50) NOT NULL,
    Customer_email VARCHAR(100) NOT NULL,
    Customer_password VARCHAR(50) NOT NULL,
    Customer_HP VARCHAR(15) NOT NULL,
    Customer_address_1 VARCHAR(100) NOT NULL,
    Customer_address_2 VARCHAR(100) NOT NULL,
    img text NOT NULL,
    Customer_postcode INT(5) NOT NULL
);

INSERT INTO Customer (Customer_name, Customer_email, Customer_password, Customer_HP, Customer_address_1, Customer_address_2, Customer_postcode,img) 
VALUES ('Azlan Bin Abdul Rahman', 'azlan.abdulrahman@gmail.com', 'password123', '0121234567', 'No. 1, Jalan Suka Suka', 'Taman Sri Suka, Kuala Lumpur', '56000','images/user/null.png'),
       ('Siti Sarah Binti Ahmad', 'siti.sarah@gmail.com', 'password456', '0192345678', 'No. 2, Jalan Bunga Raya', 'Taman Bunga, Bandar Baru Bangi', '43650','images/user/null.png'),
       ('Mohd Fadhli Bin Mohd Zain', 'fadhli.mohdzain@gmail.com', 'password789', '0133456789', 'No. 3, Jalan Cenderawasih', 'Taman Cenderawasih, Johor Bahru', '81200','images/user/null.png'),
       ('Nurul Ain Binti Mohd Noor', 'nurulain.mohdnoor@gmail.com', 'password012', '0164567890', 'No. 4, Jalan Putra', 'Taman Putra, Kuala Lumpur', '52100','images/user/null.png'),
       ('Ahmad Faisal Bin Abdul Razak', 'faisal.abdulrazak@gmail.com', 'password345', '0175678901', 'No. 5, Jalan Raja', 'Taman Raja, Melaka', '75350','images/user/null.png'),
       ('Nurul Nadia Binti Abdullah', 'nadia.abdullah@gmail.com', 'password678', '0186789012', 'No. 6, Jalan Sultan', 'Taman Sultan, Penang', '90000','images/user/null.png'),
       ('Muhammad Amirul Bin Mohd Nasir', 'amirul.mohdnasir@gmail.com', 'password901', '0197890123', 'No. 7, Jalan Iskandar', 'Taman Iskandar, Alor Setar', '78000','images/user/null.png'),
       ('Nurul Izzah Binti Zulkifli', 'izzah.zulkifli@gmail.com', 'password234', '0168901234', 'No. 8, Jalan Raja Permaisuri', 'Taman Raja Permaisuri, Kuala Lumpur', '55200','images/user/null.png'),
       ('Muhammad Akmal Bin Zulkarnain', 'akmal.zulkarnain@gmail.com', 'password567', '0179012345', 'No. 9, Jalan Maharajalela', 'Taman Maharajalela, Kuala Lumpur', '50450','images/user/null.png'),
       ('Nurul Syahirah Binti Yusof', 'syahirah.yusof@gmail.com', 'password890', '0181234567', 'No. 10, Jalan Duta', 'Taman Duta, Kuala Lumpur', '50480','images/user/null.png'),
       ('See Toh Yu Xiang', '1211207620@gmail.com', 'password620', '01134718189', 'No. 10, Jalan 1/2', 'Taman Krubong, Melaka', '75350','images/user/null.png'),
       ('Lee Ang Teck', '1211207734@gmail.com', 'password734', '0193347961', 'No. 17, Jalan Malim', 'Taman Malim, Melaka', '75350','images/user/null.png'),
       ('Brandon Tan Min Yau', 'btanminyau@gmail.com', 'password437', '0136661896', 'No. 33, Jalan 1/3', 'Taman Jati, Melaka', '75350','images/user/null.png');

ALTER TABLE Customer
  ADD `reset_token_hash` VARCHAR(64) NULL DEFAULT NULL,
  ADD `reset_token_expires_at` DATETIME NULL DEFAULT NULL,
  ADD UNIQUE (`reset_token_hash`);

CREATE TABLE ooder (
    Order_ID INT AUTO_INCREMENT PRIMARY KEY,
    Order_date DATE NOT NULL,
    Order_time TIME NOT NULL,
    Total_price FLOAT(7,2) NOT NULL,
    Customer_ID INT,
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
);

CREATE TABLE Products (
    Product_ID INT AUTO_INCREMENT PRIMARY KEY,
    Product_name VARCHAR(50) NOT NULL,
    Product_details VARCHAR(100) NOT NULL,
    Product_quantity INT NOT NULL,
    Product_stock INT NOT NULL,
    Product_netprice FLOAT(7,2) NOT NULL,
    Product_price FLOAT(7,2) NOT NULL,
    Category_ID INT,
    img text NOT NULL,
    status text NOT NULL,
    FOREIGN KEY (Category_ID) REFERENCES Categories(Category_ID)
);


INSERT INTO Products (Product_ID, Product_name, Product_details, Product_quantity, Product_stock,Product_netprice, Product_price, status, img, Category_ID) VALUES
(1, 'iPhone 13', 'Newest iPhone model', 2000, 50, 399.99, 999.99, 'active', 'images/iPhone 13.jpg', 1),
(2, 'Samsung Galaxy S21 Ultra', 'Flagship Android smartphone', 2000, 30, 599.99, 1199.99, 'active', 'images/Samsung Galaxy S21 Ultra.jpg', 1),
(3, 'Google Pixel 6 Pro', 'High-end Android device', 2000, 20, 399.99, 899.99, 'active', 'images/Google Pixel 6 Pro.jpg', 1),
(4, 'OnePlus 10 Pro', 'Premium Android phone', 2000, 40, 399.99, 899.99, 'active', 'images/OnePlus 10 Pro.jpg', 1),
(5, 'Xiaomi Mi 12', 'Affordable flagship phone', 2000, 60, 199.99, 699.99, 'active', 'images/Xiaomi Mi 12.jpg', 1),
(6, 'Sony Xperia 1 III', 'Powerful multimedia phone', 2000, 25, 599.99, 1099.99, 'active', 'images/Sony Xperia 1 III.jpg', 1),
(7, 'iPhone SE (2022)', 'Compact iOS device', 2000, 35, 99.99, 499.99, 'active', 'images/iPhone SE (2022).jpg', 1),
(8, 'Samsung Galaxy A52', 'Mid-range Android phone', 2000, 45, 99.99, 399.99, 'active', 'images/Samsung Galaxy A52.jpg', 1),
(9, 'Google Pixel 5a', 'Affordable Google phone', 2000, 55, 199.99, 449.99, 'active', 'images/Google Pixel 5a.jpg', 1),
(10, 'OnePlus Nord 2', 'Budget-friendly OnePlus device', 2000, 30, 99.99, 399.99, 'active', 'images/OnePlus Nord 2.jpg', 1),

(11, 'iPad Pro 12.9-inch (2022)', 'Powerful iPad for professionals', 2000, 20, 164.99, 1099.99, 'active', 'images/iPad Pro 12.9-inch (2022).jpg', 2),
(12, 'Samsung Galaxy Tab S8+', 'Premium Android tablet', 2000, 15, 134.99, 899.99, 'active', 'images/Samsung Galaxy Tab S8+.jpg', 2),
(13, 'Microsoft Surface Pro 8', 'Versatile Windows tablet', 2000, 25, 149.99, 999.99, 'active', 'images/Microsoft Surface Pro 8.jpg', 2),
(14, 'Amazon Fire HD 10', 'Affordable Android tablet', 2000, 50, 22.50, 149.99, 'active', 'images/Amazon Fire HD 10.jpg', 2),
(15, 'Lenovo Tab P11 Pro', 'Sleek Android tablet', 2000, 30, 75.00, 499.99, 'active', 'images/Lenovo Tab P11 Pro.jpg', 2),
(16, 'Huawei MatePad Pro 12.6', 'High-end Huawei tablet', 2000, 10, 105.00, 699.99, 'active', 'images/Huawei MatePad Pro 12.6.jpg', 2),
(17, 'iPad Air (2022)', 'Versatile iPad with A15 Bionic chip', 2000, 40, 90.00, 599.99, 'active', 'images/iPad Air (2022).jpg', 2),
(18, 'Samsung Galaxy Tab A7 Lite', 'Compact and lightweight tablet', 2000, 35, 30.00, 199.99, 'active', 'images/Samsung Galaxy Tab A7 Lite.jpg', 2),
(19, 'Microsoft Surface Go 3', 'Affordable Windows tablet', 2000, 45, 60.00, 399.99, 'active', 'images/Microsoft Surface Go 3.jpg', 2),
(20, 'Amazon Fire HD 8', 'Budget-friendly Amazon tablet', 2000, 60, 13.50, 89.99, 'active', 'images/Amazon Fire HD 8.jpg', 2),

(21, 'iPhone 13 Case', 'Protective case for iPhone 13', 2000, 100, 3.00, 19.99, 'active', 'images/iPhone 13 Case.jpg', 3),
(22, 'Samsung Galaxy S21 Ultra Case', 'Rugged case for Samsung Galaxy S21 Ultra', 2000, 80, 3.75, 24.99, 'active', 'images/Samsung Galaxy S21 Ultra Case.jpg', 3),
(23, 'Google Pixel 6 Pro Case', 'Slim case for Google Pixel 6 Pro', 2000, 70, 2.25, 14.99, 'active', 'images/Google Pixel 6 Pro Case.jpg', 3),
(24, 'OnePlus 10 Pro Screen Protector', 'Tempered glass screen protector for OnePlus 10 Pro', 2000, 120, 1.50, 9.99, 'active', 'images/OnePlus 10 Pro Screen Protector.jpg', 3),
(25, 'Xiaomi Mi 12 Charger', 'Fast charging adapter for Xiaomi Mi 12', 2000, 150, 4.50, 29.99, 'active', 'images/Xiaomi Mi 12 Charger.jpg', 3),
(26, 'Sony Xperia 1 III Wireless Charger', 'Qi-compatible wireless charger for Sony Xperia 1 III', 2000, 90, 6.00, 39.99, 'active', 'images/Sony Xperia 1 III Wireless Charger.jpg', 3),
(27, 'iPhone SE (2022) Earphones', 'Apple EarPods with Lightning connector', 2000, 110, 4.50, 29.99, 'active', 'images/iPhone SE (2022) Earphones.jpg', 3),
(28, 'Samsung Galaxy A52 Car Mount', 'Universal car mount for Samsung Galaxy A52', 2000, 95, 3.00, 19.99, 'active', 'images/Samsung Galaxy A52 Car Mount.jpg', 3),
(29, 'Google Pixel 5a Power Bank', 'Portable power bank for Google Pixel 5a', 2000, 130, 7.50, 49.99, 'active', 'images/Google Pixel 5a Power Bank.jpg', 3),
(30, 'OnePlus Nord 2 USB-C Cable', 'Durable USB-C cable for OnePlus Nord 2', 2000, 140, 2.25, 14.99, 'active', 'images/OnePlus Nord 2 USB-C Cable.jpg', 3),

(31, 'Apple Watch Series 7', 'Latest Apple smartwatch', 2000, 20, 60.00, 399.99, 'active', 'images/Apple Watch Series 7.jpg', 4),
(32, 'Samsung Galaxy Watch 4', 'Premium Android smartwatch', 2000, 15, 45.00, 299.99, 'active', 'images/Samsung Galaxy Watch 4.jpg', 4),
(33, 'Fitbit Charge 5', 'Advanced fitness tracker', 2000, 25, 27.00, 179.99, 'active', 'images/Fitbit Charge 5.jpg', 4),
(34, 'Garmin Venu 2', 'GPS smartwatch with health monitoring', 2000, 30, 52.50, 349.99, 'active', 'images/Garmin Venu 2.jpg', 4),
(35, 'Xiaomi Mi Band 6', 'Affordable fitness tracker', 2000, 40, 7.50, 49.99, 'active', 'images/Xiaomi Mi Band 6.jpg', 4),
(36, 'Fossil Gen 6', 'Stylish smartwatch with Wear OS', 2000, 35, 45.00, 299.99, 'active', 'images/Fossil Gen 6.jpg', 4),
(37, 'Huawei Watch GT 3', 'Elegant smartwatch with long battery life', 2000, 18, 46.20, 329.99, 'active', 'images/Huawei Watch GT 3.jpg', 4),
(38, 'Amazfit GTR 3', 'Smartwatch with comprehensive health tracking', 2000, 28, 33.00, 229.99, 'active', 'images/Amazfit GTR 3.jpg', 4),
(39, 'Oura Ring', 'Smart ring for fitness and sleep tracking', 2000, 50, 5.50, 299.00, 'active', 'images/Oura Ring.jpg', 4),
(40, 'Garmin Forerunner 945', 'Advanced GPS running smartwatch', 2000, 20, 50.00, 499.99, 'active', 'images/Garmin Forerunner 945.jpg', 4),


(41, 'Apple AirPods Pro', 'Premium noise-cancelling earphones', 2000, 50, 37.50, 249.99, 'active', 'images/Apple AirPods Pro.jpg', 5),
(42, 'Sony WF-1000XM4', 'High-resolution wireless earbuds', 2000, 45, 42.00, 279.99, 'active', 'images/Sony WF-1000XM4.jpg', 5),
(43, 'Jabra Elite 85t', 'True wireless earbuds with ANC', 2000, 60, 30.00, 199.99, 'active', 'images/Jabra Elite 85t.jpg', 5),
(44, 'Samsung Galaxy Buds Pro', 'True wireless earbuds with 360 Audio', 2000, 55, 30.00, 199.99, 'active', 'images/Samsung Galaxy Buds Pro.jpg', 5),
(45, 'Bose QuietComfort Earbuds', 'Noise-cancelling wireless earbuds', 2000, 48, 35.00, 279.00, 'active', 'images/Bose QuietComfort Earbuds.jpg', 5),
(46, 'Sennheiser Momentum True Wireless 2', 'High-fidelity sound wireless earbuds', 2000, 40, 34.00, 299.95, 'active', 'images/Sennheiser Momentum True Wireless 2.jpg', 5),
(47, 'Anker Soundcore Liberty Air 2 Pro', 'Affordable noise-cancelling earbuds', 2000, 70, 25.00, 129.99, 'active', 'images/Anker Soundcore Liberty Air 2 Pro.jpg', 5),
(48, 'Beats Powerbeats Pro', 'High-performance workout earbuds', 2000, 30, 38.00, 249.95, 'active', 'images/Beats Powerbeats Pro.jpg', 5),
(49, 'Google Pixel Buds A-Series', 'Affordable true wireless earbuds', 2000, 65, 23.00, 99.99, 'active', 'images/Google Pixel Buds A-Series.jpg', 5),
(50, 'Jaybird Vista 2', 'Sporty true wireless earbuds', 2000, 55, 24.00, 149.99, 'active', 'images/Jaybird Vista 2.jpg', 5),

(51, 'Anker PowerCore 10000', 'Portable power bank with 10000mAh capacity', 2000, 70, 4.50, 29.99, 'active', 'images/Anker PowerCore 10000.jpg', 6),
(52, 'RAVPower PD Pioneer 20000', 'High-capacity power bank with Power Delivery', 2000, 80, 7.50, 49.99, 'active', 'images/RAVPower PD Pioneer 20000.jpg', 6),
(53, 'Mophie Powerstation Plus XL', 'Wireless charging power bank', 2000, 60, 12.00, 79.99, 'active', 'images/Mophie Powerstation Plus XL.jpg', 6),
(54, 'Zendure SuperMini', 'Compact power bank with 10000mAh capacity', 2000, 90, 6.00, 39.99, 'active', 'images/Zendure SuperMini.jpg', 6),
(55, 'AUKEY Basix Pro', 'Slim power bank with Quick Charge 3.0', 2000, 100, 3.75, 24.99, 'active', 'images/AUKEY Basix Pro.jpg', 6),
(56, 'Anker PowerCore Slim 10000 PD', 'Ultra-slim power bank with Power Delivery', 2000, 85, 5.25, 34.99, 'active', 'images/Anker PowerCore Slim 10000 PD.jpg', 6),
(57, 'Belkin Boost Charge 10K', 'Portable power bank with 10000mAh capacity', 2000, 75, 6.00, 39.99, 'active', 'images/Belkin Boost Charge 10K.jpg', 6),
(58, 'Xiaomi Mi Power Bank 3 Pro', 'High-speed power bank with 20000mAh capacity', 2000, 95, 7.50, 49.99, 'active', 'images/Xiaomi Mi Power Bank 3 Pro.jpg', 6),
(59, 'Samsung Wireless Charger Portable Battery', 'Wireless charging power bank with 10000mAh capacity', 2000, 65, 10.50, 69.99, 'active', 'images/Samsung Wireless Charger Portable Battery.jpg', 6),
(60, 'RAVPower Ace 22000', 'Ultra-high-capacity power bank with 22000mAh capacity', 2000, 110, 9.00, 59.99, 'active', 'images/RAVPower Ace 22000.jpg', 6),

(61, 'JBL Flip 5', 'Portable Bluetooth speaker with IPX7 waterproof rating', 2000, 30, 15.00, 99.99, 'active', 'images/JBL Flip 5.jpg', 7),
(62, 'Sony SRS-XB33', 'Portable speaker with Extra Bass and party lights', 2000, 25, 22.50, 149.99, 'active', 'images/Sony SRS-XB33.jpg', 7),
(63, 'UE Boom 3', 'Bluetooth speaker with 360-degree sound and water resistance', 2000, 35, 19.50, 129.99, 'active', 'images/UE Boom 3.jpg', 7),
(64, 'Anker Soundcore Flare 2', 'Waterproof speaker with customizable LED lights', 2000, 40, 12.00, 79.99, 'active', 'images/Anker Soundcore Flare 2.jpg', 7),
(65, 'Bose SoundLink Revolve+', '360-degree Bluetooth speaker with deep, loud, and immersive sound', 2000, 45, 45.00, 299.99, 'active', 'images/Bose SoundLink Revolve+.jpg', 7),
(66, 'JBL Charge 5', 'Portable Bluetooth speaker with built-in power bank', 2000, 20, 27.00, 179.99, 'active', 'images/JBL Charge 5.jpg', 7),
(67, 'Ultimate Ears MEGABOOM 3', 'Portable waterproof Bluetooth speaker', 2000, 50, 30.00, 199.99, 'active', 'images/Ultimate Ears MEGABOOM 3.jpg', 7),
(68, 'Sony SRS-XB43', 'Extra Bass portable Bluetooth speaker', 2000, 55, 30.00, 199.99, 'active', 'images/Sony SRS-XB43.jpg', 6),
(69, 'Harman Kardon Onyx Studio 7', 'Wireless Bluetooth speaker with premium design and sound', 2000, 60, 37.50, 249.99, 'active', 'images/Harman Kardon Onyx Studio 7.jpg', 7),
(70, 'Marshall Stockwell II', 'Portable Bluetooth speaker with classic Marshall design', 2000, 65, 30.00, 199.99, 'active', 'images/Marshall Stockwell II.jpg', 7),

(71, 'Adjustable Phone Stand', 'Foldable phone stand for desk or travel', 2000, 80, 2.25, 14.99, 'active', 'images/Adjustable Phone Stand.jpg', 8),
(72, 'Ugreen Phone Holder', 'Desktop phone stand with adjustable angle', 2000, 90, 1.50, 9.99, 'active', 'images/Ugreen Phone Holder.jpg', 8),
(73, 'Lamicall Cell Phone Stand', 'Sturdy aluminum phone stand with charging hole', 2000, 70, 3.00, 19.99, 'active', 'images/Lamicall Cell Phone Stand.jpg', 8),
(74, 'PopSockets PopGrip', 'Expandable phone grip and stand', 2000, 100, 1.50, 9.99, 'active', 'images/PopSockets PopGrip.jpg', 8),
(75, 'Nulaxy Adjustable Phone Stand', 'Height-adjustable phone stand with silicone pads', 2000, 110, 2.40, 15.99, 'active', 'images/Nulaxy Adjustable Phone Stand.jpg', 8),
(76, 'UGREEN Cell Phone Holder', 'Universal phone stand with silicone base', 2000, 120, 1.95, 12.99, 'active', 'images/UGREEN Cell Phone Holder.jpg', 8),
(77, 'Humixx Phone Stand', 'Foldable phone stand with angle adjustment', 2000, 130, 1.80, 11.99, 'active', 'images/Humixx Phone Stand.jpg', 8),
(78, 'Anker PowerWave Stand', 'Wireless charging stand with adjustable viewing angle', 2000, 140, 4.50, 29.99, 'active', 'images/Anker PowerWave Stand.jpg', 8),
(79, 'JETech Adjustable Tablet Stand', 'Multi-angle tablet stand compatible with smartphones', 2000, 150, 1.35, 8.99, 'active', 'images/JETech Adjustable Tablet Stand.jpg', 8),
(80, 'Syncwire Cell Phone Ring Holder', 'Rotating phone ring holder and stand', 2000, 160, 1.20, 7.99, 'inactive', 'images/Syncwire Cell Phone Ring Holder.jpg', 8),

(81, 'Samsung T7 Portable SSD', 'External SSD with USB 3.2 Gen 2 interface', 2000, 50, 15.00, 99.99, 'active', 'images/Samsung T7 Portable SSD.jpg', 9),
(82, 'SanDisk Extreme Portable SSD', 'Rugged external SSD with USB-C and USB-A connectors', 2000, 60, 18.00, 119.99, 'active', 'images/SanDisk Extreme Portable SSD.jpg', 9),
(83, 'WD My Passport Portable SSD', 'Slim and compact external SSD with password protection', 2000, 70, 13.50, 89.99, 'active', 'images/WD My Passport Portable SSD.jpg', 9),
(84, 'Seagate Expansion Portable HDD', 'High-capacity external HDD with USB 3.0 interface', 2000, 80, 10.50, 69.99, 'active', 'images/Seagate Expansion Portable HDD.jpg', 9),
(85, 'Samsung BAR Plus USB 3.1 Flash Drive', 'Durable and compact USB flash drive', 2000, 90, 3.75, 24.99, 'active', 'images/Samsung BAR Plus USB 3.1 Flash Drive.jpg', 9),
(86, 'SanDisk Ultra Dual Drive USB Type-C', 'Dual-interface USB flash drive with USB Type-C and USB Type-A connectors', 2000, 100, 4.50, 29.99, 'active', 'images/SanDisk Ultra Dual Drive USB Type-C.jpg', 9),
(87, 'Crucial X8 Portable SSD', 'External SSD with USB 3.2 Gen 2 interface and shock resistance', 2000, 110, 21.00, 139.99, 'active', 'images/Crucial X8 Portable SSD.jpg', 9),
(88, 'LaCie Rugged Mini External HDD', 'Rugged external HDD with shock, rain, and pressure resistance', 2000, 120, 15.00, 99.99, 'active', 'images/LaCie Rugged Mini External HDD.jpg', 9),
(89, 'Lexar JumpDrive F35', 'Secure USB flash drive with fingerprint authentication', 2000, 130, 7.50, 49.99, 'active', 'images/Lexar JumpDrive F35 Fingerprint USB 3.0 Flash Driv.jpg', 9),
(90, 'Samsung FIT Plus USB 3.1 Flash Drive', 'Ultra-compact USB flash drive for easy portability', 2000, 140, 3.00, 19.99, 'active', 'images/Samsung FIT Plus USB 3.1 Flash Drive.jpg', 9),

(91, 'Moment Wide Lens', 'Wide-angle lens attachment for smartphones', 2000, 40, 18.00, 119.99, 'active', 'images/Moment Wide Lens.jpg', 10),
(92, 'Joby GripTight GorillaPod Stand', 'Flexible tripod with smartphone mount', 2000, 50, 6.00, 39.99, 'active', 'images/Joby GripTight GorillaPod Stand.jpg', 10),
(93, 'Anker PowerCore Fusion 5000', 'Portable charger with built-in wall charger and USB port', 2000, 60, 6.00, 39.99, 'active', 'images/Anker PowerCore Fusion 5000.jpg', 10),
(94, 'Sandmarc Pro Telephoto Lens', 'Telephoto lens attachment for smartphones', 2000, 30, 15.00, 99.99, 'active', 'images/Sandmarc Pro Telephoto Lens.jpg', 10),
(95, 'DJI Osmo Mobile 4', 'Gimbal stabilizer for smartphones', 2000, 20, 22.50, 149.99, 'active', 'images/DJI Osmo Mobile 4.jpg', 10),
(96, 'Moment Tele Lens', 'Telephoto lens attachment for smartphones', 2000, 35, 18.00, 119.99, 'active', 'images/Moment Tele Lens.jpg', 10),
(97, 'Peak Design Capture Clip', 'Camera clip mount for backpacks or belts', 2000, 25, 10.50, 69.99, 'active', 'images/Peak Design Capture Clip.jpg', 10),
(98, 'Xenvo Pro Lens Kit', 'Macro and wide-angle lens kit for smartphones', 2000, 45, 6.00, 39.99, 'active', 'images/Xenvo Pro Lens Kit.jpg', 10),
(99, 'Manfrotto PIXI Mini Tripod', 'Compact tripod for smartphones and cameras', 2000, 55, 3.75, 24.99, 'active', 'images/Manfrotto PIXI Mini Tripod.jpg', 10),
(100, 'Anker PowerPort Solar Charger', 'Solar charger for USB devices', 2000, 65, 7.50, 49.99, 'active', 'images/Anker PowerPort Solar Charger.jpg', 10);




CREATE TABLE card (
    Card_name VARCHAR(50) PRIMARY KEY,
    Card_num INT(16) NOT NULL,
    Card_edate VARCHAR(5) NOT NULL,
    Card_cv INT(3) NOT NULL
);

CREATE TABLE Payment (
    Payment_ID INT AUTO_INCREMENT PRIMARY KEY,
    Payment_date DATE NOT NULL,
    Payment_method VARCHAR(15) NOT NULL,
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

CREATE TABLE `transaction_report` (
  `Report_ID` int(11) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Order_ID` int(11) DEFAULT NULL,
  `Payment_ID` int(11) DEFAULT NULL,
  `Promo_ID` int(11) NOT NULL DEFAULT 0,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `transaction_report` (`Report_ID`, `Customer_ID`, `Order_ID`, `Payment_ID`, `Promo_ID`, `status`) VALUES
(1, 1, 1, 1, 0, 'Completed'),
(2, 2, 2, 2, 0, 'Completed'),
(3, 3, 3, 3, 0, 'Completed'),
(4, 4, 4, 4, 0, 'Completed'),
(5, 5, 5, 5, 0, 'Completed'),
(6, 6, 6, 6, 0, 'Paid'),
(7, 7, 7, 7, 0, 'Delivered'),
(8, 8, 8, 8, 0, 'Paid'),
(9, 9, 9, 9, 0, 'Paid'),
(10, 10, 10, 10, 0, 'Paid'),
(19, 14, 18, 18, 0, 'Paid'),
(20, 14, 20, 20, 0, 'Delivered'),
(21, 15, 21, 20, 0, 'Paid');


ALTER TABLE `transaction_report`
  ADD PRIMARY KEY (`Report_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Payment_ID` (`Payment_ID`);


ALTER TABLE `transaction_report`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;



CREATE TABLE tng (
    Customer_ID INT,
    Balance FLOAT(7,2) NOT NULL
);

INSERT INTO tng (Customer_ID, Balance) 
VALUES (1,200.99),
       (2,200.99),
       (3,200.99),
       (4,200.99),
       (5,200.99),
       (6,200.99),
       (7,200.99),
       (8,200.99),
       (9,200.99),
       (10,200.99),
       (11,200.99),
       (12,200.99),
       (13,200.99);


CREATE TABLE promotion (
  code_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  code text NOT NULL,
  discount double NOT NULL,
  valid int(11) NOT NULL DEFAULT 200,
  status text NOT NULL DEFAULT 'active'
);

CREATE TABLE `promotion` (
  `code_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `discount` double NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 200,
  `status` text NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `promotion` (`code_id`, `code`, `discount`, `valid`, `status`) VALUES
(0, 'No promo code applied', 0, 200, 'active'),
(1, 'jbp111', 0.1, 200, 'active'),
(2, 'jbp222', 0.2, 200, 'active'),
(3, 'jbp555', 0.5, 200, 'active'),
(4, 'jbp999', 0.9, 193, 'active');


ALTER TABLE `promotion`
  ADD PRIMARY KEY (`code_id`);


ALTER TABLE `promotion`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


CREATE TABLE `orderdetail` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(3) NOT NULL
) 
