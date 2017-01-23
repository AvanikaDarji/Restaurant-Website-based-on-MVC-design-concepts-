  <?php
$dsn = 'mysql:host=localhost;dbname=restaurant_db';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('db_error.php');
    exit();
}
       
?>
