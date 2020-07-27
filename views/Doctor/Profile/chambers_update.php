<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Chambers\Chambers;
use App\Message\Message;
use App\Utility\Utility;

$obj = new Chambers();

  $obj->prepare($_POST);
 // var_dump($_POST);

$obj->update();

