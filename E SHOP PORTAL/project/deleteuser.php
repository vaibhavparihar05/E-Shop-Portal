<?php
     
    $id=$_GET['uid'];
    include './bdconnection.php';
    $connection= mysqli_connect(hostname,username, password,database);
    mysqli_query($connection ,"delete from usermaster where user_id=$id");
    header("location:vau.php");
?>        
    
