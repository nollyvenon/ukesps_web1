/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 5.7.23 : Database - ukesps
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ukesps` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ukesps`;

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_location` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` longtext,
  `entrydate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `content` */

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `country_iso_code_2` char(3) NOT NULL DEFAULT '',
  `status` enum('0','1') DEFAULT '1',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `IDX_COUNTRY_NAME` (`country_name`),
  UNIQUE KEY `country_iso_code_2` (`country_iso_code_2`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

/*Data for the table `countries` */

insert  into `countries`(`country_id`,`country_name`,`country_iso_code_2`,`status`,`updated`) values (1,'Afghanistan','AF','1','0000-00-00 00:00:00'),(2,'Albania','AL','1','0000-00-00 00:00:00'),(3,'Algeria','DZ','1','0000-00-00 00:00:00'),(4,'American Samoa','AS','1','0000-00-00 00:00:00'),(5,'Andorra','AD','1','0000-00-00 00:00:00'),(6,'Angola','AO','1','0000-00-00 00:00:00'),(7,'Anguilla','AI','1','0000-00-00 00:00:00'),(8,'Antarctica','AQ','1','0000-00-00 00:00:00'),(9,'Antigua and Barbuda','AG','1','0000-00-00 00:00:00'),(10,'Argentina','AR','1','0000-00-00 00:00:00'),(11,'Armenia','AM','1','0000-00-00 00:00:00'),(12,'Aruba','AW','1','0000-00-00 00:00:00'),(13,'Australia','AU','1','0000-00-00 00:00:00'),(14,'Austria','AT','1','0000-00-00 00:00:00'),(15,'Azerbaijan','AZ','1','0000-00-00 00:00:00'),(16,'Bahamas','BS','1','0000-00-00 00:00:00'),(17,'Bahrain','BH','1','0000-00-00 00:00:00'),(18,'Bangladesh','BD','1','0000-00-00 00:00:00'),(19,'Barbados','BB','1','0000-00-00 00:00:00'),(20,'Belarus','BY','1','0000-00-00 00:00:00'),(21,'Belgium','BE','1','0000-00-00 00:00:00'),(22,'Belize','BZ','1','0000-00-00 00:00:00'),(23,'Benin','BJ','1','0000-00-00 00:00:00'),(24,'Bermuda','BM','1','0000-00-00 00:00:00'),(25,'Bhutan','BT','1','0000-00-00 00:00:00'),(26,'Bolivia','BO','1','0000-00-00 00:00:00'),(27,'Bonaire, Saint Eustatius and Saba','BQ','1','2016-12-19 12:40:06'),(28,'Bosnia and Herzegowina','BA','1','0000-00-00 00:00:00'),(29,'Botswana','BW','1','0000-00-00 00:00:00'),(30,'Bouvet Island','BV','1','0000-00-00 00:00:00'),(31,'Brazil','BR','1','0000-00-00 00:00:00'),(32,'British Indian Ocean Territory','IO','1','0000-00-00 00:00:00'),(33,'Brunei Darussalam','BN','1','0000-00-00 00:00:00'),(34,'Bulgaria','BG','1','0000-00-00 00:00:00'),(35,'Burkina Faso','BF','1','0000-00-00 00:00:00'),(36,'Burundi','BI','1','0000-00-00 00:00:00'),(37,'Cambodia','KH','1','0000-00-00 00:00:00'),(38,'Cameroon','CM','1','0000-00-00 00:00:00'),(39,'Canada','CA','1','0000-00-00 00:00:00'),(40,'Cape Verde','CV','1','0000-00-00 00:00:00'),(41,'Cayman Islands','KY','1','0000-00-00 00:00:00'),(42,'Central African Republic','CF','1','0000-00-00 00:00:00'),(43,'Chad','TD','1','0000-00-00 00:00:00'),(44,'Chile','CL','1','0000-00-00 00:00:00'),(45,'China','CN','1','0000-00-00 00:00:00'),(46,'Christmas Island','CX','1','0000-00-00 00:00:00'),(47,'Cocos (Keeling) Islands','CC','1','0000-00-00 00:00:00'),(48,'Colombia','CO','1','0000-00-00 00:00:00'),(49,'Comoros','KM','1','0000-00-00 00:00:00'),(50,'Congo','CG','1','0000-00-00 00:00:00'),(51,'Cook Islands','CK','1','0000-00-00 00:00:00'),(52,'Costa Rica','CR','1','0000-00-00 00:00:00'),(53,'Cote D\'Ivoire','CI','1','0000-00-00 00:00:00'),(54,'Croatia','HR','1','0000-00-00 00:00:00'),(55,'Cuba','CU','1','0000-00-00 00:00:00'),(56,'Cyprus','CY','1','0000-00-00 00:00:00'),(57,'Czech Republic','CZ','1','0000-00-00 00:00:00'),(58,'Denmark','DK','1','0000-00-00 00:00:00'),(59,'Djibouti','DJ','1','0000-00-00 00:00:00'),(60,'Dominica','DM','1','0000-00-00 00:00:00'),(61,'Dominican Republic','DO','1','0000-00-00 00:00:00'),(62,'East Timor','TP','1','0000-00-00 00:00:00'),(63,'Ecuador','EC','1','0000-00-00 00:00:00'),(64,'Egypt','EG','1','0000-00-00 00:00:00'),(65,'El Salvador','SV','1','0000-00-00 00:00:00'),(66,'Equatorial Guinea','GQ','1','0000-00-00 00:00:00'),(67,'Eritrea','ER','1','0000-00-00 00:00:00'),(68,'Estonia','EE','1','0000-00-00 00:00:00'),(69,'Ethiopia','ET','1','0000-00-00 00:00:00'),(70,'Falkland Islands (Malvinas)','FK','1','0000-00-00 00:00:00'),(71,'Faroe Islands','FO','1','0000-00-00 00:00:00'),(72,'Fiji','FJ','1','0000-00-00 00:00:00'),(73,'Finland','FI','1','0000-00-00 00:00:00'),(74,'France','FR','1','0000-00-00 00:00:00'),(75,'France, Metropolitan','FX','1','0000-00-00 00:00:00'),(76,'French Guiana','GF','1','0000-00-00 00:00:00'),(77,'French Polynesia','PF','1','0000-00-00 00:00:00'),(78,'French Southern Territories','TF','1','0000-00-00 00:00:00'),(79,'Gabon','GA','1','0000-00-00 00:00:00'),(80,'Gambia','GM','1','0000-00-00 00:00:00'),(81,'Georgia','GE','1','0000-00-00 00:00:00'),(82,'Germany','DE','1','0000-00-00 00:00:00'),(83,'Ghana','GH','1','0000-00-00 00:00:00'),(84,'Gibraltar','GI','1','0000-00-00 00:00:00'),(85,'Greece','GR','1','0000-00-00 00:00:00'),(86,'Greenland','GL','1','0000-00-00 00:00:00'),(87,'Grenada','GD','1','0000-00-00 00:00:00'),(88,'Guadeloupe','GP','1','0000-00-00 00:00:00'),(89,'Guam','GU','1','0000-00-00 00:00:00'),(90,'Guatemala','GT','1','0000-00-00 00:00:00'),(91,'Guinea','GN','1','0000-00-00 00:00:00'),(92,'Guinea-bissau','GW','1','0000-00-00 00:00:00'),(93,'Guyana','GY','1','0000-00-00 00:00:00'),(94,'Haiti','HT','1','0000-00-00 00:00:00'),(95,'Heard and Mc Donald Islands','HM','1','0000-00-00 00:00:00'),(96,'Honduras','HN','1','0000-00-00 00:00:00'),(97,'Hong Kong','HK','1','0000-00-00 00:00:00'),(98,'Hungary','HU','1','0000-00-00 00:00:00'),(99,'Iceland','IS','1','0000-00-00 00:00:00'),(100,'India','IN','1','0000-00-00 00:00:00'),(101,'Indonesia','ID','1','0000-00-00 00:00:00'),(102,'Iran (Islamic Republic of)','IR','1','0000-00-00 00:00:00'),(103,'Iraq','IQ','1','0000-00-00 00:00:00'),(104,'Ireland','IE','1','0000-00-00 00:00:00'),(105,'Isle of Man','IM','1','2016-12-19 12:36:25'),(106,'Israel','IL','1','0000-00-00 00:00:00'),(107,'Italy','IT','1','0000-00-00 00:00:00'),(108,'Jamaica','JM','1','0000-00-00 00:00:00'),(109,'Japan','JP','1','0000-00-00 00:00:00'),(110,'Jordan','JO','1','0000-00-00 00:00:00'),(111,'Kazakhstan','KZ','1','0000-00-00 00:00:00'),(112,'Kenya','KE','1','0000-00-00 00:00:00'),(113,'Kiribati','KI','1','0000-00-00 00:00:00'),(114,'Korea, Democratic People\'s Republic of','KP','1','0000-00-00 00:00:00'),(115,'Korea, Republic of','KR','1','0000-00-00 00:00:00'),(116,'Kuwait','KW','1','0000-00-00 00:00:00'),(117,'Kyrgyzstan','KG','1','0000-00-00 00:00:00'),(118,'Lao People\'s Democratic Republic','LA','1','0000-00-00 00:00:00'),(119,'Latvia','LV','1','0000-00-00 00:00:00'),(120,'Lebanon','LB','1','0000-00-00 00:00:00'),(121,'Lesotho','LS','1','0000-00-00 00:00:00'),(122,'Liberia','LR','1','0000-00-00 00:00:00'),(123,'Libyan Arab Jamahiriya','LY','1','0000-00-00 00:00:00'),(124,'Liechtenstein','LI','1','0000-00-00 00:00:00'),(125,'Lithuania','LT','1','0000-00-00 00:00:00'),(126,'Luxembourg','LU','1','0000-00-00 00:00:00'),(127,'Macau','MO','1','0000-00-00 00:00:00'),(128,'Macedonia, The Former Yugoslav Republic of','MK','1','0000-00-00 00:00:00'),(129,'Madagascar','MG','1','0000-00-00 00:00:00'),(130,'Malawi','MW','1','0000-00-00 00:00:00'),(131,'Malaysia','MY','1','0000-00-00 00:00:00'),(132,'Maldives','MV','1','0000-00-00 00:00:00'),(133,'Mali','ML','1','0000-00-00 00:00:00'),(134,'Malta','MT','1','0000-00-00 00:00:00'),(135,'Marshall Islands','MH','1','0000-00-00 00:00:00'),(136,'Martinique','MQ','1','0000-00-00 00:00:00'),(137,'Mauritania','MR','1','0000-00-00 00:00:00'),(138,'Mauritius','MU','1','0000-00-00 00:00:00'),(139,'Mayotte','YT','1','0000-00-00 00:00:00'),(140,'Mexico','MX','1','0000-00-00 00:00:00'),(141,'Micronesia, Federated States of','FM','1','0000-00-00 00:00:00'),(142,'Moldova, Republic of','MD','1','0000-00-00 00:00:00'),(143,'Monaco','MC','1','0000-00-00 00:00:00'),(144,'Mongolia','MN','1','0000-00-00 00:00:00'),(145,'Montserrat','MS','1','0000-00-00 00:00:00'),(146,'Morocco','MA','1','0000-00-00 00:00:00'),(147,'Mozambique','MZ','1','0000-00-00 00:00:00'),(148,'Myanmar','MM','1','0000-00-00 00:00:00'),(149,'Namibia','NA','1','0000-00-00 00:00:00'),(150,'Nauru','NR','1','0000-00-00 00:00:00'),(151,'Nepal','NP','1','0000-00-00 00:00:00'),(152,'Netherlands','NL','1','0000-00-00 00:00:00'),(153,'Netherlands Antilles','AN','1','0000-00-00 00:00:00'),(154,'New Caledonia','NC','1','0000-00-00 00:00:00'),(155,'New Zealand','NZ','1','0000-00-00 00:00:00'),(156,'Nicaragua','NI','1','0000-00-00 00:00:00'),(157,'Niger','NE','1','0000-00-00 00:00:00'),(158,'Nigeria','NG','1','0000-00-00 00:00:00'),(159,'Niue','NU','1','0000-00-00 00:00:00'),(160,'Norfolk Island','NF','1','0000-00-00 00:00:00'),(161,'Northern Mariana Islands','MP','1','0000-00-00 00:00:00'),(162,'Norway','NO','1','0000-00-00 00:00:00'),(163,'Oman','OM','1','0000-00-00 00:00:00'),(164,'Pakistan','PK','1','0000-00-00 00:00:00'),(165,'Palau','PW','1','0000-00-00 00:00:00'),(166,'Panama','PA','1','0000-00-00 00:00:00'),(167,'Papua New Guinea','PG','1','0000-00-00 00:00:00'),(168,'Paraguay','PY','1','0000-00-00 00:00:00'),(169,'Peru','PE','1','0000-00-00 00:00:00'),(170,'Philippines','PH','1','0000-00-00 00:00:00'),(171,'Pitcairn','PN','1','0000-00-00 00:00:00'),(172,'Poland','PL','1','0000-00-00 00:00:00'),(173,'Portugal','PT','1','0000-00-00 00:00:00'),(174,'Puerto Rico','PR','1','0000-00-00 00:00:00'),(175,'Qatar','QA','1','0000-00-00 00:00:00'),(176,'Reunion','RE','1','0000-00-00 00:00:00'),(177,'Romania','RO','1','0000-00-00 00:00:00'),(178,'Russian Federation','RU','1','0000-00-00 00:00:00'),(179,'Rwanda','RW','1','0000-00-00 00:00:00'),(180,'Saint Kitts and Nevis','KN','1','0000-00-00 00:00:00'),(181,'Saint Lucia','LC','1','0000-00-00 00:00:00'),(182,'Saint Vincent and the Grenadines','VC','1','0000-00-00 00:00:00'),(183,'Samoa','WS','1','0000-00-00 00:00:00'),(184,'San Marino','SM','1','0000-00-00 00:00:00'),(185,'Sao Tome and Principe','ST','1','0000-00-00 00:00:00'),(186,'Saudi Arabia','SA','1','0000-00-00 00:00:00'),(187,'Senegal','SN','1','0000-00-00 00:00:00'),(188,'Serbia','RS','1','2016-12-19 12:42:28'),(189,'Seychelles','SC','1','0000-00-00 00:00:00'),(190,'Sierra Leone','SL','1','0000-00-00 00:00:00'),(191,'Singapore','SG','1','0000-00-00 00:00:00'),(192,'Slovakia (Slovak Republic)','SK','1','0000-00-00 00:00:00'),(193,'Slovenia','SI','1','0000-00-00 00:00:00'),(194,'Solomon Islands','SB','1','0000-00-00 00:00:00'),(195,'Somalia','SO','1','0000-00-00 00:00:00'),(196,'South Africa','ZA','1','0000-00-00 00:00:00'),(197,'South Georgia and the South Sandwich Islands','GS','1','0000-00-00 00:00:00'),(198,'Spain','ES','1','0000-00-00 00:00:00'),(199,'Sri Lanka','LK','1','0000-00-00 00:00:00'),(200,'St Barthelemy','BL','1','2016-12-19 12:34:29'),(201,'St Maarten','SX','1','2016-12-19 12:23:15'),(202,'St. Helena','SH','1','0000-00-00 00:00:00'),(203,'St. Pierre and Miquelon','PM','1','0000-00-00 00:00:00'),(204,'Sudan','SD','1','0000-00-00 00:00:00'),(205,'Suriname','SR','1','0000-00-00 00:00:00'),(206,'Svalbard and Jan Mayen Islands','SJ','1','0000-00-00 00:00:00'),(207,'Swaziland','SZ','1','0000-00-00 00:00:00'),(208,'Sweden','SE','1','0000-00-00 00:00:00'),(209,'Switzerland','CH','1','0000-00-00 00:00:00'),(210,'Syrian Arab Republic','SY','1','0000-00-00 00:00:00'),(211,'Taiwan','TW','1','0000-00-00 00:00:00'),(212,'Tajikistan','TJ','1','0000-00-00 00:00:00'),(213,'Tanzania, United Republic of','TZ','1','0000-00-00 00:00:00'),(214,'Thailand','TH','1','0000-00-00 00:00:00'),(215,'Togo','TG','1','0000-00-00 00:00:00'),(216,'Tokelau','TK','1','0000-00-00 00:00:00'),(217,'Tonga','TO','1','0000-00-00 00:00:00'),(218,'Trinidad and Tobago','TT','1','0000-00-00 00:00:00'),(219,'Tunisia','TN','1','0000-00-00 00:00:00'),(220,'Turkey','TR','1','0000-00-00 00:00:00'),(221,'Turkmenistan','TM','1','0000-00-00 00:00:00'),(222,'Turks and Caicos Islands','TC','1','0000-00-00 00:00:00'),(223,'Tuvalu','TV','1','0000-00-00 00:00:00'),(224,'Uganda','UG','1','0000-00-00 00:00:00'),(225,'Ukraine','UA','1','0000-00-00 00:00:00'),(226,'United Arab Emirates','AE','1','0000-00-00 00:00:00'),(227,'United Kingdom','GB','1','0000-00-00 00:00:00'),(228,'United States','US','1','0000-00-00 00:00:00'),(229,'United States Minor Outlying Islands','UM','1','0000-00-00 00:00:00'),(230,'Uruguay','UY','1','0000-00-00 00:00:00'),(231,'Uzbekistan','UZ','1','0000-00-00 00:00:00'),(232,'Vanuatu','VU','1','0000-00-00 00:00:00'),(233,'Vatican City State (Holy See)','VA','1','0000-00-00 00:00:00'),(234,'Venezuela','VE','1','0000-00-00 00:00:00'),(235,'Viet Nam','VN','1','0000-00-00 00:00:00'),(236,'Virgin Islands (British)','VG','1','0000-00-00 00:00:00'),(237,'Virgin Islands (U.S.)','VI','1','0000-00-00 00:00:00'),(238,'Wallis and Futuna Islands','WF','1','0000-00-00 00:00:00'),(239,'Western Sahara','EH','1','0000-00-00 00:00:00'),(240,'Yemen','YE','1','0000-00-00 00:00:00'),(241,'Yugoslavia','YU','1','0000-00-00 00:00:00'),(242,'Zaire','ZR','1','0000-00-00 00:00:00'),(243,'Zambia','ZM','1','0000-00-00 00:00:00'),(244,'Zimbabwe','ZW','1','0000-00-00 00:00:00');

/*Table structure for table `course_categories` */

DROP TABLE IF EXISTS `course_categories`;

CREATE TABLE `course_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `course_categories` */

/*Table structure for table `course_location` */

DROP TABLE IF EXISTS `course_location`;

CREATE TABLE `course_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `location_info` text,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `course_location` */

/*Table structure for table `course_study_method` */

DROP TABLE IF EXISTS `course_study_method`;

CREATE TABLE `course_study_method` (
  `csm_id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `cs_method` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`csm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `course_study_method` */

insert  into `course_study_method`(`csm_id`,`cs_method`) values (1,'Classroom'),(2,'Correspondence'),(3,'Online');

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_img` varchar(200) DEFAULT NULL,
  `course_title` varchar(100) DEFAULT NULL,
  `study_method` varchar(15) DEFAULT NULL,
  `cost` double(8,2) DEFAULT '0.00',
  `duration` varchar(10) DEFAULT NULL,
  `qualification` tinytext,
  `location` tinytext,
  `course_overview` tinytext,
  `description` text,
  `ratings` tinytext,
  `career_path` tinytext,
  `who_is_course_for` tinytext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `courses` */

/*Table structure for table `institutions` */

DROP TABLE IF EXISTS `institutions`;

CREATE TABLE `institutions` (
  `institute_id` int(11) NOT NULL AUTO_INCREMENT,
  `institute_name` tinytext,
  `institute_type` enum('public','private') DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`institute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `institutions` */

insert  into `institutions`(`institute_id`,`institute_name`,`institute_type`,`timestamp`) values (1,'Igbinedion University','private','2016-07-10 14:37:56'),(2,'Abia State University','public','2016-07-10 14:38:19');

/*Table structure for table `job_categories` */

DROP TABLE IF EXISTS `job_categories`;

CREATE TABLE `job_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `job_categories` */

insert  into `job_categories`(`category_id`,`category_name`) values (1,'Accountancy jobs'),(2,'Actuarial jobs'),(3,'Admin, Secretarial & PA jobs'),(4,'Apprenticeships jobs'),(5,'Banking jobs'),(6,'Charity & Voluntary jobs'),(7,'Construction & Property jobs'),(8,'Customer Service jobs'),(9,'Education jobs'),(10,'\r\nEnergy jobs'),(11,'Engineering jobs'),(12,'Estate Agency jobs'),(13,'Financial Services jobs'),(14,'FMCG jobs'),(15,'General Insurance jobs '),(16,'Graduate jobs'),(17,'Health & Medicine jobs'),(18,'Hospitality & Catering jobs'),(19,'Human Resources jobs'),(20,'IT & Telecoms jobs'),(21,'IT Contractor jobs');

/*Table structure for table `job_company` */

DROP TABLE IF EXISTS `job_company`;

CREATE TABLE `job_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) DEFAULT NULL,
  `company_info` text,
  `relevance` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `job_company` */

insert  into `job_company`(`company_id`,`company_name`,`company_info`,`relevance`) values (1,'Dahfex Global',NULL,NULL),(2,'MTN',NULL,NULL),(3,'Airtel',NULL,NULL),(4,'Nestle',NULL,NULL);

/*Table structure for table `job_experience` */

DROP TABLE IF EXISTS `job_experience`;

CREATE TABLE `job_experience` (
  `jobexperience_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobexperience_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jobexperience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `job_experience` */

insert  into `job_experience`(`jobexperience_id`,`jobexperience_name`) values (1,'1-2years'),(2,'2-3years'),(3,'3-5years'),(4,'5-8years'),(5,'8-10years'),(6,'10-15years'),(7,'15years and above');

/*Table structure for table `job_level` */

DROP TABLE IF EXISTS `job_level`;

CREATE TABLE `job_level` (
  `joblevel_id` int(11) NOT NULL AUTO_INCREMENT,
  `joblevel_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`joblevel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `job_level` */

insert  into `job_level`(`joblevel_id`,`joblevel_name`) values (1,'Director'),(2,'Manager'),(3,'Department Head'),(4,'Experienced'),(5,'Fresh Graduate'),(6,'Undergraduate'),(7,'Vocational/Unskilled');

/*Table structure for table `job_location` */

DROP TABLE IF EXISTS `job_location`;

CREATE TABLE `job_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `location_info` text,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `job_location` */

/*Table structure for table `job_sectors` */

DROP TABLE IF EXISTS `job_sectors`;

CREATE TABLE `job_sectors` (
  `sector_id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(100) DEFAULT NULL,
  `sector_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `job_sectors` */

insert  into `job_sectors`(`sector_id`,`sector_name`,`sector_img`) values (1,'Health','healthcare-trends-1080x675.jpg'),(2,'Technology','AdobeStock_118793641-1320x740.jpeg'),(3,'Engineering','Work-for-graduates-in-mechanical-engineering.jpg'),(4,'Graduates','UNIOSUN-Medical-Students-Graduates-in-Ukraine-4-e1498922125282.jpg');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `jobs_id` int(111) NOT NULL AUTO_INCREMENT,
  `ownername` varchar(200) DEFAULT NULL,
  `jobtitle` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `cacregno` varchar(30) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL,
  `address` tinytext,
  `jobcategory` varchar(200) DEFAULT NULL,
  `jobstype` varchar(20) DEFAULT NULL,
  `joblevel` varchar(100) DEFAULT NULL,
  `descript` tinytext,
  `imageurl` varchar(255) DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `state_id` int(1) DEFAULT NULL,
  `location_id` int(3) DEFAULT NULL,
  `country_id` int(3) DEFAULT '156',
  `views` int(5) DEFAULT '0',
  `comments` int(4) DEFAULT '0',
  `tag` text,
  `status` enum('0','1') DEFAULT '0',
  `jobsdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jobs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jobs` */

/*Table structure for table `jobstate` */

DROP TABLE IF EXISTS `jobstate`;

CREATE TABLE `jobstate` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(100) NOT NULL,
  `country_id` int(3) DEFAULT '1',
  `state_info` text,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `jobstate` */

insert  into `jobstate`(`state_id`,`state_name`,`country_id`,`state_info`) values (1,'Abia State',156,NULL),(2,'Adamawa State',156,NULL),(3,'Akwa Ibom State',156,NULL),(4,'Anambra State',156,NULL),(5,'Bauchi State',156,NULL),(6,'Bayelsa State',156,NULL),(7,'Benue State',156,NULL),(8,'Borno State',156,NULL),(9,'Cross River State',156,NULL),(10,'Delta State',156,NULL),(11,'Ebonyi State',156,NULL),(12,'Edo State',156,NULL),(13,'Ekiti State',156,NULL),(14,'Enugu State',156,NULL),(15,'FCT',156,NULL),(16,'Gombe State',156,NULL),(17,'Imo State',156,NULL),(18,'Jigawa State',156,NULL),(19,'Kaduna State',156,NULL),(20,'Kano State',156,NULL),(21,'Katsina State',156,NULL),(22,'Kebbi State',156,NULL),(23,'Kogi State',156,NULL),(24,'Kwara State',156,NULL),(25,'Lagos State',156,NULL),(26,'Nasarawa State',156,NULL),(27,'Niger State',156,NULL),(28,'Ogun State',156,NULL),(29,'Ondo State',156,NULL),(30,'Osun State',156,NULL),(31,'Oyo State',156,NULL),(32,'Plateau State',156,NULL),(33,'Rivers State',156,NULL),(34,'Sokoto State',156,NULL),(35,'Taraba State',156,NULL),(36,'Yobe State',156,NULL),(37,'Zamfara State',156,NULL);

/*Table structure for table `jobtype` */

DROP TABLE IF EXISTS `jobtype`;

CREATE TABLE `jobtype` (
  `jobtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobtype_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`jobtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jobtype` */

insert  into `jobtype`(`jobtype_id`,`jobtype_name`) values (1,'Full Time'),(2,'Part Time'),(3,'Intern'),(4,'Free-lance'),(5,'Contract');

/*Table structure for table `locals` */

DROP TABLE IF EXISTS `locals`;

CREATE TABLE `locals` (
  `local_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `local_name` varchar(100) NOT NULL,
  PRIMARY KEY (`local_id`)
) ENGINE=InnoDB AUTO_INCREMENT=738 DEFAULT CHARSET=latin1;

/*Data for the table `locals` */

insert  into `locals`(`local_id`,`state_id`,`local_name`) values (1,1,'Aba South'),(2,1,'Arochukwu'),(3,1,'Bende'),(4,1,'Ikwuano'),(5,1,'Isiala Ngwa North'),(6,1,'Isiala Ngwa South'),(7,1,'Isuikwuato'),(8,1,'Obi Ngwa'),(9,1,'Ohafia'),(10,1,'Osisioma'),(11,1,'Ugwunagbo'),(12,1,'Ukwa East'),(13,1,'Ukwa West'),(14,1,'Umuahia North'),(15,1,'Umuahia South'),(16,1,'Umu Nneochi'),(17,2,'Fufure'),(18,2,'Ganye'),(19,2,'Gayuk'),(20,2,'Gombi'),(21,2,'Grie'),(22,2,'Hong'),(23,2,'Jada'),(24,2,'Lamurde'),(25,2,'Madagali'),(26,2,'Maiha'),(27,2,'Mayo Belwa'),(28,2,'Michika'),(29,2,'Mubi North'),(30,2,'Mubi South'),(31,2,'Numan'),(32,2,'Shelleng'),(33,2,'Song'),(34,2,'Toungo'),(35,2,'Yola North'),(36,2,'Yola South'),(37,3,'Eastern Obolo'),(38,3,'Eket'),(39,3,'Esit Eket'),(40,3,'Essien Udim'),(41,3,'Etim Ekpo'),(42,3,'Etinan'),(43,3,'Ibeno'),(44,3,'Ibesikpo Asutan'),(45,3,'Ibiono-Ibom'),(46,3,'Ika'),(47,3,'Ikono'),(48,3,'Ikot Abasi'),(49,3,'Ikot Ekpene'),(50,3,'Ini'),(51,3,'Itu'),(52,3,'Mbo'),(53,3,'Mkpat-Enin'),(54,3,'Nsit-Atai'),(55,3,'Nsit-Ibom'),(56,3,'Nsit-Ubium'),(57,3,'Obot Akara'),(58,3,'Okobo'),(59,3,'Onna'),(60,3,'Oron'),(61,3,'Oruk Anam'),(62,3,'Udung-Uko'),(63,3,'Ukanafun'),(64,3,'Uruan'),(65,3,'Urue-Offong/Oruko'),(66,3,'Uyo'),(67,4,'Anambra East'),(68,4,'Anambra West'),(69,4,'Anaocha'),(70,4,'Awka North'),(71,4,'Awka South'),(72,4,'Ayamelum'),(73,4,'Dunukofia'),(74,4,'Ekwusigo'),(75,4,'Idemili North'),(76,4,'Idemili South'),(77,4,'Ihiala'),(78,4,'Njikoka'),(79,4,'Nnewi North'),(80,4,'Nnewi South'),(81,4,'Ogbaru'),(82,4,'Onitsha North'),(83,4,'Onitsha South'),(84,4,'Orumba North'),(85,4,'Orumba South'),(86,4,'Oyi'),(87,5,'Bauchi'),(88,5,'Bogoro'),(89,5,'Damban'),(90,5,'Darazo'),(91,5,'Dass'),(92,5,'Gamawa'),(93,5,'Ganjuwa'),(94,5,'Giade'),(95,5,'Itas/Gadau'),(96,5,'Jama\'are'),(97,5,'Katagum'),(98,5,'Kirfi'),(99,5,'Misau'),(100,5,'Ningi'),(101,5,'Shira'),(102,5,'Tafawa Balewa'),(103,5,'Toro'),(104,5,'Warji'),(105,5,'Zaki'),(106,6,'Ekeremor'),(107,6,'Kolokuma/Opokuma'),(108,6,'Nembe'),(109,6,'Ogbia'),(110,6,'Sagbama'),(111,6,'Southern Ijaw'),(112,6,'Yenagoa'),(113,7,'Apa'),(114,7,'Ado'),(115,7,'Buruku'),(116,7,'Gboko'),(117,7,'Guma'),(118,7,'Gwer East'),(119,7,'Gwer West'),(120,7,'Katsina-Ala'),(121,7,'Konshisha'),(122,7,'Kwande'),(123,7,'Logo'),(124,7,'Makurdi'),(125,7,'Obi'),(126,7,'Ogbadibo'),(127,7,'Ohimini'),(128,7,'Oju'),(129,7,'Okpokwu'),(130,7,'Oturkpo'),(131,7,'Tarka'),(132,7,'Ukum'),(133,7,'Ushongo'),(134,7,'Vandeikya'),(135,8,'Askira/Uba'),(136,8,'Bama'),(137,8,'Bayo'),(138,8,'Biu'),(139,8,'Chibok'),(140,8,'Damboa'),(141,8,'Dikwa'),(142,8,'Gubio'),(143,8,'Guzamala'),(144,8,'Gwoza'),(145,8,'Hawul'),(146,8,'Jere'),(147,8,'Kaga'),(148,8,'Kala/Balge'),(149,8,'Konduga'),(150,8,'Kukawa'),(151,8,'Kwaya Kusar'),(152,8,'Mafa'),(153,8,'Magumeri'),(154,8,'Maiduguri'),(155,8,'Marte'),(156,8,'Mobbar'),(157,8,'Monguno'),(158,8,'Ngala'),(159,8,'Nganzai'),(160,8,'Shani'),(161,9,'Akamkpa'),(162,9,'Akpabuyo'),(163,9,'Bakassi'),(164,9,'Bekwarra'),(165,9,'Biase'),(166,9,'Boki'),(167,9,'Calabar Municipal'),(168,9,'Calabar South'),(169,9,'Etung'),(170,9,'Ikom'),(171,9,'Obanliku'),(172,9,'Obubra'),(173,9,'Obudu'),(174,9,'Odukpani'),(175,9,'Ogoja'),(176,9,'Yakuur'),(177,9,'Yala'),(178,10,'Aniocha South'),(179,10,'Bomadi'),(180,10,'Burutu'),(181,10,'Ethiope East'),(182,10,'Ethiope West'),(183,10,'Ika North East'),(184,10,'Ika South'),(185,10,'Isoko North'),(186,10,'Isoko South'),(187,10,'Ndokwa East'),(188,10,'Ndokwa West'),(189,10,'Okpe'),(190,10,'Oshimili North'),(191,10,'Oshimili South'),(192,10,'Patani'),(193,10,'Sapele'),(194,10,'Udu'),(195,10,'Ughelli North'),(196,10,'Ughelli South'),(197,10,'Ukwuani'),(198,10,'Uvwie'),(199,10,'Warri North'),(200,10,'Warri South'),(201,10,'Warri South West'),(202,11,'Afikpo North'),(203,11,'Afikpo South'),(204,11,'Ebonyi'),(205,11,'Ezza North'),(206,11,'Ezza South'),(207,11,'Ikwo'),(208,11,'Ishielu'),(209,11,'Ivo'),(210,11,'Izzi'),(211,11,'Ohaozara'),(212,11,'Ohaukwu'),(213,11,'Onicha'),(214,12,'Egor'),(215,12,'Esan Central'),(216,12,'Esan North-East'),(217,12,'Esan South-East'),(218,12,'Esan West'),(219,12,'Etsako Central'),(220,12,'Etsako East'),(221,12,'Etsako West'),(222,12,'Igueben'),(223,12,'Ikpoba Okha'),(224,12,'Orhionmwon'),(225,12,'Oredo'),(226,12,'Ovia North-East'),(227,12,'Ovia South-West'),(228,12,'Owan East'),(229,12,'Owan West'),(230,12,'Uhunmwonde'),(231,13,'Efon'),(232,13,'Ekiti East'),(233,13,'Ekiti South-West'),(234,13,'Ekiti West'),(235,13,'Emure'),(236,13,'Gbonyin'),(237,13,'Ido Osi'),(238,13,'Ijero'),(239,13,'Ikere'),(240,13,'Ikole'),(241,13,'Ilejemeje'),(242,13,'Irepodun/Ifelodun'),(243,13,'Ise/Orun'),(244,13,'Moba'),(245,13,'Oye'),(246,14,'Awgu'),(247,14,'Enugu East'),(248,14,'Enugu North'),(249,14,'Enugu South'),(250,14,'Ezeagu'),(251,14,'Igbo Etiti'),(252,14,'Igbo Eze North'),(253,14,'Igbo Eze South'),(254,14,'Isi Uzo'),(255,14,'Nkanu East'),(256,14,'Nkanu West'),(257,14,'Nsukka'),(258,14,'Oji River'),(259,14,'Udenu'),(260,14,'Udi'),(261,14,'Uzo Uwani'),(262,15,'Bwari'),(263,15,'Gwagwalada'),(264,15,'Kuje'),(265,15,'Kwali'),(266,15,'Municipal Area Council'),(267,16,'Balanga'),(268,16,'Billiri'),(269,16,'Dukku'),(270,16,'Funakaye'),(271,16,'Gombe'),(272,16,'Kaltungo'),(273,16,'Kwami'),(274,16,'Nafada'),(275,16,'Shongom'),(276,16,'Yamaltu/Deba'),(277,17,'Ahiazu Mbaise'),(278,17,'Ehime Mbano'),(279,17,'Ezinihitte'),(280,17,'Ideato North'),(281,17,'Ideato South'),(282,17,'Ihitte/Uboma'),(283,17,'Ikeduru'),(284,17,'Isiala Mbano'),(285,17,'Isu'),(286,17,'Mbaitoli'),(287,17,'Ngor Okpala'),(288,17,'Njaba'),(289,17,'Nkwerre'),(290,17,'Nwangele'),(291,17,'Obowo'),(292,17,'Oguta'),(293,17,'Ohaji/Egbema'),(294,17,'Okigwe'),(295,17,'Orlu'),(296,17,'Orsu'),(297,17,'Oru East'),(298,17,'Oru West'),(299,17,'Owerri Municipal'),(300,17,'Owerri North'),(301,17,'Owerri West'),(302,17,'Unuimo'),(303,18,'Babura'),(304,18,'Biriniwa'),(305,18,'Birnin Kudu'),(306,18,'Buji'),(307,18,'Dutse'),(308,18,'Gagarawa'),(309,18,'Garki'),(310,18,'Gumel'),(311,18,'Guri'),(312,18,'Gwaram'),(313,18,'Gwiwa'),(314,18,'Hadejia'),(315,18,'Jahun'),(316,18,'Kafin Hausa'),(317,18,'Kazaure'),(318,18,'Kiri Kasama'),(319,18,'Kiyawa'),(320,18,'Kaugama'),(321,18,'Maigatari'),(322,18,'Malam Madori'),(323,18,'Miga'),(324,18,'Ringim'),(325,18,'Roni'),(326,18,'Sule Tankarkar'),(327,18,'Taura'),(328,18,'Yankwashi'),(329,19,'Chikun'),(330,19,'Giwa'),(331,19,'Igabi'),(332,19,'Ikara'),(333,19,'Jaba'),(334,19,'Jema\'a'),(335,19,'Kachia'),(336,19,'Kaduna North'),(337,19,'Kaduna South'),(338,19,'Kagarko'),(339,19,'Kajuru'),(340,19,'Kaura'),(341,19,'Kauru'),(342,19,'Kubau'),(343,19,'Kudan'),(344,19,'Lere'),(345,19,'Makarfi'),(346,19,'Sabon Gari'),(347,19,'Sanga'),(348,19,'Soba'),(349,19,'Zangon Kataf'),(350,19,'Zaria'),(351,20,'Albasu'),(352,20,'Bagwai'),(353,20,'Bebeji'),(354,20,'Bichi'),(355,20,'Bunkure'),(356,20,'Dala'),(357,20,'Dambatta'),(358,20,'Dawakin Kudu'),(359,20,'Dawakin Tofa'),(360,20,'Doguwa'),(361,20,'Fagge'),(362,20,'Gabasawa'),(363,20,'Garko'),(364,20,'Garun Mallam'),(365,20,'Gaya'),(366,20,'Gezawa'),(367,20,'Gwale'),(368,20,'Gwarzo'),(369,20,'Kabo'),(370,20,'Kano Municipal'),(371,20,'Karaye'),(372,20,'Kibiya'),(373,20,'Kiru'),(374,20,'Kumbotso'),(375,20,'Kunchi'),(376,20,'Kura'),(377,20,'Madobi'),(378,20,'Makoda'),(379,20,'Minjibir'),(380,20,'Nasarawa'),(381,20,'Rano'),(382,20,'Rimin Gado'),(383,20,'Rogo'),(384,20,'Shanono'),(385,20,'Sumaila'),(386,20,'Takai'),(387,20,'Tarauni'),(388,20,'Tofa'),(389,20,'Tsanyawa'),(390,20,'Tudun Wada'),(391,20,'Ungogo'),(392,20,'Warawa'),(393,20,'Wudil'),(394,21,'Batagarawa'),(395,21,'Batsari'),(396,21,'Baure'),(397,21,'Bindawa'),(398,21,'Charanchi'),(399,21,'Dandume'),(400,21,'Danja'),(401,21,'Dan Musa'),(402,21,'Daura'),(403,21,'Dutsi'),(404,21,'Dutsin Ma'),(405,21,'Faskari'),(406,21,'Funtua'),(407,21,'Ingawa'),(408,21,'Jibia'),(409,21,'Kafur'),(410,21,'Kaita'),(411,21,'Kankara'),(412,21,'Kankia'),(413,21,'Katsina'),(414,21,'Kurfi'),(415,21,'Kusada'),(416,21,'Mai\'Adua'),(417,21,'Malumfashi'),(418,21,'Mani'),(419,21,'Mashi'),(420,21,'Matazu'),(421,21,'Musawa'),(422,21,'Rimi'),(423,21,'Sabuwa'),(424,21,'Safana'),(425,21,'Sandamu'),(426,21,'Zango'),(427,22,'Arewa Dandi'),(428,22,'Argungu'),(429,22,'Augie'),(430,22,'Bagudo'),(431,22,'Birnin Kebbi'),(432,22,'Bunza'),(433,22,'Dandi'),(434,22,'Fakai'),(435,22,'Gwandu'),(436,22,'Jega'),(437,22,'Kalgo'),(438,22,'Koko/Besse'),(439,22,'Maiyama'),(440,22,'Ngaski'),(441,22,'Sakaba'),(442,22,'Shanga'),(443,22,'Suru'),(444,22,'Wasagu/Danko'),(445,22,'Yauri'),(446,22,'Zuru'),(447,23,'Ajaokuta'),(448,23,'Ankpa'),(449,23,'Bassa'),(450,23,'Dekina'),(451,23,'Ibaji'),(452,23,'Idah'),(453,23,'Igalamela Odolu'),(454,23,'Ijumu'),(455,23,'Kabba/Bunu'),(456,23,'Kogi'),(457,23,'Lokoja'),(458,23,'Mopa Muro'),(459,23,'Ofu'),(460,23,'Ogori/Magongo'),(461,23,'Okehi'),(462,23,'Okene'),(463,23,'Olamaboro'),(464,23,'Omala'),(465,23,'Yagba East'),(466,23,'Yagba West'),(467,24,'Baruten'),(468,24,'Edu'),(469,24,'Ekiti'),(470,24,'Ifelodun'),(471,24,'Ilorin East'),(472,24,'Ilorin South'),(473,24,'Ilorin West'),(474,24,'Irepodun'),(475,24,'Isin'),(476,24,'Kaiama'),(477,24,'Moro'),(478,24,'Offa'),(479,24,'Oke Ero'),(480,24,'Oyun'),(481,24,'Pategi'),(482,25,'Ajeromi-Ifelodun'),(483,25,'Alimosho'),(484,25,'Amuwo-Odofin'),(485,25,'Apapa'),(486,25,'Badagry'),(487,25,'Epe'),(488,25,'Eti Osa'),(489,25,'Ibeju-Lekki'),(490,25,'Ifako-Ijaiye'),(491,25,'Ikeja'),(492,25,'Ikorodu'),(493,25,'Kosofe'),(494,25,'Lagos Island'),(495,25,'Lagos Mainland'),(496,25,'Mushin'),(497,25,'Ojo'),(498,25,'Oshodi-Isolo'),(499,25,'Shomolu'),(500,25,'Surulere'),(501,26,'Awe'),(502,26,'Doma'),(503,26,'Karu'),(504,26,'Keana'),(505,26,'Keffi'),(506,26,'Kokona'),(507,26,'Lafia'),(508,26,'Nasarawa'),(509,26,'Nasarawa Egon'),(510,26,'Obi'),(511,26,'Toto'),(512,26,'Wamba'),(513,27,'Agwara'),(514,27,'Bida'),(515,27,'Borgu'),(516,27,'Bosso'),(517,27,'Chanchaga'),(518,27,'Edati'),(519,27,'Gbako'),(520,27,'Gurara'),(521,27,'Katcha'),(522,27,'Kontagora'),(523,27,'Lapai'),(524,27,'Lavun'),(525,27,'Magama'),(526,27,'Mariga'),(527,27,'Mashegu'),(528,27,'Mokwa'),(529,27,'Moya'),(530,27,'Paikoro'),(531,27,'Rafi'),(532,27,'Rijau'),(533,27,'Shiroro'),(534,27,'Suleja'),(535,27,'Tafa'),(536,27,'Wushishi'),(537,28,'Abeokuta South'),(538,28,'Ado-Odo/Ota'),(539,28,'Egbado North'),(540,28,'Egbado South'),(541,28,'Ewekoro'),(542,28,'Ifo'),(543,28,'Ijebu East'),(544,28,'Ijebu North'),(545,28,'Ijebu North East'),(546,28,'Ijebu Ode'),(547,28,'Ikenne'),(548,28,'Imeko Afon'),(549,28,'Ipokia'),(550,28,'Obafemi Owode'),(551,28,'Odeda'),(552,28,'Odogbolu'),(553,28,'Ogun Waterside'),(554,28,'Remo North'),(555,28,'Shagamu'),(556,29,'Akoko North-West'),(557,29,'Akoko South-West'),(558,29,'Akoko South-East'),(559,29,'Akure North'),(560,29,'Akure South'),(561,29,'Ese Odo'),(562,29,'Idanre'),(563,29,'Ifedore'),(564,29,'Ilaje'),(565,29,'Ile Oluji/Okeigbo'),(566,29,'Irele'),(567,29,'Odigbo'),(568,29,'Okitipupa'),(569,29,'Ondo East'),(570,29,'Ondo West'),(571,29,'Ose'),(572,29,'Owo'),(573,30,'Atakunmosa West'),(574,30,'Aiyedaade'),(575,30,'Aiyedire'),(576,30,'Boluwaduro'),(577,30,'Boripe'),(578,30,'Ede North'),(579,30,'Ede South'),(580,30,'Ife Central'),(581,30,'Ife East'),(582,30,'Ife North'),(583,30,'Ife South'),(584,30,'Egbedore'),(585,30,'Ejigbo'),(586,30,'Ifedayo'),(587,30,'Ifelodun'),(588,30,'Ila'),(589,30,'Ilesa East'),(590,30,'Ilesa West'),(591,30,'Irepodun'),(592,30,'Irewole'),(593,30,'Isokan'),(594,30,'Iwo'),(595,30,'Obokun'),(596,30,'Odo Otin'),(597,30,'Ola Oluwa'),(598,30,'Olorunda'),(599,30,'Oriade'),(600,30,'Orolu'),(601,30,'Osogbo'),(602,31,'Akinyele'),(603,31,'Atiba'),(604,31,'Atisbo'),(605,31,'Egbeda'),(606,31,'Ibadan North'),(607,31,'Ibadan North-East'),(608,31,'Ibadan North-West'),(609,31,'Ibadan South-East'),(610,31,'Ibadan South-West'),(611,31,'Ibarapa Central'),(612,31,'Ibarapa East'),(613,31,'Ibarapa North'),(614,31,'Ido'),(615,31,'Irepo'),(616,31,'Iseyin'),(617,31,'Itesiwaju'),(618,31,'Iwajowa'),(619,31,'Kajola'),(620,31,'Lagelu'),(621,31,'Ogbomosho North'),(622,31,'Ogbomosho South'),(623,31,'Ogo Oluwa'),(624,31,'Olorunsogo'),(625,31,'Oluyole'),(626,31,'Ona Ara'),(627,31,'Orelope'),(628,31,'Ori Ire'),(629,31,'Oyo'),(630,31,'Oyo East'),(631,31,'Saki East'),(632,31,'Saki West'),(633,31,'Surulere'),(634,32,'Barkin Ladi'),(635,32,'Bassa'),(636,32,'Jos East'),(637,32,'Jos North'),(638,32,'Jos South'),(639,32,'Kanam'),(640,32,'Kanke'),(641,32,'Langtang South'),(642,32,'Langtang North'),(643,32,'Mangu'),(644,32,'Mikang'),(645,32,'Pankshin'),(646,32,'Qua\'an Pan'),(647,32,'Riyom'),(648,32,'Shendam'),(649,32,'Wase'),(650,33,'Ahoada East'),(651,33,'Ahoada West'),(652,33,'Akuku-Toru'),(653,33,'Andoni'),(654,33,'Asari-Toru'),(655,33,'Bonny'),(656,33,'Degema'),(657,33,'Eleme'),(658,33,'Emuoha'),(659,33,'Etche'),(660,33,'Gokana'),(661,33,'Ikwerre'),(662,33,'Khana'),(663,33,'Obio/Akpor'),(664,33,'Ogba/Egbema/Ndoni'),(665,33,'Ogu/Bolo'),(666,33,'Okrika'),(667,33,'Omuma'),(668,33,'Opobo/Nkoro'),(669,33,'Oyigbo'),(670,33,'Port Harcourt'),(671,33,'Tai'),(672,34,'Bodinga'),(673,34,'Dange Shuni'),(674,34,'Gada'),(675,34,'Goronyo'),(676,34,'Gudu'),(677,34,'Gwadabawa'),(678,34,'Illela'),(679,34,'Isa'),(680,34,'Kebbe'),(681,34,'Kware'),(682,34,'Rabah'),(683,34,'Sabon Birni'),(684,34,'Shagari'),(685,34,'Silame'),(686,34,'Sokoto North'),(687,34,'Sokoto South'),(688,34,'Tambuwal'),(689,34,'Tangaza'),(690,34,'Tureta'),(691,34,'Wamako'),(692,34,'Wurno'),(693,34,'Yabo'),(694,35,'Bali'),(695,35,'Donga'),(696,35,'Gashaka'),(697,35,'Gassol'),(698,35,'Ibi'),(699,35,'Jalingo'),(700,35,'Karim Lamido'),(701,35,'Kumi'),(702,35,'Lau'),(703,35,'Sardauna'),(704,35,'Takum'),(705,35,'Ussa'),(706,35,'Wukari'),(707,35,'Yorro'),(708,35,'Zing'),(709,36,'Bursari'),(710,36,'Damaturu'),(711,36,'Fika'),(712,36,'Fune'),(713,36,'Geidam'),(714,36,'Gujba'),(715,36,'Gulani'),(716,36,'Jakusko'),(717,36,'Karasuwa'),(718,36,'Machina'),(719,36,'Nangere'),(720,36,'Nguru'),(721,36,'Potiskum'),(722,36,'Tarmuwa'),(723,36,'Yunusari'),(724,36,'Yusufari'),(725,37,'Bakura'),(726,37,'Birnin Magaji/Kiyaw'),(727,37,'Bukkuyum'),(728,37,'Bungudu'),(729,37,'Gummi'),(730,37,'Gusau'),(731,37,'Kaura Namoda'),(732,37,'Maradun'),(733,37,'Maru'),(734,37,'Shinkafi'),(735,37,'Talata Mafara'),(736,37,'Chafe'),(737,37,'Zurmi');

/*Table structure for table `pageslocation` */

DROP TABLE IF EXISTS `pageslocation`;

CREATE TABLE `pageslocation` (
  `page_id` int(5) NOT NULL AUTO_INCREMENT,
  `page_location` varchar(50) DEFAULT NULL,
  `page_category` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `pageslocation` */

insert  into `pageslocation`(`page_id`,`page_location`,`page_category`,`status`) values (1,'full','accomodation_support','1'),(2,'topheader','accomodation_support','1'),(3,'header_img','accomodation_support','1'),(4,NULL,'english_tests','1'),(5,NULL,'english_tests','1'),(6,NULL,'english_tests','1'),(7,NULL,'enquiry_now','1'),(8,NULL,'enquiry_now','1'),(9,NULL,'enquiry_now','1'),(10,NULL,'exhibition_events','1'),(11,NULL,'exhibition_events','1'),(12,NULL,'exhibition_events','1'),(13,NULL,'scholarships','1'),(14,NULL,'scholarships','1'),(15,NULL,'scholarships','1'),(16,NULL,'student_support','1'),(17,NULL,'student_support','1'),(18,NULL,'student_support','1'),(19,NULL,'universities','1'),(20,NULL,'universities','1'),(21,NULL,'universities','1'),(22,NULL,'study_abroad','1'),(23,NULL,'study_abroad','1'),(24,NULL,'study_abroad','1'),(25,NULL,'university_representation','1'),(26,NULL,'university_representation','1');

/*Table structure for table `questions_answers` */

DROP TABLE IF EXISTS `questions_answers`;

CREATE TABLE `questions_answers` (
  `qa_id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `question` tinytext,
  `answer` text,
  `reviews` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`qa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `questions_answers` */

/*Table structure for table `site_pages` */

DROP TABLE IF EXISTS `site_pages`;

CREATE TABLE `site_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_category` varchar(50) DEFAULT NULL,
  `page_name` varchar(200) DEFAULT NULL,
  `page_slug` varchar(100) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `site_pages` */

insert  into `site_pages`(`page_id`,`page_category`,`page_name`,`page_slug`,`status`) values (1,'services','Scholarships','scholarships','0'),(2,'services','University Representation','university_representation','0'),(3,'services','English Tests','english_tests','0'),(4,'services','Accomodation Support','accomodation_support','0'),(5,'services','Student Support','student_support','0'),(6,'services','Exhibition & Events','exhibition_events','0'),(7,'study_match','Studying Abroad','universities','0'),(8,'study_match','Universities','study_abroad','0'),(9,'study_match','Enquire Now','enquiry_now','0'),(12,'about','About','about_site','0');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(12) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `mailing_address` tinytext,
  `course_preference` text,
  `university_preference` text,
  `status` enum('0','1') DEFAULT '1',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user_code`,`username`,`last_name`,`middle_name`,`first_name`,`password`,`gender`,`email`,`phone`,`country`,`source`,`mailing_address`,`course_preference`,`university_preference`,`status`,`timestamp`) values (1,'6ZJJifMvJ4W',NULL,'Azuka','Chukwunonso','John','$2y$11$04ae80f83a2b3d2bff50fuU5evR2JN6WorlXVFDcMLpvJwWOhmOzK','1','gooption@yahoo.com','08027257478','14','','','','','1','2020-03-14 10:50:24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
