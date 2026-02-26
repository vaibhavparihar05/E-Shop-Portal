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
    if(isset($_POST['ap'])){
        $id=$_POST['pid'];
        $name=$_POST['pname'];
        $type=$_POST['ptype'];
        $price=$_POST['pprice'];
        
        $path="";
        if($_FILES['pimage']['error'] == 0 ){
            if($_FILES['pimage']['type']=="image/jpg" || $_FILES['pimage']['type']=="image/png" || $_FILES['pimage']['type']=="image/jpeg"){
                $sou = $_FILES['pimage']['tmp_name'];
                $des = $_SERVER['DOCUMENT_ROOT']."/STP2023/project/PRODUCT/".$_FILES['pimage']['name'];
                if(move_uploaded_file($sou, $des)){
                    $path="product/".$_FILES['pimage']['name'];
                    $con = mysqli_connect("localhost","root","","eshopdb");
                    $query = "insert into productmaster values($id,'$name',$price,'$type','$path')";
                    mysqli_query($con, $query);
                     if(mysqli_affected_rows($con)>0){
                     $msg = "product added";}
                     else{
                        $msg = "product not added";}
                     mysqli_close($con);
                }
            }
            else{
                    $msg="error in adding product";
            }
            
        } 
        else{
            $msg="file is corrupted";
        }
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
                height:300px;
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
            input[type="text"],[type="submit"]{
                margin-top: 10px;
                width:300px;
                height:22px;
                margin-left: 20px;
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
                if(isset($_SESSION['uadmin'])){
                    echo "<a class=\"a\" href=\"admin.php\">Admin</a>";
                }
                ?>
                </li>
                <li><?php 
                    if(Isset($_SESSION['role'])){
                        if($_SESSION['role']=='Admin'){
                            echo "<a class=\"a\" href=\"admin.php\">Admin</a>";
                        }
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
                    <form method="post" enctype="multipart/form-data">
                    <table align="center" padding="3px">
                    <tr>
                        <td><input type="text" value="" name="pid" placeholder="Product ID"/></td>
                    </tr>
                   <tr>
                        <td><input type="text" value="" name="pname" placeholder="Product Name"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="" name="ptype" placeholder="Product Type"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" value="" name="pprice" placeholder="Product Price"/></td>
                    </tr>
                    <tr>
                        <td><text style="color: #666666;margin-left: 20px;">Product Image : &nbsp;&nbsp;</text><input style="width: 90px;margin-top: 10px;" type="file" value="" name="pimage"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Add Product" name="ap" /></td>
                    </tr>
                    </table>
                    </form>
            </div>
            </div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
