<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>

<?php

include_once('../vendor/autoload.php');
use App\Payment\Payment;
$obj=new Payment();
$obj->prepare($_GET);
//var_dump($_POST);

$allData=$obj->individual_doctor_report("obj");
//var_dump($allData);
?>

<body onload="window.print();">

<!-- Main content -->
<section class="content">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <center>

                    <p> Report</p>
                    <h2 style="text-align: center"><?php  echo $_GET['name'];  ?></h2>
                    <p><b>From: </b><?php echo $_GET['Startdate']?> <b>To: </b><?php echo $_GET['Enddate']?></p>
                </center>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th style="text-align:left">Patient Name</th>
                                <th style="text-align:left">Date</th>
                                <th style="text-align:left">Day</th>
                                <th style="text-align:left">time</th>
                                <th style="text-align:left">Dr Fee</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sum=0;

                            foreach ($allData as $oneData) {

                            ?>
                            <tr>
                                <td></td>
                                <td> <?php echo $oneData->patient_name; ?></td>
                                <td> <?php echo $oneData->date?></td>
                                <td> <?php echo $oneData->day?></td>
                                <td> <?php echo $oneData->time; ?></td>

                                <?php
                                $oneData->visiting_fee;
                                $booking_fee = 50;
                                list( $oneData->visiting_fee, $booking_fee) = array($booking_fee, $oneData->visiting_fee);
                                ?>
                                <td> <?php echo $oneData->visiting_fee-20; ?></td>

                                <?php $sum+= $oneData->visiting_fee-20;?>
                            </tr>
                            <?php }?>

                            </tbody>
                        </table>
                        <p class="text text-danger pull-right">Total: <?php echo $sum?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p style="font-size: 90%; text-align: center">
        © Copright 2018 | All Rights Reserved To  | Powered By C133018 and C133015
    </p>
</section>
<!-- End Main Content -->
</body>
</html>