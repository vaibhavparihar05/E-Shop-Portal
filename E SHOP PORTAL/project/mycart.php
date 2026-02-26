<?php
    $productid= $_GET['pid'];
    $producttype= $_GET['ptype'];
    $pimage=$_GET['pimage'];
    $pprice=$_GET['pprice'];
    $pname=$_GET['pname'];
    if(isset($_COOKIE['cart'])){
        $data= $_COOKIE['cart'];
        $data= $data.",".$productid;
        setcookie('cart',$data);
    }
    else{
        setcookie('cart',$productid, time()+60*60*24);
    }
    header("location:productmain.php?pid=$productid&ptype=$producttype&pimage=$pimage&pprice=$pprice&pname=$pname");


