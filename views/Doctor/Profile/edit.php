<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');

use App\Doctor\Doctor;
use App\Doctor\Auth;
use App\Message\Message;
use App\Utility\Utility;

$objDoctor = new  Doctor();
$objDoctor->prepare($_SESSION);
$singleUser = $objDoctor->view_profile();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('User/Profile/doctor-login.php');
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
   <?php
     


       
   ?>

    <form class="form-horizontal" action="update.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" value="<?php echo $singleUser->id; ?>" id="fname" name="id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Doctor's Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="name" value="<?php echo $singleUser->name; ?>" placeholder="Doctor's name">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Picture</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="fname" name="pic_old" value="<?php echo $singleUser->pic ?>" style="width:100px; height:100px;" alt="" /><br /><br>
                <input type="file" class="form-control" id="fname" name="pic_new" accept=".png, .jpg"   ><br>
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
            <label class="control-label col-sm-2" for="lname">Degree</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="degree" value="<?php echo $singleUser->degree; ?>" placeholder=" degree">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Designation</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="designation" value="<?php echo $singleUser->designation; ?>" placeholder="Designation">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="email"  readonly="readonly" value="<?php echo $singleUser->email; ?>" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lname"></label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="lname" name="password"  readonly="readonly" value="<?php echo $singleUser->password; ?>" placeholder="Password">
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
            <label class="control-label col-sm-2" for="lname">Gender</label>
            <div class="col-sm-8">
                <select class="form-control" id="country" name="gender">
                    <option value="male" <?php if($singleUser->gender == "male") { ?>selected="selected"<?php  }?>>Male</option>
                    <option value="female" <?php if($singleUser->gender == "female") { ?>selected="selected"<?php  }?>>Female</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Visiting Fee</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="visiting_fee" value="<?php echo $singleUser->visiting_fee; ?>" placeholder="Visiting Fee">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Status</label>
            <div class="col-sm-8">
                <select class="form-control" id="country" name="is_active">
                    <option value="Yes" <?php if($singleUser->is_active == "Yes") { ?>selected="selected"<?php  }?>>Active</option>
                    <option value="No"  <?php if($singleUser->is_active == "No") { ?>selected="selected"<?php  }?>>Inactive</option>

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
