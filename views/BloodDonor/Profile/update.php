<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\BloodDonor\BloodDonor;
use App\Message\Message;
use App\Utility\Utility;
$obj=new \App\Admin\Admin();
$obj = new BloodDonor();
//var_dump($_POST);

$obj->prepare($_POST);

$obj->update();
