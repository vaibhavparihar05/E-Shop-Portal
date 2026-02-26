<?php
    if(isset($_POST['sbmtbtn'])){
        $name=$_POST['txtname'];
        $email=$_POST['txtemail'];
        $phn=$_POST['phno'];
        $fqtxt=$_POST['FAQtxt'];
        $date=date("Y-m-d");
        
        
        include './bdconnection.php';
        $connection = mysqli_connect(hostname,username,password,database);
        $query = ("INSERT INTO contactus(name,email,phoneno,message,date) VALUES('$name','$email',$phn,'$fqtxt','$date')");
        $result = mysqli_query($connection, $query);
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
            .contact{
                flex:1;
                background-image: linear-gradient(to left ,lightgoldenrodyellow,lightblue,skyblue,lightblue,#9999ff);
                padding-left: 90px;
                padding-top: 30px;
            }
            .mydetail{
                background-image: linear-gradient(to left  ,#9999ff,lightblue,skyblue,lightblue,lightgoldenrodyellow);
                flex:1;
                /*text-align: center;*/
                padding-top: 60px;
            }
            .dabba{
                width: 400px;
                height:400px;
                background-image:linear-gradient( to bottom ,#ccffff,#66ffff,#ffffcc,#ffffcc,#66ffff,#ccffff);
                border: 8px brown double ;
                border-radius: 9px;
                box-shadow: 4px 4px 4px 4px #999999;
            }
            input{
                margin-top: 10px;
                width:250px;
                height:25px;
            }
            textArea{
                margin-top: 25px;
                width:250px;
                height:130px;
            }
            .box1{
                padding-top: 10px;
                background-color: #ccccff;
                width: 270px;
                padding-left: 10px;
                margin-top: 20px;
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
            <div class="contact">
                <h2><i><b>Query/Feedback Form</b></i></h2>
                <div class="dabba"align="center">
                    <form method='post'>
                        <table style="margin-top: 20px">
                            <tr>
                                <td><input type="text" value="" name="txtname" placeholder="Enter Name" /></td>
                            </tr>
                            <tr>
                                <td><input type="email" value="" name="txtemail" placeholder="Enter e-mail Id" /></td>
                            </tr>
                            <tr>
                                <td><input type="number" value="" name="phno" placeholder="Enter Phone Number" /></td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea width="" height="" placeholder="your query/feedback" name='FAQtxt'></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><input style="background-color: #33cc00;color: #ccffff" type="submit" value="Send" name="sbmtbtn" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="mydetail">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14282.884523904448!2d80.2666109!3d26.4969224!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c37ea522f9c0d%3A0xc0670941a068aea2!2sChhatrapati%20Shahu%20Ji%20Maharaj%20University%2C%20Kanpur!5e0!3m2!1sen!2sin!4v1688982748475!5m2!1sen!2sin" width="300" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="box1">
                    Organization Name:<br>
                    Web Site:<br>
                    visit us:-<br>
                    <i>the details <br>
                        that you are looking for<br><!-- comment -->
                        are prohibited.</i>
                </div>
            </div>
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
