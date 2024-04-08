<?php
require_once 'includes/header.php';

if ($_POST['status'] == 'enrollment_verification') {
    $get = $con->query("SELECT * FROM students where registration_no = '" . $_POST['registration_no'] . "' AND dob = '" . $_POST['dob'] . "' AND status = 1");

    if ($get->num_rows) {
        $g = $get->fetch_assoc();
        $center = $con->query("SELECT * FROM centers where id = '" . $g['center_id'] . "'")->fetch_assoc();
        $course = $con->query("SELECT * FROM courses where id = '" . $g['course_id'] . "'")->fetch_assoc();
        ?>
        <style>
            #form {
                display: none;
            }
            img {
    max-width: 30%;
}
        </style>
        <div class="ContentHolder">
            <div class="container">

                <div class="container-fluid" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>REGISTRATION VERIFICATION</h3>
                                </div>
                                <div class="card-body">
                                    <div class="text-center"><img src="uploads/students/<?=$g['photo']?>" ></div>
                                    <p><strong>Registration No:</strong> <?=$g['registration_no']?></p>
                                    <p><strong>Candidate Name:</strong> <?=$g['name']?></p>
                                    <p><strong>Father Name:</strong> <?=$g['father']?></p>
                                    <p><strong>Address:</strong> <?=$g['address']?></p>
                                    <p><strong>Course:</strong> <?=$course['course_name']?></p>
                                    <p><strong>Month & Year of Passing:</strong> <?php echo date('F Y', strtotime($g['dur_ends'])); ?></p>
                                </div>
                                <div class="card-footer">
                                    <p><strong>Examination body :</strong>ALL INDIA PARAMEDICAL & VOCATIONAL EDUCATION COUNCIL</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    } else {
        echo '<div class="alert alert-danger">Invalid Enrollment No. OR Date of birth!</div>';
    }
}
?>
<div class="container">

    <div class="row">

        <div class="col-md-12 col-md-offset-3" id="form">
            <div class="box box-primary">
                <div class="text-center"><img src="uploads/logo/<?=$logo['favicon']?>" style="max-width:40%;height:auto"></div>
                <h3 class="text_heading text-center">CHECK <span class="highlight_color">REGISTRATION</span></h3>
                <div class="box-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Registration No.</label>
                            <input type="text" class="form-control" name="registration_no" placeholder="Enter registration No.">
                        </div>
                        <div class="form-group">
                            <label>Date of birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter Enrollment No.">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit" name="status" value="enrollment_verification">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo '</div></div>';
include 'includes/footer.php';
?>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
