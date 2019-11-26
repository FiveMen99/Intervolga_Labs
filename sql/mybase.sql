-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 27 2019 г., 00:13
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
(28, '03.09.2019', 45, 3, 3);

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
(45, 'Макаренко', 'Никита', 'Степанович', '04А', 'uploads/34_2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `idsub` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`idsub`, `name`) VALUES
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
(19, 'nikita@mail.ru', '$2y$10$T8er7Boc/URE..sBlhyTX.IJg5pGbdpBiUkIkL0PX4Qo0fYjrWxmG', 0),
(20, '123@mail.ru', '$2y$10$ijD4KUSSU0m7yhPEvi2Uwuh21Z8qpJECK3xTKDRryelUqDP/1eB5i', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `idstud` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `idsub` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
