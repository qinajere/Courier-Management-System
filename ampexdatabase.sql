-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2017 at 01:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ampexdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstrator`
--

CREATE TABLE IF NOT EXISTS `adminstrator` (
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminstrator`
--

INSERT INTO `adminstrator` (`password`) VALUES
('12345678');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) NOT NULL,
  `category` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'CATEGORY 1'),
(2, 'CATEGORY 2'),
(3, 'CATEGORY 3'),
(4, 'CATEGORY 4'),
(5, 'CATEGORY 5'),
(6, 'CATEGORY 6'),
(7, 'CATEGORY 7'),
(8, 'CATEGORY 8'),
(9, 'CATEGORY 9'),
(10, 'CATEGORY 10'),
(11, 'CATEGORY 11'),
(12, 'CATEGORY 12'),
(13, 'CATEGORY 13'),
(14, 'CATEGORY 14'),
(15, 'CATEGORY 15'),
(16, 'CATEGORY 16'),
(17, 'CATEGORY 17'),
(18, 'CATEGORY 18'),
(19, 'CATEGORY 19'),
(20, 'CATEGORY 20');

-- --------------------------------------------------------

--
-- Table structure for table `cat_destination`
--

CREATE TABLE IF NOT EXISTS `cat_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `category_id` int(15) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `cat_destination`
--

INSERT INTO `cat_destination` (`id`, `service_id`, `category_id`, `destination`, `type`) VALUES
(3, 1, 2, 'SALIMA', 'Branch'),
(4, 1, 2, 'DWANGWA', 'Branch'),
(5, 1, 2, 'KASUNGU', 'Branch'),
(6, 1, 2, 'MZIMBA', 'Branch'),
(7, 1, 2, 'MZUZU', 'Branch'),
(8, 1, 3, 'ZOMBA', 'Branch'),
(9, 1, 3, 'BALAKA', 'Branch'),
(11, 1, 5, 'MZUZU', 'Branch'),
(12, 1, 5, 'MZIMBA', 'Branch'),
(13, 1, 6, 'DEDZA', 'Branch'),
(14, 1, 6, 'KASUNGU', 'Branch'),
(15, 1, 6, 'SALIMA', 'Branch'),
(16, 1, 6, 'DWANGWA', 'Branch'),
(17, 1, 7, 'KARONGA', 'Branch'),
(18, 1, 7, 'CHITIPA', 'Branch'),
(19, 1, 8, 'CHITIPA', 'Branch'),
(20, 1, 9, 'KARONGA', 'Branch'),
(21, 1, 9, 'CHITIPA', 'Branch'),
(24, 3, 2, 'MZUZU', 'Branch'),
(25, 3, 2, 'MZIMBA', 'Branch'),
(26, 3, 2, 'KASUNGU', 'Branch'),
(27, 3, 2, 'SALIMA', 'Branch'),
(28, 3, 3, 'KARONGA', 'Branch'),
(29, 3, 3, 'CHITIPA', 'Branch'),
(30, 3, 4, 'MZUZU', 'Branch'),
(31, 3, 4, 'MZIMBA', 'Branch'),
(32, 3, 5, 'DEDZA', 'Branch'),
(33, 3, 5, 'SALIMA', 'Branch'),
(34, 3, 5, 'KASUNGU', 'Branch'),
(35, 3, 5, 'DWANGWA', 'Branch'),
(36, 3, 6, 'KARONGA', 'Branch'),
(37, 3, 6, 'CHITIPA', 'Branch'),
(38, 3, 7, 'KARONGA', 'Branch'),
(39, 3, 7, 'CHITIPA', 'Branch'),
(53, 1, 1, 'DEDZA', 'branch'),
(54, 1, 1, 'LILONGWE', 'branch'),
(55, 2, 6, 'SALIMA', 'within city'),
(56, 2, 1, 'LILONGWE', 'within city'),
(57, 1, 4, 'KARONGA', 'branch'),
(58, 3, 1, 'LILONGWE', 'branch');

-- --------------------------------------------------------

--
-- Table structure for table `cat_sources`
--

CREATE TABLE IF NOT EXISTS `cat_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `category_id` int(15) NOT NULL,
  `source` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `cat_sources`
--

INSERT INTO `cat_sources` (`id`, `service_id`, `category_id`, `source`, `type`) VALUES
(4, 1, 2, 'BLANTYRE', 'branch'),
(5, 1, 2, 'ZOMBA', 'branch'),
(6, 1, 2, 'BALAKA', 'branch'),
(7, 1, 3, 'BLANTYRE', 'branch'),
(11, 1, 5, 'LILONGWE', 'branch'),
(12, 1, 5, 'DEDZA', 'branch'),
(13, 1, 5, 'SALIMA', 'branch'),
(14, 1, 5, 'KASUNGU', 'branch'),
(15, 1, 6, 'LILONGWE', 'branch'),
(16, 1, 7, 'LILONGWE', 'branch'),
(17, 1, 7, 'DEDZA', 'branch'),
(18, 1, 7, 'SALIMA', 'branch'),
(19, 1, 7, 'KASUNGU', 'branch'),
(20, 1, 7, 'DWANGWA', 'branch'),
(21, 1, 8, 'BLANTYRE', 'branch'),
(22, 1, 8, 'ZOMBA', 'branch'),
(23, 1, 8, 'BALAKA', 'branch'),
(24, 1, 9, 'MZUZU', 'branch'),
(25, 1, 9, 'MZIMBA', 'branch'),
(29, 3, 2, 'BLANTYRE', 'branch'),
(30, 3, 2, 'ZOMBA', 'branch'),
(31, 3, 2, 'BALAKA', 'branch'),
(32, 3, 3, 'BLANTYRE', 'branch'),
(33, 3, 3, 'ZOMBA', 'branch'),
(34, 3, 3, 'BALAKA', 'branch'),
(35, 3, 4, 'LILONGWE', 'branch'),
(36, 3, 4, 'DEDZA', 'branch'),
(37, 3, 4, 'SALIMA', 'branch'),
(38, 3, 4, 'KASUNGU', 'branch'),
(39, 3, 4, 'DWANGWA', 'branch'),
(40, 3, 5, 'LILONGWE', 'branch'),
(41, 3, 6, 'LILONGWE', 'branch'),
(42, 3, 6, 'DEDZA', 'branch'),
(43, 3, 6, 'SALIMA', 'branch'),
(44, 3, 6, 'KASUNGU', 'branch'),
(45, 3, 6, 'DWANGWA', 'branch'),
(46, 3, 7, 'MZUZU', 'branch'),
(47, 3, 7, 'MZIMBA', 'branch'),
(62, 1, 1, 'BALAKA', 'branch'),
(63, 1, 1, 'BLANTYRE', 'branch'),
(64, 1, 1, 'ZOMBA', 'branch'),
(65, 2, 5, 'LILONGWE', 'within city'),
(66, 2, 5, 'SALIMA', 'within city'),
(67, 2, 6, 'LILONGWE', 'within city'),
(68, 2, 1, 'BLANTYRE', 'within city'),
(69, 2, 1, 'ZOMBA', 'within city'),
(70, 1, 4, 'BLANTYRE', 'branch'),
(71, 1, 4, 'ZOMBA', 'branch'),
(72, 1, 4, 'BALAKA', 'branch'),
(73, 3, 1, 'BLANTYRE', 'branch'),
(74, 3, 1, 'ZOMBA', 'branch');

-- --------------------------------------------------------

--
-- Table structure for table `cust_invoice`
--

CREATE TABLE IF NOT EXISTS `cust_invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `waybill_no` varchar(14) NOT NULL,
  `type` varchar(15) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `Balance` decimal(10,2) NOT NULL,
  `office` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE IF NOT EXISTS `delivery_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_no` varchar(15) NOT NULL,
  `waybill_no` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_no` (`delivery_no`,`waybill_no`),
  KEY `waybill_no` (`waybill_no`),
  KEY `delivery_no_2` (`delivery_no`,`waybill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_note`
--

CREATE TABLE IF NOT EXISTS `delivery_note` (
  `delivery_no` varchar(15) NOT NULL,
  `office` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `driver` varchar(50) NOT NULL,
  `vehicle` varchar(20) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `cleared_by` varchar(30) NOT NULL,
  `cleared_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`delivery_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driver_id` int(10) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `phone`, `reg_date`) VALUES
(2, 'kate', '0888456789', '2016-10-04'),
(3, 'Adam Phiri', '0999456789', '2016-11-10'),
(4, 'Gomezgani', '0888145789', '2017-01-23'),
(5, 'Mavuto Kalonde ', '0999456789', '2017-01-23'),
(6, 'Lackson Macheso', '08888541236', '2017-01-23'),
(7, 'Blessings Mandevu', '0888457126', '2017-01-23'),
(8, 'Chikondi Ndlovu', '0997548321', '2017-01-23'),
(9, 'Chisomo Banda', '0887456782', '2016-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(11) NOT NULL,
  `reg_date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `office_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `office_id` (`office_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `lname`, `address`, `phone`, `email`, `reg_date`, `type`, `office_id`, `user_name`, `password`) VALUES
(1, 'Mark', 'Benson', 'chitawira', 887945331, 'markben@gma', '2016-10-01', 'Accountant', 1, 'mark', '12345678910'),
(3, 'Faith', 'Ziba', 'Kudya', 993456825, 'faithz@yaho', '2016-10-02', 'clerk', 1, 'faith', '45678912'),
(4, 'Mary', 'Kaso', 'area47', 991021365, 'maryk@yahoo', '2016-10-02', 'Manager', 1, 'mary', 'marykaso'),
(5, 'John', 'Banda', 'area49', 888756489, 'johnb2@gmai', '2016-10-03', 'clerk', 2, 'john', 'johnbanda'),
(8, 'Marbel', 'Zake', 'p.o 34', 887456782, 'm@gmail.com', '2016-11-09', 'clerk', 1, 'Marbel', '12345678'),
(16, 'Mphatso', 'Ziba', 'chimwankhun', 993224556, 'mp@gmail,co', '2016-12-05', 'clerk', 2, 'mphatso', 'mphatsoziba'),
(19, 'Samson', 'Liwomba', 'P.O. Box 34', 888145789, 's@gmail.com', '2017-01-23', 'Manager', 1, 'Sam', 'samsonliwomba'),
(20, 'Joseph', 'Gova', 'p.o. box 4', 999457896, 'j@gmail.com', '2017-01-23', 'Manager', 2, 'joseph', 'josephgova'),
(21, 'Pirilani', 'Simwaka', 'p.o. box 3', 2147483647, 'p@gmail.com', '2017-01-23', 'Manager', 3, 'pirilani', 'pirilanisimwaka'),
(22, 'Zoe', 'Phiri', 'p.o. box 4', 2147483647, 'z@gmail.com', '2017-01-23', 'Manager', 4, 'zoe', 'zoephiri1'),
(23, 'Chimango ', 'Gondwe', 'p.o box', 888457123, 'c@gmail.com', '2017-01-23', 'clerk', 1, 'chimango', 'chimangogondwe'),
(24, 'Heny', 'Phiri', 'p.o. box 4', 887456782, 'henry', '2016-10-01', 'Manager', 10, 'henry', 'henryphiri'),
(25, 'Andrew', 'Phiri', 'P.O. Box 3', 888547632, 'a@gmail.com', '2017-02-03', 'Manager', 11, 'andrew', 'andrewphiri'),
(26, 'Jason', 'Thom', 'p.o. box 34', 999456789, 'j@gmail.com', '2017-02-03', 'clerk', 11, 'jason', 'jasonthom'),
(27, 'Andrew', 'Mphande', 'p.o. box 45', 888145789, 'a@gmail.com', '2016-10-20', 'Manager', 12, 'andrew', 'andrewmphande'),
(28, 'Joyce', 'Tembo', 'P.O. box 45', 888547632, 'j@gmail.com', '2016-10-20', 'clerk', 12, 'joyce', 'joycetembo');

-- --------------------------------------------------------

--
-- Table structure for table `kilo_range`
--

CREATE TABLE IF NOT EXISTS `kilo_range` (
  `range_id` int(3) NOT NULL AUTO_INCREMENT,
  `range` varchar(10) NOT NULL,
  PRIMARY KEY (`range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kilo_range`
--

INSERT INTO `kilo_range` (`range_id`, `range`) VALUES
(1, '0.35-1'),
(2, '1.1-2.0'),
(3, '2.1-3.0'),
(4, '3.1-4.0'),
(5, '4.1-5.0'),
(6, '5.1-6.0'),
(7, '6.1-7.0'),
(8, '7.1-8.0'),
(9, '8.1-9.0'),
(10, '9.1-10.0');

-- --------------------------------------------------------

--
-- Table structure for table `manifest`
--

CREATE TABLE IF NOT EXISTS `manifest` (
  `manifest_no` varchar(14) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `vehicle` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `manifest_date` date NOT NULL,
  `recieved_by` varchar(30) NOT NULL,
  `recieve_date` date NOT NULL,
  PRIMARY KEY (`manifest_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manifest`
--

INSERT INTO `manifest` (`manifest_no`, `source`, `destination`, `driver`, `vehicle`, `status`, `comment`, `created_by`, `manifest_date`, `recieved_by`, `recieve_date`) VALUES
('MAN-BT000001', 'BLANTYRE ', 'LILONGWE', 'Adam Phiri', 'MZ4578', 'at destination', 'checking', 'Mary Kaso', '2017-06-19', 'John Banda', '2017-06-21'),
('MAN-BT000003', 'BLANTYRE ', 'LILONGWE', 'Adam Phiri', 'KK1238', 'at destination', 'checking', 'Mary Kaso', '2017-06-21', 'John Banda', '2017-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `office_id` int(100) NOT NULL AUTO_INCREMENT,
  `location` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `region` varchar(10) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `location`, `code`, `region`) VALUES
(1, 'BLANTYRE', 'BT', 'south'),
(2, 'LILONGWE', 'LL', 'central'),
(3, 'MZUZU', 'MZ', 'north'),
(4, 'ZOMBA', 'ZB', 'south'),
(7, 'MANGOCHI', 'MGH', 'north'),
(10, 'SALIMA', 'SL', 'central'),
(11, 'KARONGA', 'KRN', 'north'),
(12, 'MZIMBA', 'MZB', 'north');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `reciept_no` varchar(16) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `method` varchar(20) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `office` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(10) NOT NULL,
  PRIMARY KEY (`reciept_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_table`
--

CREATE TABLE IF NOT EXISTS `rate_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  `range_id` int(3) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`,`category_id`,`range_id`),
  KEY `category_id` (`category_id`),
  KEY `category_id_2` (`category_id`),
  KEY `range_id` (`range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=301 ;

--
-- Dumping data for table `rate_table`
--

INSERT INTO `rate_table` (`id`, `service_id`, `category_id`, `range_id`, `rate`, `vat`, `total`, `type`) VALUES
(1, 1, 1, 1, '1287.55', '212.45', '1500.00', 'Branch'),
(2, 1, 1, 2, '1459.28', '240.78', '1700.06', 'Branch'),
(3, 1, 1, 3, '1630.90', '269.10', '1900.00', 'Branch'),
(4, 1, 1, 4, '1888.41', '311.59', '2200.00', 'Branch'),
(5, 1, 1, 5, '2060.09', '339.91', '2400.00', 'Branch'),
(6, 1, 1, 6, '2145.92', '354.08', '2500.00', 'Branch'),
(7, 1, 1, 7, '2403.43', '396.57', '2800.00', 'Branch'),
(8, 1, 1, 8, '2660.94', '439.06', '3100.00', 'Branch'),
(9, 1, 1, 9, '2832.61', '467.38', '3299.99', 'Branch'),
(10, 1, 1, 10, '3261.80', '538.20', '3800.00', 'Branch'),
(11, 1, 2, 1, '1545.06', '254.93', '1800.00', 'Branch'),
(12, 1, 2, 2, '1715.74', '283.26', '2000.00', 'Branch'),
(13, 1, 2, 3, '1802.58', '297.42', '2100.00', 'Branch'),
(14, 1, 2, 4, '1974.25', '325.75', '2300.00', 'Branch'),
(15, 1, 2, 5, '2145.92', '354.08', '2500.00', 'Branch'),
(16, 1, 2, 6, '2317.59', '382.40', '2700.00', 'Branch'),
(17, 1, 2, 7, '2489.27', '410.73', '2900.00', 'Branch'),
(18, 1, 2, 8, '2746.78', '453.22', '3200.00', 'Branch'),
(19, 1, 2, 9, '3004.29', '495.71', '3500.00', 'Branch'),
(20, 1, 2, 10, '3519.31', '580.69', '4100.00', 'Branch'),
(21, 1, 3, 1, '2000.00', '330.00', '2330.00', 'Branch'),
(22, 1, 3, 2, '1459.28', '240.78', '1700.06', 'Branch'),
(23, 1, 3, 3, '1630.90', '269.10', '1900.00', 'Branch'),
(24, 1, 3, 4, '1888.41', '311.59', '2200.00', 'Branch'),
(25, 1, 3, 5, '2060.09', '339.91', '2400.00', 'Branch'),
(26, 1, 3, 6, '2145.92', '354.08', '2500.00', 'Branch'),
(27, 1, 3, 7, '2403.43', '396.57', '2800.00', 'Branch'),
(28, 1, 3, 8, '2660.94', '439.06', '3100.00', 'Branch'),
(29, 1, 3, 9, '2832.61', '467.38', '3299.99', 'Branch'),
(30, 1, 3, 10, '3261.80', '538.20', '3800.00', 'Branch'),
(43, 1, 4, 1, '1716.74', '283.26', '2000.00', 'Branch'),
(44, 1, 4, 2, '1888.41', '311.59', '2200.00', 'Branch'),
(45, 1, 4, 3, '2060.09', '339.91', '2400.00', 'Branch'),
(46, 1, 4, 4, '2231.76', '368.24', '2600.00', 'Branch'),
(47, 1, 4, 5, '2403.43', '396.57', '2800.00', 'Branch'),
(48, 1, 4, 6, '2575.11', '424.89', '3000.00', 'Branch'),
(49, 1, 4, 7, '2746.78', '453.22', '3200.00', 'Branch'),
(50, 1, 4, 8, '2918.45', '481.54', '3399.99', 'Branch'),
(51, 1, 4, 9, '3347.64', '552.36', '3900.00', 'Branch'),
(52, 1, 4, 10, '3690.99', '609.01', '4300.00', 'Branch'),
(53, 1, 5, 1, '1287.55', '212.45', '1500.00', 'Branch'),
(54, 1, 5, 2, '1459.80', '240.77', '1700.00', 'Branch'),
(55, 1, 5, 3, '1630.90', '269.10', '1900.00', 'Branch'),
(56, 1, 5, 4, '1888.41', '311.59', '2200.00', 'Branch'),
(57, 1, 5, 5, '2060.09', '339.91', '2400.00', 'Branch'),
(58, 1, 5, 6, '2145.92', '354.08', '2500.00', 'Branch'),
(59, 1, 5, 7, '2403.43', '396.57', '2800.00', 'Branch'),
(60, 1, 5, 8, '2660.94', '439.06', '3100.00', 'Branch'),
(61, 1, 5, 9, '2832.61', '467.38', '3300.00', 'Branch'),
(62, 1, 5, 10, '3261.80', '538.20', '3800.00', 'Branch'),
(68, 1, 6, 1, '1287.55', '212.45', '1500.00', 'Branch'),
(69, 1, 6, 2, '1459.80', '240.77', '1700.00', 'Branch'),
(70, 1, 6, 3, '1630.90', '269.10', '1900.00', 'Branch'),
(71, 1, 6, 4, '1888.41', '311.59', '2200.00', 'Branch'),
(72, 1, 6, 5, '2060.09', '339.91', '2400.00', 'Branch'),
(73, 1, 6, 6, '2145.92', '354.08', '2500.00', 'Branch'),
(74, 1, 6, 7, '2403.43', '396.57', '2800.00', 'Branch'),
(75, 1, 6, 8, '2660.94', '439.06', '3100.00', 'Branch'),
(76, 1, 6, 9, '2832.61', '467.38', '3300.00', 'Branch'),
(77, 1, 6, 10, '3261.80', '538.20', '3800.00', 'Branch'),
(83, 1, 7, 1, '1545.06', '254.93', '1800.00', 'Branch'),
(84, 1, 7, 2, '1715.74', '283.26', '2000.00', 'Branch'),
(85, 1, 7, 3, '1802.58', '297.42', '2100.00', 'Branch'),
(86, 1, 7, 4, '1974.25', '325.75', '2300.00', 'Branch'),
(87, 1, 7, 5, '2145.92', '354.08', '2500.00', 'Branch'),
(88, 1, 7, 6, '2317.59', '382.40', '2700.00', 'Branch'),
(89, 1, 7, 7, '2489.27', '410.73', '2900.00', 'Branch'),
(90, 1, 7, 8, '2746.78', '453.22', '3200.00', 'Branch'),
(91, 1, 7, 9, '3004.29', '495.71', '3500.00', 'Branch'),
(92, 1, 7, 10, '3519.31', '580.69', '4100.00', 'Branch'),
(98, 1, 8, 1, '1974.25', '325.75', '2300.00', 'Branch'),
(99, 1, 8, 2, '2060.09', '339.91', '2400.00', 'Branch'),
(100, 1, 8, 3, '2145.92', '354.08', '2500.00', 'Branch'),
(101, 1, 8, 4, '2317.59', '382.40', '2700.00', 'Branch'),
(102, 1, 8, 5, '2489.27', '410.73', '2900.00', 'Branch'),
(103, 1, 8, 6, '2660.94', '439.06', '3100.00', 'Branch'),
(104, 1, 8, 7, '2832.61', '467.38', '3300.00', 'Branch'),
(105, 1, 8, 8, '3004.29', '495.71', '3500.00', 'Branch'),
(106, 1, 8, 9, '3433.48', '566.52', '4000.00', 'Branch'),
(107, 1, 8, 10, '3862.66', '637.34', '4500.00', 'Branch'),
(108, 1, 9, 1, '1287.55', '212.45', '1500.00', 'Branch'),
(109, 1, 9, 2, '1459.80', '240.77', '1700.00', 'Branch'),
(110, 1, 9, 3, '1630.90', '269.10', '1900.00', 'Branch'),
(111, 1, 9, 4, '1888.41', '311.59', '2200.00', 'Branch'),
(112, 1, 9, 5, '2060.09', '339.91', '2400.00', 'Branch'),
(113, 1, 9, 6, '2145.92', '354.08', '2500.00', 'Branch'),
(114, 1, 9, 7, '2403.43', '396.57', '2800.00', 'Branch'),
(115, 1, 9, 8, '2660.94', '439.06', '3100.00', 'Branch'),
(116, 1, 9, 9, '2832.61', '467.38', '3300.00', 'Branch'),
(117, 1, 9, 10, '3261.80', '538.20', '3800.00', 'Branch'),
(123, 3, 1, 1, '1974.25', '325.75', '2300.00', 'Branch'),
(124, 3, 1, 2, '2145.92', '354.08', '2500.00', 'Branch'),
(125, 3, 1, 3, '2317.60', '382.40', '2700.00', 'Branch'),
(126, 3, 1, 4, '2489.27', '410.73', '2900.00', 'Branch'),
(127, 3, 1, 5, '2747.78', '453.38', '3201.16', 'Branch'),
(128, 3, 1, 6, '3261.80', '538.20', '3800.00', 'Branch'),
(129, 3, 1, 7, '3347.63', '552.36', '3899.99', 'Branch'),
(130, 3, 1, 8, '3433.48', '566.52', '4000.00', 'Branch'),
(131, 3, 1, 9, '3519.31', '580.69', '4100.00', 'Branch'),
(132, 3, 1, 10, '3605.15', '594.85', '4200.00', 'Branch'),
(133, 3, 2, 1, '2145.92', '354.08', '2500.00', 'Branch'),
(134, 3, 2, 2, '2231.76', '368.24', '2600.00', 'Branch'),
(135, 3, 2, 3, '2403.43', '396.57', '2800.00', 'Branch'),
(136, 3, 2, 4, '2575.11', '424.89', '3000.00', 'Branch'),
(137, 3, 2, 5, '2832.62', '467.38', '3300.00', 'Branch'),
(138, 3, 2, 6, '3347.63', '552.37', '3900.00', 'Branch'),
(139, 3, 2, 7, '3433.48', '566.52', '4000.00', 'Branch'),
(140, 3, 2, 8, '3519.31', '580.69', '4100.00', 'Branch'),
(141, 3, 2, 9, '3605.15', '594.85', '4200.00', 'Branch'),
(142, 3, 2, 10, '3690.99', '609.01', '4300.00', 'Branch'),
(143, 3, 5, 1, '1974.25', '325.75', '2300.00', 'Branch'),
(144, 3, 5, 2, '2145.92', '354.08', '2500.00', 'Branch'),
(145, 3, 5, 3, '2317.60', '382.40', '2700.00', 'Branch'),
(146, 3, 5, 4, '2489.27', '410.73', '2900.00', 'Branch'),
(147, 3, 5, 5, '2747.78', '453.19', '3200.00', 'Branch'),
(148, 3, 5, 6, '3261.80', '538.20', '3800.00', 'Branch'),
(149, 3, 5, 7, '3347.63', '552.37', '3900.00', 'Branch'),
(150, 3, 5, 8, '3433.48', '556.52', '4000.00', 'Branch'),
(151, 3, 5, 9, '3519.31', '580.69', '4100.00', 'Branch'),
(152, 3, 5, 10, '3605.15', '594.85', '4200.00', 'Branch'),
(158, 3, 6, 1, '2145.92', '354.08', '2500.00', 'Branch'),
(159, 3, 6, 2, '2231.76', '368.24', '2600.00', 'Branch'),
(160, 3, 6, 3, '2403.43', '396.57', '2800.00', 'Branch'),
(161, 3, 6, 4, '2575.11', '424.89', '3000.00', 'Branch'),
(162, 3, 6, 5, '2832.62', '467.38', '3300.00', 'Branch'),
(163, 3, 6, 6, '3347.63', '552.37', '3900.00', 'Branch'),
(164, 3, 6, 7, '3433.48', '566.52', '4000.00', 'Branch'),
(165, 3, 6, 8, '3519.31', '580.69', '4100.00', 'Branch'),
(166, 3, 6, 9, '3605.15', '594.85', '4200.00', 'Branch'),
(167, 3, 6, 10, '3690.99', '609.01', '4300.00', 'Branch'),
(173, 3, 7, 1, '1974.25', '325.75', '2300.00', 'Branch'),
(174, 3, 7, 2, '2145.92', '354.08', '2500.00', 'Branch'),
(175, 3, 7, 3, '2317.60', '382.40', '2700.00', 'Branch'),
(176, 3, 7, 4, '2489.27', '410.73', '2900.00', 'Branch'),
(177, 3, 7, 5, '2747.78', '453.19', '3200.00', 'Branch'),
(178, 3, 7, 6, '3261.80', '538.20', '3800.00', 'Branch'),
(179, 3, 7, 7, '3347.63', '552.37', '3900.00', 'Branch'),
(180, 3, 7, 8, '3433.48', '556.52', '4000.00', 'Branch'),
(181, 3, 7, 9, '3519.31', '580.69', '4100.00', 'Branch'),
(182, 3, 7, 10, '3605.15', '594.85', '4200.00', 'Branch'),
(200, 3, 3, 1, '2403.43', '396.57', '2800.00', 'Branch'),
(201, 3, 3, 2, '2489.27', '410.73', '2900.00', 'Branch'),
(202, 3, 3, 3, '2575.11', '424.89', '3000.00', 'Branch'),
(203, 3, 3, 4, '2660.94', '439.06', '3100.00', 'Branch'),
(204, 3, 3, 5, '2918.45', '481.55', '3400.00', 'Branch'),
(205, 3, 3, 6, '3433.48', '566.52', '4000.00', 'Branch'),
(206, 3, 3, 7, '3519.31', '580.69', '4100.00', 'Branch'),
(207, 3, 3, 8, '3605.15', '594.85', '4200.00', 'Branch'),
(208, 3, 3, 9, '3690.99', '609.01', '4300.00', 'Branch'),
(209, 3, 3, 10, '3776.82', '623.18', '4400.00', 'Branch'),
(210, 3, 4, 1, '1974.25', '325.75', '2300.00', 'Branch'),
(211, 3, 4, 2, '2145.92', '354.08', '2500.00', 'Branch'),
(212, 3, 4, 3, '2317.60', '382.40', '2700.00', 'Branch'),
(213, 3, 4, 4, '2489.27', '410.73', '2900.00', 'Branch'),
(214, 3, 4, 5, '2747.78', '453.19', '3200.00', 'Branch'),
(215, 3, 4, 6, '3261.80', '538.20', '3800.00', 'Branch'),
(216, 3, 4, 7, '3347.63', '552.37', '3900.00', 'Branch'),
(217, 3, 4, 8, '3433.48', '556.52', '4000.00', 'Branch'),
(218, 3, 4, 9, '3519.31', '580.69', '4100.00', 'Branch'),
(219, 3, 4, 10, '3605.15', '594.85', '4200.00', 'Branch'),
(220, 2, 1, 1, '2145.92', '354.08', '2500.00', 'within city'),
(221, 2, 1, 2, '2231.76', '368.24', '2600.00', 'within city'),
(222, 2, 1, 3, '2317.60', '382.40', '2700.00', 'within city'),
(223, 2, 1, 4, '2403.43', '396.57', '2800.00', 'within city'),
(224, 2, 1, 5, '2489.27', '410.73', '2900.00', 'within city'),
(225, 2, 1, 6, '3004.29', '495.75', '3500.00', 'within city'),
(226, 2, 1, 7, '3175.97', '524.03', '3700.00', 'within city'),
(227, 2, 1, 8, '3433.48', '566.52', '4000.00', 'within city'),
(228, 2, 1, 9, '3776.82', '623.18', '4400.00', 'within city'),
(229, 2, 1, 10, '4120.17', '679.83', '4800.00', 'within city'),
(230, 2, 2, 1, '2575.11', '424.89', '3000.00', 'within city'),
(231, 2, 2, 2, '2260.94', '439.06', '3100.00', 'within city'),
(232, 2, 2, 3, '2746.78', '453.22', '3200.00', 'within city'),
(233, 2, 2, 4, '2832.62', '467.38', '3300.00', 'within city'),
(234, 2, 2, 5, '3090.13', '509.87', '3600.00', 'within city'),
(235, 2, 2, 6, '3261.80', '538.20', '3800.00', 'within city'),
(236, 2, 2, 7, '3691.00', '609.00', '4300.00', 'within city'),
(237, 2, 2, 8, '3691.00', '609.00', '4300.00', 'within city'),
(238, 2, 2, 9, '3945.50', '651.50', '4600.00', 'within city'),
(239, 2, 2, 10, '4291.80', '708.20', '5000.00', 'within city'),
(251, 2, 3, 1, '1000.00', '165.00', '1165.00', 'within city'),
(252, 2, 3, 2, '5000.00', '825.00', '5825.00', 'within city'),
(253, 2, 3, 3, '4000.00', '660.00', '4660.00', 'within city'),
(254, 2, 3, 4, '2000.00', '330.00', '2330.00', 'within city'),
(255, 2, 3, 5, '2000.00', '165.00', '2330.00', 'within city'),
(256, 2, 3, 6, '4000.00', '660.00', '4660.00', 'within city'),
(257, 2, 3, 7, '1000.00', '165.00', '1165.00', 'within city'),
(258, 2, 3, 8, '1222.00', '201.63', '1423.63', 'within city'),
(259, 2, 3, 9, '4000.00', '660.00', '4660.00', 'within city'),
(260, 2, 3, 10, '7222.00', '1191.63', '8413.63', 'within city'),
(261, 2, 4, 1, '2145.92', '354.08', '2500.00', 'within city'),
(262, 2, 4, 2, '2231.76', '368.24', '2600.00', 'within city'),
(263, 2, 4, 3, '2317.60', '382.40', '2700.00', 'within city'),
(264, 2, 4, 4, '2403.43', '396.57', '2800.00', 'within city'),
(265, 2, 4, 5, '2489.27', '354.08', '2900.00', 'within city'),
(266, 2, 4, 6, '3004.29', '495.71', '3500.00', 'within city'),
(267, 2, 4, 7, '3175.97', '524.04', '3700.01', 'within city'),
(268, 2, 4, 8, '3433.48', '566.52', '4000.00', 'within city'),
(269, 2, 4, 9, '3776.82', '623.18', '4400.00', 'within city'),
(270, 2, 4, 10, '4120.17', '679.83', '4800.00', 'within city'),
(271, 2, 5, 1, '2145.92', '354.08', '2500.00', 'within city'),
(272, 2, 5, 2, '2231.76', '368.24', '2600.00', 'within city'),
(273, 2, 5, 3, '2317.60', '382.40', '2700.00', 'within city'),
(274, 2, 5, 4, '2403.43', '396.57', '2800.00', 'within city'),
(275, 2, 5, 5, '2489.27', '354.08', '2900.00', 'within city'),
(276, 2, 5, 6, '3004.29', '495.71', '3500.00', 'within city'),
(277, 2, 5, 7, '3175.97', '524.04', '3700.01', 'within city'),
(278, 2, 5, 8, '3433.48', '566.52', '4000.00', 'within city'),
(279, 2, 5, 9, '3776.82', '623.18', '4400.00', 'within city'),
(280, 2, 5, 10, '4120.17', '679.83', '4800.00', 'within city'),
(281, 2, 6, 1, '2145.92', '354.08', '2500.00', 'within city'),
(282, 2, 6, 2, '2231.76', '368.24', '2600.00', 'within city'),
(283, 2, 6, 3, '2317.60', '382.40', '2700.00', 'within city'),
(284, 2, 6, 4, '2403.43', '396.57', '2800.00', 'within city'),
(285, 2, 6, 5, '2489.27', '354.08', '2900.00', 'within city'),
(286, 2, 6, 6, '3004.29', '495.71', '3500.00', 'within city'),
(287, 2, 6, 7, '3175.97', '524.04', '3700.01', 'within city'),
(288, 2, 6, 8, '3433.48', '566.52', '4000.00', 'within city'),
(289, 2, 6, 9, '3776.82', '623.18', '4400.00', 'within city'),
(290, 2, 6, 10, '4120.17', '679.83', '4800.00', 'within city'),
(291, 2, 1, 1, '3519.31', '580.69', '4100.00', 'outside city'),
(292, 2, 1, 2, '3605.15', '594.85', '4200.00', 'outside city'),
(293, 2, 1, 3, '3690.99', '609.01', '4300.00', 'outside city'),
(294, 2, 1, 4, '3772.82', '622.52', '4395.34', 'outside city'),
(295, 2, 1, 5, '3862.66', '580.69', '4500.00', 'outside city'),
(296, 2, 1, 6, '3948.50', '651.50', '4600.00', 'outside city'),
(297, 2, 1, 7, '4034.33', '665.66', '4699.99', 'outside city'),
(298, 2, 1, 8, '4206.01', '693.99', '4900.00', 'outside city'),
(299, 2, 1, 9, '4463.52', '736.48', '5200.00', 'outside city'),
(300, 2, 1, 10, '4721.03', '778.97', '5500.00', 'outside city');

-- --------------------------------------------------------

--
-- Table structure for table `recievers`
--

CREATE TABLE IF NOT EXISTS `recievers` (
  `reciever_id` int(100) NOT NULL AUTO_INCREMENT,
  `waybill_no` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `rec_date` date NOT NULL,
  PRIMARY KEY (`reciever_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `recievers`
--

INSERT INTO `recievers` (`reciever_id`, `waybill_no`, `name`, `id_no`, `rec_date`) VALUES
(1, 'WB-BT000001', 'Wezzie', '2345fgj', '2017-06-21'),
(2, 'WB-BT000011', 'Milner', '45677yhj7', '2017-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `reg_creditnotes`
--

CREATE TABLE IF NOT EXISTS `reg_creditnotes` (
  `credit_no` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `transaction` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `office` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `done_by` varchar(50) NOT NULL,
  PRIMARY KEY (`credit_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_customer`
--

CREATE TABLE IF NOT EXISTS `reg_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `reg_customer`
--

INSERT INTO `reg_customer` (`customer_id`, `customer_name`, `address`, `post`, `phone`, `email`, `location`, `reg_date`) VALUES
(1, 'UTOPIA', 'Fiskani building along kenyatt', 'P.O. Box 51681, Limbe', '0888854242', 'u@gmail.com', 'BLANTYRE', '0000-00-00'),
(3, 'NBM LILONGWE', 'area 12', 'P.O. Box 4567, area 12', '0111854963', '', 'LILONGWE', '0000-00-00'),
(4, 'LIMBE LEAF', 'MAKATA ROAD', 'P.O. Box 45879, AREA5', '0884576321', '', 'LILONGWE', '0000-00-00'),
(5, 'MSB Blantyre', 'Chayamba Building', 'P.O.BOX 3452, BLANTYRE', '88150205', 'msb@mw.com', 'BLANTYRE', '2016-11-09'),
(6, 'PTC', 'victoria avenue', 'P.O. BOX 4567', '0887456782', 'ptc@yahoo.com', 'BLANTYRE', '2016-11-09'),
(7, 'Family Drug Store', 'Along Kenyatta Road', 'p.o. box 34, Limbe', '0111789546', 'fds@gmail.com', 'BLANTYRE', '2017-01-23'),
(8, 'National Bank Karong', 'Karonga city mall', 'P.O. Box 4567, Karonga', '01114578965', 'nb@nb.mail', 'KARONGA', '2017-02-03'),
(9, 'PEP ', 'Mzimba city mall', 'P.O. box 10', '01114578965', 'pep@mw.com', 'MZIMBA', '2016-10-20'),
(10, 'GREENFIELD', 'BE336 Moir Cresent', 'P.O. box 568, Limbe', '01114578965', 'm.mphande@greenfield', 'BLANTYRE', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `reg_transactions`
--

CREATE TABLE IF NOT EXISTS `reg_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `details` varchar(20) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `office` varchar(30) NOT NULL,
  `done_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seq_note`
--

CREATE TABLE IF NOT EXISTS `seq_note` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `waybill` int(6) NOT NULL DEFAULT '0',
  `manifest` int(6) NOT NULL DEFAULT '0',
  `delivery` int(6) NOT NULL DEFAULT '0',
  `reciept` int(6) NOT NULL DEFAULT '0',
  `credit` int(6) NOT NULL DEFAULT '0',
  `debit` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `seq_note`
--

INSERT INTO `seq_note` (`id`, `code`, `waybill`, `manifest`, `delivery`, `reciept`, `credit`, `debit`) VALUES
(1, 'BT', 12, 3, 0, 0, 0, 0),
(2, 'LL', 0, 0, 0, 0, 0, 0),
(3, 'MZ', 0, 0, 0, 0, 0, 0),
(4, 'ZB', 0, 0, 0, 0, 0, 0),
(5, 'TU', 0, 0, 0, 0, 0, 0),
(6, 'MGH', 0, 0, 0, 0, 0, 0),
(7, 'BLK', 0, 0, 0, 0, 0, 0),
(8, 'KRN', 0, 0, 0, 0, 0, 0),
(9, 'SL', 0, 0, 0, 0, 0, 0),
(10, 'KRN', 0, 0, 0, 0, 0, 0),
(11, 'MZB', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE IF NOT EXISTS `service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `service`) VALUES
(1, 'spotcash'),
(2, 'door to door'),
(3, 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sms_id` int(10) NOT NULL AUTO_INCREMENT,
  `senderno` varchar(13) NOT NULL,
  `recieverno` varchar(13) NOT NULL,
  `waybill_no` varchar(15) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'to send',
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `senderno`, `recieverno`, `waybill_no`, `message`, `status`) VALUES
(1, '+265881087294', '+265881087294', 'WB-BT000001', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000001sent by Chisomo Tsaka to Happy Dowa is in transit', 'sent'),
(2, '+265881087294', '+265881087294', 'WB-BT000002', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000002sent by Bernard Chuka to Fanny Gondwe is in transit', 'sent'),
(3, '+265881087294', '+265881087294', 'WB-BT000003', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000003sent by George banda to Kettie Renzo is in transit', 'sent'),
(4, '+265881087294', '+265881087294', 'WB-BT000004', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000004sent by George banda to Kettie Renzo is in transit', 'sent'),
(5, '+265881087294', '+265881087294', 'WB-BT000005', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000005sent by George banda to Kettie Renzo is in transit', 'sent'),
(6, '+265881087294', '+265881087294', 'WB-BT000006', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000006sent by Milika Mandala to Manuel Zake is in transit', 'sent'),
(7, '+265881087294', '+265881087294', 'WB-BT000007', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000007sent by Maria stimu to Maranatha James is in transit', 'sent'),
(8, '+265881087294', '+265881087294', 'WB-BT000008', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000008sent by Mirela Gombwe to Fanny Gondwe is in transit', 'sent'),
(9, '+265881087294', '+265881087294', 'WB-BT000009', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000009sent by Daniel banda to Fanny Gondwe is in transit', 'sent'),
(10, '+265881087294', '+265881087294', 'WB-BT000010', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000010sent by Daniel banda to Fanny Gondwe is in transit', 'sent'),
(11, '+265881087294', '+265881087294', 'WB-BT000001', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000001sent by Chisomo Tsaka to Happy Dowa is in transit', 'sent'),
(12, '+265881087294', '+265881087294', 'WB-BT000002', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000002sent by Bernard Chuka to Fanny Gondwe is in transit', 'sent'),
(13, '+265881087294', '+265881087294', 'WB-BT000003', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000003sent by George banda to Kettie Renzo is in transit', 'sent'),
(14, '+265881087294', '+265881087294', 'WB-BT000004', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000004sent by George banda to Kettie Renzo is in transit', 'sent'),
(15, '+265881087294', '+265881087294', 'WB-BT000005', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000005sent by George banda to Kettie Renzo is in transit', 'sent'),
(16, '+265881087294', '+265881087294', 'WB-BT000006', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000006sent by Milika Mandala to Manuel Zake is in transit', 'sent'),
(17, '+265881087294', '+265881087294', 'WB-BT000007', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000007sent by Maria stimu to Maranatha James is in transit', 'sent'),
(18, '+265881087294', '+265881087294', 'WB-BT000008', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000008sent by Mirela Gombwe to Fanny Gondwe is in transit', 'sent'),
(19, '+265881087294', '+265881087294', 'WB-BT000009', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000009sent by Daniel banda to Fanny Gondwe is in transit', 'sent'),
(20, '+265881087294', '+265881087294', 'WB-BT000010', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000010sent by Daniel banda to Fanny Gondwe is in transit', 'sent'),
(21, '+265881087294', '+265881087294', 'WB-BT000001', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000001sent by Chisomo Tsaka to Happy Dowa is at destination. Please                  collect the parcel within 3 working days after that there will be a charge of K1000 per day.', 'sent'),
(22, '+265881087294', '+265884599307', 'WB-BT000011', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000011sent by Qina Jere to Milner Mwakamogo is in transit', 'sent'),
(23, '+265881087294', '+265884599307', 'WB-BT000011', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000011sent by Qina Jere to Milner Mwakamogo is in transit', 'sent'),
(24, '+265881087294', '+265884599307', 'WB-BT000011', ' MESSEGE SENT BY AMPEX COURIER  parcel WB-BT000011sent by Qina Jere to Milner Mwakamogo is at destination. Please                  collect the parcel within 3 working days after that there will be a charge of K1000 per day.', 'to send');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_results`
--

CREATE TABLE IF NOT EXISTS `tmp_results` (
  `source` varchar(20) NOT NULL,
  `way_date` date NOT NULL,
  `sales` decimal(32,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_results`
--

INSERT INTO `tmp_results` (`source`, `way_date`, `sales`) VALUES
('BLANTYRE', '2016-10-01', '19875.00'),
('BLANTYRE', '2016-10-20', '7189.00'),
('MZIMBA', '2016-10-20', '2125.00'),
('BLANTYRE', '2016-10-21', '7501.00'),
('LILONGWE', '2017-02-01', '2125.00'),
('BLANTYRE', '2017-02-02', '53543.00'),
('BLANTYRE', '2017-02-03', '2563.00'),
('KARONGA', '2017-02-03', '2125.00'),
('BLANTYRE', '2017-02-27', '68375.10'),
('BLANTYRE', '2017-02-28', '140699.90'),
('BLANTYRE', '2017-03-02', '9500.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `consigner_name` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `details` varchar(20) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `Office` varchar(30) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_date`, `consigner_name`, `type`, `details`, `debit`, `credit`, `Office`, `created_by`) VALUES
(1, '2016-10-01', 'Mercy', 'WAYBILL', 'WB-BT000001', '3250.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(2, '2016-10-01', 'Mercy', 'WAYBILL', 'WB-BT000002', '3250.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(3, '2016-10-01', 'Kate', 'WAYBILL', 'WB-BT000003', '2875.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(4, '2016-10-01', 'Dawn jim', 'WAYBILL', 'WB-BT000004', '4750.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(5, '2016-10-01', 'Qina Jere', 'WAYBILL', 'WB-BT000007', '3250.00', '0.00', 'BLANTYRE', 'Samson Liwomba'),
(6, '2017-02-01', 'Florence Manda', 'WAYBILL', 'WB-LL000001', '2125.00', '0.00', 'LILONGWE', 'John Banda'),
(7, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000009', '2125.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(8, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000010', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(9, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000011', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(10, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000012', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(11, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000013', '2000.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(12, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000014', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(13, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000015', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(14, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000016', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(15, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000017', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(16, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000018', '1750.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(17, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000019', '1225.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(18, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000020', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(19, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000021', '2875.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(20, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000022', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(21, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000023', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(22, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000024', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(23, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000025', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(24, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000026', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(25, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000027', '1688.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(26, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000028', '1688.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(27, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000029', '2313.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(28, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000030', '2875.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(29, '2017-02-02', 'brian', 'WAYBILL', 'WB-BT000031', '2875.00', '0.00', 'BLANTYRE', 'Mark Benson'),
(30, '2017-02-03', 'Qina Jere', 'WAYBILL', 'WB-KRN000001', '2125.00', '0.00', 'KARONGA', 'Jason Thom'),
(31, '2016-10-20', 'L Nyirenda', 'WAYBILL', 'WB-MZB000001', '2125.00', '0.00', 'MZIMBA', 'Joyce Tembo'),
(32, '2016-10-20', 'Rose phiri', 'WAYBILL', 'WB-BT000035', '2313.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(33, '2016-10-20', 'Mphatso Kama', 'WAYBILL', 'WB-BT000036', '2563.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(34, '2016-10-21', 'Freizer', 'WAYBILL', 'WB-BT000037', '1750.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(35, '2016-10-21', 'Dave Chisanga', 'WAYBILL', 'WB-BT000039', '3438.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(36, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000042', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(37, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000043', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(38, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000044', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(39, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000045', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(40, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000046', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(41, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000047', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(42, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000048', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(43, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000049', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(44, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000050', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(45, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000051', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(46, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000052', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(47, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000053', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(48, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000054', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(49, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000055', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(50, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000056', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(51, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000057', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(52, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000058', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(53, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000059', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(54, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000060', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(55, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000061', '20.00', '0.00', 'BLANTYRE', 'Faith Ziba'),
(56, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000062', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(57, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000063', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(58, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000064', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(59, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000065', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(60, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000066', '3281.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(61, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000067', '7261.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(62, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000068', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(63, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000069', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(64, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000070', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(65, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000071', '1459.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(66, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000072', '11261.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(67, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000073', '1630.90', '0.00', 'BLANTYRE', 'Faith Ziba'),
(68, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000074', '1802.58', '0.00', 'BLANTYRE', 'Faith Ziba'),
(69, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000075', '1802.58', '0.00', 'BLANTYRE', 'Faith Ziba'),
(70, '2017-02-27', 'Qina Jere', 'WAYBILL', 'WB-BT000076', '4019.31', '0.00', 'BLANTYRE', 'Faith Ziba'),
(71, '2017-02-28', 'Qina Jere', 'WAYBILL', 'WB-BT000077', '4401.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(72, '2017-02-28', 'Qina Jere', 'WAYBILL', 'WB-BT000078', '3761.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(73, '2017-02-28', 'Qina Jere', 'WAYBILL', 'WB-BT000079', '4019.31', '0.00', 'BLANTYRE', 'Faith Ziba'),
(74, '2017-02-28', 'Manota Mphande', 'WAYBILL', 'WB-BT000080', '1630.90', '0.00', 'BLANTYRE', 'Faith Ziba'),
(75, '2017-02-28', 'Manota Mphande', 'WAYBILL', 'WB-BT000081', '101519.31', '0.00', 'BLANTYRE', 'Faith Ziba'),
(76, '2017-02-28', 'Manota Mphande', 'WAYBILL', 'WB-BT000082', '5439.31', '0.00', 'BLANTYRE', 'Faith Ziba'),
(77, '2017-03-02', 'Qina Jere', 'WAYBILL', 'WB-BT000083', '1630.90', '0.00', 'BLANTYRE', 'Mark Benson'),
(78, '2017-03-02', 'Qina Jere', 'WAYBILL', 'WB-BT000084', '1630.90', '0.00', 'BLANTYRE', 'Mark Benson'),
(79, '2017-03-02', 'Qina Jere', 'WAYBILL', 'WB-BT000085', '1630.90', '0.00', 'BLANTYRE', 'Mark Benson'),
(80, '2017-03-02', 'Qina Jere', 'WAYBILL', 'WB-BT000086', '1630.90', '0.00', 'BLANTYRE', 'Mark Benson'),
(81, '2017-03-02', 'Qina Jere', 'WAYBILL', 'WB-BT000087', '1630.90', '0.00', 'BLANTYRE', 'Mark Benson'),
(82, '2017-04-06', 'Qina Jere', 'WAYBILL', 'WB-BT000088', '1287.55', '0.00', 'BLANTYRE', 'Mary Kaso'),
(83, '2017-04-06', 'Qina Jere', 'WAYBILL', 'WB-BT000089', '2145.92', '0.00', 'BLANTYRE', 'Mary Kaso'),
(84, '2017-04-06', 'Hawa Freizer', 'WAYBILL', 'WB-MZ000001', '2489.27', '0.00', 'MZUZU', 'Pirilani Simwaka'),
(85, '2017-04-06', 'Hawa Freizer', 'WAYBILL', 'WB-MZ000002', '2489.27', '0.00', 'MZUZU', 'Pirilani Simwaka'),
(86, '2017-04-06', 'Hawa Freizer', 'WAYBILL', 'WB-MZ000003', '101519.31', '0.00', 'MZUZU', 'Pirilani Simwaka'),
(87, '2017-04-06', 'Wendie Banda', 'WAYBILL', 'WB-BT000090', '1630.90', '0.00', 'BLANTYRE', 'Mary Kaso'),
(88, '2017-04-06', 'Wendie Banda', 'WAYBILL', 'WB-BT000091', '1630.90', '0.00', 'BLANTYRE', 'Mary Kaso'),
(89, '2017-04-06', 'Nora', 'WAYBILL', 'WB-BT000092', '2231.76', '0.00', 'BLANTYRE', 'Mary Kaso'),
(90, '2017-04-06', 'Nora', 'WAYBILL', 'WB-BT000093', '2231.76', '0.00', 'BLANTYRE', 'Mary Kaso'),
(91, '2016-10-01', 'Takondwa Banda', 'WAYBILL', 'WB-BT000095', '2746.78', '0.00', 'BLANTYRE', 'Mary Kaso'),
(92, '2017-04-19', 'Katie', 'WAYBILL', 'WB-BT000097', '21261.80', '0.00', 'BLANTYRE', 'Mary Kaso'),
(93, '2017-04-20', 'Frank', 'WAYBILL', 'WB-BT000099', '2060.09', '0.00', 'BLANTYRE', 'Faith Ziba'),
(94, '2017-04-21', 'Qina Jere', 'WAYBILL', 'WB-BT000102', '1459.28', '0.00', 'BLANTYRE', 'Faith Ziba'),
(95, '2017-04-24', 'Wendie Banda', 'WAYBILL', 'WB-BT000103', '2145.92', '0.00', 'BLANTYRE', 'Faith Ziba'),
(96, '2017-04-24', 'Roseby Mpoka', 'WAYBILL', 'WB-BT000104', '1459.28', '0.00', 'BLANTYRE', 'Faith Ziba'),
(97, '2017-04-24', 'Philis Kachi', 'WAYBILL', 'WB-BT000105', '2660.94', '0.00', 'BLANTYRE', 'Faith Ziba'),
(98, '2017-04-26', 'Qina Jere', 'WAYBILL', 'WB-LL000002', '2145.92', '0.00', 'LILONGWE', 'Joseph Gova'),
(99, '2017-04-26', 'Qina Jere', 'WAYBILL', 'WB-LL000003', '2145.92', '0.00', 'LILONGWE', 'Joseph Gova'),
(100, '2017-04-26', 'Qina Jere', 'WAYBILL', 'WB-LL000004', '2145.92', '0.00', 'LILONGWE', 'Joseph Gova'),
(101, '2017-04-26', 'Qina Jere', 'WAYBILL', 'WB-LL000005', '2145.92', '0.00', 'LILONGWE', 'Joseph Gova'),
(102, '2017-05-09', 'Wezzie', 'WAYBILL', 'WB-BT000106', '1888.41', '0.00', 'BLANTYRE', 'Mary Kaso'),
(103, '2017-06-05', 'Daniel banda', 'WAYBILL', 'WB-BT000107', '2145.92', '0.00', 'BLANTYRE', 'Faith Ziba'),
(104, '2017-06-05', 'Bernard Chuka', 'WAYBILL', 'WB-BT000108', '1459.28', '0.00', 'BLANTYRE', 'Faith Ziba'),
(105, '2017-06-05', 'Ken', 'WAYBILL', 'WB-BT000109', '1459.28', '0.00', 'BLANTYRE', 'Faith Ziba'),
(106, '2017-06-05', 'Chuck Lamu', 'WAYBILL', 'WB-BT000110', '11661.80', '0.00', 'BLANTYRE', 'Faith Ziba'),
(107, '2017-06-05', 'Vic galamu', 'WAYBILL', 'WB-BT000111', '1888.41', '0.00', 'BLANTYRE', 'Faith Ziba'),
(108, '2017-06-05', 'Daniel banda', 'WAYBILL', 'WB-BT000112', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(109, '2017-06-05', 'Chisomo Tsaka', 'WAYBILL', 'WB-BT000113', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(110, '2017-06-05', 'Victoria kunsagala', 'WAYBILL', 'WB-BT000114', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(111, '2017-06-05', 'Wezzie Zgovu', 'WAYBILL', 'WB-BT000115', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(112, '2017-06-05', 'Maria stimu', 'WAYBILL', 'WB-BT000116', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(113, '2017-06-05', 'Milika Mandala', 'WAYBILL', 'WB-BT000117', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(114, '2017-06-05', 'Mirela Gombwe', 'WAYBILL', 'WB-BT000118', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(115, '2017-06-05', 'Philip Kasim', 'WAYBILL', 'WB-BT000119', '1287.55', '0.00', 'BLANTYRE', 'Faith Ziba'),
(116, '2017-06-19', 'Chisomo Tsaka', 'WAYBILL', 'WB-BT000001', '3661.80', '0.00', 'BLANTYRE', 'Mary Kaso'),
(117, '2017-06-19', 'Bernard Chuka', 'WAYBILL', 'WB-BT000002', '2060.09', '0.00', 'BLANTYRE', 'Mary Kaso'),
(118, '2017-06-19', 'George banda', 'WAYBILL', 'WB-BT000003', '2660.94', '0.00', 'BLANTYRE', 'Mary Kaso'),
(119, '2017-06-19', 'George banda', 'WAYBILL', 'WB-BT000004', '1459.28', '0.00', 'BLANTYRE', 'Mary Kaso'),
(120, '2017-06-19', 'George banda', 'WAYBILL', 'WB-BT000005', '1459.28', '0.00', 'BLANTYRE', 'Mary Kaso'),
(121, '2017-06-19', 'Milika Mandala', 'WAYBILL', 'WB-BT000006', '1459.28', '0.00', 'BLANTYRE', 'Mary Kaso'),
(122, '2017-06-19', 'Maria stimu', 'WAYBILL', 'WB-BT000007', '1459.28', '0.00', 'BLANTYRE', 'Mary Kaso'),
(123, '2017-06-19', 'Mirela Gombwe', 'WAYBILL', 'WB-BT000008', '1888.41', '0.00', 'BLANTYRE', 'Mary Kaso'),
(124, '2017-06-19', 'Daniel banda', 'WAYBILL', 'WB-BT000009', '1888.41', '0.00', 'BLANTYRE', 'Mary Kaso'),
(125, '2017-06-19', 'Daniel banda', 'WAYBILL', 'WB-BT000010', '1888.41', '0.00', 'BLANTYRE', 'Mary Kaso'),
(126, '2017-06-21', 'Qina Jere', 'WAYBILL', 'WB-BT000011', '1459.28', '0.00', 'BLANTYRE', 'Mary Kaso'),
(127, '2017-06-21', 'George banda', 'WAYBILL', 'WB-BT000012', '11519.31', '0.00', 'BLANTYRE', 'Mary Kaso');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_reg_no` varchar(10) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `vehicle_reg_no`, `vehicle_type`) VALUES
(1, 'MZ4578', 'BUS'),
(2, 'BZ1902', 'BUS'),
(3, 'KK1238', 'TRUCK'),
(5, 'BK 3242', 'BUS'),
(6, 'BM 2345', 'BUS'),
(7, 'BZ 5678', 'TRUCK'),
(8, 'DG 2345', 'MOTOR CYCLE'),
(9, 'MZ 34455', 'MOTOR CYCLE'),
(10, 'NN 21', 'TRUCK'),
(11, 'MZ 5678', 'BUS');

-- --------------------------------------------------------

--
-- Table structure for table `waybill`
--

CREATE TABLE IF NOT EXISTS `waybill` (
  `waybill_no` varchar(14) NOT NULL,
  `consignor_name` varchar(30) NOT NULL,
  `consignor_phone` varchar(13) NOT NULL,
  `consignor_add` varchar(50) NOT NULL,
  `consignee_name` varchar(30) NOT NULL,
  `consignee_phone` varchar(13) NOT NULL,
  `consignee_add` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `quantity` int(10) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_charged` decimal(10,2) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `way_date` date NOT NULL,
  `way_time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `manifest_no` varchar(14) NOT NULL,
  `recieved_date` date NOT NULL,
  `recieved_by` varchar(30) NOT NULL,
  `delivered_by` varchar(30) NOT NULL,
  `delivered_date` date NOT NULL,
  `comment` varchar(10) NOT NULL,
  PRIMARY KEY (`waybill_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waybill`
--

INSERT INTO `waybill` (`waybill_no`, `consignor_name`, `consignor_phone`, `consignor_add`, `consignee_name`, `consignee_phone`, `consignee_add`, `description`, `weight`, `quantity`, `source`, `destination`, `service_type`, `rate`, `tax`, `total_charged`, `created_by`, `way_date`, `way_time`, `status`, `manifest_no`, `recieved_date`, `recieved_by`, `delivered_by`, `delivered_date`, `comment`) VALUES
('WB-BT000001', 'Chisomo Tsaka', '+265881087294', 'p.o.', 'Happy Dowa', '+265881087294', 'p.o.', 'parcel', '12', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '3661.80', '604.20', '4266.00', 'Mary Kaso', '2017-06-19', '12:17:12', 'delivered', 'MAN-BT000001', '2017-06-21', 'John Banda', 'John Banda', '2017-06-21', 'active'),
('WB-BT000002', 'Bernard Chuka', '+265881087294', 'p.o.', 'Fanny Gondwe', '+265881087294', 'p.o.', 'parcel', '5', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '2060.09', '339.91', '2400.00', 'Mary Kaso', '2017-06-19', '12:17:51', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000003', 'George banda', '+265881087294', 'p.o.', 'Kettie Renzo', '+265881087294', 'p.o.', 'parcel', '8', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '2660.94', '439.06', '3100.00', 'Mary Kaso', '2017-06-19', '12:18:36', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000004', 'George banda', '+265881087294', 'p.o.', 'Kettie Renzo', '+265881087294', 'p.o.', 'parcel', '2', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1459.28', '240.78', '1700.06', 'Mary Kaso', '2017-06-19', '12:18:51', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000005', 'George banda', '+265881087294', 'p.o.', 'Kettie Renzo', '+265881087294', 'p.o.', 'parcel', '2', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1459.28', '240.78', '1700.06', 'Mary Kaso', '2017-06-19', '12:19:26', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000006', 'Milika Mandala', '+265881087294', 'p.o.', 'Manuel Zake', '+265881087294', 'p.o.', 'parcel', '2', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1459.28', '240.78', '1700.06', 'Mary Kaso', '2017-06-19', '12:19:51', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000007', 'Maria stimu', '+265881087294', 'p.o.', 'Maranatha James', '+265881087294', 'p.o.', 'parcel', '2', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1459.28', '240.78', '1700.06', 'Mary Kaso', '2017-06-19', '12:20:11', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000008', 'Mirela Gombwe', '+265881087294', 'p.o.', 'Fanny Gondwe', '+265881087294', 'p.o.', 'parcel', '4', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1888.41', '311.59', '2200.00', 'Mary Kaso', '2017-06-19', '12:20:52', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000009', 'Daniel banda', '+265881087294', 'p.o.', 'Fanny Gondwe', '+265881087294', 'p.o.', 'parcel', '4', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1888.41', '311.59', '2200.00', 'Mary Kaso', '2017-06-19', '12:21:07', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000010', 'Daniel banda', '+265881087294', 'p.o.', 'Fanny Gondwe', '+265881087294', 'p.o.', 'parcel', '4', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1888.41', '311.59', '2200.00', 'Mary Kaso', '2017-06-19', '12:21:17', 'in transit', 'MAN-BT000001', '0000-00-00', '', '', '0000-00-00', 'active'),
('WB-BT000011', 'Qina Jere', '+265881087294', 'p.o. box 4567', 'Milner Mwakamogo', '+265884599307', 'p.o. box 5295', 'envelope', '2', 1, 'BLANTYRE', 'LILONGWE', 'spotcash', '1459.28', '240.78', '1700.06', 'Mary Kaso', '2017-06-21', '11:39:52', 'delivered', 'MAN-BT000003', '2017-06-21', 'John Banda', 'John Banda', '2017-06-21', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `waybill_creditnotes`
--

CREATE TABLE IF NOT EXISTS `waybill_creditnotes` (
  `credit_no` varchar(15) NOT NULL,
  `waybill_no` varchar(15) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `office` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `done_by` varchar(50) NOT NULL,
  PRIMARY KEY (`credit_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waybill_creditnotes`
--

INSERT INTO `waybill_creditnotes` (`credit_no`, `waybill_no`, `description`, `amount`, `office`, `date`, `done_by`) VALUES
('CR-BT000001', 'WB-BT000013', 'REVERSAL OF WAYBILL: WB-BT000013', '3250.00', 'BLANTYRE', '2016-11-10', 'Mark Benson');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`office_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rate_table`
--
ALTER TABLE `rate_table`
  ADD CONSTRAINT `rate_table_ibfk_1` FOREIGN KEY (`range_id`) REFERENCES `kilo_range` (`range_id`),
  ADD CONSTRAINT `rate_table_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `rate_table_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `service_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
