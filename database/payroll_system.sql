-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 05:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(25) NOT NULL,
  `dep_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Human Resource Manager'),
(3, 'Teachers'),
(4, 'Driver'),
(5, 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `deg_id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(123) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(212) NOT NULL,
  `contact_1` int(111) NOT NULL,
  `contact_2` int(225) NOT NULL,
  `address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `basic_salary` int(255) NOT NULL,
  `allowance` int(255) NOT NULL,
  `mnthly_deduct` int(255) NOT NULL,
  `tot_salary` int(255) NOT NULL,
  `acc_holder_name` varchar(255) NOT NULL,
  `acc_number` int(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `emp_name`, `birth_date`, `gender`, `contact_1`, `contact_2`, `address`, `department`, `designation`, `date_joined`, `status`, `email`, `password`, `basic_salary`, `allowance`, `mnthly_deduct`, `tot_salary`, `acc_holder_name`, `acc_number`, `bank_name`, `bank_branch`) VALUES
(3, 'kofi', '2019-05-10', 'Male', 123456, 45632, '1231', 'Human Resource Manager', 'sjkfg', '2019-05-22', 'Active', 'domain@gmail.com', '1234567890', 123465, 44444, 123123, 12313, 'acc_HN', 132123132, 'bank', 'Accra'),
(16, 'Robert God', '1995-03-12', 'Male', 2147483647, 2147483647, '', 'Driver', 'Operator', '1995-01-31', 'Active', 'robert.god@gmail.com', 'emission', 5000, 250, 30, 5220, 'Robert God Son', 2147483647, 'UTBank', 'Accra'),
(17, 'Toyboi', '0023-01-02', 'Male', 2131321, 2312, 'Address house', 'Teachers', 'Head Master', '1233-03-12', 'Active', 'toyboi@gmail.com', '1234567890', 1201, 1, 1, 1201, 'Toy boi', 2147483647, 'Bank Of Ghana', 'Accra'),
(18, 'adfhahdfk', '0312-03-12', 'Male', 12312312, 31231, 'address', 'Cleaner', 'Media kit', '2019-05-22', 'Active', 'woyeri@gmail.com', '123456789', 1000, 20, 10, 1010, 'kelly hadnson', 123121133, 'Bank Of Ghana', 'Accra'),
(53846920, 'god', '2019-06-06', 'Male', 312123, 2312, 'bb', 'Human Resource Manager', 'Fire', '2019-06-21', 'Active', 'god@gmail.com', '1234567890', 1000, 20, 2, 1018, 'Joyce blessing', 2147483647, 'Bank Of Ghana', 'Accra'),
(96420518, 'name', '2019-06-06', 'Male', 247442023, 212123544, 'address', 'Human Resource Manager', 'Media kit', '2019-06-06', 'Active', 'name@gmail.om', '123456789', 2000, 25, 10, 2015, 'name', 2147483647, 'Bank Of Ghana', 'Accra');

-- --------------------------------------------------------

--
-- Table structure for table `payslip`
--

CREATE TABLE `payslip` (
  `id` int(11) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `month` varchar(255) NOT NULL,
  `allowance` varchar(255) NOT NULL,
  `allowance_2` varchar(255) NOT NULL,
  `allow_amnt` int(100) DEFAULT NULL,
  `allow_amnt_2` int(100) DEFAULT NULL,
  `total_allow` int(255) DEFAULT NULL,
  `deduction` varchar(255) NOT NULL,
  `deduction_2` varchar(255) DEFAULT NULL,
  `deduct_amnt` int(100) DEFAULT NULL,
  `deduct_amnt_2` int(100) DEFAULT NULL,
  `total_deduct` int(100) DEFAULT NULL,
  `basic` int(255) DEFAULT NULL,
  `net_salary` int(100) DEFAULT NULL,
  `pay_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `slip_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payslip`
--

INSERT INTO `payslip` (`id`, `employee`, `department`, `year`, `month`, `allowance`, `allowance_2`, `allow_amnt`, `allow_amnt_2`, `total_allow`, `deduction`, `deduction_2`, `deduct_amnt`, `deduct_amnt_2`, `total_deduct`, `basic`, `net_salary`, `pay_method`, `status`, `comments`, `slip_date`) VALUES
(8, 'Hanson Kelly', 'Teachers', 2019, 'January', 'Monthly Allowance', 'Fueling', 0, 0, 221, 'Monthly Tax Deduction', 'Crash', 0, 33, 45, 1000, 1176, 'cash', 'paid', 'kjh', '2019-05-20'),
(9, 'Robert God', 'Driver', 2019, 'March', 'Accident', 'Fueling', 250, 10, 260, '', 'Over speeding', 30, 12, 42, 5000, 5218, 'cash', 'paid', '', '2019-05-21'),
(10, 'Toyboi', 'Teachers', 2019, 'May', 'HRA', 'Extra classes', 1, 30, 31, '', 'Over speeding', 1, 5, 6, 1201, 1226, 'bank', 'unpaid', 'kjladf', '2019-05-21'),
(11, 'adfhahdfk', 'Cleaner', 2019, 'May', 'HRA', 'Extra cleaning', 20, 10, 30, '', 'hdskj', 10, 5, 15, 1000, 1015, 'cash', 'paid', 'comment', '2019-05-21'),
(13, 'god', 'Human Resource Manager', 2019, 'January', 'HRA', 'Extra classes', 20, 30, 50, 'Monthly Deduction', 'Crash', 2, 5, 7, 1000, 1043, 'cash', 'paid', '', '2019-06-06'),
(15, 'kofi', 'Human Resource Manager', 2019, 'March', 'HRA', 'house', 25, 30, 55, 'Monthly Deduction', 'kj', 10, 4, 14, 2000, 2041, 'cash', 'paid', '', '2019-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `employee`, `user_role`) VALUES
(1, 'admin@gmail.com', '1234', '', 'admin'),
(2, 'user@gmail.com', 'asdfghjk', 'Hanson Kelly', 'user'),
(4, 'domain@gmail.com', '1234567890', '', 'user'),
(6, 'random@gmail.com', 'emission', 'Random Sampling', 'user'),
(7, 'res@fjkj.com', '1234567890', 'ghjghjgjghjg', 'user'),
(8, 'robert.god@gmail.com', 'emission', 'Robert God', 'user'),
(9, 'toyboi@gmail.com', '1234567890', 'Toyboi', 'user'),
(10, 'woyeri@gmail.com', '123456789', 'adfhahdfk', 'user'),
(11, 'god@gmail.com', '1234567890', 'god', 'user'),
(12, 'name@gmail.om', '123456789', 'name', 'user'),
(13, 'name@gmail.om', '123456789', 'name', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`deg_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `payslip`
--
ALTER TABLE `payslip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee` (`employee`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `deg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payslip`
--
ALTER TABLE `payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
