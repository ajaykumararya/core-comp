<?php
    include 'includes/header.php';
?>


<?php
// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $con->query("DELETE FROM `team` WHERE `id` = $id");
    echo '<script>alert("Success");location.href="our_team.php"</script>';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['image']['name'])) {
        $image = photo_upload('image', 'team');
        if ($image['status']) {
            $name = $_POST['name'];
            $job = $_POST['job'];

            $con->query("INSERT INTO `team` (`id`, `name`, `job`, `image`, `qualification`, `experience`,`facebook`,`twitter`,`instagram`) VALUES (NULL, '$name', '$job', '".$image['file_name']."', '".$_POST['qualification']."', '".$_POST['experience']."','".$_POST['facebook']."','".$_POST['twitter']."','".$_POST['instagram']."')");


            echo '<script>alert("Success");location.href="our_team.php"</script>';
        } else {
            echo '<script>alert("Error in image uploading...");location.href="our_team.php"</script>';
        }
    }
}
?>
  <form method="POST" enctype="multipart/form-data">
<div class="box box-success">
    <div class="box-header"><h4>Our team Member</h4></div>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Enter Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-4">
                <label>Enter Job</label>
                <input type="text" class="form-control" name="job" placeholder="Enter Job" required>
            </div>
            <div class="form-group col-md-4">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>Qualification</label>
                <input class="form-control" name="qualification" placeholder="Enter Qualification" required>
            </div>
            <div class="form-group col-md-4">
                <label>Experience</label>
                <input class="form-control" name="experience" placeholder="Enter Experience" required>
            </div>
            <div class="form-group col-md-4">
                <label>Facebook</label>
                <input class="form-control" name="facebook" placeholder="Enter Facebook Link" required>
            </div>
            <div class="form-group col-md-4">
                <label>Twitter</label>
                <input class="form-control" name="twitter" placeholder="Enter Twitter Link" required>
            </div>
            <div class="form-group col-md-4">
                <label>Instagram</label>
                <input class="form-control" name="instagram" placeholder="Enter Instagram link" required>
            </div>
            <div class="form-group col-md-4">
                
            </div>
       </div>
       <div class="box-footer">
           <button type="submit" class="btn btn-success" name="submit">Submit</button>
       </div>
    </div>
</div>
 </form>
<?php
// Handle delete request


// Fetch all placed students
$query = "SELECT * FROM team";
$result = $con->query($query);
?>

<div class="box box-success">
    <div class="box-header">
        <h4>Our Team Members</h4>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display each placed student
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['job'] . '</td>';
                    echo '<td><img src="../uploads/team/' . $row['image'] . '" alt="Placement student" width="50"></td>';
                    echo '<td><a href="?action=delete&id=' . $row['id'] . '" class="btn btn-danger">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<?php
    include 'includes/footer.php';
?>