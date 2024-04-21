<html>
    <head>
        <link class="logo" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU" rel="icon" type="image/x-icon">
        <style>
            h1{
                font-size: 30; 
                text-align: center;
                color: white;
                margin-top: 0%;
            }
            label{
                font-size :20px;
            }
            .main{
                background-color:#ddd;
                margin: 10px 370px;
                padding-top: 20px;
                padding-bottom: 30px;
                border-radius: 1cm;
            }
            input{
                height: 35px;
                width: 420px;
                font-size: 20px;
            }
            .state{
                height: 40px;
                width: 420px;
                font-size: 25px;
            }
            .order{
            text-align: center;
            background-color:#04AA6D;
            border:none;
            padding: 15px 32px;
            color: white;
            font-size: 20px;
            border-radius: 2cm;
            margin-top: 10px;
            width: 200px;
            cursor: pointer;
        }
        .order:hover{
            background-color: black;
            color: white;
        }
        .logo{
            width: 50px;
        height: 50px;
        border-radius: 2cm;
        }
        .cac{
        position: absolute;
        color:#04AA6D;
        font-size:medium;
      }
      .cac:hover,
      .cac:focus{
        color:blueviolet;
        cursor:pointer;
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
    <body style="background-image: url('https://cdn.britannica.com/56/155656-050-EF76EB04/chickens-poultry-farm.jpg')";>
         <div style="background-color:black;height:70px;padding-top:20px;">
            <h1  style="color: white;margin-top:0cm;font-size:30px" align="center" >
                <div style="display:flex;margin-left:640px;">
               <div style="margin-top:5px;"><img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXtMEL68z41vqJh6ZYXBvZbN_9ZhWxnOVvMQ&usqp=CAU"></div>
               <div style="margin-left: 3px;margin-top:18px;"><span class="s">Signup Page</span></div></div>
              </h1></div>
            <div class="loader-overlay" id="loaderOverlay">
                <div class="loader"></div>
            </div>
         <div class="main">
         <table align="center">
         <form id="signup" method="post" action="connect.php">
            <tr>
            <td><label for="email">Email:</label></td>
            <td colspan="2"><input type="email" name="email" id="email" placeholder="Enter your email"required></td>
            </tr>
            <tr>
            <td><label for="fname">First Name:</label></td>
            <td colspan="2"><input type="text" name="fname" id="fname" placeholder="Enter your firstname" required></td>
            </tr>
            <tr>
            <td><label for="lname">Last Name:</label></td>
            <td colspan="2"><input type="text" name="lname" id="lname" placeholder="Enter your lastname" required></td>
            </tr>
            <tr>
            <td><label for="pno">Phone No:</label></td>
            <td colspan="2"><input type="text" name="pno" id="pno" placeholder="Enter your pno" maxlength="10"required></td>
            </tr>
            <tr>
            <td><label for="loginpassword">Password:</label></td>
            <td colspan="2"><input type="password"  name="psw" id="logpassword" minlength="6" maxlength="14" placeholder="Enter your password" required ></td></tr>
            <tr>
            <td></td>
            <td><input type="checkbox" id="swPassword" onchange="togglePasswordVisibility()" name="showpassword" style="align:left;height:15px;width:15px;"></td>
            <td><label for="swPassword" style="font-size:15px;">Show Password</label></td>
            </tr>
            <tr>
            <td colspan="2"><label><b>Enter Your Address:</b></label></td>
            </tr>
            <tr>
            <td><label for="dno">Door No:</label></td>
            <td colspan="2"><input type="text" name="dno" id="dno" required></td>
            </tr>
            <tr>
            <td><label for="sname">Street Name:</label></td>
            <td colspan="2"><input type="text" name="sname" id="sname" required></td>
            </tr>
            <tr>
            <td><label for="village">Village/Town/City:</label></td>
            <td colspan="2"><input type="text" name="village" id="village" required></td>
            </tr>
            <tr>
            <td><label for="dis">District:</label></td>
            <td colspan="2"><input type="text" name="dis" id="dis" required></td>
            </tr>
            <tr>
            <td ><label for="state">State:</label></td>
            <td colspan="2">
                <input list="states" id="state" name="state">
                <datalist id="states">
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharastra">Maharastra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttarakhad">Uttarakhand</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Others">Others</option>  
                </datalist>
            </td>
            </tr>
            <tr>
            <td><label for="pin">Pincode:</label></td>
            <td colspan="2"><input type="text" name="pin" id="pin" required></td>
            </tr>
            <tr>
                <td>
                 <label for="local">Locality(optional):</label>   
                </td>
                <td colspan="2"><input type="text" name="local" id="local"></td>
            </tr>
            <tr><td><center><button class="order" type="submit" name="signup">Sign Up</button></center></td></tr>
            </form>
         </table>
         </div>
        <script>
        function togglePasswordVisibility() {
        var passwordInput = document.querySelector('input[name="psw"]');
        var showPasswordCheckbox = document.querySelector('input[name="showpassword"]');
            if (showPasswordCheckbox.checked) {
            passwordInput.type = "text"; // Change input type to "text" to show the password
          } else {
            passwordInput.type = "password"; // Change input type back to "password" to hide the password
          }}
          function showLoader() {
                document.getElementById("loaderOverlay").style.display = "flex";
                }
                function hideLoader() {
                document.getElementById("loaderOverlay").style.display = "none";
                }
                document.getElementById("signup").addEventListener("submit", function() {
                showLoader();
                });
            </script>
        </body>
</html>