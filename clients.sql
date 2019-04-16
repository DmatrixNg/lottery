-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 01:50 PM
-- Server version: 5.6.16
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `marital_status` varchar(55) DEFAULT NULL,
  `image_path` varchar(100) NOT NULL,
  `Mname` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `age` mediumint(9) DEFAULT NULL,
  `univ` varchar(100) DEFAULT NULL,
  `hsch` int(11) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `adskill` varchar(100) DEFAULT NULL,
  `r11` varchar(50) DEFAULT NULL,
  `r13` varchar(50) DEFAULT NULL,
  `r14` varchar(50) DEFAULT NULL,
  `r15` varchar(50) DEFAULT NULL,
  `r16` varchar(50) DEFAULT NULL,
  `r21` varchar(50) DEFAULT NULL,
  `r23` varchar(50) DEFAULT NULL,
  `r24` varchar(50) DEFAULT NULL,
  `r25` varchar(50) DEFAULT NULL,
  `r26` varchar(50) DEFAULT NULL,
  `r31` varchar(50) DEFAULT NULL,
  `r33` varchar(50) DEFAULT NULL,
  `r34` varchar(50) DEFAULT NULL,
  `r35` varchar(50) DEFAULT NULL,
  `r36` varchar(50) DEFAULT NULL,
  `r41` varchar(50) DEFAULT NULL,
  `r43` varchar(50) DEFAULT NULL,
  `r44` varchar(50) DEFAULT NULL,
  `r45` varchar(50) DEFAULT NULL,
  `r46` varchar(50) DEFAULT NULL,
  `r51` varchar(50) DEFAULT NULL,
  `r53` varchar(50) DEFAULT NULL,
  `r54` varchar(50) DEFAULT NULL,
  `r55` varchar(50) DEFAULT NULL,
  `r56` varchar(50) DEFAULT NULL,
  `explain_text` varchar(200) DEFAULT NULL,
  `vas` varchar(50) DEFAULT NULL,
  `disabled` varchar(50) DEFAULT NULL,
  `dis` varchar(50) DEFAULT NULL,
  `hob` varchar(50) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `langkwn` varchar(50) DEFAULT NULL,
  `langflu` varchar(50) DEFAULT NULL,
  `res_addrs` varchar(50) DEFAULT NULL,
  `medic` varchar(100) DEFAULT NULL,
  `marriage_cert` varchar(100) DEFAULT NULL,
  `app_status` varchar(50) NOT NULL DEFAULT 'waiting',
  `Date_ap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `nationality`, `gender`, `date_of_birth`, `city`, `date`, `marital_status`, `image_path`, `Mname`, `address`, `age`, `univ`, `hsch`, `degree`, `adskill`, `r11`, `r13`, `r14`, `r15`, `r16`, `r21`, `r23`, `r24`, `r25`, `r26`, `r31`, `r33`, `r34`, `r35`, `r36`, `r41`, `r43`, `r44`, `r45`, `r46`, `r51`, `r53`, `r54`, `r55`, `r56`, `explain_text`, `vas`, `disabled`, `dis`, `hob`, `spouse_name`, `langkwn`, `langflu`, `res_addrs`, `medic`, `marriage_cert`, `app_status`, `Date_ap`) VALUES
(1, 'Elijah', 'Okokon', 8150685555, 'okoelijah@gmail.com', '1B4mdN7K', NULL, 'm', '2019-03-08', NULL, '2019-03-05 20:29:55', 'yes', 'diruploads/66f480bb6975ad15b4e25be7df2a0237.jpg', 'bassey', 'Plot 2, house 39, Owode Estate Extension, Apata,', 55, 'caleb university', 2000, '31', 'singing', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'bla', 'yes', 'no', 'sini', 'llkla', 'losue', 'english', 'english', 'nananb sewa rerea greagrea wefa', 'http://localhost/lottery/uploads/IMG_20180710_151350.jpg', 'http://localhost/lottery/uploads/IMG_20180710_151358.jpg', 'approve', '2019-04-16 11:06:40'),
(2, 'Elijah', 'bab', 8150685555, 'okoelijah@gmail.com', 'z7jF6xvY', NULL, 'f', '1994-05-05', NULL, '2019-03-20 14:57:58', 'no', 'http://localhost/lottery/uploads/IMG_20190119_102704.jpg', 'oofoo', 'Owode Estate Extension, Apata,', 45, 'Owode Estate Extension, Apata,', 1996, 'computer science', 'singing', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', 'no', '', '', '', 'english', 'english', 'nananb sewa rerea greagrea wefa', 'http://localhost/lottery/uploads/IMG_20180122_191410.jpg', 'http://localhost/lottery/uploads/', 'reject', '2019-04-16 11:06:40'),
(3, 'Elijah', 'Okokon', 8150685555, 'okoelijah@gmail.com', 'vY9xV1Xg', NULL, 'm', '2019-04-24', NULL, '2019-04-16 11:23:25', NULL, '', 'bassey', 'Plot 2, house 39, Owode Estate Extension, Apata,', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approve', '2019-04-16 11:23:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
