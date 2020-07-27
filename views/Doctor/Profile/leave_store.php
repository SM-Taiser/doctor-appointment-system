<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Leave\Leave;


use App\Message\Message;
use App\Utility\Utility;

$obj = new Leave();



$obj->prepare($_POST);

$obj->store();
