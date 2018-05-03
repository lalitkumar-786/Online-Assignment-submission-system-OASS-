-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 10:37 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oass`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `course_id` varchar(200) NOT NULL,
  `ass_id` int(10) NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ass_name` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `assignment_url` varchar(255) NOT NULL,
  `submission_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`course_id`, `ass_id`, `deadline`, `posted_time`, `ass_name`, `filename`, `assignment_url`, `submission_url`) VALUES
('cs621', 43, '2018-05-23 16:34:54', '2018-04-28 22:04:54', 'fad', 'oass_r.sql', 'assignment', 'submitted'),
('cs621', 44, '2018-04-23 06:24:57', '2018-04-29 11:54:57', 'gsn', 'oass(3).sql', 'ass', 'sub'),
('cs621', 45, '2018-04-30 06:26:50', '2018-04-29 11:56:50', 'jfjaff', 'oass(3).sql', 'ass', 'sub'),
('cs608', 46, '2018-05-09 06:35:39', '2018-04-29 12:05:39', 'gak', '20171208-130326_p2.jpg', 'asss', 's'),
('cs621', 47, '2018-05-25 10:48:11', '2018-04-29 16:18:11', 'HelloWorld', 'ranjeet.pdf', 'assignment_1', 'submitted_1'),
('cs304', 48, '2018-05-16 04:28:47', '2018-05-01 09:58:47', 'HELLO', 'oass(3).sql', 'HEELOA', 'HELLOS'),
('cs608', 49, '2018-05-16 23:39:56', '2018-05-02 05:09:56', 'helo', 'oass(3).sql', 'assignment', 'qwer');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_taken`
--

CREATE TABLE `course_taken` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(20) DEFAULT NULL,
  `faculty_email_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_taken`
--

INSERT INTO `course_taken` (`course_id`, `course_name`, `faculty_email_id`) VALUES
('cs615', NULL, 'lalitkumar@iiitdmj.ac.in'),
('cs608', NULL, 'lalitkumar@iiitdmj.ac.in'),
('cs304', NULL, 'lalitkumar@iiitdmj.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in`
--

CREATE TABLE `enrolled_in` (
  `email_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in`
--

INSERT INTO `enrolled_in` (`email_id`, `course_id`) VALUES
('ranjeetkumaryadav@iiitdmj.ac.in', 'cs608');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `email_id`, `dept_name`) VALUES
('LALIT KUMAR', 'lalitkumar@iiitdmj.ac.in', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `ftp_data`
--

CREATE TABLE `ftp_data` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftp_data`
--

INSERT INTO `ftp_data` (`username`, `password`, `email_id`) VALUES
('lalitkumar', '894611157', 'a@a'),
('lalitkumar', '894611157', 'a@b'),
('lalitkumar', '894611157', 'lalitkumar@iiitdmj.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email_id` varchar(50) NOT NULL,
  `hasrole` int(10) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email_id`, `hasrole`, `passwd`) VALUES
('lalitkumar@iiitdmj.ac.in', 2, '12345'),
('ranjeetkumaryadav@iiitdmj.ac.in', 1, '12345'),
('admin@iiitdmj.ac.in', 3, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `email_id` varchar(255) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`email_id`, `ass_id`, `marks`, `flag`) VALUES
('ranjeetkumaryadav@iiitdmj.ac.in', 45, 14, 0),
('ranjeetkumaryadav@iiitdmj.ac.in', 43, 11, 0),
('ranjeetkumaryadav@iiitdmj.ac.in', 47, 10, 0),
('ranjeetkumaryadav@iiitdmj.ac.in', 48, 3, 0),
('ranjeetkumaryadav@iiitdmj.ac.in', 49, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(50) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `roll_no`, `dept_name`, `email_id`) VALUES
('Ranjeet Kumar', 2014135, 'CSE', 'ranjeetkumaryadav@iiitdmj.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
  `email_id` varchar(255) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `submitted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `original_filename` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`email_id`, `ass_id`, `submitted_time`, `original_filename`) VALUES
('ranjeetkumaryadav@iiitdmj.ac.in', 49, '2018-05-02 05:14:26', 'Assignment_1_CS621.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `email_id` varchar(255) NOT NULL,
  `course_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`email_id`, `course_id`) VALUES
('lalitkumar@iiitdmj.ac.in', 'cs608');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_taken`
--
ALTER TABLE `course_taken`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `ftp_data`
--
ALTER TABLE `ftp_data`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ass_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
