<?php
if (!isset($_SESSION)) session_start();
include_once('../../vendor/autoload.php');
use App\BloodDonor\BloodDonor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj = new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth = new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if (!$status) {
    Utility::redirect('Admin/Profile/signup.php');
    return;
}
?>


<!DOCTYPE html>
<html>
<head>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">
    <link href="../../resource/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../resource/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="../../resource/css/nivo-lightbox.css" rel="stylesheet"/>
    <link href="../../resource/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css"/>
    <link href="../../resource/css/owl.carousel.css" rel="stylesheet" media="screen"/>
    <link href="../../resource/css/owl.theme.css" rel="stylesheet" media="screen"/>
    <link href="../../resource/css/animate.css" rel="stylesheet"/>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: ;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            text-align: left;
        }

        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
</head>


<body style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<?php include('navbar_views.php') ?>

<div id="message">

    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
        echo "&nbsp;" . Message::message();
    }
    Message::message(NULL);

    ?>
</div>


<header class="tab-content">


   <!-- <h1 style="font-family: Georgia,serif">Hello <?php echo "$singleUser->first_name $singleUser->last_name" ?>! </h1>-->
    <p style="color:black;font-family: Georgia,serif"><u>Welcome to backend view</u></p>
</header>

<h1 class="animate-flicker" style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Trash List</h1>


<table class="table table-striped table-striped2 table-bordered">
    <tr style="color: black">
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">City</th>
        <th class="text-center">Blood Group</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Address</th>
        <th class="text-center">Action</th>
    </tr>
    <?php
    $obj = new BloodDonor();
    $allData = $obj->index_trash("obj");
    foreach ($allData as $oneData) {

        ?>
        <tr style="color: black;">
            <td><?php echo $oneData->id; ?></td>
            <td> <?php echo $oneData->name; ?></td>
            <td> <?php echo $oneData->donor_email; ?></td>
            <td> <?php echo $oneData->city; ?></td>
            <td> <?php echo $oneData->blood_grp; ?></td>
            <td> <?php echo $oneData->phone; ?></td>
            <td> <?php echo $oneData->address; ?></td>


            <td><a href="edit.php?id=<?php echo $oneData->id ?>" class="btn btn-info" role="button"><span
                        class="glyphicon glyphicon-edit"></span> Edit</a>
                <a href="delete.php?id=<?php echo $oneData->id ?>" class="btn btn-danger" role="button"><span
                        class="glyphicon glyphicon-danger"></span> Delete</a>
                <a href="recover.php?id=<?php echo $oneData->id ?>" class="btn btn-success" role="button"><span
                        class="glyphicon glyphicon-success"></span> Recover</a>


            </td>
        </tr>
    <?php } ?>

</table>

</div>
<!-- Javascript -->
<script src="../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../resource/assets/js/placeholder.js"></script>
<![endif]-->
</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>
