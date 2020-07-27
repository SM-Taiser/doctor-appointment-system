<?php
require_once ("../../vendor/autoload.php");


use App\BloodDonor\BloodDonor;
$obj = new BloodDonor();
$obj->prepare($_GET);
$singleUser  = $obj->view();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">

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
<?php include ('font_end_navbar.php');?><br>

<div class="container" align="left">
    <div class="row" align="left">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


            <div class="panel panel-info" >
                <div class="panel-heading"
                <h3 class="panel-title" style="color: white" align="center">Blood Donor</h3>
            </div>
            <div class="panel-body">
                <div class="row" style="color: black">


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



                </span>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Bootstrap DataTable -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<!-- /Bootstrap DataTable -->


<!-- Javascript -->
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
