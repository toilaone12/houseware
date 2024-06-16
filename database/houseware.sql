-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2024 lúc 11:52 AM
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
(3, 1, 'dung123', 'ChinChin', 'toilaone12@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 0, '2024-05-30 01:41:38', '2024-05-30 01:41:38'),
(4, 2, 'quan', 'Nguyễn Đình Minh Quân', 'bokazem69@gmail.com', '0399112333', 'Thái Nguyên', '123456', 1, '2024-06-04 10:30:15', '2024-06-13 11:53:33'),
(5, 2, 'tuan', 'Mai Anh Tuấn', 'tuan@gmail.com', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 1, '2024-06-15 16:47:37', '2024-06-15 16:47:48');

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
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) UNSIGNED NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_color` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_account`, `id_product`, `image`, `name`, `id_color`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(34, 4, 1, 'be/img/product/sp8-1-1717264168.png', 'Bếp ba từ BOSCH PUJ631BB2E', 1, 2, 14820000, '2024-06-13 11:32:58', '2024-06-15 16:47:04'),
(35, 4, 16, 'be/img/product/sp95-1717477362.png', 'Máy hút mùi Apex APB6680-70C', 1, 1, 6890000, '2024-06-15 10:34:02', '2024-06-15 10:34:02'),
(36, 4, 25, 'be/img/product/may-rua-chen-sm_main_307_1020.png-1717485764.webp', 'Máy rửa chén Bosch SMS63L08EA 12 bộ Series 6 - Châu Âu', 6, 2, 14030000, '2024-06-15 14:54:02', '2024-06-15 14:55:33');

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
(3, 'Máy rửa bát', 0, '2024-05-29 09:27:30', '2024-06-04 00:19:12'),
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
(6, 'Ghi', '2024-06-04 00:21:25', '2024-06-04 00:21:25');

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
(2, 'Coupon tháng 6', 'COUPONT6', 99, 1, 10, '2024-06-30', '2024-06-01 03:09:59', '2024-06-09 14:59:56'),
(4, 'Mã người mới', 'FIRSTCOUPON', 10000, 0, 50000, '2050-10-28', '2024-06-13 14:06:26', '2024-06-13 14:06:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_user`
--

CREATE TABLE `coupon_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_coupon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon_user`
--

INSERT INTO `coupon_user` (`id`, `id_account`, `id_coupon`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(3, 4, 4, '2024-06-13 14:14:45', '2024-06-13 14:14:45'),
(4, 4, 2, '2024-06-13 14:17:20', '2024-06-13 14:17:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(10) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_color` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_order`, `id_product`, `code`, `image`, `name`, `id_color`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(6, 26, 12, '935C7', 'be/img/product/sp94-1-1717409258.jpg', 'Hút mùi Canzy CZ 3470', 2, '2', 4000000, '2024-06-09 09:58:15', '2024-06-09 09:58:15'),
(7, 26, 1, '935C7', 'be/img/product/sp8-1-1717264168.png', 'Bếp ba từ BOSCH PUJ631BB2E', 1, '1', 14820000, '2024-06-09 09:58:15', '2024-06-09 09:58:15'),
(8, 29, 3, '47C0D', 'be/img/product/EH-IH566-anh-chinh-1717402950.png', 'Bếp ba từ Chefs EH-IH566', 1, '1', 22015000, '2024-06-09 14:59:29', '2024-06-09 14:59:29'),
(9, 29, 25, '47C0D', 'be/img/product/may-rua-chen-sm_main_307_1020.png-1717485764.webp', 'Máy rửa chén Bosch SMS63L08EA 12 bộ Series 6 - Châu Âu', 6, '1', 14030000, '2024-06-09 14:59:29', '2024-06-09 14:59:29'),
(10, 31, 23, '3FF9F', 'be/img/product/may-rua-chen-es_main_175_1020.png-1717485395.webp', 'Máy rửa chén Electrolux ESF6010BW 8 bộ', 2, '1', 8415000, '2024-06-09 15:14:20', '2024-06-09 15:14:20'),
(11, 43, 25, '3EC3D', 'be/img/product/may-rua-chen-sm_main_307_1020.png-1717485764.webp', 'Máy rửa chén Bosch SMS63L08EA 12 bộ Series 6 - Châu Âu', 6, '1', 14030000, '2024-06-13 08:32:29', '2024-06-13 08:32:29'),
(12, 44, 26, '33F63', 'be/img/product/may-rua-chen-53_main_178_1020.png-1717485901.webp', 'Máy rửa chén Hafele 538.21.190 6 bộ', 6, '2', 3955500, '2024-06-13 09:01:21', '2024-06-13 09:01:21'),
(13, 44, 13, '33F63', 'be/img/product/DWB07W651-anh-chinh-1717476313.jpg', 'Hút Mùi Treo Tường BOSCH DWB07W651', 2, '1', 13166500, '2024-06-13 09:01:21', '2024-06-13 09:01:21'),
(14, 45, 1, '653C7', 'be/img/product/sp8-1-1717264168.png', 'Bếp ba từ BOSCH PUJ631BB2E', 1, '1', 14820000, '2024-06-13 09:07:21', '2024-06-13 09:07:21'),
(15, 46, 23, '8F809', 'be/img/product/may-rua-chen-es_main_175_1020.png-1717485395.webp', 'Máy rửa chén Electrolux ESF6010BW 8 bộ', 2, '1', 8415000, '2024-06-16 09:51:18', '2024-06-16 09:51:18');

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
-- Cấu trúc bảng cho bảng `favourite`
--

CREATE TABLE `favourite` (
  `id_favourite` int(10) UNSIGNED NOT NULL,
  `id_account` int(11) NOT NULL,
  `product_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite`
--

INSERT INTO `favourite` (`id_favourite`, `id_account`, `product_path`, `created_at`, `updated_at`) VALUES
(2, 4, '|13|4|1|16|15|12|', '2024-06-06 10:23:30', '2024-06-15 15:04:13');

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
(13, '2024_06_02_091149_create_product_color', 8),
(14, '2024_06_05_084637_create_cart', 9),
(15, '2024_06_06_025437_create_review', 10),
(16, '2024_06_06_164300_create_favourite', 11),
(17, '2024_06_07_114132_create_coupon_user', 12),
(18, '2024_06_08_162048_create_order', 13),
(19, '2024_06_08_162714_create_detail_order', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_account` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `feeship` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_updated` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_account`, `code`, `fullname`, `phone`, `address`, `email`, `note`, `subtotal`, `feeship`, `discount`, `total`, `payment`, `status`, `date_updated`, `created_at`, `updated_at`) VALUES
(26, 4, '935C7', 'Nguyễn Thế Anh', '0399112333', 'Phố Vũ Tông Phan, Phường Khương Đình, Quận Thanh Xuân, Hà Nội', 'theanh@gmail.com', 'a', 22820000, 10000, 2282000, 20548000, 'Thanh toán bằng tiền mặt khi nhận hàng', 4, '2024-06-15', '2024-06-09 09:58:15', '2024-06-15 15:02:33'),
(29, 4, '47C0D', 'Tuấn', '0331112333', 'Phố Trường Chinh, Phường Khương Thượng, Quận Đống Đa, Hà Nội', 'tuan@gmail.com', '', 36045000, 12000, 3604500, 32452500, 'Thanh toán bằng ví điện tử (Momo)', 3, '2024-06-15', '2024-06-09 14:59:56', '2024-06-15 03:55:22'),
(31, 4, '3FF9F', 'Nguyễn Thái Nhân', '0331123312', 'Phố Ngô Quyền, Quận Hà Đông, Hà Nội', 'ntn@gmail.com', '', 8415000, 5000, 0, 8420000, 'Thanh toán bằng ví điện tử (VNPAY)', 3, '2024-06-15', '2024-06-09 15:14:20', '2024-06-15 04:11:58'),
(43, 4, '3EC3D', 'Quân', '0331123333', '', 'quan@gmail.com', '', 14030000, 0, 0, 14030000, 'Thanh toán khi đến cửa hàng', 3, '2024-06-15', '2024-06-13 08:32:29', '2024-06-15 04:11:39'),
(44, 4, '33F63', 'Tân', '0331123333', 'Phố Vũ Tông Phan, Phường Khương Đình, Quận Thanh Xuân, Hà Nội', 'tan@gmail', '', 21077500, 5000, 0, 21082500, 'Thanh toán bằng ví điện tử (Momo)', 0, '2024-06-13', '2024-06-13 09:01:21', '2024-06-13 09:01:21'),
(45, 4, '653C7', 'Thái', '0331112223', 'Phố Lê Hữu Trác, Phường Phúc La, Quận Hà Đông, Hà Nội', 'thai@gmail.com', '', 14820000, 5000, 0, 14825000, 'Thanh toán bằng ví điện tử (VNPAY)', 3, '2024-06-13', '2024-06-13 09:07:21', '2024-06-13 09:07:35'),
(46, 5, '8F809', 'Mai Anh Tuấn', '0311234113', '', 'mat@gmail.com', '', 8415000, 0, 0, 8415000, 'Thanh toán khi đến cửa hàng', 0, '2024-06-16', '2024-06-16 09:51:18', '2024-06-16 09:51:18');

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
(12, 2, 'be/img/product/sp94-1-1717409258.jpg', 'Hút mùi Canzy CZ 3470', 0, 0, 4000000, '|sp94-2-1717409313.png|sp94-1-1-1717409313.jpg|sp94-1-1717409313.jpg|', '<p>– Hãng sản xuất: Canzy<br />\r\n– Mã sản phẩm: Canzy CZ 3470<br />\r\n– Xuất xứ: Liên Doanh</p>', '<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>Canzy CZ 3470</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Trung Quốc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu dáng</td>\r\n			<td>Âm tủ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kính</td>\r\n			<td>Kính cong</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất hút</td>\r\n			<td>1100m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ồn</td>\r\n			<td>&lt;=45 dB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>700 x 470 x 430 mm (Dài, rộng, cao)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hút</td>\r\n			<td>3 tốc độ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ lọc mỡ</td>\r\n			<td>2 lớp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất động cơ</td>\r\n			<td>240 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phím điều khiển</td>\r\n			<td>Nút nhấn cơ điện tử</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu/màu sắc</td>\r\n			<td>Inox + kính</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đèm chiếu sáng</td>\r\n			<td>Đèn halogen (2 bóng)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hẹn giờ hút</td>\r\n			<td>Không có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện nguồn</td>\r\n			<td>220V – 50Hz</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 03:07:38', '2024-06-03 03:08:33'),
(13, 2, 'be/img/product/DWB07W651-anh-chinh-1717476313.jpg', 'Hút Mùi Treo Tường BOSCH DWB07W651', 15, 15, 15490000, '|DWB07W651-2-1717477134.png|DWB07W651-1-1717477134.png|DWB07W651-anh-chinh-1717477134.jpg|', '<p>– Mã sản phẩm: DWB07W651<br />\r\n– Kiểu dáng: Âm tủ, treo tường<br />\r\n– Công suất hút: 600 m³/h<br />\r\n– Độ ồn: 69 dB</p>', '<h2>Thông số kỹ thuật</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>Bosch&nbsp;DWB07W651</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>Bosch (italia)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu dáng</td>\r\n			<td>Âm tủ, treo tường</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất hút</td>\r\n			<td>600 m³/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ồn</td>\r\n			<td>69 dB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>700</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chế độ hút</td>\r\n			<td>3 tốc độ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bộ lọc mỡ</td>\r\n			<td>2 lớp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất động cơ</td>\r\n			<td>240 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phím điều khiển</td>\r\n			<td>Cảm ứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu/màu sắc</td>\r\n			<td>Inox bạc</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đèm chiếu sáng</td>\r\n			<td>Đèn halogen (2 bóng)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hẹn giờ hút</td>\r\n			<td>Có</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện nguồn</td>\r\n			<td>220V – 50Hz</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 21:45:13', '2024-06-03 21:58:54'),
(14, 2, 'be/img/product/YT-269H-SB-2-600x600-1-1717477209.jpg', 'Hút mùi YAMATO YT-269H-S', 10, 0, 11500000, '|lựa-chọn-máy-hút-mùi-600x337-1-1717477230.jpg|YAMATO-435x400-1-1717477230.jpg|YT-269H-SB-2-600x600-1-1717477230.jpg|', '<p>– Độ ồn thấp<br />\r\n– 03 mức tốc độ hút<br />\r\n– Kích thước (RxSxC): 700x504x548mm<br />\r\n– Đường kính ống xả: 150 mm<br />\r\n– Công suất hút tối đa: 1.000 m3/h<br />\r\n– Trọng lượng: 17kg<br />\r\n– Động cơ: 1×210 W<br />\r\n– Đèn LED: 2×1,5W<br />\r\n– Điện áp: 220-240 V<br />\r\n– Tần số: 50-560 Hz</p>', '<h2>Hút mùi YAMATO YT-269H-S</h2>\r\n\r\n<p>Với mỗi căn bếp hiện đại,<a href=\"http://thegioigiadungonline.com.vn/may-hut-mui/\" rel=\"noopener noreferrer\" target=\"_blank\">&nbsp;máy hút mù</a>i là một sản phẩm không thể thiếu trong việc giúp bạn giữ gìn không gian phòng bếp tránh khỏi những mùi khó chịu. Tuy nhiên mua máy hút mùi loại nào tốt vẫn luôn là vấn đề khiến bạn băn khoăn trăn trở, bài viết dưới đây YAMATO sẽ mang đến cho bạn một mã sản phẩm máy hút mùi bán chạy nhất tại cửa hàng – Hút mùi Nhật YAMATO YT-269H-S!! Cùng tìm hiểu nhé!!</p>\r\n\r\n<h2><strong>1.Thông số kỹ thuật</strong></h2>\r\n\r\n<table border=\"2px\" cellpadding=\"10\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Loại sản phẩm</strong></td>\r\n			<td><a href=\"https://yamatovietnam.vn/danh-muc/san-pham/may-hut-mui/\">Hút mùi</a>&nbsp;YAMATO YT-269H-S</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Màu sắc</strong></td>\r\n			<td>Trắng, bạc</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Inox Aisi 304 xước bạc</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Bảng điều khiển</strong></td>\r\n			<td>Cảm ứng với màn hình bảng Led</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Động cơ, Công suất hút</strong></td>\r\n			<td>1×210W; 1.000m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Bộ lọc</strong></td>\r\n			<td>02 tấm lọc nhôm + 02 tấm lọc than hoạt tính khử mùi</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kích thước (RxSxC)</strong></td>\r\n			<td>700x504x548mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phần mở rộng lồng ống</strong></td>\r\n			<td>400+400mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kích thước đường thoát</strong></td>\r\n			<td>150mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Đèn chiếu sáng</strong></td>\r\n			<td>bảng đèn led mở rộng công suất 8w</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nguồn điện</strong></td>\r\n			<td>220V-240V – 50/60Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Trọng lượng</strong></td>\r\n			<td>17 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Năm bảo hành</strong></td>\r\n			<td>24 tháng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 22:00:09', '2024-06-03 22:00:30'),
(15, 2, 'be/img/product/FD-3388C1-70-anh-chinh-1717477289.jpg', 'MÁY HÚT KHÓI FANDI FD-3388C1-70', 0, 3, 5250000, '|FD-3388C1-70-anh-chinh-1717477306.jpg|', '<p>– Mã sản phẩm: FD – 3388C1 – 70<br />\r\n– Hãng: Fandi<br />\r\n– Kiểu dáng: Toa gắn tường<br />\r\n– Công suất hút: 1100m3/h</p>', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Thông số</th>\r\n			<th>Chi tiết</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>&nbsp;FD – 3388C1 – 70</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng</td>\r\n			<td>&nbsp;Fandi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại sản phẩm</td>\r\n			<td>&nbsp;Máy hút mùi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu dáng</td>\r\n			<td>&nbsp;Toa gắn tường</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu</td>\r\n			<td>&nbsp;Inox kính</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>&nbsp;700/900mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất hút</td>\r\n			<td>&nbsp;1100m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất động cơ</td>\r\n			<td>&nbsp;170W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện áp</td>\r\n			<td>&nbsp;220 – 240V ~ 50HZ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lưới lọc</td>\r\n			<td>&nbsp;Alumium 5 lớp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mức tốc độ</td>\r\n			<td>&nbsp;3 mức</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đèn</td>\r\n			<td>&nbsp;Halogen: 2 x 20W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ồn</td>\r\n			<td>&nbsp;&lt; 46Db</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo hành</td>\r\n			<td>3 năm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 22:01:29', '2024-06-03 22:03:23'),
(16, 2, 'be/img/product/sp95-1717477362.png', 'Máy hút mùi Apex APB6680-70C', 10, 0, 6890000, '|sp95-2-1717477387.png|sp95-1-1717477387.png|sp95-1717477387.png|', '<p>– Hãng sản xuất: Sunhouse Việt Nam<br />\r\n– Xuất xứ:Trung Quốc<br />\r\n– Kiểu dáng: Toa gắn tường chữ T<br />\r\n– Bảo hành: 2 năm</p>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>THÔNG SỐ</th>\r\n			<th>CHI TIẾT</th>\r\n		</tr>\r\n		<tr>\r\n			<td>Mã sản phẩm</td>\r\n			<td>Apex APB6680-70C</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hãng sản xuất</td>\r\n			<td>Sunhouse</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại sản phẩm</td>\r\n			<td><a href=\"http://noithatbepthongminh.com/may-hut-mui/\">Máy hút mùi</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kiểu dáng</td>\r\n			<td>Kiểu toa máy gắn tường chữ T</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Động cơ</td>\r\n			<td>Tuabin đôi</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất động cơ</td>\r\n			<td>200 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Lưới lọc</td>\r\n			<td>Nhôm 5 lớp</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phím điều khiển</td>\r\n			<td>Phím cảm ứng chạm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tốc độ điều chỉnh</td>\r\n			<td>3 tốc độ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phím bấm</td>\r\n			<td>5 phím bấm + Màn hình hiển thị LCD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khung vỏ</td>\r\n			<td>Inox</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kính</td>\r\n			<td>Chịu lực, chịu nhiệt</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ồn</td>\r\n			<td>&lt; 70 DB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đèn led</td>\r\n			<td>2 đèn Led 25 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>700 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Điện áp</td>\r\n			<td>220 x 240V ~ 50Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Công suất hút</td>\r\n			<td>1100m3/h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>Ngang 69 cm – Sâu 48 cm – Cao 40 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>18kg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2024-06-03 22:02:42', '2024-06-03 22:03:07'),
(17, 9, 'be/img/product/den-suoi-nha-tam-anh-11-1717484202.jpg', 'Đèn sưởi nhà tắm 2 bóng cao cấp Bouken', 10, 5, 1070000, '|den-suoi-nha-tam-anh-11-1717484246.jpg|', '<p>– Công nghệ hồng ngoại tiên tiến không làm khô không khí.<br />\r\n– Làm nóng nhanh chóng chỉ từ 3&nbsp;– 5 giây.<br />\r\n– Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng.<br />\r\n– Tính năng chống nước, không lo bị chập cháy.<br />\r\n– Thiết kế nhỏ gọn, tiện lợi.<br />\r\n– Công suất mạnh mẽ, tiện dụng.<br />\r\n– Nút công tắc độc lập, dễ dùng.<br />\r\n– Công suất 825 W.</p>', '<p><strong>Công nghệ bức xạ tia hồng ngoại hiện đại.</strong></p>\r\n\r\n<p>Đèn sưởi nhà tắm 2&nbsp;bóng Bouken là sản phẩm mới nhất của hãng được sản xuất theo công nghệ Đức. Đèn được trang bị 2&nbsp;bóng đèn hồng ngoại với công nghệ bức xạ tia hồng ngoại để làm ấm không khí, không đốt cháy oxi, không tạo cảm giác khô da.</p>\r\n\r\n<p>Ngoài ra, với công nghệ sưởi ấm này đèn còn có tác dụng làm đẹp da, giảm đau, kích thích lưu thông máu… mang lại cảm giác dễ chịu, thư thái cho người dùng.</p>\r\n\r\n<p><strong>Làm nóng nhanh chóng chỉ trong 3 – 5 giây</strong></p>\r\n\r\n<p>Đèn có khả năng làm nóng không khí chỉ mất 3 – 5 giây, hoàn toàn không mất thời gian chờ đợi, tránh cảm giác gai lạnh người khi tắm trong mùa đông (đặc biệt với gia đình có người già và trẻ&nbsp;nhỏ).</p>\r\n\r\n<p><strong>Chống chói mắt trong suốt quá trình sử dụng</strong></p>\r\n\r\n<p>Vì đèn sử dụng công nghệ hồng ngoại nên khắc phục hoàn toàn nhược điểm của bóng đốt Halogen khi làm nóng không khí, bóng có ánh sáng vàng dịu nhẹ, không gây cảm giác chói mắt trong khi đèn hoạt động.</p>\r\n\r\n<p><strong>Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng</strong></p>\r\n\r\n<p>Chế độ tự ngắt cùng hệ thống quạt tản nhiệt được tích hợp bên trong đèn sưởi đảm bảo an toàn tuyệt đối cho người dùng trong suốt quá trình sử dụng khi đèn hoạt động quá công suất hoặc bật quá lâu khiến đèn quá nóng.</p>\r\n\r\n<p><strong>Tính năng chống nước, không lo bị chập cháy</strong></p>\r\n\r\n<p>Khả năng chống nước IPX2, chống chập điện, kiểm soát nhiệt độ nhạy bén.</p>\r\n\r\n<p><strong>Nút công tắc độc lập, dễ dùng</strong></p>\r\n\r\n<p>Công tắc điều khiển riêng lẻ cho từng bóng đèn để người dùng linh hoạt bật/ tắt khi sử dụng.</p>', '2024-06-03 23:56:42', '2024-06-03 23:57:26'),
(18, 9, 'be/img/product/may-nuoc-nong-t_main_402_1020.png-1717484419.webp', 'Máy Nước Nóng Trực Tiếp Ariston AURES EASY 3.5', 5, 3, 2290000, '|may-nuoc-nong-t_multi_1_837_1020.png-1717484461.webp|may-nuoc-nong-t_multi_2_823_1020.png-1717484461.webp|may-nuoc-nong-t_multi_3_8_1020.png-1717484461.webp|', '<h2>Máy nước nóng trực tiếp Ariston Aures Easy 3.5 làm nóng nước nhanh an toàn sử dụng trong gia đình</h2>\r\n\r\n<h3>Kiểu dáng nhỏ gọn lắp đặt dễ</h3>\r\n\r\n<p><a href=\"https://www.ariston.com/\" rel=\"nofollow\" target=\"_blank\">Ariston</a>&nbsp;Aures Easy 3.5 là loại máy nước nóng trực tiếp của thương hiệu Ariston đến từ Ý, sản xuất tại Việt Nam. Máy màu trắng tinh tế, kiểu dáng nhỏ gọn với kích thước 29.7 x 24 x 11 cm (Rộng x Cao x Sâu), trọn</p>\r\n\r\n<h3>Hệ thống an toàn đồng bộ TSS</h3>\r\n\r\n<p>Máy nước nóng được trang bị hệ thống an toàn đồng bộ TSS. Hệ thống này bao gồm:</p>\r\n\r\n<p>-&nbsp;Cầu dao chống giật ELCB: Ngắt nguồn điện khi có sự cố rò rỉ điện.</p>\r\n\r\n<p>-&nbsp;Bộ điều chỉnh nhiệt TBSE: Giúp máy ngừng gia nhiệt khi nước đạt đến nhiệt độ cài đặt sẵn.</p>\r\n\r\n<p>-&nbsp;Van an toàn: Giải phóng áp suất nước trong bình khi áp suất vượt quá mức cho phép.</p>\r\n\r\n<h3>Công suất 3500W làm nóng nhanh</h3>\r\n\r\n<p>Sản phẩm hoạt động với công suất 3500W. Máy nước nóng giúp đun nước nhanh, tiết kiệm điện và thời gian. Nước được đun nhanh đến nhiệt độ lý tưởng để có thể dùng ngay mà không cần tốn thời gian chờ đợi. Ngoài ra với mức công suất này thì người dùng sẽ không lo thiếu nước nóng tắm vào buổi tối hoặc những lúc thời tiết lạnh.&nbsp;</p>\r\n\r\n<h3>Cầu dao chống giật ELCB</h3>\r\n\r\n<p><a href=\"https://dienmaycholon.vn/may-nuoc-nong-ariston\" target=\"_blank\">Máy nước nóng Ariston</a>&nbsp;Aures Easy 3.5 được trang bị cầu dao chống giật ELCB. Chức năng của cầu dao là tự ngắt điện khi có sự cố rò rỉ điện xảy ra. Do đó máy có khả năng ngăn các hiện tượng như điện giật, chập cháy gây nguy hiểm cho người dùng.&nbsp;</p>\r\n\r\n<h3>3 mức điều chỉnh nhiệt độ nước</h3>\r\n\r\n<p>Ariston Aures Easy 3.5 cung cấp 3 mức điều chỉnh nhiệt độ nước để kiểm soát nhiệt độ nước đơn giản hơn. Nhờ vậy người dùng sẽ dễ dàng tùy chỉnh độ nóng của nước cho phù hợp với nhu cầu sử dụng.&nbsp;</p>\r\n\r\n<h3>Vòi sen 1 chế độ phun</h3>\r\n\r\n<p><a href=\"https://dienmaycholon.vn/may-nuoc-nong\" target=\"_blank\">Máy nước nóng</a>&nbsp;có vòi sen với 1 chế độ phun. Tia phun nước mạnh mẽ giúp người dùng cảm thấy thư giãn hơn trong lúc tắm. Bầu phun rộng rãi và cực kỳ tiện lợi cho việc sử dụng.&nbsp;</p>\r\n\r\n<h3>Tương thích điện từ EMC</h3>\r\n\r\n<p>Sản phẩm có tương thích điện từ EMC đảm bảo sóng điện từ được phát đi trong quá trình hoạt động trong mức cho phép. Do đó máy có thể tránh được các hiện tượng như làm nhiễu sóng hoặc ảnh hưởng đến các thiết bị điện khác xung quanh.&nbsp;</p>\r\n\r\n<h3>Những điều lưu ý khi dùng máy nước nóng</h3>\r\n\r\n<p>-&nbsp;Khi sử dụng máy nước nóng tuyệt đối phải đấu dây nối đất cho máy để tránh nguy cơ bị giật điện, đảm bảo an toàn cho người dùng.&nbsp;</p>\r\n\r\n<p>-&nbsp;Chọn vị trí lắp đặt phù hợp để nước đi vào và đi ra có áp lực đủ lớn để vòi sen phun tia nước đều.&nbsp;</p>\r\n\r\n<p>-&nbsp;Chỉ bật cầu dao điện bất cứ khi nào cần dùng nước nóng, không bật tắt bình thường xuyên dễ làm giảm tuổi thọ thiết bị.</p>\r\n\r\n<p>-&nbsp;Sử dụng máy nước nóng với mức công suất phù hợp cho nhu cầu cần dùng, không nên vặn công suất máy lên mức quá cao.&nbsp;</p>\r\n\r\n<p>-&nbsp;Đối với máy nước nóng không có bơm trợ lực người dùng có thể lắp thêm bơm để tăng áp lực nước đối với khu vực sống có điều kiện nước vào yếu.&nbsp;</p>\r\n\r\n<p>-&nbsp;Khi không dùng máy nước nóng thì hãy tắt máy, tránh bật xuyên suốt 24 tiếng đồng hồ.&nbsp;</p>\r\n\r\n<p>-&nbsp;Sau một thời gian không sử dụng máy cho đến khi dùng lại thì nên kiểm tra đường điện, nước, vòi sen.&nbsp;</p>\r\n\r\n<p>-&nbsp;Kiểm tra và bảo dưỡng bình theo định kỳ để đảm bảo máy hoạt động ổn định.&nbsp;</p>\r\n\r\n<p>g lượng 1.7kg. Sản phẩm làm bằng nhựa, kiểu dáng gọn gàng và dễ lắp đặt trong khu vực phòng tắm để cung cấp nước nóng cho người dùng tắm.</p>', '<ul>\r\n	<li><strong>Tính Năng Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Trực tiếp</p>\r\n	</li>\r\n	<li>\r\n	<p>Bơm trợ lực</p>\r\n\r\n	<p>Không</p>\r\n	</li>\r\n	<li>\r\n	<p>Chống giật</p>\r\n\r\n	<p>Chống giật ELCB</p>\r\n	</li>\r\n	<li>\r\n	<p>Vòi sen</p>\r\n\r\n	<p>- Chất liệu: Nhựa<br />\r\n	- 01 chế độ</p>\r\n	</li>\r\n	<li>\r\n	<p>Điều chỉnh nhiệt độ</p>\r\n\r\n	<p>03 mức điều chỉnh nhiệt độ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiện ích</p>\r\n\r\n	<p>Tương thích điện từ EMC</p>\r\n	</li>\r\n	<li><strong>Thông số kỹ thuật</strong></li>\r\n	<li>\r\n	<p>Màu sắc</p>\r\n\r\n	<p>Trắng</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:00:19', '2024-06-04 00:01:01');
INSERT INTO `product` (`id_product`, `id_category`, `image`, `name`, `quantity`, `discount`, `price`, `thumbnail_path`, `description`, `technical`, `created_at`, `updated_at`) VALUES
(19, 9, 'be/img/product/den-suoi-nha-tam-anh-1-1717484548.png', 'Đèn sưởi nhà tắm 3 bóng cong Bouken FJ 338S', 3, 15, 1600000, '|den-suoi-nha-tam-anh-1-1717484569.png|den-suoi-nha-tam-anh-3-1717484569.png|den-suoi-nha-tam-anh-13-1717484569.jpg|', '<p>– Công nghệ hồng ngoại tiên tiến không làm khô không khí.<br />\r\n– Làm nóng nhanh chóng chỉ từ 3&nbsp;– 5 giây.<br />\r\n– Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng.<br />\r\n– Tính năng chống nước, không lo bị chập cháy.<br />\r\n– Thiết kế nhỏ gọn, tiện lợi.<br />\r\n– Công suất mạnh mẽ, tiện dụng.<br />\r\n– Nút công tắc độc lập, dễ dùng.<br />\r\n– Công suất 825 W.</p>', '<p><strong>Công nghệ bức xạ tia hồng ngoại hiện đại.</strong></p>\r\n\r\n<p>Đèn sưởi nhà tắm 3 bóng Bouken là sản phẩm mới nhất của hãng được sản xuất theo công nghệ Đức. Đèn được trang bị 3 bóng đèn hồng ngoại với công nghệ bức xạ tia hồng ngoại để làm ấm không khí, không đốt cháy oxi, không tạo cảm giác khô da.</p>\r\n\r\n<p>Ngoài ra, với công nghệ sưởi ấm này đèn còn có tác dụng làm đẹp da, giảm đau, kích thích lưu thông máu… mang lại cảm giác dễ chịu, thư thái cho người dùng.</p>\r\n\r\n<p><strong>Làm nóng nhanh chóng chỉ trong 3 – 5 giây</strong></p>\r\n\r\n<p>Đèn có khả năng làm nóng không khí chỉ mất 3 – 5 giây, hoàn toàn không mất thời gian chờ đợi, tránh cảm giác gai lạnh người khi tắm trong mùa đông (đặc biệt với gia đình có người già và trẻ&nbsp;nhỏ).</p>\r\n\r\n<p><strong>Chống chói mắt trong suốt quá trình sử dụng</strong></p>\r\n\r\n<p>Vì đèn sưởi nhà tắm 3 bóng&nbsp;sử dụng công nghệ hồng ngoại nên khắc phục hoàn toàn nhược điểm của bóng đốt Halogen khi làm nóng không khí, bóng có ánh sáng vàng dịu nhẹ, không gây cảm giác chói mắt trong khi đèn hoạt động.</p>\r\n\r\n<p><strong>Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng</strong></p>\r\n\r\n<p>Chế độ tự ngắt cùng hệ thống quạt tản nhiệt được tích hợp bên trong đèn sưởi đảm bảo an toàn tuyệt đối cho người dùng trong suốt quá trình sử dụng khi đèn hoạt động quá công suất hoặc bật quá lâu khiến đèn quá nóng.</p>\r\n\r\n<p><strong>Tính năng chống nước, không lo bị chập cháy</strong></p>\r\n\r\n<p>Khả năng chống nước IPX2, chống chập điện, kiểm soát nhiệt độ nhạy bén.</p>\r\n\r\n<p><strong>Nút công tắc độc lập, dễ dùng</strong></p>\r\n\r\n<p>Công tắc điều khiển riêng lẻ cho từng bóng của đèn sưởi&nbsp;nhà tắm 3 bóng&nbsp;để người dùng linh hoạt bật/ tắt khi sử dụng.</p>', '2024-06-04 00:02:28', '2024-06-04 00:02:49'),
(20, 9, 'be/img/product/den-suoi-nha-tam-anh-12-1717484767.jpg', 'Đèn sưởi nhà tắm 3 bóng thẳng Bouken FJ 337S', 0, 20, 1500000, '|den-suoi-nha-tam-anh-5-1717484790.png|den-suoi-nha-tam-anh-6-1717484790.png|den-suoi-nha-tam-anh-12-1717484790.jpg|', '<p>&nbsp;Công nghệ hồng ngoại tiên tiến không làm khô không khí.<br />\r\n– Làm nóng nhanh chóng chỉ từ 3&nbsp;– 5 giây.<br />\r\n– Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng.<br />\r\n– Tính năng chống nước, không lo bị chập cháy.<br />\r\n– Thiết kế nhỏ gọn, tiện lợi.<br />\r\n– Công suất mạnh mẽ, tiện dụng.<br />\r\n– Nút công tắc độc lập, dễ dùng.<br />\r\n– Công suất 825 W.</p>', '<p><strong>Công nghệ bức xạ tia hồng ngoại hiện đại.</strong></p>\r\n\r\n<p>Đèn sưởi nhà tắm 3 bóng Bouken là sản phẩm mới nhất của hãng được sản xuất theo công nghệ Đức. Đèn được trang bị 3 bóng đèn hồng ngoại với công nghệ bức xạ tia hồng ngoại để làm ấm không khí, không đốt cháy oxi, không tạo cảm giác khô da.</p>\r\n\r\n<p>Ngoài ra, với công nghệ sưởi ấm này đèn còn có tác dụng làm đẹp da, giảm đau, kích thích lưu thông máu… mang lại cảm giác dễ chịu, thư thái cho người dùng.</p>\r\n\r\n<p><strong>Làm nóng nhanh chóng chỉ trong 3 – 5 giây</strong></p>\r\n\r\n<p>Đèn có khả năng làm nóng không khí chỉ mất 3 – 5 giây, hoàn toàn không mất thời gian chờ đợi, tránh cảm giác gai lạnh người khi tắm trong mùa đông (đặc biệt với gia đình có người già và trẻ&nbsp;nhỏ).</p>\r\n\r\n<p><strong>Chống chói mắt trong suốt quá trình sử dụng</strong></p>\r\n\r\n<p>Vì đèn sử dụng công nghệ hồng ngoại nên khắc phục hoàn toàn nhược điểm của bóng đốt Halogen khi làm nóng không khí, bóng có ánh sáng vàng dịu nhẹ, không gây cảm giác chói mắt trong khi đèn hoạt động.</p>\r\n\r\n<p><strong>Có quạt tản nhiệt, tự ngắt khi quá tải hoặc quá nóng</strong></p>\r\n\r\n<p>Chế độ tự ngắt cùng hệ thống quạt tản nhiệt được tích hợp bên trong đèn sưởi đảm bảo an toàn tuyệt đối cho người dùng trong suốt quá trình sử dụng khi đèn hoạt động quá công suất hoặc bật quá lâu khiến đèn quá nóng.</p>\r\n\r\n<p><strong>Tính năng chống nước, không lo bị chập cháy</strong></p>\r\n\r\n<p>Khả năng chống nước IPX2, chống chập điện, kiểm soát nhiệt độ nhạy bén.</p>\r\n\r\n<p><strong>Nút công tắc độc lập, dễ dùng</strong></p>\r\n\r\n<p>Công tắc điều khiển riêng lẻ cho từng bóng đèn để người dùng linh hoạt bật/ tắt khi sử dụng.</p>', '2024-06-04 00:06:07', '2024-06-04 00:06:30'),
(21, 9, 'be/img/product/may-nuoc-nong-t_main_736_1020.png-1717484925.webp', 'Máy Nước Nóng Trực Tiếp Ferroli LUXE-TE', 9, 15, 3000000, '|may-nuoc-nong-t_multi_2_432_1020.png-1717484960.webp|may-nuoc-nong-t_multi_1_801_1020.png-1717484960.webp|may-nuoc-nong-t_multi_0_83_1020.png-1717484960.webp|may-nuoc-nong-t_main_736_1020.png-1717484960.webp|', '<ul>\r\n	<li>Công suất hoạt động : 4500W</li>\r\n	<li>Cầu dao chống rò điện ELCB bảo vệ an toàn</li>\r\n	<li>Cơ chế&nbsp;làm nóng trực tiếp&nbsp;làm nước nóng nhanh</li>\r\n	<li>Lớp vỏ chống thấm nước và bụi bẩn chuẩn IP25</li>\r\n	<li>Thiết kế chống tia nước phun, rơ le chống quá nhiệt</li>\r\n	<li>Bảng điều khiển nút nhấn&nbsp;tiếng Anh, xoay dễ sử dụng</li>\r\n</ul>', '<ul>\r\n	<li><strong>Tính Năng Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Trực tiếp</p>\r\n	</li>\r\n	<li>\r\n	<p>Bơm trợ lực</p>\r\n\r\n	<p>Không</p>\r\n	</li>\r\n	<li>\r\n	<p>Chống giật</p>\r\n\r\n	<p>Chống rò điện ELCB, chống giật</p>\r\n	</li>\r\n	<li>\r\n	<p>Bình chứa</p>\r\n\r\n	<p>Không có bình chứa</p>\r\n	</li>\r\n	<li>\r\n	<p>Thanh đốt</p>\r\n\r\n	<p>Thanh dẫn nhiệt : Đồng</p>\r\n	</li>\r\n	<li>\r\n	<p>Vòi sen</p>\r\n\r\n	<p>- Nhựa mạ crom<br />\r\n	- 2 cấp độ</p>\r\n	</li>\r\n	<li>\r\n	<p>Điều chỉnh nhiệt độ</p>\r\n\r\n	<p>Nhiều mức độ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiện ích</p>\r\n\r\n	<p>- Bộ ổn định nhiệt TBST<br />\r\n	- Cảm biến lưu lượng nước<br />\r\n	- Thiết kế chống tia nước phun<br />\r\n	- Rơ le chống quá nhiệt<br />\r\n	- Bảng điều khiển : Tiếng Anh nút nhấn, xoay<br />\r\n	- Nhiệt độ nước min-max : 30-50 độ C<br />\r\n	- Tiêu chuẩn chống thấm nước : IP25</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:08:45', '2024-06-04 00:09:20'),
(22, 9, 'be/img/product/may-nuoc-nong-p_main_447_1020.png-1717485216.webp', 'Máy Nước Nóng Trực Tiếp Panasonic DH-4UP1VS', 9, 7, 6200000, '|may-nuoc-nong-p_multi_1_239_1020.png-1717485246.webp|may-nuoc-nong-p_multi_0_803_1020.png-1717485246.webp|may-nuoc-nong-p_main_447_1020.png-1717485246.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Công suất : 4500W</li>\r\n	<li>Cảm biến lưu lượng nước</li>\r\n	<li>Cầu dao chống rò điện (ELB) tích hợp</li>\r\n	<li>Kháng khuẩn bằng Vật liệu tinh thể Ag+</li>\r\n	<li>Bảo vệ trước các mối nguy từ lửa và điện với 9 tính năng an toàn</li>\r\n	<li>Chế độ phun nhẹ nhàng và dễ chịu với vòi sen 3 chế độ</li>\r\n</ul>', '<ul>\r\n	<li><strong>Tính Năng Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Trực tiếp</p>\r\n	</li>\r\n	<li>\r\n	<p>Bơm trợ lực</p>\r\n\r\n	<p>Có kèm bơm trợ lực</p>\r\n	</li>\r\n	<li>\r\n	<p>Chống giật</p>\r\n\r\n	<p>Cầu dao chống rò điện (ELB) tích hợp</p>\r\n	</li>\r\n	<li>\r\n	<p>Bình chứa</p>\r\n\r\n	<p>Không có bình chứa</p>\r\n	</li>\r\n	<li>\r\n	<p>Vòi sen</p>\r\n\r\n	<p>3 chế độ :<br />\r\n	- Bình thường<br />\r\n	- Phun rộng<br />\r\n	- Phun điểm</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiện ích</p>\r\n\r\n	<p>- Vỏ chống nước chuẩn IPX2<br />\r\n	- Bộ gia nhiệt bằng đồng độ bền cao<br />\r\n	- Công tắc bật/tắt với một nút bấm<br />\r\n	- Kết cấu cách điện chuẩn IPX2<br />\r\n	- Cầu dao chống rò điện (ELB) tích hợp<br />\r\n	- Cảm biến lưu lượng nước<br />\r\n	- Vật liệu che phủ chống cháy<br />\r\n	- Điều chỉnh nhiệt bằng tay<br />\r\n	- Tự động ngắt nhiệt<br />\r\n	- Chức năng bật/tắt bơm<br />\r\n	- Vật liệu kháng khuẩn bằng ion Ag+</p>\r\n	</li>\r\n	<li><strong>Thông số kỹ thuật</strong></li>\r\n	<li>\r\n	<p>Dòng điện</p>\r\n\r\n	<p>220 V - 50 Hz</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:13:36', '2024-06-04 00:14:21'),
(23, 3, 'be/img/product/may-rua-chen-es_main_175_1020.png-1717485395.webp', 'Máy rửa chén Electrolux ESF6010BW 8 bộ', 0, 15, 9900000, '|may-rua-chen-es_multi_1_403_1020.png-1717485413.webp|may-rua-chen-es_multi_0_36_1020.png-1717485413.webp|may-rua-chen-es_main_175_1020.png-1717485413.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Số bộ chén đĩa: 8 bộ tiêu chuẩn châu âu</li>\r\n	<li>Hệ thống sấy:&nbsp;Sấy nhiệt dư</li>\r\n	<li>Lượng nước tiêu thụ: ~ 8.4 lit</li>\r\n	<li>Loại bảng điều khiển: Nút nhấn</li>\r\n	<li>Mức độ tiếng ồn (dBA): 60</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông Tin Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Máy rửa chén</p>\r\n	</li>\r\n	<li>\r\n	<p>Công suất</p>\r\n\r\n	<p>1480W</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>- 80 - 90%<br />\r\n	- Lưu ý : Sau khi rửa - máy có đọng nước ở dàn rửa và thành trong của máy, có thể mở hé cửa để hơi nước nóng bay ra và máy sẽ khô hơn</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiêu thụ nước</p>\r\n\r\n	<p>Khoảng 8 lít/lần rửa</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chén bát rửa được</p>\r\n\r\n	<p>2 bữa ăn Việt (8 bộ Châu Âu)</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ồn</p>\r\n\r\n	<p>60 dB</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chương trình hoạt động:</p>\r\n\r\n	<p>6 chương trình</p>\r\n	</li>\r\n	<li>\r\n	<p>Công nghệ rửa</p>\r\n\r\n	<p>Rửa nước nóng</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:16:35', '2024-06-04 00:16:53'),
(24, 3, 'be/img/product/may-rua-chen-be_main_597_1020.png-1717485490.webp', 'Máy Rửa Chén Beko DVN05320W - Châu Âu', 4, 67, 17999000, '|may-rua-chen-be_multi_1_871_1020.png-1717485509.webp|may-rua-chen-be_multi_0_210_1020.png-1717485509.webp|may-rua-chen-be_main_597_1020.png-1717485509.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Công suất hoạt động 1800W</li>\r\n	<li>Màn hình LED, nút xoay dễ sử dụng</li>\r\n	<li>Chất liệu: Thép không gỉ</li>\r\n	<li>Lượng nước tiêu thụ : 12.9 Lít</li>\r\n	<li>5 chương trình rửa tiện lợi cho người sử dụng</li>\r\n	<li>Khả năng làm sạch tương đương 2 - 3 bữa ăn (13 bộ)</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông Tin Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Máy rửa chén</p>\r\n	</li>\r\n	<li>\r\n	<p>Công suất</p>\r\n\r\n	<p>1800W</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>- 80 - 90%<br />\r\n	- Lưu ý : Sau khi rửa - máy có đọng nước ở dàn rửa và thành trong của máy, có thể mở hé cửa để hơi nước nóng bay ra và máy sẽ khô hơn</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiêu thụ nước</p>\r\n\r\n	<p>12.9 Lít</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chén bát rửa được</p>\r\n\r\n	<p>13 bộ</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ồn</p>\r\n\r\n	<p>49 dB</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chương trình hoạt động:</p>\r\n\r\n	<p>5 chương trình rửa:<br />\r\n	- Rửa tiết kiệm ECO 50 độ C<br />\r\n	- Rửa tăng cường tự động 75 độ C<br />\r\n	- Chương trình Clean &amp; Shine<br />\r\n	- Chương trình Quick &amp; Shine<br />\r\n	- Sấy ít đồ</p>\r\n	</li>\r\n	<li>\r\n	<p>Tính năng an toàn</p>\r\n\r\n	<p>Khóa trẻ em</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:18:10', '2024-06-04 00:18:29'),
(25, 3, 'be/img/product/may-rua-chen-sm_main_307_1020.png-1717485764.webp', 'Máy rửa chén Bosch SMS63L08EA 12 bộ Series 6 - Châu Âu', 0, 39, 23000000, '|may-rua-chen-sm_multi_3_847_1020.png-1717485784.webp|may-rua-chen-sm_multi_2_994_1020.png-1717485784.webp|may-rua-chen-sm_multi_1_300_1020.png-1717485784.webp|may-rua-chen-sm_multi_0_880_1020.png-1717485784.webp|may-rua-chen-sm_main_307_1020.png-1717485784.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Số bộ chén đĩa:&nbsp;12 bộ tiêu chuẩn châu âu</li>\r\n	<li>Hệ thống sấy: Eco</li>\r\n	<li>Lượng nước tiêu thụ: ~11.8 lít</li>\r\n	<li>Loại bảng điều khiển: Nút nhấn</li>\r\n	<li>Mức độ tiếng ồn (dBA): 52</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông Tin Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Máy rửa chén</p>\r\n	</li>\r\n	<li>\r\n	<p>Công suất</p>\r\n\r\n	<p>2400W</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>- 80 - 90%<br />\r\n	- Lưu ý : Sau khi rửa - máy có đọng nước ở dàn rửa và thành trong của máy, có thể mở hé cửa để hơi nước nóng bay ra và máy sẽ khô hơn</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiêu thụ nước</p>\r\n\r\n	<p>Khoảng 11.8 lít/lần rửa</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chén bát rửa được</p>\r\n\r\n	<p>3 - 4 bữa ăn Việt (12 bộ Châu Âu)</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ồn</p>\r\n\r\n	<p>52 dB</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chương trình hoạt động:</p>\r\n\r\n	<p>6 chương trình</p>\r\n	</li>\r\n	<li>\r\n	<p>Công nghệ rửa</p>\r\n\r\n	<p>VarioSpeed - tiết kiệm 50% thời gian rửa</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:22:44', '2024-06-04 00:23:04'),
(26, 3, 'be/img/product/may-rua-chen-53_main_178_1020.png-1717485901.webp', 'Máy rửa chén Hafele 538.21.190 6 bộ', 2, 55, 8790000, '|may-rua-chen-53_multi_1_129_1020.png-1717485971.webp|may-rua-chen-53_multi_0_37_1020.png-1717485971.webp|may-rua-chen-53_main_178_1020.png-1717485971.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Số bộ chén đĩa: 6 bộ chén tiêu chuẩn châu âu</li>\r\n	<li>Hệ thống rửa:&nbsp;Chế độ ECO</li>\r\n	<li>Lượng nước tiêu thụ: ~6.5 Lít:&nbsp;</li>\r\n	<li>Loại bảng điều khiển: Nút nhấn</li>\r\n	<li>Mức độ tiếng ồn (dBA): 49</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông tin kỹ thuật</strong></li>\r\n	<li>\r\n	<p>Kích thước (C*R*S)</p>\r\n\r\n	<p>438x550x500 mm</p>\r\n	</li>\r\n	<li>\r\n	<p>Dung tích</p>\r\n\r\n	<p>6 bộ đồ ăn tiêu chuẩn châu âu</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>- 80 - 90%<br />\r\n	- Lưu ý : Sau khi rửa - máy có đọng nước ở dàn rửa và thành trong của máy, có thể mở hé cửa để hơi nước nóng bay ra và máy sẽ khô hơn</p>\r\n	</li>\r\n	<li>\r\n	<p>Chế độ rửa</p>\r\n\r\n	<p>Chế độ ECO</p>\r\n	</li>\r\n	<li>\r\n	<p>Phương pháp rửa</p>\r\n\r\n	<p>Bằng nhiệt (Phun hơi nóng và khô)</p>\r\n	</li>\r\n	<li>\r\n	<p>Phương pháp sấy</p>\r\n\r\n	<p>45 -77 độ C</p>\r\n	</li>\r\n	<li>\r\n	<p>Chương trình rửa</p>\r\n\r\n	<p>6 chương trình</p>\r\n	</li>\r\n	<li>\r\n	<p>Lương nước tiêu thụ</p>\r\n\r\n	<p>6,5 Lít</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:25:01', '2024-06-04 00:26:11'),
(27, 3, 'be/img/product/may-rua-chen-do_main_765_1020.png-1717486099.webp', 'Máy Rửa Chén Độc Lập HAFELE HDW-F60EB', 3, 12, 16700000, '|may-rua-chen-do_multi_1_456_1020.png-1717486118.webp|may-rua-chen-do_main_765_1020.png-1717486118.webp|may-rua-chen-do_multi_2_342_1020.png-1717486118.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Tổng công suất : 1930W</li>\r\n	<li>Màn hình hiển thị LED</li>\r\n	<li>Điều khiển bằng nút nhấn</li>\r\n	<li>Chức năng làm khô tăng cường</li>\r\n	<li>8 chương trình rửa vô cùng tiện lợi</li>\r\n	<li>Dung tích : khoảng &nbsp;14 bộ đồ ăn Châu Âu</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông Tin Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Máy rửa chén</p>\r\n	</li>\r\n	<li>\r\n	<p>Công suất</p>\r\n\r\n	<p>1930W</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>- 80 - 90%<br />\r\n	- Lưu ý : Sau khi rửa - máy có đọng nước ở dàn rửa và thành trong của máy, có thể mở hé cửa để hơi nước nóng bay ra và máy sẽ khô hơn</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiêu thụ nước</p>\r\n\r\n	<p>Khoảng 12 lít/lần rửa</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chén bát rửa được</p>\r\n\r\n	<p>3 - 4 bữa ăn Việt (14 bộ châu Âu)</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ồn</p>\r\n\r\n	<p>42 dB</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chương trình hoạt động:</p>\r\n\r\n	<p>8 chương trình:<br />\r\n	- Rửa tự động<br />\r\n	- Rửa mạnh<br />\r\n	- Rửa mạnh<br />\r\n	- Rửa tiết kiệm<br />\r\n	- Rửa ly tách dễ vỡ<br />\r\n	- Rửa 90 phút<br />\r\n	- Rửa nhanh ( không cần làm khô )<br />\r\n	- Rửa ngâm tráng qua nước lạnh ( để rửa sau )</p>\r\n	</li>\r\n	<li>\r\n	<p>Công nghệ rửa</p>\r\n\r\n	<p>Rửa nước nóng</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:28:19', '2024-06-04 00:28:38'),
(28, 3, 'be/img/product/may-rua-chen-pa_main_970_1020.png-1717486182.webp', 'Máy Rửa Chén Panasonic NP-TH1WEVN', 8, 5, 15400000, '|may-rua-chen-pa_multi_2_40_1020.png-1717486245.webp|may-rua-chen-pa_multi_1_527_1020.png-1717486245.webp|may-rua-chen-pa_main_970_1020.png-1717486245.webp|', '<p>Tính năng nổi bật:</p>\r\n\r\n<ul>\r\n	<li>Công suất hoạt động mạnh mẽ lên đến 1170W</li>\r\n	<li>Mức tiêu thụ nước: 9.9 Lít&nbsp;(Chương trình Eco)</li>\r\n	<li>Số chén bát rửa được: 6 bộ Việt Nam (tương đương 8 bộ Châu Âu)</li>\r\n	<li>Công nghệ sấy khô bằng khí nóng, giúp bát đĩa &amp; khoang máy khô tối đa</li>\r\n	<li>Chế độ xả bằng nước nóng 80°C giúp loại bỏ cả những vết bẩn dai dẳng</li>\r\n	<li>Cửa gập thiết kế độc quyền phù hợp cho những không gian bếp nhỏ</li>\r\n</ul>', '<ul>\r\n	<li><strong>Thông Tin Sản Phẩm</strong></li>\r\n	<li>\r\n	<p>Loại máy</p>\r\n\r\n	<p>Máy rửa chén</p>\r\n	</li>\r\n	<li>\r\n	<p>Công suất</p>\r\n\r\n	<p>1170W</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiệu quả sấy khô</p>\r\n\r\n	<p>95 - 100%</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiêu thụ nước</p>\r\n\r\n	<p>9.9 Lít (Chương trình Eco)</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chén bát rửa được</p>\r\n\r\n	<p>6 bộ Việt Nam (tương đương 8 bộ châu Âu)</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ồn</p>\r\n\r\n	<p>58dB</p>\r\n	</li>\r\n	<li>\r\n	<p>Số chương trình hoạt động:</p>\r\n\r\n	<p>9 chế độ:<br />\r\n	- Cơ bản<br />\r\n	- Chuyên sâu<br />\r\n	- Eco<br />\r\n	- Chăm sóc<br />\r\n	- Chỉ sấy khô<br />\r\n	- Rửa tăng tốc<br />\r\n	- 80°C<br />\r\n	- Hẹn giờ bắt đầu (4 giờ sau)<br />\r\n	- Sấy khô (0,5 giờ, 1 giờ, Không khí, Giữ ấm)</p>\r\n	</li>\r\n	<li>\r\n	<p>Công nghệ rửa</p>\r\n\r\n	<p>- Rửa nước nóng<br />\r\n	- Rửa diệt khuẩn 80 độ C</p>\r\n	</li>\r\n</ul>', '2024-06-04 00:29:42', '2024-06-04 00:30:45');

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
(12, 1, '[{\"id_color\":1,\"quantity\":49}]', '2024-06-02 04:12:46', '2024-06-13 09:07:21'),
(13, 3, '[{\"id_color\":1,\"quantity\":74}]', '2024-06-03 01:26:20', '2024-06-09 14:59:29'),
(14, 4, '[{\"id_color\":1,\"quantity\":\"30\"}]', '2024-06-03 01:28:59', '2024-06-03 01:28:59'),
(15, 5, '[{\"id_color\":1,\"quantity\":\"15\"}]', '2024-06-03 01:37:14', '2024-06-03 01:37:14'),
(16, 7, '[{\"id_color\":1,\"quantity\":\"10\"}]', '2024-06-03 01:41:34', '2024-06-03 01:41:34'),
(17, 8, '[{\"id_color\":1,\"quantity\":\"7\"}]', '2024-06-03 01:45:00', '2024-06-03 01:45:14'),
(18, 9, '[{\"id_color\":1,\"quantity\":\"10\"}]', '2024-06-03 02:02:53', '2024-06-03 02:02:53'),
(19, 10, '[{\"id_color\":1,\"quantity\":\"5\"}]', '2024-06-03 03:01:36', '2024-06-03 03:01:36'),
(20, 11, '[{\"id_color\":1,\"quantity\":\"7\"}]', '2024-06-03 03:03:53', '2024-06-03 03:03:53'),
(21, 6, '[{\"id_color\":1,\"quantity\":\"5\"}]', '2024-06-03 03:05:14', '2024-06-03 03:05:14'),
(22, 12, '[{\"id_color\":2,\"quantity\":2},{\"id_color\":1,\"quantity\":\"3\"}]', '2024-06-03 03:07:53', '2024-06-09 09:58:15'),
(23, 13, '[{\"id_color\":2,\"quantity\":9}]', '2024-06-03 21:58:43', '2024-06-13 09:01:21'),
(24, 14, '[{\"id_color\":2,\"quantity\":\"5\"}]', '2024-06-03 22:00:15', '2024-06-03 22:00:15'),
(25, 15, '[{\"id_color\":2,\"quantity\":\"5\"}]', '2024-06-03 22:01:35', '2024-06-03 22:01:35'),
(26, 16, '[{\"id_color\":1,\"quantity\":\"12\"}]', '2024-06-03 22:02:53', '2024-06-03 22:02:53'),
(27, 17, '[{\"id_color\":2,\"quantity\":\"20\"}]', '2024-06-03 23:56:56', '2024-06-03 23:56:56'),
(28, 18, '[{\"id_color\":2,\"quantity\":\"10\"}]', '2024-06-04 00:00:25', '2024-06-04 00:00:25'),
(29, 19, '[{\"id_color\":2,\"quantity\":\"22\"}]', '2024-06-04 00:02:36', '2024-06-04 00:02:36'),
(30, 20, '[{\"id_color\":2,\"quantity\":\"30\"}]', '2024-06-04 00:06:20', '2024-06-04 00:06:20'),
(31, 21, '[{\"id_color\":2,\"quantity\":\"11\"}]', '2024-06-04 00:09:07', '2024-06-04 00:09:07'),
(32, 22, '[{\"id_color\":1,\"quantity\":\"15\"},{\"id_color\":2,\"quantity\":\"15\"}]', '2024-06-04 00:13:55', '2024-06-04 00:13:55'),
(33, 23, '[{\"id_color\":2,\"quantity\":13}]', '2024-06-04 00:16:43', '2024-06-16 09:51:18'),
(34, 24, '[{\"id_color\":2,\"quantity\":\"6\"}]', '2024-06-04 00:18:20', '2024-06-04 00:18:20'),
(35, 25, '[{\"id_color\":6,\"quantity\":7}]', '2024-06-04 00:22:53', '2024-06-13 08:32:29'),
(36, 26, '[{\"id_color\":6,\"quantity\":11}]', '2024-06-04 00:25:31', '2024-06-13 09:01:21'),
(37, 27, '[{\"id_color\":1,\"quantity\":\"5\"}]', '2024-06-04 00:28:26', '2024-06-04 00:28:26'),
(38, 28, '[{\"id_color\":2,\"quantity\":\"15\"}]', '2024-06-04 00:30:33', '2024-06-04 00:30:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id_review` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` smallint(6) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_reply` int(11) NOT NULL,
  `is_update` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id_review`, `id_product`, `id_account`, `fullname`, `rating`, `review`, `id_reply`, `is_update`, `created_at`, `updated_at`) VALUES
(1, 23, 4, 'Nguyễn Đình Minh Quân', 4, 'Đánh giá cao', 0, 0, '2024-06-05 21:11:41', '2024-06-05 21:11:41'),
(2, 23, 4, 'Nguyễn Đình Minh Quân', 4, 'Đánh giá cao', 0, 0, '2024-06-05 21:11:50', '2024-06-05 21:11:50'),
(3, 23, 4, 'Nguyễn Đình Tuấn', 4, 'Sử dụng rất tốt, hài lòng', 0, 0, '2024-06-05 21:14:15', '2024-06-05 21:14:15'),
(4, 23, 4, 'Bó Quách Đạt', 5, 'Hài lòng về sản phẩm này', 0, 0, '2024-06-05 21:15:03', '2024-06-05 21:15:03'),
(5, 23, 4, 'Nguyễn Thị Nga', 1, 'Chất lượng về sản phẩm chưa đạt đúng ý tôi', 0, 0, '2024-06-05 21:15:33', '2024-06-05 21:15:33'),
(6, 23, 4, 'Nguyễn Đình Minh Quân', 3, 'Khá hài lòng', 0, 0, '2024-06-05 21:30:13', '2024-06-05 21:30:13'),
(7, 23, 4, 'Trần Nam Anh', 4, 'Khá thích sản phẩm này', 0, 0, '2024-06-06 07:25:00', '2024-06-06 07:25:00');

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
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

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
-- Chỉ mục cho bảng `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id_favourite`);

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
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

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
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

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
  MODIFY `id_account` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `coupon_user`
--
ALTER TABLE `coupon_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id_favourite` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `fee`
--
ALTER TABLE `fee`
  MODIFY `id_fee` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
