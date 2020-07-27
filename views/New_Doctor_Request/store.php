<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\New_Doctor_Request\New_Doctor_Request;


use App\Message\Message;
use App\Utility\Utility;
$fileName = time().$_FILES['pic']['name'];
$source = $_FILES['pic']['tmp_name'];
$destination = "images/".$fileName;
move_uploaded_file($source,$destination);

$_POST['pic'] =  $fileName;
$obj = new New_Doctor_Request();
$obj->prepare($_POST);
//var_dump($_POST);
$obj->store();
