<?php
include("config.php");



////////merchant//////////

if (isset($_POST["addMerchant"])) {
    // Retrieve the form data
    $busi_name = $_POST['busi_name'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $pass = $_POST['pass'];
    $confpass = $_POST['confpass'];
    $address = $_POST['address'];
    $w_number = $_POST['w_number'];
    $loca_map = $_POST['loca_map'];
    $cnic = $_POST['cnic'];

    // Handle file upload for logo
    $m_logo_name = $_FILES['m_logo']['name'];
    $m_logo_tmp_name = $_FILES['m_logo']['tmp_name'];
    $m_logo_type = $_FILES['m_logo']['type'];
    $m_logo_size = $_FILES['m_logo']['size'];
    
    // Check if a file is selected
    if (!empty($m_logo_name)) {
        // Check file type
        if (($m_logo_type == 'image/jpeg' || $m_logo_type == 'image/jpg' || $m_logo_type == 'image/png' || $m_logo_type == 'image/gif') && $m_logo_size < 1048576) { // Adjust file size limit as needed
            $upload_path = 'upload_images/'; // Specify the upload directory
            $m_logo_final_name = $upload_path . $m_logo_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($m_logo_tmp_name, $m_logo_final_name)) {
                // File uploaded successfully, continue with database insertion

                // Get the last inserted merchant code and increment it
                $getLastMerchantCodeQuery = "SELECT MAX(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(merchant_code, '-', -1), '0', -1) AS UNSIGNED)) AS max_code FROM merchant";
                $result = mysqli_query($config, $getLastMerchantCodeQuery);
                $row = mysqli_fetch_assoc($result);
                $lastMerchantCode = $row['max_code'];

                // Increment the last merchant code
                if ($lastMerchantCode !== null) {
                    $newMerchantCode = sprintf('%05d', intval($lastMerchantCode) + 1); // Assuming merchant code is numeric and padded with zeros
                } else {
                    // If no merchant exists yet, start with 00001
                    $newMerchantCode = '00001';
                }

                // Format the merchant code
                $cityCode = substr($city, 0, 4);
                $formattedMerchantCode = $cityCode . '-001-' . $newMerchantCode;

                // Hash the password
                // NOTE: It's highly recommended to hash passwords before storing them in the database.
                // For demonstration purposes, I'm assuming you are using plain text. You should use a secure hashing algorithm like bcrypt.

                // Insert data into the database, including the logo path
                $insertQuery = "INSERT INTO `merchant` (`busi_name`, `logo`,`loca_map`, `email`, `fname`, `lname`, `city`, `number`,`whats_num`, `cnic`,`pass`, `confpass`, `merchant_code`,`address`) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ? , ? , ?,?,?)";

                $stmt = mysqli_prepare($config, $insertQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $busi_name, $m_logo_final_name,$loca_map, $email, $fname, $lname, $city, $number, $w_number,$cnic ,$pass, $confpass, $formattedMerchantCode, $address);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Merchant inserted successfully.'); window.location.href='section.php?section=merchant';</script>";
                    } else {
                        echo "<script>alert('Error inserting merchant.'); window.location.href='section.php?section=merchant';</script>";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=merchant';</script>";
                }
            } else {
                echo "<script>alert('Error uploading logo file.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file format or size for logo.');</script>";
            echo "<script>alert('Merchant inserted successfully.'); window.location.href='section.php?section=merchant';</script>";
        }
    } else {
        echo "<script>alert('Please select a logo file.');</script>";
    }
}









if (isset($_POST["m_id"])) {
    $id = $_POST['m_id'];
    $busi_name = $_POST['editBusiName'];
    $email = $_POST['editEmail'];
    $fname = $_POST['editFname'];
    $lname = $_POST['editLname'];
    $city = $_POST['editCity'];
    $number = $_POST['editNumber'];
    $pass = $_POST['editPassword'];
    $confpass = $_POST['editConfPassword'];

    $updateQuery = "UPDATE `merchant` SET `busi_name`=?, `email`=?, `fname`=?, `lname`=?, `city`=?, `number`=?, `pass`=?, `confpass`=? WHERE `id`=?";
    $stmt = mysqli_prepare($config, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $busi_name, $email, $fname, $lname, $city, $number, $pass, $confpass, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
    }

    mysqli_close($config);
}



// Database connection assumed to be represented by $config variable

if (isset($_GET['delete_merchant'])) {
    $Mid = $_GET['delete_merchant'];

    $deleteQuery = "DELETE FROM merchant WHERE id='$Mid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section.php?section=merchant");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}



////////merchant//////////


///////user////////

if (isset($_POST["addUser"])) {
    // Retrieve the form data
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_city = $_POST['u_city'];
    $u_number = $_POST['u_number'];
    $pass = $_POST['pass'];
    $confpass = $_POST['confpass'];
    $u_dob = $_POST['u_dob']; // Added line to retrieve date of birth
    // Retrieve selected sports
    $favorite_sports = isset($_POST['favorite_sports']) ? implode(', ', $_POST['favorite_sports']) : '';

    $insertQuery = "INSERT INTO `users` (`u_name`, `u_email`, `u_city`, `u_number`, `favorite_sports`, `pass`, `confpass`, `dob`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($config, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $u_name, $u_email, $u_city, $u_number, $favorite_sports, $pass, $confpass, $u_dob);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('User inserted successfully.'); window.location.href='section.php?section=users';</script>";
        } else {
            echo "<script>alert('Error inserting user.'); window.location.href='section.php?section=users';</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=users';</script>";
    }

    mysqli_close($config);
}




if (isset($_POST["u_id"])) {
    $id = $_POST['u_id'];
    $u_name = $_POST['editUserName'];
    $u_email = $_POST['editUserEmail'];
    $u_number = $_POST['editUserNumber'];
    $dob = $_POST['editUserDOB'];
    $pass = $_POST['editUserPassword'];
    $confpass = $_POST['editUserConfPassword'];
    
    // Process favorite sports
    $my_sports = isset($_POST['my_sports']) ? implode(',', $_POST['my_sports']) : '';

    $updateQuery = "UPDATE `users` SET `u_name`=?, `u_email`=?, `u_number`=?, `dob`=?, `pass`=?, `confpass`=?, `favorite_sports`=? WHERE `u_id`=?";
    $stmt = mysqli_prepare($config, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $u_name, $u_email, $u_number, $dob, $pass, $confpass, $my_sports, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "User updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating user."));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
    }

    mysqli_close($config);
}


if (isset($_GET['delete_user'])) {
    $Uid = $_GET['delete_user'];

    $deleteQuery = "DELETE FROM users WHERE u_id='$Uid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section.php?section=users");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}


//////user/////////




////////// product////////////

// Assuming you have already established a database connection

if (isset($_POST["addSportDeals"])) {
    // Retrieve the form data
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_discount = $_POST['pro_discount'];
    $pro_desc = $_POST['pro_desc'];
    $pro_cate = $_POST['category'];
    // $pro_offer = $_POST['pro_offer'];

    // Image upload handling
    $target_dir = "upload_images/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pro_image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');window.location.href='section3.php?section=SportsDeal';</script>";
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["pro_image"]["size"] > 500000) {
    //     echo "<script>alert('Sorry, your file is too large.'); window.location.href='products.php';</script>";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href='section3.php?section=SportsDeal';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); window.location.href='section3.php?section=SportsDeal';</script>";
    } else {
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion
            $insertQuery = "INSERT INTO sports_deal (merchant_code, pro_name, pro_price, pro_discount, pro_desc, pro_image) VALUES ( ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($config, $insertQuery);
            
            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssssss", $pro_cate, $pro_name, $pro_price, $pro_discount, $pro_desc, $target_file);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Product inserted successfully.'); window.location.href='section3.php?section=SportsDeal';</script>";
                } else {
                    echo "<script>alert('Error inserting product.'); window.location.href='sectio3.php?section=SportsDeal';</script>";
                }
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the statement.'); window.location.href='section3.php?section=SportsDeal';</script>";
            }
            
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.') window.location.href='section3.php?section=SportsDeal';</script>";
        }
    }
}

if (isset($_GET['delete_sports'])) {
    $SPid = $_GET['delete_sports'];

    $deleteQuery = "DELETE FROM sports_deal WHERE pro_id='$SPid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section3.php?section=SportsDeal");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}





// Check if product ID is provided via POST method

if (isset($_POST["spd_id"])) {
    $id = $_POST['spd_id'];
    $name = $_POST['editProName'];
    $price = $_POST['editProPrice'];
    $discount = $_POST['editProDiscount'];
    $sport_cate = $_POST['editsportcate'];//mehwish
    $description = $_POST['editProDesc'];
    $imagePath = '';

    if (isset($_FILES['editProImage']) && $_FILES['editProImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['editProImage']['tmp_name'];
        $fileName = $_FILES['editProImage']['name'];
        $fileSize = $_FILES['editProImage']['size'];
        $fileType = $_FILES['editProImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif','jfif');
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = 'upload_images/';
            $destPath = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imagePath = $destPath;
            } else {
                echo json_encode(array("status" => "error", "message" => "Error uploading image."));
                exit;
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid file type."));
            exit;
        }
    }

    // Initialize the base update query //mehwish
    $updateQuery = "UPDATE sports_deal SET pro_name=?, pro_price=?, pro_discount=?, pro_desc=?,sport_cate=?";
    $paramTypes = "sdsss";
    $paramValues = array($name, $price, $discount, $description ,$sport_cate);

    // Append the image path to the query if an image was uploaded
    if (!empty($imagePath)) {
        $updateQuery .= ", pro_image=?";
        $paramTypes .= "s";
        $paramValues[] = $imagePath;
    }

    // Append the WHERE clause to update the specific product
    $updateQuery .= " WHERE pro_id=?";
    $paramTypes .= "i";
    $paramValues[] = $id;

    // Prepare the SQL statement
    $stmt = mysqli_prepare($config, $updateQuery);

    if ($stmt) {
        // Bind the parameters to the SQL statement
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$paramValues);

        // Execute the statement and check if it was successful
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "Product updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating product: " . mysqli_error($config)));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
    }

    // Close the database connection
    mysqli_close($config);
}






if (isset($_GET['delete_product'])) {
    $Pid = $_GET['delete_product'];

    $deleteQuery = "DELETE FROM products WHERE pro_id='$Pid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section.php?section=products");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}
    
 //////// product //////////////



//  saloon deal //


if (isset($_POST["addSaloonDeals"])) {
    // Retrieve the form data
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_discount = $_POST['pro_discount'];
    $pro_desc = $_POST['pro_desc'];
    $saloon_cate = $_POST['saloon_cate'];//mehwish
    $pro_cate = $_POST['category'];
    // $pro_offer = $_POST['pro_offer'];

    // Image upload handling
    $target_dir = "upload_images/";
    $target_file = $target_dir . basename($_FILES["pro_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pro_image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');window.location.href='section3.php?section=SportsDeal';</script>";
        $uploadOk = 0;
    }

    // Check file size
    // if ($_FILES["pro_image"]["size"] > 500000) {
    //     echo "<script>alert('Sorry, your file is too large.'); window.location.href='products.php';</script>";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href='section3.php?section=SportsDeal';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.'); window.location.href='section3.php?section=SportsDeal';</script>";
    } else {
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion//mehwish
            $insertQuery = "INSERT INTO saloon_deal (merchant_code, pro_name, pro_price, pro_discount, pro_desc, pro_image, saloon_cate) VALUES ( ?, ?, ?, ?, ?, ? , ?)";
            $stmt = mysqli_prepare($config, $insertQuery);
            
            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "sssssss", $pro_cate, $pro_name, $pro_price, $pro_discount, $pro_desc, $target_file ,$saloon_cate);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Product inserted successfully.');  window.location.href='section3.php?section=SaloonDeal';</script>";
                } else {
                    echo "<script>alert('Error inserting product.'); window.location.href='sectio3.php?section=SaloonDeal';</script>";
                }
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the statement.'); window.location.href='section3.php?section=SaloonDeal';</script>";
            }
            
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.') window.location.href='section3.php?section=SaloonDeal';</script>";
        }
    }
}



if (isset($_GET['delete_saloon'])) {
    $SPid = $_GET['delete_saloon'];

    $deleteQuery = "DELETE FROM saloon_deal WHERE pro_id='$SPid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section3.php?section=SaloonDeal");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}

//  saloon deal //


 ?>