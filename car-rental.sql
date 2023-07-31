-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 07:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_no` varchar(100) NOT NULL,
  `mod_year` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  `charges` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `mail`, `car_name`, `car_no`, `mod_year`, `capacity`, `mileage`, `engine`, `function`, `charges`, `img`, `status`) VALUES
(1, 'gouravjangid285044@gmail.com', 'Toyota RAV4', 'HR36AK6589', '2020', '6', '6.3', 'Gasoline', 'Automatic', 300, 'car-1.jpg', 'Not-Rented'),
(2, 'gouravjangid285044@gmail.com', 'BMW 3 Series', 'UP36AK6589', '2021', '4', '4', 'Diesel', 'Automatic', 350, 'car-2.jpg', 'Rented'),
(3, 'gouravjangid285044@gmail.com', 'Volkswagen T-Cross', 'KP36AM6007', '2022', '3', '6.5', 'Petrol', 'Automatic', 600, 'car-3.jpg', 'Rented'),
(4, 'gouravjangid285044@gmail.com', 'Cadillac Escalade', 'KP46AG6007', '2019', '6', '6.5', 'CNG', 'Automatic', 700, 'car-4.jpg', 'Not-Rented'),
(5, 'gouravjangid305044@gmail.com', 'BMW 4 Series GTI', 'BP87AG77890', '2018', '4', '3.4', 'Petrol', 'Hybrid', 600, 'car-5.jpg', 'Not-Rented'),
(6, 'gouravjangid305044@gmail.com', 'BMW 4 Series', 'PP87AL7700', '2017', '4', '5.4', 'Petrol', 'Hybrid', 450, 'car-6.jpg', 'Not-Rented'),
(7, 'gouravjangid305044@gmail.com', 'Audi', 'PE87AL7700', '2020', '2', '2.4', 'Petrol', 'Hybrid', 700, 'car-7.jpeg', 'Not-Rented'),
(9, 'gouravjangid285044@gmail.com', 'Bolero', 'HK89LP0987', '2025', '8', '7', 'Diesel', 'Manual', 450, '63e8f1eb046e30.10081795.jpeg', 'Not-Rented'),
(10, 'gouravjangid285044@gmail.com', 'Rolls Royce', 'RC67CD0909', '2018', '5', '6', 'Petrol', 'Automatic', 1300, '63e95923d3e530.51532240.png', 'Not-Rented'),
(11, 'gouravjangid285044@gmail.com', 'Thar', 'HK87YH0909', '2022', '7', '8', 'Diesel', 'Automatic', 800, '6442349386e825.62982922.jpeg', 'Not-Rented'),
(12, 'gouravjangid305044@gmail.com', 'Scorpio', 'HM00AG0001', '2023', '8', '11', 'Petrol', 'Automatic', 850, '6442351666b372.08078831.jpeg', 'Not-Rented'),
(13, 'gouravjangid305044@gmail.com', 'Bolero', 'GH09HJ0987', '2020', '9', '14', 'Diesel', 'Manual', 600, '6442356437bb19.06707422.jpeg', 'Not-Rented'),
(14, 'gouravjangid305044@gmail.com', 'McLaren', 'MC00MM0101', '2023', '2', '6', 'Diesel', 'Automatic', 2500, '6442364464fcc3.38793067.jpeg', 'Not-Rented');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id2` int(11) NOT NULL,
  `car_no` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id2`, `car_no`, `payment_id`, `payment_mode`, `payment_status`) VALUES
(2, 2, 'Payment-644221c47c57b', 'PhonePe', 'Success'),
(3, 3, 'Payment-6442318a733f6', 'Paytm', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `car` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rented`
--

INSERT INTO `rented` (`id`, `mail`, `car`, `days`, `date`, `price`) VALUES
(10, 'gouravjangid285044@gmail.com', '2', '3', '2023-04-13', 350),
(11, 'gouravjangid275044@gmail.com', '3', '4', '2023-04-06', 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `field` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `field`, `time`, `status`, `token`) VALUES
(1, 'gouravjangid285044@gmail.com', '84101c83eea6539b18ee9f4bad03a52c', 'agency', '0000-00-00 00:00:00', 'verified', ''),
(2, 'gouravjangid305044@gmail.com', '1c4eb56ad79d5326d9ca42d75e5b64a3', 'agency', '0000-00-00 00:00:00', 'verified', ''),
(3, 'gouravjangid275044@gmail.com', '71211812cb9d5c444aa0a2994df1ad7e', 'customer', '0000-00-00 00:00:00', 'verified', ''),
(13, 'gouravjangid285044@gmail.com', '71211812cb9d5c444aa0a2994df1ad7e', 'customer', '2023-02-13 02:07:55', 'verified', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id2`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rented`
--
ALTER TABLE `rented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
