-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2019 г., 22:18
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mybase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `idstud` int(11) UNSIGNED NOT NULL,
  `idsub` int(11) NOT NULL,
  `assessments` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `assessments`
--

INSERT INTO `assessments` (`id`, `date`, `idstud`, `idsub`, `assessments`) VALUES
(40, '11.12.2019', 51, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `namecomandsinsql`
--

CREATE TABLE `namecomandsinsql` (
  `comand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `namecomandsinsql`
--

INSERT INTO `namecomandsinsql` (`comand`) VALUES
('SELECT'),
('DROP'),
('USE'),
('CREATE'),
('SHOW'),
('DESCRIBE'),
('DELETE'),
('ALTER'),
('UPDATE'),
('INSERT'),
('SET'),
('JOIN');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `idstud` int(11) UNSIGNED NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `class` varchar(3) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`idstud`, `surname`, `name`, `lastname`, `class`, `file`) VALUES
(51, 'Никита', 'Макаренко', 'Фапин', '11А', 'uploads/36_13.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `idsub` int(11) UNSIGNED NOT NULL,
  `subname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`idsub`, `subname`) VALUES
(1, 'Математика'),
(2, 'Русский язык'),
(3, 'История');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `isadmin`) VALUES
(16, 'admin@admin.ru', '$2y$10$AxbNkYmGMFiJgI1x9G/8/eJkkWeyLZHiIliWASal4OWU1Wc.CvXpu', 1),
(18, 'laba@mail.ru', '$2y$10$3sl3QEIddpaYJicTj9wrkudEIeU.00YhJgnnr9ptCBAZ6TS1pESve', 0),
(61, 'vk552571102', '', 1),
(64, 'nik@mail.ru', '$2y$10$dHOVW6H3YJ9yqkSCsRDu2Oo7tbS14QF4lnnleWytVnH6Z1frOL7yi', 0),
(65, 'asda@mail.ru', '$2y$10$dBqk5tNG9TODjKk/iRNhaO6S4a.ed0WLZ2Izf7cYvSySC7ZW56SP.', 0),
(66, '135@mail.ru', '$2y$10$F9YVRfh1Ltp9yNTggW9IeebG2FStp67.okTTNAhB3Sj.2HSI3rmFm', 0),
(67, '567@mail.ru', '$2y$10$7wDgTcXCG66yEIFW.YWlEu7Fcm7tpKh4td9wSXKVaS39qlvSoIcwy', 0),
(68, '67890@mail.ru', '$2y$10$msSCQ3IAA/Khiuwe5iCO..fD3fDuFjRBHbrskiR/CyeqCeqd8vBcG', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assessments`
--
ALTER TABLE `assessments`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idstud` (`idstud`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `idstud` (`idstud`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD UNIQUE KEY `idsub` (`idsub`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `idstud` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `idsub` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`idstud`) REFERENCES `students` (`idstud`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
