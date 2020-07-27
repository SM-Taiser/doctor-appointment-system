<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\Ambulance\Ambulance;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Ambulance();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);