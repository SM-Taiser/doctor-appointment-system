<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\Patient\Patient;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Patient();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);