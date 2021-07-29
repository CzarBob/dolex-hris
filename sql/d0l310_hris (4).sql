-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 12:56 AM
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
  `FIELDOFFICEID` varchar(100) NOT NULL,
  `DIVISIONID` varchar(100) NOT NULL,
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
(1, 'ADMIN', 'ADMIN', 'ADMIN', '', 'ADMIN', 'WEB ADMIN', 'NHA KAUSWAGAN', '2020-01-06', 12, 12, '2021-07-16 07:22:11', '1', '2021-02-09 08:30:59', '', 'N', '0', '2021-02-09 08:30:59', 'Y', 'RO', 'TSSD', '1', '1', '', 'ADMIN', 'ADMIN', '1234'),
(15, 'DEPARTMENT OF LABOR AND EMPLOYMENT', 'Tejano', 'REGION X', '', 'CBTZ200116', 'ISA II', '', '2020-01-06', 0, 0, '2021-05-31 04:34:26', '1', '2021-05-28 03:08:56', '1', 'N', '', '2021-05-28 03:08:56', '', 'NA', 'NA', '', '', '', '', 'CBTZ200116', 'CBTZ200116');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_attachment`
--

CREATE TABLE `tbl_employee_attachment` (
  `ID` int(100) NOT NULL,
  `EMPID` varchar(255) NOT NULL,
  `FILENAME` varchar(255) NOT NULL,
  `LOCATION` varchar(255) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_attachment`
--

INSERT INTO `tbl_employee_attachment` (`ID`, `EMPID`, `FILENAME`, `LOCATION`, `CANCELLED`) VALUES
(1, '', 'TEST', 'Uploaded_Files/27062021105352DOLE LOGO.png', 'N'),
(2, '', '', 'Uploaded_Files/27062021105445198012357_195892645756467_8660611398713063018_n.jpg', 'N'),
(3, '5', 'TESTFFgg', 'Uploaded_Files/194535519.jpg', 'N'),
(4, '5', 'GG', 'Uploaded_Files/1474690716.pdf', 'N'),
(5, '5', 'GSJDA', 'Uploaded_Files/1646801337.49 pm (1)', 'N'),
(6, '15', 'CSC FILE', 'Uploaded_Files/1052063385.jpg', 'Y'),
(7, '15', 'CSC FILE', 'Uploaded_Files/1587636044.jpg', 'N'),
(8, '15', 'RECORD', 'Uploaded_Files/1898753660.pdf', 'N');

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
(1, 15, 'MARK ZAMBRANO', '2021-05-12', 'N');

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
(1, 15, 'CS PASSER', 84, '0000-00-00', 'XU CDO', 295291, '2021-05-25', 'N');

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
(1, '15', 'ELEM', 'ANGELICUM LEARNING CENTRE', 'ELEMENTARY', 2016, 2019, 'ELEM GRADUATE', 2014, 'NONE', 'N'),
(2, '15', 'SEC', 'ANGELICUM LEARNING CENTRE', 'ELEMENTARY GRADUATE', 20007, 2011, 'GRADUTE', 2011, 'NONE', 'N'),
(3, '15', 'SEC', 'Mindanao University of Science and Technology', 'SECONDARY', 2007, 2007, 'Graduate', 2007, 'NONE', 'N'),
(4, '15', 'COLLEGE', 'XAVIER UNIVERSITY', 'BS-COMPUTER SCIENCE', 2011, 2015, 'COLLEGE GRAD', 2015, 'GRADUATE, DEAN\'S LISTER', 'N'),
(5, '15', 'ELEM', 'STA CECILIA', 'DD', 2012, 2018, '44', 2019, 'YES', 'N'),
(6, '15', 'VOC', 'TESDA', 'ASDWLLD', 2016, 2011, '209', 2012, 'YESH MA', 'N'),
(7, '15', 'GRADSTUD', 'MS-CS', 'XU CAGAYAN', 2019, 2020, '22', 2019, 'DD', 'N');

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
(1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-27 19:19:27'),
(2, 6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-28 03:07:47'),
(3, 15, 'ALIGO', 'GEMA', 'Metls', 'II', 'HR Supervisior', 'AGS COmpang', 'Bahada, Davao', '+639568776357', 'CALDERON', 'JOHN', 'RANDYL', '', 'Tkela', 'CMake', 'GGKAEIO', '', '1', '2021-05-31 04:35:37');

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
(1, 15, 'DDDD', '2021-05-02', '2021-05-18', 16, 'MANAGERIAL', 'CBAG', 'N');

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
(1, 15, 'QITC', 'Y');

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
(1, 15, 'Best in Snacks', 'Y');

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
(1, 15, 'MUSIC ISNTRUMENT', 'Y');

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
  `RESBLOCKNO` varchar(255) NOT NULL,
  `RESSTREET` varchar(255) NOT NULL,
  `RESSUBDIVISION` varchar(255) NOT NULL,
  `RESBARANGAY` varchar(255) NOT NULL,
  `RESCITY` varchar(250) NOT NULL,
  `RESPROVINCE` varchar(255) NOT NULL,
  `RESZIPCODE` varchar(100) NOT NULL,
  `PERMBLOCKNO` varchar(255) NOT NULL,
  `PERMSTREET` varchar(255) NOT NULL,
  `PERMSUBDIVISION` varchar(255) NOT NULL,
  `PERMBARANGAY` varchar(255) NOT NULL,
  `PERMCITY` varchar(255) NOT NULL,
  `PERMPROVINCE` varchar(255) NOT NULL,
  `PERMZIPCODE` int(100) NOT NULL,
  `TELEPHONENO` varchar(100) NOT NULL,
  `MOBILENO` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `UPDATEDBY` varchar(100) NOT NULL,
  `UPDATEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_profile`
--

INSERT INTO `tbl_employee_profile` (`ID`, `EMPID`, `DOB`, `PLACEOFBIRTH`, `GENDER`, `CIVILSTATUS`, `HEIGHT`, `WEIGHT`, `BLOODTYPE`, `GSISNO`, `PAGIBIGNO`, `PHICNO`, `SSSNO`, `TINNO`, `AGENCYEMPLOYEENO`, `CITIZENSHIP`, `DUALCITIZEN`, `RESBLOCKNO`, `RESSTREET`, `RESSUBDIVISION`, `RESBARANGAY`, `RESCITY`, `RESPROVINCE`, `RESZIPCODE`, `PERMBLOCKNO`, `PERMSTREET`, `PERMSUBDIVISION`, `PERMBARANGAY`, `PERMCITY`, `PERMPROVINCE`, `PERMZIPCODE`, `TELEPHONENO`, `MOBILENO`, `EMAIL`, `UPDATEDBY`, `UPDATEDDATETIME`) VALUES
(1, 1, '0000-00-00', '', 'NA', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', 'NA', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '1', '2021-07-16 07:22:11'),
(2, 6, '0000-00-00', '', '', '', 0, 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2021-05-28 03:07:47'),
(3, 15, '2021-05-13', 'CAGAYAN DE ORO', 'MALE', 'MARRIED', 163, 76, '', 353525, 52464346, 236346346, 23462346, 3246643, '34623', 'filipino', 'NA', '6TH FLOOR,TRINIDAD BUILDING, CORRALES STREET, CAGAYAN DE ORO', 'TRINIDAD BUILDING, CORRALES STREET, CAGAYAN DE ORO', '', '', '', '', '', '', '', '', '', '', '', 0, '+639568776357', '639568776357', 'dole10.technical@gmail.com', '1', '2021-05-31 04:34:26');

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
  `POSITION` varchar(100) NOT NULL,
  `CANCELLED` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_voluntary_work`
--

INSERT INTO `tbl_employee_voluntary_work` (`ID`, `EMPID`, `ORGANIZATION`, `DATEFROM`, `DATETO`, `NOOFHOURS`, `POSITION`, `CANCELLED`) VALUES
(1, 15, 'ABC CompanyD', '2021-02-10', '2021-05-20', 18, 'ITTT', 'Y');

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
(1, 15, '2020-01-01', '0001-01-01', 'Information System Analyst', 'DEPARTMENT OF LABOR AND EMPLOYMENT - REGION X', 100000, '16', 'REGULAR', 'Y', 'N');

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
(1, 15, '2021-05-02', '2021-05-26', 'ISA II', 'EMPLOYED', '302881', 'ORD', 'ORD', '12', '2021-05-25', 12444, 'YESEFE', 'N', '2021-05-31 05:13:05', '', '1', '2021-05-31 05:13:05', '', '2021-05-31 05:13:05'),
(2, 1, '2021-07-05', '2021-07-14', 'IT PERSONEL', 'PERMANENT', '20140', 'ORD', 'DOLE X', '9248', '2021-07-13', 100000, 'TEST DATA', 'N', '2021-07-13 01:41:01', '', '1', '2021-07-13 01:41:01', '', '2021-07-13 01:41:01');

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
-- Indexes for table `tbl_employee_attachment`
--
ALTER TABLE `tbl_employee_attachment`
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
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_employee_attachment`
--
ALTER TABLE `tbl_employee_attachment`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employee_children`
--
ALTER TABLE `tbl_employee_children`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_civil_service`
--
ALTER TABLE `tbl_employee_civil_service`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_educ_background`
--
ALTER TABLE `tbl_employee_educ_background`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee_family`
--
ALTER TABLE `tbl_employee_family`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee_ld`
--
ALTER TABLE `tbl_employee_ld`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_other_membership`
--
ALTER TABLE `tbl_employee_other_membership`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_other_recognition`
--
ALTER TABLE `tbl_employee_other_recognition`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_other_skills`
--
ALTER TABLE `tbl_employee_other_skills`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_profile`
--
ALTER TABLE `tbl_employee_profile`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee_voluntary_work`
--
ALTER TABLE `tbl_employee_voluntary_work`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_employee_work_experience`
--
ALTER TABLE `tbl_employee_work_experience`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fieldoffice`
--
ALTER TABLE `tbl_fieldoffice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_record`
--
ALTER TABLE `tbl_service_record`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
