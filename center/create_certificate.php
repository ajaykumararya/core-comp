<?php

require_once 'includes/header.php';
if($_POST['status']=='certificate')
{
	$chk  = $con->query("SELECT * FROM certificates where enrollment_no = '".$_POST['enrollment_no']."'");
	if(!($chk->num_rows))
	{   
	    $id = $_POST['enrollment_no'];
	    $st = $con->query("SELECT * FROM students WHERE enrollment_no = '$id'");
	    if($st->num_rows){
	        $st = $st->fetch_assoc();
	        if(WALLET_BALANCE && WALLET_BALANCE > paymentConfig('certificate')){
    	        
    	        
    	        $dob = $st['dob'];
        	    $file = photo_upload('file','files');
        	    if($file['status']){
            	    $file = $file['status'] ? $file['file_name'] : '';
            	    $sql = "INSERT INTO `certificates` (`enrollment_no`,`dob`,`file`) VALUES ('$id','$dob','$file')";
            	    $ins = $con->query($sql);
            	    if(!$ins){
            	        print_r($con->error);exit;
            	    }
            	    $con->query("INSERT INTO `tbl_wallet`(`type`, `amount`, `user_id`, `user_type`,`message`) VALUES 
            		        ('dr','".paymentConfig('certificate')."','".$_SESSION['center']['id']."','center','Certificate generated.')");
        	        echo '<script>alert("Certificate Create success.");location.href="create_certificate.php"</script>';
        	    }
        	    else{
        	        echo '<script>alert("File not uploaded.");window.location.href="create_certificate.php";</script>';
        	    }
	        }else{
	            echo '<script>alert("You have too law wallet balance.");location.href="create_certificate.php"</script>';
	        }
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
//     $sql = "UPDATE `students` SET `certificate`= 0 WHERE `id` = '$id'";
// 	$query = mysqli_query($con,$sql);
// 	if(!$query){
// 	    print_r(mysqli_error($con));die();
// 	}
	$con->query("DELETE FROM certificates where id = '".$_GET['id']."'");

	echo '<script>alert("Certificate Deleted.");location.href="create_certificate.php"</script>';
}
?>
<div class="box box-primary">
	<div class="box-header"><h3>Create Certificate (Rs. <?=paymentConfig('certificate')?>)</h3></div>
	<div class="box-body">

<?
	$student = $con->query("SELECT * FROM students WHERE status = 1 AND center_id = '".$_SESSION['center']['id']."'");
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
				<label>File</label>
			    <input type="file" name="file" class="form-control">
			</div>
		    <div class="form-group col-md-12">
			    <button onclick="return confirm('You have to pay fee.');" class="btn btn-primary" type="submit" name="status" value="certificate"><i class="fa fa-save"></i> Submit</button>
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
					<th>Delete</th>
					
				</tr>
			</thead>
			<tbody>
				<?
					$get = $con->query("SELECT * FROM `certificates`");
					while($g = $get->fetch_assoc())
					{
					    $chk = $con->query("SELECT * FROM students WHERE `enrollment_no` = '".$g['enrollment_no']."' AND center_id = '".$_SESSION['center']['id']."'");
					    if(!$chk->num_rows)
					        continue;
						echo '<tr>
									<td>'.$g['enrollment_no'].'</td>
									<td>'.$g['dob'].'</td>
									<td><a target="_blank" href="../uploads/files/'.$g['file'].'" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
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