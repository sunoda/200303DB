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

-- 正在傾印表格  test.news 的資料：~3 rows (約數)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `img`, `title`, `content`, `created_at`, `updated_at`) VALUES
	(8, 'assets/images/background1.jpg', 'No', 'Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.', '2020-03-03 14:03:00', '2020-03-03 14:12:41'),
	(9, 'assets/images/background2.jpg', 'Mobile Friendly', 'All sites you make with Mobirise are mobile-friendly. You don\'t have to create a special mobile version of your site.', '2020-03-03 15:16:40', '2020-03-03 15:16:40'),
	(10, 'assets/images/background3.jpg', 'Unique Styles', 'Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible.', '2020-03-03 15:16:57', '2020-03-03 15:16:57');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- 正在傾印表格  test.password_resets 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- 正在傾印表格  test.products 的資料：~7 rows (約數)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `tag`, `img`, `created_at`, `updated_at`) VALUES
	(1, 'Cool', 'assets/images/background1.jpg', '2020-03-04 01:14:26', '2020-03-04 01:14:26'),
	(2, 'RWD', 'assets/images/background2.jpg', '2020-03-04 02:23:40', '2020-03-04 02:23:40'),
	(3, 'Cool', 'assets/images/background3.jpg', '2020-03-04 02:23:48', '2020-03-04 02:23:48'),
	(4, 'Art', 'assets/images/background4.jpg', '2020-03-04 02:24:02', '2020-03-04 02:24:02'),
	(5, 'Animate', 'assets/images/background5.jpg', '2020-03-04 02:24:27', '2020-03-04 02:24:27'),
	(6, 'Cool', 'assets/images/background6.jpg', '2020-03-04 02:25:08', '2020-03-04 02:25:08'),
	(7, 'Create', 'assets/images/background7.jpg', '2020-03-04 02:25:52', '2020-03-04 02:25:52');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- 正在傾印表格  test.users 的資料：~0 rows (約數)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$0vr5pdLN/Y14uOEBWEX/cuauXC2HjqCAF8nE3Vgclo4Dz/rcH54di', NULL, '2020-03-03 11:44:57', '2020-03-03 11:44:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
