
<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');
?>
 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Chi Tiết Sản Phấm</li>
                </ul>
            </div>
        </div>
      
        <div class="product-detail" style = "width: 103%;">
            <div class="container-fluid">
                 <div class="row">   
          <?php
          include('silder-bar.php');
          ?>
                      <div class="col-lg-8 " style = "left: 124px;">
                      <?php
$id = $_GET['id'];
$sqlDetail  = "SELECT * FROM products Where pro_id = '$id' ";
$run = mysqli_query($conn,$sqlDetail);
if(mysqli_num_rows($run) > 0 ){
    while($row = mysqli_fetch_assoc($run) ){
?>
                        <div class="product-detail-top">
                            <div class="row align-items-center">                             
                              <div class="col-md-5">
                                        <img src='<?php echo $row['image']?>' style= "width:300px;" id = "anh" alt="Product Image">
                                   </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2 id = "namepro"><?php echo $row['name'] ?></h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            
                                            <p id = "price"><?php echo number_format($row['price'],0,"",".") ?> VNĐ</p>
                                        </div>
                                        <div class="quantity">
                                          <span style = "font-size:20px">Số Lượng :</span>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1"id ="num" name ="num">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="action">
                                        <button class = "btn btn-button" onclick ="addCart(<?php echo $row['pro_id']?>)"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</button>
           <!-- Modal -->
        <!-- <div class="modal fade" id="showCart" >
            <div class="modal-dialog" >
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Thông Tin Mua Hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                         <div class="row">
                             <div class="col-md-6">
                             <img src="" id = "xxx"   alt="..." class="img-thumbnail"
                             >
                             </div>
                             <div class="col-md-6 ">
                                 <p>Tên: <span id = "nameCart"></span></p>
                                 <p>Giá: <span id ="priceCart"></span> </p>
                                 <p>Số Lương: <span id = "numCart"></span></p>
                             </div>
                         </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="chitietsanpham.php?view=detail&id=<?php echo $row['pro_id']?>"><button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button></a>  
                       <a href="cart.php"><button type="button" class="btnbuy btn-primary">Mua </button></a> 
                    </div>
                </div>
            </div>
        </div> -->
                                        </div>                                  
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Thông Tin Sản Phẩm</a>
                                    </li>
                                </ul>

                                         <div class="tab-content">
                                                    <div id="description" class="container tab-pane active">
                                                  
                                                 <p>
                                                 <?php echo $row['description'] ?>
                                                 </p>
                                      </div>      
                                  </div>       
                             </div>  
                                                 
                         </div>
                         <?php
     }
    }
    include('sanphamlienquan.php');
    ?>
</div>
             </div>       
      </div>      
                                             
</div>         
                         
                         


       
<?php
include('includes/brand.php');
include('includes/scriptsshopping.php');
include('includes/footershopping.php');

?>




