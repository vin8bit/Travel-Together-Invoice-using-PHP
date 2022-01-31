-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2021 at 12:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_together_007`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booker_name` varchar(25) NOT NULL,
  `reg_no` int(10) NOT NULL,
  `guest_name` varchar(25) NOT NULL,
  `guest_mobile_no` varchar(12) NOT NULL,
  `reporting_time` time NOT NULL,
  `package` varchar(20) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `special_inst` text NOT NULL,
  `company` varchar(30) NOT NULL,
  `releasing_date` date NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `pickup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booker_name`, `reg_no`, `guest_name`, `guest_mobile_no`, `reporting_time`, `package`, `payment_mode`, `special_inst`, `company`, `releasing_date`, `vehicle`, `address`, `city`, `pin_code`, `pickup_date`) VALUES
('vineet kumar', 101, 'aryan rai', '8510800127', '23:05:00', '8hr_80km', 'cash', 'i dont know', 'avsk', '2021-02-17', 'sedan', 'f66 jaitpur part 2', 'delhi', 11004, '2021-02-18'),
('aryab', 102, 'aryan rai', '3453534', '23:06:00', '4hr_40km', 'cash', 'df sdf', 'avsk', '2021-02-17', 'ex sedan(verna/honda city)', 'f44', 'jaiypur', 110044, '2021-02-17'),
('rahul', 103, 'nikhil', '5555555555', '15:08:00', 'outstation_package', 'cash', 'sadad asda adad', 'avsk private limited', '2021-02-18', 'suv', 'f66 g dgd dgd g', 'delhi', 10023, '2021-02-19'),
('rahul', 104, 'nikhil', '5555555555', '15:08:00', 'outstation_package', 'cash', 'sadad asda adad', 'avsk private limited', '2021-02-18', 'suv', 'f66 g dgd dgd g', 'delhi', 10023, '2021-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `city_tier`
--

CREATE TABLE `city_tier` (
  `city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_tier`
--

INSERT INTO `city_tier` (`city`) VALUES
('mumbai'),
('delhi'),
('delhi'),
('noida'),
('kolkata'),
('chennai'),
('bengaluru'),
('bengalure'),
('new delhi'),
('vadodara'),
('hyderabad'),
('pune');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(8) NOT NULL,
  `reg_no` int(8) NOT NULL,
  `current_date1` date NOT NULL,
  `releasing_date` date NOT NULL,
  `company` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `booker_name` varchar(25) NOT NULL,
  `vehicle` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `tier` int(2) NOT NULL,
  `package` varchar(20) NOT NULL,
  `package_price` int(5) NOT NULL,
  `extra_hr_fix` int(4) NOT NULL,
  `total_extra_hr` int(8) NOT NULL,
  `driver_allowance` int(5) NOT NULL,
  `extra_km_fix` int(4) NOT NULL,
  `total_extra_km` int(8) NOT NULL,
  `total_km` int(5) NOT NULL,
  `subtotal` int(8) NOT NULL,
  `tax` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `reg_no`, `current_date1`, `releasing_date`, `company`, `address`, `booker_name`, `vehicle`, `city`, `tier`, `package`, `package_price`, `extra_hr_fix`, `total_extra_hr`, `driver_allowance`, `extra_km_fix`, `total_extra_km`, `total_km`, `subtotal`, `tax`, `total`) VALUES
(1, 102, '2021-02-17', '2021-02-17', 'avsk', 'f44', 'aryab', 'ex sedan(verna/honda city)', 'jaiypur', 2, '4hr_40km', 1200, 2, 300, 200, 3, 45, 4, 1745, 87, 1832),
(2, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(3, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(4, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(5, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(6, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(7, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(8, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(9, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(10, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(11, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(12, 103, '2021-02-17', '2021-02-18', 'avsk private limited', 'f66 g dgd dgd g, delhi, 10023', 'rahul', 'suv', 'delhi', 1, 'outstation_package', 2925, 3, 360, 0, 6, 78, 7, 3363, 168, 3531),
(13, 102, '2021-02-17', '2021-02-17', 'avsk', 'f44, jaiypur, 110044', 'aryab', 'ex sedan(verna/honda city)', 'jaiypur', 2, '4hr_40km', 1200, 0, 0, 0, 0, 0, 0, 1200, 60, 1260),
(14, 102, '2021-02-17', '2021-02-17', 'avsk', 'f44, jaiypur, 110044', 'aryab', 'ex sedan(verna/honda city)', 'jaiypur', 2, '4hr_40km', 1200, 0, 0, 0, 0, 0, 0, 1200, 60, 1260),
(15, 102, '2021-02-17', '2021-02-17', 'avsk', 'f44, jaiypur, 110044', 'aryab', 'ex sedan(verna/honda city)', 'jaiypur', 2, '4hr_40km', 1200, 0, 0, 0, 0, 0, 0, 1200, 60, 1260),
(16, 102, '2021-02-17', '2021-02-17', 'avsk', 'f44, jaiypur, 110044', 'aryab', 'ex sedan(verna/honda city)', 'jaiypur', 2, '4hr_40km', 1200, 0, 0, 0, 0, 0, 0, 1200, 60, 1260);

-- --------------------------------------------------------

--
-- Table structure for table `package_price`
--

CREATE TABLE `package_price` (
  `tier` int(1) NOT NULL,
  `vehicle` text NOT NULL,
  `airport` int(5) NOT NULL,
  `4hr_40km` int(5) NOT NULL,
  `8hr_80km` int(5) NOT NULL,
  `outstation_package` int(5) NOT NULL,
  `extra_km` int(5) NOT NULL,
  `extra_hr` int(5) NOT NULL,
  `out_min_hr` int(5) NOT NULL,
  `out_min_km` int(5) NOT NULL,
  `driver_allowance` int(5) NOT NULL,
  `night_allowance` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_price`
--

INSERT INTO `package_price` (`tier`, `vehicle`, `airport`, `4hr_40km`, `8hr_80km`, `outstation_package`, `extra_km`, `extra_hr`, `out_min_hr`, `out_min_km`, `driver_allowance`, `night_allowance`) VALUES
(1, 'sedan', 750, 800, 1400, 2250, 12, 75, 225, 11, 200, 200),
(2, 'sedan', 900, 900, 1450, 2750, 12, 80, 250, 11, 200, 200),
(1, 'ex sedan(verna/honda city)', 1100, 1150, 1750, 2925, 13, 125, 225, 13, 200, 200),
(1, 'suv', 1050, 1100, 1600, 2925, 13, 120, 225, 13, 200, 200),
(1, 'crysta', 1550, 1500, 2250, 3375, 16, 150, 225, 16, 200, 200),
(2, 'suv', 1200, 1200, 1850, 1375, 14, 150, 250, 13, 200, 200),
(2, 'crysta', 1650, 1700, 1400, 3750, 15, 150, 250, 15, 200, 200),
(2, 'ex sedan(verna/honda city)', 1200, 1200, 2000, 4000, 15, 150, 250, 16, 200, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
