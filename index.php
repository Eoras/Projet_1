<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wild Games</title>

	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap core CSS -->    
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- DEBUT PARTIE STEVEN PREMIERE PAGE --> 

<div class="container-fluid fondsite">

    <nav class="navbar navbar-default nav-transparent">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- Burger Button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center blink">
                    <li><a href="#"># ACCUEIL</a></li>
                    <li><a href="#"># JEUX</a></li>
                    <li><a href="#"># SNACKING-BAR</a></li>
                    <li><a href="#"># INFOS PRATIQUES</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container accueil">
        <section class="row">
            <div class="col-xs-12"><img src="../images/Wild Games7.png" class="img_responsive center-block imglogo" alt="Wild Games" style="width:100%; height:auto; display:block; max-width:1000px"></div>
        </section>
    </div>
</div>

<!-- FIN PARTIE STEVEN PREMIERE PAGE --> 

<div class="container-fluid">

    <!-- TRAVAIL PIERRE -->
    <section id="pierre">

        <?php

        for ($a = 1; $a <= 8; $a++) {

            // Variables (en attente de BDD)
            if ($a == 1) {
                $src_img = 'images/vignettes/arcade_1.jpg';
                $description = 'Description 1';
            } elseif ($a == 2) {
                $src_img = 'images/vignettes/arcade_2.jpg';
                $description = 'Description 2';
            } elseif ($a == 3) {
                $src_img = 'images/vignettes/arcade_3.jpg';
                $description = 'Description 3';
            } elseif ($a == 4) {
                $src_img = 'images/vignettes/babyfoot_1.jpg';
                $description = 'Description 4';
            } elseif ($a == 5) {
                $src_img = 'images/vignettes/babyfoot_2.jpg';
                $description = 'Description 5';
            } elseif ($a == 6) {
                $src_img = 'images/vignettes/billard_1.jpg';
                $description = 'Description 6';
            } elseif ($a == 7) {
                $src_img = 'images/vignettes/palet_1.jpg';
                $description = 'Description 7';
            } elseif ($a == 8) {
                $src_img = 'images/vignettes/pingpong_1.jpg';
                $description = 'Description 8';
            }

            //  Affiche la row
            if ($a == 1) {
                echo '<div class="row">';
            }

            // Affiche le contenu
            echo '
            <div class="yy col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="thumbnail thub">
                    <img src="' . $src_img . '" alt="descriptif_activite_' . $a . '" />
                    <h3>BDD descriptif ' . $a . '</h3>
                    <p> ' . $description . '</p>
                </div>

            </div>';

            // Ferme la row
            if ($a == 8) {
                echo '</div>';
            }
        }

        ?>

    </section>

    <!-- Fin Pierre -->

</div>


<!-- DEBUT DU CODE DE PAUL -->

<div class="container-fluid backgroundsnack">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 hidden-md test" id="snackbar">
                <a href="#" class="thumbnail">
                    <img src="https://goo.gl/yynDFZ" alt="test">
                </a>
            </div>

            <div class="col-md-9 col-lg-6 test">
                <div class="panel panel-default">
                    <div class="panel-heading" ><span class="glyphicon glyphicon-glass">&nbsp;</span>SNACK BAR MENU</div>

                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6 test">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading"></div>
                                    <table class="table">
                                        <th>Nos Burgers</th><th>Prix</th>

                                        <tr><td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img class="media-object thumb" src="images/burgers/burger1.png" alt="burger">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Burger 1</h5>
                                                        <p>Pain rustique, Steaks hachés viande bovine française, Cheddar fondu, Bacon, Salade, Sauce tartare</p>
                                                    </div>
                                                </div>
                                            </td><td>16,10€</td></tr>


                                        <tr><td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img class="media-object thumb" src="images/burgers/burger2.png" alt="burger">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Burger 2</h5>
                                                        <p>Pain rustique, Steaks hachés viande bovine française , Raclette, Beignets d'oignon, Salade, Sauce Barbecue</p>
                                                    </div>
                                                </div>
                                            </td><td>6,10€</td></tr>

                                        <tr><td>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img class="media-object thumb" src="images/burgers/burger3.png" alt="burger">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Burger 3</h5>
                                                        <p>Pain rustique, 2 Aiguillettes de Cabillaud croustillantes, Cheddar fondu, Oignons grillés, Salade, Sauce béarnaise</p>
                                                    </div>
                                                </div>
                                            </td><td>84,50€</td></tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6 test">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">Nos Pizza</div>
                                    <table class="table">
                                        <th></th><th>Prix</th>

                                        <tr><td>Pizza 1
                                                <br/><p>Pain rustique, Steaks hachés viande bovine française, Cheddar fondu, Bacon, Salade, Sauce tartare</p></td>
                                            <td>16,10€ </td></tr>

                                        <tr><td>Pizza 2
                                                <br/><p>Pain rustique, Steaks hachés viande bovine française , Raclette, Beignets d'oignon, Salade, Sauce Barbecue</p></td>
                                            <td>6,10€ </td></tr>

                                        <tr><td>Pizza 3
                                                <br/><p>Pain rustique, 2 Aiguillettes de Cabillaud croustillantes, Cheddar fondu, Oignons grillés, Salade, Sauce béarnaise</p></td>
                                            <td>84,50€ </td></tr>

                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="panel-footer">Footer de mon panel</div>
                </div>
            </div>

            <div class="col-md-3 test">
                <a href="#" class="thumbnail">
                    <img src="https://goo.gl/yynDFZ" alt="test">
                </a>
            </div>


    </div>
</div>
<!-- FIN DU CODE DE PAUL -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

</body>

</html>
