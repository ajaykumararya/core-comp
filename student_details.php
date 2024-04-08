<?require_once 'includes/header.php';
$id = $_GET['id'];
$get = $con->query("SELECT * FROM students WHERE id = $id");
if($get->num_rows){
    $row = $get->fetch_assoc();
    $center = $con->query("SELECT * FROM centers where id = '".$row['center_id']."'")->fetch_assoc();
    $course = $con->query("SELECT * FROM courses where id = '".$row['course_id']."'")->fetch_assoc();
?>
<div class="container">
    <div class="box box-default">
   <div class="box-header"><h3>Enrollment Verification</h3></div>
   <div class="box-body" id="printableArea">
        <table class="table table-bordered">
            <tbody>
                <tr><th colspan="2" class="text-center">Student Enrollment Verification</th></tr>
                 <tr><th>Institute Name</th><td><?=$center['institute_name']?></td></tr>
                <?
                    
                    foreach($row as $key => $value)
                    {
                        if($key == 'payable_amount' || $key == 'registration_no' || $key=='id' || $key=='timestamp' ||  $key == 'dob' ||  $key == 'board' || $key == 'exam_pass' || $key == 'marks' || $key == 'email' || $key == 'mobile' || $key == 'dob' || $key=='course_id' || $key=='center_id' || $key=='photo' || $key=='transection_id' || $key=='status')
                            continue;
                        echo '<tr><th>'.ucwords(str_replace('_',' ',$key)).'</th> <td>'.$value.'</td></tr>';
                    }
                ?>
                <tr><th>Course</th><td><?=$course['course_name']?></td></tr>
                <tr><th>Photo</th><td><img style="width:100px;height:120px;" src="uploads/students/<?=$row['photo']?>"></td></tr>
            </tbody>
        </table>
   </div>
   <div class="box-footer">
       	<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>
   </div>
</div>
</div>
<?
}
?>

<?require_once 'includes/footer.php';?>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>