<?php

include_once('../../../vendor/autoload.php');
use App\AppointmentSchedule\AppointmentSchedule;


use App\Message\Message;
use App\Utility\Utility;

$obj = new AppointmentSchedule();

$obj->prepare($_POST);

$obj->store();
