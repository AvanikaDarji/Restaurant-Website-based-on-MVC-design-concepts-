<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Add a foodItem to the cart
function add_food($name, $quantity) {
    global $food;
    if ($quantity < 1) return;

    // If food already exists in cart, update quantity
    if (isset($_SESSION['shop_cart'][$name])) {
        $quantity += $_SESSION['shop_cart'][$name]['qty'];
        update_foodItem($name, $quantity);
        return;
    }

    // Add food Item
    $price = $food[$name]['price'];
    $total = $price * $quantity;
    $food = array(
        'name' => $food[$name]['name'],
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['shop_cart'][$name] = $food;
}

// Update an foodItem in the cart
function update_food($name, $quantity) {
    global $food;
    $quantity = (int) $quantity;
    if (isset($_SESSION['shop_cart'][$name])) {
        if ($quantity <= 0) {
            unset($_SESSION['shop_cart'][$name]);
        } else {
            $_SESSION['shop_cart'][$name]['qty'] = $quantity;
            $total = $_SESSION['shop_cart'][$name]['price'] *
                     $_SESSION['shop_cart'][$name]['qty'];
            $_SESSION['shop_cart'][$name]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['shop_cart'] as $food) {
        $subtotal += $food['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
?>
