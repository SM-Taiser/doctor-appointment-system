<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Doctor\Doctor;
use App\User\User;
use App\User\Auth;

use App\Message;
use App\Utility;

$obj= new User();
$obj->prepare($_SESSION);
$singleUser = $obj->view();





?>






<!DOCTYPE html>
<html>
<head>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">
    <style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: left;
}
</style>
</head>

<body>

<div class="container">

    <table align="center">
        <tr>
            <td height="100" >

            

            </td>
        </tr>
    </table>

    <div style="margin-left: 70%">
        <form id="searchForm" action="index.php"  method="get" style="margin-top: 5px; margin-bottom: 10px ">
            <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
            <input type="hidden" class="btn-primary" value="search">
        </form>
    </div>



     <h1>Select Category</h1>



    <a href="doctor-category.php?category=1">Medicine</a><br>
    <a href="doctor-category.php?category=2">Cardiology</a><br>
    <a href="doctor-category.php?category=3">Gynecologist</a><br>
    <a href="doctor-category.php?category=4">Neurologist</a><br>
    <a href="doctor-category.php?category=5">Orthopedic</a><br>
    <a href="doctor-category.php?category=6">Nefrologist</a><br>
    <a href="doctor-category.php?category=7">Pediatrician</a><br>
    <a href="doctor-category.php?category=8">Nose,Ear & Throat</a><br>
    <a href="doctor-category.php?category=9">Diabetes & Hormones</a><br>
    <a href="doctor-category.php?category=10">Surgery</a><br>


    <table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Category</th>
    <th>Designation</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Visiting Fee</th>
      <th>Address</th>
      <th> Time</th>
  </tr>
  <?php
     
     $objDoctor = new  Doctor();
     $objDoctor->prepare($_GET);
     $singleItem  =  $objDoctor->doctor_category("obj");

       
   ?>
  <tr>
    <td><?php echo $singleItem->id; ?></td>
    <td> <?php echo $singleItem->name; ?></td>
    <td>

     <?php 
     if($singleItem->category==1){
      echo "Medicine";
     }

     else if($singleItem->category==2){
      echo "Cardiology";
     }
     else if($singleItem->category==3){
         echo "Gynecologist";
     }
     else if($singleItem->category==4){
         echo "Neurologist";
     }
     else if($singleItem->category==5){
         echo "Orthopedic";
     }
     else if($singleItem->category==6){
         echo "Nefrologist";
     }
     else if($singleItem->category==7){
         echo "Pediatrician";
     }
     else if($singleItem->category==8){
         echo "Nose,Ear & Throat";
     }
     else if($singleItem->category==9){
         echo "Diabetes & Hormones";
     }
     else if($singleItem->category==10){
         echo "Surgery";
     }


     ?>
      

    </td>
    <td> <?php echo $singleItem->designation; ?></td>
    <td> <?php echo $singleItem->address; ?></td>
    <td> <?php echo $singleItem->phone; ?></td>

      <td> <?php echo $singleItem->time; ?></td>

      <td> <?php echo $singleItem->visiting_fee; ?></td>
  </tr>
<?php // } ?>

</table>
    
</div>


<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>
