
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My E-commerce Website</title>
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <style>
            .delete{
                width:90px;
                height: 30px;
                display: block;
                margin-left: 10px;
                background-color: #ffff66; 
                text-decoration: none;
                border:3px #000000 solid;
                color: #000000;
                line-height:27px;
            }
            .btn{
                width:90px;
                height: 30px;
                display: block;
                margin-left: 10px;
                background-color: #00ffff; 
                text-decoration: none;
                border:3px #000000 solid;
                color: #000000;
                line-height:27px;
            }
        </style>
    </head>
    <body>
       <div class="headSection">
            <ul>
            <a href="">About us</a>
            <a href="">Privacy</a>
            <a href="">FAQ</a>
             <?php session_start();
                if(isset($_SESSION['uname'])){
                    echo "(Welcome $_SESSION[uname])";
                }
                ?>
            </ul>
        </div>
        <div class="nav">
            <div class="blank"></div>
            <img class="logo" src="logo.jpg">
            <div class="navInfo"
                <ul>
                <li><a class="a" style="margin-left: 30px;" href="homepage.php">Home</a></li>
                <li><a class="a" href="laptop.php">Tv</a></li>
                <li><a class="a" href="mobile.php">Mobile</a></li>
                <?php
                    if(!isset($_SESSION['uname'])){
                    echo "<li><a class=\"a\" href=\"signin.php\">Sign In</a></li>";
                }
                ?>
                <li><a class="a" href="signup.php">Sign Up</a></li>
                <li><a class="a" href="cart.php">Cart<?php
                if(isset($_COOKIE['cart'])){
                    $data= $_COOKIE['cart'];
                    $arr = explode(",", $data);
                    echo count($arr);
                }
                ?></a></li>
                <li><a class="a" href="contact.php">Contact Us</a></li>
                <li>
                <?php 
                    if(Isset($_SESSION['role'])){
                        if($_SESSION['role']=='Admin'){
                            echo "<a class=\"a\" href=\"admin.php\">Admin</a>";
                        }
                    }
                ?>
                </li>
                <li><?php
                    if(isset($_SESSION['uname'])){
                    echo "<li><a class=\"a\" href=\"logout.php\">Log Out</a></li>";
                }
                ?>
                </li>
                </ul>
            </div>
        </div>
        <main>
            <?php  
    if(isset($_COOKIE['cart'])){
        $productIds = $_COOKIE['cart'];
        $productIdsArray = explode(",", $productIds); 
        
        if(count($productIdsArray) > 0){
            echo "<table width=\"60%\" align='center'>";
            echo "<tr>";
            echo "<th>Product</th>";
            echo "<th>Name</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "<th></th>";
            echo "</tr>";

            include './bdconnection.php';
            $connection = mysqli_connect(hostname, username, password, database);
            $amount=0;
            foreach($productIdsArray as $pid){
                $result = mysqli_query($connection, "SELECT * FROM productmaster WHERE pid = $pid");
                
               
                if ($result) {
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td align='center' ><img src='$row[4]'width='50px' height='50px'/></td>";
                            echo "<td align='center'>$row[1]</td>";
                            echo "<td align='center'>$row[2]</td>";
//                           echo "<td align='center'>$row[2]</td>";
                            $amount +=$row[2];
                            echo "<td align='center'></td>";
                            echo "<td align='center'><a class='delete' href='delete.php?pid=$row[0]'>delete</a></td>";
                            echo "</tr>";
                        }
                        $_SESSION['total']=$amount;
//                        echo "</table>";
                    }
                }
            }
            echo "<hr>";
            echo "<tr>";
            echo "<td colspan='4' align='center'>Total Amount : <b>$amount</b></td>";
            echo "</tr>";
            echo '<tr>';
                        echo "<td colspan ='3'></td>";
                        echo "<td align='center'><a class='btn' href=''>place order</a></td>";
                        echo "</tr>";
            echo "</table>";
        }
        else{
            echo "No products added";
        }
    }
    else{
        echo "No products added";
    }
?>

        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
