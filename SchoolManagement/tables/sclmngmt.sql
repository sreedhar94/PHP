-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 02:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sclmngmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `aactivationcode` int(11) NOT NULL,
  `ausername` varchar(100) NOT NULL,
  `apassword` varchar(100) NOT NULL,
  `asalt` text NOT NULL,
  `aactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aactivationcode`, `ausername`, `apassword`, `asalt`, `aactive`) VALUES
(1, 'Sreedhar Reddy', 12345, 'babum', '57d569f20f0b1f78f5e2c27e7e37c093a918f594891cbb987013b41d1b964e6f', '0½¾&ï˜Ë\Z_Í>x˜­§ñ‹ÓPÑñ¶ŠiY	Ðv', 1),
(2, 'Babu Reddy', 12345, 'babu', '1be06ea8e8db31cfc1985b4bbf032860a357f7dff068e2b75def9373e9158b14', '3f#ÊoLðu*½ËØ2®âA3_:“åAÝL¬', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`id`, `name`, `dob`, `gender`) VALUES
(1, 'fdf', '2017-06-28', 'male'),
(2, 'sreedhar', '2017-01-03', 'male'),
(3, 'chinny', '2016-11-08', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mid` int(11) NOT NULL,
  `mfirstname` varchar(100) NOT NULL,
  `mlastname` varchar(100) NOT NULL,
  `mdob` date NOT NULL,
  `mgender` varchar(20) NOT NULL,
  `memailid` varchar(100) NOT NULL,
  `musername` varchar(100) NOT NULL,
  `mpassword` varchar(100) NOT NULL,
  `mparentname` varchar(100) NOT NULL,
  `mparentcontact` int(11) NOT NULL,
  `mstudentcontact` int(11) NOT NULL,
  `maddress` text NOT NULL,
  `msalt` text NOT NULL,
  `mactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `mfirstname`, `mlastname`, `mdob`, `mgender`, `memailid`, `musername`, `mpassword`, `mparentname`, `mparentcontact`, `mstudentcontact`, `maddress`, `msalt`, `mactive`) VALUES
(1, 'Sreedhar', 'Reddy', '2017-08-12', 'male', 'sree.reddy@gmail.com', 'sreedhar', '0e5096d4870f8d287dea10692d99197da2f055ef570aad318c3a06f2d49e0de6', 'Mnyr', 98765, 43210, 'Bng', '<˜µ#5lË÷,{!öo’úðR\ržÎz&Õ\r(¶À', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `mid` int(11) NOT NULL,
  `musername` varchar(100) NOT NULL,
  `sjava` int(11) NOT NULL DEFAULT '0',
  `sphp` int(11) NOT NULL DEFAULT '0',
  `sangularjs` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`mid`, `musername`, `sjava`, `sphp`, `sangularjs`) VALUES
(1, 'sreedhar', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mid`,`musername`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`mid`,`musername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
