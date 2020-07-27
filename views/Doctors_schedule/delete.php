<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../vendor/autoload.php");

use App\Appointment\Appointment;

use App\Message\Message;
use App\Utility\Utility;

$obj = new Appointment();
$obj->prepare($_GET);
$obj->admin_delete_doctors_schedule();


Utility::redirect($path);