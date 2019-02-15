-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2019 at 03:12 AM
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_id` int(50) NOT NULL,
  `act_name` varchar(100) NOT NULL,
  `act_code` longtext NOT NULL,
  `mockup_code` longtext NOT NULL,
  `mockup_back_color` varchar(191) DEFAULT NULL,
  `first_act` longtext,
  `act_xml` longtext NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_type` int(11) NOT NULL,
  `done_by_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_id`, `act_name`, `act_code`, `mockup_code`, `mockup_back_color`, `first_act`, `act_xml`, `p_id`, `t_type`, `done_by_id`) VALUES
(1, 'first activity', '<p id=\"edit_text_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 124px; left: 24.3906px; padding: 4px; border: 0px; width: 202.609px; height: 50px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"text_view_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 92px; left: 30.3594px; width: 84px; height: 29px;\">Text</p><p id=\"text_view_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 202px; left: 30.3594px; width: 85px; height: 32px;\">Text</p><p id=\"edit_text_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 243px; left: 27.3906px; padding: 4px; border: 0px; width: 196px; height: 41px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_1\" class=\"border-on-icon ui-draggable-handle item ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 310px; left: 28.4219px; padding: 4px; border: 0px; width: 193px; height: 46px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', '<p id=\"edit_text_2\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 124px; left: 24.3906px; padding: 4px; border: 0px; width: 202.609px; height: 50px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\" class=\"no-select\"></p><p id=\"text_view_2\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 92px; left: 30.3594px; width: 84px; height: auto; background-color: rgb(230, 112, 110); color: rgb(255, 255, 255);\">Email</p><p id=\"text_view_3\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 202px; left: 30.3594px; width: 85px; height: auto; color: rgb(255, 255, 255);\">Password</p><p id=\"edit_text_3\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 243px; left: 27.3906px; padding: 4px; border: 0px; width: 196px; height: 41px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\" class=\"no-select\"></p><p id=\"Button_1\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 310px; left: 28.4219px; padding: 4px; border: 0px; width: 193px; height: 46px;\"><input type=\"button\" style=\"width: -webkit-fill-available; height: 100% !important; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);\" value=\"Second?\" class=\"no-select\"></p>', 'rgb(230, 112, 110)', NULL, '', 1, 1, 122),
(2, 'second activity', '<p id=\"text_view_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 130px; left: 95.3594px; width: 68px; height: 34px;\">Text</p><p id=\"Button_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 194px; left: 30.4219px; padding: 4px; border: 0px; width: 194px; height: 42px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', '<p id=\"text_view_4\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 130px; left: 95.3594px; width: 68px; height: auto; color: rgb(255, 255, 255); text-align: center;\">First</p><p id=\"Button_2\" class=\"\" style=\"position: absolute; margin-bottom: 0px; top: 194px; left: 30.4219px; padding: 1px 4px 4px; border: 0px; width: 194px; height: 42px; line-height: 27px;\"><input type=\"button\" style=\"width: -webkit-fill-available; height: 100% !important; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); font-size: 18px;\" value=\"First?\" class=\"no-select\"></p>', 'rgb(230, 110, 110)', NULL, '', 1, 1, 122);

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
  `a_status_comment` text NOT NULL,
  `a_accept` int(1) NOT NULL DEFAULT '0',
  `a_timespan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`a_id`, `u_id`, `p_id`, `t_id`, `a_start`, `a_end`, `a_detail`, `a_by`, `seen`, `a_status`, `a_status_comment`, `a_accept`, `a_timespan`) VALUES
(1, 122, 1, 1, '02/15/2019', '03/19/2019', 'Wireframe checker assign', 120, 0, 2, '', 1, '0000-00-00 00:00:00'),
(2, 27, 1, 2, '03/12/2019', '04/17/2019', 'Assing Daniyal Mockup', 120, 0, 2, '', 1, '0000-00-00 00:00:00'),
(3, 121, 1, 3, '03/30/2019', '05/20/2019', 'Prototype assing to waleed', 120, 0, 0, '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ch_id` int(191) NOT NULL,
  `p_id` int(191) NOT NULL,
  `u_id` int(191) NOT NULL,
  `s_id` int(191) DEFAULT NULL,
  `w_id` int(191) DEFAULT NULL,
  `m_id` int(191) DEFAULT NULL,
  `pr_id` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ch_id`, `p_id`, `u_id`, `s_id`, `w_id`, `m_id`, `pr_id`) VALUES
(1, 1, 120, NULL, 122, 27, 121);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(100) NOT NULL,
  `ch_id` int(100) NOT NULL,
  `u_seen` int(10) DEFAULT NULL,
  `s_seen` int(10) DEFAULT NULL,
  `w_seen` int(10) DEFAULT NULL,
  `m_seen` int(10) DEFAULT NULL,
  `pr_seen` int(10) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_by` int(10) NOT NULL,
  `message_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `ch_id`, `u_seen`, `s_seen`, `w_seen`, `m_seen`, `pr_seen`, `message_text`, `sent_by`, `message_time`) VALUES
(1, 1, 120, NULL, 122, 27, NULL, 'hello to every one', 120, '15-2-2019 6:55:23'),
(2, 1, NULL, NULL, 122, 27, NULL, 'hi.. waleed is here', 122, '15-2-2019 6:56:11'),
(3, 1, NULL, NULL, 122, 27, NULL, 'i have starte work on your wireframe', 122, '15-2-2019 6:56:22'),
(4, 1, NULL, NULL, NULL, 27, NULL, 'i have also', 27, '15-2-2019 7:0:13');

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
  `s_id` int(11) NOT NULL,
  `s_status` int(1) NOT NULL DEFAULT '0',
  `u_seen` int(1) NOT NULL DEFAULT '0',
  `p_active` int(1) NOT NULL DEFAULT '0',
  `timespan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`p_id`, `p_name`, `p_type`, `p_start`, `p_end`, `p_detail`, `u_id`, `s_id`, `s_status`, `u_seen`, `p_active`, `timespan`) VALUES
(1, 'first project', 'Music', '02/15/2019', '03/20/2019', 'first project creating', 120, 27, 0, 0, 0, '2019-02-15 02:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `prototype`
--

CREATE TABLE `prototype` (
  `pt_id` int(191) NOT NULL,
  `act_id` int(191) NOT NULL,
  `act_open_name` varchar(191) NOT NULL,
  `act_open_id` int(191) NOT NULL,
  `act_button` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '1', '02/01/2019', '02/22/2019', 'first project task wireframe', 1),
(2, '2', '03/31/2019', '03/18/2019', 'first project task mockup', 1),
(3, '3', '10/18/2018', '11/12/2018', 'first project task prototype', 1);

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
(27, 'daniyal', 'hussain', 'daniyal', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
(120, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
(121, 'Waleed', 'Ali', 'waleed', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
(122, 'checker', 'pro', 'checker', '21232f297a57a5a743894a0e4a801fc3', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `prototype`
--
ALTER TABLE `prototype`
  ADD PRIMARY KEY (`pt_id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `act_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ch_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prototype`
--
ALTER TABLE `prototype`
  MODIFY `pt_id` int(191) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
