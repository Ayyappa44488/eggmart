<?php
session_start();
if (!isset($_SESSION['cart'])){
  $cart="not_added";
}
else{
  $cart=$_SESSION['cart'];
}
$_SESSION['cart']="not_added";
if (isset($_SESSION['n_single'])||isset($_SESSION['n_double'])){
    if(isset($_SESSION['n_single'])&&isset($_SESSION['n_double'])){
      $cartno=2;
    }
    else{
      $cartno=1;
    }
}
else{
    $cartno=0;
}
if (isset($_SESSION['price'])){
$price=$_SESSION['price'];
}
else{
  header('Location: price.php');
}
if (isset($_SESSION['logoPath'])) {
$email=$_SESSION['email'];
$name=$_SESSION['name'];
$phone=$_SESSION['phone'];
$address=$_SESSION['address'];
$logoPath = $_SESSION['logoPath'];
}
else{
	$logoPath = 'data:image/png;base64,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';}
?>
<html>
    <title>Satya Bhaskara</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <head>
    <link  href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">        
    <style>
          *{
            margin:0px;
          }
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
        .order{
            background-color:#04AA6D;
            padding: 10px 20px;
            border: none;
            color: white;
            font-size: 25px;
            border-radius: 1cm;
            margin-top: 30px;
            width: 200px;
            cursor: <?php if (isset($_SESSION['email'])) echo 'pointer'; else echo 'not-allowed'; ?>;
        }
        .order:hover{
            background-color:<?php if (isset($_SESSION['email'])) echo 'black'; else echo 'red'; ?>;
            color: white;
        }
        .legg{
            background-color: #000000; /* Green */
            border: none;
            color: white;
            text-align: center;
            font-size: 25px;
            margin-right: 25px;
            padding: 10px 20px;
            border-radius: 1cm;
        }
        .iegg{
            height: 50px;
            width: 80px;
            border-color: #000000;
            border-radius: 1cm;
            font-size: 25px;
            margin-right: 60px;
            border: none;
        }
       .egg{
        width: 280px;
        height: 250px;
        margin-bottom: 20px;
        border-radius: 1cm;
        cursor: pointer;
       }
       .mar{
        font-size: 30px;
        color:#04AA6D;
       }
       .logo{
        width: 50px;
        height: 50px;
        border-radius: 2cm;
        }
        h2{
            margin-top: 40px;
        }
        .login{
            background-color:black;
            text-align: end;
            padding-left: 80px;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .userlogo{
            width: 50px;
            height: 50px;
            position: relative;
        }
        .userlogo:hover{
          transition: 0.6s;
          opacity: 50%;
        }
            .mname{
                font-size: 30px;
            }
            .open-button {
              background-color: #555;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              opacity: 0.8;
              position: fixed;
              bottom: 23px;
              right: 28px;
              width: 280px;
            }
            
            /* The popup form - hidden by default */
            .form-popup {
              display: none;
              position: fixed;
              bottom: 0;
              right: 15px;
              z-index: 1;
              text-align: left;
              border-radius: 1cm;
            }
            /* Add styles to the form container */
            .form-container {
              max-width: 300px;
              padding: 10px;
              background-color: rgb(0, 0, 0);
              border-radius: 1cm;
            }
            
            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password],.form-container input[type=email] {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background: #f1f1f1;
            }
            
            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
              background-color: #ddd;
              outline: none;
            }
            
            /* Set a style for the submit/login button */
            .form-container .btn {
              background-color: #04AA6D;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              width: 100%;
              margin-bottom:10px;
              opacity: 0.8;
            }
            
            /* Add a red background color to the cancel button */
            .form-container .cancel {
              background-color: red;
            }
            
            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
              opacity: 1;
            }
            img.avatar {
              width: 150px;
              height:150px;
              border-radius: 50%;
            }
            .search{
              margin-left: 30px;
              border-radius: 1cm;
              background-color: #ddd;
              margin-right: 10px;
              width:400px;
              height:30px;
              border: none;
            }
            .close {
              position: absolute;
              right: 25px;
              top: 0;
              color:white;
              font-size: 35px;
              font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
              color: red;
              cursor: pointer;
            }
            .ca
            {
             font-size: small;
             color: white;
             margin-left: 3px;
            }
            .main{
              display: flex;
              flex:2;
              justify-content: space-around;
              margin-top: 40px;
            }
            .sub{
              background-color:#ddd;
              padding: 20px;
              border-radius: 1cm;
            }
            .main1{
              background-color: rgb(255, 255, 255);
              margin: 10px 380px;
              margin-top: 70px;
              padding-bottom: 30px;
              border-radius: 1cm;
          }
          .h{
            background-color: black;
            color: white;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 0.5cm;
        }
        .form-container label{
          color:white;
        }
        .sign{
          width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background:#04AA6D; 
              opacity:0.8;
              color: white;
              cursor: pointer;
      }
      .sign:hover{
        opacity:1;
      }
      .cac{
        position: absolute;
        color:#04AA6D;
        font-size:small;
        margin-left:5px;
      }
      .cac:hover,
      .cac:focus{
        color:white;
        cursor:pointer;
      }
      .sa{
        width: 150px;
        height:150px;
        border-radius: 2cm;
      }
    .center1 {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 200px;
        height: 200px;
    }
    .dis{
      padding-top: 50px;
      display: none;
      background-color: #ddd;
      margin-top: 70px;
    }
    .home{
      background: none;
      margin-top: 120px;
    }
    .cartcss{
      display:none;
    }
    .cartbody{
      background-color:#ddd;
      display:flex;
      padding:20px;
      border-radius: 0.5cm;

    }
    .remove{
      font-size: 17px;
      color:red;
      padding-left: 360px;
      padding-top:30px;
      opacity:0.6;
      position: absolute;
      }
      .remove:hover{
      cursor: pointer;
      opacity:1;
      }  
      .cartorder{
            background-color:#04AA6D;
            padding: 10px 20px;
            border: none;
            color: white;
            font-size: 25px;
            border-radius: 1cm;
            margin-top: 30px;
            width: 200px;
            cursor:pointer;
        }
        .cartorder:hover{
            background-color:black;
            color: white;
        }
        .cart-count {
          position: absolute;
          top: 23px;
          right: 45px;
          width: 20px;
          height: 20px;
          background-color: white;
          color: black;
          border-radius: 50%;
          font-size: 12px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: bold;
        }
        .toast {
          position: fixed;
          bottom: 20%;
          left: 50%;
          transform: translateX(-50%);
          background-color:red;
          color: #fff;
          padding: 10px 20px;
          border-radius: 4px;
          opacity: 0;
          visibility: hidden;
          transition: opacity 0.3s, visibility 0s linear 0.3s;
          font-size:17px;
        }

        .toast.show {
          opacity: 1;
          visibility: visible;
          transition-delay: 0s;
        }
        </style>
    </head>
   <body style="background-image:url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')">         
   <div class="menu">
                <h1  style="color: white;font-size:30px">
                <div style="display:flex;align-items:center;justify-content:center;">
                <div><img class="logo" id="limg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
                <div style="margin-left: 3px;margin-right:300px;margin-top:10px;"><span>atya Bhaskara Egg Mart</span></div>
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
                <div><button class="login" onclick="cart()" id="cartbtn"><img src="cart.png" style="margin-left:40px;" class="userlogo" alt="logo"></button>
                <span class="cart-count"><?php echo $cartno?></span>
              </div>
              </div>
                </h1></div>
        <div  id="mainpage" class="home"> 
                <h2 style="color:rgb(252, 249, 249);background-color: rgb(0, 0, 0);text-align: center;"><marquee width="100%" behavior="alternate" >( Eggs Flat <span class="mar">10%</span> Off )</marquee></h2><br>
       <div class="main">
                <div class="sub">
                  <div style="display:flex">
                   <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9CTQJlToICNSOWSYOLUkpzbOra4xwlZMUxA&usqp=CAU" class="egg" id="myImg"></div>
                    <div style="padding: 15px;">
                      <span style="font-size:25px"><b>2 Yolk Tray (30 eggs)</b><br></span><br>
                        <span style="font-size:20px">Rs.<?php echo round($price*45)?>.00<span style="opacity:0.6;font-size:20px;">(<?php echo number_format((float) round($price*1.5,2), 2, '.', '');?>/egg)</span></span><br><br>
                        <span style="font-size:17px;"><s>Rs.<?php echo round($price*45*(100/90))?>.00</s>
                        <span style="color:#04AA6D;" >10% Off</span><br><br>
                        <span style="font-size:15px;color:red"><b>Cash On delivery</b></span> Available<br><br>
                        free delivery<br>  
                    </div>
                    </div>
        <form action="cart.php" method="POST" id="addcart" >
          <label class="legg" for="fname">No.of trays:</label>
          <input class="iegg" type="number" min="0" id="fname" name="n_double" placeholder="0" required>
          <input type="submit" value="Add to Cart" class="order"  name="add2">
        </form>
       </div>
       <div class="sub">
        <div style="display:flex">
        <div><img src="https://qph.cf2.quoracdn.net/main-qimg-d9bb45335a87c57e472950f8cec31f3d-lq" class="egg"></div>
        <div style="padding: 15px;">
          <span style="font-size:25px"><b>1 Yolk Tray (30 eggs)</b><br></span><br>
            <span style="font-size:20px">Rs.<?php echo round($price*30)?>.00<span style="opacity:0.6;font-size:20px;">(<?php echo number_format((float) round($price,2), 2, '.', '');?>/egg)</span></span><br><br>
            <span style="font-size:17px;"><s>Rs.<?php echo round($price*30*(100/90))?>.00</s>
            <span style="color:#04AA6D;" >10% Off</span><br><br>
              <span style="font-size:15px;color:red;"><b>Cash On delivery</b></span> Available<br><br>
              free delivery<br>
            </span>
        </div>
        </div>
        <div>
        <form action="cart.php" method="POST" id="addcart1">
        <label class="legg" for="lname">No.of trays:</label>
        <input class="iegg" type="number" min="0" id="lname" name="n_single" placeholder="0" required>
        <input type="submit" class="order" value="Add to Cart" id="sb1" name="add1">
        </form>
</div>
</div>
</div>
</div>
<div id="cart" class="cartcss">
<div style="background-color: white;margin:0px 380px;padding:10px;margin-top:100px;">

<?php 
if(isset($_SESSION['n_double'])||isset($_SESSION['n_single'])){
if(isset($_SESSION['n_single'])){?>
<div class="cartbody" id="rem1">
        <div><img src="https://qph.cf2.quoracdn.net/main-qimg-d9bb45335a87c57e472950f8cec31f3d-lq" class="egg" id="egg"></div>
        <div style="padding: 15px;">
            <b><span style="font-size:25px">1 Yolk Tray (30 eggs)</span></b><br><br>
           Qty: <button onclick="decrement1()">-</button> 
           <span id="single"><?php echo $_SESSION['n_single']?> </span>
           <button onclick="increment1()">+</button>
           <br><br>
                        <span style="font-size:20px" id="s_total">Rs.<?php echo round($_SESSION['n_single']*$price*30,0)?>.00</span>
                        <span style="opacity:0.6;font-size:15px;" id="se">( <?php echo number_format((float) round($price,2), 2, '.', '');?>/egg )</span><br><br>
                        <s><span style="font-size:17px;" id="sm_total">Rs.<?php echo round($_SESSION['n_single']*$price*(300/9),0)?>.00</span></s>
                          10% Off<br><br>
                        <span style="color:#04AA6D;" id="s_save">You save Rs.<?php echo round($_SESSION['n_single']*$price*(30/9),0)?>.00</span>
                        <br><br><br>
                        <span class="remove" onclick="closerem1()">
                            remove
                        </span>
        </div>
        </div><br><br><?php }?>
        <?php if(isset($_SESSION['n_double'])){?>
        <div class="cartbody" id="rem2">
        <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9CTQJlToICNSOWSYOLUkpzbOra4xwlZMUxA&usqp=CAU" class="egg" id="egg"></div>
        <div style="padding: 15px;">
            <b><span style="font-size:25px" id="name">2 Yolk Tray (30 eggs)</span></b><br><br>
            Qty: <button onclick="decrement2()">-</button>
            <span id="double"><?php echo $_SESSION['n_double']?> </span>
            <button onclick="increment2()">+</button><br><br>
                        <span style="font-size:20px" id="d_total">Rs.<?php echo round($_SESSION['n_double']*$price*45,0)?>.00</span><span style="opacity:0.6;font-size:15px;" id="se">( <?php echo number_format((float) round($price*1.5,2), 2, '.', '');?>/egg )</span><br><br>
                        <s><span style="font-size:17px;" id="dm_total">Rs.<?php echo round($_SESSION['n_double']*$price*(50),0)?>.00</span></s>
                          10% Off<br><br>
                        <span style="color:#04AA6D;" id="d_save">You save <?php echo round($_SESSION['n_double']*$price*5,0)?>.00</span>
                        <br><br><br>
                        <span class="remove" onclick="closerem2()">
                            remove
                        </span>
        </div>
        </div><br><br><?php }?>
        <center><img src="empty.jpg" style="display:none;" id="empty"></center>
        <center><div style="text-align:center;font-size:30px;display:none;" id="cartempty"><b>Your cart is empty</b></div></center>
        <center><button class="cartorder" onclick="document.location='cs2.php'" id="cartorder1">Order</button></center>
        <?php }else{?>
          <center><img src="empty.jpg" style="margin-top:70px;"></center>
          <center><div style="text-align: center;font-size:30px;"><b>Your cart is empty</b></div></center>
        <center><button class="cartorder" onclick="document.location='project.php' ">back</button></center><?php }?>
        </div></div>
</div>
<div id="aboutus" class="dis">
  <div><img src="founder.jpg" class="center1"></div><br>
  <div style="text-align: center;font-size:20px;"><b>Mr.Padala Subba Reddy</b> founder of satya bhaskara poultry farm.</div><br><br><br>
  <div><img src="tattaya.jpg" class="center1"></div><br>
  <div style="text-align: center;font-size:20px;"><b>Mr.Karri Siva Rama Chandra Reddy</b> ChairMan of satya bhaskara poultry farm.</div><br><br><br>
  <div><img src="daddy.jpg" class="center1"></div><br>
  <div style="text-align: center;font-size:20px;"><b>Mr.Karri Chinna Reddy</b> Managing Director of satya bhaskara poultry farm.</div><br><br><br>
  <div><img src="babai.jpg" class="center1"></div><br>
  <div style="text-align: center;font-size:20px;"><b>Mr.Karri Nagendra Kumar Reddy</b> Managing Director of satya bhaskara poultry farm.</div><br><br><br><br>
  <div style="background-color: #bbb;font-size:20px;padding:30px 30px;margin:0px 300px;">
   we sell this eggs directly from our farm.we follow the rules and regulations set by the central poultry development organisation.we sell the eggs as per the prices set
   by national egg coordination committee(NECC).we feed our hens with corn,dry fish,flour,soya,e.t.c.we feed the hens with required quantities of proteins,
   carbohydrates,vitamins,minerals,e.t.c.we grow our hens naturally.we take care of each and every hen. 
  </div><br><br><br><br>
  <div style="background-color:black;text-align:center;color:white;font-size:20px;padding:30px 30px;margin:0px 300px;">
   <b>Contact Us On </b><br><br>
   7989259929<br>
   satyabhaskara444@gmail.com<br>
   satyabhaskara444_poultry_farm@facebook<br>
   satyabhaskara_444poultry_farm@instagram<br>
   Duppalapudi,Anaparthi Mandal,East Godavari District<br>
   Andhra Pradesh-533341
  </div><br><br><br>    
</div>
<div class="form-popup" id="myForm">
  <?php
    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        // User is not logged in, display the login form
  ?>
	<form class="form-container" action="signin.php" method="POST">
		<span onclick="closeForm()" class="close" title="Close window">&times;</span>
		<center><img src="data:image/png;base64,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" alt="Avatar" class="avatar"></center><br>
    <center><br><span style="color:#F75D59;font-weight: bold;"><?php if (isset($_GET['error']) && $_GET['error'] == 1) echo 'Incorrect Username/Password';?></span></center>
    <center><br><span style="color:#F75D59;font-weight: bold;"><?php if (isset($_GET['error']) && $_GET['error'] == 2) echo 'Already had an account please Login';?></span></center>
    <center><span style="color:#F75D59;font-weight: bold;" id="please"></span></center>
		<label for="email"><b>Email</b></label>
		<input type="email" placeholder="Enter Email" name="email" required>
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="psw" id="loginpassword" minlength="6" maxlength="14" required >
    <input type="checkbox" id="showPassword" onchange="togglePasswordVisibility()">
    <label for="showPassword">Show Password</label>
		<button type="submit" class="btn" >Login</button>
		<span class="ca"><span onclick="document.location='address.php' " class="cac"><b>create an account?</b></span></span>
		<span onclick="document.location='forgotemail.php' " class="cac" style="margin-left:195px;color:#F75D59;font-weight: bold;">Forget Password?</span><br><br>
	</form>
  <?php
    } else {?>
      <form class="form-container" action="signout.php" method="POST">
      <span onclick="closeForm()" class="close" title="Close window">&times;</span>
      <center><img src=<?php echo $logoPath?> alt="Avatar" class="avatar"></center><br><br><hr><br>
      <label for="email"><b><span style="color:#04AA6D">Email:</span> <?php echo $email?></b></label>
      <br><br>
      <label for="psw"><b><span style="color:#04AA6D">Name:</span> <?php echo $name?></b></label>
      <br><br>
      <label for="phone"><b><span style="color:#04AA6D">Phone:</span> <?php echo $phone?></b></label>
      <br><br>
      <label for="address"><b><span style="color:#04AA6D">Address:</span> <?php echo $address?></b></label><br><br><hr><br>
      <button type="button" class="btn" onclick="document.location='yourorders.php' "><b>Your Orders</b></button>
      <button type="button" class="btn" onclick="document.location='changepassword.php' "><b>Change Password</b></button>
      <button type="submit" class="btn" ><b>Logout</b></button>
    </form>
    <?php
    }
    ?>
        </div>
        <!-- <div class="form-popup" id="signup">
          <form class="form-container" action="connect.php" method="POST">
          <span onclick="closeForm()" class="close" title="Close window">&times;</span>
          <center><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAVtGyzZoePFdAn290XcTlf2gL5dUPYprc7qvl2HOc25jOHrDx5Ea__YJafyiLDHrWxiE&usqp=CAU"  class="sa"></center><br>
                <label for="t1">First Name:</label>
                <input type="text" name="t1" placeholder="First Name" >
                <label for="t2">Last Name:</label>
                <input type="text" name="t2" placeholder="Last Name">
                <label for="t3">Email Id:</label>
                <input type="email" name="t3" placeholder="Email Id">
                <label for="connectpsw"><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="connectpsw" id="signinpassword" minlength="6" maxlength="14" required>
                <input type="checkbox" id="signinshowPassword" onchange="togglePasswordVisibility()">
                <label for="signinshowPassword">Show Password</label>
                <center><button type="submit" class="sign" >signup</button></center>
              </form>
        </div>   -->
        <?php
if (!isset($_SESSION['email'])) {
  echo '
  <script>
      document.getElementById("addcart").addEventListener("submit", function(event) {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("please").textContent ="Please Login";
      document.getElementById("fname").value="";
      event.preventDefault();
      });
      document.getElementById("addcart1").addEventListener("submit", function(event) {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("please").textContent ="Please Login";
        document.getElementById("lname").value="";
        event.preventDefault();
    });
    document.getElementById("cartbtn").addEventListener("click", function(event) {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("please").textContent ="Please Login";
      event.preventDefault();
    });
  </script>
  ';
}?>
<?php 
if ($cart == "added") {
  echo '
  <script>
  showToast();
  function showToast() {
    var toast = document.createElement("div");
    toast.classList.add("toast");
    toast.innerText = "Added to cart";
    document.body.appendChild(toast);
    setTimeout(function() {
        toast.classList.add("show");
        setTimeout(function() {
          toast.remove();
        }, 2000);
      }, 100);
  }  
  </script>
  ';
}?>
<script>
      <?php if (isset($_GET['error']) && ($_GET['error'] == 1||$_GET['error'] == 2)) echo 'document.getElementById("myForm").style.display = "block";'?>
      // function signup()
      // {
      //   document.getElementById("myForm").style.display = "none";
      //   document.getElementById("signup").style.display = "block";
      // }
    <?php  if (isset($_SESSION['email'])) {
      echo '
      function cart(){
        document.getElementById("aboutus").style.display = "none";
        document.getElementById("mainpage").style.display = "none";
        document.getElementById("cart").style.display = "block";  
      }  
      ';} ?>
    function closerem1() {
      document.getElementById("rem1").style.display = "none";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "reset_n_single.php", true);
      xhr.send();   
      xhr.onload = function () {
        if (this.status == 200) {
          if (this.responseText == "Back"){
          document.getElementById("cartorder1").innerHTML = this.responseText;
          document.getElementById("empty").style.display = "block";
          document.getElementById("cartempty").style.display = "block";
        }}
      };      
    }

    function closerem2() {
      document.getElementById("rem2").style.display = "none";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "reset_n_double.php", true);
      xhr.send();
      xhr.onload = function () {
        if (this.status == 200) {
          if (this.responseText == "Back"){
          document.getElementById("cartorder1").innerHTML = this.responseText;
          document.getElementById("empty").style.display = "block";
          document.getElementById("cartempty").style.display = "block";}
        }
      };   
      }
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
      document.getElementById("signup").style.display = "none";
    }
    function about(){
      document.getElementById("mainpage").style.display = "none";
      document.getElementById("cart").style.display = "none";
      document.getElementById("aboutus").style.display = "block";   
    }
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("loginpassword");
      var showPasswordCheckbox = document.getElementById("showPassword");
      if (showPasswordCheckbox.checked) {
        passwordInput.type = "text"; // Change input type to "text" to show the password
      } else {
        passwordInput.type = "password"; // Change input type back to "password" to hide the password
      }
    }
  function increment1(){
    var counter = document.getElementById('single');
    counter.innerHTML = parseInt(counter.innerHTML) + 1;
    var price=<?php echo $price?>;
    document.getElementById("s_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*30*price)}.00`;
    document.getElementById("sm_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*(300/9)*price)}.00`;
    document.getElementById("s_save").innerHTML = `You Save Rs.${Math.round(+counter.innerHTML*(30/9)*price)}.00`;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "single_increment.php", true);
    xhr.send();
  } 
  function decrement1(){
    var counter = document.getElementById('single');
    if (parseInt(counter.innerHTML) > 0) {
    counter.innerHTML = parseInt(counter.innerHTML) - 1;
    if (parseInt(counter.innerHTML) == 0) {
      document.getElementById("rem1").style.display = "none";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "reset_n_single.php", true);
      xhr.send();
      xhr.onload = function () {
        if (this.status == 200) {
          if (this.responseText == "Back"){
          document.getElementById("cartorder1").innerHTML = this.responseText;
          document.getElementById("empty").style.display = "block";
          document.getElementById("cartempty").style.display = "block";}
        }
      };   
    }
    else{
    var price=<?php echo $price?>;
    document.getElementById("s_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*30*price)}.00`;
    document.getElementById("sm_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*(300/9)*price)}.00`;
    document.getElementById("s_save").innerHTML = `You Save Rs.${Math.round(+counter.innerHTML*(30/9)*price)}.00`;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "single_decrement.php", true);
    xhr.send();}}
  } 
  function increment2(){
    var counter = document.getElementById('double');
    counter.innerHTML = parseInt(counter.innerHTML) + 1;
    var price=<?php echo $price?>;
    document.getElementById("d_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*45*price)}.00`;
    document.getElementById("dm_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*(50)*price)}.00`;
    document.getElementById("d_save").innerHTML = `You Save Rs.${Math.round(+counter.innerHTML*(5)*price)}.00`;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "double_increment.php", true);
    xhr.send();
  } 
  function decrement2(){
    var counter = document.getElementById('double');
    if (parseInt(counter.innerHTML) > 0) {
    counter.innerHTML = parseInt(counter.innerHTML) - 1;
    if (parseInt(counter.innerHTML) == 0) {
      document.getElementById("rem2").style.display = "none";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "reset_n_double.php", true);
      xhr.send();
      xhr.onload = function () {
        if (this.status == 200) {
          if (this.responseText == "Back"){
          document.getElementById("cartorder1").innerHTML = this.responseText;
          document.getElementById("empty").style.display = "block";
          document.getElementById("cartempty").style.display = "block";}
        }
      };   
    }
    else{
    var price=<?php echo $price?>;
    document.getElementById("d_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*45*price)}.00`;
    document.getElementById("dm_total").innerHTML = `Rs.${Math.round(+counter.innerHTML*(50)*price)}.00`;
    document.getElementById("d_save").innerHTML = `You Save Rs.${Math.round(+counter.innerHTML*(5)*price)}.00`;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "double_decrement.php", true);
    xhr.send();}}
  } 
      </script>
    </body>
</html>