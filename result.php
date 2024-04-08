

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Marksheet | [<?= $enroll_no ?>]</title>
        <link href='https://fonts.googleapis.com/css?family=Reem Kufi' rel='stylesheet'>
<style>
    body {
        font-family: 'Reem Kufi' !important;
 
            background: rgb(204, 204, 204);
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
            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }
    </style>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            width: 100%;
            height: auto;
            /*overflow:hidden;*/
            /*background-color:#c4a1a2;*/
            font-family: emoji;
        }

        .content-wrapper {
            text-align: center;
        }

        .content-wrapper img {
            width: 100%;
        }

        .text-wrapper {
            width: 96%;
            position: relative;
            margin-top: -119%;
        }

        .text-wraper h2 {
            text-align: center;
            color: #ffffff;
            font-size: 10vw;
        }

        h4 {
            text-align: left;
        }

        #myPhoto {
                    width: 121px;
    height: 156px;
    margin-top: 28.9%;
    margin-right: -78.7%;
        }

        .content {
            margin-top: -36%;
            margin-left: 21%;
            text-align: left;
        }

        #sl {
            text-align: right;
            margin-right: 3%;
        }

        .box {
            margin-top: -1%;
        }

        tr td {
            /*text-align:center;*/
        }

        .content h5 {
            margin-top: -8px;
        }

        #marsk tr td {
            font-size: 1.4rem;
            font-weight: bold;
        }

        #ttl tr td {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .content * {
            color: black;
        }

        .courseName {
            font-size: 11px;
        }

         th,
        td {
            padding: 0px;
            padding-left:3px;
            border : 1px solid black;
            text-align: center;
            font-weight: bold;
            color:#5f4934!important;
        }
        .mytext{
            color:black!important;
        }
        table{
            border-collapse: collapse;
        }
        p{
            position:absolute;
            font-weight: bold;
        }
        
    </style>
</head>
<!--<body onload="window.print();">-->
<body style="font-family:math;font-size:small;">
    <page size="A4" id="printableArea">
        <div class="content-wrapper">
            <img src="<?= $bg ?>">
            <div class="text-wrapper">
                <!--<p style="margin-left: 42rem;text-align: left;margin-top: 6px;font-weight: bold;">< ?= $result_id ?></p>-->
                <div class="box">
                    <div class="img" style=" width: 100%;height: 307px;">
                        <img src="<?= $photo ?>" id="myPhoto">
                    </div>
                    <div class="content">
                        <!--<p style="margin-left: 8rem;margin-top: 11.5rem;"><?=$serial_no?></p>-->
                        <p style="margin-left: 8rem;margin-top: 11.5rem;"><?=$enroll_no?></p>
                        <!--<p style="margin-left: 31rem;margin-top: 7.5rem;">< ?=$photo?></p>-->
                        <!--<p style="margin-left: 10rem;margin-top: 7.5rem;"><?= $roll_no ?></p>-->
                        <p style="margin-left: 8rem;margin-top: 13rem;"><?= $name ?></p>
                        <p style="margin-left: 8rem;margin-top: 14.5rem;"><?= $father ?></p>
                        <!--<p style="margin-left: 9rem;margin-top: 12.5rem;"><?= $mother ?></p>-->
                        <p style="margin-left: 7.9rem;margin-top: 16rem;"><?= $course_name ?></p>
                        <p style="margin-left: 8rem;margin-top: 19rem;"><?= $duration ?></p>
                        <!--<p style="margin-left: 6rem;margin-top: 9.6rem;"><?= $sex ?></p>-->
                        
                        <p style="margin-left: 15rem;margin-top: 41rem;"><?= $issue_date ?></p>
                        <p style="margin-left: 7.9rem;margin-top: 20.53rem;"><?= $dob?></p>
                        <p style="margin-left: 8rem;margin-top: 17.45rem;"><?= $center_name ?></p>
                        <p style="margin-left: 34.4rem;margin-top: 42.2rem;"><?= $grade ?></p>
                        <!--<p style="margin-left: 6rem;margin-top: 5.2rem;"><?=$session?></p>-->
                        
                        <?php
                        
                        $subjectMarks = []; // Create an array to store subject-wise marks
                        $totalObtainMarks = 0;
                        $totalMaxMarks = 0;
                        
                        $marks = $con->query("SELECT * FROM marks_table WHERE result_id = '".$marksheet_id."'");
                        // print_r($__R);
                        // echo "SELECT * FROM marks_table WHERE result_id = '".$__S['marksheet_id']."'";
                        if ($marks->num_rows > 0) {
                            // echo $marks->num_rows;
                            while ($m = $marks->fetch_assoc()) {
                                $sub = $con->query("SELECT * FROM subjects WHERE id = '".$m['subject_id']."'")->fetch_assoc();
                        
                                // Check if the subject already exists in the array
                                if (!isset($subjectMarks[$sub['subject_name']])) {
                                    $subjectMarks[$sub['subject_name']] = [
                                        'max_marks' => $sub['max_marks'],
                                        'min_marks' => $sub['min_marks'],
                                        'obtain_marks' => 0, // Initialize obtain marks for the subject
                                    ];
                                }
                        
                                // Add the marks obtained to the total for that subject
                                $subjectMarks[$sub['subject_name']]['obtain_marks'] += $m['marks'];
                        
                                // Update total obtain marks and total max marks
                                $totalObtainMarks += $m['marks'];
                                $totalMaxMarks += $sub['max_marks'];
                            }
                        
                            // Display the aggregated subject-wise marks
                            echo '<table class="table table-bordered" style="position: absolute;margin-top: 23rem;margin-left: -5.8rem;width: 41rem;border: 2px;font-size: larger;">
                                    <thead>
                                        <tr>
                                            <th>SR.No</th>
                                            <th>Subject Name</th>
                                            <th>Max Marks</th>
                                            <th>Min Marks</th>
                                            <th>Obtain Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            $i = 1;
                            foreach ($subjectMarks as $subject => $marks) {
                                echo '
                                    <tr>
                                        <th>'.$i++.'.</th>
                                        <th style="text-align:left">'.ucwords($subject).'</th>
                                        <th style="font-weight:500">'.$marks['max_marks'].'</th>
                                        <th style="font-weight:500">'.$marks['min_marks'].'</th>
                                        <th class="mytext"  style="font-weight:500">'.$marks['obtain_marks'].'</th>
                                    </tr>
                                ';
                            }
                        
                            // Display total marks and percentage
                            echo '
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>'.$totalMaxMarks.'</th>
                                        <th></th>
                                        <th class="mytext">'.$totalObtainMarks.'</th>
                                    </tr>
                                    
                                </tbody>
                            </table>';
                        }
                        
                        // Display the percentage outside the table
                        echo '<p style="
                            
                            
                            margin-top: 41rem;
                            margin-left: 33.5rem;
                        
                        
                        ">'.number_format($totalObtainMarks / $totalMaxMarks * 100,2).'%</p>';
                        ?>
								<!--< ?-->
								<!--	$marks = $con->query("SELECT * FROM marks_table where result_id = '".$__R['id']."'");-->
								<!--	$rows = $marks->num_rows+1;-->
								<!--	$i=1;-->
								<!--	$ttl=0;-->
								<!--	while($mm = $marks->fetch_assoc())-->
								<!--	{-->
								<!--		$sub = $con->query("SELECT * FROM subjects where id = '".$mm['subject_id']."'")->fetch_assoc();-->
								<!--		echo '-->
								<!--				<tr style="width:100% !important" class="mainRow">-->
								<!--					<th>'.ucwords($sub['subject_name']).'</th>-->
								<!--					<th>'.$sub['max_marks'].'</th>-->
								<!--					<td>'.$sub['min_marks'].'</td>-->
								<!--					<td>'.$mm['marks'].'</td>';-->
								<!--					if($i==1){-->
								<!--						echo '<td rowspan="'.$rows.'"><b>'.ucwords($__R['result']).'</b></td>-->
								<!--						<td rowspan="'.$rows.'"><b>'.ucwords($__R['grade']).'</b></td>';-->
													    
								<!--					}-->
								<!--				echo '</tr>-->
								<!--		';-->
								<!--		$ttl+=$mm['marks'];-->
								<!--		$i++;-->
								<!--	}-->
								<!--	echo '<tr><th>Total</th><td></td><td></td><td><b>'.$ttl.'</b></td></tr>';-->
								<!--?>-->
						
                        
                        <!--<table class="table table-bordered"-->
                        <!--    style="margin-left: -7.2rem;margin-top:4.5rem;width: 43.6rem;border-color: #735f5f;">-->
                        <!--    < ?php-->
                        <!--    $marks = $con->query("SELECT * FROM marks_table where result_id = '".$__R['id']."'");-->
                        <!--    $rows = $marks->num_rows + 1;-->
                        <!--    $i = 1;-->
                        <!--    $ttl = 0;-->
                        <!--    while ($mm = $marks->fetch_assoc()) {-->
                        <!--        $sub = $con->query("SELECT * FROM subjects where id = '".$mm['subject_id']."'")->fetch_assoc();-->
                        <!--         $ms = explode(',', $mm['marks']);-->
                        <!--        $ms = [$sub['max_marks'],$sub['min_marks']];-->
                        <!--        echo '-->
                        <!--            <tr style="width:100% !important" class="mainRow">-->
                        <!--                <th style="width: 45px;">' . $i . '</th>-->
                        <!--                <td style="width: 20.6rem;" class="courseName">' . ucwords($sub['subject_name']) . '</td>-->
                        <!--                <th style="width: 3.6rem;">60</th>-->
                        <!--                <td style="width: 3rem;">' . $ms[0] . '</td>-->
                        <!--                <th style="width: 3.5rem" >40</th>-->
                        <!--                <td style="width: 3rem;">' . $ms[1] . '</td>-->
                        <!--                <td style="width: 4rem;">' . ($ms[0] + $ms[1]) . '</td>-->
                        <!--                <td>' . (isset($ms[2]) ? $ms[2] : '') . '</td>-->
                        <!--            </tr>-->
                        <!--        ';-->
                        <!--        $ttl += $ms[0] + $ms[1];-->
                        <!--        $i++;-->
                        <!--    }-->
                        <!--    echo '<tr><th colspan="6">Total</th><td colspan="2"><b>' . $ttl . '</b></td></tr>';-->
                        <!--    ?>-->
                        <!--</table>-->
                        
                        
                    </div>
                    <?php
                        $qrData = urlencode("Enrollment No: " . $enroll_no ."\nName: " . $name . "\nFather's Name: " . $father . "\nMother's Name: " . $mother . "\nDate of Birth: " . $dob);
                        
                        $qrCodeURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' . $qrData . '&chs=160x160&chld=L|0';
                        
                        echo '<img src="' . $qrCodeURL . '" style="height: 4.9rem;width: 5rem;top: -8.3rem;left: 40.2rem;margin-top: 43rem;margin-left: 14.6rem;border: 2px solid #622423;border-radius:5px" class="qr-code img-thumbnail img-responsive" />';
                    ?>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>
