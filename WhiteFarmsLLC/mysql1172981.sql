-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: psychotiic2012.ps.funpicsql.de
-- Generation Time: Dec 07, 2013 at 11:28 PM
-- Server version: 5.1.72
-- PHP Version: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysql1172981`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `booter_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`booter_name`) VALUES
('Your Booter');

-- --------------------------------------------------------

--
-- Table structure for table `getshells`
--

CREATE TABLE IF NOT EXISTS `getshells` (
  `URL` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `getshells`
--

INSERT INTO `getshells` (`URL`) VALUES
('http://psychotiic2012.funpic.de/myStuff/phpShell.php');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `username` text NOT NULL,
  `ip` text NOT NULL,
  `time` text NOT NULL,
  `port` text NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(1000) NOT NULL,
  `author` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `message`, `date`, `author`) VALUES
(1, 'Hello HackForums!', 'This is prodigy, testing my booters news system!', '01-26-2011, 02:36:04 pm', 'Test3');

-- --------------------------------------------------------

--
-- Table structure for table `postshells`
--

CREATE TABLE IF NOT EXISTS `postshells` (
  `URL` varchar(9001) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postshells`
--

INSERT INTO `postshells` (`URL`) VALUES
('http://psychotiic2012.funpic.de/myStuff/tcpShell.php');

-- --------------------------------------------------------

--
-- Table structure for table `slowloris`
--

CREATE TABLE IF NOT EXISTS `slowloris` (
  `URL` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slowloris`
--


-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `updates`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'david', 'test'),
(5, 'test', 'test'),
(6, '1234', '1234'),
(7, 'amber', 'desiree'),
(8, 'amberdavid', 'test'),
(9, 'nrd', 'test'),
(10, 'awhite', 'desiree'),
(11, 'lisa', 'test'),
(12, 'TestCustomer', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `md5_id` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `full_name` tinytext COLLATE latin1_general_ci NOT NULL,
  `user_name` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_email` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_level` tinyint(4) NOT NULL DEFAULT '1',
  `pwd` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `address` text COLLATE latin1_general_ci NOT NULL,
  `country` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tel` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fax` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `website` text COLLATE latin1_general_ci NOT NULL,
  `date` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `users_ip` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `approved` int(1) NOT NULL DEFAULT '0',
  `activation_code` int(10) NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `ckey` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ctime` varchar(220) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `myAttacks` varchar(5000) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`),
  FULLTEXT KEY `idx_search` (`full_name`,`address`,`user_email`,`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `md5_id`, `full_name`, `user_name`, `user_email`, `user_level`, `pwd`, `address`, `country`, `tel`, `fax`, `website`, `date`, `users_ip`, `approved`, `activation_code`, `banned`, `ckey`, `ctime`, `myAttacks`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'david', 'psychotiic', 'ohdaddie@hotmail.com', 5, '86f885c349fc11d9fd0ea5db9f25f1e7e939bb29bae27d776', '', '', '', '', '', '12-07-2013, 06:41:44 pm', '108.195.137.132', 1, 8452, 0, '', '', '0'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'Ben Brophy', 'benbrophy', 'benjamin.d.brophy@wmich.edu', 1, '87c43709bcd232cb64dad8daa585db07e8d22a638019d9ce1', '', '', '', '', '', '12-07-2013, 08:54:43 pm', '108.195.137.132', 1, 1547, 0, '', '', '0'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Tim Cunningham', 'timcunningham', 'timothy.p.cunningham@wmich.edu', 1, '9e11b339c8b4a007437fb962f345e708a93050cee9fb6fc6b', '', '', '', '', '', '12-07-2013, 08:55:16 pm', '108.195.137.132', 1, 8477, 0, '', '', '0');
