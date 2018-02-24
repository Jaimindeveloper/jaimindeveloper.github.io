<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,PUT');

ini_set("SMTP","mail.gmail.com");
ini_set("smtp_port","25");
ini_set('sendmail_from', 'jaimin.suthar12@gmail.com');
$name = $_POST['name'];
$email = $_POST['email'];
$mobileno = $_POST['mobile'];
$message = $_POST['message'];
$ipaddress = $_POST['ipaddress'];
$city = $_POST['city'];
$country = $_POST['country'];
$otherDetail = $_POST['otherDetail'];

$path = "pdf/";
$filename = "jaiminpsuthar.pdf";
$file = $path.$filename;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$from_name = "Jaimin Suthar";
$from_email = "jaimin.suthar12@gmail.com";
$mail_to = $email;
$message .= "Hello Sir/Mam,\n\n";
$message .= "Thank your for subscribe my profile.\n\n\n";
$message .= "Please find attechment, I was send you my resume with attechment of your mail.\n\n\n\n";
$message .= "Thanks & Regards,\n";
$message .= "Jaimin Suthar\n";
$message .= "Software Developer\n";
$subject1 = "Jaimin suthar - Software developer";
$header1 = "From: ".$from_name." <".$from_mail.">\r\n";
$header1 .= "Reply-To: ".$replyto."\r\n";
$header1 .= "MIME-Version: 1.0\r\n";
$header1 .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header1 .= "This is a multi-part message in MIME format.\r\n";
$header1 .= "--".$uid."\r\n";
$header1 .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$header1 .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header1 .= $message."\r\n\r\n";
$header1 .= "--".$uid."\r\n";
$header1 .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
$header1 .= "Content-Transfer-Encoding: base64\r\n";
$header1 .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header1 .= $content."\r\n\r\n";
$header1 .= "--".$uid."--";
 mail($mail_to, $subject1, "", $header1);
// if (mail($mail_to, $subject1, "", $header1)) {
    
    $to = 'jaimin.suthar12@gmail.com';
    $subject = "Website Enquiry: ".$name;
    $message = "Hello Jaimin, \n";
    $message .= "\n\n\n =========== Please check below information =========== \n";
    $message .= "\n Name: ".$name;
    $message .= "\n Email Address: ".$email;
    $message .= "\n Mobile No: ".$mobileno;
    $message .= "\n Message: ".$message;
    $message .= "\n IP Address: ".$ipaddress;
    $message .= "\n City: ".$city;
    $message .= "\n Country: ".$country;
    $message .= "\n Other Details: ".$otherDetail;
    
    $headers = 'From: '.$email . "\r\n" .
        'Reply-To: '.$email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    if(mail($to,$subject,$message,$headers)) { 
        echo 0;  
    } else {
        echo 1; 
    }
    exit();
// } else {
//    echo 1; 
// }
 
 

?>
