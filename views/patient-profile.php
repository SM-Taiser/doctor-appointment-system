<?php
require_once ("../vendor/autoload.php");

if(!isset($_SESSION) )session_start();
use App\Patient\Patient;
use App\Patient\Auth;
use App\Utility\Utility;
$obj = new App\Patient\Patient();
$obj->prepare($_SESSION);
$singleUser  = $obj->view();

$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('User/Profile/signup.php');
    return;
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../resource/assets/css/style.css">

    <style>

        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
        .toppad
        {margin-top:20px;
        }

    </style></head>
<body>

<div class="container" align="left">
    <div class="row" align="left">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Doctors Profile</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="left"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                        <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                          <dl>
                            <dt>DEPARTMENT:</dt>
                            <dd>Administrator</dd>
                            <dt>HIRE DATE</dt>
                            <dd>11/12/2013</dd>
                            <dt>DATE OF BIRTH</dt>
                               <dd>11/12/2013</dd>
                            <dt>GENDER</dt>
                            <dd>Male</dd>
                          </dl>
                        </div>-->
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td><?php echo$singleUser->id ?></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo$singleUser->name ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo$singleUser->email?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo$singleUser->phone ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo$singleUser->address ?></td>
                                </tr>


                                </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">My Sales Performance</a>
                            <a href="#" class="btn btn-primary">Team Sales Performance</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                    <span class="pull-right">
                           <a href="edit.php?id=<?php echo $singleUser->id ?>" class="btn btn-info" role="button"><span
                                   class="glyphicon glyphicon-edit"></span> Edit</a>

                        </span>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var panels = $('.user-infos');
        var panelsButton = $('.dropdown-user');
        panels.hide();

        //Click dropdown
        panelsButton.click(function() {
            //get data-for attribute
            var dataFor = $(this).attr('data-for');
            var idFor = $(dataFor);

            //current button
            var currentButton = $(this);
            idFor.slideToggle(400, function() {
                //Completed slidetoggle
                if(idFor.is(':visible'))
                {
                    currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
                }
                else
                {
                    currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
                }
            })
        });


        $('[data-toggle="tooltip"]').tooltip();

        $('button').click(function(e) {
            e.preventDefault();
            alert("This is a demo.\n :-)");
        });
    });
</script>
<!-- Javascript -->
<script src="../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>
