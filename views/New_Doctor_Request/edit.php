<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Admin\Admin;
use App\Doctor\Doctor;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Admin/Profile/signup.php');
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

<header>

    <div class=" class="tab-content">

    <!--<h1 style="color:black;font-family: Georgia,serif">Hello <?php echo "$singleUser->first_name $singleUser->last_name"?>! </h1> -->
    <p style="color:black;font-family: Georgia,serif"><u>Welcome to backend view</u></p>
    </div>
</header>



<h1 class="animate-flicker" style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Update</h1>

<div>
    <?php

    $obj = new  Doctor();
    $obj->prepare($_GET);
    $singleItem  =  $obj->view("obj");


    ?>

    <form class="form-horizontal" action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $singleItem->id; ?>" id="fname" name="new_doctor_request_id" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Doctor's Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="name" value="<?php echo $singleItem->name; ?>" placeholder="Doctor's name">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">Picture</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="fname" name="pic_old" value="<?php echo $singleItem->pic ?>" style="width:100px; height:100px;" alt="" /><br /><br>

                <input type="file" class="form-control" id="fname" name="pic_new" accept=".png, .jpg"   ><br>


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
                    <option value="Rajshahi"<?php if($singleItem->city == "Rajshahi") { ?>selected="selected"<?php  }  ?>>Rajshahi</option>
                    <option value="Barisal"<?php if($singleItem->city == "Barisal") { ?>selected="selected"<?php  }  ?>>Barisal</option>
                    <option value="Sylhet" <?php if($singleItem->city == "Syllet") { ?>selected="selected"<?php  }  ?>><Sylhet</option>
                    <option value="Rangpur"<?php if($singleItem->city == "Rangpur") { ?>selected="selected"<?php  }  ?>> Rangpur</option>
                    <option value="Mymensingh"<?php if($singleItem->city == "Mymensingh") { ?>selected="selected"<?php  }  ?>>Mymensingh</option>
                </select>


            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">degree_specification</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="degree_specification" value="<?php echo $singleItem->degree_specification; ?>" placeholder="Area Coverage">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Designation</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="designation" value="<?php echo $singleItem->designation; ?>" placeholder="Designation">
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
            <label class="control-label col-sm-2" for="lname">Gender</label>
            <div class="col-sm-8">
                <select class="form-control" id="country" name="gender">
                    <option value="male"<?php if($singleItem->gender == "male") { ?>selected="selected"<?php  }?>>Male</option>
                    <option value="female"<?php if($singleItem->gender == "female") { ?>selected="selected"<?php  }?>>Female</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Visiting Fee</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="visiting_fee" value="<?php echo $singleItem->visiting_fee; ?>" placeholder="Visiting Fee">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Bmdc reg no </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lname" name="bmdc_reg_no" value="<?php echo $singleItem->bmdc_reg_no; ?>" placeholder="Bmdc reg no ">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="lname">Select Catagory</label>
            <div class="col-sm-8">
                <select class="form-control" id="country"
                        name="category"  >
                    <option value="">Select Category</option>
                    <option value="Medicine"  <?php if($singleItem->category == "Medicine") { ?>selected="selected"<?php  }?>>Medicine</option>
                    <option value="Cardiology" <?php if($singleItem->category == "Cardiology") { ?>selected="selected"<?php  }  ?>>Cardiology</option>
                    <option value="Gynecologist" <?php if($singleItem->category == "Gynecologist") { ?>selected="selected"<?php  }  ?>>Gynecologist</option>
                    <option value="Neurologist" <?php if($singleItem->category == "Neurologist") { ?>selected="selected"<?php  }  ?>>Neurologist</option>
                    <option value="Orthopedic" <?php if($singleItem->category== "Orthopedic") { ?>selected="selected"<?php  }  ?>>Orthopedic</option>
                    <option value="Nefrologist" <?php if($singleItem->category == "Nefrologist") { ?>selected="selected"<?php  }  ?>>Nefrologist</option>
                    <option value="Pediatrician" <?php if($singleItem->category == "Pediatrician") { ?>selected="selected"<?php  }  ?>>Pediatrician</option>
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
