<?php
require "modeles/ModeleSBAteliers.php";


$numeroClient = $_SESSION["numero"];

$numeroAtelier = $numAtelier;
$atelier = ModeleSBAteliers::getAtelier( $numAtelier ) ;


// Obtenez la liste des ateliers auxquels le client a participé
$ateliersParticipes = ModeleSBAteliers::getParticipations($numeroClient);

// Vérifiez si le client a participé à l'atelier spécifié
$clientParticipe = false;
foreach ($ateliersParticipes as $atelierParticipe) {
    if ($atelierParticipe['atelier'] == $numeroAtelier) {
        $clientParticipe = true;
        break;
    }
}
$commentaires = ModeleSBAteliers::getCommentairesAtelier($numeroAtelier);

// Incluez la vue en passant les données nécessaires
require "vues/vue-commentaires-atelier.php";
?>
