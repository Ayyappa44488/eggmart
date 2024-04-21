<?php
session_start();
if (isset($_SESSION['logoPath'])) {
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$logoPath = $_SESSION['logoPath'];
}
else{
	$logoPath = 'data:image/png;base64,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';}
?>
<html>
    <head>
        <title>Navbar</title>
        <style>
            .menu{
                background-color:black;
                text-align: left;
                position: fixed;
                top: 0;
                overflow: hidden;
                width: 100%;
                padding: 10px 0px;
            }
        .ayyappa{
        background-color:black;
        color: white;
        padding: 15px 25px;
        text-align: center;
        font-size: medium;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        border: none;
        
        }
        .ayyappa:hover{
            background-color: aliceblue;
            color: rgb(3, 3, 3);
            border-radius: 1cm;
        }
        .logo{
            width: 50px;
            height: 50px;
            border-radius: 2cm;
            }
            .login{
                background-color:black;
                text-align: end;
                padding-left: 60px;
                border: none;
            } 
            .userlogo{
            width: 60px;
            height: 60px;
            position: relative;
        }
        .userlogo:hover{
          transition: 0.6s;
          opacity: 50%;
        }   
        </style>
        </head>
        <body>
            <div class="menu">
                <h1  style="color: white;font-size:30px">
                <div style="display:flex;align-items:center;justify-content:center;">
                <div><img class="logo" id="limg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
                <div style="margin-left: 3px;margin-right:300px;"><span>atya Bhaskara Egg Mart</span></div>
                <div>
                <!-- <input class="search" type="search" placeholder="   search" name="search">
                <i class="fa fa-search" aria-hidden="true" style="color:white;font-size:medium" for="search"></i> -->
                </div>
                <div>
                  <button class="ayyappa"onclick="document.location='project.php' ">Home</button>
                   <button class="ayyappa"onclick="about()">About Us</button>
                  <button class="ayyappa" onclick="document.location='https://www.e2necc.com/home/eggprice' ">Egg Prices</button>
                  <button class="ayyappa"onclick="document.location='https://kb.rspca.org.au/knowledge-base/what-should-i-feed-my-backyard-hens/#:~:text=Examples%20of%20raw%20fruits%20and,in%20small%20amounts%20%5B1%5D.'">food</button>
                  </div> 
                  <div><button class="login" onclick="openForm()"><img src="<?php echo $logoPath; ?>" style="border-radius:50%" class="userlogo" alt="logo"></button></div>   
              </div>
                </h1></div>
        </body>
</html>