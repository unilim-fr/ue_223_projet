<?php
session_start();
include '../../model/inc.connexion.php';

if (isset($_GET['idformation']) && $_SESSION['login'] === true && $_SESSION['login_admin'] === true) {

    $id_formation = $_GET['idformation'];

    // Suppression de la formation dans la table "formation"
    $stmt = $bdd->prepare("DELETE FROM formation WHERE id_formation = :id_formation");
    $stmt->bindParam(':id_formation', $id_formation);
    $stmt->execute();

    // Suppression des informations associées à la formation dans la table "formation_info"
    $stmt_info = $bdd->prepare("DELETE FROM formation_info WHERE id_formation_info = :id_formation");
    $stmt_info->bindParam(':id_formation', $id_formation);
    $stmt_info->execute();

    // Redirection vers la page d'accueil
    header('Location: ../../index.php');
    exit;
}
?>