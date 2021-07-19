<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php'); 

$sqlselectCat ="SELECT id,cat_name FROM category";
$resultCat = mysqli_query($conn,$sqlselectCat);
if(isset($_POST['editid'])){
$id =$_POST['editid'];
$sql = "SELECT * FROM products WHERE pro_id = '$id'";

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
                <form action="code.php" method = "POST" id ="basicform"  enctype="multipart/form-data">
                <input type="hidden" name = "editid" value = "<?php echo $row['pro_id']?>">        
                <div class="form-group">
                          <label for="name">Tên Sản Phẩm</label>
                          <input type="text" name="name" id="name" value ="<?php echo $row['name']?>"class="form-control" >
                        </div>                        
                    <div class="form-group">
                        <label for="cat_id">Loại Sản Phẩm</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                          <option value ="">--Chọn Loại Sản Phẩm--</option>
                          <?php
                    while($roww = mysqli_fetch_assoc($resultCat)){
                        ?>
                    <option value = "<?php echo $roww['id'] ?>"><?php echo $roww['cat_name'] ?></option>
                    <?php
                    }
                    ?>
                        </select>
                      </div>
                          
                        <div class="form-group">
                          <label for="price">Giá </label>
                          <input type="text" name="price" id="price" class="form-control"  value ="<?php echo $row['price']?>">
                        </div>      
                        <div class="form-group">
                          <label for="fileToUpload_edit">Ảnh</label>
                          <input type="file" name="fileToUpload_edit" id="fileToUpload_edit">
                          <img src='<?php echo $row['image']?>' alt="" width = "60">
                        </div>           
                           
                        <div class="form-group">
              <label for="description">Mô Tả</label>
              <input type="text" name="description" value ="<?php echo $row['description']?>" id="">
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
                                    <button type="submit" class="btn btn-primary" name ="newedit">Sửa</button>
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
