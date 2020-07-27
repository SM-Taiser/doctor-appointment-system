<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
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
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">
    <link href="../../../resource/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../../resource/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="../../../resource/css/nivo-lightbox.css" rel="stylesheet"/>
    <link href="../../../resource/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css"/>
    <link href="../../../resource/css/owl.carousel.css" rel="stylesheet" media="screen"/>
    <link href="../../../resource/css/owl.theme.css" rel="stylesheet" media="screen"/>
    <link href="../../../resource/css/animate.css" rel="stylesheet"/>
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




    <table class="table table-striped table-bordered">
        <tr>


            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Picture</th>
            <th class="text-center">City</th>
            <th class="text-center"> Area Coverage</th>
            <th class="text-center">Designation</th>
            <th class="text-center">Category</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Visiting Fee</th>
            <th class="text-center">Time</th>
            <th class="text-center">Action</th>

        </tr>
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
            <tr>
                <td> <?php echo $oneData->id; ?></td>
                <td> <?php echo $oneData->name; ?></td>
                <td> <img src="images/<?php echo $oneData->pic ?>" style="width:100px; height:100px;" alt="" /><br /></td>
                <td> <?php echo $oneData->city; ?></td>
                <td> <?php echo $oneData->area_coverage; ?></td>
                <td> <?php echo $oneData->designation; ?></td>
                <td> <?php echo $oneData->category; ?></td>
                <td> <?php echo $oneData->email; ?></td>
                <td> <?php echo $oneData->phone; ?></td>
                <td> <?php echo $oneData->address; ?></td>
                <td> <?php echo $oneData->visiting_fee; ?></td>
                <td> <?php echo $oneData->time; ?></td>

                <td>  <a href="user_appointment.php?id=<?php echo $_GET['id'] ?>&chamb_id=<?php echo $_GET['chamb_id']?>&patient_id=<?php echo $_SESSION['id']?>" class="btn btn-success" role="button"><span
                                class="glyphicon glyphicon-user"></span> view profile</a></td>

            </tr>
        <?php  } ?>

    </table>

</div>


<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->
</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>



</html>
