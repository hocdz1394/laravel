-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 14, 2024 lúc 09:26 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myProjectPHP3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'ad', 'Omnis ut quisquam ab et et.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(2, 'dolorem', 'Sed placeat ipsam quasi consequatur nobis pariatur minus.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(3, 'cum', 'In nihil delectus ut.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(4, 'quia', 'Incidunt esse et laudantium sequi voluptatum molestiae.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(5, 'dolorum', 'Quae qui suscipit minima sed.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(6, 'natus', 'Voluptas et quibusdam hic tenetur et accusamus est.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(7, 'nihil', 'Earum esse dolores suscipit qui.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(8, 'aut', 'Debitis quia nihil labore natus pariatur.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(9, 'inventore', 'Ut aliquid iusto atque eos dolores modi.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25'),
(10, 'harum', 'Nulla et cumque ut eum qui consequatur.', NULL, '2024-05-14 08:06:25', '2024-05-14 08:06:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(45, '0001_01_01_000000_create_users_table', 1),
(46, '0001_01_01_000001_create_cache_table', 1),
(47, '0001_01_01_000002_create_jobs_table', 1),
(48, '2024_05_13_122135_create_categories_table', 1),
(49, '2024_05_13_122312_create_product_table', 1),
(50, '2024_05_13_122504_create_carts_table', 1),
(51, '2024_05_13_122515_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `new` int(1) NOT NULL DEFAULT 0,
  `selling` int(1) NOT NULL DEFAULT 0,
  `sold` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `quantity`, `new`, `selling`, `sold`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'ratione', 'hinh1.jpg', 'Fugiat consequatur vero ducimus esse consequatur ducimus.', 663.88, 80, 0, 1, 85, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(2, 'similique', 'hinh2.jpg', 'Temporibus esse deserunt itaque ut.', 478.77, 89, 0, 1, 80, 8, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(3, 'accusantium', 'hinh3.jpg', 'Aut suscipit nesciunt in qui ex.', 823.99, 24, 0, 1, 91, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(4, 'et', 'hinh4.jpg', 'Ut rerum nobis magnam quia cumque incidunt.', 939.51, 5, 1, 0, 5, 5, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(5, 'aut', 'hinh5.jpg', 'Ut est non aut.', 231.43, 71, 1, 0, 10, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(6, 'voluptatem', 'hinh6.jpg', 'Expedita aut cumque et occaecati.', 234.32, 69, 1, 0, 3, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(7, 'repellendus', 'hinh7jpg', 'Ex aut quia voluptatum doloremque reiciendis illo ut.', 70.71, 6, 0, 0, 20, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(8, 'ad', 'hinh8jpg', 'Iure est hic debitis distinctio iste labore ullam.', 973.27, 50, 0, 0, 37, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(9, 'voluptas', 'hinh9jpg', 'Aliquam voluptatem qui ea sunt.', 519.05, 6, 0, 0, 12, 5, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(10, 'perspiciatis', 'hinh10jpg', 'Quisquam numquam tempore commodi nemo dolor velit aut.', 637.27, 74, 0, 0, 64, 3, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(11, 'laborum', 'hinh11jpg', 'Error est et pariatur aut natus.', 457.19, 75, 0, 0, 67, 4, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(12, 'consequuntur', 'hinh12jpg', 'Quia aliquid velit optio culpa quia dignissimos.', 99.18, 18, 0, 0, 13, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(13, 'possimus', 'hinh13.jpg', 'Harum sequi dolores enim.', 467.94, 78, 0, 0, 96, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(14, 'molestiae', 'hinh14jpg', 'Sint sed libero voluptatem.', 25.43, 26, 0, 0, 18, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(15, 'suscipit', 'hinh15jpg', 'Ducimus pariatur corrupti omnis accusantium laborum.', 479.50, 97, 0, 0, 33, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(16, 'laborum', 'hinh16jpg', 'Omnis exercitationem iure ipsam animi est et.', 534.29, 89, 0, 0, 72, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(17, 'quis', 'hinh17jpg', 'Quos magnam mollitia sapiente inventore.', 831.95, 97, 0, 0, 91, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(18, 'officiis', 'hinh18jpg', 'Asperiores sed doloribus esse.', 518.10, 49, 0, 0, 11, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(19, 'totam', 'hinh39.jpg', 'Corporis libero vel nemo.', 956.47, 71, 0, 0, 93, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(20, 'fugiat', 'hinh20jpg', 'Delectus veniam ratione nam consectetur blanditiis reprehenderit minima non.', 159.93, 34, 0, 0, 50, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(21, 'voluptatem', 'hinh21jpg', 'Magni similique quas debitis minus nihil.', 33.78, 51, 0, 0, 80, 5, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(22, 'ducimus', 'hinh22jpg', 'Iusto qui alias quisquam mollitia.', 752.44, 41, 0, 0, 1, 4, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(23, 'vero', 'hinh23jpg', 'Possimus omnis voluptates sunt est.', 129.75, 21, 0, 0, 42, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(24, 'dolor', 'hinh24jpg', 'Qui et ad fugiat asperiores numquam.', 363.55, 70, 0, 0, 34, 5, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(25, 'sit', 'hinh25jpg', 'Vitae hic aut autem corrupti.', 580.35, 93, 0, 0, 67, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(26, 'temporibus', 'hinh26jpg', 'Praesentium quisquam repellendus ipsa.', 835.62, 8, 0, 0, 16, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(27, 'perferendis', 'hinh27jpg', 'Inventore et aut corrupti qui atque.', 434.58, 76, 0, 0, 70, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(28, 'ut', 'hinh28.jpg', 'Dolorem maiores veniam consequatur necessitatibus itaque natus nemo.', 530.87, 93, 0, 0, 94, 8, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(29, 'aspernatur', 'hinh29jpg', 'Earum et aliquid voluptas voluptatem id.', 157.96, 32, 0, 0, 78, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(30, 'at', 'hinh30jpg', 'Numquam neque accusantium rerum culpa ipsa omnis esse iste.', 444.69, 23, 0, 0, 8, 4, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(31, 'voluptatem', 'hinh31jpg', 'Facere dolorem culpa id nulla sed.', 357.00, 13, 0, 0, 19, 3, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(32, 'cumque', 'hinh32jpg', 'Dignissimos commodi vero ea eaque eos.', 65.80, 43, 0, 0, 13, 3, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(33, 'autem', 'hinh33jpg', 'Earum minima corporis natus dolorem corporis qui.', 415.28, 9, 0, 0, 36, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(34, 'et', 'hinh34jpg', 'Explicabo officia praesentium quasi et.', 127.89, 90, 0, 0, 20, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(35, 'ratione', 'hinh35jpg', 'Commodi vel fugiat omnis voluptas voluptatem.', 277.60, 54, 0, 0, 31, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(36, 'molestiae', 'hinh36jpg', 'Voluptas ipsa pariatur praesentium iure saepe.', 308.57, 29, 0, 0, 26, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(37, 'doloremque', 'hinh37jpg', 'Tempore ratione ut quis perspiciatis quaerat.', 822.74, 86, 0, 0, 15, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(38, 'soluta', 'hinh38jpg', 'Quia nihil sint quos ut vel.', 407.34, 59, 0, 0, 73, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(39, 'quisquam', 'hinh39jpg', 'Quia quasi reiciendis dolor quis laborum non molestias.', 517.02, 1, 0, 0, 54, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(40, 'blanditiis', 'hinh40jpg', 'Dolorem earum in delectus qui ut numquam.', 595.29, 50, 0, 0, 34, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(41, 'consequatur', 'hinh41jpg', 'Est tenetur voluptatem aliquid quia eum ut et.', 972.63, 93, 0, 0, 7, 6, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(42, 'ipsum', 'hinh42jpg', 'Vel recusandae illum qui rerum.', 680.13, 29, 0, 0, 13, 5, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(43, 'pariatur', 'hinh43jpg', 'Autem blanditiis labore fugit laudantium labore.', 706.02, 45, 0, 0, 5, 1, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(44, 'amet', 'hinh44jpg', 'Ut et eum et fugit est doloremque.', 425.21, 72, 0, 0, 60, 6, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(45, 'aut', 'hinh45jpg', 'Minus voluptatem dolor numquam vel corporis et illum.', 294.22, 21, 0, 0, 5, 7, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(46, 'quisquam', 'hinh46jpg', 'Vitae dolores optio sit nulla.', 324.20, 69, 0, 0, 79, 10, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(47, 'veritatis', 'hinh47jpg', 'Aut consequatur eaque suscipit minus sunt.', 109.98, 50, 0, 0, 54, 9, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(48, 'itaque', 'hinh48jpg', 'Consequatur cumque qui tempore aut qui quo praesentium.', 365.68, 92, 0, 0, 7, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(49, 'voluptatum', 'hinh49jpg', 'Numquam quidem nemo ut magni.', 422.17, 38, 0, 0, 19, 2, '2024-05-14 08:06:43', '2024-05-14 08:06:43'),
(50, 'earum', 'hinh50jpg', 'Voluptatem quae iusto sed et sint qui sint.', 337.66, 77, 0, 0, 41, 3, '2024-05-14 08:06:43', '2024-05-14 08:06:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mRv7yyod9yu4EvBhLNUz1ZdPyvBTHgJH3KYUTqIT', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHE4NUFMWXBuMzgyeDZlUTl6b0d4d0pycTIxTkdITG9vc2pUZllLSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0ZGV0YWlsLzI4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1716173565),
('ozlRQ8lDAdCM1H32TiWab3EGA8upu3JAOSblbTNz', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibE5TQlZWSnlMSVVOS0dLREFTUEZuZXhXdEtvYVB3a2VWR3pyT1c0ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0ZGV0YWlsLzEzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1715928516),
('P2BZIQ0rGtmYjOE91CPiqv3K15VnygBCYB0HFwmI', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWRVcnFSdks4UWZ4cktUV3BETlBQQkJQd1hKZjdsN3VyU3JZVVJaTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0ZGV0YWlsLzEzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1715919465);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
