<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Ambulance\Ambulance;
use App\Ambulance\Auth;

use App\Message\Message;
use App\Utility\Utility;

$auth= new Auth();
$status= $auth->log_out();

//session_destroy();
unset($_SESSION['ambulance_email']);
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
 Utility::redirect('../Profile/signup.php');