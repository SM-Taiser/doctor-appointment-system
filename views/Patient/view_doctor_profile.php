<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;

use App\Patient\Auth;

$obj = new App\Patient\Patient();
$obj->prepare($_SESSION);
$singleUser  = $obj->view();
use App\Ratings\Ratings;
$obj=new Ratings();
$obj->prepare($_POST);
//var_dump($_POST);
$allDataOfAppSchedule=$obj->getAppScheduleData("obj");
$allDataOfRatngs=$obj->getRatingsData("obj");
//var_dump($allData);


//var_dump($all);
$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();


if(!$status) {
    Utility::redirect('Profile/signup.php');
    return;
}
elseif ($_GET['id']=='X'){
    Utility::redirect('Profile/signup.php');
    return;
}

use App\Payment\Payment;
$obj=new Payment();

$all=$obj->get_patient("obj");

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <style>

        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: orange;
        }



        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }


        .table td, .table  th {
            border: none;
        }

        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>

    <!--ICON -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--ICON -->
</head>

<body  style="background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<?php include ('font_end_navbar.php');?>






    <?php foreach ($all as $singleUser){
    $schedule_id=$singleUser->schedule_id;
        // echo $schedule_id;
    }?>


    <header class="tab-content">

    </header>

    <div class="container text-center"><h1 style="font-family: Georgia,serif">
           
    </div>


    <div class="container">

        <br>
        <div class="container-fluid" style="background-color:#51BFEC;color: white">
            <br>
            <img src="../Doctor/Profile/images/<?php echo $_GET['pic'] ?>" style="display: block;margin: 0 auto; height:100px;" class="img-circle img-responsive" alt="" />
            <h1 class="animate-flicker "   style="text-align: center;font-size:22pt;color:white;font-family: Georgia,serif"><i class="fas fa-user-md"></i> <?php echo $_GET['name']?></h1>
            <h4 class="hhh" style="text-align: center;color: white"> <?php echo $_GET['designation']; ?></h4>
        </div>
<?php

$flag_1 = 0;
$flag_2 = 0;

//var_dump($allDataOfAppSchedule);
//var_dump($allDataOfRatngs);

foreach ($allDataOfAppSchedule as $singleAppScheduleData){

   $patient_id_app_sch = $singleAppScheduleData->patient_id;
    $doctor_id_app_sch = $singleAppScheduleData->doctor_id;
    $schedule_id_app_sch =  $singleAppScheduleData->schedule_id;

    if($patient_id_app_sch==$_SESSION['id']&& $doctor_id_app_sch==$_GET['id']) {
        $flag_1 = 1;
        
    }
}
    foreach ($allDataOfRatngs as $singleRatingsData){
        // echo $singleRatingsData->patient_id." ";
        // echo $singleRatingsData->doctor_id;
        if($singleRatingsData->patient_id==$_SESSION['id'] && $singleRatingsData->doctor_id==$_GET['id']){
            $flag_2 = 1;
            
        }
    }
    // echo "got appointment: ".$flag_1."-----";
    // echo "gave rating: ".$flag_2 ;

    if($flag_1 == 0 || $flag_2 ==1){
    ?>

<?php echo "";
      }
        else{
        ?>
            <div class="row">
        <div class="col-md-2">
<fieldset>





            <div class="stars">
                <form action="rating_store.php" method="post">

                    <input type="hidden" name="doctor_id" value="<?php echo $_GET['id']?>">
                    <input type="hidden" name="patient_id" value="<?php echo $_SESSION['id']?>">
                    <input class="star star-5"  value="5" id="star-5" type="radio" name="rating"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" value="4" id="star-4" type="radio" name="rating"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" value="3" id="star-3" type="radio" name="rating"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" value="2" id="star-2" type="radio" name="rating"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" value="1" id="star-1" type="radio" name="rating"/>
                    <label class="star star-1" for="star-1"></label>
                    <div class="col-md-8">
                    <button type="submit" class="btn-success">Submit Rating</button></div>
                </form>
            </div>
    <br><br>
</fieldset>
        </div>
            </div>
     <?php   }

     ?>


    <?php
    $serial = 0;

    //  var_dump($_GET);
    // echo $keyWord;


    $objDoctor = new \App\Doctor\Doctor();
    $allData=$objDoctor->patient_view_doctor_profile();
    //var_dump($allData);





    foreach ($allData as $oneData ){

        ?>

        <div class="container" style="color: black">
            <hr class="aaa"  style="color:black">

            <div class="col-md-12">
                <div class="row" >


                    <div class="col-md-3" style="border-left: 1px solid black">
                        <p>
                        <h4>Chamber: <?php echo $oneData->chamber_name; ?></h4>
                        <h4> Address: <?php echo $oneData->address; ?></h4>
                        <h4>Fees: <?php echo $oneData->visiting_fee; ?>TK</h4>
                        </p>


                    </div>



                    <div class="col-md-5" style="border-left: 1px solid black">
                        <p>
                            <h4>Day: <?php echo $oneData->day; ?></h4>
                        <h4> Time: <?php echo $oneData->time; ?></h4>

                        </p>


                    </div>
                    <div class="col-md-2">

                        <a href="user_appointment.php?appointment_id=<?php echo $oneData->appointment_id ?>&id=<?php echo $oneData->id ?>&chamb_id=<?php echo $oneData->chamb_id?>&chamber_name=<?php echo $oneData->chamber_name; ?>&city=<?php echo $oneData->city ?>&category=<?php echo $oneData->category ?>&patient_id=<?php echo $_SESSION['id']?>" class="btn btn-success" role="button"><span
                                    class="glyphicon glyphicon-user"></span> view Appointment Schedule</a>
                    </div>
                </div>
            </div>
        </div>







    <?php  } ?>
</div>


<!-- Javascript -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>


</html>
