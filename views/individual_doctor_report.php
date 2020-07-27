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
//var_dump($_POST);

$allData=$obj->individual_doctor_report("obj");
//var_dump($allData);

$obj=new Payment();
$obj->prepare($_POST);
$get_all_doctor=$obj->get_all_doctor("obj");
//var_dump($get_all_doctor);


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


<div class="container">

    <h2 class="animate-flicker " style="text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif">Individual Doctors Report</h2><br>
</div>
<div class="container" style="margin:0 auto;">

    <div class="row">
   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

       <div class="col-sm-3">
           <label>Start Date</label>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
               <input  type="date"  class="form-control" id="dateTimepicker" name="Startdate" placeholder="dd/mm/yy" required>
       </div>
       <div class="col-sm-3">
           <label>End date</label>
           <input  type="date"  class="form-control" id="dateTimepicker" name="Enddate" placeholder="dd/mm/yy" required>
       </div>
<br>
<div class="col-sm-3">
        <select class="form-group" style="width: 230px;height: 35px;margin:0 auto;float:right" id="doctor"
                name="doctor_id" required>

            <option value="">Select Doctor</option>
            <?php
            if(isset($get_all_doctor)){
            foreach ($get_all_doctor as $oneData) {
                ?>
                <option value="<?php echo $oneData->doctor_id; ?>"><?php echo $oneData->name; ?></option>

            <?php } } ?>

        </select>
</div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-default" style="width: 150px">Submit</button>
        </div>
        </form>

    </div><br>












    <?php
    if(isset($allData)){
    foreach ($allData as $oneData) { $doctor_name  = $oneData->doctor_name;
        $doctor_id  = $oneData->doctor_id;
    }  ?>
    <div class="table-responsive">
        <h2 style="text-align: center"> <?php if(isset($doctor_name)) { echo $doctor_name; } ?></h2>
        <a href="individual_doctor_report_print.php?Startdate=<?php echo $_POST['Startdate']?>&Enddate=<?php echo $_POST['Enddate']?>&doctor_id=<?php echo $doctor_id; ?>&name=<?php echo $doctor_name; ?>" class="btn btn-primary btn-xs">Print</a>
        <?php } //end of if ?>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>

                <th class="text-center">Patient Name</th>
                <th class="text-center">Date</th>
                <th class="text-center">Day</th>
                <th class="text-center">Time</th>
                <th class="text-center">Dr Fee</th>


            </tr>
            </thead>
            <tbody>
            <?php

            $sum=0;

            foreach ($allData as $oneData) {

                ?>
                <tr>
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
        <h4>Total doctor income=<?php echo $sum?>Tk</h4><br><br>
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


