-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 07:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `branch_id`, `img_url`, `name`, `email`, `address`, `phone`, `x`) VALUES
(72, 0, 'uploads/favicon7.png', 'Mr. Accountant', 'accountant@dms.com', 'New York, USA', '+9975 6765 7654', ''),
(76, 4, '', 'bbcbcvbvbv cxbcbvcb', 'gtrrrytr@rggfg.com', '43424443434', '2344434', ''),
(77, 4, '', 'bbcbcvbvbv cxbcbvcb', 'eerr@erer.com', '4442433434', '34343434', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `date_app` date NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `s_time` varchar(100) NOT NULL,
  `e_time` varchar(100) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `add_date` date NOT NULL,
  `s_time_key` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `branch_id`, `patient`, `doctor_id`, `date_app`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `s_time_key`) VALUES
(75, 3, '164', 118, '0000-00-00', '01:15 PM A 01:15 PM', '01:15 PM', '01:15 PM', 'dfdfdf', '2006-06-17', '159'),
(74, 3, '164', 116, '0000-00-00', '01:15 PM A 01:30 AM', '01:15 PM', '01:30 AM', '', '2006-06-17', '159'),
(72, 3, '165', 118, '0000-00-00', '01:15 AM A 01:15 AM', '01:15 AM', '01:15 AM', '4343', '2006-06-17', '15'),
(73, 3, '164', 118, '0000-00-00', '01:45 AM A 01:15 PM', '01:45 AM', '01:15 PM', '43434', '2006-06-17', '21');

-- --------------------------------------------------------

--
-- Table structure for table `bankb`
--

CREATE TABLE `bankb` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(256) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `x` varchar(10) NOT NULL,
  `y` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `address`, `description`, `x`, `y`) VALUES
(3, 'test111', '446 46546 ', '<p>test111</p>\r\n', '', ''),
(4, 'fsdfsfsf', 'fsdfsfsf111', '<p>dfdsfdsfsf</p>\r\n', '', ''),
(5, '11111111', '22222211', '<p>3333333333333</p>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(127) DEFAULT NULL,
  `address` text,
  `country` varchar(127) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(64) DEFAULT NULL,
  `file_company_logo` varchar(256) DEFAULT NULL,
  `file_report_logo` varchar(256) DEFAULT NULL,
  `file_report_background` varchar(256) DEFAULT NULL,
  `report_footer` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `address`, `country`, `city`, `state`, `zip`, `file_company_logo`, `file_report_logo`, `file_report_background`, `report_footer`) VALUES
(1, 'Pata Corporation', 'C-20,JAkir Hossain Road,Block-E, Md-pur', 'US', 'PArk', 'NY', '1212', NULL, NULL, NULL, 'footer content XXXXXXXXX XXXXXXX');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Ã…land Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'CÃ´te D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint BarthÃ©lemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `x` varchar(10) NOT NULL,
  `y` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `x`, `y`) VALUES
(12, 'Cardiology', '<p>This department provides medical care to patients who have problems with their heart or circulation. It treats people on an inpatient and outpatient basis. </p>\n', '', ''),
(15, 'Diagnostic imaging', 'Formerly known as X-ray, this department provides a full range of diagnostic imaging services including:\n\n', '', ''),
(17, 'Ear nose and throat (ENT)', 'Ear nose and throat (ENT)\nThe ENT department provides care for patients with a variety of problems, including:\ngeneral ear, nose and throat diseases\nneck lumps\ncancers of the head and neck area\ntear duct problems\nfacial skin lesions\nbalance and hearing disorders\nsnoring and sleep apnoea\nENT allergy problems\nsalivary gland diseases\nvoice disorders.\n', '', ''),
(20, 'General surgery', 'The general surgery ward covers a wide range of surgery.', '', ''),
(23, 'Maternity departments', 'Women now have a choice of who leads their maternity care and where they give birth. Care can be led by a consultant, a GP or a midwife.\n\n', '', ''),
(24, 'Microbiology', 'The microbiology department looks at all aspects of microbiology, such as bacterial and viral infections.\n\n', '', ''),
(26, 'Nephrology', 'This department monitors and assesses patients with kidney (renal) problems.\n', '', ''),
(27, 'Neurology', 'This unit deals with disorders of the nervous system, including the brain and spinal cord. It''s run by doctors who specialise in this area (neurologists) and their staff.\n\n', '', ''),
(28, 'Nutrition and dietetics', 'Trained dieticians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics, forming part of a multidisciplinary team.\n\n', '', ''),
(32, 'Occupational therapy', 'This profession helps people who are physically or mentally impaired, including temporary disability after medical treatment. It practices in the fields of both healthcare and social care.\n\n', '', ''),
(33, 'Oncology', 'This department provides radiotherapy and a full range of chemotherapy treatments for cancerous tumours and blood disorders.\n\n', '', ''),
(34, 'Ophthalmology', 'Eye departments provide a range of ophthalmic services for adults and children,\n\n', '', ''),
(35, 'Orthopaedics', 'Orthopaedic departments treat problems that affect your musculoskeletal system. That''s your muscles, joints, bones, ligaments, tendons and nerves.\n\n', '', ''),
(36, 'Pain management clinics', 'Usually run by consultant anaesthetists, these clinics aim to help treat patients with severe long-term pain that appears resistant to normal treatments.\n', '', ''),
(38, 'Physiotherapy', 'Physiotherapists promote body healing, for example after surgery, through therapies such as exercise and manipulation.\n\n', '', ''),
(39, 'Radiotherapy', 'Radiotherapy\nRun by a combination of consultant doctors and specially trained radiotherapists, this department provides radiotherapy (X-ray) treatment for conditions such as malignant tumours and cancer.\n\n', '', ''),
(40, 'Renal unit', 'Closely linked with nephrology teams at hospitals, these units provide haemodialysis treatment for patients with kidney failure. Many of these patients are on waiting lists for a kidney transplant.\n\n', '', ''),
(41, 'Rheumatology', 'Specialist doctors called rheumatologists run the unit and are experts in the field of musculoskeletal disorders (bones, joints, ligaments, tendons, muscles and nerves).\n\n', '', ''),
(42, 'Sexual health (genitourinary medicine)', 'This department provides a free and confidential service offering:\nadvice, testing and treatment for all sexually transmitted infections (STIs)\nfamily planning care (including emergency contraception and free condoms)\npregnancy testing and advice.\nIt also provides care and support for other sexual and genital problems.\nPatients are usually able to phone the department directly for an appointment and don''t need a referral letter from their GP.\n\n\n', '', ''),
(43, 'Urology', 'The urology department is run by consultant urology surgeons and their surgical teams. It investigates all areas linked to kidney and bladder-based problems.\n\n', '', ''),
(47, 'PC', '<p>Polli Chikisshok (Village Doctor)</p>\n', '', ''),
(51, 'dfdff', '<p>dfdfdfdf</p>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `x` varchar(10) NOT NULL,
  `y` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `name`, `description`, `x`, `y`) VALUES
(1, 'AIDS', '<p>dsdsd</p>\r\n', '', ''),
(2, 'ABC', '<p>ABC</p>\r\n', '', ''),
(3, 'XYZ', '<p>XYZ</p>\r\n', '', ''),
(4, 'Leusemaia', '<p>leusemia</p>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `branch_id`, `img_url`, `name`, `email`, `address`, `phone`, `department`, `profile`, `x`, `y`) VALUES
(118, 3, '', '4545 4545 55454', 'gfg@gg.com', 'rtrtrt', '34344344', '0', 'admin@dms.com', '', ''),
(116, 3, '', 'dfdsf fdfd dfdfs', 'fsdfs@sdfdf.com', 'rrwerwr', '432424', '0', 'ggdfg@efff.com', '', ''),
(117, 4, '', 'ererrwr  rrwer', 'dfdsfdsf@fdsfdf.com', 'rwer rrwer', '444234', '0', 'ggdfg@efff.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `branch_id`, `category`, `date`, `amount`, `user`) VALUES
(52, 0, 'Electric Bill', '1455294753', '100', ''),
(53, 0, 'Rent', '1466609789', '4000', ''),
(54, 3, 'Mobile Bill', '1497400186', '434', ''),
(55, 4, 'Printing', '1497400192', '3434', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `description`, `x`, `y`) VALUES
(7, 'Electric Bill', 'Electric Bill', '', ''),
(10, 'Mobile Bill', 'Mobile Bill', '', ''),
(11, 'Printing', 'Printing', '', ''),
(39, 'Rent', 'Office Rent', '', ''),
(13, 'Advertisement', 'Advertisement', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Accountant', 'For Financial Activities'),
(4, 'Doctor', ''),
(5, 'Patient', ''),
(6, 'Nurse', ''),
(7, 'Pharmacist', ''),
(8, 'Laboratorist', '');

-- --------------------------------------------------------

--
-- Table structure for table `ion_user`
--

CREATE TABLE `ion_user` (
  `id` int(11) NOT NULL,
  `cccc` int(11) NOT NULL,
  `ccccccc` int(11) NOT NULL,
  `cc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `branch_id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`) VALUES
(3, 0, 'uploads/favicon1.png', 'Mr Laboratorist', 'laboratorist@dms.com', 'Tampa, Florida, USA', '+9976 65443 76547', '', ''),
(4, 4, '', 'bbcbcvbvbv cxbcbvcb', 'dffdfd@dfdffdf.com', '3543545 34543545', '454354545', '', ''),
(5, 4, '', 'bbcbcvbvbv cxbcbvcb', 'fsfsdfsf@dsdsdss.com', '43434434', '34344343', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img_url` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `patient_id`, `description`, `img_url`, `date`) VALUES
(27, '160', '<p>sdfsfsdfsdfdsfds</p>\n', '', '02-02-2016'),
(28, '149', '<p>Hasan</p>\n', 'uploads/122.jpg,', '02-02-2016'),
(29, '160', '<p>edwrwrwr</p>\n', '', '02-02-2016'),
(30, '160', '<p>wqeqeqeq</p>\n', '', '02-02-2016'),
(25, '148', '<p>Just testing testing testing</p>\n', 'uploads/dentist-woman8.jpg,uploads/den.jpg', '02-11-2016'),
(34, '161', '<p>Hola</p>\n\n<p> </p>\n', '', '06-21-2016'),
(62, '164', '<p>12121212</p>\r\n', '', '10-06-2017'),
(36, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(37, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(38, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(39, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(40, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(41, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(42, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(43, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(44, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(45, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(46, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(47, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(48, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(49, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(50, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(51, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(52, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(53, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>dfdfffdf</p>\r\n', '', '10-06-2017'),
(54, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>111</p>\r\n', '', '10-06-2017'),
(55, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>111</p>\r\n', '', '10-06-2017'),
(56, '<div >\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: Notice</p>\r\n<p>Message:  Undefined va', '<p>111</p>\r\n', '', '10-06-2017'),
(57, '165', '<p>111</p>\r\n', 'uploads/24C.jpg', '10-06-2017'),
(58, '165', '<p>111</p>\r\n', '', '03-06-2017'),
(59, '165', '<p>12122</p>\r\n', '', '10-06-2017'),
(60, '165', '<p>3232323</p>\r\n', '', '10-06-2017'),
(63, '164', '<p>1111</p>\r\n', '', '10-06-2017'),
(64, '166', '<p>343434</p>\r\n', '', '10-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prodcode` varchar(64) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `remaining_quantity` int(10) NOT NULL,
  `generic` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `effects` varchar(100) NOT NULL,
  `e_date` varchar(70) NOT NULL,
  `add_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `branch_id`, `name`, `prodcode`, `category`, `price`, `quantity`, `remaining_quantity`, `generic`, `company`, `effects`, `e_date`, `add_date`) VALUES
(8, 3, 'Pain Killer', '', 'Fever', '2', '100', 86, 'Paracitamol', 'Beximco', 'Acidic', '10-1-2016', ''),
(14, 3, '434324', '43434', 'Fever', '22', '3434', 3432, '34343', '3434', '3434', '31-05-2017', '06/17/17'),
(15, 5, '44', '44', 'Fever', '44', '44', 44, '44', '44', '44', '44', '06/17/17');

-- --------------------------------------------------------

--
-- Table structure for table `medicinepayment`
--

CREATE TABLE `medicinepayment` (
  `id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `customer` varchar(127) DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) NOT NULL,
  `flat_vat` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) NOT NULL,
  `gross_total` varchar(100) NOT NULL,
  `hospital_amount` varchar(100) NOT NULL,
  `doctor_amount` varchar(100) NOT NULL,
  `category_amount` varchar(1000) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinepayment`
--

INSERT INTO `medicinepayment` (`id`, `branch_id`, `category`, `medicine`, `customer`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `status`) VALUES
(1, 3, '', 'Pain Killer,2,1:434324,22,1:', 'James Hemsley', '1498539824', '24', '0', '', '', '11', '11', '13', '13', '0', '', '', '13', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `category`, `description`) VALUES
(4, 'Fever', 'Tooth ache ');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL,
  `z` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `branch_id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `z`) VALUES
(8, 3, 'uploads/7849593029314565502060844923013899768299520N.jpg', 'Mrs Nurse', 'nurse@dms.com', 'HGA, address', '06330000', '', '', ''),
(13, 3, '', 'gdfgdfgdgdg', 'dgdgdg@fgfdg.com', 'dgdgdgdfg', '224343434', '', '', ''),
(14, 3, '', 'gd fgdfg dgdg ', 'dfsdf@fdfdf.com', 'sd dsdsd sdsds', '4343434', '', '', ''),
(15, 3, '', 'gd fgdfg dgdg ', 'dsda@ghh.com', '3232332325555', '32323235555', '', '', ''),
(16, 4, '', 'gd fgdfg dgdg ', 'fgfgf@hhghgh.com', '44 44 565656', '656565 656565656', '', '', ''),
(17, 4, '', 'gd fgdfg dgdg 11', 'fgfgfdgf@fddf.com', 'fsdf ssf sfdffsd', '545454545 4454545', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `disease` varchar(127) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `add_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `branch_id`, `img_url`, `name`, `email`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `disease`, `patient_id`, `add_date`) VALUES
(164, 3, '', 'Mr Patient', 'patient@dms.com', '4545 4545 55454', 'Apodaca', '811111111', 'Male', '01-10-1983', '', 'A+', '', '149250', '06/28/16'),
(165, 4, '', 'fdfsf@gdfgd.com', 'dfsf@ffsdf.com', 'dfdsf fdfd dfdfs', 'sfsfsd', '53535345', 'Female', '30-05-2017', '', 'A+', '', '149250', '06/06/17'),
(166, 3, '', 'dfffdfdff', 'ggfggf@effrtrt.com', '', '4444234', '343434', 'Female', '10-06-2017', '', 'AB-', '', '144475', '06/10/17'),
(167, 4, '', 'ttrtrt@dfdf.com', 'dfdff@dfdfd.com', 'ererrwr  rrwer', '5345345345', '5435435345345', 'Female', '13-06-2017', '', 'A+', 'ABC', '149250', '06/12/17'),
(168, 3, '', 'ttrtrt@dfdf.com', 'dsffsdf@dfdfd.com', '4545 4545 55454', '535345345', '4534534535', 'Male', '07-06-2017', '', 'A+', 'ABC,AIDS', '149250', '06/12/17'),
(171, 3, '', 'ttrtrt@dfdf.com', 'hfhfh@dfdfdf.com', 'dfdsf fdfd dfdfs', '64654646', '546546564', 'Female', '13-06-2017', '', 'A+', 'XYZ,ABC', '149250', '06/12/17'),
(172, 4, '', 'ttr44trt@dfdf.com', 'gdfgd22fgd@fgfg.com', 'ererrwr  rrwer', '5345353534', '34534534535', 'Male', '13-06-2017', '', 'A+', 'XYZ,ABC', '963202', '06/12/17'),
(173, 3, '', 'adm1111in@dms.com', 'dddd@dddd.com', '4545 4545 55454', '3434434343', '4324344', 'Male', '13-06-2017', '', 'B+', 'XYZ,ABC,AIDS', '149250', '06/13/17'),
(174, 3, 'uploads/24C2.jpg', 'adm4441111in@dms.com', 'fggg@dfdfdf.com', '4545 4545 55454', 'erwrwerw', '43444234', 'Female', '06-06-2017', '', 'A+', 'ABC,AIDS', '457838', '06/13/17'),
(175, 3, '', 'admin', 'wewewe@fdfff.com', '4545 4545 55454', '31231332323', '232333232', 'Female', '13-06-2017', '', 'A+', '', '149250', '06/13/17'),
(176, 3, '', 'admin', 'erere@fdfd.com', '4545 4545 55454', '5345543', '54543545', 'Others', '13-06-2017', '', 'A+', '', '149250', '06/13/17');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) NOT NULL,
  `flat_vat` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) NOT NULL,
  `gross_total` varchar(100) NOT NULL,
  `hospital_amount` varchar(100) NOT NULL,
  `doctor_amount` varchar(100) NOT NULL,
  `category_amount` varchar(1000) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `branch_id`, `category`, `patient`, `doctor_id`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `status`) VALUES
(506, 4, '', '165', 117, '1497045041', '275', '0', '', '', '11', '11', '264', '275', '-11', '', 'Fixed*200,Composite*75', '11', 'unpaid'),
(507, 3, '', '165', 118, '1497045174', '195', '0', '', '', '11', '11', '184', '195', '-11', '', 'R.C.T*120,Composite*75,X-RAY*0', '111', 'unpaid'),
(508, 3, '', '', 0, '1498511725', '146', '0', '', '', '11', '11', '135', '135', '0', '', '', '111', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `c_price` varchar(100) NOT NULL,
  `d_commission` int(100) NOT NULL,
  `h_commission` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `category`, `description`, `c_price`, `d_commission`, `h_commission`) VALUES
(16, 'Fixed', 'Crown', '200', 0, 0),
(17, 'Removable', 'Dentures', '900', 0, 0),
(19, 'Orthodontics', 'Orthodontics', '1200', 0, 0),
(20, 'R.C.T', 'Root Canal Treatment', '120', 0, 0),
(57, 'Composite', 'Amalgam/Fillings', '75', 0, 0),
(76, 'X-RAY', 'X-RAY', '0', 0, 0),
(64, 'Extractions', 'Extractions', '10', 0, 0),
(65, 'Perio Treatment', 'Gum Disease ', '40', 0, 0),
(66, 'Minor Surgery', 'Minor Surgery', '35', 0, 0),
(67, 'Whitening ', 'Whitening', '75', 0, 0),
(15, 'Lab Fee', 'Lab Fee', '0', 0, 80);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `x` varchar(100) NOT NULL,
  `y` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `branch_id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`) VALUES
(7, 0, 'uploads/favicon6.png', 'Mr. Pharmacist', 'pharmacist@dms.com', 'Pottersbar, Hertfordshire, UK', '+4479 5665 543367', '', ''),
(9, 5, '', 'bbcbcvbvbv cxbcbvcb', 'gg111fg@ggg.com1', '2323232323', '2323232323', '', ''),
(10, 4, '', 'bbcbcvbvbv cxbcbvcb', 'ggfgfg@fdfdfd.com', 'wrwerwer', 'rwerewrwerewr', '', ''),
(11, 3, '', 'bbcbcvbvbv cxbcbvcb', 'rtrtrt@gfggfgfg.com', '4343434343434', '3434343434', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `codec_username` varchar(100) NOT NULL,
  `codec_purchase_code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `currency`, `discount`, `vat`, `codec_username`, `codec_purchase_code`) VALUES
(1, 'Diagnostic Center', 'Dr. Care', 'Collegepara, Rajbari', '06330000', 'admin@example.com', '$', 'flat', 'percentage', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '123', '', 'admin@dms.com', '', 'dc10sss4EZougSSnIBO8gu314b5803e044d47f0c', 1435777809, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1577938203, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(109, '113.11.74.192', 'Mrs Nurse', '$2y$08$C82poVFrXvBh9kpD4btn8.SY.GghlB9xFNqt4nWr.JtzSoUX3PdeC', NULL, 'nurse@dms.com', NULL, NULL, NULL, NULL, 1435082243, 1473187401, 1, NULL, NULL, NULL, NULL),
(110, '113.11.74.192', 'Mr. Pharmacist', '$2y$08$94gUBFq5bb2q06wIjOUcJODgGS5v58lENTkvEgjJ90hUElJhob9z.', NULL, 'pharmacist@dms.com', NULL, NULL, NULL, 'mbeMop6vTuscFYmD2M4Iqu', 1435082359, 1473188638, 1, NULL, NULL, NULL, NULL),
(111, '113.11.74.192', 'Mr Laboratorist', '$2y$08$qjHx02dbGqtcGQ8DMnDNQuecVoQju06p96n50lej3UYh7XskKAm2a', NULL, 'laboratorist@dms.com', NULL, NULL, NULL, NULL, 1435082438, 1473188623, 1, NULL, NULL, NULL, NULL),
(112, '113.11.74.192', 'Mr. Accountant', '$2y$08$jTerALZwSDpX/wN/3ZtLRejxBPBAxR/UBsXQaeBnMLG/MuCXxS0z.', NULL, 'accountant@dms.com', NULL, NULL, NULL, NULL, 1435082637, 1473188155, 1, NULL, NULL, NULL, NULL),
(337, '189.218.238.205', 'Mr Patient', '$2y$08$k6JrW7eKfogMhjLpXeHI6.xtHH3wTEzZgc5wT7uADin5Xp45wSs5q', NULL, 'patient@dms.com', NULL, NULL, NULL, NULL, 1467159840, 1473188009, 1, NULL, NULL, NULL, NULL),
(338, '189.218.238.205', 'Mr Doctor', '$2y$08$3Ljw1nK678jPkH2WU2PdJ.YIyr9kknWMi1lxTdNusdeGhzUI/x6Zu', NULL, 'doctor@dms.com', NULL, NULL, NULL, NULL, 1467303479, 1473188028, 1, NULL, NULL, NULL, NULL),
(339, '::1', 'jghjghjgj', '$2y$08$voFhBWcnuJSJromJUba9b.qQJJhpYB8BXVUeA7wCL/lSS7G31PjQi', NULL, 'jghjgh@fgfd.com', NULL, NULL, NULL, NULL, 1496648292, NULL, 1, NULL, NULL, NULL, NULL),
(340, '::1', '42343243', '$2y$08$XMgXlXRxulvA7m8fhN1/U.r5XJuJTI5lEZi1Nc7iJaNg9YcbRinwi', NULL, 'ggdgdg', NULL, NULL, NULL, NULL, 1496683481, NULL, 1, NULL, NULL, NULL, NULL),
(341, '::1', 'rggg rfere wrwer', '$2y$08$rvW/O.vpqELnM2ZSuCAhIOPEnX/aTCCQzIPzzQpLV.Kb3CnnZX4Ua', NULL, 'ggfg@ggg.com', NULL, NULL, NULL, NULL, 1496683562, NULL, 1, NULL, NULL, NULL, NULL),
(342, '::1', 'dfdsf fdfd dfdfs', '$2y$08$bAasmcvD/tzQCkI8iD9Fp..QEOBmkS/3n1fWhGlVA4ckmMKNeU2Hy', NULL, 'fsdfs@sdfdf.com', NULL, NULL, NULL, NULL, 1496683701, NULL, 1, NULL, NULL, NULL, NULL),
(343, '::1', 'ererrwr  rrwer', '$2y$08$q16yoc1PhEooyJlsn7lKq.3m5Jyg4PqbX9SxtmvnPEu9wMS/VFmEi', NULL, 'dfdsfdsf@fdsfdf.com', NULL, NULL, NULL, NULL, 1496684472, NULL, 1, NULL, NULL, NULL, NULL),
(344, '::1', 'fdfsf@gdfgd.com', '$2y$08$Qh7lh0sNrOCbQ7prYQFtyO14FCU7gK4QjUwwmALH8SO4vvW5JvPEa', NULL, 'dfsf@ffsdf.com', NULL, NULL, NULL, NULL, 1496755008, NULL, 1, NULL, NULL, NULL, NULL),
(345, '::1', '4545 4545 55454', '$2y$08$yrghJV.WuZDIhWtP2o/kfeltvTL7JbphVOGrt8QalSae0LlWwOXai', NULL, 'gfg@gg.com', NULL, NULL, NULL, NULL, 1496758338, NULL, 1, NULL, NULL, NULL, NULL),
(346, '::1', 'gdfgdfgdgdg', '$2y$08$9rr1MTCnTrYO6nv3E9NjUun0ycEvG6fWOzTM8NYNPa72goigBWysu', NULL, 'dgdgdg@fgfdg.com', NULL, NULL, NULL, NULL, 1496844558, NULL, 1, NULL, NULL, NULL, NULL),
(347, '::1', 'gd fgdfg dgdg', '$2y$08$I69zEwEWQXn1dpMSwyrKi.hxYYPFk2bOp6dsB3qHkV2/XcW3nss2G', NULL, 'dfsdf@fdfdf.com', NULL, NULL, NULL, NULL, 1496844856, NULL, 1, NULL, NULL, NULL, NULL),
(348, '::1', 'gd fgdfg dgdg1', '$2y$08$9viaAqg4I0V9i9ZlGqBEye0KyxPj2pADi6xQ9cpPl6otJLqtrLBHe', NULL, 'dsda@ghh.com', NULL, NULL, NULL, NULL, 1496844924, NULL, 1, NULL, NULL, NULL, NULL),
(349, '::1', 'gd fgdfg dgdg2', '$2y$08$wpoezotDZFRqVWngKgENue4giqVn.wAzV.SXvp3.phU7TfsVPz4YO', NULL, 'fgfgf@hhghgh.com', NULL, NULL, NULL, NULL, 1496846951, NULL, 1, NULL, NULL, NULL, NULL),
(350, '::1', 'gd fgdfg dgdg 11', '$2y$08$ClWSvxEBXOw1v8nhBKl0HeNGMHtIM3ck/JbF/5TQnXEyggTsGS6gu', NULL, 'fgfgfdgf@fddf.com', NULL, NULL, NULL, NULL, 1496847007, NULL, 1, NULL, NULL, NULL, NULL),
(351, '::1', 'bbcbcvbvbv cxbcbvcb', '$2y$08$VKDHYpFURZhHZ5keUoUga.U8HBwsx4YIzMtswY.eDXLWMW7WzAx8K', NULL, 'bvcbdf@ghhgh.com', NULL, NULL, NULL, NULL, 1496847163, NULL, 1, NULL, NULL, NULL, NULL),
(352, '::1', 'bbcbcvbvbv cxbcbvcb1', '$2y$08$XHqeL8aax31TsRJmbyB3uu8YS4XJCYa5VmpzQnvGPj/K0/ezon0m6', NULL, 'gg111fg@ggg.com1', NULL, NULL, NULL, NULL, 1496848729, NULL, 1, NULL, NULL, NULL, NULL),
(353, '::1', 'bbcbcvbvbv cxbcbvcb2', '$2y$08$Pmo9IYQ5zByHkXhZ6M1N.OJiVQqjUKVKLg95jYEoksud1ip/GeadO', NULL, 'ggfgfg@fdfdfd.com', NULL, NULL, NULL, NULL, 1496848782, NULL, 1, NULL, NULL, NULL, NULL),
(354, '::1', 'bbcbcvbvbv cxbcbvcb3', '$2y$08$uBsCWSWB/Vs1yDNrHYYRVeWIwc6iHZD3DL1UVXnd1zs.TrT0yOta.', NULL, 'rtrtrt@gfggfgfg.com', NULL, NULL, NULL, NULL, 1496848818, NULL, 1, NULL, NULL, NULL, NULL),
(355, '::1', 'bbcbcvbvbv cxbcbvcb4', '$2y$08$gBWbxE9neJJoj2EUKCR/.umNXUtFRqBZwEqX4k52JIUv6AKxtUsWC', NULL, 'dffdfd@dfdffdf.com', NULL, NULL, NULL, NULL, 1496850509, NULL, 1, NULL, NULL, NULL, NULL),
(356, '::1', 'bbcbcvbvbv cxbcbvcb5', '$2y$08$cGfiy2C8CPbh96AHJUDUFOZRO8K63V6/O2G3.AuV81ubDcDRtWWTC', NULL, 'fsfsdfsf@dsdsdss.com', NULL, NULL, NULL, NULL, 1496850576, NULL, 1, NULL, NULL, NULL, NULL),
(357, '::1', 'bbcbcvbvbv cxbcbvcb6', '$2y$08$MK4hNOlgVqGnT2XHY0I0ZOVzNBtyoaxwTtDKJ1zxkKme0cuVwjxd2', NULL, 'gtrrrytr@rggfg.com', NULL, NULL, NULL, NULL, 1496852286, NULL, 1, NULL, NULL, NULL, NULL),
(358, '::1', 'bbcbcvbvbv cxbcbvcb7', '$2y$08$4bP4OtgAXvuSMKZ2E/sAaurv0QR8xKXJTN1rI9Xojk00YOWYmh0E6', NULL, 'eerr@erer.com', NULL, NULL, NULL, NULL, 1496852337, NULL, 1, NULL, NULL, NULL, NULL),
(359, '::1', 'dfffdfdff', '$2y$08$9gSPHbg1x229k.W8.ui3G.zjU4sDDP6S2zARUK0jUd43o0o9WDg7u', NULL, 'ggfggf@effrtrt.com', NULL, NULL, NULL, NULL, 1497111237, NULL, 1, NULL, NULL, NULL, NULL),
(360, '::1', 'ttrtrt@dfdf.com', '$2y$08$V6Xvc4740iBR4lutaBw3XOrg3XaocywhW9f9kiG57ECaaKcphWzqa', NULL, 'dfdff@dfdfd.com', NULL, NULL, NULL, NULL, 1497292216, NULL, 1, NULL, NULL, NULL, NULL),
(361, '::1', 'ttrtrt@dfdf.com1', '$2y$08$rUwxllmfI7nZ5ngpshLtQOpPZjnsTHBfr4BDBn9T15aRdOyYQ.fr6', NULL, 'gdfgdfgd@fgfg.com', NULL, NULL, NULL, NULL, 1497292335, NULL, 1, NULL, NULL, NULL, NULL),
(362, '::1', 'ttrtrt@dfdf.com2', '$2y$08$QUgO.2oRKIxzghrGX4mXm.FtDbrXllOChHPGC3jY5S5JjswjmohIm', NULL, 'dsffsdf@dfdfd.com', NULL, NULL, NULL, NULL, 1497292431, NULL, 1, NULL, NULL, NULL, NULL),
(363, '::1', 'ttrtrt@dfdf.com3', '$2y$08$zD71I7Izy1DR80qrYdGpZenBnAjI0.3GIx75PNWnI94mA5wnLXLSu', NULL, 'fhfghfh@dffdsf.com', NULL, NULL, NULL, NULL, 1497292478, NULL, 1, NULL, NULL, NULL, NULL),
(364, '::1', 'ttrtrt@dfdf.com4', '$2y$08$VjScUVznD4WIGPnPf00W3eVfmJIR0CGf9PXB74dzDsSdWhfKZYlg6', NULL, 'fsdfsdf@gfgg.com', NULL, NULL, NULL, NULL, 1497292538, NULL, 1, NULL, NULL, NULL, NULL),
(365, '::1', 'ttrtrt@dfdf.com5', '$2y$08$UKXU7AnKVQT39ASgLlyxfe3nFbzkB1sAP6E1LjtDFa.SlUWi8BcM6', NULL, 'tertet@gfgdg.com', NULL, NULL, NULL, NULL, 1497292573, NULL, 1, NULL, NULL, NULL, NULL),
(366, '::1', 'ttrtrt@dfdf.com6', '$2y$08$znKDLKRTYqETluP/OS9jue61juUvVcQ0wmCFIZs2.BCiiGZogYrNy', NULL, 'hfhfh@dfdfdf.com', NULL, NULL, NULL, NULL, 1497292670, NULL, 1, NULL, NULL, NULL, NULL),
(367, '::1', 'ttr44trt@dfdf.com', '$2y$08$ksuh7JbJ30TdyfIpOzBBiOdS/vnrqneg7Q4slgQFM1isCBlxRUQS6', NULL, 'gdfgd22fgd@fgfg.com', NULL, NULL, NULL, NULL, 1497293830, NULL, 1, NULL, NULL, NULL, NULL),
(368, '::1', 'adm1111in@dms.com', '$2y$08$FRzcctfjMniv4CB144iKlOd58BVLntZjgMzP6QTUkiBPdv89YEQ8m', NULL, 'dddd@dddd.com', NULL, NULL, NULL, NULL, 1497306878, NULL, 1, NULL, NULL, NULL, NULL),
(369, '::1', 'adm4441111in@dms.com', '$2y$08$OU/xuLvRl7Kn17XCq5ylZeaLEfZeI7ShOIqaDnI6nIJT.kMMAnRNa', NULL, 'fggg@dfdfdf.com', NULL, NULL, NULL, NULL, 1497306922, NULL, 1, NULL, NULL, NULL, NULL),
(370, '::1', 'adm111111in@dms.com', '$2y$08$VJmm52aUnL67XeWsNuw8Eee8i99TVFVyf5me.qRAY556Ub2szUxoa', NULL, 'erer@dfff.com', NULL, NULL, NULL, NULL, 1497309963, NULL, 1, NULL, NULL, NULL, NULL),
(371, '::1', 'admin1', '$2y$08$RfBtAbYfJwa/M2rSmJ444uvccJjPch8jtO.BZvSzvFZJFF5Qsxw5G', NULL, 'wewewe@fdfff.com', NULL, NULL, NULL, NULL, 1497310106, NULL, 1, NULL, NULL, NULL, NULL),
(372, '::1', 'admin2', '$2y$08$OWZ3ZH.ldD./0fzY3z456e/mwHl.vqu4BuM81h9tU0SRQcY8IiU6u', NULL, 'erere@fdfd.com', NULL, NULL, NULL, NULL, 1497310351, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinepayment`
--
ALTER TABLE `medicinepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `medicinepayment`
--
ALTER TABLE `medicinepayment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;
--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
