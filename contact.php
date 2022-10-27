<?php

//ini_set('display_errors', 'on'); 
//if(empty($_POST['name']) || empty($_POST['sujet']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  //http_response_code(500);
  //exit();
//}

//$name = strip_tags(htmlspecialchars($_POST['name']));
//$email = strip_tags(htmlspecialchars($_POST['email']));
//$sujet = strip_tags(htmlspecialchars($_POST['sujet']));
//$message = strip_tags(htmlspecialchars($_POST['message']));

//$to = "tonyjordan181@gmail.com"; // Change this email to your //
//$sujet = "$sujet:  $name";
//$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSujet: $sujet\n\nMessage: $message";
//$header = "From: $email";
//$header .= "Reply-To: $email";	

//if(!mail($to, $sujet, $body, $header))
  //http_response_code(500);








  /* Page: contact.php */
  $Maerreur = $Serreur= $Merreur = $Everreur = $Nerreur = $Lerreur= "";
//mettez ici votre adresse mail
$VotreAdresseMail="tonyjordan181@gmail.com";
// si le bouton "Envoyer" est cliqué
if(isset($_POST['valider'])) {
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide";
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            $Maerreur = "L'adresse mail entrée est incorrecte";
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['sujet'])) {
                $Serreur = "Le champ sujet est vide";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    $Merreur = "Le champ message est vide";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: Nom de votre site <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['mail']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        $Everreur = "Le mail à été envoyé avec succès!";
                    } else {
                        $Nerreur = "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
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
        <title>contact</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="style.css">
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
                                            <li><a href="contact.html">CONTACT US</a>

                                            </li>
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
                    <div class="heading">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form id="contact-form" method="post" action="" name="fo" role="form">
                                <div class="row">


                                    <div class="col-md-6">
                                        <label for="name">Login<span class="blue"> *</span></label>

                                        <input type="name" id="name" name="name" class="form-control" required placeholder="Votre Login">
                                        <div class="erreur">
                                            <h6 style="color: red;">
                                                <?php echo $Lerreur ?>
                                            </h6>
</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Email<span class="blue"> *</span></label>

                                            <input type="email" id="mail" name="mail" class="form-control" required placeholder="Votre email">
                                            <div class="erreur">
                                                <h6 style="color: red;">
                                                    <?php echo $Maerreur ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name">Sujet<span class="blue"> *</span></label>

                                            <input type="text" id="sujet" name="sujet" class="form-control" required placeholder="Votre téléphone">
                                            <div class="erreur">
                                                <h6 style="color: red;">
                                                    <?php echo $Serreur ?>
                                                </h6>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <label for="name">Message<span class="blue"> *</span></label>
                                            <textarea id="message" name="message" class="form-control" placeholder="Votre message" rows="8"></textarea>
                                            <div class="erreur">
                                                <h6 style="color: red;">
                                                    <?php echo $Merreur ?>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <input type="submit" class="button1" name="valider" value="S'authentifier" />
                                            <div class="erreur">
                                                <h6 style="color: red;">
                                                    <?php echo $Nerreur ?>
                                                </h6>
                                            </div>
                                        </div>




                                    </div>
                            </form>
                            </div>
                        </div>
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