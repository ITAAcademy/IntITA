-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-08-04 14:06:44
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.letters
DROP TABLE IF EXISTS `letters`;
CREATE TABLE IF NOT EXISTS `letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `addressee_id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `text_letter` text NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.letters: ~51 rows (approximately)
/*!40000 ALTER TABLE `letters` DISABLE KEYS */;
INSERT INTO `letters` (`id`, `sender_id`, `addressee_id`, `theme`, `text_letter`, `date`, `status`) VALUES
	(1, 22, 38, 'Заняття 4', 'Привіт1', '2015-06-21 21:36:58', 1),
	(2, 22, 39, 'bnbnb', 'bnbvnv', '2015-07-06 09:37:16', 0),
	(3, 22, 38, 'vbv  bvnvbnbnb', 'bnbnbnvbnb ffgggfgf cbggffhg dhghgfhg fghghgh fggngffhgh', '2015-07-06 09:38:01', 1),
	(4, 22, 38, 'hjk', 'fhj', '2015-07-06 09:39:46', 1),
	(5, 22, 38, 'gdfgfdg', '                         gg', '2015-07-06 09:51:28', 1),
	(6, 22, 38, '                g', '        g   ', '2015-07-06 09:51:46', 1),
	(7, 38, 39, 'dghfm', 'cnvbnbvm', '2015-07-06 10:15:09', 0),
	(8, 38, 39, 'ggn,vhmjhkhkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkjjjjjjjjjjjjjjjjjjjjjjjjhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '2015-07-06 10:16:05', 0),
	(9, 22, 38, 'bvbn', 'bbv', '2015-07-06 10:40:14', 1),
	(10, 22, 38, 'zzx xbvhm', 'fjfhjhjhfhfgghgfhghghghgghgfhghgfhghghghgghghgfbnbnb', '2015-07-06 14:01:17', 1),
	(11, 22, 39, 'kilj;l', 'hk;lj;k', '2015-07-07 08:37:02', 0),
	(12, 56, 38, '222', '1111', '2015-07-08 10:12:25', 1),
	(13, 38, 40, 'rr', 'eewewr', '2015-07-08 17:48:53', 0),
	(14, 38, 22, 'zzx xbvhm', 'ujuuyu', '2015-07-08 17:49:43', 1),
	(15, 22, 38, 'zzx xbvhm', 'аптртрь', '2015-07-09 06:30:26', 1),
	(16, 38, 22, 'Заняття 4', 'bvvmn,m.,', '2015-07-09 06:37:51', 1),
	(17, 38, 22, 'zzx xbvhm', 'chmghmgjk,', '2015-07-09 11:57:24', 1),
	(18, 38, 56, '222', ' nmb,b,', '2015-07-09 11:57:32', 0),
	(19, 22, 47, 'jghgjfghfhg', 'jhfgfgh', '2015-07-10 11:50:36', 0),
	(20, 22, 41, 'etthrjy', 'tsyj', '2015-07-10 11:50:43', 0),
	(21, 45, 50, '!!!!!!!!!!!!!!!!!!!!!!!!!!', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2015-07-10 18:25:13', 0),
	(22, 22, 38, 'zzx xbvhm', 'ruytu', '2015-07-11 13:36:02', 1),
	(23, 22, 40, 'yuyuy', 'tyuyut', '2015-07-11 13:36:11', 1),
	(24, 22, 110, 'hgfhfhgfhfhh', 'ouytfghfhg', '2015-07-15 17:09:02', 0),
	(25, 38, 38, 'fbff', 'fdfgfg', '2015-07-15 17:41:55', 1),
	(26, 106, 110, 'hg', 'nm', '2015-07-16 08:43:40', 0),
	(27, 40, 38, 'hgjhgn', 'khjgjh', '2015-07-16 08:49:53', 1),
	(28, 40, 22, 'yuyuy', 'khgjghfh', '2015-07-16 08:50:08', 0),
	(29, 38, 38, 'mj', 'jkj', '2015-07-20 13:46:46', 0),
	(30, 38, 38, 'енр', 'нрн', '2015-07-20 13:52:08', 1),
	(31, 38, 38, 'иь', 'ро', '2015-07-20 13:58:37', 1),
	(32, 38, 39, 'в', 'в', '2015-07-20 14:01:31', 0),
	(33, 38, 38, 'иь', 'вав', '2015-07-20 14:01:47', 0),
	(34, 38, 39, 'bn', 'bn', '2015-07-21 06:13:55', 0),
	(35, 38, 38, ' m', ' nkm', '2015-07-21 08:52:56', 0),
	(36, 38, 38, 'енр', 'cgjhk', '2015-07-21 08:53:15', 0),
	(37, 49, 38, 'Тест', 'тест', '2015-07-21 12:06:20', 0),
	(38, 52, 38, 'ghgh', 'ggh', '2015-07-21 19:07:26', 0),
	(39, 52, 40, 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'f', '2015-07-21 19:07:41', 0),
	(40, 52, 38, 'формулы сокращенного умножения и разложения на множители формулы сокращенного ум', 'в', '2015-07-21 19:12:22', 0),
	(41, 52, 38, 'формулысокращенногоумноженияиразложениянамножителиформулысокращенногоумноженияир', 'арп', '2015-07-21 19:13:42', 0),
	(42, 121, 39, 'авпрпр', 'аааааааааааааааааааааааааааааааааааааааввввввввввввввввввввввввввииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииииоооооооооооооооооооооооооооооооооооооооооооооооооооооооонннннннннннннннннннннннннннннннннннннннннннннннннннннннннннннккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккуууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууууупппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппппплллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллллльььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььдддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддддчччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччччььььььььььььььььььььььььььььььььььььььььььььььььььььььььссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжжцццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццццььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььььффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффффззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззззкккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккккеееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееееаааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа', '2015-07-22 08:33:07', 0),
	(43, 121, 39, 'рспиь', 'сссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссссс', '2015-07-22 08:33:41', 0),
	(44, 121, 41, 'мрьбиьбтью', 'мллллллллллллллллллллллллллллллллллллллллллллллитиииимисмисмсти', '2015-07-22 08:33:54', 0),
	(45, 38, 38, '111', '111', '2015-07-22 17:04:13', 0),
	(46, 38, 38, 'и', 'м', '2015-07-24 13:45:41', 0),
	(47, 22, 40, 'hgchmnm', 'kgkjkh,kh', '2015-07-27 10:15:48', 0),
	(48, 22, 38, 'zzx xbvhm', 'fhmj', '2015-07-27 10:16:00', 1),
	(49, 121, 40, ' hvm', 'ghk', '2015-07-27 13:49:07', 0),
	(50, 129, 40, 'спсвравчр', 'рлаппв', '2015-07-29 10:53:58', 0),
	(51, 129, 40, 'влнол', 'вглнвгл', '2015-07-29 10:54:09', 0);
/*!40000 ALTER TABLE `letters` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
