<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');
?>

 <!-- Cart Start -->
 <div class="cart-page" id ="listCart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id = "cardx" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
<?php
if(isset($_SESSION['cart'])){
$total = 0;
$grandtotal= 0;
    foreach($_SESSION['cart'] as $key => $value){
        $total = $value['price'] * $value['num'];
        $grandtotal += $total;

?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="<?php echo $value['image']?>" alt="Image"></a>
                                                    <p><?php echo $value['name']?></p>
                                                </div>
                                            </td>
                                            <td><?php echo number_format($value['price'],0,"",".")?> VNĐ</td>
                                            <td>
                                                <div class="qty">
                                                    <button onclick="giamSoluong(<?php echo $key?>)"><i class="fa fa-minus"></i></button>
                                                    <input type="text" id = "num_<?php echo $key?>" value="<?php echo $value['num']?>">
                                                    <button onclick="tangSoluong(<?php echo $key?>)"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </td>
                                            <td><?php echo number_format($total,0,"",".")?> VNĐ</td>
                                           
                                          
                                            <td><button onclick ="remove(<?php echo $key?>)"><i class="fa fa-trash"></i></button></td>
                                    
                                        </tr>
                                        <?php
                                        
    }
}

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span><?php echo number_format($grandtotal,0,"",".") ?> VNĐ</span></p>
                                            <p>Shipping Cost<span>200000 VNĐ</span></p>
                                            <h2>Tổng Cộng <span> <?php echo number_format($grandtotal,0,"",".") ?> VNĐ</span></h2>
                                        </div>
                                        <div class="cart-btn" style= "text-align:center">
                                           <a href="checkout.php" name = "thanhtoan" class ="btn">Thanh Toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
       
        <?php
include('includes/brand.php');
include('includes/scriptsshopping.php');
include('includes/footershopping.php');

?>