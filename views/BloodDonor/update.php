<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\BloodDonor\BloodDonor;
use App\Message\Message;
use App\Utility\Utility;

$obj = new BloodDonor();

$obj->prepare($_POST);

$obj->updates();

