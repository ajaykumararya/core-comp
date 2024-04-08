<?php

require_once 'includes/header.php';
$price = paymentConfig('set_amount1');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['status']) && $_POST['status'] == 'insert')

{
    if(WALLET_BALANCE && WALLET_BALANCE >= $price){
    	$chk = $con->query("SELECT * FROM students where mobile = '".$_POST['mobile']."' AND email = '".$_POST['email']."'");
    	if(!($chk->num_rows))
    	{
    		$img = photo_upload('image','students');
    		if($img['status']){
    		    $image = $img['file_name'];
    		}else{
    		    $image= '';
    		}
    		$data = 	$con->query("INSERT INTO `students` (`dur_start`,`dur_ends`,`id`, `timestamp`, `enrollment_no`, `name`, `gender`, `father`, `mother`, `dob`, `mobile`, `email`,`address`, `state`, `distric`, `exam_pass`, `marks`, `board`, `year`, `username`, `password`, `course_id`, `center_id`, `photo`,  `status`) 
    		VALUES ('".$_POST['dur_start']."','".$_POST['dur_ends']."',NULL, CURRENT_TIMESTAMP, '".$_POST['enrollment_no']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['father']."', '".$_POST['mother']."', '".$_POST['dob']."', '".$_POST['mobile']."', '".$_POST['email']."', '".$_POST['address']."','".$_POST['state']."', '".$_POST['distric']."', '".$_POST['exam_pass']."', '".$_POST['marks']."', '".$_POST['board']."', '".$_POST['year']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['course_id']."', '".$_SESSION['center']['id']."', '".$image."', '0')");
    		  // var_dump($data);
    		  //  exit;
    		   $id = mysqli_insert_id($con);
    		   $con->query("INSERT INTO `tbl_wallet`(`type`, `amount`, `user_id`, `user_type`,`message`) VALUES 
            		        ('dr','".$price."','".$_SESSION['center']['id']."','center','Student Added.')");
    			echo '<script>alert("Student Registration Success.");location.href="'.BASE_URL.'student_details.php?id='.$id.'"</script>';
    
    	}
    	else{
    	    echo '<script>alert("MObile or Email already Exists.");location.href="'.BASE_URL.'student_form.php"</script>';
    	}
    }
}
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['status']) && $_POST['status'] == 'insert')

{
    $chk = $con->query("SELECT * FROM students where mobile = '".$_POST['mobile']."' AND email = '".$_POST['email']."'");
	if(!($chk->num_rows))
	{
	    if(WALLET_BALANCE && WALLET_BALANCE > paymentConfig('set_amount1')){
	        $img = photo_upload('image','students');
        		if($img['status']){
        		    $image = $img['file_name'];
        		}else{
        		    $image= '';
        		}
        		$data = 	$con->query("INSERT INTO `students` (`dur_start`,`dur_ends`,`id`, `timestamp`, `enrollment_no`, `name`, `gender`, `father`, `mother`, `dob`, `mobile`, `email`,`address`, `state`, `distric`, `exam_pass`, `marks`, `board`, `year`, `username`, `password`, `course_id`, `center_id`, `photo`,  `status`) 
        		VALUES ('".$_POST['dur_start']."','".$_POST['dur_ends']."',NULL, CURRENT_TIMESTAMP, '".$_POST['enrollment_no']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['father']."', '".$_POST['mother']."', '".$_POST['dob']."', '".$_POST['mobile']."', '".$_POST['email']."', '".$_POST['address']."','".$_POST['state']."', '".$_POST['distric']."', '".$_POST['exam_pass']."', '".$_POST['marks']."', '".$_POST['board']."', '".$_POST['year']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['course_id']."', '".$_SESSION['center']['id']."', '".$image."', '0')");
        		  $id = mysqli_insert_id($con);
        		 $con->query("INSERT INTO `tbl_wallet`(`type`, `amount`, `user_id`, `user_type`,`message`) VALUES 
            		        ('dr','".paymentConfig('set_amount1')."','".$_SESSION['center']['id']."','center','student_register generated.')");
        	      
        	     echo '<script>alert("Student Registration Success.");location.href="'.BASE_URL.'student_details.php?id='.$id.'"</script>';
        		  
        // 			echo '<script>alert("Student Registration Success.");location.href="'.BASE_URL.'student_details.php?id='.$id.'"</script>';
			

	    }else{
	        echo '<script>alert("you have to low balance");location.href="'.BASE_URL.'student_form.php"</script>';
	    }
		
	}
	else{
	    
	}
}

*/
?>
<div class="box box-primary">
	<div class="box-header"><h3>Student Form <i class="fa fa-rupee"></i><?=paymentConfig('set_amount1');?></h3></div>
	<div class="box-body">
		<form action="" method="post" enctype="multipart/form-data">
		    
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Gender</label><br>
				<label>Male <input type="radio" name="gender" value="male"></label>
				<label>Female <input type="radio" name="gender" value="female"></label>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Enrollment No.</label>
				<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment" value="<?=ENROLL?>" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Father's Name</label>
				<input type="text" class="form-control" name="father" placeholder="Enter Father's Name" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Mother's Name</label>
				<input type="text" class="form-control" name="mother" placeholder="Enter Mother's Name" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Date of birth</label>
				<input type="date" class="form-control" name="dob" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Mobile No.</label>
				<input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Select State </label>
					<select class="form-control get_city" name="state" required="">
						<option value="">--Select--</option>
						<?
							$state = $con->query("SELECT * FROM states");
							while($s = $state->fetch_assoc())
							{
								echo '<option data-state="'.$s['id'].'">'.ucwords($s['state_name']).'</option>';
							}
						?>
					</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Select Distric <span id="load"></span></label>
					<select class="form-control list" name="distric" required="">
						<option value="">--Select--</option>
						
					</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Address <span id="load"></span></label>
				<input type="text" class="form-control" name="address" placeholder="Enter the Address" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Exam Pass</label>
				<input type="text" class="form-control" name="exam_pass" placeholder="Exam Pass" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Marks(%)/Grade</label>
				<input type="text" class="form-control" name="marks" placeholder="Marks/Grade" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Board</label>
				<input type="text" class="form-control" name="board" placeholder="Board" >
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Year</label>
				<input type="number" class="form-control" name="year" placeholder="Year" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Create Username" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Password</label>
				<input type="text" class="form-control" name="password" placeholder="Create Password" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Select Course</label>
				<select class="form-control" name="course_id" required="">
					<option value="">--Select--</option>
					<?
						$course = $con->query("SELECT * FROM courses");
						while($c = $course->fetch_assoc())
						{
							echo '<option value="'.$c['id'].'">'.ucwords($c['course_name']).'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Photo(Upload Only 100KB to 300KB)</label>
				<input type="file" class="form-control" name="image" >
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
			    <label>Email</label>
			    <input type="email" class="form-control" name="email" placeholder="Enter Email">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Session Start</label>
				<input type="date" name="dur_start" class="form-control" required>
			</div>
				<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Session Ends</label>
				<input type="date" name="dur_ends" class="form-control" required>
			</div>
			
			<div class="message form-group col-md-12" style="font-size:2rem"></div>
			
			<div class="form-group col-xs-12 col-md-12 col-lg-12">
				<button class="btn btn-primary" type="submit" name="status" value="insert"><i class="fa fa-save"></i> Submit</button>
			</div>
		</form>
	</div>
</div>

<?
include 'includes/footer.php';
?>


<script type="text/javascript">
	$('.get_city').change(function(){
		// alert($(this).val());
		var dataString = 'state_id='+$(this).find(':selected').data('state')+'&status=get_city2';
		$.ajax({
				url:"../admin/Ajax.php",
				type:"POST",
				data:dataString,
				beforeSend:function()
				{
					$('#load').html('<i class="text-danger"><i class="fa fa-spinner fa-spin"></i> Loading...</i>');
				},
				success:function($res)
				{
					$('.list').html($res);
				},
				complete:function()
				{
					$('#load').html('<i class="text-success"> Complete <i class="fa fa-check-circle"></i></i>');
				}
		});
	});
	
	$(document).on('change','[name="course_id"]',function(){
	    var course_id = $(this).val();
	    $('.message').html('<i class="fa fa-spin fa-spinner"></i> Please Wait..');
	   if(!course_id){
	        $('.message').html('');
	        return false;
	   }
	    $.ajax({
	        type : 'POST',
	        url : 'Ajax.php',
	        data : {course_id,status : 'get_course_fee'},
	        success : function(fee){
	           // alert(fee);
	           $('.message').html(fee ? '<b class="label label-success mb-5">Course Fee is '+fee+' <i class="fa fa-rupee"></i><b>' : '');
	        }
	    });
	});
</script>