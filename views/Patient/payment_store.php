<?php

include_once('../../vendor/autoload.php');
use App\AppointmentSchedule\AppointmentSchedule;


use App\Message\Message;
use App\Utility\Utility;

$obj = new App\Payment\Payment();
$obj->prepare($_POST);
//var_dump($_POST);
$obj->store();
