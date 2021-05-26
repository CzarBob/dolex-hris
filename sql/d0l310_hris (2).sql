-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 11:22 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d0l310_hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `PROCESS` int(5) NOT NULL,
  `RATING` int(1) NOT NULL,
  `FULLNAME` varchar(200) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `COMMENT` text NOT NULL,
  `DATEADDED` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CANCELLED` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `PROCESS`, `RATING`, `FULLNAME`, `EMAIL`, `COMMENT`, `DATEADDED`, `CANCELLED`) VALUES
(1, 0, 1, 'HANNA RHEA DOMO APARECIO', 'czarbobzambrano@gmail.com', 'ETST', '2020-05-28 12:20:53', 'N'),
(2, 0, 1, 'HANNA RHEA DOMO APARECIO3', 'mariabernajaney', 'hhdwk llwlf l', '2020-05-28 12:22:02', 'N'),
(3, 0, 5, '', '', '', '2020-05-28 12:44:23', 'N'),
(4, 0, 2, 'HANNA RHEA DOMO APARECIO', '', '4oo4', '2020-05-28 12:47:05', 'N'),
(5, 0, 1, 'BAM', '', '', '2020-05-28 14:10:22', 'N'),
(6, 0, 1, 'HANNA RHEA DOMO APARECIO', 'ming.javellana', 'TESTING', '2020-06-01 04:45:40', 'N'),
(7, 0, 3, 'HANNA RHEA DOMO APARECIO', '2', '4444', '2020-06-01 04:45:58', 'N'),
(8, 1020, 4, '123', 'marilethpiquero143@gmail.com', '21', '2020-06-01 04:47:02', 'N'),
(9, 1020, 2, 'HANNA RHEA DOMO APARECIO', 'czarbobzambrano@gmail.com', 'TESTED', '2020-06-19 05:05:16', 'N'),
(10, 1020, 2, 'CZAR', 'dole10.czarbobinzambrano@gmail.com', 'HHEHE', '2020-06-22 01:48:33', 'N'),
(11, 1, 1, '1231', '125', '214', '2020-06-22 01:52:04', 'N'),
(12, 1, 2, 'GHUUE', 'akgkk@gkai.cm', '123', '2020-06-29 03:49:09', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `FULLNAME` varchar(255) NOT NULL DEFAULT 'NULL',
  `CANCELLED` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`ID`, `NAME`, `FULLNAME`, `CANCELLED`) VALUES
(1, '1020', 'NULL', 'N'),
(2, '', 'NULL', ''),
(3, 'AEP', 'AEP', 'N'),
(4, 'AEP EXCLUSION', 'AEP EXCLUSION', 'N'),
(5, 'CBA', 'CBA', 'N'),
(6, 'CSHP', 'CSHP', 'N'),
(7, 'DO 174', 'DO 174', 'N'),
(8, 'LPA', 'LPA', 'N'),
(9, 'PEA_1', 'PEA_1', 'N'),
(10, 'PME_PEE', 'PME_PEE', 'N'),
(11, 'PNPC', 'PNPC', 'N'),
(12, 'PTO_CEI', 'PTO_CEI', 'N'),
(13, 'SPES', 'SPES', 'N'),
(14, 'SWDBC', 'SWDBC', 'N'),
(15, 'SWMBC', 'SWMBC', 'N'),
(16, 'UNION', 'UNION', 'N'),
(17, 'WA', 'WA', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE `tbl_division` (
  `ID` int(11) NOT NULL,
  `DIVISIONNAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `ID` int(5) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `MIDDLENAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `EXTENSION` varchar(2) NOT NULL,
  `EMPLOYEEID` varchar(10) NOT NULL,
  `POSITION` varchar(100) NOT NULL,
  `ADDRESS` varchar(250) NOT NULL,
  `DATEHIRED` date NOT NULL,
  `SLCREDIT` int(100) NOT NULL,
  `VLCREDIT` int(100) NOT NULL,
  `UPDATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `UPDATEDBY` char(3) NOT NULL,
  `CREATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `CREATEDBY` varchar(100) NOT NULL,
  `CANCELLED` char(2) NOT NULL,
  `CANCELLEDBY` char(3) NOT NULL,
  `CANCELLEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `ENABLED` char(2) NOT NULL,
  `FIELDOFFICEID` char(3) NOT NULL,
  `DIVISIONID` char(3) NOT NULL,
  `BUREAUID` char(3) NOT NULL,
  `UNITID` char(3) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`ID`, `FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `EXTENSION`, `EMPLOYEEID`, `POSITION`, `ADDRESS`, `DATEHIRED`, `SLCREDIT`, `VLCREDIT`, `UPDATEDDATETIME`, `UPDATEDBY`, `CREATEDDATETIME`, `CREATEDBY`, `CANCELLED`, `CANCELLEDBY`, `CANCELLEDDATETIME`, `ENABLED`, `FIELDOFFICEID`, `DIVISIONID`, `BUREAUID`, `UNITID`, `EMAIL`, `TYPE`, `USERNAME`, `PASSWORD`) VALUES
(1, 'CZAR', 'TEJANO', 'ZAMBRANO', '', 'CBTZ116200', 'ISA II', 'NHA KAUSWAGAN', '2020-01-06', 12, 12, '2021-02-09 08:30:59', '0', '2021-02-09 08:30:59', '', 'N', '0', '2021-02-09 08:30:59', 'Y', '1', '1', '1', '1', '', 'ADMIN', 'admin', '1234'),
(2, 'sdasd', 'hhh', 'asdasd', '', 'N', 'ds', '', '2021-02-10', 2, 3, '2021-02-12 12:40:35', '', '2021-02-12 12:40:35', '', 'N', '', '2021-02-12 12:40:35', '', '', '', '', '', 'aasd', '', '', ''),
(3, 'sdasd', 'ssdddd', 'asdasd', '', '323', '11', '', '0000-00-00', 0, 0, '2021-03-06 14:50:18', '', '2021-03-06 14:50:18', '', 'Y', '', '2021-03-06 14:50:18', '', '', '', '', '', 'X', '', '', ''),
(4, 'BOB', 'TEJ', 'ZAMBRAFF', '', '44444', 'X', '', '0000-00-00', 0, 0, '2021-03-28 04:44:16', '', '2021-03-28 04:44:16', '', 'Y', '1', '2021-05-25 03:30:47', '', '', '', '', '', 'X', '', '', ''),
(5, 'SAMPLE NAME', 'SAMPLE MID', 'EEF', '', 'SAMPLE1454', 'ISA II', '', '2021-04-20', 0, 0, '2021-05-25 08:22:23', '1', '2021-03-28 04:46:02', '', 'N', '', '2021-03-28 04:46:02', '', '', '', '', '', 'X', '', '', ''),
(6, 'BOBIN', 'TET', 'GARCIA', '', 'CBBSFW2951', 'X', '', '0000-00-00', 0, 0, '2021-04-17 04:22:15', '', '2021-04-17 04:22:15', '', 'Y', '', '2021-04-17 04:22:15', '', '', '', '', '', 'X', '', '', ''),
(7, 'TESt', 'TEST', 'TEST', '', 'TEST 1', 'X', '', '0000-00-00', 0, 0, '2021-04-17 05:18:51', '', '2021-04-17 05:18:51', '', 'Y', '', '2021-04-17 05:18:51', '', '', '', '', '', 'X', '', '', ''),
(8, 'CZAR', 'SAMPLE MID', 'ZAMPERT', '', 'HH', 'X', '', '0000-00-00', 0, 0, '2021-04-17 10:45:58', '', '2021-04-17 10:45:58', '', 'N', '', '2021-04-17 10:45:58', '', '', '', '', '', 'X', '', '', ''),
(9, 'GG', 'GGG', 'GGG', '', 'GGG', 'X', '', '0000-00-00', 0, 0, '2021-04-17 10:46:44', '', '2021-04-17 10:46:44', '', 'N', '', '2021-04-17 10:46:44', '', '', '', '', '', 'X', '', '', ''),
(10, 'CZAR', 'hhh', 'ZAM', '', 'GG', 'X', '', '0000-00-00', 0, 0, '2021-04-17 10:49:12', '', '2021-04-17 10:49:12', '', 'Y', '', '2021-04-17 10:49:12', '', '', '', '', '', 'X', '', '', ''),
(11, 'dd', 'TEJANO', 'ZAMPERTsdsad', '', 'ggfg', 'X', '', '0000-00-00', 0, 0, '2021-04-17 12:03:44', '', '2021-04-17 12:03:44', '', 'Y', '', '2021-04-17 12:03:44', '', '', '', '', '', 'X', '', '', ''),
(12, 'MARNK', 'GO', 'OPOEW', '', 'CNARO0294', '', '', '0000-00-00', 0, 0, '2021-04-25 13:02:18', '', '2021-04-25 13:02:18', '', 'N', '', '2021-04-25 13:02:18', '', '', '', '', '', '', '', '', ''),
(13, '222', '333', '444', '', '111', 'X', '', '0000-00-00', 0, 0, '2021-05-04 00:44:32', '', '2021-05-04 00:44:32', '', 'N', '', '2021-05-04 00:44:32', '', '', '', '', '', 'X', '', '', ''),
(14, 'DADD', 'WERR', 'GHETWT', '', 'TSTERR', '', '', '0000-00-00', 0, 0, '2021-05-25 03:24:45', '', '2021-05-25 03:24:45', '1', 'Y', '1', '2021-05-25 03:30:33', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_children`
--

CREATE TABLE `tbl_employee_children` (
  `ID` int(100) NOT NULL,
  `EMPID` int(11) NOT NULL,
  `FULLNAME` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_children`
--

INSERT INTO `tbl_employee_children` (`ID`, `EMPID`, `FULLNAME`, `DOB`, `CANCELLED`) VALUES
(1, 5, 'CZAR', '2021-03-09', 'Y'),
(2, 5, 's', '0000-00-00', 'Y'),
(4, 5, 'f', '0000-00-00', 'Y'),
(5, 5, 'CZAR', '2021-03-09', 'Y'),
(6, 5, 'f', '0000-00-00', 'Y'),
(7, 5, 'bbd', '2021-03-09', 'Y'),
(8, 5, 'f', '0000-00-00', 'Y'),
(9, 5, '1', '2021-03-17', 'Y'),
(10, 5, '7767', '2021-03-27', 'Y'),
(13, 5, 'CZAR', '2021-03-09', 'Y'),
(14, 5, 'bbd', '2021-03-09', 'Y'),
(15, 5, '1', '2021-03-17', 'Y'),
(16, 5, '7767', '2021-03-27', 'Y'),
(17, 5, 'CZAR', '2021-03-09', 'N'),
(18, 5, 'bbd', '2021-03-09', 'Y'),
(19, 5, '1', '2021-03-17', 'Y'),
(20, 5, 'FIRST', '2021-03-27', 'N'),
(21, 5, 'ESTHERFF', '2021-05-19', 'N'),
(22, 2, '2323', '2021-05-11', 'N'),
(23, 2, '223', '2021-05-18', 'N'),
(24, 2, '22', '0000-00-00', 'N'),
(25, 8, 'uu', '0000-00-00', 'N'),
(26, 8, 'u5545u', '0000-00-00', 'N'),
(27, 3, 'ffsfs', '0000-00-00', 'N'),
(28, 5, 'sdad', '0000-00-00', 'N'),
(29, 5, 'uu', '0000-00-00', 'Y'),
(30, 5, 'JEssane', '2021-05-12', 'N'),
(31, 5, 'dsd', '2021-05-12', 'N'),
(32, 5, 'YES KID', '2021-05-12', 'N'),
(33, 5, 'uubb', '2021-04-29', 'Y'),
(34, 5, 'DDDD', '2021-05-12', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_civil_service`
--

CREATE TABLE `tbl_employee_civil_service` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `ELIGIBILITY` varchar(255) NOT NULL,
  `RATING` int(10) NOT NULL,
  `DATEOFEXAM` date NOT NULL,
  `PLACEOFEXAM` varchar(255) NOT NULL,
  `LICENSENUMBER` int(100) NOT NULL,
  `LICENSEDATEOFVALIDITY` date NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_civil_service`
--

INSERT INTO `tbl_employee_civil_service` (`ID`, `EMPID`, `ELIGIBILITY`, `RATING`, `DATEOFEXAM`, `PLACEOFEXAM`, `LICENSENUMBER`, `LICENSEDATEOFVALIDITY`, `CANCELLED`) VALUES
(1, 5, 'ELEMENTARY', 89, '2021-04-14', 'CDO', 2141515, '2021-04-30', 'Y'),
(2, 5, 'ELEMENTARY', 89, '2021-04-14', 'CDO', 2141515, '2021-04-30', 'Y'),
(3, 5, 'ELEMENTARY', 89, '2021-04-14', 'CDO', 2141515, '2021-04-30', 'Y'),
(4, 5, 'ELEMENTARY', 89, '2021-04-14', 'CDO', 2141515, '2021-04-30', 'N'),
(5, 5, 'ASD', 32, '0000-00-00', '123', 323, '2021-05-26', 'N'),
(6, 5, 'ASD3', 32, '0000-00-00', '333', 111, '2021-05-25', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_educ_background`
--

CREATE TABLE `tbl_employee_educ_background` (
  `ID` int(10) NOT NULL,
  `EMPID` varchar(100) NOT NULL,
  `LEVEL` varchar(100) NOT NULL,
  `SCHOOLNAME` varchar(255) NOT NULL,
  `BASICEDUCATION` varchar(255) NOT NULL,
  `PERIODFROM` int(100) NOT NULL,
  `PERIODTO` int(100) NOT NULL,
  `HIGHESTLEVEL` varchar(100) NOT NULL,
  `YEARGRADUATED` int(100) NOT NULL,
  `HONORRECEIVED` varchar(255) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_educ_background`
--

INSERT INTO `tbl_employee_educ_background` (`ID`, `EMPID`, `LEVEL`, `SCHOOLNAME`, `BASICEDUCATION`, `PERIODFROM`, `PERIODTO`, `HIGHESTLEVEL`, `YEARGRADUATED`, `HONORRECEIVED`, `CANCELLED`) VALUES
(1, '5', 'VOC', 'ALC', 'ELEMENTARY', 20210301, 20210305, 'GRADUATE', 2015, 'YES', 'Y'),
(2, '5', '6', '', '', 0, 0, '', 0, '', 'Y'),
(3, '5', 'COLLEGE', '2', '3', 2016, 2018, '7', 2018, '8', 'Y'),
(4, '5', 'VOC', 'ALC', 'ELEMENTARY', 20210301, 20210305, 'GRADUATE', 2015, 'YES', 'Y'),
(5, '5', 'COLLEGE', '2', '3', 2016, 2018, '7', 2018, '8', 'Y'),
(6, '5', 'VOC', 'ALC', 'ELEMENTARY', 20210301, 20210305, 'GRADUATE', 2015, 'YES', 'N'),
(7, '5', 'COLLEGE', '2', '3', 2016, 2018, '7', 2018, '8', 'Y'),
(8, '2', 'VOC', '2321', '123', 123, 123, '123', 213, '123', 'N'),
(9, '5', 'SEC', 'ALC', 'HIGHSCHOOL', 2016, 2016, '123', 2090, '123', 'N'),
(10, '5', 'ELEM', 'MONTESORRY', 'HIGH SCHOOL', 2011, 2015, 'GRADUATE', 2015, 'HONOR STUDNETDDD', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_family`
--

CREATE TABLE `tbl_employee_family` (
  `ID` int(10) NOT NULL,
  `EMPID` int(10) NOT NULL,
  `SPOUSELASTNAME` varchar(100) NOT NULL,
  `SPOUSEFIRSTNAME` varchar(100) NOT NULL,
  `SPOUSEMIDDLENAME` varchar(100) NOT NULL,
  `SPOUSEEXTENSION` varchar(10) NOT NULL,
  `OCCUPATION` varchar(20) NOT NULL,
  `EMPLOYERNAME` varchar(100) NOT NULL,
  `BUSINESSADDRESS` varchar(250) NOT NULL,
  `SPOUSETELNO` varchar(100) NOT NULL,
  `FATHERSURNAME` varchar(100) NOT NULL,
  `FATHERFIRSTNAME` varchar(100) NOT NULL,
  `FATHERMIDDLENAME` varchar(100) NOT NULL,
  `FATHEREXT` char(2) NOT NULL,
  `MOTHERMAIDENNAME` varchar(100) NOT NULL,
  `MOTHERSURNAME` varchar(100) NOT NULL,
  `MOTHERFIRSTNAME` varchar(100) NOT NULL,
  `MOTHERMIDDLENAME` varchar(100) NOT NULL,
  `UPDATEDBY` varchar(100) NOT NULL,
  `UPDATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_family`
--

INSERT INTO `tbl_employee_family` (`ID`, `EMPID`, `SPOUSELASTNAME`, `SPOUSEFIRSTNAME`, `SPOUSEMIDDLENAME`, `SPOUSEEXTENSION`, `OCCUPATION`, `EMPLOYERNAME`, `BUSINESSADDRESS`, `SPOUSETELNO`, `FATHERSURNAME`, `FATHERFIRSTNAME`, `FATHERMIDDLENAME`, `FATHEREXT`, `MOTHERMAIDENNAME`, `MOTHERSURNAME`, `MOTHERFIRSTNAME`, `MOTHERMIDDLENAME`, `UPDATEDBY`, `UPDATEDDATETIME`) VALUES
(1, 2, 'MSFKKALL', 'MEKAKAK', 'OHFMD', 'II', 'HR', 'CEROBRO', 'CUGMAN', '09389583', 'ABRHANS', 'TALGAOTM', 'KJJWIIW', 'JR', 'rrrF', 'KSKCMWJ', 'KFAKSKWI', 'GAWG', '', '2021-05-25 03:49:49'),
(3, 5, 'DDD', 'CESAIRR', 'Tejano', '', 'WITDD', 'DDD', 'NHA KAUSWAGAN', '09278175', '', '', '', '', '', '', '', '', '1', '2021-05-25 08:25:44'),
(4, 3, 'DDD', 'DDS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(5, 4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(6, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(7, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(8, 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(9, 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(10, 12, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(11, 8, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(12, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(13, 13, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(14, 9, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49'),
(15, 14, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-25 03:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_ld`
--

CREATE TABLE `tbl_employee_ld` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `DATEFROM` date NOT NULL,
  `DATETO` date NOT NULL,
  `NOOFHOURS` int(20) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `SPONSOREDBY` varchar(250) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_ld`
--

INSERT INTO `tbl_employee_ld` (`ID`, `EMPID`, `PROGRAM`, `DATEFROM`, `DATETO`, `NOOFHOURS`, `TYPE`, `SPONSOREDBY`, `CANCELLED`) VALUES
(1, 5, 'DD', '0000-00-00', '0000-00-00', 0, '', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_other_membership`
--

CREATE TABLE `tbl_employee_other_membership` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `MEMBERSHIP` varchar(100) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_other_membership`
--

INSERT INTO `tbl_employee_other_membership` (`ID`, `EMPID`, `MEMBERSHIP`, `CANCELLED`) VALUES
(1, 5, 'DSS', 'Y'),
(2, 5, 'dd', 'Y'),
(3, 5, '231', 'Y'),
(4, 5, '1', 'Y'),
(5, 2, '1', 'N'),
(6, 3, 'TEST DATA', 'N'),
(7, 5, 'DDD', 'N'),
(8, 5, 'qweqweda', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_other_recognition`
--

CREATE TABLE `tbl_employee_other_recognition` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `RECOGNITION` varchar(255) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_other_recognition`
--

INSERT INTO `tbl_employee_other_recognition` (`ID`, `EMPID`, `RECOGNITION`, `CANCELLED`) VALUES
(1, 5, 'BEST', 'Y'),
(2, 5, 'BEST', 'Y'),
(3, 5, 'BEST', 'Y'),
(4, 5, 'BEST IN SNACKS', 'N'),
(5, 5, 'dsd', 'Y'),
(6, 2, 'BEST IN SNACKS', 'N'),
(7, 2, 'dsd', 'N'),
(8, 5, 'BEST IN REDLDLD', 'Y'),
(9, 5, 'DDD', 'Y'),
(10, 5, 'DSFAF', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_other_skills`
--

CREATE TABLE `tbl_employee_other_skills` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `SKILLS` varchar(255) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_other_skills`
--

INSERT INTO `tbl_employee_other_skills` (`ID`, `EMPID`, `SKILLS`, `CANCELLED`) VALUES
(1, 5, 'Signing', 'Y'),
(2, 5, 'Dancing', 'Y'),
(3, 5, 'dd', 'Y'),
(4, 2, '12312', 'Y'),
(5, 5, 'dd', 'Y'),
(6, 5, 'asdasd', 'Y'),
(7, 5, 'DDD', 'Y'),
(8, 5, 'DDD', 'Y'),
(9, 5, 'asdasd', 'N'),
(10, 5, 'DDD', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_profile`
--

CREATE TABLE `tbl_employee_profile` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `DOB` date NOT NULL,
  `PLACEOFBIRTH` varchar(100) NOT NULL,
  `GENDER` varchar(100) NOT NULL,
  `CIVILSTATUS` varchar(20) NOT NULL,
  `HEIGHT` int(5) NOT NULL,
  `WEIGHT` int(5) NOT NULL,
  `BLOODTYPE` char(2) NOT NULL,
  `GSISNO` int(16) NOT NULL,
  `PAGIBIGNO` int(16) NOT NULL,
  `PHICNO` int(16) NOT NULL,
  `SSSNO` int(16) NOT NULL,
  `TINNO` int(16) NOT NULL,
  `AGENCYEMPLOYEENO` varchar(100) NOT NULL,
  `CITIZENSHIP` varchar(100) NOT NULL,
  `DUALCITIZEN` varchar(10) NOT NULL,
  `RESIDENTIALADDRESS` varchar(255) NOT NULL,
  `PERMANENTADDRESS` varchar(255) NOT NULL,
  `TELEPHONENO` varchar(100) NOT NULL,
  `MOBILENO` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `UPDATEDBY` varchar(100) NOT NULL,
  `UPDATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_profile`
--

INSERT INTO `tbl_employee_profile` (`ID`, `EMPID`, `DOB`, `PLACEOFBIRTH`, `GENDER`, `CIVILSTATUS`, `HEIGHT`, `WEIGHT`, `BLOODTYPE`, `GSISNO`, `PAGIBIGNO`, `PHICNO`, `SSSNO`, `TINNO`, `AGENCYEMPLOYEENO`, `CITIZENSHIP`, `DUALCITIZEN`, `RESIDENTIALADDRESS`, `PERMANENTADDRESS`, `TELEPHONENO`, `MOBILENO`, `EMAIL`, `UPDATEDBY`, `UPDATEDDATETIME`) VALUES
(1, 2, '0000-00-00', 'CDO', 'NA', 'SINGLE', 163, 67, '', 353253426, 3423423, 2342343, 34324, 342345236, 'CBTZ200116', 'dual', 'birth', 'FJ SKMWFKK W', 'CDO SWOOR', '2512612', '352362351', 'dole10.czarbobzambrano@gmail.com', '', '2021-05-25 03:48:52'),
(6, 5, '2021-05-26', 'CDO', 'MALE', 'SINGLE', 0, 63, '', 289488291, 0, 0, 0, 0, '', 'dual', 'birth', '', 'on', '', '', '', '1', '2021-05-25 08:22:23'),
(7, 3, '0000-00-00', '', 'NA', '', 0, 0, '', 0, 21312412, 0, 0, 0, '', 'dual', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(8, 4, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(9, 0, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(10, 6, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(11, 7, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(12, 10, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(13, 12, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(14, 8, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(15, 1, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(16, 13, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(17, 9, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52'),
(18, 14, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '2021-05-25 03:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_voluntary_work`
--

CREATE TABLE `tbl_employee_voluntary_work` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `ORGANIZATION` varchar(255) NOT NULL,
  `DATEFROM` date NOT NULL,
  `DATETO` date NOT NULL,
  `NOOFHOURS` int(11) NOT NULL,
  `POSITION` int(11) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_voluntary_work`
--

INSERT INTO `tbl_employee_voluntary_work` (`ID`, `EMPID`, `ORGANIZATION`, `DATEFROM`, `DATETO`, `NOOFHOURS`, `POSITION`, `CANCELLED`) VALUES
(1, 5, 'QITC', '0000-00-00', '0000-00-00', 0, 0, 'N'),
(2, 5, 'DDD', '0000-00-00', '0000-00-00', 0, 0, 'Y'),
(3, 5, 'dsad', '0000-00-00', '0000-00-00', 0, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_work_experience`
--

CREATE TABLE `tbl_employee_work_experience` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `DATEFROM` date NOT NULL,
  `DATETO` date NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `COMPANY` varchar(255) NOT NULL,
  `MONTHLYSALARY` int(100) NOT NULL,
  `GRADE` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `GOVTSERVICE` char(2) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_work_experience`
--

INSERT INTO `tbl_employee_work_experience` (`ID`, `EMPID`, `DATEFROM`, `DATETO`, `POSITION`, `COMPANY`, `MONTHLYSALARY`, `GRADE`, `STATUS`, `GOVTSERVICE`, `CANCELLED`) VALUES
(1, 5, '0000-00-00', '0000-00-00', 'fdfdd', '', 0, '', '', 'Y', 'Y'),
(2, 5, '0000-00-00', '0000-00-00', 'D', 'DDD', 199900, '', '', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fieldoffice`
--

CREATE TABLE `tbl_fieldoffice` (
  `ID` int(11) NOT NULL,
  `FIELDOFFICENAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_record`
--

CREATE TABLE `tbl_service_record` (
  `ID` int(100) NOT NULL,
  `EMPID` int(100) NOT NULL,
  `SERVICEFROM` date NOT NULL,
  `SERVICETO` date NOT NULL,
  `DESIGNATION` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `SALARY` varchar(100) NOT NULL,
  `OFFICE` varchar(100) NOT NULL,
  `BRANCH` varchar(100) NOT NULL,
  `ABS` varchar(16) NOT NULL,
  `SEPARATIONDATE` date NOT NULL,
  `AMOUNTRECEIVED` int(100) NOT NULL,
  `DETAILS` varchar(255) NOT NULL,
  `CANCELLED` char(2) NOT NULL,
  `CANCELLEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CANCELLEDBY` varchar(100) NOT NULL,
  `CREATEDBY` varchar(100) NOT NULL,
  `CREATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UPDATEDBY` varchar(100) NOT NULL,
  `UPDATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service_record`
--

INSERT INTO `tbl_service_record` (`ID`, `EMPID`, `SERVICEFROM`, `SERVICETO`, `DESIGNATION`, `STATUS`, `SALARY`, `OFFICE`, `BRANCH`, `ABS`, `SEPARATIONDATE`, `AMOUNTRECEIVED`, `DETAILS`, `CANCELLED`, `CANCELLEDDATETIME`, `CANCELLEDBY`, `CREATEDBY`, `CREATEDDATETIME`, `UPDATEDBY`, `UPDATEDDATETIME`) VALUES
(1, 5, '2021-04-07', '2021-04-09', 'IT', 'EMPLOYED', '30503', 'ORD', 'RO10', '10', '2021-04-15', 422, '24242', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 5, '2020-12-27', '2021-04-13', 'IT', 'EMPLOYED', '30503', 'ORD', 'RO10', '10', '2021-03-31', 422, '0asdasdasdasd', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 5, '2020-11-18', '2021-03-30', '1', '2', '3', '4', '5', '6', '2021-04-27', 7, '8', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 3, '2021-05-05', '2021-05-26', '', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'Y', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 3, '2021-05-05', '2021-05-26', 'sdasd', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 3, '2021-05-18', '2021-06-02', '', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 3, '0000-00-00', '0000-00-00', '232', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 3, '0000-00-00', '0000-00-00', '212111', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'Y', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(9, 3, '0000-00-00', '0000-00-00', '22', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(10, 3, '0000-00-00', '0000-00-00', '1', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(11, 3, '0000-00-00', '0000-00-00', '235235', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(12, 3, '0000-00-00', '0000-00-00', '555', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(13, 3, '0000-00-00', '0000-00-00', '4555', '', '', '', '', '', '0000-00-00', 0, '', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(14, 2, '2021-05-18', '0000-00-00', '22', '', '', '', '', '', '0000-00-00', 0, 'Please input details\n              ', 'N', '2021-05-25 08:46:06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(15, 13, '2021-05-03', '2021-05-03', 'IT FOCALDD', 'EMPLOYED', '367030', 'ORD', 'RO10', '12', '2021-05-11', 49299, 'sda', 'N', '2021-05-25 09:17:20', '', '', '2021-05-25 09:17:20', '1', '2021-05-25 09:17:20'),
(16, 13, '2021-04-26', '2021-05-18', 'IT', 'EMPLOYED YES', '3050322', 'ORD', 'RO11', '100', '2021-05-27', 422444, 'YES', 'N', '2021-05-25 09:19:22', '', '1', '2021-05-25 09:19:22', '', '2021-05-25 09:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `USERNAME`, `PASSWORD`) VALUES
(1, 'ADMIN', 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_division`
--
ALTER TABLE `tbl_division`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_children`
--
ALTER TABLE `tbl_employee_children`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_civil_service`
--
ALTER TABLE `tbl_employee_civil_service`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_educ_background`
--
ALTER TABLE `tbl_employee_educ_background`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_family`
--
ALTER TABLE `tbl_employee_family`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_ld`
--
ALTER TABLE `tbl_employee_ld`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_other_membership`
--
ALTER TABLE `tbl_employee_other_membership`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_other_recognition`
--
ALTER TABLE `tbl_employee_other_recognition`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_other_skills`
--
ALTER TABLE `tbl_employee_other_skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_profile`
--
ALTER TABLE `tbl_employee_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_voluntary_work`
--
ALTER TABLE `tbl_employee_voluntary_work`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_employee_work_experience`
--
ALTER TABLE `tbl_employee_work_experience`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fieldoffice`
--
ALTER TABLE `tbl_fieldoffice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_service_record`
--
ALTER TABLE `tbl_service_record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_division`
--
ALTER TABLE `tbl_division`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_employee_children`
--
ALTER TABLE `tbl_employee_children`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_employee_civil_service`
--
ALTER TABLE `tbl_employee_civil_service`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_educ_background`
--
ALTER TABLE `tbl_employee_educ_background`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employee_family`
--
ALTER TABLE `tbl_employee_family`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_employee_ld`
--
ALTER TABLE `tbl_employee_ld`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_other_membership`
--
ALTER TABLE `tbl_employee_other_membership`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employee_other_recognition`
--
ALTER TABLE `tbl_employee_other_recognition`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employee_other_skills`
--
ALTER TABLE `tbl_employee_other_skills`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_employee_profile`
--
ALTER TABLE `tbl_employee_profile`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_employee_voluntary_work`
--
ALTER TABLE `tbl_employee_voluntary_work`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee_work_experience`
--
ALTER TABLE `tbl_employee_work_experience`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_fieldoffice`
--
ALTER TABLE `tbl_fieldoffice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_record`
--
ALTER TABLE `tbl_service_record`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
