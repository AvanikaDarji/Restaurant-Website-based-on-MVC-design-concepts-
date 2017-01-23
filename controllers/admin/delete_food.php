<?php

// Get the IDs
$food_id = $_POST['food_id'];
$category_id = $_POST['category_id'];

// Delete the fooditem
FoodRepository::deleteFood($food_id);

// Display the FoodItem List page for the current category
header("Location: .?controller=admin&category_id=$category_id");

