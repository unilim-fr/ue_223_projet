<?php
session_start();
require "../../model/inc.connexion.php";

if(isset($_POST['modif_formation']) && isset($_SESSION['login']) && $_SESSION['login_admin']===true) {
    // récupérer les données du formulaire
    $formationId = $_GET['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $duree = $_POST['duree'];
    $ticket=$_POST['ticket'];
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
    // vérifier si un fichier a été téléchargé
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
                                $imgDestination = "assets/images/logo/" . $newFileName;
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
    } else {
        // conserver l'ancienne image si aucun fichier n'a été téléchargé
        $imgDestination = $_POST['imgPath'];
    }

    // mettre à jour les informations de la formation dans la base de données
    $sql = "UPDATE formation SET ticket = '$ticket', titre = '$titre', description = '$description', durée = '$duree', img = '$imgDestination' WHERE id_formation = $formationId";
    $result = $bdd->query($sql);

    if($result) {
        // rediriger vers la page d'accueil si la mise à jour a réussi
        header("Location: ../../index.php");
        exit();
    } else {
        // afficher un message d'erreur si la mise à jour a échoué
        echo "La mise à jour a échoué. Veuillez réessayer.";
        exit();
    }
}
?>
