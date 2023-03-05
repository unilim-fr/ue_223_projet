<?php

echo '<div id="login-page"></div>';
if(isset($_SESSION['login']) && $_SESSION['login']===true){
    require("./includes/admin.php");
}
require("./includes/carousel.php");
require("./includes/presentation.php");
require("./includes/formations_detail.php");
require("./includes/actu.php");
require("./includes/formateurs.php");
//require("./includes/newsletter.php");
//require("./includes/citation.php");
require("./includes/contact.php");
?>
