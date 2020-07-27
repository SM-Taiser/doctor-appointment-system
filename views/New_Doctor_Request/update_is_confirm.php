<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');


use App\Message\Message;
use App\Utility\Utility;


use App\Patient\Patient;
//START SEND SMS
$obj = new \App\Doctor\Doctor();
$to = "".$_POST['phone']."";
//echo $to;
$token = "b6859008ab9bf6c486318a85341392b7";
$message = "Hello doctor, you can login now-- #DoctorPateintEfficientPortal ";

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
//var_dump($_POST);

$obj->prepare($_POST);
//var_dump($_POST);
$obj->update_is_confirmation();