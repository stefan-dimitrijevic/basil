-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 07:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basil`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Appetizers', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(2, 'Desserts', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(3, 'Cocktails', '2021-04-09 15:15:08', '2021-04-09 15:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `step` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `step`, `created_at`, `updated_at`, `recipe_id`) VALUES
(1, 'Preheat oven to 350 degrees F (175 degrees C). Line baking sheets with parchment paper.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1),
(2, 'Unfold the sheets of puff pastry, and brush tops with egg white. Sprinkle pistachios and salt over the egg white wash; flip the sheets, brush with egg white, and sprinkle with pistachios and salt. With a sharp knife, cut pastry into 3-inch long strips, about 3/4 inch wide. Twist the strips twice, then arrange on the prepared baking sheets so they don\'t touch.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1),
(3, 'Bake in the preheated oven until browned, about 15 minutes.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1),
(4, 'Using a damp cloth, gently clean mushrooms. Remove stems and discard.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(5, 'Mince scallions and separate white and green parts.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(6, 'Preheat an air fryer to 360 degrees F (182 degrees C).', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(7, 'Combine cream cheese, Cheddar cheese, the white parts from the scallions, paprika, and salt in a small bowl. Stuff filling into the mushrooms, pressing it in to fill the cavity with the back of a small spoon.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(8, 'Spray the air fryer basket with cooking spray and set mushrooms inside. Depending on the size of your air fryer, you may have to do 2 batches.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(9, 'Cook mushrooms until filling is lightly browned, about 8 minutes. Repeat with remaining mushrooms.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(10, 'Sprinkle mushrooms with scallion greens and let cool for 5 minutes before serving.', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 2),
(11, 'In a medium-size mixing bowl, combine spinach, ranch mix, mayonnaise, sour cream, bacon bits and onion. Spread the mixture onto each tortilla and roll it up. Refrigerate the rolled tortillas until ready to serve.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 3),
(12, 'Slice each roll-up into 1 inch servings no more than 3 hours before serving.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 3),
(13, 'Stir together the avocado and lemon juice in a serving bowl; add the green onion and cilantro; mix well. Season with salt and pepper. Serve immediately or store covered in refrigerator with avocado pits in the bowl to keep from browning.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 4),
(14, 'In a medium bowl beat together the egg yolks and 1/3 cup of sugar. Using a wooden spoon stir in mascarpone cheese, beaten egg whites, cream and kirschwasser; stir until smooth. Set aside.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 5),
(15, 'Dissolve remaining 2/3 cup sugar in coffee. Quickly, to avoid complete saturation, dip ends of ladyfingers in coffee mixture. Place ladyfingers in a single layer in a 9 x 13 inch glass baking dish. Spread a layer of cheese mixture over the ladyfingers; repeat layers, ending with cheese mixture.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 5),
(16, 'Cover and refrigerate for several hours. Sprinkle with cocoa just before serving.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 5),
(17, 'Combine chocolate chips, salt, and cayenne in a heat-proof measuring cup; set aside.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(18, 'Separate eggs by cracking one egg into your hand over a bowl. Open your fingers slightly and gently jiggle your hand until the egg white falls into the bowl below. Transfer the yolk to a skillet. Repeat with remaining eggs. Reserve egg whites for another use.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(19, 'Add sugar, milk, and cream to egg yolks. Whisk thoroughly, breaking egg yolks first, until well combined.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(20, 'Place skillet on the stove over medium or medium-low heat. Cook, stirring constantly with a silicone spoon, until very hot and thick enough to coat the back of the spoon, about 5 minutes. An instant-read thermometer should read at least 175 degrees F (79 degrees C). Remove from the heat.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(21, 'Set a fine sieve over the bowl of reserved chocolate. Strain the custard sauce into the chocolate and let sit for 2 minutes. Whisk until chocolate has melted and custard sauce is smooth and shiny, about 2 minutes. Add vanilla and butter; stir until butter has melted, about 1 minute.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(22, 'Pour warm custard sauce into 6 serving glasses. Tilt each glass and rotate it around so the warm chocolate coats another 1/2 inch of the glass. Cover with plastic and place in the refrigerator until completely chilled, at least 3 to 4 hours.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(23, 'Combine cream and vanilla extract for topping in a metal bowl and whisk until thickened; make sure no peaks form. Spoon cream into the glasses, then tilt and twirl to coat the sides a bit.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(24, 'Garnish with shaved chocolate and serve.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 6),
(25, 'Combine brandy and creme de menthe in a cocktail shaker. Add ice; cover and shake until chilled. Strain into a chilled cocktail glass.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 7),
(26, 'Fill a Collins glass with 1 cup ice and set aside in the freezer.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 8),
(27, 'Combine gin, cherry-flavored brandy, triple sec, Benedictine, pineapple juice, lime juice, and grenadine in a cocktail shaker. Add 1 cup ice, cover and shake until chilled. Strain into the prepared Collins glass.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 8),
(28, 'Garnish with slice of pineapple and a cherry.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 8),
(29, 'Sprinkle salt on a small plate. Lightly wet the rim of a cocktail glass or margarita glass with a damp paper towel. Dip the moistened rim in salt to coat. Set aside.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 9),
(30, 'Combine tequila, orange-flavored brandy, and lime juice in a cocktail shaker. Add ice and shake until chilled. Strain into a salt-rimmed cocktail glass or a salt-rimmed, ice-filled margarita glass.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 9),
(31, 'Garnish with a lime wheel.', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Frozen puff pastry, thawed', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(2, 'Egg white, beaten', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(3, 'Finely chopped shelled pistachios', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(4, 'Whole white button mushrooms', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(5, 'Scallions', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(6, 'Cream cheese, softened', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(7, 'Finely shredded sharp Cheddar cheese', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(8, 'Ground paprika', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(9, 'Salt', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(10, 'Frozen chopped spinach, thawed and drained', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(11, 'Ranch dressing mix', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(12, 'Mayonnaise', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(13, 'Sour cream', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(14, 'Bacon bits', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(15, 'Chopped onions', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(16, 'Flour tortillas', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(17, 'Avocados - peeled, pitted, and mashed', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(18, 'Fresh lemon juice', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(19, 'Minced green onion', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(20, 'Minced fresh cilantro', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(21, 'Egg yolks', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(22, 'White sugar, divided', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(23, 'Mascarpone cheese', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(24, 'Heavy cream', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(25, 'Kirschwasser', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(26, 'Strong brewed coffee, cold', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(27, 'Ladyfingers', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(28, 'Unsweetened cocoa powder', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(29, 'Dark chocolate chips', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(30, 'Cayenne pepper', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(31, 'Large eggs', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(32, 'Whole milk', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(33, 'Vanilla extract', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(34, 'Unsalted butter', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(35, 'Brandy', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(36, 'White creme de menthe', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(37, 'Ice', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(38, 'Gin', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(39, 'Cherry-flavored brandy', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(40, 'Triple sec', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(41, 'Benedictine® liqueur', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(42, 'Pineapple juice', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(43, 'Lime juice', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(44, 'Grenadine syrup', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(45, 'Fresh pineapple', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(46, 'Maraschino cherry', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(47, 'Kosher salt', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(48, 'Tequila', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(49, 'Orange flavored liqueur (such as Cointreau®)', '2021-04-09 15:15:09', '2021-04-09 15:15:09'),
(50, 'Lime wheel', '2021-04-09 15:15:09', '2021-04-09 15:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recipe`
--

CREATE TABLE `ingredient_recipe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredient_recipe`
--

INSERT INTO `ingredient_recipe` (`id`, `ingredient_id`, `recipe_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '17.5 ounce', NULL, NULL),
(2, 2, 1, '1', NULL, NULL),
(3, 3, 1, '⅓ cup', NULL, NULL),
(4, 4, 2, '16 ounce', NULL, NULL),
(5, 5, 2, '2', NULL, NULL),
(6, 6, 2, '4 ounces', NULL, NULL),
(7, 7, 2, '¼ cup', NULL, NULL),
(8, 8, 2, '¼ teaspoon', NULL, NULL),
(9, 9, 2, '1 pinch', NULL, NULL),
(10, 10, 3, '20 ounce', NULL, NULL),
(11, 11, 3, '1 ounce', NULL, NULL),
(12, 12, 3, '1 cup', NULL, NULL),
(13, 13, 3, '1 cup', NULL, NULL),
(14, 14, 3, '½ cup', NULL, NULL),
(15, 15, 3, '3 tablespoons', NULL, NULL),
(16, 16, 3, '10', NULL, NULL),
(17, 17, 4, '5', NULL, NULL),
(18, 18, 4, '2 tablespoons', NULL, NULL),
(19, 19, 4, '¾ cup', NULL, NULL),
(20, 20, 4, '½ cup', NULL, NULL),
(21, 21, 5, '6', NULL, NULL),
(22, 22, 5, '1 cup', NULL, NULL),
(23, 23, 5, '1 pound', NULL, NULL),
(24, 2, 5, '6', NULL, NULL),
(25, 24, 5, '¼ cup', NULL, NULL),
(26, 25, 5, '3 tablespoons', NULL, NULL),
(27, 26, 5, '1¼ cups', NULL, NULL),
(28, 27, 5, '25', NULL, NULL),
(29, 28, 5, '1 tablespoon', NULL, NULL),
(30, 29, 6, '8 ounces', NULL, NULL),
(31, 9, 6, '1 pinch', NULL, NULL),
(32, 30, 6, '1 pinch', NULL, NULL),
(33, 31, 6, '6', NULL, NULL),
(34, 22, 6, '⅓ cup', NULL, NULL),
(35, 32, 6, '1 cup', NULL, NULL),
(36, 24, 6, '1¼ cups', NULL, NULL),
(37, 33, 6, '¼ teaspoon', NULL, NULL),
(38, 34, 6, '1 tablespoon', NULL, NULL),
(39, 35, 7, '1½ fluid ounces', NULL, NULL),
(40, 36, 7, '½ fluid ounce', NULL, NULL),
(41, 37, 7, '1 cup', NULL, NULL),
(42, 37, 8, '1 cup', NULL, NULL),
(43, 38, 8, '1½ fluid ounces', NULL, NULL),
(44, 39, 8, '½ fluid ounce', NULL, NULL),
(45, 40, 8, '¼ fluid ounce', NULL, NULL),
(46, 41, 8, '¼ fluid ounce', NULL, NULL),
(47, 42, 8, '4 fluid ounces', NULL, NULL),
(48, 43, 8, '½ fluid ounce', NULL, NULL),
(49, 44, 8, '½ fluid ounce', NULL, NULL),
(50, 37, 8, '1 cup', NULL, NULL),
(51, 45, 8, '1 slice', NULL, NULL),
(52, 46, 8, '1', NULL, NULL),
(53, 47, 9, '1 tablespoon', NULL, NULL),
(54, 48, 9, '1½ fluid ounces', NULL, NULL),
(55, 49, 9, '1 fluid ounce', NULL, NULL),
(56, 43, 9, '½ fluid ounce', NULL, NULL),
(57, 37, 9, '1 cup', NULL, NULL),
(58, 50, 9, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `liked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `recipe_id`, `user_id`, `liked`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 1, '2021-04-09 15:16:56', '2021-04-09 15:16:56'),
(2, 5, 2, 0, '2021-04-09 15:17:42', '2021-04-09 15:17:42'),
(3, 4, 1, 1, '2021-04-09 15:20:42', '2021-04-09 15:20:42'),
(4, 5, 1, 1, '2021-04-09 15:20:47', '2021-04-09 15:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `uri`, `icon`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Recipes', 'recipes.index', '', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(2, 'Contact', 'contact', '', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(3, 'About', 'about-me', '', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(4, 'Recipes', 'admin.recipes.index', 'files_paper', 1, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(5, 'Users', 'admin.users.index', 'users_single-02', 1, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(6, 'User Activities', 'logs', 'ui-1_bell-53', 1, '2021-04-09 15:15:08', '2021-04-09 15:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_06_124506_create_users_table', 1),
(2, '2021_03_06_142252_create_roles_table', 1),
(3, '2021_03_08_193206_create_menus_table', 1),
(4, '2021_03_09_200845_create_categories_table', 1),
(5, '2021_03_09_201855_create_recipes_table', 1),
(6, '2021_03_11_204134_create_likes_table', 1),
(7, '2021_03_21_210612_create_directions_table', 1),
(8, '2021_03_21_210728_create_ingredients_table', 1),
(9, '2021_03_21_211330_create_ingredient_recipe_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `category_id`, `user_id`) VALUES
(1, 'Pistachio Twists', 'Originally a recipe from the 1960\'s that was meant to be served with drinks for a St. Paddy\'s day celebration. Personally, I think these are good for any occasion!', 'Pistachio_Twists.jpg', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1, 1),
(2, 'Air Mushrooms', 'These low-carb mushrooms are easy to make and cook in under 10 minutes in your air fryer.\n         They make the perfect game-day snack, but also impress as a first course when having friends over for an elegant dinner.', 'Air_Fryer.jpg', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1, 5),
(3, 'Spinach Roll-Ups', 'I got this recipe from a co-worker after having them at a baby shower.\n         They are absolutely wonderful, even if you\'re like me and NOT fond of spinach. They are so easy to make.', 'Spinach_RollUps.jpg', '2021-04-09 15:15:08', '2021-04-09 15:15:08', 1, 1),
(4, 'Simply Guacamole', 'This is so easy and so good. It\'s always the hit of the party and it\'s gone before anything else on the table.', 'Guacamole.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 1, 5),
(5, 'Tiramisu', 'Tiramisu is a classic Italian dessert. Ladyfinger cookies are dipped in coffee, then layered with mascarpone (a rich Italian cream cheese) and dusted with cocoa powder. It might become your new favorite dessert!', 'Tiramisu.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 2, 2),
(6, 'Chocolate Puddino', 'Perfect for Valentine\'s Day, this rich and delicious chocolate pudding is made with a classic Italian method that they call \'budino.\' The pudding has a glorious texture--firm enough to stay on the spoon and hold its shape, but at the same time, soft, smooth, and silky. It\'s a perfect balance between intense chocolate flavor, with just the right amount of sweetness, topped with a soft whipped cream topping that elevates it to a whole new level of amazingness!', 'Puddino.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 2, 7),
(7, 'Stinger', 'There\'s no sting a cocktail made from crème de menthe and brandy can\'t heal. Shake up one of these classic cocktails before or after dinner.', 'Stinger.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 3, 4),
(8, 'Singapore Sling', 'Variations of the classic Singapore Sling abound, but mix up one of these potent and sweet cocktails with this recipe and you\'ll be pleased with the results.', 'Singapore.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 3, 2),
(9, 'Margarita', 'Served straight up or on the rocks, the margarita is one of the most popular cocktails of all time. And for good reason! It will cool you down on a hot day or warm you up on a cool day. Any day is a good day for a margarita.', 'Margarita.jpg', '2021-04-09 15:15:09', '2021-04-09 15:15:09', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(2, 'Authorized', '2021-04-09 15:15:08', '2021-04-09 15:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@basil.com', '$2y$10$W4gtaSWngZUpD5lrZ.IN3eYJHmMXCQ5MFFrn6H/idpX23zs1tysfu', 1, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(2, 'Stefan', 'stefan@gmail.com', '$2y$10$9JfDkfmQdv9.5K7insuSIeubCifFvloIZvQcSkKq7S27/7fPm.8cK', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(3, 'Rosendo Towne', 'ricky50@example.com', '$2y$10$/6aHhB.SuaRIBZ/sJagaCezQ//6edseKIwbUr8C2AbxXSAlXFDRay', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(4, 'Courtney Deckow', 'vicenta.nolan@example.com', '$2y$10$KuJ.ez7A4QziYugTv4kdEe2s/QLbE7uEfAF.4ilHiiTbxuREAR/fW', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(5, 'Rhoda Schaden', 'jailyn.reichert@example.org', '$2y$10$Y6FSOEWofiRnCN.h97F5Lum0/lyPI9SFCfk4R58aYGGyTwGNNewWi', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(6, 'Kamron Kling', 'valentina.trantow@example.net', '$2y$10$lN0wHS1p.BoMCY8nGv5Mbe5TlLnuIFyCevfANzrA.KhvHzVfGYSU6', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08'),
(7, 'Elbert Bogan', 'emilie05@example.net', '$2y$10$A8vAZjypW5OEYfhfv5VMk.Ew1CfxYq5Q3eDaWxDVEKGwnTygfoDIK', 2, '2021-04-09 15:15:08', '2021-04-09 15:15:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directions_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient_recipe_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_recipe_id_user_id_unique` (`recipe_id`,`user_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD CONSTRAINT `ingredient_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
