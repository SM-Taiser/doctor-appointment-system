<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();

use App\Appointment\Appointment;
$obj = new Appointment();
$obj->prepare($_GET);
$singleUser  = $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">



<body>

<div class="container">

    <div class="col-md" >
        <div class="jumbotron">
        <h3 class="a" style="color: black">

            Please complete your payment through Bkash.<br>
            Send us your bkash Transaction ID to confirm your booking.<br>
            Bkash merchant number:01878152754
        </h3>
        </div>
        <div class="container">
        <form action="appointment_schedule_store.php">
            <input type="hidden" name="doctor_id" value="<?php echo $_GET['id']  ?>" >
            <input type="hidden" name="chamb_id" value="<?php echo $_GET['chamb_id']  ?>" >
            <input type="text" name="id" value="<?php echo $_GET['visiting_fee']  ?>" >
            <input type="text" name="patient_id" value="<?php echo 10 ?>" >
            <input type="hidden" name="date" value="<?php echo $_GET['date']  ?>" >
            <input type="hidden" name="time" value="<?php echo $_GET['time']  ?>" >
            <input type="hidden" name="token" value="<?php echo $_GET['date'].$_GET['time']?>">
            <div class="form-group text-center">
                <label for="Transaction ID">Transaction ID</label>
                <input type="number" class="form-control" style="width: 30%;margin: auto"align="" id="Transaction ID" placeholder="Transaction ID" name="transaction_id">
            </div>

            <button type="submit" class="btn btn-default">Confirm</button>
        </form>
        </div>
    </div>
</div>
<?php



?>


<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>
