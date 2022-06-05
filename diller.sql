--
-- Скрипт сгенерирован Devart dbForge Studio 2020 for MySQL, Версия 9.0.338.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 05.06.2022 19:13:57
-- Версия сервера: 10.4.24
-- Версия клиента: 4.1
--


SET NAMES 'utf8';




INSERT INTO sklad.migrations(id, migration, batch) VALUES
(1, '2013_05_26_200152_create_branches_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_20_181403_create_suppliers_table', 1),
(7, '2022_05_22_15470_create_categories_table', 1),
(8, '2022_05_22_180451_create_products_table', 1),
(9, '2022_05_23_201819_create_orders_table', 1),
(10, '2022_05_23_202917_create_order_products_table', 1),
(11, '2022_05_23_204200_create_product_images_table', 1),
(12, '2022_06_01_051148_create_permission_tables', 1);



INSERT INTO sklad.model_has_roles(role_id, model_type, model_id) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2);









INSERT INTO sklad.roles(id, name, guard_name, created_at, updated_at) VALUES
(1, 'admin', 'web', '2022-06-05 12:42:55', '2022-06-05 12:42:55'),
(2, 'bugalter', 'web', '2022-06-05 12:42:55', '2022-06-05 12:42:55'),
(3, 'sklad', 'web', '2022-06-05 12:42:55', '2022-06-05 12:42:55');




INSERT INTO sklad.users(id, name, email, email_verified_at, password, remember_token, created_at, updated_at, sklad_id) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$1qQaTsFB7R.qw6fvkujS8uQbnAR33Hidi31jbEHdiusmPsOZU//jG', NULL, '2022-06-05 12:42:55', '2022-06-05 12:42:55', NULL),
(2, 'sklad', 'admin@gmail.com', NULL, '$2y$10$tbE1l4TAsHDMMkusroYQmO2WbJI1W.W6/yggBAGmjMaC.RtZxs96e', NULL, '2022-06-05 12:42:55', '2022-06-05 12:42:55', NULL);