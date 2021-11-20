-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 07:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdf_detail`
--

CREATE TABLE `pdf_detail` (
  `pdf_id` int(100) NOT NULL,
  `pdf_name` varchar(1000) NOT NULL,
  `pdf_location` varchar(1000) NOT NULL,
  `access_type` varchar(100) NOT NULL,
  `upload_date` datetime(6) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_detail`
--

INSERT INTO `pdf_detail` (`pdf_id`, `pdf_name`, `pdf_location`, `access_type`, `upload_date`, `username`) VALUES
(1, 'Anishkumar Giri.pdf', 'pdfupload/8f752afd22a64030a9f154fa970e0175f232ac9f.pdf', 'private', '2021-11-15 06:18:01.000000', '_shivaay_0987'),
(2, 'CaseStudy_BeirutExplosion_TechBioHazardsweb.pdf', 'pdfupload/776e65c83991f7204bf5196cc37b60407ab195b5.pdf', 'public', '2021-11-15 06:21:15.000000', '_shivaay_0987'),
(10, 'CE041_ER_Diagram.pdf', 'pdfupload/cc9699361ba87a6016c1cfb653c551f41924b779.pdf', 'private', '2021-11-20 01:13:48.000000', '_shivaay_0987');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` bigint(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `username`, `fullname`, `password`, `gender`, `email`, `country`) VALUES
(14, '_shivaay_098', 'Anishkumar', '', 'female', 'girianishpramodbhai@gmail.com', 'india'),
(24, '_shivaay_0987', 'Anish', 'Anish@11', 'male', 'giripa@gmail.com', 'USA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdf_detail`
--
ALTER TABLE `pdf_detail`
  ADD PRIMARY KEY (`pdf_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdf_detail`
--
ALTER TABLE `pdf_detail`
  MODIFY `pdf_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
