<?php
header('Content-Type: application/json');
include("config.php");

$response = array();

// Define the base URL for images
$base_url = "https://sportsforlife.pk/sfl/admin/";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Function to fetch banners
    function fetchBanners($config, $base_url) {
        $query_banners = "SELECT ban_id, ban_image FROM banner";
        $result_banners = mysqli_query($config, $query_banners);

        if ($result_banners) {
            $banners = array();
            while ($row = mysqli_fetch_assoc($result_banners)) {
                // Append base URL to banner paths and encode spaces
                $banner_url = $base_url . str_replace(' ', '%20', $row['ban_image']);
                // Create an array with banner ID and URL
                $banner = array(
                    'banner_id' => $row['ban_id'],
                    'banner_img' => $banner_url
                );
                // Add the banner to the banners array
                $banners[] = $banner;
            }
            mysqli_free_result($result_banners);
            return $banners;
        } else {
            $error = "Error fetching banners: " . mysqli_error($config);
            error_log($error);  // Log error
            return array('error' => $error);
        }
    }

    // Call the function to fetch banners
    $banners = fetchBanners($config, $base_url);
    
    if (isset($banners['error'])) {
        $response['success'] = false;
        $response['data'] = [];
        $response['message'] = $banners['error'];
    } else {
        $response['success'] = true;
        $response['data'] = $banners;
        $response['message'] = "Banners fetched successfully.";
    }

    // Output JSON response
    echo json_encode($response);
} else {
    http_response_code(405);
    $response['success'] = false;
    $response['data'] = [];
    $response['message'] = "Method not allowed.";
    echo json_encode($response);
    error_log($response['message']);  // Log error
}

mysqli_close($config);
?>
