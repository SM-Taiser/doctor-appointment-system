<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');
use App\Doctor\Doctor;


use App\Message\Message;
use App\Utility\Utility;

$objDoctor = new Doctor();
$objDoctor->prepare($_POST);

$objDoctor->store();
