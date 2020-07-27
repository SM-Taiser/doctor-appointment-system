<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Chambers\Chambers;


use App\Message\Message;
use App\Utility\Utility;

$obj = new Chambers();

/*
$fileName = time().$_FILES['pic']['name'];
$source = $_FILES['pic']['tmp_name'];
$destination = "images/".$fileName;
move_uploaded_file($source,$destination);

$_POST['pic'] =  $fileName;
*/

$obj->prepare($_POST);

$obj->store();
