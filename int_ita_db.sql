-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.21-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных int_ita_db
CREATE DATABASE IF NOT EXISTS `int_ita_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `int_ita_db`;


-- Дамп структуры для таблица int_ita_db.action
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `key` varchar(128) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.action: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
INSERT INTO `action` (`id`, `type`, `key`, `title`, `text`) VALUES
	(1, 1, 'тест', 'ТОЛЬКО СЕГОДНЯ!', 'ПРИ ЗАМЕНЕ МАСЛА В ДВИГАТЕЛЕ —\r\nДИАГНОСТИКА ХОДОВОЙ ЧАСТИ В ПОДАРОК!'),
	(2, 1, 'тест', 'НЕ ТОЛЬКО СЕГОДНЯ!', 'Описание акции\r\n'),
	(3, 1, 'тест2', 'ТЕСТ2', 'ТЕСТ2'),
	(4, 2, 'тест', 'Плановое <span>послегарантийное ТО</span> для Ford* стало еще доступнее! <span>3899 рублей</span> за все + бесплатная диагностика ходовой части автомобиля', '* Для моделей марки Ford: Focus, Fiesta, Fusion, C-Max, Mondeo, S-Max, Galaxy, Tourneo, Transit, Connect'),
	(5, 2, 'тест', 'Тест', 'Тест');
/*!40000 ALTER TABLE `action` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.course
CREATE TABLE IF NOT EXISTS `course` (
  `course_ID` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(45) NOT NULL,
  `course_duration_hours` int(11) NOT NULL,
  PRIMARY KEY (`course_ID`),
  UNIQUE KEY `course_name` (`course_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.course: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`course_ID`, `course_name`, `course_duration_hours`) VALUES
	(1, 'Course 1. OOP', 40),
	(2, 'Course 2. Programming', 120),
	(3, 'Course 3. Math', 30),
	(4, 'Course 4. Discrete math', 40),
	(5, 'Course 5', 36),
	(6, 'Course 6', 130),
	(7, 'Course 7', 64),
	(8, 'Course 8', 54),
	(9, 'Course 9', 90);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.hometasks
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

-- Дамп данных таблицы int_ita_db.hometasks: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `hometasks` DISABLE KEYS */;
INSERT INTO `hometasks` (`hometask_ID`, `fkmodule_ID`, `fklecture_ID`, `hometask_name`, `hometask_description`, `hometask_url`) VALUES
	(1, 23, 34, 'Hometask 1', 'Description 1', 'URL 1'),
	(2, 2, 2, 'Hometask 2', 'Descipion 2', 'URL 2');
/*!40000 ALTER TABLE `hometasks` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.lectures
CREATE TABLE IF NOT EXISTS `lectures` (
  `lecture_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkcourse_ID` int(11) NOT NULL,
  `fkmodule_ID` int(11) NOT NULL,
  `name_classes` varchar(45) NOT NULL,
  `goal_of_classes` varchar(45) NOT NULL,
  `total_number_of_items` int(11) NOT NULL,
  `duration_in_hours` int(11) NOT NULL,
  PRIMARY KEY (`lecture_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.lectures: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `lectures` DISABLE KEYS */;
INSERT INTO `lectures` (`lecture_ID`, `fkcourse_ID`, `fkmodule_ID`, `name_classes`, `goal_of_classes`, `total_number_of_items`, `duration_in_hours`) VALUES
	(1, 1, 1, 'Name classes 1', 'Goal of classes 1', 10, 100),
	(2, 2, 2, 'Name classes 2', 'Goal of classes 2', 5, 50),
	(3, 3, 3, 'Name of classes 3', 'Goal of classes 3 ', 3, 30);
/*!40000 ALTER TABLE `lectures` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.modules
CREATE TABLE IF NOT EXISTS `modules` (
  `module_ID` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(45) NOT NULL,
  `module_duration_hours` int(11) NOT NULL,
  `module_duration_days` int(11) NOT NULL,
  PRIMARY KEY (`module_ID`),
  UNIQUE KEY `module_ID` (`module_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.modules: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` (`module_ID`, `module_name`, `module_duration_hours`, `module_duration_days`) VALUES
	(1, 'Module 1', 40, 20),
	(2, 'Module 2', 30, 15),
	(3, 'Module 3', 60, 30);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.partner
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.partner: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
INSERT INTO `partner` (`id`, `pic`, `name`) VALUES
	(1, '541df1da33fe0.jpg', 'ОАО «Мегафон»'),
	(2, '541df1f02ba41.jpg', 'Skoda'),
	(3, '541df20189e1c.jpg', 'Volkswagen'),
	(4, '541df21773ee9.jpg', 'Chevrolet'),
	(5, '541df23354df5.jpg', 'Audi');
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.setting: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `key`, `value`) VALUES
	(8, 'контакты: адрес', 'СПБ, ул. ватутина 17\r\nлитера И'),
	(9, 'контакты: телефон 1', '8 (921) 868-86-50'),
	(10, 'контакты: телефон 2', '8 (812) 416-53-23');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.students
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `tel` int(13) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_joined` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `timezome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `FK_students_users` FOREIGN KEY (`email`) REFERENCES `users` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.students: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.studentsaccess
CREATE TABLE IF NOT EXISTS `studentsaccess` (
  `id_access` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `date_of_change` date NOT NULL,
  PRIMARY KEY (`id_access`),
  KEY `FK_courseaccess_students` (`student_id`),
  KEY `FK_studentsaccess_course` (`course_id`),
  KEY `FK_studentsaccess_lectures` (`lecture_id`),
  KEY `FK_studentsaccess_modules` (`module_id`),
  CONSTRAINT `FK_courseaccess_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `FK_studentsaccess_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_ID`),
  CONSTRAINT `FK_studentsaccess_lectures` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`lecture_ID`),
  CONSTRAINT `FK_studentsaccess_modules` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.studentsaccess: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `studentsaccess` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentsaccess` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `foto_url` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '0',
  `date_of_birth` int(11) NOT NULL DEFAULT '0',
  `subjects` varchar(50) NOT NULL DEFAULT '0',
  `job_title` varchar(50) NOT NULL DEFAULT '0',
  `education` varchar(100) NOT NULL DEFAULT '0',
  `degree` varchar(50) NOT NULL DEFAULT '0',
  `articles` text NOT NULL,
  `other_teacher_detailes` text NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `email` (`email`),
  CONSTRAINT `FK_teachers_users` FOREIGN KEY (`email`) REFERENCES `users` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.teachers: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `post` varchar(64) DEFAULT NULL,
  `pic` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.team: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`id`, `name`, `post`, `pic`) VALUES
	(1, 'Кузнецов  Андрей  Сергеевич', 'слесарь', '541dff9af18fe.jpg'),
	(2, 'Квентин', 'сантехник', '541dffd7e4f9f.jpg'),
	(3, 'Арни', 'электрик', '541e015b628be.jpg'),
	(4, 'Аврил', 'пост', '541e01d395797.jpg'),
	(5, 'Бриттани Мерфи', 'пост', '541e01ecd43b2.jpg');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.tests
CREATE TABLE IF NOT EXISTS `tests` (
  `test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `test_title` varchar(45) NOT NULL,
  `test_description` varchar(45) NOT NULL,
  `test_url` varchar(45) NOT NULL,
  PRIMARY KEY (`test_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.tests: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` (`test_ID`, `fkmodule_ID`, `fklecture_ID`, `test_title`, `test_description`, `test_url`) VALUES
	(1, 2, 2, 'Test 2', 'Description 2', 'URL 2'),
	(2, 3, 3, 'Test 3', 'Description 3', 'URL 3');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.theoreticalsmaterials
CREATE TABLE IF NOT EXISTS `theoreticalsmaterials` (
  `tm_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `TM_name` varchar(45) NOT NULL,
  `TM_description` varchar(45) NOT NULL,
  `TM_url` varchar(255) NOT NULL,
  PRIMARY KEY (`tm_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.theoreticalsmaterials: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `theoreticalsmaterials` DISABLE KEYS */;
INSERT INTO `theoreticalsmaterials` (`tm_ID`, `fkmodule_ID`, `fklecture_ID`, `TM_name`, `TM_description`, `TM_url`) VALUES
	(1, 1, 1, 'TM 1', 'Description 1', 'URL 1'),
	(2, 2, 2, 'TM 2', 'Description 2', 'URL 2');
/*!40000 ALTER TABLE `theoreticalsmaterials` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(35) NOT NULL,
  `user_passwd` varchar(40) NOT NULL,
  `user_hash` varchar(20) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_email`, `user_passwd`, `user_hash`, `user_status`) VALUES
	(1, 'mail1@mail.com', 'qwerty', '67896', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `video_ID` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodule_ID` int(11) NOT NULL,
  `fklecture_ID` int(11) NOT NULL,
  `video_name` varchar(45) NOT NULL,
  `video_description` varchar(45) NOT NULL,
  `video_url` varchar(45) NOT NULL,
  `video_durationin_seconds` int(11) NOT NULL,
  PRIMARY KEY (`video_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.videos: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`video_ID`, `fkmodule_ID`, `fklecture_ID`, `video_name`, `video_description`, `video_url`, `video_durationin_seconds`) VALUES
	(1, 1, 1, 'Video 1', 'Description 1', 'URL 1', 344);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;


-- Дамп структуры для таблица int_ita_db.work
CREATE TABLE IF NOT EXISTS `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы int_ita_db.work: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `work` DISABLE KEYS */;
INSERT INTO `work` (`id`, `pic`) VALUES
	(1, '541e07c54d6dd.jpg'),
	(2, '541e07d1ac263.jpg'),
	(3, '541e0891cf927.JPG'),
	(4, '541e08b045a64.JPG'),
	(5, '541e08bfb93c8.JPG'),
	(6, '541e08dfc8fc1.JPG');
/*!40000 ALTER TABLE `work` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
