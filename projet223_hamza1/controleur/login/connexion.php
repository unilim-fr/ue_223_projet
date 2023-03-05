<?php session_start();?> 

<?php
    
    include '../../model/inc.connexion.php';
    $requete = $bdd->prepare('SELECT email_admin, pass_admin, nom_admin, prénom_admin FROM admine WHERE email_admin = ?');
    $requete->execute(array($_POST['mail']));
    if ($data = $requete->fetch())
	{
     //if($data[0]="admin")	
        if(password_verify($_POST['password'], $data['pass_admin'])){
            
                header('Location: ../../index.php');
                $_SESSION['login']=true;
                $_SESSION['login_admin']=true;
                $_SESSION['nom'] = $data['nom_admin'];
                $_SESSION['prnom'] = $data['prénom_admin'];

            
        }else{
            header('Location: ../../index.php?mdp');
            echo "<script>alert('votre mdp est incorrect')</script>";
            $_SESSION['login']=false;
        }
	}else{
        header('Location: ../../index.php?nom');
        echo "<script>alert('votre mail est incorrect')</script>";
        $_SESSION['login']=false;
    }
	$requete->closeCursor();
?>