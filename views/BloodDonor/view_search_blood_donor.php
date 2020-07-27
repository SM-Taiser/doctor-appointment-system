<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>


    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!--ICON -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--ICON -->

</head>
<body>
<?php include ('font_end_navbar.php');?><br>


<h1 class="animate-flicker " style="font-weight:normal;text-align:center;font-size:22pt;color:darkblue;font-family: Georgia,serif"><i class="fas fa-heartbeat"></i> Search Blood Donor</h1><br><br>


<div class="container" style="text-align: center">
    <form class="form-inline" action="search.php" method="get">
        <div class="form-group">

            <label class="sr-only" for="form-select">City</label>
            <select class="form-control"style="height: 60px;width: 150px" id="country"
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
            <label class="sr-only" for="form-select">Blood Group</label>
            <select class="form-control"style="height: 60px;width: 150px" id="country"
                    name="blood_grp">
                <option value="">Select Your Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div class="form-group">
            <label class="sr-only" for="form-select">Area Coverage</label>
            <input type="search" class="form-control"style="height: 60px;width: 150px" id="lname" name="area_coverage" placeholder="search your area">
        </div>



        <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-search"></span> Search
        </button>
</div>








<!-- /.carousel -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<![endif]-->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>





</body>
</html>