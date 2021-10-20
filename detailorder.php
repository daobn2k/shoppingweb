<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');
$price = 0;
$totalBill = 0;
?>
<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
   <?php
        $id = intval($_GET['editid']);
        $sql = "SELECT * FROM order_detail WHERE oder_id = '$id'";
        $run = mysqli_query($conn,$sql);
        if (mysqli_num_rows($run)){ 
            $count = 0;
            while($row = mysqli_fetch_assoc($run)) {
?>
     <tr>
            <td><?php echo $row['oder_id']?></td>
            <?php 
              $idProduct = $row['product_id'];
              $sqlProduct = "SELECT * FROM products WHERE pro_id = '$idProduct'";
              $query = mysqli_query($conn,$sqlProduct);
              if (mysqli_num_rows($query)){
                while($rowProduct = mysqli_fetch_assoc($query)) {
             ?>
            <td><?php echo $rowProduct['name']?></td>
            <td><img src="<?php echo $rowProduct['image']?>" alt="<?php echo $rowProduct['name']?>"></td>
            <?php 
                $price = $rowProduct['price'];
                }
              }
             ?>
            <td><?php echo $row['quantity']?></td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteid" value="<?php echo $row['oder_detail']?>">
                  <button type="submit" name="deletebtn" class="btn btn-danger"> Xóa</button>
                </form>
            </td>
          </tr>
          <?php
            $totalBill = $price * $row['quantity'];
           }
          } else {
            echo "0 results";
          }
          
          mysqli_close($conn);
          ?>
        </tbody>
      </table>
   <div>
    Tổng tiền: 
     <?php echo $totalBill; ?>
     đ
   </div>
    </div>
  </div>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>