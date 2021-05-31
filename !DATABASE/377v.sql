-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2021 г., 11:40
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `stations`
--

CREATE TABLE `stations` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `info` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stations`
--

INSERT INTO `stations` (`id`, `name`, `info`, `date`) VALUES
(1, 'Санкт-Петербург', '22222', NULL),
(2, 'Череповец', NULL, NULL),
(3, 'Вологда', NULL, NULL),
(4, 'Киров', NULL, NULL),
(5, 'Пермь', NULL, NULL),
(6, 'Екатеринбург', NULL, NULL),
(7, 'Курган', NULL, NULL),
(8, 'Омск', NULL, NULL),
(9, 'Новосибирск', NULL, NULL),
(10, 'Новокузнецк', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `auth_key`) VALUES
(0, 'Guest', NULL, NULL, NULL),
(1, 'admin9999', 'admin99@mail.ru', '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya', '14aGe4e1fz0x3BkTn7X0_w4rXanDJmen'),
(2, 'yauser228', 'user1337@mail.ru', '$2y$13$WNZJG6gnWJqK5poRpEw7DOd1nPl81FAXC9PdVoS7SQ46HzckA2KcK', '_uavtwMpynITbivQV5-TIW5RxQ7oTerr'),
(5, 'loginator228', 'loginator@gmail.com', '$2y$13$CkJ79By5oyCZbAqO9ZO8neZekx8F8sMDdZ6xesOjQMbOntivQI8Gq', '5WYgnEX6dSKW9T4bQy8oNB1h6aXPCanL'),
(6, 'Voider404', 'alterno@gmail.com', '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG', 'BDd8FBLy3bUHt57Sh9jNBGrB5E1n46Td'),
(7, 'TestAccount', 'void@gmail.com', '$2y$13$2mCiYefYtDoJaJLIV34oO.29MbaKe4lvGnTJrbW..zDLd83wXeCSe', NULL),
(8, 'RTK20192020', 'rtk@mail.ru', '$2y$13$BfMdJEP.eOjywR5DrFFnZuxGoC0HH4k/dSZU3CqUi9U4QKGzKAA6y', 'vpuDbq3SaYx590mKBsjphpbIJuMcnlRD');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `stations`
--
ALTER TABLE `stations`
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
-- AUTO_INCREMENT для таблицы `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
