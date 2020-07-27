<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Ambulance\Ambulance;
use App\Message\Message;
use App\Utility\Utility;
$obj=new \App\Admin\Admin();

$obj=new \App\Driver\Driver();
//var_dump($_POST);

$obj->prepare($_POST);
//var_dump($_POST);
$obj->update();

