-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-05-06 19:47:13
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.sourcemessages
DROP TABLE IF EXISTS `sourcemessages`;
CREATE TABLE IF NOT EXISTS `sourcemessages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COMMENT='Table for interface messages (keys).';

-- Dumping data for table int_ita_db.sourcemessages: ~197 rows (approximately)
/*!40000 ALTER TABLE `sourcemessages` DISABLE KEYS */;
INSERT INTO `sourcemessages` (`id`, `category`, `message`) VALUES
	(1, 'mainpage', '0001'),
	(2, 'mainpage', '0002'),
	(3, 'mainpage', '0003'),
	(4, 'mainpage', '0004'),
	(5, 'slider', '0005'),
	(6, 'mainpage', '0006'),
	(7, 'mainpage', '0007'),
	(8, 'slider', '0008'),
	(9, 'regform', '0009'),
	(10, 'regform', '0010'),
	(11, 'regform', '0011'),
	(12, 'regform', '0012'),
	(13, 'regform', '0013'),
	(14, 'regform', '0014'),
	(15, 'regform', '0015'),
	(16, 'header', '0016'),
	(17, 'header', '0017'),
	(18, 'header', '0018'),
	(19, 'header', '0019'),
	(20, 'header', '0020'),
	(21, 'header', '0021'),
	(22, 'header', '0022'),
	(23, 'footer', '0023'),
	(24, 'footer', '0024'),
	(25, 'footer', '0025'),
	(26, 'footer', '0026'),
	(27, 'slider', '0027'),
	(28, 'slider', '0028'),
	(29, 'slider', '0029'),
	(30, 'slider', '0030'),
	(31, 'slider', '0031'),
	(32, 'aboutus', '0032'),
	(33, 'aboutus', '0033'),
	(34, 'aboutus', '0034'),
	(35, 'aboutus', '0035'),
	(36, 'aboutus', '0036'),
	(37, 'aboutus', '0037'),
	(38, 'step', '0038'),
	(39, 'step', '0039'),
	(40, 'step', '0040'),
	(41, 'step', '0041'),
	(42, 'step', '0042'),
	(43, 'step', '0043'),
	(44, 'step', '0044'),
	(45, 'step', '0045'),
	(46, 'step', '0046'),
	(47, 'step', '0047'),
	(48, 'step', '0048'),
	(49, 'breadcrumbs', '0049'),
	(50, 'breadcrumbs', '0050'),
	(51, 'breadcrumbs', '0051'),
	(52, 'breadcrumbs', '0052'),
	(53, 'breadcrumbs', '0053'),
	(54, 'breadcrumbs', '0054'),
	(55, 'breadcrumbs', '0055'),
	(56, 'breadcrumbs', '0056'),
	(57, 'breadcrumbs', '0057'),
	(58, 'teachers', '0058'),
	(59, 'teachers', '0059'),
	(60, 'teachers', '0060'),
	(61, 'teachers', '0061'),
	(62, 'teachers', '0062'),
	(63, 'teachers', '0063'),
	(64, 'teacher', '0064'),
	(65, 'teacher', '0065'),
	(66, 'courses', '0066'),
	(67, 'courses', '0067'),
	(68, 'courses', '0068'),
	(69, 'courses', '0069'),
	(70, 'lecture', '0070'),
	(71, 'lecture', '0071'),
	(72, 'lecture', '0072'),
	(73, 'lecture', '0073'),
	(74, 'lecture', '0074'),
	(75, 'lecture', '0075'),
	(76, 'lecture', '0076'),
	(77, 'lecture', '0077'),
	(78, 'lecture', '0078'),
	(79, 'lecture', '0079'),
	(80, 'lecture', '0080'),
	(81, 'lecture', '0081'),
	(82, 'lecture', '0082'),
	(83, 'lecture', '0083'),
	(84, 'lecture', '0084'),
	(85, 'lecture', '0085'),
	(86, 'lecture', '0086'),
	(87, 'lecture', '0087'),
	(88, 'lecture', '0088'),
	(89, 'lecture', '0089'),
	(90, 'lecture', '0090'),
	(91, 'regform', '0091'),
	(92, 'regform', '0092'),
	(93, 'regform', '0093'),
	(94, 'courses', '0094'),
	(95, 'profile', '0095'),
	(96, 'profile', '0096'),
	(97, 'profile', '0097'),
	(98, 'profile', '0098'),
	(99, 'profile', '0099'),
	(100, 'profile', '0100'),
	(101, 'profile', '0101'),
	(102, 'profile', '0102'),
	(103, 'profile', '0103'),
	(104, 'profile', '0104'),
	(105, 'profile', '0105'),
	(106, 'profile', '0106'),
	(107, 'profile', '0107'),
	(108, 'profile', '0108'),
	(109, 'profile', '0109'),
	(110, 'profile', '0110'),
	(111, 'profile', '0111'),
	(112, 'profile', '0112'),
	(113, 'profile', '0113'),
	(114, 'profile', '0114'),
	(115, 'profile', '0115'),
	(116, 'profile', '0116'),
	(117, 'profile', '0117'),
	(118, 'profile', '0118'),
	(119, 'profile', '0119'),
	(120, 'profile', '0120'),
	(121, 'profile', '0121'),
	(122, 'profile', '0122'),
	(123, 'profile', '0123'),
	(124, 'profile', '0124'),
	(125, 'profile', '0125'),
	(126, 'profile', '0126'),
	(127, 'profile', '0127'),
	(128, 'profile', '0128'),
	(129, 'profile', '0129'),
	(130, 'profile', '0130'),
	(131, 'profile', '0131'),
	(132, 'profile', '0132'),
	(133, 'profile', '0133'),
	(134, 'profile', '0134'),
	(135, 'profile', '0135'),
	(136, 'profile', '0136'),
	(137, 'header', '0137'),
	(138, 'errors', '0138'),
	(139, 'errors', '0139'),
	(140, 'courses', '0140'),
	(141, 'courses', '0141'),
	(142, 'courses', '0142'),
	(143, 'courses', '0143'),
	(144, 'courses', '0144'),
	(145, 'courses', '0145'),
	(146, 'courses', '0146'),
	(147, 'courses', '0147'),
	(148, 'courses', '0148'),
	(149, 'courses', '0149'),
	(150, 'regexp', '0150'),
	(151, 'regexp', '0151'),
	(152, 'regexp', '0152'),
	(153, 'regexp', '0153'),
	(154, 'regexp', '0154'),
	(155, 'regexp', '0155'),
	(156, 'regexp', '0156'),
	(157, 'regexp', '0157'),
	(158, 'regexp', '0158'),
	(159, 'regexp', '0159'),
	(160, 'regexp', '0160'),
	(161, 'regexp', '0161'),
	(162, 'regexp', '0162'),
	(163, 'regexp', '0163'),
	(164, 'regexp', '0164'),
	(165, 'regexp', '0165'),
	(166, 'regexp', '0166'),
	(167, 'regexp', '0167'),
	(168, 'regexp', '0168'),
	(169, 'regexp', '0169'),
	(170, 'regexp', '0170'),
	(171, 'regexp', '0171'),
	(172, 'regexp', '0172'),
	(173, 'regexp', '0173'),
	(174, 'teachers', '0174'),
	(175, 'teachers', '0175'),
	(176, 'teachers', '0176'),
	(177, 'teachers', '0177'),
	(178, 'teachers', '0178'),
	(179, 'teachers', '0179'),
	(180, 'teachers', '0180'),
	(181, 'teacher', '0181'),
	(182, 'teacher', '0182'),
	(183, 'teacher', '0183'),
	(184, 'teacher', '0184'),
	(185, 'teacher', '0185'),
	(186, 'teacher', '0186'),
	(187, 'teacher', '0187'),
	(188, 'teacher', '0188'),
	(189, 'teacher', '0189'),
	(190, 'teacher', '0190'),
	(191, 'teacher', '0191'),
	(192, 'teacher', '0192'),
	(193, 'course', '0193'),
	(194, 'course', '0194'),
	(195, 'course', '0195'),
	(196, 'course', '0196'),
	(197, 'course', '0197'),
	(198, 'course', '0198'),
	(199, 'course', '0199'),
	(200, 'course', '0200'),
	(201, 'course', '0201'),
	(202, 'course', '0202'),
	(203, 'course', '0203'),
	(204, 'course', '0204'),
	(205, 'course', '0205'),
	(206, 'course', '0206'),
	(207, 'course', '0207'),
	(208, 'course', '0208'),
	(209, 'course', '0209'),
	(210, 'course', '0210'),
	(211, 'module', '0211'),
	(212, 'module', '0212'),
	(213, 'module', '0213'),
	(214, 'module', '0214'),
	(215, 'module', '0215'),
	(216, 'module', '0216'),
	(217, 'module', '0217'),
	(218, 'module', '0218'),
	(219, 'module', '0219'),
	(220, 'module', '0220'),
	(221, 'module', '0221'),
	(222, 'module', '0222'),
	(223, 'module', '0223'),
	(224, 'module', '0224'),
	(225, 'module', '0225'),
	(226, 'module', '0226'),
	(227, 'module', '0227'),
	(228, 'module', '0228'),
	(229, 'courses', '0229'),
	(230, 'courses', '0230'),
	(231, 'courses', '0231'),
	(232, 'courses', '0232'),
	(233, 'courses', '0233'),
	(234, 'courses', '0234'),
	(235, 'courses', '0235'),
	(236, 'courses', '0236'),
	(237, 'course', '0237'),
	(238, 'course', '0238'),
	(239, 'course', '0239'),
	(240, 'course', '0240');
/*!40000 ALTER TABLE `sourcemessages` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
