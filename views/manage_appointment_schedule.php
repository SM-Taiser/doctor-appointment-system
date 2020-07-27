<?php
ob_start();
if (!isset($_SESSION)) session_start();
include_once('../vendor/autoload.php');
use App\Doctor\Doctor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Payment\Payment;
use App\Message\Message;
use App\Utility\Utility;
$obj = new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$obj = new Payment();
$allData = $obj->manage_appointment_schedule("obj");
//var_dump($allData);



$auth = new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if (!$status) {
    Utility::redirect('admin/Profile/signup.php');
    return;
}


######################## pagination code block#1 of 2 start ######################################




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
    <style>
        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: ;
        }



        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
</head>

<body>

<?php include('navbar_views.php') ?>





<div class="container">

    <div id="message">

        <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
            echo "&nbsp;" . Message::message();
        }
        Message::message(NULL);

        ?>
    </div>
    <h1 class="animate-flicker " style="text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif">Manage</h1>
</div>
<div class="container">



















    <?php
    //
    //    ################## search  block 2 of 5 start ##################
    //
    //
    //    $recordCount = count($allData);
    //
    //
    //    if (isset($_REQUEST['Page'])) $page = $_REQUEST['Page'];
    //    else if (isset($_SESSION['Page'])) $page = $_SESSION['Page'];
    //    else   $page = 1;
    //    $_SESSION['Page'] = $page;
    //
    //
    //    if (isset($_REQUEST['ItemsPerPage'])) $itemsPerPage = $_REQUEST['ItemsPerPage'];
    //    else if (isset($_SESSION['ItemsPerPage'])) $itemsPerPage = $_SESSION['ItemsPerPage'];
    //    else   $itemsPerPage = 3;
    //    $_SESSION['ItemsPerPage'] = $itemsPerPage;
    //
    //
    //    $pages = ceil($recordCount / $itemsPerPage);
    //    $someData = $objDoctor->indexPaginator($page, $itemsPerPage);
    //    $allData = $someData;
    //
    //
    //    $serial = (($page - 1) * $itemsPerPage) + 1;
    //
    //
    //    if ($serial < 1) $serial = 1;
    //    ####################### pagination code block#1 of 2 end #########################################
    ?>


    <!--    <div align="left" class="container">-->
    <!--        <ul class="pagination">-->
    <!---->
    <!--            --><?php
    //
    //            $pageMinusOne = $page - 1;
    //            $pagePlusOne = $page + 1;
    //
    //
    //            if ($page > $pages) Utility::redirect("manage-doctor.php?Page=$pages");
    //
    //            if ($page > 1) echo "<li><a href='manage-doctor.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
    //
    //
    //            for ($i = 1; $i <= $pages; $i++) {
    //                if ($i == $page) echo '<li class="active"><a href="">' . $i . '</a></li>';
    //                else  echo "<li><a href='?Page=$i'>" . $i . '</a></li>';
    //
    //            }
    //            if ($page < $pages) echo "<li><a href='manage-doctor.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";
    //
    //            ?>
    <!---->
    <!--            <select class="form-control" name="ItemsPerPage" id="ItemsPerPage"-->
    <!--                    onchange="javascript:location.href = this.value;">-->
    <!--                --><?php
    //                if ($itemsPerPage == 1) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
    //                else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';
    //
    //                if ($itemsPerPage == 4) echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
    //                else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';
    //
    //                if ($itemsPerPage == 5) echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
    //                else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';
    //
    //                if ($itemsPerPage == 6) echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
    //                else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';
    //
    //                if ($itemsPerPage == 10) echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
    //                else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';
    //
    //                if ($itemsPerPage == 15) echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
    //                else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
    //                ?>
    <!--            </select>-->
    <!--        </ul>-->
    <!--    </div>-->

    <!--  ######################## pagination code block#2 of 2 start ###################################### -->

    <div class="container">
        <!--  ######################## pagination code block#2 of 2 end ###################################### -->

        <!-- <form class="form-inline pull-left" action="searchResult.php" method="get">-->



    <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
            <tr>
                <th class="text-center">Doctor Name</th>
                <th class="text-center">Patient Name</th>
                <th class="text-center">Chamber Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Day</th>
                <th class="text-center">Time</th>
                <th class="text-center"> Visiting Fee</th>
                <th class="text-center">Transaction ID</th>
                <th class="text-center">Is Read?</th>


                <th class="text-center">Action</th>
            </tr>
                </thead>
          <tbody>
            <?php

            foreach ($allData as $oneData) {

                ?>
                <tr>
                    <td> <?php echo $oneData->doctorname?></td>
                    <td> <?php echo $oneData->patientName?></td>
                    <td> <?php echo $oneData->chamberName?></td>
                    <td> <?php echo $oneData->date?></td>
                    <td> <?php echo $oneData->day?></td>
                    <td><?php echo $oneData->time?></td>
                    <td> <?php echo  $oneData->amount; ?></td>
                    <td> <?php echo $oneData->transaction_id; ?></td>
                    <?php if($oneData->is_read == 1){ ?>
                    <td class="btn btn-success">Yes</td>
                    <?php } else{ ?>
                    <td class="btn btn-warning">No</td>
                    <?php } ?>

                    <td>
                        <form action="is_read_update.php" method="post">
                            <input type="hidden" name="schedule_id" value="<?php echo $oneData->schedule_id?>">
                            <input type="hidden" name="is_read" value="1">
                            <input type="hidden" name="phone" value="<?php echo $oneData->phone?>">
                            <input type="hidden" name="date" value="<?php echo $oneData->date?>">
                            <input type="hidden" name="day" value="<?php echo $oneData->day?>">
                            <input type="hidden" name="time" value="<?php echo $oneData->time?>">
                            <input type="submit" value="Mark as Checked" class="btn btn-success">
                        </form>
                        <a  onclick="return confirm('Are you sure you want to delete this item?');" href="appointment_schedule_delete.php?schedule_id=<?php echo $oneData->schedule_id?>" class="btn btn-primary" role="button"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


        <!-- Bootstrap DataTable -->
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
        <!-- /Bootstrap DataTable -->


        <script src="../resource/assets/bootstrap/js/bootstrap.min.js"></script>

</html>
