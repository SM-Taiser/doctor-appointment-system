<!DOCTYPE html>
<html lang="en">
<?php echo $_GET['id']?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doctor Management System</title>


    <!-- css -->
    <link href="../resource/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../resource/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link href="../resource/css/nivo-lightbox.css" rel="stylesheet"/>
    <link href="../resource/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css"/>
    <link href="../resource/css/owl.carousel.css" rel="stylesheet" media="screen"/>
    <link href="../resource/css/owl.theme.css" rel="stylesheet" media="screen"/>
    <link href="../resource/css/animate.css" rel="stylesheet"/>
    <link href="../resource/css/style.css" rel="stylesheet" type="text/css">

    <!-- boxed bg -->
    <link id="bodybg" href="../resource/bodybg/bg1.css" rel="stylesheet" type="text/css"/>
    <!-- template skin -->
    <link id="t-colors" href="../resource/color/default.css" rel="stylesheet">
    <style>

        .table-striped > tbody > tr:nth-child(2n) > td,
        {
            background-color: lightgoldenrodyellow;
        }

        .table-striped2 > tbody > tr:nth-child(2n+1) > th {
            background-color: lightskyblue;
        }

        .hospital_back_grad {
            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(mintcream, lightblue); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(mintcream, lightblue); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(mintcream, lightblue); /* For Firefox 3.6 to 15 */
            background: linear-gradient(mintcream, lightblue); /* Standard syntax */
        }

        .ambulance_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightblue, lightgreen); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightblue, lightgreen); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightblue, lightgreen); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightblue, lightgreen); /* Standard syntax */
        }

        .developer_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightgoldenrodyellow, lightyellow); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightgoldenrodyellow, lightyellow); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightgoldenrodyellow, lightyellow); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightgoldenrodyellow, lightyellow); /* Standard syntax */
        }

        .tips_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightgreen, lightgoldenrodyellow); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightgreen, lightgoldenrodyellow); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightgreen, lightgoldenrodyellow); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightgreen, lightgoldenrodyellow); /* Standard syntax */
        }

        .partner_grad {

            background: red; /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(lightyellow, lightcyan); /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(lightyellow, lightcyan); /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(lightyellow, lightcyan); /* For Firefox 3.6 to 15 */
            background: linear-gradient(lightyellow, lightcyan); /* Standard syntax */
        }

    </style>


</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

<header>
    <div id="wrapper">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

            <div class="container navigation">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="test2.php">
                        <img src="../resource/Images/pagelogo.png" alt="" width="150" height="60"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doctor's Category <b
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

                        <li><a href="#hospital_list">Hospital List</a></li>
                        <li><a href="#ambulance">Ambulance Services</a></li>
                        <li><a href="#tips">Doctor Tips</a></li>
                        <li><a href="#partner">Our Pertners</a></li>
                        <li><a href="#developer">About Developers</a></li>


                        <li><a href="#contact">Contact Us</a></li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->


            </div>
            <!-- /.container -->
        </nav>
</header>

<!-- Section: Hospital List -->
<section id="hospital_list" class="home-section paddingbot-60 hospital_back_grad">

    <div class="container">
        <form class="form-inline" action="searchResult.php" method="get">
            <div class="form-group">
                <input type="text" class="form-control" id="search" placeholder="Search Your Doctor Here" name="Search">
            </div>
        </form>
    </div>

    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h1 class="h-bold"><br><br><br>Hospital List</h1>

                        <p>List of Hospitals in Chittagong</p>
                    </div>
                </div>
                <div class="divider-short"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="" title="Max Hospital"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/1@2x.jpg"><img
                                    src="../resource/Images/Hospitals/max.png"
                                    class="img-responsive"
                                    alt="" height="300px" width="300px"></a></div>
                        <div class="item"><a href="#" title="Chevron Hospital"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/2@2x.jpg"><img
                                    src="../resource/Images/Hospitals/chevron.jpg"
                                    class="img-responsive "
                                    alt="img" height="300px" width="300px"></a></div>
                        <div class="item"><a href="" title="Metropoliton Hospital"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/3@2x.jpg"><img
                                    src="../resource/Images/Hospitals/Metropolitan-.jpg"
                                    class="img-responsive "
                                    alt="img"></a></div>
                        <div class="item"><a href="" title="Chittagong Medical"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/4@2x.jpg"><img
                                    src="../resource/Images/Hospitals/cmh.bmp"
                                    class="img-responsive "
                                    alt="img"></a></div>
                        <div class="item"><a href="" title="Chattagram Maa-o-Shishu Hospital"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/5@2x.jpg"><img
                                    src="../resource/Images/Hospitals/logo.png"
                                    class="img-responsive "
                                    alt="img"></a></div>
                        <div class="item"><a href="" title="National Hospital"
                                             data-lightbox-gallery="gallery1"
                                             data-lightbox-hidpi="img/works/6@2x.jpg"><img
                                    src="../resource/Images/Hospitals/national.jpg"
                                    class="img-responsive "
                                    alt="img"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section: Hospital List -->

<!-- /Section: Ambulance Service -->


<section id="ambulance" class="home-section paddingtop-40 ambulance_grad"
         style="background:url('../resource/Images/ambulance_1.jpg') no-repeat center top #FFF">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                            <br><br><br>
                            <div class="cta-text" style="background-color: yellow">

                                <h3 class="text-center">In an emergency? Need an Ambulance Right Now?</h3>

                                <div class="col-md-12 text-center">
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey">Dead Body Carrier
                                            Chittagong</b><br>
                                        Phone:031-650000<br>
                                    </div>
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey"> Fire Service Ambulance
                                            Chittagong</b><br>
                                        Phone:031-716326-7
                                    </div>
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey"> General Hospital
                                            Chittagong</b><br>
                                        Phone:031-619584
                                    </div>

                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey">Holy Crescent Hospital
                                            Chittagong</b><br>
                                        Phone:031-620025
                                    </div>
                                    <div>
                                        <div class="col-sm-4">
                                            <b style="background-color: lightgrey">Media Amb Service
                                                Chittagong</b><br>
                                            Phone: 031-650000
                                        </div>
                                        <div class="col-sm-4">
                                            <b style="background-color: lightgrey">Modern Ambulance Service
                                                Chittagong</b><br>
                                            Phone:031-639730, 0154633214, 01716074497

                                        </div>

                                    </div>
                                    <div class="col-md-12 text-center">


                                    </div>
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey">Poil Hospital Chittagong</b><br>
                                        Phone:031-502024,<br> 505021-9

                                    </div>
                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey">Railway Hospital
                                            Chittagong</b><br>
                                        <p style="color: #4a1e7f">Phone:031-502220</p>
                                    </div>

                                    <div class="col-sm-4">
                                        <b style="background-color: lightgrey">Upasham Hospital
                                            Chittagong </b><br>
                                        Phone:031-637243
                                    </div>
                                </div>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
</section>
</div>
</section>


<!-- /Section: Ambulance Service -->

<!-- Section: tips -->
<section id="tips" class="home-section paddingtop-80 tips_grad">

    <div class="container">
        <div class="row">
            <h1 class="text-center"><br><br>What Doctor's Say to keep Healthy.</h1>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">


                        <i class="glyphicon glyphicon-ok-circle fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Sleep Enough & Sleep Well</h4>

                        <p>

                            Everyone understands the importance of a good night's rest, but few of us actually achieve
                            it on a regular basis. Just getting eight hours isn't enough, either—quality matters just as
                            much as quantity.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                        <i class="glyphicon glyphicon-ok-circle fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Follow a Diet & Exercise Plan You Can Do for Life</h4>

                        <p>
                            Many people choose to diet for a temporary period, hoping to lose weight and look their
                            best. While some diets may shed pounds quickly, if you can't stick to them indefinitely,
                            they will ultimately fail you. The same goes for exercise.

                            Doctors know that you need to choose something you enjoy and can stick to, otherwise you
                            won't form a good habit and make your health a priority.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">
                        <i class="glyphicon glyphicon-ok-circle fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Don't Forget About Your Brain</h4>

                        <p>We worry a lot about our physical health, so our mental health often takes a back seat. Make
                            sure you're well aware of how you feel, as few things can negatively impact your health in
                            so many ways like stress.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                        <i class="glyphicon glyphicon-ok-circle fa-3x circled bg-skin"></i>
                        <h4 class="h-bold">Reduce Your Contact with Germs</h4>

                        <p>
                            Dr. Nadolsky explained that another way doctors stay healthy is by reducing their contact
                            with germs. More than hand-washing, that means you ought to regularly clean surfaces
                            (including your keyboard, smartphone, and anything else you touch regularly) and avoid
                            touching your face.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /Section: boxes -->


<!-- Section Partner-->


<section id="partner" class="home-section paddingbot-60">
    <div class="container marginbot-50">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="section-heading text-center">
                        <h2 class="h-bold">Our partner</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="partner">
                                        <a href="#"><img src="../resource/Images/03.jpg" align="center" height="300px"
                                                         width="500px" alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>BASIS Institute of Technology & Management</p>
                    </div>
                </div>
                <div class="divider-short"></div>
            </div>
        </div>
    </div>
    <!-- Section: developers -->
    <section id="developer" class="home-section paddingbot-60 parallax developer_grad"
             data-stellar-background-ratio="0.5">

        <div class="carousel-reviews broun-block">
            <div class="container">
                <div class="row">
                    <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                        <h1 class="text-center">Developers</h1>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Mohammed Ismail</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/RAJIB_1.jpg" alt=""
                                             class="person img-circle"/>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Shamsuddin Mohammad Taiser</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/Taiser.jpg" alt=""
                                             class="person img-circle"/>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Mohammed Sadeque</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/Sadeque%20(1).jpg" alt=""
                                             class="person img-circle"/>
                                        <a title="" href="#">Anna</a>
                                        <span>Chicago, Illinois</span>
                                    </div>
                                </div>

                            </div>
                            <div class="item">
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Fokhrul Islam</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/Fokhrul.jpg" alt=""
                                             class="person img-circle"/>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Moahmmad Saber</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/Saber.jpg" alt=""
                                             class="person img-circle"/>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="block-text rel zmin">
                                        <label>Mohammad Farshid</label>

                                        <p>Web Developer <br> International Islamic University</p>

                                    </div>
                                    <div class="person-text rel text-light">
                                        <img src="../resource/Images/DEvelopers/Farshid.jpg" alt=""
                                             class="person img-circle"/>

                                    </div>
                                </div>
                            </div>

                            <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Section: Developer -->


</section>

<footer id="contact">
    <div class="container"
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Contact Us</h3>
            <div class="text-center"> "DO POSITIVE"<br> BITM BATCH 58 <br> CONTACT: +880 1616 ******</div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="text-right">
                            <p>&copy;Copyright @ DO POSITIVE.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Core JavaScript Files -->
<script src="../resource/js/jquery.min.js"></script>
<script src="../resource/js/bootstrap.min.js"></script>
<script src="../resource/js/jquery.easing.min.js"></script>
<script src="../resource/js/wow.min.js"></script>
<script src="../resource/js/jquery.scrollTo.js"></script>
<script src="../resource/js/jquery.appear.js"></script>
<script src="../resource/js/stellar.js"></script>
<script src="../resource/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script src="../resource/js/owl.carousel.min.js"></script>
<script src="../resource/js/nivo-lightbox.min.js"></script>
<script src="../resource/js/custom.js"></script>



</body>

</html>
