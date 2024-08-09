-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 11:32 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sr_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL,
  `AdminPass` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminEmail`, `AdminPass`) VALUES
(1, 'Admin', 'admin@onlineittuts.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `ID` int(11) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `UName` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`ID`, `Img`, `FName`, `LName`, `UName`, `DOB`, `Gender`, `Email`, `Password`, `Date`) VALUES
(1, 'How-to-Build-an-Email-List-Using-Facebook-Tutorial-in-Urdu.jpg', 'Asif', 'Ali', 'ProgrammerAsif', '05/02/1995', 'Male', 'asifjokhio786@hotmail.com', '$2y$10$kYPTXJLs3JMONHHomkVlLeyu1jYFr5.NFeYfzYphquFn8E6ea2mvm', '23/05/2018'),
(2, 'How-to-Make-Validation-Form-in-Javascript.png', 'Sofia', 'Sofia', 'SofiaSahil', '03/03/1993', 'Female', 'sofia@gmail.com', '$2y$10$ofeV4vV0itag9Ot3NckQ0e6AS7/wHw.26DHHLY8LQUerYK6TqdVju', '24/05/2018'),
(3, 'How-to-Install-Android-Studio-with-Java-JREJDK-8-on-Microsoft-Window.jpg', 'Zahid', 'Hussain', 'ZahidHussain', '03/03/1999', 'Male', 'zahidbhai@gmail.com', '$2y$10$hsfpBsFs8JDDkP7Yc.SgRO8BrWyfZIFBbU221sF1D6NT9/Kc3Tcpa', '03/06/2018'),
(5, 'How to Migrate Wordpress Site to New Host.png', 'Abdul', 'Rehman', 'abdulrehman', '03/05/1992', 'Male', 'abdulrehman@gmail.com', '$2y$10$IloV.AducC/QCNg7cYUNoOooQL1PP1hfyDMFeTuTDFK.Ran5yfWTG', '03/06/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
