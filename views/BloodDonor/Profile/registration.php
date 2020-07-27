<?php
include_once('../../../vendor/autoload.php');
use App\BloodDonor\BloodDonor;
use App\BloodDonor\Auth;

use App\Message\Message;
use App\Utility\Utility;
$auth= new Auth();
$status= $auth->prepare($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_verified'] =YES;
    $obj= new BloodDonor();
    $obj->prepare($_POST)->store();
    require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    $mail->AddAddress($_POST['donor_email']);
    $mail->Username="smtaiser123@gmail.com";
    $mail->Password="543071";
    $mail->SetFrom('smtaiser123@gmail.com','User Management');
    $mail->AddReplyTo("smtaiser123@gmail.com","User Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/dopositive/views/BloodDonor/Profile/emailverification.php?donor_email=".$_POST['donor_email']."&email_verified=".$_POST['email_verified'];
    $mail->MsgHTML($message);
    $mail->Send();
}
