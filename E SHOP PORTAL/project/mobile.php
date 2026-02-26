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
                include './bdconnection.php';
                $con= mysqli_connect(hostname, username, password,database);
                $qry="select * from productmaster where ptype='mobile'";
                $result= mysqli_query($con, $qry);
                if(mysqli_num_rows($result)>0){
                    $count=0;
                    while($r= mysqli_fetch_assoc($result)){
                        if($count==0)
                            echo "<div class='row'>";
                        $count++;
                        echo "<div class='column' align='center'>";
                            echo "<a href='productmain.php?pid=$r[pid]&ptype=$r[ptype]&pimage=$r[pimage]&pname=$r[pname]&pprice=$r[pprice]' style='text-decoration:none;'>";
                            echo"<div class='product'>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'><img src='$r[pimage]' width='130px' height='180px'/></div> ";
                                echo "</div>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'>$r[pname]</div>";
                                echo "</div>";
                                echo "<div class='row1'>";
                                    echo "<div class='datacolumn'>Rs. $r[pprice]</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "</a>";
                        echo "</div>";
                       
                        if($count==4){
                            echo "</div>";
                            $count=0;
                             echo "<br>";
                            echo "<br>";
                        }
                    }
                }
                else{
                    echo "<h2>No Data Found</h2>";
                }
            ?>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
