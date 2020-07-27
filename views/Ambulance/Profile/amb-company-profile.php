<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();
use App\Ambulance\Ambulance;
use App\Ambulance\Auth;


use App\Message\Message;
use App\Utility\Utility;

$obj = new Ambulance();
$obj->prepare($_SESSION);
$singleUser  = $obj->view_profile();
$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Ambulance/Profile/amb-company-login.php');
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
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
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

<div class="container" align="left">
    <div class="row" align="left" style="margin-top:5%">
        <div class="col-md-4 ">
            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">Ambulance company Profile</h3>
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
                                    <td> Name</td>
                                    <td><?php echo$singleUser->comp_name ?></td>
                                </tr>


                                <tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo$singleUser->ambulance_email ?></td>
                                </tr>

                                <tr>
                                    <td>City</td>
                                    <td><?php echo$singleUser->city?></td>
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


                            </table>

                            <a href="../Authentication/logout.php" class="btn btn-primary">logout</a>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Driver</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">

                    <a href="edit.php?amb_comp_id=<?php echo $singleUser->amb_comp_id ?>" class="btn btn-primary"  role="button" ><span
                                       class="glyphicon glyphicon-edit"></span> Edit</a>


                </div>
        </div>
    </div>
            <?php
            $obj=new \App\Driver\Driver();
            $obj->prepare($_POST);
            //var_dump($_POST);
            $allData = $obj->index("obj");
           // var_dump($allData);

            ?>


            <div class="col-md-8  ">

                <div class="panel panel-info" >
                    <div class="panel-heading"
                    <h3 class="panel-title" style="color: white" align="center">Driver Info</h3>

                </div>

                <br>

            <div class="table-responsive">
                <table class="table table-striped table-striped2 table-bordered " style="color: black">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Ambulance No</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Driver Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone no</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Availability</th>
                        <th class="text-center"  >Action</th>
                    </tr>
                    <?php

                    foreach ($allData as $oneData) {

                        ?>
                        <tr>

                            <td> <?php echo $oneData->driver_id;?></td>
                            <td> <?php echo $oneData->ambulance_no ?> </td>
                            <td><?php echo $oneData->specification?></td>
                            <td> <?php echo $oneData->driver_name?></td>
                            <td><?php echo $oneData->email?></td>
                            <td><?php echo $oneData->phone?></td>
                            <td><?php echo $oneData->address ?></td>
                            <?php if($oneData->availability=='Yes'){ ?>
                                <td class="btn-success"> <?php echo $oneData->availability; ?></td>
                            <?php } else{ ?>
                                <td class="btn-danger"> <?php echo $oneData->availability; ?></td>
                            <?php } ?>

                            <td>
                                <a href="driver-edit.php?driver_id=<?php echo $oneData->driver_id ?>" class="btn btn-primary" ><span
                                            class="glyphicon glyphicon-edit" title="Edit"></span> </a><!--.for driver..-->
                                <a href="delete.php?driver_id=<?php echo $oneData->driver_id ?>" class="btn btn-primary"    ><span
                                            class="glyphicon glyphicon-trash" title="Delete"></span> </a>
                            </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Driver</h4>
                            </div>
                            <div class="modal-body">
                                <form action="../../Driver/Profile/registration.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="sr-only"></label>
                                        <input type="hidden" name="amb_comp_id" value="<?php echo $_SESSION['amb_comp_id']  ?>" ><br>

                                        <input type="text" class="form-control" pattern="[0-9-]{7}"  name="ambulance_no" placeholder="Ambulance No" required><br>

                                        <input type="text" class="form-control" pattern="[A-Za-z-,. ]{5,35}$" name="driver_name" placeholder="driver Name" required><br>

                                            <label class="sr-only" for="form-select">Category</label>
                                            <select class="form-control" id="country"
                                                    name="specification" required>
                                                <option value="">Select Category</option>
                                                <option value="NonAc">NonAc</option>
                                                <option value="A/c">Ac</option>
                                                <option value="Freezing">Freezing</option>
                                                <option value="ICU">ICU</option>


                                            </select><br>

                                        <input type="email" class="form-control"  name="email" placeholder="email" required><br>
                                        <input type="number"  pattern="[0-9]{11}" class="form-control"  name="phone" placeholder="Phone" required><br>
                                        <input type="text"  pattern="[A-Za-z0-9-,.() ]{5,50}"  class="form-control"  name="address" placeholder="Address" required><br>

                                        <select class="form-control" id="country"
                                                name="availability" required>
                                            <option value=""> Availability</option>
                                            <option class="a" style="color: green" value="Yes" >Yes</option>
                                            <option class="b" style="color: red" value="No"  >No</option>

                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="" >




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


</body>
</html>
