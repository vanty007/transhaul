-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 06:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transhaul`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_option`
--

CREATE TABLE `delivery_option` (
  `id` int(15) NOT NULL,
  `items` varchar(30) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `delivery_option` varchar(30) NOT NULL,
  `pricing_per_km` varchar(15) NOT NULL,
  `pricing_higher_km` varchar(15) NOT NULL,
  `totalamount` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `delivery_option`
--

INSERT INTO `delivery_option` (`id`, `items`, `category`, `delivery_option`, `pricing_per_km`, `pricing_higher_km`, `totalamount`) VALUES
(2, 'others', NULL, 'Standard', '1000', '5000', '10000'),
(3, 'others', NULL, 'Express', '2000', '6000', '11000');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(15) NOT NULL,
  `request_id` int(15) NOT NULL,
  `payer` varchar(20) NOT NULL,
  `picture` longtext NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `request_id`, `payer`, `picture`, `status`, `created_at`, `payment_method`) VALUES
(2, 3, 'requester', 'http://localhost/transhaullogistic/uploads/files/lz074fvarnb8hp6.jpeg', 0, '2025-09-16 17:18:52', 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_request`
--

CREATE TABLE `pickup_request` (
  `id` int(15) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `tracking_id` varchar(30) DEFAULT NULL,
  `pickup_userid` int(15) NOT NULL,
  `receiver_userid` int(15) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `notes` longtext NOT NULL,
  `pickup_name` varchar(100) DEFAULT NULL,
  `pickup_phoneno` varchar(15) DEFAULT NULL,
  `pickup_email` varchar(200) DEFAULT NULL,
  `receiver_phoneno` varchar(15) DEFAULT NULL,
  `receiver_email` varchar(100) DEFAULT NULL,
  `driver_id` int(15) DEFAULT NULL,
  `pickup_address` varchar(100) NOT NULL,
  `pickup_city` varchar(100) NOT NULL,
  `pickup_state` varchar(100) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `receiver_city` varchar(100) NOT NULL,
  `receiver_state` varchar(100) NOT NULL,
  `distance` varchar(11) DEFAULT '0',
  `picture` longtext NOT NULL,
  `pickup_code` varchar(30) DEFAULT NULL,
  `delivery_option_id` varchar(20) NOT NULL,
  `totalamount` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_status` varchar(15) NOT NULL DEFAULT '0',
  `pickup_status` varchar(15) NOT NULL DEFAULT '0',
  `payment_status` int(2) NOT NULL DEFAULT 0,
  `reviewcomment` varchar(255) DEFAULT NULL,
  `rate` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pickup_request`
--

INSERT INTO `pickup_request` (`id`, `item_name`, `category`, `tracking_id`, `pickup_userid`, `receiver_userid`, `receiver_name`, `notes`, `pickup_name`, `pickup_phoneno`, `pickup_email`, `receiver_phoneno`, `receiver_email`, `driver_id`, `pickup_address`, `pickup_city`, `pickup_state`, `receiver_address`, `receiver_city`, `receiver_state`, `distance`, `picture`, `pickup_code`, `delivery_option_id`, `totalamount`, `created_at`, `delivery_status`, `pickup_status`, `payment_status`, `reviewcomment`, `rate`) VALUES
(1, 'Books', 'Book', '', 1, NULL, 'Mabel Oghenekaro', '', NULL, NULL, NULL, '07033590877', 'tayo.ogundeji@yahoo.com', 2, '5, ocean palm estate', 'sangotedo', 'lagos', '5, ipaja way', 'ikeja', 'lagos', '0', 'http://localhost/transhaullogistic/uploads/photos/1.jpg', '', '1', '2000-', '2025-09-12 12:24:14', '0', '0', 0, NULL, 0),
(2, 'Iphone 14', 'Gadgets', '', 1, NULL, 'Mabel Oghenekaro', '', NULL, NULL, NULL, '07033590877', 'tayo.ogundeji@yahoo.com', 2, '5, ocean palm estate', 'sangotedo', 'lagos', '5, ipaja way', 'ikeja', 'lagos', '0', 'http://localhost/transhaullogistic/uploads/photos/2.jpg', '', '1', '2000-', '2025-09-12 12:24:14', '0', '3', 0, NULL, 0),
(3, 'Pillow', 'House Stuffs', 'HA3039', 1, NULL, 'Mabel Oghenekaro', '', NULL, NULL, NULL, '07033590877', 'tayo.ogundeji@yahoo.com', 2, '5, ocean palm estate', 'sangotedo', 'lagos', '5, ipaja way', 'ikeja', 'lagos', '0', 'http://localhost/transhaullogistic/uploads/photos/3.jpg', '3003', '1', '2000-', '2025-09-08 12:24:14', '0', '2', 1, NULL, 0),
(4, 'Samsung Smart Watch', 'Gadgets', 'HA3040', 1, NULL, 'Mabel Oghenekaro', '', NULL, NULL, NULL, '07033590877', 'tayo.ogundeji@yahoo.com', 2, '5, ocean palm estate', 'sangotedo', 'lagos', '5, ipaja way', 'ikeja', 'lagos', '0', 'http://localhost/transhaullogistic/uploads/photos/4.jpg', '3004', '1', '2000-', '2025-09-09 12:24:14', '0', '3', 0, 'ok', 2),
(5, 'CCTV Camera', 'Gadgets', 'HA3041', 1, NULL, 'Mabel Oghenekaro', '', NULL, NULL, NULL, '07033590877', 'tayo.ogundeji@yahoo.com', 2, '5, ocean palm estate', 'sangotedo', 'lagos', '5, ipaja way', 'ikeja', 'lagos', '0', 'http://localhost/transhaullogistic/uploads/photos/5.jpg', '3005', '1', '2000-', '2025-09-11 12:24:14', '1', '3', 1, 'hmm', 3),
(7, 'Clothes', 'Clothes', 'TRA39871', 1, NULL, 'Tope Awosika', '\nExpedited Delivery Service - How fast and reliable is it?Delivery of goods is the process of physically transferring ownership or possession of items from a seller to a buyer, which can be done through direct physical transfer, symbolic delivery (like a document of title), or by having a third party hold the goods for the buyer.', NULL, NULL, NULL, '09033805192', 'tayo.ogundeji@yahoo.com', 2, 'SANGOTEDO', 'LAGOS', 'Lagos', 'ipaja', 'ipaja', 'Lagos', '0', 'http://localhost/transhaullogistic/uploads/images/h59osqrx86mb40_.jpg', '1909', '0', '10000', '2025-09-15 19:46:41', '0', '2', 1, NULL, 0),
(8, 'Clothes', 'Clothes', 'TRA50290', 1, NULL, 'tayo ogundeji', 'jkcdd', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', 2, 'SANGOTEDO', 'LAGOS', 'Lagos', 'SANGOTEDO', 'LAGOS', 'Lagos', '0', 'http://localhost/transhaullogistic/uploads/images/z8pawg0nm42q_ue.jpeg', '6945', '0', '8000', '2025-09-16 07:44:54', '0', '3', 0, 'okkk', 5),
(9, 'Clothes', 'Clothes', 'TRA22413', 1, NULL, 'tayo ogundeji', 'dssd', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', NULL, 'SANGOTEDO', 'LAGOS', 'Lagos', 'SANGOTEDO', 'LAGOS', 'Lagos', '0', 'http://localhost/transhaullogistic/uploads/images/kqoi9n26btumcez.jpg', '5053', '0', '10000', '2025-09-16 07:46:47', '0', '0', 0, NULL, 0),
(10, 'Clothes', 'Clothes', 'TRA15470', 1, NULL, 'tayo ogundeji', 'hjdjkds', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', NULL, '', 'Ajah', 'Lagos', '', 'sangotedo', 'Lagos', '8.8 km', 'http://localhost/transhaullogistic/uploads/images/w38rt1qzdmh5ln_.jpg', '6495', '0', '8000', '2025-09-16 12:12:24', '0', '0', 0, NULL, 0),
(11, 'Business cards', 'Gadgets', 'TRA21438', 0, NULL, 'sola', 'this is to be delivered quick', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', NULL, '', 'ajah', 'Lagos', '', 'iyana oworo', 'Lagos', '33.3 km', 'http://localhost/transhaullogistic/uploads/images/ik3u5dtb4snc_ga.jpg', '8715', 'Standard', '8000', '2025-09-22 18:29:46', '0', '0', 0, NULL, 0),
(12, 'Bags', 'Gadgets', 'TRA21888', 1, NULL, 'tayo ogundeji', 'It’s no secret that the digital industry is booming. From exciting startups to', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', NULL, '12, alhaji shelle street', 'sangotedo', 'Lagos', '33 budland', 'ojodu', 'Lagos', '59.8 km', 'http://localhost/transhaullogistic/uploads/images/oe3xlja_0hs2vgu.jpg', '2724', 'Standard', '8000', '2025-09-24 06:57:55', '0', '0', 0, NULL, 0),
(13, 'Clothes', 'Gadgets', 'TRA98896', 10, NULL, 'tayo ogundeji', 'lsdlksd', '', '', '', '09033805192', 'tayo.ogundeji@yahoo.com', 2, 'SANGOTEDO', 'SANGOTEDO', 'Lagos', 'ajah', 'ajah', 'Lagos', '12.2 km', '', '1997', 'Standard', '8000', '2025-09-24 16:36:28', '0', '0', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `id` int(9) NOT NULL,
  `request_id` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `details` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`id`, `request_id`, `user_id`, `details`, `status`, `created_at`) VALUES
(1, 2, 2, 'rejected pickup', 0, '2025-09-22 13:20:00'),
(2, 2, 2, 'accepted pickup', 1, '2025-09-22 13:20:46'),
(3, 2, 2, 'accepted pickup', 1, '2025-09-22 13:21:36'),
(4, 3, 2, 'accepted pickup', 1, '2025-09-22 13:52:05'),
(5, 3, 2, 'started pickup', 2, '2025-09-22 13:52:58'),
(6, 2, 2, 'started pickup', 2, '2025-09-22 15:54:51'),
(7, 5, 2, 'end pickup', 3, '2025-09-22 16:52:21'),
(8, 4, 2, 'end pickup', 3, '2025-09-22 16:52:33'),
(9, 3, 2, 'started pickup', 2, '2025-09-22 16:54:11'),
(10, 8, 2, 'accepted pickup', 1, '2025-09-22 18:36:18'),
(11, 8, 2, 'started pickup', 2, '2025-09-22 18:36:48'),
(12, 8, 2, 'end pickup', 3, '2025-09-22 18:37:34'),
(13, 7, 2, 'accepted pickup', 1, '2025-09-23 19:28:11'),
(14, 7, 2, 'started pickup', 2, '2025-09-23 19:32:18'),
(15, 2, 2, 'end pickup', 3, '2025-09-23 19:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(9) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `rating` decimal(9,0) NOT NULL,
  `comment` longtext NOT NULL,
  `pickup_request_id` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `rating`, `comment`, `pickup_request_id`, `created_at`) VALUES
(1, '2347033590787', 3, 'ok', 1, '2025-08-25 15:00:45'),
(2, '2347033590787', 3, 'string', 1, '2025-08-25 15:06:27'),
(3, '2347033590787', 3, 'string', 1, '2025-08-25 15:08:28'),
(4, '2347033590787', 5, 'ok', 2, '2025-09-03 12:18:36'),
(5, '2347033590787', 5, 'ok', 2, '2025-09-03 12:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `riders_availability`
--

CREATE TABLE `riders_availability` (
  `id` int(15) NOT NULL,
  `rider_id` int(15) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `riders_availability`
--

INSERT INTO `riders_availability` (`id`, `rider_id`, `location`, `status`) VALUES
(1, 2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` varchar(30) NOT NULL DEFAULT 'user',
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `title` varchar(11) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `profile_pics` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(20) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `phoneno`, `password`, `role_id`, `firstname`, `lastname`, `title`, `sex`, `profile_pics`, `created_at`, `login_session_key`, `email_status`, `password_reset_key`) VALUES
(1, 't@y.com', '07033590787', '$2y$10$lns2kLXTq74sZ2GhszLyCOGW5e1PtERYOccgvt/uGzi.IGcxmLYIG', 'user', 'Sola', 'Ajiboye', 'Mr', 'M', NULL, '2024-12-09 13:49:55', NULL, NULL, NULL),
(2, 'driv@d.com', '09033805444', '$2y$10$lns2kLXTq74sZ2GhszLyCOGW5e1PtERYOccgvt/uGzi.IGcxmLYIG', 'driver', 'Mathew', 'Akinsola', 's', 's', 'http://localhost/homly/uploads/files/lyfb37p_2svznt9.jpg', '2024-12-09 13:49:55', NULL, NULL, NULL),
(3, '', '', '', 'user', 'okk', 'tyy', 'mr', 'm', 'http://localhost/homly/uploads/files/lyfb37p_2svznt9.jpg', '2024-12-21 13:02:25', NULL, NULL, NULL),
(4, '', '', '', 'user', 'josh', 'josh', NULL, NULL, NULL, '2024-12-21 13:03:53', NULL, NULL, NULL),
(5, '', '', '', 'user', 'tt', 'tt', NULL, NULL, NULL, '2025-01-22 21:17:21', NULL, NULL, NULL),
(6, '', '', '', 'user', 'testt', 'test', NULL, NULL, NULL, '2025-01-29 11:43:29', NULL, NULL, NULL),
(7, '', '', '', 'user', 'tttt', 'ewwew', NULL, NULL, NULL, '2025-01-29 12:55:19', NULL, NULL, NULL),
(8, '', '', '', 'user', 'tayo', 'ogundeji', NULL, NULL, NULL, '2025-01-29 14:24:06', NULL, NULL, NULL),
(9, '', '', '', 'user', 'tayo', 'ogundeji', NULL, NULL, NULL, '2025-01-29 14:28:12', NULL, NULL, NULL),
(10, 'tayo.ogundeji@yahoo.com', '09033805192', '$2y$10$LWo/GysVghi495z86cOW1.wN7iR6f7JjY16w6iARIhIdsJWHKC2gq', 'user', 'tayo', 'ogundeji', NULL, NULL, '', '2025-09-24 16:34:29', NULL, NULL, NULL),
(11, 'y@y.com', '07033590787', '$2y$10$lns2kLXTq74sZ2GhszLyCOGW5e1PtERYOccgvt/uGzi.IGcxmLYIG', 'admin', 'Sola', 'Ajiboye', 'Mr', 'M', NULL, '2024-12-09 13:49:55', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_option`
--
ALTER TABLE `delivery_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_request`
--
ALTER TABLE `pickup_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riders_availability`
--
ALTER TABLE `riders_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_option`
--
ALTER TABLE `delivery_option`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_request`
--
ALTER TABLE `pickup_request`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riders_availability`
--
ALTER TABLE `riders_availability`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
