<?
if($_POST['status']=='get_certificate')

{
    
    require_once 'includes/config.php';

$admit = $con->query("SELECT * FROM certificates where enrollment_no = '".$_POST['enrollment_no']."'");
	$stu = $con->query("SELECT * FROM students where enrollment_no = '".$_POST['enrollment_no']."' ");
	if($stu->num_rows>0 && $admit->num_rows>0)
	{
		$s = $stu->fetch_assoc();
		$a = $admit->fetch_assoc();
		$c = $con->query("SELECT * FROM centers where id = '".$s['center_id']."'")->fetch_assoc();
// 		print_r($c);
		$course = $con->query("SELECT * FROM courses where id = '".$s['course_id']."'")->fetch_assoc();
		
		$bg = '../format/certificate.jpg';
		$enroll_no = $s['enrollment_no'];
		$photo = '../uploads/students/'.$s['photo'];
		$name = $s['name'];
		$father = $s['father'];
// 		$mother = $s['mother'];
		$duration = $course['duration'];
		$dob = $s['dob'];
        $issue_date = $a['issue_date'];
        $certificate_number = $c['id'];
        // $certificate_number = date("YmdHis", $issue_date);
        $isu_date = date("d-m-y", strtotime($issue_date));
		$course_name = $course['course_name'];
		$course_short_name = $course['short_name'];
		$center_code = $c['center_number'];
		$center_name = $c['institute_name'];
		$course = $course['course_name'];
			
		include '../certificate.php';
	
		exit;
		?>
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-default">
				<div class="box-header"><h5>Certificate</h5></div>
				<div class="box-body" id="printableArea">
					<table class="table table-bordered">
						<tbody>
							<tr><th>Institute Name</th> <td><?=$c['institute_name']?></td></tr>
							<tr><th>Enrollment No.</th> <td><?=$s['enrollment_no']?></td></tr>
							<tr><th>Roll No.</th> <td><?=$a['roll_no']?></td></tr>
							<tr><th>Student Name</th> <td><?=$s['name']?></td></tr>
							<tr><th>Father Name</th> <td><?=$s['father']?></td></tr>
							<tr><th>Mother Name</th> <td><?=$s['mother']?></td></tr>
							<tr><th>Course</th> <td><?=$course['course_name']?></td></tr>
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
	else
	{
		echo '<script>alert("Enrollment or date of birth not matched.");location.href="get_certificate.php"</script>';
	}
}
else
{
    require_once 'includes/header.php';
    echo '<br><div class="ContentHolder"><div class="container">';
?>
<div class="col-md-6 col-md-offset-3">
	<div class="box box-danger">
		<div class="box-header"><h3>Certificate</h3></div>
		<div class="box-body">
			<form action="" method="post">
				<div class="form-group">
					<label>Enrollment No.</label>
					<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment No.">
				</div>
			
				<div class="form-group">
					<button class="btn btn-danger" type="submit" name="status" value="get_certificate">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?
}
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


<!--< ?-->
<!--require_once 'includes/header.php';-->
<!--echo '<br><div class="ContentHolder"><div class="container">';-->
<!--if($_POST['status']=='get_certificate')-->
<!--{-->
	
<!--	$admit = $con->query("SELECT * FROM certificates where enrollment_no = '".$_POST['enrollment_no']."'");-->
<!--	$stu = $con->query("SELECT * FROM students where enrollment_no = '".$_POST['enrollment_no']."' ");-->
<!--	if($stu->num_rows>0 && $admit->num_rows>0)-->
<!--	{-->
<!--		$s = $stu->fetch_assoc();-->
<!--		$a = $admit->fetch_assoc();-->
<!--		$c = $con->query("SELECT * FROM centers where id = '".$s['center_id']."'")->fetch_assoc();-->
<!--		$course = $con->query("SELECT * FROM courses where id = '".$s['course_id']."'")->fetch_assoc();-->
<!--		?>-->
<!--		<div class="col-md-6 col-md-offset-3 mb-4" style="margin-bottom:10rem;">-->
<!--			<div class="box box-default">-->
<!--				<div class="box-header"><h1 class="text-center">Certificate</h1></div>-->
<!--				<div class="box-body" id="printableArea">-->
<!--					<div style="width:100%;height:auto;" class="text-center">-->
<!--					     < ? -->
<!--					        if($a['file']==''){echo '<i>Empty</i>';}else{echo '<a href="download_file.php?file='.$a['file'].'" target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>';}-->
<!--					    ?>-->
<!--					    < ?=$a['content']?>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="box-footer">-->
					<!--<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print"></i> Print</button>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--		< ?-->
<!--	}-->
<!--	else-->
<!--	{-->
<!--		echo '<script>alert("Enrollment is not matched.");location.href="get_certificate.php"</script>';-->
<!--	}-->
<!--}-->
<!--else-->
<!--{-->
<!--?>-->
<!--<div class="col-md-6 col-md-offset-3">-->
<!--	<div class="box box-danger">-->
<!--		<div class="box-header"><h3>Download Certificate</h3></div>-->
<!--		<div class="box-body">-->
<!--			<form action="" method="post">-->
<!--				<div class="form-group">-->
<!--					<label>Enrollment No.</label>-->
<!--					<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment No.">-->
<!--				</div>-->
				
<!--				<div class="form-group">-->
<!--					<button class="btn btn-danger" type="submit" name="status" value="get_certificate">Submit</button>-->
<!--				</div>-->
<!--			</form>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--< ?-->
<!--}-->
<!--echo '</div></div>';-->
<!--include 'includes/footer.php';-->
<!--?>-->
<!--<script type="text/javascript">-->
<!--	function printDiv(divName) {-->
<!--     var printContents = document.getElementById(divName).innerHTML;-->
<!--     var originalContents = document.body.innerHTML;-->

<!--     document.body.innerHTML = printContents;-->

<!--     window.print();-->

<!--     document.body.innerHTML = originalContents;-->
<!--}-->
<!--</script>-->