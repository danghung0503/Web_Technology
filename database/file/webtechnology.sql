-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 01:44 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtechnology`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_productgroup` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_details`
--

CREATE TABLE IF NOT EXISTS `image_details` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_17_131511_create_contacts_table', 2),
('2016_03_17_132631_create_product_groups_table', 3),
('2016_03_17_161014_create_brands_table', 4),
('2016_03_17_163830_create_products_table', 5),
('2016_03_17_220526_create_image_details_table', 6),
('2016_03_17_224109_create_customers_table', 7),
('2016_03_17_224824_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_customer` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('danghung3136@gmail.com', 'bbbed6d3afcd33bf22cec74626fbc807377eff2824424039ffd8330fa8ced10f', '2016-03-27 01:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `id_brand` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amountsold` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_new` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE IF NOT EXISTS `product_groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `actived` tinyint(4) NOT NULL,
  `verification_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `fullname`, `phonenumber`, `address`, `company`, `avatar`, `level`, `actived`, `verification_code`, `remember_token`) VALUES
(1, 'Admin', 'danghung3136@gmail.com', '$2y$10$h6yTc2rPfbTZR8oQtOjI8OWdBL9iTcW6H7WX5vjmkyMM0E0L.B7HS', 1, 'Đặng Văn Hùng', 123456789, 'Hai Bà Trưng-Hà Nội-Việt Nam', '', '2016-03-14 (8).png', 2, 1, 'KDSKLFIFKVNKDSKFLSFSKLJFIDKFSDFSDFSĐFFSDFDFSFĐ', 'P0RNfq61X2m4Hlyo6RO6V8SzzICfEI6jbim0eBBP8nwGUB3jeMGwbEWYTssE'),
(2, 'member', '20131852@student.husts.edu.vn', '$2y$10$ZwM0RbfgKLP9SiUaSq/hOuQSdJLRo7.7TESKXo4iDdMYFS.OJkSzG', 1, 'Nguyễn Member', 987654321, 'Hà Nội-Việt Nam', 'Công ty Member', '2016-03-23 (5).png', 1, 0, 'DJFSDKFSDJFUEFKDKFJSKFKSUFJKDJFJSKFKSJFKSDFSD', 'QoQohWojaHuCpJQfZMGK7ahHeCf3cJMrhVXlVoCqwKgy33DPPovkpHiaF8rd'),
(3, 'demo1', '20131852@students.hust.edu.vn', '$2y$10$xd.YE245P8ITa6WevpGUAOzv5x.1y9Hh8.9XwBzEQnFrL/nzLDXSu', 1, 'Demo', 123456789, 'demo-demo-demo', '', '2016-03-14 (3).png', 1, 0, 'SDFLSKKFLKFKKFJĐÌKSDKFJDSDÌKKFLSÌKKKDLfgkfllgfgfgFSDF', 'Z0k6J8eh0EFVUioF2TY5nTJb1daIDdYKxlkwxZgd'),
(4, 'demo3', 'demo3@gmail.com', '$2y$10$KTVYr/5jnlcY6ZZDI0diMevnJuNVBahcR8eDKZ6e9T0O5muy15OOC', 1, 'demo3', 1234567890, 'demo3-demo3-demo3', '', '2016-03-20 (3).png', 1, 0, 'DFJSIFKUJFHIFDIFKFISFJSIFJSDIFKSDSIFSJDFKSJDFfgdfgfg', 'lvhvk1LWsn7xLFzFFHzZ7Z7xcl7f1sdLODilCQKgclOugl3hREaB3SWg4iEb'),
(5, 'demo4', 'demo4@gmail.com', '$2y$10$KrzfKpvwiraBTBv0P5aQAuYREayQ4SjRmpMDkONaRyYgWo0Pg3mUC', 1, 'Demo4', 1234567890, 'demo4-demo4-demo4', '', 'success.png', 1, 0, 'CMFKKDFSDIFKDKFKSSOFKFFLDLFISDKFSDSKFGFGLGLL', 'Z0k6J8eh0EFVUioF2TY5nTJb1daIDdYKxlkwxZgd'),
(6, 'demo5', 'demo5@gmail.com', '$2y$10$eC1KWN66xpkpaa1UzZC3wuWPfXMTHqEdofpe8TzOLYkAjsJ9XMfDy', 1, 'Demo5', 1234567890, 'demo5-demo5-demo5', '', '2016-03-18.png', 1, 0, 'DKFKOSDIFISKFEEIFSKDKFLSDLFSIDFKWEJFISDKFSSI', 'Z0k6J8eh0EFVUioF2TY5nTJb1daIDdYKxlkwxZgd'),
(7, 'demo6', 'demo6@gmail.com', '$2y$10$jLVv5Q9B72o0UWBzaVQ6leY9uvUF6pV1ZCLEvoBXXBKxEMcgcsRmG', 1, 'Demo6', 1234567890, 'demo6-demo6-demo6', '', '2016-03-18.png', 1, 0, 'DFJSDIFUFDKFJSDFK.LKVMXCLVKSDSDKLFSFLGLĐLGIFF', 'Z0k6J8eh0EFVUioF2TY5nTJb1daIDdYKxlkwxZgd'),
(8, 'demo7', 'demo7@gmail.com', '$2y$10$BYEzRydpZo/dWzWnP9mhU.UJ4xLQ4521eS83AtabB1DNLWhHcGjna', 1, 'Demo7', 1234567890, 'demo7-demo7-demo7', '', '2016-03-14 (2).png', 1, 0, 'FDGKOGODFUGEJOLDLFSDJSDFDIFKDFIKFDLFLDLKFKSFD', 'Z0k6J8eh0EFVUioF2TY5nTJb1daIDdYKxlkwxZgd'),
(9, 'demo8', 'demo8@gmail.com', '$2y$10$vf86Kkoa1uRZMK5TsYCZMeXsBNTXgS3I5m6dURfdjeKH.lH1awt5S', 1, 'demo8', 1234567890, 'demo8-demo8-demo8', '', '', 1, 0, 'SKFISDKFWELRLKSDKFLĐFHSDFÚDÌKFEELSIFSFLDFIDDKF', 'gBvKEu8RnYhUpdY9WiZ4ifk8qIq385wh3R5CUAdzImknfjv0RP73SVI5vNGl'),
(25, 'demo9', '20131852@student.hust.edu.vn', '$2y$10$DpPzhAkreVFrRciS6/IP4eVz16880i3zdPVXd1IBokzOFQHrq3zqy', 1, 'demo9', 1234567890, 'demo9-demo9-demo9', '', '', 1, 1, '', 'J0jEr4qFKqy2AzfyyQ7Z8RfnLNUj3er570y6FOVcDkF9vK2VhocWb926ClS8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`), ADD KEY `brands_id_productgroup_foreign` (`id_productgroup`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_details`
--
ALTER TABLE `image_details`
  ADD PRIMARY KEY (`id`), ADD KEY `image_details_id_product_foreign` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_customer`,`id_product`), ADD KEY `orders_id_product_foreign` (`id_product`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD KEY `products_id_brand_foreign` (`id_brand`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_details`
--
ALTER TABLE `image_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
ADD CONSTRAINT `brands_id_productgroup_foreign` FOREIGN KEY (`id_productgroup`) REFERENCES `product_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_details`
--
ALTER TABLE `image_details`
ADD CONSTRAINT `image_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`),
ADD CONSTRAINT `orders_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
