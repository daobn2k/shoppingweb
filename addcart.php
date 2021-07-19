    <?php
session_start();
    if(isset($_POST['id'])){
include('includes/connection.php');
$id = $_POST['id'];
$sqlDetail  = "SELECT * FROM products Where pro_id = '$id' ";
$run = mysqli_query($conn,$sqlDetail);
$row = mysqli_fetch_assoc($run);
if(!isset($_SESSION["cart"])){
    $cart = array();
    $cart[$id] = array(
        'name' =>$row['name'],
        'num' =>1,
        'price'=>$row['price'],
        'image'=>$row['image']
    ); 
    }else{
        $cart =$_SESSION['cart'];
        if(array_key_exists($id,$cart)){
            if(isset($_POST['num'])){
                $num =$_POST['num'];
                $cart[$id] = array(
                    'name' =>$row['name'],
                    'num' =>(int)$cart[$id]['num']+$num,
                    'price'=>$row['price'],
                    'image'=>$row['image']
                );
            }else{
                $cart[$id] = array(
                    'name' =>$row['name'],
                    'num' =>(int)$cart[$id]['num']+1,
                    'price'=>$row['price'],
                    'image'=>$row['image']
                );
            }
        }else{
            $cart[$id] = array(
            'name' =>$row['name'],
            'num' =>1,
            'price'=>$row['price'],
            'image'=>$row['image']
        );
        }
    }
    $_SESSION['cart'] = $cart;
   $number=0;
   $total=0;
   foreach($cart as $value){
       $number += (int)$value['num'];
       $total += (int)$value['price'] *(int)$value['num'];
   }
   echo $number."-".$total;
}
    ?>