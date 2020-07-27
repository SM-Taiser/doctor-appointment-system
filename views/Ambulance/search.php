<?php

include_once('../../vendor/autoload.php');
use App\Ambulance\Ambulance;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

/*
$key1 = $_GET['city'];
$key2 = $_GET['blood_grp'];


$obj= new BloodDonor();
$obj->prepare($_SESSION);
$singleUser = $obj->search($key1,$key2);
*/
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <style>

        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: orange;
        }



        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }

    </style>
</head>

<body  style="background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<?php include ('font_end_navbar.php');?><br>









    <header class="tab-content">

    </header>

    <div class="container text-center"><h1 style="font-family: Georgia,serif">
           
    </div>

    <div class="container">

        <br><br><br>
        <h1 class="animate-flicker "   style=" font-weight:normal;text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif"   >Search Result</h1>




        <div class="table-responsive" style="color: black">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>

            <tr>
                <th class="text-center">Ambulance Service Provider</th>
                <th class="text-center">Address</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Category</th>

            </tr>

            </thead>
            <tbody>

            <?php
            $serial = 0;
            $keyWord = $_GET['city'];
            $keyWord1=$_GET['specification'];
            $keyWords = $_GET['area_coverage'];
            //  var_dump($_GET);
            // echo $keyWord;
            $obj = new Ambulance();
            $allData=$obj->search( $keyWord,$keyWord1,$keyWords);
            //  var_dump($allData);
            foreach ($allData as $oneData ){

                ?>
                <tr>
                    <td> <?php echo $oneData->comp_name; ?></td>
                    <td> <?php echo $oneData->address; ?></td>
                    <td> <?php echo $oneData->phone?></td>
                    <td> <?php echo $oneData->specification; ?></td>



                </tr>
            <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- Javascript -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<![endif]-->
</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>


<!-- Bootstrap DataTable -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<!-- /Bootstrap DataTable -->



</html>
