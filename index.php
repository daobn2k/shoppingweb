<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid" style="height:100%;">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
             include('includes/connection.php'); 
              $sql = "SELECT id FROM user ORDER BY id";
              $query_run = mysqli_query($conn,$sql); 
              $row = mysqli_num_rows($query_run);
              echo ' <h4> Total  : '.$row.'</h4>';
              ?>
              
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <?php 
              $newSql = "SELECT created,quantity,price FROM shopping_cart.order,order_detail  ORDER BY created";
              $list = Result($newSql);
              $totalBill = 0;

              foreach ($list as $key => $value) {
                $totalBill += $value['price'] * $value['quantity'];
              }
              ?>
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Money collected</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalBill?> VNĐ</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $sql = "select * from products ";
$List_data = Result($sql);

$totalBillSpend = 0;

foreach ($List_data as $key => $value) {
  $totalBillSpend += $value['price'] * $value['quantity'];
}?>     
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
Spending money</div>
              <div class="row no-gutters align-items-center">
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalBillSpend?> VNĐ</div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Profit / Loss</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalBillSpend - $totalBill?> VNĐ</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->



  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
