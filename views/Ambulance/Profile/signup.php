<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');


use App\Message\Message;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../../../css/style.css">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <span class="text-center toggle-nav-title">Menu</span>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">MENU</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

            <div id="navbar" class="navbar-menu">
                <ul class="nav navbar-nav">
                    <li> <a href="../../../home.php">Home</a></li>
                    <li> <a href="../../Patient/view_search_doctor.php">Doctors</a></li>
                    <li> <a href="../../BloodDonor/view_search_blood_donor.php">Blood Donor</a></li>
                    <li> <a href="../view_ambulance_search.php">Ambulance</a></li>

                </ul>

            </div>



    </div>
</nav>
<!-- Top content -->
<div class="top-content text-center">
        <div class="container" >
            <table>
                <tr>
                    <td width='230' >

                    <td width='600' height="50" >


                        <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                            <div  id="message" class="form button"   style="font-size: smaller  " >
                                      <center>
                                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                        echo "&nbsp;".Message::message();
                                    }
                                    Message::message(NULL);
                                    ?></center>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            </table>

            <div class="row" >
                <div class="col-sm-5">


                    <div class="form-box" style="margin-top: 0%">
                        <div class="form-top">
                            <div class="form-top-left" style="color: black;font-size: 20px;font-family: sans-serif">
                                <p>Login to our site</p>
                                <p>Enter username and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom" style="background-color: white">
                            <form role="form" action="../Authentication/login.php" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" name="ambulance_email"  placeholder="Email..." class="form-email form-control" id="form-email" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>
                                <button type="submit" class="btn">Sign in!</button>
                            </form>

                        </div>
                    </div>
<!--
                    <div class="social-login">
                        <h3>...or login with:</h3>
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                <i class="fa fa-google-plus"></i> Google Plus
                            </a>
                        </div>
                    </div>-->

                </div>

                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1"></div>

                <div class="col-sm-5">

                    <div class="form-box" style="margin-top: 0%">
                        <div class="form-top">
                            <div class="form-top-left" style="color: black;font-size: 20px;font-family: sans-serif">
                                <p>Sign up now</p>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom" style="background-color: white">
                            <form role="form" id="myForm" action="registration.php" method="post" class="registration-form" onsubmit="return(validate());">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first_name">Company Name</label>
                                    <input type="text" name="comp_name"  pattern="[A-Za-z-,. ]{5,35}$" placeholder="Ambulance Service Provider Name" class="form-name form-control" id="form-name" autocomplete="off" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="ambulance_email" placeholder="Email" class="form-email form-control" id="form-email" autocomplete="off" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>

                                <div class="form-group" style=" padding: 10px;border:1px solid #51b6bf">
                                    <label class="sr-only" for="form-select">City</label>
                                    <select class="form-control" id="country"
                                            name="city" required>
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
                                    <label class="sr-only" for="form-area-coverage"> Area Coverage</label>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" style="background-color:white" title="You can add your around area e.g if your location is gec more chittagong, you can add as a area coverage  wasa,mehedibag,2no gate,muradpur etc ">See instruction about area coverage</a>
                                    <input type="text" name="area_coverage" pattern="[a-zA-Z0-9-,. ]{6,60}"  placeholder="Area Coverage" class="form-area form-control" id="form-password" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>



                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Phone</label>
                                    <input type="text" name="phone" pattern="[0-9]{11}" title="Contains only number and range have to be exact 11" placeholder="Phone..." class="form-phone form-control" id="form-phone" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="address">Address</label>
				                        	<input type="text" name="address"pattern="[A-Za-z0-9-&,/.() ]{5,80}" placeholder="Address..." class="form-address form-control" id="form-address" style=" padding: 10px;border:1px solid #51b6bf" required>
                                </div>




                                <button type="submit" class="btn">Sign me up!</button>
                            </form>
                        </div>
                    </div>

                </div>
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

<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>

