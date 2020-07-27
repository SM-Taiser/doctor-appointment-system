<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Patient\Patient;
use App\Message\Message;
use App\Utility\Utility;

$obj = new Patient();

$obj->prepare($_POST);

$obj->updates();

