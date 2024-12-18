<?php
// routes.php

require_once 'app/controllers/EquipmentController.php';

$controller = new EquipmentController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/equipment/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/equipment/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/equipment/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/equipment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $equipmentId = $matches[1];
    $controller->edit($equipmentId);
} elseif (preg_match('/\/equipment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $equipmentId = $matches[1];
    $controller->update($equipmentId, $_POST);
} elseif (preg_match('/\/equipment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $equipmentId = $matches[1];
    $controller->delete($equipmentId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}
