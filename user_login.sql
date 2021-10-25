-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 10:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminusername` varchar(255) NOT NULL,
  `adminlogin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminusername`, `adminlogin`, `password`) VALUES
('Agilan', 'agilan20042003@gmail.com', '1234'),
('Karthick', 'karthick@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `carthistory`
--

CREATE TABLE `carthistory` (
  `username` varchar(255) NOT NULL,
  `cartdetails` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carthistory`
--

INSERT INTO `carthistory` (`username`, `cartdetails`) VALUES
('agilanchmlerd@gmail.com', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `image`, `price`, `category`, `origin`, `delivery`, `discount`) VALUES
(4, 'Oven and grill', '4.png', '200', 'pizza', 'international', '40', '20'),
(7, 'allahabadi', '7.png', '180', 'mutton dish', 'tamilnadu', '30', '25'),
(8, 'chick n serve', '8.png', '280', 'mutton dish', 'indian', '40', '20'),
(9, 'kfc', '9.png', '250', 'burger', 'international', '28', '25'),
(10, 'pops burger', '10.png', '100', 'burger', 'indian', '20', '10'),
(21, 'Hyderabadi Biryani', '1.png', '400', 'Biryani', 'Indian', '39', '25'),
(22, 'Vijay Shree sandwich', '930ee0cc8be9a105207904e0979904b3_o2_featured_v2.webp', '250', 'sandwich', 'Indian', '21', '10'),
(23, 'al qasim', 'alqasim.webp', '200', 'mutton dish', 'tamil nadu', '20', '10'),
(24, 'behrouz biryani', 'behrouz_biryani.webp', '300', 'Biryani', 'Indian', '30', '22'),
(25, 'barbeque', 'barbeque.webp', '350', 'barbeque', 'international', '50', '30'),
(26, 'plain veg burger', 'kingscafe.jpg', '100', 'sandwich', 'international', '40', '24'),
(27, 'royal handi biryani', 'royalhandibiryani.webp', '380', 'Biryani', 'Indian', '35', '40'),
(28, 'oyoo paneer 24', 'oyoo24.jpg', '150', 'paneer', 'Indian', '25', '10'),
(29, 'lapinoz pizza', 'lapinozpizza.png', '200', 'pizza', 'international', '34', '24'),
(30, 'snack mania', 'snackmania.webp', '120', 'sandwich', 'international', '20', '31'),
(31, 'spring onion', 'springonion.webp', '110', 'veg', 'tamil nadu', '30', '22'),
(32, 'paneer king', 'paneerking.webp', '100', 'paneer', 'Indian', '19', '30'),
(33, 'paneer punjabi', 'paneerpunjabi.webp', '200', 'paneer', 'Indian', '44', '40'),
(34, 'on namkeen', 'omnamkeen.webp', '80', 'snack', 'Indian', '21', '23'),
(35, 'icy spicy', 'icyspicy.webp', '90', 'noodles', 'international', '34', '22'),
(36, 'kirpa chat', 'kirpachat.jpg', '100', 'barbeque', 'international', '39', '10'),
(37, 'faasos', 'faasos.webp', '100', 'snack', 'international', '34', '30'),
(38, 'dhaba chicken', 'dhabachicken.webp', '200', 'chicken', 'Indian', '39', '10'),
(39, 'dhaba junction', 'dhabhajunction.webp', '200', 'chicken', 'Indian', '40', '25'),
(40, 'chicago pizza', 'chicagopizza.webp', '300', 'pizza', 'international', '21', '10'),
(41, 'dilli darbar', 'dillidarbar.webp', '150', 'mutton dish', 'Indian', '34', '40'),
(42, 'tiffin', 'tiffin.webp', '150', 'snack', 'international', '20', '25'),
(43, 'chicken point', 'chickenpoint.webp', '300', 'chicken', 'tamil nadu', '21', '25');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `delivery_address` varchar(400) NOT NULL,
  `order_details` varchar(255) NOT NULL,
  `total_cost` varchar(255) NOT NULL,
  `ordered_time` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `customer_name`, `email_id`, `contact`, `delivery_address`, `order_details`, `total_cost`, `ordered_time`, `delivery_time`) VALUES
(18, 'Agilan', 'agilanchmlerd@gmail.com', 9750840123, '15,kannagi street,                                                                          chennimalai,                                                                                                       ERODE', 'spring onion(1) ', '110', '2021-07-12 14:05:28', '2021-07-12 14:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `phoneno`, `password`) VALUES
(26, 'Agilan', 'agilanchmlerd@gmail.com', '09843259393', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
