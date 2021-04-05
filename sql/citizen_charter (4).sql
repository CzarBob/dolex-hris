-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 01:09 AM
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
-- Database: `citizen_charter`
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
  `CANCELLED` char(2) NOT NULL,
  `CANCELLEDBY` char(3) NOT NULL,
  `CANCELLEDDATETIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `ENABLED` char(2) NOT NULL,
  `FIELDOFFICEID` char(3) NOT NULL,
  `DIVISIONID` char(3) NOT NULL,
  `BUREAUID` char(3) NOT NULL,
  `UNITID` char(3) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`ID`, `FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `EXTENSION`, `EMPLOYEEID`, `POSITION`, `ADDRESS`, `DATEHIRED`, `SLCREDIT`, `VLCREDIT`, `UPDATEDDATETIME`, `UPDATEDBY`, `CREATEDDATETIME`, `CANCELLED`, `CANCELLEDBY`, `CANCELLEDDATETIME`, `ENABLED`, `FIELDOFFICEID`, `DIVISIONID`, `BUREAUID`, `UNITID`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
(1, 'CZAR', 'TEJANO', 'ZAMBRANO', '', 'CBTZ116200', 'ISA II', 'NHA KAUSWAGAN', '2020-01-06', 12, 12, '2021-02-09 08:30:59', '0', '2021-02-09 08:30:59', 'N', '0', '2021-02-09 08:30:59', 'Y', '1', '1', '1', '1', '', '', ''),
(2, 'sdasd', 'hhh', 'asdasd', '', 'N', 'ds', '', '2021-02-10', 2, 3, '2021-02-12 12:40:35', '', '2021-02-12 12:40:35', 'N', '', '2021-02-12 12:40:35', '', '', '', '', '', 'aasd', '', ''),
(3, 'sdasd', 'sdasd', 'asdasd', '', '323', 'X', '', '0000-00-00', 0, 0, '2021-03-06 14:50:18', '', '2021-03-06 14:50:18', 'N', '', '2021-03-06 14:50:18', '', '', '', '', '', 'X', '', ''),
(4, 'BOB', 'TEJ', 'ZAMBRAFF', '', '44444', 'X', '', '0000-00-00', 0, 0, '2021-03-28 04:44:16', '', '2021-03-28 04:44:16', 'N', '', '2021-03-28 04:44:16', '', '', '', '', '', 'X', '', ''),
(5, 'SAMPLE NAME', 'SAMPLE MID', 'SAMPLE LAST', '', 'SAMPLE1', 'fFF', '', '0000-00-00', 0, 0, '2021-03-28 04:46:02', '', '2021-03-28 04:46:02', 'N', '', '2021-03-28 04:46:02', '', '', '', '', '', 'X', '', '');

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
(5, 5, 'CZAR', '2021-03-09', 'N'),
(6, 5, 'f', '0000-00-00', 'Y');

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
  `CANCELLED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `PERIODFROM` date NOT NULL,
  `PERIODTO` date NOT NULL,
  `HIGHESTLEVEL` varchar(100) NOT NULL,
  `YEAR GRADUATED` varchar(100) NOT NULL,
  `HONORRECEIVED` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `MOTHERMIDDLENAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_family`
--

INSERT INTO `tbl_employee_family` (`ID`, `EMPID`, `SPOUSELASTNAME`, `SPOUSEFIRSTNAME`, `SPOUSEMIDDLENAME`, `SPOUSEEXTENSION`, `OCCUPATION`, `EMPLOYERNAME`, `BUSINESSADDRESS`, `SPOUSETELNO`, `FATHERSURNAME`, `FATHERFIRSTNAME`, `FATHERMIDDLENAME`, `FATHEREXT`, `MOTHERMAIDENNAME`, `MOTHERSURNAME`, `MOTHERFIRSTNAME`, `MOTHERMIDDLENAME`) VALUES
(1, 2, 'MSFKKALL', 'MEKAKAK', 'OHFMD', 'II', 'HR', 'CEROBRO', 'CUGMAN', '09389583', 'ABRHANS', 'TALGAOTM', 'KJJWIIW', 'JR', 'rrrF', 'KSKCMWJ', 'KFAKSKWI', 'GAWG'),
(3, 5, 'fff', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_ld`
--

CREATE TABLE `tbl_employee_ld` (
  `ID` int(100) DEFAULT NULL,
  `EMPID` int(100) NOT NULL,
  `PROGRAM` varchar(255) NOT NULL,
  `DATEFROM` date NOT NULL,
  `DATETO` date NOT NULL,
  `NOOFHOURS` int(20) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `SPONSOREDBY` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `DUALCITIZEN` char(2) NOT NULL,
  `RESIDENTIALADDRESS` varchar(255) NOT NULL,
  `PERMANENTADDRESS` varchar(255) NOT NULL,
  `TELEPHONENO` varchar(100) NOT NULL,
  `MOBILENO` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee_profile`
--

INSERT INTO `tbl_employee_profile` (`ID`, `EMPID`, `DOB`, `PLACEOFBIRTH`, `GENDER`, `CIVILSTATUS`, `HEIGHT`, `WEIGHT`, `BLOODTYPE`, `GSISNO`, `PAGIBIGNO`, `PHICNO`, `SSSNO`, `TINNO`, `AGENCYEMPLOYEENO`, `CITIZENSHIP`, `DUALCITIZEN`, `RESIDENTIALADDRESS`, `PERMANENTADDRESS`, `TELEPHONENO`, `MOBILENO`, `EMAIL`) VALUES
(1, 2, '2021-03-10', 'CDO', 'M', 'SINGLE', 163, 67, 'B', 353253426, 3423423, 2342343, 34324, 342345236, 'CBTZ200116', 'FILIPINO', '', 'FJ SKMWFKK W', 'CDO SWOOR', '2512612', '352362351', 'dole10.czarbobzambrano@gmail.com'),
(6, 5, '0000-00-00', 'zz', 'NA', '', 0, 0, '', 0, 0, 0, 0, 0, '', 'dual', 'bi', '', '', '', '', '');

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
  `POSITION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `tbl_employee_other_recognition`
--
ALTER TABLE `tbl_employee_other_recognition`
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
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_employee_children`
--
ALTER TABLE `tbl_employee_children`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_civil_service`
--
ALTER TABLE `tbl_employee_civil_service`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_educ_background`
--
ALTER TABLE `tbl_employee_educ_background`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_family`
--
ALTER TABLE `tbl_employee_family`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee_other_recognition`
--
ALTER TABLE `tbl_employee_other_recognition`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_profile`
--
ALTER TABLE `tbl_employee_profile`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee_voluntary_work`
--
ALTER TABLE `tbl_employee_voluntary_work`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee_work_experience`
--
ALTER TABLE `tbl_employee_work_experience`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fieldoffice`
--
ALTER TABLE `tbl_fieldoffice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;