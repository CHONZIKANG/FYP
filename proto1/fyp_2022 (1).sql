-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 01:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp 2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `user_gender` text NOT NULL,
  `D_O_Birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `user_password`, `user_phone`, `email`, `user_name`, `user_gender`, `D_O_Birth`) VALUES
(0, 'Jojo1234', '0126419716', 'mastersonic@gmail.com', 'mastersonic', 'Male', '2022-03-15'),
(750, 'Abc12345', '012-5555555', '1201200750@gmail.com', 'dynx', 'Male', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `receiver_name` text NOT NULL,
  `receiver_phone_number` varchar(200) NOT NULL,
  `receiver_address` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_isDelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `receiver_name`, `receiver_phone_number`, `receiver_address`, `user_id`, `address_isDelete`) VALUES
(15, 'CHON ZI KANG', '012-6800412', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 1),
(16, 'CHON ZI KANG', '012-6900412', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 1),
(17, 'Jelly Wong', '010-6788926', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 0),
(18, 'CHON ZI KANG', '012-6900412', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 1),
(20, 'Kelly Tan', '012-6788921', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 0),
(21, 'Jack Lang', '012-6780578', 'No.91, Jalan Aki, Taman Abu Aki, 75960, Kuala Lumpur, Malaysia.', 0, 0),
(22, 'Chon Zi Qingg', '012-6862681', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 0, 0),
(23, 'Chon Zi Qingg', '012-6862681', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 0, 1),
(41, 'CHON ZI KANG', '012-9977895', 'NO.9, JALAN PB3, TAMAN PADANG BALANG', 750, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_quantity`, `product_id`, `user_id`) VALUES
(25, 4, 2, 750),
(26, 3, 1, 750);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `Suggestions` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_description` varchar(10000) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_isDelete` int(11) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_price`, `product_description`, `product_qty`, `product_isDelete`, `product_image`) VALUES
(1, '100% HOCO U67 SILICONE CHARGING DATA CABLE 2.4A (1.2M)', 'HOCO', '40.70', '<p>U67 Soft silicone USB to Lightning charging data sync cable 1.2m current up to 2.4A zinc alloy casing anti-pull braid</p>\r\n				<ol type=\"1\">\r\n			   <li> Length 1.2m, weight 29g.</li>\r\n			   <li> The maximum current is about 2.4A, supporting charging and data transmission.</li>\r\n			   <li> Material: zinc alloy case.</li>\r\n			   <li> Wire core specification: four core enameled wire (43 / 0.08) * 2C + (25 / 0.08) * 2C OD: 3.5mm.</li>\r\n			   <li> Anti-pull, good flame retardancy, environmentally friendly and non-toxic. Available for all Micro, Lightning and Type-C phones</li>', 5, 0, 'HOCO U67 SILICONE CHARGING DATA CABLE 2.4A 1.2M.jpg'),
(2, '100% LDNIO LIGHTNING CABLE LS26', 'Others', '15.00', 'Product details of Ldnio LS26 Lightning\r\n			  <ul type=\"disc\">\r\n			<li>Stainless Steel Lightning Interface Data & Charge Flat Cable 1 Meter - Pink</li>\r\n			<li>1 Meter Cable Length with Nylon Knitting Design</li>\r\n			<li>Lightning Connector for Most of the iPhone Devices with Lightning Interface</li>\r\n			<li>Fast Sync for Data Transfer</li>\r\n			<li>Effective Anti-Winding</li>\r\n			<li>Support High Speed Transmission, Fast Charging 2.5A</li>\r\n			<li>Gold Plated Aluminum Alloy Connector</li>\r\n			<li>Protected by Stainless Steeel Shell for Long Lasting Durability</li>\r\n			<li>Environmental Protection Material</li>\r\n			<li>Model:LS26</li></ul>', 20, 0, 'LDNIO LIGHTNING CABLE LS26.jpg'),
(3, 'SADA V-188 MINI USB SPEAKERS 3.5MM AUX WIRED LAPTOP SPEAKERS LOVELY HEART', 'GW666', '16.80', '<p><b>Product details</b></p>\r\n			   <ul type=\"disc\">\r\n				<p>This product is :- Gluten Free,Vegan,Vegetarian,</p>\r\n				<li>Intelligent Personal Assistant:NONE</li>\r\n				<li>Power Source:DC</li>\r\n				<li>Remote Control:No</li>\r\n				<li>Waterproof:No</li>\r\n				<li>Channels:2 (2.0)</li>\r\n				<li>Audio Crossover:Full-Range</li>\r\n				<li>Support Memory Card:No</li>\r\n				<li>Battery:No</li>\r\n				<li>Communication:AUX</li>\r\n				<li>Model Number:SADA V-188</li>\r\n				<li>Frequency Range:Other</li>\r\n				<li>Feature:None</li>\r\n				<li>Support APP:No</li>\r\n				<li>Brand Name:Sada</li>\r\n				<li>Output Power:3W</li>\r\n				<li>Support Apt-x:No</li>\r\n				<li>Material:Plastic</li>\r\n				<li>Voice Control:No</li>\r\n				<li>PMPO:3W</li>\r\n				<li>Speaker Type:Portable</li>\r\n				<li>Display Screen:No</li>\r\n				<li>Playback Function:Other</li>\r\n				<li>Display Screen:No</li>\r\n				<li>Cabinet Material:Plastic</li>\r\n				<li>Built-in Microphone:No</li>\r\n				<li>Number of Loudspeaker Enclosure:2</li>\r\n				<li>Intelligent Personal Assistant:None</li></ul>', 36, 0, 'SADA V-188 MINI USB SPEAKERS 3.5MM AUX WIRED LAPTOP SPEAKERS LOVELY HEART SMALL.jpeg'),
(4, 'MULTIMEDIA TROLLY SPEAKER GZ-W812', 'Others', '280.20', '<p><b>Function</b></p>\r\n				 <ul type=\"disc\">\r\n				<li>With LED Display\r\n				<li>With USB / TF / BT / FM / AUX Radio</li>\r\n				<li>Sealed Woody Speaker Box. Stylish Panel</li>\r\n				<li> With Main Volume Adjusting</li>\r\n				<li>High Capacity Lithium Battery</li>\r\n				<li>Speaker Unit : 12 inch*1</li>\r\n				<li>Output Power : 3000W</li>\r\n				<li> Power Supply : Li Battery</li></ul>\r\n				<p><b>Technical Specification</b></p>\r\n				<ul type=\"disc\">\r\n				<li>Input DC-9V</li>\r\n				<li>Built-in-18650 Battery</li>\r\n				<li>Frequency Response 150-18KHz</li>\r\n				<li>Power Output RNS3@=thd10% - FM 87MHz -108MHz</li></ul>\r\n				<p><b>Box Size</b></p>\r\n				<ul type=\"disc\">\r\n				<li>400 x 312 x 590mm (GZ-W812)</p></ul>', 5, 0, 'MULTIMEDIA TROLLY SPEAKER GZ-W812.jpg'),
(5, 'ENTELLIGENCE POWERBANK 10000MAH', 'Others', '51.10', '<p>*Fashionable and portable , perfect to be use home / office / public area ,for traveling etc with \r\n			  LED indicators to profoundly display the charging status and power status support all devices with USB port. \r\n			  (Mobile power bank function ) Support charging via transmitter and via USB cable at the same time </p>\r\n              <span>24 left on stock</span>', 24, 0, 'ENTELLIGENCE POWERBANK 10000MAH.jpg'),
(6, '100% POWER BANK “J48 NIMBLE” 10000MAH DUAL USB OUTPUT', 'Hoco', '71.80', '<ol type=\"1\">\r\n			<li> Capacity: 10000mAh, 37Wh. Rated capacity: 5900mAh.</li>\r\n			<li> Input: Micro-USB / Type-C: 5V / 2A max.</li>\r\n			<li> Output: USB 1 / 2: DC5V / 2A. Total output: DC5V / 2A max.</li>\r\n			<li> LED light display the power level (button activation).</li>\r\n			<li> A+ polymer lithium battery.</li>\r\n			<li> ABS+PC flame retardant material.</li>\r\n			<li> Size: 138*68*16mm. Weight: 218g</li></ol>', 38, 0, 'POWER BANK.jpg'),
(7, 'EARPOD WITH REMOTE & MIC FOR APPLE IPHONE IPAD IPOD SAMSUNG VIVO HUAWEI OPPO', 'others', '4.00', '<p><b>Product details</b></p>\r\n				<p>Product Description</p>\r\n				<ul type=\"disc\">\r\n				<li>Handfree Iphone Music Stereo Earphones With Mic</li>\r\n				<li>Noise Lsolation With Precise Bass</li>\r\n				<li>High Fidelity Sound</li>\r\n				<li>Universal 3.5mm Jack</li></ul>', 28, 0, 'EARPOD WITH REMOTE & MIC FOR APPLE IPHONE IPAD IPOD SAMSUNG VIVO HUAWEI OPPO.jpg'),
(8, 'A1 HEAD STYLE GAMING HEADSET E-SPORTS PS4				COMPUTER HEADPHONE WITH LED LIGHT MICROPHONE WIRE CON', 'Others', '44.70', '<b>Product details</b>\r\n				<p><b>Main Features:</b></p>\r\n				<ol type=\"1\">\r\n				<li>Protein single leather head pad, comfortable to wear, permanent structure design;</li>\r\n				<li>Large size ear muff made of protein skin, soft and delicate, can reduce hearing loss;</li>\r\n				<li>Ultrathin film / high pass magnetic core / surround stereo subwoofer;</li>\r\n				<li>High sensitivity microphone can transmit voice more accurately, clearly and fluently;</li>\r\n				<li>Hose microphone, easy to adjust the position and ensure high quality communication;</li>\r\n				<li>It is equipped with glare and professional game standard, which makes the headset more dynamic and dynamic;</li>\r\n				<li>Comfortable grip, easy to use volume control box, equipped with one button microphone mute function.</li></ol>', 25, 0, 'A1 HEAD STYLE GAMING HEADSET ESPORTS PS4  COMPUTER HEADPHONE.jpg'),
(9, 'AWEI T26 TWS TRUE WIRELESS SPORTS EARBUDS CHARGING CASE SMART TOUCH FUNCTION WATERPROOF ', 'AWEI', '91.70', '<ul type=\"disc\">\r\n			 <li>Brand: Awei\r\n\r\n			<li>Color: Black</li>\r\n			<li>Wireless Bluetooth V5.0, Loda/Jerry scheme</li>\r\n			<li>TWS binaural mode, automatic pairing interconnection</li>\r\n			<li>Battery capacity of charging bin: 600mAh</li>\r\n			<li>Earplug Battery capacity: 35mAh</li>\r\n			<li>Talk time is about 3 hours</li>\r\n			<li>Music playback time is about 2.5 hours</li>\r\n			<li>Transmission Distance: 10 m Is wireless:Yes</li>\r\n			<li>With Microphone:Yes</li>\r\n			<li>Style:In-Ear</li>\r\n			<li>Communication:Wireless</li>\r\n			<li>Connectors:None</li>\r\n			<li>Wireless Type:Bluetooth</li>\r\n			<li>Control Button:Yes</li>\r\n			<li>Volume Control:Yes</li></ul>', 20, 0, 'AWEI T26 TWS TRUE WIRELESS SPORTS.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `user_cvv` varchar(4) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `card_month` varchar(100) NOT NULL,
  `card_year` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
