<?php

$addFoodSubmitted = isset($_POST['addfood_submitted']);
if ($addFoodSubmitted) {
    $category_id = $_POST['category_id'];;
    $name = $_POST['food_name'];
    $price = $_POST['food_price'];

    // Validate the inputs
    if (empty($name) || empty($price)) {
        $error = "Invalid fooditem data. Check all fields and try again.";
        include('error.php');
    } else {
        $category = CategoryRepository::getCategory($category_id);
        $food = new Food($name, $price, $category);
        FoodRepository::addFood ($food);

        // Display the FoodItem List page for the current Category
        header("Location: .?controller=admin&category_id=$category_id");
    }
}
else
{
    $categories = CategoryRepository::getCategories();
    return 'views/add_food_view.php';
}
