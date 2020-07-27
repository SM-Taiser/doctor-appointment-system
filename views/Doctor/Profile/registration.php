<?php
include_once('../../../vendor/autoload.php');
use App\Doctor\Doctor;




use App\Doctor\Auth;

use App\Message\Message;
use App\Utility\Utility;
$auth= new Auth();
$status= $auth->prepare($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_verified'] ="YES";

    $fileName = time().$_FILES['pic']['name'];
    $source = $_FILES['pic']['tmp_name'];
    $destination = "images/".$fileName;
    move_uploaded_file($source,$destination);

    $_POST['pic'] =  $fileName;
    $objDoctor= new Doctor();



//START SEND SMS
    $to = "".$_POST['phone']."";

    $token = "b6859008ab9bf6c486318a85341392b7";
    $message = "Hello doctor , you can login now ,your email id  and password is -- ".$_POST['email']."-- ".$_POST['password']." #DoctorPateintEfficientPortal ";

    $url = "http://sms.greenweb.com.bd/api.php";

    $data= array(
        'to'=>"$to",
        'message'=>"$message",
        'token'=>"$token"
    ); // Add parameters in key value
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
//END SEND SMS


$objDoctor->prepare($_POST);
$objDoctor->store();




    require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    $mail->AddAddress($_POST['email']);
    $mail->Username="smtaiser123@gmail.com";
    $mail->Password="543071";
    $mail->SetFrom('smtaiser123@gmail.com','User Management');
    $mail->AddReplyTo("smtaiser123@gmail.com","User Management");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/UserManagement/views/SEIPXXXX/User/Profile/emailverification.php?email=".$_POST['email']."&email_verified=".$_POST['email_verified'];
    $mail->MsgHTML($message);
    $mail->Send();
}
