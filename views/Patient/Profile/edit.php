<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Admin\Admin;
use App\Patient\Patient;
use App\Patient\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new Patient();
$obj->prepare($_SESSION);
//var_dump($_SESSION);
$singleUser = $obj->profile_view();
  //var_dump($singleUser);
$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();
//var_dump($status);


if(!$status) {
    Utility::redirect('signup.php');
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

<body  style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">

<?php include ('font_end_navbar.php');?>



                <div id="message" >

                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                        echo "&nbsp;".Message::message();
                    }
                    Message::message(NULL);

                    ?>
                </div>

<br>

    <h1 class="animate-flicker" style="text-align:center;font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1><br>
	
<div>
   <?php



       
   ?>

    <form class="form-horizontal" action="update.php" method="post">
        <input type="hidden" value="<?php echo $singleUser->id; ?>" id="fname" name="id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Doctor's Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="name" value="<?php echo $singleUser->name; ?>" placeholder="Doctor's name">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="patient_email"  readonly="readonly" value="<?php echo $singleUser->patient_email; ?>" placeholder="Email">
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
