<?php
require_once ("../../vendor/autoload.php");

if(!isset($_SESSION) )session_start();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">


<body style="background-color:whitesmoke">
<?php include ('font_end_navbar.php');?>


<div class="container">
    <div class="well" style="background-color: white; ">
    <br><br>
    <center>
        <h3 style="color:darkblue;font-weight:normal;font-family: Georgia,Serif;font-size: 22pt">Contact Us</h3><br>
    </center>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <form  class="form-horizontal" action="store.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="fname">Name</label>
                    <div class="col-sm-8">
                        <input type="text" pattern="[A-Za-z-,. ]{5,35}$" title="5 characters minimum and contains only text" class="form-control" placeholder="Name" id="fname" name="name" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="lname" name="email" placeholder="Email" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="lname">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" pattern="[0-9]{11}" title="Contains only number and range have to be exact 11"  class="form-control" id="lname" name="phone" placeholder="Phone Number" style="height:40px; padding: 10px;border:1px solid #51b6bf" required>
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="fname">Message</label>
                    <div class="col-sm-8">
                       <textarea name="msg" rows="4" cols="47" maxlength="100" style="border:1px solid #51b6bf" required>
</textarea>
                    </div>
                </div>

                <div class="text-center col-md-12">
                    <div class="col-sm-2"></div>
                    <input class="btn btn-lg btn-success col-sm-8" style="background-color:#5cb85c;text-align: center" type="submit" value="submit">

                </div>
            </form>
        </div>
    </div>
</div>
</div>






        <script src="../../resource/assets/bootstrap/js/bootstrap.min.js"></script>

        <![endif]-->



</body>
</html>
