<?php 
include('config/config.php');   
function execute($sql){
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    mysqli_query($conn,$sql);

    mysqli_close($conn);
}

function Result($sql){

    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    
    $resultSet = mysqli_query($conn,$sql);

    $list = [];

    while($row = mysqli_fetch_array($resultSet, 1)){
        $list[] = $row;
    }

    mysqli_close($conn);

    return $list;
}


function showMessage($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}