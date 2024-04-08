  <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
    </button>


        <div class="container">
        
                 <div class="navbar-collapse collapse" id="navigation">
                     
      <ul class="nav navbar-nav navbar-left">
          
          <?
          $pages = $con->query("SELECT * FROM his_page ORDER BY id ASC");
                while($p = $pages->fetch_assoc())
                {
                    if($p['id'] == 13)
                        continue;
                  $sub = $con->query("SELECT * FROM set_menu,menu where set_menu.page_id = '".$p['id']."' AND menu.id = set_menu.menu_id");
                  if(!$sub->num_rows)
                            {
                        if($p['default_page'] == 1){
                            echo '<li class="nav-item"><a class="nav-link" href="/">'.ucwords($p['page_name']).'</a></li>';
                        }else{
                             $link = is_null($p['link']) || $p['link'] == ''?BASE_URL.'?page_id='.$p['id']:$p['link'];
                             $redirect = $p['redirect']?'target="_blank"':'';
                            echo '<li class="nav-item"><a class="nav-link" '.$redirect.' href="'.$link.'">'.ucwords($p['page_name']).'</a></li>';
                        }
                  }
                }

                  $menu = $con->query("SELECT * FROM menu");
                  if($menu->num_rows){
                      while($m = $menu->fetch_assoc())
                      {
                         echo ' <li class="dropdown nav-item" >
                         <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="200">
                         '.ucwords($m['name']).' <b class="caret"></b>
                         </a>
                          <ul class="dropdown-menu">';
                          $l = $con->query("SELECT *,his_page.id as _id FROM his_page,set_menu WHERE set_menu.menu_id = '".$m['id']."' and his_page.id = set_menu.page_id");
                            while($mm = $l->fetch_assoc())
                          { $link = is_null($mm['link']) || $p['link'] == ''?BASE_URL.'?page_id='.$mm['_id']:$mm['link'];
                            $redirect = $mm['redirect']?'target="_blank"':'';
                            echo '<li class="nav-item"><a class="nav-link" '.$redirect.' href="'.$link.'">'.ucwords($mm['page_name']).'</a></li>';
                          } 
                          echo '</ul>
                        </li>';
                      }
                  }
                  $menuArr = array(
                                    
                                    'Franchise' => array(
                                                    array('label'=>'Apply For Franchise','link'=>'franchisee_form.php'),
                                                    // array('label'=>'Franchise Registration Details','link'=>'franchise_details.php'),
                                                    array('label'=>'Franchise Verfication','link'=>'franchise_verify.php'),
                                                    array('label'=>'Study Center List','link'=>'list_center.php'),
                                                    array('label'=>'Center Login','link'=>'center_login.php'),
                                                    // array('label'=>'Franchise Plan & Faculty','link'=>'https://kickacademy.co.in/?page_id=26'),
                                                    // array('lable'=>'Franchise Plan & Faculty','link'=>'https://kickacademy.co.in/?page_id=26'),
                                                    // array('label'=>'Franchise Members','link' => 'franchise_member.php'),
                                                ),
                                    'Student' => array(
                                                    array('label'=>'Online Admission','link'=>'student_form.php'),
                                                    array('label'=>'Enrollment Verification','link'=>'enrollment_verification.php'),
                                                    array('label'=>'Result Verification','link'=>'get_result.php'),
                                                    // array('label'=>'Certificate Verification','link'=>'get_certificate.php'),
                                                    array('label'=>'Admit Card','link'=>'get_admit_card.php'),
                                                ),
                                );
                                if(isset($_SESSION['student'])){
                                    $newStudent = array(
                                                    // array('label'=>'Pdf Download','link'=>'student_files.php?_type=pdf'),
                                                    // array('label'=>'Video Download','link'=>'student_files.php?_type=video'),
                                                    // array('label'=>'Student Notifications','link'=>'student_messages.php'),
                                                    // array('label'=>'My Course','link'=>'my-course.php'),
                                                    array('label'=>'Logout','link'=>'student_logout.php'),
                                                );
                                }else{
                                    $newStudent = array(
                                                    array('label'=>'Student Login','link'=>'student_login.php'),
                                                );
                                }
                                $menuArr['Student'] = array_merge($menuArr['Student'],$newStudent);
                            foreach($menuArr as $key => $val){
                                echo '<li class="dropdown nav-item" >
                                     <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" data-hover="dropdown" data-delay="200">
                                     '.ucwords($key).' <b class="caret"></b>
                                     </a>
                                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                                      foreach($val as $data){
                                          echo '<li class="nav-item"><a class="dropdown-item nav-link" href="'.$data['link'].'">'.ucwords($data['label']).'</a></li>';
                                      }
                                echo '</ul>
                                    </li>';
                            }
                  
                ?>
                <li class="nav-item"><a class="nav-link" href="course.php">Courses</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>?page_id=13">Contact Us</a></li>-->
                <li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>contact_us.php">Contact Us</a></li>
                
         

      </ul>
       
    </div>

        </div>
       

      </nav>

<script>
    $(document).ready(function () {
        $("#toggleButton").click(function () {
            $(this).find("i").toggleClass("fa-bars fa-times");
        });
    });
</script>
