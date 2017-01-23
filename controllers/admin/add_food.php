<?php

$addFoodSubmitted = isset($_POST['addfood_submitted']);
if ($addFoodSubmitted) {
    $category_id = $_POST['category_id'];;
    $id = $_POST['id'];
    $name = $_POST['food_name'];
    $price = $_POST['food_price'];

    // Validate the inputs
    if (empty($id) || empty($name) || empty($price)) {
        $error = "Invalid food data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $category = CategoryRepository::getCategory($category_id);
        $food = new Food($id, $name, $price, $category);
        FoodRepository::addFood($food);

        // Display the Food List page for the current category
        header("Location: .?controller=admin&category_id=$category_id");
    }
}
else
{
    $categories = CategoryRepository::getCategories();
    return 'views/add_food_view.php';
}
