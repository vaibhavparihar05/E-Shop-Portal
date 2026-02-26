
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
            .desgin{
                display: flex;
                flex-direction: column;
                
            }
            .fcolumn{
                flex-direction: row;
                 
            }
/*            .button{
                width:90px;
                height: 30px;
                margin-left: 10px;
                background-color: #99ff99;
            }*/
            .button1{
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
            <div class="design">
                <div class="design" align="center"><img src="<?php if(isset($_GET['pimage'])){echo $_GET['pimage'];}?>"width="250px" height="250px">
                    <!--<div class="fcolumn"><input style class="button" type="button" value="Buy Now" name="buynow"/>-->
                        <?php 
                            $i=$_GET['pid'];
                            $t=$_GET['ptype'];
                            $img=$_GET['pimage'];
                            $prc=$_GET['pprice'];
                            $nm=$_GET['pname'];
                            echo "<a href=\"mycart.php?pid=$i&ptype=$t&pprice=$prc&pimage=$img&pname=$nm\" class=\"button1\">Add to cart</a>"
                                    ?></div><br>
                    
                </div>
                <div class="design" style="font-size: 30px;" align="center">
                    <?php if(isset($_GET['pname'])){$nm= $_GET['pname'];echo $nm;}?><br><br>Rs. <?php if(isset($_GET['pprice'])){$prc= $_GET['pprice'];echo $prc;}?>
                </div>
                <div>
                    <?php
                        $i=$_GET['pid'];
                        $t=$_GET['ptype'];
                        include './bdconnection.php';
                        $connection= mysqli_connect(hostname,username, password,database);
                        if($t=='tv'){
                            $result= mysqli_query($connection,"select * from tv_specification where pid=$i");
                            $row = mysqli_fetch_array($result);
                         echo "<table width=\"100%\" border=\"1px\">";
                         echo "<tr>";
                         echo "<td width='50%'>In the box</td>";
                         echo "<td>$row[1]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>color</td>";
                         echo "<td>$row[2]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Display size</td>";
                         echo "<td>$row[3]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>screen type</td>";
                         echo "<td>$row[4]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>HD Tech Res</td>";
                         echo "<td>$row[5]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Smart TV</td>";
                         echo "<td>$row[6]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Motion Sensor</td>";
                         echo "<td>$row[7]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>HDMI</td>";
                         echo "<td>$row[8]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>USB</td>";
                         echo "<td>$row[9]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Built In WIFI</td>";
                         echo "<td>$row[10]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Launch Year</td>";
                         echo "<td>$row[11]</td>";
                         echo "</tr>";
                         echo "</table>";
                        }      
                        else{
                            $result= mysqli_query($connection,"select * from mobilespecification where pid=$i");
                            $row = mysqli_fetch_array($result);
                         echo "<table width=\"100%\" border=\"1px\">";
                         echo "<tr>";
                         echo "<td width='50%' >OS</td>";
                         echo "<td>$row[1]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Processor</td>";
                         echo "<td>$row[2]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Color</td>";
                         echo "<td>$row[3]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>SIM Type</td>";
                         echo "<td>$row[4]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Hybrid Sim Slot</td>";
                         echo "<td>$row[5]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Display Size</td>";
                         echo "<td>$row[6]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Resolution</td>";
                         echo "<td>$row[7]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Internal Storage</td>";
                         echo "<td>$row[8]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>RAM</td>";
                         echo "<td>$row[9]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Primary Camera</td>";
                         echo "<td>$row[10]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Secondary Camera</td>";
                         echo "<td>$row[11]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Network Type</td>";
                         echo "<td>$row[12]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Battery Capacity</td>";
                         echo "<td>$row[13]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Width</td>";
                         echo "<td>$row[14]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Height</td>";
                         echo "<td>$row[15]</td>";
                         echo "</tr>";
                         echo "<tr>";
                          echo "<td>Warranty Summary</td>";
                         echo "<td>$row[16]</td>";
                         echo "</tr>";
                         echo "</table>";
                        }
                    ?>
                </div>
            </div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
