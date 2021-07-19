<style>
.fa{
    margin-right: 10px;
}
</style>

<div class="col-md-3">      
                    <nav class="navbar bg-light"> 
                         <ul class="navbar-nav">
                             <li>
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