<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../vendor/autoload.php");

use App\Doctor\Doctor;

use App\Message\Message;
use App\Utility\Utility;

$objDoctor = new Doctor();
$objDoctor->prepare($_GET);
$objDoctor->delete();


Utility::redirect($path);