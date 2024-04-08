<?php
function photo_upload($file,$path)
{
  $allowedExts = array("gif","jpeg","jpg","png","pdf");
  $temp = explode(".",$_FILES[$file]["name"]);
  $extension = end($temp);
  $return = array();
  if((($_FILES[$file]["type"] == "image/gif")
  ||($_FILES[$file]["type"] == "image/jpeg")
  ||($_FILES[$file]["type"] == "image/jpg")
  ||($_FILES[$file]["type"] == "image/pjpeg")
  ||($_FILES[$file]["type"] == "image/x-png")
  ||($_FILES[$file]["type"] == "image/png")
  ||($_FILES[$file]["type"] == 'application/pdf'))
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

      if(file_exists("../uploads/".$path.'/'.$_FILES[$file]["name"]))
      {
        $return['error'] = '<div class="alert alert-danger">'.$_FILES[$file]["name"].'Already Exists</div>';
      }
      else
      {
        $newfilename = time().end(explode('..',$_FILES[$file]["name"]));
        $aa = 'product__'.$newfilename;
        $a = '../uploads/'.$path.'/'.$aa;
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
?>