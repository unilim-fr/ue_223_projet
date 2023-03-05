<?php

    // On démarre la session
    session_start();

    if (isset($_SESSION['login'])) { // Si tu es connecté on te déconnecte et on te redirige vers une page.

    // Supression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Supression des cookies de connexion automatique
    setcookie('login', '');
    setcookie('pass_hache', '');
    
    header('Location: ../../index.php');
}

    //https://openclassrooms.com/forum/sujet/deconnexion-php

?>