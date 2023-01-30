-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2023 at 12:32 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20158188_flight_booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines_list`
--

CREATE TABLE `airlines_list` (
  `id` int(30) NOT NULL,
  `airlines` text NOT NULL,
  `logo_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airlines_list`
--

INSERT INTO `airlines_list` (`id`, `airlines`, `logo_path`) VALUES
(1, 'AirAsiaa2', '1600999080_kisspng-flight-indonesia-airasia-airasia-japan-airline-tic-asia-5abad146966736.8321896415221927106161.jpg'),
(2, 'Philippine Airlines', '1600999200_Philippine-Airlines-Logo.jpg'),
(3, 'Cebu Pacific', '1600999200_43cada0008538e3c1a1f4675e5a7aabe.jpeg'),
(4, 'Malaysian Airlines', '1672090260_myairline.png'),
(5, 'Emirates Airlines', '1672090320_Emirates.png');

-- --------------------------------------------------------

--
-- Table structure for table `airport_list`
--

CREATE TABLE `airport_list` (
  `id` int(30) NOT NULL,
  `airport` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport_list`
--

INSERT INTO `airport_list` (`id`, `airport`, `location`) VALUES
(1, 'NAIA', 'Metro Manila, Phillipines'),
(2, 'Beijing Capital International Airport', 'Chaoyang-Shunyi, Beijing'),
(3, 'Los Angeles International Airport', 'Los Angeles, California'),
(4, 'Dubai International Airport', 'Garhoud, Dubai'),
(5, 'Mactan-Cebu Airport', 'Cebu, Phillipines'),
(6, 'Kuala Lumpur International Airport', 'Kuala Lumpur, Malaysia'),
(7, 'Hazrat Shahjalal International Airport', 'Dhaka, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `booked_flight`
--

CREATE TABLE `booked_flight` (
  `id` int(30) NOT NULL,
  `flight_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_flight`
--

INSERT INTO `booked_flight` (`id`, `flight_id`, `name`, `address`, `contact`) VALUES
(2, 3, 'James Smith', 'Sample Address', '+4545 6456'),
(3, 4, 'John Smith', 'Sample Address', '+18456-5455-55'),
(4, 6, 'Imtihan Rahman', 'Palm Spring Damansara, Selangor', '0172900839'),
(5, 10, 'faheem', 'Pantai Hillpark Phase 2, 59200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur, Malaysia\r\nBlock 5, Floor 21, Unit 4', '+601128003387'),
(6, 10, 'John Doe', 'Mars', '123456789'),
(7, 10, 'ABC', 'Jupiter', '123'),
(8, 10, 'DFG', 'Saturn', '456'),
(9, 10, 'HHH', 'Pluto', '123'),
(10, 10, 'osman', 'pataling jaya', '2345654322345'),
(11, 10, 'osamah', 'Pataling jaya', '728993848922'),
(12, 10, 'Falcon', 'Pantai', '4567'),
(13, 11, 'Faheem Ibn Habib', 'Pantai', '92'),
(14, 14, 'Imtihan Rahman', 'S206, Block S, University Malaya International House,\r\nJalan 17/2, Seksyen 17,\r\nPetaling Jaya, Selangor', '0172900839');

-- --------------------------------------------------------

--
-- Table structure for table `flight_list`
--

CREATE TABLE `flight_list` (
  `id` int(30) NOT NULL,
  `airline_id` int(30) NOT NULL,
  `plane_no` text NOT NULL,
  `departure_airport_id` int(30) NOT NULL,
  `arrival_airport_id` int(30) NOT NULL,
  `departure_datetime` datetime NOT NULL,
  `arrival_datetime` datetime NOT NULL,
  `seats` int(10) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_list`
--

INSERT INTO `flight_list` (`id`, `airline_id`, `plane_no`, `departure_airport_id`, `arrival_airport_id`, `departure_datetime`, `arrival_datetime`, `seats`, `price`, `type`, `date_created`) VALUES
(1, 1, 'GB623-14', 1, 3, '2020-10-07 04:00:00', '2020-10-21 10:00:00', 150, 7500, 'Economy', '2020-09-25 11:23:52'),
(2, 2, 'TIPS14-15', 1, 2, '2020-10-14 11:00:00', '2020-10-16 09:00:00', 100, 5000, 'Economy', '2020-09-25 11:46:12'),
(3, 3, 'CEB-1101', 5, 1, '2020-09-30 08:00:00', '2020-09-30 08:45:00', 100, 2500, 'Economy', '2020-09-25 11:57:31'),
(4, 3, 'CEB10023', 1, 5, '2020-10-07 01:00:00', '2020-10-07 01:45:00', 100, 2500, 'Economy', '2020-09-25 14:50:47'),
(5, 1, 'AK71', 4, 3, '2022-12-28 06:00:00', '2022-12-28 08:00:00', 5, 1000, 'Economy', '2022-12-27 05:17:21'),
(6, 2, 'PH621', 1, 4, '2022-12-28 14:00:00', '2022-12-29 03:00:00', 5, 2000, 'Economy', '2022-12-27 05:18:16'),
(7, 5, 'EM182', 6, 7, '2023-01-29 02:00:00', '2023-01-27 04:00:00', 20, 1800, 'Economy', '2022-12-27 05:35:30'),
(8, 4, 'MH370', 2, 6, '2022-12-29 07:00:00', '2022-12-28 09:00:00', 10, 2500, 'Economy', '2022-12-27 05:36:50'),
(9, 5, '', 6, 4, '2023-01-24 05:39:00', '2023-01-25 05:39:00', 100, 1000, 'First Class', '2023-01-16 05:39:49'),
(10, 4, 'FGH23', 4, 6, '2023-01-20 05:41:00', '2023-01-21 05:42:00', 100, 1111, 'Economy', '2023-01-16 05:42:08'),
(11, 1, 'MKA-5R', 5, 6, '2023-01-31 10:00:00', '2023-01-31 12:00:00', 100, 2000, 'Business', '2023-01-16 20:57:38'),
(12, 2, 'PH726', 4, 7, '2023-01-21 12:13:00', '2023-01-22 12:13:00', 10, 1000, 'Economy', '2023-01-17 04:13:44'),
(13, 1, 'AK71', 4, 6, '2023-01-20 12:00:00', '2023-01-20 18:00:00', 5, 1000, 'Economy', '2023-01-17 04:15:32'),
(14, 1, 'AK71', 4, 7, '2023-01-20 20:00:00', '2023-01-21 02:00:00', 10, 2000, 'Economy', '2023-01-18 14:26:00'),
(15, 1, 'BK19', 2, 4, '2023-01-20 10:38:00', '2023-01-20 14:00:00', 10, 1000, 'Economy', '2023-01-19 02:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `locationID` int(100) NOT NULL,
  `locationName` varchar(50) NOT NULL,
  `locationDetails` varchar(1000) NOT NULL,
  `locationImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`locationID`, `locationName`, `locationDetails`, `locationImage`) VALUES
(1, 'London', 'Although you can’t go up the tower, you can view this Gothic structure from the street. Take a tour of Parliament (get there early or reserve tickets online) as well. Tours cost 28 GBP.\r\nBuilt in 1070, the tower has expanded many times over the years. Weapons, armor, and coins were made here until 1810 and today you can view the famous crown jewels, walk the battlements, wander recreated medieval palace rooms, and spot the legendary ravens that live in the tower.\r\nBuckingham Palace is only open to the public during the summer, but you can join the crowds and watch the changing of the guard at 11am daily throughout the year.  ', 'london.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Online Flight Booking System', 'info@sample.comm', '+6948 8542 623', '1672089720_intro.jpeg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `doctor_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'Administrator', '', '', 'admin', 'admin123', 1),
(7, 0, 'George Wilson', 'Sample Only', '+18456-5455-55', 'gwilson@sample.com', 'd40242fb23c45206fadee4e2418f274f', 3),
(9, 2, 'DR.James Smith, M.D.', 'Sample Clinic Address', '+1456 554 55623', 'jsmith@sample.com', 'jsmith123', 2),
(10, 3, 'DR.Claire Blake, M.D.', 'Sample Only', '+5465 555 623', 'cblake@sample.com', 'blake123', 2),
(11, 0, 'Sample Only', 'Sample', '+5465 546 4556', 'sample@sample.com', '4e91b1cbe42b5c884de47d4c7fda0555', 3),
(15, 9, 'DR.Sample Doctor, M.D.', 'Sample Address', '+1235 456 623', 'sample2@sample.com', 'sample123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines_list`
--
ALTER TABLE `airlines_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport_list`
--
ALTER TABLE `airport_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_flight`
--
ALTER TABLE `booked_flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_list`
--
ALTER TABLE `flight_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines_list`
--
ALTER TABLE `airlines_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `airport_list`
--
ALTER TABLE `airport_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booked_flight`
--
ALTER TABLE `booked_flight`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `flight_list`
--
ALTER TABLE `flight_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
