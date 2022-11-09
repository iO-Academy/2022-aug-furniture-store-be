<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

use Fsbe\Services\Validators\CategoryValidator;

if (!isset($_GET['catId']) || !CategoryValidator::validateCategory($_GET['catId'])) {
    http_response_code(400);

    $data = [
        "message" => "Invalid category id",
        "data" => []
    ];

    echo json_encode($data, true);

    exit;
}

try {
    $productService = new Fsbe\Services\ProductService();
    $products = $productService->getProducts();

    $data = [
        "message" => "Successfully retrieved products",
        "data" => $products->getProducts()
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