<?php
header('Content-Type: application/json');
include("config.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        // Function to fetch deals
        function fetchDeals($merchantCode, $dealTable, $config) {
            $query_deals = "SELECT * FROM $dealTable WHERE merchant_code = ?";
            $stmt_deals = mysqli_prepare($config, $query_deals);

            if ($stmt_deals) {
                mysqli_stmt_bind_param($stmt_deals, "s", $merchantCode);
                mysqli_stmt_execute($stmt_deals);
                $result_deals = mysqli_stmt_get_result($stmt_deals);

                if ($result_deals) {
                    $deals = mysqli_fetch_all($result_deals, MYSQLI_ASSOC);
                    mysqli_stmt_close($stmt_deals);

                    // Log the deals fetched
                    error_log("Deals fetched: " . json_encode($deals));

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

        // Function to authenticate user and fetch deals
        function authenticateAndFetchDeals($email, $pass, $merchantTable, $passwordField, $dealTable, $config) {
            global $response;
            $query_merchant = "SELECT * FROM $merchantTable WHERE email = ?";
            $stmt_merchant = mysqli_prepare($config, $query_merchant);

            if ($stmt_merchant) {
                mysqli_stmt_bind_param($stmt_merchant, "s", $email);
                mysqli_stmt_execute($stmt_merchant);
                $result_merchant = mysqli_stmt_get_result($stmt_merchant);

                if ($result_merchant) {
                    $user_merchant = mysqli_fetch_assoc($result_merchant);

                    if ($user_merchant) {
                        if ($user_merchant[$passwordField] === $pass) {
                            $merchantCode = $user_merchant['merchant_code'];
                            // Log the merchant code for debugging
                            error_log("Merchant Code: $merchantCode");

                            $deals = fetchDeals($merchantCode, $dealTable, $config);

                            if (is_string($deals)) {
                                $response['success'] = false;
                                $response['message'] = $deals;
                            } else {
                                $response['success'] = true;
                                $response['message'] = "Deals fetched successfully.";
                                $response['deals'] = $deals;
                            }
                        } else {
                            $response['success'] = false;
                            $response['message'] = "Incorrect email or password.";
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
        $response = authenticateAndFetchDeals($email, $pass, 'merchant', 'pass', 'products', $config);

        // If authentication fails for regular merchant, try sports merchant
        if (!$response['success']) {
            $response = authenticateAndFetchDeals($email, $pass, 'sports_merchant', 'pass', 'sports_deal', $config);
        }

        // If authentication fails for sports merchant, try salon merchant
        if (!$response['success']) {
            $response = authenticateAndFetchDeals($email, $pass, 'salon_merchant', 'pass', 'saloon_deal', $config);
        }

    } else {
        $response['success'] = false;
        $response['message'] = "Email and password are required.";
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
