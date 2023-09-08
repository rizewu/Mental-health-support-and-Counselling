-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 08:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentalsup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `aptid` int(11) NOT NULL,
  `time` time NOT NULL,
  `aptby` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `apton` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  `fee` int(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`aptid`, `time`, `aptby`, `docid`, `message`, `apton`, `date`, `fee`, `status`) VALUES
(5, '00:00:09', 1, 5, 'hsndkjasnhdJSA', '2020-03-16 04:26:47', '2020-06-07', 250, 'Accepted'),
(6, '00:00:09', 1, 5, 'asjnaJ', '2020-03-16 04:27:35', '2020-04-05', 250, 'Rejected'),
(7, '00:00:09', 1, 5, 'sadsa', '2020-03-16 04:28:48', '2020-05-06', 250, 'Accepted'),
(8, '00:00:09', 1, 5, 'sadsa', '2020-03-16 04:29:26', '2020-05-06', 250, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `blog` varchar(350) NOT NULL,
  `image` varchar(250) NOT NULL,
  `blogon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `subject`, `blog`, `image`, `blogon`) VALUES
(3, 'mental health', '<p>ghjkl</p>\r\n', 'image/Lighthouse.jpg', '2020-03-04 06:20:28'),
(9, 'shaGSZA', '', 'image/Desert.jpg', '2020-03-06 04:30:18'),
(10, '', '', 'image/Hydrangeas.jpg', '2020-03-06 04:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `docid` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `address` varchar(200) NOT NULL,
  `specialisation` varchar(350) NOT NULL,
  `qualification` varchar(400) NOT NULL,
  `experience` varchar(350) NOT NULL,
  `bio` varchar(700) NOT NULL,
  `regon` timestamp NOT NULL DEFAULT current_timestamp(),
  `dob` date NOT NULL,
  `state` varchar(150) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docid`, `name`, `gender`, `email`, `contact`, `password`, `image`, `city`, `zipcode`, `address`, `specialisation`, `qualification`, `experience`, `bio`, `regon`, `dob`, `state`, `fee`) VALUES
(3, 'Dr Sonia kapur', 'Female', 'ishachaudhary3699@gmail.com', '1234567890', '111', 'image/255CFAED-C824-47F2-B023-8AA3C8CF9D79-778-000000CD448085AC.JPG', 'amritsar', '143001', 'Fortis Escort hospital, Amritsar', 'Clinical Psychologist', 'PHD in Clinical Psychology', '5 yrs of experience', 'I am an empanelled consultant of Mental Health and Behavioural Sciences, dedicated to provide help regarding mental healthcare. Feel free to contact.', '2020-03-02 03:49:34', '1980-03-10', 'punjab', 500),
(4, 'Dr Manjit Singh', 'Male', 'taniakhosla12@gmail.com', '1234567890', '7508397445', 'image/IMG-1949.jpg', 'amritsar', '143001', 'B-223,New Amritsar, Amritsar', 'Psychiatrist', 'M.D,Psychiatry ', '20 yrs of experience', 'A caring, skilled professional, dedicated to simplifying often considered complicated and confusing areas of mental healthcare. ', '2020-03-04 03:18:04', '1982-03-01', 'punjab', 350),
(5, 'Dr Mukul aggarwal', 'm', 'rowonono7@gmail.com', '7546758993', '7546758993', 'image/A423FFB2-1C01-4D8C-891B-BDCC06103059-778-000000CD75E09DF4.JPG', 'amritsar', '143001', 'Pinnacle clinic, C-Block ranjit avenue, Amritsar', 'Psychiatrist', 'M.D,Psychiatry , PHD ,Psychology', '4 yrs of experience', 'Looking forward to help people suffering from mental health related problems, and those who find difficulty in reaching for help physically.', '2020-03-04 03:22:20', '1990-12-05', 'punjab', 250),
(6, 'Dr Arjit khanna', 'm', 'rowonono8@gmail.com', '654320789', '654320789', 'image/D3920E99-420B-48E1-B2B9-E58C95420ABC-778-000000CDDB50DE1B.JPG', 'jalandhar', '144001', 'Clinic Basant vihar road, Jalandhar city', 'Behavioural Psychologist', 'BA in psychology,PHD Psychiatry', '6 yrs', 'Renowned and Reputed Clinical Psychologist, looking forward to help people suffering from Anxiety, Depression, OCD and PTSD. ', '2020-03-04 03:28:15', '1989-12-07', 'punjab', 400);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `helpid` int(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `help` varchar(200) NOT NULL,
  `helpby` varchar(30) NOT NULL,
  `helpon` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`helpid`, `subject`, `help`, `helpby`, `helpon`, `status`) VALUES
(1, 'mental health', '<p>axsaxas</p>\r\n', '1', '2020-03-05 03:53:43', 1),
(2, 'sxcs', '<p>xasxsa</p>\r\n', '1', '2020-03-05 04:19:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyid` int(11) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `quesid` int(11) NOT NULL,
  `replyon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyid`, `reply`, `quesid`, `replyon`) VALUES
(1, 'ghjk', 2, '2020-03-05 04:25:41'),
(2, '', 1, '2020-03-06 04:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `revid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `review` varchar(450) NOT NULL,
  `reviewby` varchar(250) NOT NULL,
  `reviewon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`revid`, `subject`, `review`, `reviewby`, `reviewon`) VALUES
(1, 'ghdsbs', 'dsuf8d', '', '2020-02-21 07:01:28'),
(3, 'edrfed', 'erfed', '', '2020-02-21 07:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scid` int(200) NOT NULL,
  `docid` int(11) NOT NULL,
  `MONDAY` varchar(200) NOT NULL,
  `TUESDAY` varchar(200) NOT NULL,
  `WEDNESDAY` varchar(200) NOT NULL,
  `THURSDAY` varchar(200) NOT NULL,
  `FRIDAY` varchar(200) NOT NULL,
  `SATURDAY` varchar(200) NOT NULL,
  `SUNDAY` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scid`, `docid`, `MONDAY`, `TUESDAY`, `WEDNESDAY`, `THURSDAY`, `FRIDAY`, `SATURDAY`, `SUNDAY`) VALUES
(3, 4, '9am - 5pm', '8am-5pm', '9am-6pm', '7am-5pm', '8am-4pm', '8:30am-4pm', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `sid` int(11) NOT NULL,
  `specialization` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`sid`, `specialization`) VALUES
(2, 'Anxiety related problems'),
(3, 'psychiatrist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zipcode` varchar(8) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `regon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `gender`, `email`, `dob`, `contact`, `password`, `image`, `state`, `zipcode`, `address`, `city`, `regon`) VALUES
(1, 'shivali', 'female', 'shivalimohindru6@gmail.com', '1999-03-10', '1234567890', '123', 'image/Desert.jpg', 'punjab', '143001', 'ranjit avenue b block amritsar', 'amritsar', '2020-02-22 05:36:50'),
(6, 'Tania', '', 'rizewu1@gmail.com', '0000-00-00', '', '111', 'image/profilepic.png', '', '', '', '', '2020-03-06 04:48:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`aptid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`helpid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`revid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `aptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `docid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `helpid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `replyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `revid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
