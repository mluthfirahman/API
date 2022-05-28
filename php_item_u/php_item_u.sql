
CREATE TABLE `item_mobile_games` (
  `id` int(30) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `stock` int(30) NOT NULL
);

INSERT INTO `item_mobile_games` (`id`, `category_id`, `category_name`, `item_name`, `stock`) VALUES
(1, 11, "Mobile Legends", "Gusion Si Keren Collector", 150),
(2, 12, "Call of Duty Mobile", "M4 - Court Jester", 250),
(3, 13, "Free Fire", "M4 - Pinky Panda", 350),
(4, 14, "Speed Drifters", "Marcelin Blues Raster", 443);