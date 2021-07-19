<?php
session_start();
include('includes/connection.php');
if(!$_SESSION['username'])
{
    header('location:login.php');
}
?>
