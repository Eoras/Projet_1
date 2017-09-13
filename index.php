<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name='description' content='A FAIRE'/>
    <meta name='keywords' content='A FAIRE'/>
    <meta name='author' content='WCS pierre paul steven'/>
    <meta name='Copyright' content='Copyright : Wcs pierre paul steven'/>
    <meta name='geo.placename' content='Orleans, Centre, FRANCE'/>
    <meta name='Identifier-url' content='A FAIRE'/>
    <meta name='geo.region' content='FR-FR'/>

    <title>Wild Games</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>

<div class="container-fluid">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- Burger Button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav text-center">
                    <li><a href="#">ACCUEIL</a></li>
                    <li><a href="#">JEUX</a></li>
                    <li><a href="#">SNACKING-BAR</a></li>
                    <li><a href="#">INFORMATIONS PRATIQUES</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- TRAVAIL PIERRE -->
    <section id="pierre">

        <?php

        for ($a = 1; $a <= 8; $a++) {

            //  Affiche la row
            if ($a == 1) {
                echo '<div class="row">';
            }

            // Affiche le contenu
            echo ' 
                <div class="yy col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail thub">
                        <img src="http://via.placeholder.com/150x150" alt="descriptif_activite_' . $a . '" />
                        <p>BDD descriptif ' . $a . '</p>
                    </div>

                </div> ';


            // Ferme la row
            if ($a == 8) {
                echo '</div>';
            }


        }

        ?>

    </section>


    <!-- TRAVAIL PAUL -->
    <section>


    </section>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

</body>

</html>