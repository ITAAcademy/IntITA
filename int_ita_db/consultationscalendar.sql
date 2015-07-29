-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-07-29 18:48:08
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.consultationscalendar
DROP TABLE IF EXISTS `consultationscalendar`;
CREATE TABLE IF NOT EXISTS `consultationscalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `lecture_id` int(11) DEFAULT NULL,
  `date_cons` date DEFAULT NULL,
  `start_cons` time DEFAULT NULL,
  `end_cons` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.consultationscalendar: ~81 rows (approximately)
/*!40000 ALTER TABLE `consultationscalendar` DISABLE KEYS */;
INSERT INTO `consultationscalendar` (`id`, `teacher_id`, `user_id`, `lecture_id`, `date_cons`, `start_cons`, `end_cons`) VALUES
	(1, 1, 22, 1, '2015-07-16', '10:20:00', '10:40:00'),
	(2, 1, 22, 1, '2015-07-16', '12:20:00', '12:40:00'),
	(3, 1, 22, 1, '2015-07-16', '14:20:00', '14:40:00'),
	(4, 1, 22, 1, '2015-07-29', '09:20:00', '09:40:00'),
	(6, 1, 22, 1, '2015-07-29', '11:20:00', '11:40:00'),
	(7, 1, 22, 1, '2015-07-29', '13:20:00', '13:40:00'),
	(8, 1, 22, 1, '2015-07-29', '14:20:00', '14:40:00'),
	(9, 1, 22, 1, '2015-07-29', '15:20:00', '15:40:00'),
	(11, 2, 22, 1, '2015-07-16', '16:00:00', '16:20:00'),
	(12, 2, 22, 1, '2015-07-16', '16:40:00', '17:40:00'),
	(13, 2, 22, 2, '2015-07-09', '10:20:00', '10:40:00'),
	(14, 2, 22, 2, '2015-07-17', '14:20:00', '14:40:00'),
	(15, 3, 22, 2, '2015-07-06', '12:40:00', '13:00:00'),
	(16, 1, 22, 2, '2015-07-08', '11:20:00', '11:40:00'),
	(19, 3, 22, 2, '2015-07-10', '09:00:00', '11:40:00'),
	(20, 3, 22, 2, '2015-07-10', '13:20:00', '13:40:00'),
	(21, 3, 22, 2, '2015-07-10', '14:20:00', '14:40:00'),
	(22, 3, 22, 2, '2015-07-10', '15:00:00', '16:00:00'),
	(23, 3, 22, 2, '2015-07-10', '16:20:00', '16:40:00'),
	(24, 3, 22, 2, '2015-07-10', '17:20:00', '17:40:00'),
	(25, 3, 22, 2, '2015-07-10', '18:20:00', '18:40:00'),
	(26, 3, 22, 2, '2015-07-10', '19:00:00', '20:00:00'),
	(27, 3, 22, 2, '2015-07-10', '20:20:00', '20:40:00'),
	(28, 3, 22, 2, '2015-07-10', '21:20:00', '21:40:00'),
	(29, 3, 22, 2, '2015-07-10', '22:00:00', '23:00:00'),
	(30, 1, 22, 1, '2015-07-10', '13:00:00', '13:20:00'),
	(31, 3, 22, 1, '2015-07-23', '16:20:00', '16:40:00'),
	(33, 2, 22, 15, '2015-07-15', '12:00:00', '12:20:00'),
	(34, 2, 22, 1, '2015-07-21', '14:00:00', '14:20:00'),
	(35, 1, 45, 1, '2015-07-13', '09:00:00', '09:20:00'),
	(36, 1, 45, 1, '2015-07-13', '10:20:00', '10:40:00'),
	(37, 1, 45, 1, '2015-07-13', '11:40:00', '12:00:00'),
	(38, 1, 45, 1, '2015-07-13', '12:20:00', '12:40:00'),
	(40, 1, 45, 1, '2015-07-13', '14:20:00', '14:40:00'),
	(41, 1, 45, 1, '2015-07-13', '15:40:00', '16:00:00'),
	(42, 1, 45, 1, '2015-07-13', '16:20:00', '16:40:00'),
	(43, 1, 45, 1, '2015-07-13', '17:00:00', '17:20:00'),
	(44, 1, 45, 1, '2015-07-13', '18:20:00', '18:40:00'),
	(46, 1, 45, 1, '2015-07-13', '20:20:00', '20:40:00'),
	(48, 1, 45, 1, '2015-07-13', '22:20:00', '22:40:00'),
	(49, 2, 22, 1, '2015-07-16', '10:00:00', '10:20:00'),
	(50, 1, 22, 1, '2015-07-15', '12:40:00', '13:00:00'),
	(51, 1, 45, 80, '2015-07-13', '13:00:00', '14:20:00'),
	(52, 1, 45, 80, '2015-07-13', '14:40:00', '15:40:00'),
	(53, 1, 45, 80, '2015-07-13', '16:00:00', '16:20:00'),
	(54, 1, 106, 1, '2015-07-16', '18:20:00', '18:40:00'),
	(55, 1, 106, 1, '2015-07-22', '17:20:00', '17:40:00'),
	(56, 3, 106, 1, '2015-07-16', '09:20:00', '09:40:00'),
	(57, 3, 106, 1, '2015-07-24', '19:20:00', '19:40:00'),
	(58, 2, 106, 1, '2015-07-23', '11:20:00', '11:40:00'),
	(59, 2, 106, 1, '2015-07-23', '13:20:00', '13:40:00'),
	(60, 4, 106, 91, '2015-07-16', '15:20:00', '15:40:00'),
	(61, 4, 106, 23, '2015-07-24', '12:20:00', '12:40:00'),
	(63, 1, 106, 1, '2015-07-24', '17:00:00', '17:20:00'),
	(64, 2, 45, 80, '2015-07-22', '09:00:00', '09:20:00'),
	(65, 1, 22, 2, '2015-07-22', '13:20:00', '13:40:00'),
	(66, 4, 22, 22, '2015-07-24', '14:20:00', '14:40:00'),
	(67, 2, 52, 81, '2015-07-23', '19:20:00', '19:40:00'),
	(68, 1, 52, 81, '2015-07-24', '12:00:00', '12:20:00'),
	(69, 1, 52, 81, '2015-07-24', '15:20:00', '15:40:00'),
	(70, 1, 52, 81, '2015-07-24', '18:20:00', '18:40:00'),
	(71, 1, 52, 81, '2015-07-24', '19:00:00', '19:20:00'),
	(72, 3, 52, 81, '2015-07-30', '11:00:00', '11:20:00'),
	(73, 3, 52, 81, '2015-07-30', '11:40:00', '12:00:00'),
	(74, 3, 52, 81, '2015-07-30', '12:20:00', '12:40:00'),
	(75, 6, 45, 100, '2015-07-22', '10:20:00', '10:40:00'),
	(76, 4, 52, 22, '2015-07-23', '13:20:00', '13:40:00'),
	(77, 4, 52, 22, '2015-07-24', '14:40:00', '15:00:00'),
	(78, 4, 52, 22, '2015-08-21', '13:20:00', '13:40:00'),
	(79, 1, 121, 118, '2015-07-24', '16:40:00', '17:00:00'),
	(80, 6, 121, 101, '2015-07-24', '12:20:00', '12:40:00'),
	(81, 2, 121, 133, '2015-07-27', '13:00:00', '13:20:00'),
	(82, 2, 22, 126, '2015-07-30', '11:20:00', '11:40:00'),
	(83, 1, 45, 117, '2015-07-30', '12:20:00', '12:40:00'),
	(84, 2, 45, 117, '2015-07-24', '20:20:00', '20:40:00'),
	(85, 3, 45, 117, '2015-07-27', '16:20:00', '16:40:00'),
	(86, 6, 121, 100, '2015-08-04', '13:20:00', '13:40:00'),
	(87, 6, 121, 100, '2015-07-29', '11:40:00', '12:00:00'),
	(88, 6, 121, 100, '2015-07-29', '12:20:00', '12:40:00'),
	(89, 3, 22, 117, '2015-07-28', '16:20:00', '16:40:00'),
	(90, 1, 22, 117, '2015-07-29', '19:20:00', '19:40:00');
/*!40000 ALTER TABLE `consultationscalendar` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
