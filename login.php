<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $Lerreur= $Prerreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from utilisateurs where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["nom"])).
         " ".strtoupper($tab[0]["prenom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $Lerreur="Mauvais login ou mot de passe!";
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
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css1/style.css">
    </head>

    <body onLoad="document.fo.login.focus()">
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
            <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">

                <div class="container">
                    <div class="divider"></div>
                    <form name="fo" method="post" action="">

                        <div class="heading">
                            <h1><u style="color: #ffa500;">Authentification</u></h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="prenom"><h4 style="color: white;">Login<span class="blue"> *</span></h4></label>

                                        <input type="text" name="login" placeholder="Login" class="form-control" value="<?php echo $login?>" /><br />

                                    </div>


                                    <div class="col-md-6">
                                        <label for="nom"><h4 style="color: white;">Mot de passe<span class="blue"> *</span></h4></label>

                                        <input type="password" name="pass" class="form-control" placeholder="Mot de passe">


                                    </div>

                                    <br>
                                    <div class="col-md-12">

                                        <input type="submit" class="button1" name="valider" value="S'authentifier" />

                                    </div>
                                    <h3 class="erreur" style="color: red;">
                                        <?php echo $Lerreur; ?>
                                    </h3>
                                    <div class="col-md-12">
                                        <h3 class="white"><strong style="color: white;">Vous n'avez pas un compte? <a href="inscription.php" style="color: rgb(22, 95, 231);"><u style="color: rgb(22, 95, 231);">S'inscrire</u></a> </strong></h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <footer class="footer">
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