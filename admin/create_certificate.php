<?php

require_once 'includes/header.php';
if($_GET['action'] == 'changeStatus'){
    $val = $_GET['val']?0:1;
    $id = $_GET['id'];
    $con->query("UPDATE `certificates` SET `status`= '$val' WHERE id = '$id'");
    echo '<script>alert("Changed Successfully.");window.location.href="create_certificate.php"</script>';
}
if($_POST['status']=='certificate')
{
	$chk  = $con->query("SELECT * FROM certificates where enrollment_no = '".$_POST['enrollment_no']."'");
	if(!($chk->num_rows))
	{   
	    $id = $_POST['enrollment_no'];
	    $st = $con->query("SELECT * FROM students WHERE enrollment_no = '$id'");
	    if($st->num_rows){
	        $st = $st->fetch_assoc();
	        $dob = $st['dob'];
    	   // $file = photo_upload('file','files');
    	   // if($file['status']){
        // 	    $file = $file['status'] ? $file['file_name'] : '';
        	   // $sql = "INSERT INTO `certificates` (`enrollment_no`,`dob`,`file`,`status`) VALUES ('$id','$dob','$file','1')";
        	    $sql = "INSERT INTO `certificates`(`enrollment_no`,`dob`,`status`,`issue_date`) VALUES ('$id','$dob','1','".$_POST['issue_date']."')";
        	    $ins = $con->query($sql);
        	    if(!$ins){
        	        print_r($con->error);exit;
        	    }
    	        echo '<script>alert("Certificate Create success.");location.href="create_certificate.php"</script>';
    	   // }else{
    	   //     echo '<script>alert("File not uploaded.");window.location.href="create_certificate.php";</script>';
    	   // }
	    }else{
	        echo '<script>alert("Something went wrong.");location.href="create_certificate.php"</script>';
	    }
	       
	}else{
	    die('bye');
	}
}
if($_GET['action']=='del')
{
//     $id = $_GET['id'];
//     $sql = "UPDATE `certificates` SET `certificate`= 0 WHERE `id` = '$id'";
// 	$query = mysqli_query($con,$sql);
// 	if(!$query){
// 	    print_r(mysqli_error($con));die();
// 	}
	$con->query("DELETE FROM certificates where id = '".$_GET['id']."'");

	echo '<script>alert("Certificate Deleted.");location.href="create_certificate.php"</script>';
}
?>
<div class="box box-primary">
	<div class="box-header"><h3>Create Certificate</h3></div>
	<div class="box-body">

<?
	$student = $con->query("SELECT * FROM students");
	if($student->num_rows)
	{
?>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group col-md-4">
				<label>Enrollment No.</label>
				<select class="form-control " name="enrollment_no" required="">
					<option value="">--Select--</option>
					<?
						while($stu = $student->fetch_assoc())
						{
						    $chk  = $con->query("SELECT * FROM certificates where enrollment_no = '".$stu['enrollment_no']."'");
                        	if(($chk->num_rows))
                        	    continue;
							echo '<option value="'.$stu['enrollment_no'].'">'.$stu['enrollment_no'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label>Issue Date</label>
			    <input type="date" required name="issue_date" required class="form-control">
			</div>
		    <div class="form-group col-md-12">
			    <button class="btn btn-primary" type="submit" name="status" value="certificate"><i class="fa fa-save"></i> Submit</button>
			</div>
		</form>
<?
	}
	else
	{
		echo '<br><br><br><br><div class="alert alert-danger">Student Not Available.</div>';
	}

?>
	</div>
	<div class="box-footer">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Enrollment No.</th>
					<th>DOB</th>
					<th>View</th>
					<!--<th>Status</th>-->
					<th>Delete</th>
					
				</tr>
			</thead>
			<tbody>
				<?
					$get = $con->query("SELECT * FROM `certificates`");
					while($g = $get->fetch_assoc())
					{
					    $statusBtn = $g['status'] ? 'success' : 'danger';
					    $statusIcon = $g['status'] ? 'on' : 'off';
						echo '<tr>
									<td>'.$g['enrollment_no'].'</td>
									<td>'.$g['dob'].'</td>
									<td><a target="_blank" href="../uploads/files/'.$g['file'].'" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
								<!--	<td>
									    <a href="?action=changeStatus&id='.$g['id'].'&val='.$g['status'].'" class="btn btn-sm btn-'.$statusBtn.'"><i class="fa fa-toggle-'.$statusIcon.'"></i></a>
									</td> --!>
									<td><a href="?action=del&id='.$g['id'].'" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
	$('.get_subject').change(function(){
		// alert($(this).val());
		var dataString = 'course_id='+$(this).val()+'&status=subjects';
		$.ajax({
				url:"Ajax.php",
				type:"POST",
				data:dataString,
				beforeSend:function()
				{
					$('#list').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
				},
				success:function($__res)
				{
					$('#list').html($__res);
				},
				complete:function()
				{

				}
		});
	})
</script>
<script type="text/javascript">
	$('.get_roll').change(function(){
		// alert($(this).val());
		var dataString = 'enrollment_no='+$(this).val()+'&status=get_roll';
		$.ajax({
				url:"Ajax.php",
				type:"POST",
				data:dataString,
				beforeSend:function()
				{
					$('#load').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
				},
				success:function(res)
				{
					$('#roll').val(res);
				},
				complete:function()
				{
					$('#load').html('<i class="text-success"><i class="fa fa-check-circle"></i> Complete</i>');
				}
		});
	})
</script>