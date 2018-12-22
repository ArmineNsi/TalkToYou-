<?php 
// On démarre la session AVANT d'écrire du code HTML 
session_start(); 

try
{
  // On se connecte à MySQL
  $bdd = new PDO('mysql:host=localhost;dbname=talktoyou;charset=utf8', 'root', '');
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e)
{
  // En cas d'erreur, on affiche un message et on arrête tout 
        die('Erreur : '.$e->getMessage());
}

?>


<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Project PHP">

    <meta name="keywords" content="Project, CSS, HTML, Javascript">

    <meta name="author" content="Miami Cartel">

    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

     <title>TalkToYou! - Come and Debate</title>



    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

    <style>

        a:link {
            text-decoration: none!important;
        }
    </style>

</head>



<body >



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>



    <!--======================================== 

           Header

    ========================================-->





    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000" style="background-image: url('assets/img/banner.png');">



        <div class="container" style="margin-top: -30px;">

            <!-- Start Header Navigation -->

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                    <i class="fa fa-bars"></i>

                </button>

                <a class="navbar-brand" href="home.php">

                    <img src="assets/img/test.png" class="logo" alt="logo" style="width: 15%; margin-top: 55px!important;">

                </a>

            </div>


            <!-- End Header Navigation -->



        <!--si pas connecté : -->
        <?php if(!isset($_SESSION['id'])) 
        {
             


          ?>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                     <li class="active scroll"><a href="home.php#home">Home</a></li>

                     <li class="scroll"><a href="home.php#about">What can you do ?</a></li>

                    <li ><a href="contact.php">Contact</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Log in</button>

                    </li>

                    <li class="button-holder">

                        <a style="color: inherit; margin-top: -35px!important" href="home.php#home"><button type="button" class="btn btn-blue navbar-btn" value="Signup">Sign up</button></a>

                    </li>

                </ul>

            </div>

            <?php

        }

        else //if connected

        {
            ?>


            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                    <li> <a>
                        <?php 
                        if (isset($_SESSION['id']) AND isset($_SESSION['nickname']))
                        {
                            echo 'Welcome ' . $_SESSION['nickname'].' !'; //on affiche notre pseudo grace à la session
                        }?>

                        </a>
                        
                    </li>

                    <li class="active scroll"><a href="#about">Home</a></li>

                    <li class="scroll"><a href="#topics">Topics</a></li>

                    <li ><a href="profile.php">Profile</a></li>

                    <li ><a href="contact.php">Contact</a></li>

                    <li class="button-holder">

                        <a style="color: inherit; margin-top: -35px!important" href="deconnexion.php"><button type="button" class="btn btn-blue navbar-btn" value="LOGOUT">LOG OUT</button> </a>

                        <!--<button type="button" class="btn btn-blue navbar-btn"><a style="color: inherit" href="deconnexion.php">LOG OUT</a></button>-->
                    
                    </li>

                </ul>

            </div>
            <?php
        }
        ?>

        </div>

    </nav>

    
    <br>
    <br>
    <br>
    <br>
    <br>




 <?php if(isset($_SESSION['id'])) 
        {
          ?>

    <section id="about" class="section-padding">

        <div class="container">

            <h2>What can you do ?</h2>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">favorite</i>

                        <h4>Share with non-violence</h4>

                        <p>Share your point of view on the topic you want </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">flash_on</i>

                        <h4>Powerful</h4>

                        <p>Online talk about a subject can change attitudes and our society</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">settings</i>

                        <h4>Available for everyone</h4>

                        <p>If you are a teacher, student, or a professional... You are welcome to debate !</p>

                    </div>

                </div>

            </div>

        </div>

    </section>
     <!--======================================== 

           topics

    ========================================-->



    <section id="topics" class="section-padding">

        <div class="container">

            <h2>Choose your topic you want to debate</h2>

            <div class="row">

                <div class="col-md-4 col-lg-4">

                    <!--**topics art**-->

                    <div class="thumbnail topics1" style="height:432px">

                        <img src="assets/img/art2.jpg" class="img-responsive img-circle" alt="art2">

                        <div class="caption">

                            <h4>Art</h4>

                            <h6>Topic: Does Senegal have to take back its art from European Museaum ?
                            </h6>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                    <li><a href="art.php"><i class="fa fa-hand-o-right"></i></a></li>

                                    

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**topics sport**-->

                    <div class="thumbnail topics1">

                        <img src="assets/img/sport3.jpg" class="img-responsive img-circle" alt="sport">

                        <div class="caption">

                            <h4>Sport</h4>

                            <h6>Topic : What do you think about the new Ballon d'or Luka Modric ?</h6>
                            <br>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                    <li><a href="sport.php"><i class="fa fa-hand-o-right"></i></a></li>

                                   

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**topics lifestle*-->

                    <div class="thumbnail topics1">

                        <img src="assets/img/lifestyle2.jpg" class="img-responsive img-circle" alt="lifestyle">

                        <div class="caption">

                            <h4>Lifestyle</h4>

                            <h6>Topic : What news about the next fashion week ? </h6>
                            <br>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                    <li><a href="lifestyle.php"><i class="fa fa-hand-o-right"></i></a></li>

                                    

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            



            </div>

        </div>

    </section>


    <section id="topics" class="section-padding">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-lg-4">

                    <!--**topics cinema**-->

                    <div class="thumbnail topics1">

                        <img src="assets/img/cinema2.jpg" class="img-responsive img-circle" alt="cinema">

                        <div class="caption">

                            <h4>Cinema</h4>

                            <h6>Topic: What was the worst film in 2018 ?</h6>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                    <li><a href="cinema.php"><i class="fa fa-hand-o-right"></i></a></li>
                                

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**topics health**-->

                    <div class="thumbnail topics1">

                        <img src="assets/img/health2.jpg" class="img-responsive img-circle" alt="health">

                        <div class="caption">

                            <h4>Health</h4>

                            <h6>Topic: What about the using of 3d printer in the Health industry ?</h6>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                    <li><a href="health.php"><i class="fa fa-hand-o-right"></i></i></a></li>

                                   

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**topics Policy/economy**-->

                    <div class="thumbnail topics1">

                        <img src="assets/img/economy2.jpg" class="img-responsive img-circle" alt="economy">

                        <div class="caption">

                            <h4>Policy / Economy</h4>

                            <h6>Topic: Does Apple have to be scare about his strategy ?</h6>

                            <hr>

                            <div class="topics2">

                                <ul class="liste-unstyled">

                                     <li><a href="economy.php"><i class="fa fa-hand-o-right"></i></a></li>


                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            



            </div>

        </div>

    </section>









    <?php

}
else{

    echo "<script type='text/javascript'>document.location.replace('home.php');</script>";
        ?>

    
    
    <p style="height:200px!important;"> You must be connected to have access to this page. <a href="home.php">Login here ! </a> </p>

    <?php
}


?>



    <!--======================================== 

           Footer

    ========================================-->



    <footer>

        <div class="container">

            <div class="row">

                <div class="footer-caption">

                    <img src="assets/img/logo.png" class="img-responsive center-block" alt="logo">

                    <hr>

                    <h5 style="padding-left: 420px;" class="pull-left">TalkToYou! &copy;2018 All rights reserved</h5>


                </div>

            </div>

        </div>

    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/plugins/particles.js-master/particles.js-master/particles.min.js"></script>

    <script src="assets/js/particales-script.js"></script>

    <script src="assets/js/main.js"></script>



    </body>



</html>