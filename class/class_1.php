<?php

class class_1 {

    ///////////
    // CRÉATIONS VARIABLES
    ///////////

    private $_bdd;


    ///////////
    // CONSTRUCTION
    ///////////

    public function __construct($bdd) {

        $this->setDb($bdd);

    }


    ///////////
    // ACCÈS BDD
    ///////////

    public function setDb(PDO $bdd) {

        $this->_bdd = $bdd;

    }


    ///////////
    // MANAGEMENT
    ///////////

    public function add(Joueur $Joueur) {

        // Vérif
        if (($this->verif_inscription_vide($Joueur))||($this->verif_inscription_courriel_compatible($Joueur, htmlspecialchars(strtolower($_POST['compte_courriel_2']))))||($this->verif_inscription_mdp_compatible($Joueur, htmlspecialchars(strtolower($_POST['compte_mdp_2']))))||($this->verif_inscription_courriel($Joueur))||($this->verif_inscription_doublon($Joueur))) {

            $_SESSION['inscription'] = FALSE;
            header('Location: inscription.php');

            // Vérif valid
        } else {

            // Variables
            $_SESSION['inscription'] = TRUE;
            unset($_SESSION['inscription_erreur']);

            // Insert into
            $q = $this->_bdd->prepare('INSERT INTO joueur(joueur, mdp, courriel, courriel_recu, actif, zone_x_max, zone_y_max, rangement, rangement_ordre) VALUES(:joueur, :mdp, :courriel, :courriel_recu, :actif, :zone_x_max, :zone_y_max, :rangement, :rangement_ordre)');

            // Obligatoire
            $q->bindValue(':joueur',			$Joueur->getJoueur(),				PDO::PARAM_STR);
            $q->bindValue(':mdp',				$Joueur->getMdp(),					PDO::PARAM_STR);
            $q->bindValue(':courriel',			$Joueur->getCourriel(),				PDO::PARAM_STR);

            // Automatique
            $q->bindValue(':courriel_recu', 	$Joueur->getCourriel_recu(),		PDO::PARAM_INT);
            $q->bindValue(':actif', 			$Joueur->getActif(),				PDO::PARAM_INT);
            $q->bindValue(':zone_x_max', 		$Joueur->getZone_x_max(),			PDO::PARAM_INT);
            $q->bindValue(':zone_y_max', 		$Joueur->getZone_y_max(),			PDO::PARAM_INT);
            $q->bindValue(':rangement', 		$Joueur->getRangement(),			PDO::PARAM_STR);
            $q->bindValue(':rangement_ordre', 	$Joueur->getRangement_ordre(),		PDO::PARAM_STR);

            $q->execute();

            // Récup Id
            $reponse = $this->_bdd->query("SELECT id FROM joueur WHERE joueur='".$Joueur->getJoueur()."' && mdp='".$Joueur->getMdp()."'"); while ($data = $reponse->fetch()) { $Joueur->setId($data['id']); }$reponse->closeCursor();

        }

    }

    public function update(Joueur $Joueur) {

        // Vérif
        if ( ($this->verif_update_doublon($Joueur)) || ($this->verif_update_courriel($Joueur)) || ($this->verif_update_sexe($Joueur)) || ($this->verif_update_rangement_ordre($Joueur)) ) {

            // Pas de Update
            echo "erreur Update<br />";

        } else {

            $q = $this->_bdd->prepare("UPDATE joueur SET joueur = :joueur, mdp = :mdp, nom = :nom, prenom = :prenom, courriel = :courriel, sexe = :sexe, age = :age, ville = :ville, pays = :pays, photo = :photo, courriel_recu = :courriel_recu, actif = :actif, zone_x_max = :zone_x_max, zone_y_max = :zone_y_max, rangement = :rangement, rangement_ordre = :rangement_ordre WHERE id = :id ");

            $q->bindValue(':id',				$Joueur->getId(),				PDO::PARAM_STR);
            $q->bindValue(':joueur',			$Joueur->getJoueur(),			PDO::PARAM_STR);
            $q->bindValue(':mdp', 				$Joueur->getMdp(),				PDO::PARAM_STR);
            $q->bindValue(':nom',				$Joueur->getNom(),				PDO::PARAM_STR);
            $q->bindValue(':prenom', 			$Joueur->getPrenom(),			PDO::PARAM_STR);
            $q->bindValue(':courriel', 			$Joueur->getCourriel(),			PDO::PARAM_STR);
            $q->bindValue(':sexe', 				$Joueur->getSexe(),				PDO::PARAM_STR);
            $q->bindValue(':age',				$Joueur->getAge(),				PDO::PARAM_INT);
            $q->bindValue(':ville', 			$Joueur->getVille(),			PDO::PARAM_STR);
            $q->bindValue(':pays', 				$Joueur->getPays(),				PDO::PARAM_STR);
            $q->bindValue(':photo', 			$Joueur->getPhoto(),			PDO::PARAM_STR);
            $q->bindValue(':courriel_recu', 	$Joueur->getCourriel_recu(),	PDO::PARAM_INT);
            $q->bindValue(':actif', 			$Joueur->getActif(),			PDO::PARAM_INT);
            $q->bindValue(':zone_x_max', 		$Joueur->getZone_x_max(),		PDO::PARAM_INT);
            $q->bindValue(':zone_y_max', 		$Joueur->getZone_y_max(),		PDO::PARAM_INT);
            $q->bindValue(':rangement', 		$Joueur->getRangement(),		PDO::PARAM_STR);
            $q->bindValue(':rangement_ordre',	$Joueur->getRangement_ordre(),	PDO::PARAM_STR);

            $q->execute();

        }

    }

    public function delete(Joueur $Joueur) {

        $this->_bdd->exec('DELETE FROM joueur WHERE id = '.$Joueur->getId());

    }



    ///////////
    // VÉRIF
    ///////////

    // Add
    public function verif_inscription_vide($info) {

        $nom  = $info->getJoueur();
        $pass = $info->getMdp();
        $courriel = $info->getCourriel();

        $mdp2  = htmlspecialchars(strtolower($_POST['compte_mdp_2']));
        $courriel2 = htmlspecialchars(strtolower($_POST['compte_courriel_2']));

        if ( (!isset($nom) OR empty($nom)) AND (!isset($pass) OR empty($pass)) AND (!isset($courriel) OR empty($courriel)) AND (!isset($mdp2) OR empty($mdp2)) AND (!isset($courriel2) OR empty($courriel2)) ) {

            $_SESSION['inscription_erreur'] = "vide";
            return true;

        } else {

            return false;

        }

    }

    public function verif_inscription_courriel_compatible($info, $courriel2) {

        $courriel = $info->getCourriel();

        if ($courriel != $courriel2) {

            $_SESSION['inscription_erreur'] = "courriel_differend";
            return true;

        } else {

            return false;

        }

    }

    public function verif_inscription_mdp_compatible($info, $mdp2) {

        $mdp = $info->getMdp();

        if ((isset($mdp))&&(isset($mdp2))&&($mdp == $mdp2)) {
            $_SESSION['inscription_erreur']
			$_SESSION['inscription_erreur'] = "mdp_differend";
			return true;

		} else {

            return false;

        }

    }

    public function verif_inscription_courriel($info) {

        $courriel = $info->getCourriel();
        $valid = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*[^._-]@[a-z0-9-]+(.[a-z0-9]{2,4})*$/";

        if (preg_match($valid, $courriel) == FALSE)	{

            $_SESSION['inscription_erreur'] = "courriel_invalide";
            return true;

        } else {

            return false;

        }

    }

    public function verif_inscription_doublon($info) {

        $joueur = $info->getJoueur();
        $courriel   = $info->getCourriel();

        $q = $this->_bdd->query("SELECT joueur, courriel FROM joueur "); while ($data = $q->fetch()) {

            // Même Joueur (pseudo)
            if (($data['joueur'] == $joueur)) {

                $_SESSION['inscription_erreur'] = "doublon_joueur";
                return true;
                break;

            }

            // Même courriel
            if ($data['courriel'] == $courriel)	{

                $_SESSION['inscription_erreur'] = "doublon_courriel";
                return true;
                break;

            }

        }$q->closeCursor();


        // Control
        if (empty($_SESSION['inscription_erreur']))	{ return false;	}

    }


    // Update
    public function verif_update_doublon($info) {

        $controle	= FALSE;

        // Doit être libre, pas de doublons
        $q = $this->_bdd->query("SELECT joueur FROM joueur WHERE id != '".$info->getId()."'"); while ($data = $q->fetch()) {

            // Même Joueur (pseudo)
            if (($data['joueur'] == $info->getJoueur())) {

                $controle = TRUE;

            }

        }$q->closeCursor();

        // Doit être libre, pas de doublons
        $q = $this->_bdd->query("SELECT courriel FROM joueur WHERE id != '".$info->getId()."'"); while ($data = $q->fetch()) {

            // Même courriel
            if ($data['courriel'] == $info->getCourriel())	{

                $controle = TRUE;
                break;

            }

        }$q->closeCursor();

        // Control
        if ($controle)	{ return true; } else { return false; }

    }

    public function verif_update_courriel($info) {

        $valid = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*[^._-]@[a-z0-9-]+(.[a-z0-9]{2,4})*$/";

        if (preg_match($valid, $info->getCourriel()) == FALSE)	{

            return true;

        } else {

            return false;

        }

    }

    public function verif_update_sexe($info) {

        $sexe = $info->getSexe();

        if (!empty($sexe)) {

            if (($sexe != "Homme") && ($sexe != "Femme")) {

                return true;

            } else {

                return false;

            }

        }

    }

    public function verif_update_rangement_ordre($info) {

        $rangement = $info->getRangement_ordre();

        if (($rangement != "asc") && ($rangement != "desc")) {

            return true;

        } else {

            return false;

        }

    }

}