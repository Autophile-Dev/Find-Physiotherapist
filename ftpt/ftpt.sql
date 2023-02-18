-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 02:22 PM
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

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`Exercise_id`, `Exercise_name`, `Exercise_duration`, `Exercise_link`, `Exercise_description`, `Physio_phone`) VALUES
(3, 'Ankle Pumps', '30 Minutes Twice a week', 'https://www.youtube.com/watch?v=KxfFzSOAT7g', 'whiohhiofhepwhgohwepgoJHOHKLwhfGHHHGKWHghwoh', '03000404050'),
(4, 'Heel slides', 'Do 10 to 16 repetitions on each side', 'https://www.youtube.com/watch?v=6-anByqnKp8', 'Slide your heel as close to your buttocks as you can.\r\nOnly bend your knee to a place that is comfortable.\r\nYou may feel slight pressure or a sensation in or around your knee, but it shouldn’t be painful.\r\nFor each exercise, do 1 to 3 sets of 10 repetitions. Rest for up to 1 minute between sets. Do these exercises at least two times per day.', '03000000002'),
(5, 'Ankle Pump', '30-60 Minutes Twice a day', 'https://www.youtube.com/watch?v=KxfFzSOAT7g', '1. Sit down on a chair or lye down on a bed.\r\n\r\n2. Flex your toes so that they are pointing up. Hold this position for 3 seconds.\r\n\r\n3. Point your toes forward, as if pushing down on a car gas pedal. Hold this position for 3 seconds.\r\n\r\nSome variation can also be introduced into the ankle pump exercise by flexing and pointing the toes at different angles, which will work the muscles in a slightly different capacity.\r\n\r\nYou may also want to try tracing numbers, letters and shapes, especially if you are coming back from surgery or incorporating the exercise as part of a post-injury rehabilitation plan. This will help you gain better control of your ankle faster and will help strengthen the ankle from all angles.', '03000000002'),
(7, 'Carpal tunnel syndrome', 'Gently bend your wrist forward at a right angle and hold for 5 seconds.  Straighten your wrist.  Gently bend it backwards and hold for 5 seconds.  Do 3 sets of 10 repetitions.', 'https://www.youtube.com/watch?v=cEO5YG8Y554&vl=en', 'When the nerve is squeezed it can cause pain, aching, tingling or numbness in the affected hand. The symptoms tend to be worse at night and may disturb your sleep, but you may notice it most when you wake up in the morning. Hanging your hand out of bed or shaking it around will often relieve the pain and tingling.\r\n\r\nYou may not notice the problem at all during the day, though certain activities – such as writing, typing, DIY or housework – can bring on symptoms.\r\n\r\nSometimes the condition can be mistaken for something else. For example, pressure on nerves in the neck due to disc problems or arthritis can cause similar symptoms.\r\n\r\nA nerve conduction test may help if there’s any doubt about the diagnosis.', '03000000002'),
(8, 'Neuromuscular Exercise (NEMEX) ', '30-60 Minutes Twice a day', 'https://youtu.be/-Xkiad0x7_I', 'The neuromuscular exercise (NEMEX) program is aimed at improving sensorimotor control and attaining functional joint stabilization by addressing the quality of movement in all 3 movement planes.[1] It’s an evidence-based education and supervised neuromuscular exercise program targeting hip and knee Osteoarthritis. It forms part of successful implementation program for people with hip and knee osteoarthritis termed GLA:D™ (program developed by Ewa Roos and Soren Skou).\r\n\r\nKey Facts\r\n\r\nFeasible in patients with severe hip and knee joint replacement surgery\r\nImproves pain, function and quality of life\r\nAssociated with reduction in use of analgesia and sick days from work[2]', '03000000002'),
(9, 'Carpal tunnel syndrome', '30-60 Minutes Twice a day', 'https://www.youtube.com/watch?v=6-anByqnKp8', 'WHQUJR3HRIOHIOEHIOHEOGHOEGHOGFOGEOGOIGOGOGOE3GFOG3OGIO3IOGO\r\nDWEQFGUIG3UIGRFUG3UOEGUFGEFEHIHRIYHEIOHIOFRHOIOIH', '03000000002');

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

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`Meetiind_id`, `Request_id`, `Patient_id`, `Physio_id`, `Slot_id`, `Slot_date`, `Slot_time`, `Patient_name`, `Patient_phone`, `Physio_name`, `Physio_phone`, `Physio_address`, `Virtual_address`, `Virtual_password`, `Patient_rate`, `Physio_rate`) VALUES
(11, 52, 13, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Waleed Zaheer', '03214244711', 'Dr Aqsa Majeed', '03000000002', 'C668+WHP, Eden Lane Villas Eden Lane Villas 1, Lahore, Punjab', 'hrehrowgoig', 'beiro03738@yhdoieo', 4, 2),
(15, 58, 13, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Waleed Zaheer', '03214244711', 'Dr Haroon Rasul', '03000000006', '61-A PGSHS Mohlanwal Defence Road, Lahore', 'https://www.youtube.com/watch?v=KKjQyUf-o-E', 'sjhiwwi', 4, 4),
(16, 59, 25, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Ahsan Amjad', '03004567901', 'Dr Haroon Rasul', '03000000006', '61-A PGSHS Mohlanwal Defence Road, Lahore', 'https://www.youtube.com/watch?v=KKjQyUf-o-E', 'dhuwhduw', 4, 5),
(17, 67, 26, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Saqib', '03008788398', 'Dr Aqsa Majeed', '03000000002', 'C668+WHP, Eden Lane Villas Eden Lane Villas 1, Lahore, Punjab', 'https://www.planeta.com/zoom-links/', 'admin4657', 4, 0),
(18, 65, 26, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Saqib', '03008788398', 'Dr Haroon Rasul', '03000000006', 'Johar Town', 'https://www.planeta.com/zoom-links/', 'uiopqueu3', 2, 0),
(19, 68, 27, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Muzna', '03000008741', 'Dr Aqsa Majeed', '03000000002', 'Johar Town', 'uwddfuiqefefb.com', 'web123', 4, 4),
(20, 69, 27, 17, 3, '12-11-2022', '11:30 AM--12:45 PM', 'Muzna', '03000008741', 'Dr Aqsa Majeed', '03000000002', 'AWT PHASE 2', 'JWPQUPO', 'SGUWG', 3, 0);

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

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_id`, `Patient_name`, `Patient_address`, `Patient_email`, `Patient_gender`, `Patient_password`, `Patient_phone`, `Patient_diagnosis`, `Patient_rating`) VALUES
(13, 'Waleed Zaheer', '307/E AWT Phase 2 Adda Plot Raiwind road', 'waleed.zaheer55@gmail.com', 'Male', '0992ece2e8d992194f33f1d8c46ac01e', '03214244711', 'Knee Pain since last week', 4),
(16, 'Rafay', 'Gulberg 3', 'rafay@1gmail.com', 'Male', '78897949ce32024bc2e185b63a74fa16', '03002666666', '', 0),
(17, 'Fahad', 'Shadman', 'fadi678@yahoo.com', 'Male', '477d087318de5ce78550188237b3a9a5', '03000000000', '', 0),
(18, 'Sana Raza', 'Sector C Bahria Town Lahore', 'sany11th@badoo.com', 'Female', '6035d7a170ff97458068c79e64310a38', '03016742576', '', 0),
(19, 'Iram Amjad', 'Sector AA Bahria Town Lahore', 'erumjutt56@gmail.com', 'Female', '38e9f5eb4e8e24351255f191a15e0f7f', '03222222222', '', 0),
(20, 'Ahmad Kabir', 'House 33/E DHA Rahbar Lahore', 'ahmy123@gmail.com', 'Male', '8de13959395270bf9d6819f818ab1a00', '03222889991', '', 0),
(21, 'Ch Tabish', 'Wapda Town', 'tabss@proton.com', 'Male', '6804c309581cad3ac64ee2f8b5bb0830', '03210093909', '', 0),
(22, 'Hafiza Eman', 'Wapda Town', 'emna444@proton.com', 'Female', '07b9118aa36cb76f49a3135de9dc50af', '03220000000', '', 0),
(23, 'Shehroze', '44/B AWT Phase 2 Adda Plot Raiwind Road Lahore', 'sherryultra78@gmail.com', 'Male', '3134595cdb01cd7fd1ccf166c3ec59a0', '03002300011', 'Ankle Pain', 0),
(24, 'Rabia Faisal', 'Plot 62, Block A2 Block A 2 P & D Society, Lahore, Punjab, Pakistan', 'rabit@gmail.com', 'Female', 'a730b6202d87981256d6b065cccf2786', '03000000004', '', 0),
(25, 'Ahsan Amjad', 'Central Park Lahore', 'ahsan123@yahoo.com', 'Male', '3d68b18bd9042ad3dc79643bde1ff351', '03004567901', '', 4),
(26, 'Saqib', '33-A PGSHS Mohlanwal Defence Road, Lahore', 'saqib@gmail.com', 'Male', '683b66efc77f333c644c0f3d5558e8d0', '03008788398', '', 3),
(27, 'Muzna', '61-A PGSHS Mohlanwal Defence Road, Lahore', 'muzna@gmail.com', 'Female', '28b5f5801099affd2f6e6a23062b38a6', '03000008741', '', 4);

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

--
-- Dumping data for table `physiotherapist`
--

INSERT INTO `physiotherapist` (`Physio_id`, `Physio_name`, `Physio_address`, `Physio_email`, `Physio_gender`, `Physio_qualification`, `Physio_experience`, `Physio_password`, `Physio_phone`, `Physio_rating`) VALUES
(12, 'Dr Rabia Akhtar', '90 R3 Block R 3 Rd, Block R3 Block R 3 Phase 2 Johar Town, Lahore, Punjab 58400', 'rabia@gmail.com', 'Female', 'Orthopedic Manual Therapy', '3+ Years Experience in Barbados, 4 Years Experience in Seoul', 'a730b6202d87981256d6b065cccf2786', '03030303032', 0),
(14, 'Dr Muhammad Hashim', 'ph-1، 133-B Khayaban-e-Jinnah, Iqbal Avenue Cooperative Housing Society - Phase I Iqbal Avenue Housing Society, Lahore, Punjab 54770', 'hashim@gmail.com', 'Male', 'Doctor of Physical Therapy, University of Lahore (Gold Medal) Certified Strength and Conditioning Level-1 Coach (Pakistan Sports Board) Certified Dry Needling Practitioner (NAT Certifications) Certified Kinesio-Taping for Trigger Points (NAT Certification', '2 Years Experience in Birmingham, 1 Year Experience in Jeddah, Currently working on multiple research work in collaboration with Physiogic Physiotherapy Clinic.', '7c626eb6a66c42a85e8062bea10f9b05', '03000404050', 0),
(15, 'Dr Muhammad Asif Jatalah', '78 E1, WAPDA Town Block E 1 Wapda Town Phase 1 Lahore, Punjab 54000', 'asif@gmail.com', 'Male', 'Graduated from Rashid Latif Medical College, University of Health sciences Lahore.', '3+ Years Experience in Barbados, 4 Years Experience in Seoul', '6f3c4bd06e7c378d955b9901c6b0c537', '03000000000', 0),
(16, 'Dr Ammara Munawar', '80 E1, WAPDA Town Block E 1 Wapda Town Phase 1 Lahore, Punjab 54000', 'ammara@yahoo.com', 'Female', 'Qualified as a Physiotherapist from University of South Asia, Post graduation certification in pelvic floor rehabilitation from UHS, Completed her clinical training in Lahore General Hospital, one of the biggest tertiary care hospitals in Pakistan.', 'Experienced in pediatric, Musculoskeletal and neurological Rehabilitation, Associated with Physiogic Physiotherapy Clinic as consultant female physiotherapist since 2018, experienced manual therapist using dry needling, taping and exercise to assess, trea', '1158f136ed767ebabcff07745301c718', '03000000001', 0),
(17, 'Dr Aqsa Majeed', '5-C, Commercial, GCP Society, Shaukat Khanum Junction, Khayaban-e-Firdousi, behind Nishat Linen, Block R 1 Phase 2 Johar Town, Lahore, Punjab 54001', 'aqsa33@hotmail.com', 'Female', 'PT (Gold Medalist)  DPT(Pb), MS-PPT*(RIU-Lhr)', 'She has been working with Physiogic as a Consultant Female Physiotherapist since 2017. She is running the physiotherapy department in Rehmat Tufail Trust Hospital.', '0192023a7bbd73250516f069df18b500', '03000000002', 2),
(18, 'Dr Haroon Rasul', 'Plot 75, Block A-2 Block A 2 Gulberg III, Lahore, Punjab, Pakistan', 'haroon_ra1122@yahoo.com', 'Male', 'Doctor of Physical Therapy, University of Lahore (Gold Medal) Certified Strength and Conditioning Level-1 Coach (Pakistan Sports Board) Certified Dry Needling Practitioner (NAT Certifications) Certified Kinesio-Taping for Trigger Points (NAT Certification', '4 Years Experience in Houstan, 1 Year Experience in Johar Bhru', 'be48fa0602c227b4c030f1b558559e83', '03000000006', 3),
(19, 'Dr Ansar', '68-A PGSHS Mohlanwal Defence Road, Lahore', 'ansaert23@yahoo.com', 'Male', 'PT (GOLD MEDALIST) DPT (RIU), MS-SPT* (RIU)', '2', 'b44068b4766a07079bd4d69406f317dd', '03000000007', 0),
(20, 'Dr Fahad', '18/C AWT Phase 2 Adda Plot Raiwind road', 'udhuw@yahoo.com', 'Male', 'Doctor of Physical Therapy, University of Lahore (Gold Medal) Certified Strength and Conditioning Level-1 Coach (Pakistan Sports Board) Certified Dry Needling Practitioner (NAT Certifications) Certified Kinesio-Taping for Trigger Points (NAT Certification', '3+', '477d087318de5ce78550188237b3a9a5', '03000882923', 0);

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

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Request_id`, `Patient_id`, `Patient_name`, `Patient_phone`, `Slot_id`, `Slot_time`, `Slot_date`, `Physio_id`, `Physio_name`, `Physio_phone`, `Request_status`) VALUES
(70, 27, 'Muzna', '03000008741', 5, '08:30 PM--09:45 PM', '07-12-2022', 18, 'Dr Haroon Rasul', '03000000006', 'Pending');

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

--
-- Dumping data for table `request-response`
--

INSERT INTO `request-response` (`Response_id`, `Request_id`, `Patient_id`, `Physio_id`, `Slot_id`, `Slot_date`, `Slot_time`, `Patient_name`, `Patient_phone`, `Physio_name`, `Physio_phone`, `Request_status`) VALUES
(40, 52, 13, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Waleed Zaheer', '03214244711', 'Dr Aqsa Majeed', '03000000002', 'Accepted'),
(41, 53, 13, 17, 3, '12-11-2022', '11:30 AM--12:45 PM', 'Waleed Zaheer', '03214244711', 'Dr Aqsa Majeed', '03000000002', 'Rejected'),
(45, 58, 13, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Waleed Zaheer', '03214244711', 'Dr Haroon Rasul', '03000000006', 'Accepted'),
(46, 59, 25, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Ahsan Amjad', '03004567901', 'Dr Haroon Rasul', '03000000006', 'Accepted'),
(47, 66, 26, 17, 3, '12-11-2022', '11:30 AM--12:45 PM', 'Saqib', '03008788398', 'Dr Aqsa Majeed', '03000000002', 'Rejected'),
(48, 67, 26, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Saqib', '03008788398', 'Dr Aqsa Majeed', '03000000002', 'Accepted'),
(49, 65, 26, 18, 5, '07-12-2022', '08:30 PM--09:45 PM', 'Saqib', '03008788398', 'Dr Haroon Rasul', '03000000006', 'Accepted'),
(50, 68, 27, 17, 1, '12-11-2022', '10:00 AM--11:15 AM', 'Muzna', '03000008741', 'Dr Aqsa Majeed', '03000000002', 'Accepted'),
(51, 69, 27, 17, 3, '12-11-2022', '11:30 AM--12:45 PM', 'Muzna', '03000008741', 'Dr Aqsa Majeed', '03000000002', 'Accepted');

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

--
-- Dumping data for table `saved-exercise`
--

INSERT INTO `saved-exercise` (`Save_id`, `Save_exercise_name`, `Save_exercise_link`, `Save_exercise_duration`, `Save_exercise_description`, `Patient_phone`, `Exercise_id`) VALUES
(4, 'Thigh Sqeeze ', 'https://www.youtube.com/watch?v=38xz_sRgj8Q', '30-60 Minutes Twice a day or Twice a week', ' Lie on your side with a medicine ball in between your feet.\r\n2. Slowly lift the ball up toward the ceiling and then lower it back down to the starting position.\r\n3. Repeat this movement for the entire duration of the set and then switch sides.', '03000000004', 2),
(5, 'Ankle Pumps', 'https://www.youtube.com/watch?v=KxfFzSOAT7g', '30 Minutes Twice a week', 'whiohhiofhepwhgohwepgoJHOHKLwhfGHHHGKWHghwoh', '03000000004', 3),
(6, 'Heel slides', 'https://www.youtube.com/watch?v=6-anByqnKp8', 'Do 10 to 16 repetitions on each side', 'Slide your heel as close to your buttocks as you can.\r\nOnly bend your knee to a place that is comfortable.\r\nYou may feel slight pressure or a sensation in or around your knee, but it shouldn’t be painful.\r\nFor each exercise, do 1 to 3 sets of 10 repetitions. Rest for up to 1 minute between sets. Do these exercises at least two times per day.', '03000000004', 4),
(7, 'Ankle Pump', 'https://www.youtube.com/watch?v=KxfFzSOAT7g', '30-60 Minutes Twice a day', '1. Sit down on a chair or lye down on a bed.\r\n\r\n2. Flex your toes so that they are pointing up. Hold this position for 3 seconds.\r\n\r\n3. Point your toes forward, as if pushing down on a car gas pedal. Hold this position for 3 seconds.\r\n\r\nSome variation can also be introduced into the ankle pump exercise by flexing and pointing the toes at different angles, which will work the muscles in a slightly different capacity.\r\n\r\nYou may also want to try tracing numbers, letters and shapes, especially if you are coming back from surgery or incorporating the exercise as part of a post-injury rehabilitation plan. This will help you gain better control of your ankle faster and will help strengthen the ankle from all angles.', '03000000004', 5),
(12, 'Carpal tunnel syndrome', 'https://www.youtube.com/watch?v=cEO5YG8Y554&vl=en', 'Gently bend your wrist forward at a right angle and hold for 5 seconds.  Straighten your wrist.  Gently bend it backwards and hold for 5 seconds.  Do 3 sets of 10 repetitions.', 'When the nerve is squeezed it can cause pain, aching, tingling or numbness in the affected hand. The symptoms tend to be worse at night and may disturb your sleep, but you may notice it most when you wake up in the morning. Hanging your hand out of bed or shaking it around will often relieve the pain and tingling.\r\n\r\nYou may not notice the problem at all during the day, though certain activities – such as writing, typing, DIY or housework – can bring on symptoms.\r\n\r\nSometimes the condition can be mistaken for something else. For example, pressure on nerves in the neck due to disc problems or arthritis can cause similar symptoms.\r\n\r\nA nerve conduction test may help if there’s any doubt about the diagnosis.', '03000000004', 7),
(19, 'Heel slides', 'https://www.youtube.com/watch?v=6-anByqnKp8', 'Do 10 to 16 repetitions on each side', 'Slide your heel as close to your buttocks as you can.\r\nOnly bend your knee to a place that is comfortable.\r\nYou may feel slight pressure or a sensation in or around your knee, but it shouldn’t be painful.\r\nFor each exercise, do 1 to 3 sets of 10 repetitions. Rest for up to 1 minute between sets. Do these exercises at least two times per day.', '03214244711', 4),
(20, 'Ankle Pumps', 'https://www.youtube.com/watch?v=KxfFzSOAT7g', '30 Minutes Twice a week', 'whiohhiofhepwhgohwepgoJHOHKLwhfGHHHGKWHghwoh', '03214244711', 3),
(22, 'Thigh Sqeeze ', 'https://www.youtube.com/watch?v=38xz_sRgj8Q', '30-60 Minutes Twice a day or Twice a week', ' Lie on your side with a medicine ball in between your feet.\r\n2. Slowly lift the ball up toward the ceiling and then lower it back down to the starting position.\r\n3. Repeat this movement for the entire duration of the set and then switch sides.', '03214244711', 2),
(23, 'Carpal tunnel syndrome', 'https://www.youtube.com/watch?v=cEO5YG8Y554&vl=en', 'Gently bend your wrist forward at a right angle and hold for 5 seconds.  Straighten your wrist.  Gently bend it backwards and hold for 5 seconds.  Do 3 sets of 10 repetitions.', 'When the nerve is squeezed it can cause pain, aching, tingling or numbness in the affected hand. The symptoms tend to be worse at night and may disturb your sleep, but you may notice it most when you wake up in the morning. Hanging your hand out of bed or shaking it around will often relieve the pain and tingling.\r\n\r\nYou may not notice the problem at all during the day, though certain activities – such as writing, typing, DIY or housework – can bring on symptoms.\r\n\r\nSometimes the condition can be mistaken for something else. For example, pressure on nerves in the neck due to disc problems or arthritis can cause similar symptoms.\r\n\r\nA nerve conduction test may help if there’s any doubt about the diagnosis.', '03214244711', 7),
(26, 'Carpal tunnel syndrome', 'https://www.youtube.com/watch?v=cEO5YG8Y554&vl=en', 'Gently bend your wrist forward at a right angle and hold for 5 seconds.  Straighten your wrist.  Gently bend it backwards and hold for 5 seconds.  Do 3 sets of 10 repetitions.', 'When the nerve is squeezed it can cause pain, aching, tingling or numbness in the affected hand. The symptoms tend to be worse at night and may disturb your sleep, but you may notice it most when you wake up in the morning. Hanging your hand out of bed or shaking it around will often relieve the pain and tingling.\r\n\r\nYou may not notice the problem at all during the day, though certain activities – such as writing, typing, DIY or housework – can bring on symptoms.\r\n\r\nSometimes the condition can be mistaken for something else. For example, pressure on nerves in the neck due to disc problems or arthritis can cause similar symptoms.\r\n\r\nA nerve conduction test may help if there’s any doubt about the diagnosis.', '03008788398', 7),
(28, 'Heel slides', 'https://www.youtube.com/watch?v=6-anByqnKp8', 'Do 10 to 16 repetitions on each side', 'Slide your heel as close to your buttocks as you can.\r\nOnly bend your knee to a place that is comfortable.\r\nYou may feel slight pressure or a sensation in or around your knee, but it shouldn’t be painful.\r\nFor each exercise, do 1 to 3 sets of 10 repetitions. Rest for up to 1 minute between sets. Do these exercises at least two times per day.', '03000008741', 4),
(29, 'Neuromuscular Exercise (NEMEX) ', 'https://youtu.be/-Xkiad0x7_I', '30-60 Minutes Twice a day', 'The neuromuscular exercise (NEMEX) program is aimed at improving sensorimotor control and attaining functional joint stabilization by addressing the quality of movement in all 3 movement planes.[1] It’s an evidence-based education and supervised neuromuscular exercise program targeting hip and knee Osteoarthritis. It forms part of successful implementation program for people with hip and knee osteoarthritis termed GLA:D™ (program developed by Ewa Roos and Soren Skou).\r\n\r\nKey Facts\r\n\r\nFeasible in patients with severe hip and knee joint replacement surgery\r\nImproves pain, function and quality of life\r\nAssociated with reduction in use of analgesia and sick days from work[2]', '03000008741', 8);

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
-- Dumping data for table `time-slots`
--

INSERT INTO `time-slots` (`Slot_id`, `Slot_date`, `Slot_time`, `Physio_phone`, `Physio_id`) VALUES
(1, '12-11-2022', '10:00 AM--11:15 AM', '03000000002', 17),
(3, '12-11-2022', '11:30 AM--12:45 PM', '03000000002', 17),
(5, '07-12-2022', '08:30 PM--09:45 PM', '03000000006', 18),
(6, '01-03-2023', '08:30 PM--09:45 PM', '03000000002', 17);

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
  MODIFY `Exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `Meetiind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `Request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `request-response`
--
ALTER TABLE `request-response`
  MODIFY `Response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `saved-exercise`
--
ALTER TABLE `saved-exercise`
  MODIFY `Save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `time-slots`
--
ALTER TABLE `time-slots`
  MODIFY `Slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
