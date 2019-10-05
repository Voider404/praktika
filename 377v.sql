-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 05 2019 г., 17:21
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `377v`
--

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_train` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `description`
--

INSERT INTO `description` (`id`, `id_user`, `id_train`, `description`) VALUES
(24, 2, 8, 'wqeqwe'),
(27, 2, 8, '12e12e12e12e'),
(28, 2, 5, 'dqwdqwdqwd\r\n'),
(29, 2, 5, 'wdqwdqwd'),
(30, 2, 5, 'qweqweqweqwe'),
(31, 2, 5, 'qweqweqweqweqw12212312'),
(32, 2, 5, 'q2eq2e12e12e12e'),
(33, 2, 5, ''),
(42, 5, 2, 'уцкцукцукцкцук'),
(47, 6, 1, 'ОТЗЫВ\r\n'),
(51, 6, 1, '123'),
(52, 8, 1, 'Вроде есть, а вроде нет'),
(53, 8, 2, 'Хороший поезд, и комментарии интересные\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `reserved`
--

CREATE TABLE `reserved` (
  `id` int(11) NOT NULL,
  `passanger_id` int(11) DEFAULT NULL,
  `id_route` int(11) DEFAULT NULL,
  `start_reserv` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `documents` int(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reserved`
--

INSERT INTO `reserved` (`id`, `passanger_id`, `id_route`, `start_reserv`, `name`, `surname`, `birthdate`, `documents`, `status`) VALUES
(2, 5, 3, '2019-06-21 03:13:35', 'Никита', 'Рахманов', '2019-06-05', 12121212, 1),
(4, NULL, 2, '2019-10-03 12:54:23', 'Дмитрий', 'Григорьев', '2019-10-31', 4016, 1),
(6, 8, 60, '2019-10-03 14:19:56', 'Денис', 'Кузьмичёв', '0001-01-01', 4013, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stations`
--

INSERT INTO `stations` (`id`, `name`, `info`) VALUES
(1, 'Санкт-Петербург', NULL),
(2, 'Череповец', NULL),
(3, 'Вологда', NULL),
(4, 'Киров', NULL),
(5, 'Пермь', NULL),
(6, 'Екатеринбург', NULL),
(7, 'Курган', NULL),
(8, 'Омск', NULL),
(9, 'Новосибирск', NULL),
(10, 'Новокузнецк', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `id_train` int(11) DEFAULT NULL,
  `id_station` int(11) DEFAULT NULL,
  `time_start` datetime DEFAULT NULL,
  `time_end` datetime DEFAULT NULL,
  `price` float DEFAULT NULL,
  `next_stay` int(11) DEFAULT NULL,
  `number_vagon` int(11) NOT NULL,
  `number_place` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `id_train`, `id_station`, `time_start`, `time_end`, `price`, `next_stay`, `number_vagon`, `number_place`, `state`) VALUES
(1, 1, 1, '2019-06-21 00:00:00', '2019-06-23 00:00:00', 3500, 2, 1, 1, 1),
(2, 1, 1, '2019-06-21 00:00:00', '2019-06-24 00:00:00', 3500, 2, 1, 2, 1),
(3, 1, 1, '2019-06-21 00:00:00', '2019-06-25 00:00:00', 3500, 2, 1, 3, 1),
(4, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 2, 1, 4, 0),
(5, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 2, 1, 5, 0),
(6, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 3, 2, 1, 0),
(7, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 3, 2, 2, 0),
(8, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 3, 2, 3, 0),
(9, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 3, 2, 4, 0),
(10, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 3, 2, 5, 0),
(11, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 4, 3, 1, 0),
(12, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 4, 3, 2, 0),
(13, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 4, 3, 3, 0),
(14, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 4, 3, 4, 0),
(15, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 4, 3, 5, 0),
(16, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 5, 4, 1, 0),
(17, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 5, 4, 2, 0),
(18, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 5, 4, 3, 0),
(19, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 5, 4, 4, 0),
(20, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 5, 4, 5, 0),
(21, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 6, 5, 1, 0),
(22, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 6, 5, 2, 0),
(23, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 6, 5, 3, 0),
(24, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 6, 5, 4, 0),
(25, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 6, 5, 5, 0),
(26, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 7, 6, 1, 0),
(27, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 7, 6, 2, 0),
(28, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 7, 6, 3, 0),
(29, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 7, 6, 4, 0),
(30, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 7, 6, 5, 0),
(31, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 8, 7, 1, 0),
(32, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 8, 7, 2, 0),
(33, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 8, 7, 3, 0),
(34, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 8, 7, 4, 0),
(35, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 8, 7, 5, 0),
(36, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 8, 1, 0),
(37, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 8, 2, 0),
(38, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 8, 3, 0),
(39, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 8, 4, 0),
(40, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 8, 5, 0),
(41, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 10, 9, 1, 0),
(42, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 10, 9, 2, 0),
(43, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 10, 9, 3, 0),
(44, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 10, 9, 4, 0),
(45, 1, 1, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 10, 9, 5, 0),
(46, 2, 10, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 1, 1, 0),
(47, 2, 10, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 1, 2, 0),
(48, 2, 10, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 1, 3, 0),
(49, 2, 10, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 1, 4, 0),
(50, 2, 10, '2019-06-21 00:00:00', '2019-06-22 00:00:00', 3500, 9, 1, 5, 0),
(51, 2, 10, '2019-06-22 00:00:00', '2019-06-23 00:00:00', 3500, 8, 2, 1, 0),
(52, 2, 10, '2019-06-22 00:00:00', '2019-06-23 00:00:00', 3500, 8, 2, 2, 0),
(53, 2, 10, '2019-06-22 00:00:00', '2019-06-23 00:00:00', 3500, 8, 2, 3, 0),
(54, 2, 10, '2019-06-22 00:00:00', '2019-06-23 00:00:00', 3500, 8, 2, 4, 0),
(55, 2, 10, '2019-06-22 00:00:00', '2019-06-23 00:00:00', 3500, 8, 2, 5, 0),
(56, 2, 10, '2019-06-23 00:00:00', '2019-06-24 00:00:00', 3500, 7, 3, 1, 0),
(57, 2, 10, '2019-06-23 00:00:00', '2019-06-24 00:00:00', 3500, 7, 3, 2, 0),
(58, 2, 10, '2019-06-23 00:00:00', '2019-06-24 00:00:00', 3500, 7, 3, 3, 0),
(59, 2, 10, '2019-06-23 00:00:00', '2019-06-24 00:00:00', 3500, 7, 3, 4, 0),
(60, 2, 10, '2019-06-23 00:00:00', '2019-06-24 00:00:00', 3500, 7, 3, 5, 1),
(61, 2, 10, '2019-06-24 00:00:00', '2019-06-25 00:00:00', 3500, 6, 4, 1, 0),
(62, 2, 10, '2019-06-24 00:00:00', '2019-06-25 00:00:00', 3500, 6, 4, 2, 0),
(63, 2, 10, '2019-06-24 00:00:00', '2019-06-25 00:00:00', 3500, 6, 4, 3, 0),
(64, 2, 10, '2019-06-24 00:00:00', '2019-06-25 00:00:00', 3500, 6, 4, 4, 0),
(65, 2, 10, '2019-06-24 00:00:00', '2019-06-25 00:00:00', 3500, 6, 4, 5, 0),
(66, 2, 10, '2019-06-25 00:00:00', '2019-06-26 00:00:00', 3500, 5, 5, 1, 0),
(67, 2, 10, '2019-06-25 00:00:00', '2019-06-26 00:00:00', 3500, 5, 5, 2, 0),
(68, 2, 10, '2019-06-25 00:00:00', '2019-06-26 00:00:00', 3500, 5, 5, 3, 0),
(69, 2, 10, '2019-06-25 00:00:00', '2019-06-26 00:00:00', 3500, 5, 5, 4, 0),
(70, 2, 10, '2019-06-25 00:00:00', '2019-06-26 00:00:00', 3500, 5, 5, 5, 0),
(71, 2, 10, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 3500, 4, 6, 1, 0),
(72, 2, 10, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 3500, 4, 6, 2, 0),
(73, 2, 10, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 3500, 4, 6, 3, 0),
(74, 2, 10, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 3500, 4, 6, 4, 0),
(75, 2, 10, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 3500, 4, 6, 5, 0),
(76, 2, 10, '2019-06-27 00:00:00', '2019-06-28 00:00:00', 3500, 3, 7, 1, 0),
(77, 2, 10, '2019-06-27 00:00:00', '2019-06-28 00:00:00', 3500, 3, 7, 2, 0),
(78, 2, 10, '2019-06-27 00:00:00', '2019-06-28 00:00:00', 3500, 3, 7, 3, 0),
(79, 2, 10, '2019-06-27 00:00:00', '2019-06-28 00:00:00', 3500, 3, 7, 4, 1),
(80, 2, 10, '2019-06-27 00:00:00', '2019-06-28 00:00:00', 3500, 3, 7, 5, 0),
(81, 2, 10, '2019-06-28 00:00:00', '2019-06-29 00:00:00', 3500, 2, 8, 1, 0),
(82, 2, 10, '2019-06-28 00:00:00', '2019-06-29 00:00:00', 3500, 2, 8, 2, 0),
(83, 2, 10, '2019-06-28 00:00:00', '2019-06-29 00:00:00', 3500, 2, 8, 3, 0),
(84, 2, 10, '2019-06-28 00:00:00', '2019-06-29 00:00:00', 3500, 2, 8, 4, 0),
(85, 2, 10, '2019-06-28 00:00:00', '2019-06-29 00:00:00', 3500, 2, 8, 5, 0),
(86, 2, 10, '2019-06-29 00:00:00', '2019-06-30 00:00:00', 3500, 1, 9, 1, 0),
(87, 2, 10, '2019-06-29 00:00:00', '2019-06-30 00:00:00', 3500, 1, 9, 2, 0),
(88, 2, 10, '2019-06-29 00:00:00', '2019-06-30 00:00:00', 3500, 1, 9, 3, 0),
(89, 2, 10, '2019-06-29 00:00:00', '2019-06-30 00:00:00', 3500, 1, 9, 4, 0),
(90, 2, 10, '2019-06-29 10:00:00', '2019-06-30 00:00:00', 3500, 1, 9, 5, 0),
(91, 1, 1, '2019-06-05 12:00:00', '2019-06-07 12:00:00', 3500, 2, 1, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `number` varchar(100) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `navigate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `train`
--

INSERT INTO `train` (`id`, `number`, `type_id`, `navigate`) VALUES
(1, 'F-35', 1, 'Санкт-Петербург->Новокузнецк'),
(2, 'F-36', 1, 'Новокузнецк->Санкт-Петербург'),
(3, 'A-01', 1, 'Санкт-Петербург->Вологда');

-- --------------------------------------------------------

--
-- Структура таблицы `train_type`
--

CREATE TABLE `train_type` (
  `id` int(11) NOT NULL,
  `places` varchar(100) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `train_type`
--

INSERT INTO `train_type` (`id`, `places`, `type_name`) VALUES
(1, '45', 'Скорый');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `auth_key`) VALUES
(1, 'admin9999', 'admin99@mail.ru', '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya', '14aGe4e1fz0x3BkTn7X0_w4rXanDJmen'),
(2, 'yauser228', 'user1337@mail.ru', '$2y$13$WNZJG6gnWJqK5poRpEw7DOd1nPl81FAXC9PdVoS7SQ46HzckA2KcK', '_uavtwMpynITbivQV5-TIW5RxQ7oTerr'),
(5, 'loginator228', 'loginator@gmail.com', '$2y$13$CkJ79By5oyCZbAqO9ZO8neZekx8F8sMDdZ6xesOjQMbOntivQI8Gq', '5WYgnEX6dSKW9T4bQy8oNB1h6aXPCanL'),
(6, 'Voider404', 'alterno@gmail.com', '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG', 'fOze2mGOMDMckaYH0K3DwxgkJ1rfxVgs'),
(7, 'TestAccount', 'void@gmail.com', '$2y$13$2mCiYefYtDoJaJLIV34oO.29MbaKe4lvGnTJrbW..zDLd83wXeCSe', NULL),
(8, 'RTK20192020', 'rtk@mail.ru', '$2y$13$BfMdJEP.eOjywR5DrFFnZuxGoC0HH4k/dSZU3CqUi9U4QKGzKAA6y', 'DcCn15-MdAA_zMYRckxjexrH2pLcrIwi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_train` (`id_train`);

--
-- Индексы таблицы `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passanger_id` (`passanger_id`),
  ADD KEY `start_id` (`id_route`);

--
-- Индексы таблицы `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_train` (`id_train`),
  ADD KEY `id_station` (`id_station`),
  ADD KEY `next_stay` (`next_stay`);

--
-- Индексы таблицы `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `train_type`
--
ALTER TABLE `train_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `train_type`
--
ALTER TABLE `train_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `description_ibfk_2` FOREIGN KEY (`id_train`) REFERENCES `train` (`id`);

--
-- Ограничения внешнего ключа таблицы `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`passanger_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reserved_ibfk_2` FOREIGN KEY (`id_route`) REFERENCES `timetable` (`id`);

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`id_train`) REFERENCES `train` (`id`),
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`id_station`) REFERENCES `stations` (`id`),
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`next_stay`) REFERENCES `stations` (`id`);

--
-- Ограничения внешнего ключа таблицы `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `train_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
