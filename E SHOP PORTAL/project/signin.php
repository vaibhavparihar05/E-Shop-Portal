<?php 
session_start();
if(Isset($_SESSION['uname'])){
    header("location:homepage.php");
}
    if(isset($_POST['sbmt'])){
        $uid=$_POST['usrid'];
        $upswd=$_POST['usrpswd'];
        
        include './bdconnection.php';
        $connection= mysqli_connect(hostname, username, password, database);
        $result= mysqli_query($connection,"select * from usermaster where user_email='$uid' and user_pwd='$upswd' ");
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $_SESSION['uname']=$row[1];
            $_SESSION['role']=$row[7];
            $_SESSION['uid']=$row[0];
            header('location:homepage.php');
        }
        else{
            echo "<font color='red'>Invalid Username or Password</font>";
        }
        
        if(isset($_POST['chkbox'])){
            $name=$_POST['usrid'];
            $pass=$_POST['usrpswd'];
            setcookie("cookiename",$name,time()+60*60*24*30);
            setcookie("cookiepass",$pass,time()+60*60*24*30);
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
                padding-top: 80px;
            }
            input{
                margin-top: 10px;
            }
            input[type="text"],[type="password"]{
                width:250px;
                height: 25px;
            }
            td a{
                
                text-decoration: none;
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
            <div class="blank"></div>
            <div class="dabba">
            <form method="post">
                <table align="center" padding="3px">
                    <tr>
                        <td><input type="text" name="usrid" value="<?php if(isset($_COOKIE['cookiename'])){echo $_COOKIE['cookiename'];} ?>" placeholder="User Id" ></td>
                    </tr>
                    <tr>
                        <td><input type="password" value="<?php if(isset($_COOKIE['cookiepass'])){echo $_COOKIE['cookiepass'];} ?>" name="usrpswd" placeholder="Password"/></td>
                    </tr>
                     <tr>
                         <td><input type="checkbox" name="chkbox"/> Remember ME!</td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sbmt" value="Sign In"/> </td>
                    </tr>
                    <tr>
                        <td><a href="">Forgot Password</a></td>
                    </tr>
                </table>
            </form>
            </div>
            <div class="blank"></div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
