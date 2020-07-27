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

      <?php  if (isset($_SESSION['email'])){ ?>
          <div id="navbar" class="navbar-menu">
              <ul class="nav navbar-nav">
                  <li> <a href="home.php">Home</a></li>
                  <li> <a href="views/Patient/view_search_doctor.php">Doctors</a></li>
                  <li> <a href="views/BloodDonor/view_search_blood_donor.php">Blood Donor</a></li>
                  <li> <a href="views/Ambulance/view_ambulance_search.php">Ambulance</a></li>
                  <li> <a href="views/Contact_Us/create.php">Contact Us</a></li>

              </ul>
              <ul class="nav navbar-right" style="color: white">
                  <button type="button"class="btn btn-default" style="color: white"> <a href="views/Doctor/Profile/doctor-profile.php">Doctors Profile</a></button>
                  <a href="views/Doctor/Authentication/logout.php" class="btn btn-primary">logout</a>
              </ul>
          </div>

      <?php } else {?>
        <div id="navbar" class="navbar-menu">
            <ul class="nav navbar-nav">
                <li> <a href="home.php">Home</a></li>
                <li> <a href="views/Patient/view_search_doctor.php">Doctors</a></li>
                <li> <a href="views/BloodDonor/view_search_blood_donor.php">Blood Donor</a></li>
                <li> <a href="views/Ambulance/view_ambulance_search.php">Ambulance</a></li>
                <li> <a href="views/Contact_Us/create.php">Contact Us</a></li>

            </ul>
            <ul class="nav navbar-right" style="color: white">
                Are you doctor?please signup   <button type="button"class="btn btn-default" style="color: white"> <a href="views/Doctor/Profile/sign_up_doctor.php">Sign up/Login</a></button>
            </ul>
        </div>

<?php }?>

    </div>
</nav>