<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

use Fsbe\Entities\Product;
use Fsbe\Entities\Products;
use Fsbe\Services\ProductService;
use Fsbe\Services\Validators\ProductValidator;

$products = new Products();
$productService = new ProductService();
$productsArray = $productService->getAllProducts($products);

if (!isset($_GET['id']) || !ProductValidator::validateProduct($_GET['id'], $productsArray)) {
    http_response_code(400);

    $data = [
        "message" => "Invalid product id",
        "data" => []
    ];

    echo json_encode($data, true);

    exit;
}

try {
    $product = new Product();
    $productService = new ProductService();
    $product = $productService->getProduct($_GET['id'], $product);
    $data = [
        "message" => "Successfully retrieved products",
        "data" => $product
    ];
} catch (InvalidArgumentException $e) {
    http_response_code(400);

    $data = [
        "message" => "Bad request",
        "data" => []
    ];
} catch (Exception $e) {
    http_response_code(500);

    $data = [
        "message" => "Unexpected error",
        "data" => []
    ];
}

echo json_encode($data, true);