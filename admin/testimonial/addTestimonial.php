<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])){
   
   
    $name = $_POST['name'];
    $role_id = $_POST['role_id'];
    $message = $_POST['message'];

    $uploadDir = "uploads/";
    $allowedTypes = array("image/jpeg", "image/png");

    $fileName = $_FILES["image"]["name"];
    $fileTmp = $_FILES["image"]["tmp_name"];
    $fileType = $_FILES["image"]["type"];

    
    

    if (in_array($fileType, $allowedTypes)) {
    
    $uniqueName = uniqid() . "_" . $fileName;  

    list($width, $height) = getimagesize($fileTmp);
        $newWidth = 188; // New width for the resized image
        $newHeight = 188;
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
   
   
   $sql = "INSERT INTO testimonials(name, role_id, message, photo) VALUES('{$name}', '{$role_id}', '{$message}', '{$filePath}')";
   
   $result = mysqli_query($conn, $sql) or die("Query Failed!");
   
   header("Location: http://localhost/sany/admin/testimonial/index.php");
   
   mysqli_close($conn);
    } else {
        echo "Sorry, only JPG and PNG files are allowed.";
    }
} else{
    echo "something went wrong!";
}

?>