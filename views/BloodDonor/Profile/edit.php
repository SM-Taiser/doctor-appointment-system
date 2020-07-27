<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Admin\Admin;
use App\BloodDonor\BloodDonor;
use App\BloodDonor\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj=new BloodDonor();
$obj->prepare($_SESSION);
$singleUser = $obj->view_profile();

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
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
<style>
.animate-flicker {
    animation: fadeIn 1s infinite alternate;
}
</style>
</head>

<body>
<?php include ('font_end_navbar.php');?>



                <div id="message" >

                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                        echo "&nbsp;".Message::message();
                    }
                    Message::message(NULL);

                    ?>
                </div>





<br>

    <h1 class="animate-flicker" style="text-align:center;font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>
	<br>
<div>


    <form class="form-horizontal" action="update.php" method="post">
        <input type="hidden" value="<?php echo $singleUser->id; ?>" id="fname" name="id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname"> Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="name" value="<?php echo $singleUser->name; ?>" placeholder=" Name">
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="donor_email" readonly="readonly" value="<?php echo $singleUser->donor_email; ?>" placeholder="Email">
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

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Address</label>
            <div class="col-sm-8">
            <label class="sr-only" for="form-select">  Ready To Donate?</label>
            <select class="form-control" id="country"
                    name="ready_to_donate">
                <option value=""> Select</option>
                <option class="a" style="color: green" value="Yes"  <?php if($singleUser->ready_to_donate == "Yes") { ?>selected="selected"<?php  } ?>>Yes</option>
                <option class="b" style="color: red" value="No" <?php if($singleUser->ready_to_donate  == "No") { ?>selected="selected"<?php  }  ?> >No</option>

            </select>
        </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Age</label>
            <div class="col-sm-8">
            <label class="sr-only" for="address">Age</label>
            <input type="text" name="age" placeholder="Address..." class="form-address form-control" id="form-age"   value="<?php echo $singleUser->age; ?>">
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
