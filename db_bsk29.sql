-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Июн 20 2025 г., 19:19
-- Версия сервера: 8.2.0
-- Версия PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_bsk29`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id_application` int NOT NULL,
  `id_user` int NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tel` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'в работе',
  `date` datetime NOT NULL,
  `serviceType` varchar(64) NOT NULL,
  `reason` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id_application`, `id_user`, `address`, `tel`, `status`, `date`, `serviceType`, `reason`, `payment`, `quantity`) VALUES
(18, 14, 'Морской порт 2', '+79000000000', 'выполнена', '2025-04-12 01:27:00', 'Берёза', NULL, 'банковская карта', 4),
(19, 14, 'awdawd', '+79581678587', 'в работе', '2025-05-31 03:07:00', 'Берёза', NULL, 'банковская карта', 2),
(20, 14, 'Дачная 52', '+79581678587', 'в работе', '2025-06-28 23:44:00', 'Берёза', NULL, 'наличные', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `FIO` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `tel`, `email`, `FIO`) VALUES
(6, 'bublic', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '+79009205567', 'pgejmer171@gmail.com', 'Антипов Семён Петрович'),
(7, 'ggsel', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '+79009205567', 'pgejmer171@gmail.com', 'Кудрин Петя Кириллович'),
(8, 'ggsel23', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '+79009205567', 'pgejmer132371@gmail.com', 'Литвин Михаил Кондиционерович'),
(11, 'adminka', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+70000000000', '123@d', 'Админ Админович'),
(12, 'ggsel22', 'a0f5b20694e4247d5bab10ffa573c417a86c1a1989b5d5a9d0b8ef439f7b4caf', '+79009182652', 'ggsel22@mail.ru', 'Даниил Дмитриевич Антонов'),
(13, 'ggsel222', 'fbf6e04c950646054e0333f7a15345eefc7f411dd0bb3a436a12f4bca4592fdb', '+79581678582', 'ggsel222@mail.ru', 'Даниил '),
(14, 'cybiran', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79581678587', 'cybiran_ez@mail.ru', 'Даниил');

-- --------------------------------------------------------

--
-- Структура таблицы `wood`
--

CREATE TABLE `wood` (
  `id_wood` int NOT NULL,
  `wood` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `wood`
--

INSERT INTO `wood` (`id_wood`, `wood`) VALUES
(1, 'Дуб'),
(2, 'Сосна'),
(3, 'Берёза'),
(4, 'Ель');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id_application`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `wood`
--
ALTER TABLE `wood`
  ADD PRIMARY KEY (`id_wood`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id_application` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `wood`
--
ALTER TABLE `wood`
  MODIFY `id_wood` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
