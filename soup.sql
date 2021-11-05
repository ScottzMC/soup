-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 02:49 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soup`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`, `image`, `created_time`, `created_date`) VALUES
(1, 'Well-Preserved-approach-for-Sweets', ' I looove Hand Pies. Hand Pies are amazing pastries made with pie crust with either sweet or savory filling, perfect for any time of the day. They are very easy to put together, you can prepare the dough in advance and have it ready for whenever you are craving for some delicious snacks for entire day. \r\n\r\n \r\n\r\nFor this recipe I’ve chosen a Nutella and Banana filling with a bit of crunch coming from the toasted hazelnuts. With an irresistible flavored filling, crunchy hazelnuts and a flaky buttery pie crust these hand pies are really out of this world. \r\n\r\n \r\n\r\nYou can choose each time a different filling, there are so many options you can never get bored of these. Apples, berries, chocolate, peanut butter, cheese, various savory fillings… hard not to fall in love with them. Hope you’ll give them a try.', 'post01.jpg', 0, '2018-10-05 17:43:13'),
(2, 'Finely-Delivered-Chicken-Pasta', 'Well deserved with more than baked Pasta, the new Michelin 3 star dish has taken the cuisine world by storm and its a high rate by top chefs world wide. A simple dish with Chicken as its base has a high unami that can knock any customer of there seats. ', 'post02.jpg', 0, '2018-10-12 14:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_title`, `fullname`, `email`, `comment`, `created_time`, `created_date`) VALUES
(1, 'well-preserved-approach-for-sweets', 'Scott  Mike', 'scottmike275@gmail.com', 'I love sweet food and i hope one day i can create a program to bake Sweet and Chocolate foods for me though.', 1538764241, '2018-10-05 19:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_details`
--

CREATE TABLE `checkout_details` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(30) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_details`
--

INSERT INTO `checkout_details` (`id`, `firstname`, `surname`, `email`, `telephone`, `address`, `state`, `created_time`, `created_date`) VALUES
(4, 'Scott', 'Nnaghor', 'scottmike275@gmail.com', '08094277846', '5 Abibat Ajose, Ogudu', 'Lagos', 1538661752, '2018-10-04 15:02:32'),
(5, '', '', 'mikasa@gmail.com', '', '', '', 1540036815, '2018-10-20 13:00:15'),
(6, '', '', 'mike@gmail.com', '', '', '', 1540039256, '2018-10-20 13:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `menu_food`
--

CREATE TABLE `menu_food` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_food`
--

INSERT INTO `menu_food` (`id`, `title`, `type`, `price`, `image`, `created_time`, `created_date`) VALUES
(1, 'Big-Jelly-Burger', 'Burgers', 800, 'product-burger.jpg', 1539951595, '2018-10-06 15:08:17'),
(2, 'Chicken-Burger', 'Burgers', 1200, 'product-chicken-burger.jpg', 1539952095, '2018-10-06 15:08:17'),
(3, 'Spaghetti-Pasta', 'Pasta', 700, 'product-pasta.jpg', 1539952595, '2018-10-06 17:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_food_type`
--

CREATE TABLE `menu_food_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_food_type`
--

INSERT INTO `menu_food_type` (`id`, `type`, `banner`) VALUES
(1, 'Burgers', 'menu-sample-burgers.jpg'),
(2, 'Pasta', 'menu-sample-pasta.jpg'),
(3, 'Pizza', 'menu-sample-pizza.jpg'),
(4, 'Sushi', 'menu-sample-sushi.jpg'),
(5, 'Desserts', 'menu-sample-dessert.jpg'),
(6, 'Drinks', 'menu-sample-drinks.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `delivery_time` varchar(30) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `title`, `type`, `quantity`, `price`, `image`, `customer_email`, `delivery_time`, `payment_type`, `status`, `created_time`, `created_date`) VALUES
(1, 'BUYCDVXA13', 'Spaghetti- Pasta', 'Pasta', 1, 700, 'product-pasta.jpg', 'scottmike275@gmail.com', 'As Fast As Possible', 'Cash', 'Cancelled', 1539457541, '2018-10-13 20:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `subscribe` varchar(20) NOT NULL,
  `created_time` int(100) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `subscribe`, `created_time`, `created_date`) VALUES
(4, 'scottmike275@gmail.com', '$2a$08$4AYxqfGR4BXbqbPpJFgKnuzX8T2UOwf/Xt21jdAYRYv/LRSnYjEEK', 'Admin', 'Unsubscribed', 1538661752, '2018-10-04 15:02:32'),
(5, 'mikasa@gmail.com', '$2a$08$F5kqkHBQ2RzPWyBOo43ZGeWKroD4NuvBxtf5kRc5naZLe.YYqxZvm', 'Food', 'Unsubscribed', 1540036815, '2018-10-20 13:00:15'),
(6, 'mike@gmail.com', '$2a$08$HC.pCgFp4XkbTaCJGeTWLOtCrQRxRPh5z29ryGqRIbX1e8CQGR8nK', 'Publishing', 'Unsubscribed', 1540039256, '2018-10-20 13:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_food`
--
ALTER TABLE `menu_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_food_type`
--
ALTER TABLE `menu_food_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout_details`
--
ALTER TABLE `checkout_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_food`
--
ALTER TABLE `menu_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_food_type`
--
ALTER TABLE `menu_food_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
