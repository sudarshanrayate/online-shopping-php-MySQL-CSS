-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 09:05 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(20) NOT NULL,
  `brand_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsang'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Cloath'),
(7, 'Nike'),
(8, 'Rebook'),
(9, 'Lenovo'),
(10, 'Puma'),
(11, 'Polo'),
(12, 'Lavis'),
(13, 'Pepole'),
(14, 'Books'),
(15, 'Jewellary');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(20) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `product_image` text NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`, `flag`) VALUES
(28, 1, 'ravindra@gmail.com', 'Headphone', 'headphone.jpg', 2, 800, 1600, 1),
(29, 2, 'ravindra@gmail.com', 'Jacket', 'half-sleve-jaket.jpg', 3, 2299, 6897, 1),
(30, 9, 'ravindra@gmail.com', 'Ball', 'ball.jpg', 1, 499, 499, 1),
(31, 3, 'pooja@gmail.com', 'Saree', 'saree.jpeg', 3, 899, 2697, 1),
(32, 2, 'pooja@gmail.com', 'Jacket', 'half-sleve-jaket.jpg', 1, 2299, 2299, 1),
(33, 5, 'pooja@gmail.com', 'Kurti', 'kurti.jpeg', 1, 1199, 1199, 1),
(34, 1, 'pooja@gmail.com', 'Headphone', 'headphone.jpg', 2, 800, 1600, 1),
(35, 4, 'pooja@gmail.com', 'Nike Cap', 'nike-cap.jpeg', 5, 999, 4995, 1),
(36, 14, 'p@gmail.com', 'Cotton Saree', 'saree.jpeg', 3, 800, 2400, 1),
(37, 5, 'p@gmail.com', 'Kurti', 'kurti.jpeg', 1, 1199, 1199, 1),
(38, 18, 'shadab@gmail.com', 'jeans', 'jeans.jpeg', 5, 1200, 6000, 1),
(40, 22, 'sudarshan@gmail.com', 'genius18', 'genius18-original-imaez3.jpeg', 3, 1000, 3000, 1),
(44, 30, 'arti@gmail.com', 'Ghagra choli', 'free-3bfl007-1-3buddy-fashion-original-imaf2592mhyemjhg.jpeg', 1, 2500, 2500, 1),
(45, 28, 'arti@gmail.com', ' Anarkali Gown  (Grey)', 'anarkali3.jpeg', 2, 2599, 5198, 1),
(46, 14, 'arti@gmail.com', 'Cotton Saree', 'saree.jpeg', 1, 800, 800, 1),
(47, 5, 'arti@gmail.com', 'Kurti', 'kurti.jpeg', 1, 1199, 1199, 1),
(49, 27, 'vaishali@gmail.com', 'T-Shirt', 'genius18-original-imaez3.jpeg', 2, 749, 1498, 1),
(50, 28, 'vaishali@gmail.com', ' Anarkali Gown  (Grey)', 'anarkali3.jpeg', 1, 2599, 2599, 1),
(53, 27, 'rahul@gmail.com', 'T-Shirt', 'genius18-original-imaez3.jpeg', 3, 749, 2247, 1),
(54, 29, 'rahul@gmail.com', 'Levis Jeans', 'black-levi-s-32-original.jpeg', 2, 2200, 4400, 1),
(56, 9, 'nilesh@gmail.com', 'Ball', 'ball.jpg', 6, 399, 2394, 1),
(57, 13, 'nilesh@gmail.com', 'Shoes', 'reebok-electrify-speed.jpeg', 1, 7000, 7000, 1),
(60, 22, 'nilesh@gmail.com', 'genius18', 'genius18-original-imaez3.jpeg', 1, 0, 1000, 1),
(61, 20, 'nilesh@gmail.com', 'Bat', '07bat.jpg', 1, 1999, 1999, 1),
(62, 30, 'raj@gmail.com', 'Ghagra choli', 'free-3bfl007-1-3buddy-fashion-original-imaf2592mhyemjhg.jpeg', 1, 2500, 2500, 1),
(63, 5, 'raj@gmail.com', 'Kurti', 'kurti.jpeg', 2, 1199, 2398, 1),
(64, 14, 'raj@gmail.com', 'Cotton Saree', 'saree.jpeg', 1, 800, 800, 1),
(65, 28, 'raj@gmail.com', ' Anarkali Gown  (Grey)', 'anarkali3.jpeg', 1, 2599, 2599, 1),
(66, 31, 'raj@gmail.com', 'Pralay : The Great Deluge', 'pralay-original-imaffgp9vrndmga6.jpeg', 10, 175, 1750, 1),
(67, 21, 'saurabh@gmail.com', 'Nokiya Mobile', 'nokia-105.jpeg', 1, 1299, 1299, 1),
(68, 6, 'saurabh@gmail.com', 'HP-Laptop', 'hp-laptop.jpeg', 1, 25000, 25000, 1),
(69, 29, 'saurabh@gmail.com', 'Levis Jeans', 'black-levi-s-32-original.jpeg', 3, 2200, 6600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Mens Wear'),
(3, 'Womens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Applians'),
(7, 'Electronic Gadgets'),
(8, 'Sport'),
(9, 'Mobile Accessories'),
(13, 'Books'),
(14, 'Music'),
(15, 'Jewellary');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `shepping_add` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `totalamt` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `uid`, `shepping_add`, `city`, `state`, `totalamt`, `status`) VALUES
(3, 'pooja@gmail.com', 'MG Road, Behind CSMT Terminal.', 'Mumbai', 'Maharastra', 12790, 'deley'),
(6, 'sudarshan@gmail.com', 'Pune', 'Pune', 'Maharastra', 4398, 'pending'),
(7, 'p@gmail.com', 'Dindori,Nashik', 'Nashik', 'Maharastra', 3599, 'deley'),
(10, 'shadab@gmail.com', 'Nshik', 'Nashik', 'Maharastra', 6000, 'pending'),
(11, 'arti@gmail.com', 'Gangapur Road,Nashik', 'Nashik', 'Maharastra', 9697, 'pendding'),
(12, 'vaishali@gmail.com', 'Shinde Palse', 'Nashik', 'Maharastra', 4097, 'deley'),
(13, 'rahul@gmail.com', 'Shingave', 'Niphad', 'Maharastra', 4149, 'pendding'),
(22, 'nilesh@gmail.com', 'Nandurbar', 'Nandubar', 'Maharastra', 12393, 'pendding'),
(23, 'raj@gmail.com', 'Niphad', 'Niphad', 'Maharastra', 10047, 'pendding'),
(24, 'ravindra@gmail.com', 'Gangave, Chandvad', 'Chandvad', 'Maharastra', 8996, 'pendding'),
(25, 'saurabh@gmail.com', 'Davachwadi', 'Niphad', 'Maharastra', 32899, 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_cat` int(50) NOT NULL,
  `product_brand` int(50) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keyword`) VALUES
(4, 3, 8, ' Running Lower', 999, 'Black', 'download.jpg', 'running lower'),
(5, 3, 6, 'Kurti', 1199, 'Yellow', 'kurti.jpeg', 'womens kurti'),
(6, 1, 1, 'HP-Laptop', 25000, 'Model No d2014s', 'hp-laptop.jpeg', 'HP laptop'),
(7, 3, 6, 'Women\'s-Shrug', 1299, 'Black White', 'Womens-Shrug.jpg', 'Women\'s-Shrug'),
(8, 2, 6, 'Men\'s fullseleve jecket', 1499, 'good fabric', 'fullseleve.jpg', 'jecket'),
(9, 8, 7, 'Ball', 399, 'Red', 'ball.jpg', 'ball'),
(10, 1, 2, 'Samsangn LED TV', 22999, 'LED 42cm', 'Samsang.jpeg', 'tv'),
(12, 1, 4, 'Camera 30PX', 30000, '30MPX 8GB SD Card', 'camera.jpg', 'camera'),
(13, 2, 8, 'Shoes', 7000, 'Running Shoes', 'reebok-electrify-speed.jpeg', 'running'),
(14, 3, 6, 'Cotton Saree', 800, 'good', 'saree.jpeg', 'saree cotton'),
(17, 1, 4, 'SONY Camera', 10000, 'Good', 'camera.jpg', 'camera'),
(18, 2, 6, 'jeans', 1200, 'Good', 'jeans.jpeg', 'jeans'),
(20, 8, 8, 'Bat', 1999, 'good', '07bat.jpg', 'rebook bat'),
(21, 1, 2, 'Nokiya Mobile', 1299, '4MB RAM', 'nokia-105.jpeg', 'nokiya'),
(22, 2, 6, 'genius18', 1000, 'genius18-original', 'genius18-original-imaez3.jpeg', 't-shirt'),
(23, 4, 6, 'lehenga', 1200, 'good', 'kids-lehega.jpeg', 'lehanga'),
(24, 4, 6, 'kurta', 800, 'good', 'kids-kurta.jpeg', 'kurta'),
(25, 5, 4, 'king size bed', 20000, 'good', 'kig-size-bed.jpeg', 'kig size'),
(26, 5, 4, 'king size bed', 20000, 'good', 'kig-size-bed.jpeg', 'kig size'),
(27, 2, 6, 'T-Shirt', 749, 'good', 'genius18-original-imaez3.jpeg', 'tshirt'),
(28, 3, 6, ' Anarkali Gown  (Grey)', 2599, 'Smart Products Anarkali Gown  (Grey)', 'anarkali3.jpeg', ' Anarkali Gown  (Grey)'),
(29, 2, 12, 'Levis Jeans', 2200, 'good', 'black-levi-s-32-original.jpeg', 'levis jeans'),
(30, 3, 13, 'Ghagra choli', 2500, 'good', 'free-3bfl007-1-3buddy-fashion-original-imaf2592mhyemjhg.jpeg', 'ghagra '),
(31, 13, 14, 'Pralay : The Great Deluge', 175, 'Pralay : The Great Deluge  (English, Paperback, Vineet Bajpai)', 'pralay-original-imaffgp9vrndmga6.jpeg', 'Pralay : The Great Deluge'),
(32, 13, 14, 'Wings of Fire: An Autobiography', 263, 'Wings of Fire: An Autobiography 1st Edition  (English, Paperback, Arun Tiwari, APJ Abdul Kalam)', 'wings-of-fire-an-autobiography-original-imaer2yzjmz5tzuj.jpeg', 'Wings of Fire'),
(33, 15, 15, 'Me Solitaire Delicate 14kt Diamond', 98999, 'Me Solitaire Delicate 14kt Diamond White Gold ring  (White Gold Plated)', 'qar1900wjk14w-me-solitaire-original-imaexqgstpxxrz9d.jpeg', 'Diamond Ring');

-- --------------------------------------------------------

--
-- Table structure for table `product_image_gallary`
--

CREATE TABLE `product_image_gallary` (
  `image_id` int(11) NOT NULL,
  `p_id` int(100) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image_gallary`
--

INSERT INTO `product_image_gallary` (`image_id`, `p_id`, `image`) VALUES
(6, 26, ''),
(7, 27, 'genius18-original-imae.jpeg'),
(8, 27, 'genius18-original-imae1.jpeg'),
(9, 27, 'genius18-original-imae2.jpeg'),
(10, 27, 'genius18-original-imae4.jpeg'),
(11, 27, 'genius18-original-imaez3.jpeg'),
(12, 28, 'anarkali1.jpeg'),
(13, 28, 'anarkali2.jpeg'),
(14, 28, 'anarkali3.jpeg'),
(15, 28, 'anarkali4.jpeg'),
(16, 28, 'anarkali5.jpeg'),
(17, 29, 'black-levi-s-32-original.jpeg'),
(18, 29, 'black-levi-s-32-original2.jpeg'),
(19, 29, 'black-levi-s-32-original3.jpeg'),
(20, 29, 'black-levi-s-32-original4.jpeg'),
(21, 30, 'free-3bfl007-1-3buddy-fashion-original-imaf258gm6rz2hhs.jpeg'),
(22, 30, 'free-3bfl007-1-3buddy-fashion-original-imaf258gpph4neak.jpeg'),
(23, 30, 'free-3bfl007-1-3buddy-fashion-original-imaf2592mhyemjhg.jpeg'),
(24, 30, 'free-3bfl007-1-3buddy-fashion-original-imaf2592ngca24tj.jpeg'),
(25, 4, 'yoga-500-women-s-seamless-7-8-leggings-mottled-grey.jpg'),
(26, 4, 'yoga-500-women-s-seamless-7-8-leggings-mottled-grey(1).jpg'),
(27, 5, 'xs-50000171-mustard-avaana-original-imaer23ybaruafwy.jpeg'),
(28, 5, 'xs-50000171-mustard-avaana-original-imaer23yhbpz2ysr.jpeg'),
(29, 7, 'abhira-fashion1.jpeg'),
(30, 7, 'abhira-fashion2.jpeg'),
(31, 8, '04fullseleve.jpg'),
(32, 8, 't-shirt.jpeg'),
(33, 9, '123456789-2-5-50-100-1-prokyde-cricket-ball-delta-crown-original-imae4fpykgsuujus.jpeg'),
(34, 9, '123456789-2-5-50-100-1-prokyde-cricket-ball-delta-crown-original-imae4gqextzy3dnt.jpeg'),
(35, 10, 'samsung-24k4100-original-imaempphsxazzxbr.jpeg'),
(36, 10, 'samsung-24k4100-original-imaempphkh5rtzsj.jpeg'),
(37, 6, 'lenovo-2-in-1-laptop-original-imaezzztfrgypmyj.jpeg'),
(38, 6, 'lenovo-2-in-1-laptop-original-imaezzztyq6zadhj.jpeg'),
(39, 12, 'sony-cyber-shot-dsc-h300-advance-point-and-shoot-original-imadpzjmmrfy2vzj.jpeg'),
(40, 12, 'sony-cyber-shot-dsc-h300-advance-point-and-shoot-original-imadpzjmczsn6teg.jpeg'),
(41, 13, 'super-lite-10-reebok-black-semi-solar-yllw-wht-original-imaeumyu8y4b6pgv.jpeg'),
(42, 13, 'super-lite-10-reebok-black-semi-solar-yllw-wht-original-imaeumz2rpscfgph.jpeg'),
(43, 14, 'free-1152-4em-ethnikaaz-original-imaemy27z3qe7fq5.jpeg'),
(44, 14, '1-1-1152-4-anand-sarees-free-original-imaemy27xjyhfkwg.jpeg'),
(45, 17, 'sony-cyber-shot-dsc-h300-advance-point-and-shoot-original-imadpzjmc3hwsnf7.jpeg'),
(46, 17, 'sony-cyber-shot-dsc-h300-advance-point-and-shoot-original-imadpzjmczsn6teg.jpeg'),
(47, 18, 'jeans.jpeg'),
(48, 18, 'black-levi-s-32-original.jpeg'),
(49, 20, '1-2-long-handle-verve-pro-60-kashmir-willow-3695-kookaburra-original-imaevywhxz7fwzz3.jpeg'),
(50, 20, '1-2-long-handle-verve-pro-60-kashmir-willow-3695-kookaburra-original-imaevywhptvkqv9y.jpeg'),
(51, 21, 'nokia-105.jpeg'),
(52, 21, 'nokia-105-dual-sim-2017-ta-1034-original-imaeww54wyhcvhsh.jpeg'),
(53, 22, 'genius18-original-imaez3.jpeg'),
(54, 22, 'genius18-original-imae.jpeg'),
(55, 23, '5-6-years-designewesternstylecholi-wommaniya-impex-original-imafy3k8bzmwptun.jpeg'),
(56, 23, '4-5-years-designewesternstylecholi-wommaniya-impex-original-imafy3kbpxy3hqus.jpeg'),
(57, 24, '12-18-months-ss701s-shree-shubh-original-imaeyqkcfnzhwa7g.jpeg'),
(58, 24, '3-6-months-ss701s-shree-shubh-original-imaeyqkcv5szyejv.jpeg'),
(59, 25, 'queen-na-particle-board-kosmo-mayflower-queen-bed-box-spacewood-original-imaewqmtaekfvn5q.jpeg'),
(60, 25, 'na-particle-board-mayweave-bedroom-set-bed-side-table-wardrobe-original-imaeptsa5wqyepzn.jpeg'),
(61, 29, 'jeans.jpeg'),
(62, 28, 'black-levi-s-32-original3.jpeg'),
(63, 31, 'pralay-original-imaffgp9vrndmga6 (1).jpeg'),
(64, 31, 'pralay-original-imaffgp9vrndmga6.jpeg'),
(65, 32, 'wings-of-fire-an-autobiography-original-imaer2yzjmz5tzuj (1).jpeg'),
(66, 32, 'wings-of-fire-an-autobiography-original-imaer2yzjmz5tzuj.jpeg'),
(67, 33, 'qar1900wjk14w-me-solitaire-original-imaexqgsbttx8fhz.jpeg'),
(68, 33, 'qar1900wjk14w-me-solitaire-original-imaexqgshp8zxzeh.jpeg'),
(69, 33, 'qar1900wjk14w-me-solitaire-original-imaexqgsrrzskjp4.jpeg'),
(70, 33, 'qar1900wjk14w-me-solitaire-original-imaexqgstpxxrz9d.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `received_payment`
--

CREATE TABLE `received_payment` (
  `rpid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_status` varchar(200) NOT NULL,
  `trx_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Sudarshan', 'Rayate', 'sudarshan@gmail.com', 'b2023820a60123ef4e6869bacaf7d90c', '9876543210', 'Nashik', 'Nashik'),
(2, 'Ravindra', 'Jadhav', 'ravindra@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876543210', 'Nashik', 'Nashik'),
(3, 'Pooja', 'Aware', 'pooja@gmail.com', 'b2023820a60123ef4e6869bacaf7d90c', '9876543210', 'Nashik', 'Nashik'),
(4, 'Priyanka', 'Jeughale', 'p@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874563210', 'Dindori', 'Nashik'),
(5, 'Shadab', 'Khan', 'shadab@gmail.com', 'b2023820a60123ef4e6869bacaf7d90c', '9874563210', 'Nashik', 'Nashik'),
(6, 'Poonam', 'Shinde', 'poonam@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874521361', 'Goa', 'Goa'),
(7, 'Arti', 'Varpe', 'arti@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874563210', 'Chennai', 'Chennai'),
(8, 'Vaishali', 'Borade', 'vaishali@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874563210', 'Shinde Palse', 'Nashik'),
(9, 'Rahul', 'Sanap', 'rahul@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874563321', 'Shingave', 'Niphad'),
(10, 'Nilesh', 'Paitl', 'nilesh@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9852314670', 'Nandurbar', 'Molgi'),
(11, 'Madhuri', 'Rayate', 'madhuri@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874563210', 'Malegon', 'Niphad'),
(12, 'Raj', 'Mogal', 'raj@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874123560', 'FC Road,Pune', 'Ganesh Kind, Pune'),
(13, 'Saurabh', 'Shinde', 'saurabh@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9874521036', 'Davachwadi', 'Niphad'),
(14, 'Shyam', 'Rayate', 'shyam@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876543210', 'Nashik', 'Nashik'),
(16, 'Test', 'Test', 'test@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9876543210', 'Nashik', 'Nashik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image_gallary`
--
ALTER TABLE `product_image_gallary`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `received_payment`
--
ALTER TABLE `received_payment`
  ADD PRIMARY KEY (`rpid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_image_gallary`
--
ALTER TABLE `product_image_gallary`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `received_payment`
--
ALTER TABLE `received_payment`
  MODIFY `rpid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_image_gallary`
--
ALTER TABLE `product_image_gallary`
  ADD CONSTRAINT `product_image_gallary_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
