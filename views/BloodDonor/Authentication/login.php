<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\BloodDonor\Auth;


use App\Message\Message;
use App\Utility\Utility;

$auth= new Auth();
$status= $auth->prepare($_POST)->is_registered();

if($status){
    $_SESSION['donor_email']=$_POST['donor_email'];


    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
     Utility::redirect('../Profile/donors-profile.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    Utility::redirect('../Profile/signup.php');

}


