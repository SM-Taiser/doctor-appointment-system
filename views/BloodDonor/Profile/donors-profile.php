<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();
use App\BloodDonor\BloodDonor;
use App\BloodDonor\Auth;

use App\Message\Message;
use App\Utility\Utility;

$obj = new BloodDonor();
$obj->prepare($_SESSION);
$singleUser  = $obj->view_profile();
$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('BloodDonor/Profile/donors-login.php');
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
            color: black;
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

<?php include ('font_end_navbar.php');?>
<div class="container" align="left">
    <div class="row" align="left">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white">Donors Profile</h3>
            </div>
            <div class="panel-body">
                <div class="row">
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

                                <tr>
                                    <td>Name</td>
                                    <td><?php echo$singleUser->name ?></td>
                                </tr>


                                <tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo$singleUser->donor_email ?></td>
                                </tr>

                                <tr>
                                    <td>City</td>
                                    <td><?php echo$singleUser->city?></td>
                                </tr>

                                <tr>
                                    <td>Blood Group</td>
                                    <td><?php echo$singleUser->blood_grp?></td>
                                </tr>

                                <tr>
                                    <td>Area Coverage</td>
                                    <td> <?php echo$singleUser->area_coverage?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo$singleUser->phone ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo$singleUser->address ?></td>
                                </tr>

                             <tr>
                                 <td>Ready To Donate</td>
                                 <td><?php echo $singleUser->ready_to_donate ?></td>
                             </tr>

                                <tr>
                                    <td>Age
                                    </td>
                                    <td><?php echo $singleUser->age ?></td>
                                </tr>







                            </table>


                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="text-align: right">

                           <a href="edit.php?id=<?php echo $singleUser->id ?>" class="btn btn-primary"  role="button" ><span
                                       class="glyphicon glyphicon-edit" ></span> Edit</a>





                </div>
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
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>
</html>
