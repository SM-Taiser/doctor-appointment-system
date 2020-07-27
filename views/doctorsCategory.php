<?php
if(!isset($_SESSION) )session_start();
include_once('../vendor/autoload.php');
use App\Doctor\Doctor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj= new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

?>


<!DOCTYPE html>
<html>
<head>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../resource/assets/css/style.css">
    <link href="../resource/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../resource/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="../resource/css/nivo-lightbox.css" rel="stylesheet"/>
    <link href="../resource/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css"/>
    <link href="../resource/css/owl.carousel.css" rel="stylesheet" media="screen"/>
    <link href="../resource/css/owl.theme.css" rel="stylesheet" media="screen"/>
    <link href="../resource/css/animate.css" rel="stylesheet"/>
    <style>
        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: orange;
        }

        table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}
        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }

th {
    text-align: left;
}
        .body_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightyellow, lightblue,lightyellow); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightyellow, lightblue,lightyellow); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightyellow, lightblue,lightyellow); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightyellow, lightblue,lightyellow); /* Standard syntax */
        }
</style>
</head>

<body>
<div class="body_grad">


    <div id="message" >

        <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
            echo "&nbsp;".Message::message();
        }
        Message::message(NULL);

        ?>
    <header class="tab-content">

                <div class="navbar nav" style="background-color: darkred">
                    <div class="pull-right">
                        <ul class="nav navbar-nav">
                            <li ><a href="test2.php"style="color: white;font-family: Georgia,serif;">Home</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;font-family: Georgia;">Doctor's Category <b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="doctorsCategory.php?catID=2">Cardiac Specialist</a></li>
                                    <li><a href="doctorsCategory.php?catID=1">Medicine Specialist</a></li>
                                    <li><a href="doctorsCategory.php?catID=6">Nefrologist</a></li>
                                    <li><a href="doctorsCategory.php?catID=3">Gynecologist</a></li>
                                    <li><a href="doctorsCategory.php?catID=5">Orthopedic</a></li>
                                    <li><a href="doctorsCategory.php?catID=7">Pediatrician</a></li>
                                    <li><a href="doctorsCategory.php?catID=4">Neurologist</a></li>
                                </ul>
                            </li>
                    </div>
                </div>





    </header>

        <div class="container">


     <h1 style=" font-family: Georgia,serif;"><br>Doctors</h1>
     <table class="table table-striped table-striped2 table-bordered">
  <tr style="text-align: center">
    <th class="text-center">#</th>
    <th class="text-center">Name</th>
    <th class="text-center">Designation</th>
    <th class="text-center">Email</th>
    <th class="text-center">Phone</th>
      <th class="text-center">Time</th>
    <th class="text-center">Visiting Fee</th>
      <th class="text-center">Address</th>
      <th class="text-center">Action</th>
  </tr>
   <?php
   $serial = 0;
   $catID = $_GET['catID'];
     $objDoctor = new Doctor();
     $allData=$objDoctor->doctorsCategory("obj", $catID);
     foreach ($allData as $oneData ){
       
   ?>
  <tr>
    <td><?php echo ++$serial; ?></td>
    <td> <?php echo $oneData->name; ?></td>
    <td> <?php echo $oneData->designation; ?></td>
    <td> <?php echo $oneData->email; ?></td>
    <td> <?php echo $oneData->phone; ?></td>
      <td> <?php echo $oneData->time; ?></td>
    <td> <?php echo $oneData->visiting_fee; ?></td>
      <td> <?php echo $oneData->address; ?></td>
      <td><a href="view.php?id=<?php echo $oneData->id ?>" class="btn btn-success" role="button"><span
                      class="glyphicon glyphicon-user"></span> view profile</a></td>

  </tr>
<?php  } ?>

</table>

</div>

<!-- Javascript -->
<script src="../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../resource/assets/js/placeholder.js"></script>
<![endif]-->


<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="text-right">
                            <p style="color: darkred;font-family: Georgia;">&copy;Copyright @ DO POSITIVE.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</footer>
</div>
</body>
</html>
