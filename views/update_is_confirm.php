<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');



use App\Message\Message;
use App\Utility\Utility;

$obj = new App\Doctor\Doctor();
$obj->prepare($_POST);
//var_dump($_POST);
$obj->update_is_confirmation();