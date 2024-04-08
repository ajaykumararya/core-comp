<?php
require_once 'admin/includes/config.php'; 

function photo_upload($file,$path)
{
    $allowedExts = array("gif","jpeg","jpg","png");
    $temp = explode(".",$_FILES[$file]["name"]);
    $extension = end($temp);
    $return = array();
    if((($_FILES[$file]["type"] == "image/gif")
    ||($_FILES[$file]["type"] == "image/jpeg")
    ||($_FILES[$file]["type"] == "image/jpg")
    ||($_FILES[$file]["type"] == "image/pjpeg")
    ||($_FILES[$file]["type"] == "image/x-png")
    ||($_FILES[$file]["type"] == "image/png"))
    && in_array($extension, $allowedExts))
    {
      if($_FILES[$file]["error"]>0)
      {
        echo '<div class="alert alert-danger">Return Code: '.$_FILES[$file]["error"].'</div>';
      }
      else
      {
        $_FILESName = $temp[0].".".$temp[1];
        $temp[0] = rand(0,3000);

        if(file_exists("uploads/".$path.'/'.$_FILES[$file]["name"]))
        {
          $return['error'] = '<div class="alert alert-danger">'.$_FILES[$file]["name"].'Already Exists</div>';
        }
        else
        {
        //   $newfilename = time().end(explode('.',$_FILES[$file]["name"]));
          
          $originalFilename = $_FILES[$file]["name"];
            $fileExtension = pathinfo($originalFilename, PATHINFO_EXTENSION);
           $uniqueIdentifier = uniqid(); // Generates a unique identifier
            
          $newfilename = 'product__' . $uniqueIdentifier . '.' . $fileExtension;

          
          $aa = 'product__'.$newfilename;
          $a = 'uploads/'.$path.'/'.$aa;
          $photo_address = '../uploads/';
          $z = move_uploaded_file($_FILES[$file]["tmp_name"], $a);
          $return['file_name'] = $aa;
          $return['status'] = 1;
        }
      }
    }
    else
    {
      $return['status'] = 0;
    }
    return $return;
  }
if(isset($_POST['status']) && $_POST['status']=='center_login')
{
      $post = $_POST;
      $username = $post['username'];
      $password = $post['password'];
      $login = $con->query("SELECT * FROM centers where username = '".$username."' AND password = '".$password."' AND status = 1");
      if($login->num_rows)
      {
        $row = $login->fetch_assoc();
        $rand = rand(111111,999999);
        $_SESSION['center']['id'] = $row['id'];
        $_SESSION['center']['session_id'] = $rand;
        $_SESSION['center']['login'] = TRUE;
        $sess = $con->query("INSERT INTO `check_session` (`id`, `timestamp`, `user_id`, `session_id`) VALUES (NULL, CURRENT_TIMESTAMP, ' ".$row['id']."','".$rand."')");
        if($sess){
        echo '<script>location.href="center/"</script>';
        }
      }
      else
      {
        echo '<script>alert("Invalid Login");location.href="center_login.php"</script>';
      }
}
if(isset($_POST['status']) && $_POST['status']=='student_login')
{
      $post = $_POST;
      $username = $post['username'];
      $password = $post['password'];
      $login = $con->query("SELECT * FROM students where username = '".$username."' AND password = '".$password."' AND status = 1");
      if($login->num_rows)
      {
        $row = $login->fetch_assoc();
        $rand = rand(111111,999999);
        $_SESSION['student']['id'] = $row['id'];
        $_SESSION['student']['session_id'] = $rand;
        $_SESSION['student']['login'] = TRUE;
        $con->query("INSERT INTO `check_session` (`id`, `timestamp`, `user_id`, `session_id`) VALUES (NULL, CURRENT_TIMESTAMP, '".$row['id']."', '".$rand."')");
        echo '<script>alert("Login Success.");location.href="/"</script>';
      }
      else
      {
        echo '<script>alert("Invalid Login");location.href="student_login.php"</script>';
      }
}
if(isset($_POST['status']) && $_POST['status']=='contact_query')
{
    if($_SESSION['digit']==$_POST['captcha'])
    {
        $chk = $con->query("INSERT INTO `contact_query` (`id`, `timestamp`, `name`, `mobile`, `email`, `message`) VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['name']."', '".$_POST['mobile']."', '".$_POST['email']."', '".$_POST['message']."')");
        echo '<script>alert("Your query is sent.");location.href="/"</script>';
    }
    else
    {
         echo '<script>alert("Invalid Captcha!!");location.href="contact_us.php"</script>';
    }
    
}
$setting = [];
$set = $con->query("SELECT * FROM setting");
while($rr = $set->fetch_assoc())
    $setting[$rr['type']] = $setting[$rr['id']] = $rr['value'];
$logo = $con->query("SELECT * FROM logo_setting where id = 1")->fetch_assoc();
define('WEB_LOGO','uploads/logo/'.$logo['logo']);
define('WEB_FAVICON','uploads/logo/'.$logo['favicon']);
function getSetting($key,$res=''){
    global $setting;
    if(isset($setting[$key])){
        $res = $setting[$key];
    }
    return $res;
}


// Fetch SEO settings from the database
$seoSettings = $con->query("SELECT * FROM seo_settings")->fetch_assoc();

// Define default values in case settings are not found
$webTitle = isset($seoSettings['web_title']) ? $seoSettings['web_title'] : 'Website';
$metaTitle = isset($seoSettings['meta_title']) ? $seoSettings['meta_title'] : '';
$metaDescription = isset($seoSettings['meta_description']) ? $seoSettings['meta_description'] : '';
$metaKeywords = isset($seoSettings['meta_keywords']) ? $seoSettings['meta_keywords'] : '';
$metaAuthor = isset($seoSettings['meta_author']) ? $seoSettings['meta_author'] : '';
$metaOgTitle = isset($seoSettings['meta_og_title']) ? $seoSettings['meta_og_title'] : '';
$metaOgDescription = isset($seoSettings['meta_og_description']) ? $seoSettings['meta_og_description'] : '';

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

$logo = $con->query("SELECT  * FROM logo_setting where id = 1")->fetch_assoc(); 
?>
<!DOCTYPE html>
<html >
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $webTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta tags for SEO -->
    <meta name="title" content="<?= $metaTitle ?>">
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="keywords" content="<?= $metaKeywords ?>">
    <meta name="author" content="<?= $metaAuthor ?>">
    <!-- Open Graph tags for social media -->
    <meta property="og:title" content="<?= $metaOgTitle ?>" />
    <meta property="og:description" content="<?= $metaOgDescription ?>" />
    <meta property="og:image" content="" />
    <!-- Bootstrap CSS-->
    <link rel="icon" href="" type="image/x-icon">


    <meta property="og:image" content="" />
    <link rel="stylesheet" href="<?=THEME_PATH?>css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/font-awesome.min.css">
    <!-- Fontastic CSS-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/font.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Swiper carousel-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/swiper.css">
    <!-- Lity-->
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/bootstrap-select.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/style_default.css">
    <link rel="stylesheet" href="<?=THEME_PATH?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=THEME_PATH?>css/owl.carousel.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=THEME_PATH?>css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href=" ">
  </head>
  <style>
      nav.navbar a.nav-link {
    font-weight: 500;
}

    @media (max-width:600px){
        body{
            font-family:'saira' !important;
        }
    }
    .blink_me{
        color:brown!important;
    }

  </style>
<body style="
    font-family: saira !important;
">
    <header class="header">
      <!-- top bar-->
      <div class="top-bar d-none d-md-block">
        <div class="container">
          <div class="row">       
            <div class="col-md-6">
              <p class="mb-0"> <i class="fa fa-mobile"></i><?=$headerMobile?><a href="https://sihsindia.com/admin/" ><i class="fa fa-users"></i></a> <a href="download.php" class="btn btn-danger"><i class="fa fa-download" aria-hidden="true"></i> Download</a> </p>
             
            </div>
            
            <div class="col-md-6 text-right">
              <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="franchisee_form.php" class="btn btn-primary"> Branch Registration</a> </li>
                <li class="list-inline-item"><a href="student_form.php" class="btn btn-danger"> Admission Now</a> </li>
                <li class="list-inline-item">
                   <a href="<?=$headerFacebook?>" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="<?=$headerTwitter?>" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a href="<?=$headerInstagram?>" target="_blank"><i class="fa fa-instagram"></i></a>
                  <a href="<?=$headerYoutube?>" target="_blank"><i class="fa fa-youtube"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- navbar-->
       <div class="container">
       		<div class="row">
                <div class="col-md-9 col-sm-12">
                    <a href="index.php" class="navbar-brand">
                       
                             
                               
    		                    <!--<img src="../uploads/logo/< ?=$logo['logo']?>" style="width:100px;">-->
                            
                        
                        <img src="../uploads/logo/<?=$logo['logo']?>" style="    max-width: 78%;
    height: auto;
"  alt="logo">
                    </a>
                </div>
                <div class="col-md-3 col-sm-12 mt-1 d-none d-sm-block">
                    <p class="pull-right"><i class="icon-graduated-student-avatar login_icon"></i><a href="student_login.php" class="btn btn-dark icon_student2  ">   &nbsp;  Student Login </a></p>
                    <p class="pull-right"> <i class="icon-molecular login_icon2"></i><a href="center_login.php" class="btn btn-primary icon_student">  &nbsp;&nbsp;Center Login&nbsp;&nbsp;</a></p>
                </div>
                <div class="col-sm-12 d-block d-sm-none hidden-sm-down">
                	<p>
                	    <a href="student_login.php" class="btn btn-dark"> Student Login </a>
                    	<a href="center_login.php" class="btn btn-primary ">   Center Login </a>
                    	<a href="#" data-toggle="modal" data-target="#modalLoginForm" class="btn btn-primary">Login </a>
                	</p>
                </div>
            </div>
       </div>
	   
	  <div class="latest_info">
	  	<marquee behavior="scroll" direction="left" onMouseOver="stop()" onMouseOut="start()" scrollamount="2">
    	  	<p class="text-white latest_text">
    			<i class="fa fa-star" aria-hidden="true"></i>
    			    <span class="blink_me">Welcome to SMYCA </span> | We Belive in Oulty Education & Trusted Institute |
    			    <span class="blink_me">An ISO 9001: 2015 Certified Institute.</span>
        			<!--<span class="blink_me">Welcome to SIHS </span> | We Belive in Oulty Education & Trusted Institute | -->
        			<!--<span class="blink_me"> An ISO 9001: 2015 Certified Institute.</span>-->
    			<i class="fa fa-star" aria-hidden="true"></i>
    		</p>
	  	</marquee>
	  </div>
      
    </header>

<!-- *** TOP BAR END *** -->
<?php
    include 'navbar.php';
?>






 