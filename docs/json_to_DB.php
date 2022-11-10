<?php

// Connect to DB
$host = 'db';
$db = 'furniture';
$user = 'root';
$pass = 'password';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $exception) {
    throw new PDOException($exception->getMessage(), (int)$exception->getCode());
}

// jSON data into variable
$jsonData = file_get_contents('docs/furniture.json');
$data = json_decode($jsonData, true);

// Get unique list of Categories
$categoriesData = [];

foreach ($data as $category) {
    $categoriesData[] = $category['name'];
}

array_unique($categoriesData);

$categories = array_fill_keys($categoriesData, 1);
$keys = array_keys($categories);

for($i=1; $i < count($keys) + 1; $i++) {
    $categories[$keys[$i-1]] = $i;
};

// Delete Tables to clean DB
$sqlDelete = 'DROP TABLE IF EXISTS `products`; DROP TABLE IF EXISTS `categories`;';
$pdo->exec($sqlDelete);

// Categories Table
$sqlCategories = 'CREATE TABLE `categories` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;';

$pdo->exec($sqlCategories);

foreach ($categories as $key => $value){
    $sth = $pdo->prepare("INSERT INTO `categories` (`id`, `name`)
VALUES (:id, :name);");

    $sth->bindParam(':id', $value);
    $sth->bindParam(':name', $key);
    $sth->execute();
}

// Products Table
$sqlProducts = 'CREATE TABLE `products` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `category_id` int(11) unsigned NOT NULL,
    `width` int(11) unsigned DEFAULT NULL,
    `height` int(11) unsigned DEFAULT NULL,
    `depth` int(11) unsigned DEFAULT NULL,
    `price` float(7,2) unsigned DEFAULT NULL,
    `stock` int(11) unsigned DEFAULT NULL,
    `related` int(11) unsigned DEFAULT NULL,
    `color` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_categories_products` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;';

$pdo->exec($sqlProducts);

foreach ($data as $row){
    $sth = $pdo->prepare("INSERT INTO `products` (`category_id`, `width`, `height`, `depth`, `price`, `stock`, `related`, `color`)
VALUES (:category_id, :width, :height, :depth, :price, :stock, :related, :color);");
    $category_id = $categories[$row['name']];
    $price = trim($row['price'], "£");
    $sth->bindParam(':category_id', $category_id);
    $sth->bindParam(':width', $row['width']);
    $sth->bindParam(':height', $row['height']);
    $sth->bindParam(':depth', $row['depth']);
    $sth->bindParam(':price', $price);
    $sth->bindParam(':stock', $row['stock']);
    $sth->bindParam(':related', $row['related']);
    $sth->bindParam(':color', $row['color']);
    $sth->execute();
}
