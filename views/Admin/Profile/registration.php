<?php
include_once('../../../vendor/autoload.php');
use App\Admin\Admin;

use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;
$auth= new Auth();
$status= $auth->prepare($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_verified '] ='Yes';
    $obj= new Admin();
    $obj->prepare($_POST);
    //var_dump($_POST);

     $obj->store();
    require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['admin_email']);
    $mail->Username="amanatjuwel@gmail.com";
    $mail->Password="ju711884";
    $mail->SetFrom('amanatjuwel@gmail.com','User Management');
    $mail->AddReplyTo("amanatjuwel@gmail.com","User Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/UserManagement/views/SEIPXXXX/User/Profile/emailverification.php?admin_email=".$_POST['admin_email']."&email_verified =".$_POST['email_verified '];
    $mail->MsgHTML($message);
    $mail->Send();
}
