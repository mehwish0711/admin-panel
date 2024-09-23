<?php
if (isset($_POST["addProduct"])) {
    // Retrieve the form data   
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_desc = $_POST['pro_desc'];
    $merchant_code = $_POST['merchant_code'];
    $deal_cate = $_POST['deal_cate'];

    // Check if the 'takeaway' checkbox is set, if not, set it to 0
    $takeaway = isset($_POST['takeaway']) ? $_POST['takeaway'] : 0;

    // Similarly, do the same for the 'dinein' checkbox
    $dinein = isset($_POST['dinein']) ? $_POST['dinein'] : 0;

        // Similarly, do the same for the 'dinein' checkbox
        $dinein = isset($_POST['Online']) ? $_POST['Online'] : 0;

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

    // Check file size
    // Uncomment if you want to limit file size
    // if ($_FILES["pro_image"]["size"] > 500000) {
    //     echo "<script>alert('Sorry, your file is too large.'); window.location.href='products.php';</script>";
    //     $uploadOk = 0;
    // }

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

      // Assuming $config is your database connection

// Prepare the query to avoid SQL injection


            $query="SELECT discount_percent FROM merchant where merchant_code='$merchant_code' ";
            $query= mysqli_query($config,$query);
            $check=mysqli_fetch_array($query);       
            $discount_percentage = $check[0];
            $discount_percentage=$discount_percentage/100;
            $discount_amt=$pro_price*$discount_percentage;
            $discount_amt=$pro_price-$discount_amt;

            
            //condition apply on Beverages and Extras
            if ($deal_cate == "Beverages" || $deal_cate == "Extras" || $deal_cate == "Deals" ) {
                $discount_amt = $pro_price;
                 }

            $insertQuery = "INSERT INTO products (merchant_code,pro_name , pro_price,pro_desc,pro_image,takeaway,dinein,deal_cate,discount_amt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
            $stmt = mysqli_prepare($config, $insertQuery);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssisssssi", $merchant_code, $pro_name, $pro_price, $pro_desc, $target_file, $takeaway, $dinein, $deal_cate,$discount_amt);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Product inserted successfully.'); window.location.href='restaurant_deals.php';</script>";
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
