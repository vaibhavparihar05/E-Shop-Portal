<?php
    $msg="";
    if(isset($_POST['datasubmit'])){
        $name=$_POST['txtname'];
        $email=$_POST['email'];
        $pass=$_POST['pswd'];
        $gen=$_POST['gnd'];
        $num=$_POST['mbnmb'];
        $date=$_POST['txtdate'];
        $role='client';
        
        $connection = mysqli_connect("localhost","root","","eshopdb");
        $qry ="INSERT INTO usermaster(user_name,user_email,user_pwd,user_gender,user_mobile,user_dob,role) VALUES('$name','$email','$pass','$gen','$num','$date','$role')";
        mysqli_query($connection, $qry);
        if(mysqli_affected_rows($connection)>0){
            $msg = "SignUp Succesful !";
        }
        else{
            $msg = "SignUp not Successfull. Try Again";
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
            select{
                 margin-top: 10px;
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
            <div class="dabba">
            <form method="post">
                <table align="center" padding="3px">
                    <tr>
                        <td><input type="text" value="" name="txtname" placeholder="Full Name"/></td>
                    </tr>
                    <tr>
                        <td><input type="email" value="" name="email" placeholder="Your Email-ID"/></td>
                    </tr>
                    <tr>
                        <td><input type="password" value="" name="pswd" placeholder="Password"/></td>
                    </tr>
                    <tr>
                        <td><input type="password" value="" name="cpswd" placeholder="Confirm Password"/></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="gnd">
                            <option>Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="number" value="" name="mbnmb" placeholder="Mobile Number" /></td>
                    </tr>
                    <tr>
                        <td><input type="date" value="" name="txtdate" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Sign Up" name="datasubmit" /></td>
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
