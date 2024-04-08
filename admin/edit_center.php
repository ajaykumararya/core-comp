<?php
require_once 'includes/header.php';

// if ($_GET['action'] == 'del') {
//     if (file_exists("../uploads/centers/" . $_GET['file']))
//         unlink("../uploads/centers/" . $_GET['file']);
//     $con->query("DELETE FROM centers where id = '" . $_GET['id'] . "'");
//     echo '<script>alert("Institute is deleted.");location.href="edit_center.php"</script>';
// }
if ($_GET['action'] == 'del') {
    if (file_exists("../uploads/centers/" . $_GET['file']))
        unlink("../uploads/centers/" . $_GET['file']);
    $con->query("DELETE FROM `centers` WHERE id = '".$_GET['id']."'");
    echo '<script>alert("Institute is deleted.");location.href="edit_center.php"</script>';
}
if ($_GET['btn'] == 'active') {
    $con->query("UPDATE `centers` SET `status` = '1' WHERE `centers`.`id` = '" . $_GET['id'] . "'");
    echo '<script>alert("Status is Active");location.href="edit_center.php"</script>';
}
if ($_GET['btn'] == 'deactive') {
    $con->query("UPDATE `centers` SET `status` = '0' WHERE `centers`.`id` = '" . $_GET['id'] . "'");
    echo '<script>alert("Status is Deactive");location.href="edit_center.php"</script>';
}

// Define date filters
$startDate = $_GET['start_date'];
$endDate = $_GET['end_date'];

// Build the SQL query for filtering by date range
$dateFilter = "";
if (!empty($startDate) && !empty($endDate)) {
    $dateFilter = "AND DATE(timestamp) BETWEEN '" . $startDate . "' AND '" . $endDate . "'";
}

// $is_deleted = "AND is_deleted = 0";
// Query centers with date filter
$query = "SELECT * FROM centers WHERE 1 " . $dateFilter;
// print_r($query);

$get = $con->query($query);
?>

<!-- Include jQuery and DataTables CSS/JS here -->

<div class="row">
    <div class="col-md-6">
        <form method="GET">
            <div class="box box-primary">
                <div class="box-header"><h3>Filter By date</h3></div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="start-date">Start Date:</label>
                        <input type="date" id="start-date" name="start_date" value="<?=$_GET['start_date']?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="end-date">End Date:</label>
                        <input type="date" id="end-date" name="end_date" value="<?=$_GET['end_date']?>" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-success">
    <div class="box-header"><h3>All Center</h3></div>
    <div class="box-body" style="overflow-x:scroll">
        <button onclick="tableToCSV('centerTable', 'CenterData')" class="btn btn-success">Export to CSV</button>

        <table id="centerTable" class="table table-bordered data-table table-responsive">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Institute ID</th>
                    <th>Institute Name</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>Distric</th>
                    <th>Head of institute</th>
                    <th>institute Owner</th>
                    <th>Mobile</th>
                    <th>Certificate</th>
                    <th>Action</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($g = $get->fetch_assoc()) {
                    $s = $con->query("SELECT * FROM states where id = '" . $g['state_id'] . "'")->fetch_assoc();
                    $c = $con->query("SELECT * FROM city where id = '" . $g['city_id'] . "'")->fetch_assoc();
                    echo '
                        <tr>
                            <td>' . date('d-M-y', strtotime($g['timestamp'])) . '</td>
                            <td>' . $g['center_number'] . '</td>
                            <td>' . $g['institute_name'] . '</td>
                            <td>' . $g['center_full_address'] . '</td>
                            <td>' . $s['state_name'] . '</td>
                            <td>' . $c['city_name'] . '</td>
                            <td>' . $g['name'] . '</td>
                            
                            <td><img style="width:80px;height:100px;" src="../uploads/centers/'.$g['image'].'"></td>
                            <td>'.$g['contact_number'].'</td>
                             <td><a href="get_center_certificate.php?view='.$g['center_number'].'" class="btn btn-sm btn-info" ><i class="fa fa-eye"></i></a></td>';
                    if ($g['status'] == 1)
                        echo '<td><a href="?btn=deactive&id=' . $g['id'] . '" class="btn btn-success btn-sm">Active</a></td>';
                    else
                        echo '<td><a href="?btn=active&id=' . $g['id'] . '" class="btn btn-danger btn-sm">Deactive</a></td>';
                    echo '<td>
                            <a href="wallet.php?center=' . $g['id'] . '" class="btn btn-warning btn-sm"><i class="fa fa-money"></i></a>
                            <a href="center_update.php?id=' . $g['id'] . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?action=del&id=' . $g['id'] . '" class="btn btn-danger btn-sm delete-button" onclick="return confirm(\'Are you sure you want to delete this item?\');" data-id="' . $g['id'] . '"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>';
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
       

        // Add an event listener to the search input
        $('#table-search').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
<!-- Include DataTables initialization code here -->
<?php
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
