-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 11:22 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automated_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `a_id` int(100) NOT NULL,
  `u_id` int(50) NOT NULL,
  `p_id` int(50) NOT NULL,
  `t_id` int(50) NOT NULL,
  `a_start` varchar(20) NOT NULL,
  `a_end` varchar(20) NOT NULL,
  `a_detail` text NOT NULL,
  `a_by` int(50) NOT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `a_status` int(1) NOT NULL DEFAULT '0',
  `a_accept` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`a_id`, `u_id`, `p_id`, `t_id`, `a_start`, `a_end`, `a_detail`, `a_by`, `seen`, `a_status`, `a_accept`) VALUES
(2, 27, 16, 1, '10/19/2018', '11/30/2018', 'Assign you the wireframe of uber', 120, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_start` varchar(20) NOT NULL,
  `p_end` varchar(20) NOT NULL,
  `p_detail` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `p_name`, `p_type`, `p_start`, `p_end`, `p_detail`, `u_id`, `s_id`) VALUES
(16, 'Uber', 'Pick & Drop', '10/01/2018', '11/30/2018', 'Make friendly Application', 120, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(100) NOT NULL,
  `t_type` varchar(50) NOT NULL,
  `t_start` varchar(20) NOT NULL,
  `t_end` varchar(20) NOT NULL,
  `t_detail` text NOT NULL,
  `p_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `t_type`, `t_start`, `t_end`, `t_detail`, `p_id`) VALUES
(1, '1', '06/03/2018', '07/31/2018', 'design all the screen register, sign in and dashboard', 1),
(2, '1', '10/18/2018', '11/12/2018', 'Make wireframe as your suggested', 4),
(4, '1', '10/12/2018', '11/21/2018', 'making uber wireframes', 16),
(5, '2', '10/19/2018', '11/14/2018', 'Make Mockup of Uber', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `u_fname` varchar(20) NOT NULL,
  `u_lname` varchar(20) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_pass`, `status`, `path`) VALUES
(27, 'daniyal', 'hussain', 'daniyalbutt785@gmail.com', '4e075844d2e00e4c800c8c62716bed8c', 1, NULL),
(120, 'daniyal', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
