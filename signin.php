<?php 
session_start();

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email=$_POST['email'];
    $password=$_POST['psw'];
    $conn=new mysqli('127.0.0.1','root','','test');
    if($conn->connect_error){
        die('Connection Failed:'.$conn->connection_error);
    }
    else{
        $query="SELECT * FROM signup WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            $logoPath ='logo2.png';
            $_SESSION['logoPath']=$logoPath;
            $_SESSION['email']=$email;
            while ($row = mysqli_fetch_assoc($result)) {
                // Access individual columns by their name
                $column1 = $row['firstname'];
                $column2 = $row['lastname'];
                $column3 = $row['phone'];
                $a1 = $row['dno'];
                $a2 = ucwords($row['sname']);
                $a3 = ucwords($row['village']);
                $a4 = ucwords($row['district']);
                $a5 = ucwords($row['state']);
                $a6 = ucwords($row['pincode']);
                $a7 = ucwords($row['local']);
                $name=$column1." ".$column2;
                $name=ucwords($name);
                $phone=$column3;
                $address=$a1.", ".$a2.", ".$a3.", ".$a4.", ".$a5.", ".$a6.", ".$a7;
              }
            $_SESSION['name']=$name;
            $_SESSION['phone']=$phone;
            $_SESSION['address']=$address;
            $width = 150;
            $height = 150;
            $image = imagecreatetruecolor($width, $height);
            $backgroundColor = imagecolorallocate($image,4,170,109); // White
            $textColor = imagecolorallocate($image, 255,255,255); // Red
            imagefill($image, 0, 0, $backgroundColor);
            $initials = strtoupper(substr($column2, 0, 1));
            $initials .= strtoupper(substr($column1, 0, 1));
            $fontFile = 'C:\Windows\Fonts\Arial.ttf';
            $fontSize = 72;
            $textWidth = imagettfbbox($fontSize, 0, $fontFile, $initials);
            $textWidth = $textWidth[2] - $textWidth[0];
            $textHeight = imagettfbbox($fontSize, 0, $fontFile, $initials);
            $textHeight = $textHeight[1] - $textHeight[7];
            $x = ($width - $textWidth) / 2;
            $y = ($height - $textHeight) / 2 + $textHeight;
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontFile, $initials);
            imagepng($image, 'logo2.png');
            imagedestroy($image);
            mysqli_free_result($result);
            header('Location: project.php');
            }
        else{
            header('Location: project.php?error=1');
        }    
}
}
?>