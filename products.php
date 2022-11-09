<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

use Fsbe\Entities\Products;
use Fsbe\Services\Validators\CategoryValidator;
use Fsbe\Services\ProductService;

if (!isset($_GET['cat']) || !CategoryValidator::validateCategory($_GET['cat'])) {
    http_response_code(400);

    $data = [
        "message" => "Invalid category id",
        "data" => []
    ];

    echo json_encode($data, true);

    exit;
}

try {
    $products = new Products();
    $productService = new ProductService();
    $products = $productService->getProducts($_GET['cat'], $products);
    $data = [
        "message" => "Successfully retrieved products",
        "data" => $products
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