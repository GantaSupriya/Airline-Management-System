
<?php
require_once('Database Connection file/mysqli_connect.php');
// require('PHPMailer/PHPMailerAutoload.php');
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer();
if(isset($_POST) & !empty($_POST)){
$email = mysqli_real_escape_string($dbc, $_POST['email']);
$sql = "SELECT * FROM `customer` WHERE email = '$email'";
$res = mysqli_query($dbc, $sql);
$count = mysqli_num_rows($res);
if($count == 1){
$r = mysqli_fetch_assoc($res);
$password = $r['pwd'];
$to = $r['email'];
$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
if(mail($to, $subject, $message, $headers)){
echo "Your Password has been sent to your email id";
}else{
echo "Failed to Recover your password, try again";
}
 
}else{
echo '<span style="color:#AFA;"> Email does not exist in database"</span>';
}
}

 
 
?>