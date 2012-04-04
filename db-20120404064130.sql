-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2012 at 06:40 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tshirt_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart-items`
--

CREATE TABLE `cart-items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cart-items`
--

INSERT INTO `cart-items` VALUES(1, 1, 10, 1, 3);
INSERT INTO `cart-items` VALUES(3, 1, 1, 2, 1);
INSERT INTO `cart-items` VALUES(4, 2, 14, 0, 2);
INSERT INTO `cart-items` VALUES(9, 2, 6, 1, 4);
INSERT INTO `cart-items` VALUES(11, 2, 12, 1, 1);
INSERT INTO `cart-items` VALUES(12, 2, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` VALUES(1, 0, 0);
INSERT INTO `carts` VALUES(2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(0, 'Men''s T-Shirts', 'mens-t-shirts', 'T-shirts for men.');
INSERT INTO `categories` VALUES(1, 'Women''s T-Shirts', 'womens-t-shirts', 'T-shirts for women.');
INSERT INTO `categories` VALUES(2, 'Men''s Polo Shirts', 'mens-polo-shirts', 'Polo shirts for men.');
INSERT INTO `categories` VALUES(3, 'Women''s Polo Shirts', 'womens-polo-shirts', 'Polo shirts for women.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES(1, 'Men''s White T-Shirt', 'mens-white-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi. Maecenas non nisi sed ipsum dignissim convallis.\r\n\r\nNullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 12.99, 0, 'male-white-tee.jpg');
INSERT INTO `products` VALUES(4, 'Men''s Red T-Shirt', 'mens-red-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 14.99, 0, 'male-red-tee.jpg');
INSERT INTO `products` VALUES(5, 'Men''s Green T-Shirt', 'mens-green-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 14.99, 0, 'male-green-tee.jpg');
INSERT INTO `products` VALUES(6, 'Women''s White T-Shirt', 'womens-white-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 12.99, 1, 'female-white-tee.jpg');
INSERT INTO `products` VALUES(9, 'Women''s Red T-Shirt', 'womens-red-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 14.99, 1, 'female-red-tee.jpg');
INSERT INTO `products` VALUES(10, 'Women''s Green T-Shirt', 'womens-greet-t-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 14.99, 1, 'female-green-tee.jpg');
INSERT INTO `products` VALUES(11, 'Men''s White Polo Shirt', 'mens-white-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 13.99, 2, 'male-white-polo.jpg');
INSERT INTO `products` VALUES(12, 'Men''s Red Polo Shirt', 'mens-red-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 15.99, 2, 'male-red-polo.jpg');
INSERT INTO `products` VALUES(13, 'Men''s Green Polo Shirt', 'mens-green-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 15.99, 2, 'male-green-polo.jpg');
INSERT INTO `products` VALUES(14, 'Women''s White Polo Shirt', 'womens-white-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 13.99, 3, 'female-white-polo.jpg');
INSERT INTO `products` VALUES(15, 'Women''s Red Polo Shirt', 'womens-red-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 15.99, 3, 'female-red-polo.jpg');
INSERT INTO `products` VALUES(16, 'Women''s Green Polo Shirt', 'womens-green-polo-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum dui sed neque vestibulum sed cursus arcu sagittis. Quisque diam velit, volutpat ac ullamcorper id, auctor vitae leo. Sed porttitor enim sit amet urna lobortis lobortis. Phasellus consectetur elit vitae sem faucibus rhoncus. Vestibulum risus eros, sagittis id faucibus in, lacinia at nisi.\r\n\r\nMaecenas non nisi sed ipsum dignissim convallis. Nullam adipiscing mollis felis, ut convallis mi molestie faucibus. Aliquam dolor nibh, vestibulum at aliquet quis, posuere vitae mauris. In vel felis quam, eu congue dolor. Aenean facilisis turpis vitae elit imperdiet non ornare nibh interdum. Nulla ut justo orci.\r\n\r\nNulla rutrum, ante et rutrum vulputate, metus lacus sodales sem, id tincidunt mi dui id magna. Vestibulum dapibus ipsum sodales dui consectetur vel egestas diam placerat. Integer viverra euismod augue a iaculis. Nam vitae enim et mauris eleifend ullamcorper. In hac habitasse platea dictumst.', 15.99, 3, 'female-green-polo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `size-stock`
--

CREATE TABLE `size-stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `size` int(11) NOT NULL DEFAULT '1',
  `stock` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `size-stock`
--

INSERT INTO `size-stock` VALUES(1, 1, 0, 20);
INSERT INTO `size-stock` VALUES(2, 1, 1, 20);
INSERT INTO `size-stock` VALUES(3, 1, 2, 15);
INSERT INTO `size-stock` VALUES(4, 4, 0, 20);
INSERT INTO `size-stock` VALUES(5, 4, 1, 0);
INSERT INTO `size-stock` VALUES(6, 4, 2, 10);
INSERT INTO `size-stock` VALUES(7, 5, 0, 12);
INSERT INTO `size-stock` VALUES(8, 5, 1, 20);
INSERT INTO `size-stock` VALUES(9, 5, 2, 16);
INSERT INTO `size-stock` VALUES(10, 6, 0, 21);
INSERT INTO `size-stock` VALUES(11, 6, 1, 20);
INSERT INTO `size-stock` VALUES(12, 6, 2, 18);
INSERT INTO `size-stock` VALUES(13, 9, 0, 0);
INSERT INTO `size-stock` VALUES(14, 9, 1, 0);
INSERT INTO `size-stock` VALUES(15, 9, 2, 0);
INSERT INTO `size-stock` VALUES(16, 10, 0, 8);
INSERT INTO `size-stock` VALUES(17, 10, 1, 20);
INSERT INTO `size-stock` VALUES(18, 10, 2, 0);
INSERT INTO `size-stock` VALUES(19, 11, 0, 16);
INSERT INTO `size-stock` VALUES(20, 11, 1, 9);
INSERT INTO `size-stock` VALUES(21, 11, 2, 2);
INSERT INTO `size-stock` VALUES(22, 12, 0, 19);
INSERT INTO `size-stock` VALUES(23, 12, 1, 20);
INSERT INTO `size-stock` VALUES(24, 12, 2, 20);
INSERT INTO `size-stock` VALUES(25, 13, 0, 18);
INSERT INTO `size-stock` VALUES(26, 13, 1, 17);
INSERT INTO `size-stock` VALUES(27, 13, 2, 20);
INSERT INTO `size-stock` VALUES(28, 14, 0, 10);
INSERT INTO `size-stock` VALUES(29, 14, 1, 9);
INSERT INTO `size-stock` VALUES(30, 14, 2, 20);
INSERT INTO `size-stock` VALUES(31, 15, 0, 20);
INSERT INTO `size-stock` VALUES(32, 15, 1, 7);
INSERT INTO `size-stock` VALUES(33, 15, 2, 18);
INSERT INTO `size-stock` VALUES(34, 16, 0, 20);
INSERT INTO `size-stock` VALUES(35, 16, 1, 4);
INSERT INTO `size-stock` VALUES(36, 16, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(16) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` VALUES(0, 'Small', 'Small size');
INSERT INTO `sizes` VALUES(1, 'Medium', 'Medium size');
INSERT INTO `sizes` VALUES(2, 'Large', 'Large size');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'mark@markjs.net', '5d41402abc4b2a76b9719d911017c592', '2012-04-04 05:11:44', 0, '');