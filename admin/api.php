<?php
include("config.php");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"]) {
    // Retrieve the form data
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_discount = $_POST['pro_discount'];
    $pro_desc = $_POST['pro_desc'];
    $pro_cate = $_POST['category'];

    // Image upload handling
    $target_dir = "upload_images/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pro_image"]["tmp_name"]);
    if ($check === false) {
        http_response_code(400);
        echo json_encode(array("message" => "File is not an image."));
        exit();
    }

    // Check file size
    if ($_FILES["pro_image"]["size"] > 500000) {
        http_response_code(400);
        echo json_encode(array("message" => "Sorry, your file is too large."));
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        http_response_code(400);
        echo json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        http_response_code(400);
        echo json_encode(array("message" => "Sorry, your file was not uploaded."));
        exit();
    } else {
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion
            $insertQuery = "INSERT INTO products (pro_cate,pro_name, pro_price, pro_discount, pro_desc, pro_image) VALUES (?,?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($config, $insertQuery);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $pro_cate,$pro_name, $pro_price, $pro_discount, $pro_desc, $target_file);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    http_response_code(201);
                    echo json_encode(array("message" => "Product inserted successfully."));
                } else {
                    http_response_code(500);
                    echo json_encode(array("message" => "Error inserting product."));
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Error preparing the statement."));
            }
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Sorry, there was an error uploading your file."));
        }
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>