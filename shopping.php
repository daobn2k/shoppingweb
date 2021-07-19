<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');
?>
    <!-- Main Slider Start -->
    <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                    include('silder-bar.php');
                    ?>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="img/slider-1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Some text goes here that describes the image</p>
                                    <a class="btn" href="danhsachsanpham.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slider-2.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Some text goes here that describes the image</p>
                                    <a class="btn" href="danhsachsanpham.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="img/slider-3.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Some text goes here that describes the image</p>
                                    <a class="btn" href="danhsachsanpham.php"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="img/1.jpg" style = "width: 286px;height: 330px;">
                                <a class="img-text" href="">
                                    <p></p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="img/2.jpg" style = "width: 286px;height: 330px;">
                                <a class="img-text" href="">
                                    <p></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End --> 

  <!-- Brand Start -->
  <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->     
          <!-- Feature Start-->
          <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
      
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Mua Gần Đây</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                <?php

$sqlrd = "SELECT * FROM products ORDER BY RAND() limit 5 ";
$runrd = mysqli_query($conn,$sqlrd);
if(mysqli_num_rows($runrd) >0 ){
    while($rowrd = mysqli_fetch_assoc($runrd)){
        ?>
                <div class="col-lg-3">
                        <div class="product-item" style = "width:250px;">
                            <div class="product-title">
                            <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>">
                            <?php echo $rowrd['name']?>
                        </a>
                            <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>">
                                    <img src="<?php echo $rowrd['image']?>" alt="Product Image">
                                </a>
                                <div class="product-action">                
                                  <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php  echo number_format($rowrd['price'],0,"",".")?><span>VNĐ</span></h3>
                               </div>
                               <div>
                                <button class = "btn btn-primary" onclick ="addCart(<?php echo $rowrd['pro_id']?>)" ><i class="fa fa-shopping-cart"></i>Mua Ngay</button>
           <!-- Modal -->      </div>
                        </div>
                    </div>
                    <?php 
    }
}
                    ?>
                </div>
            </div>
        </div> 
     <!-- Call to Action Start -->
     <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Liên Hệ Để Giải Đáp Thắc Mắc</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+0942-858-890</a>
                    </div>
                </div>
            </div>
        </div>
        <?php

        ?>


        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản Phẩm Yêu Thích</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                  
                <?php
$sqlrd = "SELECT * FROM products ORDER BY RAND() limit 5 ";
$runrd = mysqli_query($conn,$sqlrd);
if(mysqli_num_rows($runrd) >0 ){
    while($rowrd = mysqli_fetch_assoc($runrd)){
        ?>
                <div class="col-lg-3">
                        <div class="product-item" style = "width:250px;">
                            <div class="product-title">
                            <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>">
                            <?php echo $rowrd['name']?>
                        </a>
                            <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>">
                                    <img src="<?php echo $rowrd['image']?>" alt="Product Image">
                                </a>
                                <div class="product-action">                
                                  <a href="chitietsanpham.php?view=detail&id=<?php echo $rowrd['pro_id']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php  echo number_format($rowrd['price'],0,"",".")?><span>VNĐ</span></h3>
                               </div>
                               <div>
                                <button class = "btn btn-primary" onclick ="addCart(<?php echo $rowrd['pro_id']?>)" ><i class="fa fa-shopping-cart"></i>Mua Ngay</button>
           <!-- Modal -->      </div>
                        </div>
                    </div>
                    <?php
    }
}
                ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        <!-- Button trigger modal -->  
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                  <?php 
                  $sql_user = "SELECT * FROM user ORDER BY RAND() limit 3 ";
                  $runnuser = mysqli_query($conn,$sql_user);
                  if(mysqli_num_rows ($runnuser) >0){
                      while($rowuser = mysqli_fetch_assoc($runnuser)){
                 ?>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="<?php echo $rowuser['anh']?>" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2><?php echo $rowuser['username']?></h2>
                               
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
               <?php
                    }
                }
                ?>

          
                </div>
            </div>
        </div>
        <!-- Review End -->        

<?php
include('includes/scriptsshopping.php');
include('includes/footershopping.php');
?>

