<?php
session_start();
if (!(isset($_SESSION['n_single'])||isset($_SESSION['n_double']))){
    header('Location: project.php');
}
$price=$_SESSION['price'];
if (isset($_SESSION['n_single'])){
    $ns=$_SESSION['n_single'];
    $ms=$_SESSION['price']*30*(10/9);
}
else{
    $ns=0;
    $ms=0;
}
if (isset($_SESSION['n_double'])){
    $nd=$_SESSION['n_double'];
    $md=$_SESSION['price']*45*(10/9);
}
else{
    $nd=0;
    $md=0;
}
?>
<html>
    <head>
        <link class="logo" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">
        <style>
            .egg{
                width: 280px;
                height: 250px;
                border-radius: 1cm;
               }
               .remove{
                font-size: 17px;
                color:red;
                padding-left: 327px;
                opacity:0.6;
                position: absolute;
               }
               .remove:hover{
                cursor: pointer;
                opacity:1;
               }
               .main{
                background-color:#bbb;
                display:flex;
                padding:20px;
                border-radius: 0.5cm;
               }
               .sel{
                color:blue;
                padding-left:630px;
                position: absolute;
               }
               .sel:hover{
                cursor:pointer;
                color:#04AA6D;
               }
               .ord{
                border-radius: 0.5cm;
                background-color:#bbb;
                padding:20px;
               }
               .order{
                margin-left:360px;
                background-color:#04AA6D;
                padding: 10px 20px;
                border: none;
                color: white;
                font-size: 20px;
                border-radius: 1cm;
                width: 300px;
                cursor: pointer;
            }
            .order:hover{
                background-color:black;
                color: white;
            }
        </style>
    </head>
    <body style="background-image:url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')">
    <div style="background-color: #ddd;margin:0px 380px;padding:10px;">
    <?php if(isset($_SESSION['n_single'])){?>
    <div class="main" id="rem1">
            <div><img src="https://qph.cf2.quoracdn.net/main-qimg-d9bb45335a87c57e472950f8cec31f3d-lq" class="egg" id="egg"></div>
            <div style="padding: 15px;">
                <b><span style="font-size:25px">1 Yolk Tray (30 eggs)</span></b><br><br>
                <span style="background-color: #bbb;padding:0px;border-radius:1cm" >Qty: <?php echo $_SESSION['n_single']?></span><br><br>
                            <span style="font-size:20px" >Rs.<?php echo round($_SESSION['n_single']*$price*30,0)?>.00<span style="opacity:0.6;font-size:15px;" id="se">( <?php echo number_format((float) round($price,2), 2, '.', '');?>/egg )</span></span><br><br>
                            <s><span style="font-size:17px;" >Rs.<?php echo round($_SESSION['n_single']*$price*(300/9),0)?>.00</span></s>
                            10% Off<br><br>
                            <span style="color:#04AA6D;">You save Rs.<?php echo round($_SESSION['n_single']*$price*(30/9),0)?>.00</span>
                            <br><br><br>
                            <!-- <span class="remove" onclick="closerem1()">
                                remove
                            </span> -->
            </div>
            </div><br><br><?php }?>
            <?php if(isset($_SESSION['n_double'])){?>
            <div class="main" id="rem2">
            <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9CTQJlToICNSOWSYOLUkpzbOra4xwlZMUxA&usqp=CAU" class="egg" id="egg"></div>
            <div style="padding: 15px;">
                <b><span style="font-size:25px" >2 Yolk Tray (30 eggs)</span></b><br><br>
                <span style="background-color: #bbb;padding:0px;border-radius:1cm">Qty: <?php echo $_SESSION['n_double']?></span><br><br>
                            <span style="font-size:20px" >Rs.<?php echo round($_SESSION['n_double']*$price*45,0)?>.00</span><span style="opacity:0.6;font-size:15px;" id="se">( <?php echo round($_SESSION['price']*1.5,2)?>/egg )</span><br><br>
                            <s><span style="font-size:17px;" >Rs.<?php echo round($_SESSION['n_double']*$price*(450/9),0)?>.00</span></s>
                            10% Off<br><br>
                            <span style="color:#04AA6D;">You save <?php echo round($_SESSION['n_double']*$price*5,0)?>.00</span>
                            <br><br><br>
                            <!-- <span class="remove" onclick="closerem2()">
                                remove
                            </span> -->
            </div>
            </div><br><br><?php }?>
        <!-- <div><button class="order" onclick="document.location='cs2.php' ">Order</button></div> -->
       <div class="ord" id="or">
        <span style="font-size:22px;"><b>Order Details</b></span><br><br><hr><br>
        <span style="font-size:17px;">Bag Total</span>
        <span style="font-size:17px;text-align:right;margin-left:480px;" id="total1"></span><br><br>
        <span style="font-size:17px;">Bag Savings</span>
        <span style="font-size:13px;margin-left:457px;color:#04AA6D;font-weight:bold;" >- Rs. <?php echo round(($nd*$price*5)+($ns*$price*(30/9)),0)?>.00</span><br><br>
        <!-- <span style="font-size:20px;">Apply Coupon</span>
        <span class="sel" style="padding-left:447px;font-size:20px;">Apply</span><br><br> -->
        <span style="font-size:17px;">Delivery Fee</span>
        <span style="font-size:17px;margin-left:457px;">Rs. 0.00</span><br><br>
        <hr>
        <span style="font-size:17px;font-weight:bold;">Amount Payable</span>
        <span style="font-size:17px;margin-left:425px;" id="total2"></span><br><br><br>
        <button class="order" onclick="document.location='payment.php' " id="payment">Proceed To Payment</button>
       </div>
       </div>
        <script>
                // function closerem(){
                //     document.getElementById("rem").style.display = "none";
                //     document.getElementById("payment").onclick = function() {window.location.href = "project.php";};
                //     document.getElementById("payment").style.backgroundColor = "black";
                //     document.getElementById("payment").innerHTML= "back to home";
                //     document.getElementById("total").innerHTML= 'Rs.'+' 0.00';
                //     document.getElementById("total1").innerHTML= 'Rs.'+' 0.00';
                //     document.getElementById("total2").innerHTML= 'Rs.'+' 0.00';
                //     document.getElementById("qty").innerHTML='Qty: 0';
                //     document.getElementById("save").innerHTML='you save Rs. '+' 0.00';
                //     document.getElementById("main").innerHTML= 'Rs.'+' '+' 0.00';
                //     document.getElementById("save1").innerHTML='- Rs. '+' 0.00';
                // }
                var ns,ms,nd,md;
                ns=<?php echo $ns ?>;
                ms=<?php echo $ms ?>;
                nd=<?php echo $nd ?>;
                md=<?php echo $md ?>;
                document.getElementById("total1").innerHTML= 'Rs.'+' '+String(((ns*ms)+(nd*md)).toFixed(0))+'.00';
                document.getElementById("total2").innerHTML= 'Rs.'+' '+String(((ns*ms-(ns*(ms/10)))+(nd*md-(nd*(md/10)))).toFixed(0))+'.00';
                document.getElementById("qty").innerHTML='Qty: '+String(ns+nd);
                // document.getElementById("main").innerHTML= 'Rs.'+' '+String((ns*ms+nd*md).toFixed(0))+'.00';
                // document.getElementById("save").innerHTML='- Rs. '+String(((ns*(ms/10))+(nd*(md/10))).toFixed(0))+'.00';
                <?php $_SESSION['amount_payable']=round((($ns*$ms-($ns*($ms/10)))+($nd*$md-($nd*($md/10)))),0);?>
        </script>
    </body>
</html>