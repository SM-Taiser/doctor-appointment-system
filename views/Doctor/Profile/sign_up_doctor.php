<?php

include_once('../../../vendor/autoload.php');
use App\Message\Message;
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

<?php include ('font_end_navbar.php')?>


<div id="message">

    <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
        echo "&nbsp;" . Message::message();
    }
    Message::message(NULL);

    ?>
</div>






<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="alert alert-info"  style="text-align:justify;"><p class="doc_name">Welcome to Doctor patient efficient portal ! By signing up with  Doctor patient efficient portal, you confirm your	understanding and agreement that each appointment brought to	you by  Doctor patient efficient portal will have a nominal fee of <span class="badge">BDT 20</span> . </div>
            <h3 class="text-center " style="font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif,">Registration Form</h3>
            <hr>
            <form id="myForm" class="form-horizontal" action="registration.php" method="post" enctype="multipart/form-data" onsubmit="return(validate());">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="fname">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" pattern="[A-Za-z-,. ]{5,35}$" placeholder="Name" id="fname" name="name" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="fname">Picture</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="fname" name="pic" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="form-select">City</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="country"
                                name="city" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
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
                </div>


                <div  class="form-group">
                    <label class="control-label col-sm-2" for="lname">Degree</label>
                    <div class="col-sm-8">
                        <textarea class=" form-control" name="degree"   placeholder="Just add your degree e.g MBBS,FCPS,FRCS" style="height:80px;width:20px resize:vertical;border:1px solid #51b6bf " required></textarea>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Designation</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" pattern="[A-Za-z-,.&() ]{10,35}$" name="designation" placeholder="e.g professor\consultant with hospital name" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" name="email" placeholder="Email" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="lname"  name="password" placeholder="password" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Phone Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname"  pattern="[0-9]{11}" title="Contains only number and range have to be exact 11" name="phone" placeholder="Phone Number" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Address</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  pattern="[A-Za-z0-9-,.() ]{5,50}" maxlength="50" id="lname" name="address" placeholder="Address" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Gender</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="country" name="gender" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Visiting Fee</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" min="100" max="1000" id="lname" name="visiting_fee" placeholder="Visiting Fee" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>


                <div class="form-group">

                    <div class="col-sm-8">
                        <input type="hidden" class="form-control"  id="lname" name="is_active" value="Yes" placeholder="Visiting Fee" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">BMDC Reg No</label>
                    <div class="col-sm-8">
                        <input type="text" pattern="[1-9]{1,1}[0-9]{0,4}" maxlength="5" title="please only input numeric number without A,minimum 1 and maximum 5" class="form-control" id="lname" name="bmdc_reg_no" placeholder="BMDC Reg No" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Select Catagory</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="country"   name="category" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>

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
                </div>

                <div class="text-center col-md-12">
                    <div class="col-sm-2"></div>
                    <input class="btn btn-lg btn-success col-sm-8" style="background-color:#5cb85c;text-align: center" type="submit" value="submit">
                </div>
                <div>
                    <p style="text-align: center"><b>if you are registered doctor?Please Sign in NOW!<a href="doctor-login.php">Sign in</a></b></p>
                </div>
            </form><br>

        </div>
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
    //    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>
<script>
    function validate()
    {
        var myForm = document.getElementById("myForm");

        var string_1 = myForm.elements.namedItem("password").value;


        if(string_1.length < 6 ){
            alert( "Password Should be minimum 6 characters" );
            myForm.elements.namedItem("password").focus() ;
            return false;
        }

    }
</script>




</html>
