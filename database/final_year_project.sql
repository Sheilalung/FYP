-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 04:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_year_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_phonenum` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_notes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_dob`, `admin_phonenum`, `admin_password`, `admin_notes`) VALUES
(1, 'Sheila', 'sheilachong104050220@gmail.com', '2000-10-17', '0164050220', 'FYPdlbs2021', 'I\'m short and cute');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `reply_msg` varchar(1000) NOT NULL,
  `msg_to` varchar(100) NOT NULL,
  `msg_from` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `reply_msg`, `msg_to`, `msg_from`) VALUES
(0, 'Your driving lesson schedule has been approved by the admin. Pls, attend rearranged schedule for your driving lesson packages.', 'Wong Wong', 'Sheila');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_nric` varchar(22) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phonenum` varchar(20) NOT NULL,
  `user_location` varchar(500) NOT NULL,
  `user_learner` varchar(10) DEFAULT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_password_2` varchar(100) DEFAULT NULL,
  `user_name_2` varchar(100) NOT NULL,
  `tnc1` varchar(10) DEFAULT NULL,
  `tnc2` varchar(10) DEFAULT NULL,
  `user_dri` varchar(500) NOT NULL,
  `user_packages` varchar(500) NOT NULL,
  `instructor` varchar(10) NOT NULL,
  `transportation_service` varchar(10) NOT NULL,
  `lesson_start_date` varchar(50) NOT NULL,
  `ava_time` varchar(50) NOT NULL,
  `user_notes` varchar(1000) NOT NULL,
  `ava_days` varchar(100) NOT NULL,
  `location_city` varchar(100) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `location_state` varchar(100) NOT NULL,
  `name_card` varchar(100) NOT NULL,
  `card_num` varchar(20) NOT NULL,
  `card_exp_month` varchar(10) NOT NULL,
  `card_exp_year` varchar(10) NOT NULL,
  `CVC` varchar(10) NOT NULL,
  `user_notes_update` varchar(1000) NOT NULL,
  `user_subject` varchar(100) NOT NULL,
  `user_message` varchar(1000) NOT NULL,
  `message_notify` varchar(5) DEFAULT NULL,
  `update_notify` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_nric`, `user_dob`, `user_gender`, `user_email`, `user_phonenum`, `user_location`, `user_learner`, `user_password`, `user_password_2`, `user_name_2`, `tnc1`, `tnc2`, `user_dri`, `user_packages`, `instructor`, `transportation_service`, `lesson_start_date`, `ava_time`, `user_notes`, `ava_days`, `location_city`, `postal_code`, `location_state`, `name_card`, `card_num`, `card_exp_month`, `card_exp_year`, `CVC`, `user_notes_update`, `user_subject`, `user_message`, `message_notify`, `update_notify`) VALUES
(1, 'Wong ', '001212-14-1017', '2000-12-12', 'Male', 'wong@imail.sunway.edu.my', '012-3456789', 'NO 81A, JALAN BUNGA RAYA 85000 KUALA LUMPUR', 'yes', 'wong123', '', 'Wong Wong', 'agree', 'agree', 'Surfine Hitech Sdn. Bhd', 'Class DA (Car-Automatic)', 'chinese', 'yes', '2022-01-03', '10:30', 'Selected weekday available on 10.30 am\r\nWeekend available on 8.30 am ', 'Friday,Saturday,Sunday', 'KUALA LUMPUR', '85000', 'KUALA LUMPUR', 'Wong Wong', '1234123456785678', 'September', '2024', '294637c269', 'Weekday lesson have to cancel due to working, only available on weekend. ', '', '', NULL, '1'),
(2, 'Adrian', '010117-14-1017', '2001-01-17', 'Male', 'adrian@gmail.com', '017-3456789', '9, JALAN SL 9/9F BANDAR SUNGAI LONG 43000 KAJANG SELANGOR', 'no', 'adrian0117', '', 'Adrian Kok ', 'agree', 'agree', 'Metro Driving Academy', 'Class D (Car-Manual)', 'malay', 'yes', '2022-02-07', '10:30', 'Friday to Sunday available on 10.30 am', 'Friday,Saturday,Sunday', 'SUNGAI LONG', '43000', 'Selangor', 'Adrain Kok', '1234567812345678', 'October', '2024', 'bb602aa6eb', 'Only available on weekend 10.30 am', 'lorem ipusm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vis_id` int(11) NOT NULL,
  `vis_name` varchar(100) NOT NULL,
  `vis_email` varchar(50) NOT NULL,
  `vis_subject` varchar(500) NOT NULL,
  `vis_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vis_id`, `vis_name`, `vis_email`, `vis_subject`, `vis_message`) VALUES
(0, 'Wong', 'wong20@imail.sunway.edu.my', 'When can get reply after make a lesson booking? ', 'Can I know how many days can get reply after making a lesson booking?'),
(1, 'Katherine', 'kath1999@gmail.com', 'Can I make a lesson booking without register? ', 'I see the booking have to register an acc first, can I skip it? ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`vis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
