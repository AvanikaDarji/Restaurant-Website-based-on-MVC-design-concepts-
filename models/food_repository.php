<?php

class FoodRepository {

    public static function getFoods() {
        global $db;
        $query = 'SELECT * FROM food '
                . 'INNER JOIN categories '
                . 'ON food.categoryID = '
                . 'categories.categoryID '
                . 'OREDER BY foodID';
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $category = new Category($row['categoryID'], $row['categoryName']);
            $food = new Food($row['foodName'], $row['foodPrice'], $category);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFoodByCategory($category_id) {
        global $db;
        $category = CategoryRepository::getCategory($category_id);
        $query = "SELECT * FROM food WHERE categoryID = $category_id ORDER BY foodID";
        $result = $db->query($query);
        $foods = array();
        foreach ($result as $row) {
            $food = new Food($row['foodName'], $row['foodPrice'], $category);
            $food->setID($row['foodID']);
            $foods[] = $food;
        }
        return $foods;
    }

    public static function getFood($food_id) {
        global $db;
        $query = "SELECT * FROM food WHERE foodID = $food_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $category = CategoryRepository::getCategory($row['categoryID']);
        $food = new Food($row['foodName'], $row['foodPrice'], $category);
        $food->setID($row['foodID']); return $food;
    }

    public static function deleteFood($food_id) {
        global $db;
        $query = "DELETE FROM food WHERE foodID = $food_id";
        $row_count = $db->exec($query);
        return $row_count; 
   }

    public static function addFood($food) {
        global $db;
        $category_id = $food->getCategory()->getID();
        $name = $food->getName();
        $price = $food->getPrice();
        $query = "INSERT INTO food (categoryID,foodName, foodPrice)
            VALUES ('$category_id', '$name', '$price')";
        $row_count = $db->exec($query);
        return $row_count;
    }

}
?>

