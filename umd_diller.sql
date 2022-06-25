-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 25 2022 г., 18:26
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `umd_diller`
--

-- --------------------------------------------------------

--
-- Структура таблицы `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contracgen_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `responsible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` bigint(20) NOT NULL,
  `number` bigint(20) NOT NULL,
  `inn` bigint(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `contracgen_name`, `leader`, `alternative_name`, `status`, `responsible`, `code`, `number`, `inn`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Asosiy', 'asosiy', 'Bunyod', 'asosiy', 1, 'Bunyod', 1, 1, 123456789, 998999670395, '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `income`
--

CREATE TABLE `income` (
  `id` bigint(20) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `income_products`
--

CREATE TABLE `income_products` (
  `id` bigint(20) NOT NULL,
  `income_id` bigint(20) NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  `box` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `amout` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `income_status`
--

CREATE TABLE `income_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `loc_district`
--

CREATE TABLE `loc_district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tumanlar';

--
-- Дамп данных таблицы `loc_district`
--

INSERT INTO `loc_district` (`id`, `name`, `region_id`) VALUES
(1, 'Урганч тумани', 12),
(2, 'Боғот тумани', 12),
(3, 'Гурлан тумани', 12),
(4, 'Қўшкўпир тумани', 12),
(5, 'Хазорасп тумани', 12),
(6, 'Хива тумани', 12),
(7, 'Хонқа тумани', 12),
(8, 'Шовот тумани', 12),
(9, 'Янгиариқ тумани', 12),
(10, 'Янгибозор тумани', 12),
(11, 'Урганч шахри', 12),
(12, 'Андижон шахри', 1),
(13, 'Андижон тумани', 1),
(14, 'Асака шахри', 1),
(15, 'Асака тумани', 1),
(16, 'Балиқчи тумани', 1),
(17, 'Бўз тумани', 1),
(18, 'Булоқбоши тумани', 1),
(19, 'Избоскан тумани', 1),
(20, 'Жалалқудуқ тумани', 1),
(21, 'Қорасув тумани', 1),
(22, 'Мархамат тумани', 1),
(23, 'Олтинкўл тумани', 1),
(24, 'Пахтаобод тумани', 1),
(25, 'Қўрғонтепа тумани', 1),
(26, 'Шахрихон тумани', 1),
(27, 'Улуғнор тумани', 1),
(28, 'Хонобод тумани', 1),
(29, 'Хўжаобод тумани', 1),
(30, 'Амударё тумани', 14),
(31, 'Беруний тумани', 14),
(32, 'Чимбой тумани', 14),
(33, 'Элликқалъа тумани', 14),
(34, 'Кегейли тумани', 14),
(35, 'Мўйноқ тумани', 14),
(36, 'Нукус шахри', 14),
(37, 'Нукус тумани', 14),
(38, 'Қонликўл тумани', 14),
(39, 'Қораўзак тумани', 14),
(40, 'Қўнғирот тумани', 14),
(41, 'Шуманай тумани', 14),
(42, 'Тахиатош тумани', 14),
(43, 'Тахтакўпир тумани', 14),
(44, 'Тўрткўл тумани', 14),
(45, 'Хўжайли тумани', 14),
(46, 'Бухоро шахри', 2),
(47, 'Бухоро тумани', 2),
(48, 'Ғиждувон тумани', 2),
(49, 'Жондор тумани', 2),
(50, 'Қогон шахри', 2),
(51, 'Когон тумани', 2),
(52, 'Олот тумани', 2),
(53, 'Пешку тумани', 2),
(54, 'Қоракўл тумани', 2),
(55, 'Қоровулбозор тумани', 2),
(56, 'Ромитан тумани', 2),
(57, 'Шофиркон тумани', 2),
(58, 'Вобкент тумани', 2),
(59, 'Кармана тумани', 4),
(60, 'Конимех тумани', 4),
(61, 'Навбахор тумани', 4),
(62, 'Навоий шахри', 4),
(63, 'Навоий тумани', 4),
(64, 'Қизилтепа тумани', 4),
(65, 'Томди тумани', 4),
(66, 'Учқудуқ тумани', 4),
(67, 'Хатирчи тумани', 4),
(68, 'Зарафшон тумани', 4),
(69, 'Булунғур тумани', 6),
(70, 'Иштихон тумани', 6),
(71, 'Жонбой тумани', 6),
(72, 'Каттақўрғон шахри', 6),
(73, 'Kattaqo`rg`on тумани', 6),
(74, 'Нарпай тумани', 6),
(75, 'Нуробод тумани', 6),
(76, 'Оқдарё тумани', 6),
(77, 'Паст-Дарғон тумани', 6),
(78, 'Пахтачи тумани', 6),
(79, 'Пояриқ тумани', 6),
(80, 'Қўшрабод тумани', 6),
(81, 'Самарқанд шахри', 6),
(82, 'Самарқанд тумани', 6),
(83, 'Тойлоқ тумани', 6),
(84, 'Ургут тумани', 6),
(85, 'Арнасой тумани', 3),
(86, 'Бахмал тумани', 3),
(87, 'Дўстлик тумани', 3),
(88, 'Фориш тумани', 3),
(89, 'Ғаллаорол тумани', 3),
(90, 'Жиззах шахри', 3),
(91, 'Жиззах тумани', 3),
(92, 'Мирзачўл тумани', 3),
(93, 'Пахтакор тумани', 3),
(94, 'Янгиобод тумани', 3),
(95, 'Зафаробод тумани', 3),
(96, 'Зарбдор тумани', 3),
(97, 'Зомин тумани', 3),
(98, 'Боёвут тумани', 7),
(99, 'Гулистон шахри', 7),
(100, 'Гулистон тумани', 7),
(101, 'Мирзаобод тумани', 7),
(102, 'Оқолтин тумани', 7),
(103, 'Сардоба тумани', 7),
(104, 'Сайхунобод тумани', 7),
(105, 'Ширин тумани', 7),
(106, 'Сирдарё тумани', 7),
(107, 'Ховос тумани', 7),
(108, 'Янгиер тумани', 7),
(109, 'Бектемир тумани', 9),
(110, 'Чилонзор тумани', 9),
(111, 'Миробод тумани', 9),
(112, 'Мирзо Улуғбек тумани', 9),
(113, 'Шайхонтохур тумани', 9),
(114, 'Сирғали тумани', 9),
(115, 'Олмазор тумани', 9),
(116, 'Уч тепа тумани', 9),
(117, 'Хамза тумани', 9),
(118, 'Яккасарой тумани', 9),
(119, 'Юнусобод тумани', 9),
(120, 'Ангрен тумани', 10),
(121, 'Бекобод шахри', 10),
(122, 'Бекобод тумани', 10),
(123, 'Бўка тумани', 10),
(124, 'Бўстонлиқ тумани', 10),
(125, 'Чиноз тумани', 10),
(126, 'Чирчиқ тумани', 10),
(127, 'Охангарон тумани', 10),
(128, 'Олмалиқ тумани', 10),
(129, 'Оққўрғон тумани', 10),
(130, 'Охангарон тумани', 10),
(131, 'Ўрта чирчиқ тумани', 10),
(132, 'Паркент тумани', 10),
(133, 'Пскент тумани', 10),
(134, 'Қибрай тумани', 10),
(135, 'Қуйи чирчиқ тумани', 10),
(136, 'Тошкент шахри', 10),
(137, 'Янгийўл шахри', 10),
(138, 'Янгийўл тумани', 10),
(139, 'Юқори Чирчиқ тумани', 10),
(140, 'Зангиота тумани', 10),
(141, 'Дехқонобод тумани', 13),
(142, 'Ғузор тумани', 13),
(143, 'Касби тумани', 13),
(144, 'Китоб тумани', 13),
(145, 'Косон тумани', 13),
(146, 'Миришкор тумани', 13),
(147, 'Муборак тумани', 13),
(148, 'Нишон тумани', 13),
(149, 'Қамаши тумани', 13),
(150, 'Қарши шахри', 13),
(151, 'Қарши тумани', 13),
(152, 'Шахрисабз тумани', 13),
(153, 'Яккабоғ тумани', 13),
(154, 'Ангор тумани', 8),
(155, 'Бандихон тумани', 8),
(156, 'Бойсун тумани', 8),
(157, 'Денов тумани', 8),
(158, 'Жарқўрғон тумани', 8),
(159, 'Музрабод тумани', 8),
(160, 'Олтинсой тумани', 8),
(161, 'Қизириқ тумани', 8),
(162, 'Қумқўрғон тумани', 8),
(163, 'Сариосиё тумани', 8),
(164, 'Шеробод тумани', 8),
(165, 'Шўрчи тумани', 8),
(166, 'Термиз шахри', 8),
(167, 'Термиз тумани', 8),
(168, 'Узун тумани', 8),
(169, 'Чортоқ тумани', 5),
(170, 'Чуст тумани', 5),
(171, 'Қосонсой тумани', 5),
(172, 'Мингбулоқ тумани', 5),
(173, 'Наманган шахри', 5),
(174, 'Наманган тумани', 5),
(175, 'Норин тумани', 5),
(176, 'Поп тумани', 5),
(177, 'Тўрақўрғон тумани', 5),
(178, 'Учқўрғон тумани', 5),
(179, 'Уйчи тумани', 5),
(180, 'Янгиқўрғон тумани', 5),
(181, 'Бешариқ тумани', 11),
(182, 'Боғдод тумани', 11),
(183, 'Бувайда тумани', 11),
(184, 'Данғара тумани', 11),
(185, 'Фарғона шахри', 11),
(186, 'Фарғона тумани', 11),
(187, 'Қува тумани', 11),
(188, 'Марғилон тумани', 11),
(189, 'Олтиариқ тумани', 11),
(190, 'Охунбобоев тумани', 11),
(191, 'Ўзбекистон тумани', 11),
(192, 'Қўқон тумани', 11),
(193, 'Қувасой тумани', 11),
(194, 'Риштон тумани', 11),
(195, 'Сух тумани', 11),
(196, 'Тошлоқ тумани', 11),
(197, 'Ёзёвон тумани', 11),
(198, 'Учкўприк тумани', 11),
(199, 'Тупроққалъа тумани', 12),
(200, 'Хива шаҳар', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `loc_region`
--

CREATE TABLE `loc_region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Viloyatlar';

--
-- Дамп данных таблицы `loc_region`
--

INSERT INTO `loc_region` (`id`, `name`) VALUES
(1, 'Андижон вилояти'),
(2, 'Бухоро вилояти'),
(3, 'Жиззах вилояти'),
(4, 'Навоий вилояти'),
(5, 'Наманган вилояти'),
(6, 'Самарқанд вилояти'),
(7, 'Сирдарё вилояти'),
(8, 'Сурхондарё вилояти'),
(9, 'Тошкент шахар'),
(10, 'Тошкент вилояти'),
(11, 'Фарғона вилояти'),
(12, 'Хоразм вилояти'),
(13, 'Қашқадарё вилояти'),
(14, 'Қорақалпоғистон Республикаси');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_num` bigint(20) DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `box` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand` int(10) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sale` int(11) NOT NULL DEFAULT 1,
  `status_id` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `url`) VALUES
(4, 'admin', '/admin/'),
(3, 'Buxgalter', '/bux/'),
(1, 'Kuriyer', '/api/'),
(6, 'Mehmon', '/site/index/'),
(2, 'Omborxona', '/store/'),
(5, 'Superadmin', '/cp/');

-- --------------------------------------------------------

--
-- Структура таблицы `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `oked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `okonx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `buxgalter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_bux` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nds_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 10,
  `auth_key` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `created`, `updated`, `role_id`, `status`, `auth_key`, `verification_token`, `password_reset_token`, `branch_id`) VALUES
(3, 'superAdmin', 'super', '1234', NULL, '2022-06-06 17:22:11', '2022-06-06 17:22:11', 4, 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `is_full` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='skladlar';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_income_user_id` (`user_id`),
  ADD KEY `FK_income_supplier_id` (`supplier_id`),
  ADD KEY `FK_income_status_id` (`status_id`),
  ADD KEY `FK_income_warehouse_id` (`warehouse_id`);

--
-- Индексы таблицы `income_products`
--
ALTER TABLE `income_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_income_products_product_id` (`product_id`),
  ADD KEY `FK_income_products_income_id` (`income_id`);

--
-- Индексы таблицы `income_status`
--
ALTER TABLE `income_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `loc_district`
--
ALTER TABLE `loc_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_district_region_id` (`region_id`);

--
-- Индексы таблицы `loc_region`
--
ALTER TABLE `loc_region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`url`);

--
-- Индексы таблицы `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_sklad_id_foreign` (`role_id`),
  ADD KEY `FK_users_branch_id` (`branch_id`);

--
-- Индексы таблицы `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_warehouse_branch_id` (`branch_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `income`
--
ALTER TABLE `income`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `income_products`
--
ALTER TABLE `income_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `income_status`
--
ALTER TABLE `income_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `loc_district`
--
ALTER TABLE `loc_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT для таблицы `loc_region`
--
ALTER TABLE `loc_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `FK_income_status_id` FOREIGN KEY (`status_id`) REFERENCES `income_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_income_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_income_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_income_warehouse_id` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `income_products`
--
ALTER TABLE `income_products`
  ADD CONSTRAINT `FK_income_products_income_id` FOREIGN KEY (`income_id`) REFERENCES `income` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_income_products_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `loc_district`
--
ALTER TABLE `loc_district`
  ADD CONSTRAINT `FK_district_region_id` FOREIGN KEY (`region_id`) REFERENCES `loc_region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `FK_product_images_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_sklad_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `FK_warehouse_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
