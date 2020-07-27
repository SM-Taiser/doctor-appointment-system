<?php
require_once ("../../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();
use App\Doctor\Doctor;
use App\Doctor\Auth;
use App\Message\Message;
use App\Utility\Utility;

$objDoctor = new Doctor();
$objDoctor->prepare($_SESSION);
$singleUser  = $objDoctor->view_profile();
$auth= new Auth();
$status= $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Doctor/Profile/doctor-login.php');
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
    <div class="row" align="left" style="margin-top:5%">
        <div class="col-md-5 ">
            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">Doctors Profile</h3>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="left"> <img src="images/<?php echo $singleUser->pic ?>" style="width:150px; height:100px;" alt=""  class="img-circle img-responsive"> </div>
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
                            <div class="table-responsive">
                            <table class="table table-user-information">
                                <tr>

                                <tr>
                                    <td>Name</td>
                                    <td><?php echo$singleUser->name ?></td>
                                </tr>
                                <tr>
                                    <td>Designation</td>
                                    <td><?php echo$singleUser->designation?></td>
                                </tr>
                                <tr>
                                      <td>City</td>
                                       <td><?php echo $singleUser->city ?></td>
                                </tr>

                                <tr>
                                    <td>Degree</td>
                                    <td><?php echo $singleUser->degree ?> </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo$singleUser->email ?></td>
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
                                     <td> Visiting Fee</td>
                                <td><?php echo$singleUser->visiting_fee ?>  </td>


                                <tr>


                                <td>Gender</td>
                                <td><?php echo$singleUser->gender ?>
                                </td>
                                </tr>



                                </tbody>
                            </table>
                            </div>
                        </div>
                </div>
                          <div class="container">
                              <div class="row">
                                  <div class="col-sm-2">
                            <a href="../Authentication/logout.php" class="btn btn-primary">logout</a>
                            <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">Add Chamber</a>
                                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Add Appointment</a>
                                  </div>
                                  <div class="col-sm-2">

                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Leave</a>
                                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">View Leave Day</a>

                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-2">


                                  </div>
                              </div>

                          </div>



                </div>
                <div class="panel-footer">

                           <a href="edit.php?id=<?php echo $singleUser->id ?>" class="btn btn-primary"  role="button" ><span
                                       class="glyphicon glyphicon-edit"></span> Edit</a>
                </div>

        </div>

        <?php
        use App\Payment\Payment;
        $obj = new Payment();

        $obj->prepare($_POST);
        // var_dump($_POST);
        $allData = $obj->view_report("obj");
        //var_dump($allData);



        ?>

<div class="well">
    <center>
    <h3>Report</h3></center>

    <div class="container">
        <div class="row">

            <div class="col-sm-2">
                <h5>Start Date</h5>
                <form method="post">
                    <input  type="date"  class="form-control" id="dateTimepicker" name="startdate" placeholder="dd/mm/yy" required>
            </div>
            <div class="col-sm-2">
                <h5>End date</h5>
                <input  type="date"  class="form-control" id="dateTimepicker" name="enddate" placeholder="dd/mm/yy" required>
            </div>

        </div>

    </div>
    <center>
        <button type="submit" class="btn btn-default" style="text-align: center">Submit</button></center> </form>


    <div class="table-responsive">
        <table  class="table table-striped table-bordered" >
            <thead>
            <tr>

                <th class="text-center">Patient Name</th>

                <th class="text-center">Date</th>
                <th class="text-center">Day</th>
                <th class="text-center">Time</th>
                <th class="text-center">Fee</th>


            </tr>
            </thead>
            <tbody>
            <?php
            $sum=0;
            if (isset($allData)){
            foreach ($allData as $oneData) {

                ?>
                <tr>

                    <td> <?php echo $oneData->name; ?></td>

                    <td> <?php echo $oneData->date; ?></td>
                    <td> <?php echo $oneData->day; ?></td>
                    <td> <?php echo $oneData->time; ?></td>
                    <td> <?php echo $oneData->visiting_fee-50; ?></td>
                   <?php $sum+= $oneData->visiting_fee-50;?>
                </tr>
            <?php } }?>
            </tbody>

        </table>


</div>
    <h3>Total=<?php echo $sum?>Tk</h3>

</div>


           </div>






    <!--start of Chamber-->
<?php
$obj=new \App\chambers\chambers();
$obj->prepare($_POST);
$allData = $obj->index("obj");

?>


<div class="col-md-7  ">

    <div class="panel panel-info" >
        <div class="panel-heading"
        <h3 class="panel-title" style="color: white" align="center">Chamber</h3>

    </div>

    <br>


    <table class="table table-striped table-striped2 table-bordered thc" style="color: black; ">
        <tr>
            <th class="text-center" style="">ID</th>
            <th class="text-center">Chamber Name</th>
            <th class="text-center">Address</th>
            <th class="jumbotron" width="20%" >Action</th>
        </tr>
        <?php

        foreach ($allData as $oneData) {

            ?>
            <tr>
                <td> <?php echo $oneData->chamb_id;?></td>
                </td>

                <td><?php echo $oneData->chamber_name ?></td>
                <td><?php echo $oneData->address ?></td>

            <td>
                <a href="Edit_chambers.php?chamb_id=<?php echo $oneData->chamb_id ?>" class="btn btn-primary" ><span
                            class="glyphicon glyphicon-edit" title="Edit"></span> </a><!--.for chambers..-->

                <a onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?chamb_id=<?php echo $oneData->chamb_id ?>" class="btn btn-primary" ><span
                                class="glyphicon glyphicon-trash" title="Delete"></span> </a>
            </td>
            </tr>
        <?php } ?>

    </table>

</div>
    <!--start of Appointment-->

    <?php
    $obj=new \App\Appointment\Appointment();
    $obj->prepare($_POST);
    //var_dump($_POST);
    $allData = $obj->index();

    ?>
    <div class="row" align="right" style="margin-top:5%">
    <div class="col-md-12 ">

        <div class="panel panel-info" >
            <div class="panel-heading"
            <h3 class="panel-title" style="color: white" align="center">Appointment</h3>

        </div>

        <br>

        <div class="table-responsive">
        <table class="table table-striped table-striped2 table-bordered thc" style="color: black; ">
            <tr>
                <th class="text-center">Chamber Name</th>
                <th class="text-center">Day</th>
                <th class="text-center">Time</th>
                <th class="jumbotron" width="20%" >Action</th>
            </tr>
            <?php

            foreach ($allData as $oneData) {

                ?>
                <tr>
                    <td><?php echo $oneData->chamber_name ?></td>
                    <td><?php echo $oneData->day ?></td>
                    <td><?php echo $oneData->time ?></td>

                    <td>
                        <a href="appointment_edit.php?chamb_id=<?php echo $oneData->chamb_id ?>&appointment_id=<?php echo $oneData->appointment_id?>" class="btn btn-primary" ><span
                                    class="glyphicon glyphicon-edit" title="Edit"></span> </a><!--.for chambers..-->
                        <?php $_GET['chamb_id']=$oneData->chamb_id?>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="appointment_delete.php?chamb_id=<?php echo $oneData->chamb_id ?>&appointment_id=<?php echo $oneData->appointment_id?>" class="btn btn-primary"    ><span
                                    class="glyphicon glyphicon-trash" title="Delete"></span> </a>
                    </td>
                </tr>
            <?php } ?>

        </table>
        </div>
    </div>
</div>

<!--start of Patient Request-->
    <?php

    $obj = new Payment();

    $obj->prepare($_POST);
   // var_dump($_POST);
    $allData = $obj->doctor_view_patients("obj");
    //var_dump($allData);



    ?>

        <div class="col-md-12 ">

            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">Booking Details</h3>

            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-striped table-striped2 table-bordered thc" style="color: black; ">
                    <tr>
                        <th class="text-center">Doctor Name</th>
                        <th class="text-center">Patient Name</th>
                        <th class="text-center">Chamber Name</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Day</th>
                        <th class="text-center">Time</th>
                        <th class="text-center"> Visiting Fee</th>


                        <th class="text-center">Action</th>
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



                            <td>

                                <a href="view_patient_profile.php?patient_id=<?php echo $oneData->patient_id ?>" class="btn btn-success" role="button"><span
                                            class="glyphicon glyphicon-user"></span> view profile</a>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>


            <!--End of patient request-->

    <?php
    $obj=new \App\chambers\chambers();
    $obj->prepare($_POST);
    $allData = $obj->index("obj");
    ?>



        <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:left">Add Chamber</h4>
                </div>
                <div class="modal-body" style="color: black">
                    <form action="store.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['dr_id']  ?>" >

                            <input type="text" class="form-control" pattern="[A-Za-z-,&.() ]{5,70}$" name="chamber_name" placeholder="Chamber Name" style="padding: 10px;border:1px solid #51b6bf" required><br>
                            <input type="text" class="form-control" pattern="[A-Za-z0-9-&,/.() ]{5,80}"  name="address" placeholder="Address"style="padding: 10px;border:1px solid #51b6bf" required><br>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" style="color: black">
                    <form action="appointment_store.php" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="text-align:left" >
                            <input type="hidden" name="id" value="<?php echo $_SESSION['dr_id']  ?>" >
                            <label class="sr-only" for="form-select">  Select Chamber</label>

                            <select class="form-group" id="chamber"
                                    name="chamb_id" required>

                                <option value=""> Select Chamber</option>
                                <?php

                                foreach ($allData as $oneData) {
                                    ?>

                                    <option value="<?php echo $oneData->chamb_id; ?>"><?php echo $oneData->chamber_name; ?></option>

                                <?php } ?>

                            </select>
                        </div>

                        <h4 class="modal-title" style="text-align:left">Choose Your Day</h4>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Sat" name="day[]">Saturday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Sun" name="day[]">Sunday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Mon" name="day[]">Monday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Tue" name="day[]">Tuesday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Wed" name="day[]">Wednesday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Thu" name="day[]">Thursday
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="Fri" name="day[]">Friday
                            </label>
                            <br>

                        </div>


                        <div class="form-group" style="text-align:left">
                            <h4 class="modal-title">Choose Your Time</h4>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="9.15am" name="time[]">9.15am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="9.30am" name="time[]">9.30am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="9.45am" name="time[]">9.45am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="10am" name="time[]">10am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="10.15am" name="time[]">10.15am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="10.30am" name="time[]">10.30am
                            </label>
                            <br>

                        </div>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="10.45am" name="time[]">10.45am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="11.00am" name="time[]">11.00am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="11.15am" name="time[]">11.15am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="11.30am" name="time[]">11.30am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="11.45am" name="time[]">11.45am
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="12.00pm" name="time[]">12.00pm
                            </label>
                        </div>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="12.15pm" name="time[]">12.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="12.30pm" name="time[]">12.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="12.45pm" name="time[]">12.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1.00pm" name="time[]">1.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1.15pm" name="time[]">1.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1.30pm" name="time[]">1.30pm
                            </label>
                        </div>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1.45pm" name="time[]">1.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2.00pm" name="time[]">2.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2.15pm" name="time[]">2.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2.30pm" name="time[]">2.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="2.45pm" name="time[]">2.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3.00pm" name="time[]">3.00pm
                            </label>
                        </div>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3.15pm" name="time[]">3.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3.30pm" name="time[]">3.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="3.45pm" name="time[]">3.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4.00pm" name="time[]">4.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4.15pm" name="time[]">4.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4.30pm" name="time[]">4.30pm
                            </label>
                        </div>

                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="4.45pm" name="time[]">4.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5.00pm" name="time[]">5.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5.15pm" name="time[]">5.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5.30pm" name="time[]">5.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="5.45pm" name="time[]">5.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="6.00pm" name="time[]">6.00pm
                            </label>
                        </div>
                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="6.15pm" name="time[]">6.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="6.30pm" name="time[]">6.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="6.45pm" name="time[]">6.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="7.00pm" name="time[]">7.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="7.15pm" name="time[]">7.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="7.30pm" name="time[]">7.30pm
                            </label>
                        </div>
                        <div class="form-group" style="text-align:left">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="7.45pm" name="time[]">7.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="8.00pm" name="time[]">8.00pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="8.15pm" name="time[]">8.15pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="8.30pm" name="time[]">8.30pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="8.45pm" name="time[]">8.45pm
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="9.00pm" name="time[]">9.00pm
                            </label>
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

<p id="demo"></p>
            <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:left">Leave</h4>
                        </div>
                        <div class="modal-body" style="color: black">

                                <div class="container">


                                        <form action="leave_store.php" method="post" enctype="multipart/form-data">
                                    <div class="col-sm-6">      <label for="calender" class="control-label"></label>

                                        <?php
                                        $date = date('Y-m-d');
                                        $next_date = date('Y-m-d', strtotime($date . " +1 day"));
                                        $next_date1 = date('Y-m-d', strtotime($date . " +7 day"));?>
                          <h3> Please Do not take a leave between this period from   <?php echo $next_date; echo " ";echo "to"; echo "  ";echo $next_date1;echo " ";?>
                           because Your schedule has already been given on the website by this date</h3>

                                            <div class="input-group ui-datepicker-title-buttonpane" style="text-align: left">
                                                <label class="sr-only" for="form-select">  Select Chamber</label>

                                                <select class="form-group"style="text-align: left;" id="chamber"
                                                        name="chamb_id" required>

                                                    <option value=""> Select Chamber</option>
                                                    <?php

                                                    foreach ($allData as $oneData) {
                                                        ?>

                                                        <option style="text-align: left" value="<?php echo $oneData->chamb_id; ?>"><?php echo $oneData->chamber_name; ?></option>

                                                    <?php } ?>
                                                <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['dr_id']  ?>" >
                                                <input  type="date"  class="form-control" id="dateTimepicker" name="date" placeholder="dd/mm/yy" required>


                                               <br><br><br>
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                            </div>
                                    </div>

                                        </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal -->

        <!-- Modal -->
    <?php
        $obj = new \App\Leave\Leave();
        $allData=$obj->view_leave("obj" );
        //var_dump($allData);
        ?>

        <div class="modal fade" id="myModal4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body" style="text-align: left;color: black">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Chamber Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Action</th>

                            </tr>

                            </thead>
                            <tbody class="table">
                            <?php
                            foreach ($allData as $oneData ){

                            ?>
                            <tr>

                                <td> <?php echo $oneData->name; ?></td>
                                <td> <?php echo $oneData->chamber_name ?></td>
                                <td> <?php echo $oneData->date?></td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this item?');" href="leave_day_delete.php?day_off_id=<?php echo $oneData->day_off_id ?>" class="btn btn-primary"    ><span
                                                class="glyphicon glyphicon-trash" title="Delete"></span> </a>
                                </td>

                            </tr>
                            <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        </div><!-- /.modal -->






    </div>
<div class="" >




</div>
</div>



<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="../../../js/jquery1.12.4.js"></script>
    <script src="../../../js/date.js"></script>

<!--[if lt IE 10]>

<![endif]-->


</body>
</html>
