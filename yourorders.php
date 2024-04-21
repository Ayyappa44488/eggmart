<?php 
session_start();
$email=$_SESSION['email'];
$conn=new mysqli('localhost','root','','test');
$query="SELECT * FROM transaction WHERE email='$email' ";
$result=mysqli_query($conn,$query);
?>
<html>
<head>
<link  href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">        
<title>Your Orders</title>
</head>
<style>
body{
margin:0px;
}
.egg{
width: 280px;
height: 250px;
margin-bottom: 40px;
border-radius: 1cm;
cursor: pointer;
}
.cartbody{
background-color:#ccc;
display:flex;
padding:20px;
}
.fixed{ /* Adjust this value based on the height of your fixed background */
  background-color: #eee;
  margin:0px ;
  padding:10px 200px;
}
button:hover{
    opacity:0.6;
    cursor:pointer;
}
</style>
<body>   
<div class="fixed">
<center><h1 style="color:#fff;background-color:#04AA6D;">Your Orders</h1></center><br><br>
<?php if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $price=$row['price']; ?>
        <h2>Order Date: <?php echo date('d-m-Y', strtotime($row['date']));?></h2><br>  
<?php if ($row['one_yolk']>0){?>              
<div class="cartbody"> 
<div><img src="https://th.bing.com/th/id/R.6e10fd5ffcad2f3aee30f2a5d1eca372?rik=mY6Iq7rTZ2BnzQ&riu=http%3a%2f%2fwww.onehappyplace.com%2fwp-content%2fuploads%2f2014%2f05%2f7MinuteEggTopA.jpg&ehk=GXoh54EXdKgk9INolQd%2bA18ftkDhraovh9Dwta5CraY%3d&risl=&pid=ImgRaw&r=0" class="egg" id="egg"></div>
<div style="padding: 15px;">
    <b><span style="font-size:25px">1 Yolk Tray (30 eggs)</span></b><br><br>
    Qty:
    <span id="single"><?php echo $row['one_yolk']?> </span>
    <br><br>
    <span style="font-size:20px" id="s_total">Rs.<?php echo round($row['one_yolk']*$price*30,0)?>.00</span>
    <span style="opacity:0.6;font-size:15px;" id="se">( <?php echo number_format((float) round($price,2), 2, '.', '');?>/egg )</span><br><br>
    <s><span style="font-size:17px;" id="sm_total">Rs.<?php echo round($row['one_yolk']*$price*(300/9),0)?>.00</span></s>
        10% Off<br><br>
    <span style="color:#04AA6D;" id="s_save">You save Rs.<?php echo round($row['one_yolk']*$price*(30/9),0)?>.00</span>
    <br><br><br>
    </div></div><?php } ?>
  <?php if ($row['two_yolk']>0 && $row['one_yolk']){?><hr style="border:1px solid ;"><?php } ?> 
<?php if ($row['two_yolk']>0){?>    
<div class="cartbody">      
<div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9CTQJlToICNSOWSYOLUkpzbOra4xwlZMUxA&usqp=CAU" class="egg" id="egg"></div>
<div style="padding: 15px;">
    <b><span style="font-size:25px" id="name">2 Yolk Tray (30 eggs)</span></b><br><br>
    Qty: <span id="double"><?php echo $row['two_yolk']?> </span><br><br>
    <span style="font-size:20px" id="d_total">Rs.<?php echo round($row['two_yolk']*$price*45,0)?>.00</span><span style="opacity:0.6;font-size:15px;" id="se">( <?php echo number_format((float) round($price*1.5,2), 2, '.', '');?>/egg )</span><br><br>
    <s><span style="font-size:17px;" id="dm_total">Rs.<?php echo round($row['two_yolk']*$price*(50),0)?>.00</span></s>
        10% Off<br><br>
    <span style="color:#04AA6D;" id="d_save">You save <?php echo round($row['two_yolk']*$price*5,0)?>.00</span>
    <br><br><br>  
    </div><br><br></div><?php } ?>
    <br>
    <h2>Amount Paid: <?php echo $row['amount_paid']?>.00</h2><br><br>
    <hr style="border: 2px solid ;"><br><br>
<?php }?>
<center><button onclick="window.location.href='project.php'" style="background-color:#04AA6D;color:#fff;padding:10px;border-radius:5px;">Go to Home</button><center> 
<?php }else{?>
 <center><h1>No Orders Yet</h1><center>
  <button onclick="window.location.href='project.php'" style="background-color:#04AA6D;color:#fff;padding:10px;border-radius:5px;">Go to Home</button>  
<?php } ?>   
</div>
</body>   
</html>