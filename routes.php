<?php
// routes.php

require_once 'app/controllers/UserController.php';
require_once 'app/controllers/TrainerController.php';
require_once 'app/controllers/memberController.php';
require_once 'app/controllers/EquipmentController.php';

$controller = new UserController();
$controllerTrainer = new TrainerController();
$controllerMember = new MemberController();
$controllerEquip = new EquipmentController();
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
} elseif ($url == '/trainers/create_trainer' && $requestMethod == 'GET') {
    $controllerTrainer->create();
} elseif ($url == '/trainers/store' && $requestMethod == 'POST') {
    $controllerTrainer->store();
} elseif ($url == '/trainers/index_trainer' && $requestMethod == 'GET') {
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
} elseif ($url == '/member/create_member' && $requestMethod == 'GET') {
    $controllerMember->create();
} elseif ($url == '/member/store' && $requestMethod == 'POST') {
    $controllerMember->store();
} elseif ($url == '/member/index_member' && $requestMethod == 'GET') {
    $controllerMember->index();
} elseif (preg_match('/\/member\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerMember->edit($userId);
} elseif (preg_match('/\/member\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controllerMember->update($userId, $_POST);
} elseif (preg_match('/\/member\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerMember->delete($userId);
} elseif ($url == '/equipment/create-equipment' && $requestMethod == 'GET') {
    $controllerEquip->create();
} elseif ($url == '/equipment/store' && $requestMethod == 'POST') {
    $controllerEquip->store();
} elseif ($url == '/equipment/index-equipment' && $requestMethod == 'GET') {
    $controllerEquip->index();
} elseif (preg_match('/\/equipment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerEquip->edit($userId);
} elseif (preg_match('/\/equipment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controllerEquip->update($userId, $_POST);
} elseif (preg_match('/\/equipment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controllerEquip->delete($userId);
}
else {
    http_response_code(404);
    echo "404 Not Found";
}