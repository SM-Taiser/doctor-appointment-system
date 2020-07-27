<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../../vendor/autoload.php");

use App\Driver\Driver;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Driver();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);