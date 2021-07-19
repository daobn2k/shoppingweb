<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');
?>

                    <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
                    <li class="breadcrumb-item active">Danh Sách Sản Phấm</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">      
                       
                                                <!-- PRODUCT-LIST -->
                                                <?php 

$id =isset($_GET['id'])?$_GET['id']:"";
if(isset($_GET['id'])){
$selectPro = "SELECT * FROM products Where cat_id = '$id'";
$result = mysqli_query($conn,$selectPro);
if (mysqli_num_rows($result) > 0) { 
while($rowpro = mysqli_fetch_assoc($result) ){
?>    
                            <div class="col-md-4">
                                <div class="product-item">
 
                                    <div class="product-title">
                                        <a href="chitietsanpham.php?view=detail&id=<?php echo $rowpro['pro_id']?>"><?php echo $rowpro['name']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="chitietsanpham.php?view=detail&id=<?php echo $rowpro['pro_id']?>">
                                            <img src="<?php echo $rowpro['image']?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo number_format($rowpro['price'],0,"",".")?> VNĐ</h3>
                
                                    </div>
                                    <button class = "btn btn-primary" onclick ="addCart(<?php echo $rowpro['pro_id']?>)" ><i class="fa fa-shopping-cart"></i>Mua Ngay</button>
                                </div>
                            </div>
<?php
}
}
}
else
{
    $selectProc = "SELECT * FROM products ORDER BY RAND() limit 9 ";
$resulta = mysqli_query($conn,$selectProc);
if (mysqli_num_rows($resulta) > 0) { 
while($row = mysqli_fetch_assoc($resulta)){
    ?>
     <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="chitietsanpham.php?view=detail&id=<?php echo $row['pro_id']?>"><?php echo $row['name']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="chitietsanpham.php?view=detail&id=<?php echo $row['pro_id']?>">
                                            <img src="<?php echo $row['image']?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#" onclick ="addCart(<?php echo $row['pro_id']?>)"><i class="fa fa-cart-plus"></i></a>
                                          
                                            <a href="chitietsanpham.php?view=detail&id=<?php echo $row['pro_id']?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo number_format($row['price'],0,"",".")?>  VNĐ</h3>
                
                                    </div>
                                    <div>
                                    <button class = "btn btn-primary" onclick ="addCart(<?php echo $row['pro_id']?>)" ><i class="fa fa-shopping-cart"></i>Mua Ngay</button>
                                    </div>
                                </div>
                            </div>
 <?php
}
}   
}
?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="danhsachsanpham.php">1</a></li>
                                    <li class="page-item"><a class="page-link" href="danhsachsanpham.php">2</a></li>
                                    <li class="page-item"><a class="page-link" href="danhsachsanpham.php">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="trangchu.php  "><i class="fa fa-home"></i>Trang Chủ</a>
                                </li>
                             </li>
                    <?php
                    $sqlcat = "SELECT * FROM category";
                    $runcat = mysqli_query($conn,$sqlcat);
                    if(mysqli_num_rows($runcat) >0){
                        while($rowcat = mysqli_fetch_assoc($runcat)){
?>
                      
                                <li class="nav-item">
                                    <a class="nav-link" href="danhsachsanpham.php?id=<?php echo $rowcat['id']?>"><i class="fa fa-shopping-bag"></i><?php echo $rowcat['cat_name']?></a>
                                </li>
                                <?php
                    }
                }
                ?>      
    
                                </ul>
                            </nav>
                        </div>
                        <!-- OTHER PRODUCT -->
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php
                             $sqlother = "SELECT * FROM products ORDER BY RAND() limit 3 ";
                             $runo = mysqli_query($conn,$sqlother);
                             if(mysqli_num_rows($runo) > 0){
                             while($rowother = mysqli_fetch_assoc($runo)){
                            ?> 
                            <div class="product-item">
                                    <div class="product-title">
                                        <a href="chitietsanpham.php?detail&&id=<?php echo $rowother['pro_id']?>"><?php echo $rowother['name']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="chitietsanpham.php?detail&&id=<?php echo $rowother['pro_id']?>">
                                            <img src="<?php echo $rowother['image']?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo number_format($rowother['price'],0,"",".")?> <span>VNĐ</span></h3>
                                        <a class="btn" href="" onclick ="addCart(<?php echo $rowother['pro_id']?>)" ><i class="fa fa-shopping-cart"></i>Mua Ngay</a>
                                    </div>
                                </div>
<?php
                             }
                            }
?>                              
                            </div>
                        </div>
                       
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
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
        

<?php
include('includes/scriptsshopping.php');
include('includes/footershopping.php');
?>

