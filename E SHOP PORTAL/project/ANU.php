<?php
session_start();
if(Isset($_SESSION['role'])){
        if($_SESSION['role']!='Admin')
            header("location:homepage.php");
}
else{
    header("location:signin.php");
}
    $msg="";
    if(isset($_POST['datasubmit'])){
        $name=$_POST['txtname'];
        $email=$_POST['email'];
        $pswd=$_POST['pswd'];
        $cpswd=$_POST['cpswd'];
        $gender=$_POST['gnd'];
        $mbnmb=$_POST['mbnmb'];
        $dob=$_POST['txtdate'];
        $role=$_POST['role'];
        
        $con= mysqli_connect("localhost","root","","eshopdb");
        $qry ="INSERT INTO usermaster(user_name,user_email,user_pwd,user_gender,user_mobile,user_dob,role) VALUES('$name','$email','$pswd','$gender',$mbnmb,'$dob','$role')";
        if($pswd==$cpswd){
            mysqli_query($con, $qry);
        }
        else{
            echo "password does not match.  :)" ;
        }
        mysqli_close($con);
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
             .dabba{
                max-width: 400px;
                height:400px;
                background-image:linear-gradient( to bottom ,#ccffff,#66ffff,#ffffcc,#ffffcc,#66ffff,#ccffff);
                margin-top: 40px;
                border: 8px brown double ;
                border-radius: 9px;
                box-shadow: 4px 4px 4px 4px #999999;
            }
            .blank{
                flex:1;
            }
            form table{
                padding-top: 30px;
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
            <div style="flex: 4;" align="center">
            <div class="dabba" >
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
                         <td>
                            <select name="role">
                            <option>Select User Type Role</option>
                            <option>Admin</option>
                            <option>Customer</option>
                            </select>
                        </td>
                    </tr>    
                    <tr>
                        <td><input type="submit" value="Sign Up" name="datasubmit" /></td>
                    </tr>
                </table>
            </div>
            </div>    
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
