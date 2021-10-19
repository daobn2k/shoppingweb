<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="display:flex;justify-content: space-between;align-items:center;">Danh sách ưu đãi
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              <a style="color:#fff;"href="newsale.php">Thêm mới ưu đãi </a>
            </button>
    </h6>
    <div style="display:flex;justify-content: center;align-items:center;">

<form method="POST" class="input-group mb-3" style="width:50%;height: 42px;">
                        <input style='height: 42px; border-radius:4px 0 0 4px;' type="search" name="search" class="form-control" placeholder="Tìm Kiếm Theo Mã Thẻ " aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-secondary" type="submit" id="button-addon2"
                        style="
                        height: 42px; 
                        display: flex;
                        justify-content:center;
                        align-items:center;
                        border-radius:0;
                        border-radius:0 4px 4px 0;
                        position:absolute !important;
                        right:0;
                        z-index: 1;
                        "
                        ><i class="fas fa-search" style="margin-right:0"></i></button>
</form>
</div> 
  </div>
<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
                                    <th >Mã thẻ khách hàng</th>
                                    <th >Mã Code Ưu Đãi</th>
                                    <th >Giá trị Ưu Đãi</th>
                                    <th >Ngày bắt đầu ưu đãi</th>
                                    <th >Ngày kết thúc ưu đãi</th>
                                    <th >Trạng thái Hiện tại</th>
                                    <th >Thao Tác</th>
                               
          </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($_POST["search"])){
                                    $search_value=$_POST["search"];
                                    if( $search_value !== '') {

                                                $sql="select * from sale_user where sale_user_id like '%$search_value%'";

                                                $customerList = Result($sql);

                                                $i=0;
                                                     foreach( $customerList as $key => $value){
                                                      $i++;
                                                ?>
   <tr>
                                        <td style="display: flex;
    height: 100%;
    min-height: 73px;
    justify-content: center;"><?php echo $value['sale_user_id']; ?></td>
                                        <td><?php echo $value['sale_code']; ?></td>
                                        <td><?php echo $value['sale'].'%' ?></td>
                                        <td><?php echo $value['sale_start']; ?></td>
                                        <td><?php echo $value['sale_end']; ?></td>
                                        <td><?php if($value['status'] = 1) {
                                          echo 'Hoạt Động'; 
                                        }else{
                                          echo 'Hết thời hạn';
                                        } ?></td>
                                        <td style=" height:73px;display:flex;aligns-item:center;justify-content:center;">
                                        <a style="color:#404040;margin-right:4px;" href="/shoppingweb/newsale.php?delete_id=<?php echo $value['sale_id']?>"><i class="far fa-trash-alt"></i></a> 
                                        </td>
                                    </tr>
                                    <?php 
                                            }
                                         }       
                               else{
                                 return null;
                               }
   ?>
        <?php
        }else{
        $sql = "SELECT * FROM sale_user";

        $result = Result($sql);
        foreach ($result as $key => $value) {
            # code...
      ?>

        <tr>
                                        <td
                                        style="display: flex;
    height: 100%;
    min-height: 73px;
    justify-content: center;"
                                        ><?php echo $value['sale_user_id']; ?></td>
                                        <td><?php echo $value['sale_code']; ?></td>
                                        <td><?php echo $value['sale'].'%' ?></td>
                                        <td><?php echo $value['sale_start']; ?></td>
                                        <td><?php echo $value['sale_end']; ?></td>
                                        <td><?php if($value['status'] = 1) {
                                          echo 'Hoạt Động'; 
                                        }else{
                                          echo 'Hết thời hạn';
                                        } ?></td>
                                        <td style=" height:73px;display:flex;aligns-item:center;justify-content:center;">
                                        <a style="color:#404040;margin-right:4px;" href="/shoppingweb/newsale.php?delete_id=<?php echo $value['sale_id']?>"><i class="far fa-trash-alt"></i></a> 
                                        </td>
                                    </tr>
                                    <?php 
                                      }
                                    }
                                      ?>
        </tbody>
      </table>
    </div>
  </div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

