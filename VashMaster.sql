-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2019 г., 20:56
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `VashMaster`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Contact`
--

CREATE TABLE `Contact` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `Work` varchar(430) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Contact`
--

INSERT INTO `Contact` (`id`, `name`, `phone`, `Work`, `date_send`) VALUES
(31, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:51'),
(32, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:51'),
(33, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:51'),
(34, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:51'),
(35, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:52'),
(36, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:52'),
(37, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:46:52'),
(38, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:47:40'),
(39, 'Test 1', '+7(123)010-23-01', 'Test 1', '2019-09-08 20:47:40'),
(40, 'Иван', '+7(123)010-23-01', '123123213', '2019-09-08 20:47:51'),
(41, 'Иван', '+7(123)010-23-01', '123123213', '2019-09-08 20:48:30'),
(42, 'Иван', '+7(123)010-23-01', 'Всё нравится', '2019-09-08 20:48:36'),
(43, 'Иван', '+7(123)010-23-01', 'Всё нравится', '2019-09-08 20:52:10');

-- --------------------------------------------------------

--
-- Структура таблицы `Portfolio`
--

CREATE TABLE `Portfolio` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `path` varchar(85) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Testimonials`
--

CREATE TABLE `Testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(85) NOT NULL,
  `aboutTestimonial` varchar(350) NOT NULL,
  `author` varchar(35) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Testimonials`
--

INSERT INTO `Testimonials` (`id`, `name`, `path`, `aboutTestimonial`, `author`, `date_add`) VALUES
(1, '', 'cnDr4pQC0K3AJKKrudRLXxSEowMHux00uqya5vSgvEXUtbfbcXIFpkRuk6BdFFsWDQmhYYNiSUJB50.png', 'asddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasddddddddddddddasdddddddddddddd', 'Test', '2019-09-09 19:55:34');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `token` varchar(49) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `password`, `name`, `token`, `isAdmin`, `date_register`) VALUES
(1, 'efcolipt', '$2y$10$PxU95L1.gOxvxoqrcyAcRe.AVP2pKoYrsZEqYpXXFyIfOEJ8XslKe', 'Иван', 'YeCrL4StpEwTRAh0BYmGzotfhWRyEdeWcjOgQPiR6PVzUWqJL', 1, '2019-09-02 13:56:05'),
(2, 'Ekatha', '$2y$10$DjXPj6elI52GNx5jX3K2fehcjQlr9K7Yxwa/Y44aNHCPzNBKTef.W', 'Екатерина', 'eEQmFFKiBZXnvFFrllCRA41rctAyECx1U8Bcs40Wf3rzLa8WX', 1, '2019-09-02 13:56:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Portfolio`
--
ALTER TABLE `Portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Testimonials`
--
ALTER TABLE `Testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Contact`
--
ALTER TABLE `Contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `Portfolio`
--
ALTER TABLE `Portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Testimonials`
--
ALTER TABLE `Testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
