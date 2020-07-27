<?php

require_once("../../vendor/autoload.php");

$obj = new \App\Appointment\Appointment();


$obj->prepare($_GET);
//var_dump($_GET);
$singleData = $obj->appointment_view();
//var_dump($singleData);

$days= explode(",",$singleData->day);
$times= explode(",",$singleData->time);

$obj = new \App\Chambers\Chambers();
$obj->prepare($_GET);
//var_dump($_GET);
$singleData = $obj->view();




use App\Message\Message;

$msg = Message::message();
if($msg!='') {
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Title Add Form</title>
    <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../resource/assets/css/style.css">

    <style>
        body {

        }
    </style>
</head>
<div  style="background:url('../../resource/Images/adminbackkk.png') no-repeat center top #FFF">


    <br>
    <?php
    $obj=new \App\Appointment\Appointment();
    $obj->prepare($_POST);
    //var_dump($_POST);
    $allData = $obj->edit_doctors_schedule();

    ?>
    <div class="container" >



        <form name="editForm" action="doctor_schedule_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']  ?>" >
            <input type="hidden" name="appointment_id" value="<?php echo $_GET['appointment_id']  ?>" >
            <div class="form-group">


                <select class="form-group" style="font-size:30px" id="chamber"
                        name="chamb_id">

                    <option value="">Select Chamber </option>
                    <?php

                    foreach ($allData as $oneData) {
                        ?>

                        <option value="<?php echo $oneData->chamb_id;?>" <?php if($oneData->chamber_name == "chamb_id") { ?>selected="selected"<?php  } ?>> <?php echo $oneData->chamber_name?></option>

                    <?php } ?>

                </select> <br>
                <h4 style="font-weight: bold">Change Your Day</h4><br>

                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Sat" name="day[]" <?php if(in_array("Sat",$days)) echo "checked" ?>>Saturday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Sun" name="day[]" <?php if(in_array("Sun",$days)) echo "checked"?>> Sunday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Mon" name="day[]" <?php if(in_array("Mon",$days)) echo "checked"?>>Monday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Tue" name="day[]" <?php if(in_array("Tue",$days)) echo "checked"?>> Tuesday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Wed" name="day[]" <?php if(in_array("Wed",$days)) echo "checked"?>>Wednesday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Thu" name="day[]" <?php if(in_array("Thu",$days)) echo "checked"?>>Thursday
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="Fri" name="day[]" <?php if(in_array("Fri",$days)) echo "checked"?>>Friday
                    </label>
                    <br>

                </div>


                <div class="form-group">
                    <h4 class="modal-title">Change Your Time</h4>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="9.15am" name="time[]" <?php if(in_array("9.15am",$times)) echo "checked"?>>9.15am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="9.30am" name="time[]" <?php if(in_array("9.30am",$times)) echo "checked"?>>9.30am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="9.45am" name="time[]" <?php if(in_array("9.45am",$times)) echo "checked"?>>9.45am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="10am" name="time[]" <?php if(in_array("10am",$times)) echo "checked"?>>10am
                    </label>
                    <label class="checkboxnline">
                        <input type="checkbox" value="10.15am" name="time[]" <?php if(in_array("10.15am",$times)) echo "checked"?>>10.15am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="10.30am" name="time[]" <?php if(in_array("10.30am",$times)) echo "checked"?>>10.30am
                    </label>
                    <br>

                </div>

                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="10.45am" name="time[]"<?php if(in_array("10.45am",$times)) echo "checked"?>>10.45am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="11.00am" name="time[]"<?php if(in_array("11.00am",$times)) echo "checked"?>>11.00am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="11.15am" name="time[]"<?php if(in_array("11.15am",$times)) echo "checked"?>>11.15am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="11.30am" name="time[]"<?php if(in_array("11.30am",$times)) echo "checked"?>>11.30am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="11.45am" name="time[]"<?php if(in_array("11.45am",$times)) echo "checked"?>>11.45am
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="12.00pm" name="time[]"<?php if(in_array("12.00pm",$times)) echo "checked"?>>12.00pm
                    </label>

                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="12.15pm" name="time[]"<?php if(in_array("12.15pm",$times)) echo "checked"?>>12.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="12.30pm" name="time[]"<?php if(in_array("12.30pm",$times)) echo "checked"?>>12.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="12.45pm" name="time[]"<?php if(in_array("12.45pm",$times)) echo "checked"?>>12.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1.00pm" name="time[]"<?php if(in_array("1.00pm",$times)) echo "checked"?>>1.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1.15pm" name="time[]"<?php if(in_array("1.15pm",$times)) echo "checked"?>>1.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1.30pm" name="time[]"<?php if(in_array("1.30pm",$times)) echo "checked"?>>1.30pm
                    </label>

                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="1.45pm" name="time[]"<?php if(in_array("1.45pm",$times)) echo "checked"?>>1.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2.00pm" name="time[]"<?php if(in_array("2.00pm",$times)) echo "checked"?>>2.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2.15pm" name="time[]"<?php if(in_array("2.15pm",$times)) echo "checked"?>>2.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2.30pm" name="time[]"<?php if(in_array("2.30pm",$times)) echo "checked"?>>2.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="2.45pm" name="time[]"<?php if(in_array("2.45pm",$times)) echo "checked"?>>2.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="3.00pm" name="time[]"<?php if(in_array("3.00pm",$times)) echo "checked"?>>3.00pm
                    </label>

                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="3.15pm" name="time[]"<?php if(in_array("3.15pm",$times)) echo "checked"?>>3.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="3.30pm" name="time[]"<?php if(in_array("3.30pm",$times)) echo "checked"?>>3.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="3.45pm" name="time[]"<?php if(in_array("3.45pm",$times)) echo "checked"?>>3.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="4.00pm" name="time[]"<?php if(in_array("4.00pm",$times)) echo "checked"?>>4.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="4.15pm" name="time[]"<?php if(in_array("4.15pm",$times)) echo "checked"?>>4.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="4.30pm" name="time[]"<?php if(in_array("4.30pm",$times)) echo "checked"?>>4.30pm
                    </label>
                </div>

                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="4.45pm" name="time[]"<?php if(in_array("4.45pm",$times)) echo "checked"?>>4.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="5.00pm" name="time[]"<?php if(in_array("5.00pm",$times)) echo "checked"?>>5.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="5.15pm" name="time[]"<?php if(in_array("5.15pm",$times)) echo "checked"?>>5.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="5.30pm" name="time[]"<?php if(in_array("5.30pm",$times)) echo "checked"?>>5.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="5.45pm" name="time[]"<?php if(in_array("5.45pm",$times)) echo "checked"?>>5.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="6.00pm" name="time[]"<?php if(in_array("6.00pm",$times)) echo "checked"?>>6.00pm
                    </label>

                </div>

                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="6.15pm" name="time[]"<?php if(in_array("6.15pm",$times)) echo "checked"?>>6.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="6.30pm" name="time[]"<?php if(in_array("6.30pm",$times)) echo "checked"?>>6.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="6.45pm" name="time[]"<?php if(in_array("6.45pm",$times)) echo "checked"?>>6.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="7.00pm" name="time[]"<?php if(in_array("7.00pm",$times)) echo "checked"?>>7.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="7.15pm" name="time[]"<?php if(in_array("7.15pm",$times)) echo "checked"?>>7.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="7.30pm" name="time[]"<?php if(in_array("7.30pm",$times)) echo "checked"?>>7.30pm
                    </label>

                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="7.45pm" name="time[]"<?php if(in_array("7.45pm",$times)) echo "checked"?>>7.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="8.00pm" name="time[]"<?php if(in_array("8.00pm",$times)) echo "checked"?>>8.00pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="8.15pm" name="time[]"<?php if(in_array("8.15pm",$times)) echo "checked"?>>8.15pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="8.30pm" name="time[]"<?php if(in_array("8.30pm",$times)) echo "checked"?>>8.30pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="8.45pm" name="time[]"<?php if(in_array("8.45pm",$times)) echo "checked"?>>8.45pm
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="9.00pm" name="time[]"<?php if(in_array("9.00pm",$times)) echo "checked"?>>9.00pm
                    </label>

                </div>


                <div class="text-center col-md-12">
                    <div class="col-sm-2"></div>
                    <input class="btn btn-lg btn-success col-sm-8" type="submit" value="update">

                </div>
        </form>
    </div>
</div>


</body>

<script>
    document.forms["editForm"].elements["chamb_id"].value="<?php echo $_GET['chamb_id']; ?>";
</script>

<script>


    jQuery(

        function($) {
            $('#message').fadeOut (800);
            $('#message').fadeIn (800);
            $('#message').fadeOut (800);
            $('#message').fadeIn (800);
            $('#message').fadeOut (800);
            $('#message').fadeIn (800);
            $('#message').fadeOut (800);
        }
    )
</script>

</html>