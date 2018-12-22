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

                    <li ><a href="home.php#about">What can you do ?</a></li>

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

                    <li ><a href="index.php#home">Home</a></li>

                    <li ><a href="index.php#team">Topics</a></li>

                    <li class="active scroll"><a href="profile.php">Profile</a></li>

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


<?php if(isset($_SESSION['id'])) 
{
          ?>


    <section id="home" class="section-padding">

        <div class="container">

            <div style="margin-top:-20px!important;width: 400px;margin: 0 auto;">
            	
    	<!--<img src="assets/img/banner.png" alt="news">-->
    				<div class="thumbnail team-member">

                        <div style="margin-top: 20px;margin-left:40px;">
    

    				        <?php

    				        $req = $bdd->prepare('SELECT * FROM member WHERE nickname = :nickname'); /*cette requête permet de récuper tous les champs ( avec *) de notre tables membre où le pseudo vaut le pseudo de la personne connectée*/
    				    
    				        $nickname= $_SESSION['nickname'];


    				        $req->execute(array( 'nickname'=>$nickname  ));
    				          
    				        while ($donnees = $req->fetch())
    				        {

    				        echo '<strong>Pseudonym : </strong>'. $donnees['nickname'] . '<br /><br />'; //on affiche le pseudo de l'utilisateur actuellement connecté
    				        echo '<strong>Email : </strong>'. $donnees['email'] . '<br /><br />';
    				        echo '<strong>Full name : </strong>'. $donnees['fullname'] . '<br /><br />';
    				        echo '<strong>Age : </strong>'.$donnees['age'] . '<br /><br />';
    				        echo '<strong>Sex : </strong>'.$donnees['sex'] . '<br /><br />';
    				        echo '<strong>Interests : </strong>'.$donnees['interest'] . '<br /><br />';
    				       
    				        }

    				        $req->closeCursor(); // Termine le traitement de la requête  */

    				        ?>

                            <div class="form-group text-center">
                                <a style="color: inherit; margin-top: -35px!important; margin-left: -35px" href="modifyprofile.php"><button type="button" class="btn btn-blue navbar-btn" value="modify">Modify</button> </a>
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

    echo 'You must be connected to have access to this page';
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
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