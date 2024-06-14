<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["thumbnail"])){
   
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    

    $uploadDir = "uploads/";
    $allowedTypes = array("image/jpeg", "image/png");

    $fileName = $_FILES["thumbnail"]["name"];
    $fileTmp = $_FILES["thumbnail"]["tmp_name"];
    $fileType = $_FILES["thumbnail"]["type"];

    
    

    if (in_array($fileType, $allowedTypes)) {
    
    $uniqueName = uniqid() . "_" . $fileName;  

    list($width, $height) = getimagesize($fileTmp);
        $newWidth = 536; // New width for the resized image
        $newHeight = 484;
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

        if ($fileType == "image/jpeg") {
            $sourceImage = imagecreatefromjpeg($fileTmp);
        } elseif ($fileType == "image/png") {
            $sourceImage = imagecreatefrompng($fileTmp);
        }
        
        imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $filePath = $uploadDir . $uniqueName;
        imagejpeg($resizedImage, $filePath);

        // Free up memory
        imagedestroy($resizedImage);
        imagedestroy($sourceImage);
        
   
    require_once 'config.php';
   
   
   $sql = "UPDATE products SET product_name = '{$product_name}', category_id = '{$category_id}', thumbnail = '{$filePath}' WHERE prod_id = '{$product_id}' ";
   
   $result = mysqli_query($conn, $sql) or die("Query Failed!");
   
   header("Location: http://localhost/sany/admin/product/index.php");
   
   mysqli_close($conn);
    } else {
        echo "Sorry, only JPG and PNG files are allowed.";
    }
} else{
    echo "something went wrong!";
}

?>