<?php
include_once('../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\Message\Message;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOCTOR LOGIN!</title>
    <!-- CSS -->
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/style.css">



</head>
<body>
<!-- Top content -->
<?php include ('font_end_navbar.php')?>

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
            <div class="col-sm-3"></div>
            <div class="col-sm-5">


                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top" style="text-align:center">
                        <div class="form-top-left">
                            <h3>Login to our site</h3>
                            <p>Enter email and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom" style="background-color:white">
                        <form role="form" action="../Authentication/login.php" method="post" class="login-form" >
                            <div class="form-group" style="width:450">
                                <label class="sr-only" for="email">Email</label>
                                <input type="text" name="email" placeholder="Email..." class="form-email form-control"style="height: 50px;border-color: #51b6bf" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" style="height: 50px;border-color: #51b6bf"id="form-password">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 300px">Sign in!</button>
                        </form>
                        <p style="text-align: center"><b> Are you a doctor and still not on Doctor Patient Efficient Portal?Please Sign Up NOW!<a href="sign_up_doctor.php">Sign up</a></b></p>
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
                <!--
                                    <div class="form-box" style="margin-top: 0%">
                                        <div class="form-top">
                                            <div class="form-top-left">
                                                <h3>Sign up now</h3>
                                                <p>Fill in the form below to get instant access:</p>
                                            </div>
                                            <div class="form-top-right">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                        </div>
                                        <div class="form-bottom">
                                            <form role="form" action="registration.php" method="post" class="registration-form">
                                                <div class="form-group">
                                                    <label class="sr-only" for="form-first_name">First name</label>
                                                    <input type="text" name="first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="form-last-name">Last name</label>
                                                    <input type="text" name="last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="form-email">Email</label>
                                                    <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                                                </div>

                                                <div class="form-group">
                                                    <label class="sr-only" for="form-password">Password</label>
                                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="form-email">Phone</label>
                                                    <input type="text" name="phone" placeholder="Phone..." class="form-phone form-control" id="form-phone">
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="address">Address</label>
                                                            <input type="text" name="address" placeholder="Address..." class="form-address form-control" id="form-address">
                                                </div>
                                                <button type="submit" class="btn">Sign me up!</button>
                                            </form>
                                        </div>
                                    </div>
                -->
            </div>
        </div>

    </div>
</div>

<!-- Javascript -->


<!--[if lt IE 10]>

<![endif]-->

</body>

<script>
   // $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>
<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</html>

