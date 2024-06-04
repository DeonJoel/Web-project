-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `surveior`
--

CREATE TABLE `surveior` (
  `sl.no` int(11) NOT NULL,
  `ServName` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surveior`
--

INSERT INTO `surveior` (`sl.no`, `ServName`, `Password`, `phone`) VALUES
(1, 'Deon', 'Deon123', 8217886972);

-- --------------------------------------------------------

--
-- Table structure for table `surveydtails`
--

CREATE TABLE `surveydtails` (
  `sl.no` int(99) NOT NULL,
  `Area` varchar(999) NOT NULL,
  `SubArea` varchar(999) NOT NULL,
  `TotalPopulation` int(99) NOT NULL,
  `NoOfAcc` int(99) NOT NULL,
  `NoOfCredit` int(99) NOT NULL,
  `NoOfDebit` int(99) NOT NULL,
  `SurveyorName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surveydtails`
--

INSERT INTO `surveydtails` (`sl.no`, `Area`, `SubArea`, `TotalPopulation`, `NoOfAcc`, `NoOfCredit`, `NoOfDebit`, `SurveyorName`) VALUES
(1, 'Manglore', 'Manglore-Center', 20000, 19400, 9000, 10201, '0'),
(2, 'Manglore', 'Manglore-South', 34909, 34545, 2136, 29000, '0'),
(3, 'Manglore', 'Manglore-North', 36909, 36545, 10136, 25000, ''),
(4, 'Manglore', 'Manglore-West', 36909, 36545, 10136, 25000, ''),
(5, 'Manglore', 'Manglore-East', 34909, 32545, 10136, 22000, ''),
(6, 'Manglore', 'Manglore-Rural', 36989, 36534, 10134, 25006, ''),
(8, 'Manglore', 'Mulki', 20009, 19534, 5134, 12500, ''),
(9, 'Udupi', 'Kapu', 20000, 19534, 4134, 15500, ''),
(10, 'Udupi', 'Shirva', 6989, 6534, 5134, 5006, ''),
(11, 'Udupi', 'Karkala', 20306, 19934, 5134, 16500, ''),
(12, 'Udupi', 'Padubidre', 17000, 16534, 8134, 15500, ''),
(13, 'Udupi', 'Adve', 2989, 2534, 134, 2006, ''),
(14, 'Udupi', 'Belman', 3306, 2934, 434, 2500, ''),
(15, 'North-Karnataka', 'Vijayapura', 330000, 32000, 15134, 18006, ''),
(16, 'North-Karnataka', 'Kalaburagi', 20306, 19934, 5134, 16500, ''),
(17, 'North-Karnataka', 'Raichur', 17000, 16534, 8134, 15500, ''),
(18, 'North-Karnataka', 'Bidar', 2989, 2534, 134, 2006, ''),
(19, 'North-Karnataka', 'Haveri', 3306, 2934, 434, 2500, ''),
(20, 'North-Karnataka', 'Ballari', 17000, 16534, 8134, 15500, ''),
(21, 'North-Karnataka', 'Shiggaon', 6989, 6534, 5134, 5006, ''),
(22, 'Bengaluru', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(23, 'Bengaluru', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(24, 'Bengaluru', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(25, 'Bengaluru', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(27, 'Mysore', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(28, 'Mysore', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(29, 'Mysore', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(30, 'Mysore', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(32, 'Shivamogga', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(33, 'Shivamogga', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(34, 'Shivamogga', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(35, 'Shivamogga', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(37, 'Bidar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(38, 'Bidar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(39, 'Bidar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(41, 'Vijayapura', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(42, 'Vijayapura', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(43, 'Vijayapura', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(44, 'Vijayapura', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(45, 'Vijayapura', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(46, 'Vijayapura', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(48, 'Hassan', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(49, 'Hassan', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(50, 'Hassan', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(51, 'Hassan', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(52, 'Hassan', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(53, 'Hassan', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(54, 'Hassan', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(56, 'Dakshina Kannada', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(57, 'Dakshina Kannada', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(58, 'Dakshina Kannada', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(59, 'Dakshina Kannada', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(60, 'Dakshina Kannada', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(62, 'Dharwad', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(63, 'Dharwad', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(64, 'Dharwad', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(65, 'Dharwad', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(66, 'Dharwad', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(68, 'Davanagere', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(69, 'Davanagere', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(70, 'Davanagere', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(71, 'Davanagere', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(72, 'Davanagere', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(74, 'Kalaburagi', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(75, 'Kalaburagi', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(77, 'Mandya', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(79, 'Gadag-Betageri', 'Basavanagudi', 20306, 19934, 5133, 16500, '0'),
(80, 'Gadag-Betageri', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(81, 'Gadag-Betageri', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(83, 'Ramanagara', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(84, 'Ramanagara', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(85, 'Ramanagara', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(86, 'Ramanagara', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(87, 'Ramanagara', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(88, 'Ramanagara', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(89, 'Ramanagara', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(90, 'Ramanagara', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(92, 'Ballari', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(93, 'Ballari', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(94, 'Ballari', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(96, 'Chitradurga', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(97, 'Chitradurga', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(98, 'Chitradurga', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(99, 'Chitradurga', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(100, 'Chitradurga', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(102, 'Raichur', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(103, 'Raichur', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(104, 'Raichur', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(105, 'Raichur', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(106, 'Raichur', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(108, 'Kolar', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(109, 'Kolar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(110, 'Kolar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(111, 'Kolar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(112, 'Kolar', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(113, 'Kolar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(114, 'Kolar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(115, 'Kolar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(117, 'Chikkaballapura', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(118, 'Chikkaballapura', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(119, 'Chikkaballapura', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(120, 'Haveri', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(121, 'Haveri', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(122, 'Haveri', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(123, 'Bangalore Rural', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(124, 'Bangalore Rural', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(125, 'Bangalore Rural', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(126, 'Bangalore Rural', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(127, 'Bangalore Rural', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(128, 'Bangalore Rural', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(129, 'Bangalore Rural', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(130, 'Bangalore Rural', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(131, 'Bangalore Rural', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(132, 'Bangalore Rural', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(133, 'Chamarajanagar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(134, 'Chamarajanagar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(135, 'Chamarajanagar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(136, 'Chamarajanagar', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(137, 'Chamarajanagar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(138, 'Chamarajanagar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(139, 'Chamarajanagar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(140, 'Chamarajanagar', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(141, 'Chamarajanagar', 'BTM Layout', 2989, 2534, 134, 2006, ''),
(142, 'Chamarajanagar', 'Marathahalli', 330000, 32000, 15134, 18006, ''),
(143, 'Chamarajanagar', 'Basavanagudi', 20306, 19934, 5134, 16500, ''),
(144, 'Chamarajanagar', 'Banashankari', 17000, 16534, 8134, 15500, ''),
(145, 'Chamarajanagar', 'BTM Layout', 2989, 2534, 134, 2006, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl.no` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `UserName` varchar(999) NOT NULL,
  `Password` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl.no`, `name`, `UserName`, `Password`) VALUES
(1, '', 'DeonPinto', 'Deon123'),
(2, '', 'Arun', 'Arun123'),
(3, '', 'Adarsh', 'Adarsh123'),
(4, 'Deon Joel Pinto', 'deon', '1234'),
(5, 'Deon  Pinto', 'DeonJoel', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surveior`
--
ALTER TABLE `surveior`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `surveydtails`
--
ALTER TABLE `surveydtails`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surveior`
--
ALTER TABLE `surveior`
  MODIFY `sl.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surveydtails`
--
ALTER TABLE `surveydtails`
  MODIFY `sl.no` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl.no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
