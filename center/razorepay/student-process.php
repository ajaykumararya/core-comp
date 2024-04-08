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
        require_once 'common.php';
        $img = photo_upload('image','students');
		if($img['status']){
		    $image = $img['file_name'];
		}else{
		    $image= '';
		}
		$data = 	$con->query("INSERT INTO `students` (`dur_start`,`dur_ends`,`id`, `timestamp`, `enrollment_no`, `name`, `gender`, `father`, `mother`, `dob`, `mobile`, `email`,`address`, `state`, `distric`, `exam_pass`, `marks`, `board`, `year`, `username`, `password`, `course_id`, `center_id`, `photo`,  `status`) VALUES ('".$_POST['dur_start']."','".$_POST['dur_ends']."',NULL, CURRENT_TIMESTAMP, '".ENROLL."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['father']."', '".$_POST['mother']."', '".$_POST['dob']."', '".$_POST['mobile']."', '".$_POST['email']."', '".$_POST['address']."','".$_POST['state']."', '".$_POST['distric']."', '".$_POST['exam_pass']."', '".$_POST['marks']."', '".$_POST['board']."', '".$_POST['year']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['course_id']."', '".$_POST['center_id']."', '".$image."', '0')");
		  // var_dump($data);
		  //  exit;
		   $id = mysqli_insert_id($con);
			echo '<script>alert("Student Registration Success.");location.href="'.BASE_URL.'student_details.php?id='.$id.'"</script>';
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