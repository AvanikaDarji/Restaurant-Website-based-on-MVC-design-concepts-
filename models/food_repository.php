<?php

class FoodRepository {

    public static function getFood() {
        global $db;
        $query = 'SELECT * FROM food '
                . 'INNER JOIN categories '
                . 'ON food.categoryID = '
                . 'categories.categoryID '
                . 'OREDER BY foodID';
        $result = $db->query($query);
        $Food = array();
        foreach ($result as $row) {
            $categories = new Categories($row['categoryID'], $row['categoryName']);
            $food = new Food($row['foodId'], $row['foodName'], $row['foodPrice'], $categories);
            $Food[] = $food;
        }
        return $Food;
    }

    public static function getFoodByCategory($category_id) {
        global $db;
        $categories = CategoryRepository::getCategory($category_id);
        $query = "SELECT * FROM food WHERE categoryID = $category_id ORDER BY foodId";
        $result = $db->query($query);
        $Food = array();
        foreach ($result as $row) {
            $food = new Food($row['foodId'], $row['foodName'], $row['foodPrice'], $categories);
            $food->setID($row['foodID']);
            $Food[] = $food;
        }
        return $Food;
    }

    public static function getfood($food_id) {
        global $db;
        $query = "SELECT * FROM food WHERE foodID = $food_id";
        $result = $db->query($query);
        $row = $result->fetch();
        $categories = CategoryRepository::getCategory($row['categoryID']);
        $food = new Food($row['foodId'], $row['foodName'], $row['foodPrice'], $categories);
        $food->setID($row['foodID']);
        return $Food;
    }

    public static function deleteFood($food_id) {
        global $db;
        $query = "DELETE FROM food WHERE foodID = $food_id";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function addFook($food_id) {
        global $db;
        $publisher_id = $food->getCategory()->getID();
        $id = $food->getId();
        $name = $food->getName();
        $price = $food->getPrice();
        $query = "INSERT INTO food (categoryID, foodId, foodName, foodName)
            VALUES ('$category_id', '$id', '$name', '$price')";
        $row_count = $db->exec($query);
        return $row_count;
    }

}
?>

