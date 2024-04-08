<?php

    include 'includes/header.php';
    
    $page_id = isset($_GET['page_id'])?$_GET['page_id']:1;
    $pages = $con->query("SELECT * FROM `his_page` WHERE `id` = '".$page_id."'")->fetch_assoc();
    $content = $pages['content'];    
    $page_id = $pages['id'];
    define('DEFAULT_PAGE','1');

?>



<?php
if (DEFAULT_PAGE == $page_id) {
    $sliderResult = $con->query("SELECT * FROM `sliders` where type = 'main'");
    
    if ($sliderResult->num_rows > 0) {
        $slider = $sliderResult->fetch_all(MYSQLI_ASSOC);

        ?>
        <section class="hero hero-home">
            <div class="swiper-container hero-slider swiper-container-horizontal">
                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                    <?php
                    foreach ($slider as $slide) {
                        // Remove leading dots and slashes from the image path
                        $imageUrl ="./uploads/". ltrim($slide['image'], '.');
                        ?>
                        <div class="swiper-slide" style="width: 1349px;">
                            <div style="background: url('<?= $imageUrl ?>');" class="hero-content has-overlay-dark">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h1 class="bg_text"></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- Add Pagination-->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                    <?php
                    // Adjust the number of bullets based on the number of slides
                    for ($i = 0; $i < count($slider); $i++) {
                        echo '<span class="swiper-pagination-bullet"></span>';
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php
    }
?>
    <section class="info-boxes">
      <div class="container">
        <div class="row">
            <a href="enrollment_verification.php" style="background: url(img/boxes-img-1.jpg);" class="info-box cyan col-lg-4">
                <div class="info-box-content">
                  <h3 class="text-uppercase">Enroll Verification </h3>
                  <p>If You want to know your verification of application click here now.</p>
                </div>
             </a>
            <a href="get_admit_card.php" style="background: url(img/boxes-img-2.jpg);" class="info-box orange col-lg-4">
                <div class="info-box-content">
                  <h3 class="text-uppercase"> Admit Card</h3>
                  <p>If You want your Admit card of any subject click here now.</p>
                </div>
            </a>
            <a href="get_result.php" style="background: url(img/boxes-img-3.jpg);" class="info-box red col-lg-4">
                <div class="info-box-content">
                  <h3 class="text-uppercase">Result</h3>
                  <p>If You want to know your Result of any subject click here now.</p>
                </div>
             </a>
         </div>
      </div>
    </section>
   
    <section class="intro">
      <div class="container text-center">
        <div class="row">
          <?php
$result = $con->query("SELECT * FROM `intro`");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
   <div class="col-md-8">
            <h2 class="mb-4 text_heading"> <span class="highlight_color"><?=$row['heading']?></span></h2>
            <div class="row pt-2">
                <div class="col-md-5">
                    <img src="uploads/intro/<?=$row['image']?>" class="img-fluid" alt="Image">
                </div>
                <div class="col-md-7">
                    <p class="para_info mx-auto text-justify"><?=$row['description']?></p>
               </div>
            </div>
            <div class="signature mx-auto">
                <a href="<?=$row['btn_link']?>" class="btn btn-danger">Know More</a>
            </div>
        </div>
<?php
} else {
    echo '<p>No intro data available.</p>';
}
?>


			
			<div class="col-md-4">
			    
<h3 class="theme_color pt-2"><font color="#0e0067">Recently Join</font> Student List</h3>

<div class="swiper-container swiper_1" style="height:305px;">
    <div class="swiper-container-v">
        <div class="swiper-wrapper">
            <?php
            $student = $con->query("SELECT students.*,courses.course_name FROM students INNER JOIN courses ON students.course_id where students.status = 1");
            if ($student->num_rows > 0) {
                while ($s = $student->fetch_assoc()) {
                    ?>
                    <div class="swiper-slide">
                        <ul class="list-group">
                            <li class="list-group-item bg_g">
                                <img src="./uploads/students/<?=$s['photo']?>" class="img-fluid p-2" alt="image" style="width:160px">
                                <p><?=$s['name']?></p>
                                <strong><?=$s['course_name']?></strong>
                            </li>
                        </ul>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>

		  
		 
		  </div>
		</div>
	  </div>
</section>

    <section class="intro mb bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="serviceBox">						
						<h3 class="title theme_color">Director Message</h3>
						<p class="description text-justify">
							We live in a fast-moving world where almost everything must come instantly to us. In this computer era, we depend on the computer to help us complete tasks and to solve problems..
						</p>
						<!--<span class="text-center pb1"><a href="message">Read More..</a></span>-->
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="serviceBox">						
						<h3 class="title theme_color">Authorization</h3>
						<p class="description text-justify">
							An Autonomous Organization Managed & Run by Sholeshwar Educational Society, H.P.) Registered with Govt. of Himachal Pradesh Under Societies Registration Act Vide Regd. No. 508/011 Dated 14 Oct. 2011						</p>
						<!--<span class="text-center pb1"><a href="affiliation">Read More..</a></span>-->
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="serviceBox">						
						<h3 class="title theme_color">Why SIHS </h3>
						<p class="description text-justify">
							A well disciplined institute in this region. Completed 9th Glorious years of success in quality Education. ISO 9001:2008 certified for Quality Management System.
						</p>
						<!--<span class="text-center pb1"><a href="why_sit">Read More..</a></span>-->
					</div>
				</div>
			</div>
		</div>
    </section>
   
<section class="intro mb">
  <div class="container">
    <h2 class="mb-4 text_heading text-center"> Our  <span class="highlight_color">Team Member</span></h2>
    <div class="row pt-4">
      <div class="col-md-12">
        <div class="swiper-container place-container swiper-container-horizontal">
          <div class="swiper-wrapper">
            <?php
            $place = $con->query("SELECT * FROM team");
            while ($row = $place->fetch_assoc()) {
            ?>
                <div class="swiper-slide">
                <div class="staff-member">
                  <img src="./uploads/team/<?= $row['image']; ?>" alt="Team Member" class="img-fluid" width="250">
                  <div class="info">
                    <h3 class="h5 teacher mb-0"><?php echo $row['name']; ?></h3>
                    <span><?php echo $row['job']; ?></span>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <!--<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>-->
        </div>
      </div>
    </div>
  </div>
</section>  
   
   
   
<section class="intro mb">
  <div class="container">
    <h2 class="mb-4 text_heading text-center"> Job &amp; <span class="highlight_color">Placement Of Student</span></h2>
    <div class="row pt-4">
      <div class="col-md-12">
        <div class="swiper-container place-container swiper-container-horizontal">
          <div class="swiper-wrapper">
            <?php
            $place = $con->query("SELECT * FROM placement");
            while ($row = $place->fetch_assoc()) {
            ?>
              <div class="swiper-slide">
                <div class="staff-member">
                  <img src="./uploads/placed_student/<?= $row['image']; ?>" alt="Placement student" class="img-fluid" width="250">
                  <div class="info">
                    <h3 class="h5 teacher mb-0"><?php echo $row['name']; ?></h3>
                    <span><?php echo $row['job']; ?></span>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <!--<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>-->
        </div>
      </div>
    </div>
  </div>
</section>

    <section class="blog bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="mb-4 text_heading"> Our <span class="highlight_color">Courses</span></h2>
        <div class="row">
          <div class="swiper-container course-container swiper-container-horizontal">
            <div class="swiper-wrapper">
              <?php
              $courses = $con->query("SELECT * FROM index_course LIMIT 2");

              while ($course = $courses->fetch_assoc()) {
              ?>
                <div class="swiper-slide">
                  <div class="blog-post">
                    <div class="image">
                      <img src="uploads/index_course/<?= $course['course_image']; ?>" alt="Courses" class="img-fluid">
                      <div class="overlay d-flex align-items-center justify-content-center">
                        <a href="skill_development" class="btn btn-outline-light">Read more</a>
                      </div>
                    </div>
                    <div class="author">
                      <img src="uploads/index_course/<?= $course['author_image']; ?>" alt="author" class="img-fluid">
                    </div>
                    <div class="text">
                      <a href="#">
                        <h4 class="text-this"><?= $course['course_name']; ?></h4>
                      </a>
                      <p><?= $course['course_detail']; ?></p>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
            <!-- Add Pagination -->
            <!--<div class="swiper-pagination"></div>'-->
            <!-- Add Navigation -->
            <!--<div class="swiper-button-next"></div>-->
            <!--<div class="swiper-button-prev"></div>-->
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
                <h2 class="mb-4 text_heading"> Recent <span class="highlight_color">News</span></h2>

                <div class="bg-white">
                    <marquee behavior="scroll" height="383px" direction="up" onmouseover="stop()" onmouseout="start()" scrollamount="2">
                        <ul class="list-group">
	                        <li class="list-group-item">
	                            <?php
	                                $news = $con->query("SELECT * FROM news");
	                                while($recent = $news->fetch_assoc()){
	                                    
	                                
	                                
	                            ?>
                                <div class="float-left">
                                    <img src="uploads/news/<?=$recent['image']?>" alt="news" class="img-fluid" width="80">                                
                                    <span class=""><?=$recent['date']?></span> <br>
                                    <strong><?=$recent['heading']?></strong>
                                    <p><a class="two_line_limit news_des" href="single-news.php?view=8">
                                        <?=$recent['description']?>
                                        </a>
                                    </p>
                                </div>
                                <?
}
                                ?>
                              </li>
                        </ul>
                    </marquee>
                     <div class="text-center pt-3 pb-2">
                        <a href="news.php" class="btn btn-danger">View All News</a>
                    </div>
                </div>
               
            </div>
    </div>
  </div>
</section>

    
    <div class="container-fluid bg-img">	
    <div class="swiper-container certi-container swiper-container-horizontal">
        <header>
            <h2 class="text-center">Our Certificate's</h2>
        </header>
        <div class="swiper-wrapper" style="transform: translate3d(-4602.5px, 0px, 0px); transition-duration: 0ms;">
            <?php
            $certificatesResult = $con->query("SELECT * FROM `logos`");
                
            if ($certificatesResult->num_rows > 0) {
                $certificates = $certificatesResult->fetch_all(MYSQLI_ASSOC);
                foreach ($certificates as $certificate) {
                    $imageUrl ="./uploads/site_manager/" . ltrim($certificate['image'], '.');
                    ?>
                    <div class="swiper-slide" style="width: 298.75px; margin-right: 30px;">
                        <div class="course">
                            <div class="course-image">
                                <img src="<?= $imageUrl ?>" alt="image" class="img-fluid">
                                <div class="overlay flex-column d-flex align-items-center justify-content-center">
                                    <div class="instructor-name">
                                        <a href="#" class="no-anchor-style">
                                            <strong></strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
        
        <!-- Add Pagination -->
        <!--<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">-->
        <!--    <span class="swiper-pagination-bullet"></span>			    -->
        <!--</div>-->
    </div>
    <!-- <div class="text-center mb-3">
        <a href="affiliation" class="btn btn-danger">View All Certificate's</a>
    </div> -->
</div>
<?
$crouselData = $con->query("SELECT * FROM crousel");

?>

<section class="related-courses bg-gray">
    <div class="container">
        <div class="row">
            <div class="swiper-container logo-container swiper-container-horizontal">
                <div class="swiper-wrapper">
                    <?php while ($row = $crouselData->fetch_assoc()) : ?>
                        <div class="swiper-slide">
                            <div class="course">
                                <div class="course-image">
                                    <img src="uploads/crousel/<?=$row['image']?>" alt="image" class="img-fluid">
                                    <div class="overlay flex-column d-flex">
                                        <div class="instructor-name"><a href="#" class="no-anchor-style"><strong></strong></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
            </div>
        </div>
    </div>
</section>

    <?php
    
    }
    
    ?>
     <?
                if(DEFAULT_PAGE == $page_id){
                    // include 'includes/default.php';
                }
                ?>
    <div id="all" class="container-fluid">
        <div id="content" class="container container mt-md-5 mt-4 mb-md-5 mb-4">
            
           <?
                define('CONTENT',$content);
                echo $content;
                $schema = $con->query("SELECT * FROM `web_schema` WHERE `page_id` = '$page_id' ORDER BY `sort` ASC  ");
                while($s = $schema->fetch_assoc()){
                    echo '<main id="main">';
                    arrangePage($s['type'],$s['key_id']);
                    echo '</main>';
                }
                
                function arrangePage($type,$key){
                    switch($type){
                        case 'content':
                            echo '<div class="container">';
                            // echo CONTENT;
                            echo '</div>';
                        break;
                        case $type:
                            if(function_exists($type))
                                $type();
                        break;
                    }
                }

function get_gallery(){
    global $con;
    echo '<section class="container">';
         $cat = $con->query("SELECT * FROM gallery_category order by seq asc");
         
        while($c = $cat->fetch_assoc()){
            var_dump($c);
            exit;
            echo ' <h1 style="margin:5px;font-size:30px;border-bottom:3px solid #2a1570"><b>'.ucwords($c['category_name']).'</b></h1>';
            echo '<div class="row">';
            $get = $con->query("SELECT * FROM gallery where category_id = '".$c['id']."' order by id desc");
            while($g = $get->fetch_assoc())
            {
                echo '
                     <div class="col-md-3 col-lg-3" style="margin-bottom:5px;">
                            <a href="uploads/gallery/'.$g['image'].'" target="_blank"><img style="width:100%;height:150px;border:1px solid black;" src="uploads/gallery/'.$g['image'].'" title="'.$g['title'].'"></a>
                     </div>
                ';
            }
            echo '</div>';
        }
    echo '</div></section>';
}
function get_form(){
    global $con;
    ?>
  <div class="container">
      <div class="col-sm-12">
      <br>
        
      </div>
      <div class="col-sm-9">
        <div class="box">
          <h3 class="mb5"><i class="fa fa-building-o" aria-hidden="true"></i> Address</h3>
          <div class="contactDetail-box boder-none">
            <ul>
              <li style="margin-bottom: 2px;"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=getSetting('contact_address');?> </li>
            <li><i class="fa fa-phone"></i><?=getSetting("contact_mobile");?></li>
            <li><i class="fa fa-envelope"></i> <a href="mailto:<?=getSetting('contact_email');?>" class="orange-text"><?=getSetting('contact_email');?></a></li>
            </ul>
          </div>
		  
		  <div class="contact-map">
		    <?=getSetting('contact_map');?>
		  </div>
        </div>
      </div>
      <!-- /#blog-post -->
      <div class="col-md-3 clearfix-xs clearfix-sm">
        <!-- *** BLOG MENU ***
 _________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-phone-square" aria-hidden="true"></i> Contact Us</h3>
          </div>
          <div class="panel-body">
            <div class="panel-group" id="accordion">
                <?
                    	$get = $con->query("SELECT * FROM student_files WHERE `type` = 'contact_tabs' ");
                    	$i=0;
    						while($m = $get->fetch_assoc())
    						{
    						    echo '<div class="panel panel-default">
                                    <div class="panel-heading Footer-accordian-h4">
                                      <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'"> '.ucwords($m['title']).' </a> </h4>
                                    </div>
                                    <div id="collapse'.$i++.'" class="panel-collapse collapse">
                                      <div class="panel-body accordian-body">
                                        '.$m['description'].'
                                      </div>
                                    </div>
                                  </div>
                                  ';
    						}
                ?>
              
              

  

            </div>
          </div>
        </div>
     
      </div>
    </div>
    <?
}



            ?>
            
        </div>
    </div>

<!--< ?require_once 'includes/footer.php';?>-->
<?php
    include 'includes/footer.php';
?>