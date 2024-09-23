<?php
header('Content-Type: application/json');
include("config.php");

// Enable detailed error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array();

// Define the base URL for images
$base_url = "https://sportsforlife.pk/sfl/";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Function to fetch deals
    function fetchDeals($merchantCode, $dealTable, $config, $base_url) {
        $query_deals = "SELECT * FROM $dealTable WHERE merchant_code = ?";
        $stmt_deals = mysqli_prepare($config, $query_deals);

        if ($stmt_deals) {
            mysqli_stmt_bind_param($stmt_deals, "s", $merchantCode);
            mysqli_stmt_execute($stmt_deals);
            $result_deals = mysqli_stmt_get_result($stmt_deals);

            if ($result_deals) {
                $deals = mysqli_fetch_all($result_deals, MYSQLI_ASSOC);

                // Append base URL to image paths in deals and encode spaces
                foreach ($deals as &$deal) {
                    if (isset($deal['pro_image'])) {
                        $deal['pro_image'] = $base_url . str_replace(' ', '%20', $deal['pro_image']);
                    }
                }

                mysqli_stmt_close($stmt_deals);
                return $deals;
            } else {
                $error = "Error executing deals query: " . mysqli_error($config);
                error_log($error);  // Log error
                mysqli_stmt_close($stmt_deals);
                return $error;
            }
        } else {
            $error = "Error preparing deals statement: " . mysqli_error($config);
            error_log($error);  // Log error
            return $error;
        }
    }

    // Function to fetch all merchants and their deals
    function fetchMerchantsAndDeals($merchantTable, $dealTable, $config, $base_url) {
        $response = array();

        $query_merchants = "SELECT * FROM $merchantTable";
        $result_merchants = mysqli_query($config, $query_merchants);

        if ($result_merchants) {
            $merchants = mysqli_fetch_all($result_merchants, MYSQLI_ASSOC);

            foreach ($merchants as &$merchant) {
                $merchantCode = $merchant['merchant_code'];
                
                // Append base URL to logo path and encode spaces
                if (isset($merchant['logo'])) {
                    $merchant['logo'] = $base_url . str_replace(' ', '%20', $merchant['logo']);
                }

                $deals = fetchDeals($merchantCode, $dealTable, $config, $base_url);

                if (is_string($deals)) {
                    $response['success'] = false;
                    $response['message'] = $deals;
                    return $response;
                } else {
                    $merchant['deals'] = $deals;
                }
            }

            $response['success'] = true;
            $response['message'] = "Merchants and deals fetched successfully.";
            $response['saloon_merchants'] = $merchants;
        } else {
            $response['success'] = false;
            $response['message'] = "Error executing merchants query: " . mysqli_error($config);
            error_log($response['message']);  // Log error
        }

        return $response;
    }

    // Fetch merchants and their deals for restaurants
    $response = fetchMerchantsAndDeals('saloon_merchant', 'saloon_deal', $config, $base_url);
    
    // Output JSON response
    echo json_encode($response);
} else {
    http_response_code(405);
    $response['success'] = false;
    $response['message'] = "Method not allowed.";
    echo json_encode($response);
    error_log($response['message']);  // Log error
}

mysqli_close($config);
?>
