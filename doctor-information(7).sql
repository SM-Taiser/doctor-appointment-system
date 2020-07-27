-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 08:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor-information`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `admin_email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `admin_email`, `password`, `phone`, `address`, `email_verified`) VALUES
(4, '', 'Admin', 'taiser@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '22', '22', 'Yes'),
(5, 'sm', 'rahim', 'admin@gmail.com', '123456', '123', 'gec', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `amb_comp_id` int(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `ambulance_email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area_coverage` text NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` int(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_verified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`amb_comp_id`, `comp_name`, `ambulance_email`, `city`, `area_coverage`, `password`, `phone`, `address`, `email_verified`) VALUES
(1, 'alif hospital', 'smtaiser123@gmail.com', 'Dhaka', 'uttora,gazipur', 'd41d8cd98f00b204e9800998ecf8427e', 33, 'uttora', 'YES'),
(2, 'cscr', 'smtaiser0@gmail.com', 'Chittagong', 'gec,2no-gate', '202cb962ac59075b964b07152d234b70', 444, 'Golpahar,ctg', 'YES'),
(3, 'Max', 'smtaiser@gmail.com', 'Chittagong', 'gec,2no-gate,wasa,golpahar,mehedibag,jj', '202cb962ac59075b964b07152d234b70', 123, 'mehedibag', 'YES'),
(4, 'cscr', 'smtaiser0@gmail.com', 'Chittagong', 'gec,2no-gate', '202cb962ac59075b964b07152d234b70', 444, 'Golpahar,ctg', ''),
(5, 'CMC', 'smtaiser1@gmail.com', 'Chittagong', 'gec,2no-gate', '202cb962ac59075b964b07152d234b70', 123, 'provortoc', 'YES'),
(6, 'Al amin ', 'smtaiser@gmail.com', 'Chittagong', 'gec,2no-gate', 'e10adc3949ba59abbe56e057f20f883e', 1689414141, 'Fatehabad,ctg', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `chamb_id` int(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `id`, `chamb_id`, `day`, `time`) VALUES
(54, 64, 5, 'Sat,Sun,Mon,Tue,Fri', '9.15am,9.30am,9.45am,10am,11.30am,11.45am'),
(55, 70, 27, 'Sat,Sun,Mon,Fri', '9.15am,9.30am,8.45pm,9.00pm'),
(56, 69, 25, 'Sat,Sun,Mon', '9.15am,9.30am,9.45am,10am,10.15am,10.30am,10.45am,11.00am,11.15am,11.30am,11.45am,12.00pm,12.15pm,12.30pm,12.45pm,1.00pm,1.15pm,1.30pm,1.45pm,2.00pm,2.15pm,2.30pm,2.45pm,3.00pm,3.15pm,3.30pm,3.45pm,4.00pm,4.15pm,4.30pm,5.45pm,6.00pm,6.30pm,6.45pm,7.30pm,8'),
(58, 71, 29, 'Sat,Sun,Mon', '5.30pm,5.45pm'),
(59, 71, 29, 'Sat,Mon', '9.45am,10am'),
(61, 71, 29, 'Thu,Fri', '11.45am,1.15pm,1.30pm'),
(62, 71, 0, 'Sat', '9.15am'),
(64, 71, 0, 'Sat', '9.15am'),
(65, 71, 30, 'Sat,Sun,Tue', '9.15am,9.30am'),
(66, 71, 32, 'Sat,Fri', '9.15am,9.30am,12.30pm'),
(67, 73, 33, 'Sat,Mon,Tue', '9.15am,9.30am,7.15pm,7.30pm'),
(68, 74, 34, 'Sat,Mon,Wed', '10am,10.15am,10.30am,11.45am,12.00pm,1.15pm,1.30pm'),
(69, 75, 35, 'Wed,Thu', '8.00pm,8.15pm,8.30pm,8.45pm,9.00pm'),
(70, 76, 36, 'Sun,Mon', '9.30am,9.45am,10am,10.15am'),
(71, 77, 37, 'Tue,Wed,Thu', '9.30am,9.45am,10am,10.15am'),
(72, 71, 38, 'Sat,Wed,Fri', '11.00am,11.15am,11.30am,7.15pm'),
(73, 82, 40, 'Sun,Mon', '9.45am,10am');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_schedule`
--

CREATE TABLE `appointment_schedule` (
  `schedule_id` int(11) NOT NULL,
  `chamb_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_schedule`
--

INSERT INTO `appointment_schedule` (`schedule_id`, `chamb_id`, `patient_id`, `doctor_id`, `date`, `day`, `time`, `is_read`) VALUES
(46, 37, 33, 77, '2018-03-13', 'Tue', '9.30am', 1),
(50, 35, 33, 75, '2018-04-29', 'Wed', '8.15pm', 1),
(51, 37, 17, 77, '2018-04-03', 'Tue', '9.30am', 0),
(52, 37, 17, 77, '2018-04-03', 'Tue', '9.45am', 1),
(53, 37, 17, 77, '2018-04-03', 'Tue', '9.45am', 0),
(54, 30, 17, 71, '2018-04-03', 'Tue', '9.15am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `donor_email` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `blood_grp` varchar(111) NOT NULL,
  `area_coverage` varchar(255) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `ready_to_donate` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL,
  `is_active` varchar(111) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `name`, `donor_email`, `city`, `blood_grp`, `area_coverage`, `password`, `phone`, `address`, `ready_to_donate`, `age`, `email_verified`, `is_active`) VALUES
(18, 'mr.kamal', '1taiser@gmail.com', 'Chittagong', 'A-', 'gec,2no-gate', '202cb962ac59075b964b07152d234b70', '1234', 'gec', 'No', 19, 'YES', 'YES'),
(19, 'mr.kamalbhk', '2taiser@gmail.com', 'Barisal', 'A+', '', 'bcbe3365e6ac95ea2c0343a2395834dd', '1235679', 'dddhf', '', 0, 'YES', ''),
(20, 'mr.Rahim', '3taiser@gmail.com', 'Rajshahi', 'B+', '', '310dcbbf4cce62f762a2aaa148d556bd', '4444', 'fffff', '', 0, 'YES', ''),
(23, 'juwel', 'juwel@gmail.com', 'Chittagong', 'A+', 'gec,wasa', '202cb962ac59075b964b07152d234b70', '123', 'muradpur,gec,2nogate', 'No', 30, 'YES', 'YES'),
(24, 'Md.Jamil', '11taiser@gmail.com', 'Chittagong', 'B-', 'bahaddarhat,chandgao', '698d51a19d8a121ce581499d7b701668', '1234', 'muradpur', 'Yes', 23, 'YES', 'YES'),
(25, 'Mr.Tariqul', 'ishan@gmail.com', '', 'A+', 'gec,2no-gate,wasa,golpahar,mehedibag,', '202cb962ac59075b964b07152d234b70', '123', 'wasa', 'No', 24, 'YES', 'YES'),
(29, 'mijan', 'smtaiser00@gmail.com', 'Chittagong', 'A+', 'ss', 'e10adc3949ba59abbe56e057f20f883e', '33', 'ss', 'Yes', 33, 'YES', 'yes'),
(30, 'S.M Taiser', 'smtaiser123@gmail.com', 'Chittagong', 'B+', 'gec,2no-gate,wasa,golpahar', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'Fatehabad,ctg', 'Yes', 24, 'YES', 'yes'),
(31, 'S.M Taiser', 'smtaiser123@gmail.com', 'Chittagong', 'B+', 'gec,2no-gate', 'e10adc3949ba59abbe56e057f20f883e', '11111111111111111111111111111111111111', 'ssssssss', 'Yes', 123, 'YES', 'yes'),
(32, 'sm taiser', 'smtaiser1@gmail.com', 'Dhaka', 'B+', 'uuu,ddd', 'e10adc3949ba59abbe56e057f20f883e', '01689414141', 'eeeeeeeee', 'Yes', 12222, 'YES', 'yes'),
(33, 'sm taiser', 'smtaiser1@gmail.com', 'Dhaka', 'B+', 'uuu,ddd', 'e10adc3949ba59abbe56e057f20f883e', '01689414141', 'eeeeeeeee', 'Yes', 12222, 'YES', 'yes'),
(34, 'sm taiser', 'smtaiser1@gmail.com', 'Dhaka', 'B+', 'uuu,ddd', 'e10adc3949ba59abbe56e057f20f883e', '01689414141', 'eeeeeeeee', 'Yes', 12222, 'YES', 'yes'),
(35, 'sm taiser', 'smtaiser123@gmail.com', 'Chittagong', 'A-', 'uttara,bashundora', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'uttora', 'Yes', 18, 'YES', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chambers`
--

CREATE TABLE `chambers` (
  `chamb_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `chamber_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chambers`
--

INSERT INTO `chambers` (`chamb_id`, `id`, `chamber_name`, `address`) VALUES
(4, 61, 'Chamber 1', 'Shevron'),
(5, 64, 'max', 'mehedibag'),
(10, 17, 'd', 'd'),
(11, 17, 'c1', 'ctg'),
(18, 62, 'chamber 1', 'cscr'),
(23, 63, 'cscr', 'probortoc'),
(27, 70, 'cmc', 'ctg'),
(30, 71, 'max hospital', 'mehedibag'),
(31, 64, 'epic', 'mehedibag'),
(32, 71, 'Chittagong medical college hospital', 'chittagong'),
(33, 73, 'LabAid', 'Dhanmondi'),
(34, 74, 'Appolo Hospitals Dhaka', 'dhaka'),
(35, 75, 'Max', ' mehedibag'),
(36, 76, 'M-O-SHISHU', 'Agrabad'),
(37, 77, 'LabAid', 'dhanmondi'),
(38, 71, 'National Hospital Chittagong', 'Chittagong'),
(39, 71, 'Chittagong medical college hospital', 'probortoc'),
(40, 82, 'ffhhh', 'cccfffff');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name`, `email`, `phone`, `msg`) VALUES
(1, 'S.M Taiser', 'smtaiser123@gmail.com', 1878152754, 'ssssssssssssssssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `day_off`
--

CREATE TABLE `day_off` (
  `day_off_id` int(255) NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `chamb_id` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_off`
--

INSERT INTO `day_off` (`day_off_id`, `doctor_id`, `chamb_id`, `date`) VALUES
(1, 73, 33, '2018-03-05'),
(6, 73, 33, '2018-03-03'),
(7, 73, 33, '2018-03-06'),
(9, 71, 30, '2018-03-06'),
(10, 71, 38, '2018-03-02'),
(11, 71, 38, '2018-03-03'),
(12, 71, 32, '2018-03-03'),
(13, 71, 30, '2018-03-03'),
(14, 71, 30, '2018-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `degree` text NOT NULL,
  `designation` varchar(80) NOT NULL,
  `category` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `visiting_fee` int(5) NOT NULL,
  `bmdc_reg_no` int(11) NOT NULL,
  `confirm` int(11) NOT NULL DEFAULT '0',
  `is_active` varchar(10) NOT NULL DEFAULT 'Yes',
  `email_verified` varchar(111) DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `pic`, `city`, `degree`, `designation`, `category`, `email`, `password`, `phone`, `address`, `gender`, `visiting_fee`, `bmdc_reg_no`, `confirm`, `is_active`, `email_verified`) VALUES
(71, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Dhaka', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Neurologist', 'smtaiser123@gmail.com', '202cb962ac59075b964b07152d234b70', '018781527544', 'Fatehabad,ctg', 'male', 600, 0, 1, 'Yes', 'YES'),
(73, 'Dr.Asad', '1519379444doctor_yis5gg.png', 'Dhaka', 'ggg', 'Assistant Professor , Department of medicine,DMC', 'Medicine', 'smtaiser1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'malibag', 'male', 600, 0, 1, 'Yes', 'YES'),
(74, 'Dr.kibria', '1519379560doctor_yis5gg.png', 'Dhaka', 'ggg', 'Medical officer Professor , Department of medicine', 'Medicine', 'smtaiser12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'uttora', 'male', 600, 0, 1, 'Yes', 'YES'),
(75, 'Dr. Mohammed Sakib', '1519379863doctor_yis5gg.png', 'Chittagong', 'ff', 'Assistant Professor , Department of medicine,cmc', 'Medicine', 'smtaiser1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 'gec', 'male', 600, 0, 1, 'Yes', 'YES'),
(76, 'Dr. Mohammed Hasan', '1519380012doctor_yis5gg.png', 'Chittagong', 'ff', 'Medical Officer , Department of cardiology,cmc', 'Cardiology', 'hasan123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'gec', 'male', 600, 0, 1, 'Yes', 'YES'),
(77, 'Dr.Md.Masum', '1519394520doctor_yis5gg.png', 'Dhaka', 'MBBS,D-Card (NICVD).', 'professor dept of MedicineDMC,', 'Medicine', 'masum123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', ',Boshundora,dhaka', 'male', 700, 0, 1, 'Yes', 'YES'),
(78, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Dhaka', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Neurologist', 'smtaiser123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '018781527544', 'Fatehabad,ctg', 'male', 600, 22222, 1, 'Yes', 'YES'),
(80, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Khulna', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Neurologist', 'smtaiser3@gmail.com', '670b14728ad9902aecba32e22fa4f6bd', '01817788247', 'ggk', 'male', 600, 22222, 1, 'Yes', 'YES'),
(82, 'S.M Taiser', '1522047416epic.jpg', 'Rajshahi', 'mbbs', 'MBBS (DMC), MD (Cardiology).', 'Nefrologist', 'smtaiser@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01840850300', 'probortoc', 'male', 600, 77, 1, 'Yes', 'YES'),
(84, 'Shamim', '1522324339doctor_yis5gg.png', 'Dhaka', 'mbbs,frcs', 'Medical Officer , Department of cardiology', 'Cardiology', 'shamim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'Fatehabad,ctg', 'male', 600, 0, 1, 'Yes', 'YES'),
(107, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Dhaka', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Cardiology', 'smtaiser123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '018781527544', 'Fatehabad,ctg', 'male', 600, 0, 1, 'Yes', 'YES'),
(108, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Dhaka', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Cardiology', 'smtaiser123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '018781527544', 'Fatehabad,ctg', 'male', 600, 0, 1, 'Yes', 'YES'),
(109, 'Dr.Rahim', '1518353710doctor_yis5gg.png', 'Dhaka', 'uttora,banani,hhhhhhhh,jjjjjjjjj', 'MBBS (DMC), MD (Cardiology).', 'Cardiology', 'smtaiser123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '018781527544', 'Fatehabad,ctg', 'male', 600, 0, 1, 'Yes', 'YES'),
(110, 'taiser', '1522331533doctor_yis5gg.png', 'Rajshahi', 'MBBS,FCPS', 'Medical Officer', 'Cardiology', 'shamim1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'Fatehabad,ctg', 'male', 700, 0, 0, 'Yes', 'YES'),
(111, 'S.M Taiser', '1522335121doctor_yis5gg.png', 'Chittagong', 'mbbs', 'MBBS (DMC), MD (Cardiology).', 'Alergy_immunology', 'smtaiser12377@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'Fatehabad,ctg', 'male', 600, 0, 0, 'Yes', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(111) NOT NULL,
  `amb_comp_id` int(111) NOT NULL,
  `ambulance_no` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `email_verified` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `amb_comp_id`, `ambulance_no`, `driver_name`, `specification`, `email`, `phone`, `address`, `availability`, `email_verified`) VALUES
(1, 0, '11', 'fffghn', 'NonAc', 'smtaiser123@gmail.com', '1133444', 'uuuin', 'Yes', 'Yes'),
(9, 2, '33', 'ss', 'ff', 'smtaiser01@gmail.com', '123', 'ss', 'Yes', ''),
(10, 2, '11', 'fffghn', 'NonAc', 'smtaiser123@gmail.com', '1133444', 'uuuin', 'Yes', 'Yes'),
(13, 5, '11', 'fffghn', 'NonAc', 'smtaiser123@gmail.com', '1133444', 'uuuin', 'Yes', 'Yes'),
(14, 5, '11', 'fffghn', 'NonAc', 'smtaiser123@gmail.com', '1133444', 'uuuin', 'Yes', 'Yes'),
(15, 5, '12223', 'rahim', 'Freezing', 'smtaiser0@gmail.com', '1234567', 'ff', 'Yes', 'Yes'),
(16, 5, '3333335', 'ssssssss', 'ICU', 'smtaiser1@gmail.com', '01878152754', 'gec,ctg', 'No', 'Yes'),
(17, 5, '444', 'ssssssss', 'Ac', 'smtaiser1@gmail.com', '01878152754', 'Fatehabad,ctg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `new_doctor_request`
--

CREATE TABLE `new_doctor_request` (
  `new_doctor_request_id` int(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `bmdc_reg_no` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `visiting_fee` int(255) NOT NULL,
  `confirmation` int(255) NOT NULL DEFAULT '0',
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_doctor_request`
--

INSERT INTO `new_doctor_request` (`new_doctor_request_id`, `date`, `name`, `pic`, `city`, `bmdc_reg_no`, `designation`, `email`, `category`, `phone`, `address`, `gender`, `visiting_fee`, `confirmation`, `degree`) VALUES
(47, '2018-03-29 18:00:00', 'fffff', '3', 'cc', '1111', 'ddddd', 's@gmail.com', 'sssss', 111, 'sssssss', 'male', 2222, 0, 'ssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `patient_email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) NOT NULL DEFAULT 'yes',
  `is_active` varchar(11) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `patient_email`, `password`, `phone`, `address`, `email_verified`, `is_active`) VALUES
(10, 'fahim', '1taiser@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', '01878152754', 'ddmn', 'yes', 'YES'),
(12, 'jjk', '4taiser@gmail.com', '550a141f12de6341fba65b0ad0433500', '01878152754', 'd', 'yes', 'YES'),
(15, 'taiser ', '6taiser@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53', '01878152754', 'ffikmm', 'yes', 'YES'),
(17, 'rahim', 'smtaiser123@gmail.com', '202cb962ac59075b964b07152d234b70', '01878152754', 'gecm', 'yes', 'yes'),
(18, 'hhh', '11taiser@gmail.com', '202cb962ac59075b964b07152d234b70', '01878152754', 'aa', 'yes', 'yes'),
(19, 'hhh', '22taiser@gmail.com', '2cfd4560539f887a5e420412b370b361', '01878152754', 'aa', 'yes', 'yes'),
(33, 'rr', 'smtaiser@gmail.com', '202cb962ac59075b964b07152d234b70', '01840850300', 'ff', 'yes', 'yes'),
(34, 'Jahed', 'smtaiser00@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01878152754', 'gec', 'yes', 'yes'),
(35, 'jjj', 'smtaiser111@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '33', 'dd', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `patients_info`
--

CREATE TABLE `patients_info` (
  `p_id` int(11) NOT NULL,
  `id` varchar(11) NOT NULL,
  `file` text NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients_info`
--

INSERT INTO `patients_info` (`p_id`, `id`, `file`, `description`) VALUES
(2, '15', '15141805509', ''),
(3, '15', '1514180878', ''),
(9, '17', '1517915777IT_forum.jpg', 'it'),
(11, '17', '1519036389New Doc 2018-01-11 (4).pdf', 'gg'),
(12, '34', '1519036892New Doc 2018-01-11 (4).pdf', 'gg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `schedule_id`, `patient_id`, `doctor_id`, `transaction_id`, `date`) VALUES
(48, 600, 48, 33, 71, '4444444', '2018-03-13'),
(50, 600, 50, 33, 75, '44444444', '2018-03-14'),
(51, 700, 51, 17, 77, '1A2B3C4D5E', '2018-04-03'),
(52, 700, 52, 17, 77, '1A2B3C4D5E', '2018-04-03'),
(53, 700, 53, 17, 77, '1A2B3C4D5E', '2018-04-03'),
(54, 600, 54, 17, 71, '1A2B3C4D5E', '2018-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(255) NOT NULL,
  `doctor_id` int(255) NOT NULL,
  `patient_id` int(255) NOT NULL,
  `rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `doctor_id`, `patient_id`, `rating`) VALUES
(115, 77, 17, 4),
(118, 75, 33, 3),
(119, 71, 33, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`amb_comp_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_schedule`
--
ALTER TABLE `appointment_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambers`
--
ALTER TABLE `chambers`
  ADD PRIMARY KEY (`chamb_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `day_off`
--
ALTER TABLE `day_off`
  ADD PRIMARY KEY (`day_off_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `new_doctor_request`
--
ALTER TABLE `new_doctor_request`
  ADD PRIMARY KEY (`new_doctor_request_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients_info`
--
ALTER TABLE `patients_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `amb_comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `appointment_schedule`
--
ALTER TABLE `appointment_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `chambers`
--
ALTER TABLE `chambers`
  MODIFY `chamb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `day_off`
--
ALTER TABLE `day_off`
  MODIFY `day_off_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `new_doctor_request`
--
ALTER TABLE `new_doctor_request`
  MODIFY `new_doctor_request_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `patients_info`
--
ALTER TABLE `patients_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
