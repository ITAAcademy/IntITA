-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2015-05-06 19:47:12
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table int_ita_db.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `language` varchar(16) NOT NULL,
  `translation` text NOT NULL,
  KEY `FK_messages_sourcemessages` (`id`),
  CONSTRAINT `FK_messages_sourcemessages` FOREIGN KEY (`id`) REFERENCES `sourcemessages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table int_ita_db.messages: ~680 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `language`, `translation`) VALUES
	(1, 'ua', 'INTITA'),
	(2, 'ua', 'Про нас'),
	(3, 'ua', 'Як розпочати навчання?'),
	(4, 'ua', 'детальніше ...'),
	(5, 'ua', 'ПРОГРАМУЙ МАЙБУТНЄ'),
	(6, 'ua', 'Важлива інформація про навчання разом з нами'),
	(7, 'ua', 'П’ять кроків до здійснення твоїх мрій'),
	(8, 'ua', 'ПОЧАТИ  />'),
	(9, 'ua', 'Реєстрація в один клік'),
	(10, 'ua', 'Введіть дані в форму нижче'),
	(11, 'ua', 'розширена реєстрація'),
	(12, 'ua', 'Зареєструватись через соцмережі'),
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
	(34, 'ua', 'Важливі питання'),
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
	(60, 'ua', 'Якщо ви професійний ІТ-шник і бажаєте викладати окремі ІТ теми чи модулі і співпрацювати з нами в напрямку підготовки програмістів, напишіть нам листа.'),
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
	(73, 'ua', 'Заняття'),
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
	(90, 'ua', 'Підсумкове завдання'),
	(91, 'ua', 'Ви можете також увійти через соцмережі:'),
	(92, 'ua', 'Забули пароль?'),
	(93, 'ua', 'ВВІЙТИ'),
	(94, 'ua', 'Стан курсу: '),
	(95, 'ua', 'Профіль студента'),
	(96, 'ua', 'Редагувати </br> профіль'),
	(97, 'ua', ' років'),
	(98, 'ua', ' рік'),
	(99, 'ua', ' роки'),
	(100, 'ua', 'Про себе:'),
	(101, 'ua', 'Електрона пошта:'),
	(102, 'ua', 'Телефон:'),
	(103, 'ua', 'Освіта:'),
	(104, 'ua', 'Інтереси:'),
	(105, 'ua', 'Звідки дізнався про Вас:'),
	(106, 'ua', 'Форма навчання:'),
	(107, 'ua', 'Завершенні курси:'),
	(108, 'ua', 'Мої курси'),
	(109, 'ua', 'Розклад'),
	(110, 'ua', 'Консультації'),
	(111, 'ua', 'Екзамени'),
	(112, 'ua', 'Проекти'),
	(113, 'ua', 'Мій рейтинг'),
	(114, 'ua', 'Завантаження'),
	(115, 'ua', 'Листування'),
	(116, 'ua', 'Мої оцінювання'),
	(117, 'ua', 'Фінанси'),
	(118, 'ua', 'Поточний курс:'),
	(119, 'ua', 'Незавершений курс:'),
	(120, 'ua', 'Завершений курс:'),
	(121, 'ua', 'Необхідно здійснити наступну проплату до'),
	(122, 'ua', 'Сума проплати:'),
	(123, 'ua', ' грн'),
	(124, 'ua', 'Індивідуальний модульний проект'),
	(125, 'ua', 'Командний дипломний проект'),
	(126, 'ua', 'Тип'),
	(127, 'ua', 'Дата'),
	(128, 'ua', 'Час'),
	(129, 'ua', 'Викладач'),
	(130, 'ua', 'Тема'),
	(131, 'ua', 'Е'),
	(132, 'ua', 'К'),
	(133, 'ua', 'ІМП'),
	(134, 'ua', 'КДП'),
	(135, 'ua', ' сильний початківець'),
	(136, 'ua', ' українська'),
	(137, 'ua', 'Випускники'),
	(138, 'ua', 'Вибачте, Ви не можете переглядати цю лекцію. Щоб отримати доступ до цієї лекції, зареєструйтесь або увійдіть у свій аккаунт.'),
	(139, 'ua', 'Вибачте, Ви не можете переглядати цю лекцію. Щоб отримати доступ до цієї лекції, увійдіть у свій аккаунт та оплатіть доступ до лекції.'),
	(140, 'ua', 'Для початківців'),
	(141, 'ua', 'Для спеціалістів'),
	(142, 'ua', 'Для експертів'),
	(143, 'ua', 'Усі курси'),
	(144, 'ua', 'знижка'),
	(145, 'ua', 'Оцінка курсу:'),
	(146, 'ua', 'детальніше ...'),
	(147, 'ua', 'Вартість курсу: '),
	(148, 'ua', 'Спочатку навчання створюється стійкий фундамент для підготовки програмістів: необхідні знання елементарної математики, будови комп’ютера і основ програмування.'),
	(149, 'ua', '<p>Потім вивчаються основні принципи програмування на базі класичних комп&rsquo;ютерних наук і методологій: алгоритмічна мова;елементи вищої та дискретної математики і комбінаторики; структури даних, розробка і аналіз алгоритмів.                                 \r\n<p>Після чого формується база для переходу до сучасних технологій програмування: об’єктно-орієнтоване програмування; проектування баз даних.\r\n<p>Завершення процесу підготовки шляхом конкретного застосування отриманих знань на реальних проектах із засвоєнням сучасних методів і технологій, які використовуються в ІТ індустрії компаніями.'),
	(1, 'en', 'INTITA'),
	(2, 'en', 'About Us'),
	(3, 'en', 'How to start studying?'),
	(4, 'en', 'more ...'),
	(5, 'en', 'PROGRAM THE FUTURE'),
	(6, 'en', 'Important information about studying with us'),
	(7, 'en', 'Five steps to implement your dreams'),
	(8, 'en', 'START />'),
	(9, 'en', 'Ready to get started?'),
	(10, 'en', 'Enter data into the form below'),
	(11, 'en', 'extended registration'),
	(12, 'en', 'You can also register by social networks:'),
	(13, 'en', 'START'),
	(14, 'en', 'Email'),
	(15, 'en', 'password'),
	(16, 'en', 'Courses'),
	(17, 'en', 'Forum'),
	(18, 'en', 'About Us'),
	(19, 'en', 'Enter'),
	(20, 'en', 'Exit'),
	(21, 'en', 'Teachers'),
	(22, 'en', 'Exit'),
	(23, 'en', 'phone: +38 0432 52 82 67'),
	(24, 'en', 'mobile: +38 067 432 50 20'),
	(25, 'en', 'e-mail: intita.hr@gmail.com'),
	(26, 'en', 'skype: int.ita'),
	(27, 'en', 'We guarantee you an offer of employment<br>\r\nafter successful completion of training!'),
	(28, 'en', 'Do not miss your chance to change the world - get high-quality and modern education<br>\r\nand become a specialist class!'),
	(29, 'en', 'One year of productive and interesting learning - and you will become a professional programmer<br>\r\nready work in the IT industry!'),
	(30, 'en', 'Do you want to become a high-class specialist?<br>\r\ntakes correct and informed decision - Learn with us!'),
	(31, 'en', 'Do not lose your chance for creative, interesting, and challenging decent work -<br>\r\nplan their professional future today!'),
	(32, 'en', 'What are you dreaming?'),
	(33, 'en', 'Future Studies'),
	(34, 'en', 'Important questions'),
	(35, 'en', 'Maybe this freedom to live their lives? Independently manage own time with opportunity to earn by doing things you love and get business and get meet the modern profession?'),
	(36, 'en', 'Unlike traditional schools, We do not teach for the sake of ratings. We work individually with each student to achieve 100% mastering the necessary knowledge.'),
	(37, 'en', 'We offer each of our graduate guaranteed receipt employment offers for 4-6 months after the successful completion of training.'),
	(38, 'en', 'Register Online'),
	(39, 'en', 'Choice of course or module'),
	(40, 'en', 'Payment for training'),
	(41, 'en', 'Mastering the material'),
	(42, 'en', 'Completion rate'),
	(43, 'en', 'step'),
	(44, 'en', 'To access the courses and pass free modules and classes register on the site. Registration will allow you to assess the quality and usability of our product that you will become a reliable partner and advisor in professional self-realization.'),
	(45, 'en', 'To become specialists in a certain direction and level (get professional specialization) choose to undergo appropriate course. If you are interested only deepen the knowledge in a particular area of ​​information technology, then choose the module to pass.\')'),
	(46, 'en', 'To start a course or module choose payment scheme (the entire amount for the course, payment modules, payment potrymestrovo, month, etc.) and make a payment convenient way to You (payment scheme or course module can be changed monthly as possible payment credit). '),
	(47, 'en', 'The study material is possible by reading the text and / or viewing a video for each session. During the passage Intermediate classes perform tests. At the end of each session do the final test tasks. Each module ends with an individual project or exam. You can receive individual counseling teacher or advice online. '),
	(48, 'en', 'The result of course is the command thesis project, performed together with other students (the team recommends that forms an independent or executive who approved topic and terms of reference of the project). Delivery Project peredzahyst and provides protection in the online mode with presentation design. After defending his diploma and recommendation for employment.'),
	(49, 'en', 'Home'),
	(50, 'en', 'Courses'),
	(51, 'en', 'About us'),
	(52, 'en', 'Teachers'),
	(53, 'en', 'Forum'),
	(54, 'en', 'Profile'),
	(55, 'en', 'Edit profile'),
	(56, 'en', 'Registration'),
	(57, 'en', 'Teacher profile'),
	(58, 'en', 'Our teachers'),
	(59, 'en', 'personal page'),
	(60, 'en', 'If you\'re a professional IT specialist and want to teach some courses or modules IT and cooperate with us in the field of training programmers write us a letter.'),
	(61, 'en', 'Conducts courses'),
	(62, 'en', 'Read more'),
	(63, 'en', 'Reviews'),
	(64, 'en', 'Section:'),
	(65, 'en', 'About the teacher:'),
	(66, 'en', 'Our courses'),
	(67, 'en', 'Training concept'),
	(68, 'en', 'Level: '),
	(69, 'en', 'Language: '),
	(70, 'en', 'Course:'),
	(71, 'en', 'lang:'),
	(72, 'en', 'Module:'),
	(73, 'en', 'Lecture '),
	(74, 'en', 'Type:'),
	(75, 'en', 'Duration:'),
	(76, 'en', 'min'),
	(77, 'en', 'Teacher'),
	(78, 'en', 'more'),
	(79, 'en', 'Plan consultation'),
	(80, 'en', 'Content'),
	(81, 'en', 'show'),
	(82, 'en', 'hide'),
	(83, 'en', 'Videos'),
	(84, 'en', 'Sample code'),
	(85, 'en', 'User'),
	(86, 'en', 'Task'),
	(87, 'en', 'review the previous lesson'),
	(88, 'en', 'NEXT LECTURE'),
	(89, 'en', 'Reply'),
	(90, 'en', 'Final task'),
	(91, 'en', 'You can also enter by social networks:'),
	(92, 'en', 'Forget password?'),
	(93, 'en', 'SIGN IN'),
	(94, 'en', 'Status:'),
	(95, 'en', 'Student Profile'),
	(96, 'en', 'Edit </br> profile'),
	(97, 'en', ' years'),
	(98, 'en', ' year'),
	(99, 'en', ' years'),
	(100, 'en', 'About myself:'),
	(101, 'en', 'Email:'),
	(102, 'en', 'Phone:'),
	(103, 'en', 'Education:'),
	(104, 'en', 'Interests:'),
	(105, 'en', 'Where learned you:'),
	(106, 'en', 'Learning:'),
	(107, 'en', 'Completion of the course:'),
	(108, 'en', 'My courses'),
	(109, 'en', 'Timetable'),
	(110, 'en', 'Consultation'),
	(111, 'en', 'Exams'),
	(112, 'en', 'Projects'),
	(113, 'en', 'My rating'),
	(114, 'en', 'Downloads'),
	(115, 'en', 'Correspondence'),
	(116, 'en', 'My assessment'),
	(117, 'en', 'Finances'),
	(118, 'en', 'Current course:'),
	(119, 'en', 'Unfinished course:'),
	(120, 'en', 'Completed course:'),
	(121, 'en', 'Please make the following payments to'),
	(122, 'en', 'Amount of payment:'),
	(123, 'en', ' UAH'),
	(124, 'en', 'Individual modular project'),
	(125, 'en', 'Team thesis project'),
	(126, 'en', 'Type'),
	(127, 'en', 'Date'),
	(128, 'en', 'Time'),
	(129, 'en', 'Teacher'),
	(130, 'en', 'Theme'),
	(131, 'en', 'E'),
	(132, 'en', 'C'),
	(133, 'en', 'IMP'),
	(134, 'en', 'TTP'),
	(135, 'en', ' strong junior'),
	(136, 'en', ' ukrainian'),
	(137, 'en', 'Graduates'),
	(138, 'en', 'Sorry, you couldn\\\'t view this lecture.Please login for getting access to this material.'),
	(139, 'en', 'Sorry, you couldn\\\'t view this lecture.\r\nYou don\\\'t have access to this lecture.\r\nPlease go to your profile and pay access.'),
	(140, 'en', 'For beginners'),
	(141, 'en', 'For specialists'),
	(142, 'en', 'For experts'),
	(143, 'en', 'All courses'),
	(144, 'en', 'discount'),
	(145, 'en', 'Сourse rate:'),
	(146, 'en', 'details ...'),
	(147, 'en', 'Course price:'),
	(148, 'en', 'Firstly training creates a stable foundation for training programmers: requires knowledge of elementary mathematics, the structure of computer and computer science.'),
	(149, 'en', '<P>Then we study the basic principles of programming based on classic PC & raquo; Books sciences and methodologies algorithmic language, elements of higher and discrete mathematics and combinatorics; data structures, design and analysis of algorithms.\r\n<P> After that formed the basis for the transition to modern programming technologies: object-oriented programming; database design.\r\n<P> Completion of training by the specific application of knowledge to real projects with the assimilation of modern techniques and technologies used in the IT industry companies.'),
	(1, 'ru', 'INTITA'),
	(2, 'ru', 'О нас'),
	(3, 'ru', 'Как проходит обучение?'),
	(4, 'ru', 'далее ...'),
	(5, 'ru', 'ПРОГРАММИРУЙ БУДУЩЕЕ'),
	(6, 'ru', 'Важная информация про обучение вместе с нами'),
	(7, 'ru', 'Пять шагов к исполнения твоих желаний'),
	(8, 'ru', 'СТАРТ  />'),
	(9, 'ru', 'Готовы начать?'),
	(10, 'ru', 'Введите данные в форму ниже'),
	(11, 'ru', 'расширенная регистрация'),
	(12, 'ru', 'Вы также можете зарегистрироваться с помощью соцсетей:'),
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
	(27, 'ru', 'Мы гарантируем получение предложения работы<br>\r\nпосле успешного завершения обучения!'),
	(28, 'ru', 'Хочешь стать классным специалистом?<br>\r\nпринимай правильное решение - поступай в IТ Академию  ИНТИТА!'),
	(29, 'ru', 'Один год упорного и интересного обучения - и ты станешь проессиональным программистом.<br>\r\nУчиться тяжело -зато легко найти работу!'),
	(30, 'ru', 'Не упускай свой шанс на достойную и интересную работу - <br>\r\nпрограммируй свое будущее уже сегодня!'),
	(31, 'ru', 'Текст на пятой картинке слайдера'),
	(32, 'ru', 'О чем ты мечтаешь?'),
	(33, 'ru', 'Обучение будущего'),
	(34, 'ru', 'Вопросы'),
	(35, 'ru', 'Может, это возможность жить своей жизнью? Самостоятельно распоряжаться своим временем с возможностью зарабатывать, занимаясь любимым делом и получать удовольстие от современной профессии?'),
	(36, 'ru', 'В отличие от традиционных заведений, мы не учим ради оценок. Мы индивидуально работаем с каждым студентом, чтобы достичь 100% усвоения необходимых знаний.'),
	(37, 'ru', 'Мы предлагаем каждому выпускнику гарантированное получение предложения работы в течении 4-6-ти месяцев после успешного завершения обучения.'),
	(38, 'ru', 'Регистрация на сайте'),
	(39, 'ru', 'Выбор курса или модуля'),
	(40, 'ru', 'Оплата'),
	(41, 'ru', 'Изучение материала'),
	(42, 'ru', 'Завершение курса'),
	(43, 'ru', 'шаг'),
	(44, 'ru', 'Чтобы получить доступ к курсам и пройти бесплатные модули и занятия зарегистрируйся на сайте. Регистрация позволит тебе оценить качество и удобство нашего продукт , который станет для тебя надежным партнером и советчиком в профессиональной самореализации.'),
	(45, 'ru', 'Чтобы стать специалистом определенного направления и уровня ( получить профессиональную специализацию ) выбери для прохождения соответствующий курс . Если Тебя интересует исключительно углубления знаний в определенном направлении информационных технологий , то выбери соответствующий модуль для прохождения .'),
	(46, 'ru', 'Чтобы начать прохождении курса модуля выбери схему оплаты ( вся сумма за курс , оплата модулей , оплата потриместрово , помесячно и т.д.) и исполни оплату удобным Тебе способом ( схему оплаты курса или модуля можно изменять , также возможна помесячная оплата в кредит ) .'),
	(47, 'ru', 'Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео для кожного заняття. Під час проходження заняття виконуй Проміжні тестові завдання. По завершенню кожного заняття виконуй Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом. 	Можна отримати індивідуальну консультацію викладача чи консультацію онлайн.'),
	(48, 'ru', 'Підсумком курсу є Командний дипломний проект, який виконується разом з іншими студентами (склад команди формуєш самостійно чи рекомендує керівник, який затверджує тему і технічне завдання проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації. Після захисту видається диплом та рекомендація для працевлаштування.'),
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
	(69, 'ru', 'Язык курса:'),
	(70, 'ru', 'Курс:'),
	(71, 'ru', 'язык:'),
	(72, 'ru', 'Модуль:'),
	(73, 'ru', 'Занятие '),
	(74, 'ru', 'Тип:'),
	(75, 'ru', 'Время:'),
	(76, 'ru', 'мин'),
	(77, 'ru', 'Преподаватель'),
	(78, 'ru', 'детальнее'),
	(79, 'ru', 'Запланировать консультацию'),
	(80, 'ru', 'Содержание'),
	(81, 'ru', 'показать'),
	(82, 'ru', 'скрыть'),
	(83, 'ru', 'Видео'),
	(84, 'ru', 'Пример кода'),
	(85, 'ru', 'Инструкция'),
	(86, 'ru', 'Задание'),
	(87, 'ru', 'просмотреть снова предыдущий урок'),
	(88, 'ru', 'НАСТУПНИЙ УРОК'),
	(89, 'ru', 'Ответить'),
	(90, 'ru', 'Итоговое задание'),
	(91, 'ru', 'Вы также можете ввойти с помощью соцсетей:'),
	(92, 'ru', 'Забыли пароль?'),
	(93, 'ru', 'ВОЙТИ'),
	(94, 'ru', 'Статус курса: '),
	(95, 'ru', 'Профиль студента'),
	(96, 'ru', 'Редактировать </br> профиль'),
	(97, 'ru', ' лет'),
	(98, 'ru', ' год'),
	(99, 'ru', ' года'),
	(100, 'ru', 'Про себя:'),
	(101, 'ru', 'Электронная почта:'),
	(102, 'ru', 'Телефон:'),
	(103, 'ru', 'Образование:'),
	(104, 'ru', 'Интересы:'),
	(105, 'ru', 'Откуда узнал о Вас:'),
	(106, 'ru', 'Форма обучения:'),
	(107, 'ru', 'Завершенные курсы:'),
	(108, 'ru', 'Мои курсы'),
	(109, 'ru', 'Расписание'),
	(110, 'ru', 'Консультации'),
	(111, 'ru', 'Экзамены'),
	(112, 'ru', 'Проекты'),
	(113, 'ru', 'Мой рейтинг'),
	(114, 'ru', 'Загрузки'),
	(115, 'ru', 'Переписка'),
	(116, 'ru', 'Мои оценки'),
	(117, 'ru', 'Финансы'),
	(118, 'ru', 'Текущий курс:'),
	(119, 'ru', 'Незавершенный курс:'),
	(120, 'ru', 'Завершен курс:'),
	(121, 'ru', 'Необходимо осуществить следующую проплату до'),
	(122, 'ru', 'Сумма оплаты:'),
	(123, 'ru', ' грн'),
	(124, 'ru', 'Индивидуальный модульный проект'),
	(125, 'ru', 'Командный дипломный проект'),
	(126, 'ru', 'Тип'),
	(127, 'ru', 'Дата'),
	(128, 'ru', 'Время'),
	(129, 'ru', 'Преподаватель'),
	(130, 'ru', 'Тема'),
	(131, 'ru', 'Э'),
	(132, 'ru', 'К'),
	(133, 'ru', 'ИМП'),
	(134, 'ru', 'КДП'),
	(135, 'ru', ' начинающий сильный'),
	(136, 'ru', ' украинский'),
	(137, 'ru', 'Выпускники'),
	(138, 'ru', 'Извините, Вы не можете просматривать эту лекцию. Пожалуйста, зарестрируйтесь для доступа к этой лекции.'),
	(139, 'ru', 'Извините, Вы не можете просматривать эту лекцию. Вы не имеете доступа к этой лекции. Пожалуйста, зайдите в свой аккаунт и оплатите доступ.'),
	(140, 'ru', 'Для начинающих'),
	(141, 'ru', 'Для специалистов'),
	(142, 'ru', 'Для экспертов'),
	(143, 'ru', 'Все курсы'),
	(144, 'ru', 'скидка'),
	(145, 'ru', 'Оценка курса:'),
	(146, 'ru', 'детальнее ...'),
	(147, 'ru', 'Стоимость курса:'),
	(148, 'ru', 'В начале обучения формируется стойкий фундамент для подготовки программистов: необходимые знания элементарной математики, устройства компьютера и основ информатики.'),
	(149, 'ru', '<p>Потом изучаются основные принципы программирования на базе классических компьютерних наук и методологий: алгоритмический язык; элементы высшей и дискретной математики, комбинаторики; структуры данных, разработка и анализ алгоритмов.\r\n<P> После чего формируется база для перехода к современным технологиям программирования: объектно-ориентированное программирование; проектирования баз данных.\r\n<P> Завершением процесса подготовки есть конкретное применение полученных знаний на реальных проектах с усвоением современных методов и технологий, используемых в ИТ индустрии компаниями.'),
	(150, 'ua', 'Персональні дані'),
	(150, 'ru', 'Персональные данные'),
	(150, 'en', 'Personal info'),
	(151, 'ua', 'Студент'),
	(151, 'ru', 'Студент'),
	(151, 'en', 'Student'),
	(152, 'ua', 'введіть в форматі дд/мм/рррр'),
	(152, 'ru', 'введите в формате дд/мм/гггг'),
	(152, 'en', 'enter as dd/mm/yyyy'),
	(153, 'ua', 'введіть Ваші інтереси (через кому)'),
	(153, 'ru', 'введите Ваши интересы (через запятую)'),
	(153, 'en', 'enter Your interests '),
	(154, 'ua', 'звідки Ви про нас дізналися?'),
	(154, 'en', 'where you hear about us?'),
	(154, 'ru', 'откуда Вы о нас узнали?'),
	(155, 'ua', 'ВІДПРАВИТИ'),
	(155, 'ru', 'ОТПРАВИТЬ'),
	(155, 'en', 'SEND'),
	(156, 'ua', 'Завантажити фото профілю'),
	(156, 'ru', 'Загрузить фото профиля'),
	(156, 'en', 'Download your profile avatar'),
	(157, 'ua', 'ВИБЕРІТЬ ФАЙЛ'),
	(157, 'ru', 'ВЫБЕРИТЕ ФАЙЛ'),
	(157, 'en', 'CHOOSE FILE'),
	(158, 'ua', 'Розмір фото до 512Kб'),
	(158, 'ru', 'Размер фото до 512Kб'),
	(158, 'en', 'Photo size to 512Kb'),
	(159, 'ua', 'Файл не вибрано...'),
	(159, 'ru', 'Файл не выбран...'),
	(159, 'en', 'The file is not selected'),
	(160, 'ua', 'І\'мя'),
	(160, 'ru', 'Имя'),
	(160, 'en', 'Name'),
	(161, 'ua', 'Роль'),
	(161, 'ru', 'Роль'),
	(161, 'en', 'Role'),
	(162, 'ua', 'Прізвище'),
	(162, 'ru', 'Фамилия'),
	(162, 'en', 'Last name'),
	(163, 'ua', 'Нік'),
	(163, 'ru', 'Ник'),
	(163, 'en', 'Nickname'),
	(164, 'ua', 'Дата народження'),
	(164, 'ru', 'Дата рождения'),
	(164, 'en', 'Date of birth'),
	(165, 'ua', 'Телефон'),
	(165, 'ru', 'Телефон'),
	(165, 'en', 'Phone'),
	(166, 'ua', 'Адреса'),
	(166, 'ru', 'Адрес'),
	(166, 'en', 'Address'),
	(167, 'ua', 'Освіта'),
	(167, 'ru', 'Образование'),
	(167, 'en', 'Education'),
	(168, 'ua', 'Форма навчання'),
	(168, 'ru', 'Форма обучения'),
	(168, 'en', 'Education form'),
	(169, 'ua', 'Захоплення'),
	(169, 'ru', 'Увлечения'),
	(169, 'en', 'Interests'),
	(170, 'ua', 'Про себе'),
	(170, 'ru', 'О себе'),
	(170, 'en', 'About myself'),
	(171, 'ua', 'Пароль'),
	(171, 'ru', 'Пароль'),
	(171, 'en', 'Password'),
	(172, 'ua', 'Повтор пароля'),
	(172, 'ru', 'Повтор пароля'),
	(172, 'en', 'Repeat password'),
	(173, 'ua', 'ЗБЕРЕГТИ'),
	(173, 'ru', 'СОХРАНИТЬ'),
	(173, 'en', 'SAVE'),
	(174, 'ua', 'І\'мя'),
	(174, 'ru', 'Имя'),
	(174, 'en', 'Name'),
	(175, 'ua', 'Прізвище'),
	(175, 'ru', 'Фамилия'),
	(175, 'en', 'Last name'),
	(176, 'ua', 'Вік'),
	(176, 'ru', 'Возраст'),
	(176, 'en', 'Age'),
	(177, 'ua', 'Освіта'),
	(177, 'ru', 'Образование'),
	(177, 'en', 'Education'),
	(178, 'ua', 'Телефон'),
	(178, 'ru', 'Телефон'),
	(178, 'en', 'Phone'),
	(179, 'ua', 'Які курси Ви готові викладати'),
	(179, 'ru', 'Какие курсы Вы готовы преподавать'),
	(179, 'en', 'What courses you ready to teach '),
	(180, 'ua', 'Відправити'),
	(180, 'ru', 'Отправить'),
	(180, 'en', 'Send'),
	(181, 'ua', 'Відгуки студентів про викладача:'),
	(181, 'ru', 'Отзывы студентов о преподавателе:'),
	(181, 'en', 'Guest students of the teacher:'),
	(182, 'ua', 'Середня оцінка: '),
	(182, 'ru', 'Средний балл:'),
	(182, 'en', 'Average rate:'),
	(183, 'ua', 'Знання: '),
	(183, 'ru', 'Знания:'),
	(183, 'en', 'Knowledge:'),
	(184, 'ua', 'Ефективність: '),
	(184, 'ru', 'Эффективность:'),
	(184, 'en', 'Efficiency:'),
	(185, 'ua', 'Відношення до студента: '),
	(185, 'ru', 'Отношение к студенту:'),
	(185, 'en', 'Relationship to student:'),
	(186, 'ua', 'Оцінка: '),
	(186, 'ru', 'Оценка:'),
	(186, 'en', 'Rate:'),
	(187, 'ua', 'Твій відгук'),
	(187, 'ru', 'Твой отзыв'),
	(187, 'en', 'Your review:'),
	(188, 'ua', 'Ваша оцінка'),
	(188, 'ru', 'Ваша оценка'),
	(188, 'en', 'Your rate'),
	(189, 'ua', 'Знання викладача:'),
	(189, 'ru', 'Знания преподавателя:'),
	(189, 'en', 'Teacher knowledge:'),
	(190, 'ua', 'Ефективність: '),
	(190, 'ru', 'Эффективность:'),
	(190, 'en', 'Efficiency:'),
	(191, 'ua', 'Ставлення до студента:'),
	(191, 'ru', 'Отношение к студенту:'),
	(191, 'en', 'Relationship to student:'),
	(192, 'ua', 'Відправити'),
	(192, 'ru', 'Отправить'),
	(192, 'en', 'Send'),
	(193, 'ua', 'Рівень курсу: '),
	(193, 'ru', 'Уровень курса:'),
	(193, 'en', 'Course rate:'),
	(194, 'ua', 'Тривалість курсу: '),
	(194, 'ru', 'Длительность курса:'),
	(194, 'en', 'Course duration:'),
	(195, 'ua', ''),
	(195, 'ru', ''),
	(195, 'en', ''),
	(196, 'ua', 'Схеми проплат'),
	(196, 'ru', 'Схемы оплаты'),
	(196, 'en', 'Ways of pay'),
	(197, 'ua', 'за весь курс наперед:'),
	(197, 'ru', 'за весь курс наперед:'),
	(197, 'en', 'for the entire course:'),
	(198, 'ua', '2 проплати за курс:'),
	(198, 'ru', '2 оплаты за курс:'),
	(198, 'en', '2 pays for course:'),
	(199, 'ua', '4 проплати за курс:'),
	(199, 'ru', '4 оплаты за курс:'),
	(199, 'en', '4 pays for course:'),
	(200, 'ua', 'помісячно:'),
	(200, 'ru', 'ежемесячно:'),
	(200, 'en', 'every month:'),
	(201, 'ua', 'кредит на 2 роки:'),
	(201, 'ru', 'кредит на 2 года:'),
	(201, 'en', 'credit for 2 years:'),
	(202, 'ua', 'кредит на 3 роки:'),
	(202, 'ru', 'кредит на 3 года:'),
	(202, 'en', 'credit for 3 years:'),
	(203, 'ua', 'Середня оцінка: '),
	(203, 'ru', 'Средняя оценка:'),
	(203, 'en', 'Avarage rate:'),
	(204, 'ua', 'Для кого:'),
	(204, 'ru', 'Для кого:'),
	(204, 'en', 'For whom:'),
	(205, 'ua', 'Чому Ти навчишся?'),
	(205, 'ru', 'Чему Ты научишься?'),
	(205, 'en', 'Why do you learn ?'),
	(206, 'ua', 'Що Ти отримаєш?'),
	(206, 'ru', 'Что ты получишь?'),
	(206, 'en', 'What you get?'),
	(207, 'ua', 'Викладачі'),
	(207, 'ru', 'Преподаватели'),
	(207, 'en', 'Teachers'),
	(208, 'ua', 'Модуль'),
	(208, 'ru', 'Модуль'),
	(208, 'en', 'Module'),
	(209, 'ua', 'орієнтовно'),
	(209, 'ru', 'около'),
	(209, 'en', 'approximately'),
	(210, 'ua', 'знижка'),
	(210, 'ru', 'скидка'),
	(210, 'en', 'discount'),
	(211, 'ua', 'Модуль:'),
	(211, 'ru', 'Модуль:'),
	(211, 'en', 'Module:'),
	(212, 'ua', 'Заняття:'),
	(212, 'ru', 'Занятие:'),
	(212, 'en', 'Lectures:'),
	(213, 'ua', 'Тривалість:'),
	(213, 'ru', 'Длительность:'),
	(213, 'en', 'Duration:'),
	(214, 'ua', 'Рівень модуля:'),
	(214, 'ru', 'Уровень модуля:'),
	(214, 'en', 'Level module:'),
	(215, 'ua', 'Тривалість модуля:'),
	(215, 'ru', 'Длительность модуля:'),
	(215, 'en', 'Duration module:'),
	(216, 'ua', 'занять'),
	(216, 'ru', 'занятий'),
	(216, 'en', 'lectures'),
	(217, 'ua', 'орієнтовно'),
	(217, 'ru', 'ориентировочно'),
	(217, 'en', 'approximately'),
	(218, 'ua', 'міс.'),
	(218, 'ru', 'мес.'),
	(218, 'en', 'months'),
	(219, 'ua', 'год./день'),
	(219, 'ru', 'ч. / день'),
	(219, 'en', 'hr. / day'),
	(220, 'ua', 'дні/тиждень'),
	(220, 'ru', 'дня / неделю'),
	(220, 'en', 'days / week'),
	(221, 'ua', 'Вартість модуля:'),
	(221, 'ru', 'Cтоимость модуля:'),
	(221, 'en', 'Cost module:'),
	(222, 'ua', 'грн.'),
	(222, 'ru', 'грн.'),
	(222, 'en', 'UAH'),
	(223, 'ua', 'в межах курсу'),
	(223, 'ru', 'в рамках курса'),
	(223, 'en', 'within a year'),
	(224, 'ua', 'Оцінка:'),
	(224, 'ru', 'Оценка:'),
	(224, 'en', 'Rating:'),
	(225, 'ua', 'Заняття модуля'),
	(225, 'ru', 'Занятия модуля'),
	(225, 'en', 'Lectures module'),
	(227, 'ua', 'Викладач:'),
	(227, 'ru', 'Преподаватель:'),
	(227, 'en', 'Teacher:'),
	(228, 'ru', 'персональная страница'),
	(228, 'en', 'personal page'),
	(228, 'ua', 'персональна сторінка'),
	(226, 'ru', 'Занятие'),
	(226, 'en', 'Lecture'),
	(226, 'ua', 'Заняття'),
	(229, 'ua', '<p>Потім вивчаються основні принципи програмування на базі класичних комп&rsquo;ютерних наук і методологій: алгоритмічна мова;елементи вищої та дискретної математики і комбінаторики; структури даних, розробка і аналіз алгоритмів." +\r\n                                  "<p>Після чого формується база для переходу до сучасних технологій програмування: об’єктно-орієнтоване програмування; проектування баз даних." +\r\n                                   "<p>Завершення процесу підготовки шляхом конкретного застосування отриманих знань на реальних проектах із засвоєнням сучасних методів і технологій, які використовуються в ІТ індустрії компаніями.'),
	(229, 'ru', '<P> Затем изучаются основные принципы программирования на базе классических комп & rsquo; ютерних наук и методологий: алгоритмический язык; элементы высшего и дискретной математики и комбинаторики; структуры данных, разработка и анализ алгоритмов. "+\r\n                                  "<P> После чего формируется база для перехода к современным технологиям программирования: объектно-ориентированное программирование, проектирование баз данных." +\r\n                                   "<P> Завершение процесса подготовки путем конкретного применения полученных знаний на реальных проектах с усвоением современных методов и технологий, используемых в ИТ индустрии компаниями.'),
	(229, 'en', '<P> Then we study the basic principles of programming based on classic computer books sciences and methodologies algorithmic language, elements of higher and discrete mathematics and combinatorics; data structures, design and analysis of algorithms. "+\r\n                                  "<P> After that formed the basis for the transition to modern programming technologies, object-oriented programming, database design." +\r\n                                   "<P> Completion of training by specific application of knowledge to real projects with the assimilation of modern methods and technologies used in IT industry companies.'),
	(230, 'ua', 'розробляється'),
	(230, 'ru', 'в разработке'),
	(230, 'en', 'in develop'),
	(231, 'ua', 'доступний'),
	(231, 'ru', 'доступен'),
	(231, 'en', 'available'),
	(232, 'ua', 'стажер'),
	(232, 'ru', 'стажер'),
	(232, 'en', 'intern'),
	(233, 'ua', 'початківець'),
	(233, 'ru', 'начинающий'),
	(233, 'en', 'junior'),
	(234, 'ua', 'сильний початківець'),
	(234, 'ru', 'начинающий сильный'),
	(234, 'en', 'strong junior'),
	(235, 'ua', 'середній'),
	(235, 'ru', 'средний'),
	(235, 'en', 'middle'),
	(236, 'ua', 'високий'),
	(236, 'ru', 'высокий'),
	(236, 'en', 'senior'),
	(237, 'ua', ''),
	(237, 'ru', ''),
	(237, 'en', '');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
