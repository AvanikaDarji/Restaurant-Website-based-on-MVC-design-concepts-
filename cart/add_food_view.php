<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Restaurant</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <header>
            <h1>Restaurant</h1>
        </header>
        <section id="main">

            <h1>Add Food</h1>
            <form action="." method="post">
                <input type="hidden" name="action" value="add"/>

                <table>
                    <tr>
                        <td>
                            <label>Name:</label>
                        </td>
                        <td>
                            <select name="name">
                                <?php
                                foreach ($food as $name => $food) :
                                    $price = number_format($food['price'], 2);
                                    $name = $food['name'];
                                    $food = $name . ' ($' . $price . ')';
                                    ?>
                                    <option value="<?php echo $name; ?>">
                                        <?php echo $food; ?>
                                    </option>
                                <?php endforeach; ?>

                            </select>
                        </td>
                    </tr>
                    <tr> 
                        <td>
                            <label>Quantity:</label>
                        </td>
                        <td>
                            <select name="foodqty">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select><br />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Add Item"/>
                        </td>
                    </tr>
                </table>
            </form>
            <p><a href=".?action=show_cart">View Cart</a></p>

        </section>
    </body>
</html>
