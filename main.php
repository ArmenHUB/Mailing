<?php
ini_set('display_errors', 'On');
require_once "z_config.php";
require_once "z_mysql.php";
require_once "errors.php";
require 'PHPMailer/PHPMailerAutoload.php';

$org_name = $_POST['org_name'];
$contact = $_POST['contact'];
$region_id = $_POST['regionId'];
$town = $_POST['town'];
$mail_send = $_POST['email'];
$phone = $_POST['phone'];
$customer = $_POST['customer'];
$partners_company_name = $_POST['partners_company_name'];
$partners_product_name = $_POST['partners_product_name'];
$computers = $_POST['computers'];

//$con = new Z_MySQL();
//$con->queryDML("INSERT INTO `hhh` VALUES ('{$contact}')");


function SendMail($org_name,$contact,$region_id,$town,$mail_send,$phone,$customer,$partners_company_name,$partners_product_name,$computers){
$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'akbert12080@gmail.com';          // SMTP username
$mail->Password = 'am098321088'; // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect to
$garik = "garik.datoyan@lanar.am";
$mail->setFrom($mail_send, 'DLP Safetica');
$mail->addReplyTo($mail_send, 'DLP Safetica');
$mail->addAddress($mail_send);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>ESETNOD32</h1>';
$bodyContent .= '<p>Organization name -'.$org_name.'</p>';
$bodyContent .= '<p>Contact -'.$contact.'</p>';
$bodyContent .= '<p>RegionID -'.$region_id.'</p>';
$bodyContent .= '<p>Town -'.$town.'</p>';
$bodyContent .= '<p>@mail -'.$mail_send.'</p>';
$bodyContent .= '<p>Phone -'.$phone.'</p>';
$bodyContent .= '<p>Customer Y/N -'.$customer.'</p>';
$bodyContent .= '<p>Company Name -'.$partners_company_name.'</p>';
$bodyContent .= '<p>Product Name -'.$partners_product_name.'</p>';
$bodyContent .= '<p>Count Computers -'.$computers.'</p>';

$mail->Subject = 'Email from Localhost By Mohsin Shoukat';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    // visit our site www.studyofcs.com for more learning
}

}
SendMail($org_name,$contact,$region_id,$town,$mail_send,$phone,$customer,$partners_company_name,$partners_product_name,$computers);
