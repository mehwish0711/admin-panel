<?php
include("config.php");

// sports //

if (isset($_POST["addSportsMerchant"])) {
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
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $discount = $_POST['discount_percent'];

    if ($pass !== $confpass) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location.href='section2.php?section=sports';</script>";
        exit();
    }

    if (preg_match('/^\d{5}-\d{7}-\d{1}$/', $cnic)) {
        // CNIC is already in the correct format
    } else if (preg_match('/^\d{13}$/', $cnic)) {
        // If CNIC is a 13-digit number, format it
        $cnic = substr($cnic, 0, 5) . '-' . substr($cnic, 5, 7) . '-' . substr($cnic, 12, 1);
    } else {
        echo "<script>alert('Invalid CNIC format. Please use xxxxx-xxxxxxx-x or a 13-digit number.'); window.location.href='section2.php?section=sports';</script>";
        exit();
    }

    // Handle file upload for logo
    $logo_name = $_FILES['logo']['name'];
    $logo_tmp_name = $_FILES['logo']['tmp_name'];
    $logo_type = $_FILES['logo']['type'];
    // $logo_size = $_FILES['logo']['size'];
    
    // Check if a file is selected
    if (!empty($logo_name)) {
        // Check file type
        if (($logo_type == 'image/jpeg' || $logo_type == 'image/jpg' || $logo_type == 'image/png' || $logo_type == 'image/gif')) { // Adjust file size limit as needed
            $upload_path = 'upload_images/'; // Specify the upload directory
            $logo_final_name = $upload_path . $logo_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($logo_tmp_name, $logo_final_name)) {
                // File uploaded successfully, continue with database insertion                                                                                     

                // Get the last inserted merchant code and increment it
                $getLastMerchantIdQuery = "SELECT MAX(id) AS max_id FROM sports_merchant";
                $result = mysqli_query($config, $getLastMerchantIdQuery);
                $row = mysqli_fetch_assoc($result);
                $lastMerchantId = $row['max_id'];

                // Increment the last merchant id
                $newMerchantId = $lastMerchantId + 1;

                // Generate merchant_code based on the new id
                $cityCode = substr($city, 0, 4);
                $formattedMerchantCode = $cityCode . '-002-' . sprintf('%05d', $newMerchantId);


                // Insert data into the database, including the logo path
                $insertQuery = "INSERT INTO `sports_merchant` (`busi_name`, `logo`,`loca_map`,`address`, `merchant_code`, `user_name`, `fname`, `lname`, `city`, `number`,`whats_num`,`cnic`,`latitude`,`longitude`, `pass`, `confpass`,`discount_percent`) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ? , ? , ?,?,?,?,?,?)";

                $stmt = mysqli_prepare($config, $insertQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $busi_name, $logo_final_name,$loca_map, $address, $formattedMerchantCode, $email, $fname, $lname, $city, $number, $w_number,$cnic,$latitude,$longitude ,$pass, $confpass,$discount);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Merchant inserted successfully.'); window.location.href='section2.php?section=sports';</script>";
                    } else {
                        echo "<script>alert('Error inserting merchant.'); window.location.href='section2.php?section=sports';</script>";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "<script>alert('Error preparing the statement.'); window.location.href='section2.php?section=sports';</script>";
                }
            } else {
                echo "<script>alert('Error uploading logo file.');window.location.href='section2.php?section=sports';</script>";
            }
        } else {
            echo "<script>alert('Invalid file format or size for logo.');window.location.href='section2.php?section=sports';</script>";
        }
    } else {
        echo "<script>alert('Please select a logo file.');window.location.href='section2.php?section=sports';</script>";
    }
}

if (isset($_POST["sp_id"])) {
    $id = $_POST['sp_id'];
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

    // Handle file upload for logo
    if (isset($_FILES['editLogo']) && $_FILES['editLogo']['error'] === UPLOAD_ERR_OK) {
        $logo_name = $_FILES['editLogo']['name'];
        $logo_tmp_name = $_FILES['editLogo']['tmp_name'];
        $logo_type = $_FILES['editLogo']['type'];
        // $logo_size = $_FILES['editLogo']['size'];

        // Check file type and size
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (in_array($logo_type, $allowed_types)) { // 1MB file size limit
            $upload_path = 'upload_images/';
            $logo_final_name = $upload_path . basename($logo_name);

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($logo_tmp_name, $logo_final_name)) {
                // Update data into the database, including the logo path
                $updateQuery = "UPDATE `sports_merchant` SET `busi_name`=?, `email`=?, `fname`=?, `lname`=?, `loca_map`=?, `number`=?, `whats_num`=?, `logo`=?, `latitude`=?, `longitude`=?, `cnic`=?, `pass`=?, `confpass`=? WHERE `id`=?";
                $stmt = mysqli_prepare($config, $updateQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssssssi", $busi_name, $email, $fname, $lname, $map, $number, $whats_num, $logo_final_name, $lati, $longi, $cnic, $pass, $confpass, $id);

                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Error uploading logo file."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid file format or size for logo."));
        }
    } else {
        // If no new logo is uploaded, update without changing the logo
        $updateQuery = "UPDATE `sports_merchant` SET `busi_name`=?, `email`=?, `fname`=?, `lname`=?, `loca_map`=?, `number`=?, `whats_num`=?, `latitude`=?, `longitude`=?, `cnic`=?, `pass`=?, `confpass`=? WHERE `id`=?";
        $stmt = mysqli_prepare($config, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssssssi", $busi_name, $email, $fname, $lname, $map, $number, $whats_num, $lati, $longi, $cnic, $pass, $confpass, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
            } else {
                echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
            }

            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
        }
    }

    mysqli_close($config);
}




if (isset($_GET['delete_sports'])) {
    $SpId = $_GET['delete_sports'];

    $deleteQuery = "DELETE FROM sports_merchant WHERE id='$SpId'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section2.php?section=sports");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}


// sports //


// saloon // 

if (isset($_POST["addSaloonMerchant"])) {
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
    $s_cnic = $_POST['cnic'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $discount = $_POST['discount_percent'];

    if ($pass !== $confpass) {
        echo "<script>alert('Password and Confirm Password do not match.'); window.location.href='section2.php?section=saloon';</script>";
        exit();
    }

    if (preg_match('/^\d{5}-\d{7}-\d{1}$/', $s_cnic)) {
        // CNIC is already in the correct format
    } else if (preg_match('/^\d{13}$/', $s_cnic)) {
        // If CNIC is a 13-digit number, format it
        $s_cnic = substr($s_cnic, 0, 5) . '-' . substr($s_cnic, 5, 7) . '-' . substr($s_cnic, 12, 1);
    } else {
        echo "<script>alert('Invalid CNIC format. Please use xxxxx-xxxxxxx-x or a 13-digit number.'); window.location.href='section2.php?section=saloon';</script>";
        exit();
    }

    // Handle file upload for logo
    $logo_name = $_FILES['logo']['name'];
    $logo_tmp_name = $_FILES['logo']['tmp_name'];
    $logo_type = $_FILES['logo']['type'];
    // $logo_size = $_FILES['logo']['size'];
    
    // Check if a file is selected
    if (!empty($logo_name)) {
        // Check file type
        if (($logo_type == 'image/jpeg' || $logo_type == 'image/jpg' || $logo_type == 'image/png' || $logo_type == 'image/gif')) { // Adjust file size limit as needed
            $upload_path = 'upload_images/'; // Specify the upload directory
            $logo_final_name = $upload_path . $logo_name;

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($logo_tmp_name, $logo_final_name)) {
                // File uploaded successfully, continue with database insertion                                                                                     

                // Get the last inserted merchant code and increment it
                $getLastMerchantIdQuery = "SELECT MAX(id) AS max_id FROM saloon_merchant";
                $result = mysqli_query($config, $getLastMerchantIdQuery);
                $row = mysqli_fetch_assoc($result);
                $lastMerchantId = $row['max_id'];

                // Increment the last merchant id
                $newMerchantId = $lastMerchantId + 1;

                // Generate merchant_code based on the new id
                $cityCode = substr($city, 0, 4);
                $formattedMerchantCode = $cityCode . '-003-' . sprintf('%05d', $newMerchantId);


                // Insert data into the database, including the logo path
                $insertQuery = "INSERT INTO `saloon_merchant` (`busi_name`, `logo`,`loca_map`,`address`, `merchant_code`, `user_name`, `fname`, `lname`, `city`, `number`,`whats_num`, `cnic`,`latitude`,`longitude`, `pass`, `confpass`,`discount_percent`) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ? , ? , ?,?,?,?,?,?)";

                $stmt = mysqli_prepare($config, $insertQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $busi_name, $logo_final_name,$loca_map, $address, $formattedMerchantCode, $email, $fname, $lname, $city, $number, $w_number ,$s_cnic,$latitude,$longitude ,$pass, $confpass,$discount);

                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Merchant inserted successfully.'); window.location.href='section2.php?section=saloon';</script>";
                    } else {
                        echo "<script>alert('Error inserting merchant.');  window.location.href='section2.php?section=saloon';</script>";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "<script>alert('Error preparing the statement.'); window.location.href='section2.php?section=saloon';</script>";
                }
            } else {
                echo "<script>alert('Error uploading logo file.'); window.location.href='section2.php?section=saloon';</script>";
            }
        } else {
            echo "<script>alert('Invalid file format or size for logo.'); window.location.href='section2.php?section=saloon';</script>";
        }
    } else {
        echo "<script>alert('Please select a logo file.'); window.location.href='section2.php?section=saloon';</script>";
    }
}



if (isset($_POST["sm_id"])) {
    $id = $_POST['sm_id'];
    $busi_name = $_POST['editSaloonBusiName'];
    $email = $_POST['editSaloonEmail'];
    $fname = $_POST['editSaloonFname'];
    $lname = $_POST['editSaloonLname'];
    $map = $_POST['editSaloonMap'];
    $number = $_POST['editSaloonNumber'];
    $whats_num = $_POST['editSaloonWhatsNum'];
    $lati = $_POST['editSaloonLati'];
    $longi = $_POST['editSaloonLongi'];
    $cnic = $_POST['editSaloonCnic'];
    $pass = $_POST['editSaloonPassword'];
    $confpass = $_POST['editSaloonConfPassword'];

    // Handle file upload for logo
    if (isset($_FILES['editSaloonLogo']) && $_FILES['editSaloonLogo']['error'] === UPLOAD_ERR_OK) {
        $logo_name = $_FILES['editSaloonLogo']['name'];
        $logo_tmp_name = $_FILES['editSaloonLogo']['tmp_name'];
        $logo_type = $_FILES['editSaloonLogo']['type'];
        // $logo_size = $_FILES['editSaloonLogo']['size'];

        // Check file type and size
        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (in_array($logo_type, $allowed_types)) { // 1MB file size limit
            $upload_path = 'upload_images/';
            $logo_final_name = $upload_path . basename($logo_name);

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($logo_tmp_name, $logo_final_name)) {
                // Update data into the database, including the logo path
                $updateQuery = "UPDATE `saloon_merchant` SET `busi_name`=?, `email`=?, `fname`=?, `lname`=?, `loca_map`=?, `number`=?, `whats_num`=?, `logo`=?, `latitude`=?, `longitude`=?, `cnic`=?, `pass`=?, `confpass`=? WHERE `id`=?";
                $stmt = mysqli_prepare($config, $updateQuery);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssssssi", $busi_name, $email, $fname, $lname, $map, $number, $whats_num, $logo_final_name, $lati, $longi, $cnic, $pass, $confpass, $id);

                    if (mysqli_stmt_execute($stmt)) {
                        echo json_encode(array("status" => "success", "message" => "Merchant updated successfully."));
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Error uploading logo file."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Invalid file format or size for logo."));
        }
    } else {
        // If no new logo is uploaded, update without changing the logo
        $updateQuery = "UPDATE `saloon_merchant` SET `busi_name`=?, `email`=?, `fname`=?, `lname`=?, `loca_map`=?, `number`=?, `whats_num`=?, `latitude`=?, `longitude`=?, `cnic`=?, `pass`=?, `confpass`=? WHERE `id`=?";
        $stmt = mysqli_prepare($config, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssssssi", $busi_name, $email, $fname, $lname, $map, $number, $whats_num, $lati, $longi, $cnic, $pass, $confpass, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(array("status" => "success", "message" => "Merchsaant updated successfully."));
            } else {
                echo json_encode(array("status" => "error", "message" => "Error updating merchant."));
            }

            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(array("status" => "error", "message" => "Error preparing the statement."));
        }
    }

    mysqli_close($config);
}






if (isset($_GET['delete_saloon'])) {
    $Mid = $_GET['delete_saloon'];

    $deleteQuery = "DELETE FROM saloon_merchant WHERE id='$Mid'";

    if (mysqli_query($config, $deleteQuery)) {
        // Successful deletion
        header("Location: section2.php?section=saloon");
    } else {
        // Handle deletion error
        echo "Error deleting product: " . mysqli_error($config);
    }
}
// saloon // 



// saloon deal update code//
if (isset($_POST["sld_id"])) {
    $id = $_POST['sld_id'];
    $name = $_POST['editSaloonProName'];
    $price = $_POST['editSaloonProPrice'];
    $discount = $_POST['editSaloonProDiscount'];
    $cate = $_POST['editSaloonName'];//mehwish
    $description = $_POST['editSaloonProDesc'];
    $imagePath = '';

    if (isset($_FILES['editSaloonProImage']) && $_FILES['editSaloonProImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['editSaloonProImage']['tmp_name'];
        $fileName = $_FILES['editSaloonProImage']['name'];
        $fileSize = $_FILES['editSaloonProImage']['size'];
        $fileType = $_FILES['editSaloonProImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png','jfif','gif');
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

    // Initialize the base update query
    $updateQuery = "UPDATE saloon_deal SET pro_name=?, pro_price=?, pro_discount=?, pro_desc=? ,saloon_cate=? ";//mehwish
    $paramTypes = "sdsss";
    $paramValues = array($name, $price, $discount, $description ,$cate);//mehwish

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
// saloon deal update code//


?>