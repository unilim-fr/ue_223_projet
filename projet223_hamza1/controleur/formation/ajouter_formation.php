
<?php
session_start();
include "../../model/inc.connexion.php";

if(isset($_SESSION['login']) && $_SESSION['login']===true && $_SESSION['login_admin']===true){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $titre = ($_POST['titre']);
        $description = ($_POST['description']);
        $ticket = ($_POST['ticket']);
        $duree = ($_POST['duree']);

        // Validation des données
        $errors = [];

        if(empty($titre)){
            $errors[] = "Le champ titre est obligatoire.";
        }
        if(empty($description)){
            $errors[] = "Le champ description est obligatoire.";
        }
        if(empty($ticket)){
            $errors[] = "Le champ ticket est obligatoire.";
        }
        if(empty($duree)){
            $errors[] = "Le champ durée est obligatoire.";
        }

        // Si pas d'erreurs, on insère la formation
        if(empty($errors)){

            // Enregistrement de l'image
            $img = null;
            if(isset($_FILES['img']) && $_FILES['img']['error'] === 0){
                $allowedTypes = ['image/png', 'image/jpeg', 'image/gif'];
                $fileType = $_FILES['img']['type'];
                if(in_array($fileType, $allowedTypes)){
                    $fileName = $_FILES['img']['name'];
                    $fileTmpName = $_FILES['img']['tmp_name'];
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFileName = uniqid() . '.' . $fileExtension;
                    
                    $fileSize = $_FILES['img']['size'];
                    $fileError = $_FILES['img']['error'];
                    $fileTmpName = $_FILES['img']['tmp_name'];
                    $fileType = $_FILES['img']['type'];
                    $fileName = $_FILES['img']['name'];
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));
                    $allowed = array('jpg', 'jpeg', 'png');
                                    
                    if(in_array($fileActualExt, $allowed)){
                        if($fileError === 0){
                            if($fileSize < 5000000){
                                $newFileName = uniqid('', true) . "." . $fileActualExt;
                                if(move_uploaded_file($fileTmpName, "../../assets/images/logo/" . $newFileName)){
                                    $img = "assets/images/logo/" . $newFileName;
                                } else {
                                    $errors[] = "Erreur lors de l'enregistrement de l'image.";
                                }
                            } else {
                                $errors[] = "Le fichier est trop volumineux. (max. 5 Mo)";
                            }
                        } else {
                            $errors[] = "Erreur lors du téléchargement de l'image.";
                        }
                    } else {
                        $errors[] = "Seuls les fichiers JPG, JPEG et PNG sont autorisés.";
                    }
                } else {
                    $errors[] = "Format d'image non autorisé.";
                }
            }
            

            // Insertion de la formation dans la base de données
            $query = $bdd->prepare("INSERT INTO formation (ticket, durée, titre, description, img) VALUES (:ticket, :duree, :titre, :description, :img)");
            $query->bindParam('ticket', $ticket);
            $query->bindParam('duree', $duree);
            $query->bindParam('titre', $titre);
            $query->bindParam('description', $description);
            $query->bindParam('img', $img);
            $result = $query->execute();

            

            if($result){
                $last_id = $bdd->lastInsertId();
                $query = $bdd->prepare("INSERT INTO formation_info (id_formation_info) VALUES (:id_formation)");
                $query->bindParam('id_formation', $last_id);
                $result_info = $query->execute();
            
                if($result_info){
                    header('Location: ../../index.php');
                    exit;}
            } else {
                
                $errors[] = "Erreur lors de l'ajout de la formation.";
            }
        }
    }
}
?>
<?php if(isset($errors) && !empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
