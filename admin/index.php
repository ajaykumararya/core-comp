<?php
include 'includes/header.php';

if ($_POST['status'] == 'study_material') {
   

     $linkUrl = $_POST['link_url'];
   
   
    if(!$linkUrl == ''){
       
    $con->query("INSERT INTO `notification` (title,link_url, description) VALUE ('".$_POST['title']."','$linkUrl', '".$_POST['description']."')");

    // print_r($_POST);
    // exit;
    echo '<script>alert("Center Notification Uploaded Succesfully")</script>';
    }
    else{
        echo '<script>alert("Please Fill all Inputs")</script>';
    }
    
}
if ($_GET['action'] == 'delete') {
    $id = $_GET['id'];
    
    $con->query("Delete from `notification` WHERE id = '$id'");
    echo '<script>alert("Center Notification is deleted.");window.location.href="index.php"</script>';
}



?>
<div class="row">
   <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#3d22d5">
         <div class="inner">
            
           <?php
                $studentResult = $con->query("SELECT COUNT(*) as count FROM `students` WHERE status = 1");
                if ($studentResult) {
                    $row = $studentResult->fetch_assoc(); 
                    
                    echo '<h3>'.$row['count'].'</h3>'; 
                }
            ?>
<h5>Total approved Admission</h5>
            <!--<p>New Orders</p>-->
         </div>
         <div class="icon">
            <i class="ion ion-bag"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
     <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#6f61be">
         <div class="inner">
            
           <?php
                $studentResult = $con->query("SELECT COUNT(*) as count FROM `students` WHERE status = 0");
                if ($studentResult) {
                    $row = $studentResult->fetch_assoc(); 
                    
                    echo '<h3>'.$row['count'].'</h3>'; 
                }
            ?>
<h5>Total pending Admission</h5>
            <!--<p>New Orders</p>-->
         </div>
         <div class="icon">
            <i class="ion ion-bag"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-4 col-6">
      <div class="small-box " style="background:#f7ba0e">
         <div class="inner">
             <?php
                $certificate = $con->query("SELECT COUNT(*) as count from `certificates` where status = 1");
                if($certificate->num_rows >0){
                    $row = $certificate->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            
            <p>Total Issued Certificate</p>
         </div>
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   
   <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#f70e0e">
         <div class="inner">
             <?php
                $result = $con->query("SELECT COUNT(*) as count FROM results WHERE status = 1 ");
                if($result->num_rows > 0 ){
                    $row = $result->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            <!--<h3>44</h3>-->
            <p>Total Issued Result</p>
         </div>
         <div class="icon">
            <i class="ion ion-person-add"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#a76464">
         <div class="inner">
             <?php
                $result = $con->query("SELECT COUNT(*) as count FROM admit_card  ");
                // print_r($result);exit;
                if($result->num_rows > 0 ){
                    $row = $result->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            <!--<h3>44</h3>-->
            <p>Total Issued Admit </p>
         </div>
         <div class="icon">
            <i class="ion ion-person-add"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#3bb924">
         <div class="inner">
             <?php
                $course = $con->query("SELECT COUNT(*) as count FROM `courses`");
                if($course->num_rows >0){
                    $row = $course->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            <!--<h3>65</h3>-->
            <p>Total Courses</p>
         </div>
         <div class="icon">
            <i class="ion ion-pie-graph"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#0ccba8">
         <div class="inner">
             <?php
                $course = $con->query("SELECT COUNT(*) as count FROM `centers` where status = 1");
                if($course->num_rows >0){
                    $row = $course->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            <!--<h3>65</h3>-->
            <p>Total approved Franchisee</p>
         </div>
         <div class="icon">
            <i class="ion ion-pie-graph"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
     <div class="col-lg-4 col-6">
      <div class="small-box" style="background:#9ba2a1">
         <div class="inner">
             <?php
                $course = $con->query("SELECT COUNT(*) as count FROM `centers` WHERE status = 0");
                if($course->num_rows >0){
                    $row = $course->fetch_assoc();
                    echo '<h3>'.$row['count'].'</h3>';
                }
             ?>
            <!--<h3>65</h3>-->
            <p>Total pending Franchisee</p>
         </div>
         <div class="icon">
            <i class="ion ion-pie-graph"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
</div>
<!--<div class="panel panel-primary">-->
<!--    <div class="panel-heading">-->
<!--        <h5>UPLOAD New Notification</h5>-->
<!--    </div>-->
<!--    <form method="post" action="" enctype="multipart/form-data">-->
<!--        <div class="panel-body">-->
            
<!--            <div class="form-group">-->
<!--                <label>Title</label>-->
<!--                <input type="text" class="form-control" name="title" placeholder="Enter the Title" required>-->
<!--            </div>-->
            
<!--            <div class="form-group">-->
<!--                <label>Link URL</label>-->
<!--                <input type="text" class="form-control" name="link_url" placeholder="https://example.com/study_material.pdf" >-->
<!--            </div>-->

<!--            <div class="form-group">-->
<!--                <label>Description</label>-->
<!--                <input type="text" class="form-control" name="description" required>-->
<!--            </div>-->
             
<!--        </div>-->
<!--        <div class="panel-footer">-->
<!--            <button type="submit" class="btn btn-sm btn-success" name="status" value="study_material"><i class="fa fa-save"></i>Save</button>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->

<!--<div class="panel panel-primary">-->
<!--    <div class="panel-heading">-->
<!--        <h5> Update New Notification</h5>-->
<!--    </div>-->
<!--    <div class="panel-body">-->
<!--        <table id="centerTable" class="table table-bordered data-table">-->
<!--    <thead>-->
<!--        <tr>-->
<!--            <th>#</th>-->
<!--            <th>Title</th>-->
<!--            <th>Document Name / Link</th>-->
<!--            <th>Description</th>-->
<!--            <th>Action</th>-->
<!--        </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--         < ?php-->
<!--        $get = $con->query("SELECT * FROM `notification`");-->
<!--        $i = 1;-->
<!--        if ($get->num_rows) {-->
<!--            while ($row = $get->fetch_assoc()) {-->
<!--                echo '<tr>-->
<!--                        <td>' . $i++ . '</td>-->
<!--                        <td>' . $row['title'] . '</td>-->
<!--                        <td><a href="'.$row['link_url'].'" target="_blank">'.$row['link_url'].'</a></td>-->
<!--                        <td>'.$row['description'].'</td>-->
<!--                        <td>-->
                           
<!--                            <a href="?action=delete&id=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are You Sure You Want to Permanently Delete This Item?\')"><i class="fa fa-trash"></i></a>-->
<!--                        </td>-->
                        
<!--                      </tr>';-->
<!--            }-->
<!--        }-->
<!--        ?>-->
    
      
<!--    </tbody>-->
<!--</table>-->

<!--    </div>-->
<!--</div>-->
<?php
include 'includes/footer.php';
?>
