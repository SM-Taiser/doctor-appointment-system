<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Doctor\Doctor;
use App\User\User;
use App\User\Auth;

$obj= new User();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$objDoctor=new Doctor();
$allData= $objDoctor->index("obj");


################## search  block 2 of 5 start ##################



$recordCount= count($allData);



if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;


if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;



$pages = ceil($recordCount/$itemsPerPage);
$someData = $objDoctor->indexPaginator($page,$itemsPerPage);
$allData= $someData;


$serial = (  ($page-1) * $itemsPerPage ) +1;



if($serial<1) $serial=1;
####################### pagination code block#1 of 2 end #########################################

if(isset($_REQUEST['search']) ){

    $someData =  $objDoctor->search($_REQUEST);
    $allData=$someData;
}


?>


<div align="left" class="container">
    <ul class="pagination">

        <?php

        $pageMinusOne  = $page-1;
        $pagePlusOne  = $page+1;


        if($page>$pages) Utility::redirect("index.php?Page=$pages");

        if($page>1)  echo "<li><a href='index.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";


        for($i=1;$i<=$pages;$i++)
        {
            if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
            else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

        }
        if($page<$pages) echo "<li><a href='index.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

        ?>

        <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
            <?php
            if($itemsPerPage==1 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

            if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
            else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

            if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

            if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

            if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

            if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
            else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
            ?>
        </select>
    </ul>
</div>
<!--  ######################## pagination code block#2 of 2 end ###################################### -->




<!DOCTYPE html>
<html>
<head>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">
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





    <!-- required for search, block 4 of 5 start -->

   <!--<div style="margin-left: 70%">
        <form id="searchForm" action="index.php"  method="get" style="margin-top: 5px; margin-bottom: 10px ">
            <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
            <input type="hidden" class="btn-primary" value="search">
        </form>
    </div>-->

    <!-- required for search, block 4 of 5 end -->

     <h1>Select Category</h1>



        <li><a href="../../doctorsCategory.php?catID=2">Cardiac Specialist</a></li>
        <li><a href="../../doctorsCategory.php?catID=1">Medicine Specialist</a></li>
        <li><a href="../../doctorsCategory.php?catID=6">Nefrologist</a></li>
        <li><a href="../../doctorsCategory.php?catID=3">Gynecologist</a></li>
        <li><a href="../../doctorsCategory.php?catID=5">Orthopedic</a></li>
        <li><a href="../../doctorsCategory.php?catID=7">Pediatrician</a></li>
        <li><a href="../../doctorsCategory.php?catID=4">Neurologist</a></li>

</div>

<div class="container">
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Phone</th>

        <th>Address</th>
        <th>Time</th>
        <th>Visiting Fee</th>
    </tr>
    <?php

    foreach ($allData as $oneData ){

        ?>
        <tr>
            <td><?php echo $oneData->id; ?></td>
            <td> <?php echo $oneData->name; ?></td>
            <td> <?php echo $oneData->designation; ?></td>
            <td> <?php echo $oneData->email; ?></td>
            <td> <?php echo $oneData->phone; ?></td>
            <td> <?php echo $oneData->address; ?></td>
            <td> <?php echo $oneData->time; ?></td>

            <td> <?php echo $oneData->visiting_fee; ?></td>


        </tr>
    <?php  } ?>


</table>
</div>



<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>
