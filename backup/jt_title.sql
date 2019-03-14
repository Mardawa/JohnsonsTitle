-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2019 at 12:07 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jt_title`
--
CREATE DATABASE IF NOT EXISTS `jt_title` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jt_title`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `stock` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `stock`, `type`) VALUES
(1, 'Signature Shirt', 444, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac luctus augue. Curabitur nec arcu quis sapien rhoncus tincidunt in eu enim. Donec dignissim, dui non auctor aliquam, velit tellus congue sapien, eget lacinia nunc elit quis velit. Vestibulum in metus sit amet arcu laoreet finibus quis sed ex. Nulla congue, nunc ut placerat sodales, urna lectus tempor enim, non pharetra turpis justo vitae urna. Curabitur a placerat massa. Etiam vitae pulvinar odio.', 5, 1),
(2, 'Classic Shirt ', 150, 'Just a classic white shirt.', 30, 1),
(3, 'Generic white shirt ', 123, 'Literally just a white shirt with our logo.', 7, 1),
(4, 'Design 2', 240, 'Our next design ! ', 0, 1),
(5, 'High quality Kashmir', 333, 'Praesent imperdiet accumsan faucibus. Curabitur blandit purus quis nisi dapibus, id pretium ante sollicitudin. Vivamus metus velit, malesuada ut vehicula vel, tincidunt vel felis. Sed aliquam tristique libero, et condimentum augue viverra a. Duis commodo sodales magna, ut lacinia nulla vestibulum eget. Cras suscipit posuere sapien ac ullamcorper. Nam sit amet gravida tellus. Sed pretium elit eu enim luctus bibendum. Donec eu ultrices urna, id lacinia arcu. Nulla ac tincidunt erat, et rutrum elit. Aliquam posuere, diam in bibendum malesuada, ante elit elementum risus, sed pulvinar justo mi vitae mi. Sed tincidunt ultrices arcu, sed imperdiet arcu convallis non. Donec rhoncus vulputate pulvinar. Mauris feugiat vitae nisi non imperdiet. Sed id odio non augue pharetra tempus. Sed sed aliquet neque.', 5, 1),
(6, 'Generic Pants', 179, 'Just a generic pants', 1, 2),
(7, 'THE HOODIE', 444, 'THE FCKING HOODIE', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `fkUsersId` int(11) NOT NULL,
  `fkProductsId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` text,
  `star` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `fkUsersId`, `fkProductsId`, `title`, `review`, `star`, `date`) VALUES
(1, 1, 1, 'BEST SHIRT EVER ! ', 'Yes it\'s really the best shirt I\'ve ever touch ! Indeed.', 5, '2019-03-08 00:00:00'),
(2, 2, 1, 'newTitle', 'newText', 5, '2019-03-09 14:44:46'),
(9, 1, 1, 'Good Quality Shirt', 'some text to fill the space', 0, '2019-03-11 14:24:43'),
(10, 1, 1, 'Testing', 'Some text ! safas', 4, '2019-03-12 17:41:02'),
(11, 1, 1, 'Title 2 ', 'Get some sleep !', 5, '2019-03-13 23:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `type`) VALUES
(1, 'T-Shirt'),
(2, 'Pants'),
(3, 'Hoodie');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

DROP TABLE IF EXISTS `titles`;
CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`) VALUES
(1, 'The Wise Guide'),
(2, 'Le Surfeur du dimanche'),
(5, 'Le Planificateur (ft. Le Pire)'),
(6, 'L\'estimateur'),
(7, 'Sleepy Johnson'),
(8, 'The Runner'),
(9, 'Cable Box Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pswd`, `email`, `date_inscription`) VALUES
(1, 'Pike', '$2y$10$wUDWkMnDgoHPyfFRBHYC9.D6ZyP2TQqSpj0/jeswxRfOt3LDtAuTi', 'Pike@email.com', '2019-02-28'),
(2, 'Test', '$2y$10$tf7mcbvc.nALJI./bFpvkeV..iG2bhu7e9W/IRa51FeQZ3zsgmuL2', 'test@email.com', '2019-03-07'),
(3, 'Kes', '$2y$10$3f2sEPxp.86vesdGpgW8Z.CiLeoggYGG8KNpOyC6vmBqhb2OESWea', 'Kes@gitan.ch', '2019-03-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products-type` (`type`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review-user` (`fkUsersId`),
  ADD KEY `review-products` (`fkProductsId`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products-type` FOREIGN KEY (`type`) REFERENCES `product_type` (`id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `review-products` FOREIGN KEY (`fkProductsId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `review-user` FOREIGN KEY (`fkUsersId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
