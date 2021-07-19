<?php
include('security.php');
include('includes/connection.php');
if(isset($_POST['login_btn'])){
    $email_login = $_POST['email'];
    $pasS_login = $_POST['password'];
    $sql = "SELECT id,username,email,password,usertype FROM user WHERE email = '$email_login' AND password = '$pasS_login'";
    $run = mysqli_query($conn,$sql);
    $usertypes = mysqli_fetch_array($run);
$id_user = $usertypes['id'];
$pass_user = $usertypes['password'];
    if($usertypes['usertype'] == "admin"){
$_SESSION['username'] = $email_login;
$_SESSION['id'] = $id_user;
$_SESSION['pass_user'] = $pass_user;
header('location:index.php');
    }  else if($usertypes['usertype'] == "user"){
        $_SESSION['username'] = $email_login;
        $_SESSION['id'] = $id_user;
        $_SESSION['pass_user'] = $pass_user;
        header('location:trangchu.php');
            }else{
                header('location:login.php');
            }
              if(isset($_POST['rememberme'])){
setcookie("email",$email_login);
setcookie("password", $pasS_login );
    }
}
?>