<?php
session_start();
if(Isset($_SESSION['role'])){
        if($_SESSION['role']!='Admin')
            header("location:homepage.php");
}
else{
    header("location:signin.php");
}
?>
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
            main{
                display: flex;
                flex-direction: row;
            }
            .adminpanel{
                flex:1;
                background-image: linear-gradient(to bottom,#6699ff,#99ccff,#ccccff,#ccccff,#99ccff,#6699ff);
                border:2px solid #000000;
            }
            .admintable{
                width:250px;
                height: 30px;
                border:4px solid brown;
                margin-top: 3px;
                background-color: #ffffcc;
            }
            tr td a{
                text-decoration: none;
                color:red;
                font-size: 18px;
                font-weight: bold; 
            }
            .status{
                 background-color: #00ffff;
            }
        </style>
    </head>
    <body>
       <div class="headSection">
            <ul>
            <a href="">About us</a>
            <a href="">Privacy</a>
            <a href="">FAQ</a>
            <?php 
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
            <div class="adminpanel">
                <table>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="ANU.php">Add New User</a></td>
                    </tr>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="VAU.php">View All User</a></td>
                    </tr>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="ANP.php">Add New Products</a></td>
                    </tr>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="VAL.php">View All Products</a></td>
                    </tr>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="O.php">Orders</a></td>
                    </tr>
                    <tr>
                        <td v-align="middle" class="admintable"><a href="QF.php">Query/Feedback</a></td>
                    </tr>
                </table>
            </div>
            <div style="flex: 4;">
                <?php
                    $con = mysqli_connect("localhost","root","","eshopdb");
                    $result = mysqli_query($con," select * from orders ");
                    if(mysqli_num_rows($result)>0){
                        echo "<table width=\"100%\" border=\"1px\">";
                        echo "<tr>";
                        echo "<th>order id</th>";
                        echo "<th>user id</th>";
                        echo "<th>product id</th>";
                        echo "<th>order date</th>";
                        echo "<th>amount</th>";
                        echo "<th>Address</th>";
                        echo "<th>payment status</th>";
                        echo "<th>status</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                            echo "<td>$row[4]</td>";
                            echo "<td>$row[5]</td>";
                            echo "<td>$row[6]</td>";
                            echo "<td>$row[7]</td>";
                            echo "<td class='status'><a href=''>change status</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                        ?>
            </div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
