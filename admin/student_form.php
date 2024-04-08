<?php

require_once 'includes/header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['status']) && $_POST['status'] == 'insert')

{

	$chk = $con->query("SELECT * FROM students where mobile = '".$_POST['mobile']."' AND email = '".$_POST['email']."'");
	if(!($chk->num_rows))
	{
		$img = photo_upload('image','students');
		if($img['status']){
		    $image = $img['file_name'];
		}else{
		    $image= '';
		}
		$data = 	$con->query("INSERT INTO `students` (`dur_start`,`dur_ends`,`id`, `timestamp`, `enrollment_no`, `name`, `gender`, `father`, `mother`, `dob`, `mobile`, `email`,`address`, `state`, `distric`, `exam_pass`, `marks`, `board`, `year`, `username`, `password`, `course_id`, `center_id`, `photo`,  `status`) VALUES ('".$_POST['dur_start']."','".$_POST['dur_ends']."',NULL, CURRENT_TIMESTAMP, '".$_POST['enrollment_no']."', '".$_POST['name']."', '".$_POST['gender']."', '".$_POST['father']."', '".$_POST['mother']."', '".$_POST['dob']."', '".$_POST['mobile']."', '".$_POST['email']."', '".$_POST['address']."','".$_POST['state']."', '".$_POST['distric']."', '".$_POST['exam_pass']."', '".$_POST['marks']."', '".$_POST['board']."', '".$_POST['year']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['course_id']."', '".$_POST['center_id']."', '".$image."', '0')");
		  // var_dump($data);
		  //  exit;
		   $id = mysqli_insert_id($con);
			echo '<script>alert("Student Registration Success.");location.href="'.BASE_URL.'student_details.php?id='.$id.'"</script>';
			

	}
	else{
	    echo 'Not Submitted';
	}
}
?>
<div class="container">
    <div class="box box-primary">
	    <div class="box-header"><h3 class="text-center">Student Form</h3></div>
	    <div class="box-body">
		<form action="" method="post" enctype="multipart/form-data">
		    <div class="form-group col-xs-12 col-md-12 col-lg-6">
				<label>Select State </label>
					<select class="form-control get_city" name="state" required="">
						<option value="">--Select--</option>
						<option data-state="1">Uttar Pradesh</option><option data-state="2">Madhya Pradesh</option><option data-state="3">West Bengal</option><option data-state="4">Uttarakhand</option><option data-state="5">Tripura</option><option data-state="6">Telangana</option><option data-state="7">Tamil Nadu</option><option data-state="8">Sikkim</option><option data-state="9">Rajasthan</option><option data-state="10">Punjab</option><option data-state="11">Puducherry </option><option data-state="12">Odisha</option><option data-state="13">Nagaland</option><option data-state="14">Mizoram</option><option data-state="15">Meghalaya</option><option data-state="16">Manipur</option><option data-state="17">Maharashtra</option><option data-state="18">Lakshadweep </option><option data-state="19">Kerala</option><option data-state="20">Karnataka</option><option data-state="21">Jharkhand</option><option data-state="22">Jammu And Kashmir</option><option data-state="23"> Himachal Pradesh</option><option data-state="24">Haryana</option><option data-state="25">Gujarat</option><option data-state="26">Goa</option><option data-state="27"> Delhi </option><option data-state="28">Daman And Diu</option><option data-state="29">Chhattisgarh</option><option data-state="30">Chandigarh </option><option data-state="31">Bihar</option><option data-state="32">Assam</option><option data-state="33">Arunachal Pradesh</option><option data-state="34">Andhra Pradesh</option><option data-state="35">Andaman And Nicobar Island (UT)</option>					</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-6">
				<label>Select Distric <span id="load"></span></label>
					<select class="form-control list" name="distric" required="">
						<option value="">--Select--</option>
						
					</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-12">
				<label>Center</label>
				<select class="form-control" name="center_id" required="">
				    <option>--Select Center Name--</option>
				    <?
				        $get = $con->query("SELECT * FROM centers WHERE status = 1");
				        while($row = $get->fetch_assoc()){
				            echo '<option value="'.$row['id'].'">'.$row['institute_name'].'</option>';
				        }
				    ?>
				</select>
			</div>
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
				<input type="text" class="form-control" name="enrollment_no" placeholder="Enter Enrollment" required="" value="<?=ENROLL?>">
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
			    <label>Email Id</label>
			    <input type="text" class="form-control" name="email" placeholder="Enter Email">
			</div>
			
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
			    <label>Address</label>
			    <input type="text" class="form-control" name="address" required="">
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
				<input type="text" class="form-control" name="board" placeholder="Board">
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
				    <?php
				        $get = $con->query("SELECT * FROM `courses`");
				        while($g = $get->fetch_assoc()){
				            echo '<option value="'.$g['id'].'">'.$g['course_name'].'</option>';
				        }
				    ?>
				</select>
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Photo</label>
				<input type="file" class="form-control" name="image">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Session Start</label>
				<input type="date" name="dur_start" class="form-control" required="">
				
			</div>
				<div class="form-group col-xs-12 col-md-12 col-lg-4">
				<label>Session Ends</label>
				<input type="date" name="dur_ends" class="form-control" required="">
			</div>
			<div class="form-group col-xs-12 col-md-12 col-lg-12">
			    <input type="hidden" name="status" value="insert">
                <button class="btn btn-primary" type="submit" style="align-item:center;"><i class="fa fa-save"></i> Submit</button>
			</div>
		</form>
	</div>
    </div>
</div>

<?require_once 'includes/footer.php';?>

<script type="text/javascript">
	$('.get_city').change(function(){
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
	})
</script>