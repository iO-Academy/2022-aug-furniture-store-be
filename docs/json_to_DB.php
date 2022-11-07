<?php
// Connect to DB
// Get contents from furniture.json and store in PHP variable
// Convert JSON to PHP assoc array
// Get List of Categories (unique list of "name")
// Create SQL statements to create categories table
// Create SQL statements to insert category rows
// Create SQL statements to create products table
// Create SQL statements to insert category rows - remove "£" from price and replace name with categoryID foreign key

// Example SQL 1
/*
 * DROP TABLE IF EXISTS `categories`;
 * CREATE TABLE `categories` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=latin1;
 */