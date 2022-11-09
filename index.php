<?php

require __DIR__ . '/vendor/autoload.php';

header("Access-Control-Allow-Origin: http://localhost:3000");
header('Content-Type: application/json; charset=utf-8');

$data = [
    "message" => "index.php - invalid route",
    "data" => []
];

echo json_encode($data, true);