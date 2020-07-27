<?php
if(!isset($_SESSION) )session_start();


?>

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
                    <li> <a href="../../home.php">Home</a></li>
                    <li> <a href="../Patient/view_search_doctor.php">Doctors</a></li>
                    <li> <a href="../BloodDonor/view_search_blood_donor.php">Blood Donor</a></li>
                    <li> <a href="../Ambulance/view_ambulance_search.php">Ambulance</a></li>
                    <li> <a href="../Contact_Us/create.php">Contact Us</a></li>

                </ul>

    </div>
</nav>