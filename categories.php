<?php

require DIR . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

try {
    $categoryService = new Fsbe\Services\CategoryService();
    $categories = $categoryService->getCategories();

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