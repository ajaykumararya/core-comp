<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
            font-family: emoji;
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
        p{
            font-weight:bold;
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
        
    </style>
    <style>
    @page {
        size: A4;
        margin: 0;
    }
    body {
        margin: 20mm;
    }
</style>
  </head>
        <?
          $logo = $con->query("SELECT * FROM logo_setting where id = 1")->fetch_assoc();
      ?>
      <style>
          .address{
              width: 17rem;
                margin-top: -14.2rem;
                left: 36em;
                font-size: 11px;
                word-wrap: break-word;
          }
          .address::first-line{
              margin-left:0;
          }
      </style>
  <body onload="window.print();" style="font-size: small;margin: 0mm;font-family: math;">
  <!--<body>-->
            <page size="A5" id="printableArea" layout="landscape">
      <div class="content-wrapper" >
          <img src="<?=$bg?>" >
          <div class="text-wrapper">
                  <!--<img src="<?=$img?>" style="height: 6.4rem;width: 4.8rem;top: -18rem;left: 36.8rem;border-radius: 5px ">-->
                  
                    <p style="top: -14.8rem;left: 13rem;"><?=$name?></p>
                    <p style="top: -13.6rem;left: 13rem;"><?=$center_add?></p>
                  
                    <p style="top: -12.55rem;left: 13rem;"><?=$center_number?></p>
                    <p style="top: -11.5rem;left: 13rem;;"><?=$isu_date?></p>
                    <p style="top: -16.3rem;left: 15.1rem;width:320px"><?=$center_name?></p>
                    <p style="top: -10.4rem;left: 13rem;"><?php
                    if(isset($a['valid_upto']))
                        echo date('d-m-Y',strtotime($a['valid_upto']));
                    ?></p>
                    <!-- <p style="top: -12.2rem;left: 13.1rem;">SIHS (An ISO 9001 : 2015 Certified Institute)</p>-->
                    <!-- <p style="top: -10.1rem;left: 13.1rem;">1 year</p>-->
                    
                 <?php
                        $qrData = urlencode("Enrollment No: " . $enroll_no ."\nName: " . $name . "\nFather's Name: " . $father . "\nMother's Name: " . $mother . "\nDate of Birth: " . $dob);
                        
                        $qrCodeURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' . $qrData . '&chs=160x160&chld=L|0';
                        
                        echo '<img src="' . $qrCodeURL . '" style="height: 3.7rem;width: 3.4rem;top: -8.3rem;left: 23.1rem;border: 2px solid #906d45;" class="qr-code img-thumbnail img-responsive" />';
                    ?>
                    
    <!--               <img src="<?php echo $sign; ?>" style="top: -6.5rem;-->
    <!--left: 3rem;-->
    <!--max-width: 24%;-->
    <!--max-height: 2rem;width:auto:height:auto;" alt="Sign not found">-->
                   
                 
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
