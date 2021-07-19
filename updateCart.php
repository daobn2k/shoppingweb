<?php
session_start();
include('includes/connection.php');
if(isset($_POST['id'])&&isset($_POST['num'])){
  $id = $_POST['id']; 
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
                 if(array_key_exists($id,$cart)){ 
               if($_POST['num']){
                        $cart[$id] = array(
                        'name' =>$cart[$id]['name'],
                        'num' =>$_POST['num'],
                        'price'=>$cart[$id]['price'],
                        'image'=>$cart[$id]['image']
                        ); 
               }
               else{
                    unset($cart[$id]);
                }
                $_SESSION['cart'] = $cart;
              }
         }
    }
?>