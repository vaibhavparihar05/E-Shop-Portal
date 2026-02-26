<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <title>dsgn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                display: flex;
                flex-direction: column;
            }
            ul a{
                text-decoration: none;
                color: #ccffcc; 
                margin-right: 80px; 
                font-size: 18px;
            }
            .a{
                text-decoration: none;
                color: #660033;
                font-family: Arial;
                font-size: 25px;
                display: block;
                padding: 23px 15px;
                
            }
            .headSection{
               /*border: 2px solid;*/
                width: 100%;
                height:40px;
                font-family: sans-serif; 
                background-color: brown;
            }
            .nav{
                display: flex;
                flex-direction: row;
                background-color: #ffffcc;
                height: 70px;
            }
            .blank{
                flex:1
            }
            .logo{
                
                max-height: 70px;
                flex:1;
            }
            .navInfo{
                flex:6;
            }
            .navInfo ul{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .navInfo li{
               display: inline-block;
            }
            main{
                height:490px;
            }
            .footer{
                background-color: brown;
                text-align: center;
                height:40px;
                color: #ccffcc;
            }
        </style>
    </head>
    <body>
        <div class="headSection">
            <ul>
            <a href="">About us</a>
            <a href="">Privacy</a>
            <a href="">FAQ</a>
            </ul>
        </div>
        <div class="nav">
            <div class="blank"></div>
            <img class="logo" src="logo.jpg">
            <div class="navInfo"
                <ul>
                <li><a class="a" style="margin-left: 30px;" href="">Home</a></li>
                <li><a class="a" href="">Laptop</a></li>
                <li><a class="a" href="">Mobile</a></li>
                <li><a class="a" href="">Sign In</a></li>
                <li><a class="a" href="">Sign Up</a></li>
                <li><a class="a" href="">Cart</a></li>
                <li><a class="a" href="">Contact Us</a></li>
                <li><a class="a" href="">Admin</a></li>
                </ul>
            </div>
        </div>
        <main>
            
        </main>
        <div class="footer"><sup>©</sup> Rights reserved by VP</div>
    </body>
</html>
