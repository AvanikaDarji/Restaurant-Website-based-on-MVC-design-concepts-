<?php


/*  
 * Student Info: Name=Avanika M Darji, ID=16387
 * Subject: CS526(B)_HW5_Spring_2016
 * Author: AvanikaDarji
 * Filename: index.php 
 * Date and Time: Mar 25, 2016 8:11:12 PM
 * Project Name: Avanika_16387_CS526B_HW5
 */


// Start session management with a persistent cookie
$duration = 60 * 60 * 24 * 7;    // 1 weeks in seconds
//$duration = 0;                // per-session cookie
session_set_cookie_params($duration, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}

// Create a table of foodItems
$food = array();
$food['bread'] = array('name' => 'bread', 'price' => '3.00');
$food['butter'] = array('name' => 'butter', 'price' => '3.00');
$food['Rice'] = array('name' => 'Rice', 'price' => '10.00');
$food['tofu'] = array('name' => 'tofu', 'price' => '8.00');
$food['pizza'] = array('name' => 'pizza', 'price' => '12.00');
$food['noodles'] = array('name' => 'noodles', 'price' => '15.00');
$food['blueberry Moijito'] = array('name' => 'blueberry Moijito', 'price' => '13.00');
$food['lemonade'] = array('name' => 'lemonade', 'price' => '6.00');

// Include cart functions
require_once('cart.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_add_food';
    }
}

// Add or update cart as needed
if ($action == 'add') {
    $name = filter_input(INPUT_POST, 'name');
    $foodqty = filter_input(INPUT_POST, 'foodqty');
    add_food($name, $foodqty);
    include('cart_view.php');
} else if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $name => $qty) {
        if ($_SESSION['shop_cart'][$name]['qty'] != $qty) {
            update_foodItem($name, $qty);
        }
    }
   include('cart_view.php');
} else if ($action == 'show_cart') {
    include('cart_view.php');
} else if ($action == 'show_add_food') {
    include('add_food_view.php');
} else if ($action == 'empty_cart') {
    unset($_SESSION['shop_cart']);
    include('cart_view.php');
}
?>
