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
            <th>ID </th>
            <th>Tên Sản Phẩm </th>
            <th>Loại Sản Phẩm</th>
            <th>Giá</th>
            <th>Ảnh </th>
            <th>Mô Tả</th>
            <th>Trạng Thái</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
   <?php
        $sql = "SELECT products.pro_id, name, cat_name, price, image, description, 'status' FROM products,category WHERE category.id = products.cat_id ";
        $run = mysqli_query($conn,$sql);
        if (mysqli_num_rows($run) > 0) { 
            $count = 0;
            // output data of each row
            while($row = mysqli_fetch_assoc($run)) {
?>
     <tr>
            <td><?php echo ++$count;?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['cat_name']?></td>
            <td><?php echo $row['price']?></td>       
            <td><img src='<?php echo $row['image']?>' alt="" width = "60"></td>
            <td><?php echo $row['description']?></td>
            <td> <?php echo $row['status']?"hiển thị":"ẩn"?></td>
            <td>
            
                <form action="editproducts.php" method="post">
                    <input type="hidden" name="editid" value="<?php echo $row['pro_id']?>">
                    <button  type="submit" name="editbtn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteid" value="<?php echo $row['pro_id']?>">
                  <button type="submit" name="deletebtn" class="btn btn-danger"> DELETE</button>
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