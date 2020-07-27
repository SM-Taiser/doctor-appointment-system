<?php

include_once('../../vendor/autoload.php');
use App\Ratings\Ratings;
$obj=new Ratings();
$obj->prepare($_POST);
//var_dump($_POST);
$obj->store();
