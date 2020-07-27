<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Admin\Admin;
use App\BloodDonor\BloodDonor;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj=new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('BloodDonor/Profile/doctor-login.php');
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
        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
</head>

<body  style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<?php include('navbar_views.php') ?>


<div id="message" >

    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
        echo "&nbsp;".Message::message();
    }
    Message::message(NULL);

    ?>
</div>



<?php

$obj = new App\Driver\Driver();
$obj->prepare($_GET);
$singleItem  =  $obj->view("obj");


?>






<h1 class="animate-flicker" style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>

<div>


    <form class="form-horizontal" action="update.php" method="post">
        <input type="hidden" value="<?php echo $singleItem->id; ?>" id="fname" name="id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname"> Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="driver_name" value="<?php echo $singleItem->driver_name; ?>" placeholder=" Name">
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="email" readonly="readonly" value="<?php echo $singleItem->email; ?>" placeholder="Email">
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Phone Number</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="phone" value="<?php echo $singleItem->phone; ?>" placeholder="Phone Number">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Address</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="address" value="<?php echo $singleItem->address; ?>" placeholder="Address">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Ambulance No</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="ambulance_no" value="<?php echo $singleItem->ambulance_no; ?>" placeholder="Ambulance No">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Category</label>
            <div class="col-sm-8">
                <select class="form-control" id="country"
                        name="specification" required>
                    <option value="">Select Category</option>
                    <option value="NonAc"  <?php if($singleItem->specification== "NonAc") { ?>selected="selected"<?php  } ?>>Non Ac</option>
                    <option value="Ac" <?php if($singleItem->specification== "A/c") { ?>selected="selected"<?php  } ?>>Ac</option>
                    <option value="Freezing" <?php if($singleItem->specification== "Freezing") { ?>selected="selected"<?php  } ?>>Freezing</option>
                    <option value="ICU"<?php if($singleItem->specification== "ICU") { ?>selected="selected"<?php  } ?>>ICU</option>
                    <option value="Air"<?php if($singleItem->specification== "Air") { ?>selected="selected"<?php  } ?>>Air</option>

                </select><br>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Availibility</label>
            <div class="col-sm-8">
                <label class="sr-only" for="form-select">  Availibility</label>
                <select class="form-control" id="country"
                        name="availability">
                    <option value=""> Select</option>
                    <option class="a" style="color: green" value="Yes"  <?php if($singleItem->availability == "Yes") { ?>selected="selected"<?php  } ?>>Yes</option>
                    <option class="b" style="color: red" value="No" <?php if($singleItem->availability  == "No") { ?>selected="selected"<?php  }  ?> >No</option>

                </select>
            </div>
        </div>

        <div class="text-center col-md-12">
            <div class="col-sm-2"></div>
            <input class="btn btn-lg btn-success col-sm-8" type="submit" value="update">

        </div>
    </form>

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
