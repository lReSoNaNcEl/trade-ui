-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2019 г., 19:27
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `business`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flat`
--

CREATE TABLE `flat` (
  `id` int(11) NOT NULL,
  `id_house` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `square` varchar(50) NOT NULL,
  `amount_rooms` int(50) NOT NULL,
  `floor` int(50) NOT NULL,
  `price` int(90) NOT NULL,
  `is_sold` varchar(3) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flat`
--

INSERT INTO `flat` (`id`, `id_house`, `number`, `square`, `amount_rooms`, `floor`, `price`, `is_sold`, `street`) VALUES
(14, 12, '63', '75', 4, 7, 3100000, 'no', 'Балмочных'),
(15, 38, '24', '35', 2, 8, 1650000, 'no', 'Кривенкова'),
(16, 12, '65', '35', 3, 8, 990000, 'no', 'Полиграфическая'),
(17, 19, '36', '56', 2, 5, 2350000, 'no', 'Коммустическая'),
(18, 41, '28', '48', 2, 6, 1900000, 'no', 'Октябрьская'),
(19, 19, '32', '46', 2, 4, 1500000, 'no', 'Коммустическая'),
(20, 17, '34', '43', 2, 7, 1150000, 'yes', 'Пионерская'),
(21, 24, '12', '33', 1, 2, 850000, 'yes', 'Ворошилова'),
(22, 11, '43', '57', 3, 6, 2420000, 'yes', 'Мартовская');

-- --------------------------------------------------------

--
-- Структура таблицы `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `district` varchar(90) NOT NULL,
  `street` varchar(90) NOT NULL,
  `number` int(90) NOT NULL,
  `amount_floors` int(10) NOT NULL,
  `brick_panel` varchar(1) NOT NULL,
  `is_elevator` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `house`
--

INSERT INTO `house` (`id`, `district`, `street`, `number`, `amount_floors`, `brick_panel`, `is_elevator`) VALUES
(29, 'Правобережный', 'Баженова', 23, 6, 'P', 'no'),
(30, 'Левобережный', 'Балмочных', 12, 10, 'B', 'yes'),
(31, 'Советский', 'Ворошилова', 24, 12, 'P', 'yes'),
(32, 'Левобережный', 'Интернациональная', 10, 13, 'P', 'yes'),
(33, 'Советский', 'Коммунистическая', 19, 4, 'P', 'no'),
(34, 'Левобережный', 'Космонавтов', 15, 8, 'B', 'no'),
(35, 'Левобережный', 'Кривенкова', 38, 9, 'B', 'yes'),
(36, 'Правобережный', 'Лебединая', 7, 8, 'P', 'yes'),
(37, 'Левобережный', 'Мартовская', 11, 9, 'P', 'yes'),
(38, 'Правобережный', 'Московская', 84, 14, 'P', 'yes'),
(39, 'Советский', 'Октябрьская', 41, 7, 'B', 'no'),
(40, 'Правобережный', 'Пионерская', 17, 5, 'B', 'no'),
(41, 'Октябрьский', 'Полиграфическая', 12, 15, 'P', 'yes'),
(42, 'Советский', 'Политехническая', 24, 9, 'B', 'yes'),
(43, 'Левобережный', 'Профсоюзная', 31, 9, 'B', 'yes'),
(44, 'Правобережный', 'Студеновская', 34, 8, 'B', 'no');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `amount_rooms` int(50) NOT NULL,
  `date` varchar(90) NOT NULL,
  `district` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `fio`, `passport`, `phone`, `amount_rooms`, `date`, `district`) VALUES
(10, 'Иванов Пётр Сергеевич', '4565 456654', '89802345643', 3, '2019-12-17 23:33:30', 'Левобережный'),
(12, 'Суворин Андрей Павлович', '4564 456544', '89704563456', 3, '2019-12-18 09:05:50', 'Октябрьский'),
(13, 'Палюлин Владмир Давидович', '4567 654564', '89654573475', 4, '2019-12-18 09:06:21', 'Правобережный'),
(14, 'Белявский Сергей Петрович', '5675 567435', '89735475676', 2, '2019-12-18 09:07:25', 'Советский'),
(15, 'Иранков Николай Иванович', '5678 566747', '89544523668', 2, '2019-12-18 09:08:12', 'Левобережный'),
(16, 'Песцов Петр Александрович', '4653 654693', '89674573440', 3, '2019-12-18 09:08:50', 'Правобережный'),
(17, 'Никитаева Василиса Алексеевна', '4345 543632', '89605674506', 3, '2019-12-18 09:09:27', 'Октябрьский'),
(18, 'Дружинин Евгений Иванович', '4560 442425', '89502345643', 2, '2019-12-18 09:09:58', 'Правобережный'),
(19, 'Алхимов Александ Сергеевич', '7865 234252', '89402133346', 2, '2019-12-18 09:12:22', 'Правобережный');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id`,`id_house`) USING BTREE,
  ADD KEY `id_house` (`id_house`);

--
-- Индексы таблицы `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `number` (`number`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flat`
--
ALTER TABLE `flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`id_house`) REFERENCES `house` (`number`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
