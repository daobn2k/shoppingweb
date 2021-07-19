<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php'); 

$sqlselectCat ="SELECT * FROM category";
$resultCat = mysqli_query($conn,$sqlselectCat);
?>

<div class="container-fluid dashboard-content">

<div class="row">
    <div class="col-x1-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h1>Thêm Mới Sản Phẩm</h1>
                <div class="card-body">
                    <form action="code.php" method = "POST" id ="basicform"  enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">Tên Sản Phẩm</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>                        
                    <div class="form-group">
                        <label for="cat_id">Loại Sản Phẩm</label>
                        <select class="form-control" name="cat_id" id="cat_id">
                          <option value ="">--Chọn Loại Sản Phẩm--</option>
                     <?php
                    while($row = mysqli_fetch_assoc($resultCat)){
                        ?>
                    <option value = "<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                    <?php
                    }
                    ?>
                        </select>
                      </div>
                          
                        <div class="form-group">
                          <label for="price">Giá </label>
                          <input type="text" name="price" id="price" class="form-control" placeholder="Nhập Giá Tiền">
                        </div>      
                        <div class="form-group">
                          <label for="fileToUpload">Ảnh</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>               
                        <div class="form-group">
              <label for="description">Mô Tả</label>
              <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
                                    <button type="submit" class="btn btn-primary" name ="addNew">Thêm Mới</button>
                                </div>
                            </div>
                        </div>    
                    </form>
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