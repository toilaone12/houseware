-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2024 lúc 07:25 PM
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
(2, 'Trắng', '2024-05-29 20:02:08', '2024-05-29 20:02:08'),
(3, 'Hồng', '2024-05-29 20:02:11', '2024-05-29 20:02:11');

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
(1, 6, 'be/img/product/sp8-1-1717264168.png', 'Bếp ba từ BOSCH PUJ631BB2E', 50, 35, 22800000, '|sp8-1-1717348977.png|sp8-1-1717349069.png|sam-sung-galaxy-zflip4-vang-hong-1-1717341160.jpg|apple-airpods-pro-2-usb-c_7_-1717341160.webp|apple-airpods-pro-2-usb-c_8_-1717341160.webp|', '<p><strong>Thông số Chi tiết</strong><br />\r\nMã sản phẩm (Model): PUJ631BB2E<br />\r\nHãng: Bosch<br />\r\nLoại sản phẩm: Bếp 03 từ, lắp âm<br />\r\nSố bếp nấu: 03 bếp, khổ bếp 60cm<br />\r\nĐường kính vùng nấu 1: 145 mm, công suất 1400 W<br />\r\nĐường kính vùng nấu 2: 210 mm, công suất 2200 W<br />\r\nĐường kính vùng nấu 3: 280 mm, công suất 2600 W<br />\r\nBảng điều khiển: Direct Control dạng phím cộng trừ<br />\r\nChế độ hẹn giờ độc lập cho từng bếp: Hẹn giờ tới 99 phút<br />\r\nKhóa an toàn trẻ em Child lock: Có<br />\r\nCông suất tổng: 4600W<br />\r\nSô công suất nấu: 17 mức công suất nấu<br />\r\nTrọng lượng tịnh: 11 kg<br />\r\nTổng trọng lượng: 13 kg<br />\r\nTự động tắt bếp khi không có nồi : Có<br />\r\nBooster: Có<br />\r\nĐiện áp: 220V / 50Hz<br />\r\nBáo nhiệt dư: Có<br />\r\nChức năng báo quá nhiệt quá áp: Có<br />\r\nTiếp kiệm điện: Có<br />\r\nMàu sắc: Đen<br />\r\nĐiều khiển độc lập cho từng vùng nấu: Có<br />\r\nKích thước bề mặt: 51 x 592 x 522 mm<br />\r\nKích thước khoét đá: 51 x 560 x 490-500 mm<br />\r\nBảo hành : 02 năm</p>', '<h2><strong>Bếp ba từ BOSCH PUJ631BB2E – Thiết kế cao cấp, vùng nấu rộng cho nồi cỡ lớn<br />\r\nTăng thêm trải nghiệm thú vị trong nghệ thuật nấu nướng</strong></h2>\r\n\r\n<p><strong>Bếp ba từ Bosch PUJ631BB2E</strong>&nbsp;được thiết kế cách điệu vùng nấu hình dấu cộng ưu điểm là diện tích sử dụng sẽ lớn hơn và bao quát nhiều hơn. Có 1 vùng nấu ăn rộng có đường kính 28 cm với điều khiển DirectControl truy cập trực tiếp đến 17 cấp độ nấu ăn.</p>\r\n\r\n<h2><strong>Tính năng chính của bếp Bosch&nbsp;PUJ631BB2E</strong></h2>\r\n\r\n<p><strong>Bếp ba&nbsp;BOSCH PUJ631BB2E</strong>&nbsp;nhập khẩu trực tiếp Tây Ban Nha, gồm 3 vùng nấu cảm ứng với Sprint giảm thời gian làm nóng lên đến 50%<br />\r\n–&nbsp; 1 vùng bếp khổng lồ kích thước lên tới 28 cm, công suất bếp 2,6kW.<br />\r\n–&nbsp; 1 vùng bếp kích thước 21 cm, công suất bếp 2,2kW.<br />\r\n–&nbsp; 1 vùng bếp kích thước 14,5 cm, công suất 1,4kW.</p>\r\n\r\n<ul>\r\n	<li>Bảng điều khiển TouchSelect dạng phím cộng trừ giúp điều chỉnh tăng giảm nhiệt dễ dàng tiện lợi với 17 cấp độ nhiệt được chia nhỏ phù hợp cho nhiều món ăn nấu khác nhau.</li>\r\n	<li>Mặt kính của bếp được thiết kế màu đen sang trọng SCHOTT CERAN sản xuất tại Mainz – Đức, một loại gốm kính cao cấp được làm từ gốm sứ thủy tinh đặc biệt có khả năng chịu lực, chịu nhiệt và khả năng va đập tốt, chống lại những cú sốc nhiệt đột ngột lên đến 750°C và đặc biệt không chứa các kim loại nặng độc hại asen và antimon rất thân thiện với môi trường.</li>\r\n</ul>\r\n\r\n<h2><strong>Bếp ba từ Bosch PUJ631BB2E trang bị các chức năng</strong></h2>\r\n\r\n<ul>\r\n	<li>Chức năng Booster tăng công suất lên mức tối đa, tăng tốc thời gian đun nấu</li>\r\n	<li>Chức năng bộ nhớ : bếp sẽ ghi nhớ mức công suất đang nấu và các tính năng cài đặt trên bếp nếu bếp vô tình bị tắt thì khi bật lại , bếp hoạt động trở lại với cài đặt trước đó.</li>\r\n	<li>Chức năng Auto Start (nhận diện vùng nấu): khi đặt nồi từ trên bếp, sau đó bật bếp lên thì vùng nấu có nồi sẽ tự động được chọn, Bạn chỉ cần chọn công suất để nấu.</li>\r\n</ul>\r\n\r\n<p>– Lập trình thời gian nấu cho từng bếp và có báo âm thanh<br />\r\n– Hạn chế tổng công suất nấu của cả bếp<br />\r\n– Khóa trẻ em an toàn tự động hoặc bằng tay ngăn ngừa sự vô tình bật bếp đảm bảo an toàn cho trẻ em<br />\r\n– Có cảnh báo nhiệt dư hai cấp độ (H/h)</p>\r\n\r\n<h2><strong>Về thương hiệu Bosch</strong></h2>\r\n\r\n<p>Bosch là tập đoàn công nghiệp đình đám hàng đầu Châu Âu, với các lĩnh vực sản xuất đa dạng, trong đó có thiết bị nhà bếp. Bếp từ Bosch dù đặt nhà máy sản xuất ở đâu đều được bảo đảm về chất lượng. Khách hàng sử dụng bếp từ Bosch 100% đều hài lòng về sự tiện dụng, độ tiết kiệm và bền bỉ của sản phẩm. “90% bếp từ Bosch trong vòng 4 năm không cần bảo hành bất cứ vấn đề gì”.</p>', '2024-06-01 03:49:28', '2024-06-02 10:24:29');

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
(12, 1, '[{\"id_color\":1,\"quantity\":\"50\"}]', '2024-06-02 04:12:46', '2024-06-02 04:15:05');

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
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
