<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');

?>



<!-- My Account Start -->
<div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bảng Thông Tin</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Lịch Sử Giao Dịch</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Chi Tiết Tài Khoản</a>
                           
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Bảng Thông Tin</h4>
                               
                                <table class="table table-bordered">
                                        <thead class="thead-dark">
                                        <tr>
                                              
                                                <th>Tổng Số Sản Phẩm Đã Mua</th>
                                                <th>Tổng Tiền </th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(isset($_SESSION['username'])&& isset($_SESSION['id'])){
                                            $iduserr = $_SESSION['id'];
                                            $sqlsee = "SELECT * FROM shopping_cart.order Where user_id ='$iduserr'";
                                           $runnn =  mysqli_query($conn,$sqlsee);
                                            if(mysqli_num_rows($runnn) > 0){
                                                while($rowgrand = mysqli_fetch_assoc($runnn)){
                                                  $oder_idd =  $rowgrand['id'];
                                                    if(isset($oder_idd)){
                                                        $sql = "SELECT * FROM shopping_cart.order_detail Where oder_id ='$oder_idd'";
                                                        $run =  mysqli_query($conn,$sql);

                                                         if(mysqli_num_rows($run) > 0){
                                                             $total = 0;
                                                             $grandnumber =0;
                                                             while($row = mysqli_fetch_assoc($run)){
                                                    $total += $row['price'] * $row['quantity'];
                                                    $grandnumber += $row['quantity'];
                                                }
                                            }
                                }
                                }
                            }
                        }
                                        ?>
                                        <tr>
                                      
                                        <td><?php echo number_format((isset($grandnumber)?$grandnumber:0),0,"",".")?></td>
                                        <td><?php  echo number_format((isset($total)?$total:0),0,"",".") ?></td>
                                        
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                    
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                            
                                <table class="table table-bordered">
                                        <thead class="thead-dark">
                              
                                        <tr>
                                                <th>STT</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Số Lượng</th>
                                                <th>Ngày</th>
                                                <th>Giá</th>
                                                <th>Trạng Thái</th>
                                                <th>Chi Tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                if(isset($_SESSION['username']) && isset($_SESSION['id'])){
                                    $iduser = $_SESSION['id'];
                                    $sql = "SELECT * FROM shopping_cart.order where user_id = '$iduser' ";
                                   $result = mysqli_query($conn,$sql);
                                       if( mysqli_num_rows($result) >0){     
                                           $stt = 0;
                                  while($row = mysqli_fetch_assoc($result)){                                  
                         $id = $row['id'];
                      
                         if(isset($id)){
                            $sqloder_detail = "SELECT * FROM shopping_cart.order_detail WHERE oder_id = '$id' ";
                            $resultoder_detail = mysqli_query($conn,$sqloder_detail);
                            
                                if( mysqli_num_rows ($resultoder_detail)>0){     
                                    
                           while($rowoder_detail = mysqli_fetch_assoc( $resultoder_detail)){
                            
                            $idproduct = $rowoder_detail['product_id'];


                            if(isset($idproduct)){
                                $sqlpro = "SELECT * FROM products where pro_id = '$idproduct' ";
                                $resulpro = mysqli_query($conn,$sqlpro);
                                    if( mysqli_num_rows($resulpro) >0){     
                                      
                               while($rowpro = mysqli_fetch_assoc($resulpro)){
                                  
                            ?>  
                                            <tr>
                                                <td><?php echo ++$stt;?></td>
                                                <td><?php echo $rowpro['name']?></td>
                                                <th><?php echo $rowoder_detail['quantity']?></th>
                                                <td><?php echo $row['created']?></td>
                                                <td><?php echo number_format($rowpro['price'],0,"",'.') ?></td>
                                                
                                                <td><?php echo $row['status']?></td>
                                                <td><button class="btn"><a href="chitietsanpham.php?id=<?php echo $idproduct?>">View</a></button></td>
                                            </tr>
                                           <?php 
                                 }
                             }
                        }
                    }
                }   
            }
        }
    }
}
                                ?>   
                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                             
                                
        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                            <form action="code.php" method = "POST">
                                <div class="row">
                                <h4>Chi Tiết Tài Khoản</h4>
                                    <input type="hidden" name = "update-id"value="<?php echo $iduser ?>">
                                    <div class="col-md-12">                                
                                        <label>Họ và Tên</label>
                                        <input class="form-control" name = "name" type="text" >
                                    </div>
                                    <div class="col-md-12">
                                        <label>E-mail</label>
                                        <input class="form-control" name = "email" type="email" >
                                    </div>
                                    <div class="col-md-12">
                                        <label>Địa Chỉ</label>
                                        <input class="form-control" name = "address" type="text">
                                    </div>
                                    <div class="col-md-12">
                                    
                                        <label>Số Điện Thoại</label>
                                        <input class="form-control" name = "phone" type="text" >
                                    </div>
                                  <div class="col-md-12">
                                      <input type="submit" class ="btn" name = "updatecheckout" value="Thay Đổi Thông Tin Nhận Hàng">
                                    </div>
                                </div>
                                </form>   
                            
                                <form action="code.php" method = "POST">
                                    <br>
                                    <br>
                                <h4>Thay Đổi Mật Khẩu</h4>
                                <input type="hidden" name = "update-id"value="<?php echo $iduser ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" name ="password" placeholder="Mật Khẩu Hiện Tại">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text"  name ="newpassword" placeholder="Mật Khẩu Mới">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name = "confirmpassword" placeholder=" Xác Nhận Mật Khẩu ">
                                    </div>
                                    <div class="col-md-12">
                                      <input type="submit" class ="btn" name = "changepass" value="Thay Đổi Mật Khẩu">
                                    </div>
                                </div>
                                </form>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
        <!-- My Account End -->
        





        <?php
include('includes/brand.php');
include('includes/scriptsshopping.php');
include('includes/footershopping.php');

?>