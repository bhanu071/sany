<?php
// Start the session
session_start();

// Check if all required session variables are set
if (isset($_SESSION['first_name']) && isset($_SESSION['last_name']) && isset($_SESSION['full_name']) && isset($_SESSION['email'])) {
    // Include database connection
    include('config.php'); // Ensure this file contains the code to connect to your database

    // Get the email from the session and escape it
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);

    // Construct the SQL query
    $sql = "SELECT * FROM writers WHERE email = '$email'";
    
    // Execute the query
    $result = mysqli_query($conn, $sql) or die("Query Failed!");

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Email exists, redirect to product page
        header("Location: http://localhost/sany/product.php");
        exit();
    } else {
        // Email does not exist, insert the new writer
        $first_name = mysqli_real_escape_string($conn, $_SESSION['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_SESSION['last_name']);
        $full_name = mysqli_real_escape_string($conn, $_SESSION['full_name']);

        $insert_sql = "INSERT INTO writers (fname, lname, full_name, email) VALUES ('$first_name', '$last_name', '$full_name', '$email')";

        if (mysqli_query($conn, $insert_sql)) {
            // Successfully inserted, redirect to product page
            header("Location: http://localhost/sany/product.php");
            exit();
        } else {
            // Failed to insert data
            echo "Error: Could not insert data.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Required session variables are not set
    echo "Info is not available";
}
?>
