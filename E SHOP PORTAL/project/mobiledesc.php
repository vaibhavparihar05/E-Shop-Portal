<?php
    if(isset($_POST['datasubmit'])){
        $pid=$_GET['x'];
        $os=$_POST['OS'];
        $processor=$_POST['prcsr'];
        $color=$_POST['clr'];
        $sim=$_POST['st'];
        $hbdSim=$_POST['HybridSimSlot'];
        $display=$_POST['ds'];
        $resolution=$_POST['rsltn'];
        $internalStorage=$_POST['is'];
        $ram=$_POST['RAM'];
        $Pcamera=$_POST['pc'];
        $Scamera=$_POST['sc'];
        $network=$_POST['nt'];
        $battery=$_POST['bc'];
        $width=$_POST['wdt'];
        $height=$_POST['hgt'];
        $warranty=$_POST['ws'];
        
        include'./bdconnection.php';
        $connection= mysqli_connect(hostname,username, password,database);
        $qry=("INSERT INTO mobilespecification(pid,os,processor,color,sim_type,hybrid_sim_slot,display_size,resolution,internal_storage,ram,primary_camera,secondary_camera,network_type,battery_capacity,width,height,warranty_summary) values($pid,'$os','$processor','$color','$sim','$hbdSim','$display','$resolution','$internalStorage','$ram','$Pcamera','$Scamera','$Scamera','$battery','$width','$height','$warranty')");
        $result=mysqli_query($connection, $qry);
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
                width: 470px;
                height:810px;
                background-image:linear-gradient( to bottom ,#ccffff,#66ffff,#ffffcc,#ffffcc,#66ffff,#ccffff);
                flex:1;
                margin-top: 45px;
                border: 8px brown double ;
                border-radius: 9px;
                box-shadow: 4px 4px 4px 4px #999999;
            }
            input{
                margin-top: 10px;
            }
            input[type="text"]{
                 width: 230px;
                 height:25px;
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
            <div style="flex: 4;"align="center">
                <div class="dabba">
                    <form method="post">
                        <table align="center" padding="3px" style="padding-top: 10px">
                            <tr>
                                <td><input type="text" value="<?php if(isset($_GET['x'])){echo $_GET['x']; } ?>" name="pid" placeholder="Product Id"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="OS" placeholder="Operating System"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="prcsr" placeholder="Processor"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="clr" placeholder="color"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="st" placeholder="Sim Type"/></td>
                            </tr>
                            <tr>
                                <td style="color:brown">Hybrid Sim Slot
                                <input type="radio" value="yes" name="HybridSimSlot" />Yes
                                <input type="radio" value="no" name="HybridSimSlot" />No</td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="ds" placeholder="Display Size"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="rsltn" placeholder="Resolution"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="is" placeholder="Internal Storage"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="RAM" placeholder="RAM"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="pc" placeholder="Primary Camera"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="sc" placeholder="Secondary Camera"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="nt" placeholder="Network Type"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="bc" placeholder="Battery Capacity"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="wdt" placeholder="Width"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="hgt" placeholder="Height"/></td>
                            </tr>
                            <tr>
                                <td><input type="text" value="" name="ws" placeholder="Warranty Summary"/></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Submit" name="datasubmit" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
