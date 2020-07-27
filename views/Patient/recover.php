<?php
require_once ("../../vendor/autoload.php");
use App\Patient\Patient;

use App\Message\Message;
use App\Utility\Utility;
$obj = new Patient();
$obj->prepare($_GET);
//Utility::dd($objDoctor);
$obj->recoverDoc();

Utility::redirect("manage-patient.php");