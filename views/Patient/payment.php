<?php
require_once ("../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();

use App\Appointment\Appointment;
$obj = new Appointment();
$obj->prepare($_GET);
//var_dump($_GET);

//var_dump($singleUser);
use App\Doctor\Doctor;
$objDoctor=new Doctor();
$objDoctor->prepare($_POST);
//var_dump($_GET);
$singleUser  = $objDoctor->vieww();





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">


<body>
<?php include ('font_end_navbar.php');?><br>

<div class="container">

    <div class="col-md" >
        <div class="jumbotron" style="background-color: #51BFEC;color: white">
            <h3 style="text-align:center;color: white">
                Doctor name:   <?php echo $singleUser->name."<br>"?>
                Visiting Fee:  <?php echo $singleUser->visiting_fee."<br>"?>
               Appointment Date & Time:  <?php echo $_GET['date']?>; <?php echo $_GET['day']?> - <?php echo $_GET['time']."<br>"?>

                Please send us 50 tk for booking <br>
                Send us your bkash Transaction ID to confirm your booking.<br>
                 number:01878152754
            </h3>
        </div>
        <div class="container" style="text-align: center">
            <form id="myForm" action="payment_store.php" method="post" onsubmit="return(validate());">
                <input type="hidden" name="doctor_id" value="<?php echo $_GET['id']  ?>" >
                <input type="hidden" name="patient_id" value="<?php  echo $_SESSION['id']; ?>" >
                <input type="hidden" name="chamb_id" value="<?php echo $_GET['chamb_id']  ?>" >
                <input type="hidden" name="date" value="<?php echo $_GET['date']  ?>" >
                <input type="hidden" name="day" value="<?php echo $_GET['day']  ?>" >
                <input type="hidden" name="time" value="<?php echo $_GET['time']  ?>" >
                <input type="hidden" name="amount" value="<?php echo $singleUser->visiting_fee ?>" >

                <div class="form-group text-center"style="color: black">
                    <label for="Transaction ID">Transaction ID</label>
                    <input type="text" class="form-control" style="width: 30%;margin: auto"align="" pattern="[0-9A-Z]{10}"  title="" id="Transaction ID" placeholder="Transaction ID" name="transaction_id" required>
                </div>

                <button type="submit" class="btn btn-default" style="text-align: center" >Confirm</button>
            </form>
        </div>
    </div>
</div>
<?php



?>


<!-- Javascript -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<![endif]-->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>
<script>

</body>
</html>
