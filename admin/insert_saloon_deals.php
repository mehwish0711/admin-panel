<?php
if (isset($_POST["addProduct"])) {
    // Retrieve the form data
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_desc = $_POST['pro_desc'];
    $deal_cate = $_POST['deal_cate'];
    $merchant_code = $_POST['merchant_code'];

    // Image upload handling
    $target_dir = "upload_images/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pro_image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.'); window.location.href='products.php';</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href='products.php';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); window.location.href='products.php';</script>";
    } else {
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion
            include("config.php");

            $insertQuery = "INSERT INTO saloon_deal (merchant_code, pro_name, pro_price, pro_desc, pro_image, saloon_cate) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($config, $insertQuery);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssisss", $merchant_code, $pro_name, $pro_price, $pro_desc, $target_file, $deal_cate);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Product inserted successfully.'); window.location.href='section3.php';</script>";
                } else {
                    echo "<script>alert('Error inserting product.'); window.location.href='products.php';</script>";
                }
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the statement.'); window.location.href='products.php';</script>";
            }

            // Close the database connection
            mysqli_close($config);
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.'); window.location.href='products.php';</script>";
        }
    }
}
?>
