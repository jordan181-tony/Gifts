<?php

ini_set('display_errors', 'on'); 
   session_start();
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$login=$_POST["login"];
   @$pass=$_POST["pass"];
   @$repass=$_POST["repass"];
   @$email=$_POST["email"];
   @$phone=$_POST["phone"];
   @$dateN=$_POST["dateN"];
   @$valider=$_POST["valider"];
   $Nerreur = $Perreur= $Perreur = $Lerreur = $Prerreur = $Rerreur = $Eerreur = $Pherreur = $Derreur = "";

   if(isset($valider)){
      if(empty($nom)) $Nerreur="Nom laissé vide!";
      elseif(empty($prenom)) $Perreur="Prénom laissé vide!";
      elseif(empty($prenom)) $Perreur="Prénom laissé vide!";
      elseif(empty($login)) $Lerreur="Login laissé vide!";
      elseif(empty($pass)) $Prerreur="Mot de passe laissé vide!";
      elseif($pass!=$repass) $Rerreur="Mots de passe non identiques!";
      elseif(empty($email)) $Eerreur="Email laissé vide!";
      elseif(empty($phone)) $Pherreur="Phone laissé vide!";
      elseif(empty($dateN)) $Derreur="Date de Naissance laissé vide!";

      else{
         include("connexion.php");
         $sel=$pdo->prepare("select id from utilisateurs where login=? limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $Lerreur="Login existe déjà!";
         else{
            $ins=$pdo->prepare("insert into utilisateurs(nom,prenom,login,pass,email,phone,dateN) values(?,?,?,?,?,?,?)");
            if($ins->execute(array($nom,$prenom,$login,md5($pass),$email,$phone,$dateN)))
               header("location:login.php");
         }   
      }
   }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="css/responsive.css"> -->
        <title>Inscription</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css1/style.css">
    </head>

    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- header-start -->
        <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area">
                    <div class="container-fluid p-0">
                        <div class="row align-items-center no-gutters">
                            <div class="col-xl-5 col-lg-5">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="index.html">HOME</a></li>
                                            <li><a href="Menu.html">CATEGORIES</a></li>
                                            <li><a href="about.html">GIFTS LISTS</a></li>
                                            <li><a href="#">ADD GIFTS<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li>
                                            <ul id="navigation">
                                                <li><a href="contact.php">CONTACT US</a></li>
                                            </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo-img">
                                    <a href="index.html">
                                        <img src="#" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                                <div class="book_room">
                                    <div class="socail_links">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->

        <!-- slider_area_start -->
        <div class="slider_area">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="divider"></div>

                    <div class="heading">
                        <h1><u style="color: #ffa500;">Inscription</u></h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form id="contact-form" method="post" action="" name="fo" role="form">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="nom"><h4 style="color: rgb(17, 17, 17);">Nom<span class="blue"> *</span></h4></label>

                                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" required value="<?php echo $nom; ?>">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Nerreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="prenom"><h4 style="color: rgb(17, 17, 17);">Prénom<span class="blue"> *</span></h4></label>

                                        <input type="text" id="prenom" name="prenom" class="form-control" required placeholder="Votre prénom" value="<?php echo $prenom; ?>">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Perreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Login<span class="blue"> *</span></h4></label>
                                        <input type="text" name="login" placeholder="Login" class="form-control" required value="<?php echo $login?>" /><br />
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Lerreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Mot de passe<span class="blue"> *</span></h4></label>
                                        <input type="password" name="pass" class="form-control" placeholder="Mot de passe" required value="<?php echo $pass; ?>">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Prerreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Confirmer mot de passe<span class="blue"> *</span></h4></label>
                                        <input type="password" name="repass" placeholder="Confirmer Mot de passe" required class="form-control" value="<?php echo $repass; ?>">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Rerreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Email<span class="blue"> *</span></h4></label>

                                        <input type="email" id="email" name="email" class="form-control" required placeholder="Votre email" value="<?php echo $email; ?>">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Eerreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Téléphone</h4></label>

                                        <input type="tel" id="phone" name="phone" class="form-control" required placeholder="Votre téléphone" value="<?php echo $phone; ?>">

                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Pherreur ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name"><h4 style="color: rgb(17, 17, 17);">Date de Naissance<span class="blue"> *</span></h4></label>
                                        <input type="date" name="dateN" placeholder="Date de Naissance" required class="form-control" value="<?php echo $dateN?>" /><br />
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Derreur ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <input type="submit" class="button1" name="valider" value="S'inscrire" />

                                    </div>

                                    <div class="col-md-12">
                                        <h3 class="blue" style="color:rgb(17, 17, 17);"><strong>Ces informations sont requises*</strong></h3>

                                    </div>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <footer>
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget text-center ">
                                <h3 class="footer_title pos_margin">
                                    Cotonou
                                </h3>
                                <p>5th Avenue Steinmetz, 700/D kings road
                                    <a href="#">tonyjordan181@gmail.com</a></p>
                                <a class="number" href="#">+229 69 25 81 23 / +229 68 03 51 68</a>

                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget text-center ">

                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title pos_margin">
                                    Abomey/Calavi
                                </h3>

                                <p>Calavi, Arconville carrefour
                                    <a href="#">tonyjordan181@gmail.com</a></p>
                                <a class="number" href="#">+229 69 25 81 23 / +229 68 03 51 68</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="socail_links text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </body>

    </html>