<? require 'includes/header.php'?>
<?
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!empty($_FILES['image']['name']))
    {
        $image = photo_upload('image','site_manager');
        if($image['status'])
        {
            $con->query("INSERT INTO `logos` (`id`, `timestamp`, `image`,`title`) VALUES (NULL, CURRENT_TIMESTAMP, '".$image['file_name']."','".$_POST['title']."')");
            echo '<script>alert("Success");location.href="logos.php"</script>';
        }
        else
        {
            echo '<script>alert("Error in image uploading...");location.href="logos.php"</script>';
        }
    }
}

if(isset($_GET['delete_id'])){
    $con->query("DELETE from logos WHERE id = '".$_GET['delete_id']."' ");
    echo '<script>alert("Certificate Deleted Successfully...");location.href="logos.php"</script>';
}
?>
<div class="box box-success">
    <div class="box-header"><h4>Our Certificates(Remove the (' ','.','-') from image name)</h4></div>
    <div class="box-body">
        <form class="form-inline" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success" >Submit</button>
            </div>
        </form>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header"><h4>List Certificates</h4></div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $list = $con->query("SELECT * FROM logos order by id ASC");
                    if($list->num_rows){
                        $i = 1;
                        while($row = $list->fetch_assoc()){
                            echo '<tr>
                            
                                    <td>'.$i++.'.</td>
                                    <td>'.$row['title'].'</td>
                                    <td><a href="'.BASE_URL.'uploads/site_manager/'.$row['image'].'" target="_blank">'.$row['image'].'</a></td>
                                    <td>
                                        <button class="btn btn-danger delete-item" data-item-id="'.$row['id'].'">Delete</button>
                                    </td>
                             </tr>';
                        }
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<? require 'includes/footer.php'?>
<script>
    $(document).on('click','.delete-item',function(){
        if(confirm('Are you sure, you want to delete this certificate')){
            var id = $(this).data('item-id');
            location.href = '<?=BASE_URL?>admin/logos.php?delete_id='+id;
        }
    })
</script>