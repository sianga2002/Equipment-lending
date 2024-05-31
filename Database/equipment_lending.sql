-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equipment_lending`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equip_id` int(15) NOT NULL,
  `equip_name` varchar(100) NOT NULL,
  `total` int(15) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equip_id`, `equip_name`, `total`, `reg_date`, `user`) VALUES
(3, 'LCD Projector', 12, '2022-06-27 21:00:00', 1),
(4, 'Computer', 6, '2023-06-18 21:00:00', 1),
(5, 'Mouse', 12, '2022-06-28 21:00:00', 1),
(6, 'Keyboard', 12, '2022-06-27 21:00:00', 1),
(7, 'mouse', 20, '2022-07-02 21:00:00', 1),
(8, 'RAM', 12, '2023-06-18 21:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE `lend` (
  `lend_id` int(15) NOT NULL,
  `lend_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `qty_in` int(15) NOT NULL,
  `qty_out` int(15) NOT NULL,
  `user` int(15) NOT NULL,
  `equipment` int(15) NOT NULL,
  `month` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lender`
--

CREATE TABLE `lender` (
  `lender_id` int(15) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'take',
  `user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lender`
--

INSERT INTO `lender` (`lender_id`, `registration_number`, `status`, `user`) VALUES
(1, '1432208/T.20', 'returned', 1),
(3, '14323043/T.20', 'returned', 5),
(4, '14322010/T.21', 'returned', 6),
(5, '14322002/T.20', 'returned', 7),
(6, '14322013/T.20', 'returned', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(15) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `sex` char(1) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student',
  `username` varchar(10) NOT NULL DEFAULT 'mzumbe',
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `phone`, `sex`, `role`, `username`, `password`) VALUES
(1, 'Bernadether', 'Salvatory', '0768726834', 'F', 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'gets', 'Salvatory', '0768726834', 'M', '', 'sam', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Sesilia', 'Chalamila', '0768726834', 'F', 'student', 'mzumbe', ''),
(4, 'Sesilia', 'Chalamila', '0768726834', 'F', 'student', 'mzumbe', ''),
(5, 'Sesilia', 'Chalamila', '0768726830', 'M', 'student', 'mzumbe', ''),
(6, 'Edgar', 'Rutarola', '0712346568', 'M', 'student', 'mzumbe', ''),
(7, 'Bakari', 'Chibu', '0712121212', 'M', 'student', 'mzumbe', ''),
(8, 'Lilian', 'Emmanuel', '0654781034', 'F', 'student', 'mzumbe', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equip_id`),
  ADD KEY `equip_user` (`user`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`lend_id`),
  ADD KEY `lend_user` (`user`),
  ADD KEY `lend_equip` (`equipment`);

--
-- Indexes for table `lender`
--
ALTER TABLE `lender`
  ADD PRIMARY KEY (`lender_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equip_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
  MODIFY `lend_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lender`
--
ALTER TABLE `lender`
  MODIFY `lender_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equip_user` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_equip` FOREIGN KEY (`equipment`) REFERENCES `equipment` (`equip_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lend_user` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `lender`
--
ALTER TABLE `lender`
  ADD CONSTRAINT `lender_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
