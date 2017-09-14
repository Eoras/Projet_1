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

            </div> ';

            // Ferme la row
            if ($a == 8) {
                echo '</div>';
            }
        }

        ?>

    </section>

    <!-- Fin Pierre -->

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

</body>

</html>