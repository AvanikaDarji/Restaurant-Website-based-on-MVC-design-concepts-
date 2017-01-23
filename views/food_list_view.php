<?php
$hasFood = isset($food);
$hasCategories = isset($categories);
if ($hasFood === false || $hasCategories === false) {
    echo '<h1>views/food_list_view.php needs $food</h1>';
    exit();
}
?>

<h1>Searching Your Food </h1>
<div id="sidebar">
    <h2>Categories</h2>
    <?php foreach ($categories as $category2) : ?>
        <ul>
            <li>
                <a href="?controller=guest&category_id=<?php echo $category2->getID(); ?>">
                    <?php echo $category2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $category->getName(); ?></h2>
    <ul class="nav">
        <?php foreach ($food as $food) : ?>
            <li>
                <a href="?controller=guest&action=view_food&food_id=<?php echo $food->getID(); ?>">
                    <?php echo $food->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>