<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\Ratings\Ratings;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Ratings();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);