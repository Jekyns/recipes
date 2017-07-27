-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2017 г., 19:10
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
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
    `id` int(255) NOT NULL, 
    `user_id` int(255) NOT NULL, 
    `dish` varchar(255) NOT NULL, 
    `ingredients`varchar(255) NOT NULL, 
    `recipe` text NOT NULL, 
    `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`dish`, `recipe`, `id`, `user_id`) VALUES
('dish', 'recipes', 1, 1),
('Chicken with Artichokes', 'Directions\r\nRinse chicken; pat dry with paper towels. Sprinkle chicken pieces with salt and pepper. Using scissors, cut dried tomatoes into thin strips. Set aside.\r\nIn a large skillet cook mushrooms, leek or onion, garlic, and dried rosemary (if using) in hot oil until leek is tender. Remove with slotted spoon; set aside. Add chicken pieces to the skillet and cook over medium heat for 10 minutes, turning to brown evenly. Add tomatoes, leek mixture, broth, lemon peel, and lemon juice to the skillet. Bring to boiling; reduce heat. Cover and simmer for 20 minutes.\r\nMeanwhile, thaw artichoke hearts under cold water just enough to separate them. Drain. Halve any large artichokes. Add to skillet along with fresh rosemary (if using). Return to boiling; reduce heat. Cover and simmer for 10 to 15 minutes or until chicken is tender and no longer pink. To serve, transfer chicken and vegetables to a serving platter. If desired, garnish with lemon wedges and additional fresh rosemary. Makes 4 servings.', 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
