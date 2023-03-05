<?php
require "./model/inc.connexion.php";

// Vérifier si l'identifiant de la formation a été transmis dans l'URL
if(isset($_GET['id_formation'])) {
  $id_formation = $_GET['id_formation'];

  // Requête pour récupérer les informations de la formation
  $requete = $bdd->prepare("SELECT * FROM formation 
                            LEFT JOIN formation_info 
                            ON formation.id_formation = formation_info.id_formation_info 
                            WHERE formation.id_formation = ?");
  $requete->execute([$id_formation]);
  $data = $requete->fetch();
}

// Si l'identifiant n'a pas été transmis dans l'URL, rediriger vers la page d'accueil
else {
  header('Location: ./index.php');
  exit();
}
?>

<!-- Affichage des informations détaillées de la formation 
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid" src="./<?php echo $data['img']; ?>" alt="formation logo">
    </div>
    <div class="col-md-6">
      <h2><?php echo $data['titre']; ?></h2>
      <p>Formateur: <?php echo $data['formateur']; ?></p>
      <p>Prix: <?php echo $data['prix']; ?></p>
      <p>Durée: <?php echo $data['durée']; ?></p>
      <p>Présentation: <?php echo $data['présentation']; ?></p>
      <p>Objectifs: <?php echo $data['objectifs']; ?></p>
    </div>
  </div>
</div> -->
