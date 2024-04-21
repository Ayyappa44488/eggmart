<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link  href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">        
<style>
.accordion {
  background-color: #eee;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color:#ddd;
  overflow: hidden;
}
.main{
  background-color:black;
  margin: 10px 470px;
  margin-top: 140px;
  padding:30px;
  border-radius: 1cm;
  justify-content: center;
  align-items: center;
}
.upi{
  width:300px;
  height:300px;
}
.card{
  width:455px;
  height: 50px;
  margin-bottom: 30px;
}
.dat{
  width:200px;
  height: 50px;
  margin-right:135px;
  margin-bottom: 30px;
}
.logo{
  width: 50px;
  height: 50px;
  border-radius: 2cm;
  }
  .order{
    text-align: center;
    background-color:#04AA6D;
    padding: 15px 32px;
    color: white;
    font-size: 25px;
    border: none;
    border-radius: 2cm;
    margin-top: 30px;
    width: 400px;
    cursor: pointer;
}
.order:hover{
    background-color: black;
    color: white;
}
.loader-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  display: none; /* Initially hide the loader */
}

.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #4CAF50; /* Change the loader color here */
  width: 60px;
  height: 60px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body style="background-image:url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')">
  <div style="background-color:black">
  <h1  style="color: white;margin-top:0cm;font-size:30px" align="center" >
    <div style="display:flex;margin-left:635px;">
   <div style="margin-top:5px;"><img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
   <div style="margin-left: 3px;margin-top:18px;">Payment Page</div></div>
  </h1></div>
<div class="main">
<button class="accordion"><b>UPI</b></button>
<div class="panel">
<center><img src="upi.jpg" class="upi"></center>
</div>

<button class="accordion"><b>Credit\Debit Cards</b></button>
<div class="panel">
<div style="margin-top: 30px;"><input type="text" placeholder="Card Number" class="card"></div>
<div><input type="text" placeholder="Card Name" class="card"></div>
<div style="display:flex;">
  <div><input type="date" class="dat"></div>
  <div><input style="height: 50px;width: 117px;" type="number" placeholder="CVV" ></div>
</div>
</div>
<button class="accordion"><b>Cash On Delivery</b></button>
<div class="panel">
<p><input type="checkbox" id="cod" name="cod"><label for="cod">Cash On Delivery</label></p>
</div>
</div>
<center><button class="order" onclick="confirm()">Confirm Payment</button></center>
<div class="loader-overlay" id="loaderOverlay">
    <div class="loader"></div>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
function confirm(){
document.getElementById("loaderOverlay").style.display = "flex";
setTimeout(function(){ 
  window.location.href = "transaction.php";
}, 0);
} 
</script>

</body>
</html>
