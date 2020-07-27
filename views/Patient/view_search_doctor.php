<?php
if (!isset($_SESSION)) session_start();
include_once('../../vendor/autoload.php');
use App\Message\Message;
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">

    <style>
        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
    <!--ICON -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--ICON -->
</head>

<body style=" background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<?php include ('font_end_navbar.php');?>
<div id="message">

</div>


<header class="tab-content">


</header>
<br>

<h1 class="animate-flicker " style="text-align:center;font-weight: normal;font-size:22pt;color:darkblue;font-family: Georgia,serif"><i class="fas fa-user-md"></i> Search Doctors</h1><br>



    <div class="container" style="text-align: center">
        <v>

 <form class="form-inline" action="search_result.php" method="get" enctype="text/plain">
            <div class="form-group">

                <label class="sr-only" for="form-select">City</label>
                <select class="form-control" style="height: 60px;width: 150px" id="country"
                        name="city" >
                    <option value="">Select Your City</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Barisal">Barisal</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Rangpur"> Rangpur</option>
                    <option value="Mymensingh">Mymensingh</option>
                </select>
            </div>


    <div class="form-group">
        <label class="sr-only" for="form-select">City</label>
        <select class="form-control" style="height: 60px;width: 150px"id="country" name="category">

            <option value="">Select Category</option>
            <option value="Medicine">Medicine</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Gynecologist">Gynecologist</option>
            <option value="Neurologist">Neurologist</option>
            <option value="Orthopedics">Orthopedic</option>
            <option value="Nefrologist">Nefrologist</option>
            <option value="Dentistry">Dentistry</option>
            <option value="Alergy_immunology">Alergy & immunology</option>
            <option value="ENT">ENT</option>
            <option value="Hepatology">Hepatology</option>
            <option value="General_surgery">General surgery</option>
            <option value="Neuromedicine">Neuromedicine</option>
        </div>





     <div class="form-group">
         <label class="sr-only" for="form-select">Name</label>
         <input type="search" class="form-control"style="height: 60px;width: 150px" id="lname" name="name" placeholder="search by dr name">
     </div>



     <button type="submit" class="btn btn-info">
         <span class="glyphicon glyphicon-search"></span> Search
     </button>






</form>
    </div>
<!-- Javascript -->




<!--[if lt IE 10]>

<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>

</html>
