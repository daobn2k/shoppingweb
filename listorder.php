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
            <th>ID</th>
            <th>User ID</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>SDT</th>
            <th>Ngày đặt</th>
            <th>Trạng Thái</th>
            <th>Chi tiết đơn hàng</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
   <?php
        $sql = "SELECT * FROM `order`";
        $run = mysqli_query($conn,$sql);
        if (mysqli_num_rows($run)){ 
            $count = 0;
            while($row = mysqli_fetch_assoc($run)) {
?>
     <tr>
            <td><?php echo ++$count;?></td>
            <td><?php echo $row['user_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['phone']?></td>
            <td><?php echo $row['created']?></td>
            <td> <?php echo $row['status']?"hiển thị":"ẩn"?></td>
            <td>
            
                <form action="detailorder.php" method="get">
                    <input type="hidden" name="editid" value="<?php echo $row['id']?>">
                    <button  type="submit" class="btn btn-success" style="margin-left: 25px;"> Chi tiết</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteid" value="<?php echo $row['id']?>">
                  <button type="submit" name="deletebtn" class="btn btn-danger"> Xóa</button>
                </form>
            </td>
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