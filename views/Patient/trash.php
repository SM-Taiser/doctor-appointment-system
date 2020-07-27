<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message;
use App\Utility;



$obj = new App\Patient\Patient();


    $obj->prepare($_GET);
    $obj->is_delete();


