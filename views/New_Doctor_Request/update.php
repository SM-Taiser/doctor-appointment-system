<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\New_Doctor_Request\New_Doctor_Request;
use App\Message\Message;
use App\Utility\Utility;
if( $_FILES['pic_new']['name']!="" ) {
    $fileName = time() . $_FILES['pic_new']['name'];
    $source = $_FILES['pic_new']['tmp_name'];
    $destination = "images/" . $fileName;
    move_uploaded_file($source, $destination);
    $_POST['pic'] =  $fileName;
}
else {
    $_POST['pic'] = $_POST['pic_old'];
}

$obj = new New_Doctor_Request();

$obj->prepare($_POST);
//var_dump($_POST);

$obj->update();