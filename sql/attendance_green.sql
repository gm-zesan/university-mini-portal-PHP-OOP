-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:28 PM
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
-- Database: `attendance_green`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `description`, `created_at`) VALUES
(211, 'lorem ipsum dami text!', '2022-12-12 20:31:00'),
(212, 'lorem ipsum dami text!', '2022-12-12 20:30:44'),
(213, 'lorem ipsum dami text!', '2022-12-12 20:30:51'),
(2018, 'lorem ipsum dami text!', '2022-12-12 20:30:23'),
(2022, 'lorem ipsum dami text!', '2022-12-12 18:21:20'),
(2023, 'lorem ipsum dami text!', '2022-12-12 20:29:42'),
(2032, '', '2024-06-03 16:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_description`) VALUES
(7, 'Software Engineering', 'lorem ipsum dami text'),
(8, 'Web Programming Lab', 'lorem ipsum dami text'),
(9, 'Artificial Intelligence Lab', 'lorem ipsum dami text'),
(10, 'Integrated Project Design 2', 'lorem ipsum dami text'),
(11, 'Web Programming', 'lorem ipsum dami text');

-- --------------------------------------------------------

--
-- Table structure for table `present`
--

CREATE TABLE `present` (
  `p_id` int(11) NOT NULL,
  `present` varchar(255) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `p_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `present`
--

INSERT INTO `present` (`p_id`, `present`, `batch_id`, `class_id`, `p_date`) VALUES
(1, '20180701,20180702,20180703,20180704,20180705', 2018, 7, '2022-12-13'),
(2, '20180701,20180702,20180703,20180704,20180705', 2018, 7, '2022-12-14'),
(3, '20180701,20180702,20180704,20180705', 2018, 7, '2022-12-15'),
(5, '20180801,20180802,20180803,20180804', 2018, 8, '2022-12-12'),
(6, '20180701,20180702,20180703,20180704', 2018, 7, '2022-12-23'),
(7, '20180701,20180703,20180704,20180705', 2018, 7, '2023-12-03'),
(8, '20180701,20180703,20180704', 2018, 7, '2024-05-15'),
(9, '2130801', 213, 8, '2024-05-19'),
(11, '20180701,20180801', NULL, 8, '2024-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_email` varchar(255) DEFAULT NULL,
  `s_father` varchar(255) DEFAULT NULL,
  `s_mother` varchar(255) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `s_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_father`, `s_mother`, `batch_id`, `phone`, `s_password`) VALUES
(2111501, 'tttt', 'kupay@gpah.com', 'tttt', 'tttttt', 211, '0661239687', 'e10adc3949ba59abbe56e057f20f883e'),
(2111502, 'rettd@gmail.com', 'ttsdsd@gpah.com', ' vcx', 'ewdf', 211, '8108786709', 'e10adc3949ba59abbe56e057f20f883e'),
(2130801, 'Zesan', 'zesan@gmail.com', 'UPD3DKUJ5v', 'sRj7rxMlcP', 213, '01921324091', 'e10adc3949ba59abbe56e057f20f883e'),
(20180701, 'Rana Miya', 'abc@gmail.com', 'jolmot', 'kannis', 2018, '07425252522', NULL),
(20180702, 'kasem', NULL, 'billal', 'Monora', 2018, '01866936562', NULL),
(20180703, 'Rajib', NULL, 'Balam', 'Mukta', 2018, '07425252522', NULL),
(20180704, 'Tanim', NULL, 'Kholil', 'Unkhown', 2018, '01921324091', NULL),
(20180705, 'Robil', NULL, 'Unkhown', 'Unkhown', 2018, '07425252567', NULL),
(20180801, 'Hojaifa', NULL, 'aa', 'bbb', 2018, '07425252567', NULL),
(20180802, 'Redoy', NULL, 'Unkhown', 'Unkhown', 2018, '07425252522', NULL),
(20180803, 'Shobuj', NULL, 'Sokot', 'Rojina', 2018, '01624128156', NULL),
(20180804, 'Said', NULL, 'Bablu', 'Aliya', 2018, '01921324091', NULL),
(20180805, 'Juwel', NULL, 'kuddos', 'Unkhown', 2018, '01624128156', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_course_id`, `student_id`, `course_id`) VALUES
(11, 20180701, 8),
(12, 20180701, 9),
(13, 20180701, 10),
(14, 20180801, 8),
(15, 20180801, 11),
(18, 2130801, 11),
(19, 2130801, 7),
(20, 2130801, 8);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_designation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `t_designation`, `password`, `role`, `created_at`) VALUES
(2, 'Admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-11-13 23:50:38'),
(3, 'Farhan', 'farhanmahmud@gmail.com', 'Teacher', 'e10adc3949ba59abbe56e057f20f883e', 0, '2022-11-14 17:17:51'),
(9, 'sappno', 'sappno@gmail.com', 'Teacher', 'c51ce410c124a10e0db5e4b97fc2af39', 0, '2022-11-14 17:32:26'),
(10, 'sad', 'sad@gmail.com', 'Lecturer', 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-05-16 21:24:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- Indexes for table `present`
--
ALTER TABLE `present`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_email` (`t_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2033;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `present`
--
ALTER TABLE `present`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `student_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `present`
--
ALTER TABLE `present`
  ADD CONSTRAINT `present_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `present_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `class` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
