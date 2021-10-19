
<?php
ob_start();
session_start();

include('includes/connection.php');
if(isset($_POST['login_btn'])){ 
    $email_login = $_POST['email'];

    $pasS_login = $_POST['password'];

    $sql = "SELECT id,username,email,password,usertype FROM user WHERE email = '$email_login' AND password = '$pasS_login'";
    $run = mysqli_query($conn,$sql);
    $usertypes = mysqli_fetch_array($run);
$id_user = $usertypes['id'];
$pass_user = $usertypes['password'];
    if($usertypes['usertype'] == "admin" || $usertypes['usertype'] == "admin2"){
$_SESSION['username'] = $email_login;
$_SESSION['id'] = $id_user;
$_SESSION['pass_user'] = $pass_user;
$_SESSION['usertype'] = $usertypes["usertype"];
header('location:index.php');
} else if($usertypes['usertype'] == "user"){
        $_SESSION['username'] = $email_login;
        $_SESSION['id'] = $id_user;
        $_SESSION['pass_user'] = $pass_user;
        header('location:shopping.php');
            }else{
                header('location:login.php');
            }
              if(isset($_POST['rememberme'])){
setcookie("email",$email_login);
setcookie("password", $pasS_login );
	}
}

$username_login = "";
$password = "";
$check  = false;
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
    $username_login = $_COOKIE['email'];
	$password = $_COOKIE['password'];
	$check =true;
}
else{
  $username_login ="";
	$password = "";
	$check =false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
				  
                  <form class="user" method = "POST" action="#">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name = "email" placeholder="Enter Email Address..." value = "<?php echo $username_login?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name = "password" placeholder="Password" value = "<?php echo $password?>">
                    </div>
                    <div class="form-group" >
                      <div class="custom-control custom-checkbox small">
                      <input <?php echo ($check)?"checked":0?> type="checkbox" name="rememberme" id="" value = "1">
					  <label for="rememberme"> Remember Me</label>
                      </div>
                    </div>
                   <button  class="btn btn-primary btn-user btn-block" name ="login_btn" >Login</button>
				   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registeruser.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
