<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../vendor/autoload.php");

use App\Payment\Payment;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Payment();
$obj->prepare($_GET);
//var_dump($_GET);
$obj->delete();


Utility::redirect($path);