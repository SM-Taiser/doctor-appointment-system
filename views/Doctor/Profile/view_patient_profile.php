<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();

use App\Patient\Auth;
use App\Utility\Utility;
$obj = new App\Patient\Patient();
$obj->prepare($_GET);
$singleUser  = $obj->view_patient();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
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

        .panel-info > .panel-heading {
            background-color:rebeccapurple;
        }

        .panel-title{
            background-color: white;
        }


        .btn-primary{
            background-color: rebeccapurple;
        }

    </style></head>
<body>
<div>

    <?php include ('font_end_navbar.php');?>



<div class="container" align="left">
    <div class="row" align="left" style="margin-top:5%">
        <div class="col-md-6 ">
            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">Patients Profile</h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="left"> <img alt="" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

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
                        <table class="table table-user-information" style="color: black; ">
                            <tbody>

                            <tr>
                                <td>Name</td>
                                <td><?php echo$singleUser->name ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo$singleUser->patient_email?></td>
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


                    </div>
                </div>
            </div>
            <div class="panel-footer">



            </div>
        </div>
    </div>

    <?php
    $obj=new \App\PatientsInfo\PatientsInfo();
    $obj->prepare($_GET);
    $allData = $obj->view_patient_info("obj");
//var_dump($allData);
    ?>


    <div class="col-md-6  ">

        <div class="panel panel-info" >
            <div class="panel-heading"
            <h3 class="panel-title" style="color: white" align="center">View Information</h3>

        </div>

        <br>


        <table class="table table-striped table-striped2 table-bordered thc" style="color: black; ">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">File</th>
                <th class="text-center">Description</th>

            </tr>
            <?php

            foreach ($allData as $oneData) {

                ?>
                <tr>
                    <td> <?php echo $oneData->p_id;?></td>
                    <td> <img src="../../Patient/Profile/images/<?php echo $oneData->file ?>" style="width:100px; height:100px;" alt="" /><br />
                        <a href="../../Patient/Profile/images/<?php echo $oneData->file ?>" download>Download</a>
                    </td>

                    <td><?php echo $oneData->description ?></td>

                </tr>
            <?php } ?>

        </table>



    </div>
    <div class="" >




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
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->
</body>
</html>
