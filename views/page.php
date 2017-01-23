<!DOCTYPE html>
<!--
/*  
 * Student Info: Name=Avanika M Darji, ID=16387
 * Subject: CS526(B)_HW5_Spring_2016
 * Author: AvanikaDarji
 * Filename: page.php 
 * Date and Time: Mar 20, 2016 10:15:11 AM
 * Project Name: Avanika_16387_CS526B_HW5
 */
-->
<html>
    <head>
        <title><?php echo $pageData->title; ?></title>
        <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
        <?php echo $pageData->css; ?>
        <?php echo $pageData->embeddedStyle ?>
    </head>
    <body>
        <?php echo $pageData->navigation; ?>
        <?php include_once "$pageData->content"; ?>
        <?php echo $pageData->scriptElements; ?>
    </body>
</html>