<?php
    $i=$_GET['pid'];
    include './bdconnection.php';
    $connection= mysqli_connect(hostname,username, password,database);
    if($_GET['ptype']=='tv'){
        mysqli_query($connection ,"delete from productmaster where pid=$i and ptype='tv'");}
    else{
        mysqli_query($connection ,"delete from productmaster where pid=$i and ptype!='tv'");}
    header("location:VAL.php");
    mysqli_close($connection);