<?php

$category_id = 1;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
$categories = CategoryRepository::getCategories();
$category = CategoryRepository::getCategory($category_id);
$Food = FoodRepository::getFoodByCategory($category_id);
return 'views/manage_food_list_view.php';

