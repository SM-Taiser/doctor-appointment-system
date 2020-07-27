<?php
require_once ("../vendor/autoload.php");
use App\Doctor\Doctor;

use App\Message\Message;
use App\Utility\Utility;
$objDoctor = new Doctor();
$objDoctor->prepare($_GET);
//Utility::dd($objDoctor);
$objDoctor->recoverDoc();

Utility::redirect("manage-doctor.php");