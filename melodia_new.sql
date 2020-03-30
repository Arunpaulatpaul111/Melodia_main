-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2020 at 02:38 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melodia_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

DROP TABLE IF EXISTS `tbl_account`;
CREATE TABLE IF NOT EXISTS `tbl_account` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `cardNumber` bigint(20) NOT NULL,
  `cardHolder` varchar(20) NOT NULL,
  `cvv` int(11) NOT NULL,
  `expiry` varchar(10) NOT NULL,
  `balance` bigint(30) NOT NULL,
  `otp` int(11) NOT NULL DEFAULT '0',
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`ac_id`, `cardNumber`, `cardHolder`, `cvv`, `expiry`, `balance`, `otp`, `dStatus`) VALUES
(1, 8888777766665555, 'Admin', 888, '2023-05', 11500, 0, 0),
(2, 5555666677778888, 'Student', 555, '2023-05', 70400, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

DROP TABLE IF EXISTS `tbl_attendance`;
CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `instru_id` int(11) NOT NULL,
  `aDate` date NOT NULL,
  `batch_id` int(11) NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`a_id`),
  KEY `stId` (`s_id`),
  KEY `instId` (`instru_id`),
  KEY `batchId` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`a_id`, `s_id`, `instru_id`, `aDate`, `batch_id`, `dStatus`) VALUES
(1, 1, 1, '2020-03-08', 2, 0),
(2, 1, 1, '2020-03-01', 2, 0),
(4, 3, 1, '2020-03-11', 1, 0),
(5, 3, 1, '2020-03-09', 1, 0),
(6, 4, 1, '2020-03-09', 1, 0),
(8, 1, 1, '2020-03-15', 2, 0),
(10, 4, 1, '2020-03-13', 1, 0),
(11, 1, 1, '2020-03-14', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendancehistory`
--

DROP TABLE IF EXISTS `tbl_attendancehistory`;
CREATE TABLE IF NOT EXISTS `tbl_attendancehistory` (
  `a_hid` int(11) NOT NULL AUTO_INCREMENT,
  `eDate` date NOT NULL,
  PRIMARY KEY (`a_hid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendancehistory`
--

INSERT INTO `tbl_attendancehistory` (`a_hid`, `eDate`) VALUES
(1, '2020-03-14'),
(2, '2020-03-11'),
(3, '2020-03-09'),
(4, '2020-03-18'),
(5, '2020-03-15'),
(6, '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facincharge`
--

DROP TABLE IF EXISTS `tbl_facincharge`;
CREATE TABLE IF NOT EXISTS `tbl_facincharge` (
  `incharge_id` int(6) NOT NULL AUTO_INCREMENT,
  `instru_id` int(11) NOT NULL,
  `fac_id` int(11) NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`incharge_id`),
  KEY `insId` (`instru_id`),
  KEY `fId` (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_facincharge`
--

INSERT INTO `tbl_facincharge` (`incharge_id`, `instru_id`, `fac_id`, `dStatus`) VALUES
(1, 1, 3, 0),
(2, 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_facleave`
--

DROP TABLE IF EXISTS `tbl_facleave`;
CREATE TABLE IF NOT EXISTS `tbl_facleave` (
  `fl_id` int(6) NOT NULL AUTO_INCREMENT,
  `fac_id` int(6) NOT NULL,
  `flDate` date NOT NULL,
  `flReason` varchar(30) NOT NULL,
  `flStatus` int(6) NOT NULL DEFAULT '0',
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fl_id`),
  KEY `fac_id` (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_facleave`
--

INSERT INTO `tbl_facleave` (`fl_id`, `fac_id`, `flDate`, `flReason`, `flStatus`, `dStatus`) VALUES
(1, 4, '2020-02-18', 'medical', 1, 0),
(2, 3, '2020-02-29', 'Medical', 2, 0),
(3, 3, '2020-02-29', 'Medical', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `fac_id` int(6) NOT NULL AUTO_INCREMENT,
  `login_id` int(6) NOT NULL,
  `facName` varchar(20) NOT NULL,
  `facContact` bigint(12) NOT NULL,
  `facDob` date NOT NULL,
  `facGender` varchar(10) NOT NULL,
  `facQualification` varchar(40) NOT NULL,
  `facAddress` varchar(30) NOT NULL,
  `facDistrict` varchar(30) NOT NULL,
  `facCity` varchar(30) NOT NULL,
  `facPin` int(10) NOT NULL,
  `dStatus` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fac_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`fac_id`, `login_id`, `facName`, `facContact`, `facDob`, `facGender`, `facQualification`, `facAddress`, `facDistrict`, `facCity`, `facPin`, `dStatus`) VALUES
(3, 190, 'Arun M', 8592095528, '2019-08-29', 'Male', 'Guithar Trinity certified', 'Madathilparambil House', 'Wayanad dist', 'Mananthavady', 670731, 0),
(4, 192, 'Melvin', 8592095528, '2020-02-11', 'Male', 'Violin Trinity certified', 'Madathilparambil House', 'Wayanad', 'Mananthavady', 670731, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruments`
--

DROP TABLE IF EXISTS `tbl_instruments`;
CREATE TABLE IF NOT EXISTS `tbl_instruments` (
  `instru_id` int(6) NOT NULL AUTO_INCREMENT,
  `instruName` varchar(20) NOT NULL,
  `instruFee` bigint(20) NOT NULL,
  `dStatus` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`instru_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instruments`
--

INSERT INTO `tbl_instruments` (`instru_id`, `instruName`, `instruFee`, `dStatus`) VALUES
(1, 'Guithar', 1000, 0),
(2, 'Violin', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `utype_id` int(6) NOT NULL DEFAULT '3',
  `forgotStatus` int(11) NOT NULL DEFAULT '0',
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login_id`),
  KEY `tbl_login` (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `Email`, `password`, `utype_id`, `forgotStatus`, `dStatus`) VALUES
(1, 'getarunsaju@gmail.com', '2a4852058dc822f24fbfc014bd25a0f1', 1, 0, 0),
(189, 'arun@gmail.com', '2a4852058dc822f24fbfc014bd25a0f1', 3, 0, 0),
(190, 'arunm@gmail.com', '2a4852058dc822f24fbfc014bd25a0f1', 2, 0, 0),
(192, 'melvin@gmail.com', 'be880e96dfc68d02fe310e5d33150711', 2, 0, 0),
(193, 'aleena@gmail.com', '2a4852058dc822f24fbfc014bd25a0f1', 3, 0, 0),
(194, 'ashbin@gmail.com', '929454a9de1edb0966a5aaf921490294', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_morningschedule`
--

DROP TABLE IF EXISTS `tbl_morningschedule`;
CREATE TABLE IF NOT EXISTS `tbl_morningschedule` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `msDay` varchar(20) NOT NULL,
  `instru_id` int(6) NOT NULL,
  `msTime` time NOT NULL,
  `dStatus` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_morningschedule`
--

INSERT INTO `tbl_morningschedule` (`ms_id`, `msDay`, `instru_id`, `msTime`, `dStatus`) VALUES
(1, 'Monday', 1, '06:00:00', 0),
(2, 'Tuesday', 1, '06:00:00', 0),
(3, 'Wednesday', 2, '06:00:00', 0),
(4, 'Thursday', 2, '06:00:00', 0),
(5, 'Friday', 3, '06:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `feeAmount` int(11) NOT NULL,
  `gDate` date NOT NULL,
  `pDate` date DEFAULT NULL,
  `pStatus` int(11) NOT NULL DEFAULT '0',
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`p_id`),
  KEY `sp_id` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`p_id`, `s_id`, `feeAmount`, `gDate`, `pDate`, `pStatus`, `dStatus`) VALUES
(31, 1, 1500, '2020-03-04', '2020-03-06', 1, 0),
(32, 3, 1000, '2020-03-04', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portionstatus`
--

DROP TABLE IF EXISTS `tbl_portionstatus`;
CREATE TABLE IF NOT EXISTS `tbl_portionstatus` (
  `ps_id` int(6) NOT NULL AUTO_INCREMENT,
  `instru_id` int(6) NOT NULL,
  `psDate` date NOT NULL,
  `psSchedule` int(11) NOT NULL,
  `psDetails` varchar(50) NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ps_id`),
  KEY `psInstruId` (`instru_id`),
  KEY `pdBatchId` (`psSchedule`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_portionstatus`
--

INSERT INTO `tbl_portionstatus` (`ps_id`, `instru_id`, `psDate`, `psSchedule`, `psDetails`, `dStatus`) VALUES
(11, 1, '2020-03-01', 2, 'sssss', 0),
(12, 1, '2020-03-02', 1, 'ssss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

DROP TABLE IF EXISTS `tbl_profile`;
CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) NOT NULL,
  `proImage` varchar(100) NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pro_id`),
  KEY `login` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`pro_id`, `login_id`, `proImage`, `dStatus`) VALUES
(3, 189, 'stock-vector-archangel-michael-tattoo-logo-highly-customizable-1187078128.jpg', 0),
(4, 189, 'gloriya-miss.png', 0),
(5, 189, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(6, 189, 'gloriya-miss.png', 0),
(7, 190, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(8, 190, 'stock-vector-archangel-michael-tattoo-logo-highly-customizable-1187078128.jpg', 0),
(9, 190, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(10, 193, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(11, 193, 'stock-vector-archangel-michael-tattoo-logo-highly-customizable-1187078128.jpg', 0),
(12, 190, 'gloriya-miss.png', 0),
(13, 190, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(14, 190, 'gloriya-miss.png', 0),
(15, 190, 'stock-vector-archangel-michael-tattoo-logo-highly-customizable-1187078128.jpg', 0),
(16, 189, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0),
(17, 190, 'Screenshot_2019-08-23-10-21-19-808_com.instagram.android.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_punching`
--

DROP TABLE IF EXISTS `tbl_punching`;
CREATE TABLE IF NOT EXISTS `tbl_punching` (
  `punch_id` int(6) NOT NULL AUTO_INCREMENT,
  `punch_date` date NOT NULL,
  `fac_id` int(6) NOT NULL,
  `instru_id` int(6) NOT NULL,
  PRIMARY KEY (`punch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regcourse`
--

DROP TABLE IF EXISTS `tbl_regcourse`;
CREATE TABLE IF NOT EXISTS `tbl_regcourse` (
  `reg_id` int(6) NOT NULL AUTO_INCREMENT,
  `s_id` int(6) NOT NULL,
  `instru_id` int(6) NOT NULL,
  `batch_id` int(6) NOT NULL,
  `regDate` date NOT NULL,
  `regApprove` date DEFAULT NULL,
  `regStatus` int(6) NOT NULL DEFAULT '0',
  `dStatus` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg_id`),
  KEY `sId` (`s_id`),
  KEY `instru_id` (`instru_id`),
  KEY `batch_id` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regcourse`
--

INSERT INTO `tbl_regcourse` (`reg_id`, `s_id`, `instru_id`, `batch_id`, `regDate`, `regApprove`, `regStatus`, `dStatus`) VALUES
(1, 1, 1, 2, '2020-03-04', '2020-03-04', 1, 0),
(3, 3, 1, 1, '2020-03-04', '2020-03-04', 1, 0),
(4, 3, 2, 2, '2020-03-04', '2020-03-04', 1, 0),
(6, 4, 1, 1, '2020-03-05', '2020-03-05', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

DROP TABLE IF EXISTS `tbl_schedule`;
CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `batch_id` int(6) NOT NULL AUTO_INCREMENT,
  `batchName` varchar(20) NOT NULL,
  `batchTime` text NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`batch_id`, `batchName`, `batchTime`, `dStatus`) VALUES
(1, 'Evening Schedule', '6.00 PM', 0),
(2, 'Weekend Schedule', '2.00 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentdetails`
--

DROP TABLE IF EXISTS `tbl_studentdetails`;
CREATE TABLE IF NOT EXISTS `tbl_studentdetails` (
  `s_id` int(6) NOT NULL AUTO_INCREMENT,
  `login_id` int(6) NOT NULL,
  `sName` varchar(20) NOT NULL,
  `sContact` bigint(12) NOT NULL,
  `sDob` date NOT NULL,
  `sGender` varchar(10) NOT NULL,
  `sFather` varchar(20) NOT NULL,
  `sMother` varchar(20) NOT NULL,
  `sAddress` varchar(30) NOT NULL,
  `sDistrict` varchar(20) NOT NULL,
  `sCity` varchar(20) NOT NULL,
  `sPin` int(11) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `dStatus` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`s_id`),
  KEY `dlogin_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentdetails`
--

INSERT INTO `tbl_studentdetails` (`s_id`, `login_id`, `sName`, `sContact`, `sDob`, `sGender`, `sFather`, `sMother`, `sAddress`, `sDistrict`, `sCity`, `sPin`, `contact`, `dStatus`) VALUES
(1, 189, 'Arun M', 8592095528, '1995-01-09', 'male', 'Saju M M', 'Lissy Saju', 'Madathilparambil House', 'Wayanad', 'Mananthavady', 670731, 8592095528, 0),
(3, 193, 'Aleena Joshy', 8592095528, '1995-12-09', 'Female', 'Joshy Joseph', 'Shiji Joshy', 'Muthiyaparayil House', 'Kottayam', 'Ponkunnam', 670731, 9847899029, 0),
(4, 194, 'ashbin', 9496316965, '1998-06-27', 'Female', 'monichan', 'beena', 'jfshghg', 'Wayanad', 'Mananthavady', 670731, 9847899029, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentleave`
--

DROP TABLE IF EXISTS `tbl_studentleave`;
CREATE TABLE IF NOT EXISTS `tbl_studentleave` (
  `sl_id` int(6) NOT NULL AUTO_INCREMENT,
  `s_id` int(6) NOT NULL,
  `instru_id` int(6) NOT NULL,
  `sl_date` date NOT NULL,
  `sl_reason` varchar(30) NOT NULL,
  `sl_status` int(11) NOT NULL DEFAULT '0',
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl_id`),
  KEY `s_id` (`s_id`),
  KEY `instruId` (`instru_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentleave`
--

INSERT INTO `tbl_studentleave` (`sl_id`, `s_id`, `instru_id`, `sl_date`, `sl_reason`, `sl_status`, `dStatus`) VALUES
(1, 1, 1, '2020-02-18', 'Medical', 2, 0),
(2, 3, 1, '2020-02-26', 'Medical', 2, 0),
(3, 1, 1, '2020-03-05', 'Medical', 2, 0),
(4, 1, 1, '2020-03-24', 'Medical', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

DROP TABLE IF EXISTS `tbl_transactions`;
CREATE TABLE IF NOT EXISTS `tbl_transactions` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `tDebit` int(20) NOT NULL DEFAULT '0',
  `tCredit` int(20) NOT NULL DEFAULT '0',
  `tDate` date NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`t_id`),
  KEY `ats_id` (`s_id`),
  KEY `tac_id` (`ac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`t_id`, `s_id`, `ac_id`, `tDebit`, `tCredit`, `tDate`, `dStatus`) VALUES
(1, 1, 2, 2000, 0, '2020-02-24', 0),
(2, 1, 2, 200, 0, '2020-02-24', 0),
(3, 1, 2, 2000, 0, '2020-02-24', 0),
(4, 1, 2, 2000, 0, '2020-02-24', 0),
(5, 1, 2, 2000, 0, '2020-02-24', 0),
(6, 1, 2, 2000, 0, '2020-02-24', 0),
(7, 1, 2, 2000, 0, '2020-02-25', 0),
(8, 1, 2, 2000, 0, '2020-02-25', 0),
(9, 1, 2, 2000, 0, '2020-02-25', 0),
(10, 1, 2, 2000, 0, '2020-02-27', 0),
(11, 1, 2, 2000, 0, '2020-02-27', 0),
(12, 1, 2, 2000, 0, '2020-02-27', 0),
(13, 1, 2, 2000, 0, '2020-02-28', 0),
(14, 1, 2, 2000, 0, '2020-03-03', 0),
(15, 1, 2, 200, 0, '2020-03-03', 0),
(16, 1, 2, 200, 0, '2020-03-03', 0),
(17, 1, 2, 1500, 0, '2020-03-05', 0),
(18, 1, 2, 1500, 0, '2020-03-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertypes`
--

DROP TABLE IF EXISTS `tbl_usertypes`;
CREATE TABLE IF NOT EXISTS `tbl_usertypes` (
  `utype_id` int(6) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `dStatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`utype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertypes`
--

INSERT INTO `tbl_usertypes` (`utype_id`, `usertype`, `dStatus`) VALUES
(1, 'admin', 0),
(2, 'faculty', 0),
(3, 'student', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `batchId` FOREIGN KEY (`batch_id`) REFERENCES `tbl_schedule` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instId` FOREIGN KEY (`instru_id`) REFERENCES `tbl_instruments` (`instru_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stId` FOREIGN KEY (`s_id`) REFERENCES `tbl_studentdetails` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_facincharge`
--
ALTER TABLE `tbl_facincharge`
  ADD CONSTRAINT `fId` FOREIGN KEY (`fac_id`) REFERENCES `tbl_faculty` (`fac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insId` FOREIGN KEY (`instru_id`) REFERENCES `tbl_instruments` (`instru_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_facleave`
--
ALTER TABLE `tbl_facleave`
  ADD CONSTRAINT `fac_id` FOREIGN KEY (`fac_id`) REFERENCES `tbl_faculty` (`fac_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD CONSTRAINT `login_id` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login` FOREIGN KEY (`utype_id`) REFERENCES `tbl_usertypes` (`utype_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `sp_id` FOREIGN KEY (`s_id`) REFERENCES `tbl_studentdetails` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_portionstatus`
--
ALTER TABLE `tbl_portionstatus`
  ADD CONSTRAINT `pdBatchId` FOREIGN KEY (`psSchedule`) REFERENCES `tbl_schedule` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `psInstruId` FOREIGN KEY (`instru_id`) REFERENCES `tbl_instruments` (`instru_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD CONSTRAINT `login` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_regcourse`
--
ALTER TABLE `tbl_regcourse`
  ADD CONSTRAINT `batch_id` FOREIGN KEY (`batch_id`) REFERENCES `tbl_schedule` (`batch_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `instru_id` FOREIGN KEY (`instru_id`) REFERENCES `tbl_instruments` (`instru_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sId` FOREIGN KEY (`s_id`) REFERENCES `tbl_studentdetails` (`s_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_studentdetails`
--
ALTER TABLE `tbl_studentdetails`
  ADD CONSTRAINT `dlogin_id` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_studentleave`
--
ALTER TABLE `tbl_studentleave`
  ADD CONSTRAINT `instruId` FOREIGN KEY (`instru_id`) REFERENCES `tbl_instruments` (`instru_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `tbl_studentdetails` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD CONSTRAINT `ats_id` FOREIGN KEY (`s_id`) REFERENCES `tbl_studentdetails` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tac_id` FOREIGN KEY (`ac_id`) REFERENCES `tbl_account` (`ac_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
