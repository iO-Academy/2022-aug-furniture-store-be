<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

use Fsbe\Entities\Categories;

try {
    $categories = new Categories();
    $categoryService = new Fsbe\Services\CategoryService();
    $categories = $categoryService->getCategories($categories);

    $responseData = [
        "message" => "Successfully retrieved categories",
        "data" => $categories->getCategories()
    ];
} catch(Exception $exception) {
    http_response_code(500);

    $responseData = [
        "message" => "Unexpected error",
        "data"=> []
    ];
}

echo json_encode($responseData, true);