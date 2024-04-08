<?php
require_once 'includes/header.php';

if ($_GET['action'] == 'changeStatus') {
    $val = $_GET['val'] ? 0 : 1;
    $id = $_GET['id'];
    $con->query("UPDATE `results` SET `status`= '$val' WHERE id = '$id'");
    echo '<script>alert("Changed Successfully.");window.location.href="create_result.php"</script>';
}

if ($_POST['status'] == 'create_result') {
    $chk = $con->query("SELECT * FROM results where roll_no = '" . $_POST['roll_no'] . "' OR enrollment_no = '" . $_POST['enrollment_no'] . "'");
    if (!($chk->num_rows)) {
        
        if(WALLET_BALANCE && WALLET_BALANCE > paymentConfig('marksheet')){
        
        
            $res = $con->query("INSERT INTO `results` (`roll_no`, `course_id`, `enrollment_no`, `center_id`,`grade`,`result`,re_exam) VALUES 
            ('" . $_POST['roll_no'] . "', '" . $_POST['course_id'] . "','" . $_POST['enrollment_no'] . "', '" . $_SESSION['center']['id'] . "','" . $_POST['grade'] . "','" . $_POST['result'] . "','".$_POST['re_exam']."')");
    
            if ($res) {
                $result_id = $con->insert_id;  // Get the last inserted result_id
    
                // Insert marks data into marks_table
                if (isset($_POST['marks']) && is_array($_POST['marks'])) {
                    
                    // foreach ($_POST['marks'] as $subject_id => $marks) {
                    //     $con->query("INSERT INTO `marks_table` (`result_id`, `marks`, `subject_id`) VALUES 
                    //     ('$result_id', '$marks', '$subject_id')");
                        
                    // }
                    foreach($_POST['subject_id'] as $index => $sub_id){
                        $marks = $_POST['marks'][$index];
                        $con->query("INSERT INTO `marks_table` (`id`, `timestamp`, `result_id`, `marks`, `subject_id`) VALUES (NULL, CURRENT_TIMESTAMP, '$result_id', '$marks', '$sub_id')");
                    }
                    $con->query("INSERT INTO `tbl_wallet`(`type`, `amount`, `user_id`, `user_type`,`message`) VALUES 
            		        ('dr','".paymentConfig('marksheet')."','".$_SESSION['center']['id']."','center','Marksheet generated.')");
                    
                    echo '<script>alert("marks submitted successfully");location.href="create_result.php";</script>';
                }
    
                echo '<script>alert("Result Created Successfully uploaded.");location.href="create_result.php";</script>';
            } else {
                print_r($con->error);
                exit;
            }
        }else{
	            echo '<script>alert("You have too law wallet balance.");location.href="create_certificate.php"</script>';
	        }
    } else {
        die('hi');
    }
}

if ($_GET['action'] == 'del') {
    $con->query("DELETE FROM results where id = '" . $_GET['id'] . "'");
    $con->query("DELETE FROM marks_table where result_id = '" . $_GET['id'] . "'");
    echo '<script>alert("Result Deleted.");location.href="create_result.php"</script>';
}
?>

<div class="box box-primary">
    <div class="box-header"><h3>Create Result</h3></div>
    <div class="box-body">

        <?php
        $null = NULL;
        $student = $con->query("SELECT * FROM students WHERE `status` = '1' AND center_id = '" . $_SESSION['center']['id'] . "'");
        if ($student->num_rows) {
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                    <label>Enrollment No.</label>
                    <select class="form-control get_roll" name="enrollment_no" required="">
                        <option value="">--Select--</option>
                        <?
                        while ($stu = $student->fetch_assoc()) {
                            $itsRe = false;
                            $chk = $con->query("SELECT * FROM results where enrollment_no = '" . $stu['enrollment_no'] . "'");
                            if ($chk->num_rows){
                                $row = $chk->fetch_assoc();
                                if(($row['re_exam'] == 0))
                                    continue;
                                else
                                    $itsRe = true;
                            }
                            echo '<option value="' . $stu['enrollment_no'] . '" data-re_exam="'.$itsRe.'">' . $stu['enrollment_no'] . ( $itsRe ? ' | RE-EXAM' :  '' ). '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Roll No. &nbsp;<span id="load"></span></label>
                    <input id="roll" type="number" class="form-control" name="roll_no">
                </div>
                <div class="form-group col-md-4">
                    <label> Course &nbsp;<span id="load"></span></label>
                    <input type="hidden" name="course_id" id="course_id" value="">
                    <input type="text" class="form-control get_subject" id="data" value="" readonly>
                </div>
                
                
                <?
                    if (isset($_POST['status']) && $_POST['status'] == 'subjects') {
                    // Get the course ID from the POST data
                    $course_id = $_POST['course_id'];
                
                    // Fetch subjects for the specific course
                    $subjectsQuery = $con->query("SELECT * FROM subjects WHERE course_id = '" . $course_id . "'");
                    
                    // Create a string to store the HTML
                    $subjectHTML = '';
                
                    // Fetch subjects and add them to the HTML string
                    while ($subject = $subjectsQuery->fetch_assoc()) {
                        $subjectHTML .= '<div class="form-group col-md-4">' .
                                        '<label>' . $subject['subject_name'] . '</label>' .
                                        '<input type="number" class="form-control" name="marks[' . $subject['id'] . ']" placeholder="Enter marks for ' . $subject['subject_name'] . '" required>' .
                                        '</div>';
                    }
                
                    // Return the HTML response
                    echo $subjectHTML;
                    exit;
    }
                ?>
                <div class="message form-group col-md-12"></div>
                <div id="list"></div>
                <!--<div class="form-group col-md-12">-->
                <!--    <button type="submit" name="status" value="create_result" class="btn btn-sm btn-primary">Submit</button>-->
                <!--</div>-->
            </form>
        <?
        } else {
            echo '<br><br><br><br><div class="alert alert-danger">Student Not Available.</div>';
        }

        ?>
    </div>
    <div class="box-footer">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Enrollment No.</th>
                    <th>Roll No.</th>
                    <th>Course Name</th>
                    <th>Re-Exam</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?
                $get = $con->query("SELECT * FROM results");
                while ($g = $get->fetch_assoc()) {
                    $statusBtn = $g['status'] ? 'success' : 'danger';
                    $statusIcon = $g['status'] ? 'on' : 'off';
                    $c = $con->query("SELECT * FROM courses where id = '" . $g['course_id'] . "'")->fetch_assoc();
                    echo '<tr>
                                <td>' . $g['enrollment_no'] . '</td>
                                <td>' . $g['roll_no'] . '</td>
                                <td>' . $c['course_name'] . '</td>
                                <td>'.( $g['re_exam'] ?'<label class="label label-success">Yes</label>' : '<label class="label label-danger">No</label>').'</td>
                                <td><a href="?id=' . $g['id'] . '&action=del&center_id=' . $_GET['center_id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?
include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.get_subject').on('change', function() {
            get_subject();
        });
    });

  function get_subject() {
    var dataString = 'course_id=' + $('#course_id').val() + '&status=subjects';
    $.ajax({
        url: "../admin/Ajax.php",
        type: "POST",
        data: dataString,
        beforeSend: function() {
            $('#list').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
        },
        success: function(response) {
            // Append the HTML directly to the form
            console.log(response);
            $('#list').html(response);
        },
        complete: function() {},
        error:function(a,v,c){
            console.log(a.responseText);
        }
    });
}


</script>
<script type="text/javascript">
    $('.get_roll').change(function() {
        var dataString = 'enrollment_no=' + $(this).val() + '&status=get_roll';
        var chk = $(this).find('option:selected').data('re_exam');
        var msg = $(".message");
        msg.html('');
        if(chk)
            msg.html('<div class="alert alert-warning"><b>Notice:</b>, This is a Re-Exam Student.</div>');
        
        $.ajax({
            url: "../admin/Ajax.php",
            type: "POST",
            data: dataString,
            beforeSend: function() {
                $('#load').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
            },
            success: function(res) {
                var data = res.split('|');
                console.log(res);
                $('#roll').val(data[0]);
                $('#course_id').val(data[1]);
                $('#data').val(data[2]);
                return get_subject();
            },
            complete: function() {
                $('#load').html('<i class="text-success"><i class="fa fa-check-circle"></i> Complete</i>');
            }
        });
    })
</script>

