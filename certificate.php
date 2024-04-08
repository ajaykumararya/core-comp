
<?

$mother = $s['mother'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Certificate | <?=$s['enrollment_no']?></title>
    <link href='https://fonts.googleapis.com/css?family=Reem Kufi' rel='stylesheet'>
<style>
    body {
        font-family: 'Reem Kufi' !important;
    }
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  /*box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
    </style>
    <style>
        *{
            padding:0;
            margin:0;
        }
        body{
            width:100%;
            height:auto;
            /*overflow:hidden;*/
            /*background-color:#c4a1a2;*/
            /*font-family: math;*/
            font-size: small
        }
        .content-wrapper{
            text-align:center;
        }
        .content-wrapper img{
            width:100%;
        }
        .text-wrapper{
                width: 96%;
                position: relative;
               margin-top: 0%;
        }
        .text-wraper h2{
            text-align:center;
            color:#ffffff;
            font-size:10vw;
            
        }
        h4{
            text-align:left;
        }
        #myPhoto{
            width: 167px;
            height: 198px;
            margin-top: 5%;
            margin-right: 2.8%;
        }
        .content{
               margin-top: -33%;
            margin-left: 31%;
            text-align: left;
        }
        #sl{
            text-align:right;
            margin-right: 3%;
        }
        .box{
            margin-top:-1%;
        }
        tr td{
            text-align:center;
        }
        .text-wrapper>div,.text-wrapper>img,.text-wrapper>h1,.text-wrapper>h2,.text-wrapper>h3,.text-wrapper>h4,.text-wrapper>p{
            position:absolute;
        }
        p{
                font-size: 1.4em;
    font-weight: bold;
    margin-top: 7px;
        }
    </style>
  </head>
        <?
          $logo = $con->query("SELECT * FROM logo_setting where id = 1")->fetch_assoc();
      ?>
  <body onload="window.print();">
  <!--<body>-->
            <page size="A5" id="printableArea" layout="landscape">
      <div class="content-wrapper" >
          <img src="<?=$bg?>" >
          <div class="text-wrapper">
                    <!--<h2 style="position: absolute;top: -1rem;left: 1rem;width: 100%;"><?=$center_name?></h2>-->
                  <img src="<?=$photo?>" style="height: 9.8rem;width: 7.54rem;top: -47.75rem;left: 21.05rem;">
               
                  
                    <p style="top: -36.7rem;left: 11rem;width: 441px;"><?=$name?></p>
                    <!--<p style="top: -36.7rem;left: 11rem;width: 441px;"><?=$dob?></p>-->
                    
                    <p style="top: -18.4rem;left: 11rem;width:441px"><?=$center_name?></p>
                    <p style="top: -33.3rem;left: 11rem;width:441px"><?=$father?></p>
                    <!--<p style="top: -19.5rem;left: 11rem;width:441px;"><?=$mother?></p>-->
                    <p style="top: -15.2rem;left: 15rem;width:441px"><?=date("d-m-Y",strtotime($issue_date))?></p>
                    <p style="top: -28.3rem;left: 17rem;width:441px"><?=$duration?></p>
                    <p style="top: -23.3rem;left: 11rem;width:441px;"><?php
                    if(isset($s['dur_ends'])){
                        echo date("F \t\t Y",strtotime($s['dur_ends']));
                    }
                    ?></p>
                    <p style="top: -21.7rem; left: 11rem; width: 441px">
                        <?php
                       $grade = $con->query("SELECT * FROM results WHERE enrollment_no = '".$enroll_no."' ");
        echo ($grade->num_rows) ? $grade->fetch_assoc()['grade'] : '';
                        ?>
                    </p>
                    <p style="margin-top: -29.55rem;left: 11rem;width:441px"><?=$enroll_no?></p>
                    <p style="margin-top: -26.2rem;left: 1rem;width: 760px;"><?=$course_name?></p>
                    <p style="top: -26rem;left: 44rem;"><?=$serial?></p>
                    
                    
                    <!--<img src="https://chart.googleapis.com/chart?cht=qr&chl=https://psdm.softguru.co.in/get_certificate.php&chs=160x160&chld=L|0" style="height: 6.9rem;width: 7rem;top: -27.3rem;left: 1.2rem;" class="qr-code img-thumbnail img-responsive" />                 -->
                  <?php
                        $qrData = urlencode("Enrollment No: " . $enroll_no ."\nName: " . $name . "\nFather's Name: " . $father . "\nMother's Name: " . $mother . "\nDate of Birth: " . $dob);
                        
                        $qrCodeURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' . $qrData . '&chs=160x160&chld=L|0';
                        
                        echo '<img src="' . $qrCodeURL . '" style="height: 4.53rem;width: 4.53rem;top: -11.9rem;left: 22.55rem;" class="qr-code img-thumbnail img-responsive" />';
                    ?>
          </div>
      </div>
      </page>
      




   <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
