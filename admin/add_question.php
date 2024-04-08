
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="theme/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="theme/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="theme/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="theme/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <style>
        .myInput,.myInput:active{
            border: none;
            font-weight: bold;
            width:100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="theme/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 Admin
                  <small>Member since Feb. 2020</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active ">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="pages.php"><i class="fa fa-circle-o"></i> Add Page</a></li>
            <li><a href="list_page.php"><i class="fa fa-circle-o"></i> List Page</a></li>
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="slider.php"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="list_slider.php"><i class="fa fa-circle-o"></i> List Slider</a></li>
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="menu.php"><i class="fa fa-circle-o"></i> Add Menu</a></li>
           
            
          </ul>
        </li>
        <li><a href="site_course.php"><i class="fa fa-book"></i> <span>Course Category</span></a></li>
        <li><a href="courses.php"><i class="fa fa-book"></i> <span> Courses</span></a></li>
         <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Exam Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
              <li><a href="exam-area.php"><i class="fa fa-circle-o"></i>  Exam Section</a></li>
            <!--<li><a href="list_centers.php"><i class="fa fa-circle-o"></i> List Centers Payment Complete</a></li>-->
            <li><a href="student-exams.php"><i class="fa fa-circle-o"></i> Student's Exams</a></li>
            <!-- <li><a href="list_products.php"><i class="fa fa-circle-o"></i> List Designing</a></li> -->
            
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Center</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
              <li><a href="edit_center.php"><i class="fa fa-circle-o"></i> List Franchise</a></li>
            <!--<li><a href="list_centers.php"><i class="fa fa-circle-o"></i> List Centers Payment Complete</a></li>-->
            <li><a href="create_center.php"><i class="fa fa-circle-o"></i> Create Center</a></li>
            <!-- <li><a href="list_products.php"><i class="fa fa-circle-o"></i> List Designing</a></li> -->
            
            
          </ul>
        </li>
        
        <li><a href="gallery_category.php"><i class="fa fa-gear"></i> Gallery Category</a></li>
              <li><a href="gallery_image.php"><i class="fa fa-gear"></i> Image Gallery</a></li>
       
       
       <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
              <li><a href="student_form.php"><i class="fa fa-circle-o"></i> <span>Add Student</span></a></li>
              <li><a href="all_students.php"><i class="fa fa-circle-o"></i> <span>  Students List By Center</span></a></li>
              <li><a href="all_students_list.php"><i class="fa fa-circle-o"></i> <span>All  Students</span></a></li>
              <!--<li><a href="all_students.php"><i class="fa fa-circle-o"></i> <span>All  Students Payment Success</span></a></li>-->
                <!--<li><a href="all_students_failed.php"><i class="fa fa-circle-o"></i> <span>All  Students Payment Failed</span></a></li>-->
            
          </ul>
        </li>
          <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Placement & Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
              <li><a href="placed_stu.php"><i class="fa fa-circle-o"></i> <span>Add placed Student</span></a></li>
              <li><a href="our_team.php"><i class="fa fa-circle-o"></i> <span>Add Team Member</span></a></li>
             
              <!--<li><a href="all_students.php"><i class="fa fa-circle-o"></i> <span>All  Students Payment Success</span></a></li>-->
                <!--<li><a href="all_students_failed.php"><i class="fa fa-circle-o"></i> <span>All  Students Payment Failed</span></a></li>-->
            
          </ul>
        </li>
        
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Admit Card</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="create_admit_card.php"><i class="fa fa-circle-o"></i> Generate Admit Card</a></li>
            <li><a href="get_admit_card.php"><i class="fa fa-circle-o"></i>Show Admit Card </a></li>
            
          </ul>
        </li>
        <!--<li class="treeview">-->
        <!-- <a href="#">-->
        <!--    <i class="fa fa-file"></i>-->
        <!--    <span>Result</span>-->
        <!--    <span class="pull-right-container">-->
        <!--      <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </span>-->
        <!-- </a>-->
        <!--  <ul class="treeview-menu">-->
        <!--    <li><a href="create_result.php"><i class="fa fa-circle-o"></i> Create Result</a></li>-->
        <!--    <li><a href="get_result.php"><i class="fa fa-circle-o"></i> Get Result</a></li>-->
            
        <!--  </ul>-->
        <!--</li>-->
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Students Certificates</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="create_certificate.php"><i class="fa fa-circle-o"></i> Create Certificate</a></li>
            <li><a href="get_certificate.php"><i class="fa fa-circle-o"></i> Get Certificate</a></li>
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Study Material</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="upload_material.php"><i class="fa fa-circle-o"></i> Upload Material</a></li>
            <li><a href="list_material.php"><i class="fa fa-circle-o"></i> List Material</a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Downloads</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="assignment.php"><i class="fa fa-circle-o"></i> Upload Downloads</a></li>
            
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="news.php"><i class="fa fa-circle-o"></i> Upload News</a></li>
            
            
          </ul>
        </li>
     <!--   <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Designing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a>
          <ul class="treeview-menu">
            <li><a href="products.php"><i class="fa fa-circle-o"></i> Add Designing</a></li>
            <li><a href="list_products.php"><i class="fa fa-circle-o"></i> List Designing</a></li>
            
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-file"></i>
            <span>Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
         </a> 
          <ul class="treeview-menu">
            <li><a href="add_blog.php"><i class="fa fa-circle-o"></i> Add Blog</a></li>
           <li><a href="list_products.php"><i class="fa fa-circle-o"></i> List Designing</a></li> 
             
          </ul>
        </li-->
<li><a href="videos.php"><i class="fa fa-book"></i> <span>Videos</span></a></li>>
<li><a href="logos.php"><i class="fa fa-users"></i> <span>Our Certificates</span></a></li>

<!--<li><a href="courses.php"><i class="fa fa-book"></i> <span> Courses</span></a></li>-->
<li><a href="contact_query.php"><i class="fa fa-gear"></i> <span> Contact Queries</span></a></li>
<!--<li><a href="contact_us.php"><i class="fa fa-gear"></i> <span>Contact Us</span></a></li>-->
<li><a href="manage_download.php"><i class="fa fa-download"></i> <span>Manage Download</span></a></li>
<li><a href="site_manager.php"><i class="fa fa-download"></i> <span>Site Manager</span></a></li>
<li><a href="students_files.php"><i class="fa fa-download"></i> <span>Student Download Files</span></a></li>
<li class="treeview">
     <a href="#">
        <i class="fa fa-gears"></i>
        <span>Settings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
     </a>
      <ul class="treeview-menu">
          <li><a href="setting_header.php"><i class="fa fa-circle-o"></i> <span> Header </span></a></li>
          <li><a href="middle_content.php"><i class="fa fa-circle-o"></i><span>Middle</span></a></li>
          <li><a href="setting_footer.php"><i class="fa fa-circle-o"></i> <span> Footer </span></a></li>
          <li><a href="setting_footer_images.php"><i class="fa fa-circle-o"></i> <span> Footer Images </span></a></li>
          <li><a href="change_password.php"><i class="fa fa-circle-o"></i> <span> Change Password </span></a></li>
          <li><a href="logo_setting.php"><i class="fa fa-circle-o"></i> <span>Logo Setting</span></a></li>
          <li><a href="payment_system.php"><i class="fa fa-circle-o"></i> <span> Payment Settings</span></a></li>
          <li><a href="use_page_items.php"><i class="fa fa-circle-o"></i> <span> Use Page Items </span></a></li>
      </ul>
    </li>
<li class="treeview">
     <a href="#">
        <i class="fa fa-gears"></i>
        <span>Extra Settings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
     </a>
      <ul class="treeview-menu">
          <li><a href="setting.php?page=contact_form"><i class="fa fa-circle-o"></i> <span> Contact Form </span></a></li><li><a href="setting.php?page=notices"><i class="fa fa-circle-o"></i> <span> Notices </span></a></li><li><a href="setting.php?page=helpline_numbers"><i class="fa fa-circle-o"></i> <span> Helpline Numbers </span></a></li><li><a href="setting.php?page=history"><i class="fa fa-circle-o"></i> <span> History </span></a></li><li><a href="setting.php?page=schemes"><i class="fa fa-circle-o"></i> <span> Schemes </span></a></li><li><a href="setting.php?page=student_corner"><i class="fa fa-circle-o"></i> <span> Student Corner </span></a></li><li><a href="setting.php?page=faculty_corner"><i class="fa fa-circle-o"></i> <span> Faculty Corner </span></a></li><li><a href="setting.php?page=covid_info"><i class="fa fa-circle-o"></i> <span> Covid Info </span></a></li><li><a href="setting.php?page=scholarship"><i class="fa fa-circle-o"></i> <span> Scholarship </span></a></li><li><a href="setting.php?page=international"><i class="fa fa-circle-o"></i> <span> International </span></a></li><li><a href="setting.php?page=governance"><i class="fa fa-circle-o"></i> <span> Governance </span></a></li><li><a href="setting.php?page=digital_initiatives"><i class="fa fa-circle-o"></i> <span> Digital Initiatives </span></a></li>      </ul>
    </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside><div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <section class="content">
  <div class="row">
    <div class="col-md-5">
        <form action="" method="POST" id="add-question">
            <input type="hidden" name="status" value="add_question">
            <input type="hidden" name="exam_id" value="3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus"></i> Add A Question of <b class="label label-info">Diploma In Computer Application</b></h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="form-label">Enter Question</label>
                        <textarea class="form-control" placeholder="Enter Question.." required name="question"></textarea>
                    </div>
                    <div class="answer-area">
                        
                    </div>
                    
                    <div class="form-group mt-3" style="margin-top:8px">
                        <button type="button" class="btn btn-xs btn-info add-a-new-answer"><i class="fa fa-plus"></i> Add A New Answer</button>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-md-7">
        <div class="panel panel-priary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i>List Questions of <b class="label label-info">Diploma In Computer Application</b></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="list_questions">
                        <thead>
                            <tr>
                                <th>#.</th>
                                <th>Question</th>
                                <th>Show Answer(s)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>



  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
   

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
    $('.deleteRow').click(function(){
        var id = $(this).data('id');
        var table = $(this).data('table');
        $.ajax({
            url:'Ajax.php',
            type:'post',
            dataType:'json',
            data:{id:id,table:table,status:'deleteRow'},
            success:function(res){
                alert(res);
                window.location.reload();
            }
        });
        
    });
    $('.extra_setting').submit(function(e){
        
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            url:'Ajax.php',
            type:'post',
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success:function(res){
                alert(res);
                // window.location.reload();
                return false;
            }
        });
        
    });
</script>
<!-- jQuery 3 -->
<!--<script src="theme/bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="theme/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>

  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="theme/bower_components/raphael/raphael.min.js"></script>
<script src="theme/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="theme/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="theme/bower_components/moment/min/moment.min.js"></script>
<script src="theme/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="theme/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="theme/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
</body>
</html>
<script>var base_url = 'https://sihsindia.com/';</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function(){
        var index = 1;
        const table = $('#list_questions').DataTable({
                   ajax: {
                        url: base_url + 'admin/ExamAjax.php',
                        data : {status : 'question_list', exam_id : '3'},
                        success: function (d) {
                            // console.log(d);
                            if (d.data && d.data.length) {
                                table.clear();
                                table.rows.add(d.data).draw();
                            }
                            else {
                                toastr.error('Table Data Not Found.');
                                // DataTableEmptyMessage(table);
                            }
                        },
                        error : function(a,b,v){
                            console.warn(a.responseText);
                        }
                    },
                    columns: [
                        {'data' : null},
                        {'data' : 'question'},
                        {'data' : null},
                        {'data' : null},
                    ],
                    columnDefs: [
                            {
                                targets : 0,
                                render : function(data,type,row){
                                    return `${index++}.`;
                                }
                            },
                            {
                                targets : 2,
                                render : function(data,type,row){
                                    return `<a href="javascript:;" class="btn btn-info btn-xs view-answer-list" data-question_id="${row.id}"><i class="fa fa-plus"></i> Answer List</a>`;
                                }
                            },
                            {
                                targets : 3,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render : function(data,type,row){
                                    return `<buton class="btn btn-xs btn-danger delete-row" data-id="${row.id}"><i class="fa fa-trash"></i></button>`;
                                }
                            },
                    ]
                    
               });
        
        $(document).on('click','.view-answer-list',function(){
            var question_id = $(this).data('question_id');
            // alert(question_id);
            $.dialog({
                title : 'List Answers',
                icon : 'fa fa-file',
                theme : 'bootstrap',
                content :  function(){
                    var self = this;
                    return $.ajax({
                        type : 'POST',
                        url : base_url+'admin/ExamAjax.php',
                        data : {question_id : question_id,status : 'get_answer'},
                        dataType : 'json',
                        success : function(res){
                            self.setContent(res.html);
                        }
                    });
                }
            });
        })
        
         $(document).on('click','.delete-row',function(){
            var id = $(this).data('id');
            var td = this,
                tdValue = $(td).html();
              Swal.fire({
                    html: "Are you sure you want to delete? <br> If Delete Question, then Delete all answers of deleted Question",
                    icon: "warning",
                    showCancelButton: true, 
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        // alert('Please Wait,,'+ result.value);
                        $.post(base_url+'admin/ExamAjax.php',{status : 'delete_question','question_id' : id},function(res){
                          console.log(res); 
                            toastr.success('Question and question of all answers Removed Successfully..');
                            location.reload();
                        })
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Question was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
        })    
        
        // $('#exam-form')
        $(document).on('submit','#add-question',function(e){
            e.preventDefault();
            var right_answer = $(this).find('input[type="radio"]:checked');
            if($('.answer_in').length == 0){
                toastr.error('Please Enter An Answer....');
                return false;
            }
            else{
                 var values = []; // Array to store encountered values
    
                var hasDuplicates = false;
        
                // Iterate over each input element with the class "input"
                $(".answer_in").each(function () {
                    var value = $(this).val();
        
                    // Check if the value is already in the array
                    if (values.indexOf(value) !== -1) {
                        hasDuplicates = true;
                        return false; // Break out of the loop if a duplicate is found
                    }
        
                    // Add the value to the array
                    values.push(value);
                });
        
                if (hasDuplicates) {
                    toastr.error("Duplicates found in the answer values.");
                    return false;
                }
            }
        
        
        
            if(right_answer.length){
                // alert(0);
                $.ajax({
                    type : 'POST',
                    url : base_url + 'admin/ExamAjax.php',
                    data : $(this).serialize(),
                    dataType : 'json',
                    success : function(re){
                        if(re.status){
                            toastr.success('Question created Successfully..');
                            document.getElementById('add-question').reset();
                          location.reload();
                        }
                    },
                    error: function(a,v,c){
                        console.warn(a.responseText);
                    }
                });
            }
            else
                toastr.error('Please Choose A Right Answer.');
            
        })
        
        
        
        
        var i = 1;
        $('.add-a-new-answer').click(function(){
            var template = `
                            <div class="input-group" style="display:none">
                                <span class="input-group-addon">
                                    <input type="radio" name="right_answer[]">
                                </span>
                                <input type="text" class="form-control answer_in" name="answer[]" required autocomplete="off" placeholder="Enter Answer">
                                <span class="input-group-addon">
                                    <button type="button" class="btn btn-xs btn-danger remove-answer"><i class="fa fa-trash"></i></button>
                                </span>
                                    
                            </div>
                            `;
                            
            $('.answer-area').append(template).children(':last').fadeIn(1000).find('input[type="text"]').focus();
        })
        $(document).on('keyup','.answer_in',function(){
           var answer = $(this).val();
           $('.answer_in').removeClass('active');
           $(this).addClass('active');
           $('.answer_in').each(function(){
               if(!$(this).hasClass('active')){
                   if($(this).val() == answer){
                       toastr.error('This is same answer please put another answer..');
                   }
               }
           });
        });
        
    
        $(document).on('click','.remove-answer',function(){
            var div = $(this).closest('.input-group');
            Swal.fire({
                html: "Are you sure you want to Remove?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then(function (result) {
                if (result.value) {
                    div.remove();
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Answer was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        })
    })
    
    
    
</script>