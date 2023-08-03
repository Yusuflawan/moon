-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 08:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fistName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fistName`, `lastName`, `email`, `userName`, `password`) VALUES
(1, 'maimuna', 'muhd', 'moon@makeup.industry', 'moon', '123');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `vId` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `commentText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `vId`, `username`, `commentText`) VALUES
(3, 4, 'moon', 'my first attampt'),
(15, 8, 'moon', 'my second attempt'),
(48, 4, 'moon', 'yusuf'),
(100, 4, 'moon', 'yusuf'),
(101, 4, 'moon', 'yusuf'),
(102, 4, 'moon', 'yusuf'),
(103, 4, 'moon', 'yusuf'),
(104, 4, 'moon', 'yusuf'),
(105, 4, 'moon', 'yusuf'),
(106, 4, 'moon', 'yusuf'),
(107, 4, 'moon', 'ghj'),
(108, 4, 'moon', 'hey there');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `email`, `phone`, `password`) VALUES
(2, 'yusuf', 'muhammad', 'yusufmuh@gmail.com', '09039951335', '1234'),
(5, 'ugvb ', ',vb', 'sx@rty.com', 'ufrefh', '123'),
(8, 'Maimuna ', 'muhammad', 'maimunamuhammadsunusi@gmail.com', '09039951335', '2345'),
(10, 'Maimuna ', 'muhammad', 'maimunamuhammadsunusi@gmail.com', '1234', '123'),
(11, 'malo', 'nancy', 'nam@ga', '123', 'qwe'),
(12, 'isah`', 'abba', 'isahi@gmail.com', '07068900044', '12345'),
(13, 'zainab', 'Muhammad Sunusi', 'zainabmuhammadsunusi@gmail.com', '08037327988', '234'),
(14, 'fatima', 'Muhammad Sunusi', 'famsy@gmail.com', '08067662447', '2777'),
(15, 'amira', 'usman', 'rahmausman@gmail.com', '09068946230', 'khaleefah'),
(16, 'abba', 'wer', 'abba@gmail.com', '1235', '1234'),
(17, 'Khadija', 'Yakasai', 'yakasai580@gmail.com', '08135267004', '12345678'),
(18, 'yusuf', 'lawan', 'yusuflawan982@gmail.com', '08148907671', '123');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `videoId` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `description`) VALUES
(4, 'videos/VID-20220829-WA0021.mp4', 'another testing'),
(6, 'videos/screen-20230608-074555.mp4', 'testing3'),
(8, 'videos/screen-20230529-213801.mp4', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
