-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Июн 26 2025 г., 01:50
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
(19, 14, 'awdawd', '+79581678587', 'в работе', '2025-05-31 03:07:00', 'Берёза', NULL, 'банковская карта', 2),
(21, 15, 'Дачная 55', '+79009182652', 'в работе', '2025-06-27 01:50:00', 'Дуб', NULL, 'банковская карта', 8),
(22, 6, 'Архангельская область, г. Северодвинск, ул. Макаренко, д. 16, к. 22', '+79009205567', 'в работе', '2025-06-27 03:24:00', 'Берёза', NULL, 'банковская карта', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int NOT NULL,
  `id_user` int NOT NULL,
  `text` text NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'на рассмотрении',
  `mark` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id_reviews`, `id_user`, `text`, `status`, `mark`) VALUES
(4, 14, 'Отличная компания!', 'одобрен', 5),
(5, 15, 'Хорошая компания, заказывал берёзу, привезли быстро!', 'одобрен', 5),
(6, 16, 'Мне понравилась компания, только бы чуток побыстрее!', 'одобрен', 4),
(7, 17, 'Медленно, но всё хорошо.', 'одобрен', 3),
(8, 18, '', 'одобрен', 5),
(9, 19, 'Вполне хорошо!', 'одобрен', 4),
(10, 20, 'На троечку потянет', 'одобрен', 3),
(11, 21, 'Всё на высшем уровне! Ребята молодцы!', 'одобрен', 5);

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
(14, 'cybiran', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79581678587', 'cybiran_ez@mail.ru', 'Даниил'),
(15, 'user', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79581638587', 'cybiran@mail.ru', 'ДАниил'),
(16, 'user2', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79009023443', 'bafonoff@mail.ru', 'Бафонов Виктор Валерьевич'),
(17, 'user3', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79009132547', 'cybiran1234@mail.ru', 'Олегович Андрей Балконский'),
(18, 'user4', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79009009223', 'cyir@mail.ru', 'Коваленко Дмитрий Валентинович'),
(19, 'user5', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79675463733', 'kai@mail.ru', 'Манилов Виктор Алексеевич'),
(20, 'user6', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79009182555', 'kaiw@mail.ru', 'Конюхов Валентин Игоревич'),
(21, 'user7', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', '+79009009900', 'keia@mail.ru', 'Брюхов Константин Семёнович');

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
(8, 'Сосна'),
(9, 'Берёза'),
(12, 'Дуб');

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
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_application` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `wood`
--
ALTER TABLE `wood`
  MODIFY `id_wood` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
