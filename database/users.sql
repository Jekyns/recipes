-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2017 г., 12:43
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `avatar` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `email`, `first_name`, `surname`, `gender`, `mobile`, `avatar`, `role`, `id`) VALUES
('Dayle', '2', 'Jekyns@yandex.ru', 'alex', 'kuzn', 'male', '8', '', 3, 1),
('Dayle', '2', 'Jekyns@yandex.ru', 'alex', 'kuzn', 'male', '8', '', 3, 2),
('Dayle', '2', 'Jekyns@yandex.ru', 'alex', 'kuzn', 'male', '8', '', 3, 3),
('Dayle', '123981313', 'Jekyns@yandex.ru', 'alex', 'kuzn', 'male', '8', '', 3, 4),
('admin', '1234', 'Jekyns@yandex.ru', 'Alex', 'Kuznetsov', 'Male', '89281692961', '', 3, 5),
('admin', '1234', 'Jekyns@yandex.ru', 'Alex', 'Kuznetsov', 'Male', '89281692961', '..\\/storage\\/app\\/images\\/8dzQOyfvRp8.jpg', 3, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
