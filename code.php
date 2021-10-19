<?php
// // products
session_start();
include('includes/connection.php');
if(isset($_POST['addnew'])){
    
    $catname = $_POST['catname'];
    $status = isset($_POST['status'])?$_POST['status']:0;
    $sql = "INSERT INTO category(cat_name,status) VALUES('$catname',$status)";
    $runn = mysqli_query($conn,$sql);
   
    if($conn){
        echo" thành công";
    }
     mysqli_close($conn);
     header("location:listcategory.php");
}

if (isset($_POST['delete_btn'])){
    $id =$_POST['delete_id'];
    echo $id;
$sql ="DELETE FROM category WHERE id = '$id'";
$run = mysqli_query($conn,$sql);
header("location:listcategory.php");
}
if(isset($_POST['editnew'])){

    $catname = $_POST['catname_edit'];
    $status = isset($_POST['status_edit'])?$_POST['status_edit']:0;
$id =$_POST['editid'];
$sqledit = "UPDATE category SET cat_name = '$catname',status = '$status' WHERE id ='$id'";
$run = mysqli_query($conn,$sqledit);
mysqli_close($conn);
header("location:listcategory.php");
}

if (isset($_POST['deletebtn'])){
    $id =$_POST['deleteid'];

$sql ="DELETE FROM products WHERE pro_id = '$id'";
$run = mysqli_query($conn,$sql);
header("location:listproducts.php");
}





if(isset($_POST['addNew'])) {
    $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}
$anh = "http://localhost/shopping/img/".basename( $_FILES["fileToUpload"]["name"]);
    $name = $_POST['name'];
    $cat_id = $_POST['cat_id'];
    $price = $_POST['price'];
   
    $description = $_POST['description'];
    $status = isset($_POST['status'])?$_POST['status']:0;

$sql = "INSERT INTO products(name,cat_id,price,image,description,status) 
VALUES('$name','$cat_id',' $price','$anh',' $description','  $status ') ";
$run = mysqli_query($conn,$sql);
if($run){
  echo "New record created successfully";
}else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location:listproducts.php');
}




if(isset($_POST['newedit'])){
    $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload_edit"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload_edit"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload_edit"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload_edit"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}
    $id = $_POST['editid'];
    $anh = "http://localhost/shopping/img/".basename( $_FILES["fileToUpload_edit"]["name"]);
    $name = $_POST['name'];
    $cat_id = $_POST['cat_id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $status = isset($_POST['status'])?$_POST['status']:0;
$sql ="UPDATE products SET name =' $name',cat_id='$cat_id',price ='$price',image ='$anh',description = '$description',status ='$status' Where pro_id = '$id'";
$run = mysqli_query($conn,$sql);
header('location:listproducts.php');
}

// ADMIN Dang KY
 if(isset($_POST['registerbtn'])){

  $target_dir = "img/";
  $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      // echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
  //   echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
  //   echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  //   echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
$anh = "http://localhost/shopping/img/".basename($_FILES["fileToUpload"]["name"]);

echo $anh;
echo "<br>";

$username = $_POST['username'];
$email =$_POST['email'];
$password =$_POST['password'];
$status = isset($_POST['status'])?$_POST['status']:0;
$usertype = $_POST['usertype'];
$sqlres = "INSERT INTO user(username,email,password,anh,usertype,status) VALUES('$username','$email','$password','$anh','$usertype','$status')";
$run = mysqli_query($conn,$sqlres);
  if($usertype =='admin'){
    header('location:showinfo.php');
  }else if($usertype =='admin2'){
    header('location:showinfoadmin2.php');
  }else{
    header('location:showinfouser.php');
  }
 }

if(isset($_POST['newuseredit'])) {
  $target_dir = "img/";
  $target_file = $target_dir.basename($_FILES["fileToUpload_edit"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload_edit"]["tmp_name"]);
    if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      // echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
  //   echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload_edit"]["size"] > 500000) {
  //   echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  //   echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload_edit"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload_edit"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  $anh = "http://localhost/shopping/img/".basename($_FILES["fileToUpload_edit"]["name"]);

  $id = $_POST['edituserid'];
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $status = isset($_POST['status'])?$_POST['status']:0;
  $update_usertype = $_POST['update_usertype'];
  $sql ="UPDATE user SET username =' $name',email='$email',password ='$password',sanh = '$anh',usertype='$update_usertype',status ='$status' Where id = '$id'";
  $run = mysqli_query($conn,$sql) or die("Hiện tại chưa thay đổi được");
  header('location:showinfouser.php');
}
if(isset($_POST['deleteadminbtn'])){
  $id = $_POST['deleteuserid'];
  $sql ="DELETE FROM user WHERE id ='$id'";
  $run = mysqli_query($conn,$sql) or die("Hổng Có Xóa Được");
  if($update_usertype =='admin'){
    header('location:showinfo.php');
  }else if($update_usertype =='admin2'){
    header('location:showinfoadmin2.php');
  }else{
    header('location:showinfouser.php');
  }
    

}
if(isset($_POST['deleteuserbtn'])){
  $id = $_POST['deleteuserid'];
  $sql ="DELETE FROM user WHERE id ='$id'";
  $run = mysqli_query($conn,$sql) or die("Hổng Có Xóa Được");
  
    header('location:showinfouser.php');

}

if(isset($_POST['updatecheckout'])){
  $id = $_POST['update-id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
 $sql = "UPDATE shopping_cart.order SET name =' $name',email =' $email', address =' $address', phone  =' $phone 'WHERE  user_id = '$id' ";
 $run = mysqli_query($conn,$sql);
 echo $sql;
 if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
} 


if(isset($_POST['changepass']) && isset($_SESSION['pass_user'])){
  $id = $_POST['update-id'];
  $password_user = $_SESSION['pass_user'];
  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];
  $confirmpassword = $_POST['confirmpassword'];
  if($password_user == $password){
    if($newpassword == $confirmpassword){
      $sqlupdate = "UPDATE user SET password = '$newpassword' WHERE  id = '$id' ";     
      mysqli_query($conn,$sqlupdate); 
      if ($conn->query($sqlupdate) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
      $conn->close();
    }
  }
}
// if (isset($_POST['button1']) || isset($_POST['button3'])) {
//   $query = "SELECT *FROM user ";
//   $result = mysqli_query($conn, $query);
//   while ($row = mysqli_fetch_array($result)) {
//     $usertype = $row["usertype"];
//   }
//   if ($usertype = "admin2") {
//     echo "<script>alert('Bạn không có quyền')</script>";
//   }else{

//   }
// }
$sql = "SELECT * FROM user";
      $run  = mysqli_query($conn,$sql);
       if (mysqli_num_rows($run) > 0) { 
            
            while($row = mysqli_fetch_array($run)) {
              $usertype = $row["usertype"];
            }
            if ($usertype = "admin") {
              }}
?>
