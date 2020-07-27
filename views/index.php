<?php
if (!isset($_SESSION)) session_start();
include_once('../vendor/autoload.php');
use App\Admin\Admin;


use App\Admin\Auth;
use App\Message\Message;
use App\Utility\Utility;

$obj = new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth = new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if (!$status) {
    Utility::redirect('admin/Profile/signup.php');
    return;
}

?>


<?php
use App\Doctor\Doctor;
$obj=new Doctor();

$singleUser=$obj->count_doctors();
//var_dump($singleUser);
use App\Patient\Patient;
$obj=new Patient();
$singleData=$obj->count_patient();
use App\Payment\Payment;
$obj=new Payment();
$count_appointment=$obj->count_appointment();

use App\BloodDonor\BloodDonor;
$obj=new BloodDonor();
$count_blood_donor=$obj->count_blood_donor();

use App\Ambulance\Ambulance;
$obj=new Ambulance();
$count_ambulance=$obj->count_ambulance_service_provider();
//var_dump($count_ambulance);
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
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        ...
    </script>

    <style>
        .body_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightyellow, lightblue, lightyellow); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightyellow, lightblue, lightyellow); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightyellow, lightblue, lightyellow); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightyellow, lightblue, lightyellow); /* Standard syntax */
        }
    </style>
</head>

<body>


<?php include('navbar_views.php') ?>

<div class="container">

    <div id="message">

        <?php if ((array_key_exists('message', $_SESSION) && (!empty($_SESSION['message'])))) {
            echo "&nbsp;" . Message::message();
        }
        Message::message(NULL);

        ?>
    </div>




    <nav>
        <ul>
            <li class="pull-right" style="list-style: none"><a href="Admin/Authentication/logout.php"
                                                               style="color: red; font-family: Georgia,serif;font-size: 14pt">
                    LOGOUT </a></li>
        </ul>
    </nav>

<br>

    <div class="container">
        <div class="row">
            <div class="col-md-3" style="background-color:#2ECCFA;height: 210px; width: 230px;margin: 25px;">


                <h1 style="text-align: center;margin:20px;color: white"><?php echo $singleUser->id?></h1>
                <div class="text-center">
                    <i class="fa fa-stethoscope" style="color:white;font-size: 60px"></i>
                </div>
               <h1 style="text-align: center;color: white">Doctors</h1>

            </div>
            <div class="col-md-3"  style="background-color:#FE2E64;height: 210px; width: 230px;margin: 25px;">
                <h1 style="text-align: center;margin:20px;color: white"><?php echo $singleData->id?></h1>
                <div class="text-center">
                    <i class="fa fa-user" style="color:white;font-size: 60px"></i>
                </div>
                <h1 style="text-align: center;color: white">Patients</h1>

            </div>
            <div class="col-md-3"  style="background-color: #FE2EF7;height: 210px; width: 230px;margin: 25px;">

                <h1 style="text-align: center;margin:20px;color: white"><?php echo $count_blood_donor->id?></h1>
                <div class="text-center">
                    <i class="fa fa-tint" style="color:white;font-size: 60px"></i>
                </div>
                <h3 style="text-align: center;color: white">Blood Donor</h3>
            </div>
            <div class="col-md-3"  style="background-color: #2E64FE;height: 210px; width: 230px;margin: 25px;">
                <h1 style="text-align: center;margin:10px;color: white"><?php echo $count_ambulance->amb_comp_id?></h1>
                <div class="text-center">
                    <i class="fa fa-ambulance" style="color:white;font-size: 60px"></i>
                </div>
                <h3 style="text-align: center;color: white">Ambulance Service Provider</h3>

            </div>
        </div>
    </div>


</div>
<div class="container" style="text-align: center;margin: auto">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-6" style="margin-left: auto ;
  margin-right: auto ;">


<div id="chart_div" style="text-align: center;margin: 0 auto"></div>
<br/>
<div id="btn-group">
    <button class="button button-blue" id="none">No Format</button>
    <button class="button button-blue" id="scientific">Scientific Notation</button>
    <button class="button button-blue" id="decimal">Decimal</button>
    <button class="button button-blue" id="short">Short</button>
</div>
</div>
</div>
</div>





<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [ 'Details','Doctors', 'Patient', 'Appointment_schedule'],
            [ ,<?php echo $singleUser->id?>,  <?php echo $singleData->id?>, <?php echo $count_appointment->schedule_id?>],

        ]);

        var options = {
            chart: {
                title: 'Bar chart',
                subtitle: 'Doctors, Patient, and Appointment',
            },
            bars: 'horizontal', // Required for Material Bar Charts.
            hAxis: {format: 'decimal'},
            height: 300,
            width: 800,
            colors: ['#2ECCFA', '#FE2E64', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

            if (e.target.tagName === 'BUTTON') {
                options.hAxis.format = e.target.id === 'none' ? '' : e.target.id;
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        }
    }
</script>



<!--
<script>
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            ["Medicine", 8.94, "#b87333"],
            ["Cardiology", 10.49, "silver"],
            ["Gold", 19.30, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"]

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
</script>
<div id="barchart_values" style="width: 1100px; height: 300px;"></div>



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
