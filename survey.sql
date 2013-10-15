-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2013 at 10:45 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--
CREATE DATABASE IF NOT EXISTS `survey` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `survey`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `u_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `opt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`u_id`, `q_id`, `opt_id`) VALUES
(123, 1, 1),
(123, 2, 2),
(123, 1, 0),
(123, 2, 0),
(123, 1, 1),
(123, 2, 0),
(123, 1, 1),
(123, 2, 2),
(123, 1, 1),
(123, 2, 2),
(123, 2, 2),
(123, 1, 1),
(123, 1, 1),
(123, 2, 2),
(123, 1, 1),
(123, 1, 1),
(123, 2, 2),
(123, 1, 0),
(123, 2, 2),
(123, 1, 1),
(123, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `options` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `options`) VALUES
(1, 'What kind of person is Andy?', '["Sick","Asshole"]'),
(2, 'Smoking is?', '["wow","Hmm","DJ & C"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `link` text NOT NULL,
  `username` text NOT NULL,
  `gender` text NOT NULL,
  `locale` text NOT NULL,
  `updated_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fbid`, `name`, `first_name`, `last_name`, `link`, `username`, `gender`, `locale`, `updated_time`) VALUES
(1, '12312412412', 'Bhavesh Bhide', 'Bhavesh', 'Bhide', 'http://www.facebook.com/bhavesh.bhide', 'bhavesh.bhide', 'Male', 'en_US', '2013-10-13T08:22:03+0000'),
(2, '1163687666', 'Bhavesh Bhide', 'Bhavesh', 'Bhide', 'http://www.facebook.com/bhavesh.bhide', 'bhavesh.bhide', 'male', 'en_US', '2013-10-13T08:22:03+0000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
