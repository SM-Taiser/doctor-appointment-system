<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\BloodDonor\BloodDonor;

use App\Message\Message;
use App\Utility\Utility;

$obj = new BloodDonor();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);