<?php
require_once '../../admin/includes/config.php';

if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['center_id'])) {
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
   
    $currency_code = 'INR';
    $amount = $_POST['amount'];
    $success = false;
    $error = '';

    try {
        // Initialize cURL session
        $ch = curl_init();
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/payments/' . $razorpay_payment_id . '/capture');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_USERPWD, 'rzp_live_dZX94YrbtrpPKE' . ':' . '12h6MpC3sFy9H6w3bz3tX4yH');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['amount' => $amount * 100])); // Amount in paisa (Indian subunit)

        // Execute cURL POST request
        $result = curl_exec($ch);
        
        // Get HTTP status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($result === false) {
            $success = false;
            $error = 'Curl error: ' . curl_error($ch);
        } else {
            $response_array = json_decode($result, true);
            // Check success response
            if ($http_status === 200 && !isset($response_array['error'])) {
                $success = true;
            } else {
                $success = false;
                if (!empty($response_array['error']['code'])) {
                    $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                } else {
                    $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                }
            }
        }
        // Close cURL session
        curl_close($ch);
    } catch (Exception $e) {
        $success = false;
        $error = 'OPENCART_ERROR:Request to Razorpay Failed';
    }

    if ($success === true) {
        $orderId = time();
        // Payment successful actions
        // Your database update code, etc.
        $sql = "INSERT INTO `tbl_wallet` (`id`, `type`, `amount`, `timestamp`, `user_id`, `user_type`, `message`) VALUES (NULL, 'cr', '$amount', CURRENT_TIMESTAMP, '".$_POST['center_id']."', 'center', 'Online Wallet Load From Razorpay')";
        mysqli_query($con,$sql);
        $sql="INSERT INTO `orders` (`id`,`paymentid`,`orderid`,`amount`) VALUES (NULL , '$razorpay_payment_id','$orderId','$amount') ";
        mysqli_query($con,$sql);
        header("location:../../center/index.php");
    } else {
        // Payment failed actions
        // Your error handling code
        echo "Payment failed: " . $error;
    }
} else {
    exit('An error occurred. Contact site administrator, please!');
}
?>

?>