
<?php
require_once ("../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();
use App\Doctor\Doctor;
use App\Message\Message;


use App\Patient\Auth;
use App\Utility\Utility;
$obj = new App\Patient\Patient();
$obj->prepare($_SESSION);
$singleUser  = $obj->view();

$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();


if(!$status) {
    Utility::redirect('../Patient/Profile/signup.php');
    return;
}


?>

<!doctype html>
<html lang="en">
<head>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!--ICON -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--ICON -->

</head>
<body>

<?php include ('font_end_navbar.php');?>
<br>


<?php

use App\Payment\Payment;
$obj=new Payment();
$all_appointment_schedule_data = $obj->index("obj");
// var_dump($all_appointment_schedule_data);
?>


<?php

use App\Leave\Leave;
$obj=new Leave();
$all_leaves_data = $obj->all_leave("obj");
//var_dump($all_leaves_data);




?>

<?php
$obj=new \App\Appointment\Appointment();
$obj->prepare($_GET);

$singleData = $obj->view();
//var_dump($singleData);

$objDoctor=new Doctor();
$objDoctor->prepare($_POST);
//var_dump($_GET);
$singleUser  = $objDoctor->vieww();

?>




<?php

$date = date('Y-m-d');
$day_array=$singleData->day; // will come from database
$time_array=$singleData->time; // will come from database

?>
<?php

?>


<div class="container">

    <div class="row">
        <div class="col-sm-6" style="text-align:center;background-color:#51BFEC;color: white"><br>
            <img src="../Doctor/Profile/images/<?php echo $singleUser->pic ?>" style="display: block;margin: 0 auto; height:100px;" class="img-circle img-responsive" alt="" />
            <h2 style="color:white;"><?php echo $singleUser->name;?></h2>
            <h3 style="color: white">Chamber Name: <?php echo $_GET['chamber_name']; ?></h3>
            <h4 style="color: white">  Designation: <?php echo $singleUser->designation; ?></h4>

        </div>

        <div class="col-sm-6">



            <div style="text-align: center;margin:0 auto; display:inline-block width: 100%"><iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=<?php echo $_GET['chamber_name']; ?>%20St%2C%20<?php echo $_GET['city'] ?>%20WC1E%207HU%2C%20BANGLADESH+(Your%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Add Google Map to website</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe></div>
        </div>

    </div>
</div>
<div class="container" style="color: black; font-size: large ">

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <tr>
                <th style="text-align: center"><i class="far fa-calendar-alt"></i> Day</th>
                <th style="text-align: center"><i class="far fa-clock"></i> Time</th>
            </tr>

            <?php
            for($i=1;$i<=7;$i++){
                $next_date = date('Y-m-d', strtotime($date ." +$i day"));
                $nameOfDay = date('D', strtotime($next_date));


                ?>
                <tr>
                    <td>
                        <?php echo $nameOfDay.","; echo $next_date  ?>
                    </td>
                    <td>
                        <?php
                        if (strpos($day_array, $nameOfDay) !== false) {
                            $explode_time_array = explode(",", $time_array); //use explode
                            // $explode_day_array = explode("," ,$day_array); //use explode

                            for ($j = 0; $j < count($explode_time_array); $j++) { // $explode_time_array=>time slot was given by doctor
                                $flag = 1; // assuming timeslot not taken yet
                                foreach ($all_appointment_schedule_data as $schedule_data) {
                                    if($schedule_data->doctor_id==$_GET['id'] && $schedule_data->chamb_id==$_GET['chamb_id'] && $schedule_data->date=="$next_date" && $schedule_data->time=="$explode_time_array[$j]"){
                                        $flag=0; //if timeslot already taken flag=0

                                    }
                                }
                                ?>
                                <?php if ($flag == 1) {
                                    $leave_flag = 0; // assuming no leave taken for this day
                                    foreach ($all_leaves_data as $oneData) {
                                        if ($oneData->doctor_id == $_GET['id'] && $oneData->chamb_id == $_GET['chamb_id'] && $oneData->date == "$next_date") {
                                            $leave_flag =1; //if doctor has taken leave leave_flag = 1
                                        }
                                        }
                                        if($leave_flag == 0) {
                                            ?>
                                            <a class="btn btn-info btn-sm"
                                               href="payment.php?id=<?php echo $_GET['id'] ?>&chamb_id=<?php echo $_GET['chamb_id'] ?>&patient_id=<?php echo $_SESSION['id'] ?>&date=<?php echo $next_date; ?>&time=<?php echo $explode_time_array[$j] ?>&day=<?php echo $nameOfDay ?>"><i
                                                        class="fas fa-clock"></i> <?php echo $explode_time_array[$j] ?>
                                            </a>
                                            <?php
                                        }

                                    ?>
                                    <?php
                                }
                            }
////////////////////////////////////
                            ///////////////////


                        }
                        else{
                            echo "------ ------ ------";
                        }
                        ?>
                    </td>
                </tr>
            <?php } // end of for loop ?>
        </table>

    </div>
    <br>

    <?php
    $obj=new Payment();
    $obj->prepare($_POST);
    //  var_dump($_POST);
    $allData=$obj->suggested_doctors("obj");

    //var_dump($allData);
    ?>
    <div class="container">
        <h3 style="text-align:center"> Other Suggested Doctors</h3>
        <?php

        foreach ($allData as $oneData) {

        ?>
        <div class="container">

            <div class="row">


                <div class="col-sm-4">
                    <div class="col-sm-10" style="text-align: center;margin: 3px">
                        <div class="well">
                            <img src="../Doctor/Profile/images/<?php echo $oneData->pic ?>" style="display: ;margin: 0 auto; height:100px;" class="img-circle img-responsive" alt="" />
                            <?php echo $oneData->name  ?><br>
                            <?php echo $oneData->designation ;?>


                            <center>

                                <a href="view_doctor_profile.php?id=<?php echo $oneData->id ?>&city=<?php echo $oneData->city ?>&category=<?php echo $oneData->category ?>&pic=<?php echo $oneData->pic ?>&designation=<?php echo $oneData->designation ?> &name=<?php echo $oneData->name;?>&patient_id=<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo "X";}?>" class="btn btn-success" style="" role="button"><span
                                            class="glyphicon glyphicon-user"></span> view doctor profile</a>

                            </center>
                        </div>
                    </div>

                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
</body>

<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>
</html>

