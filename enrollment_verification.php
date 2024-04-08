<?
require_once 'includes/header.php';

if($_POST['status']=='enrollment_verification')
{
    $get = $con->query("SELECT * FROM students where enrollment_no = '".$_POST['enrollment_no']."' AND dob = '".$_POST['dob']."' AND status = 1");
   
    if($get->num_rows)
    {
        $g = $get->fetch_assoc();
         $center = $con->query("SELECT * FROM centers where id = '".$g['center_id']."'")->fetch_assoc();
         $course = $con->query("SELECT * FROM courses where id = '".$g['course_id']."'")->fetch_assoc();
         
        ?>
            <style>
                #form{display:none;}
            </style>
            <div class="ContentHolder mt-5"><div class="container">
            <!--<div class="text-center"><img src="uploads/logo/<?=$logo['logo']?>" style="width:60rem;"></div>-->
           <div class="box box-default">
               <h1 class="text_heading text-center">ENROLLMENT  <span class="highlight_color">VARIFICATION</span></h1>
               <div class="box-body" id="printableArea">
                    <table class="table table-bordered">
                        <tbody>
                            <tr><th colspan="2">Student Enrollment Verification</th></tr>
                             <tr><th>Institute Name</th><td><?=$center['institute_name']?></td></tr>
                            <?
                                
                                foreach($g as $key => $value)
                                {
                                    if($key=='id' || $key=='timestamp' || $key=='password' || $key == 'dob' || $key == 'username' || $key == 'board' || $key == 'exam_pass' || $key == 'marks' || $key == 'email' || $key == 'mobile' || $key == 'dob' || $key=='course_id' || $key=='center_id' || $key=='photo' || $key=='transection_id' || $key=='status')
                                        continue;
                                    echo '<tr><th>'.ucwords(str_replace('_',' ',$key)).'</th> <td>'.$value.'</td></tr>';
                                }
                            ?>
                            <tr><th>Course</th><td><?=$course['course_name']?></td></tr>
                          <!--  <tr><th>Photo</th><td><img style="width:100px;height:120px;" src="uploads/students/<?=$g['photo']?>"></td></tr>-->
                        </tbody>
                    </table>
               </div>
               <div class="box-footer">
                   	<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>
               </div>
           </div>
        <?
    }
    else
    {
        echo '<div class="alert alert-danger">Invalid Enrollment No. OR Date of birth!</div>';
    }
}
?>
<div class="container mt-5">
    

    <div class="row">
        
    
        <div class="col-md-12 col-md-offset-3" id="form">
                        <!--<h3 class="text_heading text-center">ENROLLMENT  <span class="highlight_color">VARIFICATION</span></h3>-->
        
        	<div class="box box-primary">
        	    
        		<div class="text-center"><img src="uploads/logo/<?=$logo['favicon']?>" style="max-width:40%;height:auto"></div>
<h3 class="text_heading text-center">ENROLLMENT  <span class="highlight_color">VARIFICATION</span></h3>
        
        		<div class="box-body">
        			<form action="" method="post">
        				<div class="form-group">
        					<label>Enrollment No.</label>
        					<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment No.">
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

<?
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