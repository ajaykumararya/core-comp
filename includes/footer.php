<?php
// Fetch existing social links from the database
$socialLinks = $con->query("SELECT * FROM social_links")->fetch_assoc();

// Define default values in case links are not found
$headerMobile = isset($socialLinks['header_mobile']) ? $socialLinks['header_mobile'] : '';
$headerEmail = isset($socialLinks['header_email']) ? $socialLinks['header_email'] : '';
$headerFacebook = isset($socialLinks['header_facebook']) ? $socialLinks['header_facebook'] : '';
$headerTwitter = isset($socialLinks['header_twitter']) ? $socialLinks['header_twitter'] : '';
$headerInstagram = isset($socialLinks['header_instagram']) ? $socialLinks['header_instagram'] : '';
$headerLinkedin = isset($socialLinks['header_linkedin']) ? $socialLinks['header_linkedin'] : '';
$headerYoutube = isset($socialLinks['header_youtube']) ? $socialLinks['header_youtube'] : '';
?>'

<?php
    $footer_about = $con->query("SELECT * FROM footer_about_us")->fetch_assoc();
    
    $primaryHeading = $footer_about['primary_heading'];
    $secondryHeading = $footer_about['secondary_heading'];
    $btnlink = $footer_about['main_heading'];
    $description = $footer_about['description'];
?>
<!-- *** FOOTER ***
 __________
 _______________________________________________ -->
  <footer class="footer pb-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="logo">
                <strong><?=$primaryHeading?></strong>
                <small><?=$secondryHeading?></small>
            </div>
            <ul class="social list-inline">
              <li class="list-inline-item">
                  <a href="<?=$headerFacebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="<?=$headerTwitter?>" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a href="<?=$headerInstagram?>" target="_blank"><i class="fa fa-instagram"></i></a>
                  <a href="<?$headerLinkedin?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
                  <a href="<?=$headerYoutube?>" target="_blank"><i class="fa fa-youtube"></i></a>
              </li>
            </ul>
            
            <p align="justify"><?=$description?></p>
            <a href="<?=$btnlink?>" class="btn btn-dark">Read more</a>
          </div>
          <div class="col-lg-3">
            <h4 class="text-thin h3">Our Location</h4>
            <div class="d-flex flex-wrap">
              <ul class="navigation list-unstyled">
              	  <li><p> <i class="fa fa-map-marker"></i> <b>Reg. Office : </b> Near Bagabasa Bsnl Office  Tehsil Bagma District Gomati (T.P.)
 <span class=""> City: Udaipur State : Tripura Pincode : 799113</span> </p>  
<!--Reg. Office : Near Bagabasa Bsnl Office  Tehsil Bagma District Gomati (T.P.) City : Udaipur State : Tripura Pincode : 799113-->
                  
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Click to view google map</button></li>
                  
	<!--			  <li><p><b><i class="fa fa-map-marker"></i> Regional Office :</b> Kaithi Chauraha, Sonai, <span class="ml_shift">Karchhana, Prayagraj-212301<span> </p>  -->
 <!--                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">-->
 <!--Click to view google map</button></li>-->
				  
              </ul>
            </div>
          </div>
          
          <div class="col-lg-3">
            <h4 class="text-thin h3">Quick Links</h4>
            <div class="d-flex flex-wrap">
              <ul class="navigation list-unstyled">
              	 
              <?
                 $get = $con->query("SELECT * FROM `links` WHERE `type` = 'legal_links' ");
                    if($get->num_rows){
                        while($row = $get->fetch_assoc()){
                            echo '<li><i class="fa fa-angle-right orange-text footer-icon" aria-hidden="true"></i> 
                            <a href="'.$row['link'].'" target="_blank">'.$row['label'].'</a></li>';
                        }
                    }
              ?>
    
              </ul>
             
            </div>
          </div>
          <div class="col-lg-3">
            <h4 class="text-thin h3">Contact Us</h4>
            <div class="d-flex flex-wrap">
              <ul class="navigation list-unstyled">
				  <li><p><b><i class="fa fa-phone"></i> Phone No. :</b><br> <?=$headerMobile?><br> </p></li>
				  <li><p><b><i class="fa fa-envelope"></i> Email :</b> <?=$headerEmail?> <br><span></span></p></li>
                  
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      
      
      <div class="copyrights">       
        <div class="container">
            <div class="col-md-4 col-xs-12 xs-padding">
              <p class="pull-left"><?=getSetting('footer_copyright')?></p>  
              
              
 <!--Developed By<b><i class="fa fa-heart" style="color:white"></i><a href="https://hyperprowebtech.com/" target="_blank" style="color:white"> Hyper Pro Webtech.</a></b>-->
            </p>
            </div>
            <div class="col-md-12 col-xs-12 xs-padding">
                <p class="text-center up-t">© <?=date('Y')?> <b> <?=PROJECT_CODE?> </b> all right reserved designed by <b> <img src="https://niedc.co.in/theme/second.gif" style="height:23px"> Hyper Pro Webtech </b>.  &nbsp;&nbsp;	
                <!--<p class="text-center">Website last updated on: <script language="JavaScript" type="text/javascript">document.write(new Date().toLocaleDateString('en-us', { year: "numeric", month: "short", day: "numeric" }));</script>@ copyright SIHS Developed By <i class="fa fa-heart" STYLE="color:red"></i>   Hyper Pro Webtech    &nbsp;&nbsp;	-->
 <!--Developed By<b><i class="fa fa-heart" style="color:white"></i><a href="https://hyperprowebtech.com/" target="_blank" style="color:white"> Hyper Pro Webtech.</a></b>-->
            </div>
            <!--<div class="col-md-3 col-xs-12 xs-padding0">-->
            <!--  <p class="pull-right"> <a href="< ?=getSetting('footer_disclaimer')?>">Disclaimer</a> | <a href="< ?=getSetting('footer_privacy_policy')?>">Privacy Policy</a> | <a href="<?=getSetting('footer_contact')?>">Contact</a> </p>-->
            <!--</div>-->
        </div>
      </div>
    </footer>
        <a data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="bt-1 hidden-xs hidden-sm collapsed" aria-expanded="false"><img src="https://niedc.co.in/theme/img/enquiry.jpg" class="img-fluid " alt="enquiry"></a>  
        <div id="style-switch" class="collapse" style="">
      <h4 class="mb-3">Drop a Message</h4>
      <form action="" method="post" id="contactform">
          <input type="hidden" name="status" value="contact_us">  
      	<div class="row">
            <div class="form-group col-md-12">
              <input placeholder="Enter Name" id="enquiry_name" name="name" class="form-control" autocomplete="off" onkeyup="livesearch('enquiry_name','[^A-Za-z-() ]')" onkeydown="livesearch('enquiry_name','[^A-Za-z-() ]')">
            </div>
            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="mobile" id="enquiry_contact" placeholder="Enter Contact ..." autocomplete="off" onkeyup="livesearch('enquiry_contact','[^0-9]')" onkeydown="livesearch('enquiry_contact','[^0-9]')" maxlength="10">
            </div>
            <div class="form-group col-md-12">
              <input type="email" class="form-control" name="email" placeholder="Enter Email" id="enquiry_email" autocomplete="off" onkeyup="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')" onkeydown="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')">
            </div>
            <div class="form-group col-md-12">
              <textarea class="form-control" rows="3" name="message" placeholder="Enter Query..." id="enquiry_msg" autocomplete="off" onkeyup="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')" onkeydown="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')"></textarea>
            </div>
            <div class="form-group col-md-6">
             <!--<input name="enquery" value="1" type="hidden">-->
              <button type="submit" class="btn btn-danger"> Submit </button>
              <!--<button type="reset" class="btn btn-primary"> Reset </button>-->
            </div>
      </div>
    </form>
    </div>
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

        <!-- Address 1 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  
               <p><iframe id="map-canvas" class="map_part" width="450"  height="450"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Main%2BBazar%2BBhaba%2BNagar%2BTehsil%2BNichar%2BDistrict%2BKinnaur%2B%28H.P.%29%2BCity%2B%3A%2BBhaba%2BNagar%2BState%2B%3A%2BHimachal%2BPradesh%2BPincode%2B%3A%2B172115&t=&z=13&ie=UTF8&iwloc=&output=embed">Powered by <a href="https://www.googlemapsgenerator.com">how to embed google maps</a> and <a href="https://yatzyregler.com/">yatzy protokoll</a></iframe></p><style>.mapouter{position:relative;height:400px;width:430px;background:#fff;} .maprouter a{color:#fff !important;position:absolute !important;top:0 !important;z-index:0 !important;}</style><style>.gmap_canvas{overflow:hidden;height:400px;width:430px}.gmap_canvas iframe{position:relative;z-index:2}</style>
              
            </div>
          </div>
        </div>
        
        
          <!-- Address 2 -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Regional Office </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=+Main+Bazar+Bhaba+Nagar+Tehsil+Nichar+District+Kinnaur+(H.P.)+City+:+Bhaba+Nagar+State+:+Himachal+Pradesh+Pincode+:+172115&key=..." width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
              </div>
            </div>
          </div>
        </div>
        <a type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="bt-1 d-none d-sm-block"><img src="img/enquiry.jpg" class="img-fluid " alt="enquiry"></a>
      Button trigger modal 
    <a type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="bt-1 d-none d-sm-block"><img src="< ?=THEME_PATH?>img/enquiry.jpg" class="img-fluid " alt="enquiry"></a>
    <div id="style-switch" class="collapse">
      <h4 class="mb-3">Drop a Message</h4>
      <form id="enquiry_form" name="enquiry_form"  method="post" action="#"  >                          
      	<div class="row">
            <div class="form-group col-md-12">
              <input placeholder="Enter Name" id="enquiry_name" name="enquiry_name"  class="form-control" autocomplete="off" onKeyUp="livesearch('enquiry_name','[^A-Za-z-() ]')" onKeyDown="livesearch('enquiry_name','[^A-Za-z-() ]')">
            </div>
            <div class="form-group col-md-12">
              <input type="text" class="form-control" name="enquiry_contact" id="enquiry_contact"  placeholder="Enter Contact ..." autocomplete="off" onKeyUp="livesearch('enquiry_contact','[^0-9]')" onKeyDown="livesearch('enquiry_contact','[^0-9]')" maxlength="10">
            </div>
            <div class="form-group col-md-12">
              <input type="email" class="form-control" name="enquiry_email" placeholder="Enter Email" id="enquiry_email" autocomplete="off" onKeyUp="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')" onKeyDown="livesearch('enquiry_email','[^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$]')">
            </div>
            <div class="form-group col-md-12">
              <textarea class="form-control" rows="3" name="enquiry_msg" placeholder="Enter Query..." id="enquiry_msg" autocomplete="off" onKeyUp="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')" onKeyDown="livesearch('enquiry_msg','[^A-Za-z-()0-9/., ]')"></textarea>
            </div>
            <div class="form-group col-md-6">
             <input name="enquery"  value="1" type="hidden">
              <button type="submit" class="btn btn-danger"> Submit </button>
              <button type="reset" class="btn btn-primary"> Reset </button>
            </div>
      </div>
    </form>
    </div>
    -login-form--
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
           <form method="post" action="#" name="login_form" id="login_form" data-toggle="validator">
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <label>User Name</label>
                  <input type="text" name="username" id="username" class="form-control" autocomplete="off" placeholder="Enter User Name">
                </div>
                <div class="md-form mb-4">
                  <label>Password</label>
                  <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
                </div>
        
              </div>
              <div class="modal-footer d-flex justify-content-center">
              <input type="hidden" name="login" value="1" />
                <button class="btn btn-danger" type="submit">Login</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!---//login-form---->
    <!-- JavaScript files-->
    <script src="<?=THEME_PATH?>js/jquery.min.js"></script>
    <script src="<?=THEME_PATH?>js/front.js"></script>
    <script src="<?=THEME_PATH?>js/owl.carousel.js"></script>
    <script src="<?=THEME_PATH?>js/popper.min.js"> </script>
    <script src="<?=THEME_PATH?>js/bootstrap.min.js"></script>
    <script src="<?=THEME_PATH?>js/swiper.js"></script>
    <script src="<?=THEME_PATH?>js/bootstrap-select.js"></script>
      <script>
		var swiper = new Swiper('.logo-container', {
			loop:true,
		  spaceBetween: 30,
		  slidesPerView: 4,
		  autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		  },
		  breakpoints: {
				   991: {
					   slidesPerView: 1
				   }
			   },
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		 
		});
		
			var swiper = new Swiper('.certi-container', {
			loop:true,
		  spaceBetween: 30,
		  slidesPerView: 4,
		  autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		  },
		  breakpoints: {
				   991: {
					   slidesPerView: 1
				   }
			   },
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		 
		});
		
		var swiper = new Swiper('.place-container', {
		  loop:true,
		  spaceBetween: 30,
		  slidesPerView: 4,
		  autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		  },
		  breakpoints: {
				   991: {
					   slidesPerView: 1
				   }
			   },
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		 
		});
		
		var swiper = new Swiper('.course-container', {
		  loop:true,
		  spaceBetween: 30,
		  slidesPerView: 2,
		  autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		  },
		  breakpoints: {
				   991: {
					   slidesPerView: 1
				   }
			   },
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		 
		});
		
		var swiper = new Swiper('.swiper-container-v', {
		  pagination: '.swiper-pagination-v',
		  paginationClickable: true,
		  nextButton: '.swiper-button-up',
		  prevButton: '.swiper-button-down',
		  speed: 1500,
		  loop: true,
		 direction: 'vertical',
		  autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		  },
		  breakpoints: {
				   991: {
					   slidesPerView: 1
				   }
			   },
		  pagination: {
			el: '.swiper-pagination',
			clickable: true,
		  },
		 
		});
		
		
	  </script>

  </body>


<!-- Mirrored from sitallahabad.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Dec 2023 06:26:22 GMT -->
</html>