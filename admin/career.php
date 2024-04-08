<?php require 'includes/header.php'; ?>

<?php
// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $con->query("DELETE FROM `career` WHERE `id` = $id");
    echo '<script>alert("Success");location.href="career.php"</script>';
}


?>

<?php
// Handle delete request


// Fetch all placed students
$query = "SELECT * FROM career";
$result = $con->query($query);
?>

<div class="box box-success">
    <div class="box-header">
        <h4>Career Form Data</h4>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                <tr>
                    <th>fName</th>
                    <th>lname</th>
                    <th>Qualification</th>
                    <th>email</th>
                    <th>contact</th>
                    <th>Experience</th>
                    <th>Dob</th>
                    <th>psalary</th>
                    <th>esalary</th>
                    <th>address</th>
                    <th>job</th>
                    <th>Resume</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display each placed student
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                     <td>' . $row['fname'] . ' </td>
                     <td>'.$row['lname'].'</td>
                     <td>'.$row['qualification'].'</td>
                     <td>'.$row['email'].'</td>
                     <td>'.$row['contact'].'</td>
                     <td>'.$row['exeperience'].'</td>
                      <td>'.$row['dob'].'</td>
                       <td>'.$row['psalary'].'</td>
                        <td>'.$row['esalary'].'</td>
                         <td>'.$row['address'].'</td>
                     <td>' . $row['job'] . '</td>
                     <td>
                       <a href="download_resume.php?file='.$row['file'].'" target="_blank" class="btn btn-success"><i class="fa fa-download"></i><a/>
                     </td>
                     <td><a href="?action=delete&id=' . $row['id'] . '" class="btn btn-danger">Delete</a></td>
                     </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<?php require 'includes/footer.php'; ?>
