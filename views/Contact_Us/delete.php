<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\Contact_Us\Contact_Us;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Contact_Us();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);