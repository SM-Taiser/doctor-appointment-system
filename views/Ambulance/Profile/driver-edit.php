<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Admin\Admin;
use App\Chambers\Chambers;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj=new \App\Driver\Driver();
$obj->prepare($_GET);
$singleUser = $obj->view();




?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/style.css">

    <style>
        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
</head>

<body  style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">

<nav class="navbar navbar-default">
<div class="container">
    <div class="navbar-header">
        <span class="text-center toggle-nav-title">Menu</span>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">MENU</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div id="navbar" class="navbar-menu">
        <ul class="nav navbar-nav">
            <li> <a href="../../../home.php">Home</a></li>
            <li> <a href="../../Patient/view_search_doctor.php">Doctors</a></li>
            <li> <a href="../../BloodDonor/view_search_blood_donor.php">Blood Donor</a></li>
            <li> <a href="../view_ambulance_search.php">Ambulance</a></li>

        </ul>
        <ul class="nav navbar-right">
            <button type="button" class="btn btn-default" style="color: white"> <a href="amb-company-profile.php">Profile</a></button>
        </ul>

    </div>



</div>
</nav>



<div id="message" >

    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
        echo "&nbsp;".Message::message();
    }
    Message::message(NULL);

    ?>
</div>






<h1 class="animate-flicker" style="text-align:center;font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>

<div>
    <?php




    ?>

    <form class="form-horizontal" action="driver-update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="fname" name="driver_id" value="<?php echo $singleUser->driver_id; ?>" placeholder="driver id">

        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Ambulance no</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="ambulance_no" value="<?php echo $singleUser->ambulance_no; ?>" placeholder="ambulance no">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Driver Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="driver_name"  value="<?php echo $singleUser->driver_name; ?>" placeholder="Chamber Name">
            </div>
        </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="lname">Category</label>
    <div class="col-sm-8">
        <select class="form-control" id="country"
                name="specification" required>
            <option value="">Select Category</option>
            <option value="NonAc"  <?php if($singleUser->specification== "NonAc") { ?>selected="selected"<?php  } ?>>Non Ac</option>
            <option value="Ac" <?php if($singleUser->specification== "A/c") { ?>selected="selected"<?php  } ?>>Ac</option>
            <option value="Freezing" <?php if($singleUser->specification== "Freezing") { ?>selected="selected"<?php  } ?>>Freezing</option>
            <option value="ICU"<?php if($singleUser->specification== "ICU") { ?>selected="selected"<?php  } ?>>ICU</option>


        </select><br>
    </div>
</div>





       <div class="form-group">
        <label class="control-label col-sm-2" for="lname">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lname" name="email" readonly="readonly" value="<?php echo $singleUser->email; ?>" placeholder="Email">
        </div>
</div>

        <div class="form-group">
        <label class="control-label col-sm-2" for="lname">Phone</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="lname" name="phone"  value="<?php echo $singleUser->phone; ?>" placeholder="Phone">
        </div>
</div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Address</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="address" value="<?php echo $singleUser->address; ?>" placeholder="address">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Availibility</label>
            <div class="col-sm-8">
                <label class="sr-only" for="form-select">  Availibility</label>
                <select class="form-control" id="country"
                        name="availability">
                    <option value=""> Select</option>
                    <option class="a" style="color: green" value="Yes"  <?php if($singleUser->availability == "Yes") { ?>selected="selected"<?php  } ?>>Yes</option>
                    <option class="b" style="color: red" value="No" <?php if($singleUser->availability  == "No") { ?>selected="selected"<?php  }  ?> >No</option>

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
