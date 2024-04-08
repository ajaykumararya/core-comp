<?
require_once 'includes/header.php';
echo '<br><div class="ContentHolder"><div class="container">';
if($_POST['status']=='get_certificate')
{
	
	$admit = $con->query("SELECT * FROM certificates where enrollment_no = '".$_POST['enrollment_no']."' AND status = 1");
	$stu = $con->query("SELECT * FROM students where enrollment_no = '".$_POST['enrollment_no']."'");
	if($stu->num_rows>0 && $admit->num_rows>0)
	{
		$s = $stu->fetch_assoc();
		$a = $admit->fetch_assoc();
		$c = $con->query("SELECT * FROM centers where id = '".$s['center_id']."'")->fetch_assoc();
		$course = $con->query("SELECT * FROM courses where id = '".$s['course_id']."'")->fetch_assoc();
		?>
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-default">
				<div class="box-header"><h5>Certificate</h5></div>
				<div class="box-body" id="printableArea">
					<div style="width:100%;height:100px;">
					    <?
					        if($a['file']==''){echo '<i>Empty</i>';}else{
					            echo '<p class="text-center"><a class="btn btn-sm btn-danger" download href="uploads/files/'.$a['file'].'" target="_blank" >Download</a></p>';
					            echo '<iframe src="uploads/files/'.$a['file'].'" title="'.$s['enrollment_no'].'" width="100%" height="100%"></iframe>';
					        }
					    ?>
					    <?=$a['content']?>
					</div>
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
?>
<div class="container">
     <div class="row">
         
     
<div class="col-md-12 col-md-offset-3">
    <div class="text-center"><img src="uploads/logo/<?=$logo['favicon']?>" style="max-width:40%;height:auto"></div>
	<div class="box box-danger">
		<h1 class="text_heading text-center">STUDENT <span class="highlight_color">CERTIFICATE VERIFICATION</span></h1>
		<div class="box-body">
			<form action="" method="post">
				<div class="form-group">
					<label>Enrollment No.</label>
					<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment No.">
				</div>
				<div class="form-group">
					<label>Date of birth</label>
					<input type="date" class="form-control" name="dob" class="myDate">
				</div>
				<div class="form-group">
					<button class="btn btn-danger" type="submit" name="status" value="get_certificate">Submit</button>
				</div>
			</form>
		</div>
	</div>
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