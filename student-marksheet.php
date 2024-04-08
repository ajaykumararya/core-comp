<?php
require_once 'admin/includes/config.php';
if(isset($_GET['marksheet_id'])){
    $marksheet_id = $_GET['marksheet_id'];
    $marksheet_id = base64_decode(base64_decode($marksheet_id));
    // echo $marksheet_id;
    
    $result = $con->query("SELECT *,r.id as marksheet_id FROM results as r,students as s WHERE r.id = '$marksheet_id' and r.enrollment_no = s.enrollment_no");
    // echo '<pre>';
    // print_r($con);
    $__S = ($result->fetch_assoc());
    
    $institute = $con->query("SELECT * FROM centers where id = '".$__S['center_id']."'")->fetch_assoc();
    
    
    $courseDetails = $con->query("SELECT * FROM courses WHERE id = '".$__S['course_id']."'")->fetch_assoc();
    
    $course_duration = $courseDetails['duration'];
    $course_duration_type = $courseDetails['duration_type'];
    $course_name = $courseDetails['course_name'];
    $course_id = $courseDetails['id'];
			
	 $bg = '../format/marksheet.jpg';
    $enroll_no = $__S['enrollment_no'];
    $photo = '../uploads/students/'.$__S['photo'];
    $serial_no = $__S['marksheet_id'];
    $sr_no = $__S['sr_no'];
    $res = $__S['result'];
    $sex = ucwords($__S['gender']);
    $name = ucwords($__S['name']);
    $father = ucwords($__S['father']);
    $dob = date('d-m-Y', strtotime($__S['dob']));
    $mother = ucwords($__S['mother']);
    // $course_name = ucwords($course['short_name']);
    // $duration=$course['duration'];
    $roll_no = $__S['roll_no'];
    $center_name = $institute['institute_name'];
    $issue_date = $__S['issue_date'];
    $isu = date($issue_date,"D-M-Y ");
    $grade = $__S['grade'];
    
    $hidden_duration = $__S['duration'];
    $examination = $__S['examination'];
    
    $duration = $__S['duration'] .' '. ucwords($__S['duration_type']);

       
    

    include 'result.php';
}

?>