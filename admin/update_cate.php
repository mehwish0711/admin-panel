<?php
include("config.php");

$response = array();

if (isset($_POST["cat_id"])) {
    $categoryId = $_POST['cat_id'];
    $categoryName = $_POST['editCategoryName'];
    $categoryType = $_POST['Edit_cate_type'];

    // Check if the image keys are set in the $_FILES array
    $newImage1Uploaded = isset($_FILES['editCategoryImage']) && !empty($_FILES['editCategoryImage']['name']);
    $newImage2Uploaded = isset($_FILES['editCategoryImage2']) && !empty($_FILES['editCategoryImage2']['name']);

    // Handle the first image (editCategoryImage)
    $targetDir = ""; // Define $targetDir here to avoid undefined variable warning
$targetFile = ""; // Define $targetFile here to avoid undefined variable warning

    if ($newImage1Uploaded) {
        $targetDir = "upload_images/";
        $targetFile = $targetDir . basename($_FILES['editCategoryImage']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["editCategoryImage"]["tmp_name"], $targetFile);
    }

    // Handle the second image (editCategoryImage2)
    $targetFile2 = ""; // Define $targetFile2 here to avoid undefined variable warning

    if ($newImage2Uploaded) {
        $targetFile2 = $targetDir . basename($_FILES['editCategoryImage2']['name']);
        $imageFileType2 = strtolower(pathinfo($targetFile2, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["editCategoryImage2"]["tmp_name"], $targetFile2);
    }

    // Update category information based on image uploads
    if ($newImage1Uploaded || $newImage2Uploaded) {
        handleImageUpload($categoryId, $categoryName, $categoryType, $targetFile, $targetFile2, $newImage1Uploaded, $newImage2Uploaded);
    } else {
        // No new images uploaded, update category without changing images
        $updateQuery = "UPDATE categories SET category='$categoryName'";
        
        // Include category type in the update only if it's set
        if (!empty($categoryType)) {
            $updateQuery .= ", cate_type='$categoryType'";
        }

        $updateQuery .= " WHERE cat_id='$categoryId'";
        
        $result = mysqli_query($config, $updateQuery);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Category updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating category: ' . mysqli_error($config);
        }

        echo json_encode($response);
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request.';
    echo json_encode($response);
}

function handleImageUpload($categoryId, $categoryName, $categoryType, $targetFile, $targetFile2, $newImage1Uploaded, $newImage2Uploaded)
{
    global $config;

    $oldImagePathQuery = "SELECT image, image2 FROM categories WHERE cat_id='$categoryId'";
    $oldImagePathResult = mysqli_query($config, $oldImagePathQuery);

    if ($oldImagePathResult) {
        $oldImages = mysqli_fetch_assoc($oldImagePathResult);

        // Update the category with the new image paths
        $updateQuery = "UPDATE categories SET category='$categoryName'";

        if ($newImage1Uploaded) {
            // Delete old image1 if it exists
            if (!empty($oldImages['image'])) {
                unlink($oldImages['image']);
            }
            $updateQuery .= ", image='$targetFile'";
        } else {
            $updateQuery .= ", image='" . $oldImages['image'] . "'";
        }

        if ($newImage2Uploaded) {
            // Delete old image2 if it exists
            if (!empty($oldImages['image2'])) {
                unlink($oldImages['image2']);
            }
            $updateQuery .= ", image2='$targetFile2'";
        } else {
            $updateQuery .= ", image2='" . $oldImages['image2'] . "'";
        }

        // Include category type in the update only if it's set
        if (!empty($categoryType)) {
            $updateQuery .= ", cate_type='$categoryType'";
        }

        $updateQuery .= " WHERE cat_id='$categoryId'";

        $result = mysqli_query($config, $updateQuery);

        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Category updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating category: ' . mysqli_error($config);
        }

        echo json_encode($response);
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error fetching old image paths: ' . mysqli_error($config);
        echo json_encode($response);
    }
}
?>