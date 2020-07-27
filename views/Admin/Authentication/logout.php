<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Auth();
$status= $auth->log_out();
unset($_SESSION['admin_email']);
//session_destroy();
session_unset();
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
return Utility::redirect('../Profile/signup.php');