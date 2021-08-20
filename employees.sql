-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 07:01 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `empid` int(11) NOT NULL,
  `empname` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `joindate` date NOT NULL,
  `reldate` date NOT NULL,
  `contry` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pstatus` varchar(250) NOT NULL,
  `ptype` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`empid`, `empname`, `position`, `joindate`, `reldate`, `contry`, `city`, `pstatus`, `ptype`) VALUES
(1001, 'Raju', 'Clerk', '2021-08-02', '2021-08-12', 'india', 'Rjy', 'paid', 'netbanking'),
(1002, 'Ravi', 'Programmer', '2021-07-12', '2021-08-18', 'india', 'Kkd', 'paid', 'creditcard'),
(1003, 'Mohan', 'Senior Developer', '2021-06-08', '2021-08-12', 'us', 'Newyork', 'paid', 'debitcard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `permission` varchar(80) NOT NULL DEFAULT 'all',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `Recorddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `permission`, `status`, `Recorddate`) VALUES
(37, 'admin', '12345', 'all', 'active', '2019-03-22 10:18:31'),
(38, 'kumar', 'kumar', 'all', 'active', '2019-03-22 10:23:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
