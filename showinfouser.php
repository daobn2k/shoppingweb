<?php
ob_start();
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/connection.php');
$sql = "SELECT * FROM user";
$run  = mysqli_query($conn,$sql);

?>
<!-- SHOW INFO USER -->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
      <form action="code.php" method="POST"  enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" name="phone" class="form-control" placeholder="Enter phone">
            </div>  
            <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" name="address" class="form-control" placeholder="Enter  address">
            </div>  
            <div class="form-group">
                          <label for="fileToUpload">Image</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">
            </div>  
            <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" checked>
                                Status
                  </label>
             </div>
             <div class="form-group">
                <input type="hidden" name="usertype" class="form-control" value = "user">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow ">
  <div class="card-header ">
    <h6 class="m-0 font-weight-bold text-primary" style="display: flex;
    justify-content: space-between;
    align-items: center;"> List User Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New User
            </button>
    </h6>
  <div style="display:flex;justify-content: center;align-items:center;">

    <form method="POST" class="input-group mb-3" style="width:50%;height: 42px;">
                            <input style='height: 42px; border-radius:4px 0 0 4px;' type="search" name="search" class="form-control" placeholder="Tìm Kiếm Khách Hàng" aria-label="Recipient's username" aria-describedby="button-addon2">
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

<div class="card-body" style="padding:0">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>User </th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Address</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
<?php
        if(!empty($_POST["search"])){
                                    $search_value=$_POST["search"];
                                    if( $search_value !== '') {

                                                $sql="select * from user where username like '%$search_value%'";

                                                $customerList = Result($sql);

                                                $i=0;
                                                     foreach( $customerList as $key => $row){
                                                      if($row['usertype'] == 'user'){
                                                        $i++;
                                                     
                                                ?>
                                                <tr><img src="" alt="">
            <td><?php echo $i;?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>       
            <td> <?php echo $row['address']?></td>
            <td>
            
                <form action="edituser.php" method="post">
                    <input type="hidden" name="edituserid" value="<?php echo $row['id']?>">
                    <button  type="submit" name="edituser" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteuserid" value="<?php echo $row['id']?>">
                  <button type="submit" name="deleteuserbtn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php 
                                                      } }
                                         }       
                               else{
                                 return null;
                               }
   ?>

   <?php
       }else{
        $sql = 'SELECT * FROM user ';
        $customerList = Result($sql);
        
        $i = 0;
        foreach( $customerList as $key => $row){
          if($row['usertype'] == 'user'){
          $i++;

?>
     <tr><img src="" alt="">
            <td><?php echo $i;?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>       
            <td><?php echo $row['phone']?></td>       
            <td> <?php echo $row['address']?></td>
            <td>
            
                <form action="edituser.php" method="post">
                    <input type="hidden" name="edituserid" value="<?php echo $row['id']?>">
                    <button  type="submit" name="edituser" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteuserid" value="<?php echo $row['id']?>">
                  <button type="submit" name="deleteuserbtn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
        }}
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