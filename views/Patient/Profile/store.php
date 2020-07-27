<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\PatientsInfo\PatientsInfo;


use App\Message\Message;
use App\Utility\Utility;


$fileName = time().$_FILES['file']['name'];
$source = $_FILES['file']['tmp_name'];
$destination = "images/".$fileName;
move_uploaded_file($source,$destination);

$_POST['file'] =  $fileName;
$obj= new PatientsInfo();
$obj->prepare($_POST)->store();

