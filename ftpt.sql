-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 11:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_name` varchar(255) NOT NULL,
  `Admin_address` varchar(255) NOT NULL,
  `Admin_email` varchar(255) NOT NULL,
  `Admin_gender` varchar(255) NOT NULL,
  `Admin_password` varchar(255) NOT NULL,
  `Admin_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_name`, `Admin_address`, `Admin_email`, `Admin_gender`, `Admin_password`, `Admin_phone`) VALUES
(1, 'Jawad Rauf', 'Tulip Block Bahria Town Lahore', 'jaadraf56@gmail.com', 'Male', 'jawad123', '03019990231'),
(2, 'Omar Khayam', 'DHA Phase 5 Street 22 Sector G', 'omarredshanks@yahoo.com', 'Male', 'admin123', '03004256371');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `Exercise_id` int(11) NOT NULL,
  `Exercise_name` varchar(255) NOT NULL,
  `Exercise_duration` varchar(255) NOT NULL,
  `Exercise_link` varchar(255) NOT NULL,
  `Exercise_description` varchar(1000) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `Meetiind_id` int(11) NOT NULL,
  `Request_id` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Physio_id` int(11) NOT NULL,
  `Slot_id` int(11) NOT NULL,
  `Slot_date` varchar(255) NOT NULL,
  `Slot_time` varchar(255) NOT NULL,
  `Patient_name` varchar(255) NOT NULL,
  `Patient_phone` varchar(255) NOT NULL,
  `Physio_name` varchar(255) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL,
  `Physio_address` varchar(255) NOT NULL,
  `Virtual_address` varchar(255) NOT NULL,
  `Virtual_password` varchar(255) NOT NULL,
  `Patient_rate` int(2) NOT NULL,
  `Physio_rate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_id` int(11) NOT NULL,
  `Patient_name` varchar(255) NOT NULL,
  `Patient_address` varchar(255) NOT NULL,
  `Patient_email` varchar(255) NOT NULL,
  `Patient_gender` varchar(255) NOT NULL,
  `Patient_password` varchar(255) NOT NULL,
  `Patient_phone` varchar(255) NOT NULL,
  `Patient_diagnosis` varchar(255) NOT NULL,
  `Patient_rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `physiotherapist`
--

CREATE TABLE `physiotherapist` (
  `Physio_id` int(11) NOT NULL,
  `Physio_name` varchar(255) NOT NULL,
  `Physio_address` varchar(255) NOT NULL,
  `Physio_email` varchar(255) NOT NULL,
  `Physio_gender` varchar(255) NOT NULL,
  `Physio_qualification` varchar(255) NOT NULL,
  `Physio_experience` varchar(255) NOT NULL,
  `Physio_password` varchar(255) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL,
  `Physio_rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_id` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Patient_name` varchar(255) NOT NULL,
  `Patient_phone` varchar(255) NOT NULL,
  `Slot_id` int(11) NOT NULL,
  `Slot_time` varchar(255) NOT NULL,
  `Slot_date` varchar(255) NOT NULL,
  `Physio_id` int(11) NOT NULL,
  `Physio_name` varchar(255) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL,
  `Request_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request-response`
--

CREATE TABLE `request-response` (
  `Response_id` int(11) NOT NULL,
  `Request_id` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `Physio_id` int(11) NOT NULL,
  `Slot_id` int(11) NOT NULL,
  `Slot_date` varchar(255) NOT NULL,
  `Slot_time` varchar(255) NOT NULL,
  `Patient_name` varchar(255) NOT NULL,
  `Patient_phone` varchar(255) NOT NULL,
  `Physio_name` varchar(255) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL,
  `Request_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `saved-exercise`
--

CREATE TABLE `saved-exercise` (
  `Save_id` int(11) NOT NULL,
  `Save_exercise_name` varchar(255) NOT NULL,
  `Save_exercise_link` varchar(255) NOT NULL,
  `Save_exercise_duration` varchar(255) NOT NULL,
  `Save_exercise_description` varchar(1000) NOT NULL,
  `Patient_phone` varchar(255) NOT NULL,
  `Exercise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time-slots`
--

CREATE TABLE `time-slots` (
  `Slot_id` int(11) NOT NULL,
  `Slot_date` varchar(255) NOT NULL,
  `Slot_time` varchar(255) NOT NULL,
  `Physio_phone` varchar(255) NOT NULL,
  `Physio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`Exercise_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`Meetiind_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_id`);

--
-- Indexes for table `physiotherapist`
--
ALTER TABLE `physiotherapist`
  ADD PRIMARY KEY (`Physio_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_id`);

--
-- Indexes for table `request-response`
--
ALTER TABLE `request-response`
  ADD PRIMARY KEY (`Response_id`);

--
-- Indexes for table `saved-exercise`
--
ALTER TABLE `saved-exercise`
  ADD PRIMARY KEY (`Save_id`);

--
-- Indexes for table `time-slots`
--
ALTER TABLE `time-slots`
  ADD PRIMARY KEY (`Slot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `Exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `Meetiind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `physiotherapist`
--
ALTER TABLE `physiotherapist`
  MODIFY `Physio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `request-response`
--
ALTER TABLE `request-response`
  MODIFY `Response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `saved-exercise`
--
ALTER TABLE `saved-exercise`
  MODIFY `Save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `time-slots`
--
ALTER TABLE `time-slots`
  MODIFY `Slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
