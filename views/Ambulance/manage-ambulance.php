<?php

if (!isset($_SESSION)) session_start();
include_once('../../vendor/autoload.php');

use App\Admin\Admin;
use App\Admin\Auth;
use App\Ambulance\Ambulance;
use App\Message\Message;
use App\Utility\Utility;
$obj = new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$obj = new Ambulance();
$allData = $obj->index("obj");


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

<div id="message">

    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
        echo "&nbsp;" . Message::message();
    }
    Message::message(NULL);

    ?>
</div>






<div class="container">

    <br><br><br>
    <h1 class="animate-flicker " style="text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif">Manage</h1>
</div>

    

</div>
<div class="container">
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->

    <!-- <form class="form-inline pull-left" action="searchResult.php" method="get">-->


    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Company Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">City</th>
            <th class="text-center">Area Coverage</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Action</th>
        </tr>
            </thead>
        <tbody>
        <?php

        foreach ($allData as $oneData) {

            ?>
            <tr>
                <td><?php echo $oneData->amb_comp_id; ?></td>
                <td> <?php echo $oneData->comp_name; ?></td>
                <td> <?php echo $oneData->ambulance_email; ?></td>
                <td> <?php echo $oneData->city?></td>
                <td><?php echo $oneData->area_coverage?></td>
                <td> <?php echo $oneData->phone; ?></td>
                <td> <?php echo $oneData->address; ?></td>


                <td>   <a href="edit.php?amb_comp_id=<?php echo $oneData->amb_comp_id ?>" class="btn btn-info" role="button"><span
                                class="glyphicon glyphicon-edit"></span> Edit</a>
                    <a href="delete.php?amb_comp_id=<?php echo $oneData->amb_comp_id ?>" class="btn btn-primary" role="button"><span
                                class="glyphicon glyphicon-trash"></span> Delete</a>

                    <a href="view.php?amb_comp_id=<?php echo $oneData->amb_comp_id ?>" class="btn btn-success" role="button"><span
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

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>


</html>
