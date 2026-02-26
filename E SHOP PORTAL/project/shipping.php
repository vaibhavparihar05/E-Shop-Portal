<?php 
session_start();
if(!isset($_SESSION['uname'])){
    header("location:signin.php");
}
$msg="";
if(isset($_POST['ordernow'])){
    $userid = $_SESSION['uid'];
    $pid = $_COOKIE['cart'];
    $date = date("Y-m-d");
    $amt = $_SESSION['total'];
    $addres = $_POST['txtname'].",".$_POST['txtaddress'];
    $mode = $_POST['payment'];
    $status = "undelivered";
     include './bdconnection.php';
        $connection = mysqli_connect(hostname,username,password,database);
        $query = ("INSERT INTO orders(user_id,pid,order_date,amount,address,payment_status,status) VALUES('$userid','$pid',$date,'$amt','$addres','$mode','$status')");
        mysqli_query($connection,$query);
        if(mysqli_affected_rows($connection)>0){
            $msg = "<h2 style='color:green'>order placed successfully</h2>";
            setcookie("cart","");
        }
        else{
            $msg = "<h2 style='color:red'>order not placed</h2>";
        }
        mysqli_close($connection);
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
            .dabba{
                width: 400px;
                height:400px;
                background-image:linear-gradient( to bottom ,#ccffff,#66ffff,#ffffcc,#ffffcc,#66ffff,#ccffff);
                flex:1;
                margin-top: 45px;
                border: 8px brown double ;
                border-radius: 9px;
                box-shadow: 4px 4px 4px 4px #999999;
            }
            .blank{
                flex:1;
            }
             table{
                padding-top: 40px;
            }
            input{
                margin-top: 10px;
            }
            input[type='text'],[type='email'],[type='password'],[type='number']{
                width:250px;
                height:22px;
            }
            .textarea{
                width:350px;
                height:150px;
            }
            select{
                 margin-top: 10px;
                 width:300px;
                 height:22px;
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
                        <div class="blank"></div>

            <div class="dabba" >
            <form method="post">
                <table align="center" padding="3px">
                    <tr>
                        <td><input type="text" value="" name="txtname" placeholder="Full Name"/></td>
                    </tr>
                    <tr>
                    <td>
                        <textarea class="textarea" placeholder="Your Address" name='txtaddress'></textarea>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="payment">
                            <option>Payment mode</option>
                            <option>COD</option>
                            <option>Net Banking</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="order Now" name="ordernow" /></td>
                    </tr>
                </table>
                <?php
                    echo $msg;
                ?>
            </form>
            </div>
                                    <div class="blank"></div>

        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
