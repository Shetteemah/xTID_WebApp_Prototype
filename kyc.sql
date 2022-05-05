-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 06:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyc`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `doc_user_id` int(11) NOT NULL,
  `doc_type` text NOT NULL,
  `doc_police_file` text NOT NULL,
  `doc_country` text NOT NULL,
  `doc_state` text NOT NULL,
  `doc_city` text NOT NULL,
  `doc_station` text NOT NULL,
  `doc_file_number` text NOT NULL,
  `doc_uni_name` text NOT NULL,
  `doc_status` int(11) NOT NULL,
  `doc_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_user_id`, `doc_type`, `doc_police_file`, `doc_country`, `doc_state`, `doc_city`, `doc_station`, `doc_file_number`, `doc_uni_name`, `doc_status`, `doc_message`) VALUES
(2, 2, 'police_report', 'radasd', 'Pakistan', 'State', 'Islamabad', 'Muzaffarabad', '32423423', '', 1, ''),
(5, 3, 'police_report', '1631901484-emailerror.png', 'Pakistan', 'ISLAMABAD CAPITAL TERRITORY', 'ISLAMABAD', '', '42342342', 'IIUI', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_username` text NOT NULL,
  `staff_password` text NOT NULL,
  `staff_role` int(11) NOT NULL,
  `staff_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_username`, `staff_password`, `staff_role`, `staff_status`) VALUES
(1, 'user', 'user', 0, 1),
(2, 'admin', '123', 1, 1),
(3, 'salikawan', 'salikawan78', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` text NOT NULL,
  `user_lname` text NOT NULL,
  `user_email` text NOT NULL,
  `user_verify_email` int(11) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `selftwithcard` text NOT NULL,
  `selfistatus` int(11) NOT NULL,
  `usermessage` text NOT NULL,
  `dob` text NOT NULL,
  `typeofcard` text NOT NULL,
  `passportfile` text NOT NULL,
  `passportnumber` text NOT NULL,
  `passportexp` text NOT NULL,
  `idcardfile` text NOT NULL,
  `idcardnumber` text NOT NULL,
  `idcardexp` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_verify_email`, `user_password`, `selftwithcard`, `selfistatus`, `usermessage`, `dob`, `typeofcard`, `passportfile`, `passportnumber`, `passportexp`, `idcardfile`, `idcardnumber`, `idcardexp`, `status`) VALUES
(2, 'Salik', 'Awan', 'aqib', 0, '1234', 'sfjslkfjs', 0, '', '11-12-1299', 'passport', 'sdfdsfdsf', '34324', '12/2021', '', '', '', 0),
(3, 'AHSAN', 'ULLAH KHAN', 'ahsankh92@hotmail.com', 0, '12345', '1631815575-emailerror.png', 0, '', '2021-09-15', 'idcard', '', '', '', '1631815575-db_error.png', '12324232132131', '2021-09-09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
