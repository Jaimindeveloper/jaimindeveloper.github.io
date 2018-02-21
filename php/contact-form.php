<?php
header("Access-Control-Allow-Orgin: *");
header("Access-Control-Allow-Methods: *");

$name = $_POST['name'];
$email = $_POST['email'];
$mobileno = $_POST['mobile'];
$message = $_POST['message'];
$ipaddress = $_POST['ipaddress'];
$city = $_POST['city'];
$country = $_POST['country'];
$otherDetail = $_POST['otherDetail'];

$to = 'jaimin.suthar12@gmail.com';
$subject = "Website Enquiry: ".$name;
$message = "Hello Jaimin,<br/>";
$message .= "<br/><br/><br/> =========== Please check below information =========== <br/>";
$message .= "<Br/> Name: ".$name;
$message .= "<Br/> Email Address: ".$email;
$message .= "<Br/> Mobile No: ".$mobileno;
$message .= "<Br/> Message: ".$message;
$message .= "<Br/> IP Address: ".$ipaddress;
$message .= "<Br/> City: ".$city;
$message .= "<Br/> Country: ".$country;
$message .= "<Br/> Other Details: ".$otherDetail;

$headers = 'From: '.$email . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to,$subject,$message,$headers)) { 
    echo 0;  
} else {
    echo 1; 
}
?>