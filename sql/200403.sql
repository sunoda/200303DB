-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        10.4.8-MariaDB - mariadb.org binary distribution
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 正在傾印表格  group.cy_news 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `cy_news` DISABLE KEYS */;
INSERT INTO `cy_news` (`id`, `img`, `date`, `title`, `txtdate`, `location`, `content`, `created_at`, `updated_at`) VALUES
	(1, '/upload/cy_news/158553692182161242827b703e6acf9c726942a1e4.jpg', '2020-03-07', '333', '444', '111', '444', '2020-03-30 02:55:21', '2020-03-30 02:55:21');
/*!40000 ALTER TABLE `cy_news` ENABLE KEYS */;

-- 正在傾印表格  group.cy_products 的資料：~10 rows (約數)
/*!40000 ALTER TABLE `cy_products` DISABLE KEYS */;
INSERT INTO `cy_products` (`id`, `type`, `img`, `title`, `content`, `price`, `sort`, `created_at`, `updated_at`) VALUES
	(2, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '蔬食便當', '<p>素食者最佳選擇</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(3, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '小資餐盒', '<p>111</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(4, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '小資餐盒', '<p>111</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(5, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '花樣便當', '<p>利用可食用花瓣入菜</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(6, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '花樣便當', '<p>利用可食用花瓣入菜</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(7, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '小資餐盒', '<p>111</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(8, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '小資餐盒', '<p>111</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(9, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '蔬食便當', '<p>素食者最佳選擇</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(10, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '花樣便當', '<p>111</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14'),
	(11, '便當', 'hq0tlbtPxnxW59wRKqM8Ai2M0hMVfnDfPzwA8cya.jpeg', '蔬食便當', '<p>素食者最佳選擇</p>', 94, 0, '2020-03-29 19:01:14', '2020-03-29 19:01:14');
/*!40000 ALTER TABLE `cy_products` ENABLE KEYS */;

-- 正在傾印表格  group.cy_types 的資料：~1 rows (約數)
/*!40000 ALTER TABLE `cy_types` DISABLE KEYS */;
INSERT INTO `cy_types` (`id`, `type`, `img`, `content`, `sort`, `created_at`, `updated_at`) VALUES
	(3, 'asd', 'Au8n31t8Gg46rOyT0oJz6PUQYOX989V0oIzgmvT7.png', 'fff', 0, '2020-03-29 17:55:27', '2020-03-29 17:55:27'),
	(4, 'ddd', 'Au8n31t8Gg46rOyT0oJz6PUQYOX989V0oIzgmvT7.png', '111', 0, '2020-03-29 18:53:51', '2020-03-29 18:53:51'),
	(5, '便當', 'Au8n31t8Gg46rOyT0oJz6PUQYOX989V0oIzgmvT7.png', '好吃', 0, '2020-04-01 09:28:17', '2020-04-01 09:28:19');
/*!40000 ALTER TABLE `cy_types` ENABLE KEYS */;

-- 正在傾印表格  group.failed_jobs 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 正在傾印表格  group.migrations 的資料：~9 rows (約數)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_03_23_173839_create_news', 1),
	(5, '2020_03_27_061449_create_products', 1),
	(10, '2020_03_29_141441_create_cy_types', 2),
	(11, '2020_03_29_141450_create_sc_types', 2),
	(12, '2020_03_29_141510_create_cy_products', 2),
	(13, '2020_03_29_141559_create_sc_products', 2),
	(14, '2020_03_29_150648_create_sc_news', 3),
	(15, '2020_03_29_150742_create_cy_news', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 正在傾印表格  group.news 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- 正在傾印表格  group.password_resets 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 正在傾印表格  group.products 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- 正在傾印表格  group.sc_news 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `sc_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `sc_news` ENABLE KEYS */;

-- 正在傾印表格  group.sc_products 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `sc_products` DISABLE KEYS */;
INSERT INTO `sc_products` (`id`, `type`, `img`, `title`, `content`, `price`, `sort`, `created_at`, `updated_at`) VALUES
	(1, '123', 'ZUbTU3CTBJihKCKPe8kGCBoCgUBxYuLwKA5JNefe.jpeg', 'ddd', '<p>aaa</p>', 444, 0, '2020-03-29 19:33:49', '2020-03-29 19:33:49');
/*!40000 ALTER TABLE `sc_products` ENABLE KEYS */;

-- 正在傾印表格  group.sc_types 的資料：~1 rows (約數)
/*!40000 ALTER TABLE `sc_types` DISABLE KEYS */;
INSERT INTO `sc_types` (`id`, `type`, `img`, `content`, `sort`, `created_at`, `updated_at`) VALUES
	(3, '123', 'UrfmWmYMw5uRAxVZUDewxLapq8aorERkfeZMAWTI.jpeg', '456', 0, '2020-03-29 17:54:37', '2020-03-29 17:54:37'),
	(4, '555', NULL, '111', 0, '2020-03-29 19:33:36', '2020-03-29 19:33:36');
/*!40000 ALTER TABLE `sc_types` ENABLE KEYS */;

-- 正在傾印表格  group.users 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$W0ZqW.zHvNdXNydDmZUrd.pys1Zbjbgvf5ZZp/KEUoStMTWDE8IwK', NULL, NULL, '2020-03-29 13:28:39', '2020-03-29 13:28:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
