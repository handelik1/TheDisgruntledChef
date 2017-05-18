-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 05:07 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
`ingredient_ID` int(11) NOT NULL,
  `recipe_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `general_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_ID`, `recipe_ID`, `name`, `general_name`, `image`) VALUES
(1, 1, '3 Cups Flour', 'Flour', 'flour.png'),
(2, 1, '3/4 Cup Brown Sugar', 'Brown Sugar', 'bsugar.png'),
(3, 1, '2 Eggs', 'Eggs', 'eggs.png'),
(4, 1, '1 Cup Butter, Softened', 'Butter', 'butter.png'),
(5, 1, '1 Cup Semi-Sweet Chocolate Chips', 'Semi-sweet Chocolate Chips', 'chips.png'),
(6, 2, '2 Eggs', 'Eggs', 'eggs.png'),
(7, 2, '1 Cup Bread Crumbs', 'Bread Crumbs', 'breadcrumbs.png'),
(8, 2, '2 lbs Chicken Breast', 'Chicken Breast', 'chicken.png'),
(9, 2, '4 Tbsp Vegetable Oil', 'Vegetable Oil', 'oil.png'),
(10, 2, '1/4 tsp Salt and Pepper', 'Salt and Papper', 'saltpepper.png');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_general`
--

CREATE TABLE IF NOT EXISTS `ingredients_general` (
`id` int(11) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ingredients_general`
--

INSERT INTO `ingredients_general` (`id`, `ingredient`, `picture`) VALUES
(1, 'Flour', 'flour.png'),
(2, 'Brown Sugar', 'bsugar.png'),
(3, 'Eggs', 'eggs.png'),
(4, 'Butter', 'butter.png'),
(5, 'Semi-Sweet Chocolate Chips', 'chips.png'),
(6, 'Bread Crumbs', 'breadcrumbs.png'),
(7, 'Chicken', 'chicken.png'),
(8, 'Vegetable Oil', 'oil.png'),
(9, 'Salt and Pepper', 'saltpepper.png');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE IF NOT EXISTS `instructions` (
`ID` int(11) NOT NULL,
  `step` varchar(255) NOT NULL,
  `recipe_ID` int(11) NOT NULL,
  `instruction` varchar(150) NOT NULL,
  `media` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`ID`, `step`, `recipe_ID`, `instruction`, `media`) VALUES
(1, 'Step 1', 1, 'Preheat oven to 350 degrees F (175 degrees C)', 'preheat.jpg'),
(2, 'Step 2', 1, 'Sift flour and brown sugar into a bowl', 'flourbrown.jpg'),
(3, 'Step 3', 1, 'Stir in eggs. Mix butter into flour mixture until dough is creamy', 'eggbutterflour.jpg'),
(4, 'Step 4', 1, 'Fold in chocolate chips', 'mixed.jpg'),
(5, 'Step 5', 1, 'Spoon dough onto a baking sheet, keeping them about 3 inches apart', 'sheet.jpg'),
(6, 'Step 6', 1, 'Bake in the preheated oven until slightly brown, 10 to 15 minutes', '15.jpg'),
(7, 'Step 7', 1, 'Cool', 'donecookies.jpg'),
(8, 'Step 1', 2, 'Rinse chicken breasts and cut off all excess fat.', 'prepchicken.jpg'),
(9, 'Step 2', 2, 'In one bowl scramble eggs and in other fill with bread crumbs.', 'eggcrumbs.jpg'),
(10, 'Step 3', 2, 'Dip chicken into egg wash and then coat with bread crumbs.', 'dipchicken.jpg'),
(11, 'Step 4', 2, 'In a fry pan, heat oil and place chicken breasts in to the pan', 'enterpan.jpg'),
(13, 'Step 5', 2, 'Cook for 7-9 minutes on each side.', 'frying.jpg'),
(14, 'Step 6', 2, 'Season with salt and pepper.', 'seasonchicken.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
`id` int(11) NOT NULL,
  `recipe_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `difficulty` int(5) NOT NULL,
  `flavor` int(5) NOT NULL,
  `clarity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
`recipe_ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_ID`, `name`, `description`, `image`) VALUES
(1, 'Chocolate Chip Cookies', 'The most delicious chocolate chip cookies you have ever eaten in your life.', 'recipechocolatechipcookies.jpg'),
(2, 'Pan Fried Chicken', 'Delicious and crispy pan fried chicken.', 'recipepanfriedchicken.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'pastries', 'baaf4fd64306f38f4c4ca56ff2e565d3f773c0c234b7b3796066e2f771c20918089c275d2b09f7a801ccacdae8eaefbcfdc5a4ff06e3951a391a10930a84d5e8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
 ADD PRIMARY KEY (`ingredient_ID`);

--
-- Indexes for table `ingredients_general`
--
ALTER TABLE `ingredients_general`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
 ADD PRIMARY KEY (`recipe_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
MODIFY `ingredient_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ingredients_general`
--
ALTER TABLE `ingredients_general`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
MODIFY `recipe_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
