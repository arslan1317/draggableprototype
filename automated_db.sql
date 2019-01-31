-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2019 at 10:39 PM
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
  `first_act` longtext,
  `act_xml` longtext NOT NULL,
  `p_id` int(11) NOT NULL,
  `t_type` int(11) NOT NULL,
  `done_by_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_id`, `act_name`, `act_code`, `first_act`, `act_xml`, `p_id`, `t_type`, `done_by_id`) VALUES
(6, 'main activity', '<p id=\"image_1\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 100.547px; left: 78.4375px; padding: 4px; border: 0px; width: 107px; height: 89px;\"><img src=\"https://cdn.pixabay.com/photo/2012/04/10/23/56/cross-27168_1280.png\" style=\"width:-webkit-fill-available;height:100% !important\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><p id=\"Button_1\" class=\"border-on-icon ui-draggable-handle ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 407.547px; left: 92.3125px; padding: 4px; border: 0px; width: 95px; height: 36px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><div class=\"ui-resizable-handle ui-resizable-e\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-s\" style=\"z-index: 90;\"></div><div class=\"ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se\" style=\"z-index: 90;\"></div><p class=\"ui-draggable ui-draggable-handle\" style=\"position: relative;\"></p><p id=\"text_view_1\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 38px; left: 81.3594px; width: 102px; height: 32px;\">Text</p><p id=\"edit_text_1\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 267px; left: 35.3906px; padding: 4px; border: 0px; width: 190px; height: 46px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p>', '6', '', 16, 1, 27),
(7, 'login activity', '<p id=\"edit_text_1\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 267px; left: 28.375px; padding: 4px; border: 0px; width: 199px; height: 37px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"edit_text_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 310px; left: 26.3906px; padding: 4px; border: 0px; width: 205px; height: 40px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_1\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 358px; left: 29.4219px; padding: 4px; border: 0px; width: 100px; height: 35px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><p id=\"Button_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 359px; left: 136.422px; padding: 4px; border: 0px; width: 92px; height: 36px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><p id=\"text_view_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 76px; left: 103.359px;\">Text</p>', '6', '', 16, 1, 27),
(8, 'register activity', '<p id=\"text_view_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 79px; left: 104.359px; width: 49px; height: 30px;\">Text</p><p id=\"edit_text_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 217px; left: 40.3906px; padding: 4px; border: 0px; width: 182px; height: 40px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"edit_text_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 264px; left: 42.3906px; padding: 4px; border: 0px; width: 180px; height: 40px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"edit_text_5\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 315px; left: 43.3906px; padding: 4px; border: 0px; width: 177px; height: 40px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 366px; left: 46.4219px; padding: 4px; border: 0px; width: 87px; height: 34px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><p id=\"Button_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 366px; left: 138.422px; padding: 4px; border: 0px; width: 84px; height: 34px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', '6', '', 16, 1, 27),
(9, 'dashboard activity', '', '6', '', 16, 1, 27),
(11, 'main activity', '<p id=\"text_view_2\" class=\"border-on-icon ui-draggable-handle item ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 60px; left: 101.359px; width: 53px; height: 30px;\">Text</p><p id=\"edit_text_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 220px; left: 12px; padding: 4px; border: 0px; width: 230px; height: 44px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"edit_text_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 274px; left: 12px; padding: 4px; border: 0px; width: 230px; height: 44px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_3\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 340px; left: 12px; padding: 4px; border: 0px; width: 110px; height: 44px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><p id=\"Button_4\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 340px; left: 130px; padding: 4px; border: 0px; width: 110px; height: 44px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', NULL, '', 18, 1, 122),
(12, 'login activity', '<p id=\"text_view_3\" class=\"border-on-icon ui-draggable-handle ui-draggable selected\" style=\"position: absolute; margin-bottom: 0px; top: 55px; left: 105.359px; width: 52px; height: 33px;\">Text</p><p id=\"text_view_4\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 168px; left: 17px; width: 70px;\">Text</p><p id=\"edit_text_5\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 200px; left: 12px; padding: 4px; border: 0px; width: 230px; height: 44px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"text_view_5\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 272px; left: 17px; width: 70px;\">Text</p><p id=\"edit_text_6\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 304px; left: 12px; padding: 4px; border: 0px; width: 230px; height: 44px;\"><input type=\"text\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_5\" class=\"border-on-icon ui-draggable-handle ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 370px; left: 12px; padding: 4px; border: 0px; width: 110px; height: 44px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p><p id=\"Button_6\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 370px; left: 130px; padding: 4px; border: 0px; width: 110px; height: 44px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', NULL, '', 18, 1, 122),
(13, 'profile activity', '<p id=\"image_1\" class=\"border-on-icon ui-draggable-handle item ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 140px; left: 42px; padding: 4px; border: 0px; width: 170px; height: 146px;\"><img src=\"http://localhost:8080/draggableprototype/assets/images/image.png\" style=\"width:-webkit-fill-available;height:100% !important\"></p><p id=\"Button_7\" class=\"border-on-icon ui-draggable-handle item selected ui-draggable\" style=\"position: absolute; margin-bottom: 0px; top: 0px; left: 0px; padding: 4px; border: 0px; width: 80px; height: 44px;\"><input type=\"button\" style=\"width:-webkit-fill-available;height:100% !important\" value=\"Button\"></p>', NULL, '', 18, 1, 122);

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
(2, 27, 16, 4, '10/19/2018', '11/30/2018', 'Assign you the wireframe of uber', 120, 0, 1, '', 1, '0000-00-00 00:00:00'),
(3, 121, 16, 5, '12/04/2018', '01/04/2019', 'Just make It Color Full as you like', 120, 0, 3, '', 1, '0000-00-00 00:00:00'),
(4, 122, 16, 9, '01/26/2019', '02/06/2019', 'Assign the prototype to the checker', 120, 0, 1, '', 1, '0000-00-00 00:00:00'),
(6, 27, 17, 10, '01/28/2019', '02/28/2019', 'Checker assign wireframe', 120, 0, 0, '', 0, '0000-00-00 00:00:00'),
(7, 122, 17, 11, '01/31/2019', '02/28/2019', 'assing checker mockup', 120, 0, 0, '', 1, '0000-00-00 00:00:00'),
(8, 121, 17, 12, '02/22/2019', '03/30/2019', 'protoype checker assign', 120, 0, 0, '', 1, '0000-00-00 00:00:00'),
(9, 122, 18, 15, '01/31/2019', '02/28/2019', 'new project assign to checker', 120, 0, 2, '', 1, '0000-00-00 00:00:00'),
(10, 27, 18, 16, '02/28/2019', '03/31/2019', 'new project mockup assign to daniyal', 120, 0, 0, '', 1, '0000-00-00 00:00:00'),
(11, 121, 18, 17, '02/28/2019', '03/31/2019', 'new project prototype assign to checker', 120, 0, 0, '', 0, '0000-00-00 00:00:00');

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
(1, 18, 120, NULL, 122, NULL, NULL),
(3, 17, 120, NULL, 122, 27, NULL);

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
(16, 'Uber', 'Pick & Drop', '10/01/2018', '11/30/2018', 'Make friendly Application', 120, 27, 0, 0, 0, NULL),
(17, 'Checker', 'Pick & Drop', '01/28/2019', '05/31/2019', 'checker project details', 120, 27, 0, 0, 0, '2019-01-26 21:57:39'),
(18, 'new project', 'Music', '01/31/2019', '02/28/2019', 'new project', 120, 27, 0, 0, 0, '2019-01-31 19:05:12');

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

--
-- Dumping data for table `prototype`
--

INSERT INTO `prototype` (`pt_id`, `act_id`, `act_open_name`, `act_open_id`, `act_button`) VALUES
(1, 6, 'login activity', 7, 'Button_1'),
(2, 7, 'register activity', 8, 'Button_1'),
(3, 7, 'dashboard activity', 9, 'Button_2');

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
(5, '2', '10/19/2018', '11/14/2018', 'Make Mockup of Uber', 16),
(6, '1', '10/20/2018', '11/21/2018', 'Wireframe is added on behalf of daniyal project testing', 20),
(7, '2', '10/25/2018', '11/19/2018', 'Mockup Task', 20),
(8, '3', '11/28/2018', '12/31/2018', 'Prototype Daniyal Project Testing Testing', 20),
(9, '3', '02/01/2019', '03/31/2019', 'Assign the prototype', 16),
(10, '1', '01/27/2019', '01/31/2019', 'checker wireframe task creaeted', 17),
(11, '2', '01/30/2019', '02/27/2019', 'create checker mokcups', 17),
(12, '3', '02/26/2019', '03/30/2019', 'checker prototype create', 17),
(15, '1', '01/31/2019', '02/28/2019', 'new project wireframe created', 18),
(16, '2', '02/28/2019', '03/31/2019', 'new project mockup created', 18),
(17, '3', '03/31/2019', '04/30/2019', 'new project prototype is create', 18);

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
  MODIFY `act_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ch_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `prototype`
--
ALTER TABLE `prototype`
  MODIFY `pt_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
