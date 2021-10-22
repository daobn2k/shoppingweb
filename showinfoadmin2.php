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
        <h5 class="modal-title" id="exampleModalLabel">Add Admin2 Data</h5>
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
                          <label for="fileToUpload">Ảnh</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">
            </div>  
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Your address">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control" placeholder="Phone-number">
            </div>
            <div class="form-group">
                <label>Level</label>
                <input type="text" name="level" class="form-control" placeholder="Level">
            </div>
            <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" checked>
                                Trạng Thái
                  </label>
             </div>
             <div class="form-group">
                
                <input type="hidden" name="usertype" class="form-control" value = "admin2">
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
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>
<div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>User </th>
            <th>Email</th>
            <th>Password</th>
            <th>AVATAR</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Level</th>
            <th>USERTYPE</th>
            <th>Status</th>
            <th>DETAILS</th>
            <th>EDIT</th>
            <th>DELETE</th>
          </tr>
        </thead>
        <tbody>
   <?php
        if (mysqli_num_rows($run) > 0) { 
            $count = 0;
            // output data of each row
            while($row = mysqli_fetch_assoc($run)) {
              if($row['usertype'] == 'admin2'){
?>
     <tr><img src="" alt="">
            <td><?php echo ++$count;?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>       
            <td><img src="<?php echo $row['anh']?>" alt="" width = "150px;">
            <td><?php echo $row['address']?></td> 
            <td><?php echo $row['phone']?></td> 
            <td><?php echo $row['level']?></td>      
            <td><?php echo $row['usertype']?></td>    
            <td> <?php echo $row['status']?"hiển thị":"ẩn"?></td>
            <td>
                <form action="hopdonglaodong.php" method="post">
                  <input type="hidden" name="detailsbtnid" value="<?php echo $row['id']?>">
                  <button type="submit" name="detailsbtn" class="btn btn-warning"> DETAILS</button>
                </form>
            </td>
            <td>
                <form action="edituser.php" method="post">
                    <input type="hidden" name="edituserid" value="<?php echo $row['id']?>">
                    <button  type="submit" name="edituser" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="deleteuserid" value="<?php echo $row['id']?>">
                  <button type="submit" name="deleteadminbtn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
              <?php
              }  
          }
          } else {
            echo "0 results";
          }          
          mysqli_close($conn);
          ?>
        </tbody>
      </table>

   
    </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>