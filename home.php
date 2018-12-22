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





            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar-menu">

                <ul class="nav navbar-nav navbar-right">

                    <li class="active scroll"><a href="#home">Home</a></li>

                    <li class="scroll"><a href="#about">What can you do ?</a></li>

                    <li ><a href="contact.php">Contact</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Log in</button>

                    </li>

                    <li class="button-holder">

                        <a style="color: inherit; margin-top: -35px!important" href="home.php#home"><button type="button" class="btn btn-blue navbar-btn" value="Signup">Sign up</button></a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    





    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <div id="particles-js"></div>

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>TalkToYou!</h1>

                    <h2>

                           You can 

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p>Choose and debate on your favorite subject </p>

                    <a href="#" class="btn btn-transparent">Get Started</a>


                </div>




                <!--test pour s'inscrire-->

			    <?php

			     if (isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['cpass']) &&isset($_POST['fullname'])&& isset($_POST['age']) && isset($_POST['sex']) && isset($_POST['interest'])  ) /*si on a bien rentré tous ces champs (nom , adresse etc)*/
			      {

			          $email = htmlspecialchars($_POST['email']);
			          $nickname = $_POST['nickname'];
			        

			          if ( $_POST['pass'] == $_POST['cpass'] ) /*si le mot de passe et le mot de pase de confirmation sont les mêmes*/
			          {
			            if(strlen($_POST['pass'])>=6)
			            {
			        
			                      if(preg_match("#^[0-9]{2}$#", $_POST['age'])) //on verifie si notre code postal à 5 chiffres en 1 et 5
			                      {

			                      
			                            //  Récupération de l'utilisateur pour verifier si le pseudo entré dans le formulaire n'existe pas déjà avec celui qui vient d'être entré dans le formulaire
			                              $re = $bdd->prepare('SELECT id FROM member WHERE nickname = :nickname');
			                              $re->execute(array(
			                                  'nickname' => $nickname));

			                              $resultat = $re->fetch();

			                             if ($resultat)
			                             {
			                                $form = true ;
			                                $error=1;
			                                echo 'This pseudonym already exists, choose another one !';
			                             } 
			                             else
			                             {
			                                $error= 0; //pseudo n'existe pas, password correspondent et avec plus de caracteres
			                             }

			        
			                      }
			                      else
			                      {
			                            $form = true ;
			                            $error=1;
			                            echo 'Enter a correct age';
			                      }

			            }
			            else
			            {
			              $form = true ;
			              $error=1;
			              echo 'The password must contain more than 6 characters';
			            }
			          }

			          else
			          {
			            $form = true ;
			            $error=1;

			            echo'The password and its confirmation do not correspond';
			          }

			 

			        if($error!=1) //s'il n'y a aucune erreur alors on peut enregistrer toutes les infos dans la base de données
			        {
			            try
			            {
			            // Hachage du mot de passe
			            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
			              //  Requete sql pour insérer tous ces champs dans notre base de données
			             $req = $bdd->prepare('INSERT INTO `member`(`nickname`, `email`, `pass`, `fullname`, `age`, `sex`, `interest`) VALUES (:nickname, :email, :pass, :fullname, :age, :sex, :interest);');

			             $req->execute(array(
			            'nickname' => htmlspecialchars($_POST['nickname']), 'email' => htmlspecialchars($email), 'pass'=>$pass_hache , 'fullname' => htmlspecialchars($_POST['fullname']), 'age' => $_POST['age'], 'sex'=> $_POST['sex'], 
			            'interest'=>htmlspecialchars($_POST['interest']) ) );

                

                         ?>


                        <?php




			        	}

				        catch(Exception $e)
				        {
				            die('Erreur : '.$e->getMessage());
				        }

				    ?>


                    <p class="text-center" style="color:white!important; font-weight: bold!important; position: relative!important; left:50px">
                    <?php
                    echo 'Sucessful registration !' ?>
                    <span style="font-weight: bold"> Now you can login !</span>
                    </p>

			          <?php

			        } 

			    }

                else 
	    		{
			      $form = true ;
			      $error=1;
			      ?>
			      <p class="text-center" style="color:white!important; font-weight: bold!important; position: relative!important; left:50px">

			      <?php
			      echo 'All the fields must be filled'; ?>
			  	 </p>

			  	 <?php

	    		} 

	    		?>


                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form method="post" action="home.php" class="signup-form">

                        <h2 class="text-center">Signup Now</h2>

                        <hr>


                        <div class="form-group">

                            <input type="text" name="nickname" class="form-control" placeholder="Pseudonym"/>

                        </div>

                        <div class="form-group">

                            <input type="email" name="email" class="form-control" placeholder="Email Address"/>

                        </div>

                        <div class="form-group">

                            <input type="password" name="pass" class="form-control" placeholder="Password"/>

                        </div>

                        <div class="form-group">

                            <input type="password" name="cpass" class="form-control" placeholder="Confirm password"/>

                        </div>

                       <div class="form-group">

                            <input type="text" name="fullname" class="form-control" placeholder="Full Name"/>

                        </div>

                        <div class="form-group">
                        
                            <input type="text" class="form-control" name="age" placeholder="Age" />

                        </div>

                        <div class="form-group">

                            <select class="form-control" name="sex" required>

                                <option value="Female" selected="selected">Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            
                            </select>

                        </div>
       
                        <div class="form-group">

                            <textarea class="form-control" rows="3" name="interest" placeholder="Center of interests"></textarea>
                            


                        </div>
                    

                        <div class="form-group text-center">

                        	<!--<input type="submit" name="submit" value="StartNow" />-->

                           <button type="submit" name="submit" class="btn btn-blue btn-block">Start Now</button>

                        </div>

                        <div class="modal-footer text-center">

                            Already have an account ?

                            <a data-toggle="modal" data-target="#SignIn" href="home.php#signin">Log in here !</a>


                        </div>

                    </form>

                </div>

            </div>

        </div>



    </section>



    <!--======================================== 

           About Us

    ========================================-->



    

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

           Story

    ========================================-->



    <section id="story">

        <div class="container-fluid">

            <div class="row">

                <!-- Img -->

                <div class="col-md-6 story-bg">

                </div>

                <!-- Story Caption -->

                <div class="col-md-6">

                    <div class="story-content">

                        <h2>What is TalkToUs! ?</h2>

                        <p class="story-quote">

                            "Debate to find the truth"

                        </p>

                        <div class="story-text">

                            <p>We choose to create a debate website to allow users to share their point of view on current topics and to keep people up-to-date. We think that allowing people online to talk about the actuality can permit to improve our communication with strangers, be more tolerant and open to others !</p>

                        </div>

                        <a href="contact.php" class="btn btn-white">Contact Us ?</a>

                    </div>

                </div>

            </div>

        </div>

    </section>


     <!--======================================== 

           Team

    ========================================-->



    <section id="team" class="section-padding">

        <div class="container">

            <h2>Team Of Professionals</h2>

            <p>The best professionals you can have !</p>

            <div class="row">

                <div class="col-md-4 col-lg-4">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/stef.jpg" class="img-responsive img-circle" alt="team-1">

                        <div class="caption">

                            <h4>Stefania Kukovski</h4>

                            <h6>Team member</h6>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="https://www.facebook.com/Stefania.Kukovski"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="https://www.linkedin.com/in/stéfania-kukovski-369637174/"><i class="fa fa-linkedin"></i></a></li>

                                    

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/armine.jpg" class="img-responsive img-circle" alt="team-2">

                        <div class="caption">

                            <h4>Armine Nasri Sebdani</h4>

                            <h6>Team member</h6>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="https://www.facebook.com/armine.nasri"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="https://www.linkedin.com/in/armine-nasri-sebdani/"><i class="fa fa-linkedin"></i></a></li>

                                   

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-lg-4">

                    <!--**Team-Member**-->

                    <div class="thumbnail team-member">

                        <img src="assets/img/nico.jpg" class="img-responsive img-circle" alt="team-3">

                        <div class="caption">

                            <h4>Nicolas Peuaud</h4>

                            <h6>Team member</h6>

                            <hr>

                            <div class="team-social">

                                <ul class="liste-unstyled">

                                    <li><a href="https://www.facebook.com/nicolas.peuaud"><i class="fa fa-facebook"></i></a></li>

                                    

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            



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

                    <form method="post" action="home.php" class="signup-form">

                        <div class="form-group">

                            <input type="text" name="nickname1" class="form-control" placeholder="Pseudonym" required="required">

                        </div>

                        <div class="form-group">

                            <input type="password" name="pass1" class="form-control" placeholder="Password" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" name="submit" class="btn btn-blue btn-block">Log In</button>

                            <?php 

    
                            //on va vérifier si la connexion marche

                             if (isset($_POST['nickname1']) && isset($_POST['pass1'])) { //si le pseudo et le mot de passe ont bien été rentré

                              $nickname = $_POST['nickname1'];

                              //  Récupération de l'utilisateur et de son pass hashé
                              $req = $bdd->prepare('SELECT id, pass FROM member WHERE nickname = :nickname1');
                              $req->execute(array(
                                  'nickname1' => $nickname));

                              $resultat = $req->fetch();

                              

                              // Comparaison du pass envoyé via le formulaire avec la base en hasché
                              $isPasswordCorrect = password_verify($_POST['pass1'], $resultat['pass']);

                              if (!$resultat)
                              {
                                  echo 'Wrong pseudonym or password !';
                              }
                              
                              else
                              {
                                  if ($isPasswordCorrect) {
                                      $_SESSION['id'] = $resultat['id']; /*création de variable de sessions qui nous servirons pour l'affichage du pseudo ou points*/
                                      $_SESSION['nickname'] = $nickname;
                                      echo 'You are connected !';
                                      echo "<script> window.location.assign('index.php'); </script>";
                                      // une fois qu'on est connecté, on est redirigé vers l'accueilreturn header('Location: home.php');
                                  }
                                  else {
                                      echo 'Wrong pseudonym or password !';
                                  }
                              }

                            }
                            ?>
                        

                            <!--<input type="submit" name="submit" value="S'inscrire" /> -->

                       </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a href="#">Forgot your password /</a>

                    <a href="home.php">Signup</a>

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