<?php


    $test_id = $_GET['id'];
    require_once "config.php";
    $sql = "DELETE FROM testimonials WHERE id = {$test_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed!");


    header("Location: http://localhost/sany/admin/testimonial/index.php");

    mysqli_close($conn);


?>