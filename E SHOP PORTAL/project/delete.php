<?php
    $pid= $_GET['pid'];
    $data= $_COOKIE['cart'];
    $arr = explode(",",$data);
    $i= array_search($pid, $arr);
    unset($arr[$i]);
    $data= implode(",",$arr);
    setcookie("cart",$data);
    header("location:cart.php");


