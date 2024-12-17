<?php
// routes.php

require_once 'app/controllers/UserController.php';
require_once 'app/controllers/TrainerController.php';

$controller = new UserController();
$controllerTrainer = new TrainerController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/dashboard' || $url == '/') {
    $controller->dashboard();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif ($url == '/user/index' && $requestMethod == 'GET') {
    $controller->index();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->edit($userId);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller->update($userId, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->delete($userId);
} elseif ($url == '/trainers/create' && $requestMethod == 'GET') {
    $controllerTrainer->create();
} elseif ($url == '/trainers/store' && $requestMethod == 'POST') {
    $controllerTrainer->store();
} elseif ($url == '/trainers/index' && $requestMethod == 'GET') {
    $controllerTrainer->index();
} elseif (preg_match('/\/trainers\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerTrainer->edit($userId);
} elseif (preg_match('/\/trainers\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controllerTrainer->update($userId, $_POST);
} elseif (preg_match('/\/trainers\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerTrainer->delete($userId);
} 
else {
    http_response_code(404);
    echo "404 Not Found";
}