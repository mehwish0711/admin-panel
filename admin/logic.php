<?php
include ("config.php");



////////merchant//////////

if (isset($_POST["addMerchant"])) {
    // Retrieve the form data
    $busi_name = $_POST['busi_name'];
    $user_name = $_POST['user_name'];
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
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $discout_percent = $_POST['discout_percent'];
    $offer=$_POST['offer'];

    if ($pass !== $confpass) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location.href='section.php?section=merchant';</script>";
        exit();
    }

    // Validate and format CNIC
    if (preg_match('/^\d{5}-\d{7}-\d{1}$/', $cnic)) {
        // CNIC is already in the correct format
    } else if (preg_match('/^\d{13}$/', $cnic)) {
        // If CNIC is a 13-digit number, format it
        $cnic = substr($cnic, 0, 5) . '-' . substr($cnic, 5, 7) . '-' . substr($cnic, 12, 1);
    } else {
        echo "<script>alert('Invalid CNIC format. Please use xxxxx-xxxxxxx-x or a 13-digit number.'); window.location.href='section.php?section=merchant';</script>";
        exit();
    }

    // Check if the username already exists
    $checkQuery = "SELECT `user_name` FROM `merchant` WHERE `user_name` = ?";
    $checkStmt = mysqli_prepare($config, $checkQuery);

    if ($checkStmt) {
        mysqli_stmt_bind_param($checkStmt, "s", $user_name);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_store_result($checkStmt);

        if (mysqli_stmt_num_rows($checkStmt) > 0) {
            echo "<script>alert('Username already exists.'); window.location.href='section.php?section=merchant';</script>";
            mysqli_stmt_close($checkStmt);
            mysqli_close($config);
            exit();
        }

        mysqli_stmt_close($checkStmt);
    } else {
        echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=merchant';</script>";
        mysqli_close($config);
        exit();
    }

    // Handle file upload for logo
    $m_logo_name = $_FILES['m_logo']['name'];
    $m_logo_tmp_name = $_FILES['m_logo']['tmp_name'];
    $m_logo_type = $_FILES['m_logo']['type'];

    // Check if a file is selected
    if (!empty($m_logo_name)) {
        // Check file type
        if (($m_logo_type == 'image/jpeg' || $m_logo_type == 'image/jpg' || $m_logo_type == 'image/png' || $m_logo_type == 'image/gif' || $m_logo_type == 'image/jfif')) { // Adjust file size limit as needed
            $upload_path = 'upload_images/'; // Specify the upload directory
            $m_logo_final_name = $upload_path . $m_logo_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($m_logo_tmp_name, $m_logo_final_name)) {
                // File uploaded successfully, continue with database insertion

                // Get the last inserted merchant id and increment it
                $getLastMerchantIdQuery = "SELECT MAX(id) AS max_id FROM merchant";
                $result = mysqli_query($config, $getLastMerchantIdQuery);
                $row = mysqli_fetch_assoc($result);
                $lastMerchantId = $row['max_id'];

                // Increment the last merchant id
                $newMerchantId = $lastMerchantId + 1;

                // Generate merchant_code based on the new id
                $cityCode = substr($city, 0, 4);
                $formattedMerchantCode = $cityCode . '-001-' . sprintf('%05d', $newMerchantId);

                // Insert data into the database, including the logo path
                $insertQuery = "INSERT INTO `merchant` (`busi_name`, `logo`,`loca_map`, `user_name`, `fname`, `lname`, `city`, `number`,`whats_num`, `cnic`,`pass`, `confpass`, `merchant_code`,`address`,`latitude`,`longitude`,`discount_percent`,`offer`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_prepare($config, $insertQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssssssssssssssssis", $busi_name, $m_logo_final_name, $loca_map, $user_name, $fname, $lname, $city, $number, $w_number, $cnic, $pass, $confpass, $formattedMerchantCode, $address, $latitude, $longitude, $discout_percent,$offer);

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
                echo "<script>alert('Error uploading logo file.');window.location.href='section.php?section=merchant';</script>";
            }               
        } else {
            echo "<script>alert('Invalid file format or size for logo.');window.location.href='section.php?section=merchant';</script>";
        }
    } else {
        echo "<script>alert('Please select a logo file.');window.location.href='section.php?section=merchant';</script>";
    }
}



if (isset($_POST["m_id"])) {
    $id = $_POST['m_id'];
    $busi_name = $_POST['editBusiName'];
    $email = $_POST['editEmail'];
    $fname = $_POST['editFname'];
    $lname = $_POST['editLname'];
    $map = $_POST['editMap'];
    $number = $_POST['editNumber'];
    $whats_num = $_POST['editWhatsNum'];
    $lati = $_POST['editLati'];
    $longi = $_POST['editLongi'];
    $cnic = $_POST['editCnic'];
    $pass = $_POST['editPassword'];
    $confpass = $_POST['editConfPassword'];
    $discount = $_POST['editDiscount'];
    $offer = $_POST['editOffer'];

    // Check if passwords match
    if ($pass !== $confpass) {
        echo json_encode(array("status" => "error", "message" => "Password and Confirm Password do not match."));
        exit();
    }

    // Validate and format CNIC
    if (preg_match('/^\d{5}-\d{7}-\d{1}$/', $cnic)) {
        // CNIC is already in the correct format
    } else if (preg_match('/^\d{13}$/', $cnic)) {
        // If CNIC is a 13-digit number, format it
        $cnic = substr($cnic, 0, 5) . '-' . substr($cnic, 5, 7) . '-' . substr($cnic, 12, 1);
    } else {
        echo json_encode(array("status" => "error", "message" => "Invalid CNIC format. Please use xxxxx-xxxxxxx-x or a 13-digit number."));
        exit();
    }

    // Check if the username already exists for another merchant
    $checkUsernameQuery = "SELECT `id` FROM `merchant` WHERE `user_name` = '$email' AND `id` != $id";
    $checkUsernameResult = mysqli_query($config, $checkUsernameQuery);

    if ($checkUsernameResult && mysqli_num_rows($checkUsernameResult) > 0) {
        echo json_encode(array("status" => "error", "message" => "Username already exists."));
        mysqli_close($config);
        exit();
    } elseif (!$checkUsernameResult) {
        echo json_encode(array("status" => "error", "message" => "Error checking username."));
        mysqli_close($config);
        exit();
    }

    // Handle file upload for logo
    if (isset($_FILES['editLogo']) && $_FILES['editLogo']['error'] === UPLOAD_ERR_OK) {
        $logo_name = $_FILES['editLogo']['name'];
        $logo_tmp_name = $_FILES['editLogo']['tmp_name'];
        $logo_type = $_FILES['editLogo']['type'];

        // Check file type and size
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/jfif'];
        if (in_array($logo_type, $allowed_types)) {
            $upload_path = 'upload_images/';
            $logo_final_name = $upload_path . basename($logo_name);

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($logo_tmp_name, $logo_final_name)) {
                // Update data into the database, including the logo path
                $updateQuery = "UPDATE `merchant` SET 
                    `busi_name` = '$busi_name',
                    `user_name` = '$email',
                    `fname` = '$fname',
                    `lname` = '$lname',
                    `loca_map` = '$map',
                    `number` = '$number',
                    `whats_num` = '$whats_num',
                    `logo` = '$logo_final_name',
                    `latitude` = $lati,
                    `longitude` = $longi,
                    `cnic` = '$cnic',
                    `pass` = '$pass',
                    `confpass` = '$confpass',
                    `discount_percent` = $discount,
                    `offer` = '$offer'
                    WHERE `id` = $id";

                if (mysqli_query($config, $updateQuery)) {
                    echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
                } else {
                    echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Error uploading logo file."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid file format or size for logo."));
        }
    } else {
        // If no new logo is uploaded, update without changing the logo
        $updateQuery = "UPDATE `merchant` SET 
            `busi_name` = '$busi_name',
            `user_name` = '$email',
            `fname` = '$fname',
            `lname` = '$lname',
            `loca_map` = '$map',
            `number` = '$number',
            `whats_num` = '$whats_num',
            `latitude` = $lati,
            `longitude` = $longi,
            `cnic` = '$cnic',
            `pass` = '$pass',
            `confpass` = '$confpass',
            `discount_percent` = $discount,
            `offer` = '$offer'
            WHERE `id` = $id";

        if (mysqli_query($config, $updateQuery)) {
            echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
        }
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
    $u_user_name = $_POST['u_user_name'];
    //  mehwish
    $member_user_name = $_POST['member_user_name'];
    $u_city = $_POST['u_city'];
    $u_number = $_POST['u_number'];
    $pass = $_POST['pass'];
    $confpass = $_POST['confpass'];
    $u_dob = $_POST['u_dob']; // Retrieve date of birth
    $favorite_sports = isset($_POST['favorite_sports']) ? implode(', ', $_POST['favorite_sports']) : '';

    if ($pass !== $confpass) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location.href='section.php?section=users';</script>";
        exit();
    }

    // Handle the image upload
    $imagePath = "";
    if (isset($_FILES['u_image']) && $_FILES['u_image']['error'] == 0) {
        $uploadDir = 'upload_images/';
        $imagePath = $uploadDir . basename($_FILES['u_image']['name']);

        if (!move_uploaded_file($_FILES['u_image']['tmp_name'], $imagePath)) {
            echo "<script>alert('Error uploading the image.'); window.location.href='section.php?section=users';</script>";
            exit;
        }
    }

    // Check if the username already exists
    $checkQuery = "SELECT `u_user_name` FROM `users` WHERE `u_user_name` = ?";
    $checkStmt = mysqli_prepare($config, $checkQuery);

    if ($checkStmt) {
        mysqli_stmt_bind_param($checkStmt, "s", $u_user_name);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_store_result($checkStmt);

        if (mysqli_stmt_num_rows($checkStmt) > 0) {
            echo "<script>alert('Username already exists.'); window.location.href='section.php?section=users';</script>";
            mysqli_stmt_close($checkStmt);
            mysqli_close($config);
            exit();
        }

        mysqli_stmt_close($checkStmt);
    } else {
        echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=users';</script>";
        mysqli_close($config);
        exit();
    }

    // Update the insert query to include the image path
    $insertQuery = "INSERT INTO `users` (`u_name`, `u_user_name`, `u_city`, `u_number`, `favorite_sports`, `u_image`, `pass`, `confpass`, `dob`,`membership`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($config, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssss", $u_name, $u_user_name, $u_city, $u_number, $favorite_sports, $imagePath, $pass, $confpass, $u_dob,$member_user_name);

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
    $u_member = $_POST['editUsermember'];//mehwish
    $u_user_name = $_POST['editUserEmail'];
    $u_number = $_POST['editUserNumber'];
    $dob = $_POST['editUserDOB'];
    $pass = $_POST['editUserPassword'];
    $confpass = $_POST['editUserConfPassword'];

    // Process favorite sports
    $my_sports = isset($_POST['my_sports']) ? implode(',', $_POST['my_sports']) : '';

    // Check if passwords match
    if ($pass !== $confpass) {
        echo json_encode(array("status" => "error", "message" => "Password and Confirm Password do not match."));
        exit();
    }

    // Check if the username already exists for another user
    $checkQuery = "SELECT `u_id` FROM `users` WHERE `u_user_name` = ? AND `u_id` != ?";
    $checkStmt = mysqli_prepare($config, $checkQuery);

    if ($checkStmt) {
        mysqli_stmt_bind_param($checkStmt, "si", $u_user_name, $id);
        mysqli_stmt_execute($checkStmt);
        mysqli_stmt_store_result($checkStmt);

        if (mysqli_stmt_num_rows($checkStmt) > 0) {
            echo json_encode(array("status" => "error", "message" => "Username already exists."));
            mysqli_stmt_close($checkStmt);
            mysqli_close($config);
            exit();
        }

        mysqli_stmt_close($checkStmt);
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
        mysqli_close($config);
        exit();
    }

    //mehwish
    // Update the user data
    $updateQuery = "UPDATE `users` SET `u_name`=?, `u_user_name`=?, `u_number`=?, `dob`=?, `pass`=?, `confpass`=?, `favorite_sports`=? ,`membership`=?  WHERE `u_id`=?";
    $stmt = mysqli_prepare($config, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $u_name, $u_user_name, $u_number, $dob, $pass, $confpass, $my_sports,$u_member ,$id);

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


if (isset($_POST["addProduct"])) {
    // Retrieve the form data
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    // $pro_discount = $_POST['pro_discount'];
    $pro_desc = $_POST['pro_desc'];
    $pro_cate = $_POST['category'];
    $deal_cate = $_POST['deal_cate'];

    // Check if the 'takeaway' checkbox is set, if not, set it to 0
    $takeaway = isset($_POST['takeaway']) ? $_POST['takeaway'] : 0;

    // Similarly, do the same for the 'dinein' checkbox
    $dinein = isset($_POST['dinein']) ? $_POST['dinein'] : 0;

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
    // if ($_FILES["pro_image"]["size"] > 500000) {
    //     echo "<script>alert('Sorry, your file is too large.'); window.location.href='products.php';</script>";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');  window.location.href='section.php?section=products';</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');  window.location.href='section.php?section=products';</script>";
    } else {

        
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion
            $insertQuery = "INSERT INTO products (merchant_code, pro_name, pro_price, pro_desc, pro_image, takeaway, dinein, deal_cate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($config, $insertQuery);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "ssssssss", $pro_cate, $pro_name, $pro_price, $pro_desc, $target_file, $takeaway, $dinein, $deal_cate);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Product inserted successfully.');  window.location.href='section.php?section=products';</script>";
                } else {
                    echo "<script>alert('Error inserting product.'); window.location.href='section.php?section=products';</script>";
                }
                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=products';</script>";
            }

        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.') window.location.href='section.php?section=products';</script>";
        }
    }
}





if (isset($_POST["p_id"])) {
    // Retrieve product information from POST variables
    $id = $_POST['p_id'];
    $name = $_POST['editProName'];
    $category = $_POST['edit_deal_cate'];
    $price = $_POST['editProPrice'];
    $description = $_POST['editProDesc'];
    $takeaway = isset($_POST['edit-takeaway']) ? 1 : 0;
    $dinein = isset($_POST['edit-dinein']) ? 1 : 0;

    // Existing image path
    $imagePath = '';

    // Check if a new image is uploaded
    if (isset($_FILES['editProImage']) && $_FILES['editProImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['editProImage']['tmp_name'];
        $fileName = $_FILES['editProImage']['name'];
        $fileSize = $_FILES['editProImage']['size'];
        $fileType = $_FILES['editProImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Valid image extensions
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'jfif');

        if (in_array($fileExtension, $allowedExtensions)) {
            // Move the uploaded image to the desired directory
            $uploadFileDir = 'upload_images/';
            $destPath = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imagePath = $destPath;
            } else {
                // If image upload fails, handle error accordingly
                echo json_encode(array("status" => "error", "message" => "Error uploading image."));
                exit;
            }
        } else {
            // If invalid file type, handle error accordingly
            echo json_encode(array("status" => "error", "message" => "Invalid file type."));
            exit;
        }
    }

    // Update query with image path if it's not empty
    $updateQuery = "UPDATE products SET pro_name=?, deal_cate=?, pro_price=?, pro_desc=?, takeaway=?, dinein=?";
    $paramTypes = "ssdsii";
    $paramValues = array($name, $category, $price, $description, $takeaway, $dinein);

    // Append image path to query and parameter types/values if it's not empty
    if (!empty($imagePath)) {
        $updateQuery .= ", pro_image=?";
        $paramTypes .= "s";
        $paramValues[] = $imagePath;
    }

    $updateQuery .= " WHERE pro_id=?";
    $paramTypes .= "i";
    $paramValues[] = $id;

    // Prepare the statement
    if ($stmt = mysqli_prepare($config, $updateQuery)) {
        // Dynamically bind parameters based on types and values
        mysqli_stmt_bind_param($stmt, $paramTypes, ...$paramValues);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "Product updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating product."));
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


/////////////////////banner ////////////////

if (isset($_POST['addBannner'])) {

    $target_dir = 'upload_images/';
    $target_file = $target_dir . basename($_FILES['banner_image']['name']);
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['banner_image']['tmp_name']);


    if ($check === false) {
        echo "<script>alert('File is not an image.'); window.location.href='section.php?section=banner';</script>";
        $uploadOk = 0;
    }

    // Check file size


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location.href='section.php?section=banner';</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');window.location.href='section.php?section=banner';</script>";
    } else {
        // If everything is okay, try to upload file
        if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully, proceed with database insertion
            $insertQuery = "INSERT INTO banner (ban_image) VALUES (?)";
            $stmt = mysqli_prepare($config, $insertQuery);

            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "s", $target_file);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Banner inserted successfully.');  window.location.href='section.php?section=banner';</script>";
                } else {
                    echo "<script>alert('Error inserting banner.'); window.location.href='section.php?section=banner';</script>";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing the statement.'); window.location.href='section.php?section=banner';</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.') window.location.href='section.php?section=banner';</script>";
        }
    }

}


// Check if form data is submitted
// Check if the form is submitted
if (isset($_POST["ban_id"])) {
    // Retrieve banner information from POST variables
    $id = $_POST['ban_id'];

    // Check if a new image is uploaded
    if (isset($_FILES['editBanImage']) && $_FILES['editBanImage']['error'] === UPLOAD_ERR_OK) {
        // Retrieve file details
        $fileTmpPath = $_FILES['editBanImage']['tmp_name'];
        $fileName = $_FILES['editBanImage']['name'];
        $fileSize = $_FILES['editBanImage']['size'];
        $fileType = $_FILES['editBanImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Valid image extensions
        $allowedExtensions = array('jpg', 'jpeg', 'png');

        if (in_array($fileExtension, $allowedExtensions)) {
            // Move the uploaded image to the desired directory
            $uploadFileDir = 'upload_images/';
            $destPath = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imagePath = $destPath; // Only update $imagePath if upload is successful
            } else {
                // If image upload fails, handle error accordingly
                echo json_encode(array("status" => "error", "message" => "Error uploading image."));
                exit;
            }
        } else {
            // If invalid file type, handle error accordingly
            echo json_encode(array("status" => "error", "message" => "Invalid file type."));
            exit;
        }
    } else {
        // No new image uploaded, keep the existing image path in the database
        $imagePath = null;
    }

    // Define your update query
    $updateQuery = "UPDATE banner SET ban_image = ? WHERE ban_id = ?";

    $stmt = mysqli_prepare($config, $updateQuery);

    if ($stmt) {
        // Dynamically bind parameters based on types and values
        mysqli_stmt_bind_param($stmt, 'si', $imagePath, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(array("status" => "success", "message" => "Banner updated successfully."));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating banner: " . mysqli_error($config)));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing the statement: " . mysqli_error($config)));
    }

    mysqli_close($config);
}


if (isset($_GET['delete_banner'])) {
    $Bid = $_GET['delete_banner'];

    $deleteQuery = "DELETE FROM banner WHERE ban_id='$Bid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section.php?section=banner");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}

//////// product //////////////

?>