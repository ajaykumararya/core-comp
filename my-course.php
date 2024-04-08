<?
require_once 'includes/header.php';
?>

<style>
        .home_banner.contactus {
        background: url(theme/img/contactus-slide.jpg) no-repeat right top;
        background-size: cover;
    }
    .home_banner.inner .banner-info {
    right: 15px;
    left: 15px;
}
.home_banner.inner::before {
    content: "";
    z-index: 1;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background-color: rgba(60,50,30,0.75);
}
.home_banner.inner {
    position: relative;
}
.hover-btn{
    transition:.3s;
    border:3px groove black;
    box-shadow:0 10px 20px 0 black;
    border-radius : 5px;
}
.hover-btn:hover{
    background:rgb(0,0,0,.7);
    box-shadow:0 0 20px 0 black;
    transition:.3s;
    border-radius: 40px / 90px;
}

</style>
        
<div class="ContentHolder">
    <div class="container-fluid">
        <div class="row">
            <?php
            $selectCourses = $con->query("SELECT * FROM students as s,centers as c WHERE s.id = '".$_SESSION['student']['id']."' and s.center_id = c.id");
            if($selectCourses->num_rows){
                $student = $selectCourses->fetch_assoc();
                $courses = $con->query("SELECT * FROM exams as e WHERE e.course_id = '".$student['course_id']."' and start != 'NULL' and end != 'NULL' and status = '1' ");
            
                if($courses->num_rows){
                 
                    // echo $courses->num_rows;
                    while($row = $courses->fetch_assoc()){
                        $start = strtotime($row['start']);
                        $end = strtotime($row['end']);
                            
                            echo '
                                 <div class="col-md-3"></div>
                                  <div class="col-md-6">
                                    <div class="card border-primary" style="margin-top:30px;margin-bottom:30px">
                                        <div class="card-header bg-primary">
                                            <h3 class="card-title text-white">'.$row['exam_name'].'</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <label class="bg-light border border-top-0  w-100 p-2"><label class="fs-3 text-danger bold-l">Exam Date : '.date('d-m-Y h:i a',$start).'</label><hr><small class="text-dark bold">एग्जाम डेट के दिन किसी भी समय पर आप परीक्षा दे सकते है </small><br><small class="text-dark">आपकी परीक्षा एग्जाम डेट से पहले नही होगी <br> Exam इंग्लिश में होगा और Exam में MCQ Type Question होंगे </small></label>
                                            
                                        </div>
                                        <div class="card-footer  border-primary">
                                        ';
                                        // echo date('d-m-Y h:i A');
                                        if($start <= time() AND $end >= $start AND $end >= time()){
                                            echo '<a href="get-exam.php?exam-id='.base64_encode($row['id']).'" target="_blank" class="btn btn-primary pull-right btn-lg hover-btn"><i class="fa fa-file-o"></i> Start Exam</a>';
                                        }
                                        echo '
                                        </div>
                                 </div>';
                        
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>