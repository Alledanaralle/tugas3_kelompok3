<?php
// routes.php

require_once 'app/controllers/memberController.php';

$controller = new MemberController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/member/index_member' || $url == '/') {
    $controller->index();
} elseif ($url == '/member/create_member' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/member/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/member\/edit_member\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $memberId = $matches[1];
    $controller->edit($memberId);
} elseif (preg_match('/\/member\/update_member\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $memberId = $matches[1];
    $controller->update($memberId, $_POST);
} elseif (preg_match('/\/member\/delete_member\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $memberId = $matches[1];
    $controller->delete($memberId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}