<?php
ob_start();
session_start();
include('includes/connection.php');
include('includes/headershopping.php');
include('includes/navbarshopping.php');
?>
<?php 
if(isset($_POST['addbtn'])){
    if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        $s1 =time();
$s2 =date("yy-m-d",$s1);
$sqlselec = "SELECT * FROM user";
$run = mysqli_query($conn,$sqlselec);
$row = mysqli_fetch_array($run);
$user_id = $_SESSION['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_SESSION['username'];
$phone = $_POST['phone'];
$created = $s2;
$status = isset($_POST['status'])?$_POST['status']:0;

$sqlinsert = "INSERT INTO shopping_cart.order(user_id,name,email,address,phone,created,status)
VALUES('$user_id ','$name','$email','$address','$phone','$created','$status')";
mysqli_query($conn,$sqlinsert);
$id = mysqli_insert_id($conn);
if(isset($_SESSION['cart'])){
foreach($_SESSION['cart'] as $key => $value){
    $quantity = $value['num'];
   $price =  $value['price'];
    $sqloderDetail ="INSERT INTO order_detail(oder_id,product_id,quantity,price,status)
    VALUES('$id','$key','$quantity ','$price','1')";
    mysqli_query($conn,$sqloderDetail);
}
}
}
else{
    header('location:login.php');
}
 }
?>
 <!-- Checkout Start -->
 <h4 class ="sent"></h4>
<form action="#" method = "POST" id = "myform">
 <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2> Địa chỉ thanh toán</h2>
                                <div class="row">
                                    <div class="col-md-12">                                
                                        <label>Họ và Tên</label>
                                        <input class="form-control" id = "name" name = "name" type="text" placeholder="">
                                    </div>
                                 
                                    <div class="col-md-12">
                                        <label>Địa Chỉ</label>
                                        <input class="form-control" id ="address" name = "address" type="text">
                                    </div>
                                    <div class="col-md-12">                                   
                                        <label>Số Điện Thoại</label>
                                        <input class="form-control" id ="phone" name = "phone" type="text" >
                                    </div>
                                   
                                    <div class="col-md-12">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-label" name="status" id="status" value="1">
                               Trạng Thái</label>
                                  </div>
                                  <div class="col-md-12">
                                  <div class="checkout-btn">
                                    <button  style = " font-size:20px;" type= "submit" class = " form-control btn btn-btn-primary" name = "addbtn" >Place Order</button>
                                </div>
                                </div>
                        </form>              
                                </div>
                            </div>                
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                            <?php 

if(isset($_SESSION['cart'])){
    $grandtotal = 0;
    $totalnumber = 0;
   $shippingcost = 20000;
    foreach($_SESSION['cart']as $key => $value){
        $totalnumber += (int)$value['num'];
        $grandtotal += (int)$value['price'] *(int)$value['num'] ;
    }
}
               ?>
                                <h1>Cart Total</h1>
                             
                                <p class="ship-cost">Number<span><?php echo $totalnumber?></span></p>
                                <p class="ship-cost">Shipping Cost<span><?php echo $shippingcost?> VNĐ</span></p>
                                <p>Total<span> <?php echo $grandtotal ?> VNĐ</span></p>
                                <p>Grand Total<span> <?php echo $grandtotal +$shippingcost ?> VNĐ</span></p>

     </div>
                            <div class="checkout-payment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
include('includes/brand.php');
include('includes/scriptsshopping.php');
include('includes/footershopping.php');
?>