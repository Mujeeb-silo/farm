/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 8.0.27 : Database - farm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`farm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `farm`;

/*Table structure for table `capacity` */

DROP TABLE IF EXISTS `capacity`;

CREATE TABLE `capacity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `onboard` varchar(50) DEFAULT NULL,
  `industry` varchar(50) DEFAULT NULL,
  `request_type_id` int DEFAULT NULL,
  `primary_skills` text,
  `secondary_skills` text,
  `experience` int DEFAULT NULL,
  `preferred_location` text,
  `preferred_location1` text,
  `projects_worked` text,
  `availability` varchar(50) DEFAULT NULL,
  `duration_of_availability` int DEFAULT NULL,
  `comments` text,
  `cuser_id` int DEFAULT NULL COMMENT 'current login id',
  `partner_id` int DEFAULT NULL COMMENT 'parner id',
  `company_id` int DEFAULT NULL COMMENT 'company id',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status_admin` enum('saved','sendbakc','publish','pending','inactive','shortlisted','submit','close','checkout') DEFAULT NULL,
  `status_partner` enum('saved','sendbakc','publish','pending','inactive','shortlisted','submit','close','checkout') DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `source_desc` varchar(100) DEFAULT NULL,
  `source_part` int DEFAULT NULL,
  `comapany_name` varchar(50) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `annaulsalary` varchar(20) DEFAULT NULL,
  `workingsince` varchar(20) DEFAULT NULL,
  `curr_location` varchar(100) DEFAULT NULL,
  `func_area` varchar(50) DEFAULT NULL,
  `onsite_experience` varchar(50) DEFAULT NULL,
  `tech_track` varchar(50) DEFAULT NULL,
  `typeofengae` mediumtext,
  `experienced` int DEFAULT NULL COMMENT '0=fresher 1=experience',
  PRIMARY KEY (`id`),
  KEY `cap_posted_by` (`cuser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `capacity` */

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `address` text,
  `contact_name` varchar(100) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `pan_image` varchar(255) DEFAULT NULL,
  `gst` varchar(20) DEFAULT NULL,
  `gst_image` varchar(255) DEFAULT NULL,
  `bank_account_no` text,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_address` text,
  `cheque_image` text,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `swift_code` varchar(15) DEFAULT NULL,
  `iban_no` varchar(40) DEFAULT NULL,
  `nda_status` varchar(50) DEFAULT NULL,
  `date_of_nda` date DEFAULT NULL,
  `nda_image` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL,
  `cuser_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`id`,`company_name`,`business`,`address`,`contact_name`,`contact_number`,`website`,`email`,`pan`,`pan_image`,`gst`,`gst_image`,`bank_account_no`,`bank_name`,`bank_address`,`cheque_image`,`ifsc_code`,`swift_code`,`iban_no`,`nda_status`,`date_of_nda`,`nda_image`,`created_at`,`modified_at`,`cuser_id`) values (1,'matrixsolution','NA','test','manoj','91761656556','http://matrixonetechsolutions.com/','manoj@matrixonetechsolutions.com',NULL,NULL,'6546565','','46546656566465564','SBI','Hyderabad',NULL,'41545','66655','16165',NULL,'2022-12-29',NULL,'2023-01-29 22:57:46',NULL,1);

/*Table structure for table `company_address` */

DROP TABLE IF EXISTS `company_address`;

CREATE TABLE `company_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyid` int DEFAULT NULL COMMENT 'company table id',
  `address` mediumtext,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `company_address` */

insert  into `company_address`(`id`,`companyid`,`address`,`state`,`city`,`zip`,`country`) values (1,1,'test add','Telangana','Hyderabad','510000','India');

/*Table structure for table `company_contact` */

DROP TABLE IF EXISTS `company_contact`;

CREATE TABLE `company_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyid` int DEFAULT NULL COMMENT 'company table id',
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL COMMENT 'location /address',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `company_contact` */

insert  into `company_contact`(`id`,`companyid`,`name`,`designation`,`mobile`,`email`,`location`) values (1,1,'manoj','Head','9454545511','manoj@matrixsolution.com','india');

/*Table structure for table `company_technology` */

DROP TABLE IF EXISTS `company_technology`;

CREATE TABLE `company_technology` (
  `id` int NOT NULL AUTO_INCREMENT,
  `companyid` int DEFAULT NULL,
  `core` varchar(200) DEFAULT NULL,
  `other` varchar(200) DEFAULT NULL,
  `technolog` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `company_technology` */

/*Table structure for table `cv_educaton` */

DROP TABLE IF EXISTS `cv_educaton`;

CREATE TABLE `cv_educaton` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cap_id` int DEFAULT NULL COMMENT 'capacity table id',
  `qualification` varchar(200) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `specilization` varchar(200) DEFAULT NULL,
  `course_type` varchar(50) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `marktype` varchar(10) DEFAULT NULL,
  `markdesc` varchar(20) DEFAULT NULL,
  `passyear` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `company_id` int DEFAULT NULL COMMENT 'company id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cv_educaton` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `project_type` */

DROP TABLE IF EXISTS `project_type`;

CREATE TABLE `project_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `project_type` */

insert  into `project_type`(`id`,`name`,`status`) values (1,'Design',1),(2,'Development',1),(3,'Testing',1),(4,'Support',1),(5,'Project Management',1),(6,'Architect',1),(7,'Requirement Gathering',1);

/*Table structure for table `recruiter_profile` */

DROP TABLE IF EXISTS `recruiter_profile`;

CREATE TABLE `recruiter_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varbinary(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saved_status` int DEFAULT NULL COMMENT '1=true 0=false',
  `status` int DEFAULT '1' COMMENT '1=true 0=false',
  `category` varchar(200) DEFAULT NULL,
  `strength` varchar(200) DEFAULT NULL,
  `weakness` varchar(200) DEFAULT NULL,
  `noemployee` int DEFAULT NULL,
  `trunover` varchar(200) DEFAULT NULL,
  `activation_mail` int DEFAULT '0' COMMENT '0=false 1=true if admin active account first time of partner then we will check it',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `recruiter_profile` */

/*Table structure for table `request_type` */

DROP TABLE IF EXISTS `request_type`;

CREATE TABLE `request_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `request_type` */

insert  into `request_type`(`id`,`name`,`status`) values (1,'Functional',1),(2,'Technical',1),(3,'Techno Functional',1);

/*Table structure for table `requirment` */

DROP TABLE IF EXISTS `requirment`;

CREATE TABLE `requirment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(20) DEFAULT NULL,
  `title` text NOT NULL,
  `description` mediumtext,
  `req_qty` int DEFAULT NULL,
  `request_type_id` text NOT NULL,
  `primary_skills` mediumtext,
  `secondary_skills` mediumtext,
  `min_experience` int DEFAULT NULL,
  `max_experience` int DEFAULT NULL,
  `work_location` enum('INDIA','OVERSEAS','BOTH') DEFAULT NULL,
  `place` varchar(200) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `project_type_id` int DEFAULT NULL,
  `document_path` mediumtext,
  `industry` varchar(100) DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `admin_status` enum('pending','submited','publish','inactive','shortlisted','close','save') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `partner_status` enum('pending','submited','publish','inactive','shortlisted','close','save') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cuser_id` int DEFAULT NULL,
  `created_by` enum('admin','partner') DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL COMMENT 'source name',
  `source_desc` varchar(100) DEFAULT NULL COMMENT 'source description',
  `source_partner` int DEFAULT NULL COMMENT 'partner id',
  `comment` mediumtext COMMENT 'users commets',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `requirment` */

insert  into `requirment`(`id`,`serial_no`,`title`,`description`,`req_qty`,`request_type_id`,`primary_skills`,`secondary_skills`,`min_experience`,`max_experience`,`work_location`,`place`,`country`,`state`,`city`,`project_type_id`,`document_path`,`industry`,`duration`,`start_date`,`admin_status`,`partner_status`,`cuser_id`,`created_by`,`company_id`,`source`,`source_desc`,`source_partner`,`comment`,`created_at`,`updated_at`) values (1,'111222','test','<p>Welcome to the TinyMCE jQuery example!</p>',NULL,'Technical','[\"C\",\"Java\"]','[\"JavaScript\",\"PHP\"]',1,2,'BOTH',NULL,NULL,NULL,NULL,4,NULL,'IT Engineering Service',5,'1970-01-01','submited','pending',25,'admin',NULL,NULL,NULL,1,'test','2023-01-24 03:03:37','2023-01-24 03:03:37');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `role` */

insert  into `role`(`id`,`name`) values (1,'Admin'),(2,'Partner'),(3,'admin-user'),(4,'partner-us');

/*Table structure for table `skills` */

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` enum('primary','secondary') DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `skills` */

insert  into `skills`(`id`,`name`,`type`,`status`) values (1,'C','primary',1),(2,'C++','primary',1),(3,'Java','primary',1),(4,'JavaScript','primary',1),(5,'PHP','primary',1),(6,'Shell','primary',1);

/*Table structure for table `subscribtion` */

DROP TABLE IF EXISTS `subscribtion`;

CREATE TABLE `subscribtion` (
  `id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `plan_id` int DEFAULT NULL,
  `subscription_type` enum('trial','subscribed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `duration` enum('monthly','annual') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('active','pending','expired','cancel','upgraded','transaction-failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bill_status` enum('success','failed','cancel') DEFAULT NULL,
  `amount` decimal(13,10) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `subscribtion` */

/*Table structure for table `subscriptions_hist` */

DROP TABLE IF EXISTS `subscriptions_hist`;

CREATE TABLE `subscriptions_hist` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `sub_id` bigint unsigned NOT NULL DEFAULT '0',
  `company_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `subscription_type` enum('trial','subscribed','subscribed_by_admin') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `duration` enum('monthly','annual') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('active','expired','upgraded','pending','transaction-failed') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'active',
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `subscriptions_hist` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_photo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'user image',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user mobile no',
  `pwd_text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user password text',
  `role_id` int DEFAULT NULL COMMENT 'role-table-id',
  `company_id` int DEFAULT NULL,
  `usertype` enum('Admin','Partner') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0' COMMENT '0=deactive ,1=active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`profile_photo`,`password`,`remember_token`,`created_at`,`updated_at`,`mobile`,`pwd_text`,`role_id`,`company_id`,`usertype`,`status`) values (25,'Mujeeb','abc@gg.com','2023-01-10 02:20:17',NULL,'$2a$12$kgdYnAbdSqKPjRgcGN9Exez.uZQf1Qomat/eavr2zb6Y0C1hZOhtW',NULL,'2023-01-10 02:20:28',NULL,'963777989','123',1,1,'Admin',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
