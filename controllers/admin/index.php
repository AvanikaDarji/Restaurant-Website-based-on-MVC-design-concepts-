<?php
//complete code listing for controllers/guest/index.php
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/categories.php';

$hasAction = isset($_GET['action']);
if ($hasAction) {
    $action = $_GET['action'];
} else {
    $action = 'list_food';
}

$content = include_once "controllers/admin/$action.php";
return $content;
