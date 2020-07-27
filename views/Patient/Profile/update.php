<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;

$obj = new App\Patient\Patient();

$obj->prepare($_POST);

$obj->update();

