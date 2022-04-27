-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2022 г., 07:23
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autosalon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bank`
--

CREATE TABLE `bank` (
  `id_bank` int NOT NULL,
  `name_bank` varchar(50) NOT NULL,
  `foto_bank` varchar(30) NOT NULL,
  `opis_bank` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `bank`
--

INSERT INTO `bank` (`id_bank`, `name_bank`, `foto_bank`, `opis_bank`) VALUES
(1, 'Россельхозбанк', 'img/bank/ross.jpg', 'Россельхозбанк — универсальный банк со 100% государственным участием, предоставляющий все виды банковских услуг более чем 7 миллионам розничных и корпоративных клиентов.'),
(2, 'Сбербанк ', 'img/bank/sber.jpg', 'Сбербанк России — российский финансовый конгломерат, крупнейший универсальный банк России и Восточной Европы. По итогам 2019 года у Сбербанка 96,2 млн активных частных клиентов.'),
(3, 'Альфа-банк', 'img/bank/logo-ogp.png', 'Альфа-банк — крупнейший частный банк в России, занимающий четвёртое место по размеру активов. По итогам 2021 года количество частных клиентов выросло до 22 млн, количество корпоративных клиентов превысило 1 млн. В розничном сегменте банк занимает третье место с долей выше 5 %.'),
(4, 'Тиньккоф', 'img/bank/tinkoff.png', 'Тинькофф Банк — полностью онлайн-банк: у него нет собственных отделений. Основной продукт для физических лиц — кредитные и дебетовые карты, а также вклады. Банк также предлагает выпуск кобрендовых карт, целевые кредиты на покупки в обычных и интернет-магазинах..'),
(5, 'Райффайзен', 'img/bank/rayya.jpg', 'Райффайзен банк - работает в России с 1996 года и являемся одним из самых надежных российских банков, который создает финансовые решения для частных и корпоративных клиентов.'),
(6, 'ВТБ-банк', 'img/bank/vvv.jpg', 'Банк ВТБ — российский универсальный коммерческий банк c государственным участием. Является головной структурой Группы ВТБ. Финансовый конгломерат. 60,9 % обыкновенных акций банка.');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `id_color` int NOT NULL,
  `color_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id_color`, `color_name`) VALUES
(1, 'Черный'),
(2, 'Белый'),
(3, 'Красный'),
(4, 'Желтый'),
(5, 'Зеленый'),
(6, 'Серый'),
(7, 'Бежовый'),
(8, 'Оранжовый');

-- --------------------------------------------------------

--
-- Структура таблицы `compilation`
--

CREATE TABLE `compilation` (
  `id_complic` int NOT NULL,
  `compic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `compilation`
--

INSERT INTO `compilation` (`id_complic`, `compic`) VALUES
(1, 'Стандарт'),
(2, 'Универсал'),
(3, 'Средняя'),
(4, 'Ограниченная серия'),
(5, 'Акционная');

-- --------------------------------------------------------

--
-- Структура таблицы `dogovor`
--

CREATE TABLE `dogovor` (
  `id_dogovor` int NOT NULL,
  `klient_id` int NOT NULL,
  `worker_id` int NOT NULL,
  `data` int NOT NULL,
  `filial_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `filial`
--

CREATE TABLE `filial` (
  `id_filial` int NOT NULL,
  `reg_number` int NOT NULL,
  `name_filial` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adrec_filial` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_filial` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `filial`
--

INSERT INTO `filial` (`id_filial`, `reg_number`, `name_filial`, `adrec_filial`, `phone_filial`) VALUES
(1, 234001, 'Челябинск-Motors', 'ул. Воровского 2', 87928234),
(2, 454002, 'Motors-Берлог', 'ул. Капейский, д. 11', 87743225),
(3, 454004, 'Урал Инвест', 'ул. Гагарина 7', 87987895),
(4, 454003, 'Motors-Зарубеж', 'ул. Барбюса 269', 87896567),
(5, 123542, 'Челябинск-Урал', 'ул. Лизы Чайкиной', 87655673);

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE `klient` (
  `id_klient` int NOT NULL,
  `name_klient` varchar(25) NOT NULL,
  `lastname_klient` varchar(30) NOT NULL,
  `papaname_klient` varchar(25) NOT NULL,
  `vid_lica_id` int NOT NULL,
  `bank_id` int NOT NULL,
  `numer_schet` int NOT NULL,
  `data_klient` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `kuzov`
--

CREATE TABLE `kuzov` (
  `id_kuzov` int NOT NULL,
  `kuzov_name` varchar(50) NOT NULL,
  `foto_kuzov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kuzov`
--

INSERT INTO `kuzov` (`id_kuzov`, `kuzov_name`, `foto_kuzov`) VALUES
(1, 'Хэтчбек', 'img/ikonki/xetch.png'),
(2, 'Седан', 'img/ikonki/sedan.png'),
(3, 'Внедорожный', 'img/ikonki/vned.png'),
(4, 'Купе', 'img/ikonki/kupe.png'),
(5, 'Кабриолет', 'img/ikonki/kabr.png'),
(6, 'Кроссовер', 'img/ikonki/vned.png');

-- --------------------------------------------------------

--
-- Структура таблицы `marka`
--

CREATE TABLE `marka` (
  `id_marka` int NOT NULL,
  `marka_name` varchar(40) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `marka`
--

INSERT INTO `marka` (`id_marka`, `marka_name`, `image`) VALUES
(1, 'Mercedes-Benz', 'img/logo/merc.png'),
(2, 'Porsche', 'img/logo/porsche.png'),
(3, 'Audi', 'img/logo/audii.png'),
(4, 'Ferrari', 'img/logo/ferrari.png'),
(5, 'Tesla', 'img/logo/tesla.png'),
(6, 'Rolls Royce', 'img/logo/rolls.png');

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id_model` int NOT NULL,
  `model_name` varchar(40) NOT NULL,
  `privod_id` int NOT NULL,
  `price` int NOT NULL,
  `obiom_dvig` double NOT NULL,
  `moshnost` int NOT NULL,
  `karob` varchar(20) NOT NULL DEFAULT 'Автомат',
  `karob` int NOT NULL,
  `year` int NOT NULL,
  `probeg` int NOT NULL,
  `kuzov_id` int NOT NULL,
  `color_id` int NOT NULL,
  `foto_model` varchar(30) NOT NULL,
  `foto_model2` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_model3` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto_model4` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id_model`, `model_name`, `privod_id`, `price`, `obiom_dvig`, `moshnost`, `karob`, `marka_id`, `year`, `probeg`, `kuzov_id`, `color_id`, `foto_model`, `foto_model2`, `foto_model3`, `foto_model4`) VALUES
(1, 'G-class', 3, 298200, 6.3, 900, 'Автомат', 1, 2021, 44, 3, 6, 'img/merc/gelik_1.jpg', 'img/merc/gelik_2.jpg', 'img/merc/gelik_3.jpg', 'img/merc/gelik_4.jpg'),
(2, 'AMG GT 4.0 AT 63 S 4MATIC ', 3, 144888, 4.2, 639, 'Автомат', 1, 2019, 25794, 2, 6, 'img/merc/gt_1.jpg', 'img/merc/gt_2.jpg', 'img/merc/gt_3.jpg', 'img/merc/gt_4.jpg'),
(3, 'E-class AMG E 63 S', 1, 92888, 3.5, 256, 'Автомат', 1, 2018, 17962, 2, 2, 'img/merc/e_1.jpg', 'img/merc/e_2.jpg', 'img/merc/e_3.jpg', 'img/merc/e_4.jpg'),
(4, 'R8', 3, 179888, 5.3, 610, 'Автомат', 3, 2017, 18834, 4, 2, 'img/audi/r8_1.jpg', 'img/audi/r8_2.jpg', 'img/audi/r8_3.jpg', 'img/audi/r8_4.jpg'),
(5, 'Model X', 1, 154888, 4.2, 329, 'Автомат', 5, 2022, 3069, 6, 2, 'img/tesla/x_1.jpg', 'img/tesla/x_2.jpg', 'img/tesla/x_3.jpg', 'img/tesla/x_4.jpg'),
(6, '488 GTB - TWO TONE PAINT', 3, 339888, 3.9, 670, 'Автомат', 4, 2019, 1661, 4, 3, 'img/ferrari/488_1.jpg', 'img/ferrari/488_2.jpg', 'img/ferrari/488_3.jpg', 'img/ferrari/488_4.jpg'),
(7, 'Portofino', 1, 254888, 3.9, 600, 'Автомат', 4, 2019, 8310, 5, 2, 'img/ferrari/portofino_1.jpg', 'img/ferrari/portofino_2.jpg', 'img/ferrari/portofino_3.jpg', 'img/ferrari/portofino_4.jpg'),
(8, 'S-Class AMG S 63', 3, 119888, 5.5, 547, 'Автомат', 1, 2017, 16553, 5, 2, 'img/merc/s_1.jpg', 'img/merc/s_2.jpg', 'img/merc/s_3.jpg', 'img/merc/s_4.jpg'),
(9, 'Panamera GTS', 3, 142888, 4.2, 456, 'Автомат', 2, 2020, 1096, 1, 6, 'img/porsche/pan_1.jpg', 'img/porsche/pan_2.jpg', 'img/porsche/pan_3.jpg', 'img/porsche/pan_4.jpg'),
(10, 'Ghost', 3, 419777, 6.6, 571, 'Автомат', 6, 2021, 944, 2, 1, 'img/rolls/gh_1.jpg', 'img/rolls/gh_2.jpg', 'img/rolls/gh_3.jpg', 'img/rolls/gh_4.jpg'),
(11, '911 GT3 RS - WEISSACH PACKAGE', 3, 269888, 4.2, 538, 'Автомат', 2, 2019, 10998, 4, 4, 'img/porsche/911_1.jpg', 'img/porsche/911_2.jpg', 'img/porsche/911_3.jpg', 'img/porsche/911_4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `opisanie`
--

CREATE TABLE `opisanie` (
  `id_opisan` int NOT NULL,
  `name_opisan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `opisanie`
--

INSERT INTO `opisanie` (`id_opisan`, `name_opisan`) VALUES
(1, 'Открытие собственного бизнеса по продаже автомобилей (автосалона) может принести хорошую прибыль при грамотном управлении. Этому соответствует ряд факторов. Во-первых, несмотря, на снижающийся экономический рост и падение платежеспособности населения, люди всегда приобретают новые автомобили. Во-вторых, в настоящее время большинство автосалонов закрывается после прошедшего кризиса в 2014-2016. Это открывает большую долю рынка, которую могут занять новые игроки и дилеры. Данные факторы отражаются в сроке окупаемости проекта который составляет 19 месяцев, точка безубыточности приходится на 2 месяц работы автосалона.'),
(2, 'Для реализации данного проекта первоначально потребуется приобрести собственный земельный участок и построить здание. Искать земельный участок необходимо вдоль крупных городских дорожных магистралей и на улицах с высокой автомобильной пропускной способностью. Таким образом, площадь земельного участка, учитывая склад для автомобилей, составляет 100 соток, площадь автомобильного салона — 700 м2. Помимо строительства здания необходимо нанять в штат 24 специалиста.'),
(3, 'Первоначально можно стать дилером одного производителя, но для повышения прибыльности предприятия можно выбрать несколько и продавать автомобили нескольких марок. Для подачи и рассмотрения заявки дилерам подготовьте бизнес-план и финансовую модель вашего автосалона. Также в начале деятельности лучше сотрудничать с российскими импортерами или производителями, так как автомобили находятся на территории РФ и официально растаможены. Далее можно самим искать производителей за рубежом и завозить автомобили самостоятельно');

-- --------------------------------------------------------

--
-- Структура таблицы `pokupka`
--

CREATE TABLE `pokupka` (
  `id_pokupki` int NOT NULL,
  `model_id` int NOT NULL,
  `kolich_pokupki` int NOT NULL,
  `compilat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `privod`
--

CREATE TABLE `privod` (
  `id_privod` int NOT NULL,
  `privod_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `privod`
--

INSERT INTO `privod` (`id_privod`, `privod_name`) VALUES
(1, 'Задний привод'),
(2, 'Передний привод'),
(3, 'Полный привод');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(5) DEFAULT 'user',
  `picture` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `first_name`, `last_name`, `birthdate`, `join_date`, `email`, `gender`, `city`, `state`, `password`, `rol`, `picture`) VALUES
(1, 'admin', '', '', NULL, NULL, 'admin@mail.ru', NULL, '', '', '$2y$10$k5BBUhfmGHSKl2DoCxGuJOnglU6moz030BsaHgIIlG8P3mBtarXwq', 'admin', ''),
(2, 'manvelka', '', '', NULL, NULL, 'kroyan.m.89@gmail.com', NULL, '', '', '$2y$10$to8ZZs/pkMgEocP2f9ixFu0Wrh5dQqChnipDABdYob5DvFrb97IWq', 'user', '');

-- --------------------------------------------------------

--
-- Структура таблицы `type_face`
--

CREATE TABLE `type_face` (
  `id_typeface` int NOT NULL,
  `face` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `type_face`
--

INSERT INTO `type_face` (`id_typeface`, `face`) VALUES
(1, 'Физическое'),
(2, 'Юридическое');

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id_work` int NOT NULL,
  `work_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `worker`
--

CREATE TABLE `worker` (
  `id_worker` int NOT NULL,
  `lastname_worker` varchar(30) NOT NULL,
  `name_worker` varchar(30) NOT NULL,
  `papaname_worker` varchar(30) NOT NULL,
  `phone_worker` varchar(15) NOT NULL,
  `adrec_worker` varchar(40) NOT NULL,
  `work_id` int NOT NULL,
  `foto_worker` varchar(30) NOT NULL,
  `year_worker` int NOT NULL,
  `data_plus_worker` int NOT NULL,
  `data_minus_worker` int NOT NULL,
  `worker_filial_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Индексы таблицы `compilation`
--
ALTER TABLE `compilation`
  ADD PRIMARY KEY (`id_complic`);

--
-- Индексы таблицы `dogovor`
--
ALTER TABLE `dogovor`
  ADD PRIMARY KEY (`id_dogovor`),
  ADD KEY `id_branch` (`filial_id`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `worker` (`worker_id`);

--
-- Индексы таблицы `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`);

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`),
  ADD KEY `vid_lica_id` (`vid_lica_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Индексы таблицы `kuzov`
--
ALTER TABLE `kuzov`
  ADD PRIMARY KEY (`id_kuzov`);

--
-- Индексы таблицы `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marka`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `privod_id` (`privod_id`),
  ADD KEY `marka_id` (`marka_id`),
  ADD KEY `kuzov_id` (`kuzov_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Индексы таблицы `pokupka`
--
ALTER TABLE `pokupka`
  ADD PRIMARY KEY (`id_pokupki`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `compilat_id` (`compilat_id`);

--
-- Индексы таблицы `privod`
--
ALTER TABLE `privod`
  ADD PRIMARY KEY (`id_privod`);

--
-- Индексы таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `type_face`
--
ALTER TABLE `type_face`
  ADD PRIMARY KEY (`id_typeface`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id_work`);

--
-- Индексы таблицы `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_worker`),
  ADD KEY `work_worker` (`work_id`),
  ADD KEY `treaty_id` (`worker_filial_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `compilation`
--
ALTER TABLE `compilation`
  MODIFY `id_complic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dogovor`
--
ALTER TABLE `dogovor`
  MODIFY `id_dogovor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kuzov`
--
ALTER TABLE `kuzov`
  MODIFY `id_kuzov` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marka` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `pokupka`
--
ALTER TABLE `pokupka`
  MODIFY `id_pokupki` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `privod`
--
ALTER TABLE `privod`
  MODIFY `id_privod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_face`
--
ALTER TABLE `type_face`
  MODIFY `id_typeface` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id_work` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `worker`
--
ALTER TABLE `worker`
  MODIFY `id_worker` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dogovor`
--
ALTER TABLE `dogovor`
  ADD CONSTRAINT `dogovor_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id_klient`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dogovor_ibfk_2` FOREIGN KEY (`filial_id`) REFERENCES `filial` (`id_filial`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dogovor_ibfk_3` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id_worker`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `klient`
--
ALTER TABLE `klient`
  ADD CONSTRAINT `klient_ibfk_1` FOREIGN KEY (`vid_lica_id`) REFERENCES `type_face` (`id_typeface`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `klient_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id_bank`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`id_marka`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`kuzov_id`) REFERENCES `kuzov` (`id_kuzov`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_ibfk_3` FOREIGN KEY (`privod_id`) REFERENCES `privod` (`id_privod`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_ibfk_4` FOREIGN KEY (`color_id`) REFERENCES `color` (`id_color`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `pokupka`
--
ALTER TABLE `pokupka`
  ADD CONSTRAINT `pokupka_ibfk_1` FOREIGN KEY (`id_pokupki`) REFERENCES `dogovor` (`id_dogovor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pokupka_ibfk_2` FOREIGN KEY (`compilat_id`) REFERENCES `compilation` (`id_complic`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pokupka_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `model` (`id_model`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `work` (`id_work`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `worker_ibfk_2` FOREIGN KEY (`worker_filial_id`) REFERENCES `filial` (`id_filial`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
