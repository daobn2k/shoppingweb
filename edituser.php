<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php'); 


if(isset($_POST['edituserid'])){
$id =$_POST['edituserid'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$run = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($run);


foreach($run as $row ){
?>

<div class="container-fluid dashboard-content">

<div class="row">
    <div class="col-x1-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h1>Thêm Mới Danh Mục</h1>
                <div class="card-body">
                <form action="code.php" method = "POST" id ="basicform" enctype="multipart/form-data">
                <input type="hidden" name = "edituserid" value = "<?php echo $row['id']?>">        
                <div class="form-group">
                          <label for="username">Tên Người Dùng</label>
                          <input type="text" name="username" id="username" value ="<?php echo $row['username']?>"class="form-control" >
                        </div>                        
                        <div class="form-group">
                          <label for="email">Email </label>
                          <input type="email" name="email" id="email" class="form-control"  value ="<?php echo $row['email']?>">
                        </div>      
                        <div class="form-group">
                          <label for="password">PassWord</label>
                          <input type="password" class = "form-control"name="password" id="password" value ="<?php echo $row['password']?>">
                        </div>           
                        <div class="form-group">
                          <label for="password">Confirm PassWord</label>
                          <input type="password" name="password" id="password" class="form-control"  value ="<?php echo $row['password']?>">
                        </div>     
                        <div class="form-group">
                          <label for="fileToUpload_edit">Ảnh</label>
                          <input type="file" name="fileToUpload_edit" id="fileToUpload_edit" value="<?php echo $row['anh']?>">
                          <img src="<?php echo $row['anh']?>" alt="" width=300px>
            </div>  
                        <div class="row">
                            <div class="col-sm-6 pb2 pb-sm-4 pb-lg-0 pr-0">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status" id="" value="1" checked>
                                Trạng Thái
                                  </label>
                                </div>

                                <div class="col-sm-6 pl-0">
                                    <button type="submit" class="btn btn-primary" name ="newuseredit">Sửa</button>
                                </div>
                            </div>
                        </div>    
                    </form>
                    <?php
                }
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
