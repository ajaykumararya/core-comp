<?php
    include 'includes/header.php';
    $headerMobile = isset($socialLinks['header_mobile']) ? $socialLinks['header_mobile'] : '';
$headerEmail = isset($socialLinks['header_email']) ? $socialLinks['header_email'] : '';
?>


<div class="container p_20">
    <h1 class="text_heading text-center">Contact <span class="highlight_color">Us</span></h1>
                <div class="row pt_40 pb_40">
                    <div class="col-md-4">
                        <div class="contact_info">
                           <h3> Address</h3>
                           <!--<p class="text_info"> <i class="fa fa-home"></i> <span class="ml_10"> <b>City Office :</b> C-3, CL-26 Vishwa Bank, ADA Colony, Naini, Prayagraj -211008</span></p>-->
        				   
        				   <p class="text_info"> <i class="fa fa-home"></i> <span class="ml_10"><b>Reg. Office : </b> Near Bagabasa Bsnl Office  Tehsil Bagma District Gomati (T.P.)
        				   
        				   Udaipur State : Tripura Pincode : 799113</span></p>
                                    
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact_info">
                           <h3> Mobile No.</h3>
                           <p class="text-justify" style="margin-bottom:0rem"><i class="fa fa-mobile-phone"></i> <?=$headerMobile?> </p>
                           <!--<p class="text-justify" style="margin-bottom:0rem"><i class="fa fa-mobile-phone"></i> What's App No. - 8442020207 </p>-->
                           <!--<p class="text-justify" style="margin-bottom:0rem"><i class="fa fa-mobile-phone"></i> Landline No. - 01574299207 </p>-->
                           <!--<p class="text-justify" style="margin-bottom:0rem"><i class="fa fa-mobile-phone"></i> Toll free number -  08062178897 </p>-->
                                    
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact_info">
                           <h3> Email</h3>
                           <p class="text-justify"><i class="fa fa-globe"></i>   <?=$headerEmail?></p>
                           <!--<p class="text-justify"><i class="fa fa-globe"></i> www.sitallahabad.com </p>	-->
                           <!--<p class="text-justify"><i class="fa fa-globe"></i> info@sitallahabad.com</p>	-->
                        </div>
                    </div>
                </div>
    <!--<div class="row">-->
        
    
    <!--    <div class="col-md-12 col-md-offset-3" >-->
                        <!--<h3 class="text_heading text-center">ENROLLMENT  <span class="highlight_color">VARIFICATION</span></h3>-->
        
    <!--    	<div class="box box-primary">-->
        	    
        	

    <!--    		<div class="box-body">-->
    <!--    			<form action="" method="post" id="contactform">-->
    <!--    			    <input type="hidden" name="status" value="contact_us">-->
    <!--    				<div class="form-group">-->
    <!--    					<label>Name</label>-->
    <!--    					<input type="text" class="form-control" name="name" placeholder="Enter Enrollment No." required>-->
    <!--    				</div>-->
    <!--    				<div class="form-group">-->
    <!--    					<label>Email</label>-->
    <!--    					<input type="email" class="form-control" name="email" placeholder="Enter Email" required>-->
    <!--    				</div>-->
    <!--    				<div class="form-group">-->
    <!--    					<label>Mobile No</label>-->
    <!--    					<input type="number" class="form-control" name="mobile" placeholder="Enter Mobile No" required>-->
    <!--    				</div>-->
    <!--    				<div class="form-group">-->
    <!--    					<label>Message</label>-->
    <!--    					<input type="message" class="form-control" name="message" placeholder="Enter Message" required>-->
    <!--    				</div>-->
    <!--    				<div class="form-group">-->
    <!--    					<button class="btn btn-danger" type="submit" >Submit</button>-->
    <!--    				</div>-->
    <!--    			</form>-->
    <!--    		</div>-->
    <!--    	</div>-->
    <!--    </div>-->
    <!--</div>-->
    <section>
  	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-7">
            <!--<iframe src="https://maps.google.com/maps?width=100%&height=100%&hl=en&q= Bus Stand - Sirohi, Teh - Neem Ka Thana, Disst.- Neem Ka Thana, Rajasthan(332714)&t=&z=14&ie=UTF8&iwloc=B&output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14625.786282907748!2d91.45042223334256!3d23.58831212542016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sNear%20Bagabasa%20Bsnl%20Office%20Tehsil%20Bagma%20District%20Gomati%20Udaipur%20Tripura%20%20799113!5e0!3m2!1sen!2sin!4v1710678268263!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5">
            	<h3 class="text_heading ">Enquiry Form</h3>
                    <div class="form-holder pt_50">
                        	<form action="" method="post" id="contactform">
        			    <input type="hidden" name="status" value="contact_us">                          
        			    <div class="row">
                            <div class="form-group col-md-12">
                              <input placeholder="Enter Name" id="enquiry_name" name="name" class="form-control" autocomplete="off" onkeyup="livesearch('enquiry_name','[^A-Za-z-() ]')" onkeydown="livesearch('enquiry_name','[^A-Za-z-() ]')" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" name="mobile" id="enquiry_contact" placeholder="Enter Contact ..." autocomplete="off" onkeyup="livesearch('enquiry_contact','[^0-9]')" onkeydown="livesearch('enquiry_contact','[^0-9]')" maxlength="10" required>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="email" class="form-control" name="email" placeholder="Enter Email" id="enquiry_email" autocomplete="off" onkeyup="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')" onkeydown="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')" required>
                            </div>
                            <div class="form-group col-md-12">
                              <textarea class="form-control" rows="7" name="message" placeholder="Enter Query..." id="enquiry_msg" autocomplete="off" onkeyup="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')" onkeydown="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')" required></textarea>
                            </div>
                            <div class="form-group col-md-6">
                              <input name="enquery" value="1" type="hidden">
                              <button type="submit" class="btn btn-danger"> Submit </button>
                              <!--<button type="submit" class="btn btn-primary"> Reset </button>-->
                            </div>
                          </div>
                        </form>
                      </div>
            		</div>
        		</div>
    		</div>
  	</section>
</div>
<?php
    include 'includes/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function(){
        $('#contactform').submit(function(event){
            
            event.preventDefault();
            var formData = $(this).serialize();//$('#contactform').serializeArray();

            console.log(formData);
            $.ajax({
                type : 'POST',
                url : 'admin/Ajax.php',
                data : formData,
                success:function(response){
                    console.log(response);
                    alert("Your Query Submitted Successfully");
                    $('#contactform')[0].reset();
                },
                error:function(error,b,c){
                    alert('Error submitting form. Please try again.');
                }
                
                
            });
        });
    });
</script>







