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

-- 正在傾印表格  test.failed_jobs 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- 正在傾印表格  test.migrations 的資料：~6 rows (約數)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_03_03_054956_create_news', 1),
	(5, '2020_03_03_152515_create_products', 1),
	(6, '2020_03_05_025650_create_news_imgs', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- 正在傾印表格  test.news 的資料：~13 rows (約數)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `sort`, `img`, `title`, `content`, `created_at`, `updated_at`) VALUES
	(8, 3, 'GiAW6ObQQ3S0U8YXzKRRD5gvauerlupUnSFtTvr5.jpeg', 'No', 'Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.', '2020-03-03 14:03:00', '2020-03-05 01:27:34'),
	(9, 0, 'pkGTxRbQ5YeJrIVbkvqMV6CDRH3Mp7uDX6i6S80I.jpeg', 'Mobile', 'All sites you make with Mobirise are mobile-friendly. You don\'t have to create a special mobile version of your site.', '2020-03-03 15:16:40', '2020-03-05 01:27:39'),
	(10, 0, 'q76BmHcLX5qp6IcDu1K8alItVjZmdsEQaGaMaVOh.jpeg', 'Unique', 'Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible.', '2020-03-03 15:16:57', '2020-03-05 01:27:44'),
	(11, 0, 'TIeLivltptNfhoukT3Aep2yKa2hRf2ibJQYXjQGN.jpeg', '12356', '1235', '2020-03-05 01:03:43', '2020-03-05 01:27:49'),
	(12, 0, 'Xrtg261NVTY9B21JAF2n57Z5NXec26742sYgUy6P.jpeg', 'asd', '123', '2020-03-05 01:28:12', '2020-03-05 01:28:12'),
	(13, 0, 'vsszfVYPXZ0QzJgUj55cIzVXW1TaMnyc8ciGFrFZ.jpeg', 'asd', 'ddd', '2020-03-05 07:12:24', '2020-03-05 07:12:24'),
	(24, 0, '9yJm8jq1GwncZmRJVxd6IvzaCsZnlG4x69YxUVOB.jpeg', 'test', 'etst', '2020-03-05 07:30:55', '2020-03-05 07:30:55'),
	(25, 0, '6ThKq9JcdKnr5gqSMk8VKTIdUAL9SbNpVZiwim8c.jpeg', 'testtt', 'tett', '2020-03-05 07:32:09', '2020-03-05 07:32:09');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- 正在傾印表格  test.news_imgs 的資料：~2 rows (約數)
/*!40000 ALTER TABLE `news_imgs` DISABLE KEYS */;
INSERT INTO `news_imgs` (`id`, `news_id`, `news_img_url`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 8, 'pkGTxRbQ5YeJrIVbkvqMV6CDRH3Mp7uDX6i6S80I.jpeg', 0, '2020-03-05 13:36:17', '2020-03-05 13:36:19'),
	(2, 8, 'Xrtg261NVTY9B21JAF2n57Z5NXec26742sYgUy6P.jpeg', 0, '2020-03-05 13:38:20', '2020-03-05 13:37:11'),
	(3, 25, '62OU0Jjkgf3uBHombJtOj1sRr2HfKXHb1613VbID.jpeg', 0, '2020-03-05 07:32:09', '2020-03-05 07:32:09'),
	(4, 25, 'ZXRRbXVruOOt6wa59DWjmQFRpS1a4oI1qd9G1RtN.jpeg', 0, '2020-03-05 07:32:09', '2020-03-05 07:32:09');
/*!40000 ALTER TABLE `news_imgs` ENABLE KEYS */;

-- 正在傾印表格  test.password_resets 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 正在傾印表格  test.products 的資料：~6 rows (約數)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `sort`, `tag`, `img`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Cool', 'Bnid5oNzIJv0E5aivy7K7zEzMhMvEt264zCEtqGW.jpeg', '2020-03-04 01:14:26', '2020-03-05 01:25:24'),
	(2, 0, 'RWD', 'kfRGIsmLuxz1vUtjzDE6yWoWak8rmnw0PqudWKMm.jpeg', '2020-03-04 02:23:40', '2020-03-05 01:25:29'),
	(3, 0, 'Cool', 'iOlCIePdHLqlA56qnAm8oRI782a7i2fnK8DDhOOQ.jpeg', '2020-03-04 02:23:48', '2020-03-05 01:25:34'),
	(4, 0, 'Art', 'Ero1xaqhveUivQA9WnMxEqIW6XJxkDCRi6SpZF5w.jpeg', '2020-03-04 02:24:02', '2020-03-05 01:25:39'),
	(5, 0, 'Animate', '94qj84BiZiiVgEKZ3NE0vxu4iCFvegpUdXxtQ5NZ.jpeg', '2020-03-04 02:24:27', '2020-03-05 01:25:45'),
	(7, 0, 'Create', 'peory3rzJ66nxVD8KW8d9aylXN6pT2TAiOscRWZI.jpeg', '2020-03-04 02:25:52', '2020-03-05 01:25:55');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- 正在傾印表格  test.users 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$0vr5pdLN/Y14uOEBWEX/cuauXC2HjqCAF8nE3Vgclo4Dz/rcH54di', NULL, '2020-03-03 11:44:57', '2020-03-03 11:44:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
