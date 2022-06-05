--
-- Скрипт сгенерирован Devart dbForge Studio 2020 for MySQL, Версия 9.0.338.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 05.06.2022 21:17:24
-- Версия сервера: 10.4.24
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE sklad;

--
-- Удалить таблицу `failed_jobs`
--
DROP TABLE IF EXISTS failed_jobs;

--
-- Удалить таблицу `migrations`
--
DROP TABLE IF EXISTS migrations;

--
-- Удалить таблицу `password_resets`
--
DROP TABLE IF EXISTS password_resets;

--
-- Удалить таблицу `personal_access_tokens`
--
DROP TABLE IF EXISTS personal_access_tokens;

--
-- Удалить таблицу `model_has_permissions`
--
DROP TABLE IF EXISTS model_has_permissions;

--
-- Удалить таблицу `permissions`
--
DROP TABLE IF EXISTS permissions;

--
-- Удалить таблицу `order_products`
--
DROP TABLE IF EXISTS order_products;

--
-- Удалить таблицу `orders`
--
DROP TABLE IF EXISTS orders;

--
-- Удалить таблицу `product_images`
--
DROP TABLE IF EXISTS product_images;

--
-- Удалить таблицу `products`
--
DROP TABLE IF EXISTS products;

--
-- Удалить таблицу `branches`
--
DROP TABLE IF EXISTS branches;

--
-- Удалить таблицу `categories`
--
DROP TABLE IF EXISTS categories;

--
-- Удалить таблицу `suppliers`
--
DROP TABLE IF EXISTS suppliers;

--
-- Удалить таблицу `model_has_roles`
--
DROP TABLE IF EXISTS model_has_roles;

--
-- Удалить таблицу `users`
--
DROP TABLE IF EXISTS users;

--
-- Удалить таблицу `roles`
--
DROP TABLE IF EXISTS roles;

--
-- Установка базы данных по умолчанию
--
USE sklad;

--
-- Создать таблицу `roles`
--
CREATE TABLE roles (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  url varchar(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `roles_name_guard_name_unique` для объекта типа таблица `roles`
--
ALTER TABLE roles
ADD UNIQUE INDEX roles_name_guard_name_unique (name, url);

--
-- Создать таблицу `users`
--
CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at timestamp NULL DEFAULT NULL,
  role_id bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `users_email_unique` для объекта типа таблица `users`
--
ALTER TABLE users
ADD UNIQUE INDEX users_email_unique (email);

--
-- Создать внешний ключ
--
ALTER TABLE users
ADD CONSTRAINT users_sklad_id_foreign FOREIGN KEY (role_id)
REFERENCES roles (id);

--
-- Создать таблицу `model_has_roles`
--
CREATE TABLE model_has_roles (
  role_id bigint(20) UNSIGNED NOT NULL,
  model_type varchar(255) NOT NULL,
  model_id bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (role_id, model_id, model_type)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `model_has_roles_model_id_model_type_index` для объекта типа таблица `model_has_roles`
--
ALTER TABLE model_has_roles
ADD INDEX model_has_roles_model_id_model_type_index (model_id, model_type);

--
-- Создать внешний ключ
--
ALTER TABLE model_has_roles
ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id)
REFERENCES roles (id) ON DELETE CASCADE;

--
-- Создать таблицу `suppliers`
--
CREATE TABLE suppliers (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `categories`
--
CREATE TABLE categories (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `branches`
--
CREATE TABLE branches (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  branch_name varchar(255) NOT NULL,
  contracgen_name varchar(255) NOT NULL,
  leader varchar(255) NOT NULL,
  alternative_name varchar(255) NOT NULL,
  status tinyint(1) NOT NULL,
  responsible varchar(255) NOT NULL,
  code bigint(20) NOT NULL,
  number bigint(20) NOT NULL,
  inn bigint(20) DEFAULT NULL,
  phone bigint(20) DEFAULT NULL,
  address varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `products`
--
CREATE TABLE products (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  box_count int(11) NOT NULL,
  box_size int(11) NOT NULL,
  price_size int(11) NOT NULL,
  price_incoming int(11) NOT NULL,
  suppliers_id bigint(20) UNSIGNED NOT NULL,
  category_id bigint(20) UNSIGNED NOT NULL,
  brand int(10) UNSIGNED NOT NULL,
  description varchar(255) DEFAULT NULL,
  code varchar(255) NOT NULL,
  bio varchar(255) DEFAULT NULL,
  isSale int(11) NOT NULL DEFAULT 1,
  status tinyint(1) NOT NULL DEFAULT 1,
  sklad_id bigint(20) UNSIGNED DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать внешний ключ
--
ALTER TABLE products
ADD CONSTRAINT products_category_id_foreign FOREIGN KEY (category_id)
REFERENCES categories (id) ON DELETE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE products
ADD CONSTRAINT products_sklad_id_foreign FOREIGN KEY (sklad_id)
REFERENCES branches (id);

--
-- Создать внешний ключ
--
ALTER TABLE products
ADD CONSTRAINT products_suppliers_id_foreign FOREIGN KEY (suppliers_id)
REFERENCES suppliers (id) ON DELETE CASCADE;

--
-- Создать таблицу `product_images`
--
CREATE TABLE product_images (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  image varchar(255) NOT NULL,
  product bigint(20) UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать внешний ключ
--
ALTER TABLE product_images
ADD CONSTRAINT product_images_product_foreign FOREIGN KEY (product)
REFERENCES products (id) ON DELETE CASCADE;

--
-- Создать таблицу `orders`
--
CREATE TABLE orders (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id bigint(20) UNSIGNED DEFAULT NULL,
  kuryer_id bigint(20) UNSIGNED DEFAULT NULL,
  status int(11) NOT NULL DEFAULT 0,
  isPayed tinyint(1) NOT NULL DEFAULT 0,
  pay_type int(11) DEFAULT NULL,
  pay_system varchar(255) DEFAULT NULL,
  count int(11) NOT NULL,
  amount int(11) NOT NULL,
  address varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  sklad_id bigint(20) UNSIGNED DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать внешний ключ
--
ALTER TABLE orders
ADD CONSTRAINT orders_kuryer_id_foreign FOREIGN KEY (kuryer_id)
REFERENCES users (id) ON DELETE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE orders
ADD CONSTRAINT orders_sklad_id_foreign FOREIGN KEY (sklad_id)
REFERENCES branches (id);

--
-- Создать внешний ключ
--
ALTER TABLE orders
ADD CONSTRAINT orders_user_id_foreign FOREIGN KEY (user_id)
REFERENCES users (id) ON DELETE CASCADE;

--
-- Создать таблицу `order_products`
--
CREATE TABLE order_products (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  order_id bigint(20) UNSIGNED NOT NULL,
  product_id bigint(20) UNSIGNED NOT NULL,
  count int(11) NOT NULL,
  amount int(11) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать внешний ключ
--
ALTER TABLE order_products
ADD CONSTRAINT order_products_order_id_foreign FOREIGN KEY (order_id)
REFERENCES orders (id) ON DELETE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE order_products
ADD CONSTRAINT order_products_product_id_foreign FOREIGN KEY (product_id)
REFERENCES products (id) ON DELETE CASCADE;

--
-- Создать таблицу `permissions`
--
CREATE TABLE permissions (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  guard_name varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `permissions_name_guard_name_unique` для объекта типа таблица `permissions`
--
ALTER TABLE permissions
ADD UNIQUE INDEX permissions_name_guard_name_unique (name, guard_name);

--
-- Создать таблицу `model_has_permissions`
--
CREATE TABLE model_has_permissions (
  permission_id bigint(20) UNSIGNED NOT NULL,
  model_type varchar(255) NOT NULL,
  model_id bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (permission_id, model_id, model_type)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `model_has_permissions_model_id_model_type_index` для объекта типа таблица `model_has_permissions`
--
ALTER TABLE model_has_permissions
ADD INDEX model_has_permissions_model_id_model_type_index (model_id, model_type);

--
-- Создать внешний ключ
--
ALTER TABLE model_has_permissions
ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id)
REFERENCES permissions (id) ON DELETE CASCADE;

--
-- Создать таблицу `personal_access_tokens`
--
CREATE TABLE personal_access_tokens (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  tokenable_type varchar(255) NOT NULL,
  tokenable_id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  token varchar(64) NOT NULL,
  abilities text DEFAULT NULL,
  last_used_at timestamp NULL DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `personal_access_tokens_token_unique` для объекта типа таблица `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD UNIQUE INDEX personal_access_tokens_token_unique (token);

--
-- Создать индекс `personal_access_tokens_tokenable_type_tokenable_id_index` для объекта типа таблица `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD INDEX personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type, tokenable_id);

--
-- Создать таблицу `password_resets`
--
CREATE TABLE password_resets (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `password_resets_email_index` для объекта типа таблица `password_resets`
--
ALTER TABLE password_resets
ADD INDEX password_resets_email_index (email);

--
-- Создать таблицу `migrations`
--
CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(255) NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 13,
AVG_ROW_LENGTH = 1365,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `failed_jobs`
--
CREATE TABLE failed_jobs (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  uuid varchar(255) NOT NULL,
  `connection` text NOT NULL,
  queue text NOT NULL,
  payload longtext NOT NULL,
  exception longtext NOT NULL,
  failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `failed_jobs_uuid_unique` для объекта типа таблица `failed_jobs`
--
ALTER TABLE failed_jobs
ADD UNIQUE INDEX failed_jobs_uuid_unique (uuid);

-- 
-- Вывод данных для таблицы roles
--
INSERT INTO roles VALUES
(4, 'admin', '/admin/'),
(3, 'Buxgalter', '/bux/'),
(1, 'Kuriyer', '/api/'),
(6, 'Mehmon', '/site/index/'),
(2, 'Omborxona', '/store/'),
(5, 'Superadmin', '/cp/');

-- 
-- Вывод данных для таблицы suppliers
--
-- Таблица sklad.suppliers не содержит данных

-- 
-- Вывод данных для таблицы categories
--
-- Таблица sklad.categories не содержит данных

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$1qQaTsFB7R.qw6fvkujS8uQbnAR33Hidi31jbEHdiusmPsOZU//jG', NULL, '2022-06-05 12:42:55', '2022-06-05 12:42:55', NULL),
(2, 'sklad', 'admin@gmail.com', NULL, '$2y$10$tbE1l4TAsHDMMkusroYQmO2WbJI1W.W6/yggBAGmjMaC.RtZxs96e', NULL, '2022-06-05 12:42:55', '2022-06-05 12:42:55', NULL);

-- 
-- Вывод данных для таблицы branches
--
-- Таблица sklad.branches не содержит данных

-- 
-- Вывод данных для таблицы products
--
-- Таблица sklad.products не содержит данных

-- 
-- Вывод данных для таблицы orders
--
-- Таблица sklad.orders не содержит данных

-- 
-- Вывод данных для таблицы permissions
--
-- Таблица sklad.permissions не содержит данных

-- 
-- Вывод данных для таблицы product_images
--
-- Таблица sklad.product_images не содержит данных

-- 
-- Вывод данных для таблицы personal_access_tokens
--
-- Таблица sklad.personal_access_tokens не содержит данных

-- 
-- Вывод данных для таблицы password_resets
--
-- Таблица sklad.password_resets не содержит данных

-- 
-- Вывод данных для таблицы order_products
--
-- Таблица sklad.order_products не содержит данных

-- 
-- Вывод данных для таблицы model_has_roles
--
-- Таблица sklad.model_has_roles не содержит данных

-- 
-- Вывод данных для таблицы model_has_permissions
--
-- Таблица sklad.model_has_permissions не содержит данных

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
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

-- 
-- Вывод данных для таблицы failed_jobs
--
-- Таблица sklad.failed_jobs не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
--
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;