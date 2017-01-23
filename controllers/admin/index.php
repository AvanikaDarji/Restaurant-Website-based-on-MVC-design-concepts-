<?php

/*  
 * Student Info: Name=Avanika M Darji, ID=16387
 * Subject: CS526(B)_HW5_Spring_2016
 * Author: AvanikaDarji
 * Filename: index.php 
 * Date and Time: Mar 20, 2016 9:01:52 PM
 * Project Name: Avanika_16387_CS526B_HW5
 */

//complete code listing for controllers/guest/index.php
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';

$hasAction = isset($_GET['action']);
if ($hasAction) {
    $action = $_GET['action'];
} else {
    $action = 'list_food';
}

$content = include_once "controllers/admin/$action.php";
return $content;
