<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php'); 
$id =$_POST['editid'];
$sql = "SELECT * FROM category WHERE id = '$id'";

$run = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($run);


foreach($run as $row ){
?>

<div class="container-fluid dashboard-content">

<div class="row">
    <div class="col-x1-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h1>Sửa Danh Mục</h1>
                <div class="card-body">
                    <form action="code.php" method = "POST" id ="basicform">
                        <input type="hidden" name = "editid" value = "<?php echo $row['id']?>">
                        <div class="form-group">
                          <label for="catname">Tên Danh Mục</label>
                          <input type="text" name="catname_edit" id="catname" class="form-control" value ="<?php echo $row['cat_name']?>">
                        </div>      
                        <div class="row">
                            <div class="col-sm-6 pb2 pb-sm-4 pb-lg-0 pr-0">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status-edit" id="" value="<?php echo $row['status']?>" >
                                Trạng Thái
                                  </label>
                                </div>
                                <div class="col-sm-6 pl-0">
                                    <button type="submit" class="btn btn-primary" name ="editnew">Sửa</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>