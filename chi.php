<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');

$newSql = "SELECT * FROM products ";

$list = Result($newSql);

$totalBill = 0;

foreach ($list as $key => $value) {
  $totalBill += $value['price'] * $value['quantity'];
}
?>

<!-- SHOW INFO USER -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow ">
  <div class="card-header ">
    <h6 class="m-0 font-weight-bold text-primary" style="display: flex;
    justify-content: space-between;
    align-items: center;">     Bảng Chi 
    </h6>
  <div style="display:flex;justify-content: center;align-items:center;">

    <form method="POST" class="input-group mb-3" style="width:50%;height: 42px;">
                            <input style='height: 42px; border-radius:4px 0 0 4px;' type="search" name="search" class="form-control" placeholder="Tìm Kiếm ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary" type="submit" id="button-addon2"
                            style="
                            height: 42px; 
                            display: flex;
                            justify-content:center;
                            align-items:center;
                            border-radius:0;
                            border-radius:0 4px 4px 0;
                            position:absolute !important;
                            right:0;
                            z-index: 1;
                            "
                            ><i class="fas fa-search" style="margin-right:0"></i></button>
   </form>
  </div> 
  <p>Tổng Thu: <?php echo $totalBill?> VNĐ</p>
  </div>

<div class="card-body" style="padding:0">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Tên Sản Phẩm Nhập </th>
            <th>Giá Tiền </th>
            <th>Số Lượng  </th>
            <th>Tổng Tiền </th>
          </tr>
        </thead>
        <tbody>
<?php
        if(!empty($_POST["search"])){
                                    $search_value=$_POST["search"];
                                    if( $search_value !== '') {

                                                $sql="select * from products where name like '%$search_value%'";

                                                $list = Result($sql);

                                                $i=0;
                                                     foreach( $list as $key => $row){
                                                        $i++;
                                                $total = $row['price'] * $row['quantity'];
                                                ?>
                                                <tr><img src="" alt="">
            <td><?php echo $i;?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $total?></td>
          </tr>
          <?php 
                                                      } }
                                             
                               else{
                                 return null;
                               }
   ?>

   <?php
       }else{
        $sql = 'SELECT * FROM user ';
        $customerList = Result($sql);
        $table_order= "order";
        $table_order_detail="order_detail";
        $table_product="products";
      
      
        $i = 0;
        foreach( $list as $key => $row){
          $i++;
          $total = $row['price'] * $row['quantity'];

?>
     <tr><img src="" alt="">
            <td><?php echo $i;?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['price']?></td>
            <td><?php echo $row['quantity']?></td>
            <td><?php echo $total?></td>
          </tr>
          <?php
     }
            }
          ?>
        </tbody>
      </table>

   
    </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>