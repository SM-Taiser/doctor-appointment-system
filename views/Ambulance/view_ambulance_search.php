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

<body>
<?php include ('font_end_navbar.php');?><br>
<div id="message">

</div>


<header class="tab-content">


</header>


<h1 class="animate-flicke " style="font-weight: normal; text-align:center;font-size:250%;color:darkblue;font-family: Georgia,serif"><i class="fas fa-ambulance"></i> Search Ambulance service provider</h1><br><br>



<div class="container" style="text-align:center">
    <form class="form-inline" action="search.php" method="get">
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
        <label class="sr-only" for="form-select">Category</label>
        <select class="form-control"  style="height: 60px;width: 150px" id="country"
                name="specification" >
            <option value="">Select Category</option>
            <option value="NonAc">Non Ac</option>
            <option value="A/c">Ac</option>
            <option value="Freezing">Freezing</option>
            <option value="ICU">ICU</option>

        </select><br>
        </div>


        <div class="form-group">
            <label class="sr-only" for="form-select">Area Coverage</label>
            <input type="search" class="form-control" style="height: 60px;width: 150px" id="lname" name="area_coverage" placeholder="search your area">
        </div>


        <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
</div>


<!-- Javascript -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>


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
