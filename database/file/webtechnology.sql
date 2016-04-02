-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2016 at 11:34 AM
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
('danghung3136@gmail.com', 'bbbed6d3afcd33bf22cec74626fbc807377eff2824424039ffd8330fa8ced10f', '2016-03-27 01:19:05'),
('demo10@gmail.com', '3gLfQemUqae5KRtvXxbCUc9vmy97z9', '0000-00-00 00:00:00'),
('demo8@gmail.com', 'LpiE6znpiaFekpTTXixeb1qLnNEfuW', '0000-00-00 00:00:00'),
('thanhtung.tvg95@gmail.com', '4as2tApEt0Ssds83IvQFIe2awXb8PP', '0000-00-00 00:00:00'),
('khanhnd@gmail.com', 'Axx3MfccZbeuk85yiJqsdpEzAx0fu0kC', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `fullname`, `phonenumber`, `address`, `company`, `avatar`, `level`, `actived`, `verification_code`, `remember_token`) VALUES
(1, 'Admin', 'danghung3136@gmail.com', '$2y$10$QE2zOFTbA6nXhJXa4OopreUE0D5BrD4cRCH3ChhvMOh9GerUjzzbO', 1, 'Đặng Văn Hùng', 123456789, 'Hai Bà Trưng-Hà Nội-Việt Nam', 'Công ty CNTT', '20160318_095245.jpg', 2, 1, '', 'Gavp2ngueV8JUkiuDKtkUJNIycVN0f7h1HPEolykVHzkH3LSwvPPDUa3WoQ2'),
(28, 'demo10', 'demo10@gmail.com', '$2y$10$rwgpvHaDSFmo.xE5Eue1/.uZKd9g77lA7XKFaNO4Ff5rCLQ9fbQr6', 1, 'demo10', 1234567890, 'demo10-demo10-demo10', 'Công ty đại diện', '20160123_090949.jpg', 1, 1, '', 'r4V1F3sSOjS4YzJVcxYUL2AcILqZrVn2EvaBIOh0ohn0Tw6DCihIgTQS527u'),
(30, 'demo9', 'demo8@gmail.com', '$2y$10$m3w6quO9PtcjhVSfxhlzouS3xwryQWlH4PwiTq1tIh.DBHhihqxTK', 1, 'demo9', 1234567890, 'demo9-demo9-demo9', 'Công ty đại diện 9', '20160127_075710.jpg', 1, 0, 'bRlTTI1adoHC0jqGWXaf8i73j1xpKZ', 'NulNtvpJKJ3g6aRY1Ic7XxjsXvJFnE0hC8L65E5O'),
(32, 'demo2', 'thanhtung.tvg95@gmail.com', '$2y$10$G2PjOR2n8L1ugf55TVshU.pruM768iX32v9j28IgkRgNhuXIHk1zW', 1, 'demo2', 1234567890, 'demo-demo-demo', 'Công ty đại diện', '20160127_075710.jpg', 1, 1, '', 'Ch3Rsg1HSVb5Y8E7bgVMsInU5viooQynqlTZDoGC5XGpjoG96DMiOH6ogMrm'),
(34, 'khanhnd', 'khanhnd@gmail.com', '$2y$10$egpx.31Vf1toySjSm/lxxOLNpiTpIj.DgFHNeRiLIlTNEBk4FYsPO', 1, 'Nguyễn Duy Khánh', 1234567890, 'Hai Bà Trưng-Hà Nội', '', '20160316_114529_Pano.jpg', 2, 1, '', 'a8gJGZ2OO6YsUCUvdniyFzhQ5Tg8VrdwkvRN6I2i');

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
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
