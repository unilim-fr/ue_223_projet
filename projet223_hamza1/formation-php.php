<?php include ('./controleur/formation/detail_formation.php');
require("./includes/head.php");
?>
<div class="breadcrumbs">
      <div class="container">
        <h1><?php echo $data['titre']; ?></h1>
        <p> </p>
      </div>
    </div>
    <section id="course-details" class="course-details">
      <div class="container mt-5">

        <div class="row">
          <div class="col-lg-8">
            <img src="./<?php echo $data['img']; ?>" class="img-fluid" alt="...">
            <br>
            <br>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Présentation du <?php echo $data['titre']; ?></h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                  <?php echo $data['présentation']; ?>
                  </li>
                </ul>
              </div>
            </div>  
            <br>
            <!--<div class="card">
              <div class="card-body">
                <h5 class="card-title">Objectifs</h5>
                <p class="card-text">Dans ce cours nous apprendrons les bases de la programmation en PHP, un langage permettant de réaliser un site web dynamique et de dialoguer avec une base de données. En particulier :</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Savoir installer un environnement de travail adapté (éditeur de texte, serveur local, affichage des erreurs, etc)</li>
                  <li class="list-group-item">Maîtriser les bases du langage PHP (variables, fonctions, boucles, tableaux, etc)</li>
                  <li class="list-group-item">Savoir transmettre des informations de page en page</li>
                  <li class="list-group-item">Connaître les variables superglobales importantes (sessions, cookies, etc)</li>
                  <li class="list-group-item">Savoir lire et écrire des informations dans une base de données</li>
                </ul>
              </div>
            </div>-->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Objectifs</h5>
                <?php echo $data['objectifs']; ?>
                <!--<textarea id="myTextarea"></textarea>-->
              </div> 
            </div>
            <br>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                  <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                      <h5 class="card-title">Responsable de la formation</h5>
                    </div>
                    <div class="col-md-4">
                      <img src="./assets/images/formateurs/hamza.jpg" class="img-fluid rounded-circle" alt="image">
                      
                    </div>
                    <div class="col-md-6">
                      <div class="ml-3">
                          <p><?php echo $data['formateur']; ?></p>
                          <p class="text-center"><a href="#">hamza.takkarouht@unilim.fr</a></p>
                      </div>
                    </div>
                  </div>
                
              </div>
            </div>
            <br>
            <div class="course-info d-flex justify-content-between align-items-center">
              <div class="card">
                <div class="card-body">
                  <div class="col-md-12 text-center">
                      <h5 class="card-title">Modalités de la formation</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item">Durée de la formation : <?php echo $data['durée']; ?>h</li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="col-md-12 text-center">
                      <h5 class="card-title">Evaluation</h5>
                    </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">QCM : 50%</li>
                    <li class="list-group-item">PROJET : 50%</li>
                  <p class="card-text mt-2">Un bonus de 2 points maximum sur la note finale pourra être accordé en cas de participation active tout au long de la formation.</p>
                </div>
              </div> 
            </div>
          </div>
        </div>

      </div>
    </section>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./assets/js/script.js"></script>
<?php
  require("./includes/footer.php");
?>
