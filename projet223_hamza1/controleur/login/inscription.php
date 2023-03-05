<?php session_start();?> 
	<?php
    

        $nom = verif( $_POST['votre_nom']);
        $prenom= verif( $_POST['votre_prenom']);
        $email = verif($_POST['email']);
        $password = verif($_POST['password']);
        $password_verif = verif($_POST['password_confirmation']);
        $valide=false;

        function verif($data){
            if(isset($data) && !empty($data) && strlen($data) <= 32){
                $data = htmlspecialchars($data);
                return $data;
                }
        }

        if(is_string($nom) && is_string($prenom)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $valide=true;
                }
        }else{
            header('location: ../../index.php');
            echo "<script>alert('nom && pre')</script>";
            //$_SESSION['erreur']='<br><p style="color:red;">le nom'. $nom . ' est invalide</p>';
            $valide=false;
        }

            //  // HASH
            // $secret = sha1($email).time();
            // $secret = sha1($secret).time().time();

        if(strlen($password) != strlen($password_verif) && $password != $password_verif){
            //$_SESSION['erreur'] .= '<br><p style="color:red;">le mot de passe est invalide</p>';    
            $valide=false;
            header('location: ../../index.php');
            echo "<script>alert('pass')</script>";
        }else{
            $valide=true;
            // PASSWORD CRYPTAGE
            $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        
        
        if($valide == true){
            include '../../model/inc.connexion.php';
            
            $requete = $bdd->prepare('INSERT INTO admine (nom_admin, prénom_admin, email_admin , pass_admin) VALUES (:nom , :prenom , :email , :password)');
            // On indique ensuite les paramètres dans le même ordre
            $requete->execute(array(
                'nom' => $nom,
                'prenom'=> $prenom,
                'email'=> $email,
                'password' => $password_hash
                ));

            $requete->closeCursor();
        }

    
	?>