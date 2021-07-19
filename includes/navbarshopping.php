<body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
<div class="row">

                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="shopping.php" class="nav-item nav-link active">Trang Chủ</a>
                            <a href="danhsachsanpham.php" class="nav-item nav-link">Danh Sách Sản Phẩm</a>
                            <a href="checkout.php" class="nav-item nav-link"> Thanh Toán Đơn Hàng</a>
                            <a href="cart.php" class="nav-item nav-link">Giỏ Hàng</a>
                            <a href="my-account.php" class="nav-item nav-link">Tài Khoản</a>
                            <a href="contact.php" class="nav-item nav-link">Liên Hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                              <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               <?php if(isset($_SESSION['username'])){
               echo $_SESSION['username'];  
               }
               ?>        
     <input type="hidden" value = "<?php if(isset($_SESSION['pass_user'])){
               echo $_SESSION['pass_user'];  
               }?>"> 
          <input type="hidden" value = "<?php  if(isset($_SESSION['id'])){
               echo $_SESSION['id'];  }?>"> 
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="my-account.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông Tin Tài Khoản
                </a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thoát
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn Chắc Chắn Muốn Thoát</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn "Thoát" để thoát khỏi trang</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Thoát</button>

          </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="shopping.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                  
                    <div class="col-md-3">
                        <div class="user">
                          
                                <?php
 $totalnumber =0;
            $grandtotal=0;
                         if(isset($_SESSION['cart'])){
           
                             foreach($_SESSION['cart'] as $value){    
                                $totalnumber += (int)$value['num'];
                                $grandtotal += (int)$value['price'] *(int)$value['num'];
                             }
                            }

?>
                            <!-- <a href="trangchu.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                       
                                <span id = "qty"></span>
                            </a> -->
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span  id ="qty"><?php echo $totalnumber?></span>
                            </a>
 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->    

          
          