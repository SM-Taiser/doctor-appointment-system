<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message;
use App\Utility;
use App\Doctor\Doctor;


$objDoctor = new Doctor();


    $objDoctor->prepare($_GET);
    $objDoctor->is_delete();


