<?php
ob_start();
if (!isset($_SESSION)) session_start();
include_once('../vendor/autoload.php');
use App\Doctor\Doctor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;
$obj = new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$objDoctor = new Doctor();
$allData = $objDoctor->index("obj");



$auth = new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if (!$status) {
    Utility::redirect('admin/Profile/signup.php');
    return;
}

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

</head>

<body>
<?php include('navbar_views.php') ?>

<div id="message">

    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
        echo "&nbsp;" . Message::message();
    }
    Message::message(NULL);

    ?>
</div>


<header class="tab-content">



    <div class="container">

        <br><br><br>
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


        <!--  ######################## pagination code block#2 of 2 end ###################################### -->

        <!-- <form class="form-inline pull-left" action="searchResult.php" method="get">-->

        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Picture</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">City</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Visiting Fee</th>
                    <th class="text-center">Is Active?</th>

                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($allData as $oneData) {

                    ?>
                    <tr>
                        <td><?php echo $oneData->id; ?></td>
                        <td> <?php echo $oneData->name; ?></td>
                        <td> <img src="Doctor/Profile/images/<?php echo $oneData->pic ?>" style="width:100px; height:100px;" alt="" /><br /></td>
                        <td> <?php echo $oneData->gender?></td>
                        <td> <?php echo $oneData->city?></td>
                        <td> <?php echo $oneData->phone; ?></td>
                        <td> <?php echo $oneData->visiting_fee; ?></td>
                        <?php if($oneData->is_active=='Yes'){ ?>
                            <td class="btn-success"> <?php echo $oneData->is_active; ?></td>
                        <?php } else{ ?>
                            <td class="btn-danger"> <?php echo $oneData->is_active; ?></td>
                        <?php } ?>



                        <td>

                            <a href="edit.php?id=<?php echo $oneData->id ?>" class="btn btn-info" role="button"><span
                                        class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="trash.php?id=<?php echo $oneData->id ?>" class="btn btn-danger" role="button"><span
                                        class="glyphicon glyphicon-warning-sign"></span> Trash</a>
                            <a href="delete.php?id=<?php echo $oneData->id ?>" class="btn btn-primary" role="button"><span
                                        class="glyphicon glyphicon-trash"></span> Delete</a>

                            <a href="vieww.php?id=<?php echo $oneData->id ?>" class="btn btn-success" role="button"><span
                                        class="glyphicon glyphicon-user"></span> view profile</a>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>



<!-- Bootstrap DataTable -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<!-- /Bootstrap DataTable -->
<!-- Javascript -->

<script src="../resource/assets/bootstrap/js/bootstrap.min.js"></script>



<!--[if lt IE 10]>

<![endif]-->

</html>
