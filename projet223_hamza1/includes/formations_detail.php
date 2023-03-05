<div class="divider" id="formations_detail"></div>


<section id="courses" class="courses">
  <div class="container">
    <div class="row">
    <?php
      if(isset($_SESSION['login']) && $_SESSION['login']===true && $_SESSION['login_admin']===true){
    ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch formation">
        <div class="course-item">
          <div class="container">
            <h2>Ajouter une formation</h2>
            <form action="./controleur/formation/ajouter_formation.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="titre">Titre:</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
              </div>
              <div class="form-group">
                <label for="ticket">Ticket:</label>
                <input type="text" class="form-control" id="ticket" name="ticket" required>
              </div>
              <div class="form-group">
                <label for="durée">Durée:</label>
                <input type="text" class="form-control" id="durée" name="duree" required>
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
              </div>
              <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="img" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
          </div>
        </div>
      </div>
    <?php 
      }
    ?>

    <?php
      include './model/inc.connexion.php';
      $requete = $bdd ->query("SELECT * FROM formation ORDER BY id_formation DESC LIMIT 18");
      while($data = $requete->fetch()){
    ?>
        <div class="col-lg-4 col-md-6 align-items-stretch formation">
          <?php
            if(isset($_SESSION['login']) && $_SESSION['login']===true && $_SESSION['login_admin']===true){
          ?>
            <button type="button" class="btn btn-danger delete-formation supp" data-id="<?php echo $data['id_formation'];?>">x</button>
            <button type="button" class="btn btn-primary modif modif-formation" data-id="<?php echo $data['id_formation'];?>"><i class="fas fa-edit ml-2"></i></button>
          <?php
            }
          ?>
            <div class="course-item" id="<?php echo $data['id_formation']; ?>">
              <img class="img-fluid" src="./<?php echo $data['img']; ?>" alt="formation logo">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4><?php echo $data['ticket']; ?></h4>
                  <p class="price"><?php echo $data['durée']; ?></p>
                </div>

                <h5><a href="#"><?php echo $data['titre']; ?></a></h5>
                <p><?php echo $data['description']; ?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <!--<a href="./controleur/formation/detail_formation.php?id_formation=<?php echo $data['id_formation']; ?>"><button type="submit" class="btn">Savoir plus</button></a>-->
                    <a href="./formation-php.php?id_formation=<?php echo $data['id_formation']; ?>"><button type="submit" class="btn">Savoir plus</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      ?>
      </div>

    </div>
</section>

