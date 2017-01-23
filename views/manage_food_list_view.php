<?php
$hasFood = isset($Food);
$hasCategories = isset($categories);
if ($hasFood === false || $hasFood === false) {
    echo '<h1>views/food_list_view.php needs $Food</h1>';
    exit();
}
?>

<h1>Managing Your Food</h1>
<div id="sidebar">
    <h2>Categories</h2>
    <?php foreach ($Food as $category2) : ?>
        <ul>
            <li>
                <a href="?controller=admin&category_id=<?php echo $category2->getID(); ?>">
                    <?php echo $category2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $category->getName(); ?></h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Food Title</th>
            <th>Food Price</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($Food as $food) : ?>
            <tr>
                <td><?php echo $food->getId(); ?></td>
                <td><?php echo $food->getName(); ?></td>
                <td><?php echo $food->getPrice(); ?></td>
                <td>
                    <form action="?controller=admin&action=delete_food" method="post">
                        <input type="hidden" name="food_id" 
                               value="<?php echo $food->getID(); ?>" />
                        <input type="hidden" name="food_id" 
                               value="<?php echo $food_id; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?controller=admin&action=add_food">Add Product</a></p>
</div>