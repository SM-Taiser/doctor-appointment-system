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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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



        .animate-flicker {
            animation: fadeIn 1s infinite alternate;
        }

</style>
</head>

<body  style="background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">



                    <div class="navbar nav" style="background-color: darkred">
                        <nav>
                            <div class="collapse navbar-collapse navbar-left navbar-main-collapse">


                                <ul class="nav navbar-nav">




                                </ul>
                            </div>
                    </div>
                    <div id="message">

                        <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
                            echo "&nbsp;" . Message::message();
                        }
                        Message::message(NULL);

                        ?>

            </td>
        </tr>
    </table>


    <header class="tab-content">

    </header>

    <div class="container text-center"><h1 style="font-family: Georgia,serif">
        <!-- Hello <?php echo "$singleUser->first_name $singleUser->last_name" ?>! </h1>-->

</div>

<div class="container">

    <br><br><br>
    <h1 class="animate-flicker " style="font-size:22pt;color:darkblue;font-family: Georgia,serif">Serach Result</h1>
</div>


	<h1> <a href="test2.php">Home</a><br> </h1>

    <table class="table table-striped table-bordered">
  <tr>
      <th>#</th>
      <th>Name</th>
      <th>Designation</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Time</th>
      <th>Visiting Fee</th>
      <th>Action</th>
  </tr>
   <?php
   $serial = 0;
   $keyWord = $_GET['Search'];
   //echo $keyWord;
   $objDoctor = new Doctor();
   $allData=$objDoctor->searchDoctor("obj", $keyWord);

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
</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>



</html>
