-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2021 at 04:24 PM
-- Server version: 8.0.15
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meditech`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `location` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `email`, `phone`, `location`) VALUES
(1, 'Kingori', 'Wangari', 'Cephasmarquis2000@gmail.com', '0746485236', 'fafadffa'),
(3, 'Kingori', 'Wangari', 'Cephasmarquis2w000@gmail.com', '0736631994', 'fafadffa');

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `patient_record_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `symptoms` varchar(1024) NOT NULL,
  `diagnosis` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'CEPHAS', 'WANGARi', 'cephasmarquis2000@gmail.com', '$2y$10$DrQc3/teJbz2bVk5vVMIcu4Zv1NATAmvL22OpgbXHnjxesTlZV14y', 1),
(3, 'Bernadetta', 'wANGARI', 'cephasking@students.uonbi.ac.ke', '$2y$10$Ia5UGA1TAmpIe4Jxz9G6peB5Eha9lXfzUXqvrVIdItoA94dWXNCTK', 1),
(4, 'Kingori', 'Wangari', 'Cephasmarquis2000d@gmail.com', '$2y$10$A6n.XkYSjQwMD6nRTicfSuEzP3lpFlpc78yTsNzRugjx6zvwTGZte', 1),
(7, 'Kingori', 'Wangari', 'Cephasmarquis2w000@gmail.com', '$2y$10$4qvxJQaDYrLJO9SQcdrSS.sBbYBN4Sk5QglGcApCbJB9NQ04jdQq.', 1),
(8, 'Kingori', 'Wangari', 'Cephasmarquis24000@gmail.com', '$2y$10$CGeidg3XrhZ/sedJV2Vgw.SJqwuGj1zhH9gCE9mlqM3lbI9teeIFC', 1),
(9, 'Kingori', 'Wangari', 'Cephasmarquis243000@gmail.com', '$2y$10$ptzrnPxfo..K8BP3oEXVhO5JI/hqdMj2Er1UBWRpt.STOQf/tyqZW', 1),
(10, 'Kingori', 'Wangari', 'Cephasmarquis2430000@gmail.com', '$2y$10$5bPMYBHCyPOMbXnPbI.PNe9neI88R7EKqpbrs0/DWpVr60e7/fKn2', 1),
(11, 'Kingori', 'Wangari', 'Cephasmarquis2430000@gmail.co', '$2y$10$cafIKke1TlAEbEk87o30..jEDES6sl/QCSttWN1bSt/JHKCVcseFq', 1),
(12, 'Kingori', 'Wangari', 'Cephasmarquis2430000@gmail.cog', '$2y$10$jnIQ6ou8y7QAWpqMxjHBBOqaCqWICMgUPXlrTkxBrbW8ZTReMH.KO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `index_patient_email` (`email`),
  ADD UNIQUE KEY `index_patient_phone` (`phone`);

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`patient_record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `index_user_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `patient_record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
