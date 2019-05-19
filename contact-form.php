<?php

if(isset($_POST)) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$message = $_POST['message'];
	$ipaddress = $_POST['ipaddress'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$otherDetail = $_POST['otherDetail'];

	//define the receiver of the email
	$to = 'jaimin.suthar12@gmail.com';
	//define the subject of the email
	$subject = 'My Website Project Enquiry';
	//create a boundary string. It must be unique

	$message = "Dear Jaimin,\n";
	$message .= "\n\nCongratulation You got new project Enquiry, Please check below details.\n";

	$message .= "\n\nName: ". $name;
	$message .= "\nEmail Address: ". $email;
	$message .= "\nMobile No: ". $mobile;
	$message .= "\nMessages: ". $message;
	$message .= "\nIp Address: ". $ipaddress;
	$message .= "\nCity: ". $city;
	$message .= "\nCountry: ". $country;
	$message .= "\nOther Details: ". $otherDetail;

	$message .= "\n\nThank you.\n";

	//so we use the MD5 algorithm to generate a random hash
	$random_hash = md5(date('r', time()));
	//define the headers we want passed. Note that they are separated with \r\n
	$headers = "From: admin@admin.com\r\nReply-To: webmaster@example.com";
	//add boundary string and mime type specification
	$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
	$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
	$headers .= "Content-Transfer-Encoding: 8bit";
	//read the atachment file contents into a string,
	//encode it with MIME base64,
	//and split it into smaller chunks
	//$attachment = chunk_split(base64_encode(file_get_contents('../invoice/'.$filename_dynamic.'.pdf')));

	//define the body of the message.
	ob_start(); //Turn on output buffering

	// copy current buffer contents into $message variable and delete current output buffer
	// $message = ob_get_clean();
	// send the email
	$mail_sent = @mail( $to, $subject, $message, $headers );
	//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
	echo $mail_sent ? 0 : 1;
	exit;
}

?>