<?
require_once 'includes/header.php';
// print_r($_SESSION['center']['id']);
$get = $con->query("SELECT * FROM centers where id = '".$_SESSION['center']['id']."'")->fetch_assoc();
$s = $con->query("SELECT * FROM states where id = '".$get['state_id']."'")->fetch_assoc();
$c = $con->query("SELECT * FROM city where id = '".$get['city_id']."'")->fetch_assoc();
$t = $con->query("SELECT * FROM franchisee_transections where id = '".$get['transection_id']."'")->fetch_assoc();

$result = $con->query("SELECT count(*) as total_students FROM students WHERE center_id = '".$_SESSION['center']['id']."'");
$row = $result->fetch_assoc();
$totalStudents = $row['total_students'];

if($_POST['status'] == 'addFund'){
    
    $data =[
        'type' => 'Add Fund (Center)',
        'name' => $get['institute_name'],
        'phone' => $get['contact_number'],
        'email' =>$get['email_id'],
        'custom_id' => $get['id'],
        'amount' => $_POST['amount'],
    ];
    $link = BASE_URL.'instamojo/pay.php?'.http_build_query($data);
    echo "<script>window.location.href='$link'</script>";
}
?>

<style>
    .notification-container {
    width: 100%;
    overflow: hidden;
    /*border: 1px solid black;*/
    height: 45px;
    font-size: 2em;
    background-color: #fffcfa;
    color: #8f2c2c;
    box-shadow:5px solid black;
    margin-bottom:30px;
}
a:hover {
  color: red;
}

.notification-container : hover{
    color:red;
}

.notification {
    display: inline-block;
    white-space: nowrap;
    margin-right: 20px; /* Adjust the spacing between notifications */
    animation: scrollLeft 30s linear infinite;
    width:100%;
    height:auto;/* Adjust the animation duration as needed */
}
 
@keyframes scrollLeft {
    0% {
        transform: translateX(100%); /* Start offscreen to the right */
    }
    100% {
        transform: translateX(-100%); /* Scroll to the left */
    }
}

</style>

<div class="row">
  

    <div class="notification-container">
    <?php
    $data = $con->query("SELECT * FROM notification");
    if ($data->num_rows) {
        while ($res = $data->fetch_assoc()) {
            echo '<div class="notification">
                    <img decoding="async" class="alignnone wp-image-12179 size-full" src="'.BASE_URL.'/uploads/newicon.gif" alt="" width="30" height="14">
                    <a href="' . $res['link_url'] . '" target="_blank">' . $res['title'] . '</a>
                  </div>';
        }
    }
    ?>
</div>

<?


$ab=0;    
$sql="SELECT * FROM `orders` ";
$row= mysqli_query($con,$sql);
while ($value=mysqli_fetch_assoc($row)) {
$amt=$value['amount'];
$amount1=$ab+=$amt;
// $amount=$_SESSION['amount'];
// $amounts=$amount-$amount1;
}
    ?>
    


    
    <!--<div class="col-md-3">-->
    <!--    <div class="panel panel-warning">-->
    <!--        <div class="panel-heading"><h4>Wallet Balance</h4></div>-->
    <!--        <div class="panel-body">-->
    <!--            <h4>Rs. < ?=wallet($_SESSION['center']['id']);?></h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-md-3">-->
    <!--    <div class="panel panel-danger">-->
    <!--        <div class="panel-heading"><h4>Total Amount</h4></div>-->
    <!--        <div class="panel-body">-->
    <!--            <h4  style ="color:red">Total :<? echo  $amount1; ?>-->
    <!--            </h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <!--<div class="col-md-3">-->
    <!--    <div class="panel panel-warning">-->
    <!--        <div class="panel-heading"><h4>Total Issued Certificates</h4></div>-->
    <!--        <div class="panel-body">-->
    <!--            <h4>Rs. <?=wallet($_SESSION['center']['id']);?></h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-md-3">-->
    <!--    <div class="panel panel-warning">-->
    <!--        <div class="panel-heading"><h4>Total Pending certificates</h4></div>-->
    <!--        <div class="panel-body">-->
    <!--            <h4>Rs. <?=wallet($_SESSION['center']['id']);?></h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
     <!--<div class="col-md-4">-->
     <!--   <div class="panel panel-success">-->
     <!--       <div class="panel-heading"><h4>Add Fund</h4></div>-->
     <!--       <div class="panel-body">-->
    <!--    <form action="razorepay/pay.php" id="checkout-selection" method="POST" class="form-inline">-->
        <!--<input type="radio" name="checkout" value="automatic">Automatic Checkout Demo<br>-->
        <!--<input type="radio" name="checkout" value="orders">Manual Checkout Demo<br>-->
    <!--    <label>Amount</label>-->
    <!--    <input type="text" name="amounts" class="form-control" placeholder="Enter Amount">-->
        
    <!--    <input type="submit" class="btn btn-sm btn-info mt-2" value="Pay">-->
    <!--</form>-->
    
     <!--<form action="razorepay/process.php" id="paymentForm" method="POST" class="form-inline wallet-form">-->
     <!--               <div class="form-group">-->
     <!--                   <label>Amount</label>-->
     <!--                   <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount">-->
     <!--                   <input type="hidden" name="center_id" value="<?=$_SESSION['center']['id']?>">-->
     <!--                   <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id"/>-->
     <!--                   <input type="hidden" name="razorpay_signature" id="razorpay_signature"/>-->
     <!--               </div>-->
     <!--               <button type="button" class="btn btn-sm btn-info" id="adds">Pay</button>-->
     <!--           </form>-->
    
                
                
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header"><h3>Profile</h3></div>
            <div class="box-body">
                <table class="table table-striped">
                    <tbody>
                        <tr><th>Institute ID</th> <td><?=$get['center_number']?></td></tr>
                        <tr><th>Institute Name</th> <td><?=$get['institute_name']?></td></tr>
                        <tr><th>Institute Director Name</th> <td><?=$get['name']?></td></tr>
                        <tr><th>Date of birth</th> <td><?=$get['dob']?></td></tr>
                        <tr><th>Pan Card No.</th> <td><?=$get['pan_number']?></td></tr>
                        <tr><th>Aadhar No.</th> <td><?=$get['aadhar_number']?></td></tr>
                        <tr><th>Institute Address</th> <td><?=$get['center_full_address']?></td></tr>
                        <tr><th>State</th> <td><?=$s['state_name']?></td></tr>
                        <tr><th>Distric</th> <td><?=$c['city_name']?></td></tr>
                        <tr><th>No. of Computers</th> <td><?=$get['no_of_computer_operator']?></td></tr>
                        <tr><th> No. of class rooms</th> <td><?=$get['no_of_class_room']?></td></tr>
                        <tr><th>Total Computers</th> <td><?=$get['total_computer']?></td></tr>
                        <tr><th>Space of computer center</th> <td><?=$get['space_of_computer_center']?></td></tr>
                        <tr><th>E-Mail ID</th> <td><?=$get['email_id']?></td></tr>
                        <tr><th>Qualification of center head</th> <td><?=$get['qualification_of_center_head']?></td></tr>
                        <tr><th>Staff Room</th> <td><?=$get['staff_room']?></td></tr>
                        <tr><th>Water Supply</th> <td><?=$get['water_supply']?></td></tr>
                        <tr><th>Toilet</th> <td><?=$get['toilet']?></td></tr>
                        <tr><th>Reception</th> <td><?=$get['reception']?></td></tr>
                        <tr><th>Username</th> <td><?=$get['username']?></td></tr>
                        <!--<tr><th>Transection ID</th> <td>< ?=$t['txnid']?></td></tr>-->
                        <!--<tr><th>Payment Status</th> <td>< ?=$t['status']?></td></tr>-->
                        <tr><th>Photo</th> <td><img style="width:120px;height:95px;" src="../uploads/centers/<?=$get['image']?>"></td></tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?
// print_r($_SESSION);
include 'includes/footer.php';

?>
<script>
    $(document).ready(function() {
        let isHovered = false;
        const notificationContainer = $(".notification-container");
        const notifications = $(".notification");

        notificationContainer.mouseenter(function() {
            isHovered = true;
            pauseAnimation();
        });

        notificationContainer.mouseleave(function() {
            isHovered = false;
            resumeAnimation();
        });

        function pauseAnimation() {
            if (!isHovered) return;
            notifications.each(function() {
                $(this).css("animation-play-state", "paused");
            });
        }

        function resumeAnimation() {
            if (isHovered) return;
            notifications.each(function() {
                $(this).css("animation-play-state", "running");
            });
        }
    });
</script>
