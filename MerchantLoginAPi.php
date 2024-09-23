<?php
header('Content-Type: application/json');
include("config.php");

$response = array();

// Define the base URL for images
$base_url = "https://sportsforlife.pk/sfl/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_name']) && isset($_POST['pass'])) {
        $user_name = $_POST['user_name'];
        $pass = $_POST['pass'];

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

        // Function to authenticate user and fetch merchant and deals
        function authenticateAndFetchMerchantAndDeals($user_name, $pass, $merchantTable, $passwordField, $dealTable, $config, $base_url) {
            global $response;
            $query_merchant = "SELECT * FROM $merchantTable WHERE user_name = ?";
            $stmt_merchant = mysqli_prepare($config, $query_merchant);

            if ($stmt_merchant) {
                mysqli_stmt_bind_param($stmt_merchant, "s", $user_name);
                mysqli_stmt_execute($stmt_merchant);
                $result_merchant = mysqli_stmt_get_result($stmt_merchant);

                if ($result_merchant) {
                    $user_merchant = mysqli_fetch_assoc($result_merchant);

                    if ($user_merchant) {
                        if ($user_merchant[$passwordField] === $pass) {
                            $merchantCode = $user_merchant['merchant_code'];
                            // Log the merchant code for debugging
                            error_log("Merchant Code: $merchantCode");

                            // Append base URL to logo path and encode spaces
                            if (isset($user_merchant['logo'])) {
                                $user_merchant['logo'] = $base_url . str_replace(' ', '%20', $user_merchant['logo']);
                            }

                            $deals = fetchDeals($merchantCode, $dealTable, $config, $base_url);

                            if (is_string($deals)) {
                                $response['success'] = false;
                                $response['message'] = $deals;
                            } else {
                                unset($user_merchant[$passwordField]);
                                $response['success'] = true;
                                $response['message'] = "Merchant and deals fetched successfully.";
                                $response['merchant'] = $user_merchant;
                                $response['deals'] = $deals;
                            }
                        } else {
                            $response['success'] = false;
                            $response['message'] = "Incorrect user_name or password.";
                        }
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Merchant not found.";
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = "Error executing merchant query: " . mysqli_error($config);
                    error_log($response['message']);  // Log error
                }

                mysqli_stmt_close($stmt_merchant);
            } else {
                $response['success'] = false;
                $response['message'] = "Error preparing merchant statement: " . mysqli_error($config);
                error_log($response['message']);  // Log error
            }

            return $response;
        }

        // Authenticate and fetch deals for regular merchant
        $response = authenticateAndFetchMerchantAndDeals($user_name, $pass, 'merchant', 'pass', 'products', $config, $base_url);

        // If authentication fails for regular merchant, try sports merchant
        if (!$response['success']) {
            $response = authenticateAndFetchMerchantAndDeals($user_name, $pass, 'sports_merchant', 'pass', 'sports_deal', $config, $base_url);
        }

        // If authentication fails for sports merchant, try salon merchant
        if (!$response['success']) {
            $response = authenticateAndFetchMerchantAndDeals($user_name, $pass, 'saloon_merchant', 'pass', 'saloon_deal', $config, $base_url);
        }
    } else {
        $response['success'] = false;
        $response['message'] = "user_name and password are required.";
        error_log($response['message']);  // Log error
    }

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
