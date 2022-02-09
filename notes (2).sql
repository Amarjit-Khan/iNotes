-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 04:46 PM
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
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `note_s`
--

CREATE TABLE `note_s` (
  `sl_no` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_s`
--

INSERT INTO `note_s` (`sl_no`, `title`, `description`, `tstamp`) VALUES
(1, 'Go to buy fruits', 'Hey Harry, I want u to go buy fruits.', '2021-05-28 09:53:24'),
(2, 'bad habbits', '  Solve your homework first.', '2021-05-28 11:12:23'),
(3, 'This is a test title', '  This is the test desc', '2021-05-28 11:24:04'),
(4, 'django', '  Learn django and python', '2021-05-28 18:48:29'),
(5, 'databases', '  The databases are MongoDB and MySql', '2021-05-28 18:49:18'),
(6, 'You have to eat', '  You have to fill your stomach with food', '2021-05-28 19:09:06'),
(7, 'Homework', '  Maths and Physics', '2021-05-28 19:09:34'),
(8, 'Make notes', '  Make chemistry notes', '2021-05-28 19:09:50'),
(9, 'Drink water', '  Drink enough water everyday ', '2021-05-28 19:10:24'),
(10, 'Games', '  Practice basketball not football', '2021-05-28 19:10:44'),
(11, 'Study', '  Study maths nd practice regularly', '2021-05-28 19:11:19'),
(12, 'Java script', 'Jquerry, Ajax, Json', '2021-05-28 19:11:59'),
(13, 'To complete assigned project', 'Php with MySql', '2021-08-05 15:10:59'),
(14, 'Go to college', 'After october', '2021-08-07 10:45:23'),
(15, 'Joey', 'How u doing :)', '2021-08-25 21:09:18'),
(16, 'Prison break', 'Best Webseries Ever', '2022-01-28 15:34:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note_s`
--
ALTER TABLE `note_s`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note_s`
--
ALTER TABLE `note_s`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
