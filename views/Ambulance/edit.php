<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Admin\Admin;
use App\Ambulance\Ambulance;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj=new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Ambulance/Profile/amb-company-login.php');
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

                $obj = new Ambulance();
                $obj->prepare($_GET);
                $singleItem  =  $obj->view("obj");


                ?>




    <h1 class="animate-flicker" style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>
	
<div>


    <form class="form-horizontal" action="update.php" method="post">
        <input type="hidden" value="<?php echo $singleUser->amb_comp_id; ?>" id="fname" name="amb_comp_id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname"> Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="comp_name" value="<?php echo $singleItem->comp_name; ?>" placeholder=" Name">
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="ambulance_email" readonly="readonly" value="<?php echo $singleItem->ambulance_email; ?>" placeholder="Email">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Select your city</label>
            <div class="col-sm-8">
                <select class="form-control" id="country"
                        name="city"  >
                    <option value="">Select Your City</option>
                    <option value="Dhaka" <?php if($singleItem->city == "Dhaka") { ?>selected="selected"<?php  }  ?>>Dhaka </option>
                    <option value="Chittagong"  <?php if($singleItem->city == "Chittagong"){ ?>selected="selected"<?php } ?>>Chittagong</option>
                    <option value="Khulna" <?php if($singleItem->city == "Khulna") { ?>selected="selected"<?php  }  ?>>Khulna</option>
                    <option value="Rajshahi "<?php if($singleItem->city == "Rajshahi") { ?>selected="selected"<?php  }  ?>>Rajshahi</option>
                    <option value="Barisal"<?php if($singleItem->city == "Barisal") { ?>selected="selected"<?php  }  ?>>Barisal</option>
                    <option value="Sylhet" <?php if($singleItem->city == "Syllet") { ?>selected="selected"<?php  }  ?>><Sylhet</option>
                    <option value="Rangpur"<?php if($singleItem->city == "Rangpur") { ?>selected="selected"<?php  }  ?>> Rangpur</option>
                    <option value="Mymensingh"<?php if($singleItem->city == "Mymensingh") { ?>selected="selected"<?php  }  ?>>Mymensingh</option>
                </select>


            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Area Coverage</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="area_coverage" value="<?php echo $singleItem->area_coverage; ?>" placeholder="Area coverage">
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
