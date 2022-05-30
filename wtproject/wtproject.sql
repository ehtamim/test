-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 09:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `email`, `contact`, `password`) VALUES
('Asif Hossain', 'asif1', 'asif@gmail.com', '+8801811111111', '#Asif@2021#');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `acode` varchar(50) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `did` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`acode`, `pname`, `pid`, `dname`, `did`, `day`, `time`, `room`) VALUES
('11', 'Emam Hossain', '1932', 'Dr. Ifad Chowdhury', '009', '22 April 2022', '8.30pm', '803');

-- --------------------------------------------------------

--
-- Table structure for table `docschedule`
--

CREATE TABLE `docschedule` (
  `code` varchar(20) NOT NULL,
  `docname` varchar(100) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(100) NOT NULL,
  `room` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docschedule`
--

INSERT INTO `docschedule` (`code`, `docname`, `day`, `time`, `room`) VALUES
('101', 'Dr. Yamin Khan', 'Thursday, 21 April 2022', '8pm-11pm', '605'),
('103', 'Dr. Ifad Hossain', '22 April 2022', '8pm-10pm', '808');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
