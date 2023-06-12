CREATE TABLE `booking` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255),
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date` datetime NOT NULL
);
