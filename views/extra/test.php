<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">
<link rel="stylesheet" href="../../resource/assets/js/jquery-1.11.1.js">
    <link rel="stylesheet" href="../../resource/js/jquery.min.js">

</head>

<body>
<div class="container">


<div class="col-md-12">
    <div class="row">
        <div class="col-md-2">
            ttttttttttt
        </div>

        <div class="col-md-4">
            <p>
                Asst. Prof. Dr. Md. Shafiqur Rahman Patwary

                MBBS, FCPS (Medicine), MD (Cardiology), FESC (Europe), FACC (America).

                Assistant Professor, Dept. of Cardiology, National Institute of Cardiovascular Diseases (NICVD), Dhaka
            </p>
        </div>
        <div class="col-md-6">
            <p>
                Chamber

                Al-Helal Specialized Hospital Ltd., Main Branch, Mirpur, Dhaka

                Fees

                New appointment: 600 TK.
            </p>
        </div>
    </div>
</div>
</div>

</body>

<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Doctor\Doctor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

/*
$key1 = $_GET['city'];
$key2 = $_GET['blood_grp'];


$obj= new BloodDonor();
$obj->prepare($_SESSION);
$singleUser = $obj->search($key1,$key2);
*/




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">
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
    </style>
</head>

<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');


/*
$key1 = $_GET['city'];
$key2 = $_GET['blood_grp'];


$obj= new BloodDonor();
$obj->prepare($_SESSION);
$singleUser = $obj->search($key1,$key2);
*/




?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">
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
    </style>
</head>

<body  style="background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">



<div class="navbar nav" style="background-color: darkred">
    <nav>
        <div class="collapse navbar-collapse navbar-left navbar-main-collapse">


            <ul class="nav navbar-nav">




            </ul>
        </div>
</div>
<div id="message">

    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
        echo "&nbsp;" . Message::message();
    }
    Message::message(NULL);

    ?>

    </td>
    </tr>
    </table>


    <header class="tab-content">

    </header>

    <div class="container text-center"><h1 style="font-family: Georgia,serif">

    </div>

    <div class="container">

        <br><br><br>
        <h1 class="animate-flicker "   style="font-size:22pt;color:darkblue;font-family: Georgia,serif"   >Serach Result</h1>
    </div>





        <?php
        $serial = 0;
        $keyWord = $_GET['city'];
        $keyWords = $_GET['category'];
        $keyWordss = $_GET['area_coverage'];
        //  var_dump($_GET);
        // echo $keyWord;


        $objDoctor = new \App\Doctor\Doctor();
        $allData=$objDoctor->search( $keyWord,$keyWords,$keyWordss);
        //  var_dump($allData);



        foreach ($allData as $oneData ){

            ?>

            <div class="container" style="color: black">
                <hr class="aaa"  style="color:black">

                <div class="col-md-12">
                    <div class="row" >
                        <div class="col-md-2">
                            <img src="../Doctor/Profile/images/<?php echo $oneData->pic ?>" style="width:100px; height:100px;" alt="" /><br />
                        </div>

                        <div class="col-md-3" style="border-left: 1px solid black">
                          <p>
                                <?php echo $oneData->name; ?><br>
                                <?php echo $oneData->designation; ?>

                            </p>
                        </div>
                        <div class="col-md-5" style="border-left: 1px solid black">
                            <p>
                            Chamber
                              <h5> <?php echo $oneData->chamber_name; ?></h5>
                            Address: <?php echo $oneData->address; ?>
                            <h5>Fees: <?php echo $oneData->visiting_fee; ?>TK</h5>
                            </p>


                        </div>
                        <div class="col-md-2">

                            <a href="user_appointment.php?id=<?php echo $oneData->id ?>&chamb_id=<?php echo $oneData->chamb_id?>&patient_id=<?php echo $_SESSION['id']?>" class="btn btn-success" role="button"><span
                                        class="glyphicon glyphicon-user"></span> view Appointment Schedule</a></td>
                        </div>
                    </div>
                </div>
            </div>







        <?php  } ?>

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

