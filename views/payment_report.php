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


use App\Payment\Payment;
$obj=new Payment();
$obj->prepare($_POST);
$allData=$obj->payment_report("obj");
//var_dump($allData);


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






    <div class="container">

        <br><br><br>
        <h1 class="animate-flicker " style="text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif">Report</h1>
    </div>
    <div class="container">

<div class="row">

        <div class="col-sm-5">
            <label>Start Date</label>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input  type="date"  class="form-control" id="dateTimepicker" name="Startdate" placeholder="dd/mm/yy" required>
        </div>
        <div class="col-sm-5">
            <label>End date</label>
            <input  type="date"  class="form-control" id="dateTimepicker" name="Enddate" placeholder="dd/mm/yy" required>
        </div>
        <div class="col-sm-2">
            <br>
            <button type="submit" class="btn btn-default">Submit</button>
        </div>


</div><br>













        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>

                    <th class="text-center">Doctor Name</th>
                    <th class="text-center">Patient Name</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Day</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Booking Fee</th>
                    <th class="text-center">Admin Fee</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $a = 5;
                $b = 6;
                list($a, $b) = array($b, $a);
                $sum=0;
                foreach ($allData as $oneData) {

                    ?>
                    <tr>
                        <td><?php echo $oneData->doctor_name; ?></td>
                        <td> <?php echo $oneData->patient_name; ?></td>
                        <td> <?php echo $oneData->date?></td>
                        <td> <?php echo $oneData->day?></td>
                        <td> <?php echo $oneData->time; ?></td>

                        <?php
                        $oneData->visiting_fee;
                        $booking_fee = 50;
                        list( $oneData->visiting_fee, $booking_fee) = array($booking_fee, $oneData->visiting_fee);
                        ?>
                        <td> <?php echo $oneData->visiting_fee; ?></td>
                        <td> <?php echo $oneData->visiting_fee-30; ?></td>
                        <?php $sum+= $oneData->visiting_fee-30;?>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <h4>Total Admin Fee=<?php echo $sum?>Tk</h4><br><br>
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

