-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 15 2015 г., 08:17
-- Версия сервера: 5.5.44
-- Версия PHP: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_acl_groups`
--

CREATE TABLE IF NOT EXISTS `phpbb_acl_groups` (
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0',
  KEY `group_id` (`group_id`),
  KEY `auth_opt_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_acl_groups`
--

INSERT INTO `phpbb_acl_groups` (`group_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(1, 0, 88, 0, 1),
(1, 0, 97, 0, 1),
(1, 0, 115, 0, 1),
(5, 0, 0, 5, 0),
(5, 0, 0, 1, 0),
(2, 0, 0, 6, 0),
(3, 0, 0, 6, 0),
(4, 0, 0, 5, 0),
(4, 0, 0, 10, 0),
(7, 0, 0, 23, 0),
(1, 15, 0, 17, 0),
(2, 15, 0, 22, 0),
(5, 15, 0, 14, 0),
(1, 16, 0, 17, 0),
(2, 16, 0, 22, 0),
(5, 16, 0, 14, 0),
(1, 17, 0, 17, 0),
(2, 17, 0, 22, 0),
(5, 17, 0, 14, 0),
(1, 18, 0, 17, 0),
(2, 18, 0, 22, 0),
(5, 18, 0, 14, 0),
(1, 19, 0, 17, 0),
(2, 19, 0, 22, 0),
(5, 19, 0, 14, 0),
(1, 20, 0, 17, 0),
(2, 20, 0, 22, 0),
(5, 20, 0, 14, 0),
(1, 21, 0, 17, 0),
(2, 21, 0, 22, 0),
(5, 21, 0, 14, 0),
(1, 24, 0, 17, 0),
(2, 24, 0, 22, 0),
(5, 24, 0, 14, 0),
(1, 25, 0, 17, 0),
(2, 25, 0, 22, 0),
(5, 25, 0, 14, 0),
(1, 26, 0, 17, 0),
(2, 26, 0, 22, 0),
(5, 26, 0, 14, 0),
(1, 27, 0, 17, 0),
(2, 27, 0, 22, 0),
(5, 27, 0, 14, 0),
(1, 28, 0, 17, 0),
(2, 28, 0, 22, 0),
(5, 28, 0, 14, 0),
(1, 29, 0, 17, 0),
(2, 29, 0, 22, 0),
(5, 29, 0, 14, 0),
(1, 30, 0, 17, 0),
(2, 30, 0, 22, 0),
(5, 30, 0, 14, 0),
(1, 31, 0, 17, 0),
(2, 31, 0, 22, 0),
(5, 31, 0, 14, 0),
(1, 32, 0, 17, 0),
(2, 32, 0, 22, 0),
(5, 32, 0, 14, 0),
(1, 33, 0, 17, 0),
(2, 33, 0, 22, 0),
(5, 33, 0, 14, 0),
(1, 34, 0, 17, 0),
(2, 34, 0, 22, 0),
(5, 34, 0, 14, 0),
(1, 35, 0, 17, 0),
(2, 35, 0, 22, 0),
(5, 35, 0, 14, 0),
(1, 36, 0, 17, 0),
(2, 36, 0, 22, 0),
(5, 36, 0, 14, 0),
(1, 37, 0, 17, 0),
(2, 37, 0, 22, 0),
(5, 37, 0, 14, 0),
(1, 38, 0, 17, 0),
(2, 38, 0, 22, 0),
(5, 38, 0, 14, 0),
(1, 39, 0, 17, 0),
(2, 39, 0, 22, 0),
(5, 39, 0, 14, 0),
(1, 40, 0, 17, 0),
(2, 40, 0, 22, 0),
(5, 40, 0, 14, 0),
(1, 41, 0, 17, 0),
(2, 41, 0, 22, 0),
(5, 41, 0, 14, 0),
(1, 42, 0, 17, 0),
(2, 42, 0, 22, 0),
(5, 42, 0, 14, 0),
(1, 43, 0, 17, 0),
(2, 43, 0, 22, 0),
(5, 43, 0, 14, 0),
(1, 44, 0, 17, 0),
(2, 44, 0, 22, 0),
(5, 44, 0, 14, 0),
(1, 45, 0, 17, 0),
(2, 45, 0, 22, 0),
(5, 45, 0, 14, 0),
(1, 46, 0, 17, 0),
(2, 46, 0, 22, 0),
(5, 46, 0, 14, 0),
(1, 47, 0, 17, 0),
(2, 47, 0, 22, 0),
(5, 47, 0, 14, 0),
(1, 48, 0, 17, 0),
(2, 48, 0, 22, 0),
(5, 48, 0, 14, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_acl_options`
--

CREATE TABLE IF NOT EXISTS `phpbb_acl_options` (
  `auth_option_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `auth_option` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `is_global` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_local` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `founder_only` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`auth_option_id`),
  UNIQUE KEY `auth_option` (`auth_option`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=122 ;

--
-- Дамп данных таблицы `phpbb_acl_options`
--

INSERT INTO `phpbb_acl_options` (`auth_option_id`, `auth_option`, `is_global`, `is_local`, `founder_only`) VALUES
(1, 'f_', 0, 1, 0),
(2, 'f_announce', 0, 1, 0),
(3, 'f_attach', 0, 1, 0),
(4, 'f_bbcode', 0, 1, 0),
(5, 'f_bump', 0, 1, 0),
(6, 'f_delete', 0, 1, 0),
(7, 'f_download', 0, 1, 0),
(8, 'f_edit', 0, 1, 0),
(9, 'f_email', 0, 1, 0),
(10, 'f_flash', 0, 1, 0),
(11, 'f_icons', 0, 1, 0),
(12, 'f_ignoreflood', 0, 1, 0),
(13, 'f_img', 0, 1, 0),
(14, 'f_list', 0, 1, 0),
(15, 'f_noapprove', 0, 1, 0),
(16, 'f_poll', 0, 1, 0),
(17, 'f_post', 0, 1, 0),
(18, 'f_postcount', 0, 1, 0),
(19, 'f_print', 0, 1, 0),
(20, 'f_read', 0, 1, 0),
(21, 'f_reply', 0, 1, 0),
(22, 'f_report', 0, 1, 0),
(23, 'f_search', 0, 1, 0),
(24, 'f_sigs', 0, 1, 0),
(25, 'f_smilies', 0, 1, 0),
(26, 'f_sticky', 0, 1, 0),
(27, 'f_subscribe', 0, 1, 0),
(28, 'f_user_lock', 0, 1, 0),
(29, 'f_vote', 0, 1, 0),
(30, 'f_votechg', 0, 1, 0),
(31, 'f_softdelete', 0, 1, 0),
(32, 'm_', 1, 1, 0),
(33, 'm_approve', 1, 1, 0),
(34, 'm_chgposter', 1, 1, 0),
(35, 'm_delete', 1, 1, 0),
(36, 'm_edit', 1, 1, 0),
(37, 'm_info', 1, 1, 0),
(38, 'm_lock', 1, 1, 0),
(39, 'm_merge', 1, 1, 0),
(40, 'm_move', 1, 1, 0),
(41, 'm_report', 1, 1, 0),
(42, 'm_split', 1, 1, 0),
(43, 'm_softdelete', 1, 1, 0),
(44, 'm_ban', 1, 0, 0),
(45, 'm_warn', 1, 0, 0),
(46, 'a_', 1, 0, 0),
(47, 'a_aauth', 1, 0, 0),
(48, 'a_attach', 1, 0, 0),
(49, 'a_authgroups', 1, 0, 0),
(50, 'a_authusers', 1, 0, 0),
(51, 'a_backup', 1, 0, 0),
(52, 'a_ban', 1, 0, 0),
(53, 'a_bbcode', 1, 0, 0),
(54, 'a_board', 1, 0, 0),
(55, 'a_bots', 1, 0, 0),
(56, 'a_clearlogs', 1, 0, 0),
(57, 'a_email', 1, 0, 0),
(58, 'a_extensions', 1, 0, 0),
(59, 'a_fauth', 1, 0, 0),
(60, 'a_forum', 1, 0, 0),
(61, 'a_forumadd', 1, 0, 0),
(62, 'a_forumdel', 1, 0, 0),
(63, 'a_group', 1, 0, 0),
(64, 'a_groupadd', 1, 0, 0),
(65, 'a_groupdel', 1, 0, 0),
(66, 'a_icons', 1, 0, 0),
(67, 'a_jabber', 1, 0, 0),
(68, 'a_language', 1, 0, 0),
(69, 'a_mauth', 1, 0, 0),
(70, 'a_modules', 1, 0, 0),
(71, 'a_names', 1, 0, 0),
(72, 'a_phpinfo', 1, 0, 0),
(73, 'a_profile', 1, 0, 0),
(74, 'a_prune', 1, 0, 0),
(75, 'a_ranks', 1, 0, 0),
(76, 'a_reasons', 1, 0, 0),
(77, 'a_roles', 1, 0, 0),
(78, 'a_search', 1, 0, 0),
(79, 'a_server', 1, 0, 0),
(80, 'a_styles', 1, 0, 0),
(81, 'a_switchperm', 1, 0, 0),
(82, 'a_uauth', 1, 0, 0),
(83, 'a_user', 1, 0, 0),
(84, 'a_userdel', 1, 0, 0),
(85, 'a_viewauth', 1, 0, 0),
(86, 'a_viewlogs', 1, 0, 0),
(87, 'a_words', 1, 0, 0),
(88, 'u_', 1, 0, 0),
(89, 'u_attach', 1, 0, 0),
(90, 'u_chgavatar', 1, 0, 0),
(91, 'u_chgcensors', 1, 0, 0),
(92, 'u_chgemail', 1, 0, 0),
(93, 'u_chggrp', 1, 0, 0),
(94, 'u_chgname', 1, 0, 0),
(95, 'u_chgpasswd', 1, 0, 0),
(96, 'u_chgprofileinfo', 1, 0, 0),
(97, 'u_download', 1, 0, 0),
(98, 'u_hideonline', 1, 0, 0),
(99, 'u_ignoreflood', 1, 0, 0),
(100, 'u_masspm', 1, 0, 0),
(101, 'u_masspm_group', 1, 0, 0),
(102, 'u_pm_attach', 1, 0, 0),
(103, 'u_pm_bbcode', 1, 0, 0),
(104, 'u_pm_delete', 1, 0, 0),
(105, 'u_pm_download', 1, 0, 0),
(106, 'u_pm_edit', 1, 0, 0),
(107, 'u_pm_emailpm', 1, 0, 0),
(108, 'u_pm_flash', 1, 0, 0),
(109, 'u_pm_forward', 1, 0, 0),
(110, 'u_pm_img', 1, 0, 0),
(111, 'u_pm_printpm', 1, 0, 0),
(112, 'u_pm_smilies', 1, 0, 0),
(113, 'u_readpm', 1, 0, 0),
(114, 'u_savedrafts', 1, 0, 0),
(115, 'u_search', 1, 0, 0),
(116, 'u_sendemail', 1, 0, 0),
(117, 'u_sendim', 1, 0, 0),
(118, 'u_sendpm', 1, 0, 0),
(119, 'u_sig', 1, 0, 0),
(120, 'u_viewonline', 1, 0, 0),
(121, 'u_viewprofile', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_acl_roles`
--

CREATE TABLE IF NOT EXISTS `phpbb_acl_roles` (
  `role_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `role_description` text COLLATE utf8_bin NOT NULL,
  `role_type` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `role_order` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`),
  KEY `role_type` (`role_type`),
  KEY `role_order` (`role_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `phpbb_acl_roles`
--

INSERT INTO `phpbb_acl_roles` (`role_id`, `role_name`, `role_description`, `role_type`, `role_order`) VALUES
(1, 'ROLE_ADMIN_STANDARD', 'ROLE_DESCRIPTION_ADMIN_STANDARD', 'a_', 1),
(2, 'ROLE_ADMIN_FORUM', 'ROLE_DESCRIPTION_ADMIN_FORUM', 'a_', 3),
(3, 'ROLE_ADMIN_USERGROUP', 'ROLE_DESCRIPTION_ADMIN_USERGROUP', 'a_', 4),
(4, 'ROLE_ADMIN_FULL', 'ROLE_DESCRIPTION_ADMIN_FULL', 'a_', 2),
(5, 'ROLE_USER_FULL', 'ROLE_DESCRIPTION_USER_FULL', 'u_', 3),
(6, 'ROLE_USER_STANDARD', 'ROLE_DESCRIPTION_USER_STANDARD', 'u_', 1),
(7, 'ROLE_USER_LIMITED', 'ROLE_DESCRIPTION_USER_LIMITED', 'u_', 2),
(8, 'ROLE_USER_NOPM', 'ROLE_DESCRIPTION_USER_NOPM', 'u_', 4),
(9, 'ROLE_USER_NOAVATAR', 'ROLE_DESCRIPTION_USER_NOAVATAR', 'u_', 5),
(10, 'ROLE_MOD_FULL', 'ROLE_DESCRIPTION_MOD_FULL', 'm_', 3),
(11, 'ROLE_MOD_STANDARD', 'ROLE_DESCRIPTION_MOD_STANDARD', 'm_', 1),
(12, 'ROLE_MOD_SIMPLE', 'ROLE_DESCRIPTION_MOD_SIMPLE', 'm_', 2),
(13, 'ROLE_MOD_QUEUE', 'ROLE_DESCRIPTION_MOD_QUEUE', 'm_', 4),
(14, 'ROLE_FORUM_FULL', 'ROLE_DESCRIPTION_FORUM_FULL', 'f_', 7),
(15, 'ROLE_FORUM_STANDARD', 'ROLE_DESCRIPTION_FORUM_STANDARD', 'f_', 5),
(16, 'ROLE_FORUM_NOACCESS', 'ROLE_DESCRIPTION_FORUM_NOACCESS', 'f_', 1),
(17, 'ROLE_FORUM_READONLY', 'ROLE_DESCRIPTION_FORUM_READONLY', 'f_', 2),
(18, 'ROLE_FORUM_LIMITED', 'ROLE_DESCRIPTION_FORUM_LIMITED', 'f_', 3),
(19, 'ROLE_FORUM_BOT', 'ROLE_DESCRIPTION_FORUM_BOT', 'f_', 9),
(20, 'ROLE_FORUM_ONQUEUE', 'ROLE_DESCRIPTION_FORUM_ONQUEUE', 'f_', 8),
(21, 'ROLE_FORUM_POLLS', 'ROLE_DESCRIPTION_FORUM_POLLS', 'f_', 6),
(22, 'ROLE_FORUM_LIMITED_POLLS', 'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS', 'f_', 4),
(23, 'ROLE_USER_NEW_MEMBER', 'ROLE_DESCRIPTION_USER_NEW_MEMBER', 'u_', 6),
(24, 'ROLE_FORUM_NEW_MEMBER', 'ROLE_DESCRIPTION_FORUM_NEW_MEMBER', 'f_', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_acl_roles_data`
--

CREATE TABLE IF NOT EXISTS `phpbb_acl_roles_data` (
  `role_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`role_id`,`auth_option_id`),
  KEY `ath_op_id` (`auth_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_acl_roles_data`
--

INSERT INTO `phpbb_acl_roles_data` (`role_id`, `auth_option_id`, `auth_setting`) VALUES
(1, 46, 1),
(1, 48, 1),
(1, 49, 1),
(1, 50, 1),
(1, 52, 1),
(1, 53, 1),
(1, 54, 1),
(1, 58, 1),
(1, 59, 1),
(1, 60, 1),
(1, 61, 1),
(1, 62, 1),
(1, 63, 1),
(1, 64, 1),
(1, 65, 1),
(1, 66, 1),
(1, 69, 1),
(1, 71, 1),
(1, 73, 1),
(1, 74, 1),
(1, 75, 1),
(1, 76, 1),
(1, 82, 1),
(1, 83, 1),
(1, 84, 1),
(1, 85, 1),
(1, 86, 1),
(1, 87, 1),
(2, 46, 1),
(2, 49, 1),
(2, 50, 1),
(2, 59, 1),
(2, 60, 1),
(2, 61, 1),
(2, 62, 1),
(2, 69, 1),
(2, 74, 1),
(2, 82, 1),
(2, 85, 1),
(2, 86, 1),
(3, 46, 1),
(3, 49, 1),
(3, 50, 1),
(3, 52, 1),
(3, 63, 1),
(3, 64, 1),
(3, 65, 1),
(3, 75, 1),
(3, 82, 1),
(3, 83, 1),
(3, 85, 1),
(3, 86, 1),
(4, 46, 1),
(4, 47, 1),
(4, 48, 1),
(4, 49, 1),
(4, 50, 1),
(4, 51, 1),
(4, 52, 1),
(4, 53, 1),
(4, 54, 1),
(4, 55, 1),
(4, 56, 1),
(4, 57, 1),
(4, 58, 1),
(4, 59, 1),
(4, 60, 1),
(4, 61, 1),
(4, 62, 1),
(4, 63, 1),
(4, 64, 1),
(4, 65, 1),
(4, 66, 1),
(4, 67, 1),
(4, 68, 1),
(4, 69, 1),
(4, 70, 1),
(4, 71, 1),
(4, 72, 1),
(4, 73, 1),
(4, 74, 1),
(4, 75, 1),
(4, 76, 1),
(4, 77, 1),
(4, 78, 1),
(4, 79, 1),
(4, 80, 1),
(4, 81, 1),
(4, 82, 1),
(4, 83, 1),
(4, 84, 1),
(4, 85, 1),
(4, 86, 1),
(4, 87, 1),
(5, 88, 1),
(5, 89, 1),
(5, 90, 1),
(5, 91, 1),
(5, 92, 1),
(5, 93, 1),
(5, 94, 1),
(5, 95, 1),
(5, 96, 1),
(5, 97, 1),
(5, 98, 1),
(5, 99, 1),
(5, 100, 1),
(5, 101, 1),
(5, 102, 1),
(5, 103, 1),
(5, 104, 1),
(5, 105, 1),
(5, 106, 1),
(5, 107, 1),
(5, 108, 1),
(5, 109, 1),
(5, 110, 1),
(5, 111, 1),
(5, 112, 1),
(5, 113, 1),
(5, 114, 1),
(5, 115, 1),
(5, 116, 1),
(5, 117, 1),
(5, 118, 1),
(5, 119, 1),
(5, 120, 1),
(5, 121, 1),
(6, 88, 1),
(6, 89, 1),
(6, 90, 1),
(6, 91, 1),
(6, 92, 1),
(6, 95, 1),
(6, 96, 1),
(6, 97, 1),
(6, 98, 1),
(6, 100, 1),
(6, 101, 1),
(6, 102, 1),
(6, 103, 1),
(6, 104, 1),
(6, 105, 1),
(6, 106, 1),
(6, 107, 1),
(6, 110, 1),
(6, 111, 1),
(6, 112, 1),
(6, 113, 1),
(6, 114, 1),
(6, 115, 1),
(6, 116, 1),
(6, 117, 1),
(6, 118, 1),
(6, 119, 1),
(6, 121, 1),
(7, 88, 1),
(7, 90, 1),
(7, 91, 1),
(7, 92, 1),
(7, 95, 1),
(7, 96, 1),
(7, 97, 1),
(7, 98, 1),
(7, 103, 1),
(7, 104, 1),
(7, 105, 1),
(7, 106, 1),
(7, 109, 1),
(7, 110, 1),
(7, 111, 1),
(7, 112, 1),
(7, 113, 1),
(7, 118, 1),
(7, 119, 1),
(7, 121, 1),
(8, 88, 1),
(8, 90, 1),
(8, 91, 1),
(8, 92, 1),
(8, 95, 1),
(8, 97, 1),
(8, 98, 1),
(8, 100, 0),
(8, 101, 0),
(8, 113, 0),
(8, 118, 0),
(8, 119, 1),
(8, 121, 1),
(9, 88, 1),
(9, 90, 0),
(9, 91, 1),
(9, 92, 1),
(9, 95, 1),
(9, 96, 1),
(9, 97, 1),
(9, 98, 1),
(9, 103, 1),
(9, 104, 1),
(9, 105, 1),
(9, 106, 1),
(9, 109, 1),
(9, 110, 1),
(9, 111, 1),
(9, 112, 1),
(9, 113, 1),
(9, 118, 1),
(9, 119, 1),
(9, 121, 1),
(10, 32, 1),
(10, 33, 1),
(10, 34, 1),
(10, 35, 1),
(10, 36, 1),
(10, 37, 1),
(10, 38, 1),
(10, 39, 1),
(10, 40, 1),
(10, 41, 1),
(10, 42, 1),
(10, 43, 1),
(10, 44, 1),
(10, 45, 1),
(11, 32, 1),
(11, 33, 1),
(11, 35, 1),
(11, 36, 1),
(11, 37, 1),
(11, 38, 1),
(11, 39, 1),
(11, 40, 1),
(11, 41, 1),
(11, 42, 1),
(11, 43, 1),
(11, 45, 1),
(12, 32, 1),
(12, 35, 1),
(12, 36, 1),
(12, 37, 1),
(12, 41, 1),
(12, 43, 1),
(13, 32, 1),
(13, 33, 1),
(13, 36, 1),
(14, 1, 1),
(14, 2, 1),
(14, 3, 1),
(14, 4, 1),
(14, 5, 1),
(14, 6, 1),
(14, 7, 1),
(14, 8, 1),
(14, 9, 1),
(14, 10, 1),
(14, 11, 1),
(14, 12, 1),
(14, 13, 1),
(14, 14, 1),
(14, 15, 1),
(14, 16, 1),
(14, 17, 1),
(14, 18, 1),
(14, 19, 1),
(14, 20, 1),
(14, 21, 1),
(14, 22, 1),
(14, 23, 1),
(14, 24, 1),
(14, 25, 1),
(14, 26, 1),
(14, 27, 1),
(14, 28, 1),
(14, 29, 1),
(14, 30, 1),
(14, 31, 1),
(15, 1, 1),
(15, 3, 1),
(15, 4, 1),
(15, 5, 1),
(15, 6, 1),
(15, 7, 1),
(15, 8, 1),
(15, 9, 1),
(15, 11, 1),
(15, 13, 1),
(15, 14, 1),
(15, 15, 1),
(15, 17, 1),
(15, 18, 1),
(15, 19, 1),
(15, 20, 1),
(15, 21, 1),
(15, 22, 1),
(15, 23, 1),
(15, 24, 1),
(15, 25, 1),
(15, 27, 1),
(15, 29, 1),
(15, 30, 1),
(15, 31, 1),
(16, 1, 0),
(17, 1, 1),
(17, 7, 1),
(17, 14, 1),
(17, 19, 1),
(17, 20, 1),
(17, 23, 1),
(17, 27, 1),
(18, 1, 1),
(18, 4, 1),
(18, 7, 1),
(18, 8, 1),
(18, 9, 1),
(18, 13, 1),
(18, 14, 1),
(18, 15, 1),
(18, 17, 1),
(18, 18, 1),
(18, 19, 1),
(18, 20, 1),
(18, 21, 1),
(18, 22, 1),
(18, 23, 1),
(18, 24, 1),
(18, 25, 1),
(18, 27, 1),
(18, 29, 1),
(18, 31, 1),
(19, 1, 1),
(19, 7, 1),
(19, 14, 1),
(19, 19, 1),
(19, 20, 1),
(20, 1, 1),
(20, 3, 1),
(20, 4, 1),
(20, 7, 1),
(20, 8, 1),
(20, 9, 1),
(20, 13, 1),
(20, 14, 1),
(20, 15, 0),
(20, 17, 1),
(20, 18, 1),
(20, 19, 1),
(20, 20, 1),
(20, 21, 1),
(20, 22, 1),
(20, 23, 1),
(20, 24, 1),
(20, 25, 1),
(20, 27, 1),
(20, 29, 1),
(20, 31, 1),
(21, 1, 1),
(21, 3, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(21, 7, 1),
(21, 8, 1),
(21, 9, 1),
(21, 11, 1),
(21, 13, 1),
(21, 14, 1),
(21, 15, 1),
(21, 16, 1),
(21, 17, 1),
(21, 18, 1),
(21, 19, 1),
(21, 20, 1),
(21, 21, 1),
(21, 22, 1),
(21, 23, 1),
(21, 24, 1),
(21, 25, 1),
(21, 27, 1),
(21, 29, 1),
(21, 30, 1),
(21, 31, 1),
(22, 1, 1),
(22, 4, 1),
(22, 7, 1),
(22, 8, 1),
(22, 9, 1),
(22, 13, 1),
(22, 14, 1),
(22, 15, 1),
(22, 16, 1),
(22, 17, 1),
(22, 18, 1),
(22, 19, 1),
(22, 20, 1),
(22, 21, 1),
(22, 22, 1),
(22, 23, 1),
(22, 24, 1),
(22, 25, 1),
(22, 27, 1),
(22, 29, 1),
(22, 31, 1),
(23, 96, 0),
(23, 100, 0),
(23, 101, 0),
(23, 118, 0),
(24, 15, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_acl_users`
--

CREATE TABLE IF NOT EXISTS `phpbb_acl_users` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_role_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0',
  KEY `user_id` (`user_id`),
  KEY `auth_option_id` (`auth_option_id`),
  KEY `auth_role_id` (`auth_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_acl_users`
--

INSERT INTO `phpbb_acl_users` (`user_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(2, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_attachments`
--

CREATE TABLE IF NOT EXISTS `phpbb_attachments` (
  `attach_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `post_msg_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `in_message` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `poster_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `is_orphan` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `physical_filename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `real_filename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `download_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `attach_comment` text COLLATE utf8_bin NOT NULL,
  `extension` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `mimetype` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `filesize` int(20) unsigned NOT NULL DEFAULT '0',
  `filetime` int(11) unsigned NOT NULL DEFAULT '0',
  `thumbnail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`attach_id`),
  KEY `filetime` (`filetime`),
  KEY `post_msg_id` (`post_msg_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `is_orphan` (`is_orphan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_banlist`
--

CREATE TABLE IF NOT EXISTS `phpbb_banlist` (
  `ban_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ban_userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ban_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_email` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_start` int(11) unsigned NOT NULL DEFAULT '0',
  `ban_end` int(11) unsigned NOT NULL DEFAULT '0',
  `ban_exclude` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_give_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`ban_id`),
  KEY `ban_end` (`ban_end`),
  KEY `ban_user` (`ban_userid`,`ban_exclude`),
  KEY `ban_email` (`ban_email`,`ban_exclude`),
  KEY `ban_ip` (`ban_ip`,`ban_exclude`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_bbcodes`
--

CREATE TABLE IF NOT EXISTS `phpbb_bbcodes` (
  `bbcode_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `bbcode_tag` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_helpline` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_on_posting` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bbcode_match` text COLLATE utf8_bin NOT NULL,
  `bbcode_tpl` mediumtext COLLATE utf8_bin NOT NULL,
  `first_pass_match` mediumtext COLLATE utf8_bin NOT NULL,
  `first_pass_replace` mediumtext COLLATE utf8_bin NOT NULL,
  `second_pass_match` mediumtext COLLATE utf8_bin NOT NULL,
  `second_pass_replace` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`bbcode_id`),
  KEY `display_on_post` (`display_on_posting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_bookmarks`
--

CREATE TABLE IF NOT EXISTS `phpbb_bookmarks` (
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_bookmarks`
--

INSERT INTO `phpbb_bookmarks` (`topic_id`, `user_id`) VALUES
(3, 22),
(4, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_bots`
--

CREATE TABLE IF NOT EXISTS `phpbb_bots` (
  `bot_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bot_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `bot_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `bot_agent` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bot_ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`bot_id`),
  KEY `bot_active` (`bot_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `phpbb_bots`
--

INSERT INTO `phpbb_bots` (`bot_id`, `bot_active`, `bot_name`, `user_id`, `bot_agent`, `bot_ip`) VALUES
(1, 1, 'AdsBot [Google]', 3, 'AdsBot-Google', ''),
(2, 1, 'Alexa [Bot]', 4, 'ia_archiver', ''),
(3, 1, 'Alta Vista [Bot]', 5, 'Scooter/', ''),
(4, 1, 'Ask Jeeves [Bot]', 6, 'Ask Jeeves', ''),
(5, 1, 'Baidu [Spider]', 7, 'Baiduspider', ''),
(6, 1, 'Bing [Bot]', 8, 'bingbot/', ''),
(7, 1, 'Exabot [Bot]', 9, 'Exabot', ''),
(8, 1, 'FAST Enterprise [Crawler]', 10, 'FAST Enterprise Crawler', ''),
(9, 1, 'FAST WebCrawler [Crawler]', 11, 'FAST-WebCrawler/', ''),
(10, 1, 'Francis [Bot]', 12, 'http://www.neomo.de/', ''),
(11, 1, 'Gigabot [Bot]', 13, 'Gigabot/', ''),
(12, 1, 'Google Adsense [Bot]', 14, 'Mediapartners-Google', ''),
(13, 1, 'Google Desktop', 15, 'Google Desktop', ''),
(14, 1, 'Google Feedfetcher', 16, 'Feedfetcher-Google', ''),
(15, 1, 'Google [Bot]', 17, 'Googlebot', ''),
(16, 1, 'Heise IT-Markt [Crawler]', 18, 'heise-IT-Markt-Crawler', ''),
(17, 1, 'Heritrix [Crawler]', 19, 'heritrix/1.', ''),
(18, 1, 'IBM Research [Bot]', 20, 'ibm.com/cs/crawler', ''),
(19, 1, 'ICCrawler - ICjobs', 21, 'ICCrawler - ICjobs', ''),
(20, 1, 'ichiro [Crawler]', 22, 'ichiro/', ''),
(21, 1, 'Majestic-12 [Bot]', 23, 'MJ12bot/', ''),
(22, 1, 'Metager [Bot]', 24, 'MetagerBot/', ''),
(23, 1, 'MSN NewsBlogs', 25, 'msnbot-NewsBlogs/', ''),
(24, 1, 'MSN [Bot]', 26, 'msnbot/', ''),
(25, 1, 'MSNbot Media', 27, 'msnbot-media/', ''),
(26, 1, 'Nutch [Bot]', 28, 'http://lucene.apache.org/nutch/', ''),
(27, 1, 'Online link [Validator]', 29, 'online link validator', ''),
(28, 1, 'psbot [Picsearch]', 30, 'psbot/0', ''),
(29, 1, 'Sensis [Crawler]', 31, 'Sensis Web Crawler', ''),
(30, 1, 'SEO Crawler', 32, 'SEO search Crawler/', ''),
(31, 1, 'Seoma [Crawler]', 33, 'Seoma [SEO Crawler]', ''),
(32, 1, 'SEOSearch [Crawler]', 34, 'SEOsearch/', ''),
(33, 1, 'Snappy [Bot]', 35, 'Snappy/1.1 ( http://www.urltrends.com/ )', ''),
(34, 1, 'Steeler [Crawler]', 36, 'http://www.tkl.iis.u-tokyo.ac.jp/~crawler/', ''),
(35, 1, 'Telekom [Bot]', 37, 'crawleradmin.t-info@telekom.de', ''),
(36, 1, 'TurnitinBot [Bot]', 38, 'TurnitinBot/', ''),
(37, 1, 'Voyager [Bot]', 39, 'voyager/', ''),
(38, 1, 'W3 [Sitesearch]', 40, 'W3 SiteSearch Crawler', ''),
(39, 1, 'W3C [Linkcheck]', 41, 'W3C-checklink/', ''),
(40, 1, 'W3C [Validator]', 42, 'W3C_Validator', ''),
(41, 1, 'YaCy [Bot]', 43, 'yacybot', ''),
(42, 1, 'Yahoo MMCrawler [Bot]', 44, 'Yahoo-MMCrawler/', ''),
(43, 1, 'Yahoo Slurp [Bot]', 45, 'Yahoo! DE Slurp', ''),
(44, 1, 'Yahoo [Bot]', 46, 'Yahoo! Slurp', ''),
(45, 1, 'YahooSeeker [Bot]', 47, 'YahooSeeker/', '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_config`
--

CREATE TABLE IF NOT EXISTS `phpbb_config` (
  `config_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `config_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `is_dynamic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`config_name`),
  KEY `is_dynamic` (`is_dynamic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_config`
--

INSERT INTO `phpbb_config` (`config_name`, `config_value`, `is_dynamic`) VALUES
('active_sessions', '0', 0),
('allow_attachments', '1', 0),
('allow_autologin', '1', 0),
('allow_avatar', '1', 0),
('allow_avatar_gravatar', '0', 0),
('allow_avatar_local', '0', 0),
('allow_avatar_remote', '0', 0),
('allow_avatar_remote_upload', '0', 0),
('allow_avatar_upload', '1', 0),
('allow_bbcode', '1', 0),
('allow_birthdays', '1', 0),
('allow_bookmarks', '1', 0),
('allow_cdn', '0', 0),
('allow_emailreuse', '0', 0),
('allow_forum_notify', '1', 0),
('allow_live_searches', '1', 0),
('allow_mass_pm', '1', 0),
('allow_name_chars', 'USERNAME_CHARS_ANY', 0),
('allow_namechange', '0', 0),
('allow_nocensors', '0', 0),
('allow_password_reset', '1', 0),
('allow_pm_attach', '0', 0),
('allow_pm_report', '1', 0),
('allow_post_flash', '1', 0),
('allow_post_links', '1', 0),
('allow_privmsg', '1', 0),
('allow_quick_reply', '1', 0),
('allow_sig', '1', 0),
('allow_sig_bbcode', '1', 0),
('allow_sig_flash', '0', 0),
('allow_sig_img', '1', 0),
('allow_sig_links', '1', 0),
('allow_sig_pm', '1', 0),
('allow_sig_smilies', '1', 0),
('allow_smilies', '1', 0),
('allow_topic_notify', '1', 0),
('assets_version', '1', 0),
('attachment_quota', '52428800', 0),
('auth_bbcode_pm', '1', 0),
('auth_flash_pm', '0', 0),
('auth_img_pm', '1', 0),
('auth_method', 'db', 0),
('auth_smilies_pm', '1', 0),
('avatar_filesize', '6144', 0),
('avatar_gallery_path', 'images/avatars/gallery', 0),
('avatar_max_height', '90', 0),
('avatar_max_width', '90', 0),
('avatar_min_height', '20', 0),
('avatar_min_width', '20', 0),
('avatar_path', 'images/avatars/upload', 0),
('avatar_salt', '3fb48adc0dd274aaf401e3442d2697a0', 0),
('board_contact', 'intita.hr@gmail.com', 0),
('board_contact_name', '', 0),
('board_disable', '0', 0),
('board_disable_msg', '', 0),
('board_email', 'intita.hr@gmail.com', 0),
('board_email_form', '0', 0),
('board_email_sig', 'Дякуємо, Адміністрація', 0),
('board_hide_emails', '1', 0),
('board_index_text', '', 0),
('board_startdate', '1431076924', 0),
('board_timezone', 'UTC', 0),
('browser_check', '1', 0),
('bump_interval', '10', 0),
('bump_type', 'd', 0),
('cache_gc', '7200', 0),
('cache_last_gc', '1439577878', 1),
('captcha_gd', '1', 0),
('captcha_gd_3d_noise', '1', 0),
('captcha_gd_fonts', '1', 0),
('captcha_gd_foreground_noise', '0', 0),
('captcha_gd_wave', '0', 0),
('captcha_gd_x_grid', '25', 0),
('captcha_gd_y_grid', '25', 0),
('captcha_plugin', 'core.captcha.plugins.gd', 0),
('check_attachment_content', '1', 0),
('check_dnsbl', '0', 0),
('chg_passforce', '0', 0),
('confirm_refresh', '1', 0),
('contact_admin_form_enable', '1', 0),
('cookie_domain', 'intita', 0),
('cookie_name', 'phpbb3_6vpfb', 0),
('cookie_path', '/', 0),
('cookie_secure', '0', 0),
('coppa_enable', '0', 0),
('coppa_fax', '', 0),
('coppa_mail', '', 0),
('cron_lock', '0', 1),
('database_gc', '604800', 0),
('database_last_gc', '1439556268', 1),
('dbms_version', '5.5.41-log', 0),
('default_dateformat', 'D M d, Y g:i a', 0),
('default_lang', 'uk', 0),
('default_style', '1', 0),
('delete_time', '0', 0),
('display_last_edited', '1', 0),
('display_last_subject', '1', 0),
('display_order', '0', 0),
('edit_time', '0', 0),
('email_check_mx', '1', 0),
('email_enable', '1', 0),
('email_function_name', 'mail', 0),
('email_max_chunk_size', '50', 0),
('email_package_size', '20', 0),
('enable_confirm', '1', 0),
('enable_mod_rewrite', '0', 0),
('enable_pm_icons', '1', 0),
('enable_post_confirm', '1', 0),
('extension_force_unstable', '0', 0),
('feed_enable', '1', 0),
('feed_forum', '1', 0),
('feed_http_auth', '0', 0),
('feed_item_statistics', '1', 0),
('feed_limit_post', '15', 0),
('feed_limit_topic', '10', 0),
('feed_overall', '1', 0),
('feed_overall_forums', '0', 0),
('feed_topic', '1', 0),
('feed_topics_active', '0', 0),
('feed_topics_new', '1', 0),
('flood_interval', '15', 0),
('force_server_vars', '0', 0),
('form_token_lifetime', '7200', 0),
('form_token_mintime', '0', 0),
('form_token_sid_guests', '1', 0),
('forward_pm', '1', 0),
('forwarded_for_check', '0', 0),
('full_folder_action', '2', 0),
('fulltext_mysql_max_word_len', '254', 0),
('fulltext_mysql_min_word_len', '4', 0),
('fulltext_native_common_thres', '5', 0),
('fulltext_native_load_upd', '1', 0),
('fulltext_native_max_chars', '14', 0),
('fulltext_native_min_chars', '3', 0),
('fulltext_postgres_max_word_len', '254', 0),
('fulltext_postgres_min_word_len', '4', 0),
('fulltext_postgres_ts_name', 'simple', 0),
('fulltext_sphinx_indexer_mem_limit', '512', 0),
('fulltext_sphinx_stopwords', '0', 0),
('gzip_compress', '0', 0),
('hot_threshold', '25', 0),
('icons_path', 'images/icons', 0),
('img_create_thumbnail', '0', 0),
('img_display_inlined', '1', 0),
('img_imagick', 'd:/openserver/modules/imagemagick', 0),
('img_link_height', '0', 0),
('img_link_width', '0', 0),
('img_max_height', '0', 0),
('img_max_thumb_width', '400', 0),
('img_max_width', '0', 0),
('img_min_thumb_filesize', '12000', 0),
('ip_check', '3', 0),
('ip_login_limit_max', '50', 0),
('ip_login_limit_time', '21600', 0),
('ip_login_limit_use_forwarded', '0', 0),
('jab_enable', '0', 0),
('jab_host', '', 0),
('jab_package_size', '20', 0),
('jab_password', '', 0),
('jab_port', '5222', 0),
('jab_use_ssl', '0', 0),
('jab_username', '', 0),
('last_queue_run', '0', 1),
('ldap_base_dn', '', 0),
('ldap_email', '', 0),
('ldap_password', '', 0),
('ldap_port', '', 0),
('ldap_server', '', 0),
('ldap_uid', '', 0),
('ldap_user', '', 0),
('ldap_user_filter', '', 0),
('legend_sort_groupname', '0', 0),
('limit_load', '0', 0),
('limit_search_load', '0', 0),
('load_anon_lastread', '0', 0),
('load_birthdays', '1', 0),
('load_cpf_memberlist', '1', 0),
('load_cpf_pm', '1', 0),
('load_cpf_viewprofile', '1', 0),
('load_cpf_viewtopic', '1', 0),
('load_db_lastread', '1', 0),
('load_db_track', '1', 0),
('load_jquery_url', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', 0),
('load_jumpbox', '1', 0),
('load_moderators', '1', 0),
('load_notifications', '1', 0),
('load_online', '1', 0),
('load_online_guests', '1', 0),
('load_online_time', '5', 0),
('load_onlinetrack', '1', 0),
('load_search', '1', 0),
('load_tplcompile', '0', 0),
('load_unreads_search', '1', 0),
('load_user_activity', '1', 0),
('max_attachments', '3', 0),
('max_attachments_pm', '1', 0),
('max_autologin_time', '0', 0),
('max_filesize', '262144', 0),
('max_filesize_pm', '262144', 0),
('max_login_attempts', '3', 0),
('max_name_chars', '20', 0),
('max_num_search_keywords', '10', 0),
('max_pass_chars', '100', 0),
('max_poll_options', '10', 0),
('max_post_chars', '60000', 0),
('max_post_font_size', '200', 0),
('max_post_img_height', '0', 0),
('max_post_img_width', '0', 0),
('max_post_smilies', '0', 0),
('max_post_urls', '0', 0),
('max_quote_depth', '3', 0),
('max_reg_attempts', '5', 0),
('max_sig_chars', '255', 0),
('max_sig_font_size', '200', 0),
('max_sig_img_height', '0', 0),
('max_sig_img_width', '0', 0),
('max_sig_smilies', '0', 0),
('max_sig_urls', '5', 0),
('mime_triggers', 'body|head|html|img|plaintext|a href|pre|script|table|title', 0),
('min_name_chars', '3', 0),
('min_pass_chars', '6', 0),
('min_post_chars', '1', 0),
('min_search_author_chars', '3', 0),
('new_member_group_default', '0', 0),
('new_member_post_limit', '3', 0),
('newest_user_colour', '', 1),
('newest_user_id', '48', 1),
('newest_username', 'Ivanna', 1),
('num_files', '0', 1),
('num_posts', '33', 1),
('num_topics', '15', 1),
('num_users', '2', 1),
('override_user_style', '0', 0),
('pass_complex', 'PASS_TYPE_ANY', 0),
('plupload_last_gc', '0', 1),
('plupload_salt', '817854cf7a4792286ce9f1c9f42f593c', 0),
('pm_edit_time', '0', 0),
('pm_max_boxes', '4', 0),
('pm_max_msgs', '50', 0),
('pm_max_recipients', '0', 0),
('posts_per_page', '10', 0),
('print_pm', '1', 0),
('questionnaire_unique_id', '793ec7662bd4d575', 0),
('queue_interval', '60', 0),
('rand_seed', 'b79f9dc901216c2f205e2fd427329e46', 1),
('rand_seed_last_update', '1439596159', 1),
('ranks_path', 'images/ranks', 0),
('read_notification_expire_days', '30', 0),
('read_notification_gc', '86400', 0),
('read_notification_last_gc', '1439563768', 1),
('record_online_date', '1439389036', 1),
('record_online_users', '4', 1),
('referer_validation', '1', 0),
('require_activation', '0', 0),
('script_path', '/forum', 0),
('search_anonymous_interval', '0', 0),
('search_block_size', '250', 0),
('search_gc', '7200', 0),
('search_indexing_state', '', 1),
('search_interval', '0', 0),
('search_last_gc', '1439578015', 1),
('search_store_results', '1800', 0),
('search_type', '\\phpbb\\search\\fulltext_native', 0),
('secure_allow_deny', '1', 0),
('secure_allow_empty_referer', '1', 0),
('secure_downloads', '0', 0),
('server_name', 'intita', 0),
('server_port', '80', 0),
('server_protocol', 'http://', 0),
('session_gc', '3600', 0),
('session_last_gc', '1439569185', 1),
('session_length', '3600', 0),
('site_desc', 'IT Академія', 0),
('site_home_text', '', 0),
('site_home_url', '', 0),
('sitename', '', 0),
('smilies_path', 'images/smilies', 0),
('smilies_per_page', '50', 0),
('smtp_auth_method', 'PLAIN', 0),
('smtp_delivery', '0', 0),
('smtp_host', '', 0),
('smtp_password', '', 0),
('smtp_port', '25', 0),
('smtp_username', '', 0),
('teampage_forums', '1', 0),
('teampage_memberships', '1', 0),
('topics_per_page', '25', 0),
('tpl_allow_php', '0', 0),
('upload_dir_size', '0', 1),
('upload_icons_path', 'images/upload_icons', 0),
('upload_path', 'files', 0),
('use_system_cron', '0', 0),
('version', '3.1.4', 0),
('warnings_expire_days', '90', 0),
('warnings_gc', '14400', 0),
('warnings_last_gc', '1439563809', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_config_text`
--

CREATE TABLE IF NOT EXISTS `phpbb_config_text` (
  `config_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `config_value` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_config_text`
--

INSERT INTO `phpbb_config_text` (`config_name`, `config_value`) VALUES
('contact_admin_info', ''),
('contact_admin_info_bitfield', ''),
('contact_admin_info_flags', '7'),
('contact_admin_info_uid', '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_confirm`
--

CREATE TABLE IF NOT EXISTS `phpbb_confirm` (
  `confirm_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `confirm_type` tinyint(3) NOT NULL DEFAULT '0',
  `code` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `seed` int(10) unsigned NOT NULL DEFAULT '0',
  `attempts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`,`confirm_id`),
  KEY `confirm_type` (`confirm_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_disallow`
--

CREATE TABLE IF NOT EXISTS `phpbb_disallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `disallow_username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`disallow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_drafts`
--

CREATE TABLE IF NOT EXISTS `phpbb_drafts` (
  `draft_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `save_time` int(11) unsigned NOT NULL DEFAULT '0',
  `draft_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `draft_message` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`draft_id`),
  KEY `save_time` (`save_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `phpbb_drafts`
--

INSERT INTO `phpbb_drafts` (`draft_id`, `user_id`, `topic_id`, `forum_id`, `save_time`, `draft_subject`, `draft_message`) VALUES
(1, 129, 0, 0, 1438247834, 'thsrth', 'shsfghfg'),
(2, 38, 15, 35, 1439396849, 'Re: тема 7', 'bjlhlyooiouifpugoupguopugopuopuopuopopyiopioptuipupupguopuop\nffjhgfjghdghdfghfhlsghsjgsvcnbchdryuerafsgnfgjnsa/sffvmnbmvbnjjhjhga\njdghskfjghfgyruahkfhgfjbgfmbmfglsakslgsgsgkdngdvhgrhgshd.sd\nsfhgsfjgnmfvnvhfjghfgh,sgfgdfjgjjfdkfhgfjdgfdbnvmnbdba,fnbdfhbjdafb\nj,sfgjfhgghs bsgsgfslg gfg fglfhgh gldfgh adghfghlfgh f ldgd lghadhgadlghdf\nsjhg ksfghsjkghFGHFJGH FG S FHG SFGLSGH FG FG /FG SFGHFS');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_ext`
--

CREATE TABLE IF NOT EXISTS `phpbb_ext` (
  `ext_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ext_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ext_state` text COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `ext_name` (`ext_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_extensions`
--

CREATE TABLE IF NOT EXISTS `phpbb_extensions` (
  `extension_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `extension` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`extension_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `phpbb_extensions`
--

INSERT INTO `phpbb_extensions` (`extension_id`, `group_id`, `extension`) VALUES
(1, 1, 'gif'),
(2, 1, 'png'),
(3, 1, 'jpeg'),
(4, 1, 'jpg'),
(5, 1, 'tif'),
(6, 1, 'tiff'),
(7, 1, 'tga'),
(8, 2, 'gtar'),
(9, 2, 'gz'),
(10, 2, 'tar'),
(11, 2, 'zip'),
(12, 2, 'rar'),
(13, 2, 'ace'),
(14, 2, 'torrent'),
(15, 2, 'tgz'),
(16, 2, 'bz2'),
(17, 2, '7z'),
(18, 3, 'txt'),
(19, 3, 'c'),
(20, 3, 'h'),
(21, 3, 'cpp'),
(22, 3, 'hpp'),
(23, 3, 'diz'),
(24, 3, 'csv'),
(25, 3, 'ini'),
(26, 3, 'log'),
(27, 3, 'js'),
(28, 3, 'xml'),
(29, 4, 'xls'),
(30, 4, 'xlsx'),
(31, 4, 'xlsm'),
(32, 4, 'xlsb'),
(33, 4, 'doc'),
(34, 4, 'docx'),
(35, 4, 'docm'),
(36, 4, 'dot'),
(37, 4, 'dotx'),
(38, 4, 'dotm'),
(39, 4, 'pdf'),
(40, 4, 'ai'),
(41, 4, 'ps'),
(42, 4, 'ppt'),
(43, 4, 'pptx'),
(44, 4, 'pptm'),
(45, 4, 'odg'),
(46, 4, 'odp'),
(47, 4, 'ods'),
(48, 4, 'odt'),
(49, 4, 'rtf'),
(50, 5, 'rm'),
(51, 5, 'ram'),
(52, 6, 'wma'),
(53, 6, 'wmv'),
(54, 7, 'swf'),
(55, 8, 'mov'),
(56, 8, 'm4v'),
(57, 8, 'm4a'),
(58, 8, 'mp4'),
(59, 8, '3gp'),
(60, 8, '3g2'),
(61, 8, 'qt'),
(62, 9, 'mpeg'),
(63, 9, 'mpg'),
(64, 9, 'mp3'),
(65, 9, 'ogg'),
(66, 9, 'ogm');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_extension_groups`
--

CREATE TABLE IF NOT EXISTS `phpbb_extension_groups` (
  `group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cat_id` tinyint(2) NOT NULL DEFAULT '0',
  `allow_group` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `download_mode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `upload_icon` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `max_filesize` int(20) unsigned NOT NULL DEFAULT '0',
  `allowed_forums` text COLLATE utf8_bin NOT NULL,
  `allow_in_pm` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `phpbb_extension_groups`
--

INSERT INTO `phpbb_extension_groups` (`group_id`, `group_name`, `cat_id`, `allow_group`, `download_mode`, `upload_icon`, `max_filesize`, `allowed_forums`, `allow_in_pm`) VALUES
(1, 'IMAGES', 1, 1, 1, '', 0, '', 0),
(2, 'ARCHIVES', 0, 1, 1, '', 0, '', 0),
(3, 'PLAIN_TEXT', 0, 0, 1, '', 0, '', 0),
(4, 'DOCUMENTS', 0, 0, 1, '', 0, '', 0),
(5, 'REAL_MEDIA', 3, 0, 1, '', 0, '', 0),
(6, 'WINDOWS_MEDIA', 2, 0, 1, '', 0, '', 0),
(7, 'FLASH_FILES', 5, 0, 1, '', 0, '', 0),
(8, 'QUICKTIME_MEDIA', 6, 0, 1, '', 0, '', 0),
(9, 'DOWNLOADABLE_FILES', 0, 0, 1, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_forums`
--

CREATE TABLE IF NOT EXISTS `phpbb_forums` (
  `forum_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `left_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `right_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_parents` mediumtext COLLATE utf8_bin NOT NULL,
  `forum_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_desc` text COLLATE utf8_bin NOT NULL,
  `forum_desc_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_desc_options` int(11) unsigned NOT NULL DEFAULT '7',
  `forum_desc_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_link` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_style` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules` text COLLATE utf8_bin NOT NULL,
  `forum_rules_link` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules_options` int(11) unsigned NOT NULL DEFAULT '7',
  `forum_rules_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_topics_per_page` tinyint(4) NOT NULL DEFAULT '0',
  `forum_type` tinyint(4) NOT NULL DEFAULT '0',
  `forum_status` tinyint(4) NOT NULL DEFAULT '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_last_poster_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_last_post_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_last_post_time` int(11) unsigned NOT NULL DEFAULT '0',
  `forum_last_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_last_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_flags` tinyint(4) NOT NULL DEFAULT '32',
  `display_on_index` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_indexing` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_icons` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_prune` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `prune_next` int(11) unsigned NOT NULL DEFAULT '0',
  `prune_days` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `prune_viewed` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `prune_freq` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `display_subforum_list` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `forum_options` int(20) unsigned NOT NULL DEFAULT '0',
  `enable_shadow_prune` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `prune_shadow_days` mediumint(8) unsigned NOT NULL DEFAULT '7',
  `prune_shadow_freq` mediumint(8) unsigned NOT NULL DEFAULT '1',
  `prune_shadow_next` int(11) NOT NULL DEFAULT '0',
  `forum_posts_approved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_posts_unapproved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_posts_softdeleted` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_topics_approved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_topics_unapproved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_topics_softdeleted` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`forum_id`),
  KEY `left_right_id` (`left_id`,`right_id`),
  KEY `forum_lastpost_id` (`forum_last_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `phpbb_forums`
--

INSERT INTO `phpbb_forums` (`forum_id`, `parent_id`, `left_id`, `right_id`, `forum_parents`, `forum_name`, `forum_desc`, `forum_desc_bitfield`, `forum_desc_options`, `forum_desc_uid`, `forum_link`, `forum_password`, `forum_style`, `forum_image`, `forum_rules`, `forum_rules_link`, `forum_rules_bitfield`, `forum_rules_options`, `forum_rules_uid`, `forum_topics_per_page`, `forum_type`, `forum_status`, `forum_last_post_id`, `forum_last_poster_id`, `forum_last_post_subject`, `forum_last_post_time`, `forum_last_poster_name`, `forum_last_poster_colour`, `forum_flags`, `display_on_index`, `enable_indexing`, `enable_icons`, `enable_prune`, `prune_next`, `prune_days`, `prune_viewed`, `prune_freq`, `display_subforum_list`, `forum_options`, `enable_shadow_prune`, `prune_shadow_days`, `prune_shadow_freq`, `prune_shadow_next`, `forum_posts_approved`, `forum_posts_unapproved`, `forum_posts_softdeleted`, `forum_topics_approved`, `forum_topics_unapproved`, `forum_topics_softdeleted`) VALUES
(15, 0, 1, 34, '', 'Інтернет програміст (РНР)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 12, 22, 'Нова тема', 1437125835, 'Student ', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 1, 0, 0, 1, 0, 0),
(16, 15, 2, 3, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Вступ до програмування', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 32, 54, 'Re: Обробка запитів з допомогою PHP', 1438016568, 'StudentFour ', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 16, 0, 0, 4, 0, 0),
(17, 15, 6, 7, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Алгоритмізація і програмування на мові С', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 35, 36, '', 'Програміст (Java)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 37, 38, 'Re: нгокео', 1439399537, 'teacher ', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 2, 0, 0, 1, 0, 0),
(19, 0, 37, 38, '', 'Програміст (С++)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 39, 46, '', 'Англійська мова для ІТ', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 47, 54, '', 'Побудова успішної ІТ кар’єри', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 55, 56, '', 'Тестувальник (QA)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 57, 58, '', 'Програміст (C#)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 59, 60, '', 'Тестувальник (QA)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 61, 62, '', 'Програміст (Objective С)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 63, 64, '', 'Верстальник сайтів (HTML, CSS)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(29, 15, 4, 5, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Елементарна математика', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 33, 39, 'аочропр', 1438089493, 'teacher2@gmail.com', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 1, 0, 0, 1, 0, 0),
(30, 15, 8, 9, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Елементи вищої математики', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(31, 15, 10, 11, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Комп''ютерні мережі', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(32, 15, 12, 13, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Розробка та аналіз алгоритмів. Комбінаторні алгоритми', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(33, 15, 14, 15, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Дискретна математика', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(34, 15, 16, 17, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Бази даних ( Частина 1)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 16, 40, 'Re: Тема Тема', 1437203610, 'teacher3@gmail.com', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 2, 0, 0, 1, 0, 0),
(35, 15, 18, 19, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Бази даних ( Частина 2)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 36, 38, 'Re: тема 7', 1439396894, 'teacher ', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 9, 0, 0, 6, 0, 0),
(36, 15, 20, 21, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Програмування на PHP (Частина 1)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 30, 38, 'Re: иьмтьитьиь', 1437732959, 'teacher ', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 2, 0, 0, 1, 0, 0),
(37, 15, 22, 23, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Регулярні вирази', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(38, 15, 24, 25, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Програмування на PHP (Частина 2)', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(39, 15, 26, 27, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Верстка на HTML, CSS', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(40, 15, 28, 29, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Програмування на JavaScript', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(41, 15, 30, 31, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Сучасні технології розробки програм', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(42, 15, 32, 33, 'a:1:{i:15;a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;i:1;}}', 'Командний дипломний проект', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(43, 20, 40, 41, 'a:1:{i:20;a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;i:1;}}', 'For beginners', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(44, 20, 42, 43, 'a:1:{i:20;a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;i:1;}}', 'Pre Intermediate', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(45, 20, 44, 45, 'a:1:{i:20;a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;i:1;}}', 'Intermediate', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(46, 21, 48, 49, 'a:1:{i:21;a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;i:1;}}', 'Побудова індивідуального плану успішної ІТ кар’єри.', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(47, 21, 50, 51, 'a:1:{i:21;a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;i:1;}}', 'Ефективне працевлаштування.', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(48, 21, 52, 53, 'a:1:{i:21;a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;i:1;}}', 'Психологія успіху', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 0, 0, '', 0, '', '', 48, 0, 1, 0, 0, 0, 7, 7, 1, 1, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_forums_access`
--

CREATE TABLE IF NOT EXISTS `phpbb_forums_access` (
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`forum_id`,`user_id`,`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_forums_track`
--

CREATE TABLE IF NOT EXISTS `phpbb_forums_track` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `mark_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_forums_track`
--

INSERT INTO `phpbb_forums_track` (`user_id`, `forum_id`, `mark_time`) VALUES
(2, 16, 1437055279),
(22, 15, 1437125835),
(22, 16, 1437166713),
(38, 18, 1439399537),
(38, 36, 1437732959),
(39, 29, 1438089493),
(40, 34, 1437203610),
(40, 35, 1437204004),
(45, 15, 1437723594),
(51, 36, 1438013412),
(54, 15, 1438017947),
(54, 16, 1438018025),
(54, 34, 1438017838),
(54, 35, 1438017910),
(54, 36, 1438017942),
(121, 36, 1437554649),
(129, 29, 1438242107);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_forums_watch`
--

CREATE TABLE IF NOT EXISTS `phpbb_forums_watch` (
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `notify_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `forum_id` (`forum_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_stat` (`notify_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_groups`
--

CREATE TABLE IF NOT EXISTS `phpbb_groups` (
  `group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_type` tinyint(4) NOT NULL DEFAULT '1',
  `group_founder_manage` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group_skip_auth` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_desc` text COLLATE utf8_bin NOT NULL,
  `group_desc_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_desc_options` int(11) unsigned NOT NULL DEFAULT '7',
  `group_desc_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group_avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_avatar_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_avatar_width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `group_avatar_height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `group_rank` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_sig_chars` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_receive_pm` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `group_message_limit` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_legend` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_max_recipients` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`),
  KEY `group_legend_name` (`group_legend`,`group_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `phpbb_groups`
--

INSERT INTO `phpbb_groups` (`group_id`, `group_type`, `group_founder_manage`, `group_skip_auth`, `group_name`, `group_desc`, `group_desc_bitfield`, `group_desc_options`, `group_desc_uid`, `group_display`, `group_avatar`, `group_avatar_type`, `group_avatar_width`, `group_avatar_height`, `group_rank`, `group_colour`, `group_sig_chars`, `group_receive_pm`, `group_message_limit`, `group_legend`, `group_max_recipients`) VALUES
(1, 3, 0, 0, 'GUESTS', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(2, 3, 0, 0, 'REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(3, 3, 0, 0, 'REGISTERED_COPPA', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(4, 3, 0, 0, 'GLOBAL_MODERATORS', '', '', 7, '', 0, '', '', 0, 0, 0, '00AA00', 0, 0, 0, 2, 0),
(5, 3, 1, 0, 'ADMINISTRATORS', '', '', 7, '', 0, '', '', 0, 0, 0, 'AA0000', 0, 0, 0, 1, 0),
(6, 3, 0, 0, 'BOTS', '', '', 7, '', 0, '', '', 0, 0, 0, '9E8DA7', 0, 0, 0, 0, 5),
(7, 3, 0, 0, 'NEWLY_REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_icons`
--

CREATE TABLE IF NOT EXISTS `phpbb_icons` (
  `icons_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `icons_url` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `icons_width` tinyint(4) NOT NULL DEFAULT '0',
  `icons_height` tinyint(4) NOT NULL DEFAULT '0',
  `icons_order` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `display_on_posting` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`icons_id`),
  KEY `display_on_posting` (`display_on_posting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `phpbb_icons`
--

INSERT INTO `phpbb_icons` (`icons_id`, `icons_url`, `icons_width`, `icons_height`, `icons_order`, `display_on_posting`) VALUES
(1, 'misc/fire.gif', 16, 16, 1, 1),
(2, 'smile/redface.gif', 16, 16, 9, 1),
(3, 'smile/mrgreen.gif', 16, 16, 10, 1),
(4, 'misc/heart.gif', 16, 16, 4, 1),
(5, 'misc/star.gif', 16, 16, 2, 1),
(6, 'misc/radioactive.gif', 16, 16, 3, 1),
(7, 'misc/thinking.gif', 16, 16, 5, 1),
(8, 'smile/info.gif', 16, 16, 8, 1),
(9, 'smile/question.gif', 16, 16, 6, 1),
(10, 'smile/alert.gif', 16, 16, 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_lang`
--

CREATE TABLE IF NOT EXISTS `phpbb_lang` (
  `lang_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `lang_iso` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_dir` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_english_name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_local_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_author` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`lang_id`),
  KEY `lang_iso` (`lang_iso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `phpbb_lang`
--

INSERT INTO `phpbb_lang` (`lang_id`, `lang_iso`, `lang_dir`, `lang_english_name`, `lang_local_name`, `lang_author`) VALUES
(1, 'en', 'en', 'British English', 'British English', 'phpBB Limited'),
(2, 'uk', 'uk', 'Ukrainian', 'Українська', 'Black_SN');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_log`
--

CREATE TABLE IF NOT EXISTS `phpbb_log` (
  `log_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `log_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reportee_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `log_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `log_time` int(11) unsigned NOT NULL DEFAULT '0',
  `log_operation` text COLLATE utf8_bin NOT NULL,
  `log_data` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `log_type` (`log_type`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `reportee_id` (`reportee_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=122 ;

--
-- Дамп данных таблицы `phpbb_log`
--

INSERT INTO `phpbb_log` (`log_id`, `log_type`, `user_id`, `forum_id`, `topic_id`, `reportee_id`, `log_ip`, `log_time`, `log_operation`, `log_data`) VALUES
(1, 0, 2, 0, 0, 0, '127.0.0.1', 1431076934, 'LOG_INSTALL_INSTALLED', 'a:1:{i:0;s:5:"3.1.4";}'),
(2, 2, 1, 0, 0, 0, '::1', 1431693780, 'LOG_GENERAL_ERROR', 'a:2:{i:0;s:13:"General Error";i:1;s:1513:"SQL ERROR [ mysqli ]<br /><br />Table ''int_ita_db.phpbb_acl_groups'' doesn''t exist [1146]<br /><br />SQL<br /><br />DELETE FROM phpbb_acl_groups\r\n		WHERE forum_id NOT IN (0, ''1'', ''2'')<br /><br />BACKTRACE<br /><div style="font-family: monospace;"><br /><b>FILE:</b> (not given by php)<br /><b>LINE:</b> (not given by php)<br /><b>CALL:</b> msg_handler()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/driver.php<br /><b>LINE:</b> 855<br /><b>CALL:</b> trigger_error()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/mysqli.php<br /><b>LINE:</b> 193<br /><b>CALL:</b> phpbb\\db\\driver\\driver-&gt;sql_error()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/factory.php<br /><b>LINE:</b> 329<br /><b>CALL:</b> phpbb\\db\\driver\\mysqli-&gt;sql_query()<br /><br /><b>FILE:</b> [ROOT]/includes/functions_admin.php<br /><b>LINE:</b> 3113<br /><b>CALL:</b> phpbb\\db\\driver\\factory-&gt;sql_query()<br /><br /><b>FILE:</b> [ROOT]/phpbb/cron/task/core/tidy_database.php<br /><b>LINE:</b> 50<br /><b>CALL:</b> tidy_database()<br /><br /><b>FILE:</b> (not given by php)<br /><b>LINE:</b> (not given by php)<br /><b>CALL:</b> phpbb\\cron\\task\\core\\tidy_database-&gt;run()<br /><br /><b>FILE:</b> [ROOT]/phpbb/cron/task/wrapper.php<br /><b>LINE:</b> 104<br /><b>CALL:</b> call_user_func_array()<br /><br /><b>FILE:</b> [ROOT]/cron.php<br /><b>LINE:</b> 64<br /><b>CALL:</b> phpbb\\cron\\task\\wrapper-&gt;__call()<br /><br /><b>FILE:</b> [ROOT]/cron.php<br /><b>LINE:</b> 64<br /><b>CALL:</b> phpbb\\cron\\task\\wrapper-&gt;run()<br /></div>";}'),
(3, 2, 1, 0, 0, 0, '::1', 1433429455, 'LOG_GENERAL_ERROR', 'a:2:{i:0;s:13:"General Error";i:1;s:1513:"SQL ERROR [ mysqli ]<br /><br />Table ''int_ita_db.phpbb_acl_groups'' doesn''t exist [1146]<br /><br />SQL<br /><br />DELETE FROM phpbb_acl_groups\r\n		WHERE forum_id NOT IN (0, ''1'', ''2'')<br /><br />BACKTRACE<br /><div style="font-family: monospace;"><br /><b>FILE:</b> (not given by php)<br /><b>LINE:</b> (not given by php)<br /><b>CALL:</b> msg_handler()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/driver.php<br /><b>LINE:</b> 855<br /><b>CALL:</b> trigger_error()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/mysqli.php<br /><b>LINE:</b> 193<br /><b>CALL:</b> phpbb\\db\\driver\\driver-&gt;sql_error()<br /><br /><b>FILE:</b> [ROOT]/phpbb/db/driver/factory.php<br /><b>LINE:</b> 329<br /><b>CALL:</b> phpbb\\db\\driver\\mysqli-&gt;sql_query()<br /><br /><b>FILE:</b> [ROOT]/includes/functions_admin.php<br /><b>LINE:</b> 3113<br /><b>CALL:</b> phpbb\\db\\driver\\factory-&gt;sql_query()<br /><br /><b>FILE:</b> [ROOT]/phpbb/cron/task/core/tidy_database.php<br /><b>LINE:</b> 50<br /><b>CALL:</b> tidy_database()<br /><br /><b>FILE:</b> (not given by php)<br /><b>LINE:</b> (not given by php)<br /><b>CALL:</b> phpbb\\cron\\task\\core\\tidy_database-&gt;run()<br /><br /><b>FILE:</b> [ROOT]/phpbb/cron/task/wrapper.php<br /><b>LINE:</b> 104<br /><b>CALL:</b> call_user_func_array()<br /><br /><b>FILE:</b> [ROOT]/cron.php<br /><b>LINE:</b> 64<br /><b>CALL:</b> phpbb\\cron\\task\\wrapper-&gt;__call()<br /><br /><b>FILE:</b> [ROOT]/cron.php<br /><b>LINE:</b> 64<br /><b>CALL:</b> phpbb\\cron\\task\\wrapper-&gt;run()<br /></div>";}'),
(5, 0, 2, 0, 0, 0, '81.30.164.98', 1436605567, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(6, 0, 2, 0, 0, 0, '81.30.164.98', 1436605706, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(7, 0, 2, 0, 0, 0, '81.30.164.98', 1436605722, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(8, 0, 2, 0, 0, 0, '81.30.164.98', 1436605740, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(9, 0, 2, 0, 0, 0, '81.30.164.98', 1436605765, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(10, 0, 2, 0, 0, 0, '81.30.164.98', 1436606118, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(11, 0, 2, 0, 0, 0, '81.30.164.98', 1436606137, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(12, 0, 2, 0, 0, 0, '81.30.164.98', 1436606146, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(13, 0, 2, 0, 0, 0, '81.30.164.98', 1436606275, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(14, 0, 2, 0, 0, 0, '81.30.164.98', 1436606306, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (С++)";}'),
(15, 0, 2, 0, 0, 0, '81.30.164.98', 1436606568, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(16, 0, 2, 0, 0, 0, '81.30.164.98', 1436606599, 'LOG_FORUM_ADD', 'a:1:{i:0;s:41:"Англійська мова для ІТ";}'),
(17, 0, 2, 0, 0, 0, '81.30.164.98', 1436606628, 'LOG_FORUM_ADD', 'a:1:{i:0;s:41:"Англійська мова для ІТ";}'),
(18, 0, 2, 0, 0, 0, '81.30.164.98', 1436606662, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:41:"Англійська мова для ІТ";}'),
(19, 0, 2, 0, 0, 0, '81.30.164.98', 1436606742, 'LOG_FORUM_EDIT', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(20, 0, 2, 0, 0, 0, '81.30.164.98', 1436606742, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:38:"Ваша перша категорія";i:1;s:46:"Інтернет програміст (РНР)";}'),
(21, 0, 2, 0, 0, 0, '81.30.164.98', 1436607558, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(22, 0, 2, 0, 0, 0, '81.30.164.98', 1436607835, 'LOG_FORUM_EDIT', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(23, 0, 2, 0, 0, 0, '81.30.164.98', 1436607835, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:38:"Ваша перша категорія";i:1;s:46:"Інтернет програміст (РНР)";}'),
(24, 0, 2, 0, 0, 0, '81.30.164.98', 1436616850, 'LOG_ADMIN_AUTH_FAIL', ''),
(25, 0, 2, 0, 0, 0, '81.30.164.98', 1436616859, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(26, 0, 2, 0, 0, 0, '81.30.164.98', 1436970132, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(27, 0, 2, 0, 0, 0, '81.30.164.98', 1436971652, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(28, 0, 2, 0, 0, 0, '81.30.164.98', 1436971734, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(29, 0, 2, 0, 0, 0, '81.30.164.98', 1436976080, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(30, 0, 2, 0, 0, 0, '81.30.164.98', 1436976124, 'LOG_FORUM_DEL_FORUMS', 'a:1:{i:0;s:38:"Ваша перша категорія";}'),
(31, 0, 2, 0, 0, 0, '81.30.164.98', 1436976137, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(32, 0, 2, 0, 0, 0, '81.30.164.98', 1436976148, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(33, 0, 2, 0, 0, 0, '81.30.164.98', 1436976165, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:27:"Програміст (С++)";}'),
(34, 0, 2, 0, 0, 0, '81.30.164.98', 1436976173, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:41:"Англійська мова для ІТ";}'),
(35, 0, 2, 0, 0, 0, '81.30.164.98', 1436977413, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(36, 0, 2, 0, 0, 0, '81.30.164.98', 1436982874, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(37, 0, 2, 0, 0, 0, '81.30.164.98', 1436985882, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(38, 0, 2, 0, 0, 0, '81.30.164.98', 1436985894, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(39, 0, 2, 0, 0, 0, '81.30.164.98', 1436985933, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(40, 0, 2, 0, 0, 0, '81.30.164.98', 1436985937, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(41, 0, 2, 0, 0, 0, '81.30.164.98', 1436985946, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(42, 0, 2, 0, 0, 0, '81.30.164.98', 1437051512, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(43, 0, 2, 0, 0, 0, '81.30.164.98', 1437051522, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(44, 0, 2, 0, 0, 0, '81.30.164.98', 1437051528, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(45, 0, 2, 0, 0, 0, '81.30.164.98', 1437051563, 'LOG_FORUM_ADD', 'a:1:{i:0;s:46:"Інтернет програміст (РНР)";}'),
(46, 0, 2, 0, 0, 0, '81.30.164.98', 1437051892, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(47, 0, 2, 0, 0, 0, '81.30.164.98', 1437051932, 'LOG_FORUM_ADD', 'a:1:{i:0;s:59:"Модуль 1.	 Вступ до програмування";}'),
(48, 0, 2, 0, 0, 0, '81.30.164.98', 1437051932, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:59:"Модуль 1.	 Вступ до програмування";}'),
(49, 0, 2, 0, 0, 0, '81.30.164.98', 1437051965, 'LOG_FORUM_ADD', 'a:1:{i:0;s:92:"Модуль 2.	 Алгоритмізація і програмування на мові С";}'),
(50, 0, 2, 0, 0, 0, '81.30.164.98', 1437051965, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:92:"Модуль 2.	 Алгоритмізація і програмування на мові С";}'),
(51, 0, 2, 0, 0, 0, '81.30.164.98', 1437052010, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (Java)";}'),
(52, 0, 2, 0, 0, 0, '81.30.164.98', 1437052010, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:27:"Програміст (Java)";}'),
(53, 0, 2, 0, 0, 0, '81.30.164.98', 1437052132, 'LOG_FORUM_ADD', 'a:1:{i:0;s:27:"Програміст (С++)";}'),
(54, 0, 2, 0, 0, 0, '81.30.164.98', 1437052132, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:27:"Програміст (С++)";}'),
(55, 0, 2, 0, 0, 0, '81.30.164.98', 1437052156, 'LOG_FORUM_ADD', 'a:1:{i:0;s:41:"Англійська мова для ІТ";}'),
(56, 0, 2, 0, 0, 0, '81.30.164.98', 1437052156, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:41:"Англійська мова для ІТ";}'),
(57, 0, 2, 0, 0, 0, '81.30.164.98', 1437052176, 'LOG_FORUM_ADD', 'a:1:{i:0;s:54:"Побудова успішної ІТ кар’єри";}'),
(58, 0, 2, 0, 0, 0, '81.30.164.98', 1437052176, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:54:"Побудова успішної ІТ кар’єри";}'),
(59, 0, 2, 0, 0, 0, '81.30.164.98', 1437052554, 'LOG_FORUM_ADD', 'a:1:{i:0;s:51:"Інтернет програміст (Java Script)";}'),
(60, 0, 2, 0, 0, 0, '81.30.164.98', 1437052577, 'LOG_FORUM_ADD', 'a:1:{i:0;s:25:"Програміст (C#)";}'),
(61, 0, 2, 0, 0, 0, '81.30.164.98', 1437052601, 'LOG_FORUM_ADD', 'a:1:{i:0;s:29:"Тестувальник (QA)";}'),
(62, 0, 2, 0, 0, 0, '81.30.164.98', 1437052601, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:29:"Тестувальник (QA)";}'),
(63, 0, 2, 0, 0, 0, '81.30.164.98', 1437052620, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:51:"Інтернет програміст (Java Script)";}'),
(64, 0, 2, 0, 0, 0, '81.30.164.98', 1437052632, 'LOG_FORUM_DEL_POSTS', 'a:1:{i:0;s:25:"Програміст (C#)";}'),
(65, 0, 2, 0, 0, 0, '81.30.164.98', 1437052654, 'LOG_FORUM_ADD', 'a:1:{i:0;s:25:"Програміст (C#)";}'),
(66, 0, 2, 0, 0, 0, '81.30.164.98', 1437052654, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:25:"Програміст (C#)";}'),
(67, 0, 2, 0, 0, 0, '81.30.164.98', 1437052675, 'LOG_FORUM_ADD', 'a:1:{i:0;s:29:"Тестувальник (QA)";}'),
(68, 0, 2, 0, 0, 0, '81.30.164.98', 1437052675, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:29:"Тестувальник (QA)";}'),
(69, 0, 2, 0, 0, 0, '81.30.164.98', 1437052702, 'LOG_FORUM_ADD', 'a:1:{i:0;s:35:"Програміст (Objective С)";}'),
(70, 0, 2, 0, 0, 0, '81.30.164.98', 1437052702, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:35:"Програміст (Objective С)";}'),
(71, 0, 2, 0, 0, 0, '81.30.164.98', 1437052729, 'LOG_FORUM_ADD', 'a:1:{i:0;s:47:"Верстальник сайтів (HTML, CSS)";}'),
(72, 0, 2, 0, 0, 0, '81.30.164.98', 1437052729, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:47:"Верстальник сайтів (HTML, CSS)";}'),
(73, 0, 2, 0, 0, 0, '81.30.164.98', 1437052972, 'LOG_FORUM_ADD', 'a:1:{i:0;s:43:"Елементарна математика";}'),
(74, 0, 2, 0, 0, 0, '81.30.164.98', 1437052972, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:43:"Елементарна математика";}'),
(75, 0, 2, 0, 0, 0, '81.30.164.98', 1437053006, 'LOG_FORUM_ADD', 'a:1:{i:0;s:48:"Елементи вищої математики";}'),
(76, 0, 2, 0, 0, 0, '81.30.164.98', 1437053006, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:48:"Елементи вищої математики";}'),
(77, 0, 2, 0, 0, 0, '81.30.164.98', 1437053031, 'LOG_FORUM_ADD', 'a:1:{i:0;s:34:"Комп''ютерні мережі";}'),
(78, 0, 2, 0, 0, 0, '81.30.164.98', 1437053031, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:34:"Комп''ютерні мережі";}'),
(79, 0, 2, 0, 0, 0, '81.30.164.98', 1437053050, 'LOG_FORUM_ADD', 'a:1:{i:0;s:100:"Розробка та аналіз алгоритмів. Комбінаторні алгоритми";}'),
(80, 0, 2, 0, 0, 0, '81.30.164.98', 1437053050, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:100:"Розробка та аналіз алгоритмів. Комбінаторні алгоритми";}'),
(81, 0, 2, 0, 0, 0, '81.30.164.98', 1437053074, 'LOG_FORUM_ADD', 'a:1:{i:0;s:39:"Дискретна математика";}'),
(82, 0, 2, 0, 0, 0, '81.30.164.98', 1437053074, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:39:"Дискретна математика";}'),
(83, 0, 2, 0, 0, 0, '81.30.164.98', 1437053092, 'LOG_FORUM_ADD', 'a:1:{i:0;s:39:"Бази даних ( Частина 1)";}'),
(84, 0, 2, 0, 0, 0, '81.30.164.98', 1437053093, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:39:"Бази даних ( Частина 1)";}'),
(85, 0, 2, 0, 0, 0, '81.30.164.98', 1437053110, 'LOG_FORUM_ADD', 'a:1:{i:0;s:39:"Бази даних ( Частина 2)";}'),
(86, 0, 2, 0, 0, 0, '81.30.164.98', 1437053110, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:39:"Бази даних ( Частина 2)";}'),
(87, 0, 2, 0, 0, 0, '81.30.164.98', 1437053129, 'LOG_FORUM_ADD', 'a:1:{i:0;s:54:"Програмування на PHP (Частина 1)";}'),
(88, 0, 2, 0, 0, 0, '81.30.164.98', 1437053129, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:54:"Програмування на PHP (Частина 1)";}'),
(89, 0, 2, 0, 0, 0, '81.30.164.98', 1437053149, 'LOG_FORUM_ADD', 'a:1:{i:0;s:31:"Регулярні вирази";}'),
(90, 0, 2, 0, 0, 0, '81.30.164.98', 1437053149, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:31:"Регулярні вирази";}'),
(91, 0, 2, 0, 0, 0, '81.30.164.98', 1437053157, 'LOG_FORUM_MOVE_UP', 'a:2:{i:0;s:43:"Елементарна математика";i:1;s:75:"Алгоритмізація і програмування на мові С";}'),
(92, 0, 2, 0, 0, 0, '81.30.164.98', 1437053171, 'LOG_FORUM_ADD', 'a:1:{i:0;s:54:"Програмування на PHP (Частина 2)";}'),
(93, 0, 2, 0, 0, 0, '81.30.164.98', 1437053171, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:54:"Програмування на PHP (Частина 2)";}'),
(94, 0, 2, 0, 0, 0, '81.30.164.98', 1437053188, 'LOG_FORUM_ADD', 'a:1:{i:0;s:29:"Верстка на HTML, CSS";}'),
(95, 0, 2, 0, 0, 0, '81.30.164.98', 1437053189, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:29:"Верстка на HTML, CSS";}'),
(96, 0, 2, 0, 0, 0, '81.30.164.98', 1437053209, 'LOG_FORUM_ADD', 'a:1:{i:0;s:42:"Програмування на JavaScript";}'),
(97, 0, 2, 0, 0, 0, '81.30.164.98', 1437053209, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:42:"Програмування на JavaScript";}'),
(98, 0, 2, 0, 0, 0, '81.30.164.98', 1437053225, 'LOG_FORUM_ADD', 'a:1:{i:0;s:67:"Сучасні технології розробки програм";}'),
(99, 0, 2, 0, 0, 0, '81.30.164.98', 1437053225, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:67:"Сучасні технології розробки програм";}'),
(100, 0, 2, 0, 0, 0, '81.30.164.98', 1437053239, 'LOG_FORUM_ADD', 'a:1:{i:0;s:50:"Командний дипломний проект";}'),
(101, 0, 2, 0, 0, 0, '81.30.164.98', 1437053239, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:46:"Інтернет програміст (РНР)";i:1;s:50:"Командний дипломний проект";}'),
(102, 0, 2, 0, 0, 0, '81.30.164.98', 1437053321, 'LOG_FORUM_ADD', 'a:1:{i:0;s:13:"For beginners";}'),
(103, 0, 2, 0, 0, 0, '81.30.164.98', 1437053321, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;s:13:"For beginners";}'),
(104, 0, 2, 0, 0, 0, '81.30.164.98', 1437053339, 'LOG_FORUM_ADD', 'a:1:{i:0;s:16:"Pre Intermediate";}'),
(105, 0, 2, 0, 0, 0, '81.30.164.98', 1437053339, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;s:16:"Pre Intermediate";}'),
(106, 0, 2, 0, 0, 0, '81.30.164.98', 1437053354, 'LOG_FORUM_ADD', 'a:1:{i:0;s:12:"Intermediate";}'),
(107, 0, 2, 0, 0, 0, '81.30.164.98', 1437053354, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:41:"Англійська мова для ІТ";i:1;s:12:"Intermediate";}'),
(108, 0, 2, 0, 0, 0, '81.30.164.98', 1437053445, 'LOG_FORUM_ADD', 'a:1:{i:0;s:97:"Побудова індивідуального плану успішної ІТ кар’єри.";}'),
(109, 0, 2, 0, 0, 0, '81.30.164.98', 1437053445, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;s:97:"Побудова індивідуального плану успішної ІТ кар’єри.";}'),
(110, 0, 2, 0, 0, 0, '81.30.164.98', 1437053483, 'LOG_FORUM_ADD', 'a:1:{i:0;s:52:"Ефективне працевлаштування.";}'),
(111, 0, 2, 0, 0, 0, '81.30.164.98', 1437053483, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;s:52:"Ефективне працевлаштування.";}'),
(112, 0, 2, 0, 0, 0, '81.30.164.98', 1437053501, 'LOG_FORUM_ADD', 'a:1:{i:0;s:33:"Психологія успіху";}'),
(113, 0, 2, 0, 0, 0, '81.30.164.98', 1437053501, 'LOG_FORUM_COPIED_PERMISSIONS', 'a:2:{i:0;s:54:"Побудова успішної ІТ кар’єри";i:1;s:33:"Психологія успіху";}'),
(114, 0, 2, 0, 0, 0, '81.30.164.98', 1437055050, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(115, 2, 22, 0, 0, 0, '178.94.81.41', 1437135643, 'LOG_IP_BROWSER_FORWARDED_CHECK', 'a:6:{i:0;s:9:"178.94.81";i:1;s:9:"178.92.66";i:2;s:65:"mozilla/5.0 (windows nt 6.1; rv:40.0) gecko/20100101 firefox/40.0";i:3;s:65:"mozilla/5.0 (windows nt 6.1; rv:40.0) gecko/20100101 firefox/40.0";i:4;s:0:"";i:5;s:0:"";}'),
(116, 2, 52, 0, 0, 0, '94.179.33.38', 1437550299, 'LOG_IP_BROWSER_FORWARDED_CHECK', 'a:6:{i:0;s:9:"94.179.33";i:1;s:9:"94.179.58";i:2;s:65:"mozilla/5.0 (windows nt 6.1; rv:40.0) gecko/20100101 firefox/40.0";i:3;s:65:"mozilla/5.0 (windows nt 6.1; rv:40.0) gecko/20100101 firefox/40.0";i:4;s:0:"";i:5;s:0:"";}'),
(117, 0, 2, 0, 0, 0, '81.30.164.98', 1438188522, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(118, 2, 45, 0, 0, 0, '178.94.166.76', 1438196845, 'LOG_IP_BROWSER_FORWARDED_CHECK', 'a:6:{i:0;s:10:"178.94.166";i:1;s:7:"37.54.2";i:2;s:125:"mozilla/5.0 (linux; android 5.0; k012 build/lrx21v) applewebkit/537.36 (khtml, like gecko) chrome/42.0.2311.109 safari/537.36";i:3;s:125:"mozilla/5.0 (linux; android 5.0; k012 build/lrx21v) applewebkit/537.36 (khtml, like gecko) chrome/42.0.2311.109 safari/537.36";i:4;s:0:"";i:5;s:0:"";}'),
(119, 0, 2, 0, 0, 0, '81.30.164.98', 1439387699, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(120, 0, 2, 0, 0, 0, '81.30.164.98', 1439396860, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(121, 2, 45, 0, 0, 0, '81.30.164.98', 1439563767, 'LOG_IP_BROWSER_FORWARDED_CHECK', 'a:6:{i:0;s:9:"81.30.164";i:1;s:9:"81.30.164";i:2;s:102:"mozilla/5.0 (windows nt 6.1) applewebkit/537.36 (khtml, like gecko) chrome/44.0.2403.155 safari/537.36";i:3;s:102:"mozilla/5.0 (windows nt 6.1) applewebkit/537.36 (khtml, like gecko) chrome/44.0.2403.130 safari/537.36";i:4;s:0:"";i:5;s:0:"";}');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_login_attempts`
--

CREATE TABLE IF NOT EXISTS `phpbb_login_attempts` (
  `attempt_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_browser` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_forwarded_for` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_time` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `username_clean` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  KEY `att_ip` (`attempt_ip`,`attempt_time`),
  KEY `att_for` (`attempt_forwarded_for`,`attempt_time`),
  KEY `att_time` (`attempt_time`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_migrations`
--

CREATE TABLE IF NOT EXISTS `phpbb_migrations` (
  `migration_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `migration_depends_on` text COLLATE utf8_bin NOT NULL,
  `migration_schema_done` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `migration_data_done` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `migration_data_state` text COLLATE utf8_bin NOT NULL,
  `migration_start_time` int(11) unsigned NOT NULL DEFAULT '0',
  `migration_end_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`migration_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_migrations`
--

INSERT INTO `phpbb_migrations` (`migration_name`, `migration_depends_on`, `migration_schema_done`, `migration_data_done`, `migration_data_state`, `migration_start_time`, `migration_end_time`) VALUES
('\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5', 'a:1:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module', 'a:1:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\allow_cdn', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\jquery_update";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\alpha1', 'a:18:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode";i:1;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12";i:2;s:57:"\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module";i:3;s:39:"\\phpbb\\db\\migration\\data\\v310\\allow_cdn";i:4;s:49:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth";i:5;s:37:"\\phpbb\\db\\migration\\data\\v310\\avatars";i:6;s:40:"\\phpbb\\db\\migration\\data\\v310\\boardindex";i:7;s:44:"\\phpbb\\db\\migration\\data\\v310\\config_db_text";i:8;s:45:"\\phpbb\\db\\migration\\data\\v310\\forgot_password";i:9;s:41:"\\phpbb\\db\\migration\\data\\v310\\mod_rewrite";i:10;s:49:"\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop";i:11;s:40:"\\phpbb\\db\\migration\\data\\v310\\namespaces";i:12;s:48:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron";i:13;s:60:"\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert";i:14;s:38:"\\phpbb\\db\\migration\\data\\v310\\plupload";i:15;s:51:"\\phpbb\\db\\migration\\data\\v310\\signature_module_auth";i:16;s:52:"\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules";i:17;s:38:"\\phpbb\\db\\migration\\data\\v310\\teampage";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\alpha2', 'a:2:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha1";i:1;s:51:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\alpha3', 'a:4:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha2";i:1;s:42:"\\phpbb\\db\\migration\\data\\v310\\avatar_types";i:2;s:39:"\\phpbb\\db\\migration\\data\\v310\\passwords";i:3;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2', 'a:1:{i:0;s:49:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\avatar_types', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:37:"\\phpbb\\db\\migration\\data\\v310\\avatars";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\avatars', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\beta1', 'a:7:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha3";i:1;s:42:"\\phpbb\\db\\migration\\data\\v310\\passwords_p2";i:2;s:52:"\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop";i:3;s:63:"\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings";i:4;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location";i:5;s:54:"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2";i:6;s:48:"\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\beta2', 'a:3:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta1";i:1;s:52:"\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module";i:2;s:59:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\beta3', 'a:6:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta2";i:1;s:50:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\board_contact_name";i:3;s:44:"\\phpbb\\db\\migration\\data\\v310\\jquery_update2";i:4;s:50:"\\phpbb\\db\\migration\\data\\v310\\live_searches_config";i:5;s:49:"\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\beta4', 'a:3:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta3";i:1;s:69:"\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable";i:2;s:58:"\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\board_contact_name', 'a:1:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\boardindex', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\bot_update', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc6";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\captcha_plugins', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\config_db_text', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_form', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v310\\config_db_text";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\dev', 'a:5:{i:0;s:40:"\\phpbb\\db\\migration\\data\\v310\\extensions";i:1;s:45:"\\phpbb\\db\\migration\\data\\v310\\style_update_p2";i:2;s:41:"\\phpbb\\db\\migration\\data\\v310\\timezone_p2";i:3;s:52:"\\phpbb\\db\\migration\\data\\v310\\reported_posts_display";i:4;s:46:"\\phpbb\\db\\migration\\data\\v310\\migrations_table";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\extensions', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\forgot_password', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\gold', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc6";i:1;s:40:"\\phpbb\\db\\migration\\data\\v310\\bot_update";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update2', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\jquery_update";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\live_searches_config', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\migrations_table', 'a:0:{}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\mod_rewrite', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\namespaces', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notifications', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\notifications";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\notifications";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\passwords', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1', 'a:1:{i:0;s:42:"\\phpbb\\db\\migration\\data\\v310\\passwords_p2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\passwords_p2', 'a:1:{i:0;s:39:"\\phpbb\\db\\migration\\data\\v310\\passwords";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\plupload', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup', 'a:2:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests";i:1;s:53:"\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_interests', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";i:1;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup', 'a:1:{i:0;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation', 'a:1:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_skype', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_types', 'a:1:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website', 'a:2:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";i:1;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_website";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm', 'a:1:{i:0;s:58:"\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc1', 'a:9:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta4";i:1;s:54:"\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\contact_admin_form";i:3;s:50:"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2";i:4;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook";i:5;s:53:"\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus";i:6;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_skype";i:7;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter";i:8;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc2', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc3', 'a:5:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc2";i:1;s:45:"\\phpbb\\db\\migration\\data\\v310\\captcha_plugins";i:2;s:53:"\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes";i:3;s:41:"\\phpbb\\db\\migration\\data\\v310\\search_type";i:4;s:49:"\\phpbb\\db\\migration\\data\\v310\\topic_sort_username";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc4', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";i:1;s:57:"\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc5', 'a:3:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc4";i:1;s:66:"\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length";i:2;s:53:"\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rc6', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc5";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc4";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\reported_posts_display', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\search_type', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\signature_module_auth', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert', 'a:1:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha3";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2', 'a:1:{i:0;s:53:"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:43:"\\phpbb\\db\\migration\\data\\v310\\softdelete_p2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p1', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p2', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:43:"\\phpbb\\db\\migration\\data\\v310\\softdelete_p1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p2', 'a:1:{i:0;s:45:"\\phpbb\\db\\migration\\data\\v310\\style_update_p1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\teampage', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\timezone', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\timezone_p2', 'a:1:{i:0;s:38:"\\phpbb\\db\\migration\\data\\v310\\timezone";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\topic_sort_username', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\style_update', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v310\\gold";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v311', 'a:2:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v310\\gold";i:1;s:42:"\\phpbb\\db\\migration\\data\\v31x\\style_update";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v312', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v312rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v312rc1', 'a:2:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";i:1;s:49:"\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v313', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v313rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc1', 'a:5:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1";i:1;s:54:"\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic";i:2;s:71:"\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha";i:3;s:59:"\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url";i:4;s:60:"\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc2', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v313rc1";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v314', 'a:2:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v314rc2";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v313";}', 1, 1, '', 1431076934, 1431076934),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc2', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v314rc1";}', 1, 1, '', 1431076934, 1431076934);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_moderator_cache`
--

CREATE TABLE IF NOT EXISTS `phpbb_moderator_cache` (
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_on_index` tinyint(1) unsigned NOT NULL DEFAULT '1',
  KEY `disp_idx` (`display_on_index`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_modules`
--

CREATE TABLE IF NOT EXISTS `phpbb_modules` (
  `module_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module_enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `module_display` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `module_basename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_class` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `left_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `right_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `module_langname` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_mode` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_auth` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`module_id`),
  KEY `left_right_id` (`left_id`,`right_id`),
  KEY `module_enabled` (`module_enabled`),
  KEY `class_left_id` (`module_class`,`left_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=207 ;

--
-- Дамп данных таблицы `phpbb_modules`
--

INSERT INTO `phpbb_modules` (`module_id`, `module_enabled`, `module_display`, `module_basename`, `module_class`, `parent_id`, `left_id`, `right_id`, `module_langname`, `module_mode`, `module_auth`) VALUES
(1, 1, 1, '', 'acp', 0, 1, 66, 'ACP_CAT_GENERAL', '', ''),
(2, 1, 1, '', 'acp', 1, 4, 17, 'ACP_QUICK_ACCESS', '', ''),
(3, 1, 1, '', 'acp', 1, 18, 43, 'ACP_BOARD_CONFIGURATION', '', ''),
(4, 1, 1, '', 'acp', 1, 44, 51, 'ACP_CLIENT_COMMUNICATION', '', ''),
(5, 1, 1, '', 'acp', 1, 52, 65, 'ACP_SERVER_CONFIGURATION', '', ''),
(6, 1, 1, '', 'acp', 0, 67, 86, 'ACP_CAT_FORUMS', '', ''),
(7, 1, 1, '', 'acp', 6, 68, 73, 'ACP_MANAGE_FORUMS', '', ''),
(8, 1, 1, '', 'acp', 6, 74, 85, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(9, 1, 1, '', 'acp', 0, 87, 114, 'ACP_CAT_POSTING', '', ''),
(10, 1, 1, '', 'acp', 9, 88, 101, 'ACP_MESSAGES', '', ''),
(11, 1, 1, '', 'acp', 9, 102, 113, 'ACP_ATTACHMENTS', '', ''),
(12, 1, 1, '', 'acp', 0, 115, 172, 'ACP_CAT_USERGROUP', '', ''),
(13, 1, 1, '', 'acp', 12, 116, 151, 'ACP_CAT_USERS', '', ''),
(14, 1, 1, '', 'acp', 12, 152, 161, 'ACP_GROUPS', '', ''),
(15, 1, 1, '', 'acp', 12, 162, 171, 'ACP_USER_SECURITY', '', ''),
(16, 1, 1, '', 'acp', 0, 173, 222, 'ACP_CAT_PERMISSIONS', '', ''),
(17, 1, 1, '', 'acp', 16, 176, 185, 'ACP_GLOBAL_PERMISSIONS', '', ''),
(18, 1, 1, '', 'acp', 16, 186, 197, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(19, 1, 1, '', 'acp', 16, 198, 207, 'ACP_PERMISSION_ROLES', '', ''),
(20, 1, 1, '', 'acp', 16, 208, 221, 'ACP_PERMISSION_MASKS', '', ''),
(21, 1, 1, '', 'acp', 0, 223, 238, 'ACP_CAT_CUSTOMISE', '', ''),
(22, 1, 1, '', 'acp', 21, 228, 233, 'ACP_STYLE_MANAGEMENT', '', ''),
(23, 1, 1, '', 'acp', 21, 224, 227, 'ACP_EXTENSION_MANAGEMENT', '', ''),
(24, 1, 1, '', 'acp', 21, 234, 237, 'ACP_LANGUAGE', '', ''),
(25, 1, 1, '', 'acp', 0, 239, 258, 'ACP_CAT_MAINTENANCE', '', ''),
(26, 1, 1, '', 'acp', 25, 240, 249, 'ACP_FORUM_LOGS', '', ''),
(27, 1, 1, '', 'acp', 25, 250, 257, 'ACP_CAT_DATABASE', '', ''),
(28, 1, 1, '', 'acp', 0, 259, 282, 'ACP_CAT_SYSTEM', '', ''),
(29, 1, 1, '', 'acp', 28, 260, 263, 'ACP_AUTOMATION', '', ''),
(30, 1, 1, '', 'acp', 28, 264, 273, 'ACP_GENERAL_TASKS', '', ''),
(31, 1, 1, '', 'acp', 28, 274, 281, 'ACP_MODULE_MANAGEMENT', '', ''),
(32, 1, 1, '', 'acp', 0, 283, 284, 'ACP_CAT_DOT_MODS', '', ''),
(33, 1, 1, 'acp_attachments', 'acp', 3, 19, 20, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(34, 1, 1, 'acp_attachments', 'acp', 11, 103, 104, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(35, 1, 1, 'acp_attachments', 'acp', 11, 105, 106, 'ACP_MANAGE_EXTENSIONS', 'extensions', 'acl_a_attach'),
(36, 1, 1, 'acp_attachments', 'acp', 11, 107, 108, 'ACP_EXTENSION_GROUPS', 'ext_groups', 'acl_a_attach'),
(37, 1, 1, 'acp_attachments', 'acp', 11, 109, 110, 'ACP_ORPHAN_ATTACHMENTS', 'orphan', 'acl_a_attach'),
(38, 1, 1, 'acp_attachments', 'acp', 11, 111, 112, 'ACP_MANAGE_ATTACHMENTS', 'manage', 'acl_a_attach'),
(39, 1, 1, 'acp_ban', 'acp', 15, 163, 164, 'ACP_BAN_EMAILS', 'email', 'acl_a_ban'),
(40, 1, 1, 'acp_ban', 'acp', 15, 165, 166, 'ACP_BAN_IPS', 'ip', 'acl_a_ban'),
(41, 1, 1, 'acp_ban', 'acp', 15, 167, 168, 'ACP_BAN_USERNAMES', 'user', 'acl_a_ban'),
(42, 1, 1, 'acp_bbcodes', 'acp', 10, 89, 90, 'ACP_BBCODES', 'bbcodes', 'acl_a_bbcode'),
(43, 1, 1, 'acp_board', 'acp', 3, 21, 22, 'ACP_BOARD_SETTINGS', 'settings', 'acl_a_board'),
(44, 1, 1, 'acp_board', 'acp', 3, 23, 24, 'ACP_BOARD_FEATURES', 'features', 'acl_a_board'),
(45, 1, 1, 'acp_board', 'acp', 3, 25, 26, 'ACP_AVATAR_SETTINGS', 'avatar', 'acl_a_board'),
(46, 1, 1, 'acp_board', 'acp', 3, 27, 28, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(47, 1, 1, 'acp_board', 'acp', 10, 91, 92, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(48, 1, 1, 'acp_board', 'acp', 3, 29, 30, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(49, 1, 1, 'acp_board', 'acp', 10, 93, 94, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(50, 1, 1, 'acp_board', 'acp', 3, 31, 32, 'ACP_SIGNATURE_SETTINGS', 'signature', 'acl_a_board'),
(51, 1, 1, 'acp_board', 'acp', 3, 33, 34, 'ACP_FEED_SETTINGS', 'feed', 'acl_a_board'),
(52, 1, 1, 'acp_board', 'acp', 3, 35, 36, 'ACP_REGISTER_SETTINGS', 'registration', 'acl_a_board'),
(53, 1, 1, 'acp_board', 'acp', 4, 45, 46, 'ACP_AUTH_SETTINGS', 'auth', 'acl_a_server'),
(54, 1, 1, 'acp_board', 'acp', 4, 47, 48, 'ACP_EMAIL_SETTINGS', 'email', 'acl_a_server'),
(55, 1, 1, 'acp_board', 'acp', 5, 53, 54, 'ACP_COOKIE_SETTINGS', 'cookie', 'acl_a_server'),
(56, 1, 1, 'acp_board', 'acp', 5, 55, 56, 'ACP_SERVER_SETTINGS', 'server', 'acl_a_server'),
(57, 1, 1, 'acp_board', 'acp', 5, 57, 58, 'ACP_SECURITY_SETTINGS', 'security', 'acl_a_server'),
(58, 1, 1, 'acp_board', 'acp', 5, 59, 60, 'ACP_LOAD_SETTINGS', 'load', 'acl_a_server'),
(59, 1, 1, 'acp_bots', 'acp', 30, 265, 266, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(60, 1, 1, 'acp_captcha', 'acp', 3, 37, 38, 'ACP_VC_SETTINGS', 'visual', 'acl_a_board'),
(61, 1, 0, 'acp_captcha', 'acp', 3, 39, 40, 'ACP_VC_CAPTCHA_DISPLAY', 'img', 'acl_a_board'),
(62, 1, 1, 'acp_contact', 'acp', 3, 41, 42, 'ACP_CONTACT_SETTINGS', 'contact', 'acl_a_board'),
(63, 1, 1, 'acp_database', 'acp', 27, 251, 252, 'ACP_BACKUP', 'backup', 'acl_a_backup'),
(64, 1, 1, 'acp_database', 'acp', 27, 253, 254, 'ACP_RESTORE', 'restore', 'acl_a_backup'),
(65, 1, 1, 'acp_disallow', 'acp', 15, 169, 170, 'ACP_DISALLOW_USERNAMES', 'usernames', 'acl_a_names'),
(66, 1, 1, 'acp_email', 'acp', 30, 267, 268, 'ACP_MASS_EMAIL', 'email', 'acl_a_email && cfg_email_enable'),
(67, 1, 1, 'acp_extensions', 'acp', 23, 225, 226, 'ACP_EXTENSIONS', 'main', 'acl_a_extensions'),
(68, 1, 1, 'acp_forums', 'acp', 7, 69, 70, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(69, 1, 1, 'acp_groups', 'acp', 14, 153, 154, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(70, 1, 1, 'acp_groups', 'acp', 14, 155, 156, 'ACP_GROUPS_POSITION', 'position', 'acl_a_group'),
(71, 1, 1, 'acp_icons', 'acp', 10, 95, 96, 'ACP_ICONS', 'icons', 'acl_a_icons'),
(72, 1, 1, 'acp_icons', 'acp', 10, 97, 98, 'ACP_SMILIES', 'smilies', 'acl_a_icons'),
(73, 1, 1, 'acp_inactive', 'acp', 13, 117, 118, 'ACP_INACTIVE_USERS', 'list', 'acl_a_user'),
(74, 1, 1, 'acp_jabber', 'acp', 4, 49, 50, 'ACP_JABBER_SETTINGS', 'settings', 'acl_a_jabber'),
(75, 1, 1, 'acp_language', 'acp', 24, 235, 236, 'ACP_LANGUAGE_PACKS', 'lang_packs', 'acl_a_language'),
(76, 1, 1, 'acp_logs', 'acp', 26, 241, 242, 'ACP_ADMIN_LOGS', 'admin', 'acl_a_viewlogs'),
(77, 1, 1, 'acp_logs', 'acp', 26, 243, 244, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(78, 1, 1, 'acp_logs', 'acp', 26, 245, 246, 'ACP_USERS_LOGS', 'users', 'acl_a_viewlogs'),
(79, 1, 1, 'acp_logs', 'acp', 26, 247, 248, 'ACP_CRITICAL_LOGS', 'critical', 'acl_a_viewlogs'),
(80, 1, 1, 'acp_main', 'acp', 1, 2, 3, 'ACP_INDEX', 'main', ''),
(81, 1, 1, 'acp_modules', 'acp', 31, 275, 276, 'ACP', 'acp', 'acl_a_modules'),
(82, 1, 1, 'acp_modules', 'acp', 31, 277, 278, 'UCP', 'ucp', 'acl_a_modules'),
(83, 1, 1, 'acp_modules', 'acp', 31, 279, 280, 'MCP', 'mcp', 'acl_a_modules'),
(84, 1, 1, 'acp_permission_roles', 'acp', 19, 199, 200, 'ACP_ADMIN_ROLES', 'admin_roles', 'acl_a_roles && acl_a_aauth'),
(85, 1, 1, 'acp_permission_roles', 'acp', 19, 201, 202, 'ACP_USER_ROLES', 'user_roles', 'acl_a_roles && acl_a_uauth'),
(86, 1, 1, 'acp_permission_roles', 'acp', 19, 203, 204, 'ACP_MOD_ROLES', 'mod_roles', 'acl_a_roles && acl_a_mauth'),
(87, 1, 1, 'acp_permission_roles', 'acp', 19, 205, 206, 'ACP_FORUM_ROLES', 'forum_roles', 'acl_a_roles && acl_a_fauth'),
(88, 1, 1, 'acp_permissions', 'acp', 16, 174, 175, 'ACP_PERMISSIONS', 'intro', 'acl_a_authusers || acl_a_authgroups || acl_a_viewauth'),
(89, 1, 0, 'acp_permissions', 'acp', 20, 209, 210, 'ACP_PERMISSION_TRACE', 'trace', 'acl_a_viewauth'),
(90, 1, 1, 'acp_permissions', 'acp', 18, 187, 188, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(91, 1, 1, 'acp_permissions', 'acp', 18, 189, 190, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(92, 1, 1, 'acp_permissions', 'acp', 18, 191, 192, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(93, 1, 1, 'acp_permissions', 'acp', 17, 177, 178, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(94, 1, 1, 'acp_permissions', 'acp', 13, 121, 122, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(95, 1, 1, 'acp_permissions', 'acp', 18, 193, 194, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(96, 1, 1, 'acp_permissions', 'acp', 13, 123, 124, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(97, 1, 1, 'acp_permissions', 'acp', 17, 179, 180, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(98, 1, 1, 'acp_permissions', 'acp', 14, 157, 158, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(99, 1, 1, 'acp_permissions', 'acp', 18, 195, 196, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(100, 1, 1, 'acp_permissions', 'acp', 14, 159, 160, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(101, 1, 1, 'acp_permissions', 'acp', 17, 181, 182, 'ACP_ADMINISTRATORS', 'setting_admin_global', 'acl_a_aauth && (acl_a_authusers || acl_a_authgroups)'),
(102, 1, 1, 'acp_permissions', 'acp', 17, 183, 184, 'ACP_GLOBAL_MODERATORS', 'setting_mod_global', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(103, 1, 1, 'acp_permissions', 'acp', 20, 211, 212, 'ACP_VIEW_ADMIN_PERMISSIONS', 'view_admin_global', 'acl_a_viewauth'),
(104, 1, 1, 'acp_permissions', 'acp', 20, 213, 214, 'ACP_VIEW_USER_PERMISSIONS', 'view_user_global', 'acl_a_viewauth'),
(105, 1, 1, 'acp_permissions', 'acp', 20, 215, 216, 'ACP_VIEW_GLOBAL_MOD_PERMISSIONS', 'view_mod_global', 'acl_a_viewauth'),
(106, 1, 1, 'acp_permissions', 'acp', 20, 217, 218, 'ACP_VIEW_FORUM_MOD_PERMISSIONS', 'view_mod_local', 'acl_a_viewauth'),
(107, 1, 1, 'acp_permissions', 'acp', 20, 219, 220, 'ACP_VIEW_FORUM_PERMISSIONS', 'view_forum_local', 'acl_a_viewauth'),
(108, 1, 1, 'acp_php_info', 'acp', 30, 269, 270, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(109, 1, 1, 'acp_profile', 'acp', 13, 125, 126, 'ACP_CUSTOM_PROFILE_FIELDS', 'profile', 'acl_a_profile'),
(110, 1, 1, 'acp_prune', 'acp', 7, 71, 72, 'ACP_PRUNE_FORUMS', 'forums', 'acl_a_prune'),
(111, 1, 1, 'acp_prune', 'acp', 13, 127, 128, 'ACP_PRUNE_USERS', 'users', 'acl_a_userdel'),
(112, 1, 1, 'acp_ranks', 'acp', 13, 129, 130, 'ACP_MANAGE_RANKS', 'ranks', 'acl_a_ranks'),
(113, 1, 1, 'acp_reasons', 'acp', 30, 271, 272, 'ACP_MANAGE_REASONS', 'main', 'acl_a_reasons'),
(114, 1, 1, 'acp_search', 'acp', 5, 61, 62, 'ACP_SEARCH_SETTINGS', 'settings', 'acl_a_search'),
(115, 1, 1, 'acp_search', 'acp', 27, 255, 256, 'ACP_SEARCH_INDEX', 'index', 'acl_a_search'),
(116, 1, 1, 'acp_send_statistics', 'acp', 5, 63, 64, 'ACP_SEND_STATISTICS', 'send_statistics', 'acl_a_server'),
(117, 1, 1, 'acp_styles', 'acp', 22, 229, 230, 'ACP_STYLES', 'style', 'acl_a_styles'),
(118, 1, 1, 'acp_styles', 'acp', 22, 231, 232, 'ACP_STYLES_INSTALL', 'install', 'acl_a_styles'),
(119, 1, 1, 'acp_update', 'acp', 29, 261, 262, 'ACP_VERSION_CHECK', 'version_check', 'acl_a_board'),
(120, 1, 1, 'acp_users', 'acp', 13, 119, 120, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(121, 1, 0, 'acp_users', 'acp', 13, 131, 132, 'ACP_USER_FEEDBACK', 'feedback', 'acl_a_user'),
(122, 1, 0, 'acp_users', 'acp', 13, 133, 134, 'ACP_USER_WARNINGS', 'warnings', 'acl_a_user'),
(123, 1, 0, 'acp_users', 'acp', 13, 135, 136, 'ACP_USER_PROFILE', 'profile', 'acl_a_user'),
(124, 1, 0, 'acp_users', 'acp', 13, 137, 138, 'ACP_USER_PREFS', 'prefs', 'acl_a_user'),
(125, 1, 0, 'acp_users', 'acp', 13, 139, 140, 'ACP_USER_AVATAR', 'avatar', 'acl_a_user'),
(126, 1, 0, 'acp_users', 'acp', 13, 141, 142, 'ACP_USER_RANK', 'rank', 'acl_a_user'),
(127, 1, 0, 'acp_users', 'acp', 13, 143, 144, 'ACP_USER_SIG', 'sig', 'acl_a_user'),
(128, 1, 0, 'acp_users', 'acp', 13, 145, 146, 'ACP_USER_GROUPS', 'groups', 'acl_a_user && acl_a_group'),
(129, 1, 0, 'acp_users', 'acp', 13, 147, 148, 'ACP_USER_PERM', 'perm', 'acl_a_user && acl_a_viewauth'),
(130, 1, 0, 'acp_users', 'acp', 13, 149, 150, 'ACP_USER_ATTACH', 'attach', 'acl_a_user'),
(131, 1, 1, 'acp_words', 'acp', 10, 99, 100, 'ACP_WORDS', 'words', 'acl_a_words'),
(132, 1, 1, 'acp_users', 'acp', 2, 5, 6, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(133, 1, 1, 'acp_groups', 'acp', 2, 7, 8, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(134, 1, 1, 'acp_forums', 'acp', 2, 9, 10, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(135, 1, 1, 'acp_logs', 'acp', 2, 11, 12, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(136, 1, 1, 'acp_bots', 'acp', 2, 13, 14, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(137, 1, 1, 'acp_php_info', 'acp', 2, 15, 16, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(138, 1, 1, 'acp_permissions', 'acp', 8, 75, 76, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(139, 1, 1, 'acp_permissions', 'acp', 8, 77, 78, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(140, 1, 1, 'acp_permissions', 'acp', 8, 79, 80, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(141, 1, 1, 'acp_permissions', 'acp', 8, 81, 82, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(142, 1, 1, 'acp_permissions', 'acp', 8, 83, 84, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(143, 1, 1, '', 'mcp', 0, 1, 10, 'MCP_MAIN', '', ''),
(144, 1, 1, '', 'mcp', 0, 11, 22, 'MCP_QUEUE', '', ''),
(145, 1, 1, '', 'mcp', 0, 23, 36, 'MCP_REPORTS', '', ''),
(146, 1, 1, '', 'mcp', 0, 37, 42, 'MCP_NOTES', '', ''),
(147, 1, 1, '', 'mcp', 0, 43, 52, 'MCP_WARN', '', ''),
(148, 1, 1, '', 'mcp', 0, 53, 60, 'MCP_LOGS', '', ''),
(149, 1, 1, '', 'mcp', 0, 61, 68, 'MCP_BAN', '', ''),
(150, 1, 1, 'mcp_ban', 'mcp', 149, 62, 63, 'MCP_BAN_USERNAMES', 'user', 'acl_m_ban'),
(151, 1, 1, 'mcp_ban', 'mcp', 149, 64, 65, 'MCP_BAN_IPS', 'ip', 'acl_m_ban'),
(152, 1, 1, 'mcp_ban', 'mcp', 149, 66, 67, 'MCP_BAN_EMAILS', 'email', 'acl_m_ban'),
(153, 1, 1, 'mcp_logs', 'mcp', 148, 54, 55, 'MCP_LOGS_FRONT', 'front', 'acl_m_ || aclf_m_'),
(154, 1, 1, 'mcp_logs', 'mcp', 148, 56, 57, 'MCP_LOGS_FORUM_VIEW', 'forum_logs', 'acl_m_,$id'),
(155, 1, 1, 'mcp_logs', 'mcp', 148, 58, 59, 'MCP_LOGS_TOPIC_VIEW', 'topic_logs', 'acl_m_,$id'),
(156, 1, 1, 'mcp_main', 'mcp', 143, 2, 3, 'MCP_MAIN_FRONT', 'front', ''),
(157, 1, 1, 'mcp_main', 'mcp', 143, 4, 5, 'MCP_MAIN_FORUM_VIEW', 'forum_view', 'acl_m_,$id'),
(158, 1, 1, 'mcp_main', 'mcp', 143, 6, 7, 'MCP_MAIN_TOPIC_VIEW', 'topic_view', 'acl_m_,$id'),
(159, 1, 1, 'mcp_main', 'mcp', 143, 8, 9, 'MCP_MAIN_POST_DETAILS', 'post_details', 'acl_m_,$id || (!$id && aclf_m_)'),
(160, 1, 1, 'mcp_notes', 'mcp', 146, 38, 39, 'MCP_NOTES_FRONT', 'front', ''),
(161, 1, 1, 'mcp_notes', 'mcp', 146, 40, 41, 'MCP_NOTES_USER', 'user_notes', ''),
(162, 1, 1, 'mcp_pm_reports', 'mcp', 145, 30, 31, 'MCP_PM_REPORTS_OPEN', 'pm_reports', 'aclf_m_report'),
(163, 1, 1, 'mcp_pm_reports', 'mcp', 145, 32, 33, 'MCP_PM_REPORTS_CLOSED', 'pm_reports_closed', 'aclf_m_report'),
(164, 1, 1, 'mcp_pm_reports', 'mcp', 145, 34, 35, 'MCP_PM_REPORT_DETAILS', 'pm_report_details', 'aclf_m_report'),
(165, 1, 1, 'mcp_queue', 'mcp', 144, 12, 13, 'MCP_QUEUE_UNAPPROVED_TOPICS', 'unapproved_topics', 'aclf_m_approve'),
(166, 1, 1, 'mcp_queue', 'mcp', 144, 14, 15, 'MCP_QUEUE_UNAPPROVED_POSTS', 'unapproved_posts', 'aclf_m_approve'),
(167, 1, 1, 'mcp_queue', 'mcp', 144, 16, 17, 'MCP_QUEUE_DELETED_TOPICS', 'deleted_topics', 'aclf_m_approve'),
(168, 1, 1, 'mcp_queue', 'mcp', 144, 18, 19, 'MCP_QUEUE_DELETED_POSTS', 'deleted_posts', 'aclf_m_approve'),
(169, 1, 1, 'mcp_queue', 'mcp', 144, 20, 21, 'MCP_QUEUE_APPROVE_DETAILS', 'approve_details', 'acl_m_approve,$id || (!$id && aclf_m_approve)'),
(170, 1, 1, 'mcp_reports', 'mcp', 145, 24, 25, 'MCP_REPORTS_OPEN', 'reports', 'aclf_m_report'),
(171, 1, 1, 'mcp_reports', 'mcp', 145, 26, 27, 'MCP_REPORTS_CLOSED', 'reports_closed', 'aclf_m_report'),
(172, 1, 1, 'mcp_reports', 'mcp', 145, 28, 29, 'MCP_REPORT_DETAILS', 'report_details', 'acl_m_report,$id || (!$id && aclf_m_report)'),
(173, 1, 1, 'mcp_warn', 'mcp', 147, 44, 45, 'MCP_WARN_FRONT', 'front', 'aclf_m_warn'),
(174, 1, 1, 'mcp_warn', 'mcp', 147, 46, 47, 'MCP_WARN_LIST', 'list', 'aclf_m_warn'),
(175, 1, 1, 'mcp_warn', 'mcp', 147, 48, 49, 'MCP_WARN_USER', 'warn_user', 'aclf_m_warn'),
(176, 1, 1, 'mcp_warn', 'mcp', 147, 50, 51, 'MCP_WARN_POST', 'warn_post', 'acl_m_warn && acl_f_read,$id'),
(177, 1, 1, '', 'ucp', 0, 1, 14, 'UCP_MAIN', '', ''),
(178, 1, 1, '', 'ucp', 0, 15, 28, 'UCP_PROFILE', '', ''),
(179, 1, 1, '', 'ucp', 0, 29, 38, 'UCP_PREFS', '', ''),
(180, 1, 1, 'ucp_pm', 'ucp', 0, 39, 48, 'UCP_PM', '', ''),
(181, 1, 1, '', 'ucp', 0, 49, 54, 'UCP_USERGROUPS', '', ''),
(182, 1, 1, '', 'ucp', 0, 55, 60, 'UCP_ZEBRA', '', ''),
(183, 1, 1, 'ucp_attachments', 'ucp', 177, 10, 11, 'UCP_MAIN_ATTACHMENTS', 'attachments', 'acl_u_attach'),
(184, 1, 1, 'ucp_auth_link', 'ucp', 178, 26, 27, 'UCP_AUTH_LINK_MANAGE', 'auth_link', 'authmethod_oauth'),
(185, 1, 1, 'ucp_groups', 'ucp', 181, 50, 51, 'UCP_USERGROUPS_MEMBER', 'membership', ''),
(186, 1, 1, 'ucp_groups', 'ucp', 181, 52, 53, 'UCP_USERGROUPS_MANAGE', 'manage', ''),
(187, 1, 1, 'ucp_main', 'ucp', 177, 2, 3, 'UCP_MAIN_FRONT', 'front', ''),
(188, 1, 1, 'ucp_main', 'ucp', 177, 4, 5, 'UCP_MAIN_SUBSCRIBED', 'subscribed', ''),
(189, 1, 1, 'ucp_main', 'ucp', 177, 6, 7, 'UCP_MAIN_BOOKMARKS', 'bookmarks', 'cfg_allow_bookmarks'),
(190, 1, 1, 'ucp_main', 'ucp', 177, 8, 9, 'UCP_MAIN_DRAFTS', 'drafts', ''),
(191, 1, 1, 'ucp_notifications', 'ucp', 179, 36, 37, 'UCP_NOTIFICATION_OPTIONS', 'notification_options', ''),
(192, 1, 1, 'ucp_notifications', 'ucp', 177, 12, 13, 'UCP_NOTIFICATION_LIST', 'notification_list', ''),
(193, 1, 0, 'ucp_pm', 'ucp', 180, 40, 41, 'UCP_PM_VIEW', 'view', 'cfg_allow_privmsg'),
(194, 1, 1, 'ucp_pm', 'ucp', 180, 42, 43, 'UCP_PM_COMPOSE', 'compose', 'cfg_allow_privmsg'),
(195, 1, 1, 'ucp_pm', 'ucp', 180, 44, 45, 'UCP_PM_DRAFTS', 'drafts', 'cfg_allow_privmsg'),
(196, 1, 1, 'ucp_pm', 'ucp', 180, 46, 47, 'UCP_PM_OPTIONS', 'options', 'cfg_allow_privmsg'),
(197, 1, 1, 'ucp_prefs', 'ucp', 179, 30, 31, 'UCP_PREFS_PERSONAL', 'personal', ''),
(198, 1, 1, 'ucp_prefs', 'ucp', 179, 32, 33, 'UCP_PREFS_POST', 'post', ''),
(199, 1, 1, 'ucp_prefs', 'ucp', 179, 34, 35, 'UCP_PREFS_VIEW', 'view', ''),
(200, 1, 1, 'ucp_profile', 'ucp', 178, 16, 17, 'UCP_PROFILE_PROFILE_INFO', 'profile_info', 'acl_u_chgprofileinfo'),
(201, 1, 1, 'ucp_profile', 'ucp', 178, 18, 19, 'UCP_PROFILE_SIGNATURE', 'signature', 'acl_u_sig'),
(202, 1, 1, 'ucp_profile', 'ucp', 178, 20, 21, 'UCP_PROFILE_AVATAR', 'avatar', 'cfg_allow_avatar'),
(203, 1, 1, 'ucp_profile', 'ucp', 178, 22, 23, 'UCP_PROFILE_REG_DETAILS', 'reg_details', ''),
(204, 1, 1, 'ucp_profile', 'ucp', 178, 24, 25, 'UCP_PROFILE_AUTOLOGIN_KEYS', 'autologin_keys', ''),
(205, 1, 1, 'ucp_zebra', 'ucp', 182, 56, 57, 'UCP_ZEBRA_FRIENDS', 'friends', ''),
(206, 1, 1, 'ucp_zebra', 'ucp', 182, 58, 59, 'UCP_ZEBRA_FOES', 'foes', '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_notifications`
--

CREATE TABLE IF NOT EXISTS `phpbb_notifications` (
  `notification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `item_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `item_parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `notification_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `notification_time` int(11) unsigned NOT NULL DEFAULT '1',
  `notification_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `item_ident` (`notification_type_id`,`item_id`),
  KEY `user` (`user_id`,`notification_read`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `phpbb_notifications`
--

INSERT INTO `phpbb_notifications` (`notification_id`, `notification_type_id`, `item_id`, `item_parent_id`, `user_id`, `notification_read`, `notification_time`, `notification_data`) VALUES
(2, 6, 4, 3, 48, 0, 1433430282, 'a:6:{s:12:"post_subject";s:18:"Re: 4 червня";s:9:"poster_id";s:2:"48";s:11:"topic_title";s:14:"4 червня";s:13:"post_username";s:0:"";s:8:"forum_id";s:1:"2";s:10:"forum_name";s:30:"Ваш перший форум";}'),
(3, 3, 25, 5, 2, 1, 1437220140, 'a:6:{s:9:"poster_id";i:22;s:11:"topic_title";s:33:"Основи синтаксису";s:12:"post_subject";s:37:"Re: Основи синтаксису";s:13:"post_username";s:0:"";s:8:"forum_id";i:16;s:10:"forum_name";s:42:"Вступ до програмування";}'),
(4, 3, 26, 5, 2, 1, 1437220304, 'a:6:{s:9:"poster_id";i:38;s:11:"topic_title";s:33:"Основи синтаксису";s:12:"post_subject";s:37:"Re: Основи синтаксису";s:13:"post_username";s:0:"";s:8:"forum_id";i:16;s:10:"forum_name";s:42:"Вступ до програмування";}'),
(5, 4, 31, 4, 22, 1, 1438014402, 'a:6:{s:9:"poster_id";i:125;s:11:"topic_title";s:44:"Змінні та типи даних в PHP";s:12:"post_subject";s:48:"Re: Змінні та типи даних в PHP";s:13:"post_username";s:0:"";s:8:"forum_id";i:16;s:10:"forum_name";s:42:"Вступ до програмування";}'),
(6, 5, 31, 4, 22, 1, 1438014402, 'a:6:{s:9:"poster_id";i:125;s:11:"topic_title";s:44:"Змінні та типи даних в PHP";s:12:"post_subject";s:48:"Re: Змінні та типи даних в PHP";s:13:"post_username";s:0:"";s:8:"forum_id";i:16;s:10:"forum_name";s:42:"Вступ до програмування";}'),
(7, 9, 1, 0, 121, 0, 1438247796, 'a:2:{s:12:"from_user_id";s:3:"129";s:15:"message_subject";s:13:"cgbbcmvbmvn,!";}');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_notification_types`
--

CREATE TABLE IF NOT EXISTS `phpbb_notification_types` (
  `notification_type_id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `notification_type_enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`notification_type_id`),
  UNIQUE KEY `type` (`notification_type_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `phpbb_notification_types`
--

INSERT INTO `phpbb_notification_types` (`notification_type_id`, `notification_type_name`, `notification_type_enabled`) VALUES
(1, 'notification.type.topic', 1),
(2, 'notification.type.approve_topic', 1),
(3, 'notification.type.quote', 1),
(4, 'notification.type.bookmark', 1),
(5, 'notification.type.post', 1),
(6, 'notification.type.approve_post', 1),
(7, 'notification.type.group_request', 1),
(8, 'notification.type.post_in_queue', 1),
(9, 'notification.type.pm', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_oauth_accounts`
--

CREATE TABLE IF NOT EXISTS `phpbb_oauth_accounts` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `provider` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `oauth_provider_id` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`,`provider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_oauth_tokens`
--

CREATE TABLE IF NOT EXISTS `phpbb_oauth_tokens` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `provider` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `oauth_token` mediumtext COLLATE utf8_bin NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `provider` (`provider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_poll_options`
--

CREATE TABLE IF NOT EXISTS `phpbb_poll_options` (
  `poll_option_id` tinyint(4) NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `poll_option_text` text COLLATE utf8_bin NOT NULL,
  `poll_option_total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  KEY `poll_opt_id` (`poll_option_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_poll_options`
--

INSERT INTO `phpbb_poll_options` (`poll_option_id`, `topic_id`, `poll_option_text`, `poll_option_total`) VALUES
(1, 15, '1. Динамо', 2),
(2, 15, '2. Шахтер', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_poll_votes`
--

CREATE TABLE IF NOT EXISTS `phpbb_poll_votes` (
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `poll_option_id` tinyint(4) NOT NULL DEFAULT '0',
  `vote_user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `vote_user_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  KEY `topic_id` (`topic_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_poll_votes`
--

INSERT INTO `phpbb_poll_votes` (`topic_id`, `poll_option_id`, `vote_user_id`, `vote_user_ip`) VALUES
(15, 1, 54, '81.30.164.98'),
(15, 1, 38, '81.30.164.98');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_posts`
--

CREATE TABLE IF NOT EXISTS `phpbb_posts` (
  `post_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `poster_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `poster_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_time` int(11) unsigned NOT NULL DEFAULT '0',
  `post_reported` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_smilies` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_sig` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `post_username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `post_text` mediumtext COLLATE utf8_bin NOT NULL,
  `post_checksum` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_attachment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_postcount` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `post_edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  `post_edit_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_edit_user` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `post_edit_count` smallint(4) unsigned NOT NULL DEFAULT '0',
  `post_edit_locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `post_visibility` tinyint(3) NOT NULL DEFAULT '0',
  `post_delete_time` int(11) unsigned NOT NULL DEFAULT '0',
  `post_delete_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_delete_user` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_ip` (`poster_ip`),
  KEY `poster_id` (`poster_id`),
  KEY `tid_post_time` (`topic_id`,`post_time`),
  KEY `post_username` (`post_username`),
  KEY `post_visibility` (`post_visibility`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `phpbb_posts`
--

INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked`, `post_visibility`, `post_delete_time`, `post_delete_reason`, `post_delete_user`) VALUES
(5, 4, 16, 2, 0, '81.30.164.98', 1437053884, 0, 1, 1, 1, 1, '', 'Змінні та типи даних в PHP', 'Обговорення заняття &quot;Змінні та типи даних в PHP&quot;', '2be39cb02525d1caaab1a88ebcb9458b', 0, '', '3i5zo1rl', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(6, 5, 16, 2, 0, '81.30.164.98', 1437053934, 0, 1, 1, 1, 1, '', 'Основи синтаксису', 'Обговорення заняття &quot;Основи синтаксису&quot;', '75aa5869f087c1ddf6f0a54cb6341a76', 0, '', 'l2ww0863', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(7, 6, 16, 2, 0, '81.30.164.98', 1437053968, 0, 1, 1, 1, 1, '', 'Обробка запитів з допомогою PHP', 'Обговорення заняття &quot;Обробка запитів з допомогою PHP&quot;', '091a96ff55a24aaa2a022020e2e4538f', 0, '', '3s6bmpnq', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(8, 4, 16, 51, 0, '81.30.164.98', 1437054093, 0, 1, 1, 1, 1, '', 'Re: Змінні та типи даних в PHP', 'Змінні змінюються, а типи даних типові', 'bbdcb004785fecdd423dda8ddfe6328c', 0, '', '2l451cjg', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(9, 4, 16, 40, 0, '81.30.164.98', 1437054417, 0, 1, 1, 1, 1, '', 'Re: Змінні та типи даних в PHP', '[quote=&quot;Student 1 &quot;:29rz82h6]Змінні змінюються, а типи даних типові[/quote:29rz82h6]\nДуже дотепно...', 'a2423356e1a66f9a2076ccc21a5c9182', 0, 'gA==', '29rz82h6', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(10, 7, 16, 40, 0, '81.30.164.98', 1437054945, 0, 1, 1, 1, 1, '', '784', 'jhbhb', '0c7ecd59838f6f5cce5c580816ff1e09', 0, '', '3rmxb4fy', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(11, 5, 16, 2, 0, '81.30.164.98', 1437055279, 0, 1, 1, 1, 1, '', 'Re: Основи синтаксису', 'Мається на увазі синтаксис PHP', 'cbc21ad778130402bd5a4371a9381dfe', 0, '', 'dpwzvtk0', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(12, 8, 15, 22, 0, '178.92.66.110', 1437125835, 0, 1, 1, 1, 1, '', 'Нова тема', 'Нова тема Нова тема Нова тема Нова тема Нова тема Нова тема <!-- s:) --><img src="{SMILIES_PATH}/icon_e_smile.gif" alt=":)" title="Посмішка" /><!-- s:) -->', 'd16266dec3dcf14fb23e1fe7714f470a', 0, 'Aw==', '1tttosjo', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(13, 4, 16, 22, 0, '178.94.36.25', 1437166114, 0, 1, 1, 1, 1, '', 'Re: Змінні та типи даних в PHP', 'ребететптпааопрыврпьап\n[b:1yjudgep][u:1yjudgep]амтавлопра[/u:1yjudgep][/b:1yjudgep]', '5048d166c37885cec52a087d911dea91', 0, 'QQ==', '1yjudgep', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(14, 4, 16, 22, 0, '178.94.36.25', 1437166713, 0, 1, 1, 1, 1, '', 'Re: Змінні та типи даних в PHP', 'итьтьбь бтьбьтьбтстит', '72ac05d63003aa93ac7892ec0651c12b', 0, '', 'px545m96', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(15, 9, 34, 40, 0, '81.30.164.98', 1437203534, 0, 1, 1, 1, 1, '', 'Тема Тема', 'бази даних (частина 1)', '67721082f32d58a78439491292e48f95', 0, '', '3gh3trn0', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(16, 9, 34, 40, 0, '81.30.164.98', 1437203610, 0, 1, 1, 1, 1, '', 'Re: Тема Тема', 'оллорло', '566a9f75fdff3d0053c9b68dfd1e5750', 0, '', '3cgrgldu', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(17, 10, 35, 40, 0, '81.30.164.98', 1437203686, 0, 1, 1, 1, 1, '', 'Тема 2', 'апаорпаврпалврпл\nвоарвлрааларплап\nваороарллварварпа\nывораларлалпрапр\nыравларавларвлав\nырлрлырпапарпаа\nылвраварварвааов\nывраварвававваор\nворварварварвалр\nваварвоарвоарвав', '532824da0fc562dd231852bb2958fad1', 0, '', '185wbypb', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(18, 10, 35, 40, 0, '81.30.164.98', 1437203752, 0, 1, 1, 1, 1, '', '', 'вапвапавпа\nвавравраврал', '0efec0579dfde51d145c213fc290ef1d', 0, '', '19ogidkc', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(19, 11, 35, 40, 0, '81.30.164.98', 1437203781, 0, 1, 1, 1, 1, '', 'Тема 3', 'апапавп', 'b1c208493b83667e7e3e147897fbdf17', 0, '', '2rafv5qz', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(20, 12, 35, 40, 0, '81.30.164.98', 1437203808, 0, 1, 1, 1, 1, '', 'Тема 4', 'авав', '5ee5c0c049101d073fd016c0e0055c9c', 0, '', 'i095sbk0', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(21, 13, 35, 40, 0, '81.30.164.98', 1437203836, 0, 1, 1, 1, 1, '', 'Тема 5', 'ролплол', 'bf0648dfb1c0d26774170067c1339067', 0, '', '1v3o8emw', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(22, 14, 35, 40, 0, '81.30.164.98', 1437203856, 0, 1, 1, 1, 1, '', 'тема 6', 'апапва', '2916be4695d93bdb648b2840d87d8c33', 0, '', '26d90h3x', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(23, 15, 35, 40, 0, '81.30.164.98', 1437204004, 0, 1, 1, 1, 1, '', 'тема 7', 'тема7', 'b365dc48c1c291f2f9554d4a2f5b7ff9', 0, '', 'v0nuql9m', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(24, 6, 16, 40, 0, '81.30.164.98', 1437219397, 0, 1, 1, 1, 1, '', 'Re: Обробка запитів з допомогою PHP', 'dghyrturyjfyhjfnhjh', '2a42b256cdf1467746177c380f02a9e4', 0, '', '1oauph5i', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(25, 5, 16, 22, 0, '81.30.164.98', 1437220140, 0, 1, 1, 1, 1, '', 'Re: Основи синтаксису', '[quote=&quot;intita&quot;:3c33cwdc]Мається на увазі синтаксис PHP[/quote:3c33cwdc]\nДякую, кеп!', 'b01924ba6692ee146c3f5039461f3276', 0, 'gA==', '3c33cwdc', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(26, 5, 16, 38, 0, '81.30.164.98', 1437220304, 0, 1, 1, 1, 1, '', 'Re: Основи синтаксису', '[quote=&quot;intita&quot;:t0l6jgja]Мається на увазі синтаксис PHP[/quote:t0l6jgja]\nndsdafhgdsf\nfjdsfgdshfgds', 'f12f2d8fbb7d639b1d55f61bf7048f20', 0, 'gA==', 't0l6jgja', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(27, 5, 16, 45, 0, '81.30.164.98', 1437389655, 0, 1, 1, 1, 1, '', 'Re: Основи синтаксису', 'добре', 'bd324daa894d5317a64ab73f376e65dc', 0, '', '2dlujva1', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(28, 6, 16, 45, 0, '81.30.164.98', 1437389787, 0, 1, 1, 1, 1, '', 'Re: Обробка запитів з допомогою PHP', 'добре', 'bd324daa894d5317a64ab73f376e65dc', 0, '', 'ea4liott', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(29, 16, 36, 121, 0, '94.179.33.38', 1437554649, 0, 1, 1, 1, 1, '', 'иьмтьитьиь', 'сьтмьтбьбт бт', 'e5bae6257463743eac9293cfd2d8f1e7', 0, '', 'hvtacvqr', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(30, 16, 36, 38, 0, '80.91.174.90', 1437732959, 0, 1, 1, 1, 1, '', 'Re: иьмтьитьиь', 'asdfgdsfnhgqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '739d72a94660d6e744c799d539159f38', 0, '', '2s49ns92', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(31, 4, 16, 125, 0, '81.30.164.98', 1438014402, 0, 1, 1, 1, 1, '', 'Re: Змінні та типи даних в PHP', 'З нами з 27.07', 'd6d2bcc162ebbd971137e258799fba7a', 0, '', '1he5ee1d', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(32, 6, 16, 54, 0, '81.30.164.98', 1438016568, 0, 1, 1, 1, 1, '', 'Re: Обробка запитів з допомогою PHP', 'Яких запитів? GET та РОST?', 'b2bf557e6e2ff54b9a71c282e50bfab1', 0, '', 'qicwrg2w', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(33, 17, 29, 39, 0, '178.94.43.154', 1438089493, 0, 1, 1, 1, 1, '', 'аочропр', 'ьитьитьсиьит', 'fd64da38874cb7db2fdf7648b97c7b60', 0, '', '1s2j12tz', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(34, 18, 18, 38, 0, '81.30.164.98', 1439396356, 0, 1, 1, 1, 1, '', 'нгокео', 'чпрьаьангбьнагб', '56359f41f1ae4be3576bf53e64cf3045', 0, '', '1qtihhuf', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(35, 15, 35, 38, 0, '81.30.164.98', 1439396831, 0, 1, 1, 1, 1, '', 'Re: тема 7', 'bjlhlyooiouifpugoupguopugopuopuopuopopyiopioptuipupupguopuop\nffjhgfjghdghdfghfhlsghsjgsvcnbchdryuerafsgnfgjnsa/sffvmnbmvbnjjhjhga\njdghskfjghfgyruahkfhgfjbgfmbmfglsakslgsgsgkdngdvhgrhgshd.sd\nsfhgsfjgnmfvnvhfjghfgh,sgfgdfjgjjfdkfhgfjdgfdbnvmnbdba,fnbdfhbjdafb\nj,sfgjfhgghs bsgsgfslg gfg fglfhgh gldfgh adghfghlfgh f ldgd lghadhgadlghdf\nsjhg ksfghsjkghFGHFJGH FG S FHG SFGLSGH FG FG /FG SFGHFS', '7168495e2c08e035918ee55cba2ca009', 0, '', '7c0uuslm', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(36, 15, 35, 38, 0, '81.30.164.98', 1439396894, 0, 1, 1, 1, 1, '', 'Re: тема 7', '[quote=&quot;teacher &quot;:kjk7wbe6]bjlhlyooiouifpugoupguopugopuopuopuopopyiopioptuipupupguopuop\nffjhgfjghdghdfghfhlsghsjgsvcnbchdryuerafsgnfgjnsa/sffvmnbmvbnjjhjhga\njdghskfjghfgyruahkfhgfjbgfmbmfglsakslgsgsgkdngdvhgrhgshd.sd\nsfhgsfjgnmfvnvhfjghfgh,sgfgdfjgjjfdkfhgfjdgfdbnvmnbdba,fnbdfhbjdafb\nj,sfgjfhgghs bsgsgfslg gfg fglfhgh gldfgh adghfghlfgh f ldgd lghadhgadlghdf\nsjhg ksfghsjkghFGHFJGH FG S FHG SFGLSGH FG FG /FG SFGHFS[/quote:kjk7wbe6]', 'd50495bdca9f32d544f3db3e086f2c95', 0, 'gA==', 'kjk7wbe6', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(37, 18, 18, 38, 0, '81.30.164.98', 1439399537, 0, 1, 1, 1, 1, '', 'Re: нгокео', 'rglkdfgudakjghdkghdtkjghdtkjghadjfghadjghdajghdakgjhekjgehgjahdjgmhad,jghad,jghatrekghajekhgkearhtajdjrhkagjrehtkjreahgrmd', '15878ba099a9d599386db5a73f31e81d', 0, '', '2x3rg6z4', 1, 0, '', 0, 0, 0, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_privmsgs`
--

CREATE TABLE IF NOT EXISTS `phpbb_privmsgs` (
  `msg_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `root_level` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_time` int(11) unsigned NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_smilies` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `enable_sig` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `message_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_text` mediumtext COLLATE utf8_bin NOT NULL,
  `message_edit_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_edit_user` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `message_attachment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_edit_time` int(11) unsigned NOT NULL DEFAULT '0',
  `message_edit_count` smallint(4) unsigned NOT NULL DEFAULT '0',
  `to_address` text COLLATE utf8_bin NOT NULL,
  `bcc_address` text COLLATE utf8_bin NOT NULL,
  `message_reported` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `author_ip` (`author_ip`),
  KEY `message_time` (`message_time`),
  KEY `author_id` (`author_id`),
  KEY `root_level` (`root_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `phpbb_privmsgs`
--

INSERT INTO `phpbb_privmsgs` (`msg_id`, `root_level`, `author_id`, `icon_id`, `author_ip`, `message_time`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `message_subject`, `message_text`, `message_edit_reason`, `message_edit_user`, `message_attachment`, `bbcode_bitfield`, `bbcode_uid`, `message_edit_time`, `message_edit_count`, `to_address`, `bcc_address`, `message_reported`) VALUES
(1, 0, 129, 5, '94.179.84.150', 1438247796, 1, 1, 1, 1, 'cgbbcmvbmvn,!', 'jhghkgkgj', '', 0, 0, '', '3tpamifi', 0, 0, 'u_129:u_121', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_privmsgs_folder`
--

CREATE TABLE IF NOT EXISTS `phpbb_privmsgs_folder` (
  `folder_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `folder_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pm_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`folder_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_privmsgs_rules`
--

CREATE TABLE IF NOT EXISTS `phpbb_privmsgs_rules` (
  `rule_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_check` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_connection` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_string` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `rule_user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_action` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rule_folder_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rule_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_privmsgs_to`
--

CREATE TABLE IF NOT EXISTS `phpbb_privmsgs_to` (
  `msg_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pm_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pm_new` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `pm_unread` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `pm_replied` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pm_marked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pm_forwarded` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(11) NOT NULL DEFAULT '0',
  KEY `msg_id` (`msg_id`),
  KEY `author_id` (`author_id`),
  KEY `usr_flder_id` (`user_id`,`folder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_privmsgs_to`
--

INSERT INTO `phpbb_privmsgs_to` (`msg_id`, `user_id`, `author_id`, `pm_deleted`, `pm_new`, `pm_unread`, `pm_replied`, `pm_marked`, `pm_forwarded`, `folder_id`) VALUES
(1, 129, 129, 0, 0, 0, 0, 0, 0, 0),
(1, 121, 129, 0, 1, 1, 0, 0, 0, -3),
(1, 129, 129, 0, 0, 0, 0, 0, 0, -1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_profile_fields`
--

CREATE TABLE IF NOT EXISTS `phpbb_profile_fields` (
  `field_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `field_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_type` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_ident` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_length` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_minlen` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_maxlen` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_novalue` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_default_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_validation` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_required` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_show_on_reg` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_hide` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_no_view` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_order` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `field_show_profile` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_show_on_vt` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_show_novalue` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_show_on_pm` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_show_on_ml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_is_contact` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `field_contact_desc` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_contact_url` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`field_id`),
  KEY `fld_type` (`field_type`),
  KEY `fld_ordr` (`field_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `phpbb_profile_fields`
--

INSERT INTO `phpbb_profile_fields` (`field_id`, `field_name`, `field_type`, `field_ident`, `field_length`, `field_minlen`, `field_maxlen`, `field_novalue`, `field_default_value`, `field_validation`, `field_required`, `field_show_on_reg`, `field_hide`, `field_no_view`, `field_active`, `field_order`, `field_show_profile`, `field_show_on_vt`, `field_show_novalue`, `field_show_on_pm`, `field_show_on_ml`, `field_is_contact`, `field_contact_desc`, `field_contact_url`) VALUES
(1, 'phpbb_location', 'profilefields.type.string', 'phpbb_location', '20', '2', '100', '', '', '.*', 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 0, '', ''),
(2, 'phpbb_website', 'profilefields.type.url', 'phpbb_website', '40', '12', '255', '', '', '', 0, 0, 0, 0, 1, 2, 1, 1, 0, 1, 1, 1, 'VISIT_WEBSITE', '%s'),
(3, 'phpbb_interests', 'profilefields.type.text', 'phpbb_interests', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 0, '', ''),
(4, 'phpbb_occupation', 'profilefields.type.text', 'phpbb_occupation', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 4, 1, 0, 0, 0, 0, 0, '', ''),
(5, 'phpbb_aol', 'profilefields.type.string', 'phpbb_aol', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 5, 1, 1, 0, 1, 1, 1, '', ''),
(6, 'phpbb_icq', 'profilefields.type.string', 'phpbb_icq', '20', '3', '15', '', '', '[0-9]+', 0, 0, 0, 0, 0, 6, 1, 1, 0, 1, 1, 1, 'SEND_ICQ_MESSAGE', 'https://www.icq.com/people/%s/'),
(7, 'phpbb_wlm', 'profilefields.type.string', 'phpbb_wlm', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 7, 1, 1, 0, 1, 1, 1, '', ''),
(8, 'phpbb_yahoo', 'profilefields.type.string', 'phpbb_yahoo', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 8, 1, 1, 0, 1, 1, 1, 'SEND_YIM_MESSAGE', 'ymsgr:sendim?%s'),
(9, 'phpbb_facebook', 'profilefields.type.string', 'phpbb_facebook', '20', '5', '50', '', '', '[\\w.]+', 0, 0, 0, 0, 1, 9, 1, 1, 0, 1, 1, 1, 'VIEW_FACEBOOK_PROFILE', 'http://facebook.com/%s/'),
(10, 'phpbb_twitter', 'profilefields.type.string', 'phpbb_twitter', '20', '1', '15', '', '', '[\\w_]+', 0, 0, 0, 0, 1, 10, 1, 1, 0, 1, 1, 1, 'VIEW_TWITTER_PROFILE', 'http://twitter.com/%s'),
(11, 'phpbb_skype', 'profilefields.type.string', 'phpbb_skype', '20', '6', '32', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 11, 1, 1, 0, 1, 1, 1, 'VIEW_SKYPE_PROFILE', 'skype:%s?userinfo'),
(12, 'phpbb_youtube', 'profilefields.type.string', 'phpbb_youtube', '20', '3', '60', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 12, 1, 1, 0, 1, 1, 1, 'VIEW_YOUTUBE_CHANNEL', 'http://youtube.com/user/%s'),
(13, 'phpbb_googleplus', 'profilefields.type.googleplus', 'phpbb_googleplus', '20', '3', '255', '', '', '[\\w]+', 0, 0, 0, 0, 1, 13, 1, 1, 0, 1, 1, 1, 'VIEW_GOOGLEPLUS_PROFILE', 'http://plus.google.com/%s');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_profile_fields_data`
--

CREATE TABLE IF NOT EXISTS `phpbb_profile_fields_data` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pf_phpbb_interests` mediumtext COLLATE utf8_bin NOT NULL,
  `pf_phpbb_occupation` mediumtext COLLATE utf8_bin NOT NULL,
  `pf_phpbb_facebook` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_googleplus` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_icq` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_location` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_skype` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_twitter` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_website` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_wlm` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_yahoo` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_youtube` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_aol` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_profile_fields_lang`
--

CREATE TABLE IF NOT EXISTS `phpbb_profile_fields_lang` (
  `field_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lang_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `option_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `field_type` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`field_id`,`lang_id`,`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_profile_lang`
--

CREATE TABLE IF NOT EXISTS `phpbb_profile_lang` (
  `field_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lang_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `lang_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_explain` text COLLATE utf8_bin NOT NULL,
  `lang_default_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`field_id`,`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_profile_lang`
--

INSERT INTO `phpbb_profile_lang` (`field_id`, `lang_id`, `lang_name`, `lang_explain`, `lang_default_value`) VALUES
(1, 1, 'LOCATION', '', ''),
(1, 2, 'LOCATION', '', ''),
(2, 1, 'WEBSITE', '', ''),
(2, 2, 'WEBSITE', '', ''),
(3, 1, 'INTERESTS', '', ''),
(3, 2, 'INTERESTS', '', ''),
(4, 1, 'OCCUPATION', '', ''),
(4, 2, 'OCCUPATION', '', ''),
(5, 1, 'AOL', '', ''),
(5, 2, 'AOL', '', ''),
(6, 1, 'ICQ', '', ''),
(6, 2, 'ICQ', '', ''),
(7, 1, 'WLM', '', ''),
(7, 2, 'WLM', '', ''),
(8, 1, 'YAHOO', '', ''),
(8, 2, 'YAHOO', '', ''),
(9, 1, 'FACEBOOK', '', ''),
(9, 2, 'FACEBOOK', '', ''),
(10, 1, 'TWITTER', '', ''),
(10, 2, 'TWITTER', '', ''),
(11, 1, 'SKYPE', '', ''),
(11, 2, 'SKYPE', '', ''),
(12, 1, 'YOUTUBE', '', ''),
(12, 2, 'YOUTUBE', '', ''),
(13, 1, 'GOOGLEPLUS', '', ''),
(13, 2, 'GOOGLEPLUS', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_ranks`
--

CREATE TABLE IF NOT EXISTS `phpbb_ranks` (
  `rank_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `rank_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `rank_min` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rank_special` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rank_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `phpbb_ranks`
--

INSERT INTO `phpbb_ranks` (`rank_id`, `rank_title`, `rank_min`, `rank_special`, `rank_image`) VALUES
(1, 'Адміністратор сайту', 0, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_reports`
--

CREATE TABLE IF NOT EXISTS `phpbb_reports` (
  `report_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `reason_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_notify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `report_closed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `report_time` int(11) unsigned NOT NULL DEFAULT '0',
  `report_text` mediumtext COLLATE utf8_bin NOT NULL,
  `pm_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reported_post_enable_bbcode` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `reported_post_enable_smilies` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `reported_post_enable_magic_url` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `reported_post_text` mediumtext COLLATE utf8_bin NOT NULL,
  `reported_post_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `reported_post_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`report_id`),
  KEY `post_id` (`post_id`),
  KEY `pm_id` (`pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_reports_reasons`
--

CREATE TABLE IF NOT EXISTS `phpbb_reports_reasons` (
  `reason_id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `reason_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `reason_description` mediumtext COLLATE utf8_bin NOT NULL,
  `reason_order` smallint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`reason_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `phpbb_reports_reasons`
--

INSERT INTO `phpbb_reports_reasons` (`reason_id`, `reason_title`, `reason_description`, `reason_order`) VALUES
(1, 'warez', 'Повідомлення містить посилання на нелегальне або піратське програмне забезпечення.', 1),
(2, 'spam', 'Повідомлення має за мету лише рекламу вебсайту або іншого продукту.', 2),
(3, 'off_topic', 'Повідомлення не відноситься до даної теми.', 3),
(4, 'other', 'Причина скарги на повідомлення не підпадає під жодну з цих категорій, скористайтесь полем додаткової інформації.', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_search_results`
--

CREATE TABLE IF NOT EXISTS `phpbb_search_results` (
  `search_key` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_time` int(11) unsigned NOT NULL DEFAULT '0',
  `search_keywords` mediumtext COLLATE utf8_bin NOT NULL,
  `search_authors` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`search_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_search_wordlist`
--

CREATE TABLE IF NOT EXISTS `phpbb_search_wordlist` (
  `word_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word_text` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `word_common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `word_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`word_id`),
  UNIQUE KEY `wrd_txt` (`word_text`),
  KEY `wrd_cnt` (`word_count`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=161 ;

--
-- Дамп данных таблицы `phpbb_search_wordlist`
--

INSERT INTO `phpbb_search_wordlist` (`word_id`, `word_text`, `word_common`, `word_count`) VALUES
(1, 'приклад', 0, 1),
(2, 'повідомлення', 0, 1),
(3, 'вашого', 0, 1),
(4, 'phpbb3', 0, 2),
(5, 'форуму', 0, 1),
(6, 'здається', 0, 1),
(7, 'ніби', 0, 1),
(8, 'все', 0, 1),
(9, 'нормально', 0, 1),
(10, 'працює', 0, 1),
(11, 'можете', 0, 1),
(12, 'при', 0, 1),
(13, 'бажанні', 0, 1),
(14, 'видалити', 0, 1),
(15, 'продовжити', 0, 1),
(16, 'налаштування', 0, 1),
(17, 'процесі', 0, 1),
(18, 'встановлення', 0, 1),
(19, 'вашій', 0, 1),
(20, 'першій', 0, 1),
(21, 'категорії', 0, 1),
(22, 'вашому', 0, 1),
(23, 'першому', 0, 1),
(24, 'було', 0, 1),
(25, 'встановлено', 0, 1),
(26, 'відповідні', 0, 1),
(27, 'права', 0, 1),
(28, 'доступу', 0, 1),
(29, 'для', 0, 1),
(30, 'передвстановлених', 0, 1),
(31, 'груп', 0, 1),
(32, 'адміністраторів', 0, 1),
(33, 'ботів', 0, 1),
(34, 'супермодераторів', 0, 1),
(35, 'гостей', 0, 1),
(36, 'зареєстрованих', 0, 1),
(37, 'користувачів', 0, 1),
(38, 'coppa', 0, 1),
(39, 'якщо', 0, 1),
(40, 'видалите', 0, 1),
(41, 'вашу', 0, 1),
(42, 'першу', 0, 1),
(43, 'категорію', 0, 1),
(44, 'ваш', 0, 1),
(45, 'перший', 0, 1),
(46, 'форум', 0, 1),
(47, 'забудьте', 0, 1),
(48, 'надати', 0, 1),
(49, 'усім', 0, 1),
(50, 'цих', 0, 1),
(51, 'групам', 0, 1),
(52, 'нових', 0, 1),
(53, 'категорій', 0, 1),
(54, 'форумів', 0, 1),
(55, 'які', 0, 1),
(56, 'створите', 0, 1),
(57, 'рекомендується', 0, 1),
(58, 'перейменувати', 0, 1),
(59, 'скопіювати', 0, 1),
(60, 'них', 0, 1),
(61, 'створенні', 0, 1),
(62, 'успіхів', 0, 1),
(63, 'ласкаво', 0, 1),
(64, 'просимо', 0, 1),
(65, 'день', 0, 1),
(66, 'пам', 0, 1),
(67, 'яті', 0, 1),
(68, 'примирення', 0, 1),
(69, 'травня', 0, 1),
(70, 'привіт1', 0, 1),
(71, 'сьогодні', 0, 1),
(72, 'червня', 0, 3),
(73, '2015', 0, 1),
(74, 'року', 0, 1),
(75, 'обговорення', 0, 3),
(76, 'заняття', 0, 3),
(77, 'змінні', 0, 9),
(78, 'типи', 0, 9),
(79, 'даних', 0, 10),
(80, 'php', 0, 15),
(81, 'основи', 0, 6),
(82, 'синтаксису', 0, 6),
(83, 'обробка', 0, 5),
(84, 'запитів', 0, 6),
(85, 'допомогою', 0, 5),
(86, 'змінюються', 0, 2),
(87, 'типові', 0, 2),
(88, 'дуже', 0, 1),
(89, 'дотепно', 0, 1),
(90, 'jhbhb', 0, 1),
(91, '784', 0, 1),
(92, 'мається', 0, 3),
(93, 'увазі', 0, 3),
(94, 'синтаксис', 0, 3),
(95, 'нова', 0, 2),
(96, 'тема', 0, 12),
(97, 'ребететптпааопрыврпьап', 0, 1),
(98, 'амтавлопра', 0, 1),
(99, 'итьтьбь', 0, 1),
(100, 'бтьбьтьбтстит', 0, 1),
(101, 'бази', 0, 1),
(102, 'частина', 0, 1),
(103, 'оллорло', 0, 1),
(104, 'апаорпаврпалврпл', 0, 1),
(105, 'воарвлрааларплап', 0, 1),
(106, 'ваороарллварварпа', 0, 1),
(107, 'ывораларлалпрапр', 0, 1),
(108, 'ыравларавларвлав', 0, 1),
(109, 'ырлрлырпапарпаа', 0, 1),
(110, 'ылвраварварвааов', 0, 1),
(111, 'ывраварвававваор', 0, 1),
(112, 'ворварварварвалр', 0, 1),
(113, 'ваварвоарвоарвав', 0, 1),
(114, 'вапвапавпа', 0, 1),
(115, 'вавравраврал', 0, 1),
(116, 'апапавп', 0, 1),
(117, 'авав', 0, 1),
(118, 'ролплол', 0, 1),
(119, 'апапва', 0, 1),
(120, 'тема7', 0, 1),
(121, 'dghyrturyjfyhjfnhjh', 0, 1),
(122, 'дякую', 0, 1),
(123, 'кеп', 0, 1),
(124, 'ndsdafhgdsf', 0, 1),
(125, 'fjdsfgdshfgds', 0, 1),
(126, 'добре', 0, 2),
(127, 'сьтмьтбьбт', 0, 1),
(128, 'иьмтьитьиь', 0, 2),
(129, 'asdfgdsfnhgqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 0, 1),
(130, 'нами', 0, 1),
(131, 'яких', 0, 1),
(132, 'get', 0, 1),
(133, 'роst', 0, 1),
(134, 'ьитьитьсиьит', 0, 1),
(135, 'аочропр', 0, 1),
(136, 'чпрьаьангбьнагб', 0, 1),
(137, 'нгокео', 0, 2),
(138, 'bjlhlyooiouifpugoupguopugopuopuopuopopyiopioptuipupupguopuop', 0, 2),
(139, 'ffjhgfjghdghdfghfhlsghsjgsvcnbchdryuerafsgnfgjnsa', 0, 2),
(140, 'sffvmnbmvbnjjhjhga', 0, 2),
(141, 'jdghskfjghfgyruahkfhgfjbgfmbmfglsakslgsgsgkdngdvhgrhgshd', 0, 2),
(142, 'sfhgsfjgnmfvnvhfjghfgh', 0, 2),
(143, 'sgfgdfjgjjfdkfhgfjdgfdbnvmnbdba', 0, 2),
(144, 'fnbdfhbjdafb', 0, 2),
(145, 'sfgjfhgghs', 0, 2),
(146, 'bsgsgfslg', 0, 2),
(147, 'gfg', 0, 2),
(148, 'fglfhgh', 0, 2),
(149, 'gldfgh', 0, 2),
(150, 'adghfghlfgh', 0, 2),
(151, 'ldgd', 0, 2),
(152, 'lghadhgadlghdf', 0, 2),
(153, 'sjhg', 0, 2),
(154, 'ksfghsjkghfghfjgh', 0, 2),
(155, 'fhg', 0, 2),
(156, 'sfglsgh', 0, 2),
(157, 'sfghfs', 0, 2),
(158, 'rglkdfgudakjghdkghdtkjghdtkjghadjfghadjghdajghdakgjhekjgehgjahdjgmhad', 0, 1),
(159, 'jghad', 0, 1),
(160, 'jghatrekghajekhgkearhtajdjrhkagjrehtkjreahgrmd', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_search_wordmatch`
--

CREATE TABLE IF NOT EXISTS `phpbb_search_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `word_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title_match` tinyint(1) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `un_mtch` (`word_id`,`post_id`,`title_match`),
  KEY `word_id` (`word_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_search_wordmatch`
--

INSERT INTO `phpbb_search_wordmatch` (`post_id`, `word_id`, `title_match`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 4, 1),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 13, 0),
(1, 14, 0),
(1, 15, 0),
(1, 16, 0),
(1, 17, 0),
(1, 18, 0),
(1, 19, 0),
(1, 20, 0),
(1, 21, 0),
(1, 22, 0),
(1, 23, 0),
(1, 24, 0),
(1, 25, 0),
(1, 26, 0),
(1, 27, 0),
(1, 28, 0),
(1, 29, 0),
(1, 30, 0),
(1, 31, 0),
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 35, 0),
(1, 36, 0),
(1, 37, 0),
(1, 38, 0),
(1, 39, 0),
(1, 40, 0),
(1, 41, 0),
(1, 42, 0),
(1, 43, 0),
(1, 44, 0),
(1, 45, 0),
(1, 46, 0),
(1, 47, 0),
(1, 48, 0),
(1, 49, 0),
(1, 50, 0),
(1, 51, 0),
(1, 52, 0),
(1, 53, 0),
(1, 54, 0),
(1, 55, 0),
(1, 56, 0),
(1, 57, 0),
(1, 58, 0),
(1, 59, 0),
(1, 60, 0),
(1, 61, 0),
(1, 62, 0),
(1, 63, 1),
(1, 64, 1),
(2, 65, 0),
(2, 66, 0),
(2, 67, 0),
(2, 68, 0),
(2, 69, 1),
(3, 70, 0),
(3, 71, 0),
(3, 72, 0),
(3, 72, 1),
(4, 72, 1),
(3, 73, 0),
(3, 74, 0),
(5, 75, 0),
(6, 75, 0),
(7, 75, 0),
(5, 76, 0),
(6, 76, 0),
(7, 76, 0),
(5, 77, 0),
(5, 77, 1),
(8, 77, 0),
(8, 77, 1),
(9, 77, 0),
(9, 77, 1),
(13, 77, 1),
(14, 77, 1),
(31, 77, 1),
(5, 78, 0),
(5, 78, 1),
(8, 78, 0),
(8, 78, 1),
(9, 78, 0),
(9, 78, 1),
(13, 78, 1),
(14, 78, 1),
(31, 78, 1),
(5, 79, 0),
(5, 79, 1),
(8, 79, 0),
(8, 79, 1),
(9, 79, 0),
(9, 79, 1),
(13, 79, 1),
(14, 79, 1),
(15, 79, 0),
(31, 79, 1),
(5, 80, 0),
(5, 80, 1),
(7, 80, 0),
(7, 80, 1),
(8, 80, 1),
(9, 80, 1),
(11, 80, 0),
(13, 80, 1),
(14, 80, 1),
(24, 80, 1),
(25, 80, 0),
(26, 80, 0),
(28, 80, 1),
(31, 80, 1),
(32, 80, 1),
(6, 81, 0),
(6, 81, 1),
(11, 81, 1),
(25, 81, 1),
(26, 81, 1),
(27, 81, 1),
(6, 82, 0),
(6, 82, 1),
(11, 82, 1),
(25, 82, 1),
(26, 82, 1),
(27, 82, 1),
(7, 83, 0),
(7, 83, 1),
(24, 83, 1),
(28, 83, 1),
(32, 83, 1),
(7, 84, 0),
(7, 84, 1),
(24, 84, 1),
(28, 84, 1),
(32, 84, 0),
(32, 84, 1),
(7, 85, 0),
(7, 85, 1),
(24, 85, 1),
(28, 85, 1),
(32, 85, 1),
(8, 86, 0),
(9, 86, 0),
(8, 87, 0),
(9, 87, 0),
(9, 88, 0),
(9, 89, 0),
(10, 90, 0),
(10, 91, 1),
(11, 92, 0),
(25, 92, 0),
(26, 92, 0),
(11, 93, 0),
(25, 93, 0),
(26, 93, 0),
(11, 94, 0),
(25, 94, 0),
(26, 94, 0),
(12, 95, 0),
(12, 95, 1),
(12, 96, 0),
(12, 96, 1),
(15, 96, 1),
(16, 96, 1),
(17, 96, 1),
(19, 96, 1),
(20, 96, 1),
(21, 96, 1),
(22, 96, 1),
(23, 96, 1),
(35, 96, 1),
(36, 96, 1),
(13, 97, 0),
(13, 98, 0),
(14, 99, 0),
(14, 100, 0),
(15, 101, 0),
(15, 102, 0),
(16, 103, 0),
(17, 104, 0),
(17, 105, 0),
(17, 106, 0),
(17, 107, 0),
(17, 108, 0),
(17, 109, 0),
(17, 110, 0),
(17, 111, 0),
(17, 112, 0),
(17, 113, 0),
(18, 114, 0),
(18, 115, 0),
(19, 116, 0),
(20, 117, 0),
(21, 118, 0),
(22, 119, 0),
(23, 120, 0),
(24, 121, 0),
(25, 122, 0),
(25, 123, 0),
(26, 124, 0),
(26, 125, 0),
(27, 126, 0),
(28, 126, 0),
(29, 127, 0),
(29, 128, 1),
(30, 128, 1),
(30, 129, 0),
(31, 130, 0),
(32, 131, 0),
(32, 132, 0),
(32, 133, 0),
(33, 134, 0),
(33, 135, 1),
(34, 136, 0),
(34, 137, 1),
(37, 137, 1),
(35, 138, 0),
(36, 138, 0),
(35, 139, 0),
(36, 139, 0),
(35, 140, 0),
(36, 140, 0),
(35, 141, 0),
(36, 141, 0),
(35, 142, 0),
(36, 142, 0),
(35, 143, 0),
(36, 143, 0),
(35, 144, 0),
(36, 144, 0),
(35, 145, 0),
(36, 145, 0),
(35, 146, 0),
(36, 146, 0),
(35, 147, 0),
(36, 147, 0),
(35, 148, 0),
(36, 148, 0),
(35, 149, 0),
(36, 149, 0),
(35, 150, 0),
(36, 150, 0),
(35, 151, 0),
(36, 151, 0),
(35, 152, 0),
(36, 152, 0),
(35, 153, 0),
(36, 153, 0),
(35, 154, 0),
(36, 154, 0),
(35, 155, 0),
(36, 155, 0),
(35, 156, 0),
(36, 156, 0),
(35, 157, 0),
(36, 157, 0),
(37, 158, 0),
(37, 159, 0),
(37, 160, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_sessions`
--

CREATE TABLE IF NOT EXISTS `phpbb_sessions` (
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `session_last_visit` int(11) unsigned NOT NULL DEFAULT '0',
  `session_start` int(11) unsigned NOT NULL DEFAULT '0',
  `session_time` int(11) unsigned NOT NULL DEFAULT '0',
  `session_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_browser` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_forwarded_for` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_page` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_viewonline` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `session_autologin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `session_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `session_forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`),
  KEY `session_time` (`session_time`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_fid` (`session_forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_sessions`
--

INSERT INTO `phpbb_sessions` (`session_id`, `session_user_id`, `session_last_visit`, `session_start`, `session_time`, `session_ip`, `session_browser`, `session_forwarded_for`, `session_page`, `session_viewonline`, `session_autologin`, `session_admin`, `session_forum_id`) VALUES
('0880b7691150e7789c11cb954312b6ad', 22, 1439569184, 1439569184, 1439569199, '178.92.65.91', 'Mozilla/5.0 (Windows NT 6.1; rv:41.0) Gecko/20100101 Firefox/41.0', '', 'memberlist.php?mode=viewprofile&u=38', 1, 0, 0, 0),
('81053d13aca0003f45450c8836eeb5d7', 1, 1439596159, 1439596159, 1439596159, '95.108.158.179', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', '', 'feed.php?mode=topics', 1, 0, 0, 0),
('fb9f2958b0de2a09724e3113ce399bae', 1, 1439577877, 1439577877, 1439578014, '46.200.34.202', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36', '', 'index.php?transition=false', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_sessions_keys`
--

CREATE TABLE IF NOT EXISTS `phpbb_sessions_keys` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`key_id`,`user_id`),
  KEY `last_login` (`last_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_sitelist`
--

CREATE TABLE IF NOT EXISTS `phpbb_sitelist` (
  `site_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `site_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `site_hostname` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ip_exclude` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_smilies`
--

CREATE TABLE IF NOT EXISTS `phpbb_smilies` (
  `smiley_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `emotion` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `smiley_url` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `smiley_width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `smiley_height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `smiley_order` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `display_on_posting` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`smiley_id`),
  KEY `display_on_post` (`display_on_posting`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `phpbb_smilies`
--

INSERT INTO `phpbb_smilies` (`smiley_id`, `code`, `emotion`, `smiley_url`, `smiley_width`, `smiley_height`, `smiley_order`, `display_on_posting`) VALUES
(1, ':D', 'Дуже щасливий', 'icon_e_biggrin.gif', 15, 17, 1, 1),
(2, ':-D', 'Дуже щасливий', 'icon_e_biggrin.gif', 15, 17, 2, 1),
(3, ':grin:', 'Дуже щасливий', 'icon_e_biggrin.gif', 15, 17, 3, 1),
(4, ':)', 'Посмішка', 'icon_e_smile.gif', 15, 17, 4, 1),
(5, ':-)', 'Посмішка', 'icon_e_smile.gif', 15, 17, 5, 1),
(6, ':smile:', 'Посмішка', 'icon_e_smile.gif', 15, 17, 6, 1),
(7, ';)', 'Підморгує', 'icon_e_wink.gif', 15, 17, 7, 1),
(8, ';-)', 'Підморгує', 'icon_e_wink.gif', 15, 17, 8, 1),
(9, ':wink:', 'Підморгує', 'icon_e_wink.gif', 15, 17, 9, 1),
(10, ':(', 'Сумний', 'icon_e_sad.gif', 15, 17, 10, 1),
(11, ':-(', 'Сумний', 'icon_e_sad.gif', 15, 17, 11, 1),
(12, ':sad:', 'Сумний', 'icon_e_sad.gif', 15, 17, 12, 1),
(13, ':o', 'Здивований', 'icon_e_surprised.gif', 15, 17, 13, 1),
(14, ':-o', 'Здивований', 'icon_e_surprised.gif', 15, 17, 14, 1),
(15, ':eek:', 'Здивований', 'icon_e_surprised.gif', 15, 17, 15, 1),
(16, ':shock:', 'Шокований', 'icon_eek.gif', 15, 17, 16, 1),
(17, ':?', 'Спантеличений', 'icon_e_confused.gif', 15, 17, 17, 1),
(18, ':-?', 'Спантеличений', 'icon_e_confused.gif', 15, 17, 18, 1),
(19, ':???:', 'Спантеличений', 'icon_e_confused.gif', 15, 17, 19, 1),
(20, '8-)', 'Кльво', 'icon_cool.gif', 15, 17, 20, 1),
(21, ':cool:', 'Кльво', 'icon_cool.gif', 15, 17, 21, 1),
(22, ':lol:', 'Сміється', 'icon_lol.gif', 15, 17, 22, 1),
(23, ':x', 'Божевільний', 'icon_mad.gif', 15, 17, 23, 1),
(24, ':-x', 'Божевільний', 'icon_mad.gif', 15, 17, 24, 1),
(25, ':mad:', 'Божевільний', 'icon_mad.gif', 15, 17, 25, 1),
(26, ':P', 'Глузує', 'icon_razz.gif', 15, 17, 26, 1),
(27, ':-P', 'Глузує', 'icon_razz.gif', 15, 17, 27, 1),
(28, ':razz:', 'Глузує', 'icon_razz.gif', 15, 17, 28, 1),
(29, ':oops:', 'Збентежений', 'icon_redface.gif', 15, 17, 29, 1),
(30, ':cry:', 'Плаче або дуже сердитий', 'icon_cry.gif', 15, 17, 30, 1),
(31, ':evil:', 'Злий або дуже роздратований', 'icon_evil.gif', 15, 17, 31, 1),
(32, ':twisted:', 'Дуже злий', 'icon_twisted.gif', 15, 17, 32, 1),
(33, ':roll:', 'Закочує очі', 'icon_rolleyes.gif', 15, 17, 33, 1),
(34, ':!:', 'Увага', 'icon_exclaim.gif', 15, 17, 34, 1),
(35, ':?:', 'Питання', 'icon_question.gif', 15, 17, 35, 1),
(36, ':idea:', 'Ідея', 'icon_idea.gif', 15, 17, 36, 1),
(37, ':arrow:', 'Стрілка', 'icon_arrow.gif', 15, 17, 37, 1),
(38, ':|', 'Нейтральний', 'icon_neutral.gif', 15, 17, 38, 1),
(39, ':-|', 'Нейтральний', 'icon_neutral.gif', 15, 17, 39, 1),
(40, ':mrgreen:', 'Зелений', 'icon_mrgreen.gif', 15, 17, 40, 1),
(41, ':geek:', 'Ботанік', 'icon_e_geek.gif', 17, 17, 41, 1),
(42, ':ugeek:', 'Конкретний ботанік', 'icon_e_ugeek.gif', 17, 18, 42, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_styles`
--

CREATE TABLE IF NOT EXISTS `phpbb_styles` (
  `style_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `style_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_copyright` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `style_path` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'kNg=',
  `style_parent_id` int(4) unsigned NOT NULL DEFAULT '0',
  `style_parent_tree` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`style_id`),
  UNIQUE KEY `style_name` (`style_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `phpbb_styles`
--

INSERT INTO `phpbb_styles` (`style_id`, `style_name`, `style_copyright`, `style_active`, `style_path`, `bbcode_bitfield`, `style_parent_id`, `style_parent_tree`) VALUES
(1, 'prosilver', '&copy; phpBB Limited', 1, 'prosilver', 'kNg=', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_teampage`
--

CREATE TABLE IF NOT EXISTS `phpbb_teampage` (
  `teampage_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `teampage_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `teampage_position` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `teampage_parent` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`teampage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `phpbb_teampage`
--

INSERT INTO `phpbb_teampage` (`teampage_id`, `group_id`, `teampage_name`, `teampage_position`, `teampage_parent`) VALUES
(1, 5, '', 1, 0),
(2, 4, '', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_topics`
--

CREATE TABLE IF NOT EXISTS `phpbb_topics` (
  `topic_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_attachment` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `topic_reported` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `topic_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `topic_poster` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_time` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_time_limit` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_views` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_status` tinyint(3) NOT NULL DEFAULT '0',
  `topic_type` tinyint(3) NOT NULL DEFAULT '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_first_poster_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `topic_first_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_last_poster_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_last_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_time` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_last_view_time` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_bumped` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `topic_bumper` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `poll_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `poll_start` int(11) unsigned NOT NULL DEFAULT '0',
  `poll_length` int(11) unsigned NOT NULL DEFAULT '0',
  `poll_max_options` tinyint(4) NOT NULL DEFAULT '1',
  `poll_last_vote` int(11) unsigned NOT NULL DEFAULT '0',
  `poll_vote_change` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `topic_visibility` tinyint(3) NOT NULL DEFAULT '0',
  `topic_delete_time` int(11) unsigned NOT NULL DEFAULT '0',
  `topic_delete_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_delete_user` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_posts_approved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_posts_unapproved` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_posts_softdeleted` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `forum_id_type` (`forum_id`,`topic_type`),
  KEY `last_post_time` (`topic_last_post_time`),
  KEY `fid_time_moved` (`forum_id`,`topic_last_post_time`,`topic_moved_id`),
  KEY `topic_visibility` (`topic_visibility`),
  KEY `forum_vis_last` (`forum_id`,`topic_visibility`,`topic_last_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `phpbb_topics`
--

INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `icon_id`, `topic_attachment`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`, `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`, `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`, `topic_visibility`, `topic_delete_time`, `topic_delete_reason`, `topic_delete_user`, `topic_posts_approved`, `topic_posts_unapproved`, `topic_posts_softdeleted`) VALUES
(4, 16, 0, 0, 0, 'Змінні та типи даних в PHP', 2, 1437053884, 0, 40, 0, 0, 5, 'intita', 'AA0000', 31, 125, 'potap@gmail.com', '', 'Re: Змінні та типи даних в PHP', 1438014402, 1438196911, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 6, 0, 0),
(5, 16, 0, 0, 0, 'Основи синтаксису', 2, 1437053934, 0, 38, 0, 0, 6, 'intita', 'AA0000', 27, 45, 'Roman Melnyk', '', 'Re: Основи синтаксису', 1437389655, 1439451998, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 5, 0, 0),
(6, 16, 0, 0, 0, 'Обробка запитів з допомогою PHP', 2, 1437053968, 0, 48, 0, 0, 7, 'intita', 'AA0000', 32, 54, 'StudentFour ', '', 'Re: Обробка запитів з допомогою PHP', 1438016568, 1439321019, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 4, 0, 0),
(8, 15, 0, 0, 0, 'Нова тема', 22, 1437125835, 0, 8, 0, 0, 12, 'Student ', '', 12, 22, 'Student ', '', 'Нова тема', 1437125835, 1438017947, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(9, 34, 0, 0, 0, 'Тема Тема', 40, 1437203534, 0, 17, 0, 0, 15, 'teacher3@gmail.com', '', 16, 40, 'teacher3@gmail.com', '', 'Re: Тема Тема', 1437203610, 1438017838, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 2, 0, 0),
(10, 35, 0, 0, 0, 'Тема 2', 40, 1437203686, 0, 18, 0, 0, 17, 'teacher3@gmail.com', '', 18, 40, 'teacher3@gmail.com', '', '', 1437203752, 1438017910, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 2, 0, 0),
(11, 35, 0, 0, 0, 'Тема 3', 40, 1437203781, 0, 12, 0, 0, 19, 'teacher3@gmail.com', '', 19, 40, 'teacher3@gmail.com', '', 'Тема 3', 1437203781, 1438017900, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(12, 35, 0, 0, 0, 'Тема 4', 40, 1437203808, 0, 10, 0, 0, 20, 'teacher3@gmail.com', '', 20, 40, 'teacher3@gmail.com', '', 'Тема 4', 1437203808, 1438017896, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(13, 35, 0, 0, 0, 'Тема 5', 40, 1437203836, 0, 7, 0, 0, 21, 'teacher3@gmail.com', '', 21, 40, 'teacher3@gmail.com', '', 'Тема 5', 1437203836, 1438017892, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(14, 35, 0, 0, 0, 'тема 6', 40, 1437203856, 0, 9, 0, 0, 22, 'teacher3@gmail.com', '', 22, 40, 'teacher3@gmail.com', '', 'тема 6', 1437203856, 1438017888, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(15, 35, 0, 0, 0, 'тема 7', 40, 1437204004, 0, 18, 0, 0, 23, 'teacher3@gmail.com', '', 36, 38, 'teacher ', '', 'Re: тема 7', 1439396894, 1439396894, 0, 0, 0, 'Кто выиграет Суперкубок Украины?', 1437204004, 0, 1, 1439396738, 0, 1, 0, '', 0, 3, 0, 0),
(16, 36, 0, 0, 0, 'иьмтьитьиь', 121, 1437554649, 0, 6, 0, 0, 29, 'genius ', '', 30, 38, 'teacher ', '', 'Re: иьмтьитьиь', 1437732959, 1438079915, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 2, 0, 0),
(17, 29, 0, 0, 0, 'аочропр', 39, 1438089493, 0, 3, 0, 0, 33, 'teacher2@gmail.com', '', 33, 39, 'teacher2@gmail.com', '', 'аочропр', 1438089493, 1438242107, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(18, 18, 0, 0, 0, 'нгокео', 38, 1439396356, 0, 1, 0, 0, 34, 'teacher ', '', 37, 38, 'teacher ', '', 'Re: нгокео', 1439399537, 1439399537, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_topics_posted`
--

CREATE TABLE IF NOT EXISTS `phpbb_topics_posted` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_posted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_topics_posted`
--

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
(38, 15, 1),
(38, 16, 1),
(38, 18, 1),
(39, 17, 1),
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
(54, 6, 1),
(121, 16, 1),
(125, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_topics_track`
--

CREATE TABLE IF NOT EXISTS `phpbb_topics_track` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `mark_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_topics_track`
--

INSERT INTO `phpbb_topics_track` (`user_id`, `topic_id`, `forum_id`, `mark_time`) VALUES
(2, 5, 16, 1437055279),
(22, 4, 16, 1437166713),
(22, 5, 16, 1437220304),
(22, 8, 15, 1437125835),
(38, 5, 16, 1437220304),
(38, 6, 16, 1437389787),
(38, 15, 35, 1439396894),
(38, 16, 36, 1437732959),
(38, 18, 18, 1439399537),
(39, 17, 29, 1438089493),
(40, 4, 16, 1437054417),
(40, 6, 16, 1437219404),
(40, 7, 16, 1437054945),
(40, 9, 34, 1437203610),
(40, 15, 35, 1437204004),
(45, 5, 16, 1437389655),
(45, 6, 16, 1438016568),
(51, 4, 16, 1438014402),
(121, 16, 36, 1437554649),
(125, 4, 16, 1438014402),
(125, 5, 16, 1437389655),
(129, 6, 16, 1438016568);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_topics_watch`
--

CREATE TABLE IF NOT EXISTS `phpbb_topics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `notify_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_stat` (`notify_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_topics_watch`
--

INSERT INTO `phpbb_topics_watch` (`topic_id`, `user_id`, `notify_status`) VALUES
(4, 22, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_users`
--

CREATE TABLE IF NOT EXISTS `phpbb_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(2) NOT NULL DEFAULT '0',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '3',
  `user_permissions` mediumtext COLLATE utf8_bin NOT NULL,
  `user_perm_from` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_regdate` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `username_clean` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_passchg` int(11) unsigned NOT NULL DEFAULT '0',
  `user_email` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_email_hash` bigint(20) NOT NULL DEFAULT '0',
  `user_birthday` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_lastvisit` int(11) unsigned NOT NULL DEFAULT '0',
  `user_lastmark` int(11) unsigned NOT NULL DEFAULT '0',
  `user_lastpost_time` int(11) unsigned NOT NULL DEFAULT '0',
  `user_lastpage` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_last_confirm_key` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_last_search` int(11) unsigned NOT NULL DEFAULT '0',
  `user_warnings` tinyint(4) NOT NULL DEFAULT '0',
  `user_last_warning` int(11) unsigned NOT NULL DEFAULT '0',
  `user_login_attempts` tinyint(4) NOT NULL DEFAULT '0',
  `user_inactive_reason` tinyint(2) NOT NULL DEFAULT '0',
  `user_inactive_time` int(11) unsigned NOT NULL DEFAULT '0',
  `user_posts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_lang` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_timezone` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_dateformat` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'd M Y H:i',
  `user_style` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_rank` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_new_privmsg` int(4) NOT NULL DEFAULT '0',
  `user_unread_privmsg` int(4) NOT NULL DEFAULT '0',
  `user_last_privmsg` int(11) unsigned NOT NULL DEFAULT '0',
  `user_message_rules` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_full_folder` int(11) NOT NULL DEFAULT '-3',
  `user_emailtime` int(11) unsigned NOT NULL DEFAULT '0',
  `user_topic_show_days` smallint(4) unsigned NOT NULL DEFAULT '0',
  `user_topic_sortby_type` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 't',
  `user_topic_sortby_dir` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'd',
  `user_post_show_days` smallint(4) unsigned NOT NULL DEFAULT '0',
  `user_post_sortby_type` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 't',
  `user_post_sortby_dir` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'a',
  `user_notify` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_notify_pm` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_notify_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_allow_pm` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_allow_viewonline` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_allow_viewemail` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_allow_massemail` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_options` int(11) unsigned NOT NULL DEFAULT '230271',
  `user_avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_avatar_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_avatar_width` smallint(4) unsigned NOT NULL DEFAULT '0',
  `user_avatar_height` smallint(4) unsigned NOT NULL DEFAULT '0',
  `user_sig` mediumtext COLLATE utf8_bin NOT NULL,
  `user_sig_bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_sig_bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_jabber` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_actkey` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_newpasswd` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_form_salt` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_new` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `user_reminded` tinyint(4) NOT NULL DEFAULT '0',
  `user_reminded_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_clean` (`username_clean`),
  KEY `user_birthday` (`user_birthday`),
  KEY `user_email_hash` (`user_email_hash`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=130 ;

--
-- Дамп данных таблицы `phpbb_users`
--

INSERT INTO `phpbb_users` (`user_id`, `user_type`, `group_id`, `user_permissions`, `user_perm_from`, `user_ip`, `user_regdate`, `username`, `username_clean`, `user_password`, `user_passchg`, `user_email`, `user_email_hash`, `user_birthday`, `user_lastvisit`, `user_lastmark`, `user_lastpost_time`, `user_lastpage`, `user_last_confirm_key`, `user_last_search`, `user_warnings`, `user_last_warning`, `user_login_attempts`, `user_inactive_reason`, `user_inactive_time`, `user_posts`, `user_lang`, `user_timezone`, `user_dateformat`, `user_style`, `user_rank`, `user_colour`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `user_message_rules`, `user_full_folder`, `user_emailtime`, `user_topic_show_days`, `user_topic_sortby_type`, `user_topic_sortby_dir`, `user_post_show_days`, `user_post_sortby_type`, `user_post_sortby_dir`, `user_notify`, `user_notify_pm`, `user_notify_type`, `user_allow_pm`, `user_allow_viewonline`, `user_allow_viewemail`, `user_allow_massemail`, `user_options`, `user_avatar`, `user_avatar_type`, `user_avatar_width`, `user_avatar_height`, `user_sig`, `user_sig_bbcode_uid`, `user_sig_bbcode_bitfield`, `user_jabber`, `user_actkey`, `user_newpasswd`, `user_form_salt`, `user_new`, `user_reminded`, `user_reminded_time`) VALUES
(1, 2, 1, '00000000000w27wrgg\n\n\n\n\n\n\n\n\n\n\n\n\n\n\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\n\n\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000\ni1cjyo000000', 0, '', 1431076924, 'Anonymous', 'anonymous', '', 0, '', 0, '', 0, 0, 0, '', '3PCDEEL84D', 1438079950, 0, 0, 0, 0, 0, 0, 'uk', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '950c30604ccf6644', 1, 0, 0),
(2, 3, 5, 'zik0zjzik0zjzik0zc\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\n\n\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000\nzik0zj000000', 0, '127.0.0.1', 1431076924, 'intita', 'intita', '$2y$10$G.aeTtUTb6qI44QQuAOgh.P5fP9mw3.6/WzPVzB53z5TM5i3mBdra', 0, 'intita.hr@gmail.com', 144972273819, '', 1439399028, 0, 1437055279, 'index.php', '251L6UMFD1', 0, 0, 0, 0, 0, 0, 4, 'uk', 'Europe/Kiev', 'd M Y H:i', 1, 1, 'AA0000', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '5e79e054a6e4eacd', 0, 0, 0),
(22, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'Student ', 'Student ', '', 0, '', 0, '', 1439315924, 1437123064, 1437220140, 'index.php', '3172KSGVLM', 1439315913, 0, 0, 0, 0, 0, 4, 'ru', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0),
(38, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'teacher ', 'teacher ', '', 0, '', 0, '', 1439400209, 0, 1439399537, 'posting.php?f=18&mode=reply&t=18', '3UF2RKUMFY', 0, 0, 0, 0, 0, 0, 6, 'uk', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0),
(39, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1438089466, 'teacher2@gmail.com', 'teacher2@gmail.com', '', 0, '', 0, '', 0, 0, 1438089493, '', 'DP7RFO1A2P', 0, 0, 0, 0, 0, 0, 1, 'ua', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(40, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'teacher3@gmail.com', 'teacher3@gmail.com', '', 0, '', 0, '', 1437215252, 0, 1437219397, 'index.php?transition=false', '3JEJLYLZU4', 1437054456, 0, 0, 0, 0, 0, 12, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 0, 0, 0),
(42, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1439397704, 'teacher5@gmail.com', 'teacher5@gmail.com', '', 0, '', 0, '', 1439397705, 0, 0, 'index.php?transition=false', '', 0, 0, 0, 0, 0, 0, 0, 'uk', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(45, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'Roman Melnyk', 'Roman Melnyk', '', 0, '', 0, '', 1439453293, 0, 1437389787, 'index.php', '', 0, 0, 0, 0, 0, 0, 2, 'en', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(51, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'Student 1 ', 'Student 1 ', '', 0, '', 0, '', 1439390803, 0, 1437054093, 'index.php?transition=false', '', 0, 0, 0, 0, 0, 0, 1, 'uk', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(52, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'Student 2 ', 'Student 2 ', '', 0, '', 0, '', 1439397603, 0, 0, 'index.php?transition=false', 'VMVX77DFAA', 0, 0, 0, 0, 0, 0, 0, 'en', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(54, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1438016520, 'StudentFour ', 'StudentFour ', '', 0, '', 0, '', 1438018029, 0, 1438016568, 'viewtopic.php?p=27', '2Y1D403DFK', 0, 0, 0, 0, 0, 0, 1, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(106, 0, 3, '', 0, '', 1431076924, 'nnn.badyora2015@gmail.com', 'nnn.badyora2015@gmail.com', '', 0, '', 0, '', 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, '', 'Europe/Kiev', 'd M Y H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(113, 0, 3, '', 0, '', 1431076924, 'Олександр Бохан', 'Олександр Бохан', '', 0, '', 0, '', 1436971163, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(121, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1431076924, 'genius ', 'genius ', '', 0, '', 0, '', 0, 0, 1437554649, '', '1C98QMWW3P', 0, 0, 0, 0, 0, 0, 1, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 1, 1, 1438247796, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(125, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1438013849, 'potap@gmail.com', 'potap@gmail.com', '', 0, '', 0, '', 1438014936, 0, 1438014402, '', '', 0, 0, 0, 0, 0, 0, 1, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(129, 0, 3, '00000000001qh78puw\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\n\n\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000\nkgzahh000000', 0, '', 1438165651, 'Наталья Бадёра', 'Наталья Бадёра', '', 0, '', 0, '', 1438242297, 0, 1438247796, 'ucp.php?i=ucp_profile&mode=profile_info', '', 0, 0, 0, 0, 0, 0, 0, '', 'Europe/Kiev', 'd M Y H:i', 1, 0, '', 0, 0, 1438247796, 0, -3, 1438242151, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_user_group`
--

CREATE TABLE IF NOT EXISTS `phpbb_user_group` (
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `group_leader` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_pending` tinyint(1) unsigned NOT NULL DEFAULT '1',
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`),
  KEY `group_leader` (`group_leader`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_user_group`
--

INSERT INTO `phpbb_user_group` (`group_id`, `user_id`, `group_leader`, `user_pending`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(4, 2, 0, 0),
(5, 2, 1, 0),
(2, 113, 0, 0),
(2, 52, 0, 0),
(2, 38, 0, 0),
(2, 106, 0, 0),
(2, 51, 0, 0),
(2, 40, 0, 0),
(2, 22, 0, 0),
(2, 45, 0, 0),
(2, 121, 0, 0),
(2, 125, 0, 0),
(2, 54, 0, 0),
(2, 39, 0, 0),
(2, 129, 0, 0),
(2, 42, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_user_notifications`
--

CREATE TABLE IF NOT EXISTS `phpbb_user_notifications` (
  `item_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `item_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `method` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `notify` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `phpbb_user_notifications`
--

INSERT INTO `phpbb_user_notifications` (`item_type`, `item_id`, `user_id`, `method`, `notify`) VALUES
('notification.type.post', 0, 2, '', 1),
('notification.type.post', 0, 2, 'notification.method.email', 1),
('notification.type.topic', 0, 2, '', 1),
('notification.type.topic', 0, 2, 'notification.method.email', 1),
('notification.type.post', 0, 3, '', 1),
('notification.type.post', 0, 3, 'notification.method.email', 1),
('notification.type.topic', 0, 3, '', 1),
('notification.type.topic', 0, 3, 'notification.method.email', 1),
('notification.type.post', 0, 4, '', 1),
('notification.type.post', 0, 4, 'notification.method.email', 1),
('notification.type.topic', 0, 4, '', 1),
('notification.type.topic', 0, 4, 'notification.method.email', 1),
('notification.type.post', 0, 5, '', 1),
('notification.type.post', 0, 5, 'notification.method.email', 1),
('notification.type.topic', 0, 5, '', 1),
('notification.type.topic', 0, 5, 'notification.method.email', 1),
('notification.type.post', 0, 6, '', 1),
('notification.type.post', 0, 6, 'notification.method.email', 1),
('notification.type.topic', 0, 6, '', 1),
('notification.type.topic', 0, 6, 'notification.method.email', 1),
('notification.type.post', 0, 7, '', 1),
('notification.type.post', 0, 7, 'notification.method.email', 1),
('notification.type.topic', 0, 7, '', 1),
('notification.type.topic', 0, 7, 'notification.method.email', 1),
('notification.type.post', 0, 8, '', 1),
('notification.type.post', 0, 8, 'notification.method.email', 1),
('notification.type.topic', 0, 8, '', 1),
('notification.type.topic', 0, 8, 'notification.method.email', 1),
('notification.type.post', 0, 9, '', 1),
('notification.type.post', 0, 9, 'notification.method.email', 1),
('notification.type.topic', 0, 9, '', 1),
('notification.type.topic', 0, 9, 'notification.method.email', 1),
('notification.type.post', 0, 10, '', 1),
('notification.type.post', 0, 10, 'notification.method.email', 1),
('notification.type.topic', 0, 10, '', 1),
('notification.type.topic', 0, 10, 'notification.method.email', 1),
('notification.type.post', 0, 11, '', 1),
('notification.type.post', 0, 11, 'notification.method.email', 1),
('notification.type.topic', 0, 11, '', 1),
('notification.type.topic', 0, 11, 'notification.method.email', 1),
('notification.type.post', 0, 12, '', 1),
('notification.type.post', 0, 12, 'notification.method.email', 1),
('notification.type.topic', 0, 12, '', 1),
('notification.type.topic', 0, 12, 'notification.method.email', 1),
('notification.type.post', 0, 13, '', 1),
('notification.type.post', 0, 13, 'notification.method.email', 1),
('notification.type.topic', 0, 13, '', 1),
('notification.type.topic', 0, 13, 'notification.method.email', 1),
('notification.type.post', 0, 14, '', 1),
('notification.type.post', 0, 14, 'notification.method.email', 1),
('notification.type.topic', 0, 14, '', 1),
('notification.type.topic', 0, 14, 'notification.method.email', 1),
('notification.type.post', 0, 15, '', 1),
('notification.type.post', 0, 15, 'notification.method.email', 1),
('notification.type.topic', 0, 15, '', 1),
('notification.type.topic', 0, 15, 'notification.method.email', 1),
('notification.type.post', 0, 16, '', 1),
('notification.type.post', 0, 16, 'notification.method.email', 1),
('notification.type.topic', 0, 16, '', 1),
('notification.type.topic', 0, 16, 'notification.method.email', 1),
('notification.type.post', 0, 17, '', 1),
('notification.type.post', 0, 17, 'notification.method.email', 1),
('notification.type.topic', 0, 17, '', 1),
('notification.type.topic', 0, 17, 'notification.method.email', 1),
('notification.type.post', 0, 18, '', 1),
('notification.type.post', 0, 18, 'notification.method.email', 1),
('notification.type.topic', 0, 18, '', 1),
('notification.type.topic', 0, 18, 'notification.method.email', 1),
('notification.type.post', 0, 19, '', 1),
('notification.type.post', 0, 19, 'notification.method.email', 1),
('notification.type.topic', 0, 19, '', 1),
('notification.type.topic', 0, 19, 'notification.method.email', 1),
('notification.type.post', 0, 20, '', 1),
('notification.type.post', 0, 20, 'notification.method.email', 1),
('notification.type.topic', 0, 20, '', 1),
('notification.type.topic', 0, 20, 'notification.method.email', 1),
('notification.type.post', 0, 21, '', 1),
('notification.type.post', 0, 21, 'notification.method.email', 1),
('notification.type.topic', 0, 21, '', 1),
('notification.type.topic', 0, 21, 'notification.method.email', 1),
('notification.type.post', 0, 22, '', 1),
('notification.type.post', 0, 22, 'notification.method.email', 1),
('notification.type.topic', 0, 22, '', 1),
('notification.type.topic', 0, 22, 'notification.method.email', 1),
('notification.type.post', 0, 23, '', 1),
('notification.type.post', 0, 23, 'notification.method.email', 1),
('notification.type.topic', 0, 23, '', 1),
('notification.type.topic', 0, 23, 'notification.method.email', 1),
('notification.type.post', 0, 24, '', 1),
('notification.type.post', 0, 24, 'notification.method.email', 1),
('notification.type.topic', 0, 24, '', 1),
('notification.type.topic', 0, 24, 'notification.method.email', 1),
('notification.type.post', 0, 25, '', 1),
('notification.type.post', 0, 25, 'notification.method.email', 1),
('notification.type.topic', 0, 25, '', 1),
('notification.type.topic', 0, 25, 'notification.method.email', 1),
('notification.type.post', 0, 26, '', 1),
('notification.type.post', 0, 26, 'notification.method.email', 1),
('notification.type.topic', 0, 26, '', 1),
('notification.type.topic', 0, 26, 'notification.method.email', 1),
('notification.type.post', 0, 27, '', 1),
('notification.type.post', 0, 27, 'notification.method.email', 1),
('notification.type.topic', 0, 27, '', 1),
('notification.type.topic', 0, 27, 'notification.method.email', 1),
('notification.type.post', 0, 28, '', 1),
('notification.type.post', 0, 28, 'notification.method.email', 1),
('notification.type.topic', 0, 28, '', 1),
('notification.type.topic', 0, 28, 'notification.method.email', 1),
('notification.type.post', 0, 29, '', 1),
('notification.type.post', 0, 29, 'notification.method.email', 1),
('notification.type.topic', 0, 29, '', 1),
('notification.type.topic', 0, 29, 'notification.method.email', 1),
('notification.type.post', 0, 30, '', 1),
('notification.type.post', 0, 30, 'notification.method.email', 1),
('notification.type.topic', 0, 30, '', 1),
('notification.type.topic', 0, 30, 'notification.method.email', 1),
('notification.type.post', 0, 31, '', 1),
('notification.type.post', 0, 31, 'notification.method.email', 1),
('notification.type.topic', 0, 31, '', 1),
('notification.type.topic', 0, 31, 'notification.method.email', 1),
('notification.type.post', 0, 32, '', 1),
('notification.type.post', 0, 32, 'notification.method.email', 1),
('notification.type.topic', 0, 32, '', 1),
('notification.type.topic', 0, 32, 'notification.method.email', 1),
('notification.type.post', 0, 33, '', 1),
('notification.type.post', 0, 33, 'notification.method.email', 1),
('notification.type.topic', 0, 33, '', 1),
('notification.type.topic', 0, 33, 'notification.method.email', 1),
('notification.type.post', 0, 34, '', 1),
('notification.type.post', 0, 34, 'notification.method.email', 1),
('notification.type.topic', 0, 34, '', 1),
('notification.type.topic', 0, 34, 'notification.method.email', 1),
('notification.type.post', 0, 35, '', 1),
('notification.type.post', 0, 35, 'notification.method.email', 1),
('notification.type.topic', 0, 35, '', 1),
('notification.type.topic', 0, 35, 'notification.method.email', 1),
('notification.type.post', 0, 36, '', 1),
('notification.type.post', 0, 36, 'notification.method.email', 1),
('notification.type.topic', 0, 36, '', 1),
('notification.type.topic', 0, 36, 'notification.method.email', 1),
('notification.type.post', 0, 37, '', 1),
('notification.type.post', 0, 37, 'notification.method.email', 1),
('notification.type.topic', 0, 37, '', 1),
('notification.type.topic', 0, 37, 'notification.method.email', 1),
('notification.type.post', 0, 38, '', 1),
('notification.type.post', 0, 38, 'notification.method.email', 1),
('notification.type.topic', 0, 38, '', 1),
('notification.type.topic', 0, 38, 'notification.method.email', 1),
('notification.type.post', 0, 39, '', 1),
('notification.type.post', 0, 39, 'notification.method.email', 1),
('notification.type.topic', 0, 39, '', 1),
('notification.type.topic', 0, 39, 'notification.method.email', 1),
('notification.type.post', 0, 40, '', 1),
('notification.type.post', 0, 40, 'notification.method.email', 1),
('notification.type.topic', 0, 40, '', 1),
('notification.type.topic', 0, 40, 'notification.method.email', 1),
('notification.type.post', 0, 41, '', 1),
('notification.type.post', 0, 41, 'notification.method.email', 1),
('notification.type.topic', 0, 41, '', 1),
('notification.type.topic', 0, 41, 'notification.method.email', 1),
('notification.type.post', 0, 42, '', 1),
('notification.type.post', 0, 42, 'notification.method.email', 1),
('notification.type.topic', 0, 42, '', 1),
('notification.type.topic', 0, 42, 'notification.method.email', 1),
('notification.type.post', 0, 43, '', 1),
('notification.type.post', 0, 43, 'notification.method.email', 1),
('notification.type.topic', 0, 43, '', 1),
('notification.type.topic', 0, 43, 'notification.method.email', 1),
('notification.type.post', 0, 44, '', 1),
('notification.type.post', 0, 44, 'notification.method.email', 1),
('notification.type.topic', 0, 44, '', 1),
('notification.type.topic', 0, 44, 'notification.method.email', 1),
('notification.type.post', 0, 45, '', 1),
('notification.type.post', 0, 45, 'notification.method.email', 1),
('notification.type.topic', 0, 45, '', 1),
('notification.type.topic', 0, 45, 'notification.method.email', 1),
('notification.type.post', 0, 46, '', 1),
('notification.type.post', 0, 46, 'notification.method.email', 1),
('notification.type.topic', 0, 46, '', 1),
('notification.type.topic', 0, 46, 'notification.method.email', 1),
('notification.type.post', 0, 47, '', 1),
('notification.type.post', 0, 47, 'notification.method.email', 1),
('notification.type.topic', 0, 47, '', 1),
('notification.type.topic', 0, 47, 'notification.method.email', 1),
('notification.type.post', 0, 48, '', 1),
('notification.type.post', 0, 48, 'notification.method.email', 1),
('notification.type.topic', 0, 48, '', 1),
('notification.type.topic', 0, 48, 'notification.method.email', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_warnings`
--

CREATE TABLE IF NOT EXISTS `phpbb_warnings` (
  `warning_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `post_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `log_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `warning_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`warning_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_words`
--

CREATE TABLE IF NOT EXISTS `phpbb_words` (
  `word_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `replacement` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `phpbb_zebra`
--

CREATE TABLE IF NOT EXISTS `phpbb_zebra` (
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `zebra_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `friend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `foe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`zebra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
