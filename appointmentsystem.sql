-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 06:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointmentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmentreservation`
--

CREATE TABLE `appointmentreservation` (
  `appointmentreservation_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patients_id` int(11) NOT NULL,
  `tbl_appointmentschedule_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `notif` int(1) NOT NULL,
  `clicknotif` int(1) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `proof` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointmentreservation`
--

INSERT INTO `appointmentreservation` (`appointmentreservation_id`, `doctor_id`, `patients_id`, `tbl_appointmentschedule_id`, `month`, `year`, `status`, `notif`, `clicknotif`, `description`, `type`, `created_date`, `proof`) VALUES
(53, 58, 61, 62, 1, 2023, 2, 0, 0, 'Your Appointment has been Re-schedule', 'Check-up', '2023-06-08', ''),
(54, 63, 61, 60, 2, 2023, 2, 0, 0, '', 'Check-up', '2023-06-08', ''),
(55, 63, 64, 66, 6, 2023, 2, 0, 0, '', 'Check-up', '2023-06-08', ''),
(59, 63, 64, 67, 6, 2023, 1, 0, 0, '', 'Check-up', '2023-06-08', ''),
(60, 68, 71, 80, 0, 0, 2, 0, 0, 'dgh', 'Check-up', '2023-06-08', 'index.jpg'),
(61, 68, 71, 77, 0, 0, 1, 0, 0, '', 'Check-up', '2023-06-13', 'index.jpg'),
(62, 68, 71, 87, 0, 0, 5, 0, 0, 'cancel i want resched', 'Check-up', '2023-06-13', ''),
(63, 68, 71, 101, 6, 2023, 2, 0, 0, '', 'Check-up', '2023-06-13', 'index.jpg'),
(64, 68, 71, 92, 0, 0, 1, 0, 0, '', 'Check-up', '2023-06-13', ''),
(65, 68, 71, 100, 0, 0, 1, 0, 0, '', 'Check-up', '2023-11-22', ''),
(66, 68, 75, 106, 11, 2023, 1, 0, 0, '', '', '2023-11-22', ''),
(67, 68, 75, 90, 11, 2023, 1, 0, 0, '', '', '2023-11-22', ''),
(68, 68, 76, 109, 11, 2023, 1, 0, 0, '', '', '2023-11-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointmentschedule`
--

CREATE TABLE `tbl_appointmentschedule` (
  `tbl_appointmentschedule_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` text NOT NULL,
  `available` int(11) NOT NULL DEFAULT 4,
  `total` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointmentschedule`
--

INSERT INTO `tbl_appointmentschedule` (`tbl_appointmentschedule_id`, `users_id`, `date`, `time`, `available`, `total`, `date_created`) VALUES
(90, 68, '2023-06-15', '08:00 AM-11:30 AM', 9, 1, '2023-06-13'),
(109, 68, '2023-11-25', '08:00 AM-09:00 AM', 19, 1, '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sched`
--

CREATE TABLE `tbl_sched` (
  `s_id` int(50) NOT NULL,
  `p_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date_sched` date NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `passwordtxt` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'Patients',
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `lastname`, `firstname`, `middlename`, `contact`, `email`, `password`, `passwordtxt`, `type`, `date_created`) VALUES
(68, 'Admin', 'Admin', 'Admin', '09123456789', 'admin@admin.com', '$2y$10$DLLKMQOR3QvR.5E9KHJcKeHfnHluaOypoVs9qEj2RXS9JYvQ0lX9i', '111', 'Admin', '2023-06-08'),
(76, 'user', 'user', 'user', '09123456789', 'user@email.com', '$2y$10$I9K0gnW1lAXriv5xvkfV8.e53InWENFR2qmG4MEnR6Y2JPgm5G.j6', '123', 'Patients', '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `timeschedule`
--

CREATE TABLE `timeschedule` (
  `id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeschedule`
--

INSERT INTO `timeschedule` (`id`, `status`, `time`) VALUES
(1, 1, '08:00-09:30 AM'),
(2, 0, '10:00-11:30 AM'),
(3, 0, '01:00-02:30 PM'),
(4, 0, '03:00-04:30 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmentreservation`
--
ALTER TABLE `appointmentreservation`
  ADD PRIMARY KEY (`appointmentreservation_id`);

--
-- Indexes for table `tbl_appointmentschedule`
--
ALTER TABLE `tbl_appointmentschedule`
  ADD PRIMARY KEY (`tbl_appointmentschedule_id`);

--
-- Indexes for table `tbl_sched`
--
ALTER TABLE `tbl_sched`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `timeschedule`
--
ALTER TABLE `timeschedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmentreservation`
--
ALTER TABLE `appointmentreservation`
  MODIFY `appointmentreservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_appointmentschedule`
--
ALTER TABLE `tbl_appointmentschedule`
  MODIFY `tbl_appointmentschedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_sched`
--
ALTER TABLE `tbl_sched`
  MODIFY `s_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `timeschedule`
--
ALTER TABLE `timeschedule`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
