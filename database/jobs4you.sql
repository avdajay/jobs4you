-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for jobwander
CREATE DATABASE IF NOT EXISTS `jobwander` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `jobwander`;

-- Dumping structure for table jobwander.applicants
CREATE TABLE IF NOT EXISTS `applicants` (
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `summary` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` tinyint(4) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `location` (`location`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_applicants_locations` FOREIGN KEY (`location`) REFERENCES `locations` (`id`),
  CONSTRAINT `fk_applicants_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.applications
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `resume_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `applied_at` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employer_notes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `resume_id` (`resume_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.bookmarks
CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookmark_user` bigint(20) NOT NULL,
  `bookmark_content` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bookmark_user` (`bookmark_user`),
  KEY `bookmark_content` (`bookmark_content`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.chats
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.education
CREATE TABLE IF NOT EXISTS `education` (
  `resume_id` bigint(20) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `course` text,
  `major` text,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL,
  `description` longtext NOT NULL,
  KEY `user_id` (`resume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.employers
CREATE TABLE IF NOT EXISTS `employers` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `description` longtext,
  `phone` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `website` text,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `location` tinyint(4) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `location` (`location`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.employment_type
CREATE TABLE IF NOT EXISTS `employment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.experience
CREATE TABLE IF NOT EXISTS `experience` (
  `resume_id` bigint(20) NOT NULL,
  `employer_name` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `employment_type_id` int(11) NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `summary` longtext NOT NULL,
  KEY `resume_id` (`resume_id`),
  KEY `employment_type_id` (`employment_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employment_type` int(11) NOT NULL,
  `job_title` text NOT NULL,
  `category` int(11) NOT NULL,
  `location` tinyint(4) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `description` longtext NOT NULL,
  `tags` text NOT NULL,
  `expired_at` date NOT NULL,
  `created_at` date NOT NULL,
  `approved_at` date DEFAULT NULL,
  `filled_at` date DEFAULT NULL,
  `featured_at` date DEFAULT NULL,
  `subscription` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `employment_type` (`employment_type`),
  KEY `location` (`location`),
  KEY `subscription` (`subscription`),
  KEY `level` (`level`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.job_level
CREATE TABLE IF NOT EXISTS `job_level` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `island_name` varchar(255) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `initiator_id` bigint(20) NOT NULL,
  `receiver_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `initiator_id` (`initiator_id`),
  KEY `receiver_id` (`receiver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.resume
CREATE TABLE IF NOT EXISTS `resume` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` tinyint(4) NOT NULL,
  `photo` text,
  `description` longtext NOT NULL,
  `salary` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `resume_link` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `location` (`location`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `resume_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `difficulty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  KEY `resume_id` (`resume_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table jobwander.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `suspended_at` datetime DEFAULT NULL,
  `activated_at` datetime DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
