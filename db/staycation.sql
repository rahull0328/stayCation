-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staycation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'rahul', 'rahul');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `about` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `aadharcard` varchar(250) NOT NULL,
  `profilephoto` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `number`, `email`, `about`, `password`, `aadharcard`, `profilephoto`, `status`) VALUES
(29, 'Jeet Jhaveri', '9712791515', 'jeet@gmail.com', 'With its user-friendly interface and advanced search features, finding your ideal living space is a seamless experience.', 'jeet@123', '1692300109-avengers2.jpg', '', 'Approved'),
(52, 'Dipendrasinh Zala', '9687110727', 'test@gamil.com', 'Whether you\'re searching for a cozy apartment, a spacious family home, or a trendy urban loft, our website offers an extensive and diverse range of listings to cater to your every need.', 'ads', '1692300109-avengers2.jpg', '', 'Approved'),
(53, 'Preet Shah', '6351400634', 'preetshah27@gmail.com', 'Discovering the perfect property has never been more effortless, thanks to our exceptional property rental website.', 'preet@123', '1692938769-avengers-endgame-theme-jr4.jpg', '1694012361-team1.jpg', 'Approved'),
(54, 'Rahul Mehta', '9409479818', 'rmmehta2468@gmail.com', 'The meticulously detailed property descriptions, accompanied by high-resolution images, provide an immersive virtual tour that allows you to envision your future abode from the comfort of your current one. ', 'rahul354', '1693493482-spider_man.jpg', '1694012361-team1.jpg', 'Approved'),
(59, 'Manav Zala', '7600817611', 'manavzalal11123@gmail.com', '', 'manav', '1695270557-team2.jpg', '1695270557-team3.jpg', 'Approved'),
(60, 'Vivek Girnari', '9824480549', 'vivekg123@gmail.com', '', 'vivek', '1695450411-team1.jpg', '1695450411-team1.jpg', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `number`, `password`) VALUES
(1, '', '', '0', ''),
(6, 'Rahul', 'rahul@gmail.com', '9409479818', 'rahul'),
(7, 'Dipendra', 'dipu@gmail.com', '9687110727', 'dpz0727'),
(8, 'rahul', 'rahul123@gmail.com', '12345678890', 'rahul123');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `amaravati` varchar(25) NOT NULL,
  `chandigarh` varchar(25) NOT NULL,
  `imphal` varchar(25) NOT NULL,
  `gangtok` varchar(25) NOT NULL,
  `itanagar` varchar(25) NOT NULL,
  `shimla` varchar(25) NOT NULL,
  `shilong` varchar(25) NOT NULL,
  `chennai` varchar(25) NOT NULL,
  `dispur` varchar(25) NOT NULL,
  `ranchi` varchar(25) NOT NULL,
  `aizawl` varchar(25) NOT NULL,
  `hyderabad` varchar(25) NOT NULL,
  `patna` varchar(25) NOT NULL,
  `bangalore` varchar(25) NOT NULL,
  `kohima` varchar(25) NOT NULL,
  `agartala` varchar(25) NOT NULL,
  `raipur` varchar(25) NOT NULL,
  `thiruvananthapuram` varchar(25) NOT NULL,
  `bhubaneshwar` varchar(25) NOT NULL,
  `dehradun` varchar(25) NOT NULL,
  `panaji` varchar(25) NOT NULL,
  `bhopal` varchar(25) NOT NULL,
  `chandiigarh` text NOT NULL,
  `lucknow` varchar(25) NOT NULL,
  `gandhinagar` varchar(25) NOT NULL,
  `mumbai` varchar(25) NOT NULL,
  `jaipur` varchar(25) NOT NULL,
  `kolkata` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inquries`
--

CREATE TABLE `inquries` (
  `id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `clientid` int(11) NOT NULL,
  `rentid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquries`
--

INSERT INTO `inquries` (`id`, `description`, `clientid`, `rentid`, `customerid`, `status`) VALUES
(6, 'dsadasda', 29, 15, 8, 'Approved'),
(9, 'for a month maybe....', 53, 19, 7, 'Approved'),
(12, 'description', 54, 20, 8, 'Approved'),
(13, 'hellow helloww', 53, 19, 8, 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `categories` varchar(250) NOT NULL,
  `propertyname` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` int(11) NOT NULL,
  `size` int(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `clientid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `categories`, `propertyname`, `state`, `district`, `address`, `description`, `amount`, `size`, `image`, `clientid`) VALUES
(15, 'House', 'shanti bagh', 'Andhra Pradesh', 'Amaravati', 'Bhavanipuram Bhavani Island, Vijayawada', 'this is description', 5000, 1800, '1693341381-feature7.jpg', 29),
(18, 'House', 'maru ghar', 'Andhra Pradesh', 'Amaravati', 'Journalist colony B/14 HDFC Bank', 'description', 5000, 1800, '1693545443-feature9.jpg', 53),
(19, 'Appartments', 'Sulsa', 'Arunachal Pradesh', 'Itanagar', 'VIP Road, Near King Cup Circle', 'description', 1500, 500, '1693719850-feature9.jpg', 53),
(20, 'Farm House', 'Madhav Villa', 'Assam', 'Itanagar', 'GS Road (20 kms from Navagraha Temple)', 'description', 2500, 800, '1693982478-feature2.jpg', 54);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `andhra pradesh` varchar(25) NOT NULL,
  `haryana` varchar(25) NOT NULL,
  `manipur` varchar(25) NOT NULL,
  `sikkim` varchar(25) NOT NULL,
  `arunachal pradesh` varchar(25) NOT NULL,
  `himachal pradesh` varchar(25) NOT NULL,
  `meghalaya` varchar(25) NOT NULL,
  `tamil nadu` varchar(25) NOT NULL,
  `assam` varchar(25) NOT NULL,
  `jharkhand` varchar(25) NOT NULL,
  `mizoram` varchar(25) NOT NULL,
  `telangana` varchar(25) NOT NULL,
  `bihar` varchar(25) NOT NULL,
  `karnataka` varchar(25) NOT NULL,
  `nagaland` varchar(25) NOT NULL,
  `tripura` varchar(25) NOT NULL,
  `chattisgarh` varchar(25) NOT NULL,
  `kerela` varchar(25) NOT NULL,
  `odisha` varchar(25) NOT NULL,
  `uttarakhand` varchar(25) NOT NULL,
  `goa` varchar(25) NOT NULL,
  `madhya pradesh` varchar(25) NOT NULL,
  `punjab` varchar(25) NOT NULL,
  `uttar pradesh` varchar(25) NOT NULL,
  `gujarat` varchar(25) NOT NULL,
  `maharashtra` varchar(25) NOT NULL,
  `rajasthan` varchar(25) NOT NULL,
  `west bengal` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquries`
--
ALTER TABLE `inquries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FkClientIdInInquries` (`clientid`),
  ADD KEY `FkCustomerIdInInquries` (`customerid`),
  ADD KEY `FkRentIdInInquries` (`rentid`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FkClientIdInRent` (`clientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inquries`
--
ALTER TABLE `inquries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquries`
--
ALTER TABLE `inquries`
  ADD CONSTRAINT `FkClientIdInInquries` FOREIGN KEY (`clientid`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FkCustomerIdInInquries` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FkRentIdInInquries` FOREIGN KEY (`rentid`) REFERENCES `rent` (`id`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `FkClientIdInRent` FOREIGN KEY (`clientid`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
