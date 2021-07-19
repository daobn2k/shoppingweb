<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');

?>
<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> STT </th>
            <th> Tên Sản Phẩm </th>
            <th>Trạng Thái </th>
            <th>Sửa</th>
            <th>Xóa </th>
            <th>Thêm Danh Mục</th>
          </tr>
        </thead>
        <tbody>
   <?php
        $sql = "SELECT * FROM category";
        $run = mysqli_query($conn,$sql);
        if (mysqli_num_rows($run) > 0) { 
            $count = 0;
            // output data of each row
            while($row = mysqli_fetch_assoc($run)) {
               
?>
     <tr>
            <td><?php echo ++$count;?></td>
            <td><?php echo $row['cat_name']?></td>
            <td> <?php echo $row['status']?"hiển thị":"ẩn"?></td>
            <td>
                <form action="edit.php" method="post">
                    <input type="hidden" name="editid" value="<?php echo $row['id']?>">
                    <button  type="submit" name="editbtn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
            <td><a href="addcategory.php"><button class = "btn btn-success">Thêm Danh Mục</button></a></td>
          </tr>
          <?php  }
          } else {
            echo "0 results";
          }
          
          mysqli_close($conn);
          ?>
        </tbody>
      </table>

   
    </div>
  </div>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>