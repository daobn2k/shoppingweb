<?php

function save($table,$data){
    $val = "";
    $filed = "";
    if(is_array($data)){
        $i = 0;
                foreach($data as $key =>$value ){
                     $i++;
                            if($i == 1) {
                                     $filed .=$key;
                                      $val .="'".$value."'";
                                        }else{
                                            $filed .=','.$key;
                                            $val .=",'".$value."'";
                                             }
                                                  }
                        }
$sqlInsert = "INSERT INTO $table ($filed) VALUES ($val)";
return $sqlInsert;
} 

?>