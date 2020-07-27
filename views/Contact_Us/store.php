<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Contact_Us\Contact_Us;


use App\Message\Message;
use App\Utility\Utility;

$obj = new Contact_Us();

$obj->prepare($_POST);

$obj->store();
