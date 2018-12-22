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



<body>



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

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



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

                    <li ><a href="home.php#home">Home</a></li>

                    <li ><a href="home.php#about">What can you do ?</a></li>

                    <li class="active scroll"><a href="contact.php">Contact</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Log in</button>

                    </li>

                    <li class="button-holder">

                        <a style="color: inherit; margin-top: -35px!important" href="home.php"><button type="button" class="btn btn-blue navbar-btn" value="Signup">Sign up</button></a>

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

                    <li ><a href="index.php#home">Home</a></li>

                    <li ><a href="index.php#topics">Topics</a></li>

                    <li ><a href="profile.php">Profile</a></li>

                    <li class="active scroll"><a href="contact.php">Contact</a></li>

                    <li class="button-holder">

                       <!--<a class="btn btn-blue navbar-btn" style="color: inherit" href="deconnexion.php">LOG OUT</a>-->

                       <a style="color: inherit; margin-top: -35px!important" href="deconnexion.php"><button type="button" class="btn btn-blue navbar-btn" value="LOGOUT">LOG OUT</button> </a>
                    




                    </li>

                </ul>

            </div>

            <?php

        }

        ?>

            <!-- /.navbar-collapse -->

        </div>

    </nav>




    

    <?php 
    //on va vérifier si la connexion marche

     if (isset($_POST['nickname']) && isset($_POST['pass'])) 
     { //si le pseudo et le mot de passe ont bien été rentré

          $nickname = $_POST['nickname'];

          //  Récupération de l'utilisateur et de son pass hashé
          $req = $bdd->prepare('SELECT id, pass FROM member WHERE nickname = :nickname');
          $req->execute(array(
              'nickname' => $nickname));

          $resultat = $req->fetch();

          

          // Comparaison du pass envoyé via le formulaire avec la base en hasché
          $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

          if (!$resultat)
          {
              echo 'Wrong pseudonym or password !';
          }
          
          else
          {
              if ($isPasswordCorrect) 
              {
                  $_SESSION['id'] = $resultat['id']; /*création de variable de sessions qui nous servirons pour l'affichage du pseudo ou points*/
                  $_SESSION['nickname'] = $nickname;
                  echo 'You are connected !';
                 echo "<script> window.location.assign('index.php'); </script>";// une fois qu'on est connecté, on est redirigé vers l'accueil
              }
              else {
                  echo 'Wrong pseudonym or password !';
              }
          }

    }
    ?>



    <!--======================================== 

           Contact

    ========================================-->

 <section id="home">
        </section>

        <section id="contact" class="section-padding">

            <!-- Contact Info -->

            <div class="container contact-info">

                <div class="row">

                    <div class="col-md-4">

                        <div class="icon-box">

                            <i class="material-icons">place</i>

                            <h4>Address</h4>

                            <p>1455 Boulevard de Maisonneuve O, Montréal, QC H3G 1M8</p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="icon-box">

                            <i class="material-icons">phone</i>

                            <h4>Call Us On</h4>

                            <p>06 01 02 03 04</p>


                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="icon-box">

                            <i class="material-icons">email</i>

                            <h4>Email us on</h4>

                            <p>talktoyou@hotmail.com</p>

                        </div>

                    </div>

                </div>

            </div>



        

        <div class="contact-forms">

            <div class="container">

                <h2>Drop us a Line</h2>

                    <div class="icon-box">

                        <i class="material-icons">forum</i>

                        <h4>24/7 Support</h4>

                    </div>


                    <p>Contact us for any problem or information !</p>


                <form class="contact-form">

                    <div class="col-md-6">

                        <div class="form-group">

                            <input type="text" class="form-control" placeholder="Full Name" required="required">

                        </div>

                        <div class="form-group">

                            <input type="email" class="form-control" placeholder="Email" required="required">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-blue">Send Message</button>

                </form>

            </div>

        </div>

    </section>



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


    <!--======================================== 

           Modal

    ========================================-->

    <!-- Modal -->





    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>

                <div class="modal-body">

                    <form method="post" action="contact.php" class="signup-form">

                        <div class="form-group">

                            <input type="text" name="nickname" class="form-control" placeholder="Pseudonym" required="required">

                        </div>

                        <div class="form-group">

                            <input type="password" name="pass" class="form-control" placeholder="Password" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" name="submit" class="btn btn-blue btn-block">Log In</button>
                            
                        

                            <!--<input type="submit" name="submit" value="S'inscrire" /> -->

                       </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a href="#">Forgot your password /</a>

                    <a href="home.php#signup">Signup</a>

                </div>

            </div>

        </div>

    </div>


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