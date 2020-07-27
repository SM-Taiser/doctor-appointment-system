<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');

use App\Message\Message;
use App\Utility\Utility;
use App\Ambulance\Ambulance;
use App\Ambulance\Auth;

$obj = new Ambulance();
$obj->prepare($_SESSION);
$singleUser  = $obj->view_profile();
$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Ambulance/Profile/amb-company-login.php');
    return;
}

?>

<!DOCTYPE html>
<html>
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

    <header>



    </header>




    <h1 class="animate-flicker" style="text-align:center;font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>
	
<div>


    <form class="form-horizontal" action="update.php" method="post">
        <input type="hidden" value="<?php echo $singleUser->id; ?>" id="fname" name="id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname"> Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="comp_name" value="<?php echo $singleUser->comp_name; ?>" placeholder="Company Name">
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="ambulance_email" readonly="readonly" value="<?php echo $singleUser->ambulance_email; ?>" placeholder="Email">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Select your city</label>
            <div class="col-sm-8">
             <select class="form-control" id="country"
                    name="city"  >
                <option value="">Select Your City</option>
                <option value="Dhaka" <?php if($singleUser->city == "Dhaka") { ?>selected="selected"<?php  }  ?>>Dhaka </option>
                <option value="Chittagong"  <?php if($singleUser->city == "Chittagong"){ ?>selected="selected"<?php } ?>>Chittagong</option>
                <option value="Khulna" <?php if($singleUser->city == "Khulna") { ?>selected="selected"<?php  }  ?>>Khulna</option>
                <option value="Rajshahi"<?php if($singleUser->city == "Rajshahi") { ?>selected="selected"<?php  }  ?>>Rajshahi</option>
                <option value="Barisal"<?php if($singleUser->city == "Barisal") { ?>selected="selected"<?php  }  ?>>Barisal</option>
                <option value="Sylhet" <?php if($singleUser->city == "Syllet") { ?>selected="selected"<?php  }  ?>><Sylhet</option>
                <option value="Rangpur"<?php if($singleUser->city == "Rangpur") { ?>selected="selected"<?php  }  ?>> Rangpur</option>
                <option value="Mymensingh"<?php if($singleUser->city == "Mymensingh") { ?>selected="selected"<?php  }  ?>>Mymensingh</option>
            </select>


        </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Area Coverage</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="area_coverage" value="<?php echo $singleUser->area_coverage; ?>" placeholder="Area coverage">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Phone Number</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="phone" value="<?php echo $singleUser->phone; ?>" placeholder="Phone Number">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Address</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="address" value="<?php echo $singleUser->address; ?>" placeholder="Address">
            </div>
        </div>



        <div class="text-center col-md-12">
            <div class="col-sm-2"></div>
            <input class="btn btn-lg btn-success col-sm-8" type="submit" value="update">

        </div>
    </form>

</div>

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
