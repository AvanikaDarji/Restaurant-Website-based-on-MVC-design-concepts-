<!DOCTYPE html>
<!--
/*  
 * Student Info: Name=Avanika M Darji, ID=16387
 * Subject: CS526(B)_HW5_Spring_2016
 * Author: AvanikaDarji
 * Filename: index.php 
 * Date and Time: Mar 20, 2016 10:12:52 AM
 * Project Name: Avanika_16387_CS526B_HW5
 */
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
include_once "models/PageData.php";
$pageData = new PageData();
$pageData->title = "Restaurant";
$pageData->addCSS('css/layout.css');
$pageData->addCSS('css/navigation.css');

//connect to database
include_once "db/dbcontext.php";
$db = DBContext::getDB();

$pageData->navigation = include_once "views/navigation_front.php";
$navigationIsClicked = isset($_GET["controller"]);
if ($navigationIsClicked) {
    $controller = $_GET["controller"];
} else {
    $controller = "guest";
}
$pageData->content = include_once "controllers/$controller/index.php";
include_once "views/page.php";

        ?>
    </body>
</html>
