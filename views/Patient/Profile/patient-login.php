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
    <title>Signing up as customer!</title>

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

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">




</head>
<body style="background-color: #F8ECF9">
<!-- Top content -->
<div class="top-content">
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
                        <div class="form-top-left"  style="font-size:20px; color: black;font-family:sans-serif" >
                            <h3>Login to our site</h3>
                            <p>Enter username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom" style="background-color: #fff">
                        <form role="form" action="../Authentication/login.php" method="post" class="login-form">
                            <div class="form-group" style="border-color:#65b037;color: #fff;font-family: sans-serif;">
                                <input type="text" name="patient_email" placeholder="Email..." class="form-email form-control" id="form-email" style=" padding: 10px;border:1px solid #51b6bf" required>

                            </div>
                            <div class="form-group">

                                <input type="password" id="myPsw" name="password" placeholder="Password..." class="form-password form-control" style="; padding: 10px;border:1px solid #51b6bf" required>
                            </div>
                            <button type="submit" class="btn" style=" background-color:#5bc0de ">Sign in!</button>
                        </form>
                        <a href="forgotten.php">Forgot Password?</a>
                    </div>
                </div>


            </div>

            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left"  style="font-size:20px; color: black;font-family:sans-serif">
                            <h3>Sign up now</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <p id="demo"></p>
                    <div class="form-bottom" style="background-color: #fff">
                        <form role="form" id="myForm" action="registration.php" method="post" class="registration-form" onsubmit="return(validate());">
                            <div class="form-group">

                                <input type="text" name="name"  placeholder="user name..." class="form-first-name form-control" id="form-first-name" style="; padding: 10px;border:1px solid #51b6bf" required>
                            </div>

                            <div class="form-group">

                                <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email" style="; padding: 10px;border:1px solid #51b6bf" required>
                            </div>

                            <div class="form-group">

                                <input type="password" id="myPsw" name="password" placeholder="Password..." class="form-password form-control" style="; padding: 10px;border:1px solid #51b6bf" required>
                            </div>
                            <div class="form-group">

                                <input type="text" name="phone" placeholder="Phone..." class="form-phone form-control" id="form-phone" style="; padding: 10px;border:1px solid #51b6bf" required>
                            </div>
                            <div class="form-group">

                                <input type="text" name="address" placeholder="Address..." class="form-address form-control"  id="form-address" style="; padding: 10px;border:1px solid #51b6bf;" required>
                            </div>
                            <button onclick="myFunction()" type="submit" class="btn"  style="background-color:#5bc0de">Sign me up!</button>
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

</html>

