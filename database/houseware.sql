-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2024 lúc 07:04 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `houseware`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_account` int(10) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_account`, `id_role`, `username`, `fullname`, `email`, `phone`, `address`, `password`, `is_online`, `created_at`, `updated_at`) VALUES
(1, 1, 'quan', 'Quân', 'bokazem69@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-05-30 01:34:06', '2024-05-30 09:15:20'),
(2, 3, 'dung', 'Dung', 'toilaone12@gmail.com', NULL, NULL, 'd0fda0cf702231b3963aedb610256146', 0, '2024-05-30 01:40:04', '2024-05-30 02:51:49'),
(3, 1, 'dung123', 'ChinChin', 'toilaone12@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-05-30 01:41:38', '2024-05-30 01:41:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `image`, `created_at`, `updated_at`) VALUES
(1, 'be/img/banner/sam-sung-galaxy-zflip4-vang-hong-1-1717176595.jpg', '2024-05-31 10:16:06', '2024-05-31 10:29:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name`, `id_parent`, `created_at`, `updated_at`) VALUES
(1, 'Bếp điện', 0, '2024-05-29 09:26:11', '2024-05-29 09:26:11'),
(2, 'Máy hút mùi', 0, '2024-05-29 09:26:33', '2024-05-29 09:26:33'),
(3, 'Bồn rửa bát', 0, '2024-05-29 09:27:30', '2024-05-29 09:27:30'),
(4, 'Lò vi sóng', 0, '2024-05-29 09:28:11', '2024-05-29 09:28:11'),
(5, 'Lò nướng', 0, '2024-05-29 09:28:45', '2024-05-29 09:28:45'),
(6, 'Bếp từ', 1, '2024-05-29 09:29:10', '2024-05-29 09:29:10'),
(7, 'Bếp hồng ngoại', 1, '2024-05-29 09:29:20', '2024-05-29 09:29:20'),
(8, 'Nồi', 0, '2024-05-29 09:50:34', '2024-05-29 09:54:32'),
(9, 'Thiết bị nhà tắm - Đồ điện', 0, '2024-05-29 09:52:35', '2024-05-29 09:52:35'),
(17, 'Nồi áp suất', 8, '2024-05-29 19:45:35', '2024-05-29 19:51:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Đen', '2024-05-29 20:01:58', '2024-05-29 20:01:58'),
(2, 'Trắng', '2024-05-29 20:02:08', '2024-05-29 20:02:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `discount` int(11) NOT NULL,
  `expiration` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `name`, `code`, `quantity`, `type`, `discount`, `expiration`, `created_at`, `updated_at`) VALUES
(1, 'Coupon 1/6', 'COUPONCHILDREN', 100, 0, 100000, '2024-06-01', '2024-06-01 03:08:19', '2024-06-01 03:19:20'),
(2, 'Coupon tháng 6', 'COUPONT6', 100, 1, 10, '2024-06-30', '2024-06-01 03:09:59', '2024-06-01 03:09:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fee`
--

CREATE TABLE `fee` (
  `id_fee` int(10) UNSIGNED NOT NULL,
  `radius` int(11) NOT NULL,
  `weather` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fee`
--

INSERT INTO `fee` (`id_fee`, `radius`, `weather`, `fee`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nắng', 0, '2024-05-31 08:38:39', '2024-05-31 08:38:39'),
(2, 1, 'Mưa', 3000, '2024-05-31 08:38:45', '2024-05-31 08:38:45'),
(3, 5, 'Nắng', 5000, '2024-05-31 08:38:56', '2024-05-31 08:38:56'),
(4, 5, 'Mưa', 10000, '2024-05-31 08:44:45', '2024-05-31 09:08:01'),
(5, 10, 'Nắng', 12000, '2024-05-31 08:44:59', '2024-05-31 09:04:17'),
(6, 10, 'Mưa', 15000, '2024-05-31 08:45:04', '2024-05-31 09:08:48'),
(7, 15, 'Nắng', 25000, '2024-05-31 08:45:17', '2024-05-31 09:04:55'),
(8, 15, 'Mưa', 30000, '2024-05-31 08:45:22', '2024-05-31 09:09:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_29_153439_create_category', 1),
(6, '2024_05_30_025227_create_color', 2),
(7, '2024_05_30_030420_create_account', 3),
(8, '2024_05_30_030427_create_role', 3),
(9, '2024_05_31_151900_create_fee', 4),
(10, '2024_05_31_161520_create_banner', 5),
(11, '2024_06_01_090314_create_coupon', 6),
(12, '2024_06_01_153231_create_product', 7),
(13, '2024_06_02_091149_create_product_color', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  `thumbnail_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `image`, `name`, `quantity`, `discount`, `price`, `thumbnail_path`, `description`, `technical`, `created_at`, `updated_at`) VALUES
(1, 6, 'be/img/product/sp8-1-1717264168.png', 'Bếp ba từ BOSCH PUJ631BB2E', 50, 35, 22800000, '|bepbatu2-1717401569.jpg|bepbatu1-1717401569.jpg|bepbatu-1717401262.jpg|', '<p><strong>Thông số Chi tiết</strong><br />\r\nMã sản phẩm (Model): PUJ631BB2E<br />\r\nHãng: Bosch<br />\r\nLoại sản phẩm: Bếp 03 từ, lắp âm<br />\r\nSố bếp nấu: 03 bếp, khổ bếp 60cm<br />\r\nĐường kính vùng nấu 1: 145 mm, công suất 1400 W<br />\r\nĐường kính vùng nấu 2: 210 mm, công suất 2200 W<br />\r\nĐường kính vùng nấu 3: 280 mm, công suất 2600 W<br />\r\nBảng điều khiển: Direct Control dạng phím cộng trừ<br />\r\nChế độ hẹn giờ độc lập cho từng bếp: Hẹn giờ tới 99 phút<br />\r\nKhóa an toàn trẻ em Child lock: Có<br />\r\nCông suất tổng: 4600W<br />\r\nSô công suất nấu: 17 mức công suất nấu<br />\r\nTrọng lượng tịnh: 11 kg<br />\r\nTổng trọng lượng: 13 kg<br />\r\nTự động tắt bếp khi không có nồi : Có<br />\r\nBooster: Có<br />\r\nĐiện áp: 220V / 50Hz<br />\r\nBáo nhiệt dư: Có<br />\r\nChức năng báo quá nhiệt quá áp: Có<br />\r\nTiếp kiệm điện: Có<br />\r\nMàu sắc: Đen<br />\r\nĐiều khiển độc lập cho từng vùng nấu: Có<br />\r\nKích thước bề mặt: 51 x 592 x 522 mm<br />\r\nKích thước khoét đá: 51 x 560 x 490-500 mm<br />\r\nBảo hành : 02 năm</p>', '<h2><strong>Bếp ba từ BOSCH PUJ631BB2E – Thiết kế cao cấp, vùng nấu rộng cho nồi cỡ lớn<br />\r\nTăng thêm trải nghiệm thú vị trong nghệ thuật nấu nướng</strong></h2>\r\n\r\n<p><strong>Bếp ba từ Bosch PUJ631BB2E</strong>&nbsp;được thiết kế cách điệu vùng nấu hình dấu cộng ưu điểm là diện tích sử dụng sẽ lớn hơn và bao quát nhiều hơn. Có 1 vùng nấu ăn rộng có đường kính 28 cm với điều khiển DirectControl truy cập trực tiếp đến 17 cấp độ nấu ăn.</p>\r\n\r\n<h2><strong>Tính năng chính của bếp Bosch&nbsp;PUJ631BB2E</strong></h2>\r\n\r\n<p><strong>Bếp ba&nbsp;BOSCH PUJ631BB2E</strong>&nbsp;nhập khẩu trực tiếp Tây Ban Nha, gồm 3 vùng nấu cảm ứng với Sprint giảm thời gian làm nóng lên đến 50%<br />\r\n–&nbsp; 1 vùng bếp khổng lồ kích thước lên tới 28 cm, công suất bếp 2,6kW.<br />\r\n–&nbsp; 1 vùng bếp kích thước 21 cm, công suất bếp 2,2kW.<br />\r\n–&nbsp; 1 vùng bếp kích thước 14,5 cm, công suất 1,4kW.</p>\r\n\r\n<ul>\r\n	<li>Bảng điều khiển TouchSelect dạng phím cộng trừ giúp điều chỉnh tăng giảm nhiệt dễ dàng tiện lợi với 17 cấp độ nhiệt được chia nhỏ phù hợp cho nhiều món ăn nấu khác nhau.</li>\r\n	<li>Mặt kính của bếp được thiết kế màu đen sang trọng SCHOTT CERAN sản xuất tại Mainz – Đức, một loại gốm kính cao cấp được làm từ gốm sứ thủy tinh đặc biệt có khả năng chịu lực, chịu nhiệt và khả năng va đập tốt, chống lại những cú sốc nhiệt đột ngột lên đến 750°C và đặc biệt không chứa các kim loại nặng độc hại asen và antimon rất thân thiện với môi trường.</li>\r\n</ul>\r\n\r\n<h2><strong>Bếp ba từ Bosch PUJ631BB2E trang bị các chức năng</strong></h2>\r\n\r\n<ul>\r\n	<li>Chức năng Booster tăng công suất lên mức tối đa, tăng tốc thời gian đun nấu</li>\r\n	<li>Chức năng bộ nhớ : bếp sẽ ghi nhớ mức công suất đang nấu và các tính năng cài đặt trên bếp nếu bếp vô tình bị tắt thì khi bật lại , bếp hoạt động trở lại với cài đặt trước đó.</li>\r\n	<li>Chức năng Auto Start (nhận diện vùng nấu): khi đặt nồi từ trên bếp, sau đó bật bếp lên thì vùng nấu có nồi sẽ tự động được chọn, Bạn chỉ cần chọn công suất để nấu.</li>\r\n</ul>\r\n\r\n<p>– Lập trình thời gian nấu cho từng bếp và có báo âm thanh<br />\r\n– Hạn chế tổng công suất nấu của cả bếp<br />\r\n– Khóa trẻ em an toàn tự động hoặc bằng tay ngăn ngừa sự vô tình bật bếp đảm bảo an toàn cho trẻ em<br />\r\n– Có cảnh báo nhiệt dư hai cấp độ (H/h)</p>\r\n\r\n<h2><strong>Về thương hiệu Bosch</strong></h2>\r\n\r\n<p>Bosch là tập đoàn công nghiệp đình đám hàng đầu Châu Âu, với các lĩnh vực sản xuất đa dạng, trong đó có thiết bị nhà bếp. Bếp từ Bosch dù đặt nhà máy sản xuất ở đâu đều được bảo đảm về chất lượng. Khách hàng sử dụng bếp từ Bosch 100% đều hài lòng về sự tiện dụng, độ tiết kiệm và bền bỉ của sản phẩm. “90% bếp từ Bosch trong vòng 4 năm không cần bảo hành bất cứ vấn đề gì”.</p>', '2024-06-01 03:49:28', '2024-06-03 01:10:43'),
(3, 6, 'be/img/product/EH-IH566-anh-chinh-1717402950.png', 'Bếp ba từ Chefs EH-IH566', 25, 15, 25900000, '|EH-IH566-1-1717403156.jpg|EH-IH566-anh-chinh-1717403156.png|', '<p>– Thương hiệu: Chefs<br />\r\n– Xuất xứ: Đức<br />\r\n– Số bếp nấu: 3 cảm ứng từ<br />\r\n– Bảo hành: 36 Tháng</p>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\">ĐẶC TÍNH SẢN PHẨM (PERFORMANCE)</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>EH-IH566</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng sản xuất</td>\r\n			<td>CHEFS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số bếp nấu</td>\r\n			<td>3 vùng nấu cảm ứng từ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt kính</td>\r\n			<td>* Mặt kính ceramic chịu nhiệt Schott Ceran vát cạnh – Germany* Mặt kính liền nguyên khối, vát cạnh, màu đen sang trọng<br />\r\n			* Bề mặt chống trầy xước, chịu lực cao<br />\r\n			* Khả năng chịu nhiệt lên đến 1000oC, chịu sốc nhiệt đến 800oC</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức công suất nấu</td>\r\n			<td>9 mức + Booster</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nổi bật</td>\r\n			<td>\r\n			<ul>\r\n				<li>Bếp từ ba EH-IH566 ứng dụng công nghệ Inverter thông minh vượt trội</li>\r\n				<li>Công suất cực lớn Booster – 3000W với vùng nấu cực lớn 26cm</li>\r\n				<li>Tính năng nấu thông minh Heat up time Automatic</li>\r\n				<li>Tính năng Bridge 2 vùng nấu</li>\r\n				<li>Bàn phím điều khiển dạng trượt slide, 9 mức công suất + booster</li>\r\n				<li>Hẹn giờ độc lập cho từng vùng nấu, thời gian hẹn lên đến 1 giờ 59 phút</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">CHỨC NĂNG AN TOÀN (SAFE FUNCTION)</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Chức năng</td>\r\n			<td>\r\n			<ul>\r\n				<li>Cảnh báo nhiệt dư vùng nấu Residual heat</li>\r\n				<li>Khóa an toàn trẻ em Child lock</li>\r\n				<li>Tự động tắt bếp khi để quên Automatic switching off</li>\r\n				<li>Tự động tắt bếp khi không có nồi ( trên bếp từ) Pot detection</li>\r\n				<li>Tự động chia sẻ công suất (Power management) giữa 3 bếp, max 6700W</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\">THÔNG SỐ KỸ THUẬT (TECHNICAL INFORMATION)</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện áp</td>\r\n			<td>220V/50 Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất</td>\r\n			<td>\r\n			<ul>\r\n				<li>Công suất cực lớn Booster – 3000W với vùng nấu cực lớn 26cm</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước bếp</td>\r\n			<td>730 x 430 (Dài x rộng)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước cắt đá</td>\r\n			<td>690 x 400 (Dài x rộng)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 01:22:30', '2024-06-03 01:26:20'),
(4, 6, 'be/img/product/bep-ba-tu-ket-ho-hong-ngoai-chiyoda-c2-1-300x184-1717403308.jpg', 'BẾP BA TỪ KẾT HỢP HỒNG NGOẠI CHIYODA C2', 20, 31, 24500000, '|bep-ba-tu-ket-hop-hong-ngoai-chiyoda-c2-anh-4-1717403357.jpg|bep-ba-tu-ket-hop-hong-ngoai-chiyoda-c2-anh-5-768x349-1717403357.jpg|bep-ba-tu-ket-ho-hong-ngoai-chiyoda-c2-1-300x184-1717403357.jpg|', '<ul>\r\n	<li>Kích thước mặt bếp (D x R x C): 75 x 43 x 8.5 cm.</li>\r\n	<li>Trọng lượng bếp: 8.5 kg.</li>\r\n	<li>Điện áp: 180 – 240V/50Hz.</li>\r\n	<li>Công suất: 300 – 2000W.</li>\r\n	<li>Nhiệt độ: 60 – 700 độ C.</li>\r\n	<li>Bảo hành 36 tháng, 1 đổi 1 trong vòng 6 tháng đầu tiên nếu sản phẩm có lỗi phát sinh từ phía nhà sản xuất.</li>\r\n	<li>Xuất xứ: nhập khẩu nguyên chiếc từ Nhật Bản.</li>\r\n</ul>', '<h2>BẾP BA TỪ KẾT HỢP HỒNG NGOẠI CHIYODA C2</h2>\r\n\r\n<p><strong>Bếp ba từ hồng ngoại Chiyoda</strong>&nbsp;được nhập khẩu nguyên chiếc từ Nhật Bản. Bếp ba từ kết hợp hồng ngoại Chiyoda C2 là sản phẩm bếp cao cấp mang thương hiệu Chiyoda được cấu tạo bởi 1 bếp hồng ngoại + 2 bếp từ, thoải mái nấu nướng đồng thời trên 3 vùng nấu của bếp.</p>\r\n\r\n<h3>Mặt bếp hồng ngoại của Bếp ba từ hồng ngoại Chiyoda</h3>\r\n\r\n<ul>\r\n	<li><em>Công nghệ hồng ngoại hiện đại</em>: Hoạt động theo nguyên lý bức xạ nhiệt của tia hồng ngoại đốt nóng bằng mâm nhiệt, sức nóng truyền trực tiếp từ mặt bếp lên xoong, nồi.</li>\r\n	<li><em>Đun nấu đa dạng trên mọi chất liệu nồi:</em>&nbsp;Công nghệ hồng ngoại hiện đại có thể đun nấu trên tất cả các loại nồi được sử dụng trong gia đình: nhôm, gang, sành, sứ… hoặc thậm chí là nướng trực tiếp trên mặt bếp.</li>\r\n	<li><em>2 vòng nhiệt đun nấu linh hoạt:</em>&nbsp;Thiết kế 2 vòng nhiệt lớn, nhỏ linh hoạt vì vậy khi đun nồi, chảo… nhỏ ta có thể tắt vòng nhiệt lớn sử dụng vòng nhiệt nhỏ để tích kiệm tối đa lượng điện năng tiêu thụ mà vẫn đảm bảo chất lượng nấu ăn cao.</li>\r\n	<li><em>Nướng trực tiếp trên mặt bếp hồng ngoại</em>: Cũng giống như các loại bếp hồng ngoại khác, mặt bếp hồng ngoại của Chiyoda C1 giúp người dùng có thể nấu, nướng trực tiếp thực phẩm lên trên bề mặt bếp mà bếp từ không có khả năng làm được.</li>\r\n</ul>\r\n\r\n<h3>Mặt bếp từ của Bếp ba từ hồng ngoại Chiyoda</h3>\r\n\r\n<p><em><strong>Mâm từ</strong>&nbsp;</em>cấu tạo bằng các sợi dây đồng siêu bền sử dụng công nghệ Induction zoneless với vòng dây đồng đường kính khá to,. mật độ dày xếp khít nhau, số lượng thanh chắn nhiều hơn tạo ra từ thông đều và mạnh hơn so với các loại bếp từ thông thường khác</p>\r\n\r\n<p>Chức năng tự động nhận diện đáy nồi (nhiễm từ) khiến bếp chỉ hoạt động tại vùng đáy nồi, ngoài khu vực này bếp không hề hoạt động.</p>\r\n\r\n<p>Với công nghệ này, hiệu suất của&nbsp;<em><strong>Bếp ba từ hồng ngoại Chiyoda</strong>&nbsp;</em>sẽ lên tới 90% trong suốt quá trình đun nấu. Khả năng sinh nhiệt sẽ nhanh và điều, tiết kiệm điện năng trong suốt quá trình đun nấu.</p>\r\n\r\n<h3>Mặt kính chịu nhiệt, chịu lực tốt</h3>\r\n\r\n<p>Mặt kính Schott Ceran được đánh giá là dòng mặt kính cao cấp thị trường với tính năng chịu lực lên tới 30kg, chịu nhiệt 1000 độ C, chịu sốc nhiệt 800 độ C. Bên cạnh đó, mặt kính này còn có khả năng tản nhiệt rất nhanh, kể cả khi nước đang sôi 100 độ C vô tình đổ trực tiếp lên mặt kính sau vài giây sẽ mát lạnh.</p>\r\n\r\n<h3>Hệ thống bảng điều khiển điện tử, quạt tản nhiệt, thân bếp</h3>\r\n\r\n<ul>\r\n	<li><em><strong>Hệ thống bảng điều khiển</strong></em>: Bếp ba từ hồng ngoại Chiyoda bao gồm các phím chức năng tích hợp với các đặc tính công nghệ cảm ứng siêu nhạy dùng được ngay cả khi mặt bếp hoặc tay người người dùng đang bị dính nước. Ngoài ra, mặt bếp được trang bị hệ thống đèn LED hiển thị bắt mắt, dễ sử dụng cả với người cao tuổi.</li>\r\n	<li><em><strong>Hệ thống thân bếp</strong></em>: được lựa chọn sử dụng hệ thống thép (hệ thống sơn tĩnh điện phủ men) bền, chắc chắn, chống han gỉ phù hợp với đặc điểm điều kiện thời tiết, môi trường như nhiệt độ, độ ẩm, ánh sáng… của Việt Nam.</li>\r\n	<li><em><strong>Hệ thống quạt tản nhiệt:</strong></em>&nbsp;được bố trí loại to, riêng biệt cho từng bếp. Như vậy sẽ giúp làm mát nhanh các vi mạch điện tử, các linh kiện khác như bo mạch hoặc vi mạch bên trong bếp, tăng tuổi thọ cho bếp.</li>\r\n	<li><em><strong>Hệ thống bo mạch điện tử</strong></em>: bao gồm nhiều linh kiện điện tử phức tạp như (tụ điện, trở, IC…)</li>\r\n</ul>\r\n\r\n<h3>Tính năng khóa bàn phím</h3>\r\n\r\n<p>Để đảm bảo an toàn cho người dùng khi nấu nướng, Bếp ba từ hồng ngoại Chiyoda được hỗ trợ thêm tính năng khóa bàn phím. Với chức năng này, người sử dụng chỉ cần giữ nút khóa bàn phím trong vòng 3 giây thì toàn bộ các phím chức năng trên bếp sẽ trong chế độ tắt, rất hữu ích trong gia đình có trẻ nhỏ.</p>\r\n\r\n<h3>Tính năng hẹn giờ linh hoạt</h3>\r\n\r\n<p>Chức năng này cho phép người dùng có thể hẹn giờ hoạt động của bếp với thời gian tối đa là 3 tiếng, tối thiểu là 1 phút đồng hồ giúp công việc nấu nướng trở lên rất dễ dàng, tiện lợi, chủ động hơn về mặt thời gian.</p>\r\n\r\n<h3>Tính năng nổi bật khác</h3>\r\n\r\n<ul>\r\n	<li>Giắc cắm INOX 304</li>\r\n	<li>Dây nguồn chất liệu 100% đồng, tiết diện 1mm.</li>\r\n	<li>Đáy thép không gỉ sơn tĩnh điện màu đen.</li>\r\n</ul>', '2024-06-03 01:28:28', '2024-06-03 01:29:17'),
(5, 6, 'be/img/product/PKF645E14E-1717403453.jpg', 'Bếp Điện Bosch PKF645E14E', 15, 21, 21700000, '|PKF645E14E-1717403822.jpg|', '<ul>\r\n	<li>Tổng công suất: 7800W</li>\r\n	<li>Nguồn điện: 220 – 240V / 50Hz</li>\r\n	<li>Kích thước: 572 x 512 mm</li>\r\n	<li>Khoét đá: 560 x 490</li>\r\n	<li>Bảo hành: 24 tháng</li>\r\n</ul>', '<ul>\r\n	<li>Mã sản phẩm: PKF645E14E</li>\r\n	<li>Xuất xứ:</li>\r\n	<li>Thương hiệu: Bosch</li>\r\n	<li>Loại sản phẩm: Bếp Điện Bosch</li>\r\n	<li>Bảo hành: 24 tháng</li>\r\n	<li>Tình trạng: Còn hàng</li>\r\n	<li>Số bếp nấu: 4 Lò</li>\r\n	<li>Mặt kính: Schott Ceran – Made in Germany</li>\r\n	<li>Điều khiển: Cảm ứng riêng biệt</li>\r\n	<li>Chức năng: Khóa bàn phím và hẹn giờ bật giờ tắt bếp</li>\r\n	<li>Tổng công suất: 7800W</li>\r\n	<li>Nguồn điện: 220 – 240V / 50Hz</li>\r\n	<li>Kích thước: 572 x 512 mm</li>\r\n	<li>Khoét đá: 560 x 490</li>\r\n</ul>', '2024-06-03 01:30:53', '2024-06-03 01:37:14'),
(6, 6, 'be/img/product/sp69-1717403964.jpg', 'Bếp điện từ Arber AB 380', 5, 5, 8900000, '|sp69-1717403997.jpg|', '<p>– Công suất tổng: 3400 W<br />\r\n– Chất liệu mặt bếp: Mặt kính Schott Ceran<br />\r\n– Điều khiển: Cảm ứng<br />\r\n– Bảo hành: 2 năm<br />\r\n– Xuất xứ: Malaysia</p>', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>&nbsp;AB 380</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Arber</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại sản phẩm</td>\r\n			<td>&nbsp;Bếp điện từ ( 1 từ 1 hồng ngoại)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt kính</td>\r\n			<td>&nbsp;Kính Schott-ceran (Đức)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảng điều khiển</td>\r\n			<td>&nbsp;Cảm ứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hẹn giờ độc lập cho từng bếp, báo động bằng âm thanh</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khóa an toàn trẻ em Child lock</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất tổng</td>\r\n			<td>&nbsp;6700 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức công suất nấu</td>\r\n			<td>&nbsp;9 mức</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Báo nhiệt dư</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chức năng báo quá nhiệt quá áp</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tiếp kiệm điện</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Màu sắc</td>\r\n			<td>&nbsp;Đen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điều khiển độc lập cho từng vùng nấu</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tạm dừng</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tính năng hâm nóng</td>\r\n			<td>&nbsp;Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước bề mặt</td>\r\n			<td>&nbsp;715 x 420 x 100mm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 01:39:24', '2024-06-03 03:05:14'),
(7, 6, 'be/img/product/sp127-1717404081.jpg', 'Bếp điện từ Chefs EH-MIX 330', 5, 5, 13900000, '|sp127-1717404161.jpg|', '<p>– Công suất tổng: 5200 W<br />\r\n– Chất liệu mặt bếp: Kính Schott Ceran<br />\r\n– Điều khiển: Cảm ứng<br />\r\n– Bảo hành: 3 năm<br />\r\n– Xuất xứ: Đức</p>', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>EH-MIX 330</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Chefs</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại sản phẩm</td>\r\n			<td>Bếp từ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số bếp nấu</td>\r\n			<td>2 bếp&nbsp;(1 từ, 1 hồng ngoại)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt kính</td>\r\n			<td>Mặt kính chịu nhiệt Schott Ceran vát cạnh Germany</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mâm nhiệt</td>\r\n			<td>EGO Hi-Light 2 vòng nhiệt (14/22cm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảng điều khiển</td>\r\n			<td>Cảm ứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hẹn giờ độc lập cho từng bếp</td>\r\n			<td>Hẹn giờ tới 5h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khóa an toàn trẻ em Child lock</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất tổng</td>\r\n			<td>5200W (phải: 2000W/ booster 3000W, trái:2200W)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất nấu</td>\r\n			<td>9 mức công suất nấu</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Booster</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện áp</td>\r\n			<td>220V / 50Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Báo nhiệt dư</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chức năng báo quá nhiệt quá áp</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tiếp kiệm điện</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Màu sắc</td>\r\n			<td>Đen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điều khiển độc lập cho từng vùng nấu</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước bề mặt</td>\r\n			<td>750 x 450 x 60 mm (dài x rộng x cao)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước khoét đá</td>\r\n			<td>670 x 380 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo hành</td>\r\n			<td>3 năm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 01:41:21', '2024-06-03 01:42:41'),
(8, 6, 'be/img/product/sp125-1717404245.jpg', 'Bếp điện từ Chefs EH-MIX2000A', 3, 3, 7590000, '|sp125-1-1-1717404386.jpg|sp125-1717404386.jpg|', '<p>– Sử dụng đa năng với bếp hồng ngoại kết hợp từ EH-MIX2000A<br />\r\n– Mặt kính ceramic chịu nhiệt NEG vát cạnh, Made in Japan..<br />\r\n– Mâm nhiệt Hi-light hai vòng nhiệt, Ø14/20cm, tích hợp phím chọn vòng nấu<br />\r\n– Mâm từ tự động nhận biết kích cỡ xoong nồi, đường kính 20cm / 2000W<br />\r\n– Hẹn giờ độc lập cho từng vùng nấu, thời gian hẹn đến 8.00 giờ<br />\r\n– Điều khiển công suất / nhiệt độ nhiều mức<br />\r\n– Bàn phím siêu nhạy cả khi tay ướt<br />\r\n– Tự động chia sẻ công suất giữa 2 bếp, max 3400W</p>', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>Bếp điện từ chefs EH-MIX2000A</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Chefs</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại sản phẩm</td>\r\n			<td>Bếp điện từ&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mặt kính</td>\r\n			<td>Mặt kính chịu nhiệt Ceramic&nbsp;vát cạnh – Japanese</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảng điều khiển</td>\r\n			<td>Cảm ứng&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hẹn giờ độc lập cho từng bếp, báo động bằng âm thanh</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khóa an toàn trẻ em Child lock</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất tổng</td>\r\n			<td>3600W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất nấu</td>\r\n			<td>9 mức công suất nấu</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Booster</td>\r\n			<td>Có&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện áp</td>\r\n			<td>220V / 50Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Báo nhiệt dư</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chức năng báo quá nhiệt quá áp</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tiếp kiệm điện</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Màu sắc</td>\r\n			<td>Đen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điều khiển độc lập cho từng vùng nấu</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6 chế độ nấu&nbsp;</td>\r\n			<td>Rán, xào, nấu, nướng, kho, hấp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chức năng tản nhiệt</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tự động chia sẻ giữa 2 bếp</td>\r\n			<td>max 3600</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước bề mặt</td>\r\n			<td>&nbsp;&nbsp;690 x 420 x 60mm&nbsp;(dài x rộng x cao)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước khoét đá</td>\r\n			<td>&nbsp;670 x 390mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo hành</td>\r\n			<td>3 năm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 01:44:05', '2024-06-03 01:46:26'),
(9, 1, 'be/img/product/Bếp-điện-từ-đôi-Gertech-GT-5202B-1.-1717405356.png', 'Bếp Điện Từ Đôi GERTECH GT-5202B', 0, 2, 21000000, '|Bếp-điện-từ-đôi-Gertech-GT-5202B-3-1717405390.png|Bếp-điện-từ-đôi-Gertech-GT-5202B-2-1717405390.png|Bếp-điện-từ-đôi-Gertech-GT-5202B-1.-1717405390.png|', '<p>– Số mặt bếp: 2<br />\r\n– Bảng điều khiển thanh trượt 2 mặt bếp riêng biệt<br />\r\n– Công nghệ Tăng cường cảm ứng điện InductionBOOST<br />\r\n– Chức năng Hâm nóng; Chức năng Tạm dừng; Chức năng Hẹn giờ tối đa 90p<br />\r\n– Tự động tắt sau 30p nếu không có tác động lên bếp giúp đảm bảo an toàn<br />\r\n– Mặt kính Ceramic cao cấp chịu lực, chịu nhiệt<br />\r\n– Công suất: min 400W – max 2.400W<br />\r\n– Điện áp: 220VAC/50Hz<br />\r\n– Kích thước: 730x430x60 mm<br />\r\n– Kích thước khoét đá: 680×390 mm<br />\r\n– Bảo hành: 3 năm</p>', '<p><strong>ĐẶC&nbsp;ĐIỂM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>\r\n\r\n<p><strong>Phím Điều Khiển Thanh Trượt (Touch&amp;Slider Control)</strong></p>\r\n\r\n<ul>\r\n	<li>Thao tác vuốt nhẹ để tăng giảm nhiệt/công suất, thuận tiện hơn so với điều khiển cảm ứng chạm-chọn thông thường. Màn hình hiển thị Led rõ ràng mức độ công suất được chọn.</li>\r\n</ul>\r\n\r\n<p><strong>Chức Năng Gia Nhiệt Nhanh BOOSTER</strong></p>\r\n\r\n<ul>\r\n	<li>Giúp&nbsp;<a href=\"https://thegioigiadungonline.com.vn/san-pham-bep-dien/\">Bếp điện từ đôi Gertech GT-5202B</a>&nbsp;tăng nhiệt độ đến mức tối đa ngay lập tức. Công nghệ này rất mạnh mẽ nhưng đơn giản, tiết kiệm thời gian trong những trường hợp bận rộn.</li>\r\n</ul>\r\n\r\n<p><strong>Chức Năng Hâm Nóng/Hấp Thực Phẩm</strong></p>\r\n\r\n<ul>\r\n	<li>Nhiệt độ, công suất được điều chỉnh phù hợp cho việc hấp/hầm món ăn. Lưu ý không nên điều chỉnh nhiệt độ quá cao.</li>\r\n</ul>\r\n\r\n<p><strong>Chức Năng Hẹn Giờ &amp; Chức Năng Tạm Dừng</strong></p>\r\n\r\n<ul>\r\n	<li><a href=\"http://gertech.vn/danh-muc/san-pham/bep-dien/\">Bếp điện từ đôi GERTECH&nbsp; GT-5202B</a>&nbsp;đều được thiết kế chức năng hẹn giờ &amp; tạm dừng độc lập cho từng bếp. Thời gian hẹn giờ tối đa lên đến 90 phút.</li>\r\n</ul>\r\n\r\n<p><strong>Tự Động Ngắt Sau 30 Phút</strong></p>\r\n\r\n<ul>\r\n	<li>Bếp sẽ tự động được ngắt nguồn điện nếu sau 30 phút không có tác động lên bếp. Việc này giúp bạn tiết kiệm điện năng hơn, lại đảm bảo an toàn.</li>\r\n</ul>\r\n\r\n<p><strong>Bảng Điều Khiển Hai Mặt Bếp Riêng Biệt</strong></p>\r\n\r\n<ul>\r\n	<li>Bảng&nbsp;điều khiển&nbsp;được thiết kế cho mỗi mặt bếp cùng với hệ thống mạch điều khiển 2 bên riêng biệt giúp linh động hơn.</li>\r\n</ul>\r\n\r\n<p><strong>Mặt Kính Ceramic Cao Cấp – Chịu Lực, Chịu Nhiệt Tốt, Chống Xước</strong></p>\r\n\r\n<ul>\r\n	<li>Bề mặt của&nbsp;<a href=\"https://thegioigiadungonline.com.vn/san-pham/\">Bếp điện từ đôi Gertech GT-5202B</a>&nbsp;được làm chủ yếu bằng gốm thủy tinh, không sử dụng các kim loại phụ gia nặng độc hại như asen, antimon. Dễ dàng vệ sinh.</li>\r\n</ul>', '2024-06-03 02:02:37', '2024-06-03 02:03:10'),
(10, 7, 'be/img/product/3-1717408860.png', 'BẾP ĐÔI TỪ KẾT HỢP HỒNG NGOẠI KV 03 CỠ NHỎ', 0, 5, 4000000, '|3.4-1717408883.png|3.2-1717408883.png|3-1717408883.png|', '<ul>\r\n	<li>Trọng lượng: 6kg.</li>\r\n	<li>Kích thước bao bì (D x R x C): 625 x 365 x 125 mm.</li>\r\n	<li>Kích thước bếp (D x R x C): 530 x 300 x 70 mm.</li>\r\n	<li>Công suất: 1800 – 2000W.</li>\r\n	<li>Điện áp: 220V – 50Hz.</li>\r\n	<li>Bảo hành: 36 tháng, 1 đổi 1 trong vòng 6 tháng đầu tiên nếu có lỗi phát sinh từ phía nhà sản xuất.</li>\r\n</ul>', '<h2>BẾP ĐÔI TỪ KẾT HỢP HỒNG NGOẠI KV 03 CỠ NHỎ</h2>\r\n\r\n<h3>Linh kiện nhập khẩu trực tiếp từ Nhật Bản</h3>\r\n\r\n<p>Để đưa ra thị trường sản phẩm bếp vừa có chất lượng tốt, vừa tiết kiệm chi phí, bếp đôi từ kết hợp hồng ngoại KV 03 cỡ vừa với linh kiện được nhập khẩu trực tiếp tại Nhật sau đó được lắp ráp trực tiếp tại nhà máy của Việt Nam.</p>\r\n\r\n<h3>Thiết kế nguyên khối, chắc chắn</h3>\r\n\r\n<p>Tuy không sở hữu thiết kế quá nổi trội giống như các sản phẩm bếp dòng Chiyoda nhưng bếp KV 03 mang kiểu dáng khá nhỏ gọn, chắc chắn và đặc biệt không chiếm quá nhiều diện tích không gian bếp. Chính vì vậy, chiếc bếp này phù hợp với mọi không gian bếp.</p>\r\n\r\n<h3>Nguyên lí hoạt động</h3>\r\n\r\n<p><em><strong>Mặt bếp hồng ngoại:</strong></em>&nbsp;Công nghệ hồng ngoại, tiên tiến nhất hiện nay đun nấu trên mọi chất liệu xoong, nồi: inox, gang, gốm, sứ … không hề kén nồi dùng như bếp từ. Ngoài ra, việc kết hợp sử dụng thêm bếp hồng ngoại còn hỗ trợ người dùng trong việc làm các món nướng BBQ hoặc nướng ngô, khoai, sắn… thơm ngon, đảm bảo chất dinh dưỡng.</p>\r\n\r\n<p><em><strong>Mặt bếp từ:</strong></em>&nbsp;Hoạt động dựa trên nguyên lí cảm ứng điện từ, sinh ra nhiệt nhờ dòng Fuco. Khi dòng Fuco này đi qua nồi sẽ khiến các electron di chuyển với tốc độ cao, va chạm vào nhau để tạo ra nhiệt lượng. Ngoài ra, người dùng có thể điều khiển được nhiệt lượng này để điều chỉnh nhiệt độ trong quá trình đun nấu.</p>\r\n\r\n<p><em><strong>Mâm từ cao cấp:</strong></em>&nbsp;Không giống như các bếp khác sử dụng mâm từ kém chất lượng, bếp KV 03 sử dụng hệ thống mâm từ EGO cao cấp với các vòng dây đồng của mâm từ đường kính to, mật độ dày xếp khít nhau tạo ra từ thông đều và mạnh hơn do đó khả năng cảm biến nhận diện đáy nồi sinh nhiệt rất chính xác, tiết kiệm tối đa thời gian nấu nướng.</p>\r\n\r\n<p>Bên cạnh công dụng tiết kiệm thời gian nấu nướng cho người nội trợ (Đun sôi 1 L nước chỉ mất từ 1 – 2 phút, hầm nhừ xương 10 – 15 phút), việc trang bị mâm từ cao cấp còn đem đến hiệu quả tích cực giúp tăng tuổi thọ của bếp.</p>\r\n\r\n<p>Ngoài ra, phần trên của mâm từ và phía dưới mặt kính được trang bị thêm tấm fit cao cấp có tác dụng cách nhiệt, cách điện, hạn chế nhiệt lượng truyền ngược từ mặt kính xuống làm nóng các bo mạch điện tử, bảo vệ đĩa từ của bếp.</p>', '2024-06-03 03:01:00', '2024-06-03 03:01:36'),
(11, 7, 'be/img/product/4-1717409021.png', 'BẾP ĐÔI TỪ KẾT HỢP HỒNG NGOẠI KV 03 CỠ VỪA', 6, 7, 5000000, '|4.1-1717409064.jpg|4.2-1717409064.jpg|4-1717409064.png|', '<ul>\r\n	<li>Trọng lượng: 6kg.</li>\r\n	<li>Kích thước bao bì (D x R x C): 600 x 112 x 415 mm.</li>\r\n	<li>Kích thước bếp (D x R x C): 540 x 360 x 85 mm.</li>\r\n	<li>Công suất: 1800 – 2000W.</li>\r\n	<li>Điện áp: 220V – 50Hz.</li>\r\n	<li>Bảo hành: 36 tháng, 1 đổi 1 trong vòng 6 tháng đầu tiên nếu có lỗi phát sinh từ phía nhà sản xuất.</li>\r\n</ul>', '<h2>BẾP ĐÔI TỪ KẾT HỢP HỒNG NGOẠI KV 03 CỠ VỪA</h2>\r\n\r\n<h3>Linh kiện nhập khẩu trực tiếp từ Nhật Bản</h3>\r\n\r\n<p>Để đưa ra thị trường sản phẩm bếp vừa có chất lượng tốt, vừa tiết kiệm chi phí, bếp đôi từ kết hợp hồng ngoại KV 03 cỡ vừa với linh kiện được nhập khẩu trực tiếp tại Nhật sau đó được lắp ráp trực tiếp tại nhà máy của Việt Nam.</p>\r\n\r\n<h3>Thiết kế nguyên khối, chắc chắn</h3>\r\n\r\n<p>Tuy không sở hữu thiết kế quá nổi trội giống như các sản phẩm bếp dòng Chiyoda nhưng bếp KV 03 mang kiểu dáng khá nhỏ gọn, chắc chắn và đặc biệt không chiếm quá nhiều diện tích không gian bếp. Chính vì vậy, chiếc bếp này phù hợp với mọi không gian bếp.</p>\r\n\r\n<h3>Nguyên lí hoạt động</h3>\r\n\r\n<p><em><strong>Mặt bếp hồng ngoại:</strong></em>&nbsp;Công nghệ hồng ngoại, tiên tiến nhất hiện nay đun nấu trên mọi chất liệu xoong, nồi: inox, gang, gốm, sứ … không hề kén nồi dùng như bếp từ. Ngoài ra, việc kết hợp sử dụng thêm bếp hồng ngoại còn hỗ trợ người dùng trong việc làm các món nướng BBQ hoặc nướng ngô, khoai, sắn… thơm ngon, đảm bảo chất dinh dưỡng.</p>\r\n\r\n<p><em><strong>Mặt bếp từ:</strong>&nbsp;</em>Hoạt động dựa trên nguyên lí cảm ứng điện từ, sinh ra nhiệt nhờ dòng Fuco. Khi dòng Fuco này đi qua nồi sẽ khiến các electron di chuyển với tốc độ cao, va chạm vào nhau để tạo ra nhiệt lượng. Ngoài ra, người dùng có thể điều khiển được nhiệt lượng này để điều chỉnh nhiệt độ trong quá trình đun nấu.</p>\r\n\r\n<p><em><strong>Mâm từ cao cấp:</strong></em>&nbsp;Không giống như các bếp khác sử dụng mâm từ kém chất lượng, bếp KV 03 sử dụng hệ thống mâm từ EGO cao cấp với các vòng dây đồng của mâm từ đường kính to, mật độ dày xếp khít nhau tạo ra từ thông đều và mạnh hơn do đó khả năng cảm biến nhận diện đáy nồi sinh nhiệt rất chính xác, tiết kiệm tối đa thời gian nấu nướng.</p>\r\n\r\n<p>Bên cạnh công dụng tiết kiệm thời gian nấu nướng cho người nội trợ (Đun sôi 1 L nước chỉ mất từ 1 – 2 phút, hầm nhừ xương 10 – 15 phút), việc trang bị mâm từ cao cấp còn đem đến hiệu quả tích cực giúp tăng tuổi thọ của bếp.</p>\r\n\r\n<p>Ngoài ra, phần trên của mâm từ và phía dưới mặt kính được trang bị thêm tấm fit cao cấp có tác dụng cách nhiệt, cách điện, hạn chế nhiệt lượng truyền ngược từ mặt kính xuống làm nóng các bo mạch điện tử, bảo vệ đĩa từ của bếp.</p>\r\n\r\n<h3>Tính năng vượt trội của sản phẩm:</h3>\r\n\r\n<p><em><strong>Mặt kính chịu lực, chịu nhiệt, chống sốc nhiệt:</strong></em>&nbsp;Bếp KV 03 cỡ nhỏ được sản xuất trên công nghệ hiện đại, mà tiêu biểu là công nghệ thấu kính hội tụ sử dụng kính gốm sứ ceramic Schott CERAN. Đây là loại kính thương hiệu của Đức, cực kỳ bền bỉ, với mức chịu nhiệt cao lên đến 1200 độ nhưng cũng có thể chịu được sự giảm nhiệt độ đột ngột hàng nghìn độ mà không rạn nứt. Bên cạnh đó, mặt kính chịu được lực rung, trọng lượng lớn lên đến 40 kg. Ngoài ra, bếp có chức năng giữ nhiệt cao nên bếp không làm hao nhiệt năng, hơn nữa lại có chức năng tự giảm nhiệt khi nhiệt năng đạt mức quá cao.</p>\r\n\r\n<p><em><strong>Bảo vệ môi trường, an toàn cho sức khỏe:</strong>&nbsp;</em>Không khói bụi, không tiếng ồn và không sinh ra các chất độc hại, bảo vệ môi trường và an toàn cho người sử dụng.</p>\r\n\r\n<p><em><strong>Bảo vệ sản phẩm khi dòng điện bị quá tải:</strong></em>&nbsp;Thiết bị cầu chì sẽ tự động bị ngắt mạch khi dòng điện đột ngột bị thay đổi do quá tải giúp bảo vệ sản phẩm tránh hư hỏng.</p>\r\n\r\n<p><em><strong>Hệ thống quạt tản nhiệt cao cấp:</strong>&nbsp;</em>Một trong những ưu điểm của bếp đôi từ kết hợp hồng ngoại KV 03 chính là hệ thống quạt tản nhiệt cao cấp làm mát hệ thống vi mạch khi bếp đang hoạt động, kéo dài tuổi thọ của sản phẩm.</p>\r\n\r\n<p><em><strong>Bàn phím cảm ứng hiển thị đèn Led dễ sử dụng:</strong></em>&nbsp;Hệ thống bàn phím cảm ứng thông minh, đơn giản, dễ hiểu cùng chế độ đèn Led hiển thị bắt mắt.</p>\r\n\r\n<p><em><strong>Chức năng khóa bàn phím đảm bảo an toàn tuyệt đối:</strong></em>&nbsp;Để hỗ trợ tối ưu nhất công việc nấu nướng của chị em phụ nữ, bếp được trang bị thêm chức năng khóa bàn phím an toàn tuyệt đối để tránh trường hợp chẳng may trẻ nhỏ động, chạm vào mặt bếp khi bếp đang hoạt động.</p>\r\n\r\n<p><em><strong>Hẹn giờ tối đa 3 tiếng:</strong></em>&nbsp;Chức năng này cho phép bạn hẹn giờ với thời gian thấp nhất là 1 phút – tối đa là 3 tiếng đồng hồ giúp việc nấu nướng trở lên dễ dàng và chủ động hơn về mặt thời gian.</p>\r\n\r\n<h3>Thông số nổi bật khác</h3>\r\n\r\n<p>– Giắc cắm INOX 304</p>\r\n\r\n<p>– Dây nguồn chất liệu 100% đồng, tiết diện 1mm.</p>\r\n\r\n<p>– Đáy sắt sơn tĩnh điện màu đen.</p>\r\n\r\n<p>– Khung Inox màu trắng sang trọng, chống gỉ có tay xách tiện dụng.</p>', '2024-06-03 03:03:41', '2024-06-03 03:04:24'),
(12, 2, 'be/img/product/sp94-1-1717409258.jpg', 'Hút mùi Canzy CZ 3470', 0, 0, 4000000, '|sp94-2-1717409313.png|sp94-1-1-1717409313.jpg|sp94-1-1717409313.jpg|', '<p>– Hãng sản xuất: Canzy<br />\r\n– Mã sản phẩm: Canzy CZ 3470<br />\r\n– Xuất xứ: Liên Doanh</p>', '<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>Canzy CZ 3470</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Trung Quốc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu dáng</td>\r\n			<td>Âm tủ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kính</td>\r\n			<td>Kính cong</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất hút</td>\r\n			<td>1100m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ồn</td>\r\n			<td>&lt;=45 dB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>700 x 470 x 430 mm (Dài, rộng, cao)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hút</td>\r\n			<td>3 tốc độ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ lọc mỡ</td>\r\n			<td>2 lớp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất động cơ</td>\r\n			<td>240 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phím điều khiển</td>\r\n			<td>Nút nhấn cơ điện tử</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu/màu sắc</td>\r\n			<td>Inox + kính</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đèm chiếu sáng</td>\r\n			<td>Đèn halogen (2 bóng)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hẹn giờ hút</td>\r\n			<td>Không có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện nguồn</td>\r\n			<td>220V – 50Hz</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 03:07:38', '2024-06-03 03:08:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `color_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_color`
--

INSERT INTO `product_color` (`id`, `id_product`, `color_path`, `created_at`, `updated_at`) VALUES
(12, 1, '[{\"id_color\":1,\"quantity\":\"50\"}]', '2024-06-02 04:12:46', '2024-06-02 04:15:05'),
(13, 3, '[{\"id_color\":1,\"quantity\":\"75\"}]', '2024-06-03 01:26:20', '2024-06-03 01:26:20'),
(14, 4, '[{\"id_color\":1,\"quantity\":\"30\"}]', '2024-06-03 01:28:59', '2024-06-03 01:28:59'),
(15, 5, '[{\"id_color\":1,\"quantity\":\"15\"}]', '2024-06-03 01:37:14', '2024-06-03 01:37:14'),
(16, 7, '[{\"id_color\":1,\"quantity\":\"10\"}]', '2024-06-03 01:41:34', '2024-06-03 01:41:34'),
(17, 8, '[{\"id_color\":1,\"quantity\":\"7\"}]', '2024-06-03 01:45:00', '2024-06-03 01:45:14'),
(18, 9, '[{\"id_color\":1,\"quantity\":\"10\"}]', '2024-06-03 02:02:53', '2024-06-03 02:02:53'),
(19, 10, '[{\"id_color\":1,\"quantity\":\"5\"}]', '2024-06-03 03:01:36', '2024-06-03 03:01:36'),
(20, 11, '[{\"id_color\":1,\"quantity\":\"7\"}]', '2024-06-03 03:03:53', '2024-06-03 03:03:53'),
(21, 6, '[{\"id_color\":1,\"quantity\":\"5\"}]', '2024-06-03 03:05:14', '2024-06-03 03:05:14'),
(22, 12, '[{\"id_color\":2,\"quantity\":\"2\"},{\"id_color\":1,\"quantity\":\"3\"}]', '2024-06-03 03:07:53', '2024-06-03 03:08:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', 1, '2024-05-29 21:29:55', '2024-05-30 00:12:23'),
(2, 'Khách hàng', 0, '2024-05-29 21:30:02', '2024-05-30 00:12:43'),
(3, 'Nhân viên', 1, '2024-05-29 21:30:07', '2024-05-30 00:12:38'),
(5, 'Shipper', 1, '2024-05-30 00:09:50', '2024-05-30 00:11:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id_fee`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `fee`
--
ALTER TABLE `fee`
  MODIFY `id_fee` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
