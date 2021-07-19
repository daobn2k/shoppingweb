<?php
include('includes/connection.php');
?>
<style>
   h5{
    text-transform: uppercase;
    font-weight: 700;
    font-family: 'Source Code Pro', monospace;
    color:black;
}
</style>
<div class="product-detail " style = "width: 95% ;padding-top:0px;">
<div class="container">
    <div class="row product-detail-bottom">
         <div class="row">   
    <?php
    $sqlother = "SELECT * FROM products ORDER BY RAND() limit 3 ";
    $runo = mysqli_query($conn,$sqlother);
    if(mysqli_num_rows($runo) > 0){
    while($rowother = mysqli_fetch_assoc($runo)){
                         ?>   
                           <div class="col-md-4">
                           <div class="card" style="width: 18rem;">
                           <a href="chitietsanpham.php?view=detail&id=<?php echo $rowother['pro_id']?>">
                                            <img src='<?php echo $rowother['image']?>' style= "width:250px; alt="Product Image">
                                        </a>
  <div class="card-body">
  <a href="chitietsanpham.php?view=detail&id=<?php echo $rowother['pro_id']?>" >
  <h5 class="card-title"><?php echo $rowother['name'] ?></h5>
</a>
    <h5 class="card-title"><?php echo $rowother['price'] ?><span>VNĐ</span></h5>
    <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-primary">Buy Now</a>                                
                                            </div>
    
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

