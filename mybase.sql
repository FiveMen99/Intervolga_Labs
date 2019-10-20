-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 20 2019 г., 20:25
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
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `date` varchar(11) NOT NULL,
  `matematics` int(20) NOT NULL,
  `russich` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`date`, `matematics`, `russich`) VALUES
('01.09.2019', 5, 4),
('02.09.2019', 4, 5),
('03.09.2019', 5, 4),
('04.09.2019', 5, 4),
('05.09.2019', 5, 4),
('06.09.2019', 5, 4),
('07.09.2019', 2, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `class1`
--

CREATE TABLE `class1` (
  `date` varchar(11) NOT NULL,
  `matematics` int(20) NOT NULL,
  `russich` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class1`
--

INSERT INTO `class1` (`date`, `matematics`, `russich`) VALUES
('01.09.2019', 2, 3),
('02.09.2019', 3, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
