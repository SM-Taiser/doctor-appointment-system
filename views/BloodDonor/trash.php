<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message;
use App\Utility;
use App\BloodDonor\BloodDonor;


$obj = new BloodDonor();


    $obj->prepare($_GET);
    $obj->is_delete();


