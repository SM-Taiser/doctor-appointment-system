<?php
require_once ("../../vendor/autoload.php");
use App\BloodDonor\BloodDonor;

use App\Message\Message;
use App\Utility\Utility;
$obj = new BloodDonor();
$obj->prepare($_GET);
//Utility::dd($objDoctor);
$obj->recoverDoc();

Utility::redirect("manage-bloodDonor.php");