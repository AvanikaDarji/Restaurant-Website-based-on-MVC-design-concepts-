<?php

// Get the IDs
$food_id = $_POST['food_id'];
$category_id = $_POST['category_id'];

// Delete the food
FoodRepository::deleteFook($food_id);

// Display the food List page for the current category
header("Location: .?controller=admin&category_id=$category_id");

