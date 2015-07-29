-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-07-29 18:48:10
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.phpbb_topics_posted
DROP TABLE IF EXISTS `phpbb_topics_posted`;
CREATE TABLE IF NOT EXISTS `phpbb_topics_posted` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_posted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table int_ita_db.phpbb_topics_posted: ~26 rows (approximately)
/*!40000 ALTER TABLE `phpbb_topics_posted` DISABLE KEYS */;
INSERT INTO `phpbb_topics_posted` (`user_id`, `topic_id`, `topic_posted`) VALUES
	(2, 1, 1),
	(2, 2, 1),
	(2, 3, 1),
	(2, 4, 1),
	(2, 5, 1),
	(2, 6, 1),
	(22, 4, 1),
	(22, 5, 1),
	(22, 8, 1),
	(38, 5, 1),
	(38, 16, 1),
	(40, 4, 1),
	(40, 6, 1),
	(40, 7, 1),
	(40, 9, 1),
	(40, 10, 1),
	(40, 11, 1),
	(40, 12, 1),
	(40, 13, 1),
	(40, 14, 1),
	(40, 15, 1),
	(45, 5, 1),
	(45, 6, 1),
	(48, 3, 1),
	(51, 4, 1),
	(121, 16, 1);
/*!40000 ALTER TABLE `phpbb_topics_posted` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
