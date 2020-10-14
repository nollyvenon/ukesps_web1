-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2020 at 12:02 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main_ukesps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass_salt` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `accounttype` varchar(50) DEFAULT NULL,
  `server` varchar(10) DEFAULT 'AWKA1',
  `status` enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 - Active\n2 - Inactive\n3 - Suspended',
  `notify` varchar(5) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_code`, `email`, `phone`, `username`, `password`, `pass_salt`, `first_name`, `middle_name`, `last_name`, `gender`, `last_login`, `accounttype`, `server`, `status`, `notify`, `created`, `updated`) VALUES
(1, 'GR4bs', 'gooption@yahoo.com', '', '', 'john', '$2y$11$af8dfd3f6365d329cbc89OK7tViB.yhp5qVLecAVLCCnR4aRxY8Xu', 'John', NULL, 'Azuka', '', NULL, '1', 'AWKA1', '1', NULL, '2017-03-31 10:57:49', '2020-09-16 10:56:03'),
(2, 'xkzOX', 'ifeoma@yahoo.com', '08043433', 'ifeoma', 'ifeoma', '$2y$11$1fed47a5ff14dfc6f49acuZpAWVnn3/1Gb43.5TN/b0PjdoDTAxMO', 'Ifeoma', NULL, 'Ezebuenyi', '', NULL, '1', 'AWKA1', '', NULL, '2017-04-01 14:23:36', '2020-09-16 11:33:27'),
(54, 'ywphC', 'sam@gmail.com', '08165748392', 'gooption@yahoo.com', 'john', '$2y$11$a14c21a8cd5e2fe94990bO9uxWF3bqazmVkh5yX7U55nsxD.3rI/.', 'Doe', NULL, 'james', NULL, NULL, '1', 'AWKA1', '1', NULL, '2020-09-16 04:07:08', '2020-09-16 11:07:49'),
(55, 'CKai5', 'testuser@gmail.com', '08165748392', 'testuser@gmail.com', '123456', '$2y$11$ba00e86263ab6cf1b4482edPIcRT4w2yMLdqq1euLsPcffJ.TH4p.', 'Doe', NULL, 'james', NULL, NULL, '2', 'AWKA1', '1', NULL, '2020-09-16 04:38:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_details`
--

CREATE TABLE `applicant_details` (
  `id` int(11) NOT NULL,
  `applicant_code` varchar(15) DEFAULT NULL,
  `resume` text,
  `cover_letter` text,
  `place_of_birth` varchar(15) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `country_of_residence` varchar(255) DEFAULT NULL,
  `country_of_nationality` varchar(255) DEFAULT NULL,
  `languages` varchar(500) DEFAULT NULL,
  `linkedin_profile` text,
  `twitter_profile` text,
  `hobbies` text,
  `skills` text,
  `years_of_experience` varchar(15) DEFAULT NULL COMMENT 'Total years_of_experience i.e years in the work force',
  `highest_study_level` varchar(4) DEFAULT NULL,
  `edu_institution_1` text,
  `education_period_month_from_1` varchar(255) DEFAULT NULL,
  `education_period_month_to_1` varchar(255) DEFAULT NULL,
  `education_period_year_from_1` varchar(255) DEFAULT NULL,
  `education_period_year_to_1` varchar(255) DEFAULT NULL,
  `education_cert_obtained_1` varchar(40) DEFAULT NULL,
  `education_course_studied_1` varchar(40) DEFAULT NULL,
  `education_course_description_1` text,
  `edu_institution_2` varchar(100) DEFAULT NULL,
  `education_period_month_from_2` varchar(255) DEFAULT NULL,
  `education_period_month_to_2` varchar(255) DEFAULT NULL,
  `education_period_year_from_2` varchar(255) DEFAULT NULL,
  `education_period_year_to_2` varchar(255) DEFAULT NULL,
  `education_cert_obtained_2` varchar(255) DEFAULT NULL,
  `education_course_studied_2` varchar(255) DEFAULT NULL,
  `education_course_description_2` text,
  `edu_institution_3` varchar(100) DEFAULT NULL,
  `education_period_month_from_3` varchar(255) DEFAULT NULL,
  `education_period_month_to_3` varchar(255) DEFAULT NULL,
  `education_period_year_from_3` varchar(255) DEFAULT NULL,
  `education_period_year_to_3` varchar(255) DEFAULT NULL,
  `education_cert_obtained_3` varchar(40) DEFAULT NULL,
  `education_course_studied_3` varchar(40) DEFAULT NULL,
  `education_course_description_3` text,
  `current_work_experience_company_1` varchar(40) DEFAULT NULL,
  `current_work_experience_position_1` varchar(70) DEFAULT NULL,
  `current_work_experience_duties_1` text,
  `current_work_experience_highlights_1` text,
  `current_work_experience_month_from_1` varchar(255) DEFAULT NULL,
  `current_work_experience_month_to_1` varchar(255) DEFAULT NULL,
  `current_work_experience_year_from_1` varchar(255) DEFAULT NULL,
  `current_work_experience_year_to_1` varchar(255) DEFAULT NULL,
  `current_work_experience_level_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_company_1` varchar(500) DEFAULT NULL,
  `previous_work_experience_position_1` varchar(70) DEFAULT NULL,
  `previous_work_experience_duties_1` tinytext,
  `previous_work_experience_highlights_1` tinytext,
  `previous_work_experience_month_from_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_month_to_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_year_from_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_year_to_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_level_1` varchar(255) DEFAULT NULL,
  `previous_work_experience_company_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_position_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_duties_2` text,
  `previous_work_experience_highlights_2` text,
  `previous_work_experience_month_from_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_month_to_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_year_from_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_year_to_2` varchar(255) DEFAULT NULL,
  `previous_work_experience_level_2` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_details`
--

INSERT INTO `applicant_details` (`id`, `applicant_code`, `resume`, `cover_letter`, `place_of_birth`, `location`, `country_of_residence`, `country_of_nationality`, `languages`, `linkedin_profile`, `twitter_profile`, `hobbies`, `skills`, `years_of_experience`, `highest_study_level`, `edu_institution_1`, `education_period_month_from_1`, `education_period_month_to_1`, `education_period_year_from_1`, `education_period_year_to_1`, `education_cert_obtained_1`, `education_course_studied_1`, `education_course_description_1`, `edu_institution_2`, `education_period_month_from_2`, `education_period_month_to_2`, `education_period_year_from_2`, `education_period_year_to_2`, `education_cert_obtained_2`, `education_course_studied_2`, `education_course_description_2`, `edu_institution_3`, `education_period_month_from_3`, `education_period_month_to_3`, `education_period_year_from_3`, `education_period_year_to_3`, `education_cert_obtained_3`, `education_course_studied_3`, `education_course_description_3`, `current_work_experience_company_1`, `current_work_experience_position_1`, `current_work_experience_duties_1`, `current_work_experience_highlights_1`, `current_work_experience_month_from_1`, `current_work_experience_month_to_1`, `current_work_experience_year_from_1`, `current_work_experience_year_to_1`, `current_work_experience_level_1`, `previous_work_experience_company_1`, `previous_work_experience_position_1`, `previous_work_experience_duties_1`, `previous_work_experience_highlights_1`, `previous_work_experience_month_from_1`, `previous_work_experience_month_to_1`, `previous_work_experience_year_from_1`, `previous_work_experience_year_to_1`, `previous_work_experience_level_1`, `previous_work_experience_company_2`, `previous_work_experience_position_2`, `previous_work_experience_duties_2`, `previous_work_experience_highlights_2`, `previous_work_experience_month_from_2`, `previous_work_experience_month_to_2`, `previous_work_experience_year_from_2`, `previous_work_experience_year_to_2`, `previous_work_experience_level_2`, `created_at`) VALUES
(1, 'RxexRODcqvp', 'afdfdf', NULL, '20/04/1984', NULL, '234', '234', '1', NULL, NULL, NULL, '1', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-07 16:23:21'),
(5, '5oDjennLOMd', '5oDjennLOMd1483257.pdf', '5oDjennLOMd6ea4fb12.docx', 'HOme', 'Locarion', '1', '1', 'English, Igbo, Yoruba, French', 'https://www.linkedin.com/in/emeka-joseph-7157a0133', 'Twiter Id', 'My Hobbies, chess playing', 'Excellent skill in computer hardware maintenance, software installation \r\nand troubleshooting. \r\n ', '5', NULL, ' \nReferee \n \nInterests / Hobbies \n \nOther Certifications \nWo', '2', '4', '2012', '', '4', 'Elect Elect', 'Electrical Course', ' Referee  Interests / Hobbies  Other Certifications Wo', '', '', '', '', '', 'Elect Elect', '', ' Referee  Interests / Hobbies  Other Certifications Wo', '', '', 'this day', 'this day', '2', 'Chem', '', 'OnyxDS', 'WEB Dev', 'Web Dev', 'Web dev', '2', NULL, '2012', NULL, NULL, ' Scheme (SIWES). \n \nTitle: Web developer intern \nDate: 2016 ', 'Web dev', 'web dev', 'Web dev\r\n', '', '', '2012', '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-10 10:47:33'),
(9, 'gFOBHIiGDik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-04 23:38:50'),
(8, 'gsGeKEqwoTg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-14 10:51:11'),
(10, 'lKiGQjrdeT4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-05 07:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_lists`
--

CREATE TABLE `applicant_lists` (
  `list_id` int(11) NOT NULL,
  `recruiter_code` varchar(30) DEFAULT NULL,
  `list_name` varchar(100) DEFAULT NULL,
  `list_members` text,
  `description` tinytext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `appl_id` int(11) NOT NULL,
  `job_id` varchar(15) DEFAULT NULL,
  `application_title` varchar(200) DEFAULT NULL,
  `recruiter_code` varchar(15) DEFAULT NULL,
  `applicant_code` varchar(15) DEFAULT NULL,
  `desired_salary` varchar(20) DEFAULT NULL,
  `job_sector` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` enum('0','1','2','3','4') DEFAULT '0' COMMENT '0 - Submitted, 1 - Processing, 2 - Approved, 3 - interviewed, 4 - Chosen',
  `comment` tinytext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`appl_id`, `job_id`, `application_title`, `recruiter_code`, `applicant_code`, `desired_salary`, `job_sector`, `location`, `status`, `comment`, `timestamp`) VALUES
(2, '2290290c0e', 'electrical Engineer', '39403kjsc', 'RxexRODcqvp', '1500', '3', 'Lagos', '1', 'no comment', '2020-08-03 15:46:39'),
(5, '3', 'Cloud Engineer', 'ZVgy0', '5oDjennLOMd', '25k', '2', '2', '0', NULL, '2020-09-23 18:06:35'),
(4, '4', 'Cloud Engineer', 'ZVgy0', '5oDjennLOMd', '25k', '2', '2', '0', NULL, '2020-09-23 18:05:45'),
(6, '2', 'Cloud Engineer', 'ZVgy0', '', '50000', '3', '1', '0', NULL, '2020-09-25 00:34:54'),
(7, '5', 'Electrical Engineer', 'ZVgy0', '', '25000', '3', '1', '0', NULL, '2020-09-29 00:53:08'),
(8, '4', 'Cloud Engineer', 'ZVgy0', '', '25k', '2', '2', '0', NULL, '2020-09-29 22:28:08'),
(9, '1', 'Junior Level Developer', '3POzr', '', '2000', '1', '3', '0', NULL, '2020-09-29 22:28:12'),
(10, '3', 'Cloud Engineer', 'ZVgy0', '', '25k', '2', '2', '0', NULL, '2020-09-29 22:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `banners_and_ads`
--

CREATE TABLE `banners_and_ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner_url` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners_and_ads`
--

INSERT INTO `banners_and_ads` (`id`, `title`, `position`, `image`, `banner_url`, `created_at`, `updated_at`) VALUES
(3, 'Content Banner', 'content_banner_1', 'a5750f7fde.gif', 'https://jumia.com', '2020-09-01 03:59:39', '2020-09-01'),
(4, 'Top Banner', 'top_banner_1', '90efa3e616.gif', 'https://jumia.com', '2020-09-01 05:31:54', NULL),
(5, 'Content Banner 2', 'content_banner_2', '40b8169f4c.jpg', 'https://jumia.com', '2020-09-01 05:41:02', NULL),
(6, 'ukesps banner 2', 'top_banner_2', '65149607eb.gif', 'http://jumia.com.ng', '2020-09-01 06:00:37', NULL),
(7, 'content banner 3', 'content_banner_3', '48254e7d2f.gif', 'http://jumia.com.ng', '2020-09-01 06:04:23', NULL),
(8, 'content banner 4', 'content_banner_4', '667df5e9f0.jpg', 'http://jumia.com.ng', '2020-09-01 06:07:10', NULL),
(9, 'The Agency for you', 'The fastest growing UK based agency that has been recruiting students from Nigeria, Ghana, Kenya and Pakistan', 'd28c62eab9.jpg', '2020-10-14', '2020-09-01 06:41:55', ''),
(10, 'footer banner 2', 'footer_banner_2', '75ed348220.gif', 'http://jumia.com.ng', '2020-09-01 06:43:08', NULL),
(12, 'right banner 1', 'right_banner_1', '063a9c954f.jpeg', 'http://ukesps.com', '2020-09-01 07:41:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(9, 'Smartly', 'ukesps@gmail.com', '08066885363', 'thanks', '2020-10-07 16:36:23', NULL),
(4, 'New Product', 'sam@gmail.com', '08165748392', 'dsdvsv', '2020-09-15 13:53:19', '2020-09-22 09:08:40'),
(7, 'Anthony Daniels', 'tradeparkuk@gmail.com', '08066885363', 'just checking', '2020-10-05 23:10:34', '2020-10-08 00:03:54'),
(8, 'Emeka Joseph', 'emeka.josephonyebuchi@gmail.com', '08169993594', 'dsdvs', '2020-10-07 04:53:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `country`, `address`, `phone`, `email`, `updated_at`) VALUES
(1, 'United Kingdom', '19 Richland house, Goldsmith Road, London Se15 5SZ.', '+447448443723', 'info@ukesps.com', '2020-08-26 00:00:00'),
(3, 'Nigeria', '13 Oshitelu Street, Computer Village, Ikeja, Lagos, Nigeria', '+2348031334343', 'info@ukesps.com', '2020-09-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_location` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` longtext,
  `entrydate` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `page_name`, `page_location`, `title`, `info`, `entrydate`) VALUES
(1, 'about', '', 'About Us', '<p>UKESPS ~ United Kingdom employment and skill placement services is a unique organization that offers integrated services in the area of education, employment, skill upgrade and placements.</p>\r\n\r\n<p>At UKESPS, we aim to assist potential students and job seekers to achieve their goals by providing guided assistance in the process of securing&nbsp;either jobs, admission or simply updating their skills to enhance employability.</p>\r\n\r\n<p>UKESPS offers free access to job searchers, CV posting, institutions and skill training searches. We have passionate professionals and reputable course providers and institutions that partner with us to achieve our goals.</p>\r\n\r\n<p>UKESPS provide platform that allows prospective job seekers, students and enthusiasts to connect to millions of people and verified organisations to new opportunities and achieve their ambitions. Employers and institutions can reach their candidate effectively with UKESPS solution.</p>\r\n\r\n<p>At UKESPS, we also undertake adverts from employers and many recruitment agencies as well as course providers to ease job and admission search by putting everything under one platform. We feature various online and in-class courses from many reputable course providers and institutions, including distance learning and free courses. Many employers and institutions prefer our range of services which include job and course advertising, job search, course and banner advertising.</p>\r\n\r\n<p>Our mission is to help in matching potentials skills with opportunities both in employment and academic world.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-09-21'),
(3, 'enquiry_now', '', 'Help', '<p>Enquire Now</p>\r\n', '2020-08-26'),
(4, 'terms_and_conditions', '', 'Terms and Conditions', '<p>This is our terms and conditions</p>\r\n', '2020-09-01'),
(5, 'privacy_policy', '', 'Privacy Policy', '<p>This is privacy Policy Page</p>\r\n', '2020-09-01'),
(6, 'scholarships', '', 'Scholarships', '<p>Scholarship opportunities come up annually and offered by various universities and organisations. UKESPS ~ United Kingdom Education and Skills Placement Services Limited works with the universities and organizations that offer scholarship opportunities to students. Ukesps helps interested students to apply for scholarships successfully because we are competent. Most scholarships are granted on merit, nationality and financial needs. If you are interested in applying for a scholarship, Ukesps would be glad to help in locating current scholarships and rendering our service in processing your applications correctly. Please note that application requirements for scholarship changes annually, available number of scholarships and the universities that offers them also varies yearly. The nearest UKESPS contacts in your location will available to assist in giving up -to -date information and more information about particular scholarships can be assessed by using the links provided by the organisations and universities.</p>\r\n\r\n<h2>AVAILABLE SCHOLARSHIPS</h2>\r\n\r\n<p>Below is a selection of available scholarship</p>\r\n\r\n<h3><strong>Petroleum Technology Development Fund (PTDF)</strong></h3>\r\n\r\n<p>The Petroleum Technology Development Fund (PTDF), the federal government agency with the mandate of developing indigenous human capacity and petroleum to meet the needs of the oil and gas industry, invites applications from suitable qualified candidate for Overseas MSc and PhD Scholarships to institutions under its strategic partnership initiative. Successful candidates will be awarded scholarship to study in France, Germany, China and Malaysia. Please visit the website for more information: <a href=\"http://www.ptdf.gov.ng/\">www.ptdf.gov.ng</a></p>\r\n\r\n<hr />\r\n<h3><strong>Niger Delta Development Commission (NDDC)</strong></h3>\r\n\r\n<p>The Niger Delta Development commission (NDDC) is offering opportunities to indigenes of Niger Delta to pursue their post-graduate studies overseas. Please visit the website for more information: <a href=\"http://www.nddc.gov.ng/\">www.nddc.gov.ng</a></p>\r\n\r\n<hr />\r\n<h3><strong>FORD FOUNDATION</strong></h3>\r\n\r\n<p>The Ford Family Foundation offers opportunities for worthy potential recipients who are committed in using this special offer to impact themselves and their respective environment. Please visit the website for more information: <a href=\"http://www.pathfind.org/\">www.pathfind.org</a></p>\r\n\r\n<hr />\r\n<h3><strong>BRITISH COUNCIL </strong></h3>\r\n\r\n<p>The British Council in collaboration with the UK&rsquo;s Great Britain campaign has lunched great scholarships<strong> </strong>and they are available for Nigeria students. Please visit the website for more information: <a href=\"http://www.britishcouncil.org/\">www.britishcouncil.org</a></p>\r\n\r\n<hr />\r\n<h3><strong>CHEVENING SCHORLARSHIP PROGRAMME</strong></h3>\r\n\r\n<p>Chevening is the UK Government&rsquo;s global scholarship programme that offers future leaders the unique opportunity to study in the UK. These scholarships are awarded to outstanding professionals from all over the world to pursue a one-year master&rsquo;s degree in any course of their choice at any UK University. Please visit the website for more information: <a href=\"http://www.chevening.org/\">www.chevening.org</a></p>\r\n\r\n<hr />\r\n<h3><strong>TERTIARY EDUCATION TRUST FUND(TETFUND)</strong></h3>\r\n\r\n<p>Tertiary Education trust fund is a scholarship for teaching staff, training and development. Only Nigerians are eligible to apply. It&rsquo;s a full-time study for postgraduate and all subjects are available. Tuition fees and living expenses are paid for to enhance full concentration on the part of the student. Please visit the website for more information: <a href=\"http://www.tetfund.gov.ng/\">www.tetfund.gov.ng</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-09-23'),
(7, 'english_tests', '', 'English Test', '<p>&nbsp;</p>\r\n\r\n<p>The International English Language Testing System (IELTS)</p>\r\n\r\n<p>The International English Language Testing System (IELTS) is an international standardized test of English Language proficiency for non-native English language speakers. It is use to assess the language proficiency of people who want to work or study in territory where English is used as a language of communication. IELTS is one of the major English language tests in the world. An IELTS result is issued to all test takers with a score from &ldquo;band 1&rdquo; (non-user) to &ldquo;band 9&rdquo; (expert user). The IELTS test comes in two versions: Academic, which is usually taken by students who wish to study abroad, and the General Training, which is mostly used for immigration purposes.</p>\r\n\r\n<p>TEST STRUCTURE</p>\r\n\r\n<p>In total, the test takes 2 hours and 45 minutes. It is divided into four sections to test your ability- listening, reading, writing and speaking.</p>\r\n\r\n<p>Listening, reading and writing are completed in one sitting. The speaking test can be taken on the same day or up to seven days before or after the other tests.</p>\r\n\r\n<p>LISTENING &nbsp;</p>\r\n\r\n<p>The listening test takes 40 minutes: 30minutes for testing and 10minutes for transferring the answers to an answer booklet.</p>\r\n\r\n<p>This module comprises of four sections with ten questions in each section. You will listen to four recorded texts, monologues and conversations by a range of native speakers. Sections one and two are about day to day social situations while sections three and four are about educational and training situations. The people speaking may have accents from anywhere in the world and in most cases, sections will get increasingly difficult as you progress through the test.</p>\r\n\r\n<p>Section 1- A conversation between two speakers, for example, a conversation about travel arrangements.</p>\r\n\r\n<p>Section 2- A monologue set in an everyday social context.</p>\r\n\r\n<p>Section 3- A conversation between two or more native speakers set in an educational or training context.</p>\r\n\r\n<p>Section 4- A monologue about an academic subject.</p>\r\n\r\n<p>The first three sections have a break in the middle allowing test takers to look at the remaining questions. Each question is heard only once.</p>\r\n\r\n<p>READING</p>\r\n\r\n<p>The reading test takes 60 minutes and it consists of three sections of increasingly difficulty. It consists of 40 questions, a variety of question types is used in order to test a wide range of reading skills like logic, comprehension and vocabulary.</p>\r\n\r\n<p>The first section contains two or three short texts which deal with everyday topics. The second section contains two texts which deal with work. The third section contains one long text about a topic of general interest.</p>\r\n\r\n<p>Three reading texts which comes from books, journals, magazines, newspapers and online resources written for non-specialist audiences.</p>\r\n\r\n<p>WRITING</p>\r\n\r\n<p>The writing test takes 60 minutes and it involves two task, both of which must be completed under the specified duration.</p>\r\n\r\n<p>In the first task, you are presented with a graph, table, chart, map, process, pie chart or diagram and asked to give a descriptive piece of writing based on the information. Your answer must be around one hundred and fifty words and you are expected to spend twenty minutes on this task.</p>\r\n\r\n<p>In the second task, you must produce a two hundred and fifty word essay in response to a point of view, argument or problem. You may be required to create an argument, present a solution, or present and justify an opinion. You are expected to spend forty minutes on this task.</p>\r\n\r\n<p>SPEAKING</p>\r\n\r\n<p>The speaking test takes about eleven to fourteen minutes and it is conducted face-to-face between the task taker and the examiner. It contains three sections.</p>\r\n\r\n<p>Section 1. The examiner will ask you random questions about yourself, family, work, hobbies, interests, reasons for taking IELTS exam as well as other general topics. This section lasts for about four to five minutes.</p>\r\n\r\n<p>Section 2. Test takers are given a card which ask you to talk about a particular topic. You will be given a minute to prepare to talk about the given topic, and you are expected to talk about the topic for two minutes. The examiner may ask one or two questions after. This section lasts for about three to four minutes.</p>\r\n\r\n<p>Section 3. The third section is related to the second section. It involves a discussion between the examiner and the test taker, generally on questions relating to the theme they spoke about in section two. This section lasts for about four to five minutes.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PEARSON TEST OF ENGLISH (PTE) ACADEMIC</p>\r\n\r\n<p>Pearson Test of English is a computer-based exam which focuses on English used in academic surroundings. You will hear variety of accent during the test. To undergo a PTE Academic test, you will need to attend a secure Pearson test centre where you will be given a computer to work with. Headset is also provided to aid listening. It is a 3 hours test session and test takers can expect their results delivered to them online within 5 working days</p>\r\n\r\n<p>TEST STRUCTURE&nbsp;</p>\r\n\r\n<p>The Pearson Test of English Academic comprises of 3 sections speaking &amp;writing, reading and listening.</p>\r\n\r\n<p><strong>SECTION 1: SPEAKING &amp; WRITING (77 &ndash; 93 minutes)</strong></p>\r\n\r\n<ul>\r\n	<li>Personal Introduction</li>\r\n	<li>Read aloud</li>\r\n	<li>Repeat sentence</li>\r\n	<li>Describe image</li>\r\n	<li>Re-tell lecture</li>\r\n	<li>Answer short question</li>\r\n	<li>Summarize written text (10 mins)</li>\r\n	<li>Essay (20 mins)</li>\r\n</ul>\r\n\r\n<p><strong>SECTION 2: READING (32 &ndash; 41 minutes)</strong></p>\r\n\r\n<ul>\r\n	<li>Fill in the blanks</li>\r\n	<li>Multiple choice, choose multiple answers</li>\r\n	<li>Re-order paragraphs</li>\r\n	<li>Fill in the blanks</li>\r\n	<li>Multiple choice, choose single answers</li>\r\n	<li>A ten minute break is optional</li>\r\n</ul>\r\n\r\n<p><strong>SECTION 3: LISTENING (45 &ndash; 57 minutes)</strong></p>\r\n\r\n<ul>\r\n	<li>Summarize spoken text</li>\r\n	<li>Multiple choice, choose multiple answers</li>\r\n	<li>Fill the blanks</li>\r\n	<li>Highlight the correct summary</li>\r\n	<li>Multiple choice, choose a single answer</li>\r\n	<li>Select missing word</li>\r\n	<li>Highlight incorrect words</li>\r\n	<li>Write from dictation &nbsp;</li>\r\n</ul>\r\n\r\n<p>TEST OF ENGLISH AS A FOREIGN LANGUAGE (TOEFL)</p>\r\n\r\n<p>Test of English as a foreign language is a standardized test to measure the English language proficiency of a non-native speaker who wish to enrol in any English-speaking universities. TOEFL is the second major English language tests in the world after IELTS.</p>\r\n\r\n<p>The TOEFL test is available in 2 formats. The first format is delivered via the internet and the second format is a paper test. 97 percent of TOEFL test takers worldwide take the internet based format and this format is desired by universities. For test takers who do not have access to the internet, there is a paper delivered test and it is only offered in locations where testing via the internet is not available. Regardless of which test you take, both TOEFL scores remain valid for 2 years after your test date.</p>\r\n\r\n<p>Our focus will be on <strong>TEST OF ENGLISH AS A FOREIGN LANGUAGE INTERNET-BASED (TOEFL IBT)</strong> because it is the most used. The four hour test consists of four sections, each measuring one of the basic language skills and all tasks focus on language used in an academic, higher-education environment. The four sections are reading, listening, speaking and writing.</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p><strong>Task</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p><strong>Description</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p><strong>Approximate</strong> <strong>time</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Reading</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>3-4 passages, each containing 10 questions</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p>54-72 minutes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Listening</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>5-7 passages, each containing 5-6 questions</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p>41-57 minutes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Break</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Mandatory break</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p>10 minutes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Speaking</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>4 tasks</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p>17 minutes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>Writing</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.25pt\">\r\n			<p>2 tasks</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:150.3pt\">\r\n			<p>50 minutes</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>More than 9,000 colleges in over 130 countries accept TOEFL scores</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `country_iso_code_2` char(3) NOT NULL DEFAULT '',
  `status` enum('0','1') DEFAULT '1',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_iso_code_2`, `status`, `updated`) VALUES
(1, 'Afghanistan', 'AF', '1', '0000-00-00 00:00:00'),
(2, 'Albania', 'AL', '1', '0000-00-00 00:00:00'),
(3, 'Algeria', 'DZ', '1', '0000-00-00 00:00:00'),
(4, 'American Samoa', 'AS', '1', '0000-00-00 00:00:00'),
(5, 'Andorra', 'AD', '1', '0000-00-00 00:00:00'),
(6, 'Angola', 'AO', '1', '0000-00-00 00:00:00'),
(7, 'Anguilla', 'AI', '1', '0000-00-00 00:00:00'),
(8, 'Antarctica', 'AQ', '1', '0000-00-00 00:00:00'),
(9, 'Antigua and Barbuda', 'AG', '1', '0000-00-00 00:00:00'),
(10, 'Argentina', 'AR', '1', '0000-00-00 00:00:00'),
(11, 'Armenia', 'AM', '1', '0000-00-00 00:00:00'),
(12, 'Aruba', 'AW', '1', '0000-00-00 00:00:00'),
(13, 'Australia', 'AU', '1', '0000-00-00 00:00:00'),
(14, 'Austria', 'AT', '1', '0000-00-00 00:00:00'),
(15, 'Azerbaijan', 'AZ', '1', '0000-00-00 00:00:00'),
(16, 'Bahamas', 'BS', '1', '0000-00-00 00:00:00'),
(17, 'Bahrain', 'BH', '1', '0000-00-00 00:00:00'),
(18, 'Bangladesh', 'BD', '1', '0000-00-00 00:00:00'),
(19, 'Barbados', 'BB', '1', '0000-00-00 00:00:00'),
(20, 'Belarus', 'BY', '1', '0000-00-00 00:00:00'),
(21, 'Belgium', 'BE', '1', '0000-00-00 00:00:00'),
(22, 'Belize', 'BZ', '1', '0000-00-00 00:00:00'),
(23, 'Benin', 'BJ', '1', '0000-00-00 00:00:00'),
(24, 'Bermuda', 'BM', '1', '0000-00-00 00:00:00'),
(25, 'Bhutan', 'BT', '1', '0000-00-00 00:00:00'),
(26, 'Bolivia', 'BO', '1', '0000-00-00 00:00:00'),
(27, 'Bonaire, Saint Eustatius and Saba', 'BQ', '1', '2016-12-19 11:40:06'),
(28, 'Bosnia and Herzegowina', 'BA', '1', '0000-00-00 00:00:00'),
(29, 'Botswana', 'BW', '1', '0000-00-00 00:00:00'),
(30, 'Bouvet Island', 'BV', '1', '0000-00-00 00:00:00'),
(31, 'Brazil', 'BR', '1', '0000-00-00 00:00:00'),
(32, 'British Indian Ocean Territory', 'IO', '1', '0000-00-00 00:00:00'),
(33, 'Brunei Darussalam', 'BN', '1', '0000-00-00 00:00:00'),
(34, 'Bulgaria', 'BG', '1', '0000-00-00 00:00:00'),
(35, 'Burkina Faso', 'BF', '1', '0000-00-00 00:00:00'),
(36, 'Burundi', 'BI', '1', '0000-00-00 00:00:00'),
(37, 'Cambodia', 'KH', '1', '0000-00-00 00:00:00'),
(38, 'Cameroon', 'CM', '1', '0000-00-00 00:00:00'),
(39, 'Canada', 'CA', '1', '0000-00-00 00:00:00'),
(40, 'Cape Verde', 'CV', '1', '0000-00-00 00:00:00'),
(41, 'Cayman Islands', 'KY', '1', '0000-00-00 00:00:00'),
(42, 'Central African Republic', 'CF', '1', '0000-00-00 00:00:00'),
(43, 'Chad', 'TD', '1', '0000-00-00 00:00:00'),
(44, 'Chile', 'CL', '1', '0000-00-00 00:00:00'),
(45, 'China', 'CN', '1', '0000-00-00 00:00:00'),
(46, 'Christmas Island', 'CX', '1', '0000-00-00 00:00:00'),
(47, 'Cocos (Keeling) Islands', 'CC', '1', '0000-00-00 00:00:00'),
(48, 'Colombia', 'CO', '1', '0000-00-00 00:00:00'),
(49, 'Comoros', 'KM', '1', '0000-00-00 00:00:00'),
(50, 'Congo', 'CG', '1', '0000-00-00 00:00:00'),
(51, 'Cook Islands', 'CK', '1', '0000-00-00 00:00:00'),
(52, 'Costa Rica', 'CR', '1', '0000-00-00 00:00:00'),
(53, 'Cote D\'Ivoire', 'CI', '1', '0000-00-00 00:00:00'),
(54, 'Croatia', 'HR', '1', '0000-00-00 00:00:00'),
(55, 'Cuba', 'CU', '1', '0000-00-00 00:00:00'),
(56, 'Cyprus', 'CY', '1', '0000-00-00 00:00:00'),
(57, 'Czech Republic', 'CZ', '1', '0000-00-00 00:00:00'),
(58, 'Denmark', 'DK', '1', '0000-00-00 00:00:00'),
(59, 'Djibouti', 'DJ', '1', '0000-00-00 00:00:00'),
(60, 'Dominica', 'DM', '1', '0000-00-00 00:00:00'),
(61, 'Dominican Republic', 'DO', '1', '0000-00-00 00:00:00'),
(62, 'East Timor', 'TP', '1', '0000-00-00 00:00:00'),
(63, 'Ecuador', 'EC', '1', '0000-00-00 00:00:00'),
(64, 'Egypt', 'EG', '1', '0000-00-00 00:00:00'),
(65, 'El Salvador', 'SV', '1', '0000-00-00 00:00:00'),
(66, 'Equatorial Guinea', 'GQ', '1', '0000-00-00 00:00:00'),
(67, 'Eritrea', 'ER', '1', '0000-00-00 00:00:00'),
(68, 'Estonia', 'EE', '1', '0000-00-00 00:00:00'),
(69, 'Ethiopia', 'ET', '1', '0000-00-00 00:00:00'),
(70, 'Falkland Islands (Malvinas)', 'FK', '1', '0000-00-00 00:00:00'),
(71, 'Faroe Islands', 'FO', '1', '0000-00-00 00:00:00'),
(72, 'Fiji', 'FJ', '1', '0000-00-00 00:00:00'),
(73, 'Finland', 'FI', '1', '0000-00-00 00:00:00'),
(74, 'France', 'FR', '1', '0000-00-00 00:00:00'),
(75, 'France, Metropolitan', 'FX', '1', '0000-00-00 00:00:00'),
(76, 'French Guiana', 'GF', '1', '0000-00-00 00:00:00'),
(77, 'French Polynesia', 'PF', '1', '0000-00-00 00:00:00'),
(78, 'French Southern Territories', 'TF', '1', '0000-00-00 00:00:00'),
(79, 'Gabon', 'GA', '1', '0000-00-00 00:00:00'),
(80, 'Gambia', 'GM', '1', '0000-00-00 00:00:00'),
(81, 'Georgia', 'GE', '1', '0000-00-00 00:00:00'),
(82, 'Germany', 'DE', '1', '0000-00-00 00:00:00'),
(83, 'Ghana', 'GH', '1', '0000-00-00 00:00:00'),
(84, 'Gibraltar', 'GI', '1', '0000-00-00 00:00:00'),
(85, 'Greece', 'GR', '1', '0000-00-00 00:00:00'),
(86, 'Greenland', 'GL', '1', '0000-00-00 00:00:00'),
(87, 'Grenada', 'GD', '1', '0000-00-00 00:00:00'),
(88, 'Guadeloupe', 'GP', '1', '0000-00-00 00:00:00'),
(89, 'Guam', 'GU', '1', '0000-00-00 00:00:00'),
(90, 'Guatemala', 'GT', '1', '0000-00-00 00:00:00'),
(91, 'Guinea', 'GN', '1', '0000-00-00 00:00:00'),
(92, 'Guinea-bissau', 'GW', '1', '0000-00-00 00:00:00'),
(93, 'Guyana', 'GY', '1', '0000-00-00 00:00:00'),
(94, 'Haiti', 'HT', '1', '0000-00-00 00:00:00'),
(95, 'Heard and Mc Donald Islands', 'HM', '1', '0000-00-00 00:00:00'),
(96, 'Honduras', 'HN', '1', '0000-00-00 00:00:00'),
(97, 'Hong Kong', 'HK', '1', '0000-00-00 00:00:00'),
(98, 'Hungary', 'HU', '1', '0000-00-00 00:00:00'),
(99, 'Iceland', 'IS', '1', '0000-00-00 00:00:00'),
(100, 'India', 'IN', '1', '0000-00-00 00:00:00'),
(101, 'Indonesia', 'ID', '1', '0000-00-00 00:00:00'),
(102, 'Iran (Islamic Republic of)', 'IR', '1', '0000-00-00 00:00:00'),
(103, 'Iraq', 'IQ', '1', '0000-00-00 00:00:00'),
(104, 'Ireland', 'IE', '1', '0000-00-00 00:00:00'),
(105, 'Isle of Man', 'IM', '1', '2016-12-19 11:36:25'),
(106, 'Israel', 'IL', '1', '0000-00-00 00:00:00'),
(107, 'Italy', 'IT', '1', '0000-00-00 00:00:00'),
(108, 'Jamaica', 'JM', '1', '0000-00-00 00:00:00'),
(109, 'Japan', 'JP', '1', '0000-00-00 00:00:00'),
(110, 'Jordan', 'JO', '1', '0000-00-00 00:00:00'),
(111, 'Kazakhstan', 'KZ', '1', '0000-00-00 00:00:00'),
(112, 'Kenya', 'KE', '1', '0000-00-00 00:00:00'),
(113, 'Kiribati', 'KI', '1', '0000-00-00 00:00:00'),
(114, 'Korea, Democratic People\'s Republic of', 'KP', '1', '0000-00-00 00:00:00'),
(115, 'Korea, Republic of', 'KR', '1', '0000-00-00 00:00:00'),
(116, 'Kuwait', 'KW', '1', '0000-00-00 00:00:00'),
(117, 'Kyrgyzstan', 'KG', '1', '0000-00-00 00:00:00'),
(118, 'Lao People\'s Democratic Republic', 'LA', '1', '0000-00-00 00:00:00'),
(119, 'Latvia', 'LV', '1', '0000-00-00 00:00:00'),
(120, 'Lebanon', 'LB', '1', '0000-00-00 00:00:00'),
(121, 'Lesotho', 'LS', '1', '0000-00-00 00:00:00'),
(122, 'Liberia', 'LR', '1', '0000-00-00 00:00:00'),
(123, 'Libyan Arab Jamahiriya', 'LY', '1', '0000-00-00 00:00:00'),
(124, 'Liechtenstein', 'LI', '1', '0000-00-00 00:00:00'),
(125, 'Lithuania', 'LT', '1', '0000-00-00 00:00:00'),
(126, 'Luxembourg', 'LU', '1', '0000-00-00 00:00:00'),
(127, 'Macau', 'MO', '1', '0000-00-00 00:00:00'),
(128, 'Macedonia, The Former Yugoslav Republic of', 'MK', '1', '0000-00-00 00:00:00'),
(129, 'Madagascar', 'MG', '1', '0000-00-00 00:00:00'),
(130, 'Malawi', 'MW', '1', '0000-00-00 00:00:00'),
(131, 'Malaysia', 'MY', '1', '0000-00-00 00:00:00'),
(132, 'Maldives', 'MV', '1', '0000-00-00 00:00:00'),
(133, 'Mali', 'ML', '1', '0000-00-00 00:00:00'),
(134, 'Malta', 'MT', '1', '0000-00-00 00:00:00'),
(135, 'Marshall Islands', 'MH', '1', '0000-00-00 00:00:00'),
(136, 'Martinique', 'MQ', '1', '0000-00-00 00:00:00'),
(137, 'Mauritania', 'MR', '1', '0000-00-00 00:00:00'),
(138, 'Mauritius', 'MU', '1', '0000-00-00 00:00:00'),
(139, 'Mayotte', 'YT', '1', '0000-00-00 00:00:00'),
(140, 'Mexico', 'MX', '1', '0000-00-00 00:00:00'),
(141, 'Micronesia, Federated States of', 'FM', '1', '0000-00-00 00:00:00'),
(142, 'Moldova, Republic of', 'MD', '1', '0000-00-00 00:00:00'),
(143, 'Monaco', 'MC', '1', '0000-00-00 00:00:00'),
(144, 'Mongolia', 'MN', '1', '0000-00-00 00:00:00'),
(145, 'Montserrat', 'MS', '1', '0000-00-00 00:00:00'),
(146, 'Morocco', 'MA', '1', '0000-00-00 00:00:00'),
(147, 'Mozambique', 'MZ', '1', '0000-00-00 00:00:00'),
(148, 'Myanmar', 'MM', '1', '0000-00-00 00:00:00'),
(149, 'Namibia', 'NA', '1', '0000-00-00 00:00:00'),
(150, 'Nauru', 'NR', '1', '0000-00-00 00:00:00'),
(151, 'Nepal', 'NP', '1', '0000-00-00 00:00:00'),
(152, 'Netherlands', 'NL', '1', '0000-00-00 00:00:00'),
(153, 'Netherlands Antilles', 'AN', '1', '0000-00-00 00:00:00'),
(154, 'New Caledonia', 'NC', '1', '0000-00-00 00:00:00'),
(155, 'New Zealand', 'NZ', '1', '0000-00-00 00:00:00'),
(156, 'Nicaragua', 'NI', '1', '0000-00-00 00:00:00'),
(157, 'Niger', 'NE', '1', '0000-00-00 00:00:00'),
(158, 'Nigeria', 'NG', '1', '0000-00-00 00:00:00'),
(159, 'Niue', 'NU', '1', '0000-00-00 00:00:00'),
(160, 'Norfolk Island', 'NF', '1', '0000-00-00 00:00:00'),
(161, 'Northern Mariana Islands', 'MP', '1', '0000-00-00 00:00:00'),
(162, 'Norway', 'NO', '1', '0000-00-00 00:00:00'),
(163, 'Oman', 'OM', '1', '0000-00-00 00:00:00'),
(164, 'Pakistan', 'PK', '1', '0000-00-00 00:00:00'),
(165, 'Palau', 'PW', '1', '0000-00-00 00:00:00'),
(166, 'Panama', 'PA', '1', '0000-00-00 00:00:00'),
(167, 'Papua New Guinea', 'PG', '1', '0000-00-00 00:00:00'),
(168, 'Paraguay', 'PY', '1', '0000-00-00 00:00:00'),
(169, 'Peru', 'PE', '1', '0000-00-00 00:00:00'),
(170, 'Philippines', 'PH', '1', '0000-00-00 00:00:00'),
(171, 'Pitcairn', 'PN', '1', '0000-00-00 00:00:00'),
(172, 'Poland', 'PL', '1', '0000-00-00 00:00:00'),
(173, 'Portugal', 'PT', '1', '0000-00-00 00:00:00'),
(174, 'Puerto Rico', 'PR', '1', '0000-00-00 00:00:00'),
(175, 'Qatar', 'QA', '1', '0000-00-00 00:00:00'),
(176, 'Reunion', 'RE', '1', '0000-00-00 00:00:00'),
(177, 'Romania', 'RO', '1', '0000-00-00 00:00:00'),
(178, 'Russian Federation', 'RU', '1', '0000-00-00 00:00:00'),
(179, 'Rwanda', 'RW', '1', '0000-00-00 00:00:00'),
(180, 'Saint Kitts and Nevis', 'KN', '1', '0000-00-00 00:00:00'),
(181, 'Saint Lucia', 'LC', '1', '0000-00-00 00:00:00'),
(182, 'Saint Vincent and the Grenadines', 'VC', '1', '0000-00-00 00:00:00'),
(183, 'Samoa', 'WS', '1', '0000-00-00 00:00:00'),
(184, 'San Marino', 'SM', '1', '0000-00-00 00:00:00'),
(185, 'Sao Tome and Principe', 'ST', '1', '0000-00-00 00:00:00'),
(186, 'Saudi Arabia', 'SA', '1', '0000-00-00 00:00:00'),
(187, 'Senegal', 'SN', '1', '0000-00-00 00:00:00'),
(188, 'Serbia', 'RS', '1', '2016-12-19 11:42:28'),
(189, 'Seychelles', 'SC', '1', '0000-00-00 00:00:00'),
(190, 'Sierra Leone', 'SL', '1', '0000-00-00 00:00:00'),
(191, 'Singapore', 'SG', '1', '0000-00-00 00:00:00'),
(192, 'Slovakia (Slovak Republic)', 'SK', '1', '0000-00-00 00:00:00'),
(193, 'Slovenia', 'SI', '1', '0000-00-00 00:00:00'),
(194, 'Solomon Islands', 'SB', '1', '0000-00-00 00:00:00'),
(195, 'Somalia', 'SO', '1', '0000-00-00 00:00:00'),
(196, 'South Africa', 'ZA', '1', '0000-00-00 00:00:00'),
(197, 'South Georgia and the South Sandwich Islands', 'GS', '1', '0000-00-00 00:00:00'),
(198, 'Spain', 'ES', '1', '0000-00-00 00:00:00'),
(199, 'Sri Lanka', 'LK', '1', '0000-00-00 00:00:00'),
(200, 'St Barthelemy', 'BL', '1', '2016-12-19 11:34:29'),
(201, 'St Maarten', 'SX', '1', '2016-12-19 11:23:15'),
(202, 'St. Helena', 'SH', '1', '0000-00-00 00:00:00'),
(203, 'St. Pierre and Miquelon', 'PM', '1', '0000-00-00 00:00:00'),
(204, 'Sudan', 'SD', '1', '0000-00-00 00:00:00'),
(205, 'Suriname', 'SR', '1', '0000-00-00 00:00:00'),
(206, 'Svalbard and Jan Mayen Islands', 'SJ', '1', '0000-00-00 00:00:00'),
(207, 'Swaziland', 'SZ', '1', '0000-00-00 00:00:00'),
(208, 'Sweden', 'SE', '1', '0000-00-00 00:00:00'),
(209, 'Switzerland', 'CH', '1', '0000-00-00 00:00:00'),
(210, 'Syrian Arab Republic', 'SY', '1', '0000-00-00 00:00:00'),
(211, 'Taiwan', 'TW', '1', '0000-00-00 00:00:00'),
(212, 'Tajikistan', 'TJ', '1', '0000-00-00 00:00:00'),
(213, 'Tanzania, United Republic of', 'TZ', '1', '0000-00-00 00:00:00'),
(214, 'Thailand', 'TH', '1', '0000-00-00 00:00:00'),
(215, 'Togo', 'TG', '1', '0000-00-00 00:00:00'),
(216, 'Tokelau', 'TK', '1', '0000-00-00 00:00:00'),
(217, 'Tonga', 'TO', '1', '0000-00-00 00:00:00'),
(218, 'Trinidad and Tobago', 'TT', '1', '0000-00-00 00:00:00'),
(219, 'Tunisia', 'TN', '1', '0000-00-00 00:00:00'),
(220, 'Turkey', 'TR', '1', '0000-00-00 00:00:00'),
(221, 'Turkmenistan', 'TM', '1', '0000-00-00 00:00:00'),
(222, 'Turks and Caicos Islands', 'TC', '1', '0000-00-00 00:00:00'),
(223, 'Tuvalu', 'TV', '1', '0000-00-00 00:00:00'),
(224, 'Uganda', 'UG', '1', '0000-00-00 00:00:00'),
(225, 'Ukraine', 'UA', '1', '0000-00-00 00:00:00'),
(226, 'United Arab Emirates', 'AE', '1', '0000-00-00 00:00:00'),
(227, 'United Kingdom', 'GB', '1', '0000-00-00 00:00:00'),
(228, 'United States', 'US', '1', '0000-00-00 00:00:00'),
(229, 'United States Minor Outlying Islands', 'UM', '1', '0000-00-00 00:00:00'),
(230, 'Uruguay', 'UY', '1', '0000-00-00 00:00:00'),
(231, 'Uzbekistan', 'UZ', '1', '0000-00-00 00:00:00'),
(232, 'Vanuatu', 'VU', '1', '0000-00-00 00:00:00'),
(233, 'Vatican City State (Holy See)', 'VA', '1', '0000-00-00 00:00:00'),
(234, 'Venezuela', 'VE', '1', '0000-00-00 00:00:00'),
(235, 'Viet Nam', 'VN', '1', '0000-00-00 00:00:00'),
(236, 'Virgin Islands (British)', 'VG', '1', '0000-00-00 00:00:00'),
(237, 'Virgin Islands (U.S.)', 'VI', '1', '0000-00-00 00:00:00'),
(238, 'Wallis and Futuna Islands', 'WF', '1', '0000-00-00 00:00:00'),
(239, 'Western Sahara', 'EH', '1', '0000-00-00 00:00:00'),
(240, 'Yemen', 'YE', '1', '0000-00-00 00:00:00'),
(241, 'Yugoslavia', 'YU', '1', '0000-00-00 00:00:00'),
(242, 'Zaire', 'ZR', '1', '0000-00-00 00:00:00'),
(243, 'Zambia', 'ZM', '1', '0000-00-00 00:00:00'),
(244, 'Zimbabwe', 'ZW', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `couprov_code` varchar(10) DEFAULT NULL,
  `course_img` varchar(200) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `study_method` varchar(15) DEFAULT NULL,
  `study_level` varchar(6) DEFAULT NULL,
  `course_category` int(6) DEFAULT NULL,
  `course_subcategory` int(5) DEFAULT NULL,
  `course_fee` double(8,2) DEFAULT '0.00',
  `fee_period` varchar(30) DEFAULT NULL,
  `course_currency` varchar(8) DEFAULT '&pound;',
  `course_institute` varchar(6) DEFAULT NULL,
  `course_type` int(4) DEFAULT NULL,
  `course_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` varchar(10) DEFAULT NULL,
  `qualification` tinytext,
  `location` tinytext,
  `country` varchar(10) DEFAULT NULL,
  `course_overview` tinytext,
  `description` text,
  `course_structure` text,
  `entry_requirements` text,
  `apply_info` text,
  `ratings` tinytext,
  `views` int(5) DEFAULT NULL,
  `career_path` tinytext,
  `who_is_course_for` tinytext,
  `tags` text,
  `admin_id` varchar(5) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `couprov_code`, `course_img`, `course_title`, `study_method`, `study_level`, `course_category`, `course_subcategory`, `course_fee`, `fee_period`, `course_currency`, `course_institute`, `course_type`, `course_date`, `duration`, `qualification`, `location`, `country`, `course_overview`, `description`, `course_structure`, `entry_requirements`, `apply_info`, `ratings`, `views`, `career_path`, `who_is_course_for`, `tags`, `admin_id`, `timestamp`) VALUES
(2, 'YC6Oz', 'fis.jpg', 'AAT Accounting: AAT Level 2 Foundation Certificate In Accounting', '2', '1', 1, 3, 10.00, '6', 'USD', '1', 1, '2020-04-09 20:04:33', '6 months', '<p>AAT Level 2 Certificate in Accounting (QCF)</p>\r\n\r\n<p>Awarded by <a href=\"https://www.reed.co.uk/courses/awarding-bodies/aat?backUrl=https%3A%2F%2Fwww.reed.co.uk%2Fcourses%2Faat-accounting-aat-level-2-foundation-certificate-in-accounting%2F196999\" oncl', '1', '227', '<p><strong>About the AAT</strong></p>\r\n\r\n<p>The AAT are the UK&rsquo;s leading awarding body for accounting and finance based qualifications, awarding 90% of all qualifications in these areas. The status of the AAT makes their qualifications recognised gl', '<h2>Description</h2>\r\n\r\n<p>This course provides you with the skills to become a recognised Accountant or member of an Accounts team and is your crucial first step towards a successful career in Accounting or Finance; if you&rsquo;re starting your career or need to validate your skills and financial knowledge with a globally recognised qualification. It delivers a solid foundation in finance administration, covering areas including double entry bookkeeping, basic costing and using accounting software.</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<h2>Career path</h2>\r\n\r\n<p>This course will provide you with the knowledge and skills to quickly start earning up to <strong>&pound;38,000 </strong>on average! The kind of roles you would be able to apply for include:</p>\r\n\r\n<ul>\r\n	<li>Accounts Administra', '<h2>Who is this course for?</h2>\r\n\r\n<p>Anybody looking for a new challenge, or to move into a new area can benefit from doing this AAT Foundation Certificate in Accounting Level 2.</p>\r\n\r\n<p>This course is perfect for you if you are looking to start a car', NULL, '', '2020-03-27 18:52:45'),
(3, 'YC6Oz', 'aabjd.jpg', 'Practical Accountancy Training with Work Placement | AAT Sage 50 QuickBooks Excel Xero', '2', '2', 1, 3, 30.00, '6', 'USD', '2', 2, '2020-04-09 20:04:33', '6 months', '<p>No formal qualification</p>\r\n', '1', '227', '<h2>Overview</h2>\r\n\r\n<p><strong>Practical Accountancy Training </strong>is designed to equip you with the skills that you need to secure the job as a Bookkeeper or Account Assistant. Upon completion of <strong>Practical Accountancy Training </strong>you w', '<h2>Description</h2>\r\n\r\n<p><strong>Bookkeeper Practical Training:</strong></p>\r\n\r\n<ul>\r\n	<li>Creating companies in Sage 50, QuickBooks and Xero</li>\r\n	<li>Creating customers and suppliers accounts</li>\r\n	<li>Processing customer and suppliers invoices and credit notes</li>\r\n	<li>Allocating payments and receipts of cash and bank</li>\r\n	<li>Performing petty cash and bank reconciliation</li>\r\n	<li>Preparing VAT with Cash VAT and Standard VAT schemes</li>\r\n	<li>Reconciling and submitting the VAT return to HMRC</li>\r\n</ul>\r\n\r\n<p><strong>Accounts Assistant Practical Training:</strong></p>\r\n\r\n<ul>\r\n	<li>Reconciliation of debtors and creditors control accounts</li>\r\n	<li>Reconciliation of VAT, PAYE, wages, directors and bank loans and suspense account</li>\r\n	<li>Understanding Accruals and posting journals</li>\r\n	<li>Understanding Prepayments and posting journals</li>\r\n	<li>Understanding Depreciation and processing journals</li>\r\n	<li>Calculating depreciation using different methods</li>\r\n	<li>Preparing the Final Trial Balance</li>\r\n	<li>Internal control procedures for tangible fixed assets and cash</li>\r\n	<li>Summarising and analysing financial data to produce reports for management purposes</li>\r\n	<li>Preparing monthly and quarterly management accounts</li>\r\n	<li>Running the year end procedure in Sage 50, QuickBooks and Xero</li>\r\n</ul>\r\n\r\n<p>We help all of our trainees in preparing <strong>professional CV</strong> and <strong> job interviews</strong>. As we are also a recruitment firm and we have employers on our panel so you can be assured that placing you into a <strong>JOB</strong> will be a piece of cake for us.</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<h2>Career path</h2>\r\n\r\n<p>Upon successful completion of Practical Accountancy Training, you can apply for the following positions.</p>\r\n\r\n<ul>\r\n	<li>Bookkeeper</li>\r\n	<li>Sales / Purchase Ledger</li>\r\n	<li>Payroll Administrator</li>\r\n	<li>Accounts Assist', '<p>Practical Accountancy Training is ideal for anyone looking to start a career in Accountancy.</p>\r\n', NULL, '', '2020-03-27 19:00:11'),
(4, 'YC6Oz', 'g.jpg', 'Accountancy Course Accountancy Level 4 Diploma Endorsed by ABC Awards | CPD Accredited Certificate', '1', '3', 1, 3, 40.00, '6', 'USD', '1', 3, '2020-04-09 20:04:33', '6 months', '<p>Level 4 Diploma Accountancy (Certificate of achievement)</p>\r\n', '1', '227', '<p>This introductory Level 4 Accountancy Certificate is delivered over the course of ten insightful modules - each concluding with an online assessment to verify your acquired knowledge and competencies. Your assigned tutor will provide you with comprehen', '<p>When studying for a Accountancy - Level 2 with CPD Courses, every candidate enjoys the following benefits:</p>\r\n\r\n<ol>\r\n	<li>Complete access to recommend reference books, study aids and more via our extensive e-library.</li>\r\n	<li>Provision of all essential course materials and lecture notes, along with case studies, practical exercises and key supporting documentation.</li>\r\n	<li>24/7 access to our exclusive digital learning platform and convenient online assessments at the end of each unit.</li>\r\n	<li>The opportunity to earn a endorsed certificate from a respected and recognised awarding organization.</li>\r\n	<li>The dedicated support of an experienced, qualified and professional tutor for ongoing assistance while completing your course.</li>\r\n</ol>\r\n\r\n<p>Learning Objectives</p>\r\n\r\n<p>This exclusive Accountancy Course has been designed for ambitious candidates looking to lay a strong foundation for further studies, or to begin working towards a career in accountancy. Suitable for newcomers and existing members of the workforce alike, business owners and entrepreneurs could also benefit from professional-quality accountancy skills. By studying the key duties and responsibilities of working accountants, candidates are primed and readied to begin writing their own success stories.</p>\r\n\r\n<p>Over the course of four insightful modules, learners are gradually introduced to the mechanics of corporate accountancy, along with an exploration of the importance and potential value of proactive financial management. A series of key financial reports are investigated in-depth, along with a variety of financial analysis tools and the different types of accountancy. Business budgeting is also introduced and explored from a contemporary corporate perspective.</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p><strong>Accountancy Course</strong></p>\r\n\r\n<p>Upon successful completion of our Level 4 <strong>Accountancy Course</strong>, candidates may choose to pursue an extensive range of careers including:</p>\r\n\r\n<ul>\r\n	<li>Accountant</li>\r\n	<li>Accounting Cle', '<h2>Who is this course for?</h2>\r\n\r\n<p><strong>Accountancy Course</strong></p>\r\n\r\n<p>Our popular Level 4 Accountancy Course is suitable for anyone looking to improve their personal competencies and career prospects with a endorsed<br />\r\ndistance learning', NULL, '', '2020-03-27 19:23:55'),
(5, 'YC6Oz', '8.jpg', 'Digital Banking Training', '2', '2', 1, 7, 50.00, '6', 'USD', '1', 3, '2020-04-09 20:04:33', '6 months', '<p>No formal qualification</p>\r\n', '1', '227', '<p><strong>Digital Banking Training</strong> is suitable for anyone aspiring to or already working in this field or simply want to learn deeper into Digital Banking Training.</p>\r\n\r\n<p>To make this <strong>Digital Banking Training </strong>course more acc', '<p>What will you learn in this <strong>Digital Banking Training:</strong></p>\r\n\r\n<p><strong>Story of Digital Banking -&ndash; An overview section</strong></p>\r\n\r\n<ul>\r\n	<li>Introduction</li>\r\n</ul>\r\n\r\n<p><strong>Moving from Traditional Banking to New-gen Banking</strong></p>\r\n\r\n<ul>\r\n	<li>Moving from Traditional Banking to New-gen Banking</li>\r\n</ul>\r\n\r\n<p><strong>The proliferation of Internet Banking, Mobile Banking and &ldquo;direct Banking&rdquo; concept</strong></p>\r\n\r\n<ul>\r\n	<li>The proliferation of Internet Banking, Mobile Banking and &ldquo;direct Banking&rdquo; concept</li>\r\n</ul>\r\n\r\n<p><strong>Use of Social media in Banking and arrival of Fintech Firms</strong></p>\r\n\r\n<ul>\r\n	<li>Use of Social media in Banking and arrival of Fintech Firms</li>\r\n</ul>\r\n\r\n<p><strong>Innovative technologies IOT, AI, ML, Block-chain,, Big data etc</strong></p>\r\n\r\n<ul>\r\n	<li>Innovative technologies IOT, AI, ML, Blockchain,, Big data etc</li>\r\n</ul>\r\n\r\n<p><strong>Illustrative &ldquo;CIO Wishlist&rdquo; to complement or enable comprehensive digital Bank</strong></p>\r\n\r\n<ul>\r\n	<li>Illustrative &ldquo;CIO Wishlist&rdquo; to complement or enable comprehensive digital Bank</li>\r\n</ul>\r\n\r\n<p><strong>Met</strong><strong>hod</strong><strong> of</strong><strong> Ass</strong><strong>essment:</strong></p>\r\n\r\n<p>Upon completion of the course, you will be required to sit for an online multiple-choice quiz based assessment, which will determine whether you have passed the course (60% pass mark). The test will be marked immediately and results will be published instantly.</p>\r\n\r\n<p><strong>Certification</strong></p>\r\n\r\n<p>After successfully completing the course, you will be able to obtain the certificates. You can claim a PDF certificate by paying a little processing fee of &pound;2. There is an additional fee to obtain a hardcopy certificate which is &pound;9.</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p>This <strong>Digital Banking Training </strong>course opens a new door for you to enter the relevant job market and also gives you the opportunity to acquire extensive knowledge along with the required skills to become successful. You will be able to a', '<p><strong>Digital Banking</strong> Training is suitable for anyone who wants to gain extensive knowledge, potential experience and professional skills in the related field.</p>\r\n', NULL, '', '2020-03-27 19:32:58'),
(6, 'lEdZs', 'x.jpg', 'Office Administration', '1', '2', 1, 3, 30.00, '6', 'USD', '2', 3, '2020-04-09 20:04:33', '6 months', '<p>No formal qualification</p>\r\n', '1', '227', '<p>The Multitasking Office Administration course has been designed for ambitious professionals, both newcomers and existing alike to discover how you can begin a new career or take your current office administration career to the next level. If you are in', '<p><strong>Skills You Will Develop</strong></p>\r\n\r\n<ul>\r\n	<li>Office Administration and Reception skills</li>\r\n	<li>Bookkeeping and Payroll Skills</li>\r\n	<li>MS Office Skills (2016)</li>\r\n	<li>Time Management Skills</li>\r\n	<li>Human Resource Management and Leadership Skills</li>\r\n</ul>\r\n\r\n<p><strong>Course Benefits</strong></p>\r\n\r\n<ul>\r\n	<li>The course will give learners the opportunity to improve these 5 necessary skills that will give you a competitive advantage at job interviews.</li>\r\n	<li>The course will teach you Quickbooks and Sage 50, two accounting software that are not generally included in a standard Office Administrator Course. You will gain a good all round understanding of how to provide accounting duties to the highest standard. You will learn to accurately manage invoices and sales, produce financial reports and manage VAT records. These skills will add huge value to your current employment or if you are seeking that much sought-after promotion.</li>\r\n	<li>Without Human Resources, a business will not be able to function. HR is all about supervising day to day activities and having an enormous impact on the success of the business. The course will give you a comprehensive understanding of the recruitment process, training, performance management and leading the team.</li>\r\n	<li>Become proficient in MS Office in the most efficient and practical way by learning the concepts of Word, Excel and Powerpoint.</li>\r\n	<li>Good time management will enhance your professional life. Not only will you learn to stick to your schedule but you will become more productive and produce quality results. Learn the core principles of good time management skills and how to attain a healthy work-life balance..</li>\r\n</ul>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p>Office Administrator</p>\r\n', '<ul>\r\n	<li>Secretary</li>\r\n	<li>HR Personnel</li>\r\n	<li>Finance Assistant</li>\r\n	<li>Administrative Assistant</li>\r\n</ul>\r\n', NULL, '', '2020-03-27 19:40:53'),
(7, 'lEdZs', 'a.jpg', 'Medical Secretary Diploma', '1', '4', 2, 4, 0.00, '6', 'USD', '2', 3, '2020-04-09 20:04:33', '6 months', '<p><strong>Module 1: Medical Secretary and Their Duties</strong></p>\r\n\r\n<ul>\r\n	<li>Medical Secretary Introduction</li>\r\n	<li>Receptionist Training for Medical Secretary</li>\r\n</ul>\r\n\r\n<p><strong>Module 2: Communication</strong></p>\r\n\r\n<ul>\r\n	<li>Communica', '1', '227', '<p><strong>Module 4: First Aid and Human Anatomy</strong></p>\r\n\r\n<ul>\r\n	<li>First Aid Training</li>\r\n	<li>Human Anatomy and Physiology</li>\r\n</ul>\r\n\r\n<p><strong>Module 5: Medical Terminology</strong></p>\r\n\r\n<ul>\r\n	<li>Medical Terminology</li>\r\n</ul>\r\n\r\n<p', '<p><strong>Endorsed Certificate of Achievement</strong></p>\r\n\r\n<p>At the successful completion of the course, the learners can order an endorsed certificate of achievement from ABC &amp; Certa Awards by paying the accreditation fee of &pound;78. There is an additional &pound;10 delivery charge for international students.</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p>The Medical Secretary Diploma course provides a stepping stone towards a successful career as a medical secretary, with the opportunity to work in a private practice or with the NHS. Through our specialist training, junior medical secretaries can gain ', '<p>This endorsed training course is ideal for professionals who are looking to kickstart a career in the medical industry in an administrative role. Our online courses are specially designed for distance learning, offering flexible, virtual classroom modu', NULL, '', '2020-03-27 19:50:17'),
(8, 'lEdZs', 'a.jpg', 'Diploma in Poultry Farming - CPD Certified ', '1', '2', 3, 5, 0.00, '6', 'USD', '1', 3, '2020-04-09 20:04:33', '6 months', '<p>No formal qualification</p>\r\n', '1', '227', '<p>Structured into 25 Units, packed with expertly-designed online study materials, practical assessments, mock exams, PDF handouts and video lessons, you will learn everything you need to know about Poultry Farming.</p>\r\n\r\n<p>Covering all aspects of raisi', '<p><strong>Benefits of studying the Diploma in Poultry Farming with Janets include</strong></p>\r\n\r\n<ul>\r\n	<li>Earn a <strong>free</strong> e-certificate upon successful completion.</li>\r\n	<li>Accessible, informative modules taught by expert instructors</li>\r\n	<li>Study in your own time, at your own pace, through your computer tablet or mobile device</li>\r\n	<li>Benefit from instant feedback through mock exams and multiple-choice assessments</li>\r\n	<li>Get 24/7 help or advice from our email and live chat teams</li>\r\n	<li>Improve your chance of gaining professional skills and better earning potential.</li>\r\n</ul>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p>As a new entrant to farm management, you can expect to begin as an assistant or by managing an enterprise, such as a dairy unit. With experience, you can progress to more responsibility and management. Eventually, with this <strong>Diploma in Poultry F', '<p><strong>Diploma in Poultry Farming</strong> is suitable for anyone who want to gain extensive knowledge, potential experience and professional skills in the related field. This is a great opportunity for all student from any academic backgrounds to lea', NULL, '', '2020-03-27 20:01:30'),
(9, 'lEdZs', 'c.jpg', 'Customer Service - cpd accredited ', '1', '1', 2, 6, 0.00, '6', 'USD', '1', 3, '2020-04-09 20:04:33', '6 months', '<p>Level 5 Diploma Public Relation (Certificate of achievement)</p>\r\n', '1', '227', '<p>Video learning is by fare the quickest and most fun way to learn. We have created a series of video learning tools with multiple choices questions to help you learn quickly. No more boring long lectures and hours of writing as we understand people lear', '<p><strong>Customer Service</strong></p>\r\n\r\n<p>Superior <strong>Customer Service</strong> often divides successful businesses from those that struggle to survive. These days, the quality of the Customer Service you provide is every bit as important as both product quality and value for money. In fact, research suggests that the average consumer is willing to pay <em>more</em> for the same product, if accompanied by excellent customer service. For those with the skills and talents to deliver a positive and memorable experience for every customer, even the sky isn&rsquo;t the limit. If interested in building a successful career in Customer Service, enrol today and study at home for a brighter tomorrow!</p>\r\n', 'Course Structure', 'Entry Requirements', 'Apply Info', NULL, NULL, '<p>Our entry-level Customer Service Training - each concluding with an online assessment to verify your acquired knowledge and competencies. Your assigned tutor will provide you with comprehensive support at all times, in order to assist with your success', '<p>Anyone who is interested in improving their skills</p>\r\n', NULL, '', '2020-03-27 20:12:31'),
(17, 'lEdZs', '9mobile-Airtime.jpg', 'Home Making', '2', '2', 2, 7, 50.00, '6', 'EUR', '2', 2, '2020-08-13 08:45:34', '6 months', '<p>Their Qualification</p>', '1', '8', '<p>Course Overview</p>', '<p>Description</p>', '<p>Course Outline Here</p>', '<p>Their Qualification</p>', '<p>Applcoatio Oinfo</p>', NULL, NULL, '<p>Theier career path</p>', '<p>Who the course is for</p>', NULL, NULL, '2020-08-13 08:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `category_id` int(7) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `course_cat_img` varchar(150) DEFAULT NULL,
  `admin_id` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`category_id`, `category_name`, `course_cat_img`, `admin_id`) VALUES
(1, 'Accounting and finance', 'admin.jpg', ''),
(2, 'Admin, secretarial & PA', 'admin.jpg', ''),
(3, 'Agricultural science', 'agric.jpg', ''),
(4, 'Business', 'business.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_comments`
--

CREATE TABLE `course_comments` (
  `comment_id` int(11) NOT NULL,
  `courseID` int(7) DEFAULT NULL,
  `comment_poster` varchar(60) DEFAULT NULL,
  `comment` text,
  `comment_email` varchar(100) DEFAULT NULL,
  `comment_rating` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_locations`
--

CREATE TABLE `course_locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_info` longblob,
  `location_img` varchar(100) DEFAULT NULL,
  `state_id` varchar(10) DEFAULT NULL,
  `country_id` varchar(5) DEFAULT NULL,
  `admin_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_locations`
--

INSERT INTO `course_locations` (`location_id`, `location_name`, `location_info`, `location_img`, `state_id`, `country_id`, `admin_id`) VALUES
(1, 'Jazira', NULL, NULL, '38', '3', NULL),
(2, 'Aston Villa', 0x3c703e4c6f636174696f6e20496e666f3c2f703e, '1*PAP7WRf9FFSBkEfJNpjjnA.jpeg', '38', '227', 'GR4bs'),
(3, 'Yorkshire', '', '20201012_125932.jpg', '49', '227', 'GR4bs'),
(4, 'Abbeydale', '', 'y5XuiQbfxSwModMzyo5OP8c3yKLkzrCZ1oRfy5x5D7WmSp-H8LAzqVusSJFlN5-Hue_s-VyF34_Rs5dNRCFqUZy2N9I7ljrWz8fl', '86', '227', 'GR4bs'),
(5, 'Alcaster', '', 'Alcester.jpg', '48', '227', 'GR4bs'),
(6, 'Ancoats', '', 'Ancoats-outside-Jane-Eyre.jpg', '74', '227', 'GR4bs'),
(7, 'Calgary', '', '40525373813d549f16ab3bc73fe308ef.jpg', '137', '39', 'GR4bs'),
(8, 'kimberley', '', 'mobile.adapt.768.high.webp', '138', '39', 'GR4bs'),
(9, 'Etobicoke', '', 'toronto-shore-park-trail-bridge-stock-image-picture-id481715050.jpg', '145', '39', 'GR4bs'),
(10, 'Hamilton', '', 'HamiltonOntarioSkylineC.jpeg', '145', '39', 'GR4bs'),
(11, 'Quebec', '', 'quebec-city1.jpg', '147', '39', 'GR4bs');

-- --------------------------------------------------------

--
-- Table structure for table `course_providers`
--

CREATE TABLE `course_providers` (
  `id` int(11) NOT NULL,
  `couprov_code` varchar(12) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pass_salt` varchar(100) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `billing_company` varchar(100) DEFAULT NULL,
  `billing_address_1` tinytext,
  `billing_address_2` tinytext,
  `billing_city` varchar(20) DEFAULT NULL,
  `billing_state` varchar(20) DEFAULT NULL,
  `billing_country` varchar(5) DEFAULT NULL,
  `valid_until` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plan_valid_until` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mailingaddress` tinytext,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_providers`
--

INSERT INTO `course_providers` (`id`, `couprov_code`, `username`, `last_name`, `middle_name`, `first_name`, `image`, `password`, `pass_salt`, `reset_token`, `gender`, `company_name`, `email`, `img`, `phone`, `country`, `about_me`, `source`, `active`, `billing_company`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_country`, `valid_until`, `plan_valid_until`, `mailingaddress`, `status`, `timestamp`) VALUES
(2, 'o4Jhc', 'alphajetti_training_institute_o4Jhc', 'Azuka', NULL, 'Jude', NULL, 'joseph', '$2y$11$2a224e797fb7b80d910b6uECXZSGo.yG.JMPa.wD6Qu50OCmh3rbW', NULL, NULL, 'Alphajetti Training Institute', 'gooption@yahoo.com', NULL, '86767677768', '1', '<p>About Institution</p>', NULL, '1591058668', '', '', '', '', '', '', '2020-06-02 00:33:09', '2020-06-02 10:33:46', NULL, '1', '2020-06-02 00:33:09'),
(4, 'lEdZs', 'elite_world_digital_IEdZs', 'james', NULL, 'Doe', NULL, '123457', '$2y$11$d7231cd422e2ea0e4a049uPw7OUFaKFZ6NUOGPgPBNxm7ZBBLRdx.', NULL, NULL, 'Elite World Institution', 'sam@gmail.com', NULL, '08165748392', '158', '<p>About my institution</p>', NULL, '1602687574', NULL, '<p>My Address</p>', NULL, NULL, '11', NULL, '2020-08-20 13:58:04', '2020-08-20 13:58:04', 'No 16 skvhhfvs', '1', '2020-08-20 13:58:04'),
(5, 'YC6Oz', 'covenant_institute_YC6Oz', 'james', NULL, 'Doe', NULL, 'john', '$2y$11$b8a69fb50bc527ead04c1OJjhASTYYh8b24xcyOQAKRMvelCQyHda', NULL, NULL, 'Elite world Institution', 'gooptiodsdn@yahoo.com', NULL, '08165748392', '8', '<p>About Institution</p>', NULL, '1598545667', NULL, 'Elite world Institution', NULL, NULL, NULL, NULL, '2020-08-27 16:27:47', '2020-08-27 16:27:47', 'Elite world Institution', '0', '2020-08-27 16:27:47'),
(6, 'gjsMZ', 'havard_institute_gjsMZ', 'james', NULL, 'Doe', NULL, '123456', '$2y$11$d9930033823ce822acd25uYrflu8S1/4I1nTFKWz4TbT7duwUURc.', '', NULL, 'Havard Institute', 'joedbest123@yahoo.com', NULL, '08165748392', '127', '<p>About Institution</p>', NULL, '1600105979', NULL, 'wrberttberbsbr', NULL, NULL, NULL, NULL, '2020-09-14 17:52:59', '2020-09-14 17:52:59', 'svrwegrbew', '1', '2020-09-14 17:52:59'),
(7, 'yGZJi', NULL, 'Abimbola', NULL, 'Oluwafunke', NULL, 'boluwatife', '$2y$11$489589fd5921a4d675eb8uPBBZ0sycOXnWbnQik1NS0MpSALCMWPq', NULL, NULL, 'yemyem', 'abimbola_oluwafunke@yahoo.com', NULL, '09023706962', NULL, NULL, NULL, '1602604157', NULL, '12, Alhaji Str, Egbeda, Lagos', NULL, NULL, NULL, NULL, '2020-10-13 15:49:17', '2020-10-13 15:49:17', '12, Alhaji Str, Egbeda, Lagos\r\n09023706962', '1', '2020-10-13 15:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `course_provider_plans`
--

CREATE TABLE `course_provider_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(70) DEFAULT NULL,
  `plan_cost` double(6,2) DEFAULT '0.00',
  `plan_discount_cost` double(6,2) DEFAULT '0.00',
  `plan_currency` varchar(10) DEFAULT NULL,
  `plan_image` varchar(50) DEFAULT NULL,
  `plan_period` varchar(20) DEFAULT NULL,
  `highlights` tinytext,
  `description` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_provider_plans`
--

INSERT INTO `course_provider_plans` (`plan_id`, `plan_name`, `plan_cost`, `plan_discount_cost`, `plan_currency`, `plan_image`, `plan_period`, `highlights`, `description`) VALUES
(2, 'Silver Plan', 250.00, 0.50, 'GBP', '', 'month', 'Three month Plan', 'Renew aafter 3 months'),
(3, 'Basic Plan', 50.00, 0.50, 'GBP', '', 'day', 'Daily plan suitable for one-off adverts', '<p>Renew daily</p>\r\n'),
(4, 'Bronze Plan', 150.00, 0.50, 'GBP', '', 'month', 'Monthly Plan ', '<p>Renew every month and suitable for short campaigners</p>\r\n'),
(5, 'Gold Plan', 1000.00, 0.50, 'GBP', '', 'year', 'Yearly Plan', '<p>Renew anually and suitable for heavy and regular advertisers.</p>\r\n'),
(6, 'Premium Plan', 200.00, 0.00, 'USD', '', 'year', 'One year Plan', '<p>Yearly Plan</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course_provider_plan_orderitems`
--

CREATE TABLE `course_provider_plan_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_provider_plan_orderitems`
--

INSERT INTO `course_provider_plan_orderitems` (`id`, `session_id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(1, '3353822c99e4291901f216db1331ce6f', 3, '1', 1, '50.00'),
(2, '0ce867dd90fe916443523eed3d21c771', 3, '1', 2, '50.00'),
(3, 'b99f8d5618686a4ee6684fee96a8b037', 5, '1', 3, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_provider_plan_orders`
--

CREATE TABLE `course_provider_plan_orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_provider_plan_orders`
--

INSERT INTO `course_provider_plan_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, NULL, '3353822c99e4291901f216db1331ce6f', 50.00, '1', '0', 'GBP', '2020-08-22 04:50:07'),
(2, NULL, '0ce867dd90fe916443523eed3d21c771', 50.00, '1', '0', 'GBP', '2020-09-03 02:37:00'),
(3, NULL, 'b99f8d5618686a4ee6684fee96a8b037', 1000.00, '1', '0', 'GBP', '2020-09-14 02:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `review_id` int(7) NOT NULL,
  `course_id` int(4) DEFAULT NULL,
  `course_comment` tinytext,
  `review_count` int(8) DEFAULT NULL,
  `comment_poster` varchar(50) DEFAULT NULL,
  `comment_email` varchar(100) DEFAULT NULL,
  `comment_rating` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_study_methods`
--

CREATE TABLE `course_study_methods` (
  `csm_id` tinyint(3) NOT NULL,
  `cs_method` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_study_methods`
--

INSERT INTO `course_study_methods` (`csm_id`, `cs_method`) VALUES
(1, 'Classroom'),
(2, 'Correspondence'),
(3, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `course_subscription_orderitems`
--

CREATE TABLE `course_subscription_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `course_valid_until` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subscription_orderitems`
--

INSERT INTO `course_subscription_orderitems` (`id`, `session_id`, `pid`, `pquantity`, `orderid`, `productprice`, `currency`, `course_valid_until`) VALUES
(1, 'eb58ec5720bb7a7c5b55f2817172c41d', 4, '1', 1, '40.00', 'USD', '2020-09-25 00:13:41'),
(2, 'eb58ec5720bb7a7c5b55f2817172c41d', 4, '1', 2, '40.00', 'USD', '2020-09-25 01:24:55'),
(3, 'eb58ec5720bb7a7c5b55f2817172c41d', 17, '1', 2, '50.00', 'EUR', '2020-09-25 01:24:55'),
(4, 'eb58ec5720bb7a7c5b55f2817172c41d', 4, '1', 3, '40.00', 'USD', '2020-09-25 01:26:01'),
(5, 'eb58ec5720bb7a7c5b55f2817172c41d', 17, '1', 3, '50.00', 'EUR', '2020-09-25 01:26:01'),
(6, '0ef59df30f17e59b238416196c89b874', 4, '1', 4, '40.00', 'USD', '2020-09-25 07:18:06'),
(7, 'c81e337d21f3497cb09579ee091656f5', 17, '1', 5, '', 'EUR', '2020-10-05 13:52:16'),
(8, '0477a515b6acc5cb5ede7c17d819620a', 4, '1', 6, '40.00', 'USD', '2020-10-08 01:32:24'),
(9, '0477a515b6acc5cb5ede7c17d819620a', 2, '1', 6, '10.00', 'USD', '2020-10-08 01:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `course_subscription_orders`
--

CREATE TABLE `course_subscription_orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(10) DEFAULT NULL,
  `paymentmode` varchar(15) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subscription_orders`
--

INSERT INTO `course_subscription_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, '', 'eb58ec5720bb7a7c5b55f2817172c41d', 40.00, '1', '0', NULL, '2020-09-24 17:13:41'),
(2, '', 'eb58ec5720bb7a7c5b55f2817172c41d', 90.00, '2', '0', NULL, '2020-09-24 18:24:55'),
(3, '', 'eb58ec5720bb7a7c5b55f2817172c41d', 90.00, '2', '0', NULL, '2020-09-24 18:26:01'),
(4, '', '0ef59df30f17e59b238416196c89b874', 40.00, '1', '0', NULL, '2020-09-25 00:18:06'),
(5, '', 'c81e337d21f3497cb09579ee091656f5', 0.00, '1', '0', NULL, '2020-10-05 06:52:16'),
(6, '', '0477a515b6acc5cb5ede7c17d819620a', 50.00, '2', '0', NULL, '2020-10-07 18:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_categories`
--

CREATE TABLE `course_sub_categories` (
  `subcat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_parent` varchar(255) NOT NULL,
  `course_cat_img` varchar(60) DEFAULT NULL,
  `admin_id` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_sub_categories`
--

INSERT INTO `course_sub_categories` (`subcat_id`, `category_name`, `category_parent`, `course_cat_img`, `admin_id`) VALUES
(1, 'Accountancy', '1', '9.jpg', ''),
(2, 'Banking', '1', '9.jpg', ''),
(3, 'Administration', '2', '', ''),
(4, 'Secretary', '2', 'b.jpg', ''),
(5, 'Agriculture', '3', 'agric2.jpg', ''),
(6, 'Customer service', '2', 'b.jpg', ''),
(7, 'Public administration', '2', 'pa adm.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `type_id` int(7) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `type_img` varchar(50) DEFAULT NULL,
  `review_count` int(6) DEFAULT '0',
  `views` int(9) DEFAULT '0',
  `admin_id` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`type_id`, `type_name`, `type_img`, `review_count`, `views`, `admin_id`) VALUES
(1, 'University Courses', 'huffington-post-2-1.jpg', 0, 0, NULL),
(2, 'Discount Courses', '118691-2.jpg', 0, 0, NULL),
(3, 'Free courses', 'Intro-thumb09.jpg', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `currency_name` varchar(55) NOT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(12,4) NOT NULL,
  `auto_update` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_code`, `currency_name`, `currency_symbol`, `currency_rate`, `auto_update`) VALUES
(1, 'NGN', 'Nigerian Naira', '&#8358;', 1.0000, 0),
(2, 'USD', 'US Dollars', '&dollar;', 0.0021, 0),
(3, 'EUR', 'Euros', '&euro;', 0.0021, 0),
(4, 'GBP', 'British Pounds', '&pound;', 0.0020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `cv_id` int(11) NOT NULL,
  `job_seeker_id` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cv_search_orders`
--

CREATE TABLE `cv_search_orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(10) DEFAULT NULL,
  `paymentmode` varchar(15) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_search_orders`
--

INSERT INTO `cv_search_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, '', '4e570c9cde287b78a70ba64e6fbf5a00', 5000.00, '4', '0', NULL, '2020-06-05 20:50:29'),
(2, '', '003eba4d9a1873c4de1eb2bf3ae4e0fe', 5000.00, '3', '0', NULL, '2020-06-06 18:58:17'),
(3, '388wl9S2ND8', 'a038df38995042fcb1473e7ef8787bc1', 5000.00, '1', '0', NULL, '2020-06-06 20:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `cv_search_plans`
--

CREATE TABLE `cv_search_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(70) DEFAULT NULL,
  `plan_cost` double(6,2) DEFAULT '0.00',
  `plan_discount_cost` double(6,2) DEFAULT '0.00',
  `plan_currency` varchar(10) DEFAULT NULL,
  `plan_image` varchar(50) DEFAULT NULL,
  `plan_period` varchar(20) DEFAULT NULL,
  `highlights` tinytext,
  `description` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_search_plans`
--

INSERT INTO `cv_search_plans` (`plan_id`, `plan_name`, `plan_cost`, `plan_discount_cost`, `plan_currency`, `plan_image`, `plan_period`, `highlights`, `description`) VALUES
(3, 'Basic Plan', 10.00, 0.50, '3', 'Airtel-Airtime.jpg', 'week', '3 Months', '<p>Plan valid for 3 months</p>\r\n'),
(4, 'Silver Plan', 10.00, 0.50, '$', 'Airtel-Airtime.jpg', 'month', '3 Months', '<p>3 months plan</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cv_search_plan_orderitems`
--

CREATE TABLE `cv_search_plan_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `template_id` int(5) NOT NULL,
  `template_name` varchar(300) DEFAULT NULL,
  `template_folder` varchar(300) DEFAULT NULL,
  `description` tinytext,
  `content` longtext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(1, 'fashion', 'fashion', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Fashion a Newsletter Template | OnyxDS</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Fashion Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n<!-- //Custom Theme files -->\r\n<!-- Responsive Styles and Valid Styles -->\r\n<style type=\"text/css\">    	\r\n	body{\r\n		width: 100%; \r\n		background-color: #fff; \r\n		margin:0; \r\n		padding:0; \r\n		-webkit-font-smoothing: antialiased;\r\n	}\r\n	html{\r\n		width: 100%; \r\n	}\r\n	table{\r\n		font-size: 14px;\r\n		border: 0;\r\n	}\r\n	/* ----------- Response ----------- */\r\n	@media only screen and (max-width:640px){\r\n		table[class=scale] {\r\n			width: 100% !important;\r\n		}\r\n		td[class=hide] {\r\n			display: none!important;\r\n			height: 0px!important;\r\n		}\r\n		img.reset {\r\n			margin: 0 auto;\r\n		}\r\n		td.title {\r\n			text-align: center;\r\n		}\r\n		td[class=scale-center-both] {\r\n			width: 100%!important;\r\n			text-align: center!important;\r\n			padding-left: 20px!important;\r\n			padding-right: 20px!important;\r\n		}\r\n	}\r\n	@media only screen and (max-width:480px){\r\n		table.scale-full {\r\n			width: 90%;\r\n			text-align: center;\r\n		}\r\n		.table-grids {\r\n			width: 65%;\r\n			margin: 0 auto !important;\r\n			float: none;\r\n		}\r\n		\r\n	}\r\n	@media only screen and (max-width:414px){\r\n		table.scale-full {\r\n			width: 94%;\r\n		}\r\n		td.banner {\r\n			height: 250px;\r\n		}\r\n		td.bnr-text {\r\n			letter-spacing: 2px !important;\r\n		}\r\n		.table-grids {\r\n			width: 75%;\r\n		}\r\n		table[class=\"table-full\"] {\r\n			text-align: center !important;\r\n			float: none;\r\n			margin: 0 auto;\r\n		}\r\n	}\r\n	@media only screen and (max-width:375px){\r\n		.table-grids {\r\n			width: 82%;\r\n		}\r\n	}\r\n	@media only screen and (max-width:320px){\r\n		td.banner {\r\n			height: 200px;\r\n		}\r\n		td.bnr-text {\r\n			font-size: 18px !important;\r\n			line-height: 31px !important;\r\n		}\r\n		.table-grids {\r\n			width: 94%;\r\n		}\r\n	}\r\n	\r\n</style>  \r\n</head>\r\n<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n	<table bgcolor=\"#414a51\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n		<tbody>\r\n			<tr>\r\n				<td height=\"45\" class=\"hide\"></td>\r\n			</tr>\r\n			<tr>\r\n				<td align=\"center\" style=\"border-top:5px solid #414a51;\">\r\n					<table width=\"600\" bgcolor=\"#fff\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\">\r\n						<tbody>\r\n							<tr>\r\n								<td height=\"20\"></td>\r\n							</tr>\r\n							<!--logo-->\r\n							<tr>\r\n								<td class=\"logo\" align=\"center\" style=\"line-height: 0px;\">\r\n									<a href=\"index.html\"><img style=\"display:inline-block; line-height:0px; font-size:0px; border:0px;\" src=\"images/logo.png\" alt=\"img\"><a/>\r\n								</td>\r\n							</tr>\r\n							<!--end logo-->\r\n							<tr>\r\n								<td height=\"20\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td height=\"20\" style=\"border-top:1px solid #e1e1e1;\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td align=\"middle\">\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale-full\">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n													<!--menu-->\r\n													<table height=\"24px\" class=\"table-full\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tbody>\r\n															<tr>\r\n																<td class=\"menulink\" align=\"center\" style=\"text-decoration: none; color:#fff; font-family: \'Open sans\', Arial, sans-serif; font-size:15px; font-weight: bold;\">\r\n																	<a href=\"#\" style=\"color:#414a51; text-decoration:none;\">About</a>\r\n																</td>\r\n																<td width=\"25\"></td>\r\n																<td class=\"menulink\" align=\"center\" style=\"text-decoration: none; color:#fff;font-family: \'Open sans\', Arial, sans-serif; font-size:15px; font-weight: bold;\">\r\n																	<a href=\"#\" style=\"color:#414a51; text-decoration:none;\">Team</a>\r\n																</td>\r\n																<td width=\"25\"></td>\r\n																<td class=\"menulink\" align=\"center\" style=\"text-decoration: none; color:#fff;font-family: \'Open sans\', Arial, sans-serif; font-size:15px; font-weight: bold;\">\r\n																	<a href=\"#\" style=\"color:#414a51; text-decoration:none;\">Contact Us</a>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<!--end menu-->\r\n													<!--Space-->\r\n													<table class=\"table-full\"  width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n														<tbody>\r\n															<tr>\r\n																<td height=\"20\" style=\"font-size: 0;line-height: 0px;border-collapse: collapse;\">\r\n																	<p style=\"padding-left: 24px;\">&nbsp;</p>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<!--End Space-->\r\n													<!--social-->\r\n													<table class=\"table-full\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tbody>\r\n															<tr>\r\n																<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/s1.png\" alt=\"\" border=\"0\" height=\"18\" width=\"18\"></a></td>\r\n																<td width=\"20\"></td>\r\n																<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/s2.png\" alt=\"\" border=\"0\" height=\"18\" width=\"18\"></a></td>\r\n																<td width=\"20\"></td>\r\n																<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/s3.png\" alt=\"\" border=\"0\" height=\"20\" width=\"20\"></a></td>\r\n																<td width=\"20\"></td>\r\n																<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/s4.png\" alt=\"\" border=\"0\" height=\"16\" width=\"16\"></a></td>\r\n															</tr>\r\n														</tbody>\r\n													</table>	\r\n													<!--end social-->\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td height=\"20\"></td>\r\n							</tr>\r\n							<!--//top-nav-->\r\n							<!--banner-->\r\n							<tr>\r\n								<td height=\"300\" align=\"center\" class=\"banner\" background=\"images/banner.jpg\" style=\"background-size:100% 100%; background-position: center; background-repeat:no-repeat;\">\r\n									<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n										<tbody>\r\n											<tr>\r\n											<td align=\"center\" class=\"bnr-text\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color:#FFFFFF; font-size:22px;letter-spacing: 4px;line-height: 33px;\">\r\n												<!-- OnyxDS -->	\r\n													<multiline label=\"Headline\">THE LATEST FASHION TRENDS</multiline>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td height=\"25\"></td>\r\n							</tr>\r\n							<!--//banner-->\r\n							<!--banner-bottom-->\r\n							<tr>\r\n								<td>\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale-full\">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n													<!--left-->\r\n													<table bgcolor=\"#f26c4f\" align=\"left\" class=\"table-grids\" width=\"260\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n														<tbody><tr>\r\n															<td height=\"130\" align=\"center\" style=\"background-size:100% 100%; background-position: center; background-repeat:no-repeat\">\r\n																<table class=\"table-inner table-grids-text\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding:1.5em; border: 1px solid #fff;\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color:#FFFFFF; font-size:20px;letter-spacing: 2px;\">\r\n																				<singleline label=\"Left Banner 1\">50% DISCOUNT</singleline>\r\n																			</td>\r\n																		</tr>\r\n																		<tr>\r\n																			<td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#FFFFFF; font-size:13px; padding-top: 6px;\">\r\n																				<singleline label=\"Left Banner 2\">Summer Special Offer</singleline>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr></tbody>\r\n													</table>\r\n													<!--end left-->\r\n													<!--Space-->\r\n													<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"table-grids\">\r\n														<tbody><tr>\r\n															<td height=\"25\" style=\"font-size: 0;line-height: 0px;border-collapse: collapse;\">\r\n																<p style=\"padding-left: 10px;\">&nbsp;</p>\r\n															</td>\r\n														</tr></tbody>\r\n													</table>\r\n													<!--End Space-->\r\n													<!-- agileits -->\r\n													<!--right-->\r\n													<table bgcolor=\"#bf222a\" align=\"right\" class=\"table-grids\" width=\"260\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n														<tbody><tr>\r\n															<td height=\"130\" align=\"center\" style=\"background-size:100% 100%; background-position: center; background-repeat:no-repeat\">\r\n																<table class=\"table-inner table-grids-text\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding:1.5em; border: 1px solid #fff;\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color:#FFFFFF; font-size:20px;letter-spacing: 2px;\">\r\n																				<singleline label=\"Right banner 1\">FREE REGISTER</singleline>\r\n																			</td>\r\n																		</tr>\r\n																		<tr>\r\n																			<td align=\"center\" style=\"font-family:\'Open Sans\', Arial, sans-serif; color:#FFFFFF; font-size:13px; padding-top: 6px;\">\r\n																				<singleline label=\"Right banner 2\">With Basic Package</singleline>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n													</tbody></table>\r\n													<!--//end right-->\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<!--//banner-bottom-->\r\n							<tr>\r\n								<td height=\"25\"></td>\r\n							</tr>\r\n							<!--latest-designs-->\r\n							<tr>\r\n								<td height=\"25\" style=\"border-top:1px solid #e1e1e1;\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td align=\"center\">\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"font-size: 50px; color:#FE4B22; font-family: \'Gabriola\', Helvetica, Arial, sans-serif; letter-spacing: 1px; line-height: 70px;\" align=\"center\" class=\"title\"><singleline>Latest Designs</singleline></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"color: #999; font-size: 14px; font-family:\'Open Sans\', Arial, sans-serif; line-height: 28px;\" align=\"center\" class=\"scale-center-both\"><multiline>\r\n													\r\n													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco \r\n													\r\n												</multiline></td>\r\n												<!-- OnyxDS -->\r\n											</tr>\r\n											<tr>\r\n												<td height=\"40\"></td>\r\n											</tr>\r\n											<!--latest-designs-row1-->\r\n											<tr>\r\n												<td>\r\n													<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; font-size: 14px; color: #9b9b9b;\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td class=\"scale-center-both\" align=\"center\" height=\"170\">\r\n																	<img src=\"images/img1.png\" border=\"0\" alt=\"\" width=\"200\" editable=\"true\">\r\n																</td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"20\" style=\"font-size: 1px\">&nbsp;</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td style=\"font-size: 32px; color: #BF222A; font-family: \'Gabriola\', Helvetica, Arial, sans-serif;\" class=\"scale-center-both\"><singleline>Great findability</singleline></td>\r\n															</tr>\r\n															<tr>\r\n																<td style=\"color: #999; font-size: 14px; font-family: \'Open sans\', Arial, sans-serif; line-height: 28px;\" class=\"scale-center-both\"><multiline>\r\n																	\r\n																	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.													\r\n																</multiline></td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"30\" style=\"font-size: 1px\">&nbsp;</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>	\r\n												</td>\r\n											</tr>\r\n											<!--latest-designs-row2-->\r\n											<tr>\r\n												<td>\r\n													<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" style=\"font-family: \'Open sans\', Arial, sans-serif; font-size: 14px; color: #9b9b9b;\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td class=\"scale-center-both\" align=\"center\" height=\"170\">\r\n																	<img src=\"images/img2.png\" border=\"0\" alt=\"\" width=\"200\" editable=\"true\">\r\n																</td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"20\" style=\"font-size: 1px\">&nbsp;</td>\r\n																<!-- agileits -->\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td style=\"font-size: 32px; color: #BF222A; font-family: \'Gabriola\', Helvetica, Arial, sans-serif;\" class=\"scale-center-both\"><singleline>Great findability</singleline></td>\r\n															</tr>\r\n															<tr>\r\n																<td style=\"color: #999; font-size: 14px; font-family: \'Open sans\', Arial, sans-serif; line-height: 28px;\" class=\"scale-center-both\"><multiline>\r\n																	\r\n																	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.													\r\n																</multiline></td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"30\" style=\"font-size: 1px\">&nbsp;</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>	\r\n												</td>\r\n											</tr>\r\n											<!--latest-designs-row3-->\r\n											<tr>\r\n												<td>\r\n													<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" style=\"font-family: \'Open sans\', Arial, sans-serif; font-size: 14px; color: #9b9b9b;\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td class=\"scale-center-both\" align=\"center\" height=\"170\">\r\n																	<img src=\"images/img3.png\" border=\"0\" alt=\"\" width=\"200\" editable=\"true\">\r\n																</td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"20\" style=\"font-size: 1px\">&nbsp;</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<table width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td style=\"font-size: 32px; color: #BF222A; font-family: \'Gabriola\', Helvetica, Arial, sans-serif;\" class=\"scale-center-both\"><singleline>Great findability</singleline></td>\r\n															</tr>\r\n															<tr>\r\n																<td style=\"color: #999; font-size: 14px; font-family: \'Open sans\', Arial, sans-serif; line-height: 28px;\" class=\"scale-center-both\"><multiline>\r\n																	\r\n																	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.													\r\n																</multiline></td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"30\" style=\"font-size: 1px\">&nbsp;</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>	\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td height=\"25\"></td>\r\n							</tr>\r\n							<!--//latest-designs-->\r\n							<tr>\r\n								<td height=\"25\" style=\"border-top:1px solid #e1e1e1;\"></td>\r\n							</tr>\r\n							<!--team-->\r\n							<tr>\r\n								<td>\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"font-size: 50px; color:#FE4B22; font-family: \'Gabriola\', Helvetica, Arial, sans-serif; letter-spacing: 1px;\" align=\"center\" class=\"title\"><singleline>Meet Our Team</singleline></td>\r\n											</tr>\r\n											<tr><td height=\"10\">&nbsp;</td></tr>\r\n											<tr>\r\n												<td>\r\n													<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td valign=\"bottom\" height=\"90\" align=\"center\" class=\"scale-center-both\">\r\n																	<img src=\"images/t1.png\" border=\"0\" style=\"display: block; border-radius: 50%;\" alt=\"\" class=\"reset\" width=\"120\" editable=\"true\">\r\n																</td>\r\n															</tr>\r\n															<tr><td height=\"18\">&nbsp;</td></tr>\r\n															<tr>\r\n																<td align=\"center\" style=\"font-family:\'Open sans\', Arial, sans-serif; font-size: 16px; color: #433d3c;\" class=\"scale-center-both\"><singleline>Jason Arthit</singleline></td>\r\n															</tr>\r\n															<tr>\r\n																<td height=\"14\" valign=\"bottom\">\r\n																	<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"25\">\r\n																		<tbody><tr>\r\n																			<td height=\"3\" style=\"background-color: #c3bdb8; border-radius: 3px; font-size: 1px;\">&nbsp;</td>\r\n																		</tr>\r\n																	</tbody></table>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n													<table width=\"355\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" class=\"scale\">\r\n														<tbody>\r\n															<tr>\r\n																<td>\r\n																	<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"scale\">\r\n																		<tbody>\r\n																			<tr>\r\n																				<td valign=\"bottom\" height=\"90\" align=\"center\" class=\"scale-center-both\">\r\n																					<img src=\"images/t2.png\" border=\"0\" style=\"display: block; border-radius: 50%;\" alt=\"\" class=\"reset\" width=\"120\" editable=\"true\">\r\n																				</td>\r\n																			</tr>\r\n																			<tr><td height=\"18\">&nbsp;</td></tr>\r\n																			<tr>\r\n																				<td align=\"center\" style=\"font-family:\'Open sans\', Arial, sans-serif; font-size: 16px; color: #433d3c;\" class=\"scale-center-both\"><singleline>Karim Kanda</singleline></td>\r\n																			</tr>\r\n																			<tr>\r\n																				<td height=\"14\" valign=\"bottom\">\r\n																					<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"25\">\r\n																						<tbody><tr>\r\n																							<td height=\"3\" style=\"background-color: #c3bdb8; border-radius: 3px; font-size: 1px;\">&nbsp;</td>\r\n																						</tr>\r\n																					</tbody></table>\r\n																				</td>\r\n																			</tr>\r\n																		</tbody>\r\n																	</table>\r\n																	<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"scale\">\r\n																		<tbody>\r\n																			<tr>\r\n																				<td valign=\"bottom\" height=\"90\" align=\"center\" class=\"scale-center-both\">\r\n																					<img src=\"images/t3.png\" border=\"0\" style=\"display: block; border-radius: 50%;\" alt=\"\" class=\"reset\" width=\"120\" editable=\"true\">\r\n																				</td>\r\n																			</tr>\r\n																			<tr><td height=\"18\">&nbsp;</td></tr>\r\n																			<tr>\r\n																				<td align=\"center\" style=\"font-family:\'Open sans\', Arial, sans-serif; font-size: 16px; color: #433d3c;\" class=\"scale-center-both\"><singleline>Karim Kanda</singleline></td>\r\n																			</tr>\r\n																			<tr>\r\n																				<td height=\"14\" valign=\"bottom\">\r\n																					<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"25\">\r\n																						<tbody><tr>\r\n																							<td height=\"3\" style=\"background-color: #c3bdb8; border-radius: 3px; font-size: 1px;\">&nbsp;</td>\r\n																						</tr>\r\n																					</tbody></table>\r\n																				</td>\r\n																			</tr>\r\n																		</tbody>\r\n																	</table>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											<tr><td height=\"48\">&nbsp;</td></tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<!--//team-->	\r\n							<!--contact-->\r\n							<tr>\r\n								<td height=\"25\" style=\"border-top:1px solid #e1e1e1;\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td>\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"background-color:#F26C4F;\">\r\n													<table width=\"460\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n														<tbody>\r\n															<tr><td height=\"40\">&nbsp;</td></tr>\r\n															<tr>\r\n																<td>\r\n																	<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"scale\">\r\n																		<tbody>\r\n																			<tr>\r\n																				<td class=\"scale-center-bottom-both\">\r\n																					<img src=\"images/map.png\" border=\"0\" style=\"display: block; border-radius: 50%;\" class=\"reset\" alt=\"\" width=\"180\" editable=\"true\">\r\n																				</td>\r\n																			</tr>\r\n																		</tbody>\r\n																	</table>\r\n																	<table width=\"260\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" class=\"scale\">\r\n																		<tbody>\r\n																			<tr>\r\n																				<td style=\"font-size: 40px; color:#fff; font-family: \'Gabriola\', Helvetica, Arial, sans-serif; letter-spacing: 1px; line-height: 50px;\" align=\"left\" class=\"title\"><singleline> Visit Us!</singleline></td>\r\n																			</tr>\r\n																			<tr>\r\n																				<td style=\"color: #fff; font-size: 14px; font-family: \'Open sans\', Arial, sans-serif; line-height: 28px;\" class=\"scale-center-both\"><multiline>\r\n																					Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.\r\n																				</multiline></td>\r\n																			</tr>\r\n																			<tr><td height=\"6\" style=\"font-size: 1px;\">&nbsp;</td></tr>\r\n																			<tr>\r\n																				<td style=\"color: #fff; font-size: 14px; font-family: \'Open sans\', Arial, sans-serif; line-height: 28px;\" class=\"scale-center-both\"><multiline>\r\n																					2K Avenue, 5th Street, New York City. \r\n																					<br>\r\n																					<a href=\"mailto:example@mail.com\" style=\"text-decoration: none; color: #9E2026;\">example@mail.com</a>\r\n																				</multiline></td>\r\n																			</tr>\r\n																		</tbody>\r\n																	</table> \r\n																</td>\r\n															</tr>\r\n															<tr><td height=\"34\">&nbsp;</td></tr>\r\n														</tbody>\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											<tr><td height=\"40\">&nbsp;</td></tr>\r\n										</tbody>\r\n									</table>   \r\n								</td>\r\n							</tr>\r\n							<!--//contact-->\r\n							<!--footer-->\r\n							<tr>\r\n								<td style=\"background-color:#24292D;\">\r\n									<table width=\"560\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n										<tbody>\r\n											<tr><td height=\"27\" style=\"font-size: 1px;\">&nbsp;</td></tr>\r\n											<tr>\r\n												<td class=\"footer-bottom\" align=\"center\" style=\"color: #fff;font-size:14px; font-family:\'Open sans\', Arial, sans-serif; line-height:24px;\">We hope you like our newsletters. If you don\'t, <br> simply <a href=\"#\" style=\"color:#fff;\">unsubscribe.</a></td>\r\n											</tr>\r\n											<tr><td height=\"27\" style=\"font-size: 1px;\">&nbsp;</td></tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td style=\"background-color:#000;\">\r\n									<table width=\"540\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale-full\">\r\n										<tbody>\r\n											<tr><td height=\"12\" style=\"font-size: 1px;\">&nbsp;</td></tr>\r\n											<tr>\r\n												<td height=\"35\" style=\"font-family: \'Open sans\', Arial, sans-serif; font-size: 14px; color: #fff; line-height: 24px;\" class=\"copy-right\">\r\n													© 2016 Fashion. All rights reserved | Design by <a href=\"http://onyxdatasystems.com/\" style=\"color:#fff; text-decoration:none;\">OnyxDS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       \r\n												<a href=\"#\" style=\"text-decoration: none; color: #FFFFFF;\">Order Online</a>\r\n												</td>\r\n											</tr>\r\n											<tr><td height=\"12\" style=\"font-size: 1px;\">&nbsp;</td></tr>\r\n										</tbody>\r\n									</table>\r\n								</td>\r\n							</tr>\r\n							<!--//footer-->\r\n						</tbody>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"45\" class=\"hide\"></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</body>\r\n</html>', '2016-07-03 22:35:55');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(2, 'innovative', 'innovative', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Innovative a Email Template | OnyxDS</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Innovative Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n<!-- //Custom Theme files -->\r\n<!-- Responsive Styles and Valid Styles -->\r\n	<style type=\"text/css\">\r\n    	\r\n	    body{\r\n            width: 100%;  \r\n            margin:0; \r\n            padding:0; \r\n            -webkit-font-smoothing: antialiased;	\r\n        }\r\n        html{\r\n            width: 100%; \r\n        }\r\n        \r\n        table{\r\n            font-size: 14px;\r\n            border: 0;\r\n        }\r\n		 /* ----------- responsivity ----------- */\r\n		 @media only screen and (max-width: 800px){\r\n				table.container.top-header-left {\r\n					width: 726px;\r\n				}\r\n		 }\r\n		 @media only screen and (max-width: 736px){\r\n			 table.container.top-header-left {\r\n				width: 684px;\r\n			}\r\n			}\r\n		@media only screen and (max-width: 667px){\r\n			table.container.top-header-left {\r\n				width: 600px;\r\n			}\r\n			table.container-middle {\r\n				width: 565px;\r\n			}\r\n			a.logo-text img {\r\n				width: 100%;\r\n				height: inherit;\r\n			}\r\n			table.logo {\r\n				width: 40%;\r\n			}\r\n			table.mail_left {\r\n				width: 200px;\r\n			}\r\n			td.mail_gd,td.mail_gd a {\r\n				text-align: center !important;\r\n			}\r\n			td.ban_pad {\r\n				height: 48px;\r\n			}\r\n			td.future {\r\n				font-size: 2em !important;\r\n			}\r\n			td.ban_tex {\r\n				height: 18px;\r\n			}\r\n			table.ban-hei {\r\n				height: 315px !important;\r\n			}\r\n			td.ser_pad {\r\n				height: 50px;\r\n			}\r\n			td.wel_text {\r\n				font-size: 2.1em !important;\r\n			}\r\n			td.ser_text {\r\n				line-height: 2em !important;\r\n				font-size: 1em !important;\r\n			}\r\n			table.twelve_one {\r\n				width: 316px;\r\n			}\r\n			table.twelve_two {\r\n				width: 229px;\r\n			}\r\n			td.pic_one img {\r\n				width: 100%;\r\n				height: inherit;\r\n			}\r\n			table.ser_left_two {\r\n				width: 100px;\r\n			}\r\n			table.ser_left_one {\r\n				width: 200px;\r\n			}\r\n			img.full {\r\n				width: 100%;\r\n			}\r\n			table.twelve_three {\r\n				width: 272px;\r\n			}\r\n			td.ser_text2 {\r\n				font-size: 1.5em !important;\r\n			}\r\n			table.cir_left {\r\n				width: 276px;\r\n			}\r\n			table.twelve_four {\r\n				width: 200px;\r\n			}\r\n			table.twelve_five {\r\n				width: 337px;\r\n			}\r\n			td.ser_one {\r\n				height: 45px;\r\n			}\r\n			table.foo {\r\n				width: 370px;\r\n			}\r\n		}\r\n        @media only screen and (max-width: 640px){\r\n			td.ser_one {\r\n				height: 60px;\r\n			}\r\n            .top-bottom-bg{width: 420px !important; height: auto !important;}\r\n			\r\n			table.container-middle.navi-grid {\r\n				width: 360px !important;\r\n			}\r\n			table.logo {\r\n				width: 45%;\r\n			}\r\n        }\r\n		@media only screen and (max-width: 600px){\r\n			table.container.top-header-left {\r\n				width: 535px;\r\n			}\r\n			table.container-middle{\r\n				width: 485px;\r\n			}\r\n			table.ban-hei {\r\n				height: 288px !important;\r\n			}\r\n			table.ser_left_one {\r\n				width: 151px;\r\n			}\r\n			table.ser_left_two {\r\n				width: 86px;\r\n			}\r\n			table.twelve_one {\r\n				width: 239px;\r\n			}\r\n			table.twelve_two {\r\n				width: 221px;\r\n			}\r\n			table.twelve_three {\r\n				width: 100%;\r\n			}\r\n			img.full {\r\n				width: inherit;\r\n			}\r\n			table.cir_left {\r\n				width: 230px;\r\n			}\r\n			table.cir_left img {\r\n				width: 54%;\r\n				height: inherit;\r\n			}\r\n			img.full.team_img {\r\n				width: 100% !important;\r\n				height:inherit;\r\n			}\r\n			table.twelve_four {\r\n				width: 160px;\r\n			}\r\n			table.twelve_five {\r\n				width: 298px;\r\n			}\r\n			td.team_pad {\r\n				height: 0;\r\n			}\r\n			table.foo {\r\n				width: 100%;\r\n			}\r\n			td.ser_text.editable {\r\n				text-align: center;\r\n			}\r\n			table.foo1 {\r\n				width: 100%;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 568px){\r\n			/*-- OnyxDS --*/\r\n			table.container.top-header-left {\r\n				width: 495px !important;\r\n			}\r\n			table.ban_info {\r\n				width: 400px;\r\n			}\r\n			\r\n			td.future {\r\n				font-size: 1.8em !important;\r\n			}\r\n			table.ban-hei {\r\n				height: 258px !important;\r\n			}\r\n			table.container-middle {\r\n				width: 449px;\r\n			}\r\n			table.twelve_two {\r\n				width: 190px;\r\n			}\r\n			td.ser_one {\r\n				height: 34px;\r\n			}\r\n			td.ser_two {\r\n				height: 21px;\r\n			}\r\n			table.cir_left {\r\n				width: 100%;\r\n			}\r\n			table.cir_left img {\r\n				width: 30%;\r\n				height: inherit;\r\n			}\r\n			table.twelve_four {\r\n				width: 100%;\r\n			}\r\n			img.full.team_img {\r\n				width: 45% !important;\r\n				height: inherit;\r\n			}\r\n			table.twelve_five {\r\n				width: 100%;\r\n			}\r\n			td.text_team {\r\n				text-align: center;\r\n			}\r\n			td.twel_pad {\r\n				height: 25px;\r\n			}\r\n		}\r\n		/*-- agileits --*/\r\n        @media only screen and (max-width: 480px){\r\n            .container{width: 290px !important;}\r\n            .container-middle {\r\n				width: 85% !important;\r\n			}\r\n            .mainContent{width: 240px !important;}\r\n            .top-bottom-bg{width: 260px !important; height: auto !important;\r\n			}\r\n		\r\n			table.logo {\r\n				width: 33% !important;\r\n			}\r\n			table.container.top-header-left {\r\n				width: 422px !important;\r\n			}\r\n			\r\n			table.container-middle.navi-grid {\r\n				width: 399px !important;\r\n			}\r\n			table.container-middle.nav-head {\r\n				width: 350px !important;\r\n			}\r\n			table.twelve_one {\r\n				width: 100%;\r\n			}\r\n			table.ser_left_one {\r\n				width: 271px;\r\n			}\r\n			table.twelve_two {\r\n				width: 100%;\r\n			}\r\n			td.pic_one {\r\n				text-align: center !important;\r\n			}\r\n			td.pic_one img {\r\n				width: 70%;\r\n				height: inherit;\r\n			}\r\n			td.ser_pad {\r\n				height: 32px;\r\n			}\r\n			td.future {\r\n				font-size: 1.5em !important;\r\n			}\r\n			table.ban_info {\r\n				width: 348px;\r\n			}\r\n			table.logo {\r\n				width: 43% !important;\r\n			}\r\n			/*-- OnyxDS --*/\r\n			table.ban-hei {\r\n				height: 242px !important;\r\n			}\r\n			td.ban_pad {\r\n				height: 24px;\r\n			}	\r\n			table.logo {\r\n				width: 54% !important;\r\n			}\r\n			td.ser_text {\r\n				font-size: 13px !important;\r\n			}			\r\n	    }\r\n		\r\n		@media only screen and (max-width: 414px){\r\n			table.container.top-header-left {\r\n				width: 397px !important;\r\n			}\r\n			table.container-middle.navi-grid {\r\n				width: 372px !important;\r\n			}\r\n			table.container.top-header-left {\r\n				width: 370px !important;\r\n			}\r\n			.container-middle {\r\n				width: 95% !important;\r\n			}\r\n			table.ser_left_one {\r\n				width: 255px;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 384px){\r\n		\r\n			table.container-middle.navi-grid ,table.container.top-header-left{\r\n				width: 300px !important;\r\n			}\r\n			table.ban_info {\r\n				width: 297px;\r\n			}\r\n			td.future {\r\n				font-size: 1.3em !important;\r\n			}\r\n			.container-middle {\r\n				width: 90% !important;\r\n			}\r\n			table.ban_info {\r\n				width: 310px;\r\n			}\r\n			/*-- agileits --*/\r\n			table.container-middle.nav-head {\r\n				width: 340px !important;\r\n			}\r\n			\r\n			table.ser_left_one {\r\n				width: 216px;\r\n			}\r\n			table.mail_left,table.mail_right {\r\n				width: 100%;\r\n				height: 38px;\r\n			}\r\n			table.ban-hei {\r\n				height: 207px !important;\r\n			}\r\n			td.ser_one {\r\n				height: 11px;\r\n			}\r\n		}\r\n		\r\n		@media only screen and (max-width: 320px){\r\n			td.wel_text {\r\n				font-size: 1.9em !important;\r\n			}\r\n			img.full {\r\n				width: 100%;\r\n			}\r\n			table.container.top-header-left {\r\n				width: 284px !important;\r\n			}\r\n			table.container-middle.nav-head {\r\n				width: 257px !important;\r\n			}\r\n			table.ban_info {\r\n				width: 257px;\r\n			}\r\n			td.future {\r\n				font-size: 1.2em !important;\r\n			}\r\n			td.ban_tex {\r\n				height: 10px;\r\n			}\r\n			table.ban-hei {\r\n				height: 175px !important;\r\n			}\r\n			table.logo {\r\n				width: 56% !important;\r\n			}\r\n			td.top_mar {\r\n				height: 6px;\r\n			}\r\n			table.mail_left, table.mail_right {\r\n				width: 100%;\r\n				height: 29px;\r\n			}\r\n			table.ser_left_one {\r\n				width: 181px;\r\n			}\r\n			table.ser_left_two {\r\n				width: 73px;\r\n			}\r\n			td.pic_one img {\r\n				width: 100%;\r\n			}\r\n			table.cir_left img {\r\n				width: 37%;\r\n			}\r\n			td.thompson {\r\n				font-size: 1.5em !important;\r\n			}\r\n			table.follow {\r\n				width: 100%;\r\n			}\r\n			table.follow td {\r\n				text-align: center !important;\r\n			}\r\n			table.logo {\r\n				width: 69% !important;\r\n			}\r\n		}\r\n    </style>  \r\n</head>\r\n<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n		\r\n        <tr>\r\n            <td width=\"100%\" align=\"center\" valign=\"top\"  bgcolor=\"062f3c\" style=\"\">\r\n				<table>\r\n					<tr><td class=\"top_mar\" height=\"50\"></td></tr>\r\n				</table>\r\n				<!-- main content -->\r\n				<table style=\"box-shadow:0px 0px 0px 0px #E0E0E0;\"width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container top-header-left\">	\r\n					<tr bgcolor=\"d70b03\">\r\n						<td> \r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle nav-head\">\r\n								<tr>\r\n									<td height=\"15\"></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"logo\">\r\n											<tbody>\r\n												\r\n												<tr>\r\n													<td align=\"right\">\r\n														<a href=\"#\" class=\"logo-text\" style=\"text-decoration:none;\"><img src=\"images/logo1.png\" alt=\" \" width=\"294\" height=\"78\"></a>\r\n													</td>\r\n												</tr>\r\n											</tbody>\r\n										</table>		\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"15\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"#af1610\">\r\n						<td> \r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle nav-head\">\r\n								<tr>\r\n									<td height=\"15\"></td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n											<tbody>\r\n												<tr>\r\n													<td>\r\n														<table class=\"mail_left\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"500\">\r\n															<tbody>\r\n																<tr> \r\n																	<td class=\"mail_gd\" align=\"center\" style=\" text-align: left; font-size:1.2em; font-family:Candara; color: #FFFFFF;\">\r\n																		<a href=\"mailto:info@example.com\" style=\"color:#fff;text-decoration:none\"><img src=\"images/envelope.png\" alt=\"\" border=\"0\" height=\"18\" width=\"18\">&nbsp; &nbsp;info@example.com</a>\r\n																	</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table class=\"mail_right\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"150\">\r\n															<tbody>\r\n																<tr>			\r\n																	<td align=\"center\"  style=\"font-size:14px;color:#f5f5f5;font-family:Arial,serif\"><img src=\"images/1.png\" alt=\"\" border=\"0\" height=\"16\" width=\"16\">&nbsp; &nbsp;+1234 567 892</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n													</td>\r\n												</tr>\r\n											</tbody>\r\n										</table>		\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td height=\"15\"></td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n							<table class=\"ban-hei\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:url(images/ban1.jpg); background-size:cover;\" height=\"380\">	\r\n								<tbody>\r\n									<tr>\r\n										<td class=\"ban_pad\" height=\"80\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td>\r\n											<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\"  style=\"border:2px solid #af1610\">\r\n												<tbody>\r\n													<tr>\r\n														<td>				\r\n															<table class=\"ban_info\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"  width=\"500\">				\r\n																<tbody>\r\n																	<tr>\r\n																		<td class=\"ban_tex\" height=\"30\"></td>\r\n																	</tr>\r\n																	<tr>\r\n																		<td class=\"future\" style=\"font-size:2.3em;color:#fff;text-transform:capitalize;font-family:Candara;text-align:center;line-height:1.5em\">The Future Belongs To Corporate</td>\r\n																	</tr>	\r\n																	<tr><td class=\"ban_tex\" height=\"30\"></td></tr>	\r\n																</tbody>\r\n															</table>		\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td style=\"font-size:1.3em;color:#fff;text-transform:capitalize;font-family:Candara;text-align:center\">\r\n											Nulla pariatur\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td class=\"ban_pad\" height=\"80\"></td>\r\n									</tr>\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"#ffffff\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								<tbody>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n									<tr>\r\n										<td class=\"wel_text\" align=\"center\" style=\"font-size:2.5em;color:#d70b03;font-family:Candara;text-align:center;font-weight:600;\"> \r\n											SERVICES\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"15\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td class=\"ser_text\" align=\"center\" style=\"color:#464646; font-size: 1.2em; font-family: Candara; line-height:1.8em;\">\r\n											Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. \r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td>\r\n											<table class=\"twelve_one\" width=\"350\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													\r\n													<tr>\r\n														<td class=\"ser_one\" height=\"60\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>\r\n															<table class=\"ser_left_one\" width=\"250\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td class=\"ser_text\" align=\"right\" style=\"color:#464646; font-size: 1.2em; font-family: Candara; line-height:1.8em;\">Sed ut perspiciatis unde omnis iste natus error sit. </td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															<table class=\"ser_left_two\" width=\"100\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td  align=\"center\">\r\n																			<img src=\"images/send1.png\" alt=\" \" width=\"60\" height=\"60\">\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_two\" height=\"35\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>\r\n															<table class=\"ser_left_one\" width=\"250\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td class=\"ser_text\" align=\"right\" style=\"color:#464646; font-size: 1.2em; font-family: Candara; line-height:1.8em;\">Sed ut perspiciatis unde omnis iste natus error sit. </td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															<table class=\"ser_left_two\" width=\"100\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td align=\"center\">\r\n																			<img src=\"images/send2.png\" alt=\" \" width=\"60\" height=\"60\">\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_two\" height=\"35\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>\r\n															<table class=\"ser_left_one\" width=\"250\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td class=\"ser_text\" align=\"right\" style=\"color:#464646; font-size: 1.2em; font-family: Candara; line-height:1.8em;\">Sed ut perspiciatis unde omnis iste natus error sit. </td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n															<table class=\"ser_left_two\" width=\"100\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td align=\"center\">\r\n																			<img src=\"images/send3.png\" alt=\" \" width=\"60\" height=\"60\">\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											<!-- SPACE -->\r\n											<table class=\"twelve\" width=\"20\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tr>\r\n													<td width=\"20\" height=\"20\" style=\"font-size: 60px; line-height: 60px;\"></td>\r\n												</tr>\r\n											</table>\r\n											<!-- END SPACE -->\r\n											<table class=\"twelve_two\" width=\"250\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													<tr>\r\n														<td class=\"pic_one\" align=\"right\">\r\n															<img src=\"images/pic1.jpg\" alt=\" \" width=\"250\" height=\"376\">\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											\r\n										</td>\r\n									</tr>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"f7f7f7\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\" >\r\n								<tbody>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n									<tr>\r\n										<td class=\"wel_text\" align=\"center\" style=\"font-size:2.5em;color:#d70b03;font-family:Candara;text-align:center;font-weight:600;\"> \r\n											ABOUT US\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"15\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td class=\"ser_text\" align=\"center\" style=\"color:#464646; font-size: 1.2em; font-family: Candara; line-height:1.8em;\">\r\n											Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium. \r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td>\r\n											<table class=\"twelve_three\" width=\"310\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													\r\n													<tr>\r\n														<td height=\"20\">&nbsp;</td>\r\n													</tr>\r\n\r\n													<tr>\r\n														<td class=\"ser_text2\" style=\"text-align:left;color: #d70b03;font-size: 1.8em;font-family:Candara;font-weight:500;\">Voluptatem Accusantium</span></td>\r\n													</tr>\r\n\r\n\r\n													<tr>\r\n														<td height=\"15\">&nbsp;</td>\r\n													</tr>\r\n\r\n													<tr>\r\n														<td class=\"ser_text\" align=\"left\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"15\">&nbsp;</td>\r\n													</tr>\r\n													<tr>\r\n														<td align=\"left\">\r\n															<img src=\"images/pic6.jpg\" alt=\" \" width=\"310\" height=\"190\" class=\"full\">\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											<!-- SPACE -->\r\n											<table class=\"twelve\" width=\"20\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n												<tr>\r\n													<td width=\"20\" height=\"20\" style=\"font-size: 60px; \"></td>\r\n												</tr>\r\n\r\n											</table>\r\n											<!-- END SPACE -->\r\n											<table class=\"twelve_three\" width=\"310\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													\r\n													<tr>\r\n														<td height=\"20\">&nbsp;</td>\r\n													</tr>\r\n\r\n													<tr>\r\n														<td class=\"ser_text2\" style=\"text-align:left;color: #d70b03;font-size: 1.8em;font-family:Candara;font-weight:500;\">Voluptatem Accusantium</span></td>\r\n													</tr>\r\n\r\n\r\n													<tr>\r\n														<td height=\"15\">&nbsp;</td>\r\n													</tr>\r\n\r\n													<tr>\r\n														<td class=\"ser_text\" align=\"left\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"15\">&nbsp;</td>\r\n													</tr>\r\n													<tr>\r\n														<td align=\"left\">\r\n															<img src=\"images/pic7.jpg\" alt=\" \" width=\"310\" height=\"190\" class=\"full\">\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</td>\r\n									</tr>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td height=\"50\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n									<tr>\r\n										<td>\r\n											<table class=\"cir_left\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"320\">\r\n												<tbody>\r\n													<tr>\r\n														<td align=\"center\">\r\n															<img src=\"images/fig1.png\" alt=\" \" class=\"img-responsive circle-left-img\" width=\"154\" height=\"154\">	\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td align=\"center\" style=\"color:#d70b03; font-size: 1.5em; font-family: Candara;\">\r\n															PROJECTS\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text\" align=\"center\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											<table class=\"icon\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"10\">	\r\n												<tbody>\r\n													<tr>\r\n														<td>&nbsp;&nbsp;</td>\r\n													</tr>\r\n														\r\n												</tbody>\r\n											</table>\r\n											<table class=\"cir_left\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"320\">\r\n												<tbody>\r\n													<tr>\r\n														<td align=\"center\">\r\n															<img src=\"images/fig2.png\" alt=\" \" class=\"img-responsive circle-left-img\" width=\"154\" height=\"154\">	\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td align=\"center\" style=\"color:#d70b03; font-size: 1.5em; font-family: Candara;\">\r\n															CLIENTS\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text\" align=\"center\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											\r\n										</td>\r\n									</tr>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				\r\n					<tr bgcolor=\"ffffff\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\" >\r\n								<tbody>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n									<tr>\r\n										<td class=\"wel_text\" align=\"center\" style=\"font-size:2.5em;color:#d70b03;font-family:Candara;text-align:center;font-weight:600;\"> \r\n											OUR TEAM\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"25\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td>\r\n											<table class=\"twelve_four\" width=\"100\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													<tr>\r\n														<td align=\"center\">\r\n															<img src=\"images/team1.png\" alt=\" \" width=\"200\" height=\"200\" class=\"full team_img\">\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											<!-- SPACE -->\r\n											<table  width=\"20\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tr>\r\n													<td width=\"20\" height=\"20\" style=\"font-size: 60px; line-height: 60px;\"></td>\r\n												</tr>\r\n											</table>\r\n											<!-- END SPACE -->\r\n											<table class=\"twelve_five\" width=\"430\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													<tr>\r\n														<td class=\"team_pad\" height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text2 text_team\" align=\"left\" style=\"color: #d70b03;font-size: 1.5em;font-family: Candara;line-height: 1.8em;\">\r\n															Voluptatem Accusantium\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"10\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text text_team\" align=\"left\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque \r\n															laudantium voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"10\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"text_team\" align=\"left\" style=\"color: #d70b03;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															 Thompson \r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>	\r\n										</td>\r\n									</tr>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"twel_pad\" height=\"50\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n									<tr>\r\n										<td>\r\n											<table class=\"twelve_five\" width=\"430\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													<tr>\r\n														<td class=\"team_pad\" height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text2 text_team\" align=\"right\" style=\"color: #d70b03;font-size: 1.5em;font-family: Candara;line-height: 1.8em;\">\r\n															Voluptatem Accusantium\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"10\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"ser_text text_team\" align=\"right\" style=\"color: #464646;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque \r\n															laudantium voluptatem accusantium doloremque laudantium. \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"10\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td class=\"text_team\" align=\"right\" style=\"color: #d70b03;font-size: 1.2em;font-family: Candara;line-height: 1.8em;\">\r\n															 Federica \r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n											<!-- SPACE -->\r\n											<table  width=\"20\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tr>\r\n													<td width=\"20\" height=\"20\" style=\" line-height: 60px;\"></td>\r\n												</tr>\r\n											</table>\r\n											<!-- END SPACE -->\r\n											<table class=\"twelve_four\" width=\"100\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n												<tbody>\r\n													<tr>\r\n														<td align=\"center\">\r\n															<img src=\"images/team2.png\" alt=\" \" width=\"200\" height=\"200\" class=\"full team_img\">\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>									\r\n										</td>\r\n									</tr>\r\n									<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n									<!-- //padding-top -->\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"f7f7f7\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n								<!-- //padding-top -->\r\n									<tr>\r\n										<td>\r\n											<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\r\n												<tr>\r\n													<td align=\"center\">\r\n														<img src=\"images/7.png\" alt=\" \" class=\"img-responsive\" style=\"text-align:center;\" width=\"130\" height=\"130\" />\r\n													</td>\r\n												</tr>\r\n												\r\n												<tr>\r\n													<td>&nbsp;</td>\r\n												</tr>\r\n												<tr>\r\n													<td class=\"thompson\" align=\"center\" style=\"font-size:1.8em;color:#8c8c8c;font-family:Candara;\">William Thompson</td>\r\n												</tr>\r\n												\r\n												<tr>\r\n													<td height=\"5\"></td>\r\n												</tr>\r\n												\r\n												<tr>\r\n													<td align=\"center\" style=\"font-size:1.2em;color:#d70b03;font-family:Candara;\">Web Developer</td>\r\n												</tr>\r\n												<tr>\r\n													<td>&nbsp;</td>\r\n												</tr>\r\n												<tr>\r\n													<td class=\"ser_text\" align=\"center\" style=\"font-size:1.1em;color:#464646;line-height:1.8em;font-family:Candara;\">\r\n														Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.\r\n													</td>\r\n												</tr>\r\n													\r\n											</table>\r\n											\r\n										</td>\r\n									</tr>\r\n								<!-- padding-top -->\r\n									<tr>\r\n										<td class=\"ser_pad\" height=\"70\"></td>\r\n									</tr>\r\n								<!-- //padding-top -->\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n							<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\"  style=\"border-bottom:1px solid #f7f7f7\">\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"ffffff\">\r\n						<td>\r\n							<table class=\"us_on\" border=\"0\" width=\"300\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								<tr><td height=\"20\"></td></tr>\r\n								<tr>\r\n									<td>\r\n										<table class=\"follow\" width=\"100\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n											<tr>\r\n												<td style=\"color:#868283; font-size: 1.3em; font-family: Candara; text-align:left;line-height:1.6em;\">Follow us on\r\n												</td>\r\n											</tr>\r\n										</table>\r\n										<table class=\"follow\" width=\"150\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n											<tr>\r\n												<td>\r\n													<table border=\"0\" width=\"100%\">\r\n														<tbody>\r\n															<tr>\r\n																<td width=\"22\">\r\n																	<a href=\"#\">\r\n																		<img src=\"images/icon1.png\" width=\"22\" height=\"22\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"1\">\r\n																</td>\r\n																<td width=\"22\">\r\n																	<a href=\"#\">\r\n																		<img src=\"images/icon2.png\" width=\"22\" height=\"22\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"1\">\r\n																</td>\r\n																<td width=\"22\">\r\n																	<a href=\"#\">\r\n																		<img src=\"images/icon3.png\" width=\"22\" height=\"22\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"1\">\r\n																</td>\r\n																<td width=\"22\">\r\n																	<a href=\"#\">\r\n																		<img src=\"images/icon4.png\" width=\"22\" height=\"22\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"1\">\r\n																</td>\r\n																<td width=\"22\">\r\n																	<a href=\"#\">\r\n																		<img src=\"images/icon5.png\" width=\"22\" height=\"22\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								<tr><td height=\"20\"></td></tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr bgcolor=\"d70b03\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								<tr>\r\n									<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n								</tr>\r\n									\r\n									<tr>\r\n										<td>\r\n\r\n											<table class=\"foo\" width=\"375\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n												<tr>\r\n													<td class=\"ser_text editable\"style=\"font-family: Candara; font-size: 1em; color: #ffffff; line-height: 24px;\">\r\n														© 2016 Innovative . All Rights Reserved | Design by <a href=\"http://onyxdatasystems.com/\" style=\"color: #fff; font-size: 1em;text-decoration:none;\"> OnyxDS</a>\r\n													</td>\r\n												</tr>\r\n											</table>\r\n\r\n											<!-- SPACE -->\r\n											<table width=\"1\" height=\"10\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n												<tr>\r\n													<td height=\"10\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;padding-left: 24px;\">&nbsp;\r\n														\r\n													</td>\r\n												</tr>\r\n											</table>\r\n											<!-- END SPACE -->\r\n\r\n											<table class=\"foo1\" width=\"170\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n												<tr>\r\n													<td class=\"ser_text editable\" style=\"font-family: Candara; font-size: 1em; color: #ffffff; line-height: 24px;\">\r\n\r\n														<!-- Place URL to Web Version-->\r\n														<a href=\"#\" style=\"color:#ffffff;text-decoration:none;\" data-size=\"Footer Text\" data-color=\"Footer Text\">\r\n\r\n															<!-- Change Text -->\r\n															web version\r\n\r\n														</a>\r\n\r\n														<span data-size=\"Footer Text\" data-color=\"Footer Text\">&nbsp;&nbsp;|&nbsp;&nbsp;</span>\r\n														<a href=\"#\" style=\"color:#ffffff;text-decoration:none;\">\r\n															unsubscribe\r\n														</a>\r\n													</td>\r\n												</tr>\r\n											</table>\r\n\r\n										</td>\r\n									</tr>\r\n									\r\n									<tr>\r\n										<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n									</tr>\r\n\r\n							</table>\r\n						</td>\r\n					</tr>\r\n\r\n				</table>\r\n				<table>\r\n					<tr><td class=\"top_mar\" height=\"50\"></td></tr>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2016-07-03 22:35:55');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(3, 'Merry Christmas', 'merry_christmas', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Merry Christmas a Email Template | OnyxDS</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Merry Christmas Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n<!-- //Custom Theme files -->\r\n<!-- Responsive Styles and Valid Styles -->\r\n	<style type=\"text/css\">\r\n    	\r\n	    body{\r\n            width: 100%; \r\n            background:url(images/background.png) 0px 0px;\r\n			display:block;\r\n            margin:0; \r\n            padding:0; \r\n            -webkit-font-smoothing: antialiased;\r\n        }\r\n        \r\n        html{\r\n            width: 100%; \r\n        }\r\n        \r\n        table{\r\n            font-size: 14px;\r\n            border: 0;\r\n        }\r\n		table.map tr td iframe{\r\n			width:100%;\r\n			height:200px;\r\n		}\r\n		 /* ----------- responsivity ----------- */\r\n		 @media only screen and (max-width: 768px){\r\n			.container {\r\n				width: 650px;\r\n			}\r\n			table.banner {\r\n				width: 400px;\r\n			}\r\n			table.santa {\r\n				background: url(images/8.png) no-repeat 35em 1em !important;\r\n			}\r\n			table.basd {\r\n				background: url(images/banner1.jpg) no-repeat -40px 0px #fff !important;\r\n			}\r\n			table.may {\r\n				width: 635px;\r\n			}\r\n		 }\r\n		 @media only screen and (max-width: 667px){\r\n			table.scale.image1 {\r\n				width: 48% !important;\r\n			}\r\n			table.scale.image1 img{\r\n				width:100% !important;\r\n			}\r\n			table.may {\r\n				width: 500px !important;\r\n			}\r\n			table.container-middle {\r\n				width: 620px;\r\n			}\r\n			.container {\r\n				width: 600px;\r\n			}\r\n		}\r\n        @media only screen and (max-width: 640px){\r\n        \r\n            /*------ top header ------ */\r\n            .header-bg{width: 440px !important; height: 10px !important;}\r\n            .main-header{line-height: 28px !important;}\r\n            .main-subheader{line-height: 28px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 420px !important;}\r\n            .feature-middle{width: 400px !important; text-align: center !important;}\r\n            .feature-img{width: 440px !important; height: auto !important;}\r\n            \r\n            .container{width: 600px !important;}\r\n            .container-middle{width: 485px !important;}\r\n            .mainContent{width: 400px !important;}\r\n            \r\n            .main-image{width: 400px !important; height: auto !important;}\r\n            .banner{width: 400px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 400px !important;}\r\n            .section-img{width: 400px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 420px !important; height: auto !important;}\r\n			table.santa {\r\n				background: url(images/8.png) no-repeat 28em 1em !important;\r\n			}\r\n            \r\n        }\r\n		@media only screen and (max-width: 600px){\r\n			.container {\r\n				width: 560px !important;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 568px){\r\n			.container {\r\n				width: 525px !important;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 480px){\r\n			.container {\r\n				width: 200px !important;\r\n			}\r\n			.icon {\r\n				width: 70%;\r\n			}\r\n			table.dummy_text {\r\n				width: 385px;\r\n			}\r\n			table.logo-bottom {\r\n				width: 400px;\r\n			}\r\n			table.basd {\r\n				background: url(images/banner1.jpg) no-repeat 0px 0px #fff;\r\n				background-size: contain !important;\r\n			}\r\n			table.may {\r\n				width: 425px !important;\r\n			}\r\n			.container-middle {\r\n				width: 430px !important;\r\n			}\r\n			table.basd {\r\n				background: url(images/banner1.jpg) no-repeat 0px 0px #fff !important;\r\n				background-size:contain !important;\r\n			}\r\n			img.logo {\r\n				width: 75%;\r\n			}\r\n			table.santa {\r\n				background: url(images/8.png) no-repeat 20em 1em !important;\r\n			}\r\n		}\r\n        @media only screen and (max-width: 479px){\r\n        \r\n        	/*------ top header ------ */\r\n            .header-bg{width: 280px !important; height: 10px !important;}\r\n            .top-header-left{width: 260px !important; text-align: center !important;}\r\n            .top-header-right{width: 260px !important;}\r\n            .main-header{line-height: 28px !important; text-align: center !important;}\r\n            .main-subheader{line-height: 28px !important; text-align: center !important;}\r\n            \r\n            /*------- header ----------*/\r\n            .logo{width: 260px !important;}\r\n            .nav{width: 260px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 260px !important;}\r\n            .feature-middle{width: 240px !important; text-align: center !important;}\r\n            .feature-img{width: 260px !important; height: auto !important;}\r\n\r\n            \r\n            .container{width: 290px !important;}\r\n            .container-middle{width: 260px !important;}\r\n            .mainContent{width: 240px !important;}\r\n            \r\n            .main-image{width: 240px !important; height: auto !important;}\r\n            .banner{width: 240px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 240px !important;}\r\n            .section-img{width: 240px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 260px !important; height: auto !important;}\r\n			table {\r\n				  width: 100% !important;\r\n			}\r\n            .gallery-img a img {\r\n				height: 134px !important;\r\n			}\r\n			.gallery-img1 a img {\r\n				height: 60px !important;\r\n			}\r\n			.gallery-img2 a img {\r\n				height: 60px !important;\r\n			}\r\n	    }\r\n		@media only screen and (max-width:414px){\r\n			table.scale.image1 {\r\n				width: 100% !important;\r\n				height: auto !important;\r\n			}\r\n			table.may {\r\n				width: 380px !important;\r\n			}\r\n			table.santa {\r\n				background: url(images/8.png) no-repeat 17em 1em !important;\r\n			}\r\n			.container-middle {\r\n				width: 300px !important;\r\n			}\r\n			td.scale-center-both img {\r\n				margin: 0 auto;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 384px){\r\n			table.may {\r\n				width: 350px !important;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 375px){\r\n			table.banner {\r\n				width: 240px !important;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 320px){\r\n			table.scale.2-grids{\r\n				width:200px !important;\r\n			}\r\n			td.scale-center-both a img {\r\n				width: 100% !important;\r\n				height: auto !important;\r\n			}\r\n			td.gifts img {\r\n				width: 200px !important;\r\n				height: auto !important;\r\n			}\r\n			table.scale.map img {\r\n				width: 100% !important;\r\n			}\r\n			.container-middle {\r\n				width: 290px !important;\r\n			}\r\n			table.may {\r\n				width: 270px !important;\r\n			}\r\n			.logo {\r\n				width: 190px !important;\r\n			}\r\n			table.banner {\r\n				width: 200px !important;\r\n			}\r\n			table.santa {\r\n				background: url(images/8.png) no-repeat 9em 1em !important;\r\n			}\r\n		}\r\n    </style>\r\n    \r\n</head>\r\n\r\n<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n	\r\n		<tr><td height=\"30\"></td></tr>\r\n		\r\n        <tr>\r\n             <td width=\"100%\" align=\"center\" valign=\"top\">\r\n                <!-- main content -->\r\n                <table width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container top-header-left\">\r\n\r\n				<!-- Header -->\r\n						\r\n					<tr>\r\n						<td>\r\n							<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"background:url(images/7.jpg) no-repeat 0px 0px;\" height=\"230\">\r\n							\r\n								<tr>\r\n									<td>\r\n										<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"santa\" style=\"background:url(images/8.png) no-repeat 42em 1em;display:block;\" height=\"230\">\r\n										\r\n											<tr>\r\n												<td>\r\n													<table class=\"container-middle banner\" width=\"580\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\r\n											\r\n														<tr><td height=\"20\"></td></tr>\r\n											\r\n														<tr>\r\n															<td>\r\n																<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tr>\r\n																		<td>\r\n																			\r\n																			<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																				<tr>\r\n																					<td>\r\n																						<a href=\"#\" style=\"color:#FFFFFF;text-decoration:none;\">\r\n																							<img src=\"images/5.png\" border=\"0\" height=\"auto\" width=\"350\" alt=\" \" class=\"logo\" />\r\n																						</a>\r\n																					</td>\r\n																				</tr>\r\n																			</table>\r\n																			\r\n																		</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n					\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				<!-- //Header -->\r\n				\r\n				<!-- banner -->\r\n					<tr>\r\n						<td>\r\n							<table class=\"basd\" height=\"550\" border=\"0\" style=\"background:url(images/banner1.jpg) no-repeat 0px 0px #fff;\" width=\"100%\">\r\n							\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\" width=\"580\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n										\r\n											<tr>\r\n												<td>\r\n													<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n											\r\n														<tr><td height=\"100\"></td></tr>\r\n														\r\n														<tr>\r\n															<td align=\"center\" style=\"font-size:2em;color:#e50108;font-family:Adobe Garamond Pro,serif;line-height:1.3em;text-transform:capitalize;\">The Magic of christmas never ends</td>\r\n														</tr>\r\n														\r\n														<tr>\r\n															<td align=\"center\" style=\"font-size:2em;color:#e50108;font-family:Adobe Garamond Pro,serif;line-height:1.3em;text-transform:capitalize;\">and the greatest of gifts is family and friends.</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\"></td></tr>\r\n														\r\n														<tr>\r\n															<td>\r\n																<table border=\"0\" class=\"logo-bottom\" width=\"470\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	\r\n																	<tr>\r\n																		<td align=\"center\" style=\"font-size:1.1em;color:#999;font-family:Cambria,serif;line-height:1.8em;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</td>\r\n																	</tr>\r\n																	\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"40\"></td></tr>\r\n														\r\n														<tr>\r\n															<td align=\"center\" class=\"gifts\"><img src=\"images/8.jpg\" alt=\" \" width=\"300\" height=\"200\" /></td>\r\n														</tr>\r\n														\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				<!-- //banner -->\r\n				\r\n				<!-- banner-bottom -->\r\n					<tr bgcolor=\"#fff\">\r\n						<td>\r\n							<table border=\"0\"  width=\"700\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								\r\n								<tr><td height=\"50\"></td></tr>\r\n								\r\n								<tr>\r\n									<td style=\"font-size:3em;color:#e50108;font-family:Adobe Garamond Pro,serif\" align=\"center\">\r\n										Christmas Special\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td style=\"font-size:1em;color:#999;text-align:center;font-family: Cambria,serif;line-height:1.8em\">\r\n									\r\n										<table border=\"0\"  width=\"500\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"dummy_text\">\r\n										\r\n											<tr>\r\n												<td>\r\n													Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.\r\n												</td>\r\n											</tr>\r\n										\r\n										</table>\r\n										\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"50\"></td></tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale 2-grids\">\r\n											\r\n											<tr>\r\n												<td>\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale image1\" width=\"340\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\"><a href=\"#\"><img src=\"images/1.jpg\" width=\"340\" height=\"250\" /></a></td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n														<tr>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														\r\n													</table>\r\n\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale image1\" width=\"340\" height=\"250\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\" style=\"font-size:2.5em;padding:0 1em; color:#9F9FA3;font-family: Adobe Garamond Pro,serif;text-align:center;line-height:1.5em;border:3px double #E7E7E7\">\r\n																Join Us to Celebrate <span style=\"color:#e50108;\">Merry Christmas.</span>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n										\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n											<tr>\r\n												<td height=\"3\"></td>\r\n											</tr>\r\n											\r\n										</table>\r\n										\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale 2-grids\">\r\n											\r\n											<tr>\r\n												<td>\r\n												\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale image1\" width=\"340\" height=\"250\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\" style=\"font-size:2em;padding:0 1em; color:#9F9FA3;font-family: Adobe Garamond Pro,serif;text-align:center;line-height:1.5em;border:3px double #E7E7E7\">\r\n																The beauty of <span style=\"color:#e50108;font-size:1.5em;\">christmas</span> is not in the presents but in <span style=\"color:#e41013;font-size:1.5em;\">his presence</span>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n														<tr>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale image1\" width=\"340\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\"><a href=\"#\"><img src=\"images/2.jpg\" width=\"340\" height=\"250\" style=\"display: block;\"></a></td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n										\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n											<tr>\r\n												<td height=\"6\"></td>\r\n											</tr>\r\n											\r\n										</table>\r\n										\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\">\r\n											\r\n											<tr>\r\n												<td>\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"230\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\"><a href=\"#\"><img src=\"images/4.jpg\" width=\"230\" height=\"160\" style=\"display: block;\"></a></td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n														<tr>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														\r\n													</table>\r\n\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"215\" height=\"160\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\" style=\"font-size:1.5em;border:3px double #E7E7E7;color:#9F9FA3;font-family: Adobe Garamond Pro,serif;text-align:center;line-height:1.5em;padding:0 .5em;\">\r\n																<span style=\"color:#e50108;\">Christmas</span> is the spirit of giving without a thought of getting.\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"5\">\r\n													\r\n														<tr>\r\n															<td>&nbsp;</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"230\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\"><a href=\"#\"><img src=\"images/5.jpg\" width=\"230\" height=\"160\" style=\"display: block;\"></a></td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n										\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"80\"></td></tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				<!-- //banner-bottom -->\r\n				\r\n				<!-- flowers-fishes -->\r\n					<tr bgcolor=\"#fff\">\r\n						<td>\r\n							<table border=\"0\"  width=\"700\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								\r\n								\r\n								\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\"  width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"may\">\r\n											<tr>\r\n												<td style=\"text-align:center;color:#999;font-size:1.2em;font-family: Cambria,serif;font-style:italic;letter-spacing:1px;\">\r\n												<span style=\"font-size:1.5em;color:#e50108;\">May</span> your <span style=\"color:#5bb34c;\">Christmas</span> and every day ahead sparkle with happiness and new surprises.</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\"  width=\"800\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"may\">\r\n											<tr>\r\n												<td style=\"text-align:center;color:#e50108;font-size:2em;font-family: Adobe Garamond Pro,serif;\">We wish <i style=\"font-style:normal;color:#e41013;font-size:1.2em;\">you </i>a <span style=\"font-size:1.5em;color:#84b71a;\">Merry Christmas</span></td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"30\"></td></tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table class=\"flowers\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n															\r\n											<tr>\r\n												<td>\r\n													\r\n													<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale\" width=\"200\">\r\n														\r\n														<tr>\r\n															<td class=\"scale-center-both\"><a href=\"#\"><img src=\"images/6.jpg\" width=\"200\" height=\"180\" style=\"display: block;\"></a></td>\r\n														</tr>\r\n														\r\n													</table>\r\n														\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"50\"></td></tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				<!-- //flowers-fishes -->\r\n				<!-- contact -->\r\n					<tr bgcolor=\"181818\">\r\n						<td>\r\n							<table class=\"container-middle\" width=\"700\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				\r\n\r\n								<tr>\r\n									<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n\r\n								<tr>\r\n									<td>\r\n\r\n										<table class=\"twelve\" width=\"400\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n											<tr>\r\n												<td align=\"center\" style=\"line-height: 0px;\">\r\n												   \r\n													<table class=\"twelve\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n												   \r\n														<tr>\r\n															<td height=\"4\"></td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td align=\"center\" style=\"font-family: Adobe Garamond Pro,serif; font-size:1.5em; color:#FFFFFF; display:block;\"> \r\n																Christmas Celebrations\r\n															</td>\r\n														</tr>\r\n											\r\n													</table>\r\n\r\n												</td>\r\n											</tr>    \r\n\r\n											<tr>\r\n												<td height=\"30\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td>\r\n													\r\n													<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"scale map\" width=\"100%\" height=\"200\">\r\n															\r\n														<tr>\r\n															<td>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/14.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/10.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/11.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr>\r\n															<td>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/12.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/13.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n																<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"133\" height=\"auto\">\r\n																\r\n																	<tr>\r\n																		<td><img src=\"images/9.jpg\" alt=\" \" width=\"133\" height=\"auto\" /></td>\r\n																	</tr>\r\n																\r\n																</table>\r\n																\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n												</td>\r\n											</tr>\r\n\r\n										</table>\r\n\r\n										<!-- SPACE -->\r\n										<table class=\"twelve\" width=\"50\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n											<tr>\r\n												<td width=\"50\" height=\"40\" style=\"font-size: 40px; line-height: 40px;\"></td>\r\n											</tr>\r\n\r\n										</table>\r\n										<!-- END SPACE -->\r\n\r\n										<table class=\"twelve twelve-sub\" width=\"250\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n										\r\n											<tr>\r\n												<td>\r\n												\r\n													<table class=\"twelve1\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n														<tr>\r\n															<td style=\"font-family: Adobe Garamond Pro,serif; font-size:1.5em; color:#FFFFFF;\">\r\n																<!-- Edit Title-->\r\n																Contact Us\r\n\r\n															</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Cambria,serif; font-size: 1em; color: #ffffff; line-height:2em;\">\r\n																<!-- Edit Text -->\r\n																Address :\r\n\r\n															</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Cambria,serif; font-size: 1em; color: #999999; line-height:2em;\">\r\n																<!-- Edit Text -->\r\n																75/4 Square Avenue, New York,\r\n\r\n															</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Cambria,serif; font-size: 1em; color: #999999; line-height:2em;\">\r\n																<!-- Edit Text -->\r\n																America\r\n\r\n															</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Cambria,serif; font-size: 1em; color: #ffffff; line-height:2em;\">\r\n																<!-- Edit Text -->\r\n																Email :\r\n\r\n															</td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Cambria,serif; font-size: 1em; color: #999999;line-height:2em;\">\r\n																<a href=\"mailto:info@example.com\" style=\"color: #999999;text-decoration:none;\">\r\n																<!-- Edit Text -->\r\n																info@example.com\r\n\r\n															</a></td>\r\n														</tr>\r\n														\r\n														<tr>\r\n															<td height=\"10\"></td>\r\n														</tr>\r\n														\r\n														<tr>\r\n															<td>\r\n															\r\n																<table border=\"0\" align=\"left\"  cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tr>\r\n																		<td>\r\n																			<table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n																			\r\n																				<tr>\r\n																					<td height=\"10\"></td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/1.png\" alt=\"\" border=\"0\" height=\"30\" width=\"30\"></a></td>\r\n																					<td>&nbsp;&nbsp;</td>\r\n																					<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/2.png\" alt=\"\" border=\"0\" height=\"30\" width=\"30\"></a></td>\r\n																					<td>&nbsp;&nbsp;</td>\r\n																					<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/3.png\" alt=\"\" border=\"0\" height=\"30\" width=\"30\"></a></td>\r\n																					<td>&nbsp;&nbsp;</td>\r\n																					<td><a href=\"#\" style=\"display:block; border:0;\"><img src=\"images/4.png\" alt=\"\" border=\"0\" height=\"30\" width=\"30\"></a></td>\r\n																				</tr>\r\n																				\r\n																			</table>\r\n																		</td>\r\n																	</tr>\r\n																</table>\r\n															\r\n															</td>\r\n														</tr>\r\n											\r\n													</table>\r\n												\r\n												</td>\r\n											</tr>\r\n\r\n										</table>\r\n\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td height=\"40\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n\r\n							</table>\r\n						</td>\r\n					</tr>\r\n				<!-- //contact -->\r\n				\r\n				<!-- footer -->\r\n					<tr bgcolor=\"e50108\">\r\n						\r\n						<td>\r\n							<table class=\"container-middle\" width=\"700\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n				\r\n								<tr>\r\n									<td height=\"20\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										\r\n										<table class=\"footer\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											\r\n											<tr>\r\n												<td style=\"color:#000;font-size:1.1em;font-family: Adobe Garamond Pro,serif;line-height:2em;\">\r\n													Your are receiving this email because your subscribed to our mailing list.\r\n												</td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td style=\"color:#000;font-size:1.1em;font-family: Adobe Garamond Pro,serif;;line-height:2em;\">\r\n													<a href=\"#\" style=\"color:#fff;text-decoration:none;\">Click here </a>to unsubscribe your email address from this list.\r\n												</td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td style=\"color:#000;font-size:1.1em;font-family: Adobe Garamond Pro,serif;\">\r\n													&copy 2015 Merry Christmas. All rights reserved | Design by <a href=\"http://onyxdatasystems.com\" style=\"text-decoration:none;color:#fff;\">OnyxDS</a>\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td height=\"20\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n						\r\n					</tr>\r\n				<!-- //footer -->\r\n				\r\n				</table>\r\n            </td>\r\n        </tr>\r\n		\r\n		<tr><td height=\"35\"></td></tr>\r\n	</table>\r\n</body>\r\n</html>', '2016-07-03 22:35:55');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(4, 'product', 'product', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Product a Newsletter Template | OnyxDS</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Happy New year Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n	<!--style-->\r\n		<style type=\"text/css\">\r\n			body{\r\n			width:100%;\r\n			background:#c0c0c0;\r\n			margin:0;\r\n			padding:0;\r\n			}\r\n			table{\r\n            font-size: 14px;\r\n            border: 0;\r\n			}\r\n			@media only screen and (max-width: 800px){\r\n			.container {width: 754px !important;}\r\n			}\r\n			@media only screen and (max-width: 768px){\r\n			.container {width: 700px !important;}\r\n			.middle-container {width: 620px;}\r\n			.trends { width: 189px;}\r\n			.gallery {width: 176px;}\r\n			}\r\n			@media only screen and (max-width: 640px){\r\n			.container {width: 580px !important;}\r\n			.middle-container {width: 500px;}\r\n			.banner {height: 160px;}\r\n			.log {font-size: .85em;}\r\n			.social {height: 5px;}\r\n			.banner-text {font-size: 3em !important;}\r\n			.season {font-size: 2em !important;}\r\n			.trends { width: 160px;}\r\n			.member{width:10px}\r\n			.gallery {width: 146px;}\r\n			.member1 {width: 30px;}\r\n			}\r\n			@media only screen and (max-width: 480px){\r\n			.container {width: 400px !important;}\r\n			.middle-container {width: 355px;}\r\n			.log {font-size: .65em;}\r\n			.banner {height: 100px;}\r\n			.banner1 {height: 80px;}\r\n			.banner-text {font-size: 2.5em !important;}\r\n			.season {font-size: 1.8em !important;}\r\n			.trends {width: 355px; font-size: .965em;}\r\n			.gallery {width: 350px;}\r\n			.trend { margin: 2em 0;}\r\n			.social {height: 1px;}\r\n			.banner1 {height: 70px;}\r\n			}\r\n			@media only screen and (max-width: 320px){\r\n			.container {width: 295px !important;}\r\n			.middle-container {width: 276px;}\r\n			.banner {height: 66px;}\r\n			.gallery {width: 273px;}\r\n			.trends {width: 278px;}\r\n			.banner-text {font-size: 2em !important;}\r\n			.season {font-size: 1.6em !important;}\r\n			.season1 {font-size: 1.2em !important;}\r\n			.banner1 {height: 45px;}\r\n			.top-head {height: 3px;}\r\n			.top {height: 30px;}\r\n			.trend {  margin: 1em 0;}\r\n			}\r\n			\r\n		</style>\r\n	<!--style-->\r\n</head>\r\n<body>\r\n	<table width=\"100%\">\r\n		<tbody>\r\n			<tr>\r\n				<td height=\"40\" class=\"top\"></td>\r\n			</tr>\r\n				<!---header--->\r\n			<tr>\r\n				<td>\r\n					<table width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"#fff\" class=\"container\">\r\n						<tbody>\r\n						<tr>\r\n							<td>\r\n								<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:url(images/1.jpg); background-size:cover;\"  class=\"main-img\">	\r\n									<tbody>\r\n										<tr>\r\n											<td>\r\n												<table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"middle-container\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"20\" class=\"top-head\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n															<!--log -->\r\n																<table align=\"left\" class=\"log\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td>\r\n																				<a href=\"#\" style=\"text-decoration:none;font-size:3em; text-transform:capitalize;color:#fff;font-family:Candara; font-weight:bold;text-transform:capitalize\">Product</a>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n																<!--log -->\r\n																<!-- social-icons -->\r\n																<table align=\"right\">\r\n																	<tbody>\r\n																	<tr>\r\n																		<td height=\"10\" class=\"social\"></td>\r\n																	</tr>\r\n																		<tr>\r\n																			<td>\r\n																				<a href=\"#\" ><img src=\"images/i1.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																			</td>\r\n																			<td>\r\n																				<a href=\"#\" ><img src=\"images/i2.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																			</td>\r\n																			<td>\r\n																				<a href=\"#\" ><img src=\"images/i3.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n																<!-- social-icons -->\r\n															</td>\r\n														</tr>\r\n														<!--banner-center-->\r\n														<tr>\r\n															<td height=\"220\" class=\"banner\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"text-align:center; font-size:3.5em;font-family:Candara; color:#fff; font-weight:bold\" class=\"banner-text\">\r\n																Happy New Year\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"100\" class=\"banner1\"></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								<!---header--->\r\n								<!--banner-bottom-->\r\n									<tr>\r\n										<td>\r\n										<table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"middle-container\">\r\n										<tbody>\r\n											<tr>\r\n												<td height=\"30\"></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"font-size:2.5em; text-decoration:none; color:#636363; font-family:Candara;text-align:center; font-weight:bold\" class=\"season\">\r\n													New Year Season Arrivals\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td height=\"20\"></td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"font-size:1.3em; text-decoration:none; color:#C4C4C4; font-family:Candara;text-align:center; text-transform:none\" class=\"season1\">\r\n												Check out all the  new trends\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n											<td height=\"30\"></td>\r\n											</tr>\r\n											<!--trends-->\r\n											<tr>\r\n												<td>\r\n													<table align=\"left\"  width=\"215\" style=\"text-align:center\" class=\"trends\">\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/p1.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:1.2em;color:#636363;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																Branded shirts \r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:.9em;color:#C4C4C4;font-family:Candara;line-height:.5em\">\r\n																Men & Women\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\" style=\"text-align:center;font-size:1em; text-transform:capitalize; text-decoration:none; padding:.8em 1.5em;  background-color:#ACC700;color:#fff;font-family: Candara;letter-spacing:1px;font-weight: bold\" class=\"button\">shop now</a>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													<table align=\"left\" class=\"member\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"20\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n													<table align=\"left\" width=\"215\" style=\"text-align:center\" class=\"trends trend\">\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/p2.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:1.2em;color:#636363;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																Branded jackets\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:.9em;color:#C4C4C4;font-family:Candara;line-height:.5em\">\r\n																Men & Women\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\" ></td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\" style=\"text-align:center;font-size:1em; text-transform:capitalize; text-decoration:none; padding:.8em 1.5em;  background-color:#ACC700;color:#fff;font-family: Candara;letter-spacing:1px;font-weight: bold\" class=\"button\">shop now</a>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													<table align=\"left\" class=\"member\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"20\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n													<table align=\"left\" width=\"215\" style=\"text-align:center\" class=\"trends\">\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/p3.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:1.2em;color:#636363;font-family: Candara;line-height:2em;font-weight:bold\">\r\n																Branded bags\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td style=\"font-size:.9em;color:#C4C4C4;font-family:Candara;line-height:.5em\">\r\n																Men & Women\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"20\"></td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\" style=\"text-align:center;font-size:1em; text-transform:capitalize; text-decoration:none; padding:.8em 1.5em;  background-color:#ACC700;color:#fff;font-family: Candara;letter-spacing:1px;font-weight:bold\" class=\"button\">shop now</a>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											<!--trends-->\r\n										</tbody>\r\n										</table>\r\n										</td>\r\n									</tr>\r\n								<!--banner-bottom-->\r\n								<!--gallery-->\r\n									<tr>\r\n										<td height=\"70\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td>\r\n											<table width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"middle-container\">\r\n												<tbody>\r\n													<tr>\r\n														<td>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p5.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">T-Shirt</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em; font-weight:bold\">\r\n																	$94\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery trend\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p6.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">T-Shirt Women</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$100\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p7.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Sweetheart Corset</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$96\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"40\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p8.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Sweatshirt</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$85\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery trend\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p9.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Hoodies</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$94\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p10.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Shirt</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$94\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"40\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p11.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Hand Bag</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$85\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery trend\" >\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p12.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Phone</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$94\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" class=\"member1\">\r\n															<tbody>\r\n																<tr>\r\n																<td width=\"40\"></td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														<table align=\"left\" width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"gallery\">\r\n															<tbody>\r\n																<tr>\r\n																<td>\r\n																	<a href=\"#\"><img src=\"images/p13.jpg\" width=\"100%\" style=\"border:1px solid#C4C4C4\"></a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.2em; text-align:center\">\r\n																	<a href=\"#\" style=\"color:#636363;font-family:Candara;line-height:2em;font-weight:bold;text-decoration:none\">Watch</a>\r\n																</td>\r\n																</tr>\r\n																<tr>\r\n																<td style=\"font-size:1.5em; text-align:center; color:#ACC700;font-family:Candara;line-height:2em;font-weight:bold\">\r\n																	$94\r\n																</td>\r\n																</tr>\r\n															</tbody>\r\n														</table>\r\n														</td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"70\"></td>\r\n									</tr>\r\n								<!--gallery-->\r\n								<!--footer-->\r\n									<tr>\r\n										<td>\r\n											<table width=\"800\"  align=\"center\" bgcolor=\"#e7e7e7\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"container\" >\r\n												<tbody>\r\n												<tr>\r\n													<td height=\"30\"></td>\r\n												</tr>\r\n													<tr>\r\n														<td style=\"color: #696868; font-size: 1em;font-family: Candara; text-align:center; font-weight: normal; line-height: 2em; vertical-align:top;\">\r\n															You are receiving this email because your email is subscribed to our mailing list. \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td style=\"color: #696868; font-size: 1em;font-family: Candara; text-align:center; font-weight: normal; line-height: 2em; vertical-align:top;\">\r\n															<a href=\"#\" style=\"color:#314c67; text-decoration:none;font-weight: 600;font-family: Candara;\">Click here</a> to unsubscribe your email address from this list.  \r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td style=\"color: #696868; font-size: 1em;font-family: Candara; text-align:center; font-weight: normal; line-height: 2em; vertical-align:top;\">\r\n															© 2015 Product. All rights reserved | Design by <a href=\"http://onyxdatasystems.com/\" style=\"color:#ec3003; font-size: 1em; text-decoration:none;\">Onyx DS</a>\r\n														</td>\r\n													</tr>\r\n													<tr>\r\n														<td height=\"20\"></td>\r\n													</tr>\r\n													<tr>\r\n														<td>		\r\n															<table align=\"center\" bgcolor=\"#e7e7e7\">\r\n																<tbody>\r\n																	<tr>\r\n																		<td>\r\n																			<a href=\"#\" ><img src=\"images/i1.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																		</td>\r\n																		<td>\r\n																			<a href=\"#\" ><img src=\"images/i2.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																		</td>\r\n																		<td>\r\n																			<a href=\"#\" ><img src=\"images/i3.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																		</td>\r\n																		<td>\r\n																			<a href=\"#\" ><img src=\"images/i4.png\" width=\"29\" height=\"29\" alt=\"\"></a>\r\n																		</td>\r\n																	</tr>\r\n																</tbody>\r\n															</table>\r\n														</td>\r\n													</tr>	\r\n													<tr>\r\n														<td height=\"30\" bgcolor=\"#e7e7e7\"></td>\r\n													</tr>\r\n												</tbody>\r\n											</table>\r\n										</td>\r\n									</tr>\r\n								<!--footer-->\r\n								</td>\r\n							</tr>\r\n						</tbody>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td height=\"40\"></td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</body>\r\n</html>', '2016-07-03 22:35:55');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(5, 'Our Nation', 'ournation', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Our Nation a Newsletter Template | OnyxDS</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Happy New year Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n	<!--style-->\r\n		<style type=\"text/css\">\r\n		table.container {\r\n	box-shadow: 0 0 0.6em #ccc;\r\n    -webkit-box-shadow: 0 0 0.6em #ccc;\r\n    -o-box-shadow: 0 0 0.6em #ccc;\r\n    -moz-box-shadow: 0 0 0.6em #ccc;\r\n    -ms-box-shadow: 0 0 0.6em #ccc;\r\n}\r\n			body{\r\n			width:100%;\r\n			background-image:url(\'images/bg.png\');\r\n			background-repeat:repeat;\r\n			margin:0;\r\n			padding:0;\r\n			}\r\n			table{\r\n            font-size: 14px;\r\n            border: 0;\r\n        }\r\n		@media only screen and (max-width: 800px){\r\n		.container{ width: 754px !important;}\r\n		}\r\n		@media only screen and (max-width: 768px){\r\n			\r\n            /*------ top header ------ */\r\n			.header-top {width: 700px;}\r\n            .header-bg{width: 440px !important; height: 10px !important;}\r\n            .main-header{line-height: 28px !important;}\r\n           \r\n            \r\n            /*----- --features ---------*/\r\n            .feature-middle{width: 400px !important; text-align: center !important;}\r\n            .feature-img{height: 437px !important;}\r\n			.about-left {width: 275px;}\r\n			.about-right {width: 289px;}\r\n            .container{ width: 654px !important;}\r\n             .container-middle{width: 590px !important;}\r\n            \r\n			.member {width: 13px;}table.main-img {\r\n    height: 400px;\r\n}\r\n        }\r\n		@media only screen and (max-width: 640px){\r\n			.logo {font-size: 0.85em;}\r\n			.container{ width: 530px !important}\r\n			.main-img {    width: 100% !important;\r\n    height: 380px !important;}\r\n			.container-middle {width: 500px !important}\r\n			.about-left {width: 225px;}\r\n			.about-right {width: 226px; font-size: 0.98em;}\r\n			.mainContent {width: 550px; font-size: 0.98em;}\r\n			.feature {height: 136px;\r\n    width: 200px;}\r\n			table.news-info {\r\n    width: 210px;\r\n}\r\ntable.news-image {\r\n    width: 282px;\r\n}\r\na.logo {\r\n    font-size: 3em!important;\r\n}\r\ntable.footer {\r\n    width: 500px;\r\n}\r\n		}\r\n		@media only screen and (max-width: 480px){\r\n		.logo {font-size: 0.85em;  margin-top: .5em}\r\n		.container-middle {width: 390px !important;}\r\n		.about-right {width: 299px}\r\n		.main-img {width: 450px !important;height: 259px !important;}\r\n		.feature1 { width: 300px;}\r\n		.container {width: 400px !important;}\r\n		.feature {\r\n				height: 185px;\r\n				width: 417px;\r\n				text-align: Center;\r\n			}\r\n					.gallery2 {margin: 2em 0;}\r\n					.fet {margin-top: 2em;}\r\n					.wel {font-size: 2em !important;}\r\n					.top-header-left {font-size: 0.94em;}\r\n					table.banner-bottom-text {\r\n				width: 420px;\r\n			}\r\n			.mainContent {\r\n				width: 420px;\r\n			}\r\n			table.footer {\r\n				width: 420px;\r\n			}\r\n			td.main-subheader {\r\n				text-align: Center!important;\r\n				margin-top:20px;\r\n			}\r\n			table.news-info {\r\n				width: 100%;\r\n			}\r\n			table.news-image {\r\n				width: 100%;\r\n			}\r\n		}\r\n		@media only screen and (max-width: 375px){\r\n		.container {\r\n			width: 350px !important;\r\n		}\r\n			table.banner-bottom-text {\r\n		width: 350px;\r\n	}\r\n	.mainContent {\r\n    width: 350px;\r\n	}\r\n	table.footer {\r\n		width: 350px;\r\n	}\r\n	.container-middle {\r\n		width: 250px !important;\r\n	}\r\n		}\r\n		@media only screen and (max-width: 320px){\r\n		.logo {font-size: 0.85em; width: 100%; text-align: center;}\r\n		.container {width: 296px !important;}\r\n		.main-img {width: 297px !important;height: 198px !important;}\r\n		.container-middle {width: 265px !important;}\r\n		.feature {height: 185px;width: 266px;}\r\n		.feature1 {width: 265px;}\r\n		.about-right {width: 260px;}\r\n		.gallery1 {width: 279px;height: 137px;}\r\n		.galry1 {height: 150px;}\r\n		.nav {width: 100%;text-align: center;}\r\n		.top {height: 20px;}\r\n		.container {\r\n			width: 350px !important;\r\n		}\r\n			table.banner-bottom-text {\r\n		width: 350px;\r\n	}\r\n	.mainContent {\r\n    width: 350px;\r\n	}\r\n	table.footer {\r\n		width: 350px;\r\n	}\r\n	.container-middle {\r\n		width: 250px !important;\r\n	}\r\n	a.logo {\r\n    font-size: 2.5em!important;\r\n}\r\ntable.banner-bottom-text {\r\n    width: 280px;\r\n}\r\n.mainContent {\r\n    width: 280px;\r\n}\r\ntable.footer {\r\n    width: 280px;\r\n}\r\n.container {\r\n    width: 050px !important;\r\n}\r\ntable.social-icons {\r\n    text-align: center;\r\n    width: 69%;\r\n}\r\n		}\r\n			\r\n		</style>\r\n	<!--style-->\r\n</head>\r\n<body>\r\n<table>\r\n			<tr>\r\n				<td height=\"40\" class=\"top\"></td>\r\n			</tr>\r\n			</table>\r\n	<table width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container\">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<table width=\"800\"  align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container\">\r\n						<tbody>\r\n						<!-- Header -->\r\n					<tr bgcolor=\"ffffff\">\r\n						<td>\r\n							<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\" width=\"650\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n											\r\n											<tr><td height=\"22\"></td></tr>\r\n											\r\n												<tr class=\"top-header-left\">\r\n													<td align=\"center\">\r\n													<a class=\"logo\" href=\"#\" style=\"font-size:3.5em;color: #69B922;text-decoration:none;font-family:Century Gothic;font-weight:216; letter-spacing:2px;\">Our <span style=\"color:#F08A01;\">Nation</span></a>\r\n\r\n													</td>\r\n												</tr>\r\n										\r\n										</table>\r\n									</td>\r\n									<tr><td height=\"20\"></td></tr>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n\r\n                	<!-- end header -->\r\n												 <!-- Start Menu List -->\r\n			<tr>\r\n				<td  width=\"600\" style=\"text-align:center;\">\r\n				    <table style=\"border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n												  \r\n					<tr bgcolor=\"#1abbfe\">\r\n	                	<td>\r\n	                		<table border=\"0\" width=\"600\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n							\r\n								<tbody><tr>\r\n									<td>\r\n										<table class=\"menu\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											\r\n											<tbody><tr>                \r\n\r\n											  <td align=\"center\" style=\"text-align:left; font-size:15px; font-family:Maven Pro; font-weight:500; color: #ffffff; \" class=\"menu\" height=\"48\">\r\n												\r\n												<a href=\"#\" style=\"text-align:center; font-size:15px; font-family: Candara; font-weight:500; color: #ffffff; text-decoration:none;letter-spacing:1px;\">Home</a>\r\n												<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n												<a href=\"#\" style=\"text-align:center; font-size:15px; font-family: Candara; font-weight:500; color: #ffffff; text-decoration:none;letter-spacing:1px;\">Speech</a>\r\n												<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n												<a href=\"#\" style=\"text-align:center; font-size:15px; font-family: Candara; font-weight:500; color: #ffffff; text-decoration:none;letter-spacing:1px;\">About</a>\r\n												<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n												<a href=\"#\" style=\"text-align:center; font-size:15px; font-family: Candara; font-weight:500; color: #ffffff; text-decoration:none;letter-spacing:1px;\">News</a>\r\n												<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n												<a href=\"#\" style=\"text-align:center; font-size:15px; font-family: Candara; font-weight:500; color: #ffffff; text-decoration:none;letter-spacing:1px;\">Contact</a>\r\n											   \r\n											  </td>\r\n											  \r\n											</tr>\r\n									  \r\n										</tbody></table>\r\n									</td>\r\n								</tr>\r\n													\r\n							</tbody></table>\r\n						</td>\r\n					</tr>\r\n													\r\n												</table>\r\n											  </td>\r\n											</tr>\r\n                    <!-- End Menu List -->\r\n							<!--banner-->\r\n\r\n							<tr>\r\n								<td>\r\n									<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:url(images/main.jpg); background-size: 100% 100%;\" height=\"500\" class=\"main-img\">	\r\n<tbody><tr>\r\n<td> </td>\r\n</tr>\r\n</tbody></table>\r\n								</td>\r\n							</tr>\r\n							\r\n							<!--//banner-->\r\n\r\n							<!--banner-bottom-->\r\n                	<tr>\r\n						<tr><td style=\"background-color:#FFF\" height=\"40\"></td></tr>\r\n	    				<td bgcolor=\"ffffff\">\r\n	    					<table width=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mainContent\">\r\n	    						<tr>	\r\n	    							<td align=\"center\" style=\"color: #E6842D; font-size: 2.5em; font-family: \'Century Gothic\';\">\r\n	                					Republic Day\r\n	                				</td>\r\n	                			</tr>\r\n	                			<tr>\r\n									<td height=\"8\"></td>\r\n								</tr>\r\n								<tr>	\r\n	    							<td align=\"center\" style=\"color: #69B922; font-size: 1.5em; font-family:Palatino Linotype;letter-spacing: 5px;\" class=\"title-text\">\r\n	                					Speech\r\n	                				</td>\r\n	                			</tr>\r\n								<tr>\r\n									<td height=\"15\"></td>\r\n								</tr>\r\n	                			<tr>\r\n									<td>\r\n										<table width=\"600\" align=\"center\" class=\"banner-bottom-text\">\r\n											<tr>\r\n												<td style=\"color: #655d35; font-size: 1.15em;font-family: Candara;text-align:center;line-height:2em;\">\r\n													Republic day celebration is a huge national event celebration in India especially for students in the schools, colleges and other educational institutions. Variety of activities are run by the teachers to enhance student’s skill and knowledge about Republic day of India. Speech recitation and group discussion are some of the most important activities on Republic Day of India.\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n	    						</tr>\r\n								<tr>\r\n									<td height=\"20\"></td>\r\n								</tr>\r\n								<tr>\r\n									<td align=\"center\" valign=\"top\">\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tbody><tr>\r\n												<td align=\"center\" style=\"font-size: 1.2em; color: #FB8A2E; font-weight: normal; text-align: center; font-family:Century Gothic;\">\r\n													<a href=\"#\" style=\"color:#FB8A2E;text-decoration:none;letter-spacing:1px;\">More Info...</a>\r\n												</td>\r\n											</tr>\r\n										</tbody></table>\r\n									</td>\r\n								</tr>\r\n	    					</table>\r\n	    				</td>\r\n						<tr><td style=\"background-color:#FFF\" height=\"40\"></td></tr>\r\n    				</tr>\r\n					<!--//banner-bottom-->\r\n					<!-- about -->\r\n						<tr bgcolor=\"1abbfe\"><td height=\"40\"></td></tr>\r\n						<td bgcolor=\"1abbfe\">\r\n							<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"mainContent\" bgcolor=\"1abbfe\">\r\n								<tbody>\r\n									<tr>\r\n										<td align=\"center\" style=\"color: #fff; font-size: 2.5em; font-family: \'Century Gothic\';\">\r\n	                					About\r\n	                				</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td mc:edit=\"text1\" class=\"main-subheader\" style=\"color: #fff; font-size: 1.1em;font-family: Candara;text-align:center;line-height:2em;\">\r\n											Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n						<tr><td bgcolor=\"1abbfe\" height=\"20\"></td></tr>\r\n						<tr bgcolor=\"1abbfe\">\r\n							<td>\r\n								<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container-middle\" bgcolor=\"1abbfe\">\r\n									<tbody>\r\n										<tr>\r\n											<td>\r\n												<table width=\"250\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"feature mainContent\" bgcolor=\"1abbfe\">\r\n													<tbody>\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/about.jpg\" alt=\"\" width=\"270\" height=\"200\" />\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												<table width=\"300\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" class=\"feature\" bgcolor=\"1abbfe\" style=\"vertical-align:top;\">\r\n													<td mc:edit=\"text1\" class=\"main-subheader\" style=\"text-align:left; font-weight: normal; color: #fff; font-size: 1.1em;font-family: Candara;line-height:2em; vertical-align:top;\">\r\n																Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.\r\n																<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"20\"></td>\r\n																		</tr>\r\n																		<tr>\r\n																			<td align=\"center\" valign=\"top\">\r\n																				<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																					<tbody><tr>\r\n																						<td align=\"center\" style=\"font-size: 1.2em; color: #FB8A2E; font-weight: normal; text-align: center; font-family:Century Gothic;\">\r\n																							<a href=\"#\" style=\"color:#FFF;text-decoration:none;letter-spacing:1px;\">More Info...</a>\r\n																						</td>\r\n																					</tr>\r\n																				</tbody></table>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr bgcolor=\"1abbfe\"><td height=\"40\"></td></tr>\r\n						<tr bgcolor=\"1abbfe\"><td height=\"20\"></td></tr>\r\n						<!-- //about -->\r\n						<!--news-->\r\n						<tr>\r\n						<tr><td bgcolor=\"#fff\" height=\"20\"></td></tr>\r\n							<tr><td bgcolor=\"#fff\" height=\"40\"></td></tr>\r\n								<td bgcolor=\"#fff\">\r\n										<table width=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mainContent\">\r\n											<tbody>\r\n												<tr>	\r\n													<td align=\"center\" mc:edit=\"title1\" class=\"main-header\" style=\"color: #E6842D; font-size: 2.5em; font-family: \'Century Gothic\';\">\r\n														News\r\n													</td>\r\n												</tr>\r\n												<tr>\r\n													<td height=\"30\"></td>\r\n												</tr>\r\n											</tbody>\r\n										</table>\r\n										<!--news-inner-->\r\n											<table border=\"0\" width=\"600\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n										<tr>\r\n												<td>\r\n												<table bgcolor=\"f1f1f1\" border=\"0\" width=\"220\" height=\"260\" align=\"left\"  class=\"news-info\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tr>\r\n															<td height=\"40\">\r\n															</td>\r\n														</tr>\r\n														<tr align=\"left\">\r\n															<td style=\"padding-left: 25px;color: #69B922;font-size: 2.1em;font-family: \'Century Gothic\';letter-spacing: 2px;\">\r\n																interested\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"new-text\" style=\"font-family:Arial; font-size:15px;color:#777;padding-left:1.5em;padding-right:1em;line-height:21px;\">\r\n																Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempo.\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\">\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													<table border=\"0\" width=\"8\" height=\"10\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td width=\"5\" height=\"10\" align=\"left\">\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													<table border=\"0\" width=\"370\" align=\"left\" class=\"news-image\" cellpadding=\"0\" cellspacing=\"0\">\r\n													\r\n														<tr style=\"background:url(images/n.jpg) no-repeat 0px 0px #E6842D; background-size:cover;\" height=\"260\">\r\n															<td style=\"color:#FFFFFF; font-size:1em; text-align:center; font-family:Lucida Sans; line-height:1.8em;\">\r\n															\r\n															</td>\r\n														</tr>\r\n														<tr><td height=\"8\"></td></tr>\r\n														\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n													<table border=\"0\" width=\"370\" align=\"left\" class=\"news-image\" cellpadding=\"0\" cellspacing=\"0\">\r\n													\r\n														<tr style=\"background:url(images/n1.jpg) no-repeat 0px 0px #E6842D; background-size:cover;\" height=\"260\">\r\n															<td style=\"color:#FFFFFF; font-size:1em; text-align:center; font-family:Lucida Sans; line-height:1.8em;\">\r\n															\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"8\"></td></tr>\r\n														\r\n													</table>\r\n													\r\n													<table border=\"0\" width=\"8\" height=\"10\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td width=\"5\" height=\"10\" align=\"left\">\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n													<table bgcolor=\"f1f1f1\" border=\"0\" width=\"220\" height=\"260\"  class=\"news-info\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tr>\r\n															<td height=\"40\">\r\n															</td>\r\n														</tr>\r\n														<tr align=\"left\">\r\n															<td style=\"padding-left: 25px;color: #69B922;font-size: 2.1em;font-family: \'Century Gothic\';letter-spacing: 2px;\">\r\n																perspiciatis\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"new-text\" style=\"font-family:Arial; font-size:15px;color:#777;padding-left:1.5em;padding-right:1em;line-height:21px;\">\r\n																Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempo.\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\">\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												\r\n												</td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td>\r\n												<table bgcolor=\"f1f1f1\" border=\"0\" width=\"220\" height=\"260\" class=\"news-info\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n													<tr>\r\n															<td height=\"40\">\r\n															</td>\r\n														</tr>\r\n														<tr align=\"left\">\r\n															<td style=\"padding-left: 25px;color: #69B922;font-size: 2.1em;font-family: \'Century Gothic\';letter-spacing: 2px;\">\r\n																accusamus\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td class=\"new-text\" style=\"font-family:Arial; font-size:15px;color:#777;padding-left:1.5em;padding-right:1em;line-height:21px;\">\r\n																Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempo.\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"60\">\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													<table border=\"0\" width=\"8\" height=\"10\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td width=\"5\" height=\"10\" align=\"left\">\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													<table border=\"0\" width=\"370\" align=\"left\" class=\"news-image\" cellpadding=\"0\" cellspacing=\"0\">\r\n													\r\n														<tr style=\"background:url(images/n2.jpg) no-repeat 0px 0px #E6842D; background-size:cover;\" height=\"260\">\r\n															<td style=\"color:#FFFFFF; font-size:1em; text-align:center; font-family:Lucida Sans; line-height:1.8em;\">\r\n															\r\n															</td>\r\n														</tr>\r\n														<tr><td height=\"8\"></td></tr>\r\n														\r\n													</table>\r\n												</td>\r\n											</tr>\r\n											<tr><td bgcolor=\"#fff\" height=\"20\"></td></tr>\r\n											\r\n										</table>\r\n										</td>\r\n							<tr><td bgcolor=\"#fff\" height=\"60\"></td></tr>\r\n						</tr>\r\n										<!--//news-->\r\n										\r\n	\r\n															<!--news-letter-->\r\n					<tr>\r\n						<td bgcolor=\"#0492CE\">\r\n							<table width=\"560\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"footer\">\r\n								<tr><td height=\"30\"></td></tr>\r\n								<tr> \r\n									<td>\r\n										<!--footer-logo -->\r\n										<table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"logo\">\r\n											<tr><td height=\"11\"></td></tr>\r\n											<tr>\r\n												<td>\r\n													<a href=\"#\" style=\"font-size:2.2em;color: #fff;text-decoration:none;font-family:Century Gothic;\">Our Nation </a>\r\n												</td>\r\n											</tr>\r\n										</table>\r\n										<!--footer-social-icons-->\r\n										<table border=\"0\" align=\"right\" class=\"social-icons\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr><td height=\"11\"></td></tr>\r\n											<tr>\r\n												<td>\r\n													<table border=\"0\">\r\n														<tbody>\r\n															<tr>\r\n																<td>\r\n																	<a href=\"#\" style=\"display:block;\">\r\n																		<img src=\"images/f1.png\" width=\"24\" height=\"24\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"2\">\r\n																</td>\r\n																<td>\r\n																	<a href=\"#\" style=\"display:block;\">\r\n																		<img src=\"images/f2.png\" width=\"24\" height=\"24\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n																<td width=\"2\">\r\n																</td>\r\n																<td>\r\n																	<a href=\"#\" style=\"display:block;\">\r\n																		<img src=\"images/f3.png\" width=\"24\" height=\"24\" alt=\"\">\r\n																	</a>\r\n																</td>\r\n															</tr>\r\n														</tbody>\r\n													</table>	\r\n												</td>\r\n											</tr>\r\n										</table><!--//social-icons-->\r\n									</td>\r\n								</tr>\r\n								<tr><td height=\"15\"></td></tr>\r\n								<tr>\r\n									<td align=\"center\" style=\"color: #000;font-size:1em;font-family: Candara;line-height:1.8em;\">You are currently signed up to OnyxDS’s newsletters as : <span style=\"color:#fff\"> support@onyxdatasystems.com .</span> We hope you like our newsletters. If you don\'t, simply <a href=\"#\" style=\"color:#000000;font-size: 1em; font-weight: 800;\">unsubscribe.</a></td>\r\n								</tr>\r\n								<tr><td height=\"30\"></td></tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!--//news-letter-->\r\n					<!--footer-->\r\n					<tr>\r\n						<td bgcolor=\"#1abbfe\">\r\n							<tr><td bgcolor=\"#1abbfe\" height=\"20\"></td></tr>\r\n							<tr>\r\n								<td style=\"font-family: Candara; font-size: 1em; color: #fff;text-align:center; line-height: 24px;background-color:#1abbfe;\" class=\"editable\">\r\n									© 2016 Our Nation . All Rights Reserved | Design by <a href=\"http://onyxdatasystems.com/\" style=\"color:#ec3003; font-size: 1em; text-decoration:none;\">Onyx DS</a>\r\n								</td>\r\n							</tr>\r\n							<tr><td bgcolor=\"#1abbfe\" height=\"20\"></td></tr>\r\n						</td>\r\n					</tr>\r\n					<!--footer-->\r\n										</tbody>	\r\n									</table>		\r\n								</td>\r\n		</tr>\r\n		</tbody>\r\n	</table>\r\n<table>\r\n			<tr>\r\n				<td height=\"40\" class=\"top\"></td>\r\n			</tr>\r\n			</table>\r\n			\r\n</body>\r\n</html>', '2016-08-31 09:54:24'),
(6, 'Democracy', 'democracy', 'Democracy', '<!-- Custom Theme files --><!-- //Custom Theme files -->\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><!--main-content-->\r\n			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:800px\"><!--header-->\r\n				<tbody>\r\n					<tr>\r\n						<td><!--header-->\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"height:85px; width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>wwww</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n										<tbody>\r\n											<tr>\r\n												<td><a href=\"#\">Democracy</a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<table align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"text-align:right\"><a href=\"#\">Home</a> &nbsp; &nbsp; <a href=\"#\">About</a> &nbsp; &nbsp; <a href=\"#\">Services</a> &nbsp; &nbsp; <a href=\"#\">Contact</a></td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<table>\r\n													<tbody>\r\n														<tr>\r\n															<td><a href=\"#\"><img src=\"templates/democracy/images/dr.png\" style=\"height:24px; width:24px\" /></a></td>\r\n															<td>&nbsp;</td>\r\n															<td><a href=\"#\"><img src=\"templates/democracy/images/fa.png\" style=\"height:24px; width:24px\" /></a></td>\r\n															<td>&nbsp;</td>\r\n															<td><a href=\"#\"><img src=\"templates/democracy/images/ga.png\" style=\"height:24px; width:24px\" /></a></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						<!--//header-->\r\n\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:650px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Republic Day</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus.</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td><a href=\"#\">Read More</a></td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<!--//about--><!--welcome-->\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:320px\">\r\n										<tbody>\r\n											<tr>\r\n												<td><img alt=\"\" src=\"templates/democracy/images/we.jpg\" style=\"height:150px; width:100%\" /></td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td><img alt=\"\" src=\"templates/democracy/images/we1.jpg\" style=\"height:150px; width:100%\" /></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<table align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"text-align:center\">Welcome</td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\"text-align:center\">Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<!--//welcome--><!--about-->\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td>Duis dictum lacinia</td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus. lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.Morbi in facilisis</td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td><a href=\"#\">Read More</a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<table align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td><img alt=\"\" src=\"templates/democracy/images/pi.jpg\" style=\"height:270px; width:100%\" /></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td><img alt=\"\" src=\"templates/democracy/images/pi1.jpg\" style=\"height:270px; width:100%\" /></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<table align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td>Duis dictum lacinia</td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td>Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus. lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.</td>\r\n											</tr>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td><a href=\"#\">Read More</a></td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<!--//about--><!--services--><!--content-middle-->\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\"text-align:right\">lobortis id augue vel, elementum</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n\r\n									<table align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:330px\">\r\n										<tbody>\r\n											<tr>\r\n												<td>lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim. lobortis id augue vel, elementum pretium lacus.</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						<!--content-middle--><!--content-bottom--></td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;</td>\r\n					</tr>\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:550px\">\r\n							<tbody>\r\n								<tr>\r\n									<td><img alt=\"\" src=\"templates/democracy/images/pc1.png\" style=\"height:80px\" /></td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Duis dictum lacinia</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Duis dictum lacinia turpis, non laoreet dolor commodo in. Curabitur lorem lectus, lobortis id augue vel, elementum pretium lacus.</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<!--//services--><!--footer strat here-->\r\n					<tr>\r\n						<td>\r\n						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:720px\">\r\n							<tbody>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Democracy</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">We spend hours curating the best content and send it to you every week for Free. If you don&#39;t love it <a href=\"#\"> unsubscribe. </a>at any time.</td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">Email: <a href=\"#\">Support@OnyxDSs</a></td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style=\"text-align:center\">&copy; 2016 Democracy. All rights reserved | Design by <a href=\"http://onyxdatasystems.com/\">Onyx DS</a></td>\r\n								</tr>\r\n								<tr>\r\n									<td>&nbsp;</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n		<!--//main-content-->\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2016-08-31 09:54:36');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(7, 'Fashion Premium', 'fashionio', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Fashionio a Email Template | OnyxDSs</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Fashionio Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n<!-- //Custom Theme files -->\r\n<!-- Responsive Styles and Valid Styles -->\r\n	<style type=\"text/css\">\r\n    	\r\n	    body{\r\n            width: 100%; \r\n            background-color: #9f9fa3; \r\n            margin:0; \r\n            padding:0; \r\n            -webkit-font-smoothing: antialiased;\r\n        }\r\n        \r\n        html{\r\n            width: 100%; \r\n        }\r\n        \r\n        table{\r\n            font-size: 14px;\r\n            border: 0;\r\n        }\r\n		 /* ----------- responsivity ----------- */\r\n		 @media only screen and (max-width: 768px){\r\n			.container {\r\n					width: 650px;\r\n				}\r\n		 }\r\n        @media only screen and (max-width: 640px){\r\n        \r\n            /*------ top header ------ */\r\n            .header-bg{width: 440px !important; height: 10px !important;}\r\n            .main-header{line-height: 28px !important;}\r\n            .main-subheader{line-height: 28px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 420px !important;}\r\n            .feature-middle{width: 400px !important; text-align: center !important;}\r\n            .feature-img{width: 440px !important; height: auto !important;}\r\n            \r\n            .container{width: 550px !important;}\r\n            .container-middle{width: 420px !important;}\r\n            .mainContent{width: 400px !important;}\r\n            \r\n            .main-image{width: 400px !important; height: auto !important;}\r\n            .banner{width: 400px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 400px !important;}\r\n            .section-img{width: 400px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 420px !important; height: auto !important;}\r\n            \r\n        }\r\n		@media only screen and (max-width: 480px){\r\n			.container {\r\n				width: 200px !important;\r\n			}\r\n			.icon {\r\n				width: 70%;\r\n			}\r\n		}\r\n        @media only screen and (max-width: 479px){\r\n        \r\n        	/*------ top header ------ */\r\n            .header-bg{width: 280px !important; height: 10px !important;}\r\n            .top-header-left{width: 260px !important; text-align: center !important;}\r\n            .top-header-right{width: 260px !important;}\r\n            .main-header{line-height: 28px !important; text-align: center !important;}\r\n            .main-subheader{line-height: 28px !important; text-align: center !important;}\r\n            \r\n            /*------- header ----------*/\r\n            .logo{width: 260px !important;}\r\n            .nav{width: 260px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 260px !important;}\r\n            .feature-middle{width: 240px !important; text-align: center !important;}\r\n            .feature-img{width: 260px !important; height: auto !important;}\r\n\r\n            \r\n            .container{width: 290px !important;}\r\n            .container-middle{width: 260px !important;}\r\n            .mainContent{width: 240px !important;}\r\n            \r\n            .main-image{width: 240px !important; height: auto !important;}\r\n            .banner{width: 240px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 240px !important;}\r\n            .section-img{width: 240px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 260px !important; height: auto !important;}\r\n			table {\r\n				  width: 100% !important;\r\n			}\r\n            .gallery-img a img {\r\n				height: 134px !important;\r\n			}\r\n			.gallery-img1 a img {\r\n				height: 60px !important;\r\n			}\r\n			.gallery-img2 a img {\r\n				height: 60px !important;\r\n			}\r\n	    }\r\n    </style>\r\n    \r\n</head>\r\n\r\n<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n		<tr><td height=\"30\"></td></tr>\r\n        <tr bgcolor=\"#9f9fa3\">\r\n            <td width=\"100%\" align=\"center\" valign=\"top\" bgcolor=\"#9f9fa3\">\r\n                <!-- main content -->\r\n                <table width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container top-header-left\" bgcolor=\"e5eaf7\">\r\n				<!-- Header -->\r\n                	<tr bgcolor=\"e0e0e0\"><td height=\"40\"></td></tr>\r\n                	<tr bgcolor=\"e0e0e0\">\r\n	                	<td>\r\n	                		<table border=\"0\" width=\"560\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\" bgcolor=\"e0e0e0\">\r\n								<tr class=\"top-header-left\">\r\n									<td align=\"center\" style=\"color: #f57e60; font-size: 2.5em;font-family: Broadway,serif; font-weight: normal;\">\r\n										<a href=\"#\" style=\"color: #f57e60;text-decoration:none;\">Fashionio</a>\r\n									</td>\r\n									<tr><td height=\"2\"></td></tr>\r\n									<td align=\"center\" style=\"color: #777; font-size:1em; font-family:Candara , serif; font-weight: normal;\"><a href=\"#\" style=\"color: #777;text-decoration:none;\">Fashion Is our life</a></td>\r\n								</tr>\r\n								<tr><td height=\"40\"></td></tr>\r\n	                			<tr>\r\n	                				<td>\r\n										<table class=\"full\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"98d361\">\r\n\r\n                    <!-- Start Menu List -->\r\n											<tr>\r\n											  <td class=\"full\" width=\"600\">\r\n												<table style=\"border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n												  \r\n													<tr>\r\n													  <td>\r\n\r\n														<table class=\"menu\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n															<tr>                \r\n\r\n															  <td align=\"center\" data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" mc:edit=\"menu\" style=\"text-align:left; font-size:13px; font-family:Trajan Pro,serif; font-weight:300 ; color: #ffffff; \" class=\"menu\" height=\"48\">\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \">HOME</a>\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \">SERVICES</a>\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \">MENU</a>\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \" class=\"editable change_link\">BLOG</a>\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \">ABOUT</a>\r\n																<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n																<a data-color=\"Menu\" data-size=\"Menu\" data-min=\"13\" data-max=\"15\" href=\"#\" style=\"text-align:center; font-size:13px; font-family:Trajan Pro,serif; font-weight:500 ; color: #ffffff; text-decoration:none; \">CONTACT</a>\r\n															   \r\n															  </td>\r\n															  \r\n															</tr>\r\n														  \r\n														</table>\r\n													  </td>\r\n													</tr>\r\n													\r\n												</table>\r\n											  </td>\r\n											</tr>\r\n                    <!-- End Menu List -->\r\n\r\n										</table>\r\n									</td>\r\n	                			</tr>\r\n	                		</table>\r\n	                	</td>\r\n                	</tr>\r\n                	<!-- end header -->\r\n					<!-- main section -->                	\r\n                	<tr bgcolor=\"e0e0e0\">\r\n                		<td>\r\n                			<table border=\"0\" width=\"560\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\" style=\"background:url(images/banner.jpg) no-repeat 0px 0px;background-size:cover;height:480px\">\r\n								<tr>\r\n									<td>\r\n										<table width=\"250\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" class=\"mainContent\">\r\n											<tr><td height=\"30\"></td></tr>\r\n											<tr>\r\n												<td style=\"font-size:1.8em;color:#777;font-family:Candara , arial;padding-right:1em;\">I am <span style=\"color:#f57e60;font-family: Trajan Pro,serif;\">Fashion Designer</span></td>\r\n											</tr>\r\n											<tr><td height=\"10\"></td></tr>\r\n											<tr>\r\n												<td style=\"font-size:1em;color:#777;font-family:Candara , serif;padding-right:1em;line-height:1.8em;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n	                			</tr>\r\n							</table>\r\n                		</td>\r\n                	</tr>\r\n                	<tr><td bgcolor=\"e0e0e0\" height=\"40\"></td></tr>\r\n					<!-- banner-bottom -->\r\n                	<tr bgcolor=\"#FFFFFF\">\r\n					  <td contenteditable=\"false\" class=\"editable\">\r\n						<table class=\"container-middle full\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n							<tr>\r\n							  <td height=\"40\"> </td>\r\n							</tr>\r\n							<tr align=\"center\">\r\n								<td style=\"color: #f57e60; font-size: 2em;font-family: Trajan Pro,serif; font-weight: normal;\">Special Services</td>\r\n							</tr>\r\n							<tr>\r\n							  <td height=\"40\"> </td>\r\n							</tr>\r\n							<!-- Start Icons -->\r\n							<tr>\r\n								<td class=\"full\">\r\n								\r\n								<!-- Start Icon -->\r\n								<table class=\"icon\" style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"180\">\r\n								\r\n									<tr>\r\n									  <td align=\"center\">\r\n										<img mc:edit=\"icon1\" src=\"images/2.png\" style=\"display:block; margin: 0 auto;\" alt=\" \" width=\"150\" height=\"150\">\r\n									  </td>\r\n									</tr>\r\n\r\n									<tr>\r\n									  <td align=\"center\" style=\" text-align: center; font-size:1em;  font-family:Trajan Pro,serif; color: #98d361; text-transform:capitalize;\" height=\"24\">\r\n										<a href=\"#\" style=\"color: #98d361;text-decoration:none;\">nulla pariatur</a>\r\n									  </td> \r\n									</tr>\r\n									\r\n									<tr align=\"center\">\r\n										<td style=\"color: #777; font-size: 1em;font-family: Candara , serif; font-weight: normal; line-height:1.8em;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</td>\r\n									</tr>\r\n								</table>\r\n								<!-- End Icon -->\r\n\r\n								<table class=\"icon-space\" style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"3\">\r\n								\r\n									<tr>\r\n									  <td height=\"20\">\r\n										<p style=\"padding-left: 5px; margin:0;\"></p>\r\n									  </td>\r\n									</tr>\r\n								 \r\n								</table>\r\n\r\n								<!-- Start Icon -->\r\n								<table class=\"icon\" style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"180\">\r\n								  \r\n									<tr>\r\n									  <td align=\"center\">\r\n										<img mc:edit=\"icon2\" src=\"images/3.png\" style=\"display:block; margin: 0 auto;\" alt=\"clean\" width=\"150\" height=\"150\" class=\"image_target\">\r\n									  </td>\r\n									</tr>\r\n\r\n									<tr>\r\n									  <td style=\" text-align: center; font-size:1em;  font-family:Trajan Pro,serif; color: #98d361; text-transform:capitalize;\" height=\"24\">\r\n										<a href=\"#\" style=\"color: #98d361;text-decoration:none;\">nulla pariatur</a>\r\n									  </td> \r\n									</tr>\r\n									\r\n									<tr align=\"center\">\r\n										<td style=\"color: #777; font-size: 1em;font-family: Candara , serif; font-weight: normal; line-height:1.8em;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</td>\r\n									</tr>\r\n\r\n								</table>\r\n								<!-- End Icon -->\r\n\r\n								<table class=\"icon-space\" style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"3\">\r\n								  \r\n									<tr>\r\n									  <td height=\"20\">\r\n										<p style=\"padding-left: 5px; margin:0;\"></p>\r\n									  </td>\r\n									</tr>\r\n								 \r\n								</table>\r\n\r\n								<!-- Start Icon -->\r\n								<table class=\"icon\" style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"180\">\r\n								 \r\n									<tr>\r\n									  <td align=\"center\">\r\n										<img mc:edit=\"icon3\" src=\"images/4.png\" style=\"display:block; margin: 0 auto;\" alt=\"update\" width=\"150\" height=\"150\">\r\n									  </td>\r\n									</tr>\r\n\r\n									<tr>\r\n									  <td style=\" text-align: center; font-size:1em;  font-family:Trajan Pro,serif; color: #98d361; text-transform:capitalize;\" height=\"24\">\r\n										<a href=\"#\" style=\"color: #98d361;text-decoration:none;\">nulla pariatur</a>\r\n									  </td> \r\n									</tr>\r\n									\r\n									<tr align=\"center\">\r\n										<td style=\"color: #777; font-size: 1em;font-family: Candara , serif; font-weight: normal; line-height:1.8em;\">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</td>\r\n									</tr>\r\n\r\n								</table>\r\n								<!-- End Icon -->\r\n								</td>\r\n							</tr>\r\n							<!-- End Icons -->\r\n\r\n							<tr>\r\n							  <td height=\"70\"> </td>\r\n							</tr>\r\n							\r\n							<tr>\r\n\r\n								<!--  Change Full Width BG Color -->\r\n								<td align=\"center\" bgcolor=\"#FFFFFF\">\r\n									<table class=\"container\" width=\"560\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n										<tr>\r\n											<td>\r\n\r\n												<table class=\"twelve\" width=\"270\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n													<tr>\r\n														<td align=\"center\">\r\n															<!-- Place your Custom Image -->\r\n															<img src=\"images/2.jpg\" alt=\" \" width=\"287\" height=\"185\" class=\"full image_target\">\r\n														</td>\r\n													</tr>\r\n\r\n												</table>\r\n\r\n												<!-- SPACE -->\r\n												<table class=\"twelve\" width=\"1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n													<tr>\r\n														<td width=\"1\" height=\"40\" style=\"font-size: 40px; line-height: 40px;\"></td>\r\n													</tr>\r\n\r\n												</table>\r\n												<!-- END SPACE -->\r\n\r\n												<table class=\"twelve\" width=\"240\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n													<tr>\r\n														<td>\r\n															<table class=\"twelve\" width=\"240\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																<tr>\r\n																	<td align=\"left\" style=\"font-family: Trajan Pro,serif;text-transform:capitalize; font-size: 1em; color: #f57e60; letter-spacing: 2px; line-height: 24px;\">\r\n																		<!-- Edit Title  -->\r\n																		<a href=\"#\" style=\"color: #f57e60;text-decoration:none;\">nulla pariatur</a>\r\n																	</td>\r\n																</tr>\r\n\r\n																<tr>\r\n																	<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n																</tr>\r\n\r\n																<tr>\r\n																	<td align=\"left\" style=\"font-family: Candara , serif; font-size: 1em; color: #777; line-height: 1.8em;\">\r\n\r\n																		<!-- Edit Content -->\r\n																		Taque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus.\r\n\r\n\r\n																	</td>\r\n																</tr>\r\n\r\n																<tr>\r\n																	<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n																</tr>\r\n\r\n																<tr>\r\n																	<td align=\"left\">\r\n																		<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n																			<tr>\r\n																				<td align=\"center\">\r\n\r\n																					<!-- Change to your custom URL -->\r\n																					<a href=\"#\" style=\"text-decoration: none;\">\r\n																						<!-- Edit Button Text -->\r\n																						<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																					</a>\r\n																				</td>\r\n																			</tr>\r\n\r\n\r\n																		</table>\r\n																	</td>\r\n																</tr>\r\n															</table>\r\n														</td>\r\n													</tr>\r\n\r\n												</table>\r\n\r\n											</td>\r\n										</tr>\r\n\r\n										<tr>\r\n											<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n										</tr>\r\n\r\n									</table>\r\n								</td>\r\n							</tr>\r\n						</table>\r\n					  </td>\r\n					</tr>\r\n					<!-- banner-bottom -->\r\n					<!-- full-cover-banner -->\r\n					<tr>\r\n						<td>\r\n							<table class=\"container\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:url(images/1.jpg); background-size:cover; min-height:518px;\">\r\n								<tr>\r\n									<td>\r\n										<table class=\"container-middle\" width=\"560\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr align=\"center\">\r\n												<td style=\"text-transform:capitalize; font-size:2em; color:#FFFFFF;font-family:Trajan Pro,serif\">\r\n													 vel illum qui dolorem eum fugiat quo voluptas\r\n												</td>\r\n											</tr>\r\n											<tr><td height=\"20\"></td></tr>\r\n											<tr align=\"center\">\r\n												<td style=\"font-size:1em; color:#FFFFFF;font-family:Candara ,serif; line-height:1.8em;\">\r\n													 To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure\r\n												</td>\r\n											</tr>\r\n											<tr><td height=\"40\"></td></tr>\r\n											<tr align=\"center\">\r\n												<td>\r\n													<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n														<tr>\r\n															<td align=\"center\">\r\n\r\n																<!-- Change to your custom URL -->\r\n																<a href=\"#\" style=\"text-decoration: none;\">\r\n																	<!-- Edit Button Text -->\r\n																	<img src=\"images/10.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																</a>\r\n															</td>\r\n														</tr>\r\n\r\n\r\n													</table>\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //full-cover-banner -->\r\n					<!-- works -->\r\n					<tr bgcolor=\"#FFFFFF\">\r\n						<td contenteditable=\"false\" class=\"editable\">\r\n							<table class=\"full container\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								<tr align=\"center\">\r\n									<td style=\"color: #f57e60; font-size: 2em;font-family: Trajan Pro,serif; font-weight: normal;\">Our Menu</td>\r\n								</tr>\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<table width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" mc:repeatable=\"\">\r\n											<tr>\r\n												<td>\r\n													<table class=\"container\" width=\"560\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n														<tr>\r\n															<td>\r\n\r\n																<table class=\"twelve\" width=\"270\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n																	<tr>\r\n																		<td align=\"center\">\r\n																			<!-- Place your Custom Image -->\r\n																			<img src=\"images/3.jpg\" alt=\" \" width=\"300\" height=\"451\" class=\"full image_target\">\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n\r\n																<!-- SPACE -->\r\n																<table class=\"twelve\" width=\"1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n																	<tr>\r\n																		<td width=\"1\" height=\"40\" style=\"font-size: 40px; line-height: 40px;\"></td>\r\n																	</tr>\r\n\r\n																</table>\r\n																<!-- END SPACE -->\r\n\r\n																<table class=\"twelve\" width=\"240\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n																	<tr>\r\n																		<td>\r\n																			<table class=\"twelve\" width=\"240\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																				\r\n																				<tr>\r\n																					<td height=\"100\"></td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td align=\"left\" style=\"font-family: Trajan Pro,serif;text-transform:capitalize; font-size: 1.5em; color: #f57e60; letter-spacing: 2px; line-height: 24px;\">\r\n																						<!-- Edit Title  -->\r\n																						sapiente delectus, ut\r\n																					</td>\r\n																				</tr>\r\n\r\n																				<tr>\r\n																					<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n																				</tr>\r\n\r\n																				<tr>\r\n																					<td align=\"left\" style=\"text-transform:capitalize; font-family: Candara , arial; font-size: 1em; color: #777; line-height: 1.8em;\">\r\n\r\n																						<!-- Edit Content -->\r\n																						doloribus asperiores - - - - -  <span style=\"font-size:2em;color: #98d361;\">30 -/</span>\r\n\r\n\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td height=\"10\"></td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td align=\"left\" style=\"text-transform:capitalize; font-family: Candara , arial; font-size: 1em; color: #777; line-height: 1.8em;\">\r\n\r\n																						<!-- Edit Content -->\r\n																						doloribus asperiores - - - - -  <span style=\"font-size:2em;color: #98d361;\">30 -/</span>\r\n\r\n\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td height=\"10\"></td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td align=\"left\" style=\"text-transform:capitalize; font-family: Candara , arial; font-size: 1em; color: #777; line-height: 1.8em;\">\r\n\r\n																						<!-- Edit Content -->\r\n																						doloribus asperiores - - - - -  <span style=\"font-size:2em;color: #98d361;\">30 -/</span>\r\n\r\n\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td height=\"10\"></td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td align=\"left\" style=\"text-transform:capitalize; font-family: Candara , arial; font-size: 1em; color: #777; line-height: 1.8em;\">\r\n\r\n																						<!-- Edit Content -->\r\n																						doloribus asperiores - - - - -  <span style=\"font-size:2em;color: #98d361;\">30 -/</span>\r\n\r\n\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr>\r\n																					<td height=\"35\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n																				</tr>\r\n\r\n																				<tr>\r\n																					<td align=\"left\">\r\n																						<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n																							<tr>\r\n																								<td align=\"center\">\r\n\r\n																									<!-- Change to your custom URL -->\r\n																									<a href=\"#\" style=\"text-decoration: none;\">\r\n																									<!-- Edit Button Text -->\r\n																										<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																									</a>\r\n																								</td>\r\n																							</tr>\r\n\r\n\r\n																						</table>\r\n																					</td>\r\n																				</tr>\r\n																			</table>\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n																	<tr>\r\n																		<td>\r\n																			<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n																			\r\n																				<tr>\r\n																					<td>\r\n																						<img src=\"images/5.jpg\" alt=\" \" width=\"270\" height=\"200\" />\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"20\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:1em; color:#98d361; font-family:Trajan Pro,serif\">For All Make Up</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"10\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																						sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"20\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:2em; color:#f57e60; font-family:Trajan Pro,serif\">$10.00</td>\r\n																				</tr>\r\n																				\r\n																			</table>\r\n																			\r\n																			<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"5\" height=\"10\">\r\n																			\r\n																				<tr>\r\n																					<td>\r\n																						<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1\" height=\"10\">\r\n																							<tr>\r\n																								<td>&nbsp;</td>\r\n																							</tr>\r\n																						</table>\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																			</table>\r\n																			\r\n																			<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n																			\r\n																				<tr>\r\n																					<td>\r\n																						<img src=\"images/6.jpg\" alt=\" \" width=\"270\" height=\"200\" />\r\n																					</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"20\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:1em; color:#98d361; font-family:Trajan Pro,serif\">For Bridal Make Up</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"10\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																						sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n																				</tr>\r\n																				\r\n																				<tr><td height=\"20\">&nbsp;</td></tr>\r\n																				\r\n																				<tr align=\"center\">\r\n																					<td style=\"font-size:2em; color:#f57e60; font-family:Trajan Pro,serif\">$30.00</td>\r\n																				</tr>\r\n																				\r\n																			</table>\r\n																			\r\n																		</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //works -->\r\n					<!-- blog -->\r\n					<tr bgcolor=\"eeeeee\">\r\n						<td contenteditable=\"false\" class=\"editable\">\r\n							<table class=\"full container\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr align=\"center\">\r\n									<td style=\"color: #f57e60; font-size: 2em;font-family: Trajan Pro,serif; font-weight: normal;\">Our Blog</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n											<tr>\r\n												<td>\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\"><img src=\"images/4.jpg\" alt=\" \" width=\"270\" height=\"200\" /></a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#999999; font-family:Trajan Pro,serif;\">\r\n																<a href=\"#\" style=\"color:#999999; font-family:Trajan Pro,serif; text-transform:capitalize; text-decoration:none;\">voluptatibus maiores alias</a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"10\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n																	<tr>\r\n																		<td align=\"center\">\r\n\r\n																			<!-- Change to your custom URL -->\r\n																			<a href=\"#\" style=\"text-decoration: none;\">\r\n																			<!-- Edit Button Text -->\r\n																				<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																			</a>\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"5\" height=\"10\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1\" height=\"10\">\r\n																	<tr>\r\n																		<td>&nbsp;</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\"><img src=\"images/7.jpg\" alt=\" \" width=\"270\" height=\"200\" /></a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#999999; font-family:Trajan Pro,serif;\">\r\n																<a href=\"#\" style=\"color:#999999; font-family:Trajan Pro,serif; text-transform:capitalize; text-decoration:none;\">voluptatibus maiores alias</a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"10\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n																	<tr>\r\n																		<td align=\"center\">\r\n\r\n																			<!-- Change to your custom URL -->\r\n																			<a href=\"#\" style=\"text-decoration: none;\">\r\n																			<!-- Edit Button Text -->\r\n																				<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																			</a>\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td height=\"40\"></td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td>\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\"><img src=\"images/8.jpg\" alt=\" \" width=\"270\" height=\"200\" /></a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#999999; font-family:Trajan Pro,serif;\">\r\n																<a href=\"#\" style=\"color:#999999; font-family:Trajan Pro,serif; text-transform:capitalize; text-decoration:none;\">voluptatibus maiores alias</a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"10\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n																	<tr>\r\n																		<td align=\"center\">\r\n\r\n																			<!-- Change to your custom URL -->\r\n																			<a href=\"#\" style=\"text-decoration: none;\">\r\n																			<!-- Edit Button Text -->\r\n																				<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																			</a>\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"5\" height=\"10\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1\" height=\"10\">\r\n																	<tr>\r\n																		<td>&nbsp;</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<a href=\"#\"><img src=\"images/9.jpg\" alt=\" \" width=\"270\" height=\"200\" /></a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#999999; font-family:Trajan Pro,serif;\">\r\n																<a href=\"#\" style=\"color:#999999; font-family:Trajan Pro,serif; text-transform:capitalize; text-decoration:none;\">voluptatibus maiores alias</a>\r\n															</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"10\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td style=\"font-size:1em; color:#777; font-family:Candara , serif; line-height:1.8em;\">Itaque earum rerum hic tenetur a \r\n																sapiente delectus, ut aut reiciendis voluptatibus maiores alias.</td>\r\n														</tr>\r\n														\r\n														<tr><td height=\"20\">&nbsp;</td></tr>\r\n														\r\n														<tr align=\"center\">\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n																	<tr>\r\n																		<td align=\"center\">\r\n\r\n																			<!-- Change to your custom URL -->\r\n																			<a href=\"#\" style=\"text-decoration: none;\">\r\n																			<!-- Edit Button Text -->\r\n																				<img src=\"images/9.png\" alt=\" \" width=\"99\" height=\"28\" />\r\n\r\n																			</a>\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //blog -->\r\n					<!-- about -->\r\n					<tr bgcolor=\"98d361\">\r\n						<td contenteditable=\"false\" class=\"editable\">\r\n							<table class=\"full container\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n								\r\n								<tr>\r\n									<td>\r\n										<table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr>\r\n												<td>\r\n													<table width=\"300\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n														\r\n														<tr>\r\n														  <td height=\"30\"> </td>\r\n														</tr>\r\n								\r\n														<tr>\r\n															<td style=\"text-transform:capitalize; font-size:1.1em; color:#FFFFFF;font-family:Trajan Pro,serif;\">dolorem eum fugiat quo voluptas</td>\r\n														</tr>\r\n														\r\n														<tr>\r\n															<td height=\"10\"> </td>\r\n														</tr>\r\n								\r\n														<tr>\r\n															<td style=\"text-transform:capitalize;line-height:1.8em; font-size:1em; color:#FFFFFF;font-family:Candara , serif;\">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</td>\r\n														</tr>\r\n														\r\n														<tr>\r\n														  <td height=\"10\"> </td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100\" height=\"10\">\r\n													\r\n														<tr>\r\n															<td>\r\n																<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"1\" height=\"10\">\r\n																	<tr>\r\n																		<td>&nbsp;</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n													<table width=\"150\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n														\r\n														<tr>\r\n															<td style=\"display:flex;\"><img src=\"images/5.png\" alt=\" \" width=\"113\" height=\"200\" /></td>\r\n														</tr>\r\n														\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //about -->\r\n					<!-- staff -->\r\n					<tr bgcolor=\"FFFFFF\">\r\n						<td contenteditable=\"false\" class=\"editable\">\r\n							<table class=\"full container\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr align=\"center\">\r\n									<td style=\"color: #f57e60; font-size: 2em;font-family: Trajan Pro,serif; font-weight: normal;\">Meet Our Staff</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td valign=\"top\">\r\n\r\n										<!-- Start Image -->\r\n										<table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"member-img\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n											  \r\n												<tr>\r\n												  <td>\r\n													<img src=\"images/10.jpg\" alt=\" \" width=\"200\" height=\"300\" />\r\n												  </td>\r\n												</tr>\r\n											 \r\n										</table>\r\n										<!-- End Image -->\r\n\r\n										<table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"member-sp\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"8\">\r\n										  \r\n											<tr>\r\n											  <td height=\"20\">\r\n												<p style=\"padding-left: 37px; margin:0;\"></p>\r\n											  </td>\r\n											</tr>\r\n										 \r\n										</table>\r\n\r\n										<table style=\"border-collaps:collaps;\" class=\"member-text\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"300\">\r\n\r\n											<tr>\r\n											  <td height=\"40\"></td>\r\n											</tr>\r\n											\r\n											<tr>\r\n\r\n												<!-- Start Name -->\r\n												 <td style=\"text-align: left; font-size:1.2em; font-family:Trajan Pro,serif; line-height:20px; color: #f57e60;\">\r\n													Rosy Peacock\r\n												</td>\r\n												<!-- End Name -->\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td height=\"12\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n\r\n											  <!-- Start Job -->\r\n											  <td style=\"text-align: left; font-size:.9em; font-family:Trajan Pro,serif; line-height:20px; color: #777;\">\r\n											   Beautician\r\n											  </td>\r\n											  <!-- End Job -->\r\n\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td height=\"26\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td style=\"text-align: left; font-size:1em; font-family:Candara , serif; line-height:1.8em; color: #777;\">\r\n												Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\r\n											  </td>\r\n											</tr> \r\n\r\n											<tr>\r\n											  <td height=\"24\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n											 <td>\r\n												<table style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"auto\">\r\n													\r\n														<tr>\r\n														\r\n															<td style=\"display:block;\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block;\">\r\n																	<img src=\"images/1.png\" alt=\" \" width=\"32\" height=\"32\" style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															<td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/6.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															 <td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/7.png\" alt=\" \" width=\"32\" height=\"32\" style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															 <td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/8.png\" alt=\" \" width=\"32\" height=\"32\" style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n														\r\n														</tr>\r\n													  \r\n												  </table>\r\n											  </td>\r\n											</tr>                                                             \r\n\r\n										</table>\r\n\r\n									</td>\r\n								</tr>\r\n									\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td valign=\"top\">\r\n										<table style=\"border-collaps:collaps;\" class=\"member-text\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"300\">\r\n\r\n											<tr>\r\n											  <td height=\"40\"></td>\r\n											</tr>\r\n											\r\n											<tr>\r\n\r\n												<!-- Start Name -->\r\n												 <td style=\"text-align: left; font-size:1.2em; font-family:Trajan Pro,serif; line-height:20px; color: #f57e60;\">\r\n													Danny Williumson\r\n												</td>\r\n												<!-- End Name -->\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td height=\"12\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n\r\n											  <!-- Start Job -->\r\n											  <td style=\"text-align: left; font-size:.9em; font-family:Trajan Pro,serif; line-height:20px; color: #777;\">\r\n											   Beautician\r\n											  </td>\r\n											  <!-- End Job -->\r\n\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td height=\"26\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n											  <td style=\"text-align: left; font-size:1em; font-family:Candara , serif; line-height:1.8em; color: #777;\">\r\n												Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\r\n											  </td>\r\n											</tr> \r\n\r\n											<tr>\r\n											  <td height=\"24\"></td>\r\n											</tr>\r\n\r\n											<tr>\r\n											 <td>\r\n												<table style=\"mso-table-lspace:0pt; mso-table-rspace:0pt; margin: 0 auto; border-collaps:collaps;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"auto\">\r\n													\r\n														<tr>\r\n														\r\n															<td style=\"display:block;\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/1.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															<td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/6.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															 <td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/7.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n															 <td width=\"11\">\r\n															  \r\n															</td>\r\n															<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																<a href=\"#\" style=\"display:block; \">\r\n																	<img src=\"images/8.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																</a>\r\n															</td>\r\n														\r\n														</tr>\r\n													  \r\n												  </table>\r\n											  </td>\r\n											</tr>                                                             \r\n\r\n										</table>\r\n										\r\n										<table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"member-sp\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"8\">\r\n										  \r\n											<tr>\r\n											  <td height=\"20\">\r\n												<p style=\"padding-left: 37px; margin:0;\"></p>\r\n											  </td>\r\n											</tr>\r\n										 \r\n										</table>\r\n										\r\n										<!-- Start Image -->\r\n										<table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"member-img\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n											  \r\n												<tr>\r\n												  <td>\r\n													<img src=\"images/11.jpg\" alt=\" \" width=\"200\" height=\"300\" />\r\n												  </td>\r\n												</tr>\r\n											 \r\n										</table>\r\n										<!-- End Image -->\r\n										\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //staff -->\r\n					<!-- contact -->\r\n					<tr bgcolor=\"f57e60\">\r\n						<td contenteditable=\"false\" class=\"editable\">\r\n							<table class=\"full container\" width=\"560\" style=\"margin: 0 auto; border-collaps:collaps; mso-table-lspace:0pt; mso-table-rspace:0pt;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table width=\"100%\"align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr>\r\n												<td>\r\n												\r\n													<table width=\"250\"align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/12.jpg\" alt=\" \" width=\"250\" height=\"166\" />\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n													<table width=\"30\" height=\"10\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td>\r\n																<table width=\"30\" height=\"10\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tr>\r\n																		<td>&nbsp;</td>\r\n																	</tr>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n													<table width=\"280\"align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td>\r\n																<table width=\"100%\"align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tr>\r\n																		<td style=\"color: #FFFFFF; font-size: 1.5em;font-family: Trajan Pro,serif; font-weight: normal;\">Contact Us</td>\r\n																	</tr>\r\n																	\r\n																	<tr><td height=\"20\"></td></tr>\r\n																	\r\n																	<tr>\r\n																		<td style=\"color: #FFFFFF; font-size:1em;font-family:Candara , arial; font-weight: normal;\">Address : <span style=\"font-weight: 700;padding-left:3em;\">London, Diamond Street, 29G.</span></td>\r\n																	</tr>\r\n																	\r\n																	<tr><td height=\"10\"></td></tr>\r\n																	\r\n																	<tr>\r\n																		<td style=\"color: #FFFFFF; font-size: 1em;font-family:Candara , arial; font-weight: normal;\">Phone : <span style=\"font-weight: 700;padding-left:5em;\">+0590 098 908</span></td>\r\n																	</tr>\r\n																	\r\n																	<tr><td height=\"20\"></td></tr>\r\n																	\r\n																	<tr>\r\n																		<td style=\"color: #FFFFFF; font-size: 1em;font-family:Candara , arial; font-weight: normal;\">\r\n																			\r\n																			<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n													\r\n																					<tr valign=\"top\">\r\n																						\r\n																						<td style=\"color: #FFFFFF; font-size: 1em;font-family:Candara , arial; font-weight: normal;padding-top:.5em;\">\r\n																							Follow Us :\r\n																						</td>\r\n																					\r\n																						<td style=\"display:block;\" valign=\"top\" width=\"28\">\r\n																							<a href=\"#\" style=\"display:block; \">\r\n																								<img src=\"images/1.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																							</a>\r\n																						</td>\r\n																						 <td width=\"5\">\r\n																						  \r\n																						</td>\r\n																						<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																							<a href=\"#\" style=\"display:block; \">\r\n																								<img src=\"images/7.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																							</a>\r\n																						</td>\r\n																						 <td width=\"5\">\r\n																						  \r\n																						</td>\r\n																						<td style=\"display:block\" valign=\"top\" width=\"28\">\r\n																							<a href=\"#\" style=\"display:block; \">\r\n																								<img src=\"images/8.png\" alt=\" \" width=\"32\" height=\"32\"	style=\"border-radius:3px;\"/>\r\n																							</a>\r\n																						</td>\r\n																					\r\n																					</tr>\r\n																				  \r\n																			</table>\r\n																			\r\n																		</td>\r\n																	</tr>\r\n																	\r\n																</table>\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n								  <td height=\"40\"> </td>\r\n								</tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td align=\"center\" bgcolor=\"#202020\">\r\n\r\n							<table width=\"560\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container\">\r\n							   \r\n								<tr>\r\n									<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td>\r\n\r\n										<table class=\"twelve\" width=\"350\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr>\r\n												<td style=\"font-family: Candara; font-size: 1em; color: #999999; line-height: 24px;\"class=\"editable\">\r\n													\r\n													<!-- Edit Copyright Text -->\r\n													Copyrights © 2015 Music Festival. Design by <a href=\"http://onyxdatasystems.com/\" style=\"color:#ec3003; font-size: 1em; text-decoration:none;\">Onyx DS</a>\r\n\r\n\r\n												</td>\r\n											</tr>\r\n										</table>\r\n\r\n										<!-- SPACE -->\r\n										<table width=\"1\" height=\"10\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n											<tr>\r\n												<td height=\"10\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;padding-left: 24px;\">&nbsp;\r\n													\r\n												</td>\r\n											</tr>\r\n										</table>\r\n										<!-- END SPACE -->\r\n\r\n										<table class=\"twelve\" width=\"180\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr>\r\n												<td style=\"font-family: Candara; font-size: 1em; color: #999999; line-height: 24px;\">\r\n\r\n													<!-- Place URL to Web Version-->\r\n													<a href=\"#\" style=\"color:#999999;text-decoration:none;\" data-size=\"Footer Text\" data-color=\"Footer Text\">\r\n\r\n														<!-- Change Text -->\r\n														webversion\r\n\r\n													</a>\r\n\r\n													<span data-size=\"Footer Text\" data-color=\"Footer Text\">&nbsp;&nbsp;|&nbsp;&nbsp;</span>\r\n\r\n\r\n													<!-- Place URL to Web Version-->\r\n													<a href=\"#\" style=\"color:#999999;text-decoration:none;\">\r\n\r\n														<!-- Change Text -->\r\n														unsubscribe\r\n\r\n													</a>\r\n\r\n												</td>\r\n											</tr>\r\n										</table>\r\n\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n								</tr>\r\n								\r\n							</table>\r\n\r\n						</td>\r\n					</tr>\r\n					<!-- //contact -->\r\n				</table>\r\n                <tr><td height=\"35\"></td></tr>\r\n            </td>\r\n        </tr>\r\n	</table>\r\n</body>\r\n</html>', '2016-08-31 09:54:42');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(8, 'Interim', 'interim', NULL, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Interim a Email Template | OnyxDSs</title>\r\n<!-- Custom Theme files -->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"keywords\" content=\"Interim Newsletter templates, Email Templates, Newsletters, Marketing  templates, \r\n	Advertising templates, free Newsletter\" />\r\n<!-- //Custom Theme files -->\r\n<!-- Responsive Styles and Valid Styles -->\r\n	<style type=\"text/css\">\r\n    	\r\n	    body{\r\n            width: 100%; \r\n            background-color:#333; \r\n            margin:0; \r\n            padding:0; \r\n            -webkit-font-smoothing: antialiased;\r\n        }\r\n        \r\n        html{\r\n            width: 100%; \r\n        }\r\n        \r\n        table{\r\n            font-size: 14px;\r\n            border: 0;\r\n        }\r\n		 /* ----------- responsivity ----------- */\r\n		 @media only screen and (max-width: 768px){\r\n			.container {\r\n				width: 700px !important;\r\n			}\r\n		}\r\n        @media only screen and (max-width: 630px){\r\n        \r\n            /*------ top header ------ */\r\n            .header-bg{width: 430px !important; height: 10px !important;}\r\n            .main-header{line-height: 28px !important;}\r\n            .main-subheader{line-height: 28px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 420px !important;}\r\n            .feature-middle{width: 300px !important; text-align: center !important;}\r\n            .feature-img{width: 430px !important; height: auto !important;}\r\n            \r\n            .container{width: 430px !important;}\r\n            .container-middle{width: 420px !important;}\r\n            .mainContent{width: 300px !important;}\r\n            \r\n            .main-image{width: 300px !important; height: auto !important;}\r\n            .banner{width: 300px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 300px !important;}\r\n            .section-img{width: 300px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important; line-height: 24px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 24px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 420px !important; height: auto !important;}\r\n            table {\r\n				width: 100% !important;\r\n				text-align:center;\r\n			}\r\n        }\r\n        \r\n        @media only screen and (max-width: 479px){\r\n        \r\n        	/*------ top header ------ */\r\n            .header-bg{width: 280px !important; height: 10px !important;}\r\n            .top-header-left{width: 270px !important; text-align: center !important;}\r\n            .top-header-right{width: 270px !important;}\r\n            .main-header{line-height: 28px !important; text-align: center !important;}\r\n            .main-subheader{line-height: 28px !important; text-align: center !important;}\r\n            \r\n            /*------- header ----------*/\r\n            .logo{width: 270px !important;}\r\n            .nav{width: 270px !important;}\r\n            \r\n            /*----- --features ---------*/\r\n            .feature{width: 270px !important;}\r\n            .feature-middle{width: 230px !important; text-align: center !important;}\r\n            .feature-img{width: 270px !important; height: auto !important;}\r\n\r\n            \r\n            .container{width: 290px !important;}\r\n            .container-middle{width: 270px !important;}\r\n            .mainContent{width: 230px !important;}\r\n            \r\n            .main-image{width: 230px !important; height: auto !important;}\r\n            .banner{width: 230px !important; height: auto !important;}\r\n            /*------ sections ---------*/\r\n            .section-item{width: 230px !important;}\r\n            .section-img{width: 230px !important; height: auto !important;}\r\n            /*------- prefooter ------*/\r\n            .prefooter-header{padding: 0 10px !important;line-height: 28px !important;}\r\n            .prefooter-subheader{padding: 0 10px !important; line-height: 28px !important;}\r\n            /*------- footer ------*/\r\n            .top-bottom-bg{width: 270px !important; height: auto !important;}\r\n			table {\r\n				  width: 100% !important;\r\n			}\r\n            .gallery-img a img {\r\n				height: 134px !important;\r\n			}\r\n			.gallery-img1 a img {\r\n				height: 60px !important;\r\n			}\r\n			.gallery-img2 a img {\r\n				height: 60px !important;\r\n			}\r\n	    }\r\n    </style>\r\n    \r\n</head>\r\n\r\n<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\r\n	<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n		<tr bgcolor=\"#333333\"><td height=\"30\"></td></tr>\r\n        <tr bgcolor=\"#333333\">\r\n		  <!-- main content -->\r\n                <table width=\"800\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container top-header-left\" bgcolor=\"eeeeee\">\r\n					<!-- banner -->\r\n						<tr>\r\n							<td>\r\n								<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"FFFFFF\" style=\"background:url(images/banner.jpg); background-size:cover;\" height=\"300\">\r\n									<tbody><tr>\r\n                <td width=\"45\"></td>\r\n                <td valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                    <tbody><tr>\r\n                      <td height=\"35\"></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                          <tbody><tr>\r\n                            <th class=\"stack65\" width=\"200\" valign=\"top\" style=\"margin:0; padding:0; vertical-align:top;\"><table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" class=\"box3\">\r\n                                <tbody><tr>\r\n                                  <td class=\"txtling\" style=\"font-family:Arno Pro; font-size:15px; line-height:20px; color:#333333; text-align:left; font-style:italic;\"><em><a href=\"#\" target=\"_blank\" style=\"color:#333333; text-decoration:none;\">Online Version</a></em></td>\r\n                                </tr>\r\n                              </tbody></table>\r\n                            </th>\r\n                            <th class=\"stack2\" width=\"250\" style=\"margin:0; padding:0;\"><table width=\"250\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\" class=\"box4\">\r\n                                <tbody><tr>\r\n                                  <td class=\"txtling\" style=\"font-family:Arno Pro; font-size:15px; line-height:20px; color:#333333; text-align:right; font-style:italic;\"><em><span>Call: 012 21 974 765</span></em></td>\r\n                                </tr>\r\n                              </tbody></table>\r\n                            </th>\r\n                          </tr>\r\n                        </tbody></table></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"58\"></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td align=\"center\"><a href=\"#\" style=\"color:#9b2c3e; font-family:Niagara Solid;letter-spacing:2px;font-size:4em; text-decoration:none;\">Interim</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"15\"></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td align=\"center\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n                          <tbody><tr>\r\n                            <td style=\"font-family:Arno Pro; font-size:15px; line-height:20px; color:#333333; text-align:center;\"><em><a href=\"#\" target=\"_blank\" style=\"color:#333333; text-decoration:none;\">ABOUT</a></em></td>\r\n                            <td width=\"20\"></td>\r\n                            <td style=\"font-family:Arno Pro; font-size:15px; line-height:20px; color:#333333; text-align:center;\"><em><a href=\"#\" target=\"_blank\" style=\"color:#333333; text-decoration:none;\">SERVICES</a></em></td>\r\n                            <td width=\"20\"></td>\r\n                            <td style=\"font-family:Arno Pro; font-size:15px; line-height:20px; color:#333333; text-align:center;\"><em><a href=\"#\" target=\"_blank\" style=\"color:#333333; text-decoration:none;\">CONTACT</a></em></td>\r\n                          </tr>\r\n                        </tbody></table></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"45\"></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                          <tbody><tr>\r\n                            <td valign=\"top\" align=\"center\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#222222\">\r\n                                <tbody><tr>\r\n                                  <td width=\"50\"></td>\r\n                                  <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                      <tbody><tr>\r\n                                        <td height=\"5\"></td>\r\n                                      </tr>\r\n                                      <tr>\r\n                                        <td style=\"font-family:Arno Pro; font-size:18px; font-size:20px;padding-top:5px; line-height:20px; color:#f9f9f9; text-align:center;\">Interim makes happy!</td>\r\n                                      </tr>\r\n                                      <tr>\r\n                                        <td height=\"10\"></td>\r\n                                      </tr>\r\n                                    </tbody></table></td>\r\n                                  <td width=\"50\"></td>\r\n                                </tr>\r\n                              </tbody></table></td>\r\n                          </tr>\r\n                          <tr>\r\n                            <td height=\"5\"></td>\r\n                          </tr>\r\n                          <tr>\r\n                            <td valign=\"top\" align=\"center\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#9b2c3e\">\r\n                                <tbody><tr>\r\n                                  <td width=\"80\"></td>\r\n                                  <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                      <tbody><tr>\r\n                                        <td height=\"8\"></td>\r\n                                      </tr>\r\n                                      <tr>\r\n                                        <td style=\"font-family:Arno Pro; font-size:20px;padding-top:5px; line-height:20px; color:#f9f9f9; text-align:center;\">Professional Designers</td>\r\n                                      </tr>\r\n                                      <tr>\r\n                                        <td height=\"10\"></td>\r\n                                      </tr>\r\n                                    </tbody></table></td>\r\n                                  <td width=\"80\"></td>\r\n                                </tr>\r\n                              </tbody></table></td>\r\n                          </tr>\r\n                        </tbody></table></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"50\"></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td align=\"center\"><a href=\"#\" target=\"_blank\"> <img src=\"images/top_arrow.png\" alt=\"\" style=\"display: block; width=\"38\" height=\"38\" alt=\"\" border=\"0\"></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td height=\"64\"></td>\r\n                    </tr>\r\n                  </tbody></table></td>\r\n                <td width=\"45\"></td>\r\n              </tr>\r\n            </tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					<!-- banner -->\r\n										<!-- welcome -->\r\n		   <tr  bgcolor=\"#ffffff\">\r\n                    <td align=\"center\"><table width=\"670\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\" class=\"main\" data-bgcolor=\"TemplateBg\">\r\n                      <tbody>\r\n					  <tr>\r\n                                <td>\r\n                        \r\n                        <table width=\"430\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"scale\">\r\n                            <tbody><tr><td height=\"54\">&nbsp;</td></tr>\r\n                            <tr>\r\n                                <td align=\"center\" style=\"font-family:Niagara Solid; font-size:3em; color: #222222;letter-spacing:2px; line-height: 26px;\" class=\"scale-center-both\" data-color=\"Headers Big\" data-size=\"Headers Big\" data-min=\"16\" data-max=\"30\">\r\n                                  Welcome to Our Interim\r\n                                </td>\r\n                            </tr>\r\n                            <tr><td height=\"27\">&nbsp;</td></tr>\r\n                            <tr>\r\n                                <td align=\"center\" style=\"font-family:Arno Pro; font-size: 14px; color: #777777; line-height: 20px;\" class=\"scale-center-both\" data-color=\"Paragraphs Big\" data-size=\"Paragraphs Big\" data-min=\"12\" data-max=\"22\">\r\n                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.\r\n                                </td>\r\n                            </tr>\r\n                            <tr><td height=\"33\">&nbsp;</td></tr>\r\n                            <tr>\r\n                                <td align=\"center\">\r\n                                    <table data-bgcolor=\"Button\" bgcolor=\"#9b2c3e\"align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                        <tbody><tr>\r\n                                            <td data-link-style=\"text-decoration:none; color:#FFFFFF;\" data-link-color=\"Button\" data-size=\"Button\" data-min=\"12\" data-max=\"22\" height=\"30\" align=\"center\" style=\"font-family:\'montserratregular\', Helvetica, Arial, sans-serif; color:#FFFFFF; font-size: 14px; line-height: 36px!important; padding-left: 29px; padding-right: 29px;\">\r\n                                                <a href=\"#\" style=\"text-decoration: none; color:#FFFFFF\" data-color=\"Button\">Order Now</a>\r\n                                            </td>\r\n                                        </tr>\r\n                                    </tbody></table>\r\n                                </td>\r\n                            </tr>\r\n                            <tr><td height=\"57\">&nbsp;</td></tr>\r\n                        </tbody></table>    \r\n            \r\n                    </td>\r\n                </tr>\r\n            </tbody></table></td>\r\n        </tr>\r\n         <tr><td height=\"30\" bgcolor=\"#f4f4f4\"></td></tr>\r\n					<!-- //welcome -->\r\n\r\n					<!-- approach -->\r\n						<tr>\r\n\r\n						<!--  Change Full Width BG Color -->\r\n						<td align=\"center\" bgcolor=\"#f4f4f4\" data-bgcolor=\"Work Process BG\">\r\n							<table class=\"container\" width=\"560\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n\r\n								<tr>\r\n									<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n\r\n								<tr>\r\n									<td align=\"center\" style=\"font-family:Niagara Solid; font-size:3em;letter-spacing:2px; color: #222222; line-height: 25px;\"class=\"editable\">\r\n\r\n										<!-- Edit Main Title -->\r\n										Our Team\r\n\r\n									</td>\r\n								</tr>\r\n					<tr>\r\n						<td align=\"center\">\r\n							<table border=\"0\" align=\"center\" width=\"600\" cellpadding=\"0\" cellspacing=\"0\" class=\"container600\">\r\n							\r\n							<tbody>\r\n						\r\n							<td>\r\n							<table border=\"0\" width=\"600\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"section-item\">\r\n								<tbody>\r\n								<tr><td height=\"30\" style=\"font-size: 10px; line-height: 10px;\">&nbsp;</td></tr>\r\n							\r\n								<tr>\r\n									<td>\r\n										<table border=\"0\" width=\"240\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"container590\">\r\n								<tbody><tr>\r\n									\r\n									<!-- ======= image ======= -->\r\n									\r\n									<td align=\"center\">\r\n												<a href=\"\" style=\" border-style: none !important; display: block; border: 0 !important;\" class=\"editable_img\"> <img src=\"images/s1.png\" alt=\"\" style=\"display: block; border: 4px solid #9B2C3E; border-radius:44px; width: auto;\" width=\"70\" border=\"0\" alt=\"\"></a>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr>\r\n									<td bgcolor=\"#ffffff\" align=\"center\" mc:edit=\"team-title3\" style=\"color: #222; font-size: 15px; font-family:Arno Pro; font-weight: 500; line-height: 23px;padding:10px 0;\" class=\"title_color\">\r\n										<!-- ======= section text ====== -->\r\n										\r\n										<div class=\"editable_text\" style=\"line-height: 23px\">\r\n											<span class=\"text_container\">\r\n				        					<multiline>\r\n				        						James\r\n				        					</multiline>\r\n											</span>\r\n										</div>\r\n			        				</td>	\r\n								</tr>\r\n							\r\n								\r\n								<tr>\r\n									<td  bgcolor=\"#ffffff\" align=\"center\" mc:edit=\"team-text3\" style=\"color: #777;padding-bottom:10px; font-size:1em; font-family:Arno Pro; line-height: 24px;\" class=\"text_color\">\r\n										<!-- ======= section subtitle ====== -->\r\n										\r\n										<div class=\"editable_text\" style=\"line-height: 24px; padding:0 10px;\">\r\n											<span class=\"text_container\">\r\n											<multiline>\r\n					        					Praesent tempor ante nec lobortis nulla nada , consectetur adipisicing elit,Lorem ipsum dolor sit amet.\r\n											</multiline>\r\n											</span>\r\n										</div>\r\n			        				</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">&nbsp;</td></tr>\r\n								\r\n																								\r\n										</tbody></table>\r\n										\r\n										<table border=\"0\" width=\"2\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"container590\">\r\n											<tbody><tr><td width=\"2\" height=\"30\" style=\"font-size: 30px; line-height: 30px;\"></td></tr>\r\n										</tbody></table>\r\n				                		\r\n				                		<table border=\"0\" width=\"240\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"container590\">\r\n											<tbody><tr>\r\n												\r\n												<!-- ======= image ======= -->\r\n												\r\n												<td align=\"center\">\r\n												<a href=\"\" style=\" border-style: none !important; display: block; border: 0 !important;\" class=\"editable_img\"> <img src=\"images/s2.png\" alt=\"\" style=\"display: block; border: 4px solid #9B2C3E; border-radius:44px; width: auto;\" width=\"70\" border=\"0\" alt=\"\"></a>\r\n												</td>\r\n											</tr>\r\n											\r\n											<tr>\r\n												<td bgcolor=\"#ffffff\"  align=\"center\" mc:edit=\"team-title2\" style=\"color: #222; font-size: 15px;padding:10px 0px; font-family:Arno Pro; font-weight: 500; line-height: 23px;\" class=\"title_color\">\r\n													<!-- ======= section text ====== -->\r\n													\r\n													<div class=\"editable_text\" style=\"line-height: 23px\">\r\n														<span class=\"text_container\">\r\n							        					<multiline>\r\n							        						Marry\r\n							        					</multiline>\r\n														</span>\r\n													</div>\r\n						        				</td>	\r\n											</tr>\r\n											\r\n											\r\n											<tr>\r\n												<td bgcolor=\"#ffffff\"  align=\"center\" mc:edit=\"team-text2\" style=\"color: #777; font-size:1em; font-family:Arno Pro;padding-bottom:10px; line-height: 24px;\" class=\"text_color\">\r\n													<!-- ======= section subtitle ====== -->\r\n													\r\n													<div class=\"editable_text\" style=\"line-height: 24px; padding:0 10px;\">\r\n														<span class=\"text_container\">\r\n														<multiline>\r\n								        					Praesent tempor ante nec lobortis nulla nada, consectetur adipisicing elit, Lorem ipsum dolor sit amet.\r\n														</multiline>\r\n														</span>\r\n													</div>\r\n						        				</td>\r\n											</tr>\r\n											\r\n											<tr><td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">&nbsp;</td></tr>\r\n																			\r\n										</tbody></table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n							</table>\r\n												\r\n									</td>\r\n								</tr>\r\n								\r\n							</tbody>\r\n							</table>\r\n							\r\n						</td>\r\n					</tr>\r\n                                 <tr>\r\n									<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n\r\n\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					   <tr><td height=\"30\" bgcolor=\"FFFFFF\"></td></tr>\r\n					<!-- //approach -->\r\n					<!-- about -->\r\n						<!-- about -->\r\n						<tr bgcolor=\"FFFFFF\"><td height=\"30\"></td></tr>\r\n						<td bgcolor=\"FFFFFF\">\r\n							<table width=\"560\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"mainContent\" bgcolor=\"FFFFFF\">\r\n								<tbody bgcolor=\"FFFFFF\">\r\n									<tr>\r\n										<td bgcolor=\"FFFFFF\" align=\"center\" mc:edit=\"title1\" class=\"main-header\" style=\"color: #222222; font-size:3em; font-family:Niagara Solid;font-weight:300; letter-spacing:2px;\">\r\n											Our News\r\n										</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n								</tbody>\r\n							</table>\r\n						</td>\r\n						<tr><td bgcolor=\"FFFFFF\" height=\"20\"></td></tr>\r\n						<tr>\r\n							<td bgcolor=\"FFFFFF\">\r\n								<table width=\"560\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container-middle\" bgcolor=\"FFFFFF\">\r\n									<tbody>\r\n										<tr>\r\n											<td bgcolor=\"FFFFFF\">\r\n												<table width=\"250\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"feature mainContent\" bgcolor=\"FFFFFF\">\r\n													<tbody>\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/1.jpg\" alt=\"\" width=\"270\" height=\"200\" />\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												<table width=\"260\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" class=\"feature\" bgcolor=\"FFFFFF\" style=\"vertical-align:top;\">\r\n												<tr>\r\n													<td bgcolor=\"FFFFFF\" align=\"left\" mc:edit=\"title1\" class=\"main-header\" style=\"color:#9b2c3e; font-size:2em; font-family:Niagara Solid;font-weight:300; letter-spacing:2px;\">\r\n														Morbi in facilisis\r\n													</td>\r\n												</tr>\r\n												   <tr>\r\n														<td height=\"10\"></td>\r\n													</tr>\r\n													<td mc:edit=\"text1\" class=\"main-subheader\" style=\"color: #777; font-size: 1em;font-family:Arno Pro; text-align:left; font-weight: normal; line-height: 2em; vertical-align:top;\">\r\n													\r\n														Duis dictum lacinia turpis, non laoreet dolor commodo in. lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.\r\n																<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																	\r\n																		<tr>\r\n																			<td height=\"20\"></td>\r\n																		</tr>\r\n																		<tr>\r\n																			<td width=\"auto\" >\r\n																			   <a href=\"#\" style=\"color:#9b2c3e; text-decoration: none;\" data-color=\"Main Button\">Read More</a>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n								\r\n								<table width=\"560\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"container-middle\" bgcolor=\"FFFFFF\">\r\n									<tbody>\r\n										<tr>\r\n										<td height=\"20\"></td>\r\n									</tr>\r\n										<tr>\r\n											<td bgcolor=\"FFFFFF\">\r\n												<table width=\"260\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"feature\" bgcolor=\"FFFFFF\" style=\"vertical-align:top;\">\r\n												<tr>\r\n													<td bgcolor=\"FFFFFF\" align=\"left\" mc:edit=\"title1\" class=\"main-header\" style=\"color:#9b2c3e; font-size:2em; font-family:Niagara Solid;font-weight:300; letter-spacing:2px;\">\r\n														Morbi in facilisis\r\n													</td>\r\n												</tr>\r\n												<tr>\r\n													<td height=\"10\"></td>\r\n												</tr>\r\n													<td mc:edit=\"text1\" class=\"main-subheader\" style=\"color: #777; font-size: 1em;font-family:Arno Pro; text-align:left; font-weight: normal; line-height: 2em; vertical-align:top;\">\r\n																Duis dictum lacinia turpis, non laoreet dolor commodo in. lobortis id augue vel, elementum pretium lacus. Nunc sagittis ac tellus vel fringilla. Morbi in facilisis enim.\r\n																<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"10\"></td>\r\n																		</tr>\r\n																		<tr>\r\n																			<td width=\"auto\" >\r\n																			   <a href=\"#\" style=\"color:#9b2c3e; text-decoration: none;\" data-color=\"Main Button\">Read More</a>\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n												</table>\r\n													<table width=\"250\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" class=\"feature mainContent\" bgcolor=\"FFFFFF\">\r\n													<tbody>\r\n														<tr>\r\n															<td>\r\n																<img src=\"images/2.jpg\" alt=\"\" width=\"270\" height=\"200\" />\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr bgcolor=\"FFFFFF\"><td height=\"30\"></td></tr>\r\n						<!-- //about -->\r\n						<!-- //about -->\r\n					<!-- gallery -->\r\n						<tr><td height=\"50\" bgcolor=\"f4f4f4\"></td></tr>\r\n						<tr><td bgcolor=\"f4f4f4\">\r\n								<table width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"mainContent\">\r\n									<tr>	\r\n										<td align=\"center\" style=\"font-family: Niagara Solid; font-size:3em; color: #222222; letter-spacing:2px; line-height: 25px;\" class=\"editable\">\r\n\r\n										<!-- Edit Main Title -->\r\n										Gallery\r\n\r\n									</td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"10\"></td>\r\n									</tr>\r\n									<tr>\r\n										<td height=\"30\"></td>\r\n									</tr>\r\n									<tr width=\"600\">\r\n										<td>\r\n\r\n											<table width=\"100\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"twelve\">\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 1 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full image_target\" src=\"images/9.jpg\" alt=\" \" width=\"190\" height=\"250\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td height=\"5\">\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 2 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full\" src=\"images/12.jpg\" alt=\"img 2\" width=\"190\" height=\"150\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n											</table>\r\n\r\n											<!--Space-->\r\n											<table width=\"0\" height=\"2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n\r\n												<tr>\r\n													<td height=\"2\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n														<p style=\"padding-left: 5px;\">&nbsp;\r\n															 </p>\r\n													</td>\r\n												</tr>\r\n\r\n											</table>\r\n											<!--End Space-->\r\n\r\n											<table width=\"100\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"twelve\">\r\n\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 3 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full\" src=\"images/13.jpg\" alt=\"img 3\" width=\"190\" height=\"150\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td height=\"5\">\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 4 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full\" src=\"images/10.jpg\" alt=\"img 4\" width=\"190\" height=\"250\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n											</table>\r\n\r\n											<!--Space-->\r\n											<table width=\"0\" height=\"2\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n\r\n												<tr>\r\n													<td height=\"2\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n														<p style=\"padding-left: 5px;\">&nbsp;\r\n															 </p>\r\n													</td>\r\n												</tr>\r\n\r\n											</table>\r\n											<!--End Space-->\r\n\r\n											<table width=\"100\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"twelve\">\r\n\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 5 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full\" src=\"images/11.jpg\" alt=\"img 5\" width=\"190\" height=\"250\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td height=\"5\">\r\n													</td>\r\n												</tr>\r\n\r\n												<tr>\r\n													<td align=\"center\" style=\"line-height:0px;\">\r\n\r\n														<!-- Place your Custom Image 6 -->\r\n														<img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"full\" src=\"images/14.jpg\" alt=\"img 6\" width=\"190\" height=\"150\">\r\n\r\n													</td>\r\n												</tr>\r\n\r\n											</table>\r\n\r\n										</td>\r\n									</tr>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr><td height=\"50\" bgcolor=\"f4f4f4\"></td></tr>\r\n					<!-- //gallery -->\r\n					<!-- testimonials -->\r\n					<tr bgcolor=\"ffffff\">\r\n						<td>\r\n							<table border=\"0\" width=\"580\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container-middle\">\r\n								\r\n								<tr><td height=\"50\"></td></tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n										\r\n											<tr>\r\n												<td style=\"font-size:3em;color:#333;font-family:Niagara Solid;text-align:center;letter-spacing: 2px;\">Testimonials</td>\r\n											</tr>\r\n										\r\n											\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"30\"></td></tr>\r\n								\r\n								<tr>\r\n									<td>\r\n										<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n											<tr>\r\n												<td>\r\n												\r\n													<table width=\"260\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<td>\r\n															<tr>\r\n																<td style=\"font-size:1em; color:#777;font-family:Arno Pro;line-height:1.8em;background:url(images/8.png) no-repeat 0px 0px; display:block;padding-left:2.5em;\">To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.</td>\r\n															</tr>\r\n														</td>\r\n													</table>\r\n													\r\n													<table width=\"30\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<tr>\r\n															<td width=\"30\" height=\"10\" align=\"center\">\r\n															</td>\r\n														</tr>\r\n													</table>\r\n													\r\n													<table width=\"260\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n														<td>\r\n															<tr>\r\n																<td style=\"font-size:1em; color:#777;font-family:Arno Pro;line-height:1.8em;background:url(images/8.png) no-repeat 0px 0px; display:block;padding-left:2.5em;\">To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.</td>\r\n															</tr>\r\n														</td>\r\n													</table>\r\n													\r\n												</td>\r\n											</tr>\r\n										</table>\r\n									</td>\r\n								</tr>\r\n								\r\n								<tr><td height=\"50\"></td></tr>\r\n								\r\n							</table>\r\n						</td>\r\n					</tr>\r\n					<!-- //testimonials -->\r\n\r\n					<!-- contact -->\r\n						<tr bgcolor=\"181818\">\r\n							<td>\r\n								<table class=\"container\" width=\"560\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n					\r\n\r\n									<tr>\r\n										<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n									</tr>\r\n\r\n								<tr>\r\n									<td>\r\n\r\n										<table class=\"twelve\" width=\"270\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n											<tr>\r\n												<td align=\"center\" style=\"line-height: 0px;\">\r\n												   \r\n													<table class=\"twelve\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n												   \r\n														<tr>\r\n															<td height=\"4\"></td>\r\n														</tr>\r\n\r\n														<tr>\r\n															<td style=\"font-family: Niagara Solid; font-size:2em; color: #ffffff; line-height:2em;letter-spacing:2px;\">\r\n																About Us\r\n															</td>\r\n														</tr>\r\n											\r\n													</table>\r\n\r\n												</td>\r\n											</tr>    \r\n\r\n											<tr>\r\n												<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #999999; line-height: 1.8em;\" data-size=\"Contact Text\" data-color=\"Contact Text\">\r\n													<!-- Edit About Text -->\r\n													Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga Et harum quidem.\r\n\r\n												</td>\r\n											</tr>\r\n\r\n\r\n											<tr>\r\n												<td height=\"24\" style=\"font-size: 1px; line-height: 24;\">&nbsp;</td>\r\n											</tr>\r\n\r\n\r\n											<tr>\r\n												<td align=\"center\" style=\"line-height: 0px;\">\r\n												   \r\n													<table class=\"twelve\" width=\"75\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n														<tr>\r\n															<td align=\"center\">\r\n																<table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n																	<tr>\r\n																		<td>\r\n\r\n																			<!-- Place URL to Social Media -->\r\n																			<a href=\"#\">\r\n\r\n																				<!-- Place Your Social Media Icon-->\r\n																				<img width=\"30\" height=\"30\" src=\"images/f1.png\" alt=\" \" />\r\n\r\n																			</a>\r\n\r\n																		</td>\r\n																		<td>\r\n																			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>\r\n																		<td>\r\n\r\n																			<!-- Place URL to Social Media -->\r\n																			<a href=\"#\">\r\n\r\n																				<!-- Place Your Social Media Icon-->\r\n																				<img width=\"30\" height=\"30\" src=\"images/t1.png\" alt=\" \" />\r\n\r\n																			</a>\r\n\r\n																		</td>\r\n																		<td>\r\n																			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>\r\n																		<td>\r\n\r\n																			<!-- Place URL to Social Media -->\r\n																			<a href=\"#\">\r\n\r\n																				<!-- Place Your Social Media Icon-->\r\n																				<img width=\"30\" height=\"30\" src=\"images/p1.png\" alt=\" \" />\r\n\r\n																			</a>\r\n\r\n																		</td>\r\n																		<td>\r\n																			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>\r\n																		<td>\r\n\r\n																			<!-- Place URL to Social Media -->\r\n																			<a href=\"#\">\r\n\r\n																				<!-- Place Your Social Media Icon-->\r\n																				<img width=\"30\" height=\"30\" src=\"images/g1.png\" alt=\" \" />\r\n\r\n																			</a>\r\n\r\n																		</td>\r\n																	</tr>\r\n\r\n																</table>\r\n															</td>\r\n														</tr>\r\n\r\n													</table>\r\n												</td>\r\n											</tr>\r\n\r\n\r\n										</table>\r\n\r\n										<!-- SPACE -->\r\n										<table class=\"twelve\" width=\"1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n											<tr>\r\n												<td width=\"1\" height=\"30\" style=\"font-size: 30px; line-height: 30px;\"></td>\r\n											</tr>\r\n\r\n										</table>\r\n										<!-- END SPACE -->\r\n\r\n										<table class=\"twelve\" width=\"250\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n\r\n\r\n											<tr>\r\n											<td style=\"font-family: Niagara Solid; font-size:2em; color: #ffffff; line-height:2em;letter-spacing:2px;\">\r\n													<!-- Edit Title-->\r\n													Contact Us\r\n\r\n												</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td height=\"15\" style=\"font-size: 1px; line-height: 15px;\">&nbsp;</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #fff; line-height:2em;letter-spacing:2px;\">\r\n													<!-- Edit Text -->\r\n													Address :\r\n\r\n												</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #999999; line-height:2em;\">\r\n													<!-- Edit Text -->\r\n													75/4 Square Avenue, New York,\r\n\r\n												</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #999999; line-height:2em;\">\r\n													<!-- Edit Text -->\r\n													London \r\n\r\n												</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #ffffff; line-height:2em;\">\r\n													<!-- Edit Text -->\r\n													Email :\r\n\r\n												</td>\r\n											</tr>\r\n\r\n											<tr>\r\n												<td style=\"font-family:Arno Pro; font-size: 1em; color: #999999;line-height:2em;\">\r\n													<a href=\"mailto:info@example.com\" style=\"font-family:Arno Pro; font-size: 1em; color: #999999;text-decoration:none;\">\r\n													<!-- Edit Text -->\r\n													my mail.com\r\n\r\n												</td>\r\n											</tr>\r\n\r\n\r\n										</table>\r\n\r\n									</td>\r\n								</tr>\r\n\r\n								<tr>\r\n									<td height=\"50\" style=\"font-size: 1px; line-height: 50px;\">&nbsp;</td>\r\n								</tr>\r\n\r\n\r\n							</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td align=\"center\" bgcolor=\"#202020\" data-bgcolor=\"Footer BG\">\r\n\r\n								<table width=\"560\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"container\">\r\n								   \r\n									<tr>\r\n										<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n									</tr>\r\n									\r\n									<tr>\r\n										<td>\r\n\r\n											<table class=\"twelve\" width=\"350\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n												<tr>\r\n													<td style=\"font-family:Arno Pro; line-height: 42px;text-align: center; font-size: 1em; color: #ffffff;\"class=\"editable\">\r\n														\r\n														<!-- Edit Copyright Text -->\r\n														Copyrights © 2015 Interim. Design by <a href=\"http://onyxdatasystems.com/\" style=\"color:#ec3003; font-size: 1em; text-decoration:none;\">Onyx DS</a>\r\n\r\n\r\n													</td>\r\n												</tr>\r\n											</table>\r\n\r\n											<!-- SPACE -->\r\n											<table width=\"1\" height=\"10\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\r\n												<tr>\r\n													<td height=\"10\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">&nbsp;\r\n														\r\n													</td>\r\n												</tr>\r\n											</table>\r\n											<!-- END SPACE -->\r\n\r\n										</td>\r\n									</tr>\r\n									\r\n									<tr>\r\n										<td height=\"10\" style=\"font-size: 1px; line-height: 10px;\">&nbsp;</td>\r\n									</tr>\r\n									\r\n								</table>\r\n\r\n							</td>\r\n						</tr>\r\n					<!-- //contact -->\r\n				</table>\r\n				 <tr bgcolor=\"#eeeeee\"><td height=\"35\"></td></tr>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</body>\r\n</html>', '2016-08-31 09:54:55');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(9, 'Wave', 'wave', NULL, '<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\"\"http://www.w3.org/TR/REC-html40/loose.dtd\">\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n<meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0;\">\r\n<link href=\'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800\' rel=\'stylesheet\' type=\'text/css\'>\r\n<base target=\"_blank\">\r\n<title>Wave Email Template</title>\r\n<style type=\"text/css\">\r\n\r\nbody *{font-family: \'Open Sans\', Arial, sans-serif !important}\r\n\r\ndiv, p, a, li, td { -webkit-text-size-adjust:none; }\r\n\r\n*{-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;}\r\ntd{word-break: break-word;}\r\na{word-break: break-word; text-decoration: none; color: inherit;}\r\n\r\nbody .ReadMsgBody\r\n{width: 100%; background-color: #ffffff;}\r\nbody .ExternalClass\r\n{width: 100%; background-color: #ffffff;}\r\nbody{width: 100%; height: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;}\r\nhtml{ background-color:#ffffff; width: 100%;}   \r\n\r\nbody img {user-drag: none; -moz-user-select: none; -webkit-user-drag: none;}\r\nbody .hover:hover {opacity:0.85;filter:alpha(opacity=85);}\r\nbody td img:hover {opacity:0.85;filter:alpha(opacity=85);}\r\n\r\nbody .image600 img {width: 600px; height: auto;}\r\nbody .image180 img {width: 180px; height: auto;}\r\nbody .image269 img {width: 269px; height: auto;}\r\nbody .sign img {width: 145px; height: auto;}\r\nbody .icons43 img {width: 43px; height: auto;}\r\nbody .clients125 img {width: 125px; height: auto;}\r\nbody .icons54 img {width: 54px; height: auto;}\r\nbody .icon54 img {width: 54px; height: auto;}\r\nbody .logo img {width: 213px; height: auto;}\r\n\r\n\r\nbody .pic180 {width:180px;height:154px;overflow:hidden;}\r\nbody .grow180 img{width:180px;height:154px;\r\n-webkit-transition:all 1.5s ease;-moz-transition:all 1s ease;-o-transition:all 1s ease;-ms-transition:all 1s ease;transition:all 1s ease;}\r\nbody .grow180 img:hover{width:250px;height:210px;}\r\n\r\nbody .pic600 {width:600px;height:324px;overflow:hidden;}\r\nbody .grow600 img{width:600px;height:324px;\r\n-webkit-transition:all 1.5s ease;-moz-transition:all 1s ease;-o-transition:all 1s ease;-ms-transition:all 1s ease;transition:all 1s ease;}\r\nbody .grow600 img:hover{width:730px;height:410px;}\r\n\r\nbody .pic269 {width:269px;height:179px;overflow:hidden;}\r\nbody .grow269 img{width:269px;height:179px;\r\n-webkit-transition:all 1.5s ease;-moz-transition:all 1s ease;-o-transition:all 1s ease;-ms-transition:all 1s ease;transition:all 1s ease;}\r\nbody .grow269 img:hover{width:370px;height:250px;}\r\n</style>\r\n\r\n<style type=\"text/css\">@media only screen and (max-width: 640px){\r\n		body{width:auto;}\r\n		body table[class=full] {width: 100%!important; clear: both; }\r\n		body td[class=pad20] {padding-left: 20px; padding-right: 20px; clear: both; }\r\n		body table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }\r\n		body td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }\r\n		body .erase {display: none;}\r\n		body .image600 img {width: 100%!important; height: auto!important;}\r\n		body .image180 img {width: 180px!important; height: auto!important;}\r\n		body .image269 img {width: 269px!important; height: auto!important;}\r\n		body table[class=table33] {width: 30%!important;}\r\n		body .table33 img {width: 100%!important;}\r\n		body table[class=showMob] {width: 5%!important;}\r\n		body .pic180 {width: 100%!important;height: auto!important;}\r\n        body .pic600 {width: 100%!important;height: auto!important;}\r\n		body .grow600 img{-webkit-transition:all 0s ease!important;-moz-transition:all 0s ease!important;-o-transition:all 0s ease!important;-ms-transition:all 0s ease!important;transition:all 0s ease!important;}\r\n        body .grow600 img:hover{{opacity:0.85!important;filter:alpha(opacity=85);}}\r\n        body .pic269 {width: 100%!important;height: auto!important;}\r\n		body .grow269 img{width: 100%!important; height: auto!important;}\r\n        body .grow269 img:hover{opacity:0.85!important;filter:alpha(opacity=85);}\r\n        body table[class=table269] {width: 100%!important;}\r\n		body .table269 img {width: 100%!important;}\r\n}</style>\r\n\r\n<style type=\"text/css\">@media only screen and (max-width: 479px){ \r\n		body{width:auto;}\r\n		body table[class=full] {width: 100%!important; clear: both; }\r\n		body td[class=pad20] {padding-left: 20px; padding-right: 20px; clear: both; }\r\n		body table[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }\r\n		body td[class=fullCenter] {width: 100%!important; text-align: center!important; clear: both; }\r\n		body .erase {display: none;}\r\n		body .image600 img {width: 100%!important; height: auto!important;}\r\n		body .image180 img {width: 100%!important; height: auto!important;}\r\n		body .image269 img {width: 100%!important; height: auto!important;}\r\n		body table[class=table33] {width: 100%!important;}\r\n		body .table33 img {width: 100%!important;}\r\n		body table[class=showMob] {width: 100%!important;}\r\n		body .font30 {font-size: 30px!important; line-height: 38px!important;}\r\n		body .pic180 {width: 100%!important;height: auto!important;}\r\n		body .grow180 img{-webkit-transition:all 0s ease!important;-moz-transition:all 0s ease!important;-o-transition:all 0s ease!important;-ms-transition:all 0s ease!important;transition:all 0s ease!important;}\r\n        body .grow180 img:hover{{opacity:0.85!important;filter:alpha(opacity=85);}}\r\n        body .pic600 {width: 100%!important;height: auto!important;}\r\n		body .grow600 img{-webkit-transition:all 0s ease!important;-moz-transition:all 0s ease!important;-o-transition:all 0s ease!important;-ms-transition:all 0s ease!important;transition:all 0s ease!important;}\r\n        body .grow600 img:hover{{opacity:0.85!important;filter:alpha(opacity=85);}}\r\n        body .pic269 {width: 100%!important;height: auto!important;}\r\n		body .grow269 img{width: 100%!important; height: auto!important;}\r\n        body .grow269 img:hover{opacity:0.85!important;filter:alpha(opacity=85);}\r\n        body table[class=table269] {width: 100%!important;}\r\n		body .table269 img {width: 100%!important;}\r\n}</style>\r\n\r\n</head>\r\n<body style=\'margin: 0; padding: 0;\'>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#313131\">\r\n	<tbody><tr>\r\n		<td align=\"center\" style=\"background-image: url(\'images/header_bg.jpg\'); background-position: center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;\" class=\"pad20\">\r\n			<!--[if gte mso 9]> <v:rect xmlns:v=\"urn:schemas-microsoft-com:vml\" fill=\"true\" stroke=\"false\" style=\"mso-width-percent:1000;\"><v:fill type=\"tile\" src=\"images/header_bg.jpg\"/><v:textbox style=\"mso-fit-shape-to-text:true\" inset=\"0,0,0,0\"><![endif]--><div>\r\n\r\n			<!-- Wrapper -->\r\n			<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td width=\"100%\" align=\"center\">\r\n						\r\n						<!-- Start Header Text -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" valign=\"middle\" class=\"logo\" align=\"center\">\r\n									\r\n									<!-- Header Text --> \r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">	\r\n										<tbody><tr>\r\n											<td height=\"60\" valign=\"middle\" width=\"100%\" style=\"text-align: center;\" class=\"fullCenter\">\r\n												<a href=\"#\"><img width=\"213\" src=\"images/logo.png\" alt=\"\" border=\"0\"></a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"150\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 38px; color: #ffffff; line-height: 44px; font-weight: 300; text-transform: uppercase; letter-spacing: 1px;\" class=\"fullCenter\">\r\n												the <span style=\"font-weight: 600; color: #85ca83;\"> adventure</span> begins\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #85ca83; line-height: 24px; font-weight: 400;\" class=\"fullCenter\">\r\n												<span style=\"border-bottom: 1px solid #85ca83;\">Jason Standford</span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"18\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #ffffff; line-height: 24px; font-weight: 300;\" class=\"fullCenter\">\r\n												Freelance <b>UI/UX</b> &amp; <b>Graphic Designer</b>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"8\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #ffffff; line-height: 24px; font-weight: 300;\" class=\"fullCenter\">\r\n												in Amsterdam, The Netherlands\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"120\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n																	\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Header Text -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table>\r\n			</div><!--[if gte mso 9.]>\r\n        	</v:textbox>\r\n       		</v:fill></v:rect>\r\n       		<![endif]-->\r\n\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td width=\"100%\" align=\"center\">\r\n						\r\n						<!-- Start Header Text -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" valign=\"middle\" align=\"center\">\r\n									\r\n									<!-- Header Text --> \r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												Online Template Builder with Great Features...\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"20\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n																	\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Header Text -->\r\n						\r\n						<!-- Text + Sign -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"20\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" valign=\"middle\" class=\"sign\" align=\"center\">\r\n									\r\n									<!-- Header Text --> \r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod.\r\nDonec id elit non mi porta gravida at eget metus. Aenean lacinia bibendum nulla.\r\n<br><br>\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo.\r\n<br><br>\r\nAenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Praesent commodo cursus magna, vel scelerisque nisl.\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"50\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" style=\"text-align: left;\">\r\n												<table width=\"145\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"full\">\r\n													<tbody><tr>\r\n														<td width=\"145\">\r\n															<a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/sign.png\" width=\"145\" alt=\"\" border=\"0\"></a>\r\n														</td>\r\n													</tr>\r\n												</tbody></table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"80\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n																	\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Header Text -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n			\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" bgcolor=\"#f8f8f8\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n									\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" class=\"image600\" align=\"center\">\r\n									\r\n									<!-- Image Long 1 -->\r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow600 pic600\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_600.jpg\" alt=\"\" border=\"0\" width=\"600\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"40\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												we are DynamicXX, You can hire us\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"27\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod.\r\nDonec id elit non mi porta gravida at eget metus. Aenean lacinia bibendum nulla.\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"70\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" class=\"image180\" align=\"center\">\r\n									\r\n									<!-- Col 1 Image 1 -->\r\n									<table width=\"184\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"table33\">\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow180 pic180\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_180_1.jpg\" alt=\"\" border=\"0\" width=\"180\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"28\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #8b8b8b; line-height: 26px; font-weight: 300; text-transform: uppercase;\">\r\n												Clean design\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"20\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies \r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"showMob\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Col 2 Image 2 -->\r\n									<table width=\"184\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"table33\">\r\n										\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow180 pic180\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_180_2.jpg\" alt=\"\" border=\"0\" width=\"180\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"28\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #8b8b8b; line-height: 26px; font-weight: 300; text-transform: uppercase;\">\r\n												About us\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"20\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"showMob\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Col 3 Image 3 -->\r\n									<table width=\"184\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"table33\">\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow180 pic180\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_180_3.jpg\" alt=\"\" border=\"0\" width=\"180\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"28\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #8b8b8b; line-height: 26px; font-weight: 300; text-transform: uppercase;\">\r\n												since 2015\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"20\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricie\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"50\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" bgcolor=\"#85ca83\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n								\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" align=\"center\">\r\n																\r\n									<!-- Text Left -->\r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n													<tbody><tr>\r\n														<td width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 40px; color: #ffffff; line-height: 48px; vertical-align: middle; text-transform: uppercase; font-weight: 300;\" class=\"font30\">\r\n															why choose us?								\r\n														</td>\r\n													</tr>\r\n												</tbody></table>					\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n					\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" class=\"image180\" align=\"center\">\r\n									\r\n									<!-- Col 1 Image 1 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												Modern style\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"27\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra etiam vulputate\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Col 3 Image 3 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												fresh news\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"27\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra etiam vulputate\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"30\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"50\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" bgcolor=\"#f8f8f8\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n						\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" align=\"center\">\r\n									\r\n									<!-- Space -->\r\n									<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"80\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Image 269 -1 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow269 pic269\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_269_1.jpg\" width=\"269\" height=\"auto\" alt=\"\" border=\"0\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"35\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Text -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												hire our team\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"27\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra etiam vulputate\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n			\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n						\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" align=\"center\">\r\n									\r\n									<!-- Space -->\r\n									<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"80\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Image 269 - 2 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" class=\"image269\">\r\n												<span class=\"grow269 pic269\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_269_2.jpg\" width=\"269\" height=\"auto\" alt=\"\" border=\"0\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"35\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Text -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												Love your work\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"27\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra etiam vulputate\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#313131\">\r\n	<tbody><tr>\r\n		<td align=\"center\" width=\"100%\" style=\"background-image: url(\'images/seperator_1.jpg\'); background-position: center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;\" class=\"pad20\">\r\n		<!--[if gte mso 9]> <v:rect xmlns:v=\"urn:schemas-microsoft-com:vml\" fill=\"true\" stroke=\"false\" style=\"mso-width-percent:1000;\"><v:fill type=\"tile\" src=\"images/seperator_1.jpg\"/><v:textbox style=\"mso-fit-shape-to-text:true\" inset=\"0,0,0,0\"><![endif]--><div>\r\n		\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td class=\"icon54\" align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n								\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"fullCenter\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" style=\"text-align: center;\" align=\"center\" class=\"icon54\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/twitter_icon_54.png\" width=\"54\" height=\"auto\" style=\"width: 54px; height: auto;\" alt=\"\" border=\"0\" class=\"hover\"></a></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"40\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #ffffff; line-height: 30px; vertical-align: middle; font-weight: 300; word-break: break-word;\">\r\n									<span style=\"color: #97e695;\">About 3 days ago:</span>\r\n									Improve your Google results! Contact a #Google Consultant <a href=\"#\" style=\"color: #97e695; text-decoration: none;\">http://seowebmarketing.co.uk/packages</a> #SEO #marketing&nbsp;\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"20\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; color: #ffffff; line-height: 30px; vertical-align: middle; font-weight: 300;\">\r\n									<a href=\"#\" style=\"color: #ffffff; text-decoration: none;\">@GoogleExpertUK</a>&nbsp;							\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n					\r\n					</td>\r\n				</tr>\r\n			</tbody></table>\r\n			</div><!--[if gte mso 9.]>\r\n        		</v:textbox>\r\n       			</v:fill></v:rect>\r\n       		<![endif]-->\r\n			\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n									\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" class=\"image600\" align=\"center\">\r\n									\r\n									<!-- Image Long 1 -->\r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												let’s write a blog...\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"10\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<span style=\"color: #9b9b9b;\">April</span> 28th, 2014\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<!-- Image 600 - 2 -->\r\n										<tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow600 pic600\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_600_2.jpg\" alt=\"\" border=\"0\" width=\"600\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod.\r\nDonec id elit non mi porta gravida at eget metus. Aenean lacinia bibendum nulla.\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n									</tbody></table>\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n						\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" align=\"center\">\r\n									\r\n									<!-- Space -->\r\n									<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Left Column Image 269 - 3 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												Blog about us\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"10\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<span style=\"color: #9b9b9b;\">April</span> 29th, 2014\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<!-- Image 269 - 3 -->\r\n										<tr>\r\n											<td width=\"100%\">\r\n												<span class=\"grow269 pic269\" style=\"display: block;\"><a href=\"#\" style=\"text-decoration: none;\"><img src=\"images/image_269_3.jpg\" alt=\"\" border=\"0\" width=\"269\" height=\"auto\" class=\"hover\"></a></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra.\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n									<!-- Space -->\r\n									<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td width=\"100%\" height=\"35\"></td>\r\n										</tr>\r\n									</tbody></table><!-- End Space -->\r\n									\r\n									<!-- Right Column - Image 269 - 4 -->\r\n									<table width=\"270\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n										<tbody><tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #8b8b8b; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n												awesome code\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"10\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<span style=\"color: #9b9b9b;\">April</span> 30th, 2014\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<!-- Image 269 - 4 -->\r\n										<tr>\r\n											<td width=\"100%\" style=\"text-align: left;\">\r\n												<span class=\"grow269 pic269\" style=\"display: block;\"><img src=\"images/image_269_4.jpg\" alt=\"\" border=\"0\" width=\"269\" height=\"auto\" class=\"hover\"></span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"25\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #b1b1b1; line-height: 22px; font-weight: 400;\">\r\n												Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra.\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"15\"></td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"middle\" width=\"100%\" style=\"text-align: left; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #85ca83; line-height: 22px; font-weight: 700;\">\r\n												<a href=\"#\" style=\"text-decoration: none; color: #85ca83;\">Read more...</a>\r\n											</td>\r\n										</tr>\r\n									</tbody></table>\r\n									\r\n								</td>\r\n							</tr>\r\n						</tbody></table><!-- End Wrapper 2 -->\r\n						\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#313131\">\r\n	<tbody><tr>\r\n		<td align=\"center\" width=\"100%\" valign=\"top\" style=\"background-image: url(\'images/pricing_bg.jpg\'); background-position: center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;\" class=\"pad20\">\r\n		\r\n			<!-- Pricing Text -->\r\n			<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n				<tbody><tr>\r\n					<td width=\"100%\" height=\"60\"></td>\r\n				</tr>\r\n				<tr>\r\n					<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 24px; color: #ffffff; line-height: 32px; font-weight: 300; text-transform: uppercase;\">\r\n						pricing tables\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td width=\"100%\" height=\"60\"></td>\r\n				</tr>\r\n			</tbody></table>\r\n								\r\n			<!-- Wrapper -->\r\n			<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td width=\"100%\" align=\"center\">\r\n						\r\n						<!-- Pricing 1 -->\r\n						<table width=\"180\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #ffffff;\" bgcolor=\"#ffffff\" class=\"fullCenter\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 22px; line-height: 26px; padding: 0px 5px; font-weight: 300;\">\r\n									Basic\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #ffffff; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; line-height: 22px; padding: 0px 5px; text-transform: uppercase; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									$29.99 <span style=\"font-size: 14px;\">p/m</span>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>10</b></span> Projects\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>Free</b></span> Shipping\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>20</b></span> Modules\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"15\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #ffffff; line-height: 22px; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									<a href=\"#\" style=\"text-decoration: none; color: #ffffff;\">Learn more!</a>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"17\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n						</tbody></table>		\r\n								\r\n						<!-- Space -->\r\n						<table width=\"30\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"30\">									\r\n								</td>\r\n							</tr>\r\n						</tbody></table>\r\n						\r\n						<!-- Pricing 2 -->\r\n						<table width=\"180\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #ffffff;\" bgcolor=\"#ffffff\" class=\"fullCenter\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 22px; line-height: 26px; padding: 0px 5px; font-weight: 300;\">\r\n									Regular\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #ffffff; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; line-height: 22px; padding: 0px 5px; text-transform: uppercase; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									$59.99 <span style=\"font-size: 14px;\">p/m</span>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>20</b></span> Projects\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>Free</b></span> Shipping\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>40</b></span> Modules\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"15\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #ffffff; line-height: 22px; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									<a href=\"#\" style=\"text-decoration: none; color: #ffffff;\">Learn more!</a>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"17\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n						</tbody></table>\r\n						\r\n						<!-- Space -->\r\n						<table width=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"30\">									\r\n								</td>\r\n							</tr>\r\n						</tbody></table>\r\n						\r\n						<!-- Pricing 3 -->\r\n						<table width=\"180\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"right\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #ffffff;\" bgcolor=\"#ffffff\" class=\"fullCenter\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 22px; line-height: 26px; padding: 0px 5px; font-weight: 300;\">\r\n									Pro\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #ffffff; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 18px; line-height: 22px; padding: 0px 5px; text-transform: uppercase; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									$89.99 <span style=\"font-size: 14px;\">p/m</span>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"10\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>Unlimited</b></span> Projects\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>Free</b></span> Shipping\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\">									\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"1\" bgcolor=\"#f8f8f8\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" style=\"text-align: center; color: #8b8b8b; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 13px; line-height: 18px; padding: 2px 5px; font-weight: 400;\">\r\n									<span style=\"color: #272727;\"><b>Unlimited</b></span> Modules\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"18\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"15\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n							<tr>\r\n								<td valign=\"middle\" width=\"100%\" style=\"text-align: center; font-family: Helvetica, Arial, sans-serif, \'Open Sans\'; font-size: 14px; color: #ffffff; line-height: 22px; font-weight: 700;\" bgcolor=\"#85ca83\">\r\n									<a href=\"#\" style=\"text-decoration: none; color: #ffffff;\">Learn more!</a>\r\n								</td>\r\n							</tr>\r\n							<tr>\r\n								<td width=\"100%\" height=\"17\" bgcolor=\"#85ca83\"></td>\r\n							</tr>\r\n						</tbody></table>\r\n						\r\n					</td>\r\n				</tr>\r\n			</tbody></table><!-- End Wrapper -->\r\n			\r\n			<!-- Space -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td width=\"100%\" height=\"80\"></td>\r\n				</tr>\r\n			</tbody></table><!-- End Space -->\r\n		\r\n		</td>\r\n	</tr>\r\n</table>\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\" bgcolor=\"#ffffff\">\r\n	<tbody><tr>\r\n		<td width=\"100%\" valign=\"top\" align=\"center\" class=\"pad20\">\r\n		\r\n			<!-- Wrapper -->\r\n			<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n				<tbody><tr>\r\n					<td align=\"center\">\r\n					\r\n						<!-- Space -->\r\n						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" height=\"80\"></td>\r\n							</tr>\r\n						</tbody></table><!-- End Space -->\r\n									\r\n						<!-- Wrapper -->\r\n						<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"full\">\r\n							<tbody><tr>\r\n								<td width=\"100%\" class=\"clients125\" align=\"center\">\r\n									\r\n									<!-- Clients -->\r\n									<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"fullCenter\">\r\n										<tbody', '2016-08-31 09:55:09');
INSERT INTO `emailtemplates` (`template_id`, `template_name`, `template_folder`, `description`, `content`, `timestamp`) VALUES
(10, 'Mail Art', 'mailart', NULL, '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html><head><meta content=\"exported via StampReady\" name=\"sr_export\"><meta content=\"exported via StampReady\" name=\"sr_export\"><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1\"><style type=\"text/css\">\r\n      div, p, a, li, td {\r\n        -webkit-text-size-adjust:none;\r\n      }\r\n      *{\r\n        -webkit-font-smoothing: ;\r\n        -moz-osx-font-smoothing: grayscale;\r\n      }\r\n      .ReadMsgBody{\r\n        width: 100%;\r\n        background-color: #ffffff;\r\n      }\r\n      .ExternalClass{\r\n        width: 100%;\r\n        background-color: #ffffff;\r\n      }\r\n      /*body*/ #tc_central{\r\n        width: 100%;\r\n        height: 100%;\r\n        background-color: #ffffff;\r\n        margin:0;\r\n        padding:0;\r\n        -webkit-font-smoothing: ;\r\n      }\r\n      /*html*/ #tc_central{\r\n        width: 100%;\r\n        background-color: #ffffff;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_novalight\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-light-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_nova_rgregular\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-regular-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_novasemibold\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-semibold-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_nova_rgbold\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-bold-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_novathin\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-thin-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      @font-face {\r\n        font-family: \'proxima_novaextrabold\';\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot\');\r\n        src: url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.eot?#iefix\') format(\'embedded-opentype\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff2\') format(\'woff2\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.woff\') format(\'woff\'),url(\'http://rocketway.net/themebuilder/products/font/proximanova-extrabold-webfont.ttf\') format(\'truetype\');\r\n        font-weight: normal;\r\n        font-style: normal;\r\n      }\r\n      p {\r\n        padding: 0!important;\r\n        margin-top: 0!important;\r\n        margin-right: 0!important;\r\n        margin-bottom: 0!important;\r\n        margin-left: 0!important;\r\n      }\r\n      .hover:hover {\r\n        opacity:0.85;\r\n        filter:alpha(opacity=85);\r\n      }\r\n      .underline:hover {\r\n        text-decoration: underline!important;\r\n      }\r\n      .brightness:hover {\r\n        filter: brightness(80%);\r\n        -webkit-filter: brightness(80%);\r\n        -moz-filter: brightness(80%);\r\n        -o-filter: brightness(80%);\r\n        -ms-filter: brightness(80%);\r\n      }\r\n      .opacity img{\r\n        opacity: 0.2;\r\n        filter: alpha(opacity=20);\r\n      }\r\n      a:hover.opacity img{\r\n        opacity: 1;\r\n        filter: alpha(opacity=100);\r\n      }\r\n      a.opacity:hover img{\r\n        opacity: 1;\r\n        filter: alpha(opacity=100);\r\n      }\r\n      .jump:hover {\r\n        opacity:0.75;\r\n        filter:alpha(opacity=75);\r\n        padding-top: 10px!important;\r\n      }\r\n      a#rotator img {\r\n        -webkit-transition: all 1s ease-in-out;\r\n        -moz-transition: all 1s ease-in-out;\r\n        -o-transition: all 1s ease-in-out;\r\n        -ms-transition: all 1s ease-in-out;\r\n      }\r\n      a#rotator img:hover {\r\n        -webkit-transform: rotate(360deg);\r\n        -moz-transform: rotate(360deg);\r\n        -o-transform: rotate(360deg);\r\n        -ms-transform: rotate(360deg);\r\n      }\r\n      #box {\r\n        -webkit-animation: bounceInLeftFast 2s;\r\n        -moz-animation: bounceInLeftFast 2s;\r\n        -o-animation: bounceInLeftFast 2s;\r\n        animation: bounceInLeftFast 2s;\r\n      }\r\n      @-webkit-keyframes bounceInLeftFast {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      @-moz-keyframes bounceInLeftFast {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      @-o-keyframes bounceInLeftFast {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      #box2 {\r\n        -webkit-animation: bounceInLeftSlow 3s;\r\n        -moz-animation: bounceInLeftSlow 3s;\r\n        -o-animation: bounceInLeftSlow 3s;\r\n        animation: bounceInLeftSlow 3s;\r\n      }\r\n      @-webkit-keyframes bounceInLeftSlow {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      @-moz-keyframes bounceInLeftSlow {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      @-o-keyframes bounceInLeftSlow {\r\n        0% {\r\n          opacity: 0;\r\n          -webkit-transform: translateY(-2000px);\r\n          transform: translateY(-2000px);\r\n        }\r\n        60% {\r\n          opacity: 1;\r\n          -webkit-transform: translateY(20px);\r\n          transform: translateY(20px);\r\n        }\r\n        80% {\r\n          -webkit-transform: translateY(-5px);\r\n          transform: translateY(-5px);\r\n        }\r\n        100% {\r\n          -webkit-transform: translateY(0);\r\n          transform: translateY(0);\r\n        }\r\n      }\r\n      #logo img {\r\n        width: 125px;\r\n        height: auto;\r\n      }\r\n      #icon12 img {\r\n        width: 12px;\r\n        height: auto;\r\n      }\r\n      .icon28 img {\r\n        width: 28px;\r\n        height: auto;\r\n      }\r\n      .image185 img {\r\n        width: 185px;\r\n        height: auto;\r\n      }\r\n      .image100 img {\r\n        width: 100px;\r\n        height: auto;\r\n      }\r\n      .image270 img {\r\n        width: 270px;\r\n        height: auto;\r\n      }\r\n      .image600 img {\r\n        width: 600px;\r\n        height: auto;\r\n      }\r\n      .check img {\r\n        width: 13px;\r\n        height: auto;\r\n      }\r\n      \r\n    </style><style>\r\n      .ReadMsgBody {\r\n        width: 100%;\r\n        background-color: #ffffff;\r\n      }\r\n      .ExternalClass {\r\n        width: 100%;\r\n        background-color: #ffffff;\r\n      }\r\n      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {\r\n        line-height: 100%;\r\n      }\r\n      html {\r\n        width: 100%;\r\n      }\r\n      body {\r\n        -webkit-text-size-adjust: none;\r\n        -ms-text-size-adjust: none;\r\n        margin: 0;\r\n        padding: 0;\r\n      }\r\n      table {\r\n        border-spacing: 0;\r\n        table-layout: fixed;\r\n        margin: 0 auto;\r\n      }\r\n      table table table {\r\n        table-layout: auto;\r\n      }\r\n      img {\r\n        display: block !important;\r\n        overflow: hidden !important;\r\n      }\r\n      table td {\r\n        border-collapse: collapse;\r\n      }\r\n      .yshortcuts a {\r\n        border-bottom: none !important;\r\n      }\r\n      a {\r\n        color: #3498db;\r\n        text-decoration: none;\r\n      }\r\n      .textbutton a {\r\n        font-family: \'open sans\', arial, sans-serif !importat;\r\n        color: #ffffff !important;\r\n      }\r\n      .footer-link a {\r\n        color: #979797 !important;\r\n      }\r\n      /*Responsive*/@media only screen and (max-width: 590px) {\r\n        body {\r\n          width: auto !important;\r\n        }\r\n        table[class=\"zay600\"] {\r\n          width: 450px !important;\r\n        }\r\n        table[class=\"zay-inner\"] {\r\n          width: 90% !important;\r\n        }\r\n        table[class=\"zay2-2\"] {\r\n          width: 47% !important;\r\n          text-align: left !importatrtant;\r\n        }\r\n        table[class=\"zay3-3\"] {\r\n          width: 100% !important;\r\n          text-align: center !important;\r\n        }\r\n        table[class=\"zay4-4\"] {\r\n          width: 29% !important;\r\n        }\r\n        table[class=\"zay5-5\"] {\r\n          width: 64% !important;\r\n          text-align: left !important;\r\n        }\r\n        td[class=\"header-td\"] {\r\n          height: 50px !important;\r\n          max-height: 50px !important;\r\n          line-height: 0px !important;\r\n        }\r\n        td[class=\"td-hide\"] {\r\n          height: 0px !important;\r\n          max-height: 0px !important;\r\n          line-height: 0px !important;\r\n        }\r\n        /* Image */img[class=\"img1\"] {\r\n          width: 100% !important;\r\n          height: auto !important;\r\n        }\r\n      }\r\n      @media only screen and (max-width: 479px) {\r\n        body {\r\n          width: auto !important;\r\n        }\r\n        table[class=\"zay600\"] {\r\n          width: 290px !important;\r\n        }\r\n        table[class=\"zay-inner\"] {\r\n          width: 82% !important;\r\n        }\r\n        table[class=\"zay2-2\"] {\r\n          width: 100% !important;\r\n          text-align: center !important;\r\n        }\r\n        table[class=\"zay3-3\"] {\r\n          width: 100% !important;\r\n          text-align: center !important;\r\n        }\r\n        table[class=\"zay4-4\"] {\r\n          width: 100% !important;\r\n        }\r\n        table[class=\"zay5-5\"] {\r\n          width: 100% !important;\r\n          text-align: center !important;\r\n        }\r\n        td[class=\"header-td\"] {\r\n          height: 50px !important;\r\n          max-height: 20px !important;\r\n          line-height: 0px !important;\r\n        }\r\n        td[class=\"td-hide\"] {\r\n          height: 0px !important;\r\n          max-height: 0px !important;\r\n          line-height: 0px !important;\r\n        }\r\n        /* image */img[class=\"img1\"] {\r\n          width: 100% !important;\r\n        }\r\n      }\r\n      /* Moving Dots */    .dot1 {\r\n        -webkit-animation: dot1 18s linear infinite;\r\n        animation: dot1 18s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot1 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 70%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot1 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 70%;\r\n        }\r\n      }\r\n      .dot2 {\r\n        -webkit-animation: dot2 10s linear infinite;\r\n        animation: dot2 10s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot2 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 10%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 50%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot2 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 10%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 50%;\r\n        }\r\n      }\r\n      .dot3 {\r\n        -webkit-animation: dot3 14s linear infinite;\r\n        animation: dot3 14s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot3 {\r\n        0% {\r\n          right: 0%;\r\n          top: 10%;\r\n        }\r\n        100% {\r\n          right: 100%;\r\n          top: 60%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot3 {\r\n        0% {\r\n          right: 0%;\r\n          top: 10%;\r\n        }\r\n        100% {\r\n          right: 100%;\r\n          top: 60%;\r\n        }\r\n      }\r\n      .dot4 {\r\n        -webkit-animation: dot4 8s linear infinite;\r\n        animation: dot4 8s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot4 {\r\n        0% {\r\n          right: 40%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          right: 60%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot4 {\r\n        0% {\r\n          right: 40%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          right: 60%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      .dot5 {\r\n        -webkit-animation: dot5 30s linear infinite;\r\n        -webkit-animation-delay: 2s;\r\n        animation: dot5 30s linear infinite;\r\n        animation-delay: 2s;\r\n      }\r\n      @-webkit-keyframes dot5 {\r\n        0% {\r\n          right: 80%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          right: 50%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot5 {\r\n        0% {\r\n          right: 80%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          right: 50%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      .dot6 {\r\n        -webkit-animation: dot6 60s linear infinite;\r\n        -webkit-animation-delay: 4s;\r\n        animation: dot6 linear infinite;\r\n        animation-delay: 4s;\r\n      }\r\n      @-webkit-keyframes dot6 {\r\n        0% {\r\n          right: 0%;\r\n          top: 40%;\r\n        }\r\n        100% {\r\n          right: 100%;\r\n          top: 60%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot6 {\r\n        0% {\r\n          right: 0%;\r\n          top: 40%;\r\n        }\r\n        100% {\r\n          right: 100%;\r\n          top: 60%;\r\n        }\r\n      }\r\n      .dot7 {\r\n        -webkit-animation: dot7 16s linear infinite;\r\n        animation: dot7 16s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot7 {\r\n        0% {\r\n          left: 5%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          left: 20%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot7 {\r\n        0% {\r\n          left: 5%;\r\n          bottom: 0%;\r\n        }\r\n        100% {\r\n          left: 20%;\r\n          bottom: 100%;\r\n        }\r\n      }\r\n      .dot8 {\r\n        -webkit-animation: dot8 6s linear infinite;\r\n        -webkit-animation-delay: 3s;\r\n        animation: dot8 6s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot8 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 30%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 10%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot8 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 30%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 10%;\r\n        }\r\n      }\r\n      .dot9 {\r\n        -webkit-animation: dot9 22s linear infinite;\r\n        animation: dot9 22s linear infinite;\r\n      }\r\n      @-webkit-keyframes dot9 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 60%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 90%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot9 {\r\n        0% {\r\n          left: 0%;\r\n          bottom: 60%;\r\n        }\r\n        100% {\r\n          left: 100%;\r\n          bottom: 90%;\r\n        }\r\n      }\r\n      .dot10 {\r\n        -webkit-animation: dot10 14s linear infinite;\r\n        -webkit-animation-delay: 2s;\r\n        animation: dot10 14s linear infinite;\r\n        animation-delay: 2s;\r\n      }\r\n      @-webkit-keyframes dot10 {\r\n        0% {\r\n          right: 5%;\r\n          top: 0%;\r\n        }\r\n        100% {\r\n          right: 45%;\r\n          top: 100%;\r\n        }\r\n      }\r\n      @-moz-keyframes dot10 {\r\n        0% {\r\n          right: 5%;\r\n          top: 0%;\r\n        }\r\n        100% {\r\n          right: 45%;\r\n          top: 100%;\r\n        }\r\n      }\r\n      \r\n    </style></head><body> 								 									 					 				 				<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/blwyYpgMzk1ts0Xj7ehTA6IcGuVJ8URF.jpg\" data-module=\"module 1_79880\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(244, 67, 54);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"90%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td align=\"center\">\r\n                 <table class=\"MAS-600\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <table align=\"left\" class=\"MAS3-3\" width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;width: 16px;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img0.png\" width=\"8\" height=\"16\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"25\">\r\n                           </td>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img1.png\" width=\"16\" height=\"13\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"25\">\r\n                           </td>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img2.png\" width=\"15\" height=\"16\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"25\">\r\n                           </td>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img3.png\" width=\"15\" height=\"15\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"25\">\r\n                           </td>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img4.png\" width=\"16\" height=\"10\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"25\">\r\n                           </td>\r\n                           <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img5.png\" width=\"16\" height=\"16\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table class=\"MAS3-3\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                         <!-- menu -->\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table data-bgcolor=\"Main025\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(222, 27, 12);\">\r\n                               <tr>\r\n                                 <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #FFFFFF; line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                                   Download Now                                                            </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <!-- end menu -->\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/3qdIPACuMwv6VB7pJEbka2DLX8ltFQgZ.jpg\" data-module=\"module 2_37465\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"     position: relative;    opacity: 1;    z-index: 0;         background-color: rgb(255, 255, 255); \">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"90%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <table align=\"left\" class=\"zay3-3\" width=\"120\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- logo -->\r\n                   <tr>\r\n                     <td align=\"center\" valign=\"middle\" style=\"line-height:0px;\">\r\n                       <img style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img6.png\" width=\"90\" height=\"27\" alt=\"img\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end logo -->\r\n                 </table>\r\n                 <!--Space-->\r\n                 <table width=\"1\" height=\"30\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                       <p style=\"padding-left: 24px;\">\r\n                         &nbsp;                                           </p>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table align=\"right\" class=\"zay3-3\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td height=\"43\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- logo -->\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table class=\"zay-inner\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#ffffff;\" data-link-color=\"Link\" data-color=\"Menu\" data-size=\"Menu\" data-min=\"12\" data-max=\"16\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; padding-right: 10px;\">\r\n                             <a href=\"#\" style=\"color: rgb(171, 171, 171);\" data-color=\"Menu Link\">\r\n                               HOME                             </a>\r\n                           </td>\r\n                           <td data-link-style=\"text-decoration:none; color:#ffffff;\" data-link-color=\"Link\" data-color=\"Menu\" data-size=\"Menu\" data-min=\"12\" data-max=\"16\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; padding-left: 10px; padding-right: 10px;\">\r\n                             <a href=\"#\" style=\"color: rgb(171, 171, 171);\" data-color=\"Menu Link\">\r\n                               ABOUT US                             </a>\r\n                           </td>\r\n                           <td data-link-style=\"text-decoration:none; color:#ffffff;\" data-link-color=\"Link\" data-color=\"Menu\" data-size=\"Menu\" data-min=\"12\" data-max=\"16\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; padding-left: 10px; padding-right: 10px;\">\r\n                             <a href=\"#\" style=\"color: rgb(171, 171, 171);\" data-color=\"Menu Link\">\r\n                               &nbsp;PORTFOLIO                             </a>\r\n                           </td>\r\n                           <td data-link-style=\"text-decoration:none; color:#ffffff;\" data-link-color=\"Link\" data-color=\"Menu\" data-size=\"Menu\" data-min=\"12\" data-max=\"16\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; padding-left: 10px;\">\r\n                             <a href=\"#\" style=\"color: rgb(171, 171, 171);\" data-color=\"Menu Link\">\r\n                               CONTACTS                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end logo -->\r\n                 </table>\r\n                 <!--End Space-->\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/AEmOMN6x4wQ0hV7qdZH5fXlFSRr1WeDc.jpg\" data-module=\"Header_86699\" data-bgcolor=\"Header\" data-bg=\"Header\" style=\"position: relative; opacity: 1; z-index: 0; background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/05/QDKhlwAmGTs7RurCLdzxgiBoZ9jP8O52.jpg); background-size: cover; background-position: 20% 10%;\" bgcolor=\"#3b3b3b\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/05/QDKhlwAmGTs7RurCLdzxgiBoZ9jP8O52.jpg\">\r\n       <tr>\r\n         <td class=\"zay600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-size: cover;background-color: rgba(0, 0, 0, 0.1);\">\r\n           <table cellspacing=\"0\" cellpadding=\"0\" align=\"center\" border=\"0\" width=\"90%\" class=\"zay600\">\r\n             <!-- img -->\r\n             <!-- end logo -->\r\n             <tr>\r\n               <td height=\"300\" class=\"header-td\">\r\n               </td>\r\n             </tr>\r\n             <!-- subtitle -->\r\n             <tr>\r\n               <td>\r\n                 <!-- content -->\r\n                 <table class=\"zay600\" width=\"600\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr align=\"left\">\r\n                     <td>\r\n                       <table class=\"class-inner\" width=\"270px\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table data-bgcolor=\"Main1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                               <tr>\r\n                                 <td align=\"center\" height=\"38\" style=\"font-family: Montserrat, sans-serif; font-size: 15px; font-weight: 800; color: #FFFFFF;  padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                                   LASTEST EXPLORER                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\" style=\"font-size: 35px; line-height: 20px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table border=\"0\" width=\"100%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"container580\">\r\n                         <tr>\r\n                           <td align=\"left\" style=\"color: #ffffff; font-size: 23px; font-family: Montserrat, sans-serif;  line-height: 29px;font-weight: 900;\">\r\n                             <div class=\"editable_text\" style=\"\">\r\n                               <multiline>\r\n                                 CHANGE YOUR PERSPECTIVE                               </multiline>\r\n                             </div>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table border=\"0\" width=\"100%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"container580\" style=\"     color: rgb(255, 255, 255);     font-size: 15px;          font-family: \'Open Sans\', Arial, sans-serif;     font-style: normal;     font-weight: 400;     letter-spacing: 0px;     text-transform: none; \">\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <div class=\"editable_text\" style=\"\">\r\n                               <!-- ======= section text ======= -->\r\n                               <span class=\"text_container\">\r\n                               </span>\r\n                               <multiline>\r\n                                 A few minutes is all it takes to import a fully equipped demo and&nbsp;                               </multiline>\r\n                             </div>\r\n                             <div class=\"editable_text\" style=\"\">\r\n                               <multiline>\r\n                                 set up your website.                                                              </multiline>\r\n                             </div>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"35\" style=\"font-size: 35px; line-height: 35px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end content -->\r\n               </td>\r\n             </tr>\r\n             <!-- end subtitle -->\r\n             <tr>\r\n               <td height=\"10\" class=\"header-td\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/zH4SvTKJ01IomadANwylEX7BGZtM9RcU.jpg\" data-module=\"module 4_64207\" data-bgcolor=\"Background\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);-webkit-box-shadow: rgba(0, 0, 0, 0.11) 0px 1px 7px 0px;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\">\r\n                 <table class=\"zay600\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table class=\"MAS-600\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <table align=\"left\" class=\"MAS3-3\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                               <tr>\r\n                                 <td data-color=\"Date2\" data-size=\"Date2\" data-link-style=\"text-decoration:none; color:#3498db;\" style=\"color: rgb(244, 67, 54); font-size: 22px; font-family: Montserrat, sans-serif; line-height: 29px; font-weight: 900;\" align=\"left\">\r\n                                   G??ET FREE 30 DAY TRIAL                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"center\" style=\"background-color: rgb(255, 255, 255);\">\r\n                                   <table class=\"zay3-3\" align=\"left\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                     <tr>\r\n                                       <td align=\"center\">\r\n                                         <table class=\"zay3-3\" width=\"100%\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                           <tr>\r\n                                             <td>\r\n                                               <table class=\"zay-inner\" align=\"left\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                                 <!-- title -->\r\n                                                 <tr>\r\n                                                   <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline\" data-size=\"Headline\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(145, 145, 145); font-size: 15px; font-weight: 400;\">\r\n                                                     Lorem ipsum dolor sit amet.                                                   </td>\r\n                                                 </tr>\r\n                                                 <!-- end title -->\r\n                                               </table>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <table class=\"MAS3-3\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                               <!-- menu -->\r\n                               <tr>\r\n                                 <td align=\"right\">\r\n                                   <table data-bgcolor=\"Main1\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(244, 67, 54);\">\r\n                                     <tr>\r\n                                       <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #FFFFFF; line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                                         Download Now                                                                  </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <!-- end menu -->\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\" \">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/4mNEja8QWlGqhniSrbJxAL7fUPVDH2Bw.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" data-module=\"module 5_56817\" style=\"position: relative; opacity: 1; z-index: 0;background-color: rgb(245, 245, 245);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table border=\"0\" align=\"center\" width=\"80%\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n                 &nbsp;                           </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\" style=\"color: #343434; font-size: 20px; font-family: Ubuntu, Calibri, sans-serif; font-weight: 500; line-height: 24px;\" class=\"title_color\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                   <span class=\"text_container\">\r\n                     Just on the amazing email                   </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                 Build your beautiful UI, the way you want it, with Land.io               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n                 &nbsp;                           </td>\r\n             </tr>\r\n             <tr>\r\n               <!-- ======= feature image 51px width ======= -->\r\n               <td align=\"center\" class=\"section-img\">\r\n                 <a style=\"display: block; color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                   <img src=\"images/img7.png\" style=\"display: block; width: 590px;    height: 313px;\" width=\"590\" border=\"0\" alt=\"section image\" class=\"img1\">\r\n                 </a>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/DcB4bwCejlEuNoaqZKthgn8FvMTRdXmi.jpg\" data-module=\"6_11966\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"80%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                       Invert Fearures                                          </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img8.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(64, 64, 64); line-height: 29px;\">\r\n                       Silky Parallax                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img9.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(64, 64, 64); line-height: 29px;\">\r\n                       Unique Concepts                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img10.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(64, 64, 64); line-height: 29px;\">\r\n                       Modular Design                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/kwGQrmX3uj1i7AvyOcKPfhexY24qbFgz.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#f3f4f9\" class=\"bg_color\" data-module=\"module 7_61573\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td>\r\n           <table border=\"0\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\" bgcolor=\"#f3f4f9\">\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\" width=\"50%\">\r\n                   <!-- ======= section image ====== -->\r\n                   <tr>\r\n                     <td align=\"right\" class=\"section800_img\" style=\" \">\r\n                       <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"zay3-3\">\r\n                         <img src=\"images/img11.jpg\" style=\"display: block; width: 100%;height: 100%;\" class=\"align-center\" width=\"450\" border=\"0\" alt=\"section image\" height=\"100%\">\r\n                       </a>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"50%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td>\r\n                       <table border=\"0\" width=\"70%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <tr>\r\n                           <td>\r\n                             <table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay-inner\">\r\n                               <tr class=\"hide-800\">\r\n                                 <td height=\"80\" style=\"font-size: 40px; line-height: 40px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <img src=\"images/img12.png\" alt=\"icon\" width=\"80\" height=\"80\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"20\" style=\"font-size: 40px; line-height: 20px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #1c3c4c; font-size: 33px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 900;\" class=\"title_color\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                                     <span class=\"text_container\">\r\n                                       NETWORX                                                                                                               </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #1c3c4c; font-size: 24px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 400;\" class=\"title_color\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\" style=\"\">\r\n                                     <span class=\"text_container\">\r\n                                       SOCIAL APPLICATION                                                                                                               </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"25\" style=\"font-size: 25px; line-height: 25px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                                   Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo boothscenester.&nbsp;                                                                                                         <br>\r\n                                   Thundercats keytar terry richardson, biodiesel banksy food truck .                                                                  </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"50\" style=\"font-size: 25px; line-height: 25px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr align=\"left\">\r\n                                 <td>\r\n                                   <table class=\"class-inner\" width=\"50%\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td data-link-style=\"text-decoration:none; color:#FFFFFF;\" data-link-color=\"Text Link\" align=\"center\" height=\"30\" style=\"border-radius: 40px; border: 1px solid #DCDCDC;padding: 8px;font-family: \'Open Sans\', Arial, sans-serif; color: #212121; font-size:14px; font-weight: 500;\">\r\n                                         <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; font-weight: 400;\" data-color=\"Text Link2\" data-size=\"Main Text2\">\r\n                                         </a>\r\n                                         <singleline>\r\n                                           Case Study                                                                                                                           </singleline>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/P8VX3vIk49GqEchdgylAeNaObfSR5Fj2.jpg\" data-module=\"module 8_51242\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"80%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(207, 207, 207); line-height: 39.15px;\">\r\n                       Invert Fearures                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img13.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Silky Parallax                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                       </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img14.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Unique Concepts                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                       </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img15.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Modular Design                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"30\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img16.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Silky Parallax                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                       </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img17.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Unique Concepts                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"30\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\" style=\"line-height: 0;\">\r\n                       &nbsp;                                       </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img18.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Feature01\" data-size=\"Feature01\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; font-weight: 400; color: rgb(17, 17, 17); line-height: 29px;\">\r\n                       Modular Design                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(36, 30, 30); line-height: 22.1px;\">\r\n                       Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo booth .                                       </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/9LFNt73kHPyUowz8a0WldGmVuc624vYR.jpg\" data-module=\"9_83868\" data-bgcolor=\"seperator-5\" data-bg=\"seperator-5\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#f3f4f9\" background=\"http://www.stampready.net/do/uploads/2015/09/06/1203433946New-Data-on-Digital-Marketing-Jobs3.jpg\" style=\"background-image: url(http://www.stampready.net/do/uploads/2015/09/06/1203433946New-Data-on-Digital-Marketing-Jobs3.jpg);  background-position: center;background-repeat: no-repeat;      background-size: initial;\">\r\n       <tr>\r\n         <td bgcolor=\"#f3f4f9\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: rgba(0, 0, 0, 0.4);background-size: cover;\" width=\"100%\">\r\n           <!-- content -->\r\n           <table class=\"zay3-3\" width=\"10%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"10\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <table class=\"zay600\" width=\"50%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding: 0px 15px; \">\r\n             <tr>\r\n               <td height=\"100\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Title1a\" data-size=\"Titl1e\" style=\"    font-family: \'Open Sans\', sans-serif;      font-size: 25px;      font-weight: 100;      color: rgb(255, 255, 255);      letter-spacing: 0px;      line-height: 36.25px;\">\r\n                 Perfect Solution for Small Businesses                                                 </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Content1z\" data-size=\"Content1z\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(255, 255, 255); line-height: 22.1px;\">\r\n                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                              </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"30\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\">\r\n                 <table data-bgcolor=\"Main1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(244, 67, 54);\">\r\n                   <tr>\r\n                     <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #FFFFFF; line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                       <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 2\" data-size=\"Button 2\">\r\n                         View Plans &amp; Pricing                                                                     </a>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"100\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <!-- end content -->\r\n         </td>\r\n       </tr>\r\n       <!-- end subtitle -->\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/UDd98RiGy3mt1A5sFLCqvMSxQT2WfuJa.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"ffffff\" class=\"bg_color\" data-module=\"module 10_33986\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td height=\"100\" style=\"font-size: 50px; line-height: 50px;\">\r\n           &nbsp;                                                            </td>\r\n       </tr>\r\n       <tr>\r\n         <td>\r\n           <table border=\"0\" align=\"center\" width=\"600\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" width=\"40%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td align=\"left\" style=\"color: rgba(99, 97, 97, 0.71); font-size: 45px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 800; /* line-height: 22px; */\" class=\"main-header title_color\">\r\n                       <!-- ======= section text ====== -->\r\n                       <div class=\"editable_text\" style=\"line-height: 48px;\">\r\n                         First Mail Features                                                                     </div>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"60%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td align=\"left\" style=\"color: #76828b; font-size: 15px; font-family: \'Open Sans\', Calibri, sans-serif;  /* line-height: 28px; */\" class=\"text_color\">\r\n                       <!-- ======= section subtitle ====== -->\r\n                       <div class=\"editable_text\" style=\"/* line-height: 28px; */\">\r\n                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus.&nbsp;                                                                     </div>\r\n                       <div class=\"editable_text\" style=\"/* line-height: 28px; */\">\r\n                         <br>\r\n                       </div>\r\n                       <div class=\"editable_text\" style=\"/* line-height: 28px; */\">\r\n                         Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                                                     </div>\r\n                       <div class=\"editable_text\" style=\"/* line-height: 28px; */\">\r\n                         <br>\r\n                       </div>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td height=\"100\" style=\"font-size: 50px; line-height: 50px;\">\r\n           &nbsp;                                                            </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/vX4TiD7tBkHpqfC9grJzyx56KL8cNdRF.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F44336\" class=\"bg2_color\" data-module=\"module 11_61356\">\r\n       <tr>\r\n         <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n           &nbsp;                        </td>\r\n       </tr>\r\n       <tr>\r\n         <td align=\"center\" class=\"zay600\">\r\n           <table border=\"0\" align=\"center\" width=\"590\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" width=\"270\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"left\" width=\"90\">\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                               <img src=\"images/img19.png\" style=\"display: block; width: auto;\" width=\"60\" border=\"0\" alt=\"\">\r\n                             </a>\r\n                           </td>\r\n                           <td align=\"left\" style=\"color: #FFFFFF; font-size: 18px; font-family: \'Open Sans\', Arial, sans-serif; mso-line-height-rule: exactly; line-height: 22px;\" class=\"title_color\">\r\n                             <!-- ======= section header ======= -->\r\n                             <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                               <span class=\"text_container\">\r\n                                 Edi Norton                                                                  <br>\r\n                                 <span style=\"color: #FFFFFF; font-weight: 700; font-size: 12px;\" class=\"link_color\">\r\n                                   CEO Founder                                                                  </span>\r\n                               </span>\r\n                             </div>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img20.png\" style=\"display: block; width: 100%;\" width=\"1OO%\" height=\"9\" border=\"0\" alt=\"\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\" style=\"color: #FFFFFF; font-size: 15px; font-family: \'Open Sans\', Arial, sans-serif; mso-line-height-rule: exactly; \" class=\"text_color\">\r\n                       <div class=\"editable_text\" style=\"line-height: 20px;\">\r\n                         We are a digital design agency. We receive faxes from about upcoming trends in design                                                                   </div>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img21.png\" style=\"display: block; width: 100%;\" width=\"1OO%\" height=\"1\" alt=\"\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"2\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td width=\"2\" height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"270\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"left\" width=\"90\">\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                               <img src=\"images/img22.png\" style=\"display: block; width: auto;\" width=\"60\" border=\"0\" alt=\"\">\r\n                             </a>\r\n                           </td>\r\n                           <td align=\"left\" style=\"color: #FFFFFF; font-size: 18px; font-family: \'Open Sans\', Arial, sans-serif; mso-line-height-rule: exactly; line-height: 22px;\" class=\"title_color\">\r\n                             <!-- ======= section header ======= -->\r\n                             <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                               <span class=\"text_container\">\r\n                                 Evan Green                                                                  <br>\r\n                                 <span style=\"color: #FFFFFF; font-weight: 700; font-size: 12px;\" class=\"link_color\">\r\n                                   CEO Founder                                                                  </span>\r\n                               </span>\r\n                             </div>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img23.png\" style=\"display: block; width: 100%;\" width=\"1OO%\" height=\"9\" border=\"0\" alt=\"\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\" style=\"color: #FFFFFF; font-size: 15px; font-family: \'Open Sans\', Arial, sans-serif; mso-line-height-rule: exactly; \" class=\"text_color\">\r\n                       <div class=\"editable_text\" style=\"line-height: 20px;\">\r\n                         We are a digital design agency. We receive faxes from about upcoming trends in design                                                                   </div>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img24.png\" style=\"display: block; width: 100%;\" width=\"1OO%\" height=\"1\" alt=\"\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td height=\"60\" style=\"font-size: 60px; line-height: 60px;\">\r\n           &nbsp;                        </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/tFCi38YD10E5WxajJZSPdrO4pXTcRIel.jpg\" data-module=\"module 12_23141\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img25.jpg\" alt=\"img\" width=\"287\" height=\"192\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       UNLOCKING BRAIN SECRETS                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail1\" data-size=\"Detail1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       4 October 2016 / Design                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(189, 189, 189); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\" width=\"25\">\r\n                             <img src=\"images/img26.png\" alt=\"\" style=\"width: 15px;height: 15px;\">\r\n                           </td>\r\n                           <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link x2\" data-color=\"Headline x2\" data-size=\"Headline x2\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 12px; font-weight: normal; line-height: 20.4px;\">\r\n                             <singleline>\r\n                               &nbsp;Learn More                                                                                                                 </singleline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/RlSGbqJ9xsIoHZDp1YnEQWc0LXM5y2tK.jpg\" data-module=\"module 13_30244\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img27.png\" alt=\"img\" width=\"287\" height=\"192\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       TRANSITIONS IN UX DESIGN                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail1\" data-size=\"Detail1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       4 October 2016 /&nbsp;Design                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(189, 189, 189); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\" width=\"25\">\r\n                             <img src=\"images/img28.png\" alt=\"\" style=\"width: 15px;height: 15px;\">\r\n                           </td>\r\n                           <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link x2\" data-color=\"Headline x2\" data-size=\"Headline x2\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 12px; font-weight: normal; line-height: 20.4px;\">\r\n                             <singleline>\r\n                               &nbsp;Learn More                                                                                                                 </singleline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/cP5gsXGVmehE7nuySilqwjDW4LZIMJR2.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#f3f4f9\" class=\"bg_color\" data-module=\"module 14_86214\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td>\r\n           <table border=\"0\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\" bgcolor=\"#f3f4f9\">\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\" width=\"50%\">\r\n                   <!-- ======= section image ====== -->\r\n                   <tr>\r\n                     <td align=\"right\" class=\"section800_img\" style=\" \">\r\n                       <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"zay3-3\">\r\n                         <img src=\"images/img29.png\" style=\"display: block; width: 100%;height: 100%;\" class=\"align-center\" width=\"450\" border=\"0\" alt=\"section image\" height=\"100%\">\r\n                       </a>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"50%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td>\r\n                       <table border=\"0\" width=\"90%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <tr>\r\n                           <td>\r\n                             <table border=\"0\" width=\"70%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay-inner\">\r\n                               <tr class=\"hide-800\">\r\n                                 <td height=\"80\" style=\"font-size: 40px; line-height: 40px;\">\r\n                                   &nbsp;                                                               </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <img src=\"images/img30.png\" alt=\"icon\" width=\"80\" height=\"80\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"20\" style=\"font-size: 40px; line-height: 20px;\">\r\n                                   &nbsp;                                                               </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #1c3c4c; font-size: 33px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 900;\" class=\"title_color\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                                     <span class=\"text_container\">\r\n                                       NETWORX                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #1c3c4c; font-size: 24px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 400;\" class=\"title_color\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\">\r\n                                     <span class=\"text_container\">\r\n                                       SOCIAL APPLICATION                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"25\" style=\"font-size: 25px; line-height: 25px;\">\r\n                                   &nbsp;                                                               </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                                   Readymade marfa blog, pitchfork food truck tofu jean shorts homo organic photo boothscenester.&nbsp;                                   <br>\r\n                                   Thundercats keytar terry richardson, biodiesel banksy food truck .                                                               </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"50\" style=\"font-size: 25px; line-height: 25px;\">\r\n                                   &nbsp;                                                               </td>\r\n                               </tr>\r\n                               <tr align=\"left\">\r\n                                 <td>\r\n                                   <table class=\"class-inner\" width=\"50%\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td data-link-style=\"text-decoration:none; color:#FFFFFF;\" data-link-color=\"Text Link\" align=\"center\" height=\"30\" style=\"border-radius: 40px; border: 1px solid #DCDCDC;padding: 8px;font-family: \'Open Sans\', Arial, sans-serif; color: #212121; font-size:14px; font-weight: 500;\">\r\n                                         <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; font-weight: 400;\" data-color=\"Text Link2\" data-size=\"Main Text2\">\r\n                                         </a>\r\n                                         <singleline>\r\n                                           Case Study                                                                               </singleline>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                                   &nbsp;                                                               </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/J1IgosnF5NCPUqbT8iZeKMGAkSzxywd3.jpg\" data-module=\"module 15_13533\" style=\"border-collaps:collaps;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"zay600\">\r\n       <!-- Start Works -->\r\n       <tr>\r\n         <td data-border-bottom-color=\"Divider\" style=\"border-bottom-width: 0px; border-bottom-style: none; border-bottom-color: rgb(184, 184, 184);\" class=\"zay600\">\r\n           <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\">\r\n             <tr>\r\n               <td height=\"51\" width=\"600\">\r\n               </td>\r\n             </tr>\r\n             <!-- Start Title -->\r\n             <tr>\r\n               <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                 Portfolio                                                          </td>\r\n             </tr>\r\n             <!-- End Title -->\r\n             <tr>\r\n               <td class=\"mid\" height=\"35\" width=\"50\">\r\n               </td>\r\n             </tr>\r\n             <!-- Start Works -->\r\n             <tr>\r\n               <td>\r\n                 <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay600\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\">\r\n                   <tr>\r\n                     <td>\r\n                       <table style=\"border-collaps:collaps;\" class=\"zay600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"600\">\r\n                         <tr>\r\n                           <td>\r\n                             <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"396\">\r\n                               <tr>\r\n                                 <td>\r\n                                   <table style=\"border-collaps:collaps;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                     <tr>\r\n                                       <td>\r\n                                         <table style=\"margin: 0 auto; border-collaps:collaps;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td style=\"line-height:0;\">\r\n                                               <a href=\"#\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\">\r\n                                                 <img class=\"img1\" alt=\"music\" src=\"images/img31.jpg\">\r\n                                               </a>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <table style=\"margin: 0 auto; border-collaps:collaps;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td height=\"11\">\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <table style=\"margin: 0 auto; border-collaps:collaps;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td>\r\n                                               <table style=\"border-collaps:collaps;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                                 <tr>\r\n                                                   <td>\r\n                                                     <table class=\"zay3-3\" style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"193\">\r\n                                                       <tr>\r\n                                                         <td style=\"line-height:0;\">\r\n                                                           <a href=\"#\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\">\r\n                                                             <img alt=\"img\" class=\"img1\" src=\"images/img32.jpg\">\r\n                                                           </a>\r\n                                                         </td>\r\n                                                       </tr>\r\n                                                     </table>\r\n                                                     <table style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"10\">\r\n                                                       <tr>\r\n                                                         <td height=\"11\" width=\"10\">\r\n                                                         </td>\r\n                                                       </tr>\r\n                                                     </table>\r\n                                                     <table class=\"zay3-3\" style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"193\">\r\n                                                       <tr>\r\n                                                         <td style=\"line-height:0;\">\r\n                                                           <a href=\"#\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\">\r\n                                                             <img alt=\"music\" class=\"img1\" src=\"images/img33.jpg\">\r\n                                                           </a>\r\n                                                         </td>\r\n                                                       </tr>\r\n                                                     </table>\r\n                                                   </td>\r\n                                                 </tr>\r\n                                               </table>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"11\">\r\n                               <tr>\r\n                                 <td height=\"10\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"193\">\r\n                               <tr>\r\n                                 <td>\r\n                                   <table style=\"border-collaps:collaps;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                     <tr>\r\n                                       <td>\r\n                                         <table class=\"tahalf2\" style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td class=\"block\" style=\"line-height:0;\">\r\n                                               <a href=\"#\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\">\r\n                                                 <img class=\"img1\" alt=\"music\" src=\"images/img34.jpg\">\r\n                                               </a>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <table style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" class=\"midl2\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td height=\"11\">\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <table class=\"tahalf2\" style=\"margin: 0 auto; border-collaps:collaps; clear:none;\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                                           <tr>\r\n                                             <td class=\"block\" style=\"line-height:0;\">\r\n                                               <a href=\"#\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\">\r\n                                                 <img class=\"img1\" alt=\"music\" src=\"images/img35.jpg\">\r\n                                               </a>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"44\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                               View More                                                                                       </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <!-- End Works -->\r\n             <tr>\r\n               <td height=\"100\" width=\"600\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <!-- End Works -->\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/Iy5bSdoQisMfVcWNHZCP7Xnl6p8T90jq.jpg\" data-module=\"module 16_96559\" data-bgcolor=\"seperator-2\" data-bg=\"seperator-2\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#f3f4f9\" background=\"http://www.stampready.net/do/uploads/2015/09/03/512257175shutterstock_139247045-1074x483.jpg\" style=\"background-image: url(http://www.stampready.net/do/uploads/2015/09/03/512257175shutterstock_139247045-1074x483.jpg); background-size: cover; background-position: 50% 100%;\">\r\n       <!-- end logo -->\r\n       <!-- subtitle -->\r\n       <tr>\r\n         <td bgcolor=\"#f3f4f9\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: rgba(0, 0, 0, 0.4);background-size: cover;\" width=\"100%\">\r\n           <!-- content -->\r\n           <table class=\"zay3-3\" width=\"40%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"10\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <table class=\"zay600\" width=\"50%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding: 0px 15px; \">\r\n             <tr>\r\n               <td height=\"100\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Title1a\" data-size=\"Titl1e\" style=\"    font-family: \'Open Sans\', sans-serif;      font-size: 25px;      font-weight: 100;      color: rgb(255, 255, 255);      letter-spacing: 0px;      line-height: 36.25px;\">\r\n                 Perfect Solution for Small Businesses                                                 </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Content1z\" data-size=\"Content1z\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(255, 255, 255); line-height: 22.1px;\">\r\n                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                              </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"30\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\">\r\n                 <table data-bgcolor=\"Main1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(244, 67, 54);\">\r\n                   <tr>\r\n                     <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #FFFFFF; line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                       <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 2\" data-size=\"Button 2\">\r\n                         View Plans &amp; Pricing                                                                     </a>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"100\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <!-- end content -->\r\n         </td>\r\n       </tr>\r\n       <!-- end subtitle -->\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/5kPxTcq0OghVnveYsAGHdFC6IfMRymwE.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"ffffff\" class=\"bg_color\" data-module=\"module 17_37561\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table border=\"0\" align=\"center\" width=\"590\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                 Our Blog                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <!-- ======= feature image 51px width ======= -->\r\n               <td align=\"center\" class=\"section-img\">\r\n                 <a style=\"display: block; color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                   <img src=\"images/img36.png\" style=\"display: block; width: 590px;    height: 313px;\" width=\"590\" border=\"0\" alt=\"section image\" class=\"img1\">\r\n                 </a>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"35\" style=\"font-size: 35px; line-height: 35px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\" style=\"color: #343434; font-size: 20px; font-family: Ubuntu, Calibri, sans-serif; font-weight: 500; line-height: 24px;\" class=\"title_color\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                   <span class=\"text_container\">\r\n                     Just on the amazing email                                                         </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\" style=\"color: #76828b; font-size: 13px; font-family: \'Open Sans\', Calibri, sans-serif; font-weight: 600; font-style: italic; line-height: 22px;\" class=\"text_color\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 22px\">\r\n                   <span class=\"text_container\">\r\n                     By Jhon /                                                                <span style=\"color: #F44336;\" class=\"link_color\">\r\n                       18 January 2015                                                               </span>\r\n                   </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\" style=\"color: #76828b; font-size: 15px; font-family: \'Open Sans\', Calibri, sans-serif; font-weight: 600; line-height: 28px;\" class=\"text_color\">\r\n                 <!-- ======= section subtitle ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 28px;\">\r\n                   <span class=\"text_container\">\r\n                     Lorem ipsum dolor sit amet poro consectetur adip iscing eli tempor suscipit poro consectetur enim sit amet poro consectetur adip iscing eli tempor suscipit poro consectetu.                                                         </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"25\" style=\"font-size: 25px; line-height: 25px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"left\">\r\n                 <table data-bgcolor=\"Main\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                   <tr>\r\n                     <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                       <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                         Read More                                                                     </a>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td height=\"65\" style=\"font-size: 65px; line-height: 65px;\">\r\n           &nbsp;                                 </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/ypMsW32gboTmnNe7fkJPwHFG6RCx0aih.jpg\" data-module=\"module 18_24518\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img37.jpg\" alt=\"img\" width=\"287\" height=\"192\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail\" data-size=\"Detail\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       BY JOHN DOE | 4 May 2015                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"5\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       HISTORY OF BROOKLYN                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                  </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table width=\"24\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img38.png\" alt=\"img\" width=\"287\" height=\"192\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail\" data-size=\"Detail\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       BY JOHN DOE | 4 May 2015                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"5\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       PENANG STREET FOOD                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                  </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/rVR2hoyLcHOa93F4P5fqumjvS8bp1CYG.jpg\" data-module=\"module 19_39159\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img39.jpg\" alt=\"img\" width=\"183\" height=\"122\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"25\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet dosus et consectetur dui sepritas aros dos quis del nulla elit.                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                               Read More                                                                                       </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img40.jpg\" alt=\"img\" width=\"183\" height=\"122\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"25\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet dosus et consectetur dui sepritas aros dos quis del nulla elit.                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                               Read More                                                                                       </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"1\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img41.jpg\" alt=\"img\" width=\"183\" height=\"122\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"25\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet dosus et consectetur dui sepritas aros dos quis del nulla elit.                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                               Read More                                                                                       </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/HCRoOcnWPVyx9aTe1D0wflMZ2qjQ7hIu.jpg\" data-module=\"module 20_9339\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       JOSH SMITH – ALREADY THERE                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail\" data-size=\"Detail\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       BY JOHN DOE | 4 May 2015                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                                                                  </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table width=\"24\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 26.1px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(66, 66, 66); font-size: 22px;\">\r\n                       A LOOK INSIDE THE FUTURE                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail\" data-size=\"Detail\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       BY JOHN DOE | 4 May 2015                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                                                                  </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/ZrNhyQDwmlpU7g1of9sPxMSJbTtiFj4c.jpg\" width=\"900\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#eceff3\" data-module=\"module 21_81746\" data-bgcolor=\"Main BG\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table data-bg=\"Header3\" data-bgcolor=\"Header3\" bgcolor=\"#f3f4f9\" data-border-bottom-color=\"Border Bottom\" style=\"background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/uQgk5cItmAb2B4iZ6SPlORnC1Jf890oM.jpg); background-size: cover; background-position: 50% 40%;\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/uQgk5cItmAb2B4iZ6SPlORnC1Jf890oM.jpg\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td bgcolor=\"#3498db\" width=\"900\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\" background-color: rgba(0, 0, 0, 0.33);    background-size: cover;\">\r\n                 <table cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"900\" class=\"zay600\">\r\n                   <tr>\r\n                     <td height=\"120\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- img -->\r\n                   <tr align=\"center\">\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link02q\" data-color=\"Headline02q\" data-size=\"Headline02q\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 17px; font-weight: 100; line-height: 28.9px; \" align=\"right\">\r\n                       <singleline>\r\n                         WATCH IT                                                                                                                                                                                                            </singleline>\r\n                     </td>\r\n                     <td align=\"center\" style=\"line-height:0px;\">\r\n                       <img data-crop=\"false\" class=\"img198\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img42.png\" width=\"80\" height=\"80\" alt=\"15img\">\r\n                     </td>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link02q\" data-color=\"Headline02q\" data-size=\"Headline02q\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 17px; font-weight: 100; line-height: 28.9px;padding: 0;\" align=\"left\">\r\n                       <singleline>\r\n                         IN ACTION                                                                                                                                                                                                             </singleline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end img -->\r\n                   <tr>\r\n                     <td height=\"120\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/Ob02MgqaAEYUr1cmLIWNBToxwPyeJ6Cp.jpg\" data-module=\"22_53827\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"900\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\" \" width=\"50%\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img43.jpg\" alt=\"img\" width=\"250\" height=\"300\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"40%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"70\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"            font-weight: 900;    line-height: 26.1px;    font-family: \'Open Sans\', Arial, sans-serif;    color: rgb(65, 74, 81);    font-size: 22px;\">\r\n                       Beautiful &amp; Fully Customizable Design – No Coding Required                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(145, 141, 141); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                             </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/PBOGatvmViQuj6kClYRs4nF839cZTr7h.jpg\" data-module=\"23_94063\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"900\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\" \" width=\"50%\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img44.jpg\" alt=\"img\" width=\"320\" height=\"300\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"40%\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"70\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"            font-weight: 900;    line-height: 26.1px;    font-family: \'Open Sans\', Arial, sans-serif;    color: rgb(65, 74, 81);    font-size: 22px;\">\r\n                       Beautiful &amp; Fully Customizable Design – No Coding Required                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(145, 141, 141); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                             </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/A1mEoVH46q7RtvdMuQwr5KfsONh8li3x.jpg\" data-module=\"module 24_39675\" data-bg=\"F08\" style=\"position: relative; opacity: 1; z-index: 0; background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/evQ1HmjD32uKS0oO4WzbrqMRVULNh78n.jpg); background-size: cover; background-position: 50% 40%;\" bgcolor=\"#f3f4f9\" width=\"900\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/evQ1HmjD32uKS0oO4WzbrqMRVULNh78n.jpg\">\r\n       <tr>\r\n         <td bgcolor=\"#3498db\" class=\"zay600\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color: rgba(0, 0, 0, 0.50);background-size: cover;\">\r\n           <table cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"900\" class=\"zay600\">\r\n             <!-- img -->\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table class=\"zay3-3\" width=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"100\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Seperator Title\" data-size=\"Seperator Title\" align=\"center\" style=\"font-family: Montserrat, sans-serif; font-size: 29px; font-weight: 700; color: rgb(255, 255, 255); line-height: 29px;\">\r\n                       MAKE YOUR CREATIVE IDEA                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail2\" data-size=\"Detail2\" align=\"center\" style=\"font-family: Montserrat, sans-serif; font-size: 10px; font-weight: 700; color: rgb(255, 255, 255); letter-spacing: 2px; line-height: 18px;\">\r\n                       SUBHEADLINE                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content2\" data-size=\"Content2\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(255, 255, 255); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                          </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr align=\"center\">\r\n                     <td>\r\n                       <table class=\"class-inner\" width=\"150\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#FFFFFF;\" align=\"center\" height=\"30\" style=\"border-radius:20px; border: 1px solid #FFFFFF;padding-left: 10px;padding-right: 10px;font-family: \'Open Sans\', Arial, sans-serif; color: #FFFFFF; font-size:14px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 12px; line-height: 20.4px; font-weight: 400;\" data-color=\"Text Link23\" data-size=\"Main Text23\">\r\n                             </a>\r\n                             <singleline>\r\n                               Read More                                                                                                                  </singleline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"100\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end left -->\r\n               </td>\r\n             </tr>\r\n             <!-- end img -->\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/VMoDjv5gfxbaZSQnh4lzCXdiHmUe92kY.jpg\" data-module=\"module 25_27392\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\" bgcolor=\"#ffffff\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-bgcolor=\"Background\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" align=\"center\" width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table class=\"zay2-2\" align=\"center\" width=\"590\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Date2\" data-size=\"Date2\" data-link-style=\"text-decoration:none; color:#3498db;\" style=\"font-family: lato, \'century gothic\', \'open sans\', arial; color: rgb(244, 67, 54); font-size: 19px; font-weight: bold; line-height: 32.3px;\" align=\"center\">\r\n                       VIDEO &amp; FILE SHARING SIMPILFIED                                                                                                                                                                                                                          </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Mains Text\" data-size=\"Main Text\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(140, 140, 140); font-size: 13px; line-height: 23.4px;\">\r\n                       Designers, developers and creatives from all over the globe are responsible.                                                                                                                                                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <!-- img -->\r\n                       <table align=\"center\" class=\"zay3-3\" width=\"275\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img class=\"img1\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img45.png\" width=\"600\" height=\"290\" alt=\"img\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end img -->\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                 </table>\r\n                 <!-- end left -->\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/cq5lNyIYLxOziMrsGXCF2DZUS79Wubtv.jpg\" data-module=\"module 26_71588\" data-bgcolor=\"Background\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Date2\" data-size=\"Date2\" data-link-style=\"text-decoration:none; color:#3498db;\" style=\"font-family: lato, \'century gothic\', \'open sans\', arial; color: rgb(244, 67, 54); font-size: 19px; font-weight: bold; line-height: 32.3px;\" align=\"center\">\r\n                 POWERFUL FEATURES                                                                                                                                                       </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Mains Text\" data-size=\"Main Text\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(140, 140, 140); font-size: 13px; \">\r\n                 Designers, developers and creatives from all over                                                                                                                                                            <br>\r\n                 the globe are responsible.                                                                                                                                                      </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" style=\"background-color: rgb(255, 255, 255);\">\r\n                 <!-- img -->\r\n                 <table align=\"right\" class=\"zay3-3\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\" style=\"line-height:0px;\">\r\n                       <img class=\"img1\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img46.jpg\" width=\"300\" height=\"179\" alt=\"img\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end img -->\r\n                 <table class=\"zay3-3\" align=\"left\" width=\"260\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table class=\"zay3-3\" width=\"250\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <table class=\"zay-inner\" align=\"center\" width=\"250\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                               <tr>\r\n                                 <td height=\"25\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <table width=\"100%\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td align=\"left\">\r\n                                         <!-- date -->\r\n                                         <table width=\"100%\" align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                           <tr>\r\n                                             <td width=\"200\" align=\"center\" valign=\"middle\" style=\"line-height:0px;/* padding: 0; */width: 250px;float: left;\">\r\n                                               <img data-crop=\"false\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img47.png\" width=\"60\" height=\"60\" alt=\"icon\">\r\n                                             </td>\r\n                                           </tr>\r\n                                           <tr>\r\n                                             <td height=\"10\">\r\n                                             </td>\r\n                                           </tr>\r\n                                           <tr>\r\n                                             <td data-color=\"Date\" data-size=\"Date\" align=\"center\" style=\"    line-height:28px;font-family: \'Open Sans\', Arial, sans-serif;  color: rgb(77, 77, 77);  font-size: 16px;  font-weight: 300;\">\r\n                                               Video Sharing                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <!-- end date -->\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <!-- title -->\r\n                               <tr>\r\n                                 <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline\" data-size=\"Headline\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(181, 181, 181); font-size: 16px; font-weight: 300; line-height: 27.2px;\">\r\n                                   Visitors can start a chat from your website or mobile app&nbsp;                                                                                                                                                                                                                                                                                                                                                 </td>\r\n                               </tr>\r\n                               <!-- end title -->\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\" \">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/fDM0IrHlS64zVaxOmtpF81Kw9Z7hc2Bo.jpg\" data-module=\"module 27_14094\" data-bgcolor=\"Background\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" style=\"background-color: rgb(255, 255, 255);\">\r\n                 <!-- img -->\r\n                 <table align=\"left\" class=\"zay3-3\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\" style=\"line-height:0px;\">\r\n                       <img class=\"img1\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img48.jpg\" width=\"300\" height=\"480\" alt=\"img\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end img -->\r\n                 <table class=\"zay3-3\" align=\"left\" width=\"260\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table class=\"zay3-3\" width=\"250\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <table class=\"zay-inner\" align=\"center\" width=\"250\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                               <tr>\r\n                                 <td height=\"110\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <table width=\"100%\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td align=\"left\">\r\n                                         <!-- date -->\r\n                                         <table width=\"100%\" align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                                           <tr>\r\n                                             <td width=\"200\" align=\"center\" valign=\"middle\" style=\"line-height:0px;/* padding: 0; */width: 250px;float: left;\">\r\n                                               <img data-crop=\"false\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img49.png\" width=\"60\" height=\"60\" alt=\"icon\">\r\n                                             </td>\r\n                                           </tr>\r\n                                           <tr>\r\n                                             <td height=\"10\">\r\n                                             </td>\r\n                                           </tr>\r\n                                           <tr>\r\n                                             <td data-color=\"Date\" data-size=\"Date\" align=\"center\" style=\"    line-height:28px;font-family: \'Open Sans\', Arial, sans-serif;  color: rgb(77, 77, 77);  font-size: 16px;  font-weight: 300;\">\r\n                                               Mobile Apps                                                                                                                                                                                                                                                                                                                                                                                                                                                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                         <!-- end date -->\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <!-- title -->\r\n                               <tr>\r\n                                 <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline\" data-size=\"Headline\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(181, 181, 181); font-size: 16px; font-weight: 300; line-height: 27.2px;\">\r\n                                   Visitors can start a chat from your website or mobile app Designers, developers and from all&nbsp;responsible.&nbsp;                                                                                                                                                                                                                                                                                                                  </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"20\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td width=\"200\" align=\"center\" valign=\"middle\" style=\"line-height:0px;/* padding: 0; */width: 250px;float: left;\">\r\n                                   <img data-crop=\"false\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img50.png\" width=\"165\" height=\"49\" alt=\"icon\">\r\n                                 </td>\r\n                               </tr>\r\n                               <!-- end title -->\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\" \">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/zSRNP3iyhTuBOH9JQ2fEDqm0sYot4KjU.jpg\" data-module=\"module 28_16803\" data-bgcolor=\"Backgroundx\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(243, 243, 243);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"900\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table align=\"center\" class=\"zay3-3\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <!-- img -->\r\n                       <!-- end img -->\r\n                       <table class=\"zay3-3\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"50%\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table class=\"zay3-3\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n                               <tr>\r\n                                 <td>\r\n                                   <table class=\"zay-inner\" style=\"width: 90%;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">\r\n                                     <!-- title -->\r\n                                     <tr>\r\n                                       <td height=\"50\">\r\n                                         <br>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr align=\"left\">\r\n                                       <td data-link-style=\"text-decoration:none; color:#414a51;\" data-link-color=\"Feature Title Link\" data-color=\"Feature Feature Title\" data-size=\"Feature Header\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(94, 94, 94); font-size: 36px;  font-weight: 100;\">\r\n                                         Our Clients Say                                                                                                                     </td>\r\n                                     </tr>\r\n                                     <!--end title-->\r\n                                     <tr>\r\n                                       <td height=\"35\">\r\n                                         <br>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <!--content-->\r\n                                     <tr align=\"left\">\r\n                                       <td data-link-style=\"text-decoration:none; color:#c86e6e;\" data-link-color=\"Content Link\" data-color=\"Content\" data-size=\"Content\" style=\"font-family: \'Open sans\', Arial, sans-serif; color:#7f8c8d; font-size: 13px; line-height: 19px;\">\r\n                                         <multiline>\r\n                                           At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias .                                                                                                                                                                            <br>\r\n                                           <br>\r\n                                           excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi&nbsp;                                                                                                                                                                            <br>\r\n                                         </multiline>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <!--end content-->\r\n                                     <tr>\r\n                                       <td height=\"30\">\r\n                                         <br>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td align=\"left\">\r\n                                         <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                           <tr>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 15px;\" src=\"images/img51.png\" alt=\"instagram\" border=\"0\" width=\"21\">\r\n                                               </a>\r\n                                             </td>\r\n                                             <td>\r\n                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                                              </td>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 15px;\" src=\"images/img52.png\" alt=\"facebook\" border=\"0\" width=\"11\">\r\n                                               </a>\r\n                                             </td>\r\n                                             <td>\r\n                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                                              </td>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 15px;\" src=\"images/img53.png\" alt=\"google\" border=\"0\" width=\"22\">\r\n                                               </a>\r\n                                             </td>\r\n                                             <td>\r\n                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                                              </td>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 15px;\" src=\"images/img54.png\" alt=\"twitter\" border=\"0\" width=\"22\">\r\n                                               </a>\r\n                                             </td>\r\n                                             <td>\r\n                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                                              </td>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 15px;\" src=\"images/img55.png\" alt=\"linkeden\" border=\"0\" width=\"21\">\r\n                                               </a>\r\n                                             </td>\r\n                                             <td>\r\n                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                                              </td>\r\n                                             <td>\r\n                                               <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                                                 <img style=\"display: block; width: 18px;\" src=\"images/img56.png\" alt=\"dribbble\" border=\"0\" width=\"21\">\r\n                                               </a>\r\n                                             </td>\r\n                                           </tr>\r\n                                         </table>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td height=\"50\">\r\n                                         <br>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table class=\"zay3-3\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"50%\">\r\n                         <tr>\r\n                           <td style=\"line-height:0px;\" align=\"center\">\r\n                             <table class=\"zay3-3\" style=\"font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #9b9b9b;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td class=\"zay3-3\" align=\"center\">\r\n                                   <img src=\"images/img57.png\" style=\"     width: 100%;     height: 380px; \" class=\"img1\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end left -->\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/f5bwIix870nUGh3DYLkFKdBjNCotvuTq.jpg\" data-module=\"module 29_34069\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img58.jpg\" alt=\"img\" width=\"287\" height=\"192\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table width=\"24\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td>\r\n                       &nbsp;                                                                                                                                                                                          </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"font-family: Montserrat, sans-serif; font-size: 18px; font-weight: 700; color: rgb(17, 17, 17); /* letter-spacing: 2px; */ line-height: 26.1px;font-weight: 900;    line-height: 26.1px;    font-family: \'Open Sans\', Arial, sans-serif;    color: rgb(65, 74, 81);    font-size: 22px;  };\">\r\n                       TRANSITIONS IN UX DESIGN                                                                                                                                                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Detail1\" data-size=\"Detail1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 10px; font-weight: 500; color: rgb(244, 67, 54); line-height: 18px;\">\r\n                       4 October 2016 /&nbsp;Design                                                                                                                                                                        </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(145, 141, 141); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                    </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\" width=\"25\">\r\n                             <img editable=\"16f\" mc:edit=\"16g\" src=\"images/img59.png\" alt=\"\" style=\"width: 15px;height: 15px;\">\r\n                           </td>\r\n                           <td mc:edit=\"a 47\" data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link x2\" data-color=\"Headline x2\" data-size=\"Headline x2\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 12px; font-weight: normal; line-height: 20.4px;\">\r\n                             <singleline>\r\n                               &nbsp;Learn More                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </singleline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/PFwuMj4USVR6BHhZvOYWTkmirLJgqfCt.jpg\" data-module=\"module 30_56043\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(240, 240, 240);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"718\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"48%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table class=\"zay-inner\" width=\"85%\" height=\"380\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                         <tr>\r\n                           <td data-color=\"Detai3\" data-size=\"Detai3\" align=\"right\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 500; color: rgb(36, 36, 36); padding: 10px;\">\r\n                             June 20                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"25\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"50\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img60.png\" style=\"display: block; width: 35px;height: 50px;\" width=\"45\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 27.55px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(46, 46, 46); font-size: 19px;\">\r\n                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec.                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"75\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img61.png\" style=\"display: block; width: 61px;height: 61px;\" width=\"60\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td align=\"left\" style=\"color: #3D3D3D; font-size: 18px; font-family: Raleway, Calibri, sans-serif;  line-height: 22px;\" class=\"title_color\">\r\n                                   <!-- ======= section header ======= -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 15px;\">\r\n                                     suzin jouan                                                                                                         </div>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table width=\"105\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img62.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img63.png\" width=\"21\" height=\"21\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img64.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table width=\"4%\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"48%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" height=\"380\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <img src=\"images/img65.png\" alt=\"img\" width=\"100%\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table class=\"zay-inner\" width=\"85%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                         <tr>\r\n                           <td height=\"25\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Detail\" data-size=\"Detail\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12px; font-weight: 600; color: rgb(244, 67, 54); line-height: 20.4px;\">\r\n                             Supported By Pros                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 27.55px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(46, 46, 46); font-size: 19px;\">\r\n                             Lorem ipsum dolor sit amet, consectetur.                                                                                                         </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table width=\"60\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img66.png\" width=\"22\" height=\"22\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"10\">\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img67.png\" width=\"20\" height=\"20\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/8Q9HFqIMzdOiY0eypBZS65oDGAW3jwNP.jpg\" data-module=\"module 31_27784\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(240, 240, 240);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"718\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"48%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F44336\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table class=\"zay-inner\" width=\"85%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"380\">\r\n                         <tr>\r\n                           <td data-color=\"Detai1\" data-size=\"Detai1\" align=\"right\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 500; color: rgb(255, 255, 255);  padding: 10px;\">\r\n                             June 20                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"78\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Detai2\" data-size=\"Detai2\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 12px; font-weight: 600; color: rgb(255, 255, 255); line-height: 20.4px;\">\r\n                             GREAT DESIGN                                                                                                         </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Title 1\" data-size=\"Title 1\" align=\"left\" style=\"font-weight: 400; line-height: 26.9px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 22px;\">\r\n                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec&nbsp;                                                                                                         </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\" style=\"color: rgb(255, 255, 255); font-size: 13px; font-family: \'Open Sans\', sans-serif; line-height: 22.1px;\" data-color=\"Title 2\" data-size=\"Title 2\">\r\n                             <!-- ======= section text ====== -->\r\n                             <div class=\"editable_text\" style=\"line-height: 16px;\">\r\n                               <span class=\"text_container\">\r\n                                 We are a digital design agency. We receive faxes from about upcoming trends in design                                                                                             </span>\r\n                               .                                                                                                                  </div>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"70\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table width=\"75\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding: 10px; \">\r\n                               <tr>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img68.png\" width=\"28\" height=\"28\" alt=\"img\" style=\"     width: 20px;     height: 20px; \">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"20\" style=\"     width: 9px;\">\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img69.png\" width=\"28\" height=\"28\" alt=\"img\" style=\"     width: 20px;     height: 20px; \">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table width=\"4%\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"48%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table class=\"zay-inner\" width=\"85%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" height=\"380\">\r\n                         <tr>\r\n                           <td data-color=\"Detai3\" data-size=\"Detai3\" align=\"right\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 500; color: rgb(36, 36, 36); padding: 10px;\">\r\n                             June 20                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"25\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"50\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img70.png\" style=\"display: block; width: 46px;height: 46px;\" width=\"45\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 27.55px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(46, 46, 46); font-size: 19px;\">\r\n                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus.&nbsp;                                                                                                         </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"90\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img71.png\" style=\"display: block; width: 61px;height: 61px;\" width=\"60\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td align=\"left\" style=\"color: #3D3D3D; font-size: 18px; font-family: Raleway, Calibri, sans-serif;  line-height: 22px;\" class=\"title_color\">\r\n                                   <!-- ======= section header ======= -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 15px;\">\r\n                                     <span class=\"text_container\">\r\n                                       Marya Kary                                                                                                                     <br>\r\n                                       <span style=\"color: #919191; font-weight: 700; font-size: 12px;\" class=\"link_color\">\r\n                                         Lead Developer                                                                                                                           <br>\r\n                                       </span>\r\n                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table width=\"135\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img72.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img73.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img74.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img75.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/s7AEZMT2ktF4IX8hPedKUpgoWfGrSDwO.jpg\" data-module=\"module 32_46571\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(240, 240, 240);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"718\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"100%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                   <tr>\r\n                     <td>\r\n                       <table class=\"zay3-3\" width=\"50%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <img src=\"images/img76.jpg\" alt=\"img\" width=\"100%\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table border=\"0\" align=\"left\" width=\"30\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"half-container\">\r\n                         <tr>\r\n                           <td height=\"20\" width=\"2\" style=\"font-size: 20px; line-height: 20px;\">\r\n                             &nbsp;                                                                                                               </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table class=\"zay-inner\" width=\"40%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                         <tr>\r\n                           <td data-color=\"Detai3\" data-size=\"Detai3\" align=\"right\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 500; color: rgb(36, 36, 36); padding: 10px;\">\r\n                             June 20                                                                                                          </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"25\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"50\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img77.png\" style=\"display: block; width: 40px;height: 31px;\" width=\"45\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Title\" data-size=\"Title\" align=\"left\" style=\"font-weight: 900; line-height: 27.55px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(46, 46, 46); font-size: 19px;\">\r\n                             Thundercats keytar terry richardson, biodiesel banksy food locavore.                                                                                 </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"90\">\r\n                                   <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                     <img src=\"images/img78.png\" style=\"display: block; width: 61px;height: 61px;\" width=\"60\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td align=\"left\" style=\"color: #3D3D3D; font-size: 18px; font-family: Raleway, Calibri, sans-serif;  line-height: 22px;\" class=\"title_color\">\r\n                                   <!-- ======= section header ======= -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 15px;\">\r\n                                     <span class=\"text_container\">\r\n                                       Sven Hauck                                                                                                                     <br>\r\n                                       <span style=\"color: #919191; font-weight: 700; font-size: 12px;\" class=\"link_color\">\r\n                                         Branding Expert                                                                                                                           <br>\r\n                                       </span>\r\n                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table width=\"135\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img79.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img80.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img81.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                   <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                     <img data-crop=\"false\" src=\"images/img82.png\" width=\"28\" height=\"28\" alt=\"img\">\r\n                                   </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/wpBqi5FyjfZvCPnWRerNt8sQoJI641TE.jpg\" data-module=\"module 33_61575\" data-bgcolor=\"Main bac\" align=\"center\" bgcolor=\"#eceff3\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table align=\"center\" class=\"zay600\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table class=\"zay600\" width=\"580\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td>\r\n                       <table class=\"zay-inner\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 100%;\">\r\n                         <!-- title -->\r\n                         <tr>\r\n                           <td height=\"50\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr align=\"left\">\r\n                           <td data-link-style=\"text-decoration:none; color:#414a51;\" data-link-color=\"Feature Title Link\" data-color=\"Feature Feature Title\" data-size=\"Feature Header\" style=\"    font-family: \'Open Sans\', Arial, sans-serif;      font-size: 27px;      font-weight: 100;      color: rgb(207, 207, 207);      line-height: 39.15px;\">\r\n                             Beautiful Gallery                                                                                 </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"50\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <!-- left -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img83.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                         <!-- end title -->\r\n                         <!-- content -->\r\n                       </table>\r\n                       <!-- end left -->\r\n                       <!--Space-->\r\n                       <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                         <tr>\r\n                           <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                             <p style=\"padding-left: 5px;\">\r\n                               &nbsp;                                                                                                                 </p>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!--End Space-->\r\n                       <!-- middle -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img84.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                         <!-- end title -->\r\n                         <!-- content -->\r\n                       </table>\r\n                       <!-- end middle -->\r\n                       <!--Space-->\r\n                       <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                         <tr>\r\n                           <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                             <p style=\"padding-left: 5px;\">\r\n                               &nbsp;                                                                                                                 </p>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!--End Space-->\r\n                       <!-- right -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img85.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end right -->\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <!-- left -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img86.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end left -->\r\n                       <!--Space-->\r\n                       <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                         <tr>\r\n                           <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                             <p style=\"padding-left: 5px;\">\r\n                               &nbsp;                                                                                                                 </p>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!--End Space-->\r\n                       <!-- middle -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img87.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end middle -->\r\n                       <!--Space-->\r\n                       <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                         <tr>\r\n                           <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                             <p style=\"padding-left: 5px;\">\r\n                               &nbsp;                                                                                                                 </p>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!--End Space-->\r\n                       <!-- right -->\r\n                       <table width=\"183\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td align=\"center\" style=\"line-height:0px;\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;\" class=\"img1\" src=\"images/img88.jpg\" alt=\"img\" width=\"190\" height=\"150\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end right -->\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"50\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255); font-size: 13px; line-height: 22.1px;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                               View More                                                                                       </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"80\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end left -->\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/prw7TeoOPRfcX4SH8GEuU65CigZkMABd.jpg\" data-module=\"module 34_88273\" data-bgcolor=\"Background\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(245, 245, 245);\" align=\"center\" bgcolor=\"#ffffff\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"601\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                 <p style=\"padding-left: 15px;\">\r\n                   &nbsp;                                                                 </p>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Dates\" data-size=\"Dates\" align=\"left\" style=\"     padding: 5px; font-family: \'Open Sans\', Arial, sans-serif;      font-size: 27px;      font-weight: 100;      color: rgb(207, 207, 207);      line-height: 39.15px;\" data-bgcolor=\"Box Color\">\r\n                 <multiline>\r\n                   The Pricing                                                   </multiline>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                 <p style=\"padding-left: 15px;\">\r\n                   &nbsp;                                                                 </p>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table data-bgcolor=\"Box Color236\" class=\"zay3-3\" style=\"background-color: rgb(255, 255, 255);\" align=\"left\" bgcolor=\"#F5F5F5\" width=\"199\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- title -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link3\" data-color=\"Headline3\" data-size=\"Headlin3\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(77, 77, 77); font-size: 16px; font-weight: 400; line-height: 27.2px;\" align=\"center\">\r\n                       <multiline>\r\n                         FREE                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end title -->\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link2\" data-color=\"Main Texts5\" data-size=\"Main Text5\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 28px; line-height: 42px;\" align=\"center\">\r\n                       <multiline>\r\n                         $0                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Links4\" data-color=\"Mains Text4\" data-size=\"Mains Texts4\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(140, 140, 140); font-size: 14px; line-height: 23.8px; padding: 20px 0px;\" align=\"center\">\r\n                       <multiline>\r\n                         1 Design Version                                                                           <br>\r\n                         1 Users                                                                           <br>\r\n                         1 GB Storage&nbsp;                                                  <br>\r\n                         -                                                                                          </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\" valign=\"middle\">\r\n                       <!-- button -->\r\n                       <table data-bgcolor=\"Main Color20\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#3498db\" style=\"border-radius: 5px; border: 2px solid rgb(255, 255, 255); font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 14px; font-weight: 500; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td height=\"35\" align=\"center\" valign=\"middle\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size:13px;padding-left: 30px;padding-right: 30px;\">\r\n                             <multiline>\r\n                               SIGN UP                                                                                                                  </multiline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end button -->\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end left -->\r\n                 <table width=\"1\" height=\"20\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                   <tr>\r\n                     <td height=\"20\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                       <p style=\"padding-left: 1px;\">\r\n                         &nbsp;                                                                                         </p>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- middle -->\r\n                 <table data-bgcolor=\"Box Color236\" class=\"zay3-3\" style=\"background-color: rgb(255, 255, 255);\" align=\"left\" bgcolor=\"#F5F5F5\" width=\"199\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- title -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link3\" data-color=\"Headline3\" data-size=\"Headlin3\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(77, 77, 77); font-size: 16px; font-weight: 400; line-height: 27.2px;\" align=\"center\">\r\n                       <multiline>\r\n                         STARTER                                                                                          </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end title -->\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link2\" data-color=\"Main Texts5\" data-size=\"Main Text5\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 28px; line-height: 42px;\" align=\"center\">\r\n                       <multiline>\r\n                         $299                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Links4\" data-color=\"Mains Text4\" data-size=\"Mains Texts4\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(140, 140, 140); font-size: 14px; line-height: 23.8px; padding: 20px 0px;\" align=\"center\">\r\n                       <multiline>\r\n                         2 Design Version                                                                           <br>\r\n                         10 Users                                                                           <br>\r\n                         &nbsp;5 GB Storage                                                                           <br>\r\n                         Mail Support                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\" valign=\"middle\">\r\n                       <!-- button -->\r\n                       <table data-bgcolor=\"Main Color20\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#3498db\" style=\"border-radius: 5px; border: 2px solid rgb(255, 255, 255); font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 14px; font-weight: 500; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td height=\"35\" align=\"center\" valign=\"middle\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size:13px;padding-left: 30px;padding-right: 30px;\">\r\n                             <multiline>\r\n                               SIGN UP                                                                                                                  </multiline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end button -->\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end middle -->\r\n                 <!-- end left -->\r\n                 <table width=\"1\" height=\"20\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                   <tr>\r\n                     <td height=\"20\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                       <p style=\"padding-left: 1px;\">\r\n                         &nbsp;                                                                                         </p>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- right -->\r\n                 <table data-bgcolor=\"Box Color236\" class=\"zay3-3\" style=\"background-color: rgb(255, 255, 255);\" align=\"left\" bgcolor=\"#F5F5F5\" width=\"199\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- title -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link3\" data-color=\"Headline3\" data-size=\"Headlin3\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(77, 77, 77); font-size: 16px; font-weight: 400; line-height: 27.2px;\" align=\"center\">\r\n                       <multiline>\r\n                         ENTERPRISE                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end title -->\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link2\" data-color=\"Main Texts5\" data-size=\"Main Text5\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 28px; line-height: 42px;\" align=\"center\">\r\n                       <multiline>\r\n                         $499                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Links4\" data-color=\"Mains Text4\" data-size=\"Mains Texts4\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(140, 140, 140); font-size: 14px; line-height: 23.8px; padding: 20px 0px;\" align=\"center\">\r\n                       <multiline>\r\n                         10 Design Version                                                                           <br>\r\n                         Unlimited Users                                                                           <br>\r\n                         25 GB Storage                                                                           <br>\r\n                         Phone &amp; Mail Support                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"left\" valign=\"middle\">\r\n                       <!-- button -->\r\n                       <table data-bgcolor=\"Main Color20\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#3498db\" style=\"border-radius: 5px; border: 2px solid rgb(255, 255, 255); font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 14px; font-weight: 500; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td height=\"35\" align=\"center\" valign=\"middle\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size:13px;padding-left: 30px;padding-right: 30px;\">\r\n                             <multiline>\r\n                               SIGN UP                                                                                                                  </multiline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end button -->\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end right -->\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                 <p style=\"padding-left: 15px;\">\r\n                   &nbsp;                                                                 </p>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/yvidDzUNYSQwm45r2uKOn1EJBhoGacFR.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"ffffff\" class=\"bg_color\" data-module=\"module 35_62807\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td height=\"60\" style=\"font-size: 60px; line-height: 60px;\">\r\n           &nbsp;                        </td>\r\n       </tr>\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table border=\"0\" align=\"center\" width=\"700\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td align=\"center\" style=\"color: #000000; font-size: 24px; font-family: Raleway, Calibri, sans-serif; line-height: 24px;\" class=\"zay3-3\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                   <span class=\"text_container\">\r\n                     Discover the best Offer                                      </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"15\" style=\"font-size: 15px; line-height: 15px;\">\r\n                 &nbsp;                                          </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" style=\"color: #919191; font-size: 15px; font-family: Raleway, Calibri, sans-serif; line-height: 23px;\" class=\"zay3-3\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 23px\">\r\n                   <span class=\"text_container\">\r\n                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio.                                      </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                 &nbsp;                                          </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" width=\"40%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background: #F4F4F4;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"font-size: 25px; line-height:25px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"color: #88949b; font-size: 15px; font-family: \'Open Sans\', Arial, sans-serif;  line-height: 24px;font-weight: 400;\" class=\"text_color\">\r\n                       <!-- ======= section text ====== -->\r\n                       <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                         Professional                                                                  </div>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\" style=\"font-size: 30px; line-height: 30px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"color: #F44336; font-size: 120px; font-family: \'Lato\',Open Sans, Arial, sans-serif;  line-height: 34px;font-weight: 700;\" class=\"title_color\">\r\n                       <!-- ======= section text ====== -->\r\n                       <div class=\"editable_text\" style=\"line-height: 64px\">\r\n                         <span class=\"text_container\">\r\n                           <sup style=\"color: #F44336; font-size: 40px;\" class=\"link_color\">\r\n                             $                                                      </sup>\r\n                           59                                                  </span>\r\n                       </div>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\" style=\"font-size: 25px; line-height:25px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"220\" class=\"container580\">\r\n                         <tr>\r\n                           <td align=\"center\" style=\"color: #919191; font-size: 15px; font-family: Raleway, Calibri, sans-serif; mso-line-height-rule: exactly; line-height: 24px;\" class=\"text_color\">\r\n                             <!-- ======= section text ====== -->\r\n                             <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                               Free Support&nbsp;                                                                                    </div>\r\n                             <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                               &nbsp;25 Demos Included&nbsp;                                                                                     </div>\r\n                             <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                               Newsletter Working&nbsp;                                                                                    </div>\r\n                             <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                               Contact Form&nbsp;                                                                                    </div>\r\n                             <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                               Unlimited Domains&nbsp;                                                                                     </div>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\" style=\"font-size: 30px; line-height: 30px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table border=\"0\" align=\"center\" width=\"130\" cellpadding=\"0\" cellspacing=\"0\" style=\"/* border: 1px solid #a0a0a0; */background: #F44336;border-radius: 4px;\">\r\n                         <tr>\r\n                           <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                             &nbsp;                                                                              </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"center\" style=\"color: #FFFFFF; font-size: 14px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 20px;\">\r\n                             <!-- ======= main section button ======= -->\r\n                             <div class=\"editable_text\" style=\"line-height: 20px;\">\r\n                               <span class=\"text_container\">\r\n                                 <a style=\"color: rgb(255, 255, 255); text-decoration: none;\">\r\n                                   Apply Now                                                                  </a>\r\n                               </span>\r\n                             </div>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                             &nbsp;                                                                              </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"50\" style=\"font-size: 40px; line-height: 40px;\">\r\n                       &nbsp;                                                            </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table border=\"0\" width=\"1\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"container590\">\r\n                   <tr>\r\n                     <td width=\"1\" height=\"30\" style=\"font-size: 30px; line-height: 30px;\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"50%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td>\r\n                       <table class=\"zay-inner\" align=\"right\" width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 90%;\">\r\n                         <!-- title -->\r\n                         <!-- end title -->\r\n                         <tr>\r\n                           <td height=\"40\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"5\">\r\n                           </td>\r\n                         </tr>\r\n                         <!-- content -->\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link 6a\" data-color=\"Mains Text 6a\" data-size=\"Main Text 6a\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(15, 15, 15); font-size: 40px; font-weight: 100; line-height: 40px;\">\r\n                             <multiline>\r\n                               We take care of your business                                                                                     </multiline>\r\n                           </td>\r\n                         </tr>\r\n                         <!-- end content -->\r\n                         <tr>\r\n                           <td height=\"25\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Contents6 Link\" data-color=\"Mainss6 Text\" data-size=\"Mains6 Text\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(138, 133, 133); font-size: 14px; line-height: 23.8px;\">\r\n                             <multiline>\r\n                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                                                     </multiline>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"100\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"left\">\r\n                             <table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td align=\"left\" width=\"80\">\r\n                                   <a style=\"border: 0px !important; color: rgb(255, 255, 255);\" class=\"editable_img\">\r\n                                     <img src=\"images/img89.png\" style=\"display: block; width: 60px;\" width=\"60\" border=\"0\" alt=\"\">\r\n                                   </a>\r\n                                 </td>\r\n                                 <td>\r\n                                   <table border=\"0\" width=\"100%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td align=\"left\" style=\"color: #878b99; font-size: 13px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 23px;\" class=\"text_color\">\r\n                                         <!-- ======= section text ====== -->\r\n                                         <div class=\"editable_text\" style=\"line-height: 23px\">\r\n                                           <span class=\"text_container\">\r\n                                           </span>\r\n                                           <multiline>\r\n                                             <em>\r\n                                               “Suspendisse vestibulum libero non venenat ut aliquet felis...”                                                                                          </em>\r\n                                           </multiline>\r\n                                         </div>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td height=\"5\" style=\"font-size: 5px; line-height: 5px;\">\r\n                                         &nbsp;                                                                                                                  </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td align=\"left\" style=\"color: #384050; font-size: 13px; font-family: \'Open Sans\', Calibri, sans-serif; mso-line-height-rule: exactly; line-height: 22px;\" class=\"title_color\">\r\n                                         <!-- ======= section header ======= -->\r\n                                         <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                                           <span class=\"text_container\">\r\n                                           </span>\r\n                                           <multiline>\r\n                                             Mario Watson                                                                                           <a style=\"color: rgb(255, 255, 255); text-decoration: none;\" class=\"link_color\">\r\n                                               -Ifini1ty                                                                                          </a>\r\n                                           </multiline>\r\n                                         </div>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td height=\"60\" style=\"font-size: 60px; line-height: 60px;\">\r\n           &nbsp;                        </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/DmMBxh3fTdbI2koVa4SG6QXe5ZrUly19.jpg\" data-module=\"module 36_29117\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td data-bgcolor=\"Background Color\" align=\"center\" valign=\"top\" bgcolor=\"#f5f5f5\">\r\n                 <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"80\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title Price\" data-size=\"Title Price\" align=\"center\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 24px; font-weight: 400; color: #111; letter-spacing: 2px; line-height: 24px;\">\r\n                       OUR PRODUCT                                                                                                                                                                                           </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                                                                                                                                                                           </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <table class=\"zay3-3\" width=\"287\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table data-bgcolor=\"Main\" width=\"100%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"background-color: rgb(244, 67, 54);\">\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Plan Title\" data-size=\"Plan Title\" align=\"center\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 20px; font-weight: 700; color: #ffffff; line-height: 28px;\">\r\n                                   BASIC                                                                                                                                                                                                                                                                                                       </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Price\" data-size=\"Price\" align=\"center\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 36px; font-weight: 700; color: #ffffff;  line-height: 28px;\">\r\n                                   $ 299                                                                                                                                                                                                                                                                                                       </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Package\" data-size=\"Package\" align=\"center\" style=\"font-family: Montserrat, sans-serif; font-size: 13px; font-weight: 700; color: rgb(255, 255, 255); line-height: 28px;\">\r\n                                   Package                                                                                                                                                                                                                                                                                                       </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px; padding: 0px 4px 22px; border-bottom-width: 5px; border-bottom-style: solid; border-bottom-color: rgb(245, 245, 245);\">\r\n                             Add some detailed                                                                                                                                                                                                                                         <br>\r\n                             information here                                                                                                                                                                                                                                                </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px;\">\r\n                             Free Support                                                                                                                                                                                                                                         <br>\r\n                             &nbsp;15 Demos Included                                                                                                                                                                                                                                         <br>\r\n                             Newsletter                                                                                                                                                                                                                                         <br>\r\n                             &nbsp;Working Contact Form                                                                                                                                                                                                                        </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px;\">\r\n                             Unlimited Domains                                                                                                                                                                                                                        </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                               <tr>\r\n                                 <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                                   <a href=\"#\" style=\"color: #ffffff;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                                     BUY IT NOW                                                                                                                                                                                                                                                                                        </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table width=\"24\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td height=\"40\" style=\"line-height: 0;\">\r\n                             &nbsp;                                                                                                                                                                                                                                                </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table class=\"zay3-3\" width=\"287\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table data-bgcolor=\"Main\" width=\"100%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"background-color: rgb(244, 67, 54);\">\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Plan Title\" data-size=\"Plan Title\" align=\"center\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 20px; font-weight: 700; color: #ffffff; line-height: 28px;\">\r\n                                   GOLD                                                                                                                                                                                                                                                                                                      </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Price\" data-size=\"Price\" align=\"center\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 36px; font-weight: 700; color: #ffffff;  line-height: 28px;\">\r\n                                   $ 499                                                                                                                                                                                                                                                                                                       </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td data-color=\"Package\" data-size=\"Package\" align=\"center\" style=\"font-family: Montserrat, sans-serif; font-size: 13px; font-weight: 700; color: rgb(255, 255, 255); line-height: 28px;\">\r\n                                   Package                                                                                                                                                                                                                                                                                                       </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"15\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px; padding: 0px 4px 22px; border-bottom-width: 5px; border-bottom-style: solid; border-bottom-color: rgb(245, 245, 245);\">\r\n                             Add some detailed                                                                                                                                                                                                                                        <br>\r\n                             information here                                                                                                                                                                                                                                                </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px;\">\r\n                             Free Support                                                                                                                                                                                                                                         <br>\r\n                             &nbsp;50 Demos Included                                                                                                                                                                                                                                         <br>\r\n                             Newsletter                                                                                                                                                                                                                                         <br>\r\n                             &nbsp;Working Contact Form                                                                                                                                                                                                                                                </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(153, 153, 153); line-height: 22.1px;\">\r\n                             Unlimited Domains                                                                                                                                                                                                                        </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"15\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"30\">\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table data-bgcolor=\"Main\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; background-color: rgb(244, 67, 54);\">\r\n                               <tr>\r\n                                 <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #000; line-height: 24px; padding-left: 25px; padding-right: 25px; \">\r\n                                   <a href=\"#\" style=\"color: #ffffff;\" data-color=\"Button 1\" data-size=\"Button 1\">\r\n                                     BUY IT NOW                                                                                                                                                                                                                                                                                        </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                         <tr>\r\n                           <td height=\"20\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"80\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/tCXgiJYnd67Qzo9kS2jAGE8RuwaeLfK3.jpg\" data-module=\"module 37_66057\" data-bgcolor=\"Background\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"30%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                       About Us                                                               </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Date2\" data-size=\"Date2\" data-link-style=\"text-decoration:none; color:#3498db;\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 14px;\" align=\"left\">\r\n                 Powerful Features                                             </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"5\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" style=\"background-color: rgb(255, 255, 255);\">\r\n                 <!-- img -->\r\n                 <table align=\"right\" class=\"zay3-3\" width=\"250\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"right\">\r\n                       <table data-bgcolor=\"Main1\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(244, 67, 54);\">\r\n                         <tr>\r\n                           <td align=\"center\" height=\"38\" style=\"font-family: \'Montserrat\', sans-serif; font-size: 14px; font-weight: 400; color: #FFFFFF; line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px;\">\r\n                             Download Now                                                                                 </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end img -->\r\n                 <table class=\"zay3-3\" align=\"left\" width=\"60%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table class=\"zay3-3\" width=\"100%\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <table class=\"zay-inner\" align=\"left\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                               <!-- title -->\r\n                               <tr>\r\n                                 <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline\" data-size=\"Headline\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(181, 181, 181); font-size: 16px; font-weight: 400;\">\r\n                                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus.                                                                  </td>\r\n                               </tr>\r\n                               <!-- end title -->\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"40\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\" \">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/sACFqEnkgZhRPD3x5afNLlBdcKw0X8YQ.jpg\" border=\"0\" width=\"900\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#f3f4f9\" data-module=\"module 38_85031\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"left\" style=\"background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/zOaBK4iJogvFqcCMDELuWr3j9sdbNS0w.jpg); background-size: cover; background-position: 50% 0%; background-repeat: no-repeat;\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/zOaBK4iJogvFqcCMDELuWr3j9sdbNS0w.jpg\" class=\"main-bg7\" data-bg=\"Header5\" bgcolor=\"#f3f4f9\">\r\n           <table border=\"0\" align=\"left\" width=\"900\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr class=\"hide\">\r\n               <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\" style=\"font-size: 50px; line-height: 50px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"15\" style=\"font-size: 15px; line-height: 15px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" style=\"color: #ffffff; font-size: 32px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 34px;font-weight: 100;\">\r\n                 <!-- ======= section text ====== -->\r\n                 <div class=\"editable_text\" style=\"line-height: 34px\">\r\n                   <span class=\"text_container\">\r\n                     Your Modular Design Toolkit.                                                         </span>\r\n                 </div>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\">\r\n                 <table border=\"0\" align=\"center\" width=\"440\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n                   <tr>\r\n                     <td align=\"center\" style=\"color: #FFFFFF; font-size: 14px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 24px;\">\r\n                       <!-- ======= section text ====== -->\r\n                       <div class=\"editable_text\" style=\"line-height: 24px\">\r\n                         uild beautiful, contemporary sites in just moments with Foundry and Variant Page Builder.                                                                                          </div>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\">\r\n                 <table border=\"0\" width=\"320\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <table border=\"0\" width=\"320\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay-inner\">\r\n                         <tr>\r\n                           <td>\r\n                             <table border=\"0\" align=\"left\" width=\"151\" cellpadding=\"0\" cellspacing=\"0\" class=\"button_color main-button\" bgcolor=\"#F44336\" style=\"border-radius: 5px;\">\r\n                               <tr>\r\n                                 <td height=\"12\" style=\"font-size: 12px; line-height: 12px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"center\" style=\"color: #ffffff; font-size: 14px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 26px;\">\r\n                                   <!-- ======= main section button ======= -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 26px;\">\r\n                                     <span class=\"text_container\">\r\n                                       <a style=\"color: rgb(255, 255, 255); text-decoration: none;\">\r\n                                         buy it now                                                                                                                     </a>\r\n                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"12\" style=\"font-size: 12px; line-height: 12px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <table border=\"0\" align=\"left\" width=\"2\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"half-container\">\r\n                               <tr>\r\n                                 <td height=\"20\" width=\"2\" style=\"font-size: 20px; line-height: 20px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <table border=\"0\" align=\"right\" width=\"149\" cellpadding=\"0\" cellspacing=\"0\" class=\"main-button\" style=\"border-radius: 5px; border: 2px solid #ffffff; background-image: url(http://promail.ma/envato/algo/img/btn-bg.png); background-size: 100% 100%;\">\r\n                               <tr>\r\n                                 <td height=\"11\" style=\"font-size: 11px; line-height: 11px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"center\" style=\"color: #ffffff; font-size: 14px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 22px;\">\r\n                                   <!-- ======= main section button ======= -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 22px;\">\r\n                                     <span class=\"text_container\">\r\n                                       <a style=\"color: rgb(255, 255, 255); text-decoration: none;\">\r\n                                         view demo                                                                                                                     </a>\r\n                                     </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"11\" style=\"font-size: 11px; line-height: 11px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\" style=\"font-size: 80px; line-height: 80px;\">\r\n                 &nbsp;                                                         </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/hpxZGn98eryVbvELCzXiQuj5HA2T6D1J.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"ffffff\" class=\"bg_color\" data-module=\"module 39_1898\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table border=\"0\" align=\"center\" width=\"900\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td>\r\n                 <table border=\"0\" width=\"50%\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\" class=\"zay3-3\">\r\n                   <tr>\r\n                     <td>\r\n                       <table border=\"0\" width=\"75%\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay3-3\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table border=\"0\" width=\"340\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay-inner\">\r\n                               <tr>\r\n                                 <td height=\"140\" style=\"font-size: 40px; line-height: 13px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #848484; font-size: 29px; font-family: \'Open Sans\', Arial, sans-serif; line-height: 38px;font-weight: 100;\" class=\"title_color main-header\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 38px\">\r\n                                     <span class=\"text_container\">\r\n                                       Operator Assist Features                                                                                                               </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #919191; font-size: 15px; font-family: \'Open Sans\', Arial, sans-serif; line-height: 24px;\" class=\"text_color\">\r\n                                   <!-- ======= section subtitle ====== -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 24px;\">\r\n                                     <span class=\"text_container\">\r\n                                       We are a digital design agency. We receive faxes from about upcoming trends in design                                                                                                               </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"50\" style=\"font-size: 30px; line-height: 30px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <table border=\"0\" align=\"left\" width=\"144\" cellpadding=\"0\" cellspacing=\"0\" class=\"button_color\" bgcolor=\"#F44336\" style=\"border-radius: 5px;\">\r\n                                     <tr>\r\n                                       <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                                         &nbsp;                                                                                                                                                         </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td align=\"center\" style=\"color: #ffffff; font-size: 14px; font-family: \'Open Sans\', Calibri, sans-serif; line-height: 24px;\">\r\n                                         <!-- ======= main section button ======= -->\r\n                                         <div class=\"editable_text\" style=\"line-height: 24px;\">\r\n                                           <span class=\"text_container\">\r\n                                             <a style=\"color: rgb(255, 255, 255); text-decoration: none;\">\r\n                                               Contact Us                                                                                                                                       </a>\r\n                                           </span>\r\n                                         </div>\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                                         &nbsp;                                                                                                                                                         </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"10\" style=\"font-size: 10px; line-height: 10px;\">\r\n                                   &nbsp;                                                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\" style=\"color: #F44336; font-size: 15px; font-family: \'Open Sans\', Arial, sans-serif; line-height: 28px;font-weight: 400;\" class=\"title_color main-header\">\r\n                                   <!-- ======= section text ====== -->\r\n                                   <div class=\"editable_text\" style=\"line-height: 38px\">\r\n                                     <span class=\"text_container\">\r\n                                       Contact Sales 1-234-567-8901                                                                                                               </span>\r\n                                   </div>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\" style=\"font-size: 40px; line-height: 40px;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table align=\"left\" class=\"zay3-3\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\" style=\"line-height:0px;\">\r\n                       <img class=\"img1\" style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img90.jpg\" width=\"450px\" height=\"580\" alt=\"img\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/3V6EI4DrWpMOxgcqmh82bfQNoz1yn9TS.jpg\" data-module=\"module 40_20309\" data-bgcolor=\"Main BG 1\" align=\"center\" bgcolor=\"#eceff3\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"position: relative; opacity: 1; z-index: 0; background-color: rgb(244, 67, 54);\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table align=\"center\" class=\"zay600\" width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table align=\"center\" class=\"zay3-3\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <!-- content -->\r\n                       <table class=\"zay3-3\" width=\"580\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr align=\"left\">\r\n                           <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"text Link1\" data-color=\"text Title1\" data-size=\"text2\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 20px; padding-top: 3px;color: rgb(255, 255, 255);  font-weight: 100;\">\r\n                             <multiline>\r\n                               the full version of the application has expired                                                                                     </multiline>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end content -->\r\n                       <!--Space-->\r\n                       <!--End Space-->\r\n                       <table align=\"right\" class=\"zay3-3\" width=\"130\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"     margin-left: 0px; \">\r\n                         <tr>\r\n                           <td align=\"right\">\r\n                             <table data-bgcolor=\"Mainz1\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#e54a39\" style=\"border-radius: 4px; padding-left: 10px; padding-right: 10px; background-color: rgb(216, 23, 9);\">\r\n                               <tr>\r\n                                 <td align=\"center\" height=\"38\" style=\"font-family: Montserrat, sans-serif; font-size: 14px; font-weight: 400; color: rgb(255, 255, 255); line-height: 24px; padding-left: 25px; padding-right: 25px; border-radius: 20px; text-align: center;\">\r\n                                   Buy Now                                                                                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end left -->\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/2rDVENfmnvpXz5k9ZoGUlAwxWMsySLPJ.jpg\" data-module=\"module 41_52364\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(191, 191, 191); line-height: 39.15px;\">\r\n                 Our Team                                                         </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"50\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img91.jpg\" alt=\"img\" width=\"183\" height=\"265\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline1\" data-size=\"Headline1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 18px; font-weight: 400; line-height: 26.1px; padding-left: 20px;\" align=\"center\">\r\n                       <multiline>\r\n                         Jihen So                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link1\" data-color=\"Main Texts\" data-size=\"Main Text\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(44, 29, 27); font-size: 15px; line-height: 25.5px; padding-left: 20px;\">\r\n                       <multiline>\r\n                         Creative Director                                                                                          </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"centert\">\r\n                       <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img92.png\" alt=\"instagram\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img93.png\" alt=\"facebook\" border=\"0\" width=\"11\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 18px;\" src=\"images/img94.png\" alt=\"dribbble\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"24\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img95.jpg\" alt=\"img\" width=\"183\" height=\"265\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline1\" data-size=\"Headline1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 18px; font-weight: 400; line-height: 26.1px; padding-left: 20px;\" align=\"center                   \">\r\n                       <multiline>\r\n                         Marya Kary                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link1\" data-color=\"Main Texts\" data-size=\"Main Text\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(44, 29, 27); font-size: 15px; line-height: 25.5px; padding-left: 20px;\">\r\n                       <multiline>\r\n                         Lead Developer                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"centert\">\r\n                       <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img96.png\" alt=\"instagram\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img97.png\" alt=\"facebook\" border=\"0\" width=\"11\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 18px;\" src=\"images/img98.png\" alt=\"dribbble\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table width=\"1\" height=\"40\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"40\" style=\"line-height: 0;\">\r\n                       &nbsp;                                                                                 </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- SPACE -->\r\n                 <table class=\"zay3-3\" width=\"183\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img99.jpg\" alt=\"img\" width=\"183\" height=\"265\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link\" data-color=\"Headline1\" data-size=\"Headline1\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(244, 67, 54); font-size: 18px; font-weight: 400; line-height: 26.1px; padding-left: 20px;\" align=\"center\">\r\n                       <multiline>\r\n                         Sven Hauck                                                                                         </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Content Link1\" data-color=\"Main Texts\" data-size=\"Main Text\" align=\"center\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(44, 29, 27); font-size: 15px; line-height: 25.5px; padding-left: 20px;\">\r\n                       <multiline>\r\n                         Branding Expert                                                                                          </multiline>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content\" data-size=\"Content\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(171, 171, 171); line-height: 22.1px;\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"centert\">\r\n                       <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img100.png\" alt=\"instagram\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 15px;\" src=\"images/img101.png\" alt=\"facebook\" border=\"0\" width=\"11\">\r\n                             </a>\r\n                           </td>\r\n                           <td>\r\n                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                                                                            </td>\r\n                           <td>\r\n                             <a style=\"color: rgb(255, 255, 255); border: 0px !important;\">\r\n                               <img style=\"display: block; width: 18px;\" src=\"images/img102.png\" alt=\"dribbble\" border=\"0\" width=\"21\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/Guo2dP3WOgXvmIpqSMtUL6HkQJjhVTxe.jpg\" border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#f3f4f9\" data-module=\"module 42_93539\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td>\r\n                 <table data-bg=\"F02\" style=\"position: relative; opacity: 1; z-index: 0; background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/ETJ27c5iIMk4DG8og0NYaUblSjrmP69x.jpg); background-size: cover; background-position: 50% 40%;\" bgcolor=\"#f3f4f9\" width=\"900\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/ETJ27c5iIMk4DG8og0NYaUblSjrmP69x.jpg\">\r\n                   <tr>\r\n                     <td class=\"zay600\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-size: cover;background-color: rgba(0, 0, 0, 0.2);\">\r\n                       <table cellspacing=\"0\" cellpadding=\"0\" align=\"left\" border=\"0\" width=\"100%\" class=\"zay600\">\r\n                         <!-- img -->\r\n                         <tr>\r\n                           <td>\r\n                             <!-- left -->\r\n                             <table class=\"zay600\" width=\"800\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                               <tr>\r\n                                 <td data-color=\"Detai1\" data-size=\"Detai1\" align=\"right\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 500; color: rgb(255, 255, 255);  padding: 10px;\">\r\n                                   June 20                                                                                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"170\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"left\">\r\n                                   <table border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                     <tr>\r\n                                       <td align=\"center\" width=\"61\">\r\n                                         <a style=\"color: rgb(255, 255, 255); border: 0px !important;\" class=\"editable_img\">\r\n                                           <img src=\"images/img103.png\" style=\"display: block; width: 100px;height: 100px;\" width=\"37\" border=\"0\" alt=\"\">\r\n                                         </a>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"30\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"100\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td align=\"right\">\r\n                                   <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding: 10px;\">\r\n                                     <tr>\r\n                                       <td width=\"20\" style=\"     width: 9px;\">\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td data-color=\"Detail3\" data-size=\"Detail3\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 19px; font-weight: 300; color: rgb(255, 255, 255);  /* line-height: 18px; */\">\r\n                                         FREE SUPPORT                                                                                                                  </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td height=\"10\">\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td data-color=\"Seperator Title1\" data-size=\"Seperator Title1\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 20px; font-weight: 900; color: rgb(255, 255, 255); line-height: 25px;\">\r\n                                         Lorem ipsum dolor sit amet dosus et consectetur                                                                                  <br>\r\n                                         dui sepritas aros dos quis del nulla elit.                                                                                                                  </td>\r\n                                       <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                         <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                           <img data-crop=\"false\" src=\"images/img104.png\" width=\"28\" height=\"28\" alt=\"img\" style=\"     width: 20px;     height: 20px; \">\r\n                                         </a>\r\n                                       </td>\r\n                                       <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                                         <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                                           <img data-crop=\"false\" src=\"images/img105.png\" width=\"28\" height=\"28\" alt=\"img\" style=\"     width: 20px;     height: 20px; \">\r\n                                         </a>\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"20\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <!-- end left -->\r\n                           </td>\r\n                         </tr>\r\n                         <!-- end img -->\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/Qm54l1ZfeOu9y8vCIrWJRHSELKpADMXz.jpg\" data-module=\"43_2793\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"position: relative; opacity: 1; z-index: 0;\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table class=\"zay600\" width=\"900\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\" \" width=\"50%\">\r\n                   <tr>\r\n                     <td align=\"center\">\r\n                       <img src=\"images/img106.png\" alt=\"img\" width=\"400\" height=\"300\" class=\"img1\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <table class=\"zay3-3\" width=\"40%\" align=\"right\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"70\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" style=\"            font-weight: 900;    line-height: 26.1px;    font-family: \'Open Sans\', Arial, sans-serif;    color: rgb(65, 74, 81);    font-size: 22px;\">\r\n                       Beautiful &amp; Fully Customizable Design – No Coding Required                                                            </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Content1\" data-size=\"Content1\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(145, 141, 141); line-height: 22.1px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit odio at sodales aliquet. Aliquam erat volutpat.                                                             </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"15\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"80\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/V7ID6CsN3HFhoKdLkY4wXZ1AbmJ5qxrE.jpg\" data-module=\"module 44_71957\" style=\"border-collaps:collaps;\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n       <!-- Start Clients -->\r\n       <tr>\r\n         <td data-border-bottom-color=\"Divider\" style=\"border-bottom-width: 0px; border-bottom-style: none; border-bottom-color: rgb(184, 184, 184); background-color: rgb(247, 247, 247);\" data-bgcolor=\"Main BG a1\">\r\n           <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"720\">\r\n             <tr>\r\n               <td height=\"51\" width=\"250\">\r\n               </td>\r\n             </tr>\r\n             <!-- Start Title -->\r\n             <tr>\r\n               <td data-color=\"Feature02\" data-size=\"Feature02\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 27px; font-weight: 100; color: rgb(207, 207, 207); line-height: 39.15px;\">\r\n                 Clients                              </td>\r\n             </tr>\r\n             <!-- End Title -->\r\n             <tr>\r\n               <td height=\"29\">\r\n               </td>\r\n             </tr>\r\n             <!-- Start Clients -->\r\n             <tr>\r\n               <td>\r\n                 <table style=\"border-collaps:collaps;\" class=\"zay600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\r\n                   <tr class=\"zay2-2\">\r\n                     <td>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0; border-right: 1px solid #ededed; border-bottom: 1px solid #ededed; \">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img107.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0; border-right: 1px solid #ededed; border-bottom: 1px solid #ededed; \">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img108.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0; border-bottom: 1px solid #ededed; \">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img109.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr class=\"cli\">\r\n                     <td>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0; border-right: 1px solid #ededed;\">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img110.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0; border-right: 1px solid #ededed;\">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img111.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <table style=\"margin: 0 auto; border-collaps:collaps;\" class=\"zay3-3\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"200\">\r\n                         <tr>\r\n                           <td style=\"line-height:0;\">\r\n                             <a class=\"inline\" style=\"display: block; line-height: 0; color: rgb(255, 255, 255);\" href=\"#\">\r\n                               <img class=\"img1\" style=\"display:block;\" alt=\"img\" src=\"images/img112.jpg\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <!-- End Clients -->\r\n             <tr>\r\n               <td height=\"60\" width=\"600\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n       <!-- End Clients -->\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/8UD9rYu3nMcxjPoObZ0NBLCv7ti1QzTV.jpg\" data-module=\"module 45_65133\" width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td align=\"center\" valign=\"top\" bgcolor=\"#ffffff\" class=\"zay600\">\r\n                 <table class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tr>\r\n                     <td height=\"50\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Title\" data-size=\"Title\" align=\"center\" style=\"font-family: Lato, sans-serif; font-size: 28px; font-weight: 900; color: rgb(66, 66, 66); letter-spacing: 2px; line-height: 32px;\">\r\n                       CONTACT US                                                                                 </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td data-color=\"Contenta\" data-size=\"Contenta\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(89, 89, 89); line-height: 24px;\">\r\n                       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis.                                                                                  </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"30\">\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td>\r\n                       <table data-bgcolor=\"Contact BG\" class=\"zay600\" width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#f3f3f3\" style=\"border-radius: 5px; background-color: rgb(245, 245, 245);\">\r\n                         <tr>\r\n                           <td align=\"center\">\r\n                             <table class=\"zay3-3\" width=\"550\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n                               <tr>\r\n                                 <td height=\"25\">\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td>\r\n                                   <table class=\"full-width\" width=\"80\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n                                     <tr>\r\n                                       <td height=\"80\" align=\"center\" valign=\"middle\">\r\n                                         <img src=\"images/img113.png\" alt=\"icon\" width=\"64\" height=\"64\">\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                   <!-- SPACE -->\r\n                                   <table class=\"full-width\" width=\"1\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n                                     <tr>\r\n                                       <td width=\"1\" height=\"15\" style=\"font-size: 15px; line-height: 15px;\">\r\n                                       </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                   <!-- END SPACE -->\r\n                                   <table class=\"zay-inner\" width=\"440\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\">\r\n                                     <tr>\r\n                                       <td data-color=\"Title D\" data-size=\"Title D\" align=\"left\" style=\"font-family: Lato, sans-serif; font-size: 16px; font-weight: 900; color: rgb(66, 66, 66); letter-spacing: 1px; line-height: 24px;\">\r\n                                         CONTACT INFO                                                                                                                                                         </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td height=\"10\">\r\n                                       </td>\r\n                                     </tr>\r\n                                     <tr>\r\n                                       <td data-color=\"Contentz\" data-size=\"Contentz\" align=\"left\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 13px; font-weight: 400; color: rgb(33, 33, 33); line-height: 24px;\">\r\n                                         Address: 123 Street Name , City | Phone: 123-456-7890                                                                                                                           <br>\r\n                                         Email: name@website.com | You can                                                                                                                            <a href=\"*|unsubscribe|*\" style=\"color: rgb(244, 67, 54);\" data-color=\"Contact Link\" data-size=\"Contact Link\">\r\n                                           unsubscribe                                                                                                                           </a>\r\n                                         here.                                                                                                                                                          </td>\r\n                                     </tr>\r\n                                   </table>\r\n                                 </td>\r\n                               </tr>\r\n                               <tr>\r\n                                 <td height=\"25\">\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"50\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/bytRxTfD29zv4kO7SY3X65j8pglILh1G.jpg\" data-module=\"module 46_52300\" data-bgcolor=\"seperator-1\" data-bg=\"seperator-1\" align=\"center\" width=\"900\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#f3f4f9\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/05/3jImiQ2v4uxpOseKkt6TyLh0q1NRBlFD.jpg\" style=\"position: relative; opacity: 1; z-index: 0; background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/05/3jImiQ2v4uxpOseKkt6TyLh0q1NRBlFD.jpg); background-size: cover; background-position: 50% 100%;background-color: rgba(0, 0, 0, 0.2);\" class=\"zay600\">\r\n       <!-- subtitle -->\r\n       <tr>\r\n         <td class=\"zay600\" align=\"center\" style=\"     background-color: rgba(0, 0, 0, 0.2); \">\r\n           <!-- content -->\r\n           <table class=\"zay600\" width=\"550\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"75\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Quote Title\" data-size=\"Quote Title\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 24px; font-weight: 100; color: rgb(255, 255, 255); letter-spacing: 0px; line-height: 28px;\">\r\n                 What They said                                                                                                                     </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Quote Title1\" data-size=\"Quote Title1\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 24px; font-weight: 900; color: rgb(255, 255, 255); letter-spacing: 0px; line-height: 28px;\">\r\n                 TESTIMONIAL                                                                                                                      </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" class=\"zay3-3\">\r\n                 <img src=\"images/img114.png\" alt=\"img2\" class=\"img1\" style=\"     width: 70%;     height: 100%; \">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"20\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Name\" data-size=\"Name\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 17px; font-weight: 700; color: rgb(255, 255, 255);  line-height: 14px;\">\r\n                 Caterina Wilson                                                                                                                      </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"10\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Quote Details\" data-size=\"Quote Detail\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 12px; font-weight: 400; color: rgb(255, 255, 255); line-height: 20.4px;\">\r\n                 COMPANY.NET                                                                                                                      </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"30\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td data-color=\"Content TESTIMONIAL\" data-size=\"Content TESTIMONIAL\" align=\"center\" style=\"font-family: \'Open Sans\', sans-serif; font-size: 14px; font-weight: 500; color: rgb(255, 255, 255); line-height: 23.8px;\">\r\n                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nisi sed diam ultricies tempus. Nullam et ligula sodales, blandit arcu sit amet, varius felis. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;                              </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"30\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <table class=\"zay600\" width=\"200\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;width: 16px;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img115.png\" width=\"8\" height=\"16\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n               <td width=\"25\">\r\n               </td>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img116.png\" width=\"16\" height=\"13\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n               <td width=\"25\">\r\n               </td>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img117.png\" width=\"15\" height=\"16\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n               <td width=\"25\">\r\n               </td>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img118.png\" width=\"15\" height=\"15\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n               <td width=\"25\">\r\n               </td>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img119.png\" width=\"16\" height=\"10\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n               <td width=\"25\">\r\n               </td>\r\n               <td width=\"16\" align=\"center\" style=\"line-height:0xp;\">\r\n                 <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                   <img data-crop=\"false\" style=\"display:block; line-height:0px; font-size:0px; border:0px;\" src=\"images/img120.png\" width=\"16\" height=\"16\" alt=\"img\">\r\n                 </a>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"75\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n           <!-- end content -->\r\n         </td>\r\n       </tr>\r\n       <!-- end subtitle -->\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/VqRHBYP8ltyQMTIbr0JWuewDU51EAogF.jpg\" data-module=\"module 47_77896\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\">\r\n       <tr>\r\n         <td height=\"60\">\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td data-color=\"Date2\" data-size=\"Date2\" data-link-style=\"text-decoration:none; color:#3498db;\" style=\"font-family: lato, \'century gothic\', \'open sans\', arial; color: rgb(244, 67, 54); font-size: 19px; font-weight: bold; line-height: 32.3px;\" align=\"center\">\r\n           CUSTOMERS LOVE ROICE                                 </td>\r\n       </tr>\r\n       <tr>\r\n         <td height=\"40\">\r\n         </td>\r\n       </tr>\r\n       <tr>\r\n         <td align=\"center\">\r\n           <table align=\"center\" class=\"zay600\" style=\"border-radius:8px;\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n             <tr>\r\n               <td align=\"center\">\r\n                 <table class=\"zay-inner\" width=\"550\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <tr>\r\n                     <td>\r\n                       <!-- img -->\r\n                       <table class=\"zay3-3\" width=\"100\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\" valign=\"middle\">\r\n                         <tr>\r\n                           <td align=\"center\" class=\"table1-3\" style=\"line-height:0px;\" valign=\"middle\">\r\n                             <img style=\"display:block; line-height:0px; font-size:0px; border:0px;width: 100px; height: 100PX;\" class=\"img213\" src=\"images/img121.png\" alt=\"img\" width=\"100\" height=\"100\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!-- end img -->\r\n                       <!--Space-->\r\n                       <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                         <tr>\r\n                           <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                             <p style=\"padding-left: 24px;\">\r\n                               &nbsp;                                                                                                                 </p>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                       <!--End Space-->\r\n                       <table class=\"zay3-3\" width=\"420\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <!-- title -->\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"Content Link w\" data-color=\"HeadLines w\" data-size=\"HeadLines w\" data-min=\"12\" data-max=\"18\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(59, 59, 59); font-size: 13px; font-weight: 100; \">\r\n                             \"Delivering seasonal trends for the high street, Warehouse offer a collection of directional pieces, with vibrant prints and clean cut tailoring channelling the brand\'s signature style.\"                                                                                                         </td>\r\n                         </tr>\r\n                         <!-- end title -->\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                         <!-- content -->\r\n                         <tr>\r\n                           <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"Content Link s\" data-color=\"Main Text s\" data-size=\"Main Text s\" data-min=\"12\" data-max=\"18\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#7f8c8d; font-size:13px; line-height:28px;\">\r\n                             Envato is an ecosystem of sites to&nbsp;                           </td>\r\n                         </tr>\r\n                         <!-- end content -->\r\n                         <tr>\r\n                           <td height=\"10\">\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"80\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/rcIsaNFy76KCY8qLVljiunt10Bg2QEUd.jpg\" data-module=\"module 48_53887\" data-bgcolor=\"Background\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" style=\"background-color: rgb(255, 255, 255);\">\r\n       <tr>\r\n         <td data-bg=\"Feature\" data-bgcolor=\"Feature\" align=\"center\" bgcolor=\"#3b3b3b\" style=\"background-image: url(http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/ANraGR7DEdy350CZhQspWTxSwFzgcomY.jpg); background-color: rgb(255, 255, 255); background-size: cover; background-position: 50% 50%;\" background=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/11/ANraGR7DEdy350CZhQspWTxSwFzgcomY.jpg\">\r\n           <table class=\"zay600\" width=\"580\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\r\n             <tr>\r\n               <td height=\"70\" class=\"header-td\">\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td>\r\n                 <table class=\"zay3-3\" align=\"center\" width=\"580\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                   <!-- title -->\r\n                   <!-- end title -->\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3498db;\" data-link-color=\"Feature Link\" data-color=\"Feature  Content\" data-size=\"Feature Content\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color: rgb(245, 245, 245); font-size: 17px; line-height: 28.9px;\" align=\"center\">\r\n                       Join over 60,000 happpy customers world wide using roice                                                                                                                                                   </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- button -->\r\n                   <tr align=\"center\">\r\n                     <td>\r\n                       <table align=\"center\" class=\"zay3-3\" width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                         <tr>\r\n                           <td align=\"center\" valign=\"middle\">\r\n                             <!-- button -->\r\n                             <table data-bgcolor=\"Main Color\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#3498db\" style=\"border-radius: 20px; font-family: \'Open Sans\', Arial, sans-serif; color: rgb(255, 255, 255); font-size: 14px; font-weight: 500; background-color: rgb(255, 255, 255);\">\r\n                               <tr>\r\n                                 <td height=\"35\" align=\"center\" valign=\"middle\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size: 11px;padding-left: 30px;padding-right: 30px;font-weight: 500;line-height: 14px;\">\r\n                                   <a href=\"#\" style=\"color: rgb(244, 67, 54);\" data-color=\"Button Link\">\r\n                                     GET STARTED                                                                                                                                                                                                                                                                                        </a>\r\n                                 </td>\r\n                               </tr>\r\n                             </table>\r\n                             <!-- end button -->\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end button -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- note -->\r\n                   <!-- end note -->\r\n                 </table>\r\n               </td>\r\n             </tr>\r\n             <tr>\r\n               <td height=\"70\">\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n<table data-thumb=\"http://www.stampready.net/dashboard/editor/user_uploads/image_uploads/2015/11/12/aOHQIWUAs3uljvLCBEX1dVG4P8qtiM7N.jpg\" data-module=\"module 49_93468\" align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\">\r\n       <tr>\r\n         <td data-border-top-color=\"Border\" data-bgcolor=\"footer\" bgcolor=\"#3b3b3b\" align=\"center\">\r\n           <table width=\"600\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"zay600\">\r\n             <tr>\r\n               <td>\r\n                 <!-- left -->\r\n                 <table class=\"zay3-3\" width=\"166\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding-left: 15PX; \">\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- title -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"Title Link\" data-color=\"Footer Title\" data-size=\"Footer Title\" data-min=\"12\" data-max=\"22\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size: 16px;  line-height:28px;\">\r\n                       Peoduct                                                                                                                                                                                           </td>\r\n                   </tr>\r\n                   <!-- end title -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#7f8c8d;\" data-link-color=\"Link\" data-color=\"Footer Content\" data-size=\"Footer Content\" data-min=\"12\" data-max=\"18\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#979797; font-size:13px; line-height: 21px;\">\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Sharing &amp; Collaboration                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Online Delivery                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Asset Management                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Mobile Apps                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Security                                                                                                                                                                                        </a>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                 </table>\r\n                 <!-- end left -->\r\n                 <!--Space-->\r\n                 <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                   <tr>\r\n                     <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                       <p style=\"padding-left: 24px;\">\r\n                         &nbsp;                                                                                                                                                                                                            </p>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!--End Space-->\r\n                 <!-- middle -->\r\n                 <table class=\"zay3-3\" width=\"166\" border=\"0\" align=\"right\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding-left: 15PX; \">\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- title -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"Title Link\" data-color=\"Footer Title\" data-size=\"Footer Title\" data-min=\"12\" data-max=\"22\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size: 16px;  line-height:28px;\">\r\n                       Company                                                                                                                                                                                           </td>\r\n                   </tr>\r\n                   <!-- end title -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#7f8c8d;\" data-link-color=\"Link\" data-color=\"Footer Content\" data-size=\"Footer Content\" data-min=\"12\" data-max=\"18\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#979797; font-size:13px; line-height: 21px;\">\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Support                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Help Center                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Getting Staeted                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Mediasilo Status                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         About                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Careers                                                                                                                                                                                        </a>\r\n                       <br>\r\n                       <a href=\"#\" style=\"color: rgb(128, 128, 128);\" data-color=\"Footer Link\">\r\n                         Conract                                              </a>\r\n                     </td>\r\n                   </tr>\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                 </table>\r\n                 <!-- end middle -->\r\n                 <!--Space-->\r\n                 <table width=\"1\" height=\"25\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"left\">\r\n                   <tr>\r\n                     <td height=\"25\" style=\"font-size: 0;line-height: 0;border-collapse: collapse;\">\r\n                       <p style=\"padding-left: 24px;\">\r\n                         &nbsp;                                                                                                                                                                                                            </p>\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!--End Space-->\r\n                 <!-- right -->\r\n                 <table class=\"zay3-3\" width=\"217\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"     padding-left: 15PX; \">\r\n                   <tr>\r\n                     <td height=\"40\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- logo -->\r\n                   <tr>\r\n                     <td align=\"left\" valign=\"middle\" style=\"line-height:0px;\">\r\n                       <img style=\"display:block; font-size:0px; line-height:0px; border:0px;\" src=\"images/img122.png\" width=\"90\" height=\"27\" alt=\"img\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end logo -->\r\n                   <tr>\r\n                     <td height=\"10\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- content -->\r\n                   <tr>\r\n                     <td data-link-style=\"text-decoration:none; color:#3cb2d0;\" data-link-color=\"Contact Link\" data-color=\"Contact\" data-size=\"Contact\" data-min=\"12\" data-max=\"18\" align=\"left\" style=\"font-family: \'Open Sans\', Arial, sans-serif; color:#ffffff; font-size:13px; line-height:28px;\">\r\n                       All Rights Reserved 2015                                                                                                                                                                                          </td>\r\n                   </tr>\r\n                   <!-- end content -->\r\n                   <tr>\r\n                     <td height=\"20\">\r\n                     </td>\r\n                   </tr>\r\n                   <!-- social -->\r\n                   <tr>\r\n                     <td align=\"left\">\r\n                       <table width=\"130\" border=\"0\" align=\"left\" cellpadding=\"0\" cellspacing=\"0\">\r\n                         <tr>\r\n                           <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" src=\"images/img123.png\" width=\"26\" height=\"26\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"10\">\r\n                           </td>\r\n                           <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" src=\"images/img124.png\" width=\"26\" height=\"26\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"10\">\r\n                           </td>\r\n                           <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" src=\"images/img125.png\" width=\"26\" height=\"26\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                           <td width=\"10\">\r\n                           </td>\r\n                           <td width=\"25\" align=\"center\" style=\"line-height:0px\">\r\n                             <a href=\"#\" style=\"color: rgb(255, 255, 255);\">\r\n                               <img data-crop=\"false\" src=\"images/img126.png\" width=\"26\" height=\"26\" alt=\"img\">\r\n                             </a>\r\n                           </td>\r\n                         </tr>\r\n                       </table>\r\n                     </td>\r\n                   </tr>\r\n                   <!-- end social -->\r\n                   <tr>\r\n                     <td height=\"45\">\r\n                     </td>\r\n                   </tr>\r\n                 </table>\r\n                 <!-- end right -->\r\n               </td>\r\n             </tr>\r\n           </table>\r\n         </td>\r\n       </tr>\r\n     </table>\r\n</body></html>', '2016-08-31 09:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_prov_code` varchar(10) DEFAULT NULL,
  `event_title` varchar(150) DEFAULT NULL,
  `event_img` varchar(100) DEFAULT NULL,
  `event_author` varchar(50) DEFAULT NULL,
  `event_type` enum('0','1','2') DEFAULT '0' COMMENT '0 - not specified, 1 - free, 2 - Paid',
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time DEFAULT '00:00:00',
  `endTime` time DEFAULT '00:00:00',
  `event_location` varchar(150) DEFAULT NULL,
  `event_views` varchar(10) DEFAULT NULL,
  `event_summary` varchar(255) DEFAULT NULL,
  `event_description` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_prov_code`, `event_title`, `event_img`, `event_author`, `event_type`, `startDate`, `endDate`, `startTime`, `endTime`, `event_location`, `event_views`, `event_summary`, `event_description`, `timestamp`) VALUES
(3, NULL, 'Test', '', 'John', '0', NULL, NULL, '00:00:00', '00:00:00', 'Lagos', NULL, '<p>Testv content</p>\r\n', '<p>Testv content again</p>\r\n', '2020-05-15 20:32:05'),
(8, '', 'Event Title', 'home1.jpg', 'Admin', '1', '2020-08-14', '2020-08-21', '15:28:00', '15:28:00', 'Lagos', NULL, '<p>Event Summary</p>\r\n', '<p>Event Description</p>\r\n', '2020-08-13 14:32:33'),
(9, '', 'Event Title', 'signup-bg.jpeg', 'Admin', '1', '2020-08-13', '2020-08-14', '15:35:00', '15:35:00', 'Lagos', NULL, '<p>SUmmary of my event</p>\r\n', '<p>My Event description</p>\r\n', '2020-08-13 14:35:41'),
(10, '', 'Studying Abroad', 'elderly image.jpg', 'Ukesp', '2', '2020-10-09', '2020-10-10', '01:45:00', '01:45:00', 'Lagos Nigeria', NULL, '<p>Know how to travel abroad</p>\r\n', '<p>This is awesome</p>\r\n', '2020-10-08 00:46:26'),
(11, '', 'Studying Abroad', 'dbs logo.png', 'Ukesp', '1', '2020-10-10', '2020-10-10', '14:00:00', '16:00:00', 'Lagos', NULL, '<p>How to get MBA from Top UK Universities in !2 Months</p>\r\n', '<p>Study online and get MBA from top universities</p>\r\n', '2020-10-08 00:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `comment_id` int(11) NOT NULL,
  `event_id` int(7) DEFAULT NULL,
  `comment_author` varchar(60) DEFAULT NULL,
  `comment` text,
  `comment_email` varchar(100) DEFAULT NULL,
  `comment_rating` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_providers`
--

CREATE TABLE `event_providers` (
  `id` int(11) NOT NULL,
  `event_prov_code` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pass_salt` varchar(100) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `billing_company` varchar(100) DEFAULT NULL,
  `billing_address_1` tinytext,
  `billing_address_2` tinytext,
  `billing_city` varchar(20) DEFAULT NULL,
  `billing_state` varchar(20) DEFAULT NULL,
  `billing_country` varchar(5) DEFAULT NULL,
  `valid_until` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plan_valid_until` timestamp NULL DEFAULT NULL,
  `mailingaddress` tinytext,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_providers`
--

INSERT INTO `event_providers` (`id`, `event_prov_code`, `username`, `last_name`, `middle_name`, `first_name`, `image`, `password`, `pass_salt`, `reset_token`, `gender`, `email`, `phone`, `country`, `source`, `active`, `billing_company`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_country`, `valid_until`, `plan_valid_until`, `mailingaddress`, `status`, `timestamp`) VALUES
(9, 'lNdFr', 'sam', 'james', 'James', 'Doe', NULL, '123456', '$2y$11$86116bd12c44a044683e9uTytm7uD9AMh8YeUQWI7u5o1QYixJu/a', NULL, NULL, 'sam@gmail.com', '08165748392', NULL, NULL, '1602697468', 'Elite World', 'Company Address', '', 'My Town', '2', '158', '0000-00-00 00:00:00', '2020-10-14 17:32:19', NULL, '1', '2020-07-30 09:22:36'),
(10, 'aRmRZ', 'sam@gmail.com', 'james', 'James', 'Doe', NULL, '$2y$11$bd4d43108d27a245e0640uV3kt7tGPeg5JjExXNhPLgdIVOF2/7F2', '$2y$11$51c247c04db34e2f4c083ugz9u/s66gmtaoQnkSfloiiC7F5fpG5S', '0Xc1mSNVlap0DR9FAVwNycnWeiMe8EsuQG2VTegyheE9PSIMMZdYskT9ce3M0o2q', NULL, 'joedbest123@yahoo.com', '08165748392', NULL, NULL, NULL, '', '', '', '', '', '12', '2020-08-20 13:39:10', NULL, NULL, '0', '2020-08-20 13:39:10'),
(11, 'suZzU', 'Abimfunke', 'Abimbola', 'Eniitan', 'Oluwafunke', NULL, 'boluwatife', '$2y$11$dbb1805f181fe331cf5f6uX8oSPHKibBA7/hy3abuoa4l5JN5CtQe', NULL, NULL, 'oluwafua5@gmail.com', '09023706962', NULL, NULL, '1601907793', '', '', '', '', '', '158', '2020-10-05 14:23:13', NULL, NULL, '1', '2020-10-05 14:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `event_provider_plans`
--

CREATE TABLE `event_provider_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(70) DEFAULT NULL,
  `plan_cost` double(6,2) DEFAULT '0.00',
  `plan_discount_cost` double(6,2) DEFAULT '0.00',
  `plan_currency` varchar(10) DEFAULT NULL,
  `plan_image` varchar(50) DEFAULT NULL,
  `plan_period` varchar(20) DEFAULT NULL,
  `highlights` tinytext,
  `description` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_provider_plans`
--

INSERT INTO `event_provider_plans` (`plan_id`, `plan_name`, `plan_cost`, `plan_discount_cost`, `plan_currency`, `plan_image`, `plan_period`, `highlights`, `description`) VALUES
(4, 'Silver Plan', 170.00, 0.50, 'GBP', '', 'week', '1 Week', '<p>Renew after 1 week</p>\r\n'),
(3, 'Basic Plan', 100.00, 0.50, 'GBP', '', 'day', '1 Day', '<p>One Off plan</p>\r\n'),
(7, 'Premium Plan', 200.00, 0.00, 'USD', '', 'year', 'One year Plan', '<p>Yearly Plan</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `event_provider_plan_orderitems`
--

CREATE TABLE `event_provider_plan_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_provider_plan_orderitems`
--

INSERT INTO `event_provider_plan_orderitems` (`id`, `session_id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(14, '7119fa10874f123cec524c7d68c991ef', 1, '1', 0, '30.00'),
(15, '7119fa10874f123cec524c7d68c991ef', 1, '1', 10, '40.00'),
(16, '7119fa10874f123cec524c7d68c991ef', 1, '1', 11, '10.00'),
(17, '97a1d91c45861570e832749e759d2c38', 1, '1', 12, '40.00'),
(18, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 13, '300.00'),
(19, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 14, '170.00'),
(20, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 15, '170.00'),
(21, '5f1bbf141466351cc5b058d5966986ae', 0, '1', 16, '300.00'),
(22, '0786fe36b49b59197bde04070fa246a0', 0, '1', 17, '200.00'),
(23, '0786fe36b49b59197bde04070fa246a0', 0, '1', 18, '100.00'),
(24, '26ce3e04515b6ae0fe4f6d5d418c3f74', 0, '1', 19, '100.00'),
(25, '26ce3e04515b6ae0fe4f6d5d418c3f74', 0, '1', 20, '200.00'),
(26, '0ed186e634226020d26babc5acc554f9', 0, '1', 21, '200.00'),
(27, '0ed186e634226020d26babc5acc554f9', 0, '1', 22, '170.00'),
(28, '79f3f596e6f0c4d42fcf4647bdd31e63', 0, '1', 23, '200.00'),
(29, '1ff45ebcefd5c149789ea388f03e9df1', 0, '1', 24, '170.00');

-- --------------------------------------------------------

--
-- Table structure for table `event_provider_plan_orders`
--

CREATE TABLE `event_provider_plan_orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_provider_plan_orders`
--

INSERT INTO `event_provider_plan_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(9, NULL, '7119fa10874f123cec524c7d68c991ef', 40.00, '6', '0', 'EUR', '2020-07-30 15:08:49'),
(10, NULL, '7119fa10874f123cec524c7d68c991ef', 40.00, '6', '0', 'EUR', '2020-07-30 15:09:09'),
(11, NULL, '7119fa10874f123cec524c7d68c991ef', 10.00, '6', '0', 'USD', '2020-07-30 15:29:08'),
(12, NULL, '97a1d91c45861570e832749e759d2c38', 40.00, '4', '0', 'EUR', '2020-08-18 01:24:15'),
(13, NULL, '31bde9df88f84b91817bf845bbc9287d', 300.00, '1', '0', 'GBP', '2020-08-26 10:06:24'),
(14, NULL, '31bde9df88f84b91817bf845bbc9287d', 170.00, '1', '0', 'GBP', '2020-08-26 10:15:21'),
(15, NULL, '31bde9df88f84b91817bf845bbc9287d', 170.00, '1', '0', 'GBP', '2020-08-26 10:18:41'),
(16, NULL, '5f1bbf141466351cc5b058d5966986ae', 300.00, '1', '0', 'GBP', '2020-09-15 06:41:29'),
(17, NULL, '0786fe36b49b59197bde04070fa246a0', 200.00, '1', '0', 'USD', '2020-09-22 04:47:21'),
(18, NULL, '0786fe36b49b59197bde04070fa246a0', 100.00, '1', '0', 'GBP', '2020-09-22 05:54:10'),
(19, NULL, '26ce3e04515b6ae0fe4f6d5d418c3f74', 100.00, '1', '0', 'GBP', '2020-10-05 07:27:56'),
(20, NULL, '26ce3e04515b6ae0fe4f6d5d418c3f74', 200.00, '1', '0', 'USD', '2020-10-05 08:09:15'),
(21, NULL, '0ed186e634226020d26babc5acc554f9', 200.00, '1', '0', 'USD', '2020-10-07 02:38:36'),
(22, NULL, '0ed186e634226020d26babc5acc554f9', 170.00, '1', '0', 'GBP', '2020-10-07 03:30:48'),
(23, NULL, '79f3f596e6f0c4d42fcf4647bdd31e63', 200.00, '1', '0', 'USD', '2020-10-14 10:31:29'),
(24, NULL, '1ff45ebcefd5c149789ea388f03e9df1', 170.00, '1', '0', 'GBP', '2020-10-14 10:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Who are you guys?', '<p>We are an Institution.</p>\r\n', '2020-08-27 06:18:37', '2020-08-27 13:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`) VALUES
(1, 'super_admin', '2020-09-16 10:35:13'),
(2, 'admin', '2020-09-16 10:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `institute_id` int(11) NOT NULL,
  `institute_name` tinytext,
  `location_id` varchar(5) DEFAULT NULL,
  `state_id` varchar(5) DEFAULT NULL,
  `country_id` varchar(5) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`institute_id`, `institute_name`, `location_id`, `state_id`, `country_id`, `timestamp`, `admin_id`) VALUES
(1, 'Igbinedion University', NULL, NULL, NULL, '2016-07-10 13:37:56', NULL),
(2, 'Abia State University', NULL, NULL, NULL, '2016-07-10 13:38:19', NULL),
(3, 'Leicester University', '1', '38', '3', '2020-05-15 18:13:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobs_id` int(111) NOT NULL,
  `recruiter_code` varchar(200) DEFAULT NULL,
  `job_title` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `job_subcategory` varchar(255) DEFAULT NULL,
  `jobstype` varchar(255) DEFAULT NULL,
  `joblevel` varchar(255) DEFAULT NULL,
  `job_location` varchar(255) DEFAULT NULL,
  `job_sector` varchar(255) DEFAULT NULL,
  `job_company` varchar(255) DEFAULT NULL,
  `amount_per_period` varchar(255) DEFAULT NULL,
  `salary_period` varchar(255) DEFAULT NULL,
  `descript` text,
  `requirements` text,
  `apply_info` text,
  `job_img` varchar(255) DEFAULT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `state_id` varchar(40) DEFAULT NULL,
  `location_id` varchar(40) DEFAULT NULL,
  `country_id` varchar(40) DEFAULT '156',
  `views` varchar(255) DEFAULT '0',
  `comments` varchar(255) DEFAULT '0',
  `tag` text,
  `status` enum('0','1') DEFAULT '0',
  `jobsdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobs_id`, `recruiter_code`, `job_title`, `email`, `phone`, `job_category`, `job_subcategory`, `jobstype`, `joblevel`, `job_location`, `job_sector`, `job_company`, `amount_per_period`, `salary_period`, `descript`, `requirements`, `apply_info`, `job_img`, `startDate`, `endDate`, `state_id`, `location_id`, `country_id`, `views`, `comments`, `tag`, `status`, `jobsdate`) VALUES
(1, '3POzr', 'Junior Level Developer', NULL, NULL, '20', '14', '1', '2', '3', '1', '1', '2000', NULL, 'Testing a developer skill', NULL, NULL, 'fddddddd.png', NULL, NULL, '1', '1', '227', '0', '0', NULL, '0', '2020-05-12 07:56:58'),
(2, 'ZVgy0', 'Cloud Engineer', 'joedbest123@yahoo.com', '08165748392', '11', '14', '8', '4', '1', '3', '1', '50000', NULL, 'Experience Cloud engineer needed', NULL, NULL, '8d65ea3.png', '', '', NULL, '1', '8', '0', '0', NULL, '0', '2020-08-11 13:51:12'),
(3, 'ZVgy0', 'Cloud Engineer', 'joedbest122@yahoo.com', '0816993594', '20', '20', '3', '4', '2', '2', '5', '25k', '500k', '<p>Job Description</p>', '<p>Job Requirements</p>', '<p>Aplication Info</p>', '8d65ea3.png', '08/12/2020', '08/25/2020', NULL, '1', '4', '0', '0', NULL, '0', '2020-08-12 14:26:34'),
(4, 'ZVgy0', 'Cloud Engineer', 'sam@gamil.com', '0816993594', '20', '20', '3', '4', '2', '2', '5', '25k', '500k', '<p>Job desc</p>', '<p>Job Requirements</p>', '<p>App Info</p>', '8d65ea3.png', '08/12/2020', '08/19/2020', NULL, '1', '8', '0', '0', NULL, '0', '2020-08-12 14:40:19'),
(5, 'ZVgy0', 'Electrical Engineer', 'gooption@yahoo.com', '08165748392', '20', '20', '3', '5', '1', '3', '5', '25000', '1 month', '<p>Electrical Engineer</p>', '<p>Job Requirements</p>', '<p>Application Info</p>', '8d65ea3.png', '08/19/2020', '08/25/2020', NULL, NULL, '11', '0', '0', NULL, '0', '2020-08-18 09:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE `jobseekers` (
  `id` int(11) NOT NULL,
  `seeker_code` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `mailing_address` tinytext,
  `mailing_address2` text,
  `city` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `job_category_preference` varchar(10) DEFAULT NULL,
  `job_subcategory_preference` varchar(10) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseekers`
--

INSERT INTO `jobseekers` (`id`, `seeker_code`, `username`, `last_name`, `middle_name`, `first_name`, `password`, `reset_token`, `gender`, `email`, `phone`, `location`, `source`, `mailing_address`, `mailing_address2`, `city`, `state`, `country`, `job_category_preference`, `job_subcategory_preference`, `status`, `timestamp`) VALUES
(2, 'RxexRODcqvp', NULL, 'Emmanuel', 'Chukwunonso', 'Tokunbo', '$2y$11$40d3a61b4d7c14cb01c15u0LK4QQ3sHI94p7dqCERRP645.vmrw4m', NULL, '2', 'gooption@yahoo.com', '4rtew', NULL, '', '', '', '', '', '', '20', '14', '1', '2020-06-08 16:27:36'),
(3, '5oDjennLOMd', NULL, 'james', 'James', 'Doe', '$2y$11$70fc0d556d9214cf31ed7uGFRSpVJU7czlKhpFRnD6T.xEtUghbqe', NULL, '1', 'sam@gmail.com', '081637462734', NULL, 'Google Ads', 'My Address', '', '', '', '1', '20', '20', '1', '2020-07-31 07:17:39'),
(4, 'gsGeKEqwoTg', NULL, 'james', 'James', 'Doe', '$2y$11$70ff6f7446f1eafbeb473u2k4Q67WsD4SH2Lj99j/PwiG4KuLePUW', 'gkIwSruDgS5IEK5npdkmAzPqSs5P4vcMwjGBkUExCHdeuwygMuAKR99UbLZNeV1r', '1', 'joedbest123@yahoo.com', '08165748392', NULL, 'Facebook Ads', 'My Address', '', '', '', '13', NULL, NULL, '1', '2020-09-14 17:51:11'),
(5, 'gFOBHIiGDik', NULL, 'Nagi', 'Kaur', 'Gitika', '$2y$11$0c2681f7a162136ce5dd0ukG2o7YEYu0t19zXkIsleKvsdr5qc.m.', NULL, '2', 'gitikakaur0@gmail.com', '7065887275', NULL, 'Google Ads', 'A 601 Shaurya Apartments Sector 62 Noida.', '', '', '', '100', NULL, NULL, '1', '2020-10-05 06:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobstate`
--

CREATE TABLE `jobstate` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `country_id` int(3) DEFAULT '1',
  `state_info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobstate`
--

INSERT INTO `jobstate` (`state_id`, `state_name`, `country_id`, `state_info`) VALUES
(1, 'Abia State', 156, NULL),
(2, 'Adamawa State', 156, NULL),
(3, 'Akwa Ibom State', 156, NULL),
(4, 'Anambra State', 156, NULL),
(5, 'Bauchi State', 156, NULL),
(6, 'Bayelsa State', 156, NULL),
(7, 'Benue State', 156, NULL),
(8, 'Borno State', 156, NULL),
(9, 'Cross River State', 156, NULL),
(10, 'Delta State', 156, NULL),
(11, 'Ebonyi State', 156, NULL),
(12, 'Edo State', 156, NULL),
(13, 'Ekiti State', 156, NULL),
(14, 'Enugu State', 156, NULL),
(15, 'FCT', 156, NULL),
(16, 'Gombe State', 156, NULL),
(17, 'Imo State', 156, NULL),
(18, 'Jigawa State', 156, NULL),
(19, 'Kaduna State', 156, NULL),
(20, 'Kano State', 156, NULL),
(21, 'Katsina State', 156, NULL),
(22, 'Kebbi State', 156, NULL),
(23, 'Kogi State', 156, NULL),
(24, 'Kwara State', 156, NULL),
(25, 'Lagos State', 156, NULL),
(26, 'Nasarawa State', 156, NULL),
(27, 'Niger State', 156, NULL),
(28, 'Ogun State', 156, NULL),
(29, 'Ondo State', 156, NULL),
(30, 'Osun State', 156, NULL),
(31, 'Oyo State', 156, NULL),
(32, 'Plateau State', 156, NULL),
(33, 'Rivers State', 156, NULL),
(34, 'Sokoto State', 156, NULL),
(35, 'Taraba State', 156, NULL),
(36, 'Yobe State', 156, NULL),
(37, 'Zamfara State', 156, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `job_cat_img` varchar(100) DEFAULT NULL,
  `admin_id` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`category_id`, `category_name`, `job_cat_img`, `admin_id`) VALUES
(1, 'Accountancy jobs', NULL, NULL),
(2, 'Actuarial jobs', NULL, NULL),
(3, 'Admin, Secretarial & PA jobs', NULL, NULL),
(4, 'Apprenticeships jobs', NULL, NULL),
(5, 'Banking jobs', NULL, NULL),
(6, 'Charity & Voluntary jobs', NULL, NULL),
(7, 'Construction & Property jobs', NULL, NULL),
(8, 'Customer Service jobs', NULL, NULL),
(9, 'Education jobs', NULL, NULL),
(10, '\r\nEnergy jobs', NULL, NULL),
(11, 'Engineering jobs', NULL, NULL),
(12, 'Estate Agency jobs', NULL, NULL),
(13, 'Financial Services jobs', NULL, NULL),
(14, 'FMCG jobs', NULL, NULL),
(15, 'General Insurance jobs ', NULL, NULL),
(16, 'Graduate jobs', NULL, NULL),
(17, 'Health & Medicine jobs', NULL, NULL),
(18, 'Hospitality & Catering jobs', NULL, NULL),
(19, 'Human Resources jobs', NULL, NULL),
(20, 'IT & Telecoms jobs', NULL, NULL),
(21, 'IT Contractor jobs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_companies`
--

CREATE TABLE `job_companies` (
  `company_id` int(11) NOT NULL,
  `recruiter_code` varchar(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_info` text,
  `company_img` varchar(60) DEFAULT NULL,
  `relevance` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_companies`
--

INSERT INTO `job_companies` (`company_id`, `recruiter_code`, `company_name`, `company_info`, `company_img`, `relevance`) VALUES
(1, NULL, 'Dahfex Global', NULL, 'agric2.jpg', 0),
(2, NULL, 'MTN', NULL, NULL, 0),
(3, NULL, 'Airtel', NULL, NULL, 1),
(4, NULL, 'Nestle', NULL, NULL, 1),
(5, 'ZVgy0', 'James_doe Company', 'COmany Info', '8d65ea3.png', 1),
(6, 'mBe2P', 'ukesps', 'Educational ', '0308b44.png', NULL),
(7, 'wOIBQ', 'James_doe Company3', 'ascascas', '2e624af.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_experience`
--

CREATE TABLE `job_experience` (
  `jobexperience_id` int(11) NOT NULL,
  `jobexperience_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_experience`
--

INSERT INTO `job_experience` (`jobexperience_id`, `jobexperience_name`) VALUES
(1, '1-2years'),
(2, '2-3years'),
(3, '3-5years'),
(4, '5-8years'),
(5, '8-10years'),
(6, '10-15years'),
(7, '15years and above');

-- --------------------------------------------------------

--
-- Table structure for table `job_levels`
--

CREATE TABLE `job_levels` (
  `joblevel_id` int(11) NOT NULL,
  `joblevel_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_levels`
--

INSERT INTO `job_levels` (`joblevel_id`, `joblevel_name`) VALUES
(1, 'Director'),
(2, 'Manager'),
(3, 'Department Head'),
(4, 'Experienced'),
(5, 'Fresh Graduate'),
(6, 'Undergraduate'),
(7, 'Vocational/Unskilled');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_info` text,
  `location_img` varchar(100) DEFAULT NULL,
  `state_id` varchar(6) DEFAULT NULL,
  `country_id` varchar(6) DEFAULT NULL,
  `admin_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`location_id`, `location_name`, `location_info`, `location_img`, `state_id`, `country_id`, `admin_id`) VALUES
(1, 'Manchester', NULL, 'eeeeeee.jpg', NULL, NULL, NULL),
(2, 'Burnley', NULL, 'singles_mannheim_0.jpg', NULL, NULL, NULL),
(3, 'Liverpool', NULL, 'fddddddd.png', NULL, NULL, NULL),
(4, 'dsdd', NULL, '', '', '13', ''),
(5, 'Lagos', NULL, '', '25', '158', ''),
(7, 'Location 2', NULL, NULL, '12', '158', ''),
(8, 'Hackney', NULL, NULL, '73', '227', 'GR4bs'),
(9, 'Birmingham', NULL, NULL, '48', '227', 'GR4bs'),
(10, 'Alberta', NULL, NULL, '137', '39', 'GR4bs'),
(11, 'British Columbia', NULL, NULL, '138', '39', 'GR4bs'),
(12, 'Monitoba', NULL, NULL, '139', '39', 'GR4bs'),
(13, 'New Brunswick', NULL, NULL, '140', '39', 'GR4bs'),
(14, 'Nova Scotia', NULL, NULL, '143', '39', 'GR4bs'),
(15, 'Nunavut', NULL, NULL, '144', '39', 'GR4bs'),
(16, 'Ontario', NULL, NULL, '145', '39', 'GR4bs'),
(17, 'Quebec', NULL, NULL, '147', '39', 'GR4bs'),
(18, 'Saskatchewan', NULL, NULL, '148', '39', 'GR4bs'),
(19, 'Yukon', NULL, NULL, '149', '39', 'GR4bs'),
(20, 'Bath', NULL, NULL, '47', '227', 'GR4bs'),
(21, 'Bradford', NULL, NULL, '49', '227', 'GR4bs'),
(22, 'Bristol', NULL, NULL, '51', '227', 'GR4bs'),
(23, 'Cambridge', NULL, NULL, '52', '227', 'GR4bs'),
(24, 'Canterbury', NULL, NULL, '53', '227', 'GR4bs'),
(25, 'Carlisle', NULL, NULL, '54', '227', 'GR4bs'),
(26, 'Chelmsford', NULL, NULL, '55', '227', 'GR4bs'),
(27, 'Chester', NULL, NULL, '56', '227', 'GR4bs'),
(28, 'Chichester', NULL, NULL, '57', '227', 'GR4bs'),
(29, 'Coventry', NULL, NULL, '58', '227', 'GR4bs'),
(30, 'Derby', NULL, NULL, '59', '227', 'GR4bs'),
(31, 'Durham', NULL, NULL, '60', '227', 'GR4bs'),
(32, 'Ely', NULL, NULL, '61', '227', 'GR4bs'),
(33, 'Lancaster', NULL, NULL, '67', '227', 'GR4bs'),
(34, 'Leeds', NULL, NULL, '68', '227', 'GR4bs'),
(35, 'Liverpool', NULL, NULL, '72', '227', 'GR4bs'),
(36, 'London', NULL, NULL, '73', '227', 'GR4bs'),
(37, 'Manchester', NULL, NULL, '74', '227', 'GR4bs'),
(38, 'Newcastle', NULL, NULL, '75', '227', 'GR4bs'),
(39, 'Norwich', NULL, NULL, '76', '227', 'GR4bs'),
(40, 'Nottingham', NULL, NULL, '77', '227', 'GR4bs'),
(41, 'Oxford', NULL, NULL, '78', '227', 'GR4bs'),
(42, 'Peterborough', NULL, NULL, '79', '227', 'GR4bs'),
(43, 'Plymouth', NULL, NULL, '80', '227', 'GR4bs'),
(44, 'Preston', NULL, NULL, '82', '227', 'GR4bs'),
(45, 'Salford', NULL, NULL, '84', '227', 'GR4bs'),
(46, 'Salisbury', NULL, NULL, '85', '227', 'GR4bs'),
(47, 'Sheffield', NULL, NULL, '86', '227', 'GR4bs'),
(48, 'Southhampton', NULL, NULL, '87', '227', 'GR4bs'),
(49, 'Sunderland', NULL, NULL, '89', '227', 'GR4bs'),
(50, 'Truro', NULL, NULL, '90', '227', 'GR4bs'),
(51, 'Wells', NULL, NULL, '92', '227', 'GR4bs'),
(52, 'Westminister', NULL, NULL, '93', '227', 'GR4bs'),
(53, 'Winchester', NULL, NULL, '94', '227', 'GR4bs'),
(54, 'York', NULL, NULL, '97', '227', 'GR4bs'),
(55, 'Alabama', NULL, NULL, '150', '228', 'GR4bs'),
(56, 'Alaska', NULL, NULL, '151', '228', 'GR4bs'),
(57, 'American Samoa', NULL, NULL, '152', '228', 'GR4bs'),
(58, 'Arizona', NULL, NULL, '153', '228', 'GR4bs'),
(59, 'Arkansas', NULL, NULL, '154', '228', 'GR4bs'),
(60, 'California', NULL, NULL, '155', '228', 'GR4bs'),
(61, 'Colorado', NULL, NULL, '156', '228', 'GR4bs'),
(62, 'Connecticut', NULL, NULL, '157', '228', 'GR4bs'),
(63, 'Delaware', NULL, NULL, '158', '228', 'GR4bs'),
(64, 'Florida', NULL, NULL, '160', '228', 'GR4bs'),
(65, 'Georgia', NULL, NULL, '161', '228', 'GR4bs'),
(66, 'Guam', NULL, NULL, '162', '228', 'GR4bs'),
(67, 'Hawaii', NULL, NULL, '163', '228', 'GR4bs'),
(68, 'Idaho', NULL, NULL, '164', '228', 'GR4bs'),
(69, 'Illinois', NULL, NULL, '165', '228', 'GR4bs'),
(70, 'Indiana', NULL, NULL, '166', '228', 'GR4bs'),
(71, 'Iowa', NULL, NULL, '167', '228', 'GR4bs'),
(72, 'Kansas', NULL, NULL, '168', '228', 'GR4bs'),
(73, 'Kentucky', NULL, NULL, '169', '228', 'GR4bs'),
(74, 'Louisiana', NULL, NULL, '170', '228', 'GR4bs'),
(75, 'Maine', NULL, NULL, '171', '228', 'GR4bs'),
(76, 'Maryland', NULL, NULL, '172', '228', 'GR4bs'),
(77, 'Massachusetts', NULL, NULL, '173', '228', 'GR4bs'),
(78, 'Michigan', NULL, NULL, '174', '228', 'GR4bs'),
(79, 'Minnesota', NULL, NULL, '175', '228', 'GR4bs'),
(80, 'Mississippi', NULL, NULL, '176', '228', 'GR4bs'),
(81, 'Missouri', NULL, NULL, '177', '228', 'GR4bs'),
(82, 'Montana', NULL, NULL, '178', '228', 'GR4bs'),
(83, 'Nebraska', NULL, NULL, '179', '228', 'GR4bs'),
(84, 'Nevada', NULL, NULL, '180', '228', 'GR4bs'),
(85, 'New Hampshire', NULL, NULL, '181', '228', 'GR4bs'),
(86, 'New Jersey', NULL, NULL, '182', '228', 'GR4bs'),
(87, 'New Mexico', NULL, NULL, '183', '228', 'GR4bs'),
(88, 'New York', NULL, NULL, '184', '228', 'GR4bs'),
(89, 'North Caroline', NULL, NULL, '185', '228', 'GR4bs'),
(90, 'North Dakota', NULL, NULL, '186', '228', 'GR4bs'),
(91, 'Ohio', NULL, NULL, '188', '228', 'GR4bs'),
(92, 'Oklahoma', NULL, NULL, '189', '228', 'GR4bs'),
(93, 'Oregon', NULL, NULL, '190', '228', 'GR4bs'),
(94, 'Pennysylvania', NULL, NULL, '191', '228', 'GR4bs'),
(95, 'Puerto Rico', NULL, NULL, '192', '228', 'GR4bs'),
(96, 'Tennessee', NULL, NULL, '196', '228', 'GR4bs'),
(97, 'Texas', NULL, NULL, '197', '228', 'GR4bs'),
(98, 'Utah', NULL, NULL, '198', '228', 'GR4bs'),
(99, 'Vermont', NULL, NULL, '199', '228', 'GR4bs'),
(100, 'Virgin Islands', NULL, NULL, '200', '228', 'GR4bs'),
(101, 'Virginia', NULL, NULL, '201', '228', 'GR4bs'),
(102, 'Washington', NULL, NULL, '202', '228', 'GR4bs'),
(103, 'West Virginia', NULL, NULL, '203', '228', 'GR4bs'),
(104, 'Wyoming', NULL, NULL, '205', '228', 'GR4bs'),
(105, 'Queensland', NULL, NULL, '209', '13', 'GR4bs'),
(106, 'Tasmania', NULL, NULL, '211', '13', 'GR4bs'),
(107, 'Victoria', NULL, NULL, '212', '13', 'GR4bs'),
(108, 'south Caroline', NULL, NULL, '194', '228', 'GR4bs'),
(109, 'South Dakota', NULL, NULL, '195', '228', 'GR4bs');

-- --------------------------------------------------------

--
-- Table structure for table `job_sectors`
--

CREATE TABLE `job_sectors` (
  `sector_id` int(11) NOT NULL,
  `sector_name` varchar(100) DEFAULT NULL,
  `sector_img` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_sectors`
--

INSERT INTO `job_sectors` (`sector_id`, `sector_name`, `sector_img`) VALUES
(1, 'Health', 'healthcare-trends-1080x675.jpg'),
(2, 'Technology', 'AdobeStock_118793641-1320x740.jpeg'),
(3, 'Engineering', 'Work-for-graduates-in-mechanical-engineering.jpg'),
(4, 'Graduates', 'UNIOSUN-Medical-Students-Graduates-in-Ukraine-4-e1498922125282.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL,
  `skill_category` varchar(4) DEFAULT NULL,
  `admin_id` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`skill_id`, `skill_name`, `skill_category`, `admin_id`) VALUES
(1, 'Project Management', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_skill_categories`
--

CREATE TABLE `job_skill_categories` (
  `skcat_id` int(11) NOT NULL,
  `skcat_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skill_categories`
--

INSERT INTO `job_skill_categories` (`skcat_id`, `skcat_name`) VALUES
(1, 'ICT Skills');

-- --------------------------------------------------------

--
-- Table structure for table `job_structures`
--

CREATE TABLE `job_structures` (
  `jobtype_id` int(11) NOT NULL,
  `jobtype_name` varchar(255) DEFAULT NULL,
  `type_img` varchar(60) DEFAULT NULL,
  `views` int(9) DEFAULT NULL,
  `admin_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_structures`
--

INSERT INTO `job_structures` (`jobtype_id`, `jobtype_name`, `type_img`, `views`, `admin_id`) VALUES
(1, 'Full Time', NULL, NULL, NULL),
(2, 'Part Time', NULL, NULL, NULL),
(3, 'Intern', NULL, NULL, NULL),
(4, 'Free-lance', NULL, NULL, NULL),
(5, 'Contract', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_sub_categories`
--

CREATE TABLE `job_sub_categories` (
  `subcat_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_parent` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_sub_categories`
--

INSERT INTO `job_sub_categories` (`subcat_id`, `category_name`, `category_parent`) VALUES
(20, 'Software Development Jobs', '20');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `jobtype_id` int(11) NOT NULL,
  `jobtype_name` varchar(255) DEFAULT NULL,
  `type_img` varchar(60) DEFAULT NULL,
  `views` int(9) DEFAULT NULL,
  `admin_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`jobtype_id`, `jobtype_name`, `type_img`, `views`, `admin_id`) VALUES
(1, 'Delivery driver jobs', NULL, NULL, NULL),
(2, 'Transport and logistics jobs', NULL, NULL, NULL),
(3, 'Immediate start jobs', NULL, NULL, NULL),
(4, 'Supermarket jobs', NULL, NULL, NULL),
(5, 'Warehouse jobs', NULL, NULL, NULL),
(6, 'Farm jobs', NULL, NULL, NULL),
(7, 'Health, medicine and NHS jobs', NULL, NULL, NULL),
(8, 'Field Jobs', 'image3.jpg', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_views`
--

CREATE TABLE `job_views` (
  `view_id` int(11) NOT NULL,
  `page_visited` varchar(40) DEFAULT NULL,
  `job_category` int(5) DEFAULT NULL,
  `job_type` int(5) DEFAULT NULL,
  `job_company` int(4) DEFAULT NULL,
  `job_sector` int(4) DEFAULT NULL,
  `job_location` int(4) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_views`
--

INSERT INTO `job_views` (`view_id`, `page_visited`, `job_category`, `job_type`, `job_company`, `job_sector`, `job_location`, `ip_address`, `timestamp`) VALUES
(1, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2020-04-04 07:35:47'),
(2, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2020-04-04 07:35:48'),
(3, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2020-04-04 07:35:51'),
(4, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-04 07:35:54'),
(5, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-04 07:35:55'),
(6, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-04 07:35:57'),
(7, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2020-04-04 07:35:58'),
(8, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2020-04-04 07:40:48'),
(9, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2020-04-04 07:40:49'),
(10, NULL, NULL, 6, NULL, NULL, NULL, NULL, '2020-04-04 14:21:14'),
(11, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2020-04-04 14:21:16'),
(12, NULL, NULL, 6, NULL, NULL, NULL, NULL, '2020-04-04 14:21:20'),
(13, NULL, NULL, 4, NULL, NULL, NULL, NULL, '2020-04-04 14:21:25'),
(14, NULL, NULL, 7, NULL, NULL, NULL, NULL, '2020-04-04 14:21:26'),
(15, NULL, NULL, 8, NULL, NULL, NULL, NULL, '2020-04-04 14:21:28'),
(16, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2020-04-04 17:54:56'),
(17, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2020-04-04 17:54:58'),
(26, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2020-04-09 11:30:09'),
(27, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2020-04-09 11:30:10'),
(28, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2020-04-09 11:30:12'),
(29, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-04-10 17:32:52'),
(30, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-04-10 17:32:54'),
(31, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2020-04-10 17:32:55'),
(32, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2020-04-10 17:32:56'),
(33, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2020-04-10 17:32:57'),
(34, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2020-04-10 17:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `locals`
--

CREATE TABLE `locals` (
  `local_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `local_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locals`
--

INSERT INTO `locals` (`local_id`, `state_id`, `local_name`) VALUES
(1, 1, 'Aba South'),
(2, 1, 'Arochukwu'),
(3, 1, 'Bende'),
(4, 1, 'Ikwuano'),
(5, 1, 'Isiala Ngwa North'),
(6, 1, 'Isiala Ngwa South'),
(7, 1, 'Isuikwuato'),
(8, 1, 'Obi Ngwa'),
(9, 1, 'Ohafia'),
(10, 1, 'Osisioma'),
(11, 1, 'Ugwunagbo'),
(12, 1, 'Ukwa East'),
(13, 1, 'Ukwa West'),
(14, 1, 'Umuahia North'),
(15, 1, 'Umuahia South'),
(16, 1, 'Umu Nneochi'),
(17, 2, 'Fufure'),
(18, 2, 'Ganye'),
(19, 2, 'Gayuk'),
(20, 2, 'Gombi'),
(21, 2, 'Grie'),
(22, 2, 'Hong'),
(23, 2, 'Jada'),
(24, 2, 'Lamurde'),
(25, 2, 'Madagali'),
(26, 2, 'Maiha'),
(27, 2, 'Mayo Belwa'),
(28, 2, 'Michika'),
(29, 2, 'Mubi North'),
(30, 2, 'Mubi South'),
(31, 2, 'Numan'),
(32, 2, 'Shelleng'),
(33, 2, 'Song'),
(34, 2, 'Toungo'),
(35, 2, 'Yola North'),
(36, 2, 'Yola South'),
(37, 3, 'Eastern Obolo'),
(38, 3, 'Eket'),
(39, 3, 'Esit Eket'),
(40, 3, 'Essien Udim'),
(41, 3, 'Etim Ekpo'),
(42, 3, 'Etinan'),
(43, 3, 'Ibeno'),
(44, 3, 'Ibesikpo Asutan'),
(45, 3, 'Ibiono-Ibom'),
(46, 3, 'Ika'),
(47, 3, 'Ikono'),
(48, 3, 'Ikot Abasi'),
(49, 3, 'Ikot Ekpene'),
(50, 3, 'Ini'),
(51, 3, 'Itu'),
(52, 3, 'Mbo'),
(53, 3, 'Mkpat-Enin'),
(54, 3, 'Nsit-Atai'),
(55, 3, 'Nsit-Ibom'),
(56, 3, 'Nsit-Ubium'),
(57, 3, 'Obot Akara'),
(58, 3, 'Okobo'),
(59, 3, 'Onna'),
(60, 3, 'Oron'),
(61, 3, 'Oruk Anam'),
(62, 3, 'Udung-Uko'),
(63, 3, 'Ukanafun'),
(64, 3, 'Uruan'),
(65, 3, 'Urue-Offong/Oruko'),
(66, 3, 'Uyo'),
(67, 4, 'Anambra East'),
(68, 4, 'Anambra West'),
(69, 4, 'Anaocha'),
(70, 4, 'Awka North'),
(71, 4, 'Awka South'),
(72, 4, 'Ayamelum'),
(73, 4, 'Dunukofia'),
(74, 4, 'Ekwusigo'),
(75, 4, 'Idemili North'),
(76, 4, 'Idemili South'),
(77, 4, 'Ihiala'),
(78, 4, 'Njikoka'),
(79, 4, 'Nnewi North'),
(80, 4, 'Nnewi South'),
(81, 4, 'Ogbaru'),
(82, 4, 'Onitsha North'),
(83, 4, 'Onitsha South'),
(84, 4, 'Orumba North'),
(85, 4, 'Orumba South'),
(86, 4, 'Oyi'),
(87, 5, 'Bauchi'),
(88, 5, 'Bogoro'),
(89, 5, 'Damban'),
(90, 5, 'Darazo'),
(91, 5, 'Dass'),
(92, 5, 'Gamawa'),
(93, 5, 'Ganjuwa'),
(94, 5, 'Giade'),
(95, 5, 'Itas/Gadau'),
(96, 5, 'Jama\'are'),
(97, 5, 'Katagum'),
(98, 5, 'Kirfi'),
(99, 5, 'Misau'),
(100, 5, 'Ningi'),
(101, 5, 'Shira'),
(102, 5, 'Tafawa Balewa'),
(103, 5, 'Toro'),
(104, 5, 'Warji'),
(105, 5, 'Zaki'),
(106, 6, 'Ekeremor'),
(107, 6, 'Kolokuma/Opokuma'),
(108, 6, 'Nembe'),
(109, 6, 'Ogbia'),
(110, 6, 'Sagbama'),
(111, 6, 'Southern Ijaw'),
(112, 6, 'Yenagoa'),
(113, 7, 'Apa'),
(114, 7, 'Ado'),
(115, 7, 'Buruku'),
(116, 7, 'Gboko'),
(117, 7, 'Guma'),
(118, 7, 'Gwer East'),
(119, 7, 'Gwer West'),
(120, 7, 'Katsina-Ala'),
(121, 7, 'Konshisha'),
(122, 7, 'Kwande'),
(123, 7, 'Logo'),
(124, 7, 'Makurdi'),
(125, 7, 'Obi'),
(126, 7, 'Ogbadibo'),
(127, 7, 'Ohimini'),
(128, 7, 'Oju'),
(129, 7, 'Okpokwu'),
(130, 7, 'Oturkpo'),
(131, 7, 'Tarka'),
(132, 7, 'Ukum'),
(133, 7, 'Ushongo'),
(134, 7, 'Vandeikya'),
(135, 8, 'Askira/Uba'),
(136, 8, 'Bama'),
(137, 8, 'Bayo'),
(138, 8, 'Biu'),
(139, 8, 'Chibok'),
(140, 8, 'Damboa'),
(141, 8, 'Dikwa'),
(142, 8, 'Gubio'),
(143, 8, 'Guzamala'),
(144, 8, 'Gwoza'),
(145, 8, 'Hawul'),
(146, 8, 'Jere'),
(147, 8, 'Kaga'),
(148, 8, 'Kala/Balge'),
(149, 8, 'Konduga'),
(150, 8, 'Kukawa'),
(151, 8, 'Kwaya Kusar'),
(152, 8, 'Mafa'),
(153, 8, 'Magumeri'),
(154, 8, 'Maiduguri'),
(155, 8, 'Marte'),
(156, 8, 'Mobbar'),
(157, 8, 'Monguno'),
(158, 8, 'Ngala'),
(159, 8, 'Nganzai'),
(160, 8, 'Shani'),
(161, 9, 'Akamkpa'),
(162, 9, 'Akpabuyo'),
(163, 9, 'Bakassi'),
(164, 9, 'Bekwarra'),
(165, 9, 'Biase'),
(166, 9, 'Boki'),
(167, 9, 'Calabar Municipal'),
(168, 9, 'Calabar South'),
(169, 9, 'Etung'),
(170, 9, 'Ikom'),
(171, 9, 'Obanliku'),
(172, 9, 'Obubra'),
(173, 9, 'Obudu'),
(174, 9, 'Odukpani'),
(175, 9, 'Ogoja'),
(176, 9, 'Yakuur'),
(177, 9, 'Yala'),
(178, 10, 'Aniocha South'),
(179, 10, 'Bomadi'),
(180, 10, 'Burutu'),
(181, 10, 'Ethiope East'),
(182, 10, 'Ethiope West'),
(183, 10, 'Ika North East'),
(184, 10, 'Ika South'),
(185, 10, 'Isoko North'),
(186, 10, 'Isoko South'),
(187, 10, 'Ndokwa East'),
(188, 10, 'Ndokwa West'),
(189, 10, 'Okpe'),
(190, 10, 'Oshimili North'),
(191, 10, 'Oshimili South'),
(192, 10, 'Patani'),
(193, 10, 'Sapele'),
(194, 10, 'Udu'),
(195, 10, 'Ughelli North'),
(196, 10, 'Ughelli South'),
(197, 10, 'Ukwuani'),
(198, 10, 'Uvwie'),
(199, 10, 'Warri North'),
(200, 10, 'Warri South'),
(201, 10, 'Warri South West'),
(202, 11, 'Afikpo North'),
(203, 11, 'Afikpo South'),
(204, 11, 'Ebonyi'),
(205, 11, 'Ezza North'),
(206, 11, 'Ezza South'),
(207, 11, 'Ikwo'),
(208, 11, 'Ishielu'),
(209, 11, 'Ivo'),
(210, 11, 'Izzi'),
(211, 11, 'Ohaozara'),
(212, 11, 'Ohaukwu'),
(213, 11, 'Onicha'),
(214, 12, 'Egor'),
(215, 12, 'Esan Central'),
(216, 12, 'Esan North-East'),
(217, 12, 'Esan South-East'),
(218, 12, 'Esan West'),
(219, 12, 'Etsako Central'),
(220, 12, 'Etsako East'),
(221, 12, 'Etsako West'),
(222, 12, 'Igueben'),
(223, 12, 'Ikpoba Okha'),
(224, 12, 'Orhionmwon'),
(225, 12, 'Oredo'),
(226, 12, 'Ovia North-East'),
(227, 12, 'Ovia South-West'),
(228, 12, 'Owan East'),
(229, 12, 'Owan West'),
(230, 12, 'Uhunmwonde'),
(231, 13, 'Efon'),
(232, 13, 'Ekiti East'),
(233, 13, 'Ekiti South-West'),
(234, 13, 'Ekiti West'),
(235, 13, 'Emure'),
(236, 13, 'Gbonyin'),
(237, 13, 'Ido Osi'),
(238, 13, 'Ijero'),
(239, 13, 'Ikere'),
(240, 13, 'Ikole'),
(241, 13, 'Ilejemeje'),
(242, 13, 'Irepodun/Ifelodun'),
(243, 13, 'Ise/Orun'),
(244, 13, 'Moba'),
(245, 13, 'Oye'),
(246, 14, 'Awgu'),
(247, 14, 'Enugu East'),
(248, 14, 'Enugu North'),
(249, 14, 'Enugu South'),
(250, 14, 'Ezeagu'),
(251, 14, 'Igbo Etiti'),
(252, 14, 'Igbo Eze North'),
(253, 14, 'Igbo Eze South'),
(254, 14, 'Isi Uzo'),
(255, 14, 'Nkanu East'),
(256, 14, 'Nkanu West'),
(257, 14, 'Nsukka'),
(258, 14, 'Oji River'),
(259, 14, 'Udenu'),
(260, 14, 'Udi'),
(261, 14, 'Uzo Uwani'),
(262, 15, 'Bwari'),
(263, 15, 'Gwagwalada'),
(264, 15, 'Kuje'),
(265, 15, 'Kwali'),
(266, 15, 'Municipal Area Council'),
(267, 16, 'Balanga'),
(268, 16, 'Billiri'),
(269, 16, 'Dukku'),
(270, 16, 'Funakaye'),
(271, 16, 'Gombe'),
(272, 16, 'Kaltungo'),
(273, 16, 'Kwami'),
(274, 16, 'Nafada'),
(275, 16, 'Shongom'),
(276, 16, 'Yamaltu/Deba'),
(277, 17, 'Ahiazu Mbaise'),
(278, 17, 'Ehime Mbano'),
(279, 17, 'Ezinihitte'),
(280, 17, 'Ideato North'),
(281, 17, 'Ideato South'),
(282, 17, 'Ihitte/Uboma'),
(283, 17, 'Ikeduru'),
(284, 17, 'Isiala Mbano'),
(285, 17, 'Isu'),
(286, 17, 'Mbaitoli'),
(287, 17, 'Ngor Okpala'),
(288, 17, 'Njaba'),
(289, 17, 'Nkwerre'),
(290, 17, 'Nwangele'),
(291, 17, 'Obowo'),
(292, 17, 'Oguta'),
(293, 17, 'Ohaji/Egbema'),
(294, 17, 'Okigwe'),
(295, 17, 'Orlu'),
(296, 17, 'Orsu'),
(297, 17, 'Oru East'),
(298, 17, 'Oru West'),
(299, 17, 'Owerri Municipal'),
(300, 17, 'Owerri North'),
(301, 17, 'Owerri West'),
(302, 17, 'Unuimo'),
(303, 18, 'Babura'),
(304, 18, 'Biriniwa'),
(305, 18, 'Birnin Kudu'),
(306, 18, 'Buji'),
(307, 18, 'Dutse'),
(308, 18, 'Gagarawa'),
(309, 18, 'Garki'),
(310, 18, 'Gumel'),
(311, 18, 'Guri'),
(312, 18, 'Gwaram'),
(313, 18, 'Gwiwa'),
(314, 18, 'Hadejia'),
(315, 18, 'Jahun'),
(316, 18, 'Kafin Hausa'),
(317, 18, 'Kazaure'),
(318, 18, 'Kiri Kasama'),
(319, 18, 'Kiyawa'),
(320, 18, 'Kaugama'),
(321, 18, 'Maigatari'),
(322, 18, 'Malam Madori'),
(323, 18, 'Miga'),
(324, 18, 'Ringim'),
(325, 18, 'Roni'),
(326, 18, 'Sule Tankarkar'),
(327, 18, 'Taura'),
(328, 18, 'Yankwashi'),
(329, 19, 'Chikun'),
(330, 19, 'Giwa'),
(331, 19, 'Igabi'),
(332, 19, 'Ikara'),
(333, 19, 'Jaba'),
(334, 19, 'Jema\'a'),
(335, 19, 'Kachia'),
(336, 19, 'Kaduna North'),
(337, 19, 'Kaduna South'),
(338, 19, 'Kagarko'),
(339, 19, 'Kajuru'),
(340, 19, 'Kaura'),
(341, 19, 'Kauru'),
(342, 19, 'Kubau'),
(343, 19, 'Kudan'),
(344, 19, 'Lere'),
(345, 19, 'Makarfi'),
(346, 19, 'Sabon Gari'),
(347, 19, 'Sanga'),
(348, 19, 'Soba'),
(349, 19, 'Zangon Kataf'),
(350, 19, 'Zaria'),
(351, 20, 'Albasu'),
(352, 20, 'Bagwai'),
(353, 20, 'Bebeji'),
(354, 20, 'Bichi'),
(355, 20, 'Bunkure'),
(356, 20, 'Dala'),
(357, 20, 'Dambatta'),
(358, 20, 'Dawakin Kudu'),
(359, 20, 'Dawakin Tofa'),
(360, 20, 'Doguwa'),
(361, 20, 'Fagge'),
(362, 20, 'Gabasawa'),
(363, 20, 'Garko'),
(364, 20, 'Garun Mallam'),
(365, 20, 'Gaya'),
(366, 20, 'Gezawa'),
(367, 20, 'Gwale'),
(368, 20, 'Gwarzo'),
(369, 20, 'Kabo'),
(370, 20, 'Kano Municipal'),
(371, 20, 'Karaye'),
(372, 20, 'Kibiya'),
(373, 20, 'Kiru'),
(374, 20, 'Kumbotso'),
(375, 20, 'Kunchi'),
(376, 20, 'Kura'),
(377, 20, 'Madobi'),
(378, 20, 'Makoda'),
(379, 20, 'Minjibir'),
(380, 20, 'Nasarawa'),
(381, 20, 'Rano'),
(382, 20, 'Rimin Gado'),
(383, 20, 'Rogo'),
(384, 20, 'Shanono'),
(385, 20, 'Sumaila'),
(386, 20, 'Takai'),
(387, 20, 'Tarauni'),
(388, 20, 'Tofa'),
(389, 20, 'Tsanyawa'),
(390, 20, 'Tudun Wada'),
(391, 20, 'Ungogo'),
(392, 20, 'Warawa'),
(393, 20, 'Wudil'),
(394, 21, 'Batagarawa'),
(395, 21, 'Batsari'),
(396, 21, 'Baure'),
(397, 21, 'Bindawa'),
(398, 21, 'Charanchi'),
(399, 21, 'Dandume'),
(400, 21, 'Danja'),
(401, 21, 'Dan Musa'),
(402, 21, 'Daura'),
(403, 21, 'Dutsi'),
(404, 21, 'Dutsin Ma'),
(405, 21, 'Faskari'),
(406, 21, 'Funtua'),
(407, 21, 'Ingawa'),
(408, 21, 'Jibia'),
(409, 21, 'Kafur'),
(410, 21, 'Kaita'),
(411, 21, 'Kankara'),
(412, 21, 'Kankia'),
(413, 21, 'Katsina'),
(414, 21, 'Kurfi'),
(415, 21, 'Kusada'),
(416, 21, 'Mai\'Adua'),
(417, 21, 'Malumfashi'),
(418, 21, 'Mani'),
(419, 21, 'Mashi'),
(420, 21, 'Matazu'),
(421, 21, 'Musawa'),
(422, 21, 'Rimi'),
(423, 21, 'Sabuwa'),
(424, 21, 'Safana'),
(425, 21, 'Sandamu'),
(426, 21, 'Zango'),
(427, 22, 'Arewa Dandi'),
(428, 22, 'Argungu'),
(429, 22, 'Augie'),
(430, 22, 'Bagudo'),
(431, 22, 'Birnin Kebbi'),
(432, 22, 'Bunza'),
(433, 22, 'Dandi'),
(434, 22, 'Fakai'),
(435, 22, 'Gwandu'),
(436, 22, 'Jega'),
(437, 22, 'Kalgo'),
(438, 22, 'Koko/Besse'),
(439, 22, 'Maiyama'),
(440, 22, 'Ngaski'),
(441, 22, 'Sakaba'),
(442, 22, 'Shanga'),
(443, 22, 'Suru'),
(444, 22, 'Wasagu/Danko'),
(445, 22, 'Yauri'),
(446, 22, 'Zuru'),
(447, 23, 'Ajaokuta'),
(448, 23, 'Ankpa'),
(449, 23, 'Bassa'),
(450, 23, 'Dekina'),
(451, 23, 'Ibaji'),
(452, 23, 'Idah'),
(453, 23, 'Igalamela Odolu'),
(454, 23, 'Ijumu'),
(455, 23, 'Kabba/Bunu'),
(456, 23, 'Kogi'),
(457, 23, 'Lokoja'),
(458, 23, 'Mopa Muro'),
(459, 23, 'Ofu'),
(460, 23, 'Ogori/Magongo'),
(461, 23, 'Okehi'),
(462, 23, 'Okene'),
(463, 23, 'Olamaboro'),
(464, 23, 'Omala'),
(465, 23, 'Yagba East'),
(466, 23, 'Yagba West'),
(467, 24, 'Baruten'),
(468, 24, 'Edu'),
(469, 24, 'Ekiti'),
(470, 24, 'Ifelodun'),
(471, 24, 'Ilorin East'),
(472, 24, 'Ilorin South'),
(473, 24, 'Ilorin West'),
(474, 24, 'Irepodun'),
(475, 24, 'Isin'),
(476, 24, 'Kaiama'),
(477, 24, 'Moro'),
(478, 24, 'Offa'),
(479, 24, 'Oke Ero'),
(480, 24, 'Oyun'),
(481, 24, 'Pategi'),
(482, 25, 'Ajeromi-Ifelodun'),
(483, 25, 'Alimosho'),
(484, 25, 'Amuwo-Odofin'),
(485, 25, 'Apapa'),
(486, 25, 'Badagry'),
(487, 25, 'Epe'),
(488, 25, 'Eti Osa'),
(489, 25, 'Ibeju-Lekki'),
(490, 25, 'Ifako-Ijaiye'),
(491, 25, 'Ikeja'),
(492, 25, 'Ikorodu'),
(493, 25, 'Kosofe'),
(494, 25, 'Lagos Island'),
(495, 25, 'Lagos Mainland'),
(496, 25, 'Mushin'),
(497, 25, 'Ojo'),
(498, 25, 'Oshodi-Isolo'),
(499, 25, 'Shomolu'),
(500, 25, 'Surulere'),
(501, 26, 'Awe'),
(502, 26, 'Doma'),
(503, 26, 'Karu'),
(504, 26, 'Keana'),
(505, 26, 'Keffi'),
(506, 26, 'Kokona'),
(507, 26, 'Lafia'),
(508, 26, 'Nasarawa'),
(509, 26, 'Nasarawa Egon'),
(510, 26, 'Obi'),
(511, 26, 'Toto'),
(512, 26, 'Wamba'),
(513, 27, 'Agwara'),
(514, 27, 'Bida'),
(515, 27, 'Borgu'),
(516, 27, 'Bosso'),
(517, 27, 'Chanchaga'),
(518, 27, 'Edati'),
(519, 27, 'Gbako'),
(520, 27, 'Gurara'),
(521, 27, 'Katcha'),
(522, 27, 'Kontagora'),
(523, 27, 'Lapai'),
(524, 27, 'Lavun'),
(525, 27, 'Magama'),
(526, 27, 'Mariga'),
(527, 27, 'Mashegu'),
(528, 27, 'Mokwa'),
(529, 27, 'Moya'),
(530, 27, 'Paikoro'),
(531, 27, 'Rafi'),
(532, 27, 'Rijau'),
(533, 27, 'Shiroro'),
(534, 27, 'Suleja'),
(535, 27, 'Tafa'),
(536, 27, 'Wushishi'),
(537, 28, 'Abeokuta South'),
(538, 28, 'Ado-Odo/Ota'),
(539, 28, 'Egbado North'),
(540, 28, 'Egbado South'),
(541, 28, 'Ewekoro'),
(542, 28, 'Ifo'),
(543, 28, 'Ijebu East'),
(544, 28, 'Ijebu North'),
(545, 28, 'Ijebu North East'),
(546, 28, 'Ijebu Ode'),
(547, 28, 'Ikenne'),
(548, 28, 'Imeko Afon'),
(549, 28, 'Ipokia'),
(550, 28, 'Obafemi Owode'),
(551, 28, 'Odeda'),
(552, 28, 'Odogbolu'),
(553, 28, 'Ogun Waterside'),
(554, 28, 'Remo North'),
(555, 28, 'Shagamu'),
(556, 29, 'Akoko North-West'),
(557, 29, 'Akoko South-West'),
(558, 29, 'Akoko South-East'),
(559, 29, 'Akure North'),
(560, 29, 'Akure South'),
(561, 29, 'Ese Odo'),
(562, 29, 'Idanre'),
(563, 29, 'Ifedore'),
(564, 29, 'Ilaje'),
(565, 29, 'Ile Oluji/Okeigbo'),
(566, 29, 'Irele'),
(567, 29, 'Odigbo'),
(568, 29, 'Okitipupa'),
(569, 29, 'Ondo East'),
(570, 29, 'Ondo West'),
(571, 29, 'Ose'),
(572, 29, 'Owo'),
(573, 30, 'Atakunmosa West'),
(574, 30, 'Aiyedaade'),
(575, 30, 'Aiyedire'),
(576, 30, 'Boluwaduro'),
(577, 30, 'Boripe'),
(578, 30, 'Ede North'),
(579, 30, 'Ede South'),
(580, 30, 'Ife Central'),
(581, 30, 'Ife East'),
(582, 30, 'Ife North'),
(583, 30, 'Ife South'),
(584, 30, 'Egbedore'),
(585, 30, 'Ejigbo'),
(586, 30, 'Ifedayo'),
(587, 30, 'Ifelodun'),
(588, 30, 'Ila'),
(589, 30, 'Ilesa East'),
(590, 30, 'Ilesa West'),
(591, 30, 'Irepodun'),
(592, 30, 'Irewole'),
(593, 30, 'Isokan'),
(594, 30, 'Iwo'),
(595, 30, 'Obokun'),
(596, 30, 'Odo Otin'),
(597, 30, 'Ola Oluwa'),
(598, 30, 'Olorunda'),
(599, 30, 'Oriade'),
(600, 30, 'Orolu'),
(601, 30, 'Osogbo'),
(602, 31, 'Akinyele'),
(603, 31, 'Atiba'),
(604, 31, 'Atisbo'),
(605, 31, 'Egbeda'),
(606, 31, 'Ibadan North'),
(607, 31, 'Ibadan North-East'),
(608, 31, 'Ibadan North-West'),
(609, 31, 'Ibadan South-East'),
(610, 31, 'Ibadan South-West'),
(611, 31, 'Ibarapa Central'),
(612, 31, 'Ibarapa East'),
(613, 31, 'Ibarapa North'),
(614, 31, 'Ido'),
(615, 31, 'Irepo'),
(616, 31, 'Iseyin'),
(617, 31, 'Itesiwaju'),
(618, 31, 'Iwajowa'),
(619, 31, 'Kajola'),
(620, 31, 'Lagelu'),
(621, 31, 'Ogbomosho North'),
(622, 31, 'Ogbomosho South'),
(623, 31, 'Ogo Oluwa'),
(624, 31, 'Olorunsogo'),
(625, 31, 'Oluyole'),
(626, 31, 'Ona Ara'),
(627, 31, 'Orelope'),
(628, 31, 'Ori Ire'),
(629, 31, 'Oyo'),
(630, 31, 'Oyo East'),
(631, 31, 'Saki East'),
(632, 31, 'Saki West'),
(633, 31, 'Surulere'),
(634, 32, 'Barkin Ladi'),
(635, 32, 'Bassa'),
(636, 32, 'Jos East'),
(637, 32, 'Jos North'),
(638, 32, 'Jos South'),
(639, 32, 'Kanam'),
(640, 32, 'Kanke'),
(641, 32, 'Langtang South'),
(642, 32, 'Langtang North'),
(643, 32, 'Mangu'),
(644, 32, 'Mikang'),
(645, 32, 'Pankshin'),
(646, 32, 'Qua\'an Pan'),
(647, 32, 'Riyom'),
(648, 32, 'Shendam'),
(649, 32, 'Wase'),
(650, 33, 'Ahoada East'),
(651, 33, 'Ahoada West'),
(652, 33, 'Akuku-Toru'),
(653, 33, 'Andoni'),
(654, 33, 'Asari-Toru'),
(655, 33, 'Bonny'),
(656, 33, 'Degema'),
(657, 33, 'Eleme'),
(658, 33, 'Emuoha'),
(659, 33, 'Etche'),
(660, 33, 'Gokana'),
(661, 33, 'Ikwerre'),
(662, 33, 'Khana'),
(663, 33, 'Obio/Akpor'),
(664, 33, 'Ogba/Egbema/Ndoni'),
(665, 33, 'Ogu/Bolo'),
(666, 33, 'Okrika'),
(667, 33, 'Omuma'),
(668, 33, 'Opobo/Nkoro'),
(669, 33, 'Oyigbo'),
(670, 33, 'Port Harcourt'),
(671, 33, 'Tai'),
(672, 34, 'Bodinga'),
(673, 34, 'Dange Shuni'),
(674, 34, 'Gada'),
(675, 34, 'Goronyo'),
(676, 34, 'Gudu'),
(677, 34, 'Gwadabawa'),
(678, 34, 'Illela'),
(679, 34, 'Isa'),
(680, 34, 'Kebbe'),
(681, 34, 'Kware'),
(682, 34, 'Rabah'),
(683, 34, 'Sabon Birni'),
(684, 34, 'Shagari'),
(685, 34, 'Silame'),
(686, 34, 'Sokoto North'),
(687, 34, 'Sokoto South'),
(688, 34, 'Tambuwal'),
(689, 34, 'Tangaza'),
(690, 34, 'Tureta'),
(691, 34, 'Wamako'),
(692, 34, 'Wurno'),
(693, 34, 'Yabo'),
(694, 35, 'Bali'),
(695, 35, 'Donga'),
(696, 35, 'Gashaka'),
(697, 35, 'Gassol'),
(698, 35, 'Ibi'),
(699, 35, 'Jalingo'),
(700, 35, 'Karim Lamido'),
(701, 35, 'Kumi'),
(702, 35, 'Lau'),
(703, 35, 'Sardauna'),
(704, 35, 'Takum'),
(705, 35, 'Ussa'),
(706, 35, 'Wukari'),
(707, 35, 'Yorro'),
(708, 35, 'Zing'),
(709, 36, 'Bursari'),
(710, 36, 'Damaturu'),
(711, 36, 'Fika'),
(712, 36, 'Fune'),
(713, 36, 'Geidam'),
(714, 36, 'Gujba'),
(715, 36, 'Gulani'),
(716, 36, 'Jakusko'),
(717, 36, 'Karasuwa'),
(718, 36, 'Machina'),
(719, 36, 'Nangere'),
(720, 36, 'Nguru'),
(721, 36, 'Potiskum'),
(722, 36, 'Tarmuwa'),
(723, 36, 'Yunusari'),
(724, 36, 'Yusufari'),
(725, 37, 'Bakura'),
(726, 37, 'Birnin Magaji/Kiyaw'),
(727, 37, 'Bukkuyum'),
(728, 37, 'Bungudu'),
(729, 37, 'Gummi'),
(730, 37, 'Gusau'),
(731, 37, 'Kaura Namoda'),
(732, 37, 'Maradun'),
(733, 37, 'Maru'),
(734, 37, 'Shinkafi'),
(735, 37, 'Talata Mafara'),
(736, 37, 'Chafe'),
(737, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_info` text,
  `location_img` varchar(100) DEFAULT NULL,
  `state_id` varchar(6) DEFAULT NULL,
  `country_id` varchar(6) DEFAULT NULL,
  `admin_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_info`, `location_img`, `state_id`, `country_id`, `admin_id`) VALUES
(1, 'Manchester', NULL, 'eeeeeee.jpg', NULL, NULL, NULL),
(2, 'Burnley', NULL, 'singles_mannheim_0.jpg', NULL, NULL, NULL),
(3, 'Liverpool', NULL, 'fddddddd.png', NULL, NULL, NULL),
(4, 'dsdd', NULL, '', '', '13', ''),
(5, 'Lagos', NULL, '', '25', '158', '');

-- --------------------------------------------------------

--
-- Table structure for table `pageslocation`
--

CREATE TABLE `pageslocation` (
  `page_id` int(5) NOT NULL,
  `page_location` varchar(50) DEFAULT NULL,
  `page_category` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageslocation`
--

INSERT INTO `pageslocation` (`page_id`, `page_location`, `page_category`, `status`) VALUES
(1, 'full', 'accomodation_support', '1'),
(2, 'topheader', 'accomodation_support', '1'),
(3, 'header_img', 'accomodation_support', '1'),
(4, 'full', 'english_tests', '1'),
(5, 'topheader', 'english_tests', '1'),
(6, 'header_img', 'english_tests', '1'),
(7, 'full', 'enquiry_now', '1'),
(8, 'topheader', 'enquiry_now', '1'),
(9, 'header_img', 'enquiry_now', '1'),
(10, 'full', 'exhibition_events', '1'),
(11, 'topheader', 'exhibition_events', '1'),
(12, 'header_img', 'exhibition_events', '1'),
(13, 'full', 'scholarships', '1'),
(14, 'topheader', 'scholarships', '1'),
(15, 'header_img', 'scholarships', '1'),
(16, 'full', 'student_support', '1'),
(17, 'topheader', 'student_support', '1'),
(18, 'header_img', 'student_support', '1'),
(19, 'full', 'universities', '1'),
(20, 'topheader', 'universities', '1'),
(21, 'header_img', 'universities', '1'),
(22, 'full', 'study_abroad', '1'),
(23, 'topheader', 'study_abroad', '1'),
(24, 'header_img', 'study_abroad', '1'),
(25, 'full', 'university_representation', '1'),
(26, 'topheader', 'university_representation', '1'),
(27, 'intro', 'accomodation_support', '1'),
(28, 'intro', 'english_tests', '1'),
(29, 'intro', 'enquiry_now', '1'),
(30, 'intro', 'exhibition_events', '1'),
(31, 'intro', 'scholarships', '1'),
(32, 'intro', 'student_support', '1'),
(33, 'intro', 'universities', '1'),
(34, 'intro', 'study_abroad', '1'),
(35, 'intro', 'university_representation', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `OrderID` varchar(50) DEFAULT NULL,
  `user_code` varchar(13) DEFAULT NULL,
  `recruiter_code` varchar(13) DEFAULT NULL,
  `couprov_code` varchar(13) DEFAULT NULL,
  `event_prov_code` varchar(13) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1 - Completed',
  `payment_amount` double(10,2) DEFAULT '0.00',
  `payment_currency` varchar(255) DEFAULT NULL,
  `payment_category` enum('1','2','3','4') DEFAULT NULL COMMENT '1 - recruitment, 2 - Search CV, 3 - course provider, 4 - course subscription',
  `gateway` enum('0','1','2') DEFAULT '0' COMMENT '0 - Not Specified, 1 - Paypal, 2 - Paystack',
  `txn_id` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `OrderID`, `user_code`, `recruiter_code`, `couprov_code`, `event_prov_code`, `payer_email`, `item_name`, `payment_status`, `payment_amount`, `payment_currency`, `payment_category`, `gateway`, `txn_id`, `create_at`) VALUES
(47, 'jgxl7upjww', NULL, NULL, NULL, 'lNdFr', 'sam@gmail.com', NULL, '1', 8095238.00, 'NGN', '', '2', 'lNdFr', '2020-10-07 10:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'Mobiles'),
(2, 'Cameras'),
(3, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `product_orderitems`
--

CREATE TABLE `product_orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orderitems`
--

INSERT INTO `product_orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(1, 19, '5', 1, '16'),
(2, 19, '5', 2, '16'),
(3, 1, '2', 2, '20990'),
(4, 1, '1', 3, '20990'),
(5, 20, '10', 3, '99'),
(6, 18, '1', 4, '12890'),
(7, 21, '1', 4, '75'),
(8, 2, '1', 5, '7590'),
(9, 19, '10', 5, '16');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(1, 2, '80', 'Order Placed', 'cod', '2017-10-28 12:22:36'),
(2, 2, '42060', 'Order Placed', 'cod', '2017-10-28 12:27:16'),
(3, 6, '21980', 'Cancelled', 'cod', '2017-10-28 14:25:23'),
(4, 6, '12965', 'In Progress', 'cod', '2017-10-28 14:28:29'),
(5, 6, '7750', 'In Progress', 'cod', '2017-11-06 19:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_ordertracking`
--

CREATE TABLE `product_ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_ordertracking`
--

INSERT INTO `product_ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(3, 3, 'Cancelled', ' I don&#39;t want this item now.', '2017-10-28 17:54:18'),
(5, 4, 'In Progress', ' Order is in Progress', '2017-10-30 13:31:08'),
(6, 5, 'In Progress', ' Order is in Progress', '2017-11-06 19:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(1, 1, 6, 'It&#39;s an awesome Product...', '2017-10-30 15:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlist`
--

CREATE TABLE `product_wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions_answers`
--

CREATE TABLE `questions_answers` (
  `qa_id` tinyint(11) NOT NULL,
  `question` tinytext,
  `answer` text,
  `reviews` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int(11) NOT NULL,
  `recruiter_code` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pass_salt` varchar(100) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `billing_company` varchar(100) DEFAULT NULL,
  `billing_address_1` tinytext,
  `billing_address_2` tinytext,
  `billing_city` varchar(20) DEFAULT NULL,
  `billing_state` varchar(20) DEFAULT NULL,
  `billing_country` varchar(5) DEFAULT NULL,
  `valid_until` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recruit_valid_until` timestamp NULL DEFAULT NULL,
  `cvsearch_valid_until` timestamp NULL DEFAULT NULL,
  `mailingaddress` tinytext,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `recruiter_code`, `username`, `last_name`, `middle_name`, `first_name`, `image`, `password`, `pass_salt`, `reset_token`, `gender`, `email`, `phone`, `country`, `source`, `active`, `billing_company`, `billing_address_1`, `billing_address_2`, `billing_city`, `billing_state`, `billing_country`, `valid_until`, `recruit_valid_until`, `cvsearch_valid_until`, `mailingaddress`, `status`, `timestamp`) VALUES
(1, '3POzr', 'johnazuka', 'Azuka', NULL, 'Chukwunonso', NULL, 'johnazuka', '$2y$11$a2d3f274f6bbd6d237099On30u4BdK0swZtLb0paEjFCAL7FG7Sqi', NULL, NULL, 'sdsaa', '45454', NULL, NULL, '1589557261', 'xdvd', 'sdfd', '', 'Yaba', 'Lagos', '14', '2020-04-22 17:38:52', NULL, NULL, NULL, '1', '2020-04-22 17:38:52'),
(8, 'stMIb', 'nollyvenon', 'Azuka', NULL, 'John', NULL, 'nollyboy', '$2y$11$724c86f61415fd5f9e70cejTkFd1rYhjxHaJuQVYP/pn0HJRniZXe', NULL, NULL, 'nollyvenon@yahoo.co.uk', '34545435557', NULL, NULL, '1591481833', '', '', '', '', '', '', '2020-05-16 09:25:57', NULL, NULL, NULL, '1', '2020-05-16 09:25:57'),
(9, 'fv2UU', 'gooption', 'Azuka', NULL, 'John', NULL, 'nollyboy', '$2y$11$69c8b5b2735503869f916eGHeN4xGrffN.l7o85JaC4CLC1hTzbtC', NULL, NULL, 'gooption@yahoo.com', '08037810335', NULL, NULL, '1591553114', '', '', '', '', '', '158', '2020-06-07 17:48:37', NULL, NULL, NULL, '1', '2020-06-07 17:48:37'),
(10, 'ZVgy0', 'gopadmin', 'james', NULL, 'Doe', NULL, '123457', '$2y$11$ad42b0b9a51fcd854e72cupmoiTPo5hQUXmLTeWPCv0jYvf8nVXvS', NULL, NULL, 'sam@gmail.com', '08165748392', NULL, NULL, '1602678251', 'Elite World', 'Company Address', '', 'My Town', '8', '158', '2020-07-21 14:44:56', NULL, NULL, NULL, '1', '2020-07-21 14:44:56'),
(13, 'r52zG', 'james', 'james', NULL, 'Doe', NULL, '123456', '$2y$11$647889bc32ac95771e9ccuBEpEFf9F7R16qqxl5CIypKJsOBb0WAy', '', NULL, 'joedbest123@yahoo.com', '08165748392', NULL, NULL, '1597238317', '', '', '', '', '', '10', '2020-08-12 13:18:36', NULL, NULL, NULL, '1', '2020-08-12 13:18:36'),
(14, 'MJ0H6', '', 'dan', NULL, 'jon', NULL, '', '$2y$11$dc2e0490ff57448d6c699uAaTeXyz5IMFzhJTSpa10gPrpluyF9eq', NULL, NULL, 'tradeparkuk@gmail.com', '08066885363', NULL, NULL, NULL, 'Tradepark', '13 Oshitelu Street', 'Computer Village', 'Ikeja', 'Lagos', '158', '2020-08-14 10:26:47', NULL, NULL, NULL, '1', '2020-08-14 10:26:47'),
(15, 'mBe2P', 'Ukesps', 'Dan', NULL, 'tony', NULL, 'kelechi', '$2y$11$66168a3dca9143a351e3fuSLzEcFyDYWjrT3/KxljYHKNICAMVWiy', NULL, NULL, 'ukesps@gmail.com', '08066885363', NULL, NULL, '1602120331', 'Tradepark', '', '', '', '', '158', '2020-08-18 12:16:13', NULL, NULL, NULL, '1', '2020-08-18 12:16:13'),
(16, 'bG9JC', 'sam@gmail.com', 'dan', NULL, 'jon', NULL, '123457', '$2y$11$76d2fbd8cf26b3746ceeaOX2YwMGOapvkqKYNQ40mTCJLQFBgqG9y', NULL, NULL, 'tradeparkuk@gmail.com', '08066885363', NULL, NULL, NULL, 'Tradepark', '13 Oshitelu Street', 'Computer Village', 'Ikeja', 'Lagos', '', '2020-10-05 14:44:21', NULL, NULL, NULL, '1', '2020-10-05 14:44:21'),
(17, 'wOIBQ', 'addcdc', 'james', NULL, 'Emeka', NULL, '123456', '$2y$11$0e4ef04b1e29051db30aauE5m1vK.n7EacG70sxxoqLeqX5QWgSUe', NULL, NULL, 'emeka.josephonyebuchi@gmail.com', '08169993594', NULL, NULL, '1602166779', 'Tradepark', '', '', '', '', '158', '2020-10-08 14:19:39', NULL, NULL, NULL, '1', '2020-10-08 14:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_cv_plans`
--

CREATE TABLE `recruiting_cv_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `plan_cost` double(6,2) DEFAULT '0.00',
  `plan_discount_cost` double(6,2) DEFAULT '0.00',
  `plan_currency` varchar(10) DEFAULT NULL,
  `plan_image` varchar(255) DEFAULT NULL,
  `plan_period` varchar(30) DEFAULT NULL,
  `highlights` tinytext,
  `description` mediumtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_cv_plans`
--

INSERT INTO `recruiting_cv_plans` (`plan_id`, `plan_name`, `plan_cost`, `plan_discount_cost`, `plan_currency`, `plan_image`, `plan_period`, `highlights`, `description`) VALUES
(1, 'Plan 1', 5.00, 0.00, 'USD', '', 'day', 'Daily plan suitable for one-off adverts', '<p>One Off Plan</p>\r\n'),
(2, 'Plan 2', 20.00, 0.00, 'USD', '', 'week', 'One month Plan', '<p>Plan Description</p>\r\n'),
(3, 'Plan 3', 30.00, 0.00, 'USD', '', 'month', 'One month Plan', '<p>Plan description</p>\r\n'),
(4, 'Golden Plan', 50.00, 0.00, 'USD', '', 'year', 'Yearly Plan', '<p>One Year Plan</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_cv_plan_orderitems`
--

CREATE TABLE `recruiting_cv_plan_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_cv_plan_orderitems`
--

INSERT INTO `recruiting_cv_plan_orderitems` (`id`, `session_id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(2, '661d2ea687555b628a7874d5c448dfb1', 1, '1', 2, '340.00'),
(3, '7119fa10874f123cec524c7d68c991ef', 1, '1', 3, '340.00'),
(4, '7119fa10874f123cec524c7d68c991ef', 1, '1', 4, '340.00'),
(5, '97a1d91c45861570e832749e759d2c38', 1, '1', 5, '340.00'),
(6, 'd5d4ed0adcdbea1b15810671d1227d6d', 2, '1', 6, '400.00'),
(7, 'b062e5f8462caa0af0b1aac9cda003ec', 6, '1', 7, '340.00'),
(8, 'eb58ec5720bb7a7c5b55f2817172c41d', 6, '1', 8, '550.00'),
(9, 'eb58ec5720bb7a7c5b55f2817172c41d', 6, '1', 9, '200.00'),
(10, 'ece4229f37634d0785f6084adaffe8f4', 0, '1', 10, '340.00'),
(11, 'ece4229f37634d0785f6084adaffe8f4', 0, '1', 11, '5.00'),
(12, 'cea777bcc8809c6ec3ebea04c32c4b43', 1, '1', 12, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_cv_plan_orders`
--

CREATE TABLE `recruiting_cv_plan_orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_cv_plan_orders`
--

INSERT INTO `recruiting_cv_plan_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(2, NULL, '661d2ea687555b628a7874d5c448dfb1', 340.00, '3', '0', NULL, '2020-07-30 12:49:18'),
(3, NULL, '7119fa10874f123cec524c7d68c991ef', 340.00, '3', '0', NULL, '2020-07-30 13:40:52'),
(4, NULL, '7119fa10874f123cec524c7d68c991ef', 340.00, '3', '0', NULL, '2020-07-30 13:41:14'),
(5, NULL, '97a1d91c45861570e832749e759d2c38', 340.00, '2', '0', NULL, '2020-08-18 01:07:30'),
(6, NULL, 'd5d4ed0adcdbea1b15810671d1227d6d', 400.00, '1', '0', NULL, '2020-08-19 03:54:45'),
(7, NULL, 'b062e5f8462caa0af0b1aac9cda003ec', 340.00, '1', '0', NULL, '2020-09-15 13:33:17'),
(8, NULL, 'eb58ec5720bb7a7c5b55f2817172c41d', 550.00, '1', '0', NULL, '2020-09-24 18:20:37'),
(9, NULL, 'eb58ec5720bb7a7c5b55f2817172c41d', 200.00, '1', '0', NULL, '2020-09-24 18:23:04'),
(10, NULL, 'ece4229f37634d0785f6084adaffe8f4', 340.00, '1', '0', NULL, '2020-10-05 07:27:52'),
(11, NULL, 'ece4229f37634d0785f6084adaffe8f4', 5.00, '1', '0', NULL, '2020-10-05 07:38:08'),
(12, NULL, 'cea777bcc8809c6ec3ebea04c32c4b43', 5.00, '1', '0', NULL, '2020-10-05 07:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_plans`
--

CREATE TABLE `recruiting_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(70) DEFAULT NULL,
  `plan_cost` double(6,2) DEFAULT '0.00',
  `plan_discount_cost` double(6,2) DEFAULT '0.00',
  `plan_currency` varchar(10) DEFAULT NULL,
  `plan_image` varchar(50) DEFAULT NULL,
  `plan_period` varchar(20) DEFAULT NULL,
  `highlights` tinytext,
  `description` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_plans`
--

INSERT INTO `recruiting_plans` (`plan_id`, `plan_name`, `plan_cost`, `plan_discount_cost`, `plan_currency`, `plan_image`, `plan_period`, `highlights`, `description`) VALUES
(3, 'Basic Plan', 20.00, 0.00, 'USD', '', 'day', 'Daily plan suitable for one-off adverts', '<p>Renew daily</p>\r\n'),
(4, 'Bronze Plan', 40.00, 0.00, 'GBP', '', 'month', 'Monthly Plan ', '<p>Renew Monthly</p>\r\n'),
(5, 'Silver ', 80.00, 0.00, 'GBP', '', 'month', 'Monthly Plan ', '<p>Renew monthly</p>\r\n'),
(6, 'Gold Plan', 100.00, 0.00, 'EUR', '', 'month', 'Monthly Plan ', '<p>Renew monthly</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_plan_orderitems`
--

CREATE TABLE `recruiting_plan_orderitems` (
  `id` int(11) NOT NULL,
  `session_id` varchar(40) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pquantity` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL,
  `valid_until` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_plan_orderitems`
--

INSERT INTO `recruiting_plan_orderitems` (`id`, `session_id`, `pid`, `pquantity`, `orderid`, `productprice`, `valid_until`) VALUES
(22, '0704d7a599ab50ac2e1538321d2a050c', 2, '1', 23, '30.00', '2020-07-22 13:41:10'),
(23, '0704d7a599ab50ac2e1538321d2a050c', 2, '1', 24, '30.00', '2020-07-22 14:44:06'),
(24, '661d2ea687555b628a7874d5c448dfb1', 1, '1', 25, '50.00', '2020-07-30 11:22:23'),
(25, '661d2ea687555b628a7874d5c448dfb1', 2, '1', 25, '30.00', '2020-07-30 11:22:23'),
(26, '661d2ea687555b628a7874d5c448dfb1', 1, '1', 26, '50.00', '2020-07-30 12:37:12'),
(27, '7119fa10874f123cec524c7d68c991ef', 1, '1', 27, '50.00', '2020-07-30 12:37:44'),
(28, '7119fa10874f123cec524c7d68c991ef', 1, '1', 28, '50.00', '2020-07-30 13:00:36'),
(29, '97a1d91c45861570e832749e759d2c38', 1, '1', 29, '50.00', '2020-08-18 08:27:48'),
(30, 'a1bd707f074273cb93a6259b9cd63bdb', 2, '1', 30, '30.00', '2020-08-18 12:17:21'),
(31, 'c37679ec50ef027858c22bbe31e321fb', 2, '1', 31, '30.00', '2020-08-18 17:35:48'),
(32, '3353822c99e4291901f216db1331ce6f', 3, '1', 32, '', '2020-08-22 11:56:35'),
(33, '3353822c99e4291901f216db1331ce6f', 3, '1', 33, '20.00', '2020-08-22 12:08:34'),
(34, '3353822c99e4291901f216db1331ce6f', 3, '1', 34, '20.00', '2020-08-22 12:09:09'),
(35, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 35, '20.00', '2020-08-26 16:09:39'),
(36, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 36, '100.00', '2020-08-26 16:21:25'),
(37, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 37, '100.00', '2020-08-26 16:26:33'),
(38, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 38, '100.00', '2020-08-26 16:34:07'),
(39, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 39, '100.00', '2020-08-26 16:36:33'),
(40, '31bde9df88f84b91817bf845bbc9287d', 3, '1', 40, '80.00', '2020-08-26 16:36:53'),
(41, 'b062e5f8462caa0af0b1aac9cda003ec', 6, '1', 41, '100.00', '2020-09-15 20:32:25'),
(42, 'b062e5f8462caa0af0b1aac9cda003ec', 6, '1', 42, '20.00', '2020-09-15 20:38:57'),
(43, 'e2b3b1ae759db83c8b17e8e5b9132183', 0, '1', 43, '40.00', '2020-09-16 22:09:54'),
(44, 'db79209f38801b7913383edd2a0a474a', 6, '1', 44, '100.00', '2020-09-21 13:46:40'),
(45, 'eb58ec5720bb7a7c5b55f2817172c41d', 6, '1', 45, '100.00', '2020-09-25 00:19:58'),
(46, 'eb58ec5720bb7a7c5b55f2817172c41d', 6, '1', 46, '80.00', '2020-09-25 00:23:01'),
(47, '0ef59df30f17e59b238416196c89b874', 3, '1', 47, '20.00', '2020-09-25 07:20:27'),
(48, 'b8ff5465be40f21e3c43015f0e04bc3b', 5, '1', 48, '80.00', '2020-10-05 00:35:09'),
(49, '5993b03e93c71cbe9bd7a30fd5aa8bf0', 6, '1', 49, '100.00', '2020-10-14 12:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_plan_orders`
--

CREATE TABLE `recruiting_plan_orders` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) DEFAULT NULL,
  `session_id` varchar(40) DEFAULT NULL COMMENT 'session_id of the site user',
  `total_price` double(10,2) DEFAULT '0.00',
  `total_qty` varchar(6) DEFAULT NULL,
  `orderstatus` varchar(255) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruiting_plan_orders`
--

INSERT INTO `recruiting_plan_orders` (`id`, `uid`, `session_id`, `total_price`, `total_qty`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(25, 'ZVgy0', '661d2ea687555b628a7874d5c448dfb1', 80.00, '2', '0', NULL, '2020-07-30 12:22:23'),
(26, 'ZVgy0', '661d2ea687555b628a7874d5c448dfb1', 50.00, '3', '0', NULL, '2020-07-30 13:37:12'),
(27, 'ZVgy0', '7119fa10874f123cec524c7d68c991ef', 50.00, '1', '0', NULL, '2020-07-30 13:37:44'),
(28, 'ZVgy0', '7119fa10874f123cec524c7d68c991ef', 50.00, '4', '0', NULL, '2020-07-30 14:00:36'),
(29, 'ZVgy0', '97a1d91c45861570e832749e759d2c38', 50.00, '4', '0', '&pound;', '2020-08-18 01:27:48'),
(30, 'mBe2P', 'a1bd707f074273cb93a6259b9cd63bdb', 30.00, '1', '0', '&pound;', '2020-08-18 05:17:21'),
(31, 'mBe2P', 'c37679ec50ef027858c22bbe31e321fb', 30.00, '2', '0', '', '2020-08-18 10:35:48'),
(32, 'mBe2P', '3353822c99e4291901f216db1331ce6f', 0.00, '2', '0', '&pound;', '2020-08-22 04:56:35'),
(33, 'mBe2P', '3353822c99e4291901f216db1331ce6f', 20.00, '3', '0', 'GBP', '2020-08-22 05:08:34'),
(34, 'mBe2P', '3353822c99e4291901f216db1331ce6f', 20.00, '3', '0', 'GBP', '2020-08-22 05:09:09'),
(38, 'ZVgy0', '31bde9df88f84b91817bf845bbc9287d', 100.00, '1', '0', 'EUR', '2020-08-26 09:34:07'),
(39, 'ZVgy0', '31bde9df88f84b91817bf845bbc9287d', 100.00, '1', '0', 'EUR', '2020-08-26 09:36:33'),
(40, 'ZVgy0', '31bde9df88f84b91817bf845bbc9287d', 80.00, '1', '0', 'GBP', '2020-08-26 09:36:53'),
(41, 'mBe2P', 'b062e5f8462caa0af0b1aac9cda003ec', 100.00, '1', '0', 'EUR', '2020-09-15 13:32:25'),
(42, 'mBe2P', 'b062e5f8462caa0af0b1aac9cda003ec', 20.00, '1', '0', 'USD', '2020-09-15 13:38:57'),
(43, 'mBe2P', 'e2b3b1ae759db83c8b17e8e5b9132183', 40.00, '1', '0', 'GBP', '2020-09-16 15:09:54'),
(44, 'mBe2P', 'db79209f38801b7913383edd2a0a474a', 100.00, '1', '0', 'EUR', '2020-09-21 06:46:40'),
(45, 'mBe2P', 'eb58ec5720bb7a7c5b55f2817172c41d', 100.00, '1', '0', 'EUR', '2020-09-24 17:19:58'),
(46, 'mBe2P', 'eb58ec5720bb7a7c5b55f2817172c41d', 80.00, '1', '0', 'GBP', '2020-09-24 17:23:01'),
(47, 'mBe2P', '0ef59df30f17e59b238416196c89b874', 20.00, '1', '0', 'USD', '2020-09-25 00:20:27'),
(48, 'mBe2P', 'b8ff5465be40f21e3c43015f0e04bc3b', 80.00, '1', '0', 'GBP', '2020-10-04 17:35:09'),
(49, 'ZVgy0', '5993b03e93c71cbe9bd7a30fd5aa8bf0', 100.00, '1', '0', 'EUR', '2020-10-14 05:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sett_id` int(7) NOT NULL,
  `MailFromName` varchar(255) DEFAULT NULL,
  `MailFromEmail` varchar(255) DEFAULT NULL,
  `MailReplyToName` varchar(255) DEFAULT NULL,
  `MailReplyToEmail` varchar(255) DEFAULT NULL,
  `MailHost` varchar(255) DEFAULT NULL,
  `MailUser` varchar(255) DEFAULT NULL,
  `MailPassword` varchar(255) DEFAULT NULL,
  `MailPort` int(4) DEFAULT NULL,
  `BirthEmailTemplate` varchar(50) DEFAULT NULL,
  `SiteCurrency` varchar(20) DEFAULT '£'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sett_id`, `MailFromName`, `MailFromEmail`, `MailReplyToName`, `MailReplyToEmail`, `MailHost`, `MailUser`, `MailPassword`, `MailPort`, `BirthEmailTemplate`, `SiteCurrency`) VALUES
(1, 'Ukesps', 'info@ukesps.com', 'Ukesps', 'info@ukesps.com', 'mail@ukesps.com', 'info@ukesps.com', 'ukespsPasswords', 465, 'innovative', '&pound;');

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `page_id` int(11) NOT NULL,
  `page_category` varchar(50) DEFAULT NULL,
  `page_name` varchar(200) DEFAULT NULL,
  `page_slug` varchar(100) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`page_id`, `page_category`, `page_name`, `page_slug`, `status`) VALUES
(1, 'services', 'Scholarships', 'scholarships', '1'),
(2, 'services', 'University Representation', 'university_representation', '1'),
(3, 'services', 'English Tests', 'english_tests', '1'),
(4, 'services', 'Accomodation Support', 'accomodation_support', '1'),
(5, 'services', 'Student Support', 'student_support', '1'),
(6, 'services', 'Exhibition & Events', 'exhibition_events', '1'),
(7, 'study_match', 'Studying Abroad', 'study_abroad', '1'),
(12, 'about', 'About', 'about_site', '1'),
(13, 'terms', 'Terms And Conditions', 'terms_and_conditions', '1'),
(14, 'privacy_policy', 'Privacy Policy', 'privacy_policy', '1'),
(15, 'services', 'Visa Support', 'visa_support', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Welcome to UKESPS', 'Find A Job You love with the Uk\'s #1 Job site', 'b0e109d996.jpg', '2020-10-14 07:36:43', NULL),
(9, 'The Agency for you', 'The fastest growing UK based agency that has been recruiting students from Nigeria, Ghana, Kenya and Pakistan', 'a4a57fbb66.jpg', '2020-10-14 07:37:33', NULL),
(10, 'Knowledge for life', 'Our Staff are well Trained by our UK Team who visits your country regularly.', '1b1cb26e7e.jpg', '2020-10-14 07:42:18', NULL),
(11, 'Get your dream job', 'Job from across 40 sectors, jobs that match your skillset', '3846b3b3f6.jpg', '2020-10-14 07:42:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `country_id` int(3) DEFAULT '1',
  `state_info` text,
  `admin_id` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `country_id`, `state_info`, `admin_id`) VALUES
(47, 'Bath', 227, NULL, 'GR4bs'),
(48, 'Birmingham', 227, NULL, 'GR4bs'),
(49, 'Bradford', 227, NULL, 'GR4bs'),
(50, 'Brighton & Hove', 227, NULL, 'GR4bs'),
(51, 'Bristol', 227, NULL, 'GR4bs'),
(52, 'Cambridge', 227, NULL, 'GR4bs'),
(53, 'Canterbury', 227, NULL, 'GR4bs'),
(54, 'Carlisle', 227, NULL, 'GR4bs'),
(55, 'Chelmsford', 227, NULL, 'GR4bs'),
(56, 'Chester', 227, NULL, 'GR4bs'),
(57, 'Chichester', 227, NULL, 'GR4bs'),
(58, 'Coventry', 227, NULL, 'GR4bs'),
(59, 'Derby', 227, NULL, 'GR4bs'),
(60, 'Durham', 227, NULL, 'GR4bs'),
(61, 'Ely', 227, NULL, 'GR4bs'),
(62, 'Derby', 227, NULL, 'GR4bs'),
(63, 'Exeter', 227, NULL, 'GR4bs'),
(64, 'Gloucester', 227, NULL, 'GR4bs'),
(65, 'Hereford', 227, NULL, 'GR4bs'),
(66, 'Kingston-upon-Hull', 227, NULL, 'GR4bs'),
(67, 'Lancaster', 227, NULL, 'GR4bs'),
(68, 'Leeds', 227, NULL, 'GR4bs'),
(69, 'Leicester', 227, NULL, 'GR4bs'),
(70, 'Lichfield', 227, NULL, 'GR4bs'),
(71, 'Lincoln', 227, NULL, 'GR4bs'),
(72, 'Liverpool', 227, NULL, 'GR4bs'),
(73, 'London', 227, NULL, 'GR4bs'),
(74, 'Manchester', 227, NULL, 'GR4bs'),
(75, 'Newcastle', 227, NULL, 'GR4bs'),
(76, 'Norwich', 227, NULL, 'GR4bs'),
(77, 'Nottingham', 227, NULL, 'GR4bs'),
(78, 'Oxford', 227, NULL, 'GR4bs'),
(79, 'Peterborough', 227, NULL, 'GR4bs'),
(80, 'Plymouth', 227, NULL, 'GR4bs'),
(81, 'Portsmouth', 227, NULL, 'GR4bs'),
(82, 'Preston', 227, NULL, 'GR4bs'),
(83, 'Ripon', 227, NULL, 'GR4bs'),
(84, 'Salford', 227, NULL, 'GR4bs'),
(85, 'Salisbury', 227, NULL, 'GR4bs'),
(86, 'Sheffield', 227, NULL, 'GR4bs'),
(87, 'Southhampton', 227, NULL, 'GR4bs'),
(88, 'St Albans', 227, NULL, 'GR4bs'),
(89, 'Sunderland', 227, NULL, 'GR4bs'),
(90, 'Truro', 227, NULL, 'GR4bs'),
(91, 'Wakesfield', 227, NULL, 'GR4bs'),
(92, 'Wells', 227, NULL, 'GR4bs'),
(93, 'Westminister', 227, NULL, 'GR4bs'),
(94, 'Winchester', 227, NULL, 'GR4bs'),
(95, 'Wolverhampton', 227, NULL, 'GR4bs'),
(96, 'Worcester', 227, NULL, 'GR4bs'),
(97, 'York', 227, NULL, 'GR4bs'),
(98, 'York', 227, NULL, 'GR4bs'),
(99, 'Abia', 158, NULL, 'GR4bs'),
(100, 'Adamawa', 158, NULL, 'GR4bs'),
(101, 'Akwa ibom', 158, NULL, 'GR4bs'),
(102, 'Anambra', 158, NULL, 'GR4bs'),
(103, 'Bauchi', 158, NULL, 'GR4bs'),
(104, 'Bayelsa', 158, NULL, 'GR4bs'),
(105, 'Benue', 158, NULL, 'GR4bs'),
(106, 'Borno', 158, NULL, 'GR4bs'),
(107, 'Cross River', 158, NULL, 'GR4bs'),
(108, 'Delta', 158, NULL, 'GR4bs'),
(109, 'Ebonyi', 158, NULL, 'GR4bs'),
(110, 'Edo', 158, NULL, 'GR4bs'),
(111, 'Ekiti', 158, NULL, 'GR4bs'),
(112, 'Enugu', 158, NULL, 'GR4bs'),
(113, 'FCT', 158, NULL, 'GR4bs'),
(114, 'Gombe', 158, NULL, 'GR4bs'),
(115, 'Imo', 158, NULL, 'GR4bs'),
(116, 'Jigawa', 158, NULL, 'GR4bs'),
(117, 'Kaduna', 158, NULL, 'GR4bs'),
(118, 'Kano', 158, NULL, 'GR4bs'),
(119, 'Katsina', 158, NULL, 'GR4bs'),
(120, 'Kebbi', 158, NULL, 'GR4bs'),
(121, 'Kano', 158, NULL, 'GR4bs'),
(122, 'Kogi', 158, NULL, 'GR4bs'),
(123, 'Kwara', 158, NULL, 'GR4bs'),
(124, 'Lagos', 158, NULL, 'GR4bs'),
(125, 'Nassarawa', 158, NULL, 'GR4bs'),
(126, 'Niger', 158, NULL, 'GR4bs'),
(127, 'Ogun', 158, NULL, 'GR4bs'),
(128, 'Ondo', 158, NULL, 'GR4bs'),
(129, 'Osun', 158, NULL, 'GR4bs'),
(130, 'Oyo', 158, NULL, 'GR4bs'),
(131, 'Plateau', 158, NULL, 'GR4bs'),
(132, 'Rivers', 158, NULL, 'GR4bs'),
(133, 'Sokoto', 158, NULL, 'GR4bs'),
(134, 'Taraba', 158, NULL, 'GR4bs'),
(135, 'Yobe', 158, NULL, 'GR4bs'),
(136, 'Zamfara', 158, NULL, 'GR4bs'),
(137, 'Alberta', 39, NULL, 'GR4bs'),
(138, 'British Columbia', 39, NULL, 'GR4bs'),
(139, 'Monitoba', 39, NULL, 'GR4bs'),
(140, 'New Brunswick', 39, NULL, 'GR4bs'),
(141, 'Newfoundland And Labrador', 39, NULL, 'GR4bs'),
(142, 'Northwest Territories', 39, NULL, 'GR4bs'),
(143, 'Nova Scotia', 39, NULL, 'GR4bs'),
(144, 'Nunavut', 39, NULL, 'GR4bs'),
(145, 'Ontario', 39, NULL, 'GR4bs'),
(146, 'Prince Edward Island', 39, NULL, 'GR4bs'),
(147, 'Quebec', 39, NULL, 'GR4bs'),
(148, 'Saskatchewan', 39, NULL, 'GR4bs'),
(149, 'Yukon', 39, NULL, 'GR4bs'),
(150, 'Alabama', 228, NULL, 'GR4bs'),
(151, 'Alaska', 228, NULL, 'GR4bs'),
(152, 'American Samoa', 228, NULL, 'GR4bs'),
(153, 'Arizona', 228, NULL, 'GR4bs'),
(154, 'Arkansas', 228, NULL, 'GR4bs'),
(155, 'California', 228, NULL, 'GR4bs'),
(156, 'Colorado', 228, NULL, 'GR4bs'),
(157, 'Connecticut', 228, NULL, 'GR4bs'),
(158, 'Delaware', 228, NULL, 'GR4bs'),
(159, 'District of Columbia', 228, NULL, 'GR4bs'),
(160, 'Florida', 228, NULL, 'GR4bs'),
(161, 'Georgia', 228, NULL, 'GR4bs'),
(162, 'Guam', 228, NULL, 'GR4bs'),
(163, 'Hawaii', 228, NULL, 'GR4bs'),
(164, 'Idaho', 228, NULL, 'GR4bs'),
(165, 'Illinois', 228, NULL, 'GR4bs'),
(166, 'Indiana', 228, NULL, 'GR4bs'),
(167, 'Iowa', 228, NULL, 'GR4bs'),
(168, 'Kansas', 228, NULL, 'GR4bs'),
(169, 'Kentucky', 228, NULL, 'GR4bs'),
(170, 'Louisiana', 228, NULL, 'GR4bs'),
(171, 'Maine', 228, NULL, 'GR4bs'),
(172, 'Maryland', 228, NULL, 'GR4bs'),
(173, 'Massachusetts', 228, NULL, 'GR4bs'),
(174, 'Michigan', 228, NULL, 'GR4bs'),
(175, 'Minnesota', 228, NULL, 'GR4bs'),
(176, 'Mississippi', 228, NULL, 'GR4bs'),
(177, 'Missouri', 228, NULL, 'GR4bs'),
(178, 'Montana', 228, NULL, 'GR4bs'),
(179, 'Nebraska', 228, NULL, 'GR4bs'),
(180, 'Nevada', 228, NULL, 'GR4bs'),
(181, 'New Hampshire', 228, NULL, 'GR4bs'),
(182, 'New Jersey', 228, NULL, 'GR4bs'),
(183, 'New Mexico', 228, NULL, 'GR4bs'),
(184, 'New York', 228, NULL, 'GR4bs'),
(185, 'North Caroline', 228, NULL, 'GR4bs'),
(186, 'North Dakota', 228, NULL, 'GR4bs'),
(187, 'Northern Mariana Islands', 228, NULL, 'GR4bs'),
(188, 'Ohio', 228, NULL, 'GR4bs'),
(189, 'Oklahoma', 228, NULL, 'GR4bs'),
(190, 'Oregon', 228, NULL, 'GR4bs'),
(191, 'Pennysylvania', 228, NULL, 'GR4bs'),
(192, 'Puerto Rico', 228, NULL, 'GR4bs'),
(193, 'Rhode Island', 228, NULL, 'GR4bs'),
(194, 'South Caroline', 228, NULL, 'GR4bs'),
(195, 'South Dakota', 228, NULL, 'GR4bs'),
(196, 'Tennessee', 228, NULL, 'GR4bs'),
(197, 'Texas', 228, NULL, 'GR4bs'),
(198, 'Utah', 228, NULL, 'GR4bs'),
(199, 'Vermont', 228, NULL, 'GR4bs'),
(200, 'Virgin Islands', 228, NULL, 'GR4bs'),
(201, 'Virginia', 228, NULL, 'GR4bs'),
(202, 'Washington', 228, NULL, 'GR4bs'),
(203, 'West Virginia', 228, NULL, 'GR4bs'),
(204, 'Wisconsin', 228, NULL, 'GR4bs'),
(205, 'Wyoming', 228, NULL, 'GR4bs'),
(206, 'Australian Capital Territory', 13, NULL, 'GR4bs'),
(207, 'New South Wales', 13, NULL, 'GR4bs'),
(208, 'Northern Territory', 13, NULL, 'GR4bs'),
(209, 'Queensland', 13, NULL, 'GR4bs'),
(210, 'South Australia', 13, NULL, 'GR4bs'),
(211, 'Tasmania', 13, NULL, 'GR4bs'),
(212, 'Victoria', 13, NULL, 'GR4bs'),
(213, 'Western Australia', 13, NULL, 'GR4bs'),
(214, 'Delta State', 158, NULL, 'GR4bs');

-- --------------------------------------------------------

--
-- Table structure for table `study_levels`
--

CREATE TABLE `study_levels` (
  `sl_id` int(5) NOT NULL,
  `sl_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_levels`
--

INSERT INTO `study_levels` (`sl_id`, `sl_name`) VALUES
(1, 'Foundation'),
(2, 'Undergraduate'),
(3, 'Postgraduates'),
(4, 'Premasters'),
(5, 'Ph.D'),
(6, 'Other Higher Degrees');

-- --------------------------------------------------------

--
-- Table structure for table `study_methods`
--

CREATE TABLE `study_methods` (
  `sm_id` int(5) NOT NULL,
  `sm_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_methods`
--

INSERT INTO `study_methods` (`sm_id`, `sm_name`) VALUES
(1, 'Classroom'),
(2, 'Online'),
(3, 'Self-paced');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`) VALUES
(1, 'sam@gmail.com', '2020-09-15 13:02:10'),
(2, 'tradeparkuk@gmail.com', '2020-10-07 16:35:30'),
(3, 'ukesps@gmail.com', '2020-10-07 16:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config_item`
--

CREATE TABLE `tbl_config_item` (
  `id` int(11) NOT NULL,
  `config_item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_item_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_item_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `added_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_config_item`
--

INSERT INTO `tbl_config_item` (`id`, `config_item_name`, `config_item_value`, `config_item_description`, `active`, `added_at`, `updated_at`) VALUES
(1, 'SYSTEM_EMAIL', 'webmaster@ukesps.com', 'System Email - All the emails from the system will be sent from this email address.', 1, 0, 1601289437),
(2, 'LOCALE', 'en-US', 'Locale of the System - This will change the Language of the application', 1, 0, 0),
(3, 'COMPANY_NAME', 'UKESPS', 'Your Company Name', 1, 0, 1601289812),
(4, 'SMTP_HOST', 'mail.ukesps.com', 'SMTP Host', 1, 0, 1601289676),
(5, 'SMTP_PORT', '465', 'SMTP PORT', 1, 0, 0),
(6, 'SMTP_USERNAME', 'mailer@ukesps.com', 'SMTP Username', 1, 0, 1601289368),
(7, 'SMTP_PASSWORD', 'cFlBclVPZWZrOUVLQTI4MHVRZHZxdz09', 'SMTP Password', 1, 0, 0),
(8, 'SMTP_AUTH', 'Yes', 'SMTP Auth', 1, 0, 0),
(11, 'SMTP_ENCRYPTION', 'ssl', 'SMTP Encryption', 1, 0, 0),
(12, 'APPLICATION_VERSION', '1.0', 'Application Version', 1, 0, 0),
(13, 'LICENSE', 'http://www.ukesps.com', 'License agreement', 1, 0, 1601289385),
(15, 'TIME_ZONE', 'Europe/London', 'For Time Zone', 1, 0, 0),
(21, 'SYSTEM_CURRENCY_SYMBOL', '&#8358', 'Default currency symbol of the system', 1, 0, 1601289340),
(22, 'SYSTEM_CURRENCY', 'NGN', 'Default currency of the system', 1, 0, 0),
(23, 'PAYSTACK_PUBLISHABLE_KEY', 'pk_test_VGLZflbFaDwoDnUt1hN2lHV8', 'Stripe publishable key', 1, 0, 0),
(24, 'PAYSTACK_SECRET_KEY', 'Qk96K1RBcThrVGhOQUZGeWtLVUxQU05KUGoyL3dORnhzTlZMQ1phMXpzdTVMbmlRVXZYRVFHUmdRbHZTM2pQdQ==', 'Stripe secret key', 1, 0, 0),
(38, 'APPLICATION_NAME', 'United Kingdom Education and Skills Placement Service', 'Application Name', 1, 0, 1601289197),
(39, 'APPLICATION_SHORT_NAME', 'UKESPS', 'Application Short Name', 1, 0, 1601289146);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testi_id` int(5) NOT NULL,
  `testi_content` varchar(255) DEFAULT NULL,
  `testi_name` varchar(59) DEFAULT NULL,
  `testi_designation` varchar(50) DEFAULT NULL,
  `testi_image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testi_id`, `testi_content`, `testi_name`, `testi_designation`, `testi_image`) VALUES
(1, 'UKESPS has a respectable work ethic and professional manner which aligns well with The University of Melbourne\'s', 'Adebimpe Shola', 'Writer', NULL),
(2, 'In less than a month, both my wife and I were granted visas; thanks to the meticulous work that the staff of UKESPS did. I would recommend UKESPS to anyone intending on Studying Abroad.', 'John Emeka', 'Student', NULL),
(3, 'Thanks for the opportunity', 'Kunle Yomi', 'Student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_code` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `mailing_address` tinytext,
  `mailing_address2` tinytext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `course_preference` text,
  `university_preference` text,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `username`, `last_name`, `middle_name`, `first_name`, `password`, `reset_token`, `gender`, `email`, `phone`, `location`, `country`, `source`, `mailing_address`, `mailing_address2`, `city`, `state`, `course_preference`, `university_preference`, `status`, `timestamp`) VALUES
(2, 'RxexRODcqvp', NULL, 'Azuka', 'Chukwunonso', 'John', '$2y$11$df6ab8f5169e2979b10e0e/KyW9Wghq7S0855mLxuy3bM4wujKSKm', NULL, '2', 'admin@streamapp.test', '', 'Lagos', '7', '', '', NULL, NULL, NULL, '', '', '1', '2020-05-14 16:07:54'),
(3, '9R5u1lQ0Ujy', NULL, 'Azuka', 'Chukwunonso', 'FVVVV', '$2y$11$7f9e34e58c5268b9e82acOwQqClj5vvI7QVl4D372BnvBCEZMyNty', 'dKk47akAA8wRMECbL7cAVskNw21Jjzst4ztCVYEfQpECmNi2zlkifQqnHQ53uKJW', '2', 'info@onyxdatasystems.com', '', NULL, '', '', '', NULL, NULL, NULL, '', '', '1', '2020-05-15 15:28:55'),
(4, 'zSnAa8FPAWj', NULL, 'Azuka', 'Chukwunonso', 'wew', '$2y$11$95e03d281d70397875fc9uAC24Mt16UQ/g7jSe09MjWeKFE/klp/a', NULL, '2', 'instructor@example.com', '08027257478', NULL, '', '', '', NULL, NULL, NULL, '', '', '1', '2020-05-15 15:51:28'),
(5, 'JFwb9IdoSbH', NULL, 'Azuka', 'Chukwunonso', 'John', '$2y$11$8ff98775236ade901ea52uZl2doX633rUh82w9/gNQwi8QN6qVSg.', NULL, '2', 'admin@admin.com', '', NULL, '', '', '', NULL, NULL, NULL, '', '', '1', '2020-05-15 15:54:02'),
(6, 'ZlOTBaVo3ym', NULL, 'Azuka', 'Chukwunonso', 'John', '$2y$11$ead1c7fc954c23b6cf678OVfdZ005SeOV.q0eduFJd7qZnYCEi3Ei', NULL, '2', 'obehi4_luv@yahoo.com', '', NULL, '', '', '', NULL, NULL, NULL, '', '', '1', '2020-05-15 16:46:49'),
(10, '388wl9S2ND8', NULL, 'Azuka', '', 'Chukwunonso', '$2y$11$b387fb667709dd92633a6etJTmniEyzdRxYz.HVmRu/M7Fn4JB3gS', NULL, '', 'gooption@yahoo.com', '45454', NULL, '158', 'cart', 'sdfd', '', 'Yaba', 'Lagos', '', '', '1', '2020-06-06 17:58:47'),
(11, 'NkuRtHDLNjh', NULL, 'james', 'James', 'Doe', '$2y$11$13ca59cc6128f2a1eee74uGRXzvLjkRbIEEYDYubUTq/r2sKIEeau', NULL, '1', 'sam@gmail.com', '08165643526', NULL, '158', 'Facebook Ads', 'My Address', '', '', '13', 'My Courses here', 'My University at home', '1', '2020-07-30 14:33:28'),
(12, 'rr4KUHOujmN', NULL, 'dan', '0', 'ju', '$2y$11$58fc3e0716ec1c055c252uBi/XHIOhWoIh8m4DZE/BtafGn06J5xi', NULL, '2', 'bnnnigeria@gmail.com', '08188885094', NULL, '', 'Newspaper Advert', 'oshodi', '', '', '', 'Science', 'RGU', '1', '2020-09-03 09:59:33'),
(13, 'Tzc0aCdAujw', NULL, 'james', 'James', 'Doe', '$2y$11$0e12ece7424a00ee1fda7uwJj6J4PZKrQB7e4bF4NNYjATp0yJlom', '', '1', 'joedbest123@yahoo.com', '08165748392', NULL, '227', 'Facebook Ads', 'My Address', '', '', '39', 'Tech courses', 'Havard', '1', '2020-09-15 09:44:51'),
(16, '4sxkdVhJzuN', NULL, 'james', 'James', 'Emeka', '$2y$11$1d9a036c8947bee0362f8utyK/ToBHDLBNVvOPtZO9B9119v.bXAu', NULL, '2', 'emeka.josephonyebuchi@gmail.com', '08169993594', NULL, '158', 'Online Advert', 'Akinremi Street Ikeja Lagos\r\nIkeja Lagos', '', '', '', 'asca', 'qascasc', '1', '2020-10-08 14:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`id`, `uid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(1, 2, 'Vivek', 'V', 'Coding Cyber', 'Hyd', 'Hyd', 'Hyderabad', 'Telangana', '', '500060', ''),
(2, 6, 'Vivek', 'Vengala', 'Coding Cyber', '#201', 'DSNR', 'Hyderabad', 'Telangana', '', '500060', '9876543211');

-- --------------------------------------------------------

--
-- Table structure for table `viewed_courses`
--

CREATE TABLE `viewed_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viewed_courses`
--

INSERT INTO `viewed_courses` (`id`, `course_id`, `user_id`) VALUES
(2, 2, 'OGdCPpDY4AZ'),
(3, 7, 'OGdCPpDY4AZ'),
(4, 5, 'OGdCPpDY4AZ'),
(5, 3, 'OGdCPpDY4AZ'),
(6, 2, 'NkuRtHDLNjh'),
(7, 3, 'NkuRtHDLNjh'),
(8, 4, 'NkuRtHDLNjh'),
(9, 5, 'NkuRtHDLNjh'),
(10, 9, 'NkuRtHDLNjh'),
(11, 7, 'NkuRtHDLNjh'),
(12, 2, 'Tzc0aCdAujw');

-- --------------------------------------------------------

--
-- Table structure for table `viewed_jobs`
--

CREATE TABLE `viewed_jobs` (
  `id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id_UNIQUE` (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `applicant_details`
--
ALTER TABLE `applicant_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_lists`
--
ALTER TABLE `applicant_lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`appl_id`);

--
-- Indexes for table `banners_and_ads`
--
ALTER TABLE `banners_and_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `IDX_COUNTRY_NAME` (`country_name`),
  ADD UNIQUE KEY `country_iso_code_2` (`country_iso_code_2`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `course_locations`
--
ALTER TABLE `course_locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `course_providers`
--
ALTER TABLE `course_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_provider_plans`
--
ALTER TABLE `course_provider_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `course_provider_plan_orderitems`
--
ALTER TABLE `course_provider_plan_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_provider_plan_orders`
--
ALTER TABLE `course_provider_plan_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `course_study_methods`
--
ALTER TABLE `course_study_methods`
  ADD PRIMARY KEY (`csm_id`);

--
-- Indexes for table `course_subscription_orderitems`
--
ALTER TABLE `course_subscription_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_subscription_orders`
--
ALTER TABLE `course_subscription_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `cv_search_orders`
--
ALTER TABLE `cv_search_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_search_plans`
--
ALTER TABLE `cv_search_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `cv_search_plan_orderitems`
--
ALTER TABLE `cv_search_plan_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `event_providers`
--
ALTER TABLE `event_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_provider_plans`
--
ALTER TABLE `event_provider_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `event_provider_plan_orderitems`
--
ALTER TABLE `event_provider_plan_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_provider_plan_orders`
--
ALTER TABLE `event_provider_plan_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobs_id`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `jobstate`
--
ALTER TABLE `jobstate`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `job_companies`
--
ALTER TABLE `job_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`jobexperience_id`);

--
-- Indexes for table `job_levels`
--
ALTER TABLE `job_levels`
  ADD PRIMARY KEY (`joblevel_id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `job_sectors`
--
ALTER TABLE `job_sectors`
  ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `job_skill_categories`
--
ALTER TABLE `job_skill_categories`
  ADD PRIMARY KEY (`skcat_id`);

--
-- Indexes for table `job_structures`
--
ALTER TABLE `job_structures`
  ADD PRIMARY KEY (`jobtype_id`);

--
-- Indexes for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`jobtype_id`);

--
-- Indexes for table `job_views`
--
ALTER TABLE `job_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`local_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `pageslocation`
--
ALTER TABLE `pageslocation`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orderitems`
--
ALTER TABLE `product_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ordertracking`
--
ALTER TABLE `product_ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD PRIMARY KEY (`qa_id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiting_cv_plans`
--
ALTER TABLE `recruiting_cv_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `recruiting_cv_plan_orderitems`
--
ALTER TABLE `recruiting_cv_plan_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiting_cv_plan_orders`
--
ALTER TABLE `recruiting_cv_plan_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiting_plans`
--
ALTER TABLE `recruiting_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `recruiting_plan_orderitems`
--
ALTER TABLE `recruiting_plan_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiting_plan_orders`
--
ALTER TABLE `recruiting_plan_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sett_id`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `study_levels`
--
ALTER TABLE `study_levels`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `study_methods`
--
ALTER TABLE `study_methods`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_config_item`
--
ALTER TABLE `tbl_config_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_item_name` (`config_item_name`),
  ADD UNIQUE KEY `config_item_name_2` (`config_item_name`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersmeta`
--
ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewed_courses`
--
ALTER TABLE `viewed_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewed_jobs`
--
ALTER TABLE `viewed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `applicant_details`
--
ALTER TABLE `applicant_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicant_lists`
--
ALTER TABLE `applicant_lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `appl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners_and_ads`
--
ALTER TABLE `banners_and_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `category_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_locations`
--
ALTER TABLE `course_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_providers`
--
ALTER TABLE `course_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_provider_plans`
--
ALTER TABLE `course_provider_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_provider_plan_orderitems`
--
ALTER TABLE `course_provider_plan_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_provider_plan_orders`
--
ALTER TABLE `course_provider_plan_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `review_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_study_methods`
--
ALTER TABLE `course_study_methods`
  MODIFY `csm_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_subscription_orderitems`
--
ALTER TABLE `course_subscription_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_subscription_orders`
--
ALTER TABLE `course_subscription_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `type_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cv_search_orders`
--
ALTER TABLE `cv_search_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cv_search_plans`
--
ALTER TABLE `cv_search_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cv_search_plan_orderitems`
--
ALTER TABLE `cv_search_plan_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `template_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_providers`
--
ALTER TABLE `event_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_provider_plans`
--
ALTER TABLE `event_provider_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_provider_plan_orderitems`
--
ALTER TABLE `event_provider_plan_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `event_provider_plan_orders`
--
ALTER TABLE `event_provider_plan_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobs_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobstate`
--
ALTER TABLE `jobstate`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_companies`
--
ALTER TABLE `job_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `jobexperience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_levels`
--
ALTER TABLE `job_levels`
  MODIFY `joblevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `job_sectors`
--
ALTER TABLE `job_sectors`
  MODIFY `sector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_skill_categories`
--
ALTER TABLE `job_skill_categories`
  MODIFY `skcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_structures`
--
ALTER TABLE `job_structures`
  MODIFY `jobtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_sub_categories`
--
ALTER TABLE `job_sub_categories`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `jobtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_views`
--
ALTER TABLE `job_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `locals`
--
ALTER TABLE `locals`
  MODIFY `local_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pageslocation`
--
ALTER TABLE `pageslocation`
  MODIFY `page_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_orderitems`
--
ALTER TABLE `product_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_ordertracking`
--
ALTER TABLE `product_ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_wishlist`
--
ALTER TABLE `product_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_answers`
--
ALTER TABLE `questions_answers`
  MODIFY `qa_id` tinyint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recruiting_cv_plans`
--
ALTER TABLE `recruiting_cv_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recruiting_cv_plan_orderitems`
--
ALTER TABLE `recruiting_cv_plan_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recruiting_cv_plan_orders`
--
ALTER TABLE `recruiting_cv_plan_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recruiting_plans`
--
ALTER TABLE `recruiting_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recruiting_plan_orderitems`
--
ALTER TABLE `recruiting_plan_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `recruiting_plan_orders`
--
ALTER TABLE `recruiting_plan_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sett_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `study_levels`
--
ALTER TABLE `study_levels`
  MODIFY `sl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `study_methods`
--
ALTER TABLE `study_methods`
  MODIFY `sm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_config_item`
--
ALTER TABLE `tbl_config_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `viewed_courses`
--
ALTER TABLE `viewed_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `viewed_jobs`
--
ALTER TABLE `viewed_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
