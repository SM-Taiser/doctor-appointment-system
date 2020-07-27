<?php
if (!isset($_SESSION)) session_start();
include_once('../../../vendor/autoload.php');
use App\Message\Message;
?>


<!DOCTYPE html>
<html>
<head>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">
    <link href="../../../resource/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../../../resource/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="../../../resource/css/nivo-lightbox.css" rel="stylesheet"/>
    <link href="../../../resource/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css"/>
    <link href="../../../resource/css/owl.carousel.css" rel="stylesheet" media="screen"/>
    <link href="../../../resource/css/owl.theme.css" rel="stylesheet" media="screen"/>
    <link href="../../../resource/css/animate.css" rel="stylesheet"/>
    <style>
        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }
    </style>
</head>

<body style=" background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">
<div id="message">

</div>

<div class="navbar nav" style="background-color: darkred">
    <ul class="nav navbar-nav pull-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
               style="color: White; font-family: Georgia,serif;font-size: 12pt">Go to <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="../../index.php?catID=2">Admin Home</a></li>
                <li><a href="../../test2.php">User View</a></li>
                <li><a href="../../manage-doctor.php">Manage Doctor</a></li>
                <li><a href="../../index_trash.php">Trash List</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
               style="color: White; font-family: Georgia,serif;font-size: 12pt">Settings <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="../../Admin/Authentication/logout.php"
                       style="color: red; font-family: Georgia,serif;font-size: 12pt">Logout</a></li>

            </ul>
        </li>


    </ul>
</div>

<header class="tab-content">

    <p style="color:black;font-family: Georgia,serif"><u>Welcome to backend view</u></p>
</header>


<h1 class="animate-flicker " style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Add Doctors</h1>



    <div class="container">
        <form class="form-inline" action="search.php" method="get">
            <div class="form-group">

                <label class="sr-only" for="form-select">City</label>
                <select class="form-control" id="country"
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
        <select class="form-control" id="country" name="category">

                <option value="">Select Category</option>
                <option value="Medicine">Medicine</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Gynecologist">Gynecologist</option>
                <option value="Neurologist">Neurologist</option>
                <option value="Orthopedic">Orthopedic</option>
                <option value="Nefrologist">Nefrologist</option>
                <option value="Pediatrician">Pediatrician</option>
        </div>



            <div class="form-group">
                <label class="sr-only" for="form-select">Area Coverage</label>
                <input type="search" class="form-control" id="lname" name="area_coverage" placeholder="search your area">
            </div>


            <button type="submit" class=" btn-info lg">Search</button>
    </div>
</div>
</form>

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
<script>

    function checkPassword(str)
    {
        // at least one number, one lowercase and one uppercase letter
        // at least six characters
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        return re.test(str);
    }

</script>

</html>
