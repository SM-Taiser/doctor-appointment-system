<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>


    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../resource/assets/css/style.css">
    <style>  ul{
    padding: 0;
    list-style: none;
    background: #f2f2f2;
    }
    ul li{
    display: inline-block;
    position: relative;
    line-height: 21px;
    text-align: left;
    }
    ul li a{
    display: block;
    padding: 8px 25px;
    color: #333;
    text-decoration: none;
    }
    ul li a:hover{
    color: #fff;
    background: #939393;
    }
    ul li ul.dropdown{
    min-width: 100%; /* Set width of the dropdown */
    background: #f2f2f2;
    display: none;
    position: absolute;
    z-index: 999;
    left: 0;
    }
    ul li:hover ul.dropdown{
    display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li{
    display: block;
    }




    </style>
</head>
<body>






<div class="container">
    <form class="form-inline" action="BloodDonor/search.php" method="get">
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
                <label class="sr-only" for="form-select">Blood Group</label>
                <select class="form-control" id="country"
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
            <input type="search" class="form-control" id="lname" name="area_coverage" placeholder="search your area">
            </div>



        <button type="submit" class=" btn-info small">Search</button>
        </div>








<!-- /.carousel -->






</body>
</html>