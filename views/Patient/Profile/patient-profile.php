<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();

use App\Patient\Auth;
use App\Utility\Utility;
use App\Message\Message;
$obj = new App\Patient\Patient();
$obj->prepare($_SESSION);
//var_dump($_SESSION);
$singleUser  = $obj->profile_view();

//var_dump($singleUser);


$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('signup.php');
    return;
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


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
<body style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">
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
                        <table class="table table-user-information" style="color: black">
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

                        <a href="../Authentication/logout.php" class="btn btn-primary">logout</a>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Files</a>

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">View Appointment</a>
                    </div>
                </div>
            </div>
            <div class="panel-footer">


                    <a href="edit.php?id=<?php echo $singleUser->id ?>" class="btn btn-primary"  role="button" ><span
                                class="glyphicon glyphicon-edit"> Edit</a>
            </div>
        </div>
    </div>

   <?php
   $obj=new \App\PatientsInfo\PatientsInfo();
   $obj->prepare($_POST);
   $allData = $obj->index("obj");

   ?>


        <div class="col-md-6  ">

            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">View Information</h3>

            </div>

            <br>


            <table class="table table-striped table-striped2 table-bordered thc" style="color: black">
                <tr>

                    <th class="text-center">File</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Action</th>
                </tr>
                <?php

                foreach ($allData as $oneData) {

                    ?>
                    <tr>

                        <td> <img src="images/<?php echo $oneData->file ?>" style="width:100px; height:100px;" alt="" /><br />
                        <a href="images/<?php echo $oneData->file ?>" download>Download</a>
                        </td>

                        <td><?php echo $oneData->description ?></td>
                        <td>   <a onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?p_id=<?php echo $oneData->p_id ?>" class="btn btn-primary"    role="button"><span
                                        class="glyphicon glyphicon-trash"></span> Delete</a> </td>
                    </tr>
                <?php } ?>

            </table>
        </div>


            <!--start of doctor appointment-->
            <?php
            use App\Payment\Payment;
            $obj = new Payment();

            $obj->prepare($_POST);
            // var_dump($_POST);
            $allData = $obj->view_appointment("obj");
            //var_dump($allData);
            ?>
         <!--   <div class="row" align="right" style="margin-top:5%">
                <div class="col-md-12 ">
-->


<!-- end of doctor appointment -->


                    <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <form action="store.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Upload File:</label>
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']  ?>" >

                                    <input type="file" class="form-control" onchange="ValidateSize(this)" name="file" accept=".pdf,.doc,image/*" style="padding: 10px;border:1px solid #51b6bf" required><br>

                                    <input type="text" class="form-control" pattern="[a-zA-Z ]{4,30}" name="description" style="padding: 10px;border:1px solid #51b6bf" required >
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
    <!-- modal---->
    <div class="modal fade patient-report-modal" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">Doctor Name</th>
                                <th class="text-center">Patient Name</th>
                                <th class="text-center">Chamber Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Day</th>
                                <th class="text-center">Time</th>
                                <th class="text-center"> Visiting Fee</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($allData as $oneData) {

                                ?>
                                <tr>
                                    <td> <?php echo $oneData->doctorname?></td>
                                    <td> <?php echo $oneData->patientName?></td>
                                    <td> <?php echo $oneData->chamberName?></td>
                                    <td> <?php echo $oneData->date?></td>
                                    <td> <?php echo $oneData->day?></td>
                                    <td><?php echo $oneData->time?></td>
                                    <td> <?php echo  $oneData->amount; ?></td>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>







<!-- Javascript -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>

<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function ValidateSize(file) {
            var Filesize=file.files[0].size / 1024 / 1024;

            if(Filesize > 2){
                alert('file size exceeds 2mb');
            } else {

            }
        }


    </script>

<![endif]-->

 <style type="text/css">

       .patient-report-modal
       {
           left:-200px;
       }
       .patient-report-modal .modal-content
       {
           width:900px;
       }

 </style>


</body>
</html>
