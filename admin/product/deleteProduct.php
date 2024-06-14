<?php


    $product_id = $_GET['id'];
    require_once "config.php";
    $sql = "DELETE FROM products WHERE prod_id = {$product_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");


    header("Location: http://localhost/sany/admin/product/index.php");

    mysqli_close($conn);


?>