<?php
$path = $_SERVER['HTTP_REFERER'];
require_once ("../../../vendor/autoload.php");




use App\Message\Message;
use App\Utility\Utility;

$obj=new \App\Chambers\Chambers();
$obj->prepare($_GET);
$obj->delete();


Utility::redirect($path);