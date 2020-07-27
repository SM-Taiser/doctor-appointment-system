<?php
if(!isset($_SESSION) )session_start();
include_once('../../vendor/autoload.php');
use App\Doctor\Doctor;
use App\Admin\Admin;
use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

/*
$key1 = $_GET['city'];
$key2 = $_GET['blood_grp'];


$obj= new BloodDonor();
$obj->prepare($_SESSION);
$singleUser = $obj->search($key1,$key2);
*/



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


        .table td, .table  th {
            border: none;
        }

        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
        
.checked {
    color: orange;
}


    </style>

    <!--ICON -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--ICON -->
</head>

<body  style="background:url('../resource/Images/adminbackkk.png') no-repeat center top #FFF">

<?php include ('font_end_navbar.php');?>


</div>




    <header class="tab-content">

    </header>

    <div class="container text-center"><h1 style="font-family: Georgia,serif">

    </div>

    <div class="container">

        <br><br><br>
        <h1 class="animate-flicker "   style="text-align:center;font-weight:normal;font-size:22pt;color:darkblue;font-family: Georgia,serif"   ><i class="fas fa-user-md"></i> Doctor List</h1>

    </div>



    <?php
    $serial = 0;
    $keyWord = $_GET['city'];
    $keyWords = $_GET['category'];
    $key=$_GET['name'];

    //  var_dump($_GET);
    // echo $keyWord;


    $objDoctor = new \App\Doctor\Doctor();
    $allData=$objDoctor->search( $keyWord,$keyWords,$key);
    //var_dump($allData);





    foreach ($allData as $oneData ){

        ?>

        <div class="container" style="color: black">
            <hr class="aaa"  style="color:black">

            <div class="col-md-12">
                <div class="row" >
                    <div class="col-md-3">
                        <img src="../Doctor/Profile/images/<?php echo $oneData->pic ?>" style="width:100px; height:100px;" class="img-circle img-responsive" alt="" /><br />
                    </div>

                    <div class="col-md-2" style="border-left: 1px solid black">
                        <p>
                            <?php echo $oneData->name; ?><br>
                            <?php echo $oneData->designation; ?>

                        </p>
                    </div>
                    <div class="col-md-3" style="border-left: 1px solid black">
                        <p>

                        <h5>Category: <?php echo $oneData->category; ?></h5>

                        <h5>Fees: <?php echo $oneData->visiting_fee; ?>TK</h5>

                         <?php
                        for($i=1;$i<=$oneData->total_rating;$i++) { ?>
                        <span class="fa fa-star checked"></span>
                        <?php } 

                        if(floor($oneData->total_rating) != $oneData->total_rating){
                        ?>
                        <i class="fa fa-star-half checked"></i>
                        <?php } ?>



                        </p>
                    </div>



                    <div class="col-md-3">

                        <a href="view_doctor_profile.php?id=<?php echo $oneData->id ?>&city=<?php echo $oneData->city ?>&category=<?php echo $oneData->category ?>&pic=<?php echo $oneData->pic ?>&designation=<?php echo $oneData->designation ?> &name=<?php echo $oneData->name;?>&patient_id=<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo "X";}?>" class="btn btn-success" role="button"><span
                                class="glyphicon glyphicon-user"></span> view doctor profile</a></td>
                    </div>
                </div>
            </div>
        </div>







    <?php  } ?>
</div>


<!-- Javascript -->

<script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom.js"></script>

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>



</html>
