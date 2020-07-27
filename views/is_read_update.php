<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');
use App\Driver\Driver;
use App\Message\Message;
use App\Utility\Utility;
$obj=new \App\Admin\Admin();
$obj = new App\Payment\Payment();
//var_dump($_POST);

//START SEND SMS
$to = "".$_POST['phone']."";

$token = "1d65f1725661dab5da2afb989f074959";
$message = "Hello, User Your Appoinment has been confirmed at -- ".$_POST['date']."-- ".$_POST['day']."  ".$_POST['time']."-- #DoctorPateintEfficientPortal";

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

$obj->prepare($_POST);

$obj->update_is_read();

