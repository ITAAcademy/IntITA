-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-04-03 15:38:14
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for int_ita_db
CREATE DATABASE IF NOT EXISTS `int_ita_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `int_ita_db`;


-- Dumping structure for table int_ita_db.aa_access
DROP TABLE IF EXISTS `aa_access`;
CREATE TABLE IF NOT EXISTS `aa_access` (
  `user_id` smallint(5) unsigned NOT NULL,
  `interface_id` smallint(5) unsigned NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`interface_id`),
  KEY `interface_id` (`interface_id`),
  CONSTRAINT `aa_access_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `aa_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aa_access_ibfk_2` FOREIGN KEY (`interface_id`) REFERENCES `aa_interfaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_access: ~0 rows (approximately)
/*!40000 ALTER TABLE `aa_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `aa_access` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_authorizations
DROP TABLE IF EXISTS `aa_authorizations`;
CREATE TABLE IF NOT EXISTS `aa_authorizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL,
  `when_enter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `when_enter` (`when_enter`),
  CONSTRAINT `aa_authorizations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `aa_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_authorizations: ~34 rows (approximately)
/*!40000 ALTER TABLE `aa_authorizations` DISABLE KEYS */;
INSERT INTO `aa_authorizations` (`id`, `user_id`, `when_enter`, `ip`) VALUES
	(1, 2, '2015-03-02 15:33:25', '::1'),
	(2, 2, '2015-03-02 15:33:25', '::1'),
	(3, 2, '2015-03-02 15:41:58', '::1'),
	(4, 2, '2015-03-02 15:41:59', '::1'),
	(5, 3, '2015-03-02 15:45:10', '::1'),
	(6, 3, '2015-03-02 15:45:10', '::1'),
	(7, 2, '2015-03-03 15:04:10', '::1'),
	(8, 2, '2015-03-03 15:04:10', '::1'),
	(9, 2, '2015-03-03 15:41:31', '::1'),
	(10, 2, '2015-03-03 15:41:32', '::1'),
	(11, 2, '2015-03-03 17:26:15', '::1'),
	(12, 2, '2015-03-03 17:26:15', '::1'),
	(13, 2, '2015-03-04 12:54:56', '::1'),
	(14, 2, '2015-03-04 12:54:56', '::1'),
	(15, 2, '2015-03-05 14:12:11', '::1'),
	(16, 2, '2015-03-05 14:12:12', '::1'),
	(17, 2, '2015-03-06 13:21:13', '::1'),
	(18, 2, '2015-03-06 13:21:13', '::1'),
	(19, 2, '2015-03-06 13:33:29', '::1'),
	(20, 2, '2015-03-06 13:33:30', '::1'),
	(21, 2, '2015-03-07 01:19:06', '::1'),
	(22, 2, '2015-03-07 01:19:07', '::1'),
	(23, 2, '2015-03-07 10:31:26', '::1'),
	(24, 2, '2015-03-07 10:31:27', '::1'),
	(25, 2, '2015-03-10 14:40:09', '::1'),
	(26, 2, '2015-03-10 14:40:09', '::1'),
	(27, 2, '2015-03-12 17:10:57', '::1'),
	(28, 2, '2015-03-12 17:10:57', '::1'),
	(29, 2, '2015-03-12 18:59:14', '::1'),
	(30, 2, '2015-03-12 18:59:14', '::1'),
	(31, 2, '2015-03-13 13:24:19', '::1'),
	(32, 2, '2015-03-13 13:24:21', '::1'),
	(33, 2, '2015-03-13 16:25:37', '::1'),
	(34, 2, '2015-03-13 16:25:37', '::1'),
	(35, 2, '2015-03-19 15:45:40', '::1'),
	(36, 2, '2015-03-19 15:45:41', '::1'),
	(37, 2, '2015-03-20 15:14:18', '::1'),
	(38, 2, '2015-03-20 15:14:18', '::1'),
	(39, 2, '2015-03-23 14:29:03', '::1'),
	(40, 2, '2015-03-23 14:29:04', '::1'),
	(41, 2, '2015-03-24 19:48:01', '::1'),
	(42, 2, '2015-03-24 19:48:01', '::1'),
	(43, 2, '2015-03-26 16:11:11', '::1'),
	(44, 2, '2015-03-26 16:11:12', '::1'),
	(45, 2, '2015-04-02 16:57:52', '::1'),
	(46, 2, '2015-04-02 16:57:52', '::1');
/*!40000 ALTER TABLE `aa_authorizations` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_errors
DROP TABLE IF EXISTS `aa_errors`;
CREATE TABLE IF NOT EXISTS `aa_errors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `error_type` enum('exception','warning') DEFAULT NULL,
  `info` text,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authorization_id` (`authorization_id`),
  CONSTRAINT `aa_errors_ibfk_1` FOREIGN KEY (`authorization_id`) REFERENCES `aa_authorizations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.aa_errors: ~0 rows (approximately)
/*!40000 ALTER TABLE `aa_errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `aa_errors` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_interfaces
DROP TABLE IF EXISTS `aa_interfaces`;
CREATE TABLE IF NOT EXISTS `aa_interfaces` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` tinyint(3) unsigned DEFAULT NULL,
  `alias` varchar(60) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `title` varchar(80) NOT NULL,
  `info` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `aa_interfaces_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `aa_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_interfaces: ~0 rows (approximately)
/*!40000 ALTER TABLE `aa_interfaces` DISABLE KEYS */;
/*!40000 ALTER TABLE `aa_interfaces` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_logs
DROP TABLE IF EXISTS `aa_logs`;
CREATE TABLE IF NOT EXISTS `aa_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `interface_id` smallint(5) unsigned DEFAULT NULL,
  `authorization_id` int(10) unsigned DEFAULT NULL,
  `when_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `interface_id` (`interface_id`),
  KEY `authorization_id` (`authorization_id`),
  CONSTRAINT `aa_logs_ibfk_1` FOREIGN KEY (`interface_id`) REFERENCES `aa_interfaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aa_logs_ibfk_2` FOREIGN KEY (`authorization_id`) REFERENCES `aa_authorizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `aa_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `aa_logs` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_sections
DROP TABLE IF EXISTS `aa_sections`;
CREATE TABLE IF NOT EXISTS `aa_sections` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_sections: ~0 rows (approximately)
/*!40000 ALTER TABLE `aa_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `aa_sections` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aa_users
DROP TABLE IF EXISTS `aa_users`;
CREATE TABLE IF NOT EXISTS `aa_users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level` enum('root','admin','user') NOT NULL DEFAULT 'user',
  `login` varchar(21) NOT NULL,
  `password` varchar(32) NOT NULL,
  `interface_level` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(40) NOT NULL,
  `surname` varchar(21) NOT NULL,
  `firstname` varchar(21) NOT NULL,
  `middlename` varchar(21) DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info` tinytext,
  `salt` varchar(8) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table int_ita_db.aa_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `aa_users` DISABLE KEYS */;
INSERT INTO `aa_users` (`id`, `level`, `login`, `password`, `interface_level`, `email`, `surname`, `firstname`, `middlename`, `regdate`, `info`, `salt`, `disabled`) VALUES
	(2, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', 1, 'root', 'root', 'root', 'root', '2015-03-02 15:33:13', NULL, NULL, 0),
	(3, 'user', 'User', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'user', 'Surname', 'Name', 'Middle name', '2015-03-02 15:43:00', NULL, NULL, 0);
/*!40000 ALTER TABLE `aa_users` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.aboutus
DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE IF NOT EXISTS `aboutus` (
  `blockID` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('EN','UA','RU') NOT NULL,
  `line2Image` varchar(255) NOT NULL,
  `iconImage` varchar(255) NOT NULL,
  `titleText` varchar(50) NOT NULL,
  `textAbout` varchar(255) NOT NULL,
  `linkAddress` varchar(255) NOT NULL,
  `imagesPath` varchar(255) NOT NULL,
  `drop1Text` text NOT NULL,
  `drop2Text` text NOT NULL,
  `drop3Text` text NOT NULL,
  `dropName` varchar(50) NOT NULL,
  `textLarge` text NOT NULL,
  PRIMARY KEY (`blockID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.aboutus: ~6 rows (approximately)
/*!40000 ALTER TABLE `aboutus` DISABLE KEYS */;
INSERT INTO `aboutus` (`blockID`, `language`, `line2Image`, `iconImage`, `titleText`, `textAbout`, `linkAddress`, `imagesPath`, `drop1Text`, `drop2Text`, `drop3Text`, `dropName`, `textLarge`) VALUES
	(1, 'UA', '/css/images/line2.png', 'image1.png', 'Про що мрієш ти?', '<p>Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль? Закордонні подорожі, можливо, до екзотичних країн?</p>', '/index.php?r=site/aboutdetail&id=1', '/css/images/', '', '', '', '', '<p>Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль? Закордонні подорожі, можливо, до екзотичних країн? Забезпечене життя для себе та близьких, коли не доводиться думати про гроші?\nА, може, це свобода жити своїм життям? Самостійно керувати власним часом з можливістю працювати за зручним графіком без необхідності щодня їздити на роботу, але при цьому мати стабільно високий дохід?\n	Можливо ти хочеш заробляти, займаючись улюбленою справою і отримувати задоволення від сучасної професії?\nПро що б ти не мріяв, для здійснення більшості мрій потрібні гроші. Сьогодні середня зарплата в Україні є найнижчою в Європі: близько 3,5 тис грн у місяць. Навіть якщо брати сферу бізнесу, зарплати більшості робітників не перевищують 5-8 тис грн. \nЯк щодо 40 - 60 тис грн в місяць з можливістю працювати за гнучким графіком та дистанційно? Ти думаєш, що в нашій країні такі умови лише у керівників та власників бізнесу? У нас хороша новина: вже через рік-два-три так зможеш заробляти і ти.</p>\n\n<p><span class="detailTitle2">Професія майбутнього</span>\n Сьогодні у тебе є реальна можливість поєднати хороший заробіток, гнучкий графік роботи та зручність дистанційної роботи. І це не “заработок в интернете”, про який кричить банерна реклама на багатьох сайтах. Ми віримо у те, що високого стабільного доходу можна досягти лише за допомогою власних зусиль.\nМи живемо в епоху, коли головним двигуном розвитку світової економіки є інформаційні технології (ІТ). Вони дозволяють досягти нових проривних результатів у традиційних галузях: виробництві та послугах. Саме інформаційні технології повністю змінили і продовжують трансформувати індустрії звязку, розваг (книги, музика, фільми), банківських послуг, а також такі традиційні бізнеси, як послуги таксі (Uber), готелів (Airbnb), навчання (Coursera). \nГерої інформаційної епохи - це спеціалісти з інформаційних технологій. Вони знаходяться на передовій змін, вони придумали та продовжують розвивати Windows, iOS, Android, а також мільйони додатків до них, вони створюють соціальні мережі, сайти та бази даних. \nГарна новина для тебе: сьогодні таких спеціалістів не вистачає. Інформаційні технології розвиваються дуже швидко і стають потрібними усюди, тому людей не вистачає, існуючі навчальні заклади просто не встигають готувати потрібну кількість. Нестача спеціалістів означає, що зарплати на ринку стабільно зростають, і сягнули небачених для України значень: в середньому спеціалісти з інформаційних технологій сьогодні отримують 3-5 тис доларів у місяць, і при цьому роботодавці активно полюють на професіоналів. Секрет таких високих зарплат не лише у дефіциті кадрів, а й у тому, що для ІТ-галузі кордони - не проблема. Ти можеш працювати вдома зі своєї квартири в Україні над замовленням клієнта зі США чи Німеччини і отримувати винагороду у доларах чи євро з рівнем оплати, не набагато нижчим від американських чи європейських стандартів.  \nМи запрошуємо тебе приєднатися до світової інформаційної еліти та за короткий час стати професіоналом у сфері інформаційних технологій, щоб отримувати стабільно високий дохід та працювати в зручних умовах за гнучким графіком. </p>\n\n<p><span class="detailTitle2">Що очікується від тебе</span><br/>\nПрограмування - це не так складно, як ти можеш уявляти. Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля. Ризикнемо сказати, що крім часу та зусиль (та, зрозуміло, наявності простенького компютера) не потрібно більше ні-чо-го. Не потрібно бути сильним у математиці: навіть якщо у школі ти не любив математику, а твої оцінки не піднимались вище середнього рівня, ти зможеш стати чудовим програмістом. Не потрібно знати, як влаштований компютер чи бути досвіченим користувачем будь-яких програм. Достатньо часу на навчання та бажання займатися. Гарні знання з математики, логіки, комп’ютера можуть пришвидшити темп навчання, але й без них кожен зможе досягти високого рівня професіоналізму у програмуванні завдяки іноваційному підходу до навчання Академії Програмування ІНТІТА.</p>'),
	(2, 'UA', '/css/images/line2.png', 'image2.png', 'Навчання майбутнього', '<p>Програмування – це не так складно, як ти можеш уявляти. Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля.</p>', '/index.php?r=site/aboutdetail&id=2', '/css/images/', '', '', '', '', '<p>Коли мова йде про навчальний заклад, можемо побитися об заклад, що до думки тобі приходять велика будівля з десятками навчальних приміщень, лекційна аудиторія, парти, записники, конспекти, викладачі, лекції, семінари. Така система освіти сформувалася ще у Стародавній Греції, і за кілька тисяч років майже не змінилася. Але зараз світ стоїть на порозі великої революції в освіті, яка назавжди змінить те, як ми навчаємося. Сьогодні технології зробили доступним те, що раніше могли дозволити собі лише одиниці, наймаючи персональних вчителів та репетиторів: персоналізоване навчання.\n<span class="detailTitle2">“Три кити” Академії ІНТІТА </span></p>\n\n<p><span class="detailTitle3">Кит перший. Гнучкість та зручність. </span></p>\n\n<p>Ти можеш самостійно будувати графік навчання, виходячи з власних потреб та цілей. Якщо ти хочеш закінчити навчання та почати працювати вже через рік, обирай інтенсивне навчання та займайся 6-8 годин в день. Якщо ти хочеш освоїти програмування поступово, не жертвуючи іншими важливими для тебе речами, ти можеш займатися ті ж 6-8 годин, але у тиждень. \nНе потрібно відвідувати навчальний заклад, Академія з тобою всюди. Навіть якщо ти у місці, де немає звязку та інтернету, ти можеш переглядати лекції в офлайн-режимі, а практичну частину зробити пізніше, коли зявиться доступ.  \n<span class="detailTitle3">Кит другий. Орієнтація на ринок. </span></p>\n\n<p>Ми даємо тобі лише 100% необхідні знання. Ми поважаємо гуманітарні дисципліни та фундаментальні точні науки, які входять до  складу обовязкових для вивчення у вишах, але переконані, що вони не є обовязковими для того, щоб стати професіоналом у сфері інформаційних технологій. Ми вважаємо, що кожен має вирішувати індивідуально, що вивчати та чим цікавитись за межами своєї професії. У той же час у програмах вишів відсутні критичні для професійного успіху дисципліни, або ж вони викладаються недостатньо професійно (англійська мова для ІТ-спеціалістів, проектний менеджмент тощо). Інформаційні технології - це дисципліна, яка змінюється кожного дня, програми вишів просто не встигають адаптуватися до такої швидкості змін. ІНТІТА слідкує за змінами щодня, і адаптує як навчальну програму, так і зміст окремих предметів за необхідностю миттєво. Ми завжди у пошуку нового матеріалу, який можна передати студентам академії.  \nПорівнюючи звичайний технічний виш та академію ІНТІТА, ти можеш думати про сімейний універсал та болід Формула-1. Перший підходить для широкого кола завдань, але він значно програє позашляховикам у прохідності, міні-венам у місткості, лімузинам - у комфорті, спротивним автомобілям - у швидкості та керуванні. Другий сконструйовано лише заради максимальної швидкості та маневреності, жертвуючи усім іншим. І в результаті ми не зробимо з тебе універсально освічену людину, яка розбирається потрохи у всьому, ми зробимо тебе професіоналом світового класу в області програмування.  \n <span class="detailTitle3">Кит третій. Результативність. </span></p>\n\n<p>На відміну від традиційних закладів, ми не навчаємо задля оцінок. Ми працюємо індивідуально з кожним студентом, щоб досягти 100% засвоєння необхідних знань (а ми даємо лише необхідні знання). Ми не обмежуємо тебе у часі, теоретично ти можеш навчатися як завгодно довго. Ми беремо на себе зобовязання навчити тебе програмуванню, незважаючи на те, які знання у тебе вже є. Єдиними передумовами для початку занять є бажання, час на навчання, наявність хоча б простенького компютера та вміння читати та писати. \nЗнання, які ти отримаєш, максимально практичні та сучасні. Починаючи з першого заняття, ти робитимеш завдання з реального світу програмування. Ближче до закінчення навчання ти будеш приймати участь у створенні реальних програмних продуктів для ринку.\nМи гарантуємо тобі 100% отримання пропозиції про працевлаштування протягом 4-6-ти місяців після успішного закінчення навчання.\n <span class="detailTitle2">ІНТІТА: переваги наочно</span>\n \n <table id="detailTable">\n<tr><td><span class="detailTitle2">Традиційне навчання</span></td><td><span class="detailTitle2">ІНТІТА</span></td><td><span class="detailTitle2">Переваги</span></td></tr>\n <tr><td>Необхідність відвідувати заняття у класі</td><td>Навчання у себе вдома</td><td>Комфортна домашня атмосфера, економія часу та коштів на поїздки</td></tr>\n <tr><td>Заняття за фіксованим графіком</td><td>Заняття за індивідуальним графіком</td><td>Можливість підлаштувати графік навчання під власні потреби</td></tr>\n<tr><td>Жорстко визначена навчальна програма, привязана до часових рамок (академічний рік)</td><td>Можливість обирати предмети та термін навчання </td><td>Навчання в комфортному темпі за власним графіком, не обмежене часом</td></tr>\n<tr><td>Лекції та семінари, як основа навчального процесу (вивчення теорії)</td><td>Практичні заняття з першого дня навчання, створення реальних працюючих проектів</td><td>Отримання реального робочого досвіду вже протягом навчання, портфоліо готових робіт на момент закінчення навчання</td></tr>\n<tr><td>Оцінки за якість засвоєних знань за певний час </td><td>Оцінок немає, лише “знання засвоєні” чи “потрібно навчатися далі”</td><td>Навчання до позитивного результату: до повного засвоєння необхідних знань</td></tr>\n<tr><td>Диплом про вищу освіту видається через 5-6 років за умови засвоєння великої кількості непрофільних знань (мова, історія, філософія тощо)</td><td>Лише практичні знання, які будуть потрібні тобі у роботі та житті: програмування, англійська мова, побудова карєри на ринку інформаційних технологій, основи життєвого успіху.</td><td>Весь час навчання витрачається на отримання корисних практичних знань, тому термін навчання скорочуються, а кількість практичних засвоєних знань більша, ніж у традиційних закладах.</td></tr>\n </table> \'</p>'),
	(3, 'UA', '/css/images/line2.png', 'image3.png', 'Питання та відгуки', '<p>Три кити Академії Програмування ІНТІТА Самостійний графік навчання. Лише 100% необхідні знання. Засвоєння 100% знань!</p>', '/index.php?r=site/aboutdetail&id=3', '/css/images/', '', '', '', '', '<p><span class="detailTitle3">Скільки триває навчання, як швидко я зможу почати заробляти?\n</span><ul><li class="listAbout">навчання не має фіксованого терміну і залежить виключно від темпу, який обереш ти.\n</li></ul>\n<span class="detailTitle3">Чи отримаю я державний диплом про освіту?\n</span><ul><li class="listAbout">ми не видаємо дипломів державного зразка, наша ціль - забезпечити передумови для гарантованого працевлаштування слухачів.\n</li></ul>\n<span class="detailTitle3">Чому навчання коштує так дешево (дорого) у порівнянні з вишем (курсами) Х?\n</span><ul><li class="listAbout">вартість навчання економічно обгрунтована і буде відроблена менше, ніж за рік роботи на позиції програміста-початківця.\n</li></ul>\n<span class="detailTitle3">У мене зараз немає необхідних коштів, чи можу я навчатися у кредит?\n</span><ul><li class="listAbout">так, ми пропонуємо гнучкий підхід в оплаті за навчання, детальніше можна вияснити написавши нам листа на електронну пошту. Контакти.\n</li></ul>\n<span class="detailTitle3">Я чув від знайомого, що він освоїв програмування самотужки, це можливо?\n</span><ul><li class="listAbout">так, на ринку багато “програмістів-самоучок”, але вони, як правило, пройшли довгий шлях для того, щоб навчитись програмуванню, ми - один із ефективних варіантів стати кваліфікованим програмістом за короткий час.\n</li></ul>\n<span class="detailTitle3">У мене у школі було погано з математикою / я давно не займався математикою. Це може завадити мені навчитися програмуванню?\n</span><ul><li class="listAbout">математика допомагає краще розвинути логічне мислення і знання елементарної математики необхідні обов’язково, проте, не математичне, а логічне мислення визначає наскільки гарний програміст і тільки невеликий відсоток гарних математиків стають професійними програмістами.\n</li></ul>\n<span class="detailTitle3">Мені 34 роки, чи можу я зараз розпочати навчання?\n</span><ul><li class="listAbout">верхньої вікової межі для того, щоб вивчати програмування - немає, люди і старшого віку розпочинали і досягали гарних результатів. Життєвий досвід людям старшого віку дозволяє ефективніше побудувати навчальний процес і швидше кар’єрно зростати.\n</li></ul>\n<span class="detailTitle3">Я чув думку, що професія програміста технічна, а я - людина творча. Чи підійде програмування мені?\n</span><ul><li class="listAbout">програмування - це і є творчість, варто спробувати, щоб зрозуміти чи це твоє покликання.\n</li></ul>\'</p>'),
	(4, 'RU', '/css/images/line2.png', 'image1.png', 'О чём ты мечтаешь?', '<p>Попробуем угадать: собственная квартира или даже дом? Красивая машина? Заграничные путешествия в экзотические страны?</p>', '/index.php?r=site/aboutdetail&id=1', '/css/images/', '', '', '', '', ''),
	(5, 'RU', '/css/images/line2.png', 'image2.png', 'Обучение будущего', '<p>Программирование - это не так сложно, как ты думаешь. Безусловно, чтобы стать хорошим программистом, нужны время и усилия.</p>', '/index.php?r=site/aboutdetail&id=2', '/css/images/', '', '', '', '', ''),
	(6, 'RU', '/css/images/line2.png', 'image3.png', 'Вопросы и отзывы', '<p>Три кита Академии Программирования ИНТИТА. Самостоятельный график обучения. Только 100% необходимые знания. 100 % усвоение знаний!</p>', '/index.php?r=site/aboutdetail&id=3', '/css/images/', '', '', '', '', '');
/*!40000 ALTER TABLE `aboutus` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.carousel
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `order` int(11) NOT NULL,
  `pictureURL` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `imagesPath` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.carousel: ~4 rows (approximately)
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
INSERT INTO `carousel` (`order`, `pictureURL`, `description`, `imagesPath`, `text`) VALUES
	(1, '1.jpg', '<p>Слайдер фото 1</p>', '/css/images/slider_img/', 'Не упусти свій шанс змінити світ - отримай якісну та сучасну освіту і стань класним спеціалістом!'),
	(2, '2.jpg', '<p>Слайдер фото 2</p>', '/css/images/slider_img/', 'Хочеш стати висококласним спеціалістом, приймай вірне рішення - вступай до ІТ Академії ІНТІТА!'),
	(3, '3.jpg', '<p>Слайдер фото 3</p>', '/css/images/slider_img/', 'Один рік наполегливого і цікавого навчання - і ти станеш професійним програмістом. Навчатись важко - зате роботу знайти легко!'),
	(4, '4.jpg', '<p>Слайдер фото 4</p>', '/css/images/slider_img/', 'Не втрачай свій шанс на гідну та цікаву працю – програмуй своє майбутнє вже сьогодні!');
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.course
DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(10) NOT NULL,
  `language` varchar(6) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_duration_hours` int(11) NOT NULL,
  `modules_count` int(255) DEFAULT NULL,
  `course_price` decimal(10,0) DEFAULT NULL,
  `for_whom` text,
  `what_you_learn` text,
  `what_you_get` text,
  `course_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_ID`),
  UNIQUE KEY `course_name` (`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.course: ~9 rows (approximately)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`course_ID`, `alias`, `language`, `course_name`, `course_duration_hours`, `modules_count`, `course_price`, `for_whom`, `what_you_learn`, `what_you_get`, `course_img`) VALUES
	(1, 'course1', 'ua', 'Програмування для чайників', 89, 7, 6548, 'хто відповідає за постановку завдань на розробку;для дизайнерів, які готові почати не просто малювати красиві картинки, а й навчитися тому, як створювати працюючі і зручні інтерфейси;для розробників, які хочуть самостійно створити або змінити свій проект;', 'Ви навчитеся писати чистий код;Користуватися системами контролю версій;Дізнаєтеся, з чого складається сучасний додаток;Для чого потрібен безперервна інтеграція (СІ) сервер;Чому потрібно тестувати свої програми і як це робити;', 'Відеозаписи та текстові матеріали всіх онлайн-занять;Спілкування з розумними одногрупниками;Сертифікат про закінчення навчання;Прилаштованість на робоче місце в силіконовій долині;', '/css/images/course1Image.png'),
	(2, 'course2', 'ua', 'Course 2. Programming', 120, 0, 0, '', '', '', NULL),
	(3, 'course3', 'ua', 'Course 3. Math', 30, 0, 0, '', '', '', NULL),
	(4, 'course4', 'ua', 'Course 4. Discrete math', 40, 0, 0, '', '', '', NULL),
	(5, 'course5', 'ua', 'Course 5', 36, 0, 0, '', '', '', NULL),
	(6, 'course6', 'ua', 'Course 6', 130, 0, 0, '', '', '', NULL),
	(7, 'course7', 'ua', 'Course 7', 64, 0, 0, '', '', '', NULL),
	(8, 'course8', 'ua', 'Course 8', 54, 0, 0, '', '', '', NULL),
	(9, 'course9', 'ua', 'Course 9', 90, 0, 0, '', '', '', NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.courseresource
DROP TABLE IF EXISTS `courseresource`;
CREATE TABLE IF NOT EXISTS `courseresource` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idCourse` int(10) NOT NULL,
  `idResource` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_courseresource_resource` (`idResource`),
  CONSTRAINT `FK_courseresource_resource` FOREIGN KEY (`idResource`) REFERENCES `resource` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.courseresource: ~0 rows (approximately)
/*!40000 ALTER TABLE `courseresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `courseresource` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.footer
DROP TABLE IF EXISTS `footer`;
CREATE TABLE IF NOT EXISTS `footer` (
  `footerID` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('EN','UA','RU') NOT NULL DEFAULT 'UA',
  `imageSotial` varchar(255) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `imageUp` varchar(255) NOT NULL,
  PRIMARY KEY (`footerID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.footer: ~3 rows (approximately)
/*!40000 ALTER TABLE `footer` DISABLE KEYS */;
INSERT INTO `footer` (`footerID`, `language`, `imageSotial`, `phone`, `mobile`, `email`, `imageUp`) VALUES
	(1, 'RU', '/css/images/sotial.gif', 'телефон: +38 0432 52 82 67 ', 'тел. моб. +38 067 432 20 10', 'e-mail: intita.hr@gmail.com', '/css/images/go_up.png'),
	(2, 'EN', '/css/images/sotial.gif', 'tel.: +38 0432 52 82 67', 'mobile +38 067 432 20 10', 'e-mail: intita.hr@gmail.com', '/css/images/go_up.png'),
	(3, 'UA', '/css/images/sotial.gif', 'телефон: +38 0432 52 82 67', 'тел. моб. +38 067 432 20 10', 'e-mail: intita.hr@gmail.com', '/css/images/go_up.png');
/*!40000 ALTER TABLE `footer` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.header
DROP TABLE IF EXISTS `header`;
CREATE TABLE IF NOT EXISTS `header` (
  `headerID` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('EN','UA','RU') NOT NULL,
  `logoURL` varchar(255) NOT NULL,
  `smallLogoURL` varchar(255) NOT NULL,
  `menuItem1` varchar(30) NOT NULL,
  `item1Link` varchar(255) NOT NULL,
  `menuItem2` varchar(30) NOT NULL,
  `item2Link` varchar(255) NOT NULL,
  `menuItem3` varchar(30) NOT NULL,
  `item3Link` varchar(255) NOT NULL,
  `menuItem4` varchar(30) NOT NULL,
  `item4Link` varchar(255) NOT NULL,
  `enterButtonText` varchar(30) NOT NULL,
  `logoutButtonText` varchar(30) NOT NULL,
  PRIMARY KEY (`headerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.header: ~3 rows (approximately)
/*!40000 ALTER TABLE `header` DISABLE KEYS */;
INSERT INTO `header` (`headerID`, `language`, `logoURL`, `smallLogoURL`, `menuItem1`, `item1Link`, `menuItem2`, `item2Link`, `menuItem3`, `item3Link`, `menuItem4`, `item4Link`, `enterButtonText`, `logoutButtonText`) VALUES
	(0, 'UA', '/css/images/Logo_big.png', '/css/images/Logo_small.png', 'Курси', '/courses', 'Викладачі', '/teachers', 'Форум', 'http://www.google.com', 'Про нас', '/site/aboutdetail', 'Вхід', 'Вхід'),
	(1, 'RU', '/css/images/Logo_big.png', '/css/images/Logo_small.png', 'Курсы', '/courses', 'Преподаватели', '/teachers', 'Форум', 'http://www.google.com', 'О нас', '/site/aboutdetail', 'Вход', 'Выход'),
	(2, 'UA', '/css/images/Logo_big.png', '/css/images/Logo_small.png', 'Курси', '/courses', 'Викладачі', '/teachers', 'Форум', 'http://www.google.com', 'Про нас', '/site/aboutdetail', 'Вхід', 'Вхід');
/*!40000 ALTER TABLE `header` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.hometasks
DROP TABLE IF EXISTS `hometasks`;
CREATE TABLE IF NOT EXISTS `hometasks` (
  `hometask_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `hometask_name` varchar(45) NOT NULL,
  `hometask_description` varchar(45) NOT NULL,
  `hometask_url` varchar(255) NOT NULL,
  PRIMARY KEY (`hometask_ID`),
  UNIQUE KEY `fkmodule_ID` (`fkmodule_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.hometasks: ~2 rows (approximately)
/*!40000 ALTER TABLE `hometasks` DISABLE KEYS */;
INSERT INTO `hometasks` (`hometask_ID`, `fkmodule_ID`, `fklecture_ID`, `hometask_name`, `hometask_description`, `hometask_url`) VALUES
	(1, 23, 34, 'Hometask 1', 'Description 1', 'URL 1'),
	(2, 2, 2, 'Hometask 2', 'Descipion 2', 'URL 2');
/*!40000 ALTER TABLE `hometasks` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.language
DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `language` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.language: ~3 rows (approximately)
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `code`, `language`, `country`) VALUES
	(1, 'RU', 'русский', 'Россия'),
	(2, 'EN', 'english', 'Great Britain'),
	(3, 'UA', 'українська', 'Україна');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.lectureresource
DROP TABLE IF EXISTS `lectureresource`;
CREATE TABLE IF NOT EXISTS `lectureresource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idLecture` int(11) NOT NULL,
  `idResource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_lectureResource_resource` (`idResource`),
  CONSTRAINT `FK_lectureResource_resource` FOREIGN KEY (`idResource`) REFERENCES `resource` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.lectureresource: ~0 rows (approximately)
/*!40000 ALTER TABLE `lectureresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `lectureresource` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.lectures
DROP TABLE IF EXISTS `lectures`;
CREATE TABLE IF NOT EXISTS `lectures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `language` varchar(6) NOT NULL,
  `idModule` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `idType` int(11) NOT NULL,
  `durationInMinutes` int(11) NOT NULL,
  `maxNumber` int(11) NOT NULL,
  `iconIsDone` varchar(255) NOT NULL,
  `preLecture` int(11) NOT NULL,
  `nextLecture` int(11) NOT NULL,
  `idTeacher` varchar(50) NOT NULL,
  `lectureUnwatchedImage` varchar(255) NOT NULL,
  `lectureOverlookedImage` varchar(255) NOT NULL,
  `lectureTimeImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.lectures: ~3 rows (approximately)
/*!40000 ALTER TABLE `lectures` DISABLE KEYS */;
INSERT INTO `lectures` (`id`, `image`, `alias`, `language`, `idModule`, `order`, `title`, `idType`, `durationInMinutes`, `maxNumber`, `iconIsDone`, `preLecture`, `nextLecture`, `idTeacher`, `lectureUnwatchedImage`, `lectureOverlookedImage`, `lectureTimeImage`) VALUES
	(1, '/css/images/lectureImage.png', 'lecture3', 'UA', 1, 3, 'Змінні та типи даних в PHP', 1, 40, 6, '/css/images/medalIcoFalse.png', 2, 4, '2', 'css/images/ratIco0.png', 'css/images/ratIco1.png', 'css/images/timeIco.png'),
	(2, '/css/images/lectureImage.png', 'lecture2', 'UA', 1, 2, 'Змінні та типи даних в PHP', 1, 50, 6, '/css/images/medalIcoFalse.png', 1, 3, '2', 'css/images/ratIco0.png', 'css/images/ratIco1.png', 'css/images/timeIco.png'),
	(3, '/css/images/lectureImage.png', 'lecture4', 'UA', 1, 4, 'Змінні та типи даних в PHP', 1, 60, 6, '/css/images/medalIcoFalse.png', 3, 5, '3', 'css/images/ratIco0.png', 'css/images/ratIco1.png', 'css/images/timeIco.png');
/*!40000 ALTER TABLE `lectures` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.lecturetype
DROP TABLE IF EXISTS `lecturetype`;
CREATE TABLE IF NOT EXISTS `lecturetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `text` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.lecturetype: ~2 rows (approximately)
/*!40000 ALTER TABLE `lecturetype` DISABLE KEYS */;
INSERT INTO `lecturetype` (`id`, `image`, `text`, `description`) VALUES
	(1, '/css/images/lectureType.png', 'лекція', ''),
	(2, '/css/images/lectureType.png', 'практична робота', '');
/*!40000 ALTER TABLE `lecturetype` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.mainpage
DROP TABLE IF EXISTS `mainpage`;
CREATE TABLE IF NOT EXISTS `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.mainpage: ~0 rows (approximately)
/*!40000 ALTER TABLE `mainpage` DISABLE KEYS */;
INSERT INTO `mainpage` (`id`, `language`, `title`, `sliderHeader`, `sliderText`, `category`, `message`, `sliderTextureURL`, `sliderLineURL`, `sliderButtonText`, `header1`, `subLineImage`, `subheader1`, `arrayBlocks`, `header2`, `subheader2`, `arraySteps`, `stepSize`, `linkName`, `hexagon`, `formHeader1`, `formHeader2`, `regText`, `buttonStart`, `socialText`, `imageNetwork`, `formFon`) VALUES
	(0, 'ua', 'INTITA', 'ПРОГРАМУЙ  МАЙБУТНЄ', 'Не упусти свій шанс змінити світ - отримай якісну та сучасну освіту і стань класним спеціалістом!', 'mainpage', 'PROGRAM FUTURE', '/css/images/slider_img/texture.png', '/css/images/slider_img/line.png', 'ПОЧАТИ', 'Про нас', '/css/images/line1.png', 'дещо, що Вам потрібно знати про наші курси', '1', 'Як проводиться навчання?', 'далі пояснення як ви будете вчитися крок за кроком', '1', '958px', 'детальніше ...', '/css/images/hexagon.png', 'Готові розпочати?', 'Введіть дані в форму нижче', 'розширена реєстрація', 'ПОЧАТИ', 'Ви можете також зареєструватися через соцмережі:', '/css/images/networking.png', '/css/images/formFon.png');
/*!40000 ALTER TABLE `mainpage` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.mainpagetranslated  鄰׉Ұ  latin1_german2_ci  鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  koi8r_general_ci s* 鄰׉Ұ  latin1_german1_ci ' 鄰׉Ұ  latin1_swedish_ci ' 鄰׉Ұ  latin1_danish_ci   鄰׉Ұ  latin1_general_ci  鄰׉Ұ  latin1_general_cs  鄰׉Ұ  latin1_spanish_ci  鄰׉Ұ  latin2_general_ci  鄰׉Ұ  cp850_general_ci A  鄰׉Ұ  latin1_swedish_ci   鄰׉Ұ  latin1_danish_ci    鄰׉Ұ  latin1_german2_ci   鄰׉Ұ  latin1_general_ci   鄰׉Ұ  latin1_general_cs   鄰׉Ұ  latin1_spanish_ci   鄰׉Ұ  latin2_general_ci   鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  latin2_croatian_ci  鄰׉Ұ  ascii_general_ci    鄰׉Ұ  ujis_japanese_ci    鄰׉Ұ  sjis_japanese_ci    鄰׉Ұ  hebrew_general_ci   鄰׉Ұ  koi8u_general_ci    鄰׉Ұ  gb2312_chinese_ci   鄰׉Ұ  greek_general_ci    鄰׉Ұ  cp1250_general_ci   鄰׉Ұ  cp1250_croatian_ci  鄰׉Ұ  cp1250_polish_ci    鄰׉Ұ  latin5_turkish_ci   鄰׉Ұ  armscii8_general_ci 鄰׉Ұ  utf8_icelandic_ci   鄰׉Ұ  utf8_romanian_ci    鄰׉Ұ  utf8_slovenian_ci   鄰׉Ұ  utf8_estonian_ci    鄰׉Ұ  utf8_lithuanian_ci  鄰׉Ұ  utf8_spanish2_ci    鄰׉Ұ  utf8_esperanto_ci   鄰׉Ұ  utf8_hungarian_ci   鄰׉Ұ  utf8_croatian_ci    鄰׉Ұ  utf8_unicode_520_ci 鄰׉Ұ  utf8_vietnamese_ci  鄰׉Ұ  ucs2_icelandic_ci   鄰׉Ұ  ucs2_romanian_ci    鄰׉Ұ  ucs2_slovenian_ci   鄰׉Ұ  ucs2_estonian_ci    鄰׉Ұ  ucs2_lithuanian_ci  鄰׉Ұ  ucs2_spanish2_ci    鄰׉Ұ  ucs2_esperanto_ci   鄰׉Ұ  ucs2_hungarian_ci   鄰׉Ұ  ucs2_croatian_ci    鄰׉Ұ  ucs2_unicode_520_ci 鄰׉Ұ  ucs2_vietnamese_ci  鄰׉Ұ  cp866_general_ci    鄰׉Ұ  keybcs2_general_ci                        ﴰ Ｖ 횸횸뤀׊   횸  蹠׊Ұ б CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8       蹠׊CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8             蹠׊Ұ б CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8        Ұ  Ͼ   `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 oDB DEFAULT CHARSET=utf8 noDB DEFAULT CHARSET=utf8       ꠁ׊Ұ  Ϝ   `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8                                 낁׊﷩  ϥ ⰰ✠慵Ⱗ✠义䥔䅔Ⱗ✠鿐ꃐ黐鏐ꃐ郐鳐ꏐ駐†鳐郐駐釐ꏐꋐ鷐蓐Ⱗ✠鷐뗐턠킃톿톃톁킂₸臑닐雑말턠킈킰톽₁럐볐雑뷐룐苑룐턠킁톲톖₂‭뻐苑胑룐볐냐말턠킏톺톖킁톽₃苑냐턠톁톃킇톰킁톽₃뻐臑닐雑苑菑턠ₖ臑苑냐뷐賑퀠킺킻톰킁킽킸₼臑뿐뗐蛑雑냐믐雑臑苑뻐볐✡‬洧楡灮条❥‬倧佒則䵁䘠呕剕❅‬⼧獣⽳浩条獥猯楬敤彲浩⽧整瑸牵⹥湰❧‬⼧獣⽳浩条獥猯楬敤彲浩⽧楬敮瀮杮Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鿐胑뻐퀠킽톰➁‬⼧獣⽳浩条獥氯湩ㅥ瀮杮Ⱗ✠듐뗐觑뻐‬觑뻐퀠킒킰₼뿐뻐苑胑雑뇐뷐뻐퀠킷킽톰킂₸뿐胑뻐퀠킽톰톈ₖ뫐菑胑臑룐Ⱗ✠✱‬퀧킯₺뿐胑뻐닐뻐듐룐苑賑臑近퀠킽킰톲킇킰킽톽㾏Ⱗ✠듐냐믐雑퀠킿톾톏킁킽킵킽톽₏近뫐퀠킲₸뇐菑듐뗐苑뗐퀠톲킇톸킂톸톁₏뫐胑뻐뫐퀠킷₰뫐胑뻐뫐뻐볐Ⱗ✠✱‬㤧㠵硰Ⱗ✠듐뗐苑냐믐賑뷐雑裑뗐⸠⸮Ⱗ✠振獳椯慭敧⽳敨慸潧⹮湰❧‬퀧킓톾킂킾톲ₖ胑뻐럐뿐뻐蟑냐苑룐✿‬퀧킒킲킵톴톖톂₌듐냐뷐雑퀠₲蓑뻐胑볐菑퀠킽킸톶킇➵‬턧킀킾톷킈톸킀킵킽₰胑뗐铑臑苑胑냐蛑雑近Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鋐룐퀠킼킾킶통킂₵苑냐뫐뻐뛐퀠킷톰킀통톔톁톂톀킃킲톰킂톸톁₏蟑뗐胑뗐럐턠킁톾킆킼통킀킵톶㪖Ⱗ✠振獳椯慭敧⽳敮睴牯楫杮瀮杮Ⱗ✠振獳椯慭敧⽳潦浲潆⹮湰❧)ader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 NGINE=InnoDB DEFAULT CHARS T=utf8 latedmessagesua`; 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              猶 턘鄰׉  Ȏ   턘  趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋    ₁2   ⊐Ɉ  遐׋     輘Ⱦ趐׋\bCOMMENT='((.+)[^'])'    趐׋   ₁2   ⊐Ɉ迠׋邈׋     躠Ⱦ趐׋   ₁2   ⊐Ɉ遐׋׉     踨Ⱦ趐׋詤_ ᴬ@䔐ҩ      �¤  襘_襴_覈_  趐׋Ұ  `message` = "..." n 趐׋詤_ ᴬ@愀ҩ      �¤  襘_襴_覈_  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci   趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋\bCOMMENT='((.+)[^'])' s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin2_croatian_ci  趐׋Ұ  performance_schema  趐׋Ұ  information_schema U趐׋Ұ  row_format=COMPACT ׄ趐׋Ұ  performance_schema  趐׋Ұ  latin1_german1_ci * 趐׋Ұ  row_format=COMPACT  趐׋Ұ  information_schema U趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci 8  趐׋Ұ  row_format=COMPACT  趐׋Ұ  aa_authorizations 㖠ׄ趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  row_format=COMPACT  趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  latin1_german1_ci  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci  趐׋Ұ  latin1_danish_ci   趐׋Ұ  latin1_german2_ci  趐׋Ұ  latin1_general_ci  趐׋Ұ  latin1_general_cs  趐׋Ұ  latin1_spanish_ci  趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  latin2_general_ci  趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  ascii_general_ci   趐׋Ұ  ujis_japanese_ci   趐׋Ұ  sjis_japanese_ci   趐׋Ұ  hebrew_general_ci  趐׋Ұ  koi8u_general_ci   趐׋Ұ  gb2312_chinese_ci  趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci ! 趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci  # 趐׋Ұ  latin5_turkish_ci $ 趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci & 趐׋Ұ  utf8_romanian_ci  ' 趐׋Ұ  utf8_slovenian_ci ( 趐׋Ұ  utf8_estonian_ci  ) 趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci  + 趐׋Ұ  utf8_esperanto_ci , 趐׋Ұ  utf8_hungarian_ci - 趐׋Ұ  utf8_croatian_ci  . 趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci 1 趐׋Ұ  ucs2_romanian_ci  2 趐׋Ұ  ucs2_slovenian_ci 3 趐׋Ұ  ucs2_estonian_ci  4 趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci  6 趐׋Ұ  ucs2_esperanto_ci 7 趐׋Ұ  ucs2_hungarian_ci 8 趐׋Ұ  ucs2_croatian_ci  9 趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci  < 趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci  > 趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci  @ 趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci B 趐׋Ұ  latin7_general_cs C 趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci H 趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci  M 趐׋Ұ  utf8mb4_danish_ci N 趐׋Ұ  utf8mb4_slovak_ci O 趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci  Q 趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci X 趐׋Ұ  cp1251_general_cs Y 趐׋Ұ  `message` != "..."  趐׋    ₁2   ፀɈ  膀׊      ؠҥ趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  koi8r_general_ci s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  ଲ 䵂ж   6 (      Ѐ         ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ꾃袓焣椗Ｕ焣꾃袓￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ놆蒖謦ｑ륢ﾌ튔ﾱ륢ﾌ謦ｑ검貑￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ漡률ﾊ륞ﾆ￿￿롞ﾆ뭥ﾎ渟￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ礯ｊ풛ﾵ￿￿￿￿￿￿튔ﾱ椗Ｕ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ蝅｝펏ﾰ횑ﾰ￿￿뭣ﾋ뭥ﾎ欛Ｘ鶝ﾝ붺ﾽ￬￭￭￮￯￯￯뺜ﾫ꩟ﾀ풔ﾳ￐멨ﾎ踫ｕ腓｣￿ÿꖥ￢쿍ￏ쯋ￋ쳌ￌ컎ￎ쿏ￏ탐￐틒ￒ뎗ﾡ陜ｱ赍､衇～豨ﭴ￿ÿ￿ÿꖥ￡쳋ￌ쟇ￇ죈￈쫊ￊ쯋ￋ췍ￍ컎ￎ탐￐퇑￑퓓ￔ￫ꂠ￿ÿ￿ÿꖥ�￟짇￉싂ￂ쓄ￄ업ￅ죈￈짉￉쫊ￊ쳌ￌ췍ￍ퇐￑￪ꂠ￿ÿ￿ÿꖥ�￟엃ￅ샀￀샀￀싂ￂ쏃ￃ쓄ￄ업ￅ죈￈짉￉췍ￍ￨ꂠ￿ÿ￿ÿ궭횭췇ￍ￤￤￥￥￥￦￦￧￨￨폍ￓꢨ￿ÿ￿ÿ䏥늲좲鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝꪪ�仡￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ံ 턘�  I 敩⁲敎ᅷ畇瑴௰׌Ұ  ucs2_slovenian_ci 浵敢௰׌Ұ  ucs2_estonian_ci ؁匐湹௰׌Ұ  ucs2_lithuanian_ci 攏௰׌Ұ  ucs2_spanish2_ci 敋灥慃௰׌Ұ  ucs2_esperanto_ci 呯扡௰׌Ұ  ucs2_hungarian_ci 湯ਆ௰׌Ұ  ucs2_croatian_ci 䰄晥ɴ௰׌Ұ  ucs2_unicode_520_ci ௰׌Ұ  ucs2_vietnamese_ci 瑸௰׌Ұ  cp866_general_ci 倉灯灵௰׌Ұ  keybcs2_general_ci 楄௰׌Ұ  macce_general_ci 瑴牥䘮௰׌Ұ  macroman_general_ci ௰׌Ұ  cp852_general_ci 晏獦瑥௰׌Ұ  latin7_estonian_cs 卌௰׌Ұ  latin7_general_ci 䥯摮௰׌Ұ  latin7_general_cs 楈敤௰׌Ұ  utf8mb4_general_ci 䑢௰׌Ұ  utf8mb4_unicode_ci 瀍௰׌Ұ  utf8mb4_latvian_ci 效௰׌Ұ  utf8mb4_romanian_ci ௰׌Ұ  utf8mb4_polish_ci 楴湯௰׌Ұ  utf8mb4_estonian_ci ௰׌Ұ  utf8mb4_spanish_ci 楧௰׌Ұ  utf8mb4_swedish_ci 湥௰׌Ұ  utf8mb4_turkish_ci 敧௰׌Ұ  utf8mb4_czech_ci 湯戌湴௰׌Ұ  utf8mb4_danish_ci 䤊慭௰׌Ұ  utf8mb4_slovak_ci 湴敒௰׌Ұ  utf8mb4_spanish2_ci ௰׌Ұ  utf8mb4_roman_ci 潔汯畂௰׌Ұ  utf8mb4_persian_ci 湯௰׌Ұ  utf8mb4_sinhala_ci 䉬௰׌Ұ  utf8mb4_german2_ci 慃௰׌Ұ  utf8mb4_croatian_ci ௰׌Ұ  cp1251_bulgarian_ci ௰׌Ұ  cp1251_ukrainian_ci ௰׌Ұ  cp1251_general_ci 楬正௰׌Ұ  cp1251_general_cs 浉条௰׌Ұ  utf16_general_ci 捩kऀ௰׌Ұ  utf16_unicode_ci 硥⸂匈௰׌Ұ  utf16_icelandic_ci 畮௰׌Ұ  utf16_latvian_ci 怮伇䍮௰׌Ұ  utf16_romanian_ci 硥䌇௰׌Ұ  utf16_slovenian_ci 湉௰׌Ұ  utf16_estonian_ci 䤊慭௰׌Ұ  utf16_spanish_ci 正 ਀௰׌Ұ  utf16_swedish_ci 慍湩伇௰׌Ұ  utf16_turkish_ci ቭ敭畮௰׌Ұ  utf16_lithuanian_ci ௰׌Ұ  utf16_spanish2_ci ͸௰׌Ұ  utf16_persian_ci 整潃畬௰׌Ұ  utf16_esperanto_ci 慐௰׌Ұ  utf16_hungarian_ci 敭௰׌Ұ  utf16_sinhala_ci 畃ʹ䀭௰׌Ұ  utf16_german2_ci 潃畬湭௰׌Ұ  utf16_croatian_ci 楬正௰׌Ұ  utf16_vietnamese_ci ௰׌Ұ  utf16le_general_ci 灕௰׌Ұ  cp1256_general_ci 潍敶௰׌Ұ  cp1257_general_ci 汯浵௰׌Ұ  utf32_general_ci 敲瑡䥥௰׌Ұ  utf32_unicode_ci 䥵整๭௰׌Ұ  utf32_icelandic_ci 潐௰׌Ұ  utf32_latvian_ci ݮ湏潐௰׌Ұ  utf32_romanian_ci 卵䱑௰׌Ұ  utf32_slovenian_ci 畮௰׌Ұ  utf32_estonian_ci 敳ݴ௰׌Ұ  utf32_spanish_ci 桧ɴ৳௰׌Ұ  utf32_swedish_ci 灵兓浌௰׌Ұ  utf32_turkish_ci ጂ畇瑴௰׌Ұ  utf32_lithuanian_ci ௰׌Ұ  utf32_spanish2_ci             ူ  킘킘갨׌؄   킘  ᰠ׌ߴI᱘׌    ᰠ׌�ȶȶ      ᰠ׌ߴIᲈ׌    ᰠ׌ң        ᰠ׌ߴIᲸ׌    ᰠ׌ң        ᰠ׌ߴI᳨׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᴘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵈ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵸ׌    ᰠ׌�ҚҚ      ᰠ׌ߴIᶨ׌    ᰠ׌Ɂ        ᰠ׌ߴIᷘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIḈ׌    ᰠ׌Қ        ᰠ׌ߴIḸ׌    ᰠ׌ᩐɂ        ᰠ׌ߴIṨ׌    ᰠ׌Ɂ        ᰠ׌Ұ  108 ᰠ׌Ұ  65  ᰠ׌Ұ  50  ᰠ׌Ұ  130 ᰠ׌Ұ  128 ᰠ׌Ұ  100 ᰠ׌Ұ  0 0 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  0   ᰠ׌Ұ  771 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  100 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  508 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  167 ᰠ׌Ұ  100 ᰠ׌Ұ  86  ᰠ׌Ұ  80  ᰠ׌Ұ  0   ᰠ׌Ұ  2   ᰠ׌Ұ  1   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  0   ᰠ׌Ұ  
 Tᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  255 ᰠ׌Ұ  id Ⱦᰠ׌ߴI⍸׌    ᰠ׌䴀Ҙ        ᰠ׌ߴI⎨׌    ᰠ׌䴀Ҙ        ᰠ׌Ұ  CSV ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌㚠ȶ   瑳灥  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  7   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id Ⱦᰠ׌Ұ  255 ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  7  sᰠ׌Ұ  8  sᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  6 浰sᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  11 Ⱦᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  1 5 ᰠ׌Ұ  1 5 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  8  sᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌砰gҖ      ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌0_role|   ᰠ׌Ұ  
 Tᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌砰gﭜҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  id  ᰠ׌砰g⺔׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌砰g㄄׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌Ұ  
 Tᰠ׌砰gҖ    k ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌糨g    絼ɉ  ᰠ׌Ұ  0   ᰠ׌ߴI㓐׌    ᰠ׌Ұ  id  ᰠ׌ꫠҜ       ᰠ׌Ұ  id  ᰠ׌Ұ  );  ᰠ׌줠ȸ   0   ᰠ׌Ұ  id  ᰠ׌Ұ  xor ᰠ׌Ұ  1 5 ᰠ׌Ұ  use ᰠ׌糨g ğ 弼ɂ  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  id kᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌糨g    ɉ  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  8  sᰠ׌Ұ  
 0ᰠ׌Ұ  15  ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  
 0ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  11  ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  0 k ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  do rᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌ӣ  潃浭汄gᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  11  ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  0   ᰠ׌Ұ  8 1 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  
  ᰠ׌Ұ  20  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id yᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  60  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌ӣ  牕䵬湯 ᰠ׌ӣ  獐偁I ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌ӣ  祔䥰普oᰠ׌糨g    ⽌ּ  ᰠ׌Ұ  255 ᰠ׌ӣ  捁楴敶Xᰠ׌Ұ  255 ᰠ׌Ұ  id sᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  祓䥳楮tᰠ׌ӣ  祔数s ᰠ׌Ұ  255 ᰠ׌ӣ  汃獡敳sᰠ׌Ұ  0   ᰠ׌ӣ  桓佬橢 ᰠ׌ӣ  楗卮捯kᰠ׌ӣ  慍桴  ᰠ׌ӣ  慍歳s ᰠ׌ӣ  慭婤灩 ᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  潃獮獴 ᰠ׌ӣ  潃瑮牮sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  浉m  ᰠ׌ӣ  睄慭楰 ᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  浉䱧獩tᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  潔汯楗nᰠ׌ӣ  䱚扩  ᰠ׌ӣ  潃卭牴sᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  䍊湯瑳sᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  祓䵮浥oᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  汯慥捣 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  汏䑥B ᰠ׌ӣ  䑁䥏瑮 ᰠ׌ӣ  瑍x  ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  慍歳  ᰠ׌ӣ  灯楴湯sᰠ׌ӣ  摥瑩慶rᰠ׌ӣ  楶睥  ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  祳据扤 ᰠ׌ӣ  湰汧湡gᰠ׌ӣ  扁畯t ᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祔䥰普oᰠ׌ӣ  汃獡敳sᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  獀牴敬nᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  楙汥d ᰠ׌ӣ  汓敥p ᰠ׌ӣ  潍敶㈱ ᰠ׌ӣ  潍敶〲 ᰠ׌ӣ  潍敶㠲 ᰠ׌ӣ  潍敶㘳 ᰠ׌ӣ  潍敶㐴 ᰠ׌ӣ  潍敶㈵ ᰠ׌ӣ  潍敶〶 ᰠ׌ӣ  潍敶㠶 ᰠ׌ӣ  䝀瑥敍mᰠ׌ӣ  牅潲䅲tᰠ׌ӣ  牅潲r ᰠ׌ӣ  潍敶  ᰠ׌ӣ  慒摮浯 ᰠ׌ӣ  灕慃敳 ᰠ׌ӣ  牆捡  ᰠ׌ӣ  硅p  ᰠ׌ӣ  湌   ᰠ׌ӣ  煓瑲  ᰠ׌ӣ  剀問䑎 ᰠ׌ӣ  呀啒䍎 ᰠ׌ӣ  䅀灰湥dᰠ׌ӣ  敔瑸湉 ᰠ׌ӣ  敔瑸畏tᰠ׌ӣ  䅀獳杩nᰠ׌ӣ  汆獵h ᰠ׌ӣ  䙀畬桳 ᰠ׌ӣ  䍀潬敳 ᰠ׌ӣ  區瑥煅 ᰠ׌ӣ  區瑥畓bᰠ׌ӣ  偀睯〱 ᰠ׌ӣ  硅瑩汄lᰠ׌ӣ  䡀污ぴ ᰠ׌ӣ  䡀污t ᰠ׌ӣ  䅀獳牥tᰠ׌ӣ  南牴敓tᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  噀牡汃rᰠ׌ӣ  乀睥  ᰠ׌ӣ  彀汬畭lᰠ׌ӣ  彀汬楤vᰠ׌ӣ  彀汬潭dᰠ׌ӣ  彀汬桳lᰠ׌ӣ  楆摮卂 ᰠ׌ӣ  浀浥灣yᰠ׌ӣ  浀浥敳tᰠ׌ӣ  ⸮   ᰠ׌ӣ  䝀瑥汔sᰠ׌ӣ  敒瑣  ᰠ׌ӣ  潂湵獤 ᰠ׌ӣ  牆敥楓dᰠ׌ӣ  敂灥  ᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  畍䑬癩 ᰠ׌ӣ  汓敥p ᰠ׌ӣ  獬牴慣tᰠ׌ӣ  獬牴灣yᰠ׌ӣ  獬牴敬nᰠ׌ӣ  牁c  ᰠ׌ӣ  牁呣o ᰠ׌ӣ  楂䉴瑬 ᰠ׌ӣ  桃牯d ᰠ׌ӣ  汅楬獰eᰠ׌ӣ  湅䑤捯 ᰠ׌ӣ  湅偤条eᰠ׌ӣ  湅偤瑡hᰠ׌ӣ  楆汬杒nᰠ׌ӣ  偌潴偄 ᰠ׌ӣ  楌敮潔 ᰠ׌ӣ  慍歳求tᰠ׌ӣ  慐䉴瑬 ᰠ׌ӣ  楐e  ᰠ׌ӣ  潐祬潧nᰠ׌ӣ  慓敶䍄 ᰠ׌ӣ  敓剴偏2ᰠ׌ӣ  湅䵤湥uᰠ׌ӣ  敇䑴C ᰠ׌ӣ  敇䑴䕃xᰠ׌ӣ  敇䵴湥uᰠ׌ӣ  敇側潲pᰠ׌ӣ  獉桃汩dᰠ׌ӣ  敓䵴湥uᰠ׌ӣ  敓側潲pᰠ׌ӣ  敓剴捥tᰠ׌ӣ  潔獁楣iᰠ׌ӣ  楈潗摲 ᰠ׌ӣ  䝒B  ᰠ׌ӣ  牔浩瑓rᰠ׌ӣ  敒汰捡eᰠ׌ӣ  敋灥  ᰠ׌ӣ  潃祰R ᰠ׌ӣ  灕桃牡 ᰠ׌ӣ  灕瑓r ᰠ׌ӣ  潌䍷慨rᰠ׌ӣ  潌卷牴 ᰠ׌ӣ  潐即牴 ᰠ׌ӣ  潐味硥tᰠ׌ӣ  楆汬瑓rᰠ׌ӣ  畓卢牴 ᰠ׌ӣ  敄卣灥 ᰠ׌ӣ  协   ᰠ׌ӣ  楔正楄fᰠ׌ӣ  獆   ᰠ׌ӣ  慍楧c ᰠ׌ӣ  慍楧㥣5ᰠ׌ӣ  牔剹慥dᰠ׌ӣ  楍n  ᰠ׌ӣ  瑓牯e ᰠ׌ӣ  楚p  ᰠ׌ӣ  敄牣灹tᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敇却牴 ᰠ׌ӣ  慐獲e ᰠ׌ӣ  摁䱤湩kᰠ׌ӣ  敇䕴灢 ᰠ׌ӣ  摁敬㍲2ᰠ׌ӣ  楈瑳搳 ᰠ׌ӣ  ㍍d  ᰠ׌ӣ  潖l  ᰠ׌ӣ  潂瑴浯 ᰠ׌ӣ  潔p  ᰠ׌ӣ  慖彲  ᰠ׌ӣ  畃t  ᰠ׌ӣ  捄潔浂pᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  敇䙴湯tᰠ׌ӣ  牗敔瑸 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  慆汩摥 ᰠ׌ӣ  楢摮  ᰠ׌ӣ  潣湮捥tᰠ׌ӣ  瑨湯s ᰠ׌ӣ  敲癣  ᰠ׌ӣ  敳敬瑣 ᰠ׌ӣ  敳摮  ᰠ׌ӣ  敳摮潴 ᰠ׌ӣ  潳正瑥 ᰠ׌ӣ  楋汬硅tᰠ׌ӣ  獉敎䍷sᰠ׌ӣ  獉汃獡sᰠ׌ӣ  楐杮  ᰠ׌ӣ  敓摮瑓rᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  慍汩瑉 ᰠ׌ӣ  桃捥䥫tᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  摁䥤整mᰠ׌ӣ  獅p  ᰠ׌ӣ  扅p  ᰠ׌ӣ  潌ㅧ  ᰠ׌ӣ  摁偤牴 ᰠ׌ӣ  楆摮灂lᰠ׌ӣ  湉瑩  ᰠ׌ӣ  汃獯e ᰠ׌ӣ  䔮扁牯tᰠ׌ӣ  楄䵶摯 ᰠ׌ӣ  效䍸慨rᰠ׌ӣ  效䉸瑹eᰠ׌ӣ  慓敭瑓rᰠ׌ӣ  牔浩  ᰠ׌ӣ  癃䥴瑮 ᰠ׌ӣ  癃䥴瑮Wᰠ׌ӣ  潌摡瑓rᰠ׌ӣ  楆敬杁eᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䵲癯eᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獡 ᰠ׌ӣ  瑓乲睥 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  楔敭  ᰠ׌ӣ  潎w  ᰠ׌ӣ  敇䑴瑡eᰠ׌ӣ  敇呴浩eᰠ׌ӣ  扁牯t ᰠ׌ӣ  畐桳  ᰠ׌ӣ  潐p  ᰠ׌ӣ  敂灥  ᰠ׌ӣ  湁楳潐sᰠ׌ӣ  汓敥p ᰠ׌ӣ  祂整佳fᰠ׌ӣ  噀牡汃rᰠ׌ӣ  湁佹p ᰠ׌ӣ  敒污灏 ᰠ׌ӣ  慄整灏 ᰠ׌ӣ  湉佴p ᰠ׌ӣ  湉㙴伴pᰠ׌ӣ  畎汬灏 ᰠ׌ӣ  浅瑰佹pᰠ׌ӣ  畃牲灏 ᰠ׌ӣ  噀牡灏 ᰠ׌ӣ  畎汬  ᰠ׌ӣ  噀牡摁dᰠ׌ӣ  吮楌瑳 ᰠ׌ӣ  吮楂獴 ᰠ׌ӣ  吮楆敬rᰠ׌ӣ 
DROP TABLE IF EXISTS `mainpagetranslated  鄰׉Ұ  latin1_german2_ci  鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  koi8r_general_ci s* 鄰׉Ұ  latin1_german1_ci ' 鄰׉Ұ  latin1_swedish_ci ' 鄰׉Ұ  latin1_danish_ci   鄰׉Ұ  latin1_general_ci  鄰׉Ұ  latin1_general_cs  鄰׉Ұ  latin1_spanish_ci  鄰׉Ұ  latin2_general_ci  鄰׉Ұ  cp850_general_ci A  鄰׉Ұ  latin1_swedish_ci   鄰׉Ұ  latin1_danish_ci    鄰׉Ұ  latin1_german2_ci   鄰׉Ұ  latin1_general_ci   鄰׉Ұ  latin1_general_cs   鄰׉Ұ  latin1_spanish_ci   鄰׉Ұ  latin2_general_ci   鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  latin2_croatian_ci  鄰׉Ұ  ascii_general_ci    鄰׉Ұ  ujis_japanese_ci    鄰׉Ұ  sjis_japanese_ci    鄰׉Ұ  hebrew_general_ci   鄰׉Ұ  koi8u_general_ci    鄰׉Ұ  gb2312_chinese_ci   鄰׉Ұ  greek_general_ci    鄰׉Ұ  cp1250_general_ci   鄰׉Ұ  cp1250_croatian_ci  鄰׉Ұ  cp1250_polish_ci    鄰׉Ұ  latin5_turkish_ci   鄰׉Ұ  armscii8_general_ci 鄰׉Ұ  utf8_icelandic_ci   鄰׉Ұ  utf8_romanian_ci    鄰׉Ұ  utf8_slovenian_ci   鄰׉Ұ  utf8_estonian_ci    鄰׉Ұ  utf8_lithuanian_ci  鄰׉Ұ  utf8_spanish2_ci    鄰׉Ұ  utf8_esperanto_ci   鄰׉Ұ  utf8_hungarian_ci   鄰׉Ұ  utf8_croatian_ci    鄰׉Ұ  utf8_unicode_520_ci 鄰׉Ұ  utf8_vietnamese_ci  鄰׉Ұ  ucs2_icelandic_ci   鄰׉Ұ  ucs2_romanian_ci    鄰׉Ұ  ucs2_slovenian_ci   鄰׉Ұ  ucs2_estonian_ci    鄰׉Ұ  ucs2_lithuanian_ci  鄰׉Ұ  ucs2_spanish2_ci    鄰׉Ұ  ucs2_esperanto_ci   鄰׉Ұ  ucs2_hungarian_ci   鄰׉Ұ  ucs2_croatian_ci    鄰׉Ұ  ucs2_unicode_520_ci 鄰׉Ұ  ucs2_vietnamese_ci  鄰׉Ұ  cp866_general_ci    鄰׉Ұ  keybcs2_general_ci                        ﴰ Ｖ 횸횸뤀׊   횸  蹠׊Ұ б CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8       蹠׊CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8             蹠׊Ұ б CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8        Ұ  Ͼ   ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 oDB DEFAULT CHARSET=utf8 noDB DEFAULT CHARSET=utf8       ꠁ׊Ұ  Ϝ   ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8                                 낁׊﷩  ϥ ⰰ✠慵Ⱗ✠义䥔䅔Ⱗ✠鿐ꃐ黐鏐ꃐ郐鳐ꏐ駐†鳐郐駐釐ꏐꋐ鷐蓐Ⱗ✠鷐뗐턠킃톿톃톁킂₸臑닐雑말턠킈킰톽₁럐볐雑뷐룐苑룐턠킁톲톖₂‭뻐苑胑룐볐냐말턠킏톺톖킁톽₃苑냐턠톁톃킇톰킁톽₃뻐臑닐雑苑菑턠ₖ臑苑냐뷐賑퀠킺킻톰킁킽킸₼臑뿐뗐蛑雑냐믐雑臑苑뻐볐✡‬洧楡灮条❥‬倧佒則䵁䘠呕剕❅‬⼧獣⽳浩条獥猯楬敤彲浩⽧整瑸牵⹥湰❧‬⼧獣⽳浩条獥猯楬敤彲浩⽧楬敮瀮杮Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鿐胑뻐퀠킽톰➁‬⼧獣⽳浩条獥氯湩ㅥ瀮杮Ⱗ✠듐뗐觑뻐‬觑뻐퀠킒킰₼뿐뻐苑胑雑뇐뷐뻐퀠킷킽톰킂₸뿐胑뻐퀠킽톰톈ₖ뫐菑胑臑룐Ⱗ✠✱‬퀧킯₺뿐胑뻐닐뻐듐룐苑賑臑近퀠킽킰톲킇킰킽톽㾏Ⱗ✠듐냐믐雑퀠킿톾톏킁킽킵킽톽₏近뫐퀠킲₸뇐菑듐뗐苑뗐퀠톲킇톸킂톸톁₏뫐胑뻐뫐퀠킷₰뫐胑뻐뫐뻐볐Ⱗ✠✱‬㤧㠵硰Ⱗ✠듐뗐苑냐믐賑뷐雑裑뗐⸠⸮Ⱗ✠振獳椯慭敧⽳敨慸潧⹮湰❧‬퀧킓톾킂킾톲ₖ胑뻐럐뿐뻐蟑냐苑룐✿‬퀧킒킲킵톴톖톂₌듐냐뷐雑퀠₲蓑뻐胑볐菑퀠킽킸톶킇➵‬턧킀킾톷킈톸킀킵킽₰胑뗐铑臑苑胑냐蛑雑近Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鋐룐퀠킼킾킶통킂₵苑냐뫐뻐뛐퀠킷톰킀통톔톁톂톀킃킲톰킂톸톁₏蟑뗐胑뗐럐턠킁톾킆킼통킀킵톶㪖Ⱗ✠振獳椯慭敧⽳敮睴牯楫杮瀮杮Ⱗ✠振獳椯慭敧⽳潦浲潆⹮湰❧)ader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 NGINE=InnoDB DEFAULT CHARS T=utf8 latedmessagesua``; 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              猶 턘鄰׉  Ȏ   턘  趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋    ₁2   ⊐Ɉ  遐׋     輘Ⱦ趐׋\bCOMMENT='((.+)[^'])'    趐׋   ₁2   ⊐Ɉ迠׋邈׋     躠Ⱦ趐׋   ₁2   ⊐Ɉ遐׋׉     踨Ⱦ趐׋詤_ ᴬ@䔐ҩ      �¤  襘_襴_覈_  趐׋Ұ  ``message`` = "..." n 趐׋詤_ ᴬ@愀ҩ      �¤  襘_襴_覈_  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci   趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋\bCOMMENT='((.+)[^'])' s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin2_croatian_ci  趐׋Ұ  performance_schema  趐׋Ұ  information_schema U趐׋Ұ  row_format=COMPACT ׄ趐׋Ұ  performance_schema  趐׋Ұ  latin1_german1_ci * 趐׋Ұ  row_format=COMPACT  趐׋Ұ  information_schema U趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci 8  趐׋Ұ  row_format=COMPACT  趐׋Ұ  aa_authorizations 㖠ׄ趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  row_format=COMPACT  趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  latin1_german1_ci  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci  趐׋Ұ  latin1_danish_ci   趐׋Ұ  latin1_german2_ci  趐׋Ұ  latin1_general_ci  趐׋Ұ  latin1_general_cs  趐׋Ұ  latin1_spanish_ci  趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  latin2_general_ci  趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  ascii_general_ci   趐׋Ұ  ujis_japanese_ci   趐׋Ұ  sjis_japanese_ci   趐׋Ұ  hebrew_general_ci  趐׋Ұ  koi8u_general_ci   趐׋Ұ  gb2312_chinese_ci  趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci ! 趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci  # 趐׋Ұ  latin5_turkish_ci $ 趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci & 趐׋Ұ  utf8_romanian_ci  ' 趐׋Ұ  utf8_slovenian_ci ( 趐׋Ұ  utf8_estonian_ci  ) 趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci  + 趐׋Ұ  utf8_esperanto_ci , 趐׋Ұ  utf8_hungarian_ci - 趐׋Ұ  utf8_croatian_ci  . 趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci 1 趐׋Ұ  ucs2_romanian_ci  2 趐׋Ұ  ucs2_slovenian_ci 3 趐׋Ұ  ucs2_estonian_ci  4 趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci  6 趐׋Ұ  ucs2_esperanto_ci 7 趐׋Ұ  ucs2_hungarian_ci 8 趐׋Ұ  ucs2_croatian_ci  9 趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci  < 趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci  > 趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci  @ 趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci B 趐׋Ұ  latin7_general_cs C 趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci H 趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci  M 趐׋Ұ  utf8mb4_danish_ci N 趐׋Ұ  utf8mb4_slovak_ci O 趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci  Q 趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci X 趐׋Ұ  cp1251_general_cs Y 趐׋Ұ  ``message`` != "..."  趐׋    ₁2   ፀɈ  膀׊      ؠҥ趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  koi8r_general_ci s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  ଲ 䵂ж   6 (      Ѐ         ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ꾃袓焣椗Ｕ焣꾃袓￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ놆蒖謦ｑ륢ﾌ튔ﾱ륢ﾌ謦ｑ검貑￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ漡률ﾊ륞ﾆ￿￿롞ﾆ뭥ﾎ渟￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ礯ｊ풛ﾵ￿￿￿￿￿￿튔ﾱ椗Ｕ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ蝅｝펏ﾰ횑ﾰ￿￿뭣ﾋ뭥ﾎ欛Ｘ鶝ﾝ붺ﾽ￬￭￭￮￯￯￯뺜ﾫ꩟ﾀ풔ﾳ￐멨ﾎ踫ｕ腓｣￿ÿꖥ￢쿍ￏ쯋ￋ쳌ￌ컎ￎ쿏ￏ탐￐틒ￒ뎗ﾡ陜ｱ赍､衇～豨ﭴ￿ÿ￿ÿꖥ￡쳋ￌ쟇ￇ죈￈쫊ￊ쯋ￋ췍ￍ컎ￎ탐￐퇑￑퓓ￔ￫ꂠ￿ÿ￿ÿꖥ�￟짇￉싂ￂ쓄ￄ업ￅ죈￈짉￉쫊ￊ쳌ￌ췍ￍ퇐￑￪ꂠ￿ÿ￿ÿꖥ�￟엃ￅ샀￀샀￀싂ￂ쏃ￃ쓄ￄ업ￅ죈￈짉￉췍ￍ￨ꂠ￿ÿ￿ÿ궭횭췇ￍ￤￤￥￥￥￦￦￧￨￨폍ￓꢨ￿ÿ￿ÿ䏥늲좲鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝꪪ�仡￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ံ 턘�  I 敩⁲敎ᅷ畇瑴௰׌Ұ  ucs2_slovenian_ci 浵敢௰׌Ұ  ucs2_estonian_ci ؁匐湹௰׌Ұ  ucs2_lithuanian_ci 攏௰׌Ұ  ucs2_spanish2_ci 敋灥慃௰׌Ұ  ucs2_esperanto_ci 呯扡௰׌Ұ  ucs2_hungarian_ci 湯ਆ௰׌Ұ  ucs2_croatian_ci 䰄晥ɴ௰׌Ұ  ucs2_unicode_520_ci ௰׌Ұ  ucs2_vietnamese_ci 瑸௰׌Ұ  cp866_general_ci 倉灯灵௰׌Ұ  keybcs2_general_ci 楄௰׌Ұ  macce_general_ci 瑴牥䘮௰׌Ұ  macroman_general_ci ௰׌Ұ  cp852_general_ci 晏獦瑥௰׌Ұ  latin7_estonian_cs 卌௰׌Ұ  latin7_general_ci 䥯摮௰׌Ұ  latin7_general_cs 楈敤௰׌Ұ  utf8mb4_general_ci 䑢௰׌Ұ  utf8mb4_unicode_ci 瀍௰׌Ұ  utf8mb4_latvian_ci 效௰׌Ұ  utf8mb4_romanian_ci ௰׌Ұ  utf8mb4_polish_ci 楴湯௰׌Ұ  utf8mb4_estonian_ci ௰׌Ұ  utf8mb4_spanish_ci 楧௰׌Ұ  utf8mb4_swedish_ci 湥௰׌Ұ  utf8mb4_turkish_ci 敧௰׌Ұ  utf8mb4_czech_ci 湯戌湴௰׌Ұ  utf8mb4_danish_ci 䤊慭௰׌Ұ  utf8mb4_slovak_ci 湴敒௰׌Ұ  utf8mb4_spanish2_ci ௰׌Ұ  utf8mb4_roman_ci 潔汯畂௰׌Ұ  utf8mb4_persian_ci 湯௰׌Ұ  utf8mb4_sinhala_ci 䉬௰׌Ұ  utf8mb4_german2_ci 慃௰׌Ұ  utf8mb4_croatian_ci ௰׌Ұ  cp1251_bulgarian_ci ௰׌Ұ  cp1251_ukrainian_ci ௰׌Ұ  cp1251_general_ci 楬正௰׌Ұ  cp1251_general_cs 浉条௰׌Ұ  utf16_general_ci 捩kऀ௰׌Ұ  utf16_unicode_ci 硥⸂匈௰׌Ұ  utf16_icelandic_ci 畮௰׌Ұ  utf16_latvian_ci 怮伇䍮௰׌Ұ  utf16_romanian_ci 硥䌇௰׌Ұ  utf16_slovenian_ci 湉௰׌Ұ  utf16_estonian_ci 䤊慭௰׌Ұ  utf16_spanish_ci 正 ਀௰׌Ұ  utf16_swedish_ci 慍湩伇௰׌Ұ  utf16_turkish_ci ቭ敭畮௰׌Ұ  utf16_lithuanian_ci ௰׌Ұ  utf16_spanish2_ci ͸௰׌Ұ  utf16_persian_ci 整潃畬௰׌Ұ  utf16_esperanto_ci 慐௰׌Ұ  utf16_hungarian_ci 敭௰׌Ұ  utf16_sinhala_ci 畃ʹ䀭௰׌Ұ  utf16_german2_ci 潃畬湭௰׌Ұ  utf16_croatian_ci 楬正௰׌Ұ  utf16_vietnamese_ci ௰׌Ұ  utf16le_general_ci 灕௰׌Ұ  cp1256_general_ci 潍敶௰׌Ұ  cp1257_general_ci 汯浵௰׌Ұ  utf32_general_ci 敲瑡䥥௰׌Ұ  utf32_unicode_ci 䥵整๭௰׌Ұ  utf32_icelandic_ci 潐௰׌Ұ  utf32_latvian_ci ݮ湏潐௰׌Ұ  utf32_romanian_ci 卵䱑௰׌Ұ  utf32_slovenian_ci 畮௰׌Ұ  utf32_estonian_ci 敳ݴ௰׌Ұ  utf32_spanish_ci 桧ɴ৳௰׌Ұ  utf32_swedish_ci 灵兓浌௰׌Ұ  utf32_turkish_ci ጂ畇瑴௰׌Ұ  utf32_lithuanian_ci ௰׌Ұ  utf32_spanish2_ci             ူ  킘킘굈׌؇   킘  ᰠ׌ߴI᱘׌    ᰠ׌�ȶȶ      ᰠ׌ߴIᲈ׌    ᰠ׌ң        ᰠ׌ߴIᲸ׌    ᰠ׌ң        ᰠ׌ߴI᳨׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᴘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵈ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵸ׌    ᰠ׌�ҚҚ      ᰠ׌ߴIᶨ׌    ᰠ׌Ɂ        ᰠ׌ߴIᷘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIḈ׌    ᰠ׌Қ        ᰠ׌ߴIḸ׌    ᰠ׌ᩐɂ        ᰠ׌ߴIṨ׌    ᰠ׌Ɂ        ᰠ׌Ұ  108 ᰠ׌Ұ  65  ᰠ׌Ұ  50  ᰠ׌Ұ  130 ᰠ׌Ұ  128 ᰠ׌Ұ  100 ᰠ׌Ұ  0 0 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  0   ᰠ׌Ұ  771 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  100 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  508 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  167 ᰠ׌Ұ  100 ᰠ׌Ұ  86  ᰠ׌Ұ  80  ᰠ׌Ұ  0   ᰠ׌Ұ  2   ᰠ׌Ұ  1   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  0   ᰠ׌Ұ  
 Tᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  255 ᰠ׌Ұ  id Ⱦᰠ׌ߴI⍸׌    ᰠ׌䴀Ҙ        ᰠ׌ߴI⎨׌    ᰠ׌䴀Ҙ        ᰠ׌Ұ  CSV ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌㚠ȶ   瑳灥  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  7   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id Ⱦᰠ׌Ұ  255 ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  7  sᰠ׌Ұ  8  sᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  6 浰sᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  11 Ⱦᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  1 5 ᰠ׌Ұ  1 5 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  8  sᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌砰gҖ      ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌0_role|   ᰠ׌Ұ  
 Tᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌砰gﭜҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  id  ᰠ׌砰g⺔׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌砰g㄄׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌Ұ  
 Tᰠ׌砰gҖ    k ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌糨g    絼ɉ  ᰠ׌Ұ  0   ᰠ׌ߴI㓐׌    ᰠ׌Ұ  id  ᰠ׌ꫠҜ       ᰠ׌Ұ  id  ᰠ׌Ұ  );  ᰠ׌줠ȸ   0   ᰠ׌Ұ  id  ᰠ׌Ұ  xor ᰠ׌Ұ  1 5 ᰠ׌Ұ  use ᰠ׌糨g ğ 弼ɂ  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  id kᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌糨g    ɉ  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  8  sᰠ׌Ұ  
 0ᰠ׌Ұ  15  ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  
 0ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  11  ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  0 k ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  do rᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌ӣ  潃浭汄gᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  11  ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  0   ᰠ׌Ұ  8 1 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  
  ᰠ׌Ұ  20  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id yᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  60  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌ӣ  牕䵬湯 ᰠ׌ӣ  獐偁I ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌ӣ  祔䥰普oᰠ׌糨g    ⽌ּ  ᰠ׌Ұ  255 ᰠ׌ӣ  捁楴敶Xᰠ׌Ұ  255 ᰠ׌Ұ  id sᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  祓䥳楮tᰠ׌ӣ  祔数s ᰠ׌Ұ  255 ᰠ׌ӣ  汃獡敳sᰠ׌Ұ  0   ᰠ׌ӣ  桓佬橢 ᰠ׌ӣ  楗卮捯kᰠ׌ӣ  慍桴  ᰠ׌ӣ  慍歳s ᰠ׌ӣ  慭婤灩 ᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  潃獮獴 ᰠ׌ӣ  潃瑮牮sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  浉m  ᰠ׌ӣ  睄慭楰 ᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  浉䱧獩tᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  潔汯楗nᰠ׌ӣ  䱚扩  ᰠ׌ӣ  潃卭牴sᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  䍊湯瑳sᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  祓䵮浥oᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  汯慥捣 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  汏䑥B ᰠ׌ӣ  䑁䥏瑮 ᰠ׌ӣ  瑍x  ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  慍歳  ᰠ׌ӣ  灯楴湯sᰠ׌ӣ  摥瑩慶rᰠ׌ӣ  楶睥  ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  祳据扤 ᰠ׌ӣ  湰汧湡gᰠ׌ӣ  扁畯t ᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祔䥰普oᰠ׌ӣ  汃獡敳sᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  獀牴敬nᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  楙汥d ᰠ׌ӣ  汓敥p ᰠ׌ӣ  潍敶㈱ ᰠ׌ӣ  潍敶〲 ᰠ׌ӣ  潍敶㠲 ᰠ׌ӣ  潍敶㘳 ᰠ׌ӣ  潍敶㐴 ᰠ׌ӣ  潍敶㈵ ᰠ׌ӣ  潍敶〶 ᰠ׌ӣ  潍敶㠶 ᰠ׌ӣ  䝀瑥敍mᰠ׌ӣ  牅潲䅲tᰠ׌ӣ  牅潲r ᰠ׌ӣ  潍敶  ᰠ׌ӣ  慒摮浯 ᰠ׌ӣ  灕慃敳 ᰠ׌ӣ  牆捡  ᰠ׌ӣ  硅p  ᰠ׌ӣ  湌   ᰠ׌ӣ  煓瑲  ᰠ׌ӣ  剀問䑎 ᰠ׌ӣ  呀啒䍎 ᰠ׌ӣ  䅀灰湥dᰠ׌ӣ  敔瑸湉 ᰠ׌ӣ  敔瑸畏tᰠ׌ӣ  䅀獳杩nᰠ׌ӣ  汆獵h ᰠ׌ӣ  䙀畬桳 ᰠ׌ӣ  䍀潬敳 ᰠ׌ӣ  區瑥煅 ᰠ׌ӣ  區瑥畓bᰠ׌ӣ  偀睯〱 ᰠ׌ӣ  硅瑩汄lᰠ׌ӣ  䡀污ぴ ᰠ׌ӣ  䡀污t ᰠ׌ӣ  䅀獳牥tᰠ׌ӣ  南牴敓tᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  噀牡汃rᰠ׌ӣ  乀睥  ᰠ׌ӣ  彀汬畭lᰠ׌ӣ  彀汬楤vᰠ׌ӣ  彀汬潭dᰠ׌ӣ  彀汬桳lᰠ׌ӣ  楆摮卂 ᰠ׌ӣ  浀浥灣yᰠ׌ӣ  浀浥敳tᰠ׌ӣ  ⸮   ᰠ׌ӣ  䝀瑥汔sᰠ׌ӣ  敒瑣  ᰠ׌ӣ  潂湵獤 ᰠ׌ӣ  牆敥楓dᰠ׌ӣ  敂灥  ᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  畍䑬癩 ᰠ׌ӣ  汓敥p ᰠ׌ӣ  獬牴慣tᰠ׌ӣ  獬牴灣yᰠ׌ӣ  獬牴敬nᰠ׌ӣ  牁c  ᰠ׌ӣ  牁呣o ᰠ׌ӣ  楂䉴瑬 ᰠ׌ӣ  桃牯d ᰠ׌ӣ  汅楬獰eᰠ׌ӣ  湅䑤捯 ᰠ׌ӣ  湅偤条eᰠ׌ӣ  湅偤瑡hᰠ׌ӣ  楆汬杒nᰠ׌ӣ  偌潴偄 ᰠ׌ӣ  楌敮潔 ᰠ׌ӣ  慍歳求tᰠ׌ӣ  慐䉴瑬 ᰠ׌ӣ  楐e  ᰠ׌ӣ  潐祬潧nᰠ׌ӣ  慓敶䍄 ᰠ׌ӣ  敓剴偏2ᰠ׌ӣ  湅䵤湥uᰠ׌ӣ  敇䑴C ᰠ׌ӣ  敇䑴䕃xᰠ׌ӣ  敇䵴湥uᰠ׌ӣ  敇側潲pᰠ׌ӣ  獉桃汩dᰠ׌ӣ  敓䵴湥uᰠ׌ӣ  敓側潲pᰠ׌ӣ  敓剴捥tᰠ׌ӣ  潔獁楣iᰠ׌ӣ  楈潗摲 ᰠ׌ӣ  䝒B  ᰠ׌ӣ  牔浩瑓rᰠ׌ӣ  敒汰捡eᰠ׌ӣ  敋灥  ᰠ׌ӣ  潃祰R ᰠ׌ӣ  灕桃牡 ᰠ׌ӣ  灕瑓r ᰠ׌ӣ  潌䍷慨rᰠ׌ӣ  潌卷牴 ᰠ׌ӣ  潐即牴 ᰠ׌ӣ  潐味硥tᰠ׌ӣ  楆汬瑓rᰠ׌ӣ  畓卢牴 ᰠ׌ӣ  敄卣灥 ᰠ׌ӣ  协   ᰠ׌ӣ  楔正楄fᰠ׌ӣ  獆   ᰠ׌ӣ  慍楧c ᰠ׌ӣ  慍楧㥣5ᰠ׌ӣ  牔剹慥dᰠ׌ӣ  楍n  ᰠ׌ӣ  瑓牯e ᰠ׌ӣ  楚p  ᰠ׌ӣ  敄牣灹tᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敇却牴 ᰠ׌ӣ  慐獲e ᰠ׌ӣ  摁䱤湩kᰠ׌ӣ  敇䕴灢 ᰠ׌ӣ  摁敬㍲2ᰠ׌ӣ  楈瑳搳 ᰠ׌ӣ  ㍍d  ᰠ׌ӣ  潖l  ᰠ׌ӣ  潂瑴浯 ᰠ׌ӣ  潔p  ᰠ׌ӣ  慖彲  ᰠ׌ӣ  畃t  ᰠ׌ӣ  捄潔浂pᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  敇䙴湯tᰠ׌ӣ  牗敔瑸 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  慆汩摥 ᰠ׌ӣ  楢摮  ᰠ׌ӣ  潣湮捥tᰠ׌ӣ  瑨湯s ᰠ׌ӣ  敲癣  ᰠ׌ӣ  敳敬瑣 ᰠ׌ӣ  敳摮  ᰠ׌ӣ  敳摮潴 ᰠ׌ӣ  潳正瑥 ᰠ׌ӣ  楋汬硅tᰠ׌ӣ  獉敎䍷sᰠ׌ӣ  獉汃獡sᰠ׌ӣ  楐杮  ᰠ׌ӣ  敓摮瑓rᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  慍汩瑉 ᰠ׌ӣ  桃捥䥫tᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  摁䥤整mᰠ׌ӣ  獅p  ᰠ׌ӣ  扅p  ᰠ׌ӣ  潌ㅧ  ᰠ׌ӣ  摁偤牴 ᰠ׌ӣ  楆摮灂lᰠ׌ӣ  湉瑩  ᰠ׌ӣ  汃獯e ᰠ׌ӣ  䔮扁牯tᰠ׌ӣ  楄䵶摯 ᰠ׌ӣ  效䍸慨rᰠ׌ӣ  效䉸瑹eᰠ׌ӣ  慓敭瑓rᰠ׌ӣ  牔浩  ᰠ׌ӣ  癃䥴瑮 ᰠ׌ӣ  癃䥴瑮Wᰠ׌ӣ  潌摡瑓rᰠ׌ӣ  楆敬杁eᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䵲癯eᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獡 ᰠ׌ӣ  瑓乲睥 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  楔敭  ᰠ׌ӣ  潎w  ᰠ׌ӣ  敇䑴瑡eᰠ׌ӣ  敇呴浩eᰠ׌ӣ  扁牯t ᰠ׌ӣ  畐桳  ᰠ׌ӣ  潐p  ᰠ׌ӣ  敂灥  ᰠ׌ӣ  湁楳潐sᰠ׌ӣ  汓敥p ᰠ׌ӣ  祂整佳fᰠ׌ӣ  噀牡汃rᰠ׌ӣ  湁佹p ᰠ׌ӣ  敒污灏 ᰠ׌ӣ  慄整灏 ᰠ׌ӣ  湉佴p ᰠ׌ӣ  湉㙴伴pᰠ׌ӣ  畎汬灏 ᰠ׌ӣ  浅瑰佹pᰠ׌ӣ  畃牲灏 ᰠ׌ӣ  噀牡灏 ᰠ׌ӣ  畎汬  ᰠ׌ӣ  噀牡摁dᰠ׌ӣ  吮楌瑳 ᰠ׌ӣ  吮楂獴 ᰠ׌ӣ  吮楆敬rᰠ׌ӣ `;
IF NOT EXISTS ;

-- Dumping data for table int_ita_db.mainpagetranslated  鄰׉Ұ  latin1_german2_ci  鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  koi8r_general_ci s* 鄰׉Ұ  latin1_german1_ci ' 鄰׉Ұ  latin1_swedish_ci ' 鄰׉Ұ  latin1_danish_ci   鄰׉Ұ  latin1_general_ci  鄰׉Ұ  latin1_general_cs  鄰׉Ұ  latin1_spanish_ci  鄰׉Ұ  latin2_general_ci  鄰׉Ұ  cp850_general_ci A  鄰׉Ұ  latin1_swedish_ci   鄰׉Ұ  latin1_danish_ci    鄰׉Ұ  latin1_german2_ci   鄰׉Ұ  latin1_general_ci   鄰׉Ұ  latin1_general_cs   鄰׉Ұ  latin1_spanish_ci   鄰׉Ұ  latin2_general_ci   鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  latin2_croatian_ci  鄰׉Ұ  ascii_general_ci    鄰׉Ұ  ujis_japanese_ci    鄰׉Ұ  sjis_japanese_ci    鄰׉Ұ  hebrew_general_ci   鄰׉Ұ  koi8u_general_ci    鄰׉Ұ  gb2312_chinese_ci   鄰׉Ұ  greek_general_ci    鄰׉Ұ  cp1250_general_ci   鄰׉Ұ  cp1250_croatian_ci  鄰׉Ұ  cp1250_polish_ci    鄰׉Ұ  latin5_turkish_ci   鄰׉Ұ  armscii8_general_ci 鄰׉Ұ  utf8_icelandic_ci   鄰׉Ұ  utf8_romanian_ci    鄰׉Ұ  utf8_slovenian_ci   鄰׉Ұ  utf8_estonian_ci    鄰׉Ұ  utf8_lithuanian_ci  鄰׉Ұ  utf8_spanish2_ci    鄰׉Ұ  utf8_esperanto_ci   鄰׉Ұ  utf8_hungarian_ci   鄰׉Ұ  utf8_croatian_ci    鄰׉Ұ  utf8_unicode_520_ci 鄰׉Ұ  utf8_vietnamese_ci  鄰׉Ұ  ucs2_icelandic_ci   鄰׉Ұ  ucs2_romanian_ci    鄰׉Ұ  ucs2_slovenian_ci   鄰׉Ұ  ucs2_estonian_ci    鄰׉Ұ  ucs2_lithuanian_ci  鄰׉Ұ  ucs2_spanish2_ci    鄰׉Ұ  ucs2_esperanto_ci   鄰׉Ұ  ucs2_hungarian_ci   鄰׉Ұ  ucs2_croatian_ci    鄰׉Ұ  ucs2_unicode_520_ci 鄰׉Ұ  ucs2_vietnamese_ci  鄰׉Ұ  cp866_general_ci    鄰׉Ұ  keybcs2_general_ci                        ﴰ Ｖ 횸횸뤀׊   횸  蹠׊Ұ б CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8       蹠׊CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8             蹠׊Ұ б CREATE TABLE `mainpage` (
  `id` int(11) NOT NULL,
  `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8        Ұ  Ͼ   `language` varchar(6) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 oDB DEFAULT CHARSET=utf8 noDB DEFAULT CHARSET=utf8       ꠁ׊Ұ  Ϝ   `title` varchar(100) NOT NULL,
  `sliderHeader` varchar(50) NOT NULL,
  `sliderText` varchar(255) NOT NULL,
  `category` varchar(32) NOT NULL,
  `message` varchar(50) NOT NULL,
  `sliderTextureURL` varchar(255) NOT NULL,
  `sliderLineURL` varchar(255) NOT NULL,
  `sliderButtonText` varchar(20) NOT NULL,
  `header1` varchar(50) NOT NULL,
  `subLineImage` varchar(255) NOT NULL,
  `subheader1` varchar(100) NOT NULL,
  `arrayBlocks` varchar(10) NOT NULL,
  `header2` varchar(50) NOT NULL,
  `subheader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8                                 낁׊﷩  ϥ ⰰ✠慵Ⱗ✠义䥔䅔Ⱗ✠鿐ꃐ黐鏐ꃐ郐鳐ꏐ駐†鳐郐駐釐ꏐꋐ鷐蓐Ⱗ✠鷐뗐턠킃톿톃톁킂₸臑닐雑말턠킈킰톽₁럐볐雑뷐룐苑룐턠킁톲톖₂‭뻐苑胑룐볐냐말턠킏톺톖킁톽₃苑냐턠톁톃킇톰킁톽₃뻐臑닐雑苑菑턠ₖ臑苑냐뷐賑퀠킺킻톰킁킽킸₼臑뿐뗐蛑雑냐믐雑臑苑뻐볐✡‬洧楡灮条❥‬倧佒則䵁䘠呕剕❅‬⼧獣⽳浩条獥猯楬敤彲浩⽧整瑸牵⹥湰❧‬⼧獣⽳浩条獥猯楬敤彲浩⽧楬敮瀮杮Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鿐胑뻐퀠킽톰➁‬⼧獣⽳浩条獥氯湩ㅥ瀮杮Ⱗ✠듐뗐觑뻐‬觑뻐퀠킒킰₼뿐뻐苑胑雑뇐뷐뻐퀠킷킽톰킂₸뿐胑뻐퀠킽톰톈ₖ뫐菑胑臑룐Ⱗ✠✱‬퀧킯₺뿐胑뻐닐뻐듐룐苑賑臑近퀠킽킰톲킇킰킽톽㾏Ⱗ✠듐냐믐雑퀠킿톾톏킁킽킵킽톽₏近뫐퀠킲₸뇐菑듐뗐苑뗐퀠톲킇톸킂톸톁₏뫐胑뻐뫐퀠킷₰뫐胑뻐뫐뻐볐Ⱗ✠✱‬㤧㠵硰Ⱗ✠듐뗐苑냐믐賑뷐雑裑뗐⸠⸮Ⱗ✠振獳椯慭敧⽳敨慸潧⹮湰❧‬퀧킓톾킂킾톲ₖ胑뻐럐뿐뻐蟑냐苑룐✿‬퀧킒킲킵톴톖톂₌듐냐뷐雑퀠₲蓑뻐胑볐菑퀠킽킸톶킇➵‬턧킀킾톷킈톸킀킵킽₰胑뗐铑臑苑胑냐蛑雑近Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鋐룐퀠킼킾킶통킂₵苑냐뫐뻐뛐퀠킷톰킀통톔톁톂톀킃킲톰킂톸톁₏蟑뗐胑뗐럐턠킁톾킆킼통킀킵톶㪖Ⱗ✠振獳椯慭敧⽳敮睴牯楫杮瀮杮Ⱗ✠振獳椯慭敧⽳潦浲潆⹮湰❧)ader2` varchar(100) NOT NULL,
  `arraySteps` varchar(10) NOT NULL,
  `stepSize` varchar(10) NOT NULL,
  `linkName` varchar(20) NOT NULL,
  `hexagon` varchar(255) NOT NULL,
  `formHeader1` varchar(50) NOT NULL,
  `formHeader2` varchar(50) NOT NULL,
  `regText` varchar(50) NOT NULL,
  `buttonStart` varchar(50) NOT NULL,
  `socialText` varchar(50) NOT NULL,
  `imageNetwork` varchar(255) NOT NULL,
  `formFon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 NGINE=InnoDB DEFAULT CHARS T=utf8 latedmessagesua`; 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              猶 턘鄰׉  Ȏ   턘  趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋    ₁2   ⊐Ɉ  遐׋     輘Ⱦ趐׋\bCOMMENT='((.+)[^'])'    趐׋   ₁2   ⊐Ɉ迠׋邈׋     躠Ⱦ趐׋   ₁2   ⊐Ɉ遐׋׉     踨Ⱦ趐׋詤_ ᴬ@䔐ҩ      �¤  襘_襴_覈_  趐׋Ұ  `message` = "..." n 趐׋詤_ ᴬ@愀ҩ      �¤  襘_襴_覈_  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci   趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋\bCOMMENT='((.+)[^'])' s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin2_croatian_ci  趐׋Ұ  performance_schema  趐׋Ұ  information_schema U趐׋Ұ  row_format=COMPACT ׄ趐׋Ұ  performance_schema  趐׋Ұ  latin1_german1_ci * 趐׋Ұ  row_format=COMPACT  趐׋Ұ  information_schema U趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci 8  趐׋Ұ  row_format=COMPACT  趐׋Ұ  aa_authorizations 㖠ׄ趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  row_format=COMPACT  趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  latin1_german1_ci  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci  趐׋Ұ  latin1_danish_ci   趐׋Ұ  latin1_german2_ci  趐׋Ұ  latin1_general_ci  趐׋Ұ  latin1_general_cs  趐׋Ұ  latin1_spanish_ci  趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  latin2_general_ci  趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  ascii_general_ci   趐׋Ұ  ujis_japanese_ci   趐׋Ұ  sjis_japanese_ci   趐׋Ұ  hebrew_general_ci  趐׋Ұ  koi8u_general_ci   趐׋Ұ  gb2312_chinese_ci  趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci ! 趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci  # 趐׋Ұ  latin5_turkish_ci $ 趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci & 趐׋Ұ  utf8_romanian_ci  ' 趐׋Ұ  utf8_slovenian_ci ( 趐׋Ұ  utf8_estonian_ci  ) 趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci  + 趐׋Ұ  utf8_esperanto_ci , 趐׋Ұ  utf8_hungarian_ci - 趐׋Ұ  utf8_croatian_ci  . 趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci 1 趐׋Ұ  ucs2_romanian_ci  2 趐׋Ұ  ucs2_slovenian_ci 3 趐׋Ұ  ucs2_estonian_ci  4 趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci  6 趐׋Ұ  ucs2_esperanto_ci 7 趐׋Ұ  ucs2_hungarian_ci 8 趐׋Ұ  ucs2_croatian_ci  9 趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci  < 趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci  > 趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci  @ 趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci B 趐׋Ұ  latin7_general_cs C 趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci H 趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci  M 趐׋Ұ  utf8mb4_danish_ci N 趐׋Ұ  utf8mb4_slovak_ci O 趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci  Q 趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci X 趐׋Ұ  cp1251_general_cs Y 趐׋Ұ  `message` != "..."  趐׋    ₁2   ፀɈ  膀׊      ؠҥ趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  koi8r_general_ci s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  ଲ 䵂ж   6 (      Ѐ         ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ꾃袓焣椗Ｕ焣꾃袓￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ놆蒖謦ｑ륢ﾌ튔ﾱ륢ﾌ謦ｑ검貑￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ漡률ﾊ륞ﾆ￿￿롞ﾆ뭥ﾎ渟￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ礯ｊ풛ﾵ￿￿￿￿￿￿튔ﾱ椗Ｕ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ蝅｝펏ﾰ횑ﾰ￿￿뭣ﾋ뭥ﾎ欛Ｘ鶝ﾝ붺ﾽ￬￭￭￮￯￯￯뺜ﾫ꩟ﾀ풔ﾳ￐멨ﾎ踫ｕ腓｣￿ÿꖥ￢쿍ￏ쯋ￋ쳌ￌ컎ￎ쿏ￏ탐￐틒ￒ뎗ﾡ陜ｱ赍､衇～豨ﭴ￿ÿ￿ÿꖥ￡쳋ￌ쟇ￇ죈￈쫊ￊ쯋ￋ췍ￍ컎ￎ탐￐퇑￑퓓ￔ￫ꂠ￿ÿ￿ÿꖥ�￟짇￉싂ￂ쓄ￄ업ￅ죈￈짉￉쫊ￊ쳌ￌ췍ￍ퇐￑￪ꂠ￿ÿ￿ÿꖥ�￟엃ￅ샀￀샀￀싂ￂ쏃ￃ쓄ￄ업ￅ죈￈짉￉췍ￍ￨ꂠ￿ÿ￿ÿ궭횭췇ￍ￤￤￥￥￥￦￦￧￨￨폍ￓꢨ￿ÿ￿ÿ䏥늲좲鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝꪪ�仡￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ံ 턘�  I 敩⁲敎ᅷ畇瑴௰׌Ұ  ucs2_slovenian_ci 浵敢௰׌Ұ  ucs2_estonian_ci ؁匐湹௰׌Ұ  ucs2_lithuanian_ci 攏௰׌Ұ  ucs2_spanish2_ci 敋灥慃௰׌Ұ  ucs2_esperanto_ci 呯扡௰׌Ұ  ucs2_hungarian_ci 湯ਆ௰׌Ұ  ucs2_croatian_ci 䰄晥ɴ௰׌Ұ  ucs2_unicode_520_ci ௰׌Ұ  ucs2_vietnamese_ci 瑸௰׌Ұ  cp866_general_ci 倉灯灵௰׌Ұ  keybcs2_general_ci 楄௰׌Ұ  macce_general_ci 瑴牥䘮௰׌Ұ  macroman_general_ci ௰׌Ұ  cp852_general_ci 晏獦瑥௰׌Ұ  latin7_estonian_cs 卌௰׌Ұ  latin7_general_ci 䥯摮௰׌Ұ  latin7_general_cs 楈敤௰׌Ұ  utf8mb4_general_ci 䑢௰׌Ұ  utf8mb4_unicode_ci 瀍௰׌Ұ  utf8mb4_latvian_ci 效௰׌Ұ  utf8mb4_romanian_ci ௰׌Ұ  utf8mb4_polish_ci 楴湯௰׌Ұ  utf8mb4_estonian_ci ௰׌Ұ  utf8mb4_spanish_ci 楧௰׌Ұ  utf8mb4_swedish_ci 湥௰׌Ұ  utf8mb4_turkish_ci 敧௰׌Ұ  utf8mb4_czech_ci 湯戌湴௰׌Ұ  utf8mb4_danish_ci 䤊慭௰׌Ұ  utf8mb4_slovak_ci 湴敒௰׌Ұ  utf8mb4_spanish2_ci ௰׌Ұ  utf8mb4_roman_ci 潔汯畂௰׌Ұ  utf8mb4_persian_ci 湯௰׌Ұ  utf8mb4_sinhala_ci 䉬௰׌Ұ  utf8mb4_german2_ci 慃௰׌Ұ  utf8mb4_croatian_ci ௰׌Ұ  cp1251_bulgarian_ci ௰׌Ұ  cp1251_ukrainian_ci ௰׌Ұ  cp1251_general_ci 楬正௰׌Ұ  cp1251_general_cs 浉条௰׌Ұ  utf16_general_ci 捩kऀ௰׌Ұ  utf16_unicode_ci 硥⸂匈௰׌Ұ  utf16_icelandic_ci 畮௰׌Ұ  utf16_latvian_ci 怮伇䍮௰׌Ұ  utf16_romanian_ci 硥䌇௰׌Ұ  utf16_slovenian_ci 湉௰׌Ұ  utf16_estonian_ci 䤊慭௰׌Ұ  utf16_spanish_ci 正 ਀௰׌Ұ  utf16_swedish_ci 慍湩伇௰׌Ұ  utf16_turkish_ci ቭ敭畮௰׌Ұ  utf16_lithuanian_ci ௰׌Ұ  utf16_spanish2_ci ͸௰׌Ұ  utf16_persian_ci 整潃畬௰׌Ұ  utf16_esperanto_ci 慐௰׌Ұ  utf16_hungarian_ci 敭௰׌Ұ  utf16_sinhala_ci 畃ʹ䀭௰׌Ұ  utf16_german2_ci 潃畬湭௰׌Ұ  utf16_croatian_ci 楬正௰׌Ұ  utf16_vietnamese_ci ௰׌Ұ  utf16le_general_ci 灕௰׌Ұ  cp1256_general_ci 潍敶௰׌Ұ  cp1257_general_ci 汯浵௰׌Ұ  utf32_general_ci 敲瑡䥥௰׌Ұ  utf32_unicode_ci 䥵整๭௰׌Ұ  utf32_icelandic_ci 潐௰׌Ұ  utf32_latvian_ci ݮ湏潐௰׌Ұ  utf32_romanian_ci 卵䱑௰׌Ұ  utf32_slovenian_ci 畮௰׌Ұ  utf32_estonian_ci 敳ݴ௰׌Ұ  utf32_spanish_ci 桧ɴ৳௰׌Ұ  utf32_swedish_ci 灵兓浌௰׌Ұ  utf32_turkish_ci ጂ畇瑴௰׌Ұ  utf32_lithuanian_ci ௰׌Ұ  utf32_spanish2_ci             ူ  킘킘꒨׌؅   킘  ᰠ׌ߴI᱘׌    ᰠ׌�ȶȶ      ᰠ׌ߴIᲈ׌    ᰠ׌ң        ᰠ׌ߴIᲸ׌    ᰠ׌ң        ᰠ׌ߴI᳨׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᴘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵈ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵸ׌    ᰠ׌�ҚҚ      ᰠ׌ߴIᶨ׌    ᰠ׌Ɂ        ᰠ׌ߴIᷘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIḈ׌    ᰠ׌Қ        ᰠ׌ߴIḸ׌    ᰠ׌ᩐɂ        ᰠ׌ߴIṨ׌    ᰠ׌Ɂ        ᰠ׌Ұ  108 ᰠ׌Ұ  65  ᰠ׌Ұ  50  ᰠ׌Ұ  130 ᰠ׌Ұ  128 ᰠ׌Ұ  100 ᰠ׌Ұ  0 0 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  0   ᰠ׌Ұ  771 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  100 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  508 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  167 ᰠ׌Ұ  100 ᰠ׌Ұ  86  ᰠ׌Ұ  80  ᰠ׌Ұ  0   ᰠ׌Ұ  2   ᰠ׌Ұ  1   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  0   ᰠ׌Ұ  
 Tᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  255 ᰠ׌Ұ  id Ⱦᰠ׌ߴI⍸׌    ᰠ׌䴀Ҙ        ᰠ׌ߴI⎨׌    ᰠ׌䴀Ҙ        ᰠ׌Ұ  CSV ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌㚠ȶ   瑳灥  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  7   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id Ⱦᰠ׌Ұ  255 ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  7  sᰠ׌Ұ  8  sᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  6 浰sᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  11 Ⱦᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  1 5 ᰠ׌Ұ  1 5 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  8  sᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌砰gҖ      ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌0_role|   ᰠ׌Ұ  
 Tᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌砰gﭜҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  id  ᰠ׌砰g⺔׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌砰g㄄׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌Ұ  
 Tᰠ׌砰gҖ    k ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌糨g    絼ɉ  ᰠ׌Ұ  0   ᰠ׌ߴI㓐׌    ᰠ׌Ұ  id  ᰠ׌ꫠҜ       ᰠ׌Ұ  id  ᰠ׌Ұ  );  ᰠ׌줠ȸ   0   ᰠ׌Ұ  id  ᰠ׌Ұ  xor ᰠ׌Ұ  1 5 ᰠ׌Ұ  use ᰠ׌糨g ğ 弼ɂ  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  id kᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌糨g    ɉ  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  8  sᰠ׌Ұ  
 0ᰠ׌Ұ  15  ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  
 0ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  11  ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  0 k ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  do rᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌ӣ  潃浭汄gᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  11  ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  0   ᰠ׌Ұ  8 1 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  
  ᰠ׌Ұ  20  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id yᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  60  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌ӣ  牕䵬湯 ᰠ׌ӣ  獐偁I ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌ӣ  祔䥰普oᰠ׌糨g    ⽌ּ  ᰠ׌Ұ  255 ᰠ׌ӣ  捁楴敶Xᰠ׌Ұ  255 ᰠ׌Ұ  id sᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  祓䥳楮tᰠ׌ӣ  祔数s ᰠ׌Ұ  255 ᰠ׌ӣ  汃獡敳sᰠ׌Ұ  0   ᰠ׌ӣ  桓佬橢 ᰠ׌ӣ  楗卮捯kᰠ׌ӣ  慍桴  ᰠ׌ӣ  慍歳s ᰠ׌ӣ  慭婤灩 ᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  潃獮獴 ᰠ׌ӣ  潃瑮牮sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  浉m  ᰠ׌ӣ  睄慭楰 ᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  浉䱧獩tᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  潔汯楗nᰠ׌ӣ  䱚扩  ᰠ׌ӣ  潃卭牴sᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  䍊湯瑳sᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  祓䵮浥oᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  汯慥捣 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  汏䑥B ᰠ׌ӣ  䑁䥏瑮 ᰠ׌ӣ  瑍x  ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  慍歳  ᰠ׌ӣ  灯楴湯sᰠ׌ӣ  摥瑩慶rᰠ׌ӣ  楶睥  ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  祳据扤 ᰠ׌ӣ  湰汧湡gᰠ׌ӣ  扁畯t ᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祔䥰普oᰠ׌ӣ  汃獡敳sᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  獀牴敬nᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  楙汥d ᰠ׌ӣ  汓敥p ᰠ׌ӣ  潍敶㈱ ᰠ׌ӣ  潍敶〲 ᰠ׌ӣ  潍敶㠲 ᰠ׌ӣ  潍敶㘳 ᰠ׌ӣ  潍敶㐴 ᰠ׌ӣ  潍敶㈵ ᰠ׌ӣ  潍敶〶 ᰠ׌ӣ  潍敶㠶 ᰠ׌ӣ  䝀瑥敍mᰠ׌ӣ  牅潲䅲tᰠ׌ӣ  牅潲r ᰠ׌ӣ  潍敶  ᰠ׌ӣ  慒摮浯 ᰠ׌ӣ  灕慃敳 ᰠ׌ӣ  牆捡  ᰠ׌ӣ  硅p  ᰠ׌ӣ  湌   ᰠ׌ӣ  煓瑲  ᰠ׌ӣ  剀問䑎 ᰠ׌ӣ  呀啒䍎 ᰠ׌ӣ  䅀灰湥dᰠ׌ӣ  敔瑸湉 ᰠ׌ӣ  敔瑸畏tᰠ׌ӣ  䅀獳杩nᰠ׌ӣ  汆獵h ᰠ׌ӣ  䙀畬桳 ᰠ׌ӣ  䍀潬敳 ᰠ׌ӣ  區瑥煅 ᰠ׌ӣ  區瑥畓bᰠ׌ӣ  偀睯〱 ᰠ׌ӣ  硅瑩汄lᰠ׌ӣ  䡀污ぴ ᰠ׌ӣ  䡀污t ᰠ׌ӣ  䅀獳牥tᰠ׌ӣ  南牴敓tᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  噀牡汃rᰠ׌ӣ  乀睥  ᰠ׌ӣ  彀汬畭lᰠ׌ӣ  彀汬楤vᰠ׌ӣ  彀汬潭dᰠ׌ӣ  彀汬桳lᰠ׌ӣ  楆摮卂 ᰠ׌ӣ  浀浥灣yᰠ׌ӣ  浀浥敳tᰠ׌ӣ  ⸮   ᰠ׌ӣ  䝀瑥汔sᰠ׌ӣ  敒瑣  ᰠ׌ӣ  潂湵獤 ᰠ׌ӣ  牆敥楓dᰠ׌ӣ  敂灥  ᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  畍䑬癩 ᰠ׌ӣ  汓敥p ᰠ׌ӣ  獬牴慣tᰠ׌ӣ  獬牴灣yᰠ׌ӣ  獬牴敬nᰠ׌ӣ  牁c  ᰠ׌ӣ  牁呣o ᰠ׌ӣ  楂䉴瑬 ᰠ׌ӣ  桃牯d ᰠ׌ӣ  汅楬獰eᰠ׌ӣ  湅䑤捯 ᰠ׌ӣ  湅偤条eᰠ׌ӣ  湅偤瑡hᰠ׌ӣ  楆汬杒nᰠ׌ӣ  偌潴偄 ᰠ׌ӣ  楌敮潔 ᰠ׌ӣ  慍歳求tᰠ׌ӣ  慐䉴瑬 ᰠ׌ӣ  楐e  ᰠ׌ӣ  潐祬潧nᰠ׌ӣ  慓敶䍄 ᰠ׌ӣ  敓剴偏2ᰠ׌ӣ  湅䵤湥uᰠ׌ӣ  敇䑴C ᰠ׌ӣ  敇䑴䕃xᰠ׌ӣ  敇䵴湥uᰠ׌ӣ  敇側潲pᰠ׌ӣ  獉桃汩dᰠ׌ӣ  敓䵴湥uᰠ׌ӣ  敓側潲pᰠ׌ӣ  敓剴捥tᰠ׌ӣ  潔獁楣iᰠ׌ӣ  楈潗摲 ᰠ׌ӣ  䝒B  ᰠ׌ӣ  牔浩瑓rᰠ׌ӣ  敒汰捡eᰠ׌ӣ  敋灥  ᰠ׌ӣ  潃祰R ᰠ׌ӣ  灕桃牡 ᰠ׌ӣ  灕瑓r ᰠ׌ӣ  潌䍷慨rᰠ׌ӣ  潌卷牴 ᰠ׌ӣ  潐即牴 ᰠ׌ӣ  潐味硥tᰠ׌ӣ  楆汬瑓rᰠ׌ӣ  畓卢牴 ᰠ׌ӣ  敄卣灥 ᰠ׌ӣ  协   ᰠ׌ӣ  楔正楄fᰠ׌ӣ  獆   ᰠ׌ӣ  慍楧c ᰠ׌ӣ  慍楧㥣5ᰠ׌ӣ  牔剹慥dᰠ׌ӣ  楍n  ᰠ׌ӣ  瑓牯e ᰠ׌ӣ  楚p  ᰠ׌ӣ  敄牣灹tᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敇却牴 ᰠ׌ӣ  慐獲e ᰠ׌ӣ  摁䱤湩kᰠ׌ӣ  敇䕴灢 ᰠ׌ӣ  摁敬㍲2ᰠ׌ӣ  楈瑳搳 ᰠ׌ӣ  ㍍d  ᰠ׌ӣ  潖l  ᰠ׌ӣ  潂瑴浯 ᰠ׌ӣ  潔p  ᰠ׌ӣ  慖彲  ᰠ׌ӣ  畃t  ᰠ׌ӣ  捄潔浂pᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  敇䙴湯tᰠ׌ӣ  牗敔瑸 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  慆汩摥 ᰠ׌ӣ  楢摮  ᰠ׌ӣ  潣湮捥tᰠ׌ӣ  瑨湯s ᰠ׌ӣ  敲癣  ᰠ׌ӣ  敳敬瑣 ᰠ׌ӣ  敳摮  ᰠ׌ӣ  敳摮潴 ᰠ׌ӣ  潳正瑥 ᰠ׌ӣ  楋汬硅tᰠ׌ӣ  獉敎䍷sᰠ׌ӣ  獉汃獡sᰠ׌ӣ  楐杮  ᰠ׌ӣ  敓摮瑓rᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  慍汩瑉 ᰠ׌ӣ  桃捥䥫tᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  摁䥤整mᰠ׌ӣ  獅p  ᰠ׌ӣ  扅p  ᰠ׌ӣ  潌ㅧ  ᰠ׌ӣ  摁偤牴 ᰠ׌ӣ  楆摮灂lᰠ׌ӣ  湉瑩  ᰠ׌ӣ  汃獯e ᰠ׌ӣ  䔮扁牯tᰠ׌ӣ  楄䵶摯 ᰠ׌ӣ  效䍸慨rᰠ׌ӣ  效䉸瑹eᰠ׌ӣ  慓敭瑓rᰠ׌ӣ  牔浩  ᰠ׌ӣ  癃䥴瑮 ᰠ׌ӣ  癃䥴瑮Wᰠ׌ӣ  潌摡瑓rᰠ׌ӣ  楆敬杁eᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䵲癯eᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獡 ᰠ׌ӣ  瑓乲睥 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  楔敭  ᰠ׌ӣ  潎w  ᰠ׌ӣ  敇䑴瑡eᰠ׌ӣ  敇呴浩eᰠ׌ӣ  扁牯t ᰠ׌ӣ  畐桳  ᰠ׌ӣ  潐p  ᰠ׌ӣ  敂灥  ᰠ׌ӣ  湁楳潐sᰠ׌ӣ  汓敥p ᰠ׌ӣ  祂整佳fᰠ׌ӣ  噀牡汃rᰠ׌ӣ  湁佹p ᰠ׌ӣ  敒污灏 ᰠ׌ӣ  慄整灏 ᰠ׌ӣ  湉佴p ᰠ׌ӣ  湉㙴伴pᰠ׌ӣ  畎汬灏 ᰠ׌ӣ  浅瑰佹pᰠ׌ӣ  畃牲灏 ᰠ׌ӣ  噀牡灏 ᰠ׌ӣ  畎汬  ᰠ׌ӣ  噀牡摁dᰠ׌ӣ  吮楌瑳 ᰠ׌ӣ  吮楂獴 ᰠ׌ӣ  吮楆敬rᰠ׌ӣ : ~0 rows (approximately)
/*!40000 ALTER TABLE `mainpagetranslated  鄰׉Ұ  latin1_german2_ci  鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  koi8r_general_ci s* 鄰׉Ұ  latin1_german1_ci ' 鄰׉Ұ  latin1_swedish_ci ' 鄰׉Ұ  latin1_danish_ci   鄰׉Ұ  latin1_general_ci  鄰׉Ұ  latin1_general_cs  鄰׉Ұ  latin1_spanish_ci  鄰׉Ұ  latin2_general_ci  鄰׉Ұ  cp850_general_ci A  鄰׉Ұ  latin1_swedish_ci   鄰׉Ұ  latin1_danish_ci    鄰׉Ұ  latin1_german2_ci   鄰׉Ұ  latin1_general_ci   鄰׉Ұ  latin1_general_cs   鄰׉Ұ  latin1_spanish_ci   鄰׉Ұ  latin2_general_ci   鄰׉Ұ  latin2_hungarian_ci 鄰׉Ұ  latin2_croatian_ci  鄰׉Ұ  ascii_general_ci    鄰׉Ұ  ujis_japanese_ci    鄰׉Ұ  sjis_japanese_ci    鄰׉Ұ  hebrew_general_ci   鄰׉Ұ  koi8u_general_ci    鄰׉Ұ  gb2312_chinese_ci   鄰׉Ұ  greek_general_ci    鄰׉Ұ  cp1250_general_ci   鄰׉Ұ  cp1250_croatian_ci  鄰׉Ұ  cp1250_polish_ci    鄰׉Ұ  latin5_turkish_ci   鄰׉Ұ  armscii8_general_ci 鄰׉Ұ  utf8_icelandic_ci   鄰׉Ұ  utf8_romanian_ci    鄰׉Ұ  utf8_slovenian_ci   鄰׉Ұ  utf8_estonian_ci    鄰׉Ұ  utf8_lithuanian_ci  鄰׉Ұ  utf8_spanish2_ci    鄰׉Ұ  utf8_esperanto_ci   鄰׉Ұ  utf8_hungarian_ci   鄰׉Ұ  utf8_croatian_ci    鄰׉Ұ  utf8_unicode_520_ci 鄰׉Ұ  utf8_vietnamese_ci  鄰׉Ұ  ucs2_icelandic_ci   鄰׉Ұ  ucs2_romanian_ci    鄰׉Ұ  ucs2_slovenian_ci   鄰׉Ұ  ucs2_estonian_ci    鄰׉Ұ  ucs2_lithuanian_ci  鄰׉Ұ  ucs2_spanish2_ci    鄰׉Ұ  ucs2_esperanto_ci   鄰׉Ұ  ucs2_hungarian_ci   鄰׉Ұ  ucs2_croatian_ci    鄰׉Ұ  ucs2_unicode_520_ci 鄰׉Ұ  ucs2_vietnamese_ci  鄰׉Ұ  cp866_general_ci    鄰׉Ұ  keybcs2_general_ci                        ﴰ Ｖ 횸횸뤀׊   횸  蹠׊Ұ б CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8       蹠׊CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8             蹠׊Ұ б CREATE TABLE ``mainpage`` (
  ``id`` int(11) NOT NULL,
  ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8        Ұ  Ͼ   ``language`` varchar(6) NOT NULL,
  ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 oDB DEFAULT CHARSET=utf8 noDB DEFAULT CHARSET=utf8       ꠁ׊Ұ  Ϝ   ``title`` varchar(100) NOT NULL,
  ``sliderHeader`` varchar(50) NOT NULL,
  ``sliderText`` varchar(255) NOT NULL,
  ``category`` varchar(32) NOT NULL,
  ``message`` varchar(50) NOT NULL,
  ``sliderTextureURL`` varchar(255) NOT NULL,
  ``sliderLineURL`` varchar(255) NOT NULL,
  ``sliderButtonText`` varchar(20) NOT NULL,
  ``header1`` varchar(50) NOT NULL,
  ``subLineImage`` varchar(255) NOT NULL,
  ``subheader1`` varchar(100) NOT NULL,
  ``arrayBlocks`` varchar(10) NOT NULL,
  ``header2`` varchar(50) NOT NULL,
  ``subheader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8                                 낁׊﷩  ϥ ⰰ✠慵Ⱗ✠义䥔䅔Ⱗ✠鿐ꃐ黐鏐ꃐ郐鳐ꏐ駐†鳐郐駐釐ꏐꋐ鷐蓐Ⱗ✠鷐뗐턠킃톿톃톁킂₸臑닐雑말턠킈킰톽₁럐볐雑뷐룐苑룐턠킁톲톖₂‭뻐苑胑룐볐냐말턠킏톺톖킁톽₃苑냐턠톁톃킇톰킁톽₃뻐臑닐雑苑菑턠ₖ臑苑냐뷐賑퀠킺킻톰킁킽킸₼臑뿐뗐蛑雑냐믐雑臑苑뻐볐✡‬洧楡灮条❥‬倧佒則䵁䘠呕剕❅‬⼧獣⽳浩条獥猯楬敤彲浩⽧整瑸牵⹥湰❧‬⼧獣⽳浩条獥猯楬敤彲浩⽧楬敮瀮杮Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鿐胑뻐퀠킽톰➁‬⼧獣⽳浩条獥氯湩ㅥ瀮杮Ⱗ✠듐뗐觑뻐‬觑뻐퀠킒킰₼뿐뻐苑胑雑뇐뷐뻐퀠킷킽톰킂₸뿐胑뻐퀠킽톰톈ₖ뫐菑胑臑룐Ⱗ✠✱‬퀧킯₺뿐胑뻐닐뻐듐룐苑賑臑近퀠킽킰톲킇킰킽톽㾏Ⱗ✠듐냐믐雑퀠킿톾톏킁킽킵킽톽₏近뫐퀠킲₸뇐菑듐뗐苑뗐퀠톲킇톸킂톸톁₏뫐胑뻐뫐퀠킷₰뫐胑뻐뫐뻐볐Ⱗ✠✱‬㤧㠵硰Ⱗ✠듐뗐苑냐믐賑뷐雑裑뗐⸠⸮Ⱗ✠振獳椯慭敧⽳敨慸潧⹮湰❧‬퀧킓톾킂킾톲ₖ胑뻐럐뿐뻐蟑냐苑룐✿‬퀧킒킲킵톴톖톂₌듐냐뷐雑퀠₲蓑뻐胑볐菑퀠킽킸톶킇➵‬턧킀킾톷킈톸킀킵킽₰胑뗐铑臑苑胑냐蛑雑近Ⱗ✠鿐黐Ꟑ郐ꋐ飐Ⱗ✠鋐룐퀠킼킾킶통킂₵苑냐뫐뻐뛐퀠킷톰킀통톔톁톂톀킃킲톰킂톸톁₏蟑뗐胑뗐럐턠킁톾킆킼통킀킵톶㪖Ⱗ✠振獳椯慭敧⽳敮睴牯楫杮瀮杮Ⱗ✠振獳椯慭敧⽳潦浲潆⹮湰❧)ader2`` varchar(100) NOT NULL,
  ``arraySteps`` varchar(10) NOT NULL,
  ``stepSize`` varchar(10) NOT NULL,
  ``linkName`` varchar(20) NOT NULL,
  ``hexagon`` varchar(255) NOT NULL,
  ``formHeader1`` varchar(50) NOT NULL,
  ``formHeader2`` varchar(50) NOT NULL,
  ``regText`` varchar(50) NOT NULL,
  ``buttonStart`` varchar(50) NOT NULL,
  ``socialText`` varchar(50) NOT NULL,
  ``imageNetwork`` varchar(255) NOT NULL,
  ``formFon`` varchar(255) NOT NULL,
  PRIMARY KEY (``id``)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 NGINE=InnoDB DEFAULT CHARS T=utf8 latedmessagesua``; 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              猶 턘鄰׉  Ȏ   턘  趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋    ₁2   ⊐Ɉ  遐׋     輘Ⱦ趐׋\bCOMMENT='((.+)[^'])'    趐׋   ₁2   ⊐Ɉ迠׋邈׋     躠Ⱦ趐׋   ₁2   ⊐Ɉ遐׋׉     踨Ⱦ趐׋詤_ ᴬ@䔐ҩ      �¤  襘_襴_覈_  趐׋Ұ  ``message`` = "..." n 趐׋詤_ ᴬ@愀ҩ      �¤  襘_襴_覈_  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_german1_ci   趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋\bCOMMENT='((.+)[^'])' s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin2_croatian_ci  趐׋Ұ  performance_schema  趐׋Ұ  information_schema U趐׋Ұ  row_format=COMPACT ׄ趐׋Ұ  performance_schema  趐׋Ұ  latin1_german1_ci * 趐׋Ұ  row_format=COMPACT  趐׋Ұ  information_schema U趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci 8  趐׋Ұ  row_format=COMPACT  趐׋Ұ  aa_authorizations 㖠ׄ趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  row_format=COMPACT  趐׋(;\s*)?InnoDB\s*free\:.*$ 趐׋Ұ  latin1_german1_ci  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci  趐׋Ұ  latin1_danish_ci   趐׋Ұ  latin1_german2_ci  趐׋Ұ  latin1_general_ci  趐׋Ұ  latin1_general_cs  趐׋Ұ  latin1_spanish_ci  趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  latin2_general_ci  趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  ascii_general_ci   趐׋Ұ  ujis_japanese_ci   趐׋Ұ  sjis_japanese_ci   趐׋Ұ  hebrew_general_ci  趐׋Ұ  koi8u_general_ci   趐׋Ұ  gb2312_chinese_ci  趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci ! 趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci  # 趐׋Ұ  latin5_turkish_ci $ 趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci & 趐׋Ұ  utf8_romanian_ci  ' 趐׋Ұ  utf8_slovenian_ci ( 趐׋Ұ  utf8_estonian_ci  ) 趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci  + 趐׋Ұ  utf8_esperanto_ci , 趐׋Ұ  utf8_hungarian_ci - 趐׋Ұ  utf8_croatian_ci  . 趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci 1 趐׋Ұ  ucs2_romanian_ci  2 趐׋Ұ  ucs2_slovenian_ci 3 趐׋Ұ  ucs2_estonian_ci  4 趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci  6 趐׋Ұ  ucs2_esperanto_ci 7 趐׋Ұ  ucs2_hungarian_ci 8 趐׋Ұ  ucs2_croatian_ci  9 趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci  < 趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci  > 趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci  @ 趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci B 趐׋Ұ  latin7_general_cs C 趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci H 趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci  M 趐׋Ұ  utf8mb4_danish_ci N 趐׋Ұ  utf8mb4_slovak_ci O 趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci  Q 趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci X 趐׋Ұ  cp1251_general_cs Y 趐׋Ұ  ``message`` != "..."  趐׋    ₁2   ፀɈ  膀׊      ؠҥ趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  koi8r_general_ci s* 趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  趐׋Ұ  utf8mb4_unicode_ci  趐׋Ұ  utf8mb4_latvian_ci  趐׋Ұ  utf8mb4_romanian_ci 趐׋Ұ  utf8mb4_polish_ci   趐׋Ұ  utf8mb4_estonian_ci 趐׋Ұ  utf8mb4_spanish_ci  趐׋Ұ  utf8mb4_swedish_ci  趐׋Ұ  utf8mb4_turkish_ci  趐׋Ұ  utf8mb4_czech_ci    趐׋Ұ  utf8mb4_danish_ci   趐׋Ұ  utf8mb4_slovak_ci   趐׋Ұ  utf8mb4_spanish2_ci 趐׋Ұ  utf8mb4_roman_ci    趐׋Ұ  utf8mb4_persian_ci  趐׋Ұ  utf8mb4_sinhala_ci  趐׋Ұ  utf8mb4_german2_ci  趐׋Ұ  utf8mb4_croatian_ci 趐׋Ұ  cp1251_bulgarian_ci 趐׋Ұ  cp1251_ukrainian_ci 趐׋Ұ  cp1251_general_ci   趐׋Ұ  cp1251_general_cs   趐׋Ұ  utf16_general_ci    趐׋Ұ  utf16_unicode_ci    趐׋Ұ  utf16_icelandic_ci  趐׋Ұ  utf16_latvian_ci    趐׋Ұ  utf16_romanian_ci   趐׋Ұ  utf16_slovenian_ci  趐׋Ұ  utf16_estonian_ci   趐׋Ұ  utf16_spanish_ci    趐׋Ұ  utf16_swedish_ci    趐׋Ұ  utf16_turkish_ci    趐׋Ұ  utf16_lithuanian_ci 趐׋Ұ  utf16_spanish2_ci   趐׋Ұ  utf16_persian_ci    趐׋Ұ  utf16_esperanto_ci  趐׋Ұ  utf16_hungarian_ci  趐׋Ұ  utf16_sinhala_ci    趐׋Ұ  utf16_german2_ci    趐׋Ұ  utf16_croatian_ci   趐׋Ұ  utf16_vietnamese_ci 趐׋Ұ  utf16le_general_ci  趐׋Ұ  cp1256_general_ci   趐׋Ұ  cp1257_general_ci   趐׋Ұ  utf32_general_ci    趐׋Ұ  utf32_unicode_ci    趐׋Ұ  utf32_icelandic_ci  趐׋Ұ  utf32_latvian_ci    趐׋Ұ  utf32_romanian_ci   趐׋Ұ  utf32_slovenian_ci  趐׋Ұ  utf32_estonian_ci   趐׋Ұ  utf32_spanish_ci    趐׋Ұ  utf32_swedish_ci    趐׋Ұ  utf32_turkish_ci    趐׋Ұ  utf32_lithuanian_ci 趐׋Ұ  utf32_spanish2_ci   趐׋Ұ  utf32_persian_ci    趐׋Ұ  utf32_esperanto_ci  趐׋Ұ  utf32_hungarian_ci  趐׋Ұ  utf32_sinhala_ci    趐׋Ұ  utf32_german2_ci    趐׋Ұ  utf32_croatian_ci   趐׋Ұ  utf32_vietnamese_ci 趐׋Ұ  geostd8_general_ci  趐׋Ұ  cp932_japanese_ci   趐׋Ұ  eucjpms_japanese_ci 趐׋Ұ  koi8r_general_ci s* 趐׋\bCOMMENT='((.+)[^'])'    趐׋Ұ  latin1_german1_ci * 趐׋Ұ  cp850_general_ci A  趐׋Ұ  latin1_swedish_ci   趐׋Ұ  latin1_danish_ci    趐׋Ұ  latin1_german2_ci   趐׋Ұ  latin1_general_ci   趐׋Ұ  latin1_general_cs   趐׋Ұ  latin1_spanish_ci   趐׋Ұ  latin2_general_ci   趐׋Ұ  latin2_hungarian_ci 趐׋Ұ  latin2_croatian_ci  趐׋Ұ  ascii_general_ci    趐׋Ұ  ujis_japanese_ci    趐׋Ұ  sjis_japanese_ci    趐׋Ұ  hebrew_general_ci   趐׋Ұ  koi8u_general_ci    趐׋Ұ  gb2312_chinese_ci   趐׋Ұ  greek_general_ci    趐׋Ұ  cp1250_general_ci   趐׋Ұ  cp1250_croatian_ci  趐׋Ұ  cp1250_polish_ci    趐׋Ұ  latin5_turkish_ci   趐׋Ұ  armscii8_general_ci 趐׋Ұ  utf8_icelandic_ci   趐׋Ұ  utf8_romanian_ci    趐׋Ұ  utf8_slovenian_ci   趐׋Ұ  utf8_estonian_ci    趐׋Ұ  utf8_lithuanian_ci  趐׋Ұ  utf8_spanish2_ci    趐׋Ұ  utf8_esperanto_ci   趐׋Ұ  utf8_hungarian_ci   趐׋Ұ  utf8_croatian_ci    趐׋Ұ  utf8_unicode_520_ci 趐׋Ұ  utf8_vietnamese_ci  趐׋Ұ  ucs2_icelandic_ci   趐׋Ұ  ucs2_romanian_ci    趐׋Ұ  ucs2_slovenian_ci   趐׋Ұ  ucs2_estonian_ci    趐׋Ұ  ucs2_lithuanian_ci  趐׋Ұ  ucs2_spanish2_ci    趐׋Ұ  ucs2_esperanto_ci   趐׋Ұ  ucs2_hungarian_ci   趐׋Ұ  ucs2_croatian_ci    趐׋Ұ  ucs2_unicode_520_ci 趐׋Ұ  ucs2_vietnamese_ci  趐׋Ұ  cp866_general_ci    趐׋Ұ  keybcs2_general_ci  趐׋Ұ  macce_general_ci    趐׋Ұ  macroman_general_ci 趐׋Ұ  cp852_general_ci    趐׋Ұ  latin7_estonian_cs  趐׋Ұ  latin7_general_ci   趐׋Ұ  latin7_general_cs   趐׋Ұ  utf8mb4_general_ci  ଲ 䵂ж   6 (      Ѐ         ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ꾃袓焣椗Ｕ焣꾃袓￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ놆蒖謦ｑ륢ﾌ튔ﾱ륢ﾌ謦ｑ검貑￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ漡률ﾊ륞ﾆ￿￿롞ﾆ뭥ﾎ渟￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ礯ｊ풛ﾵ￿￿￿￿￿￿튔ﾱ椗Ｕ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ蝅｝펏ﾰ횑ﾰ￿￿뭣ﾋ뭥ﾎ欛Ｘ鶝ﾝ붺ﾽ￬￭￭￮￯￯￯뺜ﾫ꩟ﾀ풔ﾳ￐멨ﾎ踫ｕ腓｣￿ÿꖥ￢쿍ￏ쯋ￋ쳌ￌ컎ￎ쿏ￏ탐￐틒ￒ뎗ﾡ陜ｱ赍､衇～豨ﭴ￿ÿ￿ÿꖥ￡쳋ￌ쟇ￇ죈￈쫊ￊ쯋ￋ췍ￍ컎ￎ탐￐퇑￑퓓ￔ￫ꂠ￿ÿ￿ÿꖥ�￟짇￉싂ￂ쓄ￄ업ￅ죈￈짉￉쫊ￊ쳌ￌ췍ￍ퇐￑￪ꂠ￿ÿ￿ÿꖥ�￟엃ￅ샀￀샀￀싂ￂ쏃ￃ쓄ￄ업ￅ죈￈짉￉췍ￍ￨ꂠ￿ÿ￿ÿ궭횭췇ￍ￤￤￥￥￥￦￦￧￨￨폍ￓꢨ￿ÿ￿ÿ䏥늲좲鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝ鶝ﾝꪪ�仡￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ￿ÿ                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ံ 턘�  I 敩⁲敎ᅷ畇瑴௰׌Ұ  ucs2_slovenian_ci 浵敢௰׌Ұ  ucs2_estonian_ci ؁匐湹௰׌Ұ  ucs2_lithuanian_ci 攏௰׌Ұ  ucs2_spanish2_ci 敋灥慃௰׌Ұ  ucs2_esperanto_ci 呯扡௰׌Ұ  ucs2_hungarian_ci 湯ਆ௰׌Ұ  ucs2_croatian_ci 䰄晥ɴ௰׌Ұ  ucs2_unicode_520_ci ௰׌Ұ  ucs2_vietnamese_ci 瑸௰׌Ұ  cp866_general_ci 倉灯灵௰׌Ұ  keybcs2_general_ci 楄௰׌Ұ  macce_general_ci 瑴牥䘮௰׌Ұ  macroman_general_ci ௰׌Ұ  cp852_general_ci 晏獦瑥௰׌Ұ  latin7_estonian_cs 卌௰׌Ұ  latin7_general_ci 䥯摮௰׌Ұ  latin7_general_cs 楈敤௰׌Ұ  utf8mb4_general_ci 䑢௰׌Ұ  utf8mb4_unicode_ci 瀍௰׌Ұ  utf8mb4_latvian_ci 效௰׌Ұ  utf8mb4_romanian_ci ௰׌Ұ  utf8mb4_polish_ci 楴湯௰׌Ұ  utf8mb4_estonian_ci ௰׌Ұ  utf8mb4_spanish_ci 楧௰׌Ұ  utf8mb4_swedish_ci 湥௰׌Ұ  utf8mb4_turkish_ci 敧௰׌Ұ  utf8mb4_czech_ci 湯戌湴௰׌Ұ  utf8mb4_danish_ci 䤊慭௰׌Ұ  utf8mb4_slovak_ci 湴敒௰׌Ұ  utf8mb4_spanish2_ci ௰׌Ұ  utf8mb4_roman_ci 潔汯畂௰׌Ұ  utf8mb4_persian_ci 湯௰׌Ұ  utf8mb4_sinhala_ci 䉬௰׌Ұ  utf8mb4_german2_ci 慃௰׌Ұ  utf8mb4_croatian_ci ௰׌Ұ  cp1251_bulgarian_ci ௰׌Ұ  cp1251_ukrainian_ci ௰׌Ұ  cp1251_general_ci 楬正௰׌Ұ  cp1251_general_cs 浉条௰׌Ұ  utf16_general_ci 捩kऀ௰׌Ұ  utf16_unicode_ci 硥⸂匈௰׌Ұ  utf16_icelandic_ci 畮௰׌Ұ  utf16_latvian_ci 怮伇䍮௰׌Ұ  utf16_romanian_ci 硥䌇௰׌Ұ  utf16_slovenian_ci 湉௰׌Ұ  utf16_estonian_ci 䤊慭௰׌Ұ  utf16_spanish_ci 正 ਀௰׌Ұ  utf16_swedish_ci 慍湩伇௰׌Ұ  utf16_turkish_ci ቭ敭畮௰׌Ұ  utf16_lithuanian_ci ௰׌Ұ  utf16_spanish2_ci ͸௰׌Ұ  utf16_persian_ci 整潃畬௰׌Ұ  utf16_esperanto_ci 慐௰׌Ұ  utf16_hungarian_ci 敭௰׌Ұ  utf16_sinhala_ci 畃ʹ䀭௰׌Ұ  utf16_german2_ci 潃畬湭௰׌Ұ  utf16_croatian_ci 楬正௰׌Ұ  utf16_vietnamese_ci ௰׌Ұ  utf16le_general_ci 灕௰׌Ұ  cp1256_general_ci 潍敶௰׌Ұ  cp1257_general_ci 汯浵௰׌Ұ  utf32_general_ci 敲瑡䥥௰׌Ұ  utf32_unicode_ci 䥵整๭௰׌Ұ  utf32_icelandic_ci 潐௰׌Ұ  utf32_latvian_ci ݮ湏潐௰׌Ұ  utf32_romanian_ci 卵䱑௰׌Ұ  utf32_slovenian_ci 畮௰׌Ұ  utf32_estonian_ci 敳ݴ௰׌Ұ  utf32_spanish_ci 桧ɴ৳௰׌Ұ  utf32_swedish_ci 灵兓浌௰׌Ұ  utf32_turkish_ci ጂ畇瑴௰׌Ұ  utf32_lithuanian_ci ௰׌Ұ  utf32_spanish2_ci             ူ  킘킘괘׌؈   킘  ᰠ׌ߴI᱘׌    ᰠ׌�ȶȶ      ᰠ׌ߴIᲈ׌    ᰠ׌ң        ᰠ׌ߴIᲸ׌    ᰠ׌ң        ᰠ׌ߴI᳨׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᴘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵈ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIᵸ׌    ᰠ׌�ҚҚ      ᰠ׌ߴIᶨ׌    ᰠ׌Ɂ        ᰠ׌ߴIᷘ׌    ᰠ׌䓠ȿ        ᰠ׌ߴIḈ׌    ᰠ׌Қ        ᰠ׌ߴIḸ׌    ᰠ׌ᩐɂ        ᰠ׌ߴIṨ׌    ᰠ׌Ɂ        ᰠ׌Ұ  108 ᰠ׌Ұ  65  ᰠ׌Ұ  50  ᰠ׌Ұ  130 ᰠ׌Ұ  128 ᰠ׌Ұ  100 ᰠ׌Ұ  0 0 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  0   ᰠ׌Ұ  771 ᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  5   ᰠ׌Ұ  6   ᰠ׌Ұ  7   ᰠ׌Ұ  8   ᰠ׌Ұ  9   ᰠ׌Ұ  10  ᰠ׌Ұ  100 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  508 ᰠ׌Ұ  0   ᰠ׌Ұ  1   ᰠ׌Ұ  167 ᰠ׌Ұ  100 ᰠ׌Ұ  86  ᰠ׌Ұ  80  ᰠ׌Ұ  0   ᰠ׌Ұ  2   ᰠ׌Ұ  1   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  0   ᰠ׌Ұ  
 Tᰠ׌Ұ  1   ᰠ׌Ұ  2   ᰠ׌Ұ  3   ᰠ׌Ұ  4   ᰠ׌Ұ  255 ᰠ׌Ұ  id Ⱦᰠ׌ߴI⍸׌    ᰠ׌䴀Ҙ        ᰠ׌ߴI⎨׌    ᰠ׌䴀Ҙ        ᰠ׌Ұ  CSV ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌㚠ȶ   瑳灥  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  7   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  13  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id Ⱦᰠ׌Ұ  255 ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  7  sᰠ׌Ұ  8  sᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  6 浰sᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  11 Ⱦᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  1 5 ᰠ׌Ұ  1 5 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  8  sᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌砰gҖ      ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌0_role|   ᰠ׌Ұ  
 Tᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌砰gﭜҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  id  ᰠ׌砰g⺔׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌砰gҖ      ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌砰g㄄׌     ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  0 1 ᰠ׌Ұ  id  ᰠ׌Ұ  
 Tᰠ׌砰gҖ    k ᰠ׌0_role|   ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌糨g    絼ɉ  ᰠ׌Ұ  0   ᰠ׌ߴI㓐׌    ᰠ׌Ұ  id  ᰠ׌ꫠҜ       ᰠ׌Ұ  id  ᰠ׌Ұ  );  ᰠ׌줠ȸ   0   ᰠ׌Ұ  id  ᰠ׌Ұ  xor ᰠ׌Ұ  1 5 ᰠ׌Ұ  use ᰠ׌糨g ğ 弼ɂ  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8 浰sᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8 ntᰠ׌Ұ  id kᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8  hᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  id kᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌糨g    ɉ  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  8  sᰠ׌Ұ  
 0ᰠ׌Ұ  15  ᰠ׌Ұ  8 ) ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  
 0ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  11  ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  8   ᰠ׌Ұ  id kᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8 ) ᰠ׌Ұ  8  sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8 浰sᰠ׌Ұ  id kᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  0   ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  0   ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id kᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 0ᰠ׌Ұ  id  ᰠ׌Ұ  0 k ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  do rᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌ӣ  潃浭汄gᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  11  ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  8   ᰠ׌Ұ  0   ᰠ׌Ұ  8   ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  15  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  60  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  0   ᰠ׌Ұ  8 1 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  
 Tᰠ׌Ұ  8   ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  1 5 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  
  ᰠ׌Ұ  20  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  20  ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  11  ᰠ׌Ұ  255 ᰠ׌Ұ  id yᰠ׌Ұ  id  ᰠ׌Ұ  id  ᰠ׌Ұ  255 ᰠ׌Ұ  
 0ᰠ׌Ұ  255 ᰠ׌Ұ  11  ᰠ׌Ұ  id  ᰠ׌Ұ  11  ᰠ׌Ұ  60  ᰠ׌Ұ  
 Tᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌Ұ  255 ᰠ׌ӣ  牕䵬湯 ᰠ׌ӣ  獐偁I ᰠ׌Ұ  0   ᰠ׌Ұ  id  ᰠ׌ӣ  祔䥰普oᰠ׌糨g    ⽌ּ  ᰠ׌Ұ  255 ᰠ׌ӣ  捁楴敶Xᰠ׌Ұ  255 ᰠ׌Ұ  id sᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  祓䥳楮tᰠ׌ӣ  祔数s ᰠ׌Ұ  255 ᰠ׌ӣ  汃獡敳sᰠ׌Ұ  0   ᰠ׌ӣ  桓佬橢 ᰠ׌ӣ  楗卮捯kᰠ׌ӣ  慍桴  ᰠ׌ӣ  慍歳s ᰠ׌ӣ  慭婤灩 ᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  潃獮獴 ᰠ׌ӣ  潃瑮牮sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  浉m  ᰠ׌ӣ  睄慭楰 ᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  浉䱧獩tᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  潔汯楗nᰠ׌ӣ  䱚扩  ᰠ׌ӣ  潃卭牴sᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  䍊湯瑳sᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  祓䵮浥oᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  汯慥捣 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  汏䑥B ᰠ׌ӣ  䑁䥏瑮 ᰠ׌ӣ  瑍x  ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  慍歳  ᰠ׌ӣ  灯楴湯sᰠ׌ӣ  摥瑩慶rᰠ׌ӣ  楶睥  ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  祳据扤 ᰠ׌ӣ  湰汧湡gᰠ׌ӣ  扁畯t ᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  祓瑳浥 ᰠ׌ӣ  楗摮睯sᰠ׌ӣ  祔䥰普oᰠ׌ӣ  汃獡敳sᰠ׌ӣ  佉瑕汩sᰠ׌ӣ  硕桔浥eᰠ׌ӣ  桔浥獥 ᰠ׌ӣ  敍畮s ᰠ׌ӣ  汆瑡䉓 ᰠ׌ӣ  楄污杯sᰠ׌ӣ  汃灩牢dᰠ׌ӣ  潆浲s ᰠ׌ӣ  灪来  ᰠ׌ӣ  偊G  ᰠ׌ӣ  婍楌b ᰠ׌ӣ  畂瑴湯sᰠ׌ӣ  祓䕮楤tᰠ׌ӣ  潃佭橢 ᰠ׌ӣ  硁瑃汲sᰠ׌ӣ  慔獢  ᰠ׌ӣ  硅䑴杬sᰠ׌ӣ  慍楰  ᰠ׌ӣ  敨灬牥sᰠ׌ӣ  䵆䉔摣 ᰠ׌ӣ  䉄   ᰠ׌ӣ  䑁䑏B ᰠ׌ӣ  煳桬汥pᰠ׌ӣ  䥇䥆杭 ᰠ׌ӣ  慍湩  ᰠ׌ӣ  獀牴敬nᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  楙汥d ᰠ׌ӣ  汓敥p ᰠ׌ӣ  潍敶㈱ ᰠ׌ӣ  潍敶〲 ᰠ׌ӣ  潍敶㠲 ᰠ׌ӣ  潍敶㘳 ᰠ׌ӣ  潍敶㐴 ᰠ׌ӣ  潍敶㈵ ᰠ׌ӣ  潍敶〶 ᰠ׌ӣ  潍敶㠶 ᰠ׌ӣ  䝀瑥敍mᰠ׌ӣ  牅潲䅲tᰠ׌ӣ  牅潲r ᰠ׌ӣ  潍敶  ᰠ׌ӣ  慒摮浯 ᰠ׌ӣ  灕慃敳 ᰠ׌ӣ  牆捡  ᰠ׌ӣ  硅p  ᰠ׌ӣ  湌   ᰠ׌ӣ  煓瑲  ᰠ׌ӣ  剀問䑎 ᰠ׌ӣ  呀啒䍎 ᰠ׌ӣ  䅀灰湥dᰠ׌ӣ  敔瑸湉 ᰠ׌ӣ  敔瑸畏tᰠ׌ӣ  䅀獳杩nᰠ׌ӣ  汆獵h ᰠ׌ӣ  䙀畬桳 ᰠ׌ӣ  䍀潬敳 ᰠ׌ӣ  區瑥煅 ᰠ׌ӣ  區瑥畓bᰠ׌ӣ  偀睯〱 ᰠ׌ӣ  硅瑩汄lᰠ׌ӣ  䡀污ぴ ᰠ׌ӣ  䡀污t ᰠ׌ӣ  䅀獳牥tᰠ׌ӣ  南牴敓tᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  潐s  ᰠ׌ӣ  噀牡汃rᰠ׌ӣ  乀睥  ᰠ׌ӣ  彀汬畭lᰠ׌ӣ  彀汬楤vᰠ׌ӣ  彀汬潭dᰠ׌ӣ  彀汬桳lᰠ׌ӣ  楆摮卂 ᰠ׌ӣ  浀浥灣yᰠ׌ӣ  浀浥敳tᰠ׌ӣ  ⸮   ᰠ׌ӣ  䝀瑥汔sᰠ׌ӣ  敒瑣  ᰠ׌ӣ  潂湵獤 ᰠ׌ӣ  牆敥楓dᰠ׌ӣ  敂灥  ᰠ׌ӣ  敇䅴偃 ᰠ׌ӣ  畍䑬癩 ᰠ׌ӣ  汓敥p ᰠ׌ӣ  獬牴慣tᰠ׌ӣ  獬牴灣yᰠ׌ӣ  獬牴敬nᰠ׌ӣ  牁c  ᰠ׌ӣ  牁呣o ᰠ׌ӣ  楂䉴瑬 ᰠ׌ӣ  桃牯d ᰠ׌ӣ  汅楬獰eᰠ׌ӣ  湅䑤捯 ᰠ׌ӣ  湅偤条eᰠ׌ӣ  湅偤瑡hᰠ׌ӣ  楆汬杒nᰠ׌ӣ  偌潴偄 ᰠ׌ӣ  楌敮潔 ᰠ׌ӣ  慍歳求tᰠ׌ӣ  慐䉴瑬 ᰠ׌ӣ  楐e  ᰠ׌ӣ  潐祬潧nᰠ׌ӣ  慓敶䍄 ᰠ׌ӣ  敓剴偏2ᰠ׌ӣ  湅䵤湥uᰠ׌ӣ  敇䑴C ᰠ׌ӣ  敇䑴䕃xᰠ׌ӣ  敇䵴湥uᰠ׌ӣ  敇側潲pᰠ׌ӣ  獉桃汩dᰠ׌ӣ  敓䵴湥uᰠ׌ӣ  敓側潲pᰠ׌ӣ  敓剴捥tᰠ׌ӣ  潔獁楣iᰠ׌ӣ  楈潗摲 ᰠ׌ӣ  䝒B  ᰠ׌ӣ  牔浩瑓rᰠ׌ӣ  敒汰捡eᰠ׌ӣ  敋灥  ᰠ׌ӣ  潃祰R ᰠ׌ӣ  灕桃牡 ᰠ׌ӣ  灕瑓r ᰠ׌ӣ  潌䍷慨rᰠ׌ӣ  潌卷牴 ᰠ׌ӣ  潐即牴 ᰠ׌ӣ  潐味硥tᰠ׌ӣ  楆汬瑓rᰠ׌ӣ  畓卢牴 ᰠ׌ӣ  敄卣灥 ᰠ׌ӣ  协   ᰠ׌ӣ  楔正楄fᰠ׌ӣ  獆   ᰠ׌ӣ  慍楧c ᰠ׌ӣ  慍楧㥣5ᰠ׌ӣ  牔剹慥dᰠ׌ӣ  楍n  ᰠ׌ӣ  瑓牯e ᰠ׌ӣ  楚p  ᰠ׌ӣ  敄牣灹tᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  湅潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敄潣敤 ᰠ׌ӣ  敇却牴 ᰠ׌ӣ  慐獲e ᰠ׌ӣ  摁䱤湩kᰠ׌ӣ  敇䕴灢 ᰠ׌ӣ  摁敬㍲2ᰠ׌ӣ  楈瑳搳 ᰠ׌ӣ  ㍍d  ᰠ׌ӣ  潖l  ᰠ׌ӣ  潂瑴浯 ᰠ׌ӣ  潔p  ᰠ׌ӣ  慖彲  ᰠ׌ӣ  畃t  ᰠ׌ӣ  捄潔浂pᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  敇䙴湯tᰠ׌ӣ  牗敔瑸 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  慆汩摥 ᰠ׌ӣ  楢摮  ᰠ׌ӣ  潣湮捥tᰠ׌ӣ  瑨湯s ᰠ׌ӣ  敲癣  ᰠ׌ӣ  敳敬瑣 ᰠ׌ӣ  敳摮  ᰠ׌ӣ  敳摮潴 ᰠ׌ӣ  潳正瑥 ᰠ׌ӣ  楋汬硅tᰠ׌ӣ  獉敎䍷sᰠ׌ӣ  獉汃獡sᰠ׌ӣ  楐杮  ᰠ׌ӣ  敓摮瑓rᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  慍汩瑉 ᰠ׌ӣ  桃捥䥫tᰠ׌ӣ  敒癣瑓rᰠ׌ӣ  敄䍣汯 ᰠ׌ӣ  摁䥤整mᰠ׌ӣ  摁䥤整mᰠ׌ӣ  獅p  ᰠ׌ӣ  扅p  ᰠ׌ӣ  潌ㅧ  ᰠ׌ӣ  摁偤牴 ᰠ׌ӣ  楆摮灂lᰠ׌ӣ  湉瑩  ᰠ׌ӣ  汃獯e ᰠ׌ӣ  䔮扁牯tᰠ׌ӣ  楄䵶摯 ᰠ׌ӣ  效䍸慨rᰠ׌ӣ  效䉸瑹eᰠ׌ӣ  慓敭瑓rᰠ׌ӣ  牔浩  ᰠ׌ӣ  癃䥴瑮 ᰠ׌ӣ  癃䥴瑮Wᰠ׌ӣ  潌摡瑓rᰠ׌ӣ  楆敬杁eᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䱲湥 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䕲摮 ᰠ׌ӣ  瑓䵲癯eᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲灯yᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓䍲浯pᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓卲慣nᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獯 ᰠ׌ӣ  瑓偲獡 ᰠ׌ӣ  瑓乲睥 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䙲瑭 ᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  瑓䱲浆tᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  潆浲瑡 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  浆却牴 ᰠ׌ӣ  楔敭  ᰠ׌ӣ  潎w  ᰠ׌ӣ  敇䑴瑡eᰠ׌ӣ  敇呴浩eᰠ׌ӣ  扁牯t ᰠ׌ӣ  畐桳  ᰠ׌ӣ  潐p  ᰠ׌ӣ  敂灥  ᰠ׌ӣ  湁楳潐sᰠ׌ӣ  汓敥p ᰠ׌ӣ  祂整佳fᰠ׌ӣ  噀牡汃rᰠ׌ӣ  湁佹p ᰠ׌ӣ  敒污灏 ᰠ׌ӣ  慄整灏 ᰠ׌ӣ  湉佴p ᰠ׌ӣ  湉㙴伴pᰠ׌ӣ  畎汬灏 ᰠ׌ӣ  浅瑰佹pᰠ׌ӣ  畃牲灏 ᰠ׌ӣ  噀牡灏 ᰠ׌ӣ  畎汬  ᰠ׌ӣ  噀牡摁dᰠ׌ӣ  吮楌瑳 ᰠ׌ӣ  吮楂獴 ᰠ׌ӣ  吮楆敬rᰠ׌ӣ ` DISABLE KEYS */;


-- Dumping structure for table int_ita_db.module
DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `module_ID` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `module_name` varchar(45) NOT NULL,
  `alias` varchar(10) NOT NULL,
  `language` varchar(6) NOT NULL,
  `module_duration_hours` int(11) NOT NULL,
  `module_duration_days` int(11) NOT NULL,
  `lesson_count` int(11) DEFAULT NULL,
  `module_price` decimal(10,0) DEFAULT NULL,
  `for_whom` text,
  `what_you_learn` text,
  `what_you_get` text,
  `module_img` varchar(255) DEFAULT NULL,
  `about_module` text,
  PRIMARY KEY (`module_ID`),
  UNIQUE KEY `module_ID` (`module_ID`),
  KEY `course` (`course`),
  CONSTRAINT `FK_module_course` FOREIGN KEY (`course`) REFERENCES `course` (`course_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.module: ~3 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`module_ID`, `course`, `module_name`, `alias`, `language`, `module_duration_hours`, `module_duration_days`, `lesson_count`, `module_price`, `for_whom`, `what_you_learn`, `what_you_get`, `module_img`, `about_module`) VALUES
	(1, 1, 'Основи PHP', 'start', 'ua', 14, 20, 6, 1256, 'для менеджерів проектів і тих, хто відповідає за постановку завдань на розробку;для дизайнерів, які готові почати не просто малювати красиві картинки, а й навчитися тому, як створювати працюючі і зручні інтерфейси;для розробників, які хочуть самостійно створити або змінити свій проект;', 'Ви навчитеся писати чистий код;Користуватися системами контролю версій;Дізнаєтеся, з чого складається сучасний додаток;Для чого потрібен безперервна інтеграція (СІ) сервер;Чому потрібно тестувати свої програми і як це робити;', 'Відеозаписи та текстові матеріали всіх онлайн-занять;Спілкування з розумними одногрупниками;Сертифікат про закінчення навчання;Прилаштованість на робоче місце в силіконовій долині;', '/css/images/courseimg1.png', NULL),
	(2, 2, 'Module 2', 'module2', 'ua', 30, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 'Module 3', 'module3', 'ua', 60, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.moduleresource
DROP TABLE IF EXISTS `moduleresource`;
CREATE TABLE IF NOT EXISTS `moduleresource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` int(11) NOT NULL,
  `idResource` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_moduleResource_moduleresource` (`idResource`),
  CONSTRAINT `FK_moduleResource_moduleresource` FOREIGN KEY (`idResource`) REFERENCES `moduleresource` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.moduleresource: ~0 rows (approximately)
/*!40000 ALTER TABLE `moduleresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `moduleresource` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.regextended
DROP TABLE IF EXISTS `regextended`;
CREATE TABLE IF NOT EXISTS `regextended` (
  `regID` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('UA','EN','RU') NOT NULL,
  `mainLink` varchar(30) NOT NULL,
  `regLink` varchar(30) NOT NULL,
  `header` varchar(50) NOT NULL,
  `headerFoto` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repeatPassword` varchar(50) NOT NULL,
  `submitButtonText` varchar(50) NOT NULL,
  `chooseFileButton` varchar(50) NOT NULL,
  `fileNotChoose` varchar(50) NOT NULL,
  PRIMARY KEY (`regID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.regextended: ~2 rows (approximately)
/*!40000 ALTER TABLE `regextended` DISABLE KEYS */;
INSERT INTO `regextended` (`regID`, `language`, `mainLink`, `regLink`, `header`, `headerFoto`, `firstName`, `middleName`, `lastName`, `dateOfBirth`, `education`, `tel`, `email`, `password`, `repeatPassword`, `submitButtonText`, `chooseFileButton`, `fileNotChoose`) VALUES
	(1, 'UA', 'Головна', 'Реєстрація', 'Персональні', 'Завантажити фото профілю', 'Ім\'я', 'По-батькові', 'Прізвище', 'Дата народження', 'Освіта', 'Телефон', 'Email', 'Пароль', 'Повтор пароля', 'Відправити />', 'Виберіть файл', 'Файл не вибрано ...'),
	(2, 'RU', 'Главная', 'Регистрация', 'Персональные данные', 'Загрузить фото профиля', 'Имя', 'Отчество', 'Фамилия', 'Дата рождения', 'Образование', 'Телефон', 'Еmail', 'Пароль', 'Повтор пароля', 'ОТПРАВИТЬ />', 'ВЫБЕРИТЕ ФАЙЛ', 'Файл не вибрано &hellip;');
/*!40000 ALTER TABLE `regextended` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.resource
DROP TABLE IF EXISTS `resource`;
CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `idResource` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.resource: ~0 rows (approximately)
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.sourcemessages
DROP TABLE IF EXISTS `sourcemessages`;
CREATE TABLE IF NOT EXISTS `sourcemessages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COMMENT='Table for interface messages (original - English).';

-- Dumping data for table int_ita_db.sourcemessages: ~88 rows (approximately)
/*!40000 ALTER TABLE `sourcemessages` DISABLE KEYS */;
INSERT INTO `sourcemessages` (`id`, `category`, `message`) VALUES
	(1, 'mainpage', 'INTITA'),
	(2, 'mainpage', 'About us'),
	(3, 'mainpage', 'How is the training?'),
	(4, 'mainpage', 'read more ...'),
	(5, 'slider', 'PROGRAM THE FUTURE'),
	(6, 'mainpage', 'something that you need to know about our courses'),
	(7, 'mainpage', 'then explain how you will learn step by step'),
	(8, 'slider', 'ENTER \\>'),
	(9, 'regform', 'Ready to get started?'),
	(10, 'regform', 'Enter data into the form below'),
	(11, 'regform', 'extended registration'),
	(12, 'regform', 'You can also enter by social networks:'),
	(13, 'regform', 'JOIN '),
	(14, 'regform', 'Email'),
	(15, 'regform', 'Password'),
	(16, 'header', 'Courses'),
	(17, 'header', 'Forum'),
	(18, 'header', 'About us'),
	(19, 'header', 'Sign in'),
	(20, 'header', 'Sign out'),
	(21, 'header', 'Teachers'),
	(22, 'header', 'Sign out'),
	(23, 'footer', 'tel: +38 0432 52 82 67'),
	(24, 'footer', 'mobile: +38 067 432 20 10'),
	(25, 'footer', 'e-mail: intita.hr@gmail.com'),
	(26, 'footer', 'skype: int.ita'),
	(27, 'slider', 'We guarantee you an offer of employment <br>\r\nAfter successful completion of training!'),
	(28, 'slider', 'Do not miss your chance to change the world - get high-quality and modern education <br>\r\nand become a specialist class !'),
	(29, 'slider', 'One year of productive and interesting learning - and you will become a professional programmer <br>\r\nready to work in the IT industry !'),
	(30, 'slider', 'Want to become a high-class specialist ? <br>\r\nTakes correct and informed decision - Learn with us!'),
	(31, 'slider', 'Do not lose your chance for creative , interesting, and challenging decent work - <br>\r\n plan their professional future today!'),
	(32, 'aboutus', 'What you dream about?'),
	(33, 'aboutus', 'Learning of the future'),
	(34, 'aboutus', 'Questions & feedback'),
	(35, 'aboutus', 'Try to guess: their own apartment or even a house? A good car? Foreign travel may have to exotic countries?'),
	(36, 'aboutus', 'Programming - it\'s not as hard as you can imagine. Of course, to become a good programmer, it takes time and effort.'),
	(37, 'aboutus', 'Three whales INTITA Independent Programming Academy training schedule. Only 100% of the necessary knowledge. The acquisition of 100% of knowledge!'),
	(38, 'step', 'Online Registration'),
	(39, 'step', 'Choosing course or module'),
	(40, 'step', 'Payment'),
	(41, 'step', 'Learning material'),
	(42, 'step', 'Completion of the course'),
	(43, 'step', 'step'),
	(44, 'step', 'To access the list of courses, modules and classes and pass free modules and classes register on the site. Registering will allow you to assess the quality and usability of our product that you will become a reliable partner and advisor to professional fulfillment.'),
	(45, 'step', 'To become a specialist in a certain direction and level (get professional specialization) choose to undergo appropriate course. If you are interested only deepen the knowledge in a particular area of IT, then choose the module to pass.'),
	(46, 'step', 'To start a course or module choose payment scheme (the entire amount for the course, month, potrymestrovo etc) and make a payment convenient way to You (payment scheme or course module can be changed also possible monthly payment on credit).'),
	(47, 'step', 'Learning material is possible by reading the text and / or viewing video for each session. During the development of the material classes perform intermediate tests. At the end of each session do the final test task. Each module ends with an individual project or exam. You can get individual counseling teacher or discuss the issue on the forum.'),
	(48, 'step', 'The result of course is the command thesis project, performed together with other students (the team recommends that forms an independent or executive who approved topic and terms of reference of the project). Filing project involves peredzahyst and protection in the online mode of presentation design.'),
	(49, 'breadcrumbs', 'Home'),
	(50, 'breadcrumbs', 'Courses'),
	(51, 'breadcrumbs', 'About us'),
	(52, 'breadcrumbs', 'Teachers'),
	(53, 'breadcrumbs', 'Forum'),
	(54, 'breadcrumbs', 'Profile'),
	(55, 'breadcrumbs', 'Edit profile'),
	(56, 'breadcrumbs', 'Register'),
	(57, 'breadcrumbs', 'Teacher profile'),
	(58, 'teachers', 'Our teachers'),
	(59, 'teachers', 'personal page'),
	(60, 'teachers', 'If you want professional IT and IT teach some courses or modules and cooperate with us in the field of training programmers write us a letter.\r\n'),
	(61, 'teachers', 'Read courses:'),
	(62, 'teachers', 'Read more'),
	(63, 'teachers', 'Reviews'),
	(64, 'teacher', 'Chapter:'),
	(65, 'teacher', 'About teacher:'),
	(66, 'courses', 'Our courses'),
	(67, 'courses', 'Concept of learning'),
	(68, 'courses', 'Level:'),
	(69, 'courses', 'Language:'),
	(70, 'lecture', 'Course:'),
	(71, 'lecture', 'Module:'),
	(72, 'lecture', 'Lecture '),
	(73, 'lecture', 'lang:'),
	(74, 'lecture', 'Type:'),
	(75, 'lecture', 'Duration:'),
	(76, 'lecture', 'min'),
	(77, 'lecture', 'Teacher'),
	(78, 'lecture', 'read more...'),
	(79, 'lecture', 'Schedule consultation'),
	(80, 'lecture', 'Table of contents'),
	(81, 'lecture', 'show'),
	(82, 'lecture', 'hide'),
	(83, 'lecture', 'Video'),
	(84, 'lecture', 'Code example'),
	(85, 'lecture', 'Instruction'),
	(86, 'lecture', 'Exercise'),
	(87, 'lecture', 'show again previous lecture'),
	(88, 'lecture', 'NEXT LECTURE'),
	(89, 'lecture', 'Answer'),
	(90, 'lecture', 'Final task');
/*!40000 ALTER TABLE `sourcemessages` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.step
DROP TABLE IF EXISTS `step`;
CREATE TABLE IF NOT EXISTS `step` (
  `stepID` int(11) NOT NULL AUTO_INCREMENT,
  `language` enum('UA','RU','EN') NOT NULL,
  `stepName` varchar(30) NOT NULL DEFAULT '0',
  `stepNumber` int(11) NOT NULL,
  `stepTitle` varchar(50) NOT NULL,
  `stepImagePath` varchar(255) NOT NULL DEFAULT '0',
  `stepImage` varchar(50) NOT NULL,
  `stepText` text NOT NULL,
  PRIMARY KEY (`stepID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.step: ~5 rows (approximately)
/*!40000 ALTER TABLE `step` DISABLE KEYS */;
INSERT INTO `step` (`stepID`, `language`, `stepName`, `stepNumber`, `stepTitle`, `stepImagePath`, `stepImage`, `stepText`) VALUES
	(1, 'UA', 'крок', 1, 'Реєстрація на сайті', '/css/images/', 'step1.jpg', 'Щоб отримати доступ до переліку курсів, модулів і занять та пройти безкоштовні модулі і заняття зареєструйся на сайті. Реєстрація дозволить тобі оцінити якість та зручність нашого продукт, який стане для тебе надійним партнером і порадником в професійній самореалізації.\r\n'),
	(2, 'UA', 'крок', 2, 'Вибір курсу чи модуля', '/css/images/', 'step2.jpg', '<p>Щоб стати спеціалістом певного напрямку та рівня (отримати професійну спеціалізацію) вибери для проходження відповідний курс. Якщо Тебе цікавить виключно поглиблення знань в певному напрямку ІТ, то вибери відповідний модуль для проходження.</p>'),
	(3, 'UA', 'крок', 3, 'Проплата', '/css/images/', 'step3.jpg', 'Щоб розпочати проходження курсу чи модуля вибери схему оплати (вся сума за курс, помісячно, потриместрово тощо) та здійсни оплату зручним Тобі способом (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит).'),
	(4, 'UA', 'крок', 4, 'Освоєння матеріалу', '/css/images/', 'step4.jpg', '<p>Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео для кожного заняття.\n    Протягом освоєння матеріалу заняття виконуй Проміжні тестові завдання. По завершенню кожного заняття виконуй Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом.\n    Можна отримати індивідуальну консультацію викладача чи обговорити питання на форумі.</p>'),
	(5, 'UA', 'крок', 5, 'Завершення курсу', '/css/images/', 'step5.jpg', 'Підсумком курсу є Командний дипломний проект, який виконується разом з іншими студентами (склад команди формуєш самостійно чи рекомендує керівник, який затверджує тему і технічне завдання проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації.');
/*!40000 ALTER TABLE `step` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.students
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `login` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `education` varchar(255) NOT NULL,
  `about_myself` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `certificates` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_repeat` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(150) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_joined` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `timezome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.students: ~0 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.studentsaccess
DROP TABLE IF EXISTS `studentsaccess`;
CREATE TABLE IF NOT EXISTS `studentsaccess` (
  `accessID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `lectureID` int(11) NOT NULL,
  `dateChange` date NOT NULL,
  PRIMARY KEY (`accessID`),
  KEY `FK_courseaccess_students` (`studentID`),
  KEY `FK_studentsaccess_course` (`courseID`),
  KEY `FK_studentsaccess_lectures` (`lectureID`),
  KEY `FK_studentsaccess_modules` (`moduleID`),
  CONSTRAINT `FK_courseaccess_students` FOREIGN KEY (`studentID`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_studentsaccess_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`course_ID`),
  CONSTRAINT `FK_studentsaccess_lectures` FOREIGN KEY (`lectureID`) REFERENCES `lecture` (`lectureID`),
  CONSTRAINT `FK_studentsaccess_modules` FOREIGN KEY (`moduleID`) REFERENCES `module` (`module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.studentsaccess: ~0 rows (approximately)
/*!40000 ALTER TABLE `studentsaccess` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentsaccess` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.teachers
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacherID` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_title` int(11) NOT NULL DEFAULT '0',
  `linkName` int(11) NOT NULL DEFAULT '0',
  `firstName` varchar(35) NOT NULL,
  `middleName` varchar(35) NOT NULL,
  `lastName` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `fotoURL` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `coursesArray` varchar(255) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `dateOfBirth` int(11) NOT NULL DEFAULT '0',
  `subjects` varchar(50) NOT NULL DEFAULT '0',
  `jobTitle` varchar(50) NOT NULL DEFAULT '0',
  `education` varchar(100) NOT NULL DEFAULT '0',
  `degree` varchar(50) NOT NULL DEFAULT '0',
  `articles` text NOT NULL,
  `otherTeacherDetailes` text NOT NULL,
  PRIMARY KEY (`teacherID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.teachers: ~0 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.teacherspage
DROP TABLE IF EXISTS `teacherspage`;
CREATE TABLE IF NOT EXISTS `teacherspage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(6) NOT NULL,
  `header` varchar(50) NOT NULL,
  `courses` varchar(50) NOT NULL,
  `link1` varchar(100) NOT NULL,
  `link2` varchar(100) NOT NULL,
  `BCmain` varchar(30) NOT NULL,
  `BCteachers` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.teacherspage: ~2 rows (approximately)
/*!40000 ALTER TABLE `teacherspage` DISABLE KEYS */;
INSERT INTO `teacherspage` (`id`, `lang`, `header`, `courses`, `link1`, `link2`, `BCmain`, `BCteachers`, `title`, `profile`) VALUES
	(1, 'UA', 'Our teachers', 'Веде курси:', 'Читати повністю', 'Відгуки про викладача', 'Головна', 'Викладачі', 'ІНТІТА - Викладачі', 'Персональна сторінка'),
	(2, 'RU', 'Наши преподаватели', 'Ведет курсы:', 'Читать полностью', 'Отзывы о преподавателе', 'Главная', 'Преподаватели', 'ИНТИТА - Преподаватели', 'Персональная страница');
/*!40000 ALTER TABLE `teacherspage` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.teacher_temp
DROP TABLE IF EXISTS `teacher_temp`;
CREATE TABLE IF NOT EXISTS `teacher_temp` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(6) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `foto_url` varchar(100) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `profile_text_big` text NOT NULL,
  `profile_text` text NOT NULL,
  `readMoreLink` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `linkName` varchar(50) NOT NULL,
  `smallImage` varchar(255) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.teacher_temp: ~6 rows (approximately)
/*!40000 ALTER TABLE `teacher_temp` DISABLE KEYS */;
INSERT INTO `teacher_temp` (`teacher_id`, `lang`, `first_name`, `middle_name`, `last_name`, `foto_url`, `subjects`, `profile_text_big`, `profile_text`, `readMoreLink`, `email`, `tel`, `skype`, `title`, `linkName`, `smallImage`) VALUES
	(1, 'UA', 'Олександра', 'Василівна', 'Сіра', '/css/images/teacher1.jpg', 'кройка и шитье сроков; програмування самоубийств', 'Народилася і виросла в Сакраменто, у 18 років вона переїхала до Лос-Анджелеса й незабаром стала вкладачем. У 2007, 2008 і 2010 рр.. вона виграла кілька номінацій премії AVN Awards (також була названа «Найкращою програмісткою» у 2007 році за версією XRCO). Паралельно з вікладауцью роботою та роботою програміста в Саша Грей грає головну роль в тестванні Інтернету.\r\n\r\nМарина Енн Генціс народилася у родині механіка. Її батько мав грецьке походження. Батьки дівчинки розлучилися коли їй було 5 років, надалі її виховувала мати, яка вступила в повторний шлюб у 2000 роц. Марина не ладнала з вітчимом, і, коли їй виповнилося 16 років, дівчина повідомила матері, що збирається покинути будинок. Достеменно невідомо, втекла вона з свого будинку або ж її відпустила мати. Сама Олександра пізніше зізнавалася, що в той час робила все те, що не подобалося її батькам і що вони їй забороняли.\r\n\r\nГлавный бухгалтер акционерного предприятия, специализирующегося на:\r\n\r\n    оказании полезных услуг горизонтального характера;\r\n    торговле, внешнеэкономической и внутреннеэкономической;\r\n    позитивное обучение швейного мастерства;\r\n\r\n Олександра Сіра виконала головну роль у фільмі оскароносного режисера Стівена Содерберга «Дівчина за викликом»[27][28]. Олександра грає дівчину на ім\'я Челсі, яка надає ескорт послуги заможним людям. Содерберг взяв її на роль після того, як прочитав статтю про неї у журналі Los Angeles, коментуючи це так: «She\'s kind of a new breed, I think. She doesn\'t really fit the typical mold of someone who goes into the adult film business. … I\'d never heard anybody talk about the business the way that she talked about it». Журналіст Скотт Маколей каже, що можливо Грей вибрала саме цю роль через свій інтерес до незалежних режисерів, таких як Жан-Люк Годар, Хармоні Корін, Девід Гордон Грін, Мікеланджело Антоніоні, Аньєс Варда та Вільям Клейн.\r\n\r\nКоли Олександра готувалася до ролі у «Дівчині за викликом», Содерберг попросив її подивитися «Жити своїм життям» і «Божевільний П\'єро»[29]. У фільмі «Жити своїм життям» піднімаються проблеми проституції, звідки Грей могла взяти щось і для своєї ролі, в той час як у «Божевільному П\'єро» показані відносини, схожі на ті, що відбуваються між Челсі, її хлопцем і клієнтами.\'; ', '<p>Профессиональный преподаватель бухгалтерского и налогового учета Национальноготранспортного университета кафедры финансов, учета и аудита со стажем преподавательской работы более 25 лет. Закончила аспирантуру, автор 36 научных работ в области учета и аудита, в т.ч. уникальной обучающей методики написания бухгалтерских проводок: <span>"Как украсть и не сесть" </span> и <span>"Как украсть и посадить другого" </span>.</p><p>Главный бухгалтер акционерного предприятия, специализирующегося на:<ul><li>оказании полезных услуг горизонтального характера;</li><li>торговле, внешнеэкономической и внутреннеэкономической;</li><li>позитивное обучение швейного мастерства;</li></ul></p>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png'),
	(2, 'UA', 'Константин', 'Константинович', 'Константинопольский', '/css/images/teacher2.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png'),
	(3, 'UA', 'Любовь', 'Анатольевна', 'Ктоятакая-Замухриншская', '/css/images/teacher3.jpg', 'Бухгалтер с «О» и до первой отсидки; Программирование своего позитивного прошлого', '', '<p>Практикующий главный бухгалтер. Учредитель ПП <span>«Логика тут безсильна»</span>;</p>\r\n<p>Образование высшее - ДонГУ (1987г.)</p>\r\n<p>Опыт работы 27 лет, в т. ч. преподавания - 9 лет.</p>\r\n<ul><li>специалист по позитивной энергетике;</li><li>эксперт по эффективному ремонту баянов;</li><li>мастер психотерапии для сложных бабушек и дедушек;</li></ul>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png'),
	(4, 'UA', 'Василий', 'Васильевич', 'Меняетпроффесию', '/css/images/teacher4.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png'),
	(5, 'UA', 'Ия', 'Тожевна', 'Воваяготова', '/css/images/teacher5.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png'),
	(6, 'UA', 'Петросян', 'Петросянович', 'Забугорный', '/css/images/teacher6.jpg', 'программування БДСМ; программування на Php для пострадавших в ЧАЭС; GlobalLoqic, Samsung, Coqniance', '', '<p>Консультант по вопросам бухгалтерского и налогового учета, отчетности для предприятий разной формы собственности. Преподаватель с многолетним стажем работы. <span>Реально шарит в компьютерах.</span></p><p>Автор технологии повышения квалификации специалистов экономического профиля.</p><p>Опыт преподавательской работы около 20 лет в учебных центрах и ВУЗах Киева. Опыт работы главным бухгалтером, финансовым директором. Большой опыт внедрения программ системы Виндовз 3:11.</p>', '/teacherProfile', 'ivanov@intita.org, ivanov@gmail.com', '/067/56-569-56, /093/26-45-65', 'ivanov.ivanov', '', '', '/css/images/teacherImage.png');
/*!40000 ALTER TABLE `teacher_temp` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.translatedmessagesru
DROP TABLE IF EXISTS `translatedmessagesru`;
CREATE TABLE IF NOT EXISTS `translatedmessagesru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(16) NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_translatedMessagesRU_sourcemessages` FOREIGN KEY (`id`) REFERENCES `sourcemessages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.translatedmessagesru: ~67 rows (approximately)
/*!40000 ALTER TABLE `translatedmessagesru` DISABLE KEYS */;
INSERT INTO `translatedmessagesru` (`id`, `language`, `translation`) VALUES
	(1, 'ru', 'INTITA'),
	(2, 'ru', 'О нас'),
	(3, 'ru', 'Как проходит обучение?'),
	(4, 'ru', 'далее ...'),
	(5, 'ru', 'ПРОГРАММИРУЙ БУДУЩЕЕ'),
	(6, 'ru', 'кое-что, что Вы должны знать о наших курсах'),
	(7, 'ru', 'далее о том, как Вы будете учиться шаг за шагом'),
	(8, 'ru', 'СТАРТ'),
	(9, 'ru', 'Готовы начать?'),
	(10, 'ru', 'Введите данные в форму ниже'),
	(11, 'ru', 'расширенная регистрация'),
	(12, 'ru', 'Вы также можете войти с помощью соцсетей:'),
	(13, 'ru', 'НАЧАТЬ'),
	(14, 'ru', 'Электронная почта'),
	(15, 'ru', 'Пароль'),
	(16, 'ru', 'Курсы'),
	(17, 'ru', 'Форум'),
	(18, 'ru', 'О нас'),
	(19, 'ru', 'Вход'),
	(20, 'ru', 'Выход'),
	(21, 'ru', 'Преподаватели'),
	(22, 'ru', 'Выход'),
	(23, 'ru', 'телефон: +38 0432 52 82 67 '),
	(24, 'ru', 'тел. моб. +38 067 432 20 10'),
	(25, 'ru', 'e-mail: intita.hr@gmail.com'),
	(26, 'ru', 'скайп: int.ita'),
	(27, 'ru', 'Мы гарантируем получение предложения работы<br>\r\nпосле успешного завершеня обучения!'),
	(28, 'ru', 'Хочешь стать классным специалистом, принимай правильное решение - поступай в ЫТ Академию  ИНТИТА!'),
	(29, 'ru', 'Один год упорного и интересного обучения - и ты станешь проессиональным программистом. Учиться тяжело -зато легко найти работу!'),
	(30, 'ru', 'Не упускай свой шанс на достойную и интересную работу - программируй свое будущее уже сегодня!'),
	(31, 'ru', 'Текст на пятой картинке слайдера'),
	(32, 'ru', 'О чем ты мечтаешь?'),
	(33, 'ru', 'Обучение будущего'),
	(34, 'ru', 'Вопросы и отзывы'),
	(35, 'ru', ''),
	(36, 'ru', ''),
	(37, 'ru', ''),
	(38, 'ru', 'Регистрация на сайте'),
	(39, 'ru', 'Выбор курса или модуля'),
	(40, 'ru', 'Оплата'),
	(41, 'ru', 'Изучение материала'),
	(42, 'ru', 'Завершение курса'),
	(43, 'ru', 'шаг'),
	(44, 'ru', ''),
	(45, 'ru', ''),
	(46, 'ru', ''),
	(47, 'ru', ''),
	(48, 'ru', ''),
	(49, 'ru', 'Главная'),
	(50, 'ru', 'Курсы'),
	(51, 'ru', 'О нас'),
	(52, 'ru', 'Преподаватели'),
	(53, 'ru', 'Форум'),
	(54, 'ru', 'Профиль'),
	(55, 'ru', 'Редактировать профиль'),
	(56, 'ru', 'Регистрация'),
	(57, 'ru', 'Профиль преподавателя'),
	(58, 'ru', 'Наши преподаватели'),
	(59, 'ru', 'персональная страница'),
	(60, 'ru', 'Если Вы профессиональный ІТ-шник и хотите преподавать некоторые ІТ курсы и сотрудничать с нами в подготовке программистов, напишите нам письмо.'),
	(61, 'ru', 'Ведет курсы:'),
	(62, 'ru', 'Читать полностью'),
	(63, 'ru', 'Отзывы'),
	(64, 'ru', 'Раздел:'),
	(65, 'ru', 'О преподавателе:'),
	(66, 'ru', 'Наши курсы'),
	(67, 'ru', 'Концепция подготовки'),
	(68, 'ru', 'Уровень курса:'),
	(69, 'ru', 'Язык курса:');
/*!40000 ALTER TABLE `translatedmessagesru` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.translatedmessagesua
DROP TABLE IF EXISTS `translatedmessagesua`;
CREATE TABLE IF NOT EXISTS `translatedmessagesua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(16) NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_translatedmessages_sourcemessages` FOREIGN KEY (`id`) REFERENCES `sourcemessages` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COMMENT='Table for translation interface messages (see sourceMessages). UA';

-- Dumping data for table int_ita_db.translatedmessagesua: ~88 rows (approximately)
/*!40000 ALTER TABLE `translatedmessagesua` DISABLE KEYS */;
INSERT INTO `translatedmessagesua` (`id`, `language`, `translation`) VALUES
	(1, 'ua', 'INTITA'),
	(2, 'ua', 'Про нас'),
	(3, 'ua', 'Як розпочати навчання?'),
	(4, 'ua', 'детальніше ...'),
	(5, 'ua', 'ПРОГРАМУЙ МАЙБУТНЄ'),
	(6, 'ua', 'Важлива інформація про навчання разом з нами'),
	(7, 'ua', 'П’ять кроків до здійснення твоїх мрій'),
	(8, 'ua', 'ПОЧАТИ \\>'),
	(9, 'ua', 'Готові розпочати?'),
	(10, 'ua', 'Введіть дані в форму нижче'),
	(11, 'ua', 'розширена реєстрація'),
	(12, 'ua', 'Ви можете також увійти через соцмережі:'),
	(13, 'ua', 'ПОЧАТИ'),
	(14, 'ua', 'Електронна пошта'),
	(15, 'ua', 'Пароль'),
	(16, 'ua', 'Курси'),
	(17, 'ua', 'Форум'),
	(18, 'ua', 'Про нас'),
	(19, 'ua', 'Вхід'),
	(20, 'ua', 'Вихід'),
	(21, 'ua', 'Викладачі'),
	(22, 'ua', 'Вихід'),
	(23, 'ua', 'телефон: +38 0432 52 82 67 '),
	(24, 'ua', 'тел. моб. +38 067 432 20 10'),
	(25, 'ua', 'e-mail: intita.hr@gmail.com'),
	(26, 'ua', 'скайп: int.ita'),
	(27, 'ua', 'Ми гарантуємо тобі отримання пропозиції працевлаштування<br>\r\nпісля успішного завершення навчання!'),
	(28, 'ua', 'Не упусти свій шанс змінити світ - отримай якісну та сучасну освіту<br>\r\nі стань класним спеціалістом!'),
	(29, 'ua', 'Один рік наполегливого та цікавого навчання - і ти станеш професійним програмістом<br>\r\nготовим працювати в індустрії інформаційних технологій!\r\n'),
	(30, 'ua', 'Хочеш стати висококласним спеціалістом?<br>\r\nПриймай вірне і виважене рішення - навчайся разом з нами! \r\n'),
	(31, 'ua', 'Не втрачай свій шанс на творчу, цікаву, гідну та перспективну працю –<br>\r\n плануй своє професійне майбутнє вже сьогодні!'),
	(32, 'ua', 'Про що мрієш ти?'),
	(33, 'ua', 'Навчання майбутнього'),
	(34, 'ua', 'Питання та відгуки'),
	(35, 'ua', 'Можливо, це свобода жити своїм життям? \r\nСамостійно керувати власним часом\r\nз можливістю заробляти, займаючись \r\nулюбленою справою і отримувати \r\nзадоволення від сучасної професії?'),
	(36, 'ua', 'На відміну від традиційних закладів, \r\nми не навчаємо задля оцінок.  \r\nМи працюємо індивідуально  \r\nз кожним студентом, щоб досягти \r\n100% засвоєння необхідних знань. '),
	(37, 'ua', 'Ми пропонуємо кожному нашому \r\nвипускнику гарантоване отримання \r\nпропозиції працевлаштування \r\nпротягом 4-6-ти місяців після \r\nуспішного завершення навчання.'),
	(38, 'ua', 'Реєстрація на сайті'),
	(39, 'ua', 'Вибір курсу чи модуля'),
	(40, 'ua', 'Проплата за навчання'),
	(41, 'ua', 'Освоєння матеріалу'),
	(42, 'ua', 'Завершення курсу'),
	(43, 'ua', 'крок'),
	(44, 'ua', 'Щоб отримати доступ до курсів та пройти безкоштовні модулі і заняття зареєструйся на сайті. Реєстрація дозволить тобі оцінити якість та зручність нашого продукт, який стане для тебе надійним партнером і порадником в професійній самореалізації.'),
	(45, 'ua', 'Щоб стати спеціалістом певного напрямку та рівня (отримати професійну спеціалізацію) вибери для проходження відповідний курс. Якщо Тебе цікавить виключно поглиблення знань в певному напрямку інформаційних технологій, то вибери відповідний модуль для проходження.'),
	(46, 'ua', 'Щоб розпочати проходження курсу чи модуля вибери схему оплати (вся сума за курс, оплата модулів, оплата потриместрово, помісячно тощо) та здійсни оплату зручним Тобі способом (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит).'),
	(47, 'ua', 'Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео для кожного заняття. Під час проходження заняття виконуй Проміжні тестові завдання. По завершенню кожного заняття виконуй Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом. 	Можна отримати індивідуальну консультацію викладача чи консультацію онлайн.'),
	(48, 'ua', 'Підсумком курсу є Командний дипломний проект, який виконується разом з іншими студентами (склад команди формуєш самостійно чи рекомендує керівник, який затверджує тему і технічне завдання проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації. Після захисту видається диплом та рекомендація для працевлаштування.'),
	(49, 'ua', 'Головна'),
	(50, 'ua', 'Курси'),
	(51, 'ua', 'Про нас'),
	(52, 'ua', 'Викладачі'),
	(53, 'ua', 'Форум'),
	(54, 'ua', 'Профіль'),
	(55, 'ua', 'Редагувати профіль'),
	(56, 'ua', 'Реєстрація'),
	(57, 'ua', 'Профіль викладача'),
	(58, 'ua', 'Наші викладачі'),
	(59, 'ua', 'персональна сторінка'),
	(60, 'ua', 'Якщо ви професійний ІТ-шник і бажаєте викладати окремі ІТ курси чи модулі і співпрацювати з нами в напрямку підготовки програмістів, напишіть нам листа.'),
	(61, 'ua', 'Веде курси:'),
	(62, 'ua', 'Читати повністю'),
	(63, 'ua', 'Відгуки'),
	(64, 'ua', 'Розділ:'),
	(65, 'ua', 'Про викладача:'),
	(66, 'ua', 'Наші курси'),
	(67, 'ua', 'Концепція підготовки'),
	(68, 'ua', 'Рівень курсу:'),
	(69, 'ua', 'Мова курсу:'),
	(70, 'ua', 'Курс:'),
	(71, 'ua', 'мова:'),
	(72, 'ua', 'Модуль:'),
	(73, 'ua', 'Заняття:'),
	(74, 'ua', 'Тип:'),
	(75, 'ua', 'Тривалість:'),
	(76, 'ua', 'хв'),
	(77, 'ua', 'Викладач'),
	(78, 'ua', 'детальніше'),
	(79, 'ua', 'Запланувати консультацію'),
	(80, 'ua', 'Зміст'),
	(81, 'ua', 'показати'),
	(82, 'ua', 'приховати'),
	(83, 'ua', 'Відео'),
	(84, 'ua', 'Зразок коду'),
	(85, 'ua', 'Інструкція'),
	(86, 'ua', 'Завдання'),
	(87, 'ua', 'переглянути знову попередній урок'),
	(88, 'ua', 'НАСТУПНИЙ УРОК'),
	(89, 'ua', 'Відповісти'),
	(90, 'ua', 'Підсумкове завдання');
/*!40000 ALTER TABLE `translatedmessagesua` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.typeresource
DROP TABLE IF EXISTS `typeresource`;
CREATE TABLE IF NOT EXISTS `typeresource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.typeresource: ~0 rows (approximately)
/*!40000 ALTER TABLE `typeresource` DISABLE KEYS */;
/*!40000 ALTER TABLE `typeresource` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `birthday` varchar(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `hash` varchar(20) NOT NULL,
  `address` text,
  `education` varchar(255) DEFAULT NULL,
  `educform` varchar(60) NOT NULL DEFAULT '0',
  `interests` text,
  `aboutUs` text,
  `aboutMy` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/css/images/avatars/noname.png',
  `role` varchar(255) NOT NULL DEFAULT '',
  `network` varchar(255) DEFAULT NULL,
  `identity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.user: ~9 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `firstName`, `middleName`, `secondName`, `nickname`, `birthday`, `email`, `password`, `phone`, `hash`, `address`, `education`, `educform`, `interests`, `aboutUs`, `aboutMy`, `avatar`, `role`, `network`, `identity`) VALUES
	(1, 'Вова', 'Джа', 'Марля', 'Wizlight', '21/03/1997', 'Wizlightdragon@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42', '911', '', 'Ямайка', 'ВДПУ', 'Онлайн', 'Ковбаска, колобки, раста', 'Інтернет', 'Володію албанською. Люблю м\'ясо та до м\'яса. Розвожу королів. ', '/css/images/1id.jpg', '', NULL, NULL),
	(5, 't54wy6wy@ferwg.gtrf', NULL, NULL, NULL, NULL, 't54wy6wy@ferwg.gtrf', 'egrwhjet6', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL),
	(6, 'dfesafhe@fjgr.gfrje', NULL, NULL, NULL, NULL, 'dfesafhe@fjgr.gfrje', 'fkrjgfrklfjrlk', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL),
	(7, 'fhsdgfh@deyg.gdehj', NULL, NULL, NULL, NULL, 'fhsdgfh@deyg.gdehj', 'vfdvdf', NULL, '', NULL, NULL, 'Не вибрано', NULL, NULL, NULL, '', '', NULL, NULL),
	(8, 'admin@EHJBF.SNDFS', NULL, NULL, NULL, NULL, 'admin@EHJBF.SNDFS', 'd6877098041a8a30bc8bd8f9faeeb8e62afd682f', NULL, '', NULL, NULL, 'Не вибрано', NULL, NULL, NULL, '', '', NULL, NULL),
	(9, 'gfvzdrgfregt', NULL, '', '', '', 'gfsGFea@EFSF.DEW', '011c945f30ce2cbafc452f39840f025693339c42', '', '', '', '', 'Онлайн', '', '', '', '', '0', NULL, NULL),
	(10, 'Wizlightdrago@gmail.com', NULL, NULL, NULL, NULL, 'Wizlightdrago@gmail.com', '17ba0791499db908433b80f37c5fbc89b870084b', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '', '', NULL, NULL),
	(12, 'dawfawef@efew.rew', NULL, NULL, NULL, NULL, 'dawfawef@efew.rew', '011c945f30ce2cbafc452f39840f025693339c42', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '/css/images/avatars/noname.png', '', NULL, NULL),
	(13, 'gtsgrstg@fretf.gtr', NULL, NULL, NULL, NULL, 'gtsgrstg@fretf.gtr', '011c945f30ce2cbafc452f39840f025693339c42', NULL, '', NULL, NULL, '', NULL, NULL, NULL, '/css/images/avatars/noname.png', '', NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table int_ita_db.user12
DROP TABLE IF EXISTS `user12`;
CREATE TABLE IF NOT EXISTS `user12` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.user12: ~0 rows (approximately)
/*!40000 ALTER TABLE `user12` DISABLE KEYS */;
/*!40000 ALTER TABLE `user12` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
