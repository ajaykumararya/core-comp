<?
require_once 'includes/header.php';
// if($_GET['action']=='del'){
//     $id = $_GET['id'];
//     $con->query("DELETE FROM `students` WHERE `id` = '$id' AND AND is_deleted = 0 ");
//     echo '<script>alert("Deleted Successfully");window.location.href="all_students_list.php"</script>';
// }
if ($_GET['action'] == 'del') {
    $id = $_GET['id'];
    
    $con->query("UPDATE students SET is_deleted = 1 WHERE id = '$id'");
    echo '<script>alert("Student is deleted.");window.location.href="all_students_list.php"</script>';
}
$get = $con->query("SELECT * FROM students where is_deleted = 0");
if($_GET['action'] == 'changeStatus'){
    $val = $_GET['val']?0:1;
    $id = $_GET['id'];
    $con->query("UPDATE `students` SET `status`= '$val' WHERE id = '$id'");
    echo '<script>alert("Changed Successfully.");window.location.href="all_students_list.php"</script>';
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<div class="box box-primary">
	<div class="box-header"><h3>All Students</h3></div>
	<div class="box-body">
		<button onclick="tableToCSV('centerTable', 'CenterData')" class="btn btn-success">Export to CSV</button>

		<table id="centerTable" class="table table-bordered data-table">
					<thead>
						<tr>
						    <th>Date</th>
							<th>Photo</th>
							<!--<th>Sign</th>-->
							<th>Enrollment No.</th>
							<th>Name</th>
							<th>Father's Name</th>
							<th>Center</th>
							<th>Course</th>
							<th>Status</th>
							<!--<th>Transection</th>-->
							<th>Mobile</th>
							<th>Details</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?
							
							while($g = $get->fetch_assoc())
							{
								$c = $con->query("SELECT * FROM courses where id = '".$g['course_id']."'")->fetch_assoc();
								$ce = $con->query("SELECT * FROM centers where id = '".$g['center_id']."'")->fetch_assoc();
								$statusBtn = $g['status'] ? 'success' : 'danger';
					            $statusIcon = $g['status'] ? 'on' : 'off';
								echo '
										<tr>
										<td>'.date('d-M-y',strtotime($g['timestamp'])).'</td>
											<td><img style="width:80px;height:100px;" src="../uploads/students/'.$g['photo'].'"></td>
									
											<td>'.$g['enrollment_no'].'</td>
											<td>'.$g['name'].'</td>
											<td>'.$g['father'].'</td>
											<td>'.$ce['institute_name'].'</td>
											<td>'.$c['course_name'].'</td>
											<td>
									    <a href="?action=changeStatus&id='.$g['id'].'&val='.$g['status'].'" class="btn btn-sm btn-'.$statusBtn.'"><i class="fa fa-toggle-'.$statusIcon.'"></i></a>
									</td>
									<td>'.$g['mobile'].'</td>
											<!-- <td><a href="transection_student.php?id='.$g['transection_id'].'" class="btn btn-warning"><i class="fa fa-eye"></i></a></td> --!>
											<td><a href="edit_student.php?id='.$g['id'].'" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
											<td><a href="?action=del&id='.$g['id'].'" class="btn btn-danger" onclick="return confirm(\'Are You Confirm to delete This student\')"><i class="fa fa-trash"></i></a></td>
											
										</tr>
								';
							}
						?>
					</tbody>
				</table>
	</div>
</div>
<div class="box box-primary">
	<div class="box-header"><h3>For Recycle Students</h3></div>
	<div class="box-body">
		
		<table id="centerTable" class="table table-bordered data-table">
					<thead>
						<tr>
						    <th>Date</th>
							<th>Photo</th>
							<th>Enrollment No.</th>
							<th>Name</th>
							<th>Father's Name</th>
							<th>Center</th>
							<th>Course</th>
							<th>Status</th>
							<!--<th>Transection</th>-->
							<th>Details</th>
							<th>Recycle</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?  if ($_GET['action'] == 'recycle') {
                            $id = $_GET['id'];
                            
                            $con->query("UPDATE students SET is_deleted = 0 WHERE id = '$id'");
                            echo '<script>alert("Student is Recover.");window.location.href="all_students_list.php"</script>';
						    
						}
                            if ($_GET['action'] == 'delete') {
                            $id = $_GET['id'];
                           
                            $con->query("DELETE FROM `students` WHERE `id` = '$id'");
                            echo '<script>alert("Student is deleted.");window.location.href="all_students_list.php"</script>';
                        }
							$get = $con->query("SELECT * FROM students where is_deleted = 1");
							while($g = $get->fetch_assoc())
							{
								$c = $con->query("SELECT * FROM courses where id = '".$g['course_id']."'")->fetch_assoc();
								$ce = $con->query("SELECT * FROM centers where id = '".$g['center_id']."'")->fetch_assoc();
								$statusBtn = $g['status'] ? 'success' : 'danger';
					            $statusIcon = $g['status'] ? 'on' : 'off';
								echo '
										<tr>
										<td>'.date('d-M-y',strtotime($g['timestamp'])).'</td>
											<td><img style="width:80px;height:100px;" src="../uploads/students/'.$g['photo'].'"></td>
											<td>'.$g['enrollment_no'].'</td>
											<td>'.$g['name'].'</td>
											<td>'.$g['father'].'</td>
											<td>'.$ce['institute_name'].'</td>
											<td>'.$c['course_name'].'</td>
											<td>
									    <a href="?action=changeStatus&id='.$g['id'].'&val='.$g['status'].'" class="btn btn-sm btn-'.$statusBtn.'"><i class="fa fa-toggle-'.$statusIcon.'"></i></a>
									</td>
											<!-- <td><a href="transection_student.php?id='.$g['transection_id'].'" class="btn btn-warning"><i class="fa fa-eye"></i></a></td> --!>
											<td><a href="edit_student.php?id='.$g['id'].'" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
											<td><a href="?action=recycle&id='.$g['id'].'" class="btn btn-warning" onclick="return confirm(\'Are You Confirm to Recover This student\')"><i class="fa fa-recycle"></i></a></td>
											<td><a href="?action=delete&id='.$g['id'].'" class="btn btn-danger" onclick="return confirm(\'Are You Confirm parmanent Delete This student\')"><i class="fa fa-trash"></i></a></td>
											
										</tr>
								';
							}
						?>
					</tbody>
				</table>
	</div>
</div>
<script>
var table = $('#centerTable').DataTable();
var table = $('.data-table').DataTable();

    $(document).ready(function() {
        // Define the table variable
        var table = $('#centerTable').DataTable();

        // Add an event listener to the search input
        $('#table-search').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<?
include 'includes/footer.php';
?>
<script>
function tableToCSV(tableID, filename = ''){
    var csv = [];
    var rows = document.querySelectorAll('#' + tableID + ' tr');

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(','));
    }

    // Download CSV file
    downloadCSV(csv.join('\n'), filename);
}

function downloadCSV(csv, filename) {
    var csvFile;

    var downloadLink = document.createElement('a');

    // Create a Blob with the data
    csvFile = new Blob([csv], { type: 'text/csv' });

    // Create a link to download the file
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.download = filename + '.csv';

    // Append the link to the body
    document.body.appendChild(downloadLink);

    // Trigger the click event to download the CSV file
    downloadLink.click();
}
</script>